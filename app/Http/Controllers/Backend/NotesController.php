<?php

namespace App\Http\Controllers\Backend;

use App\Models\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class NotesController extends BackendController
{
    public function noteIndex(){
        return view($this->_pagepath.'notes.addNotes', $this->data);
    }

    public function addNote(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required|unique:notes,note_title',
                'class'=>'required',
                'subject'=>'required',
                'upload' => 'required|max:10000|mimes:doc,pdf,docx,zip',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $noteObject = new Note();
            $noteObject->note_title = $request->title;
            $noteObject->class = $request->class;
            $noteObject->subject = $request->subject;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $fileName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/notes/');

                if (!$file->move($UploadPath, $fileName)) return redirect()->back();
                $noteObject->file = $fileName;
            }
            if ($noteObject->save()){
                return redirect()->route('show-note')->with('success','Note has been successfully uploaded.');
            }
        }
    }


    public function getDownload(Request $request){
        if($request->isMethod('get')){
            $criteria = $request-> criteria;
            $noteObject = Note::findOrFail($criteria);
            $filename = $noteObject->file;
            $file=  public_path('lib/uploads/notes/'.$filename);
            if (file_exists($file)){
                return response()->download($file);
            }else{
                exit('Requested file does not exist on our server!');
                //redirect to the other page to display not found
                // message if you want
            }
        }
    }

    public function showNote(){
        $this->data('noteData', Note::orderBy('class', 'DESC')->get());
        $this->data('total', Note::count('id'));
        return view($this->_pagepath.'.notes.showNotes', $this->data);
    }

    public function deleteWithFile($criteria)
    {
        $id = $criteria;
        $findData = Note::findOrFail($id);
        $fileName = $findData->file;
        $deletePath = public_path('lib/uploads/notes/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteNote(Request $request)
    {
        $id = $request->id;
        DB::table('notes')->where('note_title', '=', $id)->delete();
        $findData = Note::findOrFail($id);
        if ($this->deleteWithFile($id) && $findData->delete()) {
            return redirect()->route('show-note')->with('success', 'Note has been successfully removed');
        }

    }

}
