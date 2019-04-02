@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Portfolio</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <form action="{{route('addPortfolio')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-group-sm">
                                    <label for="upload">Picture</label>
                                    <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                    <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <img src="{{url('svg/image.jpg')}}" id="target_image" alt="" style="width:100% ;">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group form-group-sm">
                                        <label for="title">Picture Title</label>
                                        <input type="text" name="title" placeholder="title" class="form-control" id="picture_title">
                                        <a href="" style="color: #d23430;">{{$errors->first('title')}}</a>
                                    </div>
                                <div class="form-group form-group-sm">
                                    <label for="description">Picture Description</label>
                                    <textarea type="paragraph_text" name="description" placeholder="Picture desc..(more than 5 and less than 200 characters)" class="form-control" id="article-ckeditor"></textarea>
                                    <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Add portfolio</button>
                                </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
@stop