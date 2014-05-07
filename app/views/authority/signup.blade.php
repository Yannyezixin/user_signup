@extends('l.authority')

@section('title') 注册 @parent @stop

@section('style')
    @parent
    .form-signup {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signup .form-signup-heading,
    .form-signup .checkbox {
        margin-bottom: 10px;
    }
    .form-signup .checkbox {
        font-weight: normal;
    }
    .form-signup .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
    }
    .form-signup input{
        margin-top: 10px;
    }
    .form-signup button{
        margin-top: 10px;
    }
    .form-signup strong.error{
        color: #b94a48;
    }
@stop

@section('container')

    {{ Form::open(array('class' => 'form-signup', 'role' => 'form','onsubmit'=> 'return comfired()')) }}
        <h2 class="form-signup-heading">用户注册</h2>
        <input name="email" value="{{ Input::old('email') }}" type="text" class="form-control" id="email" placeholder="邮箱" required autofocus>
        {{ $errors->first('email', '<strong class="error">:message</strong>') }}
        <strong  id="error1"></strong>
        <input name="name" type="text" class="form-control" placeholder="昵称" id="name" required>
        <strong  id="error3"></strong>
        {{ $errors->first('name', '<strong class="error">:message</strong>') }}
        <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="密码"  id="password" required>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-toggle="popover" data-content="请使用字母、数字、下划线、中划线。长度在6-16位之间。">?</button>
            </span>
        </div>
        <strong  id="error"></strong>
        {{ $errors->first('password', '<strong class="error">:message</strong>') }}
        <input name="password_confirmation" type="password" class="form-control" placeholder="确认密码" id="comfiredpassword"  required>
        <strong  id="error2"></strong>
        <button class="btn btn-lg btn-success btn-block" type="submit" id="submit" >注 册</button>
    {{ Form::close() }}

@stop


@section('scripts')
    @parent
    <script>
	$('[data-toggle]').popover({container:'body'});
    </script>
@stop
