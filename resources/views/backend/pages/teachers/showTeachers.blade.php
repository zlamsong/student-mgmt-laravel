@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Teachers</mark></h1>
                            <div class="list-group-item bg-primary" style="color: white">
                                Total Teachers : {{$total}}<br>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12">
                        <div class="form-group form-group-sm">
                            <a href="{{route('teacher')}}"> <button class="btn btn-success">Add new teacher</button></a>
                        </div>
                        <br>
                        @include('backend.layouts.message')
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Class teacher of</th>
                                    <th>Image</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teacherData as $key=>$teacher)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$teacher->first_name}}</td>
                                        <td>{{$teacher->last_name}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                            {{$teacher->class_teacher_of}}
                                            </span>
                                        </td>
                                        <td>
                                            <img src="{{url('lib/uploads/teachers/images/'.$teacher->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                        </td>
                                        <td>

                                            <form action="{{route('get-download')}}" method="get">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$teacher->id}}">
                                                @if($teacher->document)
                                                    <button class="btn-outline-success btn-sm" name="active">
                                                        <i class="fa fa-download"></i>
                                                    </button>
                                                @endif
                                            </form>


                                                {{--<iframe src="{{url('lib/uploads/teachers/documents/'.$teacher->document)}}" style="height: 20px; width: 40px" ></iframe>--}}
                                                {{--<iframe src="https://view.officeapps.live.com/op/view.aspx?src={{url('lib/uploads/teachers/documents/'.$teacher->document)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>--}}

                                        </td>
                                        {{--<td>--}}
                                            {{--<!-- Button trigger modal -->--}}
                                           {{--<button type="button" class="badge-pill badge-info" data-toggle="modal" data-target="#scrollmodal">--}}
                                               {{--doc--}}
                                           {{--</button>--}}

                                            {{--<!-- modal body -->--}}
                                            {{--<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog modal-lg" role="document">--}}
                                                    {{--<div class="modal-content">--}}
                                                        {{--<div class="modal-header">--}}
                                                            {{--<h5 class="modal-title" id="scrollmodalLabel">Scrolling Long Content Modal</h5>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                                {{--<span aria-hidden="true">&times;</span>--}}
                                                            {{--</button>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-body">--}}
                                                            {{--<iframe src="{{url('lib/uploads/teachers/documents/'.$teacher->document)}}"></iframe>--}}
                                                            {{--<iframe src="https://view.officeapps.live.com/op/view.aspx?src={{url('lib/uploads/teachers/documents/'.$teacher->document)}}" ></iframe>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-footer">--}}
                                                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</td>--}}
                                        <td>
                                            <a href="{{route('edit-teacher').'/'.$teacher->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{route('delete-teacher').'/'.$teacher->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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