@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Info</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-10">
                            <form action="{{route('edit-user-action')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="criteria" value="{{$userData->id}}">
                                <div class="form-group form-group-sm">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$userData->name}}" class="form-control" id="name">
                                    <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="{{$userData->username}}" class="form-control" id="username">
                                    <a href="" style="color: #d23430;">{{$errors->first('username')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{$userData->email}}" class="form-control" id="email">
                                    <a href="" style="color: #d23430;">{{$errors->first('email')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="upload">Profile picture</label>
                                    <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                    <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Save Info</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <img src="{{url('lib/uploads/users/'.$userData->image)}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 150px; width: 155px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 30px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
@stop