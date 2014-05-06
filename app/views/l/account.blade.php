@extends('l.base')

@section('title') 用户中心 @parent @stop

@section('style')
body
{
    padding-bottom: 0;
    background-color: #f3f3ff;
}
@parent @stop

@section('body')

    @include('Model.accountNavbar')

    <div class="container panel" style="margin-top:5em; padding-bottom:1em;">
        @yield('container')
    </div>

@stop

@section('scripts')
 @parent
 <script src="{{ URL::asset('static/js/authority.js')}}"></script>
    <script>
	$('[data-toggle]').popover({container:'body'});
    </script>
@stop
