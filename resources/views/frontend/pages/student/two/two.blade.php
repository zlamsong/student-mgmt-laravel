@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

            <section class="probootstrap-section probootstrap-section-colored">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left section-heading probootstrap-animate">
                            <h1>Class TWO</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="probootstrap-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="probootstrap-flex-block">
                                <div class="probootstrap-text probootstrap-animate">
                                    <b><h3>HOME ROOM TEACHER</h3>
                                        @foreach($teacher as $teach)
                                            {{$teach->first_name}} {{$teach->last_name}}
                                        @endforeach</b><br><hr>
                                    <text>Class 1st | <i><b>
                                                @foreach($first as $one)
                                                    {{$one->first_name}} {{$one->last_name}}
                                                @endforeach</b></i></text><br>
                                    <text>Class 2nd | <i><b>
                                                @foreach($second as $two)
                                                    {{$two->first_name}} {{$two->last_name}}
                                                @endforeach</b></i></text><br>
                                    <text>Class 3rd | <i><b>
                                                @foreach($third as $three)
                                                    {{$three->first_name}} {{$three->last_name}}
                                                @endforeach</b></i></text>
                                    <hr>
                                    <text>Total students |
                                        <h2><b>{{$total}}</b></h2>
                                    </text>
                                </div>
                                <div class="probootstrap-image probootstrap-animate" style="background-image: url({{url('svg/twoGrade.jpg')}})">
                                    <a href="" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <div class="container">
                <div class="row breadcrumbs">
                    <section class="probootstrap-section">
                        <div class="container">
                            <div class="probootstrap-section probootstrap-section-colored">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-left section-heading probootstrap-animate">
                                            <h1>Students | {{$total}}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mx-auto probootstrap-animate">
                                    <div class="probootstrap-featured-news-box">
                                        <div class="probootstrap-text" >
                                            <!--data search bar-->
                                            <div>
                                                <form method="get">
                                                    <input type="text" id="searchNote" class="form-control" placeholder="Search Notes ..." >
                                                </form>
                                            </div>
                                            <br>
                                            <!--/data search bar-->

                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Image</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Gender</th>
                                                    <th>Roll no.</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($twoData as $key=>$two)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>
                                                            <img src="{{url('lib/uploads/classes/classTwo/'.$two->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                                        </td>
                                                        <td>
                                                            {{$two->first_name}}
                                                        </td>
                                                        <td>
                                                            <i>{{$two->last_name}}</i>
                                                        </td>
                                                        <td>
                                                            {{$two->gender}}
                                                        </td>
                                                        <td>
                                                             <span class="btn btn-primary btn-small">
                                                            {{$two->roll_no}}
                                                             </span>
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
                    </section>


                </div>
            </div>
    </div>

@stop