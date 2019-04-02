@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Notes & Materials</mark></h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('add-note')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-group-sm">
                                <label for="class">Note For</label>
                                <select name="class" class="form-control" id="class">
                                    <option value="1">class-1</option>
                                    <option value="2">class-2</option>
                                    <option value="3">class-3</option>
                                    <option value="4">class-4</option>
                                    <option value="5">class-5</option>
                                    <option value="6">class-6</option>
                                    <option value="7">class-7</option>
                                    <option value="8">class-8</option>
                                    <option value="9">class-9</option>
                                    <option value="10">class-10</option>
                                </select>
                                <a href="" style="color: #d23430;">{{$errors->first('class')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="subject">Note Subject</label>
                                <input type="text" name="subject" placeholder="(Math/ Science/ English/ Nepali/ Social........)" class="form-control" id="subject">
                                <a href="" style="color: #d23430;">{{$errors->first('subject')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="title">Note Title</label>
                                <input type="text" name="title" placeholder="(Chapter no.,Topic/ Exercise)" class="form-control" id="file_title">
                                <a href="" style="color: #d23430;">{{$errors->first('title')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="upload">File</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm" id="file">
                                <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                            </div>

                            <div class="form-group form-group-sm">
                                <button class="btn btn-success">Add Note</button>
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