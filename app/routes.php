<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix'=> '','before' => 'front'), function(){
    $Users = 'UserController@';

    #首页显示
    Route::get('/',array('as' => 'FrontUserIndex','uses' => $Users.'getIndex'));
});

/*
|--------------------------------------------------------------------------
|  基础权限
|--------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'auth'),function() {
    $Authority = 'AuthorityController@';
    #退出
    Route::get('logout',array('as' => 'UserLogout','uses' => $Authority.'getLogout'));
    Route::group(array('before' => 'guest'), function() use($Authority) {
        #登录
        Route::get('signin',array('as' => 'UserSignin', 'uses' => $Authority.'getSignin'));
        Route::post('signin',$Authority.'postSignin');
        #注册
        Route::get('signup',array('as' => 'UserSignup', 'uses' => $Authority.'getSignup'));
        Route::post('signup',$Authority.'postSignup');
        #注册成功提示用户激活
        Route::get('success/{email}',array('as' => 'UserSignupSuccess', 'uses' => $Authority.'getSignupSuccess'));
        #激活帐号
        Route::get('activate/{activationCode}',array('as' => 'UserActivate', 'uses' => $Authority.'getActivate'));
        #忘记密码
        Route::get('forgot-password',array('as' => 'UserForgotPassword', 'uses' => $Authority.'getForgotPassword'));
        Route::post('forgot-password',$Authority.'postForgotPassword');
        #密码重置
        Route::get('forgot-password/{token}',array('as' => 'UserReset', 'uses' => $Authority.'getReset'));
        Route::post('forgot-password/{token}',$Authority.'postReset');
    });
});

/*
|-------------------------------------------------------------------------
| 用户中心
|-------------------------------------------------------------------------
 */
Route::group(array('prefix' => 'account','before' => 'auth','before' => 'front'),function () {
    $Account = 'AccountController@';
    # 用户中心首页
    Route::get('/', array('as' => 'account', 'uses' => $Account.'getIndex'));
    Route::post('/', $Account.'postAccount');
    # 修改当前账号密码
    Route::get('change-password', array('as' => 'account.changePassword', 'uses' => $Account.'getChangePassword'));
    Route::put('change-password', $Account.'putChangePassword');
    # 更改头像
    Route::get('change-portrait', array('as' => 'account.changePortrait', 'uses' => $Account.'getChangePortrait'));
    Route::put('change-portrait', array('as' => 'account.postChangePortrait', 'uses' => $Account.'putChangePortrait'));
    # 我的评论管理
    Route::get('my-comments', array('as' => 'account.myComments', 'uses' => $Account.'getMyComments'));
    Route::delete('my-comments/{id}', array('as' => 'account.myComments.destroy', 'uses' => $Account.'deleteMyComment'));
});
