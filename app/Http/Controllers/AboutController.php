<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ValidateLink;
use App\Helpers\FileUploadHelper;
use App\Models\About;
use App\Models\Skill;

class AboutController extends Controller
{

    protected string $folderName = "about";

    public function update(Request $request, About $about){
        $request->validate(rules: [
            'introduction'  => 'required',
            'resume-link'   => 'required|max:255',
            'image'         => 'image|max:2048',
            'core'          => 'required|array',
        ]);

        

        $about->introduction = $request['introduction'];
        $about->resume_link = $request['resume-link'];
        $new_image = $request->hasFile('image');
        
        if($new_image){
            $new_image_path = FileUploadHelper::update($request->file('image'), $about->image, $this->folderName);
            $about->image = $new_image_path;
        }
        
        $about->save();

                
        $techCores = $request->input('core', []);
        
        Skill::query()->update(['is_tech_core' => false]);

        foreach($techCores as $core){
            $record = Skill::findOrFail($core);
            if($record){
                $record->is_tech_core = true;
                $record->save();
            }
        }

        return redirect()->back()->with(['success' => "About info is updated successfullt"]);
    }
}