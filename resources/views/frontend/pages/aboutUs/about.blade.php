@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">
        <div class="row breadcrumbs">

            <section class="probootstrap-section">
                <div class="container">
                    <div class="probootstrap-section probootstrap-section-colored">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-left section-heading probootstrap-animate">
                                    <h1>About The School</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mx-auto probootstrap-animate">
                            <div class="probootstrap-featured-news-box">
                                <div class="probootstrap-text" >
                                    <div class="text-uppercase probootstrap-uppercase">History</div>
                                    <h3>Take A Look at How We Begin</h3>
                                    @foreach($historyData as $history)
                                        <p>{{$history->desc}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="probootstrap-section">
                <div class="container">

                    <div class="col-md-6">
                        <p>
                            <img src="{{url('svg/schoolAbout.jpg')}}" alt="Free Bootstrap Template by uicookes.com" class="img-responsive">
                        </p>
                    </div>
                    <div class="col-md-6 col-md-push-1">
                        <h2>We are NYC based School focused on excellence.</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
                        <p>Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
                    </div>


                </div>
            </section>


            <section class="probootstrap-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                            <h2>Why Choose Our School</h2>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($whyData as $why)
                                <div class="service left-icon probootstrap-animate">
                                    <div class="icon"><i class="icon-checkmark"></i></div>
                                    <div class="text">
                                        <h3>{{$why->topic}}</h3>
                                        <p>{{$why->desc}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- END row -->
                </div>
            </section>

        </div>
    </div>

@stop