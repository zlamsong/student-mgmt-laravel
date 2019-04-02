<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use App\Models\Notice;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class NoticeboardController extends BackendController
{
    public function notice(){
        $this->data('noticeData', Notice::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'.noticeboard.notice.notice', $this->data);
    }

    public function addNotice(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:notices,subject',
                'description'=>'required',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            $noticeObject = new Notice();
            $noticeObject->subject = $request->subject;
            $noticeObject->description = $request->description;

            if ($noticeObject->save()){
                return redirect()->route('notice')->with('success','New notice has been successfully published.');
            }
        }
    }

    public function deleteNotice(Request $request)
    {
        $id = $request->id;
        DB::table('notices')->where('subject', '=', $id)->delete();
        $findData = Notice::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('notice')->with('success','notice has been successfully removed.');
        }
    }

    public function editNotice(Request $request){
        $id = $request->id;
        $findData = Notice::findOrFail($id);
        $this->data('noticeData', $findData);
        return view($this->_pagepath.'.noticeboard.notice.editNotice', $this->data);
    }

    public function editNoticeAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'subject' => 'required|', [
                    Rule::unique('notices', 'subject')->ignore($criteria)
                ],
                'description' => 'required',
            ]);
            $notice = Notice::findOrFail($criteria);
            $notice->subject = $request->subject;
            $notice->description = $request->description;

            if ($notice->update()) {
                return redirect()->route('notice')->with('success', 'Notice has been successfully updated');
            }
        }
    }

    public function program(){
        $this->data('eventData', Event::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'.noticeboard.event.event', $this->data);
    }

    public function addProgram(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'title'=>'required|min:5|max:500|unique:events,title',
                'date'=>'required',
                'place'=>'required',
                'description'=>'required|min:20|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            $eventObject = new Event();
            $eventObject->title = $request->title;
            $eventObject->date = $request->date;
            $eventObject->place = $request->place;
            $eventObject->desc = $request->description;

            if ($eventObject->save()){
                return redirect()->route('program')->with('success','Event has been successfully published.');
            }
        }
    }

    public function deleteProgram($criteria)
    {
        $id = $criteria;
        if (DB::table('events')->where('id','=', $id)->delete()){
            return redirect()->route('program')->with('success', 'Event has been successfully deleted');
        }

    }

}
