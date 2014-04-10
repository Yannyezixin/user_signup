<?php

class AuthorityController extends BaseController
{
    /**
     * 页面：登录
     *
     * @return Response
     */
    public function getSignin()
    {
    }

    /**
     * 动作：登录
     *
     * @return Response
     */
    public function postSignin()
    {
    }

    /**
     * 动作：退出
     *
     * @return Response
     */
    public function getLogout()
    {
    }

    /**
     * 页面：注册
     *
     * @return Response
     */
    public function getSignup()
    {
    }

    /**
     * 动作:注册
     *
     * @return Response
     */
    public function postSignup()
    {
    }

    /**
     * 页面：注册成功，提示激活
     * @param string $email 用户注册的邮箱
     *
     * @return Response
     */
    public function getSignupSuccess($email)
    {
    }

    /**
     * 动作：激活帐号
     * @param string $activationCode 激活令牌
     *
     * @return Response
     */
    public function getActivate($activationCode)
    {
    }

    /**
     * 页面：忘记密码，发送密码重置邮件
     *
     * @return Response
     */
    public function getForgotPassword()
    {
    }

    /**
     * 动作：忘记密码，发送密码重置邮件
     *
     * @return Response
     */
    public function postForgotPassword()
    {
    }

    /**
     * 页面：进行密码重置
     *
     * @return Response
     */
    public function getReset($token)
    {
    }

    /**
     * 动作：进行密码重置
     *
     * @return Response
     */
    public function postReset()
    {
    }
}
