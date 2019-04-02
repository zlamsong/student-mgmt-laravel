@extends('backend.master.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><mark>Dashboard</mark></h1>
                        </div>
                    </div>
                    @include('backend.layouts.message')
                    <br>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-4">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="{{route('notice')}}">Action</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$noticeNo}}</span>
                                </h4>
                                <p class="text-light">Noticeboard</p>

                                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="{{route('show-teachers')}}">View & Action</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$totalTeacher}}</span>
                                </h4>
                                <p class="text-light">Teachers</p>

                                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                    <canvas id="widgetChart2"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/.col-->


                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="{{route('head')}}">View & Action</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$totalHead}}</span>
                                </h4>
                                <p class="text-light">School Heads</p>

                            </div>

                            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-4">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="{{route('addUsers')}}">Add</a>
                                            <a class="dropdown-item" href="{{route('showUsers')}}">View</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$totalAdmin}}</span>
                                </h4>
                                <p class="text-light">Admins</p>

                                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                                    <canvas id="widgetChart4"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/.col-->

                <div class="col-lg-12">
                <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                <div class="dropdown float-right">
                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <div class="dropdown-menu-content">
                <a class="dropdown-item" href="{{route('classOneIndex')}}">class 1 Action</a>
                <a class="dropdown-item" href="{{route('classTwoIndex')}}">class 2 Action</a>
                <a class="dropdown-item" href="{{route('classThreeIndex')}}">class 3 Action</a>
                <a class="dropdown-item" href="#">class 4 Action</a>
                <a class="dropdown-item" href="#">class 5 Action</a>
                <a class="dropdown-item" href="#">class 6 Action</a>
                <a class="dropdown-item" href="#">class 7 Action</a>
                <a class="dropdown-item" href="#">class 8 Action</a>
                <a class="dropdown-item" href="#">class 9 Action</a>
                <a class="dropdown-item" href="#">class 10 Action</a>
                </div>
                </div>
                </div>
                <h4 class="mb-0">
                <span class="count">{{$one}}</span>
                </h4>
                <p class="text-light">Students</p>
                   <i>
                       <p class="text-light col-lg-3 mx-auto">Students on class One | {{$one}}</p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Two | {{$two}}</p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Three | {{$three}}</p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Four  | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Five | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Six | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Seven | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Eight | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Nine | </p>
                       <p class="text-light col-lg-3 mx-auto">Students on class Ten | </p>
                   </i>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="pieChart"></canvas>
                </div>


                </div>

                </div>
                </div>
                <!--/.col-->

                </div>
            </div>
        </div>
    </div>

</div><!-- /#right-panel -->

<!-- Right Panel -->
@stop
