@extends('l.base')

@section('title') 用户中心 @parent @stop

@section('style')

@parent @stop

@section('body')

    @include('Model.nav')

    <div class="container">
        @yield('container')
    @include('Model.accountNavbar')
    </div>

@stop

@section('scripts')
 @parent
 <script src="{{ URL::asset('static/js/authority.js')}}"></script>
    <script>
	$('[data-toggle]').popover({container:'body'});
    </script>
@stop
