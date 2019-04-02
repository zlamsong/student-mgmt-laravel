@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Head Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('add-head')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-group-sm">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="first name" class="form-control" id="first_name">
                                <a href="" style="color: #d23430;">{{$errors->first('first_name')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="name">Last Name</label>
                                <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="last name" class="form-control" id="last_name">
                                <a href="" style="color: #d23430;">{{$errors->first('last_name')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="position">Position</label>
                                <select name="position" class="form-control" id="position">
                                    <option value="principal">principal</option>
                                    <option value="vicePrincipal">vice-principal</option>
                                    <option value="dean">dean</option>
                                </select>
                                <a href="" style="color: #d23430;">{{$errors->first('position')}}</a>
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
                                <button class="btn btn-success">Add new head</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">
                        <br>

                        @include('backend.layouts.message')
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Document</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($headData as $key=>$head)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$head->first_name}}</td>
                                        <td>{{$head->last_name}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                            {{$head->position}}
                                            </span>
                                        </td>
                                        <td>
                                            <img src="{{url('lib/uploads/heads/images/'.$head->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                        </td>
                                        <td>

                                            <form action="{{route('download')}}" method="get">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$head->id}}">
                                                @if($head->document)
                                                    <button class="btn-outline-success btn-sm" name="active">
                                                        <i class="fa fa-download"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            {{$head->created_at}}
                                        </td>
                                        <td>
                                            {{$head->updated_at}}
                                        </td>

                                        <td>
                                            <a href="{{route('edit-head').'/'.$head->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{route('delete-head').'/'.$head->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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
    </div>



@stop