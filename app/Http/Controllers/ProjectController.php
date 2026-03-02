<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Helpers\FileUploadHelper;
class ProjectController extends Controller
{
    protected string $folderName = "project";
    public function store(Request $request){
        $request->validate([
            'title'            => "required|max:255|min:10",
            'description'      => "required|min:20",
            'status'           => "required|in:Completed,In-Progress,Archived",
            'github-link'      => "max:255",
            'demo-link'        => "max:255",
            'thumbnail'        => "required|image",
            'tech-stacks'      => "required|array|max:4",
            'tech-stacks.*'    => "string",    
            'date-completed'   => "date"
        ]);


        $record = Project::create([
            'title'          => $request['title'],
            'description'    => $request['description'],
            'status'         => $request['status'],
            'github_link'    => $request['github-link'],
            'demo_link'      => $request['demo-link'],
            'tech_stacks'    => $request->input('tech-stacks', []),
            'date_completed' => $request['date-completed']
        ]);


        if(!$request->hasFile('thumbnail')){
            return redirect()->back()->withErrors(['failed' => "Thumbnail input is required"])->withInput();
        }

        $thumbnail = FileUploadHelper::upload($request->file('thumbnail'), $this->folderName);

        $record->update([
            'thumbnail' => $thumbnail
        ]);

        return redirect()->back()->with(['success' => 'Record inserted successfully']);
    }


    public function destroy(Project $project){
        if($project == null){
            return redirect()->back()->withErrors(['failed' => "Failed to remove this record"]);
        }

        FileUploadHelper::delete($project->thumbnail);

        $project->delete();
        return redirect()->back()->with(['success' => 'Record has beed deleted sucessfully']);

    }

public function update(Request $request, Project $project)
{
    $request->validate([
        'title'       => 'required|string',
        'description' => 'required|string',
        'status'      => 'required|string',
        'date-completed' => 'nullable|date',
        'github-link' => 'nullable|string',
        'demo-link'   => 'nullable|string',
        'tech-stacks' => 'nullable|array',
        'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    $project->title          = $request['title'];
    $project->description    = $request['description'];
    $project->status         = $request['status'];
    $project->date_completed = $request['date-completed'];
    $project->github_link    = $request['github-link'];
    $project->demo_link      = $request['demo-link'];
    $project->tech_stacks    = $request->input('tech-stacks', []);

    if ($request->hasFile('thumbnail')) {
        if ($project->thumbnail) {
            FileUploadHelper::delete($project->thumbnail);
        }

        $project->thumbnail = FileUploadHelper::upload($request->file('thumbnail'), $this->folderName);
    }

    $project->save();

    return back()->with('success', 'Project updated successfully.');
}
}
