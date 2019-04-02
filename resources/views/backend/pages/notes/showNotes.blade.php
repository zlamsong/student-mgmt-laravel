@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Notes & Materials</mark></h1>
                            <div class="list-group-item bg-primary" style="color: white">
                                Total Notes : {{$total}}<br>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-12">
                        <div class="form-group form-group-sm">
                            <a href="{{route('note')}}"> <button class="btn btn-success">Add note</button></a>
                        </div>
                        <br>
                        @include('backend.layouts.message')
                        <div class="col-md-12">

                            <!--data search bar-->
                            <div>
                                <form method="get">
                                    <input type="text" id="searchNote" class="form-control" placeholder="Search Notes ..." >
                                </form>
                            </div>
                            <br>
                            <!--/data search bar-->

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Title</th>
                                    <th>Added on</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($noteData as $key=>$note)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                            {{$note->class}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-info">
                                            {{$note->subject}}
                                            </span>
                                        </td>
                                        <td>
                                          <i>{{$note->note_title}}</i>
                                        </td>
                                        <td>
                                            {{$note->created_at->toDayDateTimeString()}}
                                        </td>
                                        <td>
                                            <form action="{{route('get-download')}}" method="get">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$note->id}}">
                                                @if($note->file)
                                                    <button class="btn-outline-success btn-sm" name="active">
                                                        <i class="fa fa-download"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('delete-note').'/'.$note->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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