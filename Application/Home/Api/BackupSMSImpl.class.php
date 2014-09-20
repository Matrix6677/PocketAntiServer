<?php
namespace Home\Api;
use Home\Api\BackupBehavior;

/**
 * 备份短信
 */
class BackupSMSImpl implements BackupBehavior
{

    public function backup()
    {
        echo session('uid') . '.xml';
    }
}
?>