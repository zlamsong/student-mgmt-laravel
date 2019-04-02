@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <figure class="probootstrap-media"><img src="{{url('svg/subject.jpeg')}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left; margin-right: 10px; margin-left: 5px; border-radius: 50%;"></figure>
                                <h1>{{strtoupper($singleSubjectData->subject)}}</h1>
                            </div>
                        </div>
                    </div>



                    <div class="probootstrap-text probootstrap-animate">


                        <div class="col-md-12 mx-auto probootstrap-animate">
                            <div class="probootstrap-featured-news-box">
                                <div class="probootstrap-text" >
                                    <b>Subject Description :</b><br>
                                    <p>{{$singleSubjectData->desc}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop