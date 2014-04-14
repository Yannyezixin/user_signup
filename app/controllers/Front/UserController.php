<?php

class UserController extends BaseController
{
    /**
     * 页面:用户显示
     *
     * @return Response
     */
    public function getIndex()
    {
        return View::make('Front.Index');
    }
}
