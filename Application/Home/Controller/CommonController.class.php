<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller
{
    public $response = array();

    public function _initialize()
    {
        $this->response = array(
            'status' => 100 // 已登录
        );
        if (! isset($_SESSION['uid']))
        {
            $this->response['status'] = 101; // 未登录，请登录访问
        }
    }
}