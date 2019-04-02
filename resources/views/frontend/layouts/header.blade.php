@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title)</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="icon" type="image/png" href="{{url('svg/school.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{url('enlight/css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{url('enlight/css/style.min.css')}}">
    <link rel="stylesheet" href="{{url('enlight/css/custom.css')}}">
    <!--[if lt IE 9]>
    <script src="{{url('enlight/js/vendor/html5shiv.min.js')}}"></script>
    <script src="{{url('enlight/js/vendor/respond.min.js')}}"></script>
    <![endif]-->

</head>
@stop