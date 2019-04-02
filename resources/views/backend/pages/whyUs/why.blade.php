@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Why Us?</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('add-why-us')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group form-group-xs">
                                <label for="topic">Topic</label>
                                <input type="text" name="topic" placeholder="statement" class="form-control" id="topic">
                                <a href="" style="color: #d23430;">{{$errors->first('topic')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="description">description</label>
                                <textarea type="paragraph_text" name="description" placeholder="statement description...." class="form-control" id="article-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add 'why us?'</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 bg-dark">
                        <br>

                        @include('backend.layouts.message')
                        @foreach($whyData as $why)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i>Written on: {{$why->created_at}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('delete-why-us').'/'.$why->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <b>{{$why->topic}}</b>
                                            <br>
                                            <p>{{$why->desc}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$whyData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop