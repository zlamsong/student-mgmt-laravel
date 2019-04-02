@section('nav')
<body>
<div class="probootstrap-search" id="probootstrap-search">
    <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
    <form action="#">
        <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
    </form>
</div>

<div class="probootstrap-page-wrapper">
    <!-- Fixed navbar -->

    <div class="probootstrap-header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
                    <span><i class="icon-location2"></i>Brooklyn, NY 10036, United States</span>
                    <span><i class="icon-phone2"></i>+1-123-456-7890</span>
                    <span><i class="icon-mail"></i>info@uicookies.com</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
                    <ul>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook2"></i></a></li>
                        <li><a href="#"><i class="icon-instagram2"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                        <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="btn-more js-btn-more visible-xs">
                    <a href="#"><i class="icon-dots-three-vertical "></i></a>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="{{route('home')}}">
                    <img src="{{url('svg/school.png')}}" class="g-header__profile-photo rounded-circle" style="height: 75px; width: 75px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 10px;" alt="Logo"></a>
            </div>

            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('subject')}}">Subjects</a></li>
                    <li><a href="{{route('teachers')}}">Teachers</a></li>
                    <li><a href="{{route('events')}}">Events & Notices</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('about-us')}}">About Us</a></li>
                            <li><a href="{{route('notes')}}">Notes & Materials</a></li>
                            <li><a href="{{route('students')}}">Students</a></li>
                            <li><a href="{{route('gallery')}}">Gallery</a></li>
                            <li><a href="{{route('logout-user')}}">Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('contact-us')}}">Contact us</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </nav>
    @stop