<?php

class AccountController extends BaseController
{
    /**
     * 页面：用户中心首页
     *
     * @return Response
     */
    public function getIndex()
    {
        return View::make('account.index');
    }

    /**
     * 动作：修改用户个人信息
     *
     * @return Response
     */
    public function postAccount()
    {
        //获取表单数据
        $data = Input::all();
        //创建验证规则
        $rules = array(
            'name' => 'required|between:2,20',
        );
        //自定义验证消息
        $messages = array(
            'name.required' => '请输入昵称',
            'name.between' => '昵称长度请保持在:min到:max之间'
        );
        //开始验证
        $validator = Validator::make($data, $rules, $messages);
        if($validator->passes()) {
            $user = Auth::user();
            $user->name = Input::get('name');
            $user->sex = Input::get('sex');
            $user->date = Input::get('date');
            $user->address = Input::get('address');
            $user->url = Input::get('url');
            $user->introduce = Input::get('introduce');
            if ($user->save()) {
                return Redirect::back()
                    ->with('success','更新成功');
            } else {
                return Redirect::back()
                    ->with('error','用户个人信息更新失败，请稍后再试');
            }
        } else {
            return Redirect::back() -> withInput() -> withErrors($validator);
        }
    }

    /**
     * 页面：修改当前帐号密码
     *
     * @return Response
     */
    public function getChangePassword()
    {
        return View::make('account.changePassword');
    }

    /**
     * 动作：修改当前帐号密码
     *
     * @return Response
     */
    public function putChangePassword()
    {
        // 获取所有的表单数据
        $data = Input::all();
        // 验证旧密码
        if(! Hash::check($data['password_old'],Auth::user()->password) )
            return Redirect::back()->withErrors($this->messages->add('password_old','原密码错误'));
        //创建验证规则
        $rules = array(
            'password' => 'alpha_dash|between:6,16|confirmed',
        );
        //自定义验证消息
        $messages = array(
            'password.alpha_dash' => '密码格式不正确',
            'password.between' => '密码长度保持在:min到:max之间',
            'password.confirmed' => '两次输入的密码不一致'
        );
        //开始验证
        $validator = Validator::make($data,$rules,$messages);
        if($validator->passes()) {
            // 验证成功
            // 更新用户
            $user = Auth::user();
            $user->password = $data['password'];
            if($user->save()){
                //更新成功
                Auth::logout();
                return Redirect::route('UserSignin')
                    ->withInput()
                    ->with('success','密码修改成功,请重新登录');
            } else {
                //更新失败
                return Redirect::back()
                    ->withInput()
                    ->with('error','密码重置失败');
            }
        } else {
                // 验证失败，跳回
                return Redirect::back()->withInput->withErrors($validator);
        }
    }

    /**
     * 页面：更改头像
     *
     * @return Response
     */
    public function getChangePortrait()
    {
        return View::make('account.changePortrait');
    }

    /**
     * 动作：更改头像
     *
     * @return Response
     */
    public function putChangePortrait()
    {
        // 获取所有表单的数据
        $data = Input::all();
        // 创建验证规则
        $rules = array(
            'portrait' => 'required|mimes:jpeg,gif,png|max:1024'
        );
        // 自定义验证消息
        $messages = array(
            'portrait.required' => '请选择需要上传的图片',
            'portrait.mimes' => '请上传 :values 格式的图片',
            'portrait.max' => '图片大小不能超过1m',
        );
        // 开始验证
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
            //验证成功
            $image = Input::file('portrait');
            $ext = $image->guessClientExtension(); // 根据 mine 类型取得真是拓展名
            $fullname = $image->getClientOriginalName(); // 客户端文件名，包括客户端拓展名
            $hashname = date('H.i.s').'-'.md5($fullname).'.'.$ext;
            //图片信息入库
            $user = Auth::user();
            $oldImage = $user->portrait;
            $user->portrait = $hashname;
            $user->save();
            // 存储不同尺寸的图片
            $portrait = Image::make($image->getRealPath());
            $portrait->resize(220,200)->save(public_path('portrait/large/'.$hashname));
            $portrait->resize(128,128)->save(public_path('portrait/medium/'.$hashname));
            $portrait->resize(64,64)->save(public_path('portrait/small/'.$hashname));
            //删除旧图像
            File::delete(
                public_path('portrait/large/'.$oldImage),
                public_path('portrait/medium/'.$oldImage),
                public_path('portrait/small/'.$oldImage)
            );
            //返回成功信息
            return Redirect::back()->with('success','操作成功');
        } else {
            //验证失败
            return Redirect::back()->with('error',$validator->messages()->first());
        }
    }
}
