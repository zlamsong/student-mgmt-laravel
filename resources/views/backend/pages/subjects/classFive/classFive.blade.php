@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Class TWO</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('add-subject-five')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group form-group-sm">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject"  placeholder="subject name" class="form-control" id="subject">
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="description">Subject Description</label>
                                <textarea type="paragraph_text" name="description" placeholder="description here...." class="form-control" id="summary-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                    <br>

                    <div class="col-md-12">
                        <br>
                        @include('backend.layouts.message')
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Subject Name</th>
                                    <th>Subject Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjectFive as $key=>$five)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$five->subject}}</td>
                                        <td>{{$five->desc}}</td>
                                        <td>
                                            <a href="{{route('delete-subject-five').'/'.$five->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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