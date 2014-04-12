<html>
    <head>
        <title>
            @section('title')
            @show
        </title>
	    <link rel="stylesheet" type="text/css" href="{{{ URL::asset('static/css/bootstrap.css')}}}">
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
</html>
