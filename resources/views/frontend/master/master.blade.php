@include('frontend.layouts.header')
@include('frontend.layouts.nav')

@include('frontend.layouts.footer')
@include('frontend.layouts.script')



@yield('header')
@yield('nav')
@yield('content')
@yield('footer')
@yield('script')


