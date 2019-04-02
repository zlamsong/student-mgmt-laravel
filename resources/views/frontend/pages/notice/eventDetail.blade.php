@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>School Event</h1>
                            </div>
                        </div>
                    </div>



                    <div class="probootstrap-text probootstrap-animate">


                                <div class="col-md-12 mx-auto probootstrap-animate">
                                    <div class="probootstrap-featured-news-box">
                                        <div class="probootstrap-text" >
                                            <b>{{strtoupper($singleEventData->title)}}</b>
                                            <span class="probootstrap-date"><i class="icon-calendar"></i> <b>{{$singleEventData->date}}</b></span>
                                            <span class="probootstrap-location"><i class="icon-location2"></i><b>{{$singleEventData->place}}</b></span>
                                            <hr>
                                            <p>{{$singleEventData->desc}}</p>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop