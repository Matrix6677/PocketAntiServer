<?php
namespace Home\Controller;
use Home\Controller\CommonController;
use Home\Api\BuildBehavior;
use Home\Api\BuildImpl;

/**
 * 用户操作类
 */
class OperatorController extends CommonController
{
    protected $bb = null;

    public function index()
    {
        if ($this->response['status'] != 100)
        {
            return;
        }
        $tag = I('post.tag', '', 'htmlspecialchars');
        switch ($tag) {
            case 'build_token': // 生成上传所需的uptoken
                $this->setBuildBehavior(new BuildImpl());
                $bucket = I('post.bucket', '', 'htmlspecialchars');
                $key = I('post.key', '', 'htmlspecialchars');
                $this->bb->buildUptoken($bucket, $key);
                break;
            case 'build_priurl': // 生成文件下载地址
                $key = I('post.key', '', 'htmlspecialchars');
                $domain = I('post.domain', '', 'htmlspecialchars');
                $this->setBuildBehavior(new BuildImpl());
                $this->bb->buildPriUrl($key, $domain);
                break;
        }
    }

    public function setBuildBehavior(BuildBehavior $bb)
    {
        $this->bb = $bb;
    }
}
?>