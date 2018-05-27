<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ Session::token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('header')
    @if (!Request::is('admin/*') && !Request::is('admin'))
		<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('css/style.css') }}">   
    @endif   
    </head>
    <body>
    
    <!-- content start -->
    
    @yield('content')

    <!-- content end -->
    
	<script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
	<script src="{{ asset('js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    @if (!Request::is('admin/*') && !Request::is('admin'))
        <script src="{{ asset('js/contact.js') }}"></script>
    	<script src="{{ asset('js/script.js') }}"></script>
    @endif

    @yield('footer')
    </body>
</html>