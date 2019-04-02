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
                        <form action="{{route('add-user-student')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-group-sm">
                                <label for="time">username</label>
                                <input type="text" name="username"  placeholder="username" class="form-control" id="username">
                                <a href="" style="color: #d23430;">{{$errors->first('username')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="first_date">email</label>
                                <input type="text" name="email" placeholder="" class="form-control" id="email"/>
                                <a href="" style="color: #d23430;">{{$errors->first('email')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="second_date">password</label>
                                <input type="text" name="password" placeholder="" class="form-control" id="password"/>
                                <a href="" style="color: #d23430;">{{$errors->first('password')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="second_date">confirm password</label>
                                <input type="text" name="password_confirmation" placeholder="" class="form-control" id="password_confirmation"/>
                                <a href="" style="color: #d23430;">{{$errors->first('password')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop