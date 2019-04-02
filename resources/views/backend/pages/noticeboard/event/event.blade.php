@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Add Event</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-10">
                            @include('backend.layouts.message')
                            <form action="{{route('add-program')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-group-sm">
                                    <label for="title">Event Title</label>
                                    <input type="text" name="title"  placeholder="event title" class="form-control" id="title">
                                    <a href="" style="color: #d23430;">{{$errors->first('title')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="date">Event Date</label>
                                    <input type="text" name="date" class="form-control" id="datepicker"/>
                                    <a href="" style="color: #d23430;">{{$errors->first('date')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="name">Place</label>
                                    <input type="text" name="place"  placeholder="event place" class="form-control" id="place">
                                    <a href="" style="color: #d23430;">{{$errors->first('place')}}</a>
                                </div>
                                <div class="form-group form-group-xs">
                                    <label for="about">description</label>
                                    <textarea type="paragraph_text" name="description" placeholder="event description here...." class="form-control" id="article-ckeditor"></textarea>
                                    <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12 bg-dark">
                        <br>

                        @include('backend.layouts.message')
                        @if(count($eventData) > 0)
                        @foreach($eventData as $event)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i>Written on: {{$event->created_at}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('delete-program').'/'.$event->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <mark class="badge-pill">({{($event->title)}})</mark><br>
                                            <small><text class="badge-pill">On : {{($event->date)}}</text></small>|
                                            <small><text class="badge-pill">Place : {{($event->place)}}</text></small>
                                            <p>{{$event->desc}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$eventData->links()}}
                        @else
                            <p>No events found</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>



@stop