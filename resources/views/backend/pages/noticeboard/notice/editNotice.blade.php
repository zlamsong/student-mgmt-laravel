@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Edit Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('edit-notice-action')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="criteria" value="{{$noticeData->id}}">
                            <div class="form-group form-group-sm">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject"  value="{{$noticeData->subject}}" class="form-control" id="subject">
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-xs">
                                <label for="description">Description</label>
                                <textarea type="paragraph_text" name="description" class="form-control" id="summary-ckeditor">  {{$noticeData->description}}</textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Update notice</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



@stop