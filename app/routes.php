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
