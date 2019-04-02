@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Notice Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('add-notice')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group form-group-sm">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject"  placeholder="notice subject" class="form-control" id="subject">
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="description">Description</label>
                                <textarea type="paragraph_text" name="description" placeholder="description here...." class="form-control" id="summary-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Publish</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><mark>Notice preview</mark></h1>
                            </div>
                        </div>
                        <br>
                        @include('backend.layouts.message')
                        @foreach($noticeData as $key => $notice)
                            <div class="list-group-item breadcrumb bg-danger">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i style="color: white">Published on: {{$notice->created_at->toDayDateTimeString()}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('edit-notice').'/'.$notice->id}}" class="btn btn-outline-light btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{route('delete-notice').'/'.$notice->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-light btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <b><h4 style="color: white">{{($notice->subject)}}</h4></b>
                                            <br>
                                            <p style="color: white">{{$notice->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$noticeData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop