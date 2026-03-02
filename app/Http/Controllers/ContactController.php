<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Helpers\FileUploadHelper;
class ContactController extends Controller
{
    protected string $folderName = 'contacts';
    public function store(Request $request){
        $request->validate([
            'title'  => 'required|max:255',
            'link'   => 'required|max:255',
            'image'  => 'required|max:2048|image|mimes:jpeg,png,jpg'
        ]);

        if($request->hasFile('image')){
            $image = FileUploadHelper::upload($request->file('image'), $this->folderName);
            
            Contact::create([
                'title' => $request['title'],
                'link'  => $request['link'],
                'image_url' => $image
            ]);
        }

        return redirect()->back()->with(['success' => "Record created successfully"]);
    }

    public function destroy($id){

        $record = Contact::findOrFail($id);
      
        if(!FileUploadHelper::delete($record->image_url)){
            return redirect()->back()->withErrors(['failed' => 'Contact image url failed to remove']);
        }
        $record->delete();
        return redirect()->back()->with(['success' => "Contact deleted successfully"]);
    }
    
}
