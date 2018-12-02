<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DOCTOR - Responsive HTML &amp; Bootstrap Template</title>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset("/js/modernizr.js")}}"></script>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!--Header_section-->

  @yield('header')

<!--Header_section--> 

@yield('slider')
<!--Hero_Section-->

	@yield('content')



    @yield('footer')

    <!-- script tags
    ============================================================= -->
    <script src="{{asset('/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('/js/smoothscroll.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src='{{asset('js/owl.carousel.min.js')}}'></script>
    <script src="{{asset('js/custom.js')}}"></script>

<script>

    $(document).ready(function(){
  $('#owl-service').owlCarousel({
    loop:true,
    autoplay: true, 
    autoplayTimeout:2000,
    margin:20,
    smartSpeed: 1000,
    dots: false,
    responsive:{
        0:{
            items:2,
        },
        480:{
            items:3,
        },
        768:{
            items:6,
        }
    }
  })

  $('#owl-team').owlCarousel({
    loop:true,
    margin:20,
    dots: true,
    dotsEach: true,
    dotsSpeed: 1500,
    smartSpeed: 10000,
    responsive:{
        0:{
            items:1,
        },
        480:{
            items:2,
        },
        768:{
            items:3,
        }
    }
  })




});
</script>
</body>
</html>
