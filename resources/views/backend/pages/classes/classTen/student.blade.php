@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Class TEN</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-10">
                            @include('backend.layouts.message')
                            <form action="{{route('class-ten-add')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-group-sm">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="student's first name" class="form-control" id="first_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('first_name')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="name">Last Name</label>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="student's last name" class="form-control" id="last_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('last_name')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="username">Address</label>
                                    <input type="text" name="address" value="{{old('address')}}" placeholder="student's address" class="form-control" id="address">
                                    <a href="" style="color: #d23430;">{{$errors->first('address')}}</a>
                                </div>
                                <div class="col-md-12 form-group form-group-sm">
                                    <div class="col-md-6">
                                        <label for="email">Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                        </select>
                                        <a href="" style="color: #d23430;">{{$errors->first('gender')}}</a>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="date">DoB</label>
                                        <input type="text" name="DoB" placeholder="(Y-m-d)" class="form-control" id="DoB">
                                        <a href="" style="color: #d23430;">{{$errors->first('DoB')}}</a>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group form-group-sm">
                                    <div class=" col-md-6">
                                        <label for="contact">Phone</label>
                                        <input type="text" name="contact" placeholder="student's contact" class="form-control" id="contact">
                                        <a href="" style="color: #d23430;">{{$errors->first('contact')}}</a>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="roll_no">Roll no.</label>
                                        <input type="text" name="roll_no" placeholder="student's roll number" class="form-control" id="roll_no">
                                        <a href="" style="color: #d23430;">{{$errors->first('roll_no')}}</a>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="name">Parent's name</label>
                                    <input type="text" name="parent_name" placeholder="(parent's name1, parent's name2)" class="form-control" id="parent_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('parent_name')}}</a>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="upload">Profile picture</label>
                                    <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                    <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Add student</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <img src="{{url('svg/noimage.jpg')}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 130px; width: 130px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 30px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>



@stop