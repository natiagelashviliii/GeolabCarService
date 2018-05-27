@extends('index')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/font-face.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
@endsection
       
@section('content')
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ url('admin/slider') }}">
                                <i class="far fa-circle"></i>
                                სლაიდერი                            
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/services') }}">
                                <i class="far fa-circle"></i>
                                სერვისები            
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/socials') }}">
                                <i class="far fa-circle"></i>
                                სოციალური ქსელები                            
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/subscribers') }}">
                                <i class="far fa-circle"></i>
                                გამომწერები                            
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="far fa-circle"></i>
                                Logout                            
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ url('admin') }}">
                    <i class="fas fa-cog"></i>
                    სამართავი პანელი
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ url('admin/slider') }}">
                                @if (Request::is('admin/slider'))
                                <i class="fas fa-circle active"></i>
                                @else
                                <i class="far fa-circle"></i>
                                @endif    
                                სლაიდერი                            
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/services') }}">
                                @if (Request::is('admin/services'))
                                <i class="fas fa-circle active"></i>
                                @else
                                <i class="far fa-circle"></i>
                                @endif   
                                სერვისები                            
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/socials') }}">
                                @if (Request::is('admin/socials'))
                                <i class="fas fa-circle active"></i>
                                @else
                                <i class="far fa-circle"></i>
                                @endif   
                                სოციალური ქსელები                            
                            </a>
                        </li>  
                        <li>
                            <a href="{{ url('admin/subscribers') }}">
                                @if (Request::is('admin/subscribers'))
                                <i class="fas fa-circle active"></i>
                                @else
                                <i class="far fa-circle"></i>
                                @endif   
                                გამომწერები                            
                            </a>
                        </li>                        
                    </ul>
                </nav>
                <div class="admin-logout">
                    <a href="{{ route('admin.logout') }}">
                        <i class="fas fa-power-off"></i>
                        Logout
                    </a>
                </div>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('section')
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAIN CONTENT -->
        </div>
    </div>
    <a href="">logout</a>
@endsection
        
@section('footer')
    <script src="{{ asset('js/admin/main.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
@endsection
