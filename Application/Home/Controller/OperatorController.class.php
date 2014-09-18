<?php
namespace Home\Controller;
use Home\Controller\CommonController;
use Home\Api\BackupBehavior;
use Home\Api\BackupSMSImpl;
use Home\Api\BackupVcfImpl;

/**
 * 操作员
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
        $tag = I('tag');
        switch ($tag) {
            case 'backup_sms': // 备份短信
                $this->setBackupBehavior(new BackupSMSImpl());
                $this->bb->backup();
                break;
            case 'backup_vcf': // 备份通讯录
                $this->setBackupBehavior(new BackupVcfImpl());
                $this->bb->backup();
                break;
        }
    }

    /**
     * 设置备份行为
     * @param BackupBehavior $bb
     */
    public function setBackupBehavior(BackupBehavior $bb)
    {
        $this->bb = $bb;
    }
}
?>