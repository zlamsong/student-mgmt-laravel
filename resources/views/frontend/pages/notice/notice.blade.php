@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>School Events</h1>
                            </div>
                       </div>
                    </div>



                    <div class="probootstrap-text probootstrap-animate">
                        @if(count($eventData) > 0)
                            @foreach($eventData as $event)

                                <div class="col-md-12 mx-auto probootstrap-animate">
                                    <div class="probootstrap-featured-news-box">
                                        <div class="probootstrap-text" >
                                            <figure class="probootstrap-media"><img src="{{url('svg/event.png')}}" class="g-header__profile-photo rounded-circle" style="height: 30px; width: 30px; float: left; margin-right: 10px; margin-left: 5px; border-radius: 50%;"></figure>
                                            <h3><b>{{strtoupper($event->title)}}</b></h3><br>
                                            <span class="probootstrap-date"><i class="icon-calendar"></i> <b>{{$event->date}}</b></span>
                                            <span class="probootstrap-location"><i class="icon-location2"></i><b>{{$event->place}}</b></span>
                                            <hr>
                                            <p>{{str_limit($event->desc, 300)}}</p>
                                            <a href="{{route('read-more').'/'.$event->id}}" class="btn btn-info btn-sm">Read more..</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No events recently</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <br>



        <section class="probootstrap-section">
                <div class="container">
                    <div class="probootstrap-section probootstrap-section-colored">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-left section-heading probootstrap-animate">
                                    <h1>Notice Board</h1>
                                </div>
                            </div>
                        </div>
                        @if(count($noticeData) > 0)
                            @foreach($noticeData as $notice)

                                <div class="col-md-12 mx-auto probootstrap-animate">
                                    <div class="probootstrap-featured-news-box">
                                        <div class="probootstrap-text" >
                                            <figure class="probootstrap-media"><img src="{{url('svg/notice.png')}}" class="g-header__profile-photo rounded-circle" style="height: 30px; width: 30px; float: left; margin-right: 10px; margin-left: 5px; border-radius: 50%;"></figure>
                                           <h3><b>{{strtoupper($notice->subject)}}</b></h3>
                                            <text><b>Published on | {{$notice->created_at->toDayDateTimeString()}}</b></text>
                                            <p>{{str_limit($notice->description, 300)}}</p>
                                            <a href="{{route('view-more').'/'.$event->id}}" class="btn btn-info btn-sm">Read more..</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No notices found</p>
                        @endif
                    </div>


                    {{--<div class="row">--}}
                        {{--@if(count($noticeData) > 0)--}}
                            {{--@foreach($noticeData as $notice)--}}

                                {{--<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">--}}
                                    {{--<a href="" class="probootstrap-featured-news-box">--}}
                                        {{--<figure class="probootstrap-media"><img src="{{url('svg/notice.png')}}" style="width: 50%" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>--}}
                                        {{--<div class="probootstrap-text"  data-toggle="modal" data-target="#exampleModal">--}}
                                            {{--<b>{{strtoupper($notice->subject)}}</b>--}}
                                            {{--<span class="probootstrap-date"><i class="icon-calendar"></i>{{$notice->created_at->toDayDateTimeString()}}</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                            {{--@endforeach--}}
                        {{--@else--}}
                            {{--<p>No notices found</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<!-- Modal -->--}}
                    {{--<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h5 class="modal-title" id="exampleModalLabel">{{$notice->subject}}</h5>--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">&times;</span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>{{$notice->description}}</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                </div>
            </section>

            {{--<!-- Button trigger modal -->--}}
            {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
                {{--Launch demo modal--}}
            {{--</button>--}}
        </div>

    </div>


@stop