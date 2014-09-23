<?php
namespace Home\Api;
use Home\Api\BuildBehavior;
require_once ('Application/Lib/qiniu/rs.php');

class BuildImpl implements BuildBehavior
{

    public function buildPriUrl($key, $domain)
    {
        $accessKey = C('QINIU_ACCESS_KEY');
        $secretKey = C('QINIU_SECRET_KEY');
        Qiniu_setKeys($accessKey, $secretKey);
        // $baseUrl 就是您要访问资源的地址
        $baseUrl = Qiniu_RS_MakeBaseUrl($domain, $key);
        $getPolicy = new \Qiniu_RS_GetPolicy();
        $privateUrl = $getPolicy->MakeRequest($baseUrl, null);
        echo $privateUrl;
    }

    public function buildUptoken($bucket, $key)
    {
        $accessKey = C('QINIU_ACCESS_KEY');
        $secretKey = C('QINIU_SECRET_KEY');
        Qiniu_setKeys($accessKey, $secretKey);
        $putPolicy = new \Qiniu_RS_PutPolicy($bucket . ':' . $key);
        $upToken = $putPolicy->Token(null);
        echo $upToken;
    }
}

?>