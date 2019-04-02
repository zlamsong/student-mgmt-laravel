@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">CLASSES / SUBJECTS</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/one.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$one}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-one-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/two.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$two}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-two-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block visible-xs-block"></div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/three.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$three}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-three-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/four.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$four}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-four-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/five.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$five}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-five-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/six.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$six}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-six-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block visible-xs-block"></div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/seven.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$seven}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-seven-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/eight.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$eight}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-eight-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/nine.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$nine}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-nine-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-teacher text-center probootstrap-animate">
                            <figure class="media">
                                <img src="{{url('svg/ten.png')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                            </figure>
                            <div class="text">
                                <h3>CLASS</h3>
                                <p>Subjects | <b>{{$ten}}</b></p>
                                <ul class="probootstrap-footer-social">
                                    <li class="twitter"><a href="{{route('class-ten-subjects')}}">view subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

@stop