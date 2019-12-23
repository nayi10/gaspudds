<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ghana Association of Student Planners, UDS Wa Campus is a student 
        association in UDS Wa campus. Our mission is to make learning Planning easy for our members.">
        <meta name="keywords" content="planning, association, UDS, University for Development Studies, UDS Wa,
        Wa, planning students, learning, university association, students, planners">
        <meta name="author" content="Alhassan Kamil (Bandughana)">

        <title> @yield('title') </title>

        <!-- Styles -->
        <link rel="stylesheet" href="{!! asset('css/material-icons.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-material-design.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/lightbox.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl/owl.carousel.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl/owl.theme.default.min.css') !!}">
    </head>
    <body>
        @include('shared.navbar')
        <div class="container-fluid main m-0 p-0">
            @yield('content')
        </div>
        @include('shared.footer')
        <script src="{!! asset('js/jquery.js') !!}"></script>
        <script src="{!! asset('js/popper.js') !!}"></script>
        <script src="{!! asset('js/snackbar.js') !!}"></script>
        <script src="{!! asset('js/bootstrap-material-design.min.js') !!}"></script>
        <script src="{!! asset('js/main.js') !!}"></script>
        <script src="{!! asset('js/lightbox.js') !!}"></script>
        <script src="{!! asset('js/owl/owl.carousel.min.js') !!}"></script>
        <script>
            $(".owl-carousel").owlCarousel({
                loop:true,
                items: 3,
                dots: true,
                dotsEach: true,
                autoplay: true,
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    }
                }
            });
            $(".owl-carousel-2").owlCarousel({
                loop:true,
                items: 3,
                dots: true,
                autoplay: true,
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    }
                }
            });
        </script>
    </body>
</html>
