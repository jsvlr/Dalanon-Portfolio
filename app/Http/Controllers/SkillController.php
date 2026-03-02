<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadHelper;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{

    protected string $folderName = "skill";

    public function store(Request $request){
        $request->validate([
            'title'                => 'required|max:255',
            'type'                 => 'max:255',
            'description'          => 'max:255|min:10',
            'logo_image_url'       => 'required|image|max:3072',
            'background_image_url' => 'required|image'
        ]);

        if(!$request->hasFile('logo_image_url')||
           !$request->hasFile('background_image_url')
        ){
            return redirect()->back()->withErrors(['failed' => "Image not inserted"]);
        }

        $logo_image_url = FileUploadHelper::upload($request->file('logo_image_url'), $this->folderName);
        $background_image_url = FileUploadHelper::upload($request->file('background_image_url'), $this->folderName);

        $record = Skill::create(
            [
                'title' => $request['title'],
                'type'  => $request['type'],
                'description' => $request['description'],
                'logo_image_url' => $logo_image_url,
                'background_image_url' => $background_image_url
            ]
        );

        if(!$record){
            return redirect()->back()->withErrors(['failed' => "Failed to insert data to skills table"]);
        }

        return redirect()->back()->with(['success' => "Record inserted successfully"]);
    }

    public function destroy(Skill $skill){
        if($skill == null){
            return redirect()->back()->withErrors(['failed' => "Failed to delete the profile"]);
        }

        FileUploadHelper::delete($skill->logo_image_url);
        FileUploadHelper::delete($skill->background_image_url);

        $skill->delete();

        return redirect()->back()->with(['success' => "Recored deleted successfully"]);
    }

    public function update(Request $request, Skill $skill){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type'     => 'required|max:255',
        ]);

        if($request->hasFile('logo_image_url')){
            if($skill->logo_image_url){
                FileUploadHelper::delete($skill->logo_image_url);
            }

            $newImage = FileUploadHelper::upload($request->file('logo_image_url'), $this->folderName);
            $skill->logo_image_url = $newImage;
        }
        
        if($request->hasFile('background_image_url')){
            if($skill->background_image_url){
                FileUploadHelper::delete($skill->background_image_url);
            }

            $newImage = FileUploadHelper::upload($request->file('background_image_url'), $this->folderName);
            $skill->background_image_url = $newImage;
        }

        $skill->title = $request['title'];
        $skill->description = $request['description'];
        $skill->type = $request['type'];

        $skill->save();

        return redirect()->back()->with(['success' => 'Record updated successfully']);
    }

}
