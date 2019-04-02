@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Class NINE</mark></h1>
                            <div class="list-group-item bg-primary" style="color: white">
                                Total Students : {{$total}}<br>
                                @foreach($teacher as $teach)
                                    Class Teacher : {{$teach->first_name}} {{$teach->last_name}}
                                @endforeach
                                <div class="list-group-item pull-right bg-danger">
                                    <div class="card-body">
                                        <ul style="list-style-type:circle; color: white">
                                            <li>
                                                @foreach($first as $one)
                                                    class First : {{$one->first_name}} {{$one->last_name}}
                                                @endforeach
                                            </li>
                                            <li>
                                                @foreach($second as $two)
                                                    class Second : {{$two->first_name}} {{$two->last_name}}
                                                @endforeach
                                            </li>
                                            <li>
                                                @foreach($third as $three)
                                                    class Third : {{$three->first_name}} {{$three->last_name}}
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12">
                        <div class="form-group form-group-sm">
                            <a href="{{route('classNine')}}"> <button class="btn btn-success">Add student</button></a>
                        </div>

                        <br>
                        @include('backend.layouts.message')
                        <div class="col-md-12">

                            <!--data search bar-->
                            <div>
                                <form method="get">
                                    <input type="text" id="searchNine" class="form-control" placeholder="Search Student ..." >
                                </form>
                            </div>
                            <br>
                            <!--/data search bar-->

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Roll no</th>
                                    <th>DoB</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Parent</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classNineData as $key=>$class)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$class->first_name}}</td>
                                        <td>{{$class->last_name}}</td>
                                        <td>
                                            <span class="badge badge-success">
                                            {{$class->roll_no}}
                                            </span>
                                        </td>
                                        <td>{{$class->DoB}}</td>
                                        <td>
                                            <span class="badge badge-primary">
                                            {{$class->gender}}
                                            </span>
                                        </td>
                                        <td>{{$class->contact}}</td>
                                        <td>{{$class->parent_name}}</td>

                                        <td>
                                            <img src="{{url('lib/uploads/classes/classNine/'.$class->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                        </td>
                                        <td>
                                            <a href="{{route('edit-studentNine').'/'.$class->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{route('class-nine-delete').'/'.$class->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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