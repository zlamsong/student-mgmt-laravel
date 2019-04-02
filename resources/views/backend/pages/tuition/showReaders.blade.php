@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Tuition Students</mark></h1>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12">
                        @include('backend.layouts.message')
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Student's Name</th>
                                    <th>Roll no.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tuitionData as $key=>$tuition)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$tuition->subject}}</td>
                                        <td>{{$tuition->class}}</td>
                                        <td>{{$tuition->full_name}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                            {{$tuition->roll_no}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                            {{$tuition->email}}
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{route('delete-reader').'/'.$tuition->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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