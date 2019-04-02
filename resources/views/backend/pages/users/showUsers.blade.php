@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Users</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @include('backend.layouts.message')
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Privilege Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adminsData as $key=>$admin)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>
                                        @foreach($admin->privilege as $pri)
                                            @if($pri->privilege_name == 'super-admin')
                                                <span class="badge badge-primary">
                                                {{$pri->privilege_name}}
                                            </span>
                                            @else
                                               <span class="badge badge-success">
                                                   {{$pri->privilege_name}}
                                               </span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{route('update-user-status')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="criteria" value="{{$admin->id}}">
                                            @if($admin->status==1)
                                                <button class="btn-outline-success btn-sm" name="active">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-outline-dark btn-sm" name="inactive">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <img src="{{url('lib/uploads/users/'.$admin->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                    </td>
                                    <td>
                                        <a href="{{route('editUser').'/'.$admin->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{route('deleteUser').'/'.$admin->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
@stop