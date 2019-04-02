@extends('frontend.master.master')
@section('content')
    <div class="probootstrap-page-wrapper">
        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored" style="background-image: url({{url('lib/uploads/tuition/images/'. $singleTuitionData->image)}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>{{ $singleTuitionData->subject}}</h1>
                                <h2>
                                    <span class="probootstrap-meta"><i class="icon-calendar2"></i>{{$singleTuitionData->from}} - {{$singleTuitionData->to}}</span><br>
                                </h2>
                            </div>
                        </div>
                    </div>


                    <div class="probootstrap-text probootstrap-animate">


                        <div class="col-md-12 mx-auto probootstrap-animate">
                            <div class="probootstrap-featured-news-box">
                                <div class="probootstrap-text" >

                                    <div class="text">
                                        <h3> Class | {{ $singleTuitionData->class}}  <text>( {{ $singleTuitionData->time}} )</text></h3>
                                        <hr>
                                        <p>({{ $singleTuitionData->desc, 30}}</p>
                                        <p><a href="{{route('tuition-enroll').'/'.$singleTuitionData->id}}" class="btn btn-info">enroll now</a>
                                            <span class="enrolled-count">
<!--                                                --><?php
//                                                if ($connection == true){
//                                                   $query= "SELECT 'full_name' FROM 'readers' WHERE 'class' = {$singleTuitionData->class} AND 'subject' = {$singleTuitionData->subject}";
//                                                    $result = mysqli_query($connection, $query);
//                                                    echo $result;
//                                                }
//                                                ?>
                                            </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@stop