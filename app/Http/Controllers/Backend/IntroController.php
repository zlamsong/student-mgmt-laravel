<?php

namespace App\Http\Controllers\Backend;
use App\Models\About;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class IntroController extends BackendController
{

    public function index(){
        $this->data('portfolioData', Portfolio::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'intro.portfolio.portfolioAction', $this->data);
    }
    public function portfolio(){
        return view($this->_pagepath.'intro.portfolio.addPortfolio', $this->data);
    }

    public function addPortfolio(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'title' => 'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'description' => 'required|min:5|max:200|',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $portfolioObject = new Portfolio();
            $portfolioObject->title = $request->title;
            $portfolioObject->description = $request->description;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/intro/portfolio/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $portfolioObject->image = $imageName;
            }
            if ($portfolioObject->save()){
                return redirect()->route('portfolioIndex')->with('success','New portfolio has been successfully added.');
            }
            else{
                return redirect()->route('portfolio')->with('error','Sorry photo has failed to upload.');
            }
        }
    }

    public function deleteWithFiles($criteria)
    {
        $id = $criteria;
        $findData = Portfolio::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/intro/portfolio/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deletePortfolio(Request $request)
    {
        $id = $request->id;
        DB::table('portfolios')->where('title', '=', $id)->delete();
        $findData = Portfolio::findOrFail($id);
        if ($this->deleteWithFiles($id) && $findData->delete()) {
            return redirect()->route('portfolioIndex')->with('success', 'portfolio has been successfully deleted');
        }

    }

    public function editPortfolio(Request $request)
    {
        $id = $request->id;
        $findData = Portfolio::findOrFail($id);
        $this->data('portfolioData', $findData);
        return view($this->_pagepath . 'intro.portfolio.editPortfolio', $this->data);

    }
    public function editPortfolioAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'title' => 'required',
                'upload' => 'mimes:jpeg,png,gif,jpg',
                'description' => 'required|min:5|max:200|',
            ]);
            $portfolio = Portfolio::findOrFail($criteria);
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/intro/portfolio/');

                if ($this->deleteWithFiles($criteria) && $file->move($UploadPath, $imageName)) {
                    $portfolio->image = $imageName;
                }
            }

            if ($portfolio->update()) {
                return redirect()->route('portfolioIndex')->with('success', 'Portfolio has successfully been updated');
            }
        }
    }

    public function about(){
        $this->data('aboutData', About::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'intro.about.about', $this->data);
    }

    public function addAbout(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'about' => 'required|min:5|max:1000|unique:abouts,about',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $aboutObject = new About();
            $aboutObject->about = $request->about;
            if ($aboutObject->save()){

//                Mail::to('zlamsong22@gmail.com')->send(new test());

                return redirect()->route('about')->with('success','About statement has been successfully added.');
            }
        }
    }

    public function deleteAbout($criteria){
        $id = $criteria;
        if (DB::table('abouts')->where('id','=', $id)->delete()){
            return redirect()->route('about')->with('success', 'statement has been successfully deleted');
        }


    }

    public function service(){
        $this->data('serviceData', Service::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'intro.service.service', $this->data);
    }

    public function addService(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'about' => 'required|min:5|max:1000|unique:services,about',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $serviceObject = new Service();
            $serviceObject->about = $request->about;
            if ($serviceObject->save()){

//                Mail::to('zlamsong22@gmail.com')->send(new test());

                return redirect()->route('service')->with('success','Service statement has been successfully added.');
            }
        }
    }

    public function deleteService($criteria){
        $id = $criteria;
        if (DB::table('services')->where('id','=', $id)->delete()){
            return redirect()->route('service')->with('success', 'statement has been successfully deleted');
        }


    }

    public function contact(){
        $this->data('contactData', Contact::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'intro.contact.contact', $this->data);
    }

    public function addContact(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'about' => 'required|min:5|max:1000|unique:contacts,about',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $contactObject = new Contact();
            $contactObject->about = $request->about;
            if ($contactObject->save()){

//                Mail::to('zlamsong22@gmail.com')->send(new test());

                return redirect()->route('contact')->with('success','Contact has been successfully added.');
            }
        }
    }

    public function deleteContact($criteria){
        $id = $criteria;
        if (DB::table('contacts')->where('id','=', $id)->delete()){
            return redirect()->route('contact')->with('success', 'Contact has been successfully deleted');
        }
    }

    public function feedback(){
        $this->data('feedbackData', Message::orderBy('id', 'DESC')->paginate(3));
        $this->data('totalData', Message::count('id', 'DESC'));
        return view($this->_pagepath.'intro.feedback.message', $this->data);
    }

    public function deleteFeedback($criteria){
        $id = $criteria;
        if (DB::table('messages')->where('id','=', $id)->delete()){
            return redirect()->route('feedback')->with('success', 'message has been successfully deleted');
        }
    }
}
