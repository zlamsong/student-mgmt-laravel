@include('backend.layouts.leftPannel')
@include('backend.layouts.rightPannel')
@include('backend.layouts.script')
@include('backend.layouts.footer')

@yield('leftPannel')
@yield('rightPannel')
@yield('content')
@yield('script')
@yield('footer')