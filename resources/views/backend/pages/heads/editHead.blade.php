@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Info Update</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-10">
                            <form action="{{route('edit-head-action')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="criteria" value="{{$headData->id}}">
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
                                    <button class="btn btn-success">Update info</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <img src="{{url('lib/uploads/heads/images/'.$headData->image)}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 130px; width: 130px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 0px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop