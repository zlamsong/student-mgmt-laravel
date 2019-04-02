@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Update Privilege</mark></h1>
                        </div>
                    </div>

                    <div class="col-md-12">
                        @include('backend.layouts.message')
                        <form action="{{route('editPrivilegeAction')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="criteria" value="{{$privilegeData->id}}">
                            <div class="form-group form-group-xs">
                                <label for="name">Privilege Name</label>
                                <input type="text" name="privilege_name" value="{{$privilegeData->privilege_name}}" id="name" class="form-control">
                                <a href="" style="color: crimson;">{{$errors->first('privilege_name')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Update Privilege</button>
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