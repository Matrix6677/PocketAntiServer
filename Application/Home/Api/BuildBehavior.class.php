<?php
namespace Home\Api;

/**
 * 生成Token接口
 */
interface BuildBehavior
{
    /**
     * 生成私有资源下载链接
     * @param string $key
     * @param string $domain
     * @return string
     */
    public function buildPriUrl($key, $domain);

    /**
     * 生成上传所需的token
     * @param string $bucket 目标资源空间
     * @param string $key 资源名
     * @return string
     */
    public function buildUptoken($bucket, $key);
}

?>