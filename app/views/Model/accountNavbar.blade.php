<?php
$is_active = function ($name = '') use ($active) {
    if ($active === $name)
        return ' class="active"';
    else
        return '';
}
?>

<!-- Fixed navbar -->
<!--<div class="navbar navbar-default " role="navigation"
   >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">切换菜单栏</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('account') }}">用户中心</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li{{ $is_active('changePassword') }}><a href="{{ route('account.changePassword') }}">修改密码</a></li>
                <li{{ $is_active('changePortrait') }}><a href="{{ route('account.changePortrait') }}">更改头像</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        [ {{ Auth::user()->email }} ]
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('FrontUserIndex')}}">回到YannUser</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('UserLogout')}}">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse --
    </div>
</div>-->
     <div class="col-md-2">
      <ul class="nav nav-pills nav-stacked ">
        <li {{ $is_active('account')}}><a href="{{ route('account')}}">我的个人资料</a></li>
        <li {{ $is_active('changePassword')}}><a href="{{ route('account.changePassword') }}">密码与绑定帐号</a></li>
      </ul>
     </div>
