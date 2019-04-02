@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Edit student</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-10">
                            @include('backend.layouts.message')
                            <form action="{{route('edit-student-action')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="criteria" value="{{$studentData->id}}">
                                <div class="form-group form-group-sm">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{$studentData->first_name}}" class="form-control" id="first_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('first_name')}}</a>
                                </div>
                                <div class="col-md-12 form-group form-group-sm">
                                    <div class=" col-md-6">
                                        <label for="contact">Phone</label>
                                        <input type="text" name="contact" value="{{$studentData->contact}}" class="form-control" id="contact">
                                        <a href="" style="color: #d23430;">{{$errors->first('contact')}}</a>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="roll_no">Roll no.</label>
                                        <input type="text" name="roll_no" value="{{$studentData->roll_no}}" class="form-control" id="roll_no">
                                        <a href="" style="color: #d23430;">{{$errors->first('roll_no')}}</a>
                                    </div>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="upload">Profile picture</label>
                                    <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                    <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Update student info</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <img src="{{url('lib/uploads/classes/classOne/'.$studentData->image)}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 130px; width: 130px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 30px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>



@stop