@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Add Teacher</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-10">
                            @include('backend.layouts.message')
                            <form action="{{route('add-teacher')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-group-sm">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="teacher's first name" class="form-control" id="first_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('first_name')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="name">Last Name</label>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="teacher's last name" class="form-control" id="last_name">
                                    <a href="" style="color: #d23430;">{{$errors->first('last_name')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="class">Class teacher of</label>
                                    <select name="class" class="form-control" id="class">
                                        <option value="1">class-1</option>
                                        <option value="2">class-2</option>
                                        <option value="3">class-3</option>
                                        <option value="4">class-4</option>
                                        <option value="5">class-5</option>
                                        <option value="6">class-6</option>
                                        <option value="7">class-7</option>
                                        <option value="8">class-8</option>
                                        <option value="9">class-9</option>
                                        <option value="10">class-10</option>
                                    </select>
                                    <a href="" style="color: #d23430;">{{$errors->first('class')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="upload">Profile picture</label>
                                    <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                    <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="document">Document(Bio-data)</label>
                                    <input type="file" name="document" class="btn btn-default btn-sm" id="document">
                                    <a href="" style="color: #d23430;">{{$errors->first('document')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Add teacher</button>
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