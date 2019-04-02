@section('leftPannel')
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', $title)</title>

    <link rel="apple-touch-icon" href="{{url(('index/apple-icon.png'))}}">
    <link rel="shortcut icon" href="{{url('svg/school.png')}}">

    <link rel="stylesheet" href="{{url('index/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('index/"vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/chosen/chosen.min.css')}}">
    <link rel="stylesheet" href="{{url('index/vendors/custom/numbercircle.css')}}">

    <link rel="stylesheet" href="{{url('index/assets/css/style.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <br>
            <a class="navbar-brand" href=""><img src="{{url('svg/school.png')}}" class="g-header__profile-photo rounded-circle" style="height: 75px; width: 75px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 10px; margin-bottom: 10px;" alt="Logo"></a>
            <a class="navbar-brand hidden" href=""><img src="{{url('svg/school.png')}}" alt="Logo"></a>
            <hr>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="active">
                    <a href="{{route('privilege')}}"> <i class="menu-icon fa fa-key"></i>Manage Privilege </a>
                </li>
                <h3 class="menu-title">Admin</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('addUsers')}}">Add User</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{route('showUsers')}}">Show Users</a></li>

                    </ul>
                </li>
                <h3 class="menu-title">Message & Intro element</h3><!-- /.menu-title -->
                <li class="active">
                    <a href="{{route('feedback')}}"> <i class="menu-icon fa fa-envelope-o"><span class="count bg-danger"></span></i>Messages </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-newspaper-o"></i>Intro</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa fa-calendar-minus-o"></i><a href="{{route('about')}}">About Action</a></li>
                        <li><i class="menu-icon fa fa-picture-o"></i><a href="{{route('portfolio')}}">Add Portfolio</a></li>
                        <li><i class="menu-icon fa fa-magic"></i><a href="{{route('portfolioIndex')}}">Portfolio Action</a></li>
                        <li><i class="menu-icon fa fa-calendar-check-o"></i><a href="{{route('service')}}">Service Action</a></li>
                        <li><i class="menu-icon fa fa-phone-square"></i><a href="{{route('contact')}}">Contact Action</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Student, subject Class element</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Classes</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><a href="{{route('classOneIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/one.png')}}" style="border:1px; height: 25px; width:25px;"></a></li>
                        <li><a href="{{route('classTwoIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/two.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classThreeIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/three.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classFourIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/four.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classFiveIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/five.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classSixIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/six.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classSevenIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/seven.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classEightIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/eight.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classNineIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/nine.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('classTenIndex')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/ten.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>



                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clone"></i>Notes & Materials</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="{{route('note')}}">Add Notes</a></li>
                        <li><i class="menu-icon fa fa-sticky-note-o"></i><a href="{{route('show-note')}}">Show Notes</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clone"></i>Tuition Students</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="{{route('show-readers')}}">show students</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clone"></i>Subjects</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><a href="{{route('subject-one')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/one.png')}}" style="border:1px; height: 25px; width:25px;"></a></li>
                        <li><a href="{{route('subject-two')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/two.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-three')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/three.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-four')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/four.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-five')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/five.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-six')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/six.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-seven')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/seven.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-eight')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/eight.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-nine')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/nine.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>
                        <li><a href="{{route('subject-ten')}}"> <text style="color: white">class</text> <img class="align-items-center" src="{{url('svg/class/ten.png')}}" style="border:1px; height: 25px; width:25px;"></a> </li>

                    </ul>
                </li>


                <h3 class="menu-title">teachers element</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-road"></i>Teachers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('teacher')}}">Add New Teacher</a></li>
                        <li><i class="menu-icon fa fa fa-reorder"></i><a href="{{route('show-teachers')}}">Show Teachers</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-mortar-board"></i>School Heads</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-podcast"></i><a href="{{route('head')}}">Head action</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Event & Noticeboard element</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-exclamation-triangle"></i><a href="{{route('notice')}}">Make Notice</a></li>
                        <li><i class="menu-icon fa fa-calendar"></i><a href="{{route('program')}}">Add Event</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="{{route('tuition')}}">Add Tuition Class?</a></li>
                        <li><i class="menu-icon fa fa-thumb-tack"></i><a href="{{route('testimonial')}}">Testimonial</a></li>
                        <li><i class="menu-icon fa fa-cubes"></i><a href="{{route('history')}}">School History</a></li>
                        <li><i class="menu-icon fa fa-question-circle-o"></i><a href="{{route('why-us')}}">Why Choose Us?</a></li>
                        <li><i class="menu-icon fa fa-question-circle-o"></i><a href="{{route('user-student')}}">add user</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
@stop