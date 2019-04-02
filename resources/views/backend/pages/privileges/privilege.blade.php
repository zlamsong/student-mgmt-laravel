@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-header">
                     <div class="page-title">
                         <h1><mark>Manage Privilege</mark></h1>
                     </div>
                  </div>

                     <div class="col-md-12">
                         <form action="{{route('addPrivilege')}}" method="post">
                             {{csrf_field()}}
                             <div class="form-group form-group-xs">
                                 <label for="name">Privilege Name</label>
                                 <input type="text" name="privilege_name" id="name" class="form-control">
                                 <a href="" style="color: crimson;">{{$errors->first('privilege_name')}}</a>
                             </div>
                             <div class="form-group">
                                 <button class="btn btn-success btn-sm">Add Privilege</button>
                             </div>
                         </form>
                     </div>

                   <div class="col-md-12">
                       <br>

                       @include('backend.layouts.message')
                       <table class="table table-hover">
                           <thead>
                           <tr>
                               <th>S.N</th>
                               <th>Privilege Name</th>
                               <th>Status</th>
                               <th>Created at</th>
                               <th>Updated at</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($privilegeData as $key => $privilege)
                               <tr>
                                   <td>{{++$key}}</td>
                                   <td>{{ucfirst($privilege->privilege_name)}}</td>
                                   <td>
                                       <form action="{{route('updatePrivilegeStatus')}}" method="post">
                                           @csrf
                                           <input type="hidden" name="criteria" value="{{$privilege->id}}">
                                           @if($privilege->status==1)
                                               <button class=" btn-outline-success btn-sm" name="active">
                                                   <i class="fa fa-check"></i>
                                               </button>
                                           @else
                                               <button class="btn btn-outline-dark btn-sm" name="inactive">
                                                   <i class="fa fa-times"></i>
                                               </button>
                                           @endif
                                       </form>
                                   </td>
                                   <td>{{$privilege->created_at}}</td>
                                   <td>{{$privilege->updated_at}}</td>
                                   <td>
                                       <a href="{{route('editPrivilege').'/'.$privilege->id}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                       <a href="{{route('deletePrivilege').'/'.$privilege->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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



@stop