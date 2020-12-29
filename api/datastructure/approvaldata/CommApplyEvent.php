<?php

/**
 * Description of ApprovalDataList
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\approvaldata;
use \weworkapi\utils\Utils;

class CommApplyEvent { 
    public $apply_data = null; // string TODO, 文档太烂，看不懂, 无法解析！！待相关人员更新

    static public function ParseFromArray($arr)
    { 
        $info = new CommApplyEvent();

        $info->apply_data = Utils::arrayGet($arr, "apply_data"); 

        return $info;
    }
}
