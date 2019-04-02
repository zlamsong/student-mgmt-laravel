@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Teachers</mark></h1>
                            <div class="list-group-item bg-primary" style="color: white">
                                Total Messages : {{$totalData}}<br>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12 bg-dark">
                        <br>

                        @include('backend.layouts.message')
                        @foreach($feedbackData as $feedback)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i>Sent on: {{$feedback->created_at}}</i></small>
                                            <br>
                                            <small><i>From: {{$feedback->name}} | {{$feedback->email}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('delete-feedback').'/'.$feedback->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <small><mark class="badge-pill">(Subject | {{($feedback->subject)}})</mark></small>
                                            <p>{{$feedback->message}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$feedbackData->links()}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>



@stop