@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Portfolio action</mark></h1>
                        </div>
                    </div>
                    @include('backend.layouts.message')
                    {{$portfolioData->links()}}
                    <div class="col-md-12">
                        <br>
                        @if(count($portfolioData) > 0)
                            @foreach($portfolioData as $portfolio)
                                <div class="list-group-item">
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <img style="width:100%" src="{{url('lib/uploads/intro/portfolio/'.$portfolio->image)}}">
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <h3>{{$portfolio->title}} </h3>
                                                <small><i>Written on {{$portfolio->created_at}}</i></small>
                                                <div class="pull-right">
                                                    <a href="{{route('editPortfolio').'/'.$portfolio->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{route('deletePortfolio').'/'.$portfolio->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                                    <hr>
                                                <p>{{$portfolio->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                                {{$portfolioData->links()}}
                        @else
                            <p>No portfolio found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#right-panel -->

<!-- Right Panel -->
@stop