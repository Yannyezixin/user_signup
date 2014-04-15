@extends('l.mail')


@section('container')
    <p>感谢您注册YannUser,请点击一下链接激活您的帐号：
        <br /><a href="{{ URL::route('UserActivate',$activationCode)}}" target="_blank">{{ URL::route('UserActivate',$activationCode)}}</a>
    </p>
@stop
