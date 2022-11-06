<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{asset('css/vendors.bundle.css')}}">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="{{asset('css/app.bundle.css')}}">
    <link id="myskin" rel="stylesheet" media="screen, print" href="{{asset('css/skins/skin-master.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('css/fa-solid.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('css/fa-brands.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('css/fa-regular.css')}}">
    <!-- base css -->
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
    <link rel="mask-icon" href="{{asset('img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
</head>

@yield('content')

</html>
