@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">
        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>class : FOUR | Subjects : {{$total}}</h1>
                            </div>
                        </div>
                    </div>



                    <div class="probootstrap-text probootstrap-animate">
                        @if(count($fourData) > 0)
                            @foreach($fourData as $four)

                                <div class="col-md-12 mx-auto probootstrap-animate">
                                    <div class="probootstrap-featured-news-box">
                                        <div class="probootstrap-text" >
                                            <figure class="probootstrap-media"><img src="{{url('svg/subject.jpeg')}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left; margin-right: 10px; margin-left: 5px; border-radius: 50%;"></figure>
                                            <h3><b>{{strtoupper($four->subject)}}</b></h3>
                                            <hr>
                                            <p>{{str_limit($four->desc, 270)}}</p>
                                            <a href="{{route('subject-four-read-more').'/'.$four->id}}" class="btn btn-info btn-sm">Read more..</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h1><span class="probootstrap-meta"><i class="icon-sad"></i></span></h1><br>
                                <h2>No Subjects Found</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop