<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ URL::route('FrontUserIndex')}}">YannUser</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
      <li class="active"><a href="#">XXX</a></li>
      <li><a href="#">XXX</a></li>
   </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">xxx</a></li>
      <li class="dropdown">
    	@if(isset($active))
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $me['email']}}<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="">个人主页</a></li>
          <li><a href="{{ URL::route('account')}}">帐号设置</a></li>
          <li><a href="{{ URL::route('UserLogout')}}">退出登录</a></li>
          <li class="divider"></li>
          <li><a href="">帮助中心</a></li>
          <li><a href="">意见反馈</a></li>
        </ul>
    	@else
        <li><a href="{{ URL::route('UserSignin')}}" >登录</a></li>
        <li><a href="{{ URL::route('UserSignup')}}">注册</a></li>
        @endif
      </li>
     </ul>
  </div><!-- /.navbar-collapse -->
</nav>

