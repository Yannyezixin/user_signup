@extends('l.authority')

@section('title') 密码重置 @parent @stop

@section('style')
    @parent
    .form-register {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-register .form-register-heading,
    .form-register .checkbox {
        margin-bottom: 10px;
    }
    .form-register .checkbox {
        font-weight: normal;
    }
    .form-register .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
    }
    .form-register input{
        margin-top: 10px;
    }
    .form-register button{
        margin-top: 10px;
    }
    .form-register strong.error{
        color: #b94a48;
    }
@stop

@section('container')

    {{ Form::open(array('class' => 'form-register', 'role' => 'form','onsubmit' => 'return comfired()')) }}
        <h2 class="form-register-heading">密码重置</h2>
        <input name="email" value="{{ Input::old('email') }}" type="text" class="form-control" id="email" placeholder="请输入您注册时所使用的邮箱" required autofocus>
        {{ $errors->first('email', '<strong class="error">:message</strong>') }}
	        <strong  id="error1"></strong>
        <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="密码" id="password" required>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-toggle="popover" data-content="请使用字母、数字、下划线、中划线。长度在6-16位之间。">?</button>
            </span>
        </div>
        {{ $errors->first('password', '<strong class="error">:message</strong>') }}
	        <strong  id="error"></strong>
        <input name="password_confirmation" type="password" class="form-control" placeholder="确认密码" id="comfiredpassword" required>
	        <strong  id="error2"></strong>
        <input type="hidden" name="token" value="{{ $token }}">
        @if( Session::get('error') )
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif
        <button class="btn btn-lg btn-success btn-block" type="submit">重 置</button>
    {{ Form::close() }}

@stop

@section('scripts')
    @parent
    <script>
        $('[data-toggle]').popover({container:'body'});
    </script>
@stop
