@extends('l.account', array('active' => 'changePassword'))

@section('title') @parent 修改密码 @stop

@section('container')
    <h2>修改您的密码</h2>
<div class="col-md-10">
@include('Model.notification')
{{ Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'method' => 'post'))}}
        <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="PUT" />
<div class="col-md-8">
    <div class="form-group">
        <label for="password_old" class="col-sm-2 control-label">原始密码</label>
        <div class="col-sm-10">
          <input name="password_old" id="password_old" type="password" class="form-control" required>
           {{ $errors->first('password_old', '<strong class="error">:message</strong>') }}
        </div>
    </div>

    <div class="form-group">
    	<label for="newpassword" class="col-sm-2 control-label">新密码</label>
        <div class="col-sm-10">
            <input name="password" type="password"  id="newpassword" class="form-control" required>
    	  {{ $errors->first('password', '<strong class="error">:message</strong>') }}
    	</div>
     </div>
    <div class="form-group">
        <label for="password_confirmation" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" required>
            {{ $errors->first('password_old', '<strong class="error">:message</strong>') }}
       </div>
    </div>
    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-success">确认修改</button>
	    </div>
	</div>
    {{ Form::close()}}
</div>
</div>

@stop


@section('end')
    @parent
    <script>
        $('[data-toggle]').popover({container:'body'});
    </script>
@stop
