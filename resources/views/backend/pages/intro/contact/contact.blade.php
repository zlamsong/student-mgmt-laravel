@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Contact Action</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form action="{{route('addContact')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group form-group-xs">
                                <label for="contact">Contact</label>
                                <textarea type="paragraph_text" name="about" placeholder="contact here...." class="form-control" id="article-ckeditor"></textarea>
                                <a href="" style="color: #d23430;">{{$errors->first('about')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Add contact</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 bg-info">
                        <br>

                        @include('backend.layouts.message')
                        @foreach($contactData as $key => $contact)
                            <div class="list-group-item breadcrumb">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small><i>Added on: {{$contact->created_at}}</i></small>
                                            <div class="pull-right">
                                                <a href="{{route('deleteContact').'/'.$contact->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <hr>
                                            <small><mark class="badge-pill">(contact {{($contact->id)}})</mark></small>
                                            <p>{{$contact->about}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{$contactData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop