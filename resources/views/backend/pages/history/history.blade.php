@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>History</mark></h1>
                        </div>
                    </div>
                    <div class="page-header">
                        <div class="message">
                            <span class="badge-danger">
                                <i class="fa fa-bullhorn"> Adding more than one history of school makes you look like the most stupid person on earth :)</i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('add-history')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group form-group-xs">
                                <label for="history">History</label>
                                <textarea type="paragraph_text" name="history" placeholder="history...." class="form-control" id="article-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('history')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add History</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 bg-dark">
                        <br>

                        @include('backend.layouts.message')
                        @foreach($historyData as $history)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i>Written on: {{$history->created_at}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('delete-history').'/'.$history->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <p>{{$history->desc}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$historyData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop