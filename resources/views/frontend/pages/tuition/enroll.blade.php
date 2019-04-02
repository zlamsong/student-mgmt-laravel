@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>Enroll Form</h1>
                            </div>
                        </div>
                    </div>



                    <div class="probootstrap-text probootstrap-animate">


                        <div class="col-md-12 mx-auto probootstrap-animate">
                            <div class="probootstrap-featured-news-box">
                                <div class="probootstrap-text" >
                                    <div class="text">
                                        <br>
                                        <p>Reserve your seat using the form below</p>
                                        <form action="{{route('add-enroll')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">
                                                <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="class">Class</label>
                                                <input type="text" class="form-control" value="{{$enrollData->class}}" id="class" name="class" readonly="readonly">
                                                <a href="" style="color: #d23430;">{{$errors->first('class')}}</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="roll_no">Roll no.</label>
                                                <input type="text" class="form-control" value="{{old('roll_no')}}" id="roll_no" name="roll_no">
                                                <a href="" style="color: #d23430;">{{$errors->first('roll_no')}}</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" value="{{old('email')}}" placeholder="( Student's email or Parent's email )" id="email" name="email">
                                                <a href="" style="color: #d23430;">{{$errors->first('email')}}</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" value="{{$enrollData->subject}}" id="subject" name="subject" readonly="readonly">
                                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg">Submit</button>
                                                {{--<input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Send Message">--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@stop