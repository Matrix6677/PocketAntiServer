<?php
namespace Home\Controller;
use Think\Controller;

class LRController extends Controller
{
    protected $response = array(
        'status' => 0
    );

    public function index()
    {
        $tag = I('tag');
        switch ($tag) {
            case 'login':
                $this->login();
                break;
            case 'register':
                $this->register();
                break;
        }
    }

    /**
     * 登录操作
     * @return status=0 用户名或密码为空<br>
     *         status=1 不存在用户或密码错误<br>
     *         status=2 用户被锁定<br>
     *         status=3 登录成功<br>
     */
    public function login()
    {
        $user_name = I('user_name');
        $user_pwd = I('user_pwd', '', 'md5');
        if (! empty($user_name) && ! empty($user_pwd))
        {
            $user = M('user')->where(array(
                'user_name' => $user_name
            ))->find(); // 查询用户
            if (! $user || $user['user_pwd'] != $user_pwd)
            {
                $this->response['status'] = 1; // 不存在用户或密码错误
            } elseif ($user['lock'])
            {
                $this->response['status'] = 2; // 用户被锁定
            } else
            {
                $data = array(
                    'last_time' => date("Y-m-d H:i:s", strtotime('now')),
                    'last_ip' => get_client_ip()
                );
                M('user')->where(array(
                    'user_name' => $user_name
                ))->save($data); // 更新用户表
                session('uid', $user['uid']);
                session('user_name', $user['user_name']);
                $this->response['status'] = 3; // 登陆成功
                $this->response['session_id'] = session_id();
                $this->response['uid'] = $user['uid'];
                $this->response['user_name'] = $user['user_name'];
            }
        }
        echo encode_json($this->response);
    }

    /**
     * 注册操作
     * @return status=0 用户名或密码为空<br>
     *         status=1 该用户名已注册<br>
     *         status=2 注册成功<br>
     */
    public function register()
    {
        $user_name = I('user_name');
        $user_pwd = I('user_pwd', '', 'md5');
        if (! empty($user_name) && ! empty($user_pwd))
        {
            $user = M('user');
            $isExist = $user->where('user_name="' . $user_name . '"')->count();
            if ($isExist > 0)
            {
                $this->response['status'] = 1; // 该用户名已注册
            } else
            {
                $data = array(
                    'uid' => md5($user_name),
                    'user_name' => $user_name,
                    'user_pwd' => $user_pwd,
                    'create_time' => date("Y-m-d H:i:s", strtotime('now')),
                    'last_ip' => get_client_ip()
                );
                if (M('user')->add($data))
                {
                    $this->response['status'] = 2; // 注册成功
                }
            }
        }
        echo encode_json($this->response);
    }
}
?>