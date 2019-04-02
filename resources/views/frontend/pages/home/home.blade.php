@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">
        @include('frontend.layouts.message')
        <section class="flexslider">
            <ul class="slides">
                <li style="background-image: url({{url('svg/three.jpg')}})" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center">
                                    <h1 class="probootstrap-heading probootstrap-animate">Your Bright Future is Our Mission</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{url('svg/one.jpg')}})" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center">
                                    <h1 class="probootstrap-heading probootstrap-animate">Education is Life</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
                <li style="background-image: url({{url('svg/two.jpg')}})" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="probootstrap-slider-text text-center">
                                    <h1 class="probootstrap-heading probootstrap-animate">Helping Each of Our Students Fulfill the Potential</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <section class="probootstrap-section probootstrap-section-colored">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left section-heading probootstrap-animate">
                        <h2>Welcome to School of Excellence</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-flex-block">
                            <div class="probootstrap-text probootstrap-animate">
                                <h3>About The School</h3>
                                @foreach($aboutData as $key => $about)
                                    <p>{{$about->about}}</p>
                                @endforeach
                                <p><a href="{{route('about-us')}}" class="btn btn-primary">Learn More</a></p>
                            </div>
                            <div class="probootstrap-image probootstrap-animate" style="background-image: url({{url('svg/two.jpg')}})">
                                <a href="https://www.youtube.com/watch?v=ZndThjI_NIg" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section" id="probootstrap-counter">
            <div class="container">

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                        <div class="probootstrap-counter-wrap">
                            <div class="probootstrap-icon">
                                <i class="icon-users2"></i>
                            </div>
                            <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="20203" data-speed="5000" data-refresh-interval="50">1</span>
                  </span>
                                <span class="probootstrap-counter-label">Students Enrolled</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                        <div class="probootstrap-counter-wrap">
                            <div class="probootstrap-icon">
                                <i class="icon-user-tie"></i>
                            </div>
                            <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="{{$totalTeacher}}" data-speed="5000" data-refresh-interval="50">1</span>
                  </span>
                                <span class="probootstrap-counter-label">Certified Teachers</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block visible-xs-block"></div>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                        <div class="probootstrap-counter-wrap">
                            <div class="probootstrap-icon">
                                <i class="icon-library"></i>
                            </div>
                            <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="99" data-speed="5000" data-refresh-interval="50">1</span>%
                  </span>
                                <span class="probootstrap-counter-label">SEE Passing Rate</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">

                        <div class="probootstrap-counter-wrap">
                            <div class="probootstrap-icon">
                                <i class="icon-smile2"></i>
                            </div>
                            <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="100" data-speed="5000" data-refresh-interval="50">1</span>%
                  </span>
                                <span class="probootstrap-counter-label">Parents Satisfaction</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{url('svg/book.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center section-heading probootstrap-animate">
                        <h2 class="mb0">Highlights</h2>
                    </div>
                </div>
            </div>
            <div class="probootstrap-tab-style-1">
                <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
                    <li class="active"><a data-toggle="tab" href="#featured-news">Featured News</a></li>
                    <li><a data-toggle="tab" href="#upcoming-events">Upcoming Events</a></li>
                </ul>
            </div>
        </section>

        <section class="probootstrap-section probootstrap-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="tab-content">

                            <div id="featured-news" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="owl-carousel" id="owl1">
                                            <div class="item">
                                                <a href="#" class="probootstrap-featured-news-box">
                                                    <figure class="probootstrap-media"><img src="img/img_sm_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                                                    <div class="probootstrap-text">
                                                        <h3>Tempora consectetur unde nisi</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, ut.</p>
                                                        <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END row -->
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p><a href="#" class="btn btn-primary">View all news</a></p>
                                    </div>
                                </div>
                            </div>
                            <div id="upcoming-events" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="owl-carousel" id="owl2">
                                            @if(count($eventData) > 0)
                                                @foreach($eventData as $event)
                                                <div class="probootstrap-featured-news-box">
                                                    <div class="probootstrap-text">
                                                        <br>
                                                        <figure class="probootstrap-media"><img src="{{url('svg/event.png')}}" class="g-header__profile-photo rounded-circle" style="height: 30px; width: 30px; margin-left: 110px; border-radius: 50%;"></figure>
                                                        <br>
                                                        <h3>
                                                            <div class="text-center">
                                                                <b>{{strtoupper($event->title)}}</b>
                                                            </div>
                                                       </h3><hr>
                                                        <span class="probootstrap-date"><i class="icon-calendar"></i> <b>{{$event->date}}</b></span>
                                                        <span class="probootstrap-location"><i class="icon-location2"></i><b>{{$event->place}}</b></span>
                                                    </div>
                                                    <div class="text-center">
                                                        <p><a href="{{route('read-more').'/'.$event->id}}" class="btn btn-info">Read more..</a></p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="text-center">
                                                    <h1><span class="probootstrap-meta"><i class="icon-sad"></i></span></h1><br>
                                                    <h2>There Are No Any Events Recently</h2>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p><a href="{{route('events')}}" class="btn btn-primary">View events & notices</a></p>
                                    </div>
                                </div>
                            </div>


                            <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                                            <h2>Our Tuition Courses</h2>
                                            <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
                                        </div>
                                    </div>
                                    <!-- END row -->

                                    <div class="row">
                                        @if(count($tuitionData) > 0)
                                            @foreach($tuitionData as $tuition)
                                                <div class="col-md-6">
                                                    <div class="probootstrap-service-2 probootstrap-animate">
                                                        <div class="image">
                                                            <div class="image-bg">
                                                                <img src="{{url('lib/uploads/tuition/images/'.$tuition->image)}}" alt="Free Bootstrap Template by uicookies.com">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <span class="probootstrap-meta"><i class="icon-calendar2"></i>{{$tuition->from}} - {{$tuition->to}}</span><br>
                                                            <text>Class : {{$tuition->class}} | {{$tuition->time}}</text>
                                                            <h3>{{$tuition->subject}}</h3>
                                                            <p>({{str_limit($tuition->desc, 100)}}</p>
                                                            <p><a href="{{route('tuition-detail').'/'.$tuition->id}}" class="btn btn-info">view</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-center">
                                                <h1><span class="probootstrap-meta"><i class="icon-sad"></i></span></h1><br>
                                                <h2>No Tuition Course Available</h2>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url(img/slider_4.jpg);">
            <div class="container">
                    <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                        <h2>Alumni Testimonial</h2>
                    </div>
                <!-- END row -->
                <div class="row">
                    <div class="col-md-12 probootstrap-animate">
                        <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                            @if(count($testimonialData) > 0)
                                @foreach($testimonialData as $testimonial)
                            <div class="item">

                                <div class="probootstrap-testimony-wrap text-center">
                                    <figure>
                                        <img src="{{url('lib/uploads/testimonial/images/'.$testimonial->image)}}" alt="Free Bootstrap Template by uicookies.com">
                                    </figure>
                                    <blockquote class="quote"> {{$testimonial->content}} <cite class="author"> &mdash; <span>{{$testimonial->from}} | Batch {{$testimonial->class}}</span></cite></blockquote>
                                </div>


                            </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    <h1><span class="probootstrap-meta"><i class="icon-sad"></i></span></h1><br>
                                    <h2>No Testimonial On Our Database</h2>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- END row -->
            </div>
        </section>
    </div>

@stop