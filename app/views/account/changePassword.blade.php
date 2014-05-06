@extends('l.account', array('active' => 'changePassword'))

@section('title') @parent 修改密码 @stop

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

    @include('Model.notification')
    <form class="form-signup" role="form" method="post">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="PUT" />

        <h2 class="form-register-heading">修改您的密码</h2>
        <input name="password_old" type="password" class="form-control" placeholder="原始密码" required>
        {{ $errors->first('password_old', '<strong class="error">:message</strong>') }}
        <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="新密码" required>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-toggle="popover" data-content="请使用字母、数字、下划线、中划线。长度在6-16位之间。">?</button>
            </span>
        </div>
        {{ $errors->first('password', '<strong class="error">:message</strong>') }}
        <input name="password_confirmation" type="password" class="form-control" placeholder="确认密码" required>
        <button class="btn btn-lg btn-success btn-block" type="submit">确认修改</button>
    </form>

@stop


@section('end')
    @parent
    <script>
        $('[data-toggle]').popover({container:'body'});
    </script>
@stop
