<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 登录状态验证类
 */
class CommonController extends Controller
{
    public $response = array();

    public function _initialize()
    {
        $this->response['status'] = 101; // 已登录
        if (! isset($_SESSION['uid']))
        {
            $this->response['status'] = 101; // 未登录，请登录访问
        }
    }
}