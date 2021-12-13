<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Roxo Administrator">
    <meta name="author" content="Masoud Salehi">
    <meta name="keyword" content="Bootstrap Data">
    <title>صفحه مدریت</title>
    <link href="{{ asset('Backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/dest/style.css') }}" rel="stylesheet">
    @yield('header')
</head>
<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">

            {{-- Start Admin Logout --}}
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger" style="float: left;margin: 10px 5px;border-radius: 6px;" type="submit">X</button>
            </form>
            {{-- End Admin Logout --}}

            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
            </ul>
        </div>
    </header>