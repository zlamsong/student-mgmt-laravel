@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

            <section class="probootstrap-section probootstrap-section-colored">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left section-heading probootstrap-animate">
                            <h1>Our Students</h1>
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
                                    <div class="text-uppercase probootstrap-uppercase">Featured Events</div>
                                    <h3>Students Math Competition for The Year 2017</h3>
                                    <p>Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi </p>
                                    <p>
                                        <span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
                                        <span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
                                    </p>
                                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                                </div>
                                <div class="probootstrap-image probootstrap-animate" style="background-image: url(img/slider_4.jpg)">
                                    <a href="https://vimeo.com/45830194" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="probootstrap-cta">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">CLASSES</h2>
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
                                    <p>Students | <b>{{$one}}</b></p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="{{route('one')}}">view class</a></li>
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
                                    <p>Students | <b>{{$two}}</b></p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="{{route('two')}}">view class</a></li>
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
                                    <p>Students | <b>{{$three}}</b></p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="{{route('three')}}">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
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
                                    <p>Students |</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#">view class</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>

@stop