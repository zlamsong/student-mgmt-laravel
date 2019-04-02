@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Tuition Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-8">
                        @include('backend.layouts.message')
                        <form action="{{route('add-tuition')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-group-sm">
                                <label for="subject">Subject</label>
                                <select name="subject" class="form-control" id="subject">
                                    <option value="c_math">Compulsory Math</option>
                                    <option value="science">Science</option>
                                    <option value="english">English</option>
                                    <option value="nepali">Nepali</option>
                                    <option value="social">Social Studies</option>
                                    <option value="computer">Computer Science</option>
                                    <option value="o_math">Optional Math</option>
                                    <option value="education">Education</option>
                                    <option value="economic">Economics</option>
                                </select>
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="class">Class</label>
                                <select name="class" class="form-control" id="class">
                                    <option value="one">1</option>
                                    <option value="two">2</option>
                                    <option value="three">3</option>
                                    <option value="four">4</option>
                                    <option value="five">5</option>
                                    <option value="six">6</option>
                                    <option value="seven">7</option>
                                    <option value="eight">8</option>
                                    <option value="nine">9</option>
                                    <option value="ten">10</option>
                                </select>
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="upload">Image</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="time">Time</label>
                                <input type="text" name="time"  placeholder="( T am/pm - T am/pm )" class="form-control" id="time">
                                <a href="" style="color: #d23430;">{{$errors->first('time')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="first_date">Tuition From</label>
                                <input type="text" name="first_date" placeholder="" class="form-control" id="datepicker"/>
                                <a href="" style="color: #d23430;">{{$errors->first('first_date')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="second_date">To</label>
                                <input type="text" name="second_date" placeholder="" class="form-control" id="datepickers"/>
                                <a href="" style="color: #d23430;">{{$errors->first('second_date')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="description">Tuition Description</label>
                                <textarea type="paragraph_text" name="description" placeholder="tuition description ...." class="form-control" id="article-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Publish</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{url('svg/image.jpg')}}" id="target_image" alt="" class="thumbnail" style="width: 100%;">
                    </div>

                    <div class="col-md-12 bg-dark">
                        <br>
                        <div class="header">
                            <text style="color: white">TUITION DETAIL PREVIEW</text>
                        </div>
                        <br>
                        {{$tuitionData->links()}}
                        <div class="col-md-12">
                            <br>
                            @if(count($tuitionData) > 0)
                                @foreach($tuitionData as $tuition)
                                    <div class="list-group-item">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <img style="width:100%" src="{{url('lib/uploads/tuition/images/'.$tuition->image)}}">
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <h3>{{$tuition->subject}} </h3>
                                                    <small><i>Published on {{$tuition->created_at->toDayDateTimeString()}}</i></small>
                                                    <br>
                                                    <text>Class : {{$tuition->class}} | From {{$tuition->from}} To {{$tuition->to}} | {{$tuition->time}}</text>

                                                    <div class="pull-right">
                                                        <a href="{{route('delete-tuition').'/'.$tuition->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                    <hr>
                                                    <p>{{$tuition->desc}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                                {{$tuitionData->links()}}
                            @else
                                <p>No tuition class found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop