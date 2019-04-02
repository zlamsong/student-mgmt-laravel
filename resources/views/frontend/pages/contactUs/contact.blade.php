@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        @include('frontend.layouts.message')

        <section class="probootstrap-section probootstrap-section-colored">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left section-heading probootstrap-animate">
                        <h1 class="mb0">Contact Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row probootstrap-gutter0">
                            <div class="col-md-4" id="probootstrap-sidebar">
                                <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                                    <h3>Pages</h3>
                                    <ul class="probootstrap-side-menu">

                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('subject')}}">Subjects</a></li>
                                        <li><a href="{{route('teachers')}}">Teachers</a></li>
                                        <li><a href="{{route('events')}}">Events</a></li>
                                        <li><a href="{{route('about-us')}}">About Us</a></li>
                                        <li class=""><a>Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                                <h2>Get In Touch</h2>
                                <p>Contact us using the form below.</p>
                                <form action="{{route('send-message')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">
                                        <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email">
                                        <a href="" style="color: #d23430;">{{$errors->first('email')}}</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" value="{{old('subject')}}" id="subject" name="subject">
                                        <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea cols="30" rows="10" class="form-control" value="{{old('message')}}" id="article-ckeditor" name="message"></textarea>
                                        <a href="" style="color: #d23430;">{{$errors->first('message')}}</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg">Send Message</button>
                                        {{--<input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Send Message">--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@stop