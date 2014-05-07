@extends('l.account',array('active' => 'account'))

@section('container')
	<h2>我的个人资料</h2>
    <div class="col-md-10">
	<div class="col-md-8">
        {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form'))}}
		<div class="form-group">
    	    <label for="name" class="col-sm-2 control-label">昵称</label>
    	    <div class="col-sm-10">
        	      <input name="name" type="text" class="form-control" id="name" placeholder="个人昵称" required value="{{ $me['name']}}">
    	    </div>
        </div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10" id="sex">
                <input name="sex" type="radio" id="sex-none" value="sex-none" @if($me['sex'] == 'sex-none') checked @endif /> <label for="sex-none">保密</label> &nbsp;&nbsp;
                <input name="sex" type="radio" id="sex-male" value="sex-male" @if($me['sex'] == 'sex-male') checked @endif /> <label for="sex-male">男</label> &nbsp;&nbsp;
                <input name="sex" type="radio" id="sex-female" value="sex-female"  @if($me['sex'] == 'sex-female') checked @endif/> <label for="sex-female">女</label>
		</div>
		</div>

		<div class="form-group">
    	    <label for="date" class="col-sm-2 control-label">出生日期</label>
    	    <div class="col-sm-4">
        	      <input type="date" id="date" class="form-control" value="{{$me['date']}}" name="date">
    	    </div>
        </div>
	<div class="form-group">
    	    <label for="address" class="col-sm-2 control-label">通讯地址</label>
    	    <div class="col-sm-10">
        	      <input type="text" class="form-control" id="address" placeholder="详细通讯地址" name="address" value="{{$me['address']}}" >
		<p>此地址将用于寄送纪念品以及活动报名所用，不会用作其他</p>
    	    </div>
        </div>
	<div class="form-group">
    	    <label for="website" class="col-sm-2 control-label">个人网址</label>
    	    <div class="col-sm-10">
        	      <input type="url" class="form-control" id="website" value="{{$me['url']}}" name="url" placeholder="http://example.com" >
    	    </div>
        </div>
	<div class="form-group">
    	    <label for="website" class="col-sm-2 control-label">自我简介</label>
    	    <div class="col-sm-10">
        	     <textarea class="form-control" rows="4" placeholder="自我简介" name="introduce">{{$me['introduce']}}</textarea>
    	    </div>
        </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-success">Sign in</button>
	    </div>
	  </div>
        {{ Form::close();}}
</div>
<div class="col-md-3">
{{ Form::open(array('method' => 'PUT', 'files' => true, 'class' => 'form','route' => 'account.postChangePortrait')) }}
        <img class=" img-thumbnail img-circle" width="220" height="220" src="{{ URL::asset('/portrait/large/'.Auth::user()->portrait) }}" alt="头像（大）">
        {{ Form::file('portrait') }}
        @include('Model.notification')
        <button class="btn btn-md btn-success" type="submit">上传头像</button>
    {{ Form::close() }}
</div>

    </div>
@stop
