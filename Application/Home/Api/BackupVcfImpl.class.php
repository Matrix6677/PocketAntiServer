<?php
namespace Home\Api;
use Home\Api\BackupBehavior;

/**
 * 备份通讯录
 */
class BackupVcfImpl implements BackupBehavior
{

    public function backup()
    {
        echo session('uid') . '.vcf';
    }
}

?>