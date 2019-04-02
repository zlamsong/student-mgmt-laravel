@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Edit Portfolio</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('edit-portfolio-action')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="criteria" value="{{$portfolioData->id}}">
                            <div class="form-group form-group-sm">
                                <label for="upload">Picture</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <img src="{{url('lib/uploads/intro/portfolio/'.$portfolioData->image)}}" id="target_image" alt="" style="width:100% ;">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group form-group-sm">
                                    <label for="title">Picture Title</label>
                                    <input type="text" name="title" value="{{$portfolioData->title}}" class="form-control" id="picture_title">
                                    <a href="" style="color: #d23430;">{{$errors->first('title')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="description">Picture Description</label>
                                    <textarea type="paragraph_text" name="description" value="{{$portfolioData->description}}" class="form-control" id="article-ckeditor"> </textarea>
                                    <a href="" style="color: #d23430;">{{$errors->first('description')}}</a>
                                </div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-success">Update portfolio</button>
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