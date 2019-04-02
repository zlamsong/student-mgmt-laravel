@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Class THREE</mark></h1>
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
                            <a href="{{route('classThree')}}"> <button class="btn btn-success">Add student</button></a>
                        </div>

                        <br>
                        @include('backend.layouts.message')
                        <div class="col-md-12">
                            <!--data search bar-->
                            <div>
                                <form method="get">
                                    <input type="text" id="searchThree" class="form-control" placeholder="Search Student ..." >
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
                                @foreach($classThreeData as $key=>$classThree)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$classThree->first_name}}</td>
                                        <td>{{$classThree->last_name}}</td>
                                        <td>
                                            <span class="badge badge-success">
                                            {{$classThree->roll_no}}
                                            </span>
                                        </td>
                                        <td>{{$classThree->DoB}}</td>
                                        <td>
                                            <span class="badge badge-primary">
                                            {{$classThree->gender}}
                                            </span>
                                        </td>
                                        <td>{{$classThree->contact}}</td>
                                        <td>{{$classThree->parent_name}}</td>

                                        <td>
                                            <img src="{{url('lib/uploads/classes/classThree/'.$classThree->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                        </td>
                                        <td>
                                            <a href="{{route('edit-studentThree').'/'.$classThree->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{route('class-three-delete').'/'.$classThree->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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