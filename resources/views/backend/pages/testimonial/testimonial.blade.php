@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>About Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <form action="{{route('add-testimonial')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group form-group-xs">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="name" class="form-control" id="name">
                                <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="upload">Image</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="date">Batch(Year)</label>
                                <input name="date" class="form-control" id="datepicker">
                                <a href="" style="color: #d23430;">{{$errors->first('date')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="testimonial_content">Content</label>
                                <textarea type="paragraph_text" name="testimonial_content" placeholder="testimonial content...." class="form-control" id="testimonial_content"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('testimonial_content')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <img src="{{url('svg/noimage.jpg')}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 130px; width: 130px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 30px;">
                    </div>

                    <div class="col-md-12 bg-dark">
                        <br>

                        @include('backend.layouts.message')
                        @foreach($testimonialData as $key => $testimonial)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{url('lib/uploads/testimonial/images/'.$testimonial->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;"><br>
                                            <small><i>{{$testimonial->from}} | Batch : {{$testimonial->class}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('delete-testimonial').'/'.$testimonial->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <p>{{$testimonial->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$testimonialData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop