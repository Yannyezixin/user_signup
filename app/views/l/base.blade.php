<html>
    <head>
<meta property="qc:admins" content="6020677116653526375" />


        <title>
            @section('title')
            @show
        </title>
	    <link rel="stylesheet" type="text/css" href="{{{ URL::asset('static/css/bootstrap.css')}}}">
       	    <script type="text/javascript" src="{{{ URL::asset('static/js/jquery.js')}}}"></script>
        <script>
            (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
        </script>
        <style type="text/css">
            @section('style')
            @show
        </style>
    </head>
    <body>
        @yield('body')

        @section('end')
        @show
    </body>
@section('scripts')
<script type="text/javascript" src="{{{ URL::asset('static/js/bootstrap.js')}}}"></script>
@show
</html>
