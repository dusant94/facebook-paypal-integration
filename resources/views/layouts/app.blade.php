<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
    <!-- Custom styles for this template -->

    <link href="{{asset('css/signin.css')}}
    " rel="stylesheet">

    <link href="{{asset('css/app.css')}}
    " rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}
    " rel="stylesheet">

    <link href="{{asset('css/bootstrap-social.css')}}
    " rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{route('home')}}">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown" id="notification">
           <message-notification :user="{{Sentinel::getUser()}}"></message-notification>

          </div>

        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        @if(Sentinel::check())
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link"   href="{{route('user.profile',Sentinel::getUser()->id)}}">{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}
                @if(Sentinel::getUser()->avatar)
                <img class="img-profile rounded-circle" style="
                height: auto;
                width: auto;
                max-height: 35px;
                max-width: 35px;"
                src="{{route('profile.picture')}}">
            @else

                <img class="img-profile rounded-circle" style="
                height: auto;
                width: auto;
                max-height: 35px;
                max-width: 35px;"
                src="{{ url('/images/blank-profile-picture-973460_640.png')}}">

            @endif
            </a>
        </li>
    </ul>
    @endif
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
              @if(Sentinel::check())
            <a  class="nav-link" href="{{route('user.logout')}}">Log out</a>
            @endif

          </li>

        </ul>

      </nav>


@yield('content')
 <!-- Core plugin JavaScript-->
 <script src="{{asset('js/app.js')}}"></script>
 <script src="{{asset('js/dashboard.js')}}"></script>

      </html>
