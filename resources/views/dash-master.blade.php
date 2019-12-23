<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') </title>

        <!-- Fonts --
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"-->

        <!-- Styles -->
        <link rel="stylesheet" href="{!! asset('css/material-icons.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-material-design.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    </head>
    <body>
        @include('shared.dash-navbar-top')
        <div class="row main">
            <div class="col-md-3 side hide-sm">
                @include('shared.dash-navbar-side')
            </div>
            <div class="col-md-9 main">
                @yield('content')
                <button class="btn btn-primary bmd-btn-fab main admin-dash">
                    <span class="mdi mdi-add"></span>
                </button>
                <div class="card create-group" style="display:none;">
                    <div class="list-group">
                        <a class="list-group-item bg-light" style="font-size: 1rem; border-radius: 8px 8px 0 0;">Choose an option to add</a>
                        <a href="/admin/users/add" class="list-group-item list-group-item-action">
                            <span class="mdi mdi-person-add mr-1"></span> Create a New Member
                        </a>
                        <a href="/admin/posts/create" class="list-group-item list-group-item-action">
                            <span class="mdi mdi-note-add mr-1"></span> Create an Article/Post
                        </a>
                        @can('administer site content')
                            <a href="/admin/events/create" class="list-group-item list-group-item-action">
                                <span class="mdi mdi-event-note mr-1"></span> New Event
                            </a>
                        @endcan
                        <a href="/admin/gallery/upload" class="list-group-item list-group-item-action">
                                <span class="mdi mdi-add-a-photo mr-1"></span> Gallery Upload
                        </a>
                        <a href="/admin/learning-materials/upload" class="list-group-item list-group-item-action">
                                <span class="mdi mdi-file-upload mr-1"></span> New Document Upload
                        </a>
                    </div>
                    <div id="pointer"></div>
                </div>
            </div>
        </div>
        <script src="{!! asset('js/jquery.js') !!}"></script>
        <script src="{!! asset('js/popper.js') !!}"></script>
        <script src="{!! asset('js/snackbar.js') !!}"></script>
        <script src="{!! asset('js/bootstrap-material-design.min.js') !!}"></script>
        <script src="{!! asset('js/main.js') !!}"></script>
        <script>
            $("#tasks").text() <= 21 ? $("#alert").removeClass('hide'): $("#alert").addClass("hide");
        </script>
    </body>
</html>
