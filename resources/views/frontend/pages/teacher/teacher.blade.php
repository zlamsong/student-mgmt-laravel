@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

            <section class="probootstrap-section probootstrap-section-colored">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left section-heading probootstrap-animate">
                            <h1>Our Teachers</h1>
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
                                    <h3>We Hired Certified Teachers For Our Students</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
                                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                                </div>
                                <div class="probootstrap-image probootstrap-animate" style="background-image: url({{url('svg/teacher.jpg')}})">
                                    <a href="https://www.youtube.com/watch?v=RN3iLeq1828" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="probootstrap-section">
                <div class="container">
                    <div class="row">
                        @if(count($teacherData) > 0)
                            @foreach($teacherData as $teacher)
                        <div class="col-md-3 col-sm-6">
                            <div class="probootstrap-teacher text-center probootstrap-animate">
                                <figure class="media">
                                    <img src="{{url('lib/uploads/teachers/images/'.$teacher->image)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                                </figure>
                                <div class="text">
                                    <h3>{{$teacher->first_name}} {{$teacher->last_name}}</h3>
                                    <p>class {{$teacher->class_teacher_of}}'s home teacher</p>
                                    <ul class="probootstrap-footer-social">
                                        <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                            @endforeach
                        @else
                            <p>No teachers in our database</p>
                        @endif
                    </div>

                </div>
            </section>

            <section class="probootstrap-section probootstrap-section-colored">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left section-heading probootstrap-animate">
                            <h1>School Heads</h1>
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
                                    <h3>It's Our Responsibility To Take Care Our School & Students</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
                                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                                </div>
                                <div class="probootstrap-image probootstrap-animate" style="background-image: url({{url('svg/teacher.jpg')}})">
                                    <a href="https://www.youtube.com/watch?v=RN3iLeq1828" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="probootstrap-section">
                <div class="container">


                    <div class="row">
                        @if(count($headData) > 0)
                            @foreach($headData as $head)
                                <div class="col-md-4 col-sm-6">
                                    <div class="probootstrap-teacher text-center probootstrap-animate">
                                        <figure class="media">
                                            <img src="{{url('lib/uploads/heads/images/'.$head->image)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                                        </figure>
                                        <div class="text">
                                            <h3>{{$head->first_name}} {{$head->last_name}}</h3>
                                            <b>{{strtoupper($head->position)}}</b>
                                            <ul class="probootstrap-footer-social">
                                                <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                                                <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                                                <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                                                <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No teachers in our database</p>
                        @endif
                    </div>

                </div>
            </section>

    </div>

@stop