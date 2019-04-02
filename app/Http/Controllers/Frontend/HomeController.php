<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\ClassOne;
use App\Models\ClassThree;
use App\Models\ClassTwo;
use App\Models\Event;
use App\Models\Head;
use App\Models\History;
use App\Models\Message;
use App\Models\Note;
use App\Models\Notice;
use App\Models\Portfolio;
use App\Models\Student;
use App\Models\SubjectEight;
use App\Models\SubjectFive;
use App\Models\SubjectFour;
use App\Models\SubjectNine;
use App\Models\SubjectOne;
use App\Models\SubjectSeven;
use App\Models\SubjectSix;
use App\Models\SubjectTen;
use App\Models\SubjectThree;
use App\Models\SubjectTwo;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\Tuition;
use App\Models\Why;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\Enroll;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class HomeController extends FrontendController
{
    public function index()
    {
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        $this->data('totalTeacher', Teacher::count('id'));
        $this->data('eventData', Event::orderBy('id', 'DESC')->get());
        $this->data('tuitionData', Tuition::orderBy('id', 'DESC')->get());
        $this->data('testimonialData', Testimonial::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'home.home', $this->data);
    }

    public function portfolio()
    {
        $this->data('portfolioData', Portfolio::orderBy('id', 'DESC')->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'gallery.portfolio', $this->data);
    }

    public function teacher()
    {
        $this->data('teacherData', Teacher::orderBy('id', 'DESC')->get());
        $this->data('headData', Head::orderBy('id', 'DESC')->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'teacher.teacher', $this->data);
    }

    public function notice()
    {
        $this->data('noticeData', Notice::orderBy('id', 'DESC')->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        $this->data('eventData', Event::orderBy('id', 'DESC')->get());
//        $this->data('featureEventData', Event::PDO()->lastInsertId()); //gets last inserted event id
        return view($this->_pagepath . 'notice.notice', $this->data);
    }

    public function eventDetail(Request $request)
    {
        $creteria = $request->id;
        $singleEventData = Event::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'notice.eventDetail', compact('singleEventData'), $this->data);
    }

    public function noticeDetail(Request $request)
    {
        $creteria = $request->id;
        $singleNoticeData = Notice::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'notice.noticeDetail', compact('singleNoticeData'), $this->data);
    }

    public function notes()
    {
        $this->data('noteData', Note::orderBy('id', 'DESC')->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'notes.notes', $this->data);
    }

    public function notesDownload(Request $request)
    {
        if ($request->isMethod('get')) {
            $criteria = $request->id;
            $noteObject = Note::findOrFail($criteria);
            $filename = $noteObject->file;
            $file = public_path('lib/uploads/notes/' . $filename);
            if (file_exists($file)) {
                return response()->download($file);
            } else {
                exit('Requested file does not exist on our server!');
                //redirect to the other page to display not found
                // message if you want
            }
        }
    }

    public function students()
    {
        $this->data('one', ClassOne::count('id', 'DESC'));
        $this->data('two', ClassTwo::count('id', 'DESC'));
        $this->data('three', ClassThree::count('id', 'DESC'));
        $this->data('noticeData', Notice::orderBy('id', 'DESC')->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'student.allStudent', $this->data);
    }

    public function contactUs()
    {
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'contactUs.contact', $this->data);
    }

    public function addMessage(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required|min:5|max:50',
                'message' => 'required|required|min:5|max:5000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $messageObject = new Message();
            $messageObject->name = $request->name;
            $messageObject->email = $request->email;
            $messageObject->subject = $request->subject;
            $messageObject->message = $request->message;

            if ($messageObject->save()) {
//                Mail::to($request->email)->send(new Enroll());


                $basic = new \Nexmo\Client\Credentials\Basic('96f2bdf1', 'ilOrcYTL7JEvhXvK');
                $client = new \Nexmo\Client($basic);

                $message = $client->message()->send([
                    'to' => '9779803175206',
                    'from' => 'Student Management',
                    'text' => 'Hello! you have got one message from system user. Please check the message in dashboard'
                ]);


//                $data['name'] = 'admin';
//                Mail::send(['text'=>'test'], $data, function ($message){
//                  $message->to('zlamsong22@gmail.com', 'testing')->subject('testing mail');
//                  $message->from('zlamsong22@gmail.com', 'testing');
//                });
//                echo'success';
//                die;
                return redirect()->route('contact-us')->with('success', 'Your message has been successfully sent.');
            }

        }
    }

    public function aboutUs()
    {
        $this->data('historyData', History::orderBy('id', 'DESC')->get());
        $this->data('whyData', Why::orderBy('id', 'DESC')->get());

        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'aboutUs.about', $this->data);
    }

    public function subject()
    {
        $this->data('tuitionData', Tuition::orderBy('id', 'DESC')->get());
        $this->data('one', SubjectOne::count('id', 'DESC'));
        $this->data('two', SubjectTwo::count('id', 'DESC'));
        $this->data('three', SubjectThree::count('id', 'DESC'));
        $this->data('four', SubjectFour::count('id', 'DESC'));
        $this->data('five', SubjectFive::count('id', 'DESC'));
        $this->data('six', SubjectSix::count('id', 'DESC'));
        $this->data('seven', SubjectSeven::count('id', 'DESC'));
        $this->data('eight', SubjectEight::count('id', 'DESC'));
        $this->data('nine', SubjectNine::count('id', 'DESC'));
        $this->data('ten', SubjectTen::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        $this->data('tuitionData', Tuition::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.allSubject', $this->data);
    }

    public function searchData()
    {
        $data = $_GET['search_data'];


        $note = Note::where('subject', 'like', '%' . $data . '%')->get();


        foreach ($note as $key => $value) {

            $output = '';
            $output .= '<tr> <td>' . ++$key . '</td>
                        <td>  <span class="badge badge-pill badge-primary">' . $value['class'] . '</span></td>
                        <td>   <span class="badge badge-pill badge-info">' . $value['subject'] . '</span></td>
                        <td>' . $value['note_title'] . '</td>
                        <td>' . $value['created_at'] . '</td>
                        <td>' . $value['file'] . '</td>
                        <td>
                            <a href="'.route('note-download').'/'.$value['id'].'" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i> download</a>
                        </td>
                   </tr>';
        }
        echo $output;
    }

}
