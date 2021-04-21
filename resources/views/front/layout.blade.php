<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Burger</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/x-icon" href="front/img/favicon.png">


    <!-- CSS here -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/css/magnific-popup.css">
    <link rel="stylesheet" href="front/css/cart.css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/themify-icons.css">
    <link rel="stylesheet" href="front/css/nice-select.css">
    <link rel="stylesheet" href="front/css/flaticon.css">
    <link rel="stylesheet" href="front/css/animate.css">
    <link rel="stylesheet" href="front/css/slicknav.css">
    <link rel="stylesheet" href="front/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- < > -->
</head>

<body>
<!-- header-start -->
@include('front.includes._header')
<!-- header-end -->
@yield('content')
<!-- slider_area_start -->


@include('front.includes.footer');


<!-- JS here -->







<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/jquery.slicknav.min.js"></script>
<script src="front/js/isotope.pkgd.min.js"></script>

<script src="front/js/main.js"></script>

@yield('scripts')


</body>

</html>
