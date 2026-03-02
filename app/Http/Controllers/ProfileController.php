<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\Profile;
use App\Helpers\FileUploadHelper;

class ProfileController extends Controller
{
    public string $folderName = 'profiles';
    
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'id'                   => 'int',
            'header'                => 'required|max:255',
            'subheader'            => 'required|max:255',
            'position'             => 'required|max:255',
            'profile-image-url'    => 'required|max:2048|image|mimes:jpeg,png,jpg',
            'background-image-url' => 'required|max:2048|image|mimes:jpeg,png,jpg' ,
            'logo-image-url'       => 'required|max:2048|image|mimes:jpeg,png,jpg'
        ]);

        if($request->hasFile('profile-image-url')    ||
           $request->hasFile('background-image-url') ||
           $request->hasFile('logo-image-url')
        ){
            $profileImageUrl = FileUploadHelper::upload($request->file('profile-image-url'), $this->folderName);
            $backgroundImageUrl = FileUploadHelper::upload($request->file('background-image-url'), $this->folderName);
            $logoImageUrl = FileUploadHelper::upload($request->file('logo-image-url'),$this->folderName);
            
            Profile::query()->update(['in_used' => false]);
            
            $record = Profile::updateOrCreate([
                'header'               => $request['header'],
                'subheader'            => $request['subheader'],
                'position'             => $request['position'],
                'profile_image_url'    => $profileImageUrl,
                'background_image_url' => $backgroundImageUrl,
                'logo_image_url'       => $logoImageUrl,
                'in_used'              => true
            ]);
            
            if(!$record){
                return redirect()->back()->withErrors(['failed' => "Failed to create or update a record"])->withInput();
            }
        } else {
            return redirect()->back()->with(['failed' => 'file failed to upload'])->withInput();
        }
        return redirect()->back()->with(['success' => "Profile update successfully"])->withInput();
    }

    public function update(Request $request, Profile $profile): RedirectResponse{
        Profile::query()->update(['in_used' => false]);

        $profile->in_used = true;
        $profile->save();           

        return redirect()->back()->with(['success' => "Profile updated successfully"]);
    }

    public function destroy(Profile $profile): RedirectResponse{
        if($profile == null){
            return redirect()->back()->withErrors(['failed' => "Failed to delete the profile"]);
        }
       
        FileUploadHelper::delete($profile->logo_image_url);
        FileUploadHelper::delete($profile->background_image_url);
        FileUploadHelper::delete($profile->profile_image_url);

        if($profile->in_used){
            $next = Profile::where('id', '>', $profile->id)->orderBy('id', 'asc')->first();
            if($next){
                $next->in_used = true;
                $next->save();
            }else{
                $prev = Profile::where('id', '<', $profile->id)->orderBy('id', 'desc')->first();
                $prev->in_used = true;
                $prev->save();
            }
        }

        $profile->delete();
        return redirect()->back()->with(['success' => "Successfully remove the preset profile"]);
    }
}
