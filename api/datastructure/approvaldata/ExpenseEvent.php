<?php

/**
 * Description of ApprovalDataList
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\approvaldata;
use \weworkapi\utils\Utils;

class ExpenseEvent { 
    public $expense_type = null; // int 
    public $reason = null; // string 
    public $item = null; // ExpenseItem array

    static public function ParseFromArray($arr)
    { 
        $info = new ExpenseEvent();

        $info->expense_type = Utils::arrayGet($arr, "expense_type"); 
        $info->reason = Utils::arrayGet($arr, "reason"); 
        foreach($arr["item"] as $item) {
            $info->item[] = ExpenseItem::ParseFromArray($item);
        }

        return $info;
    }
}