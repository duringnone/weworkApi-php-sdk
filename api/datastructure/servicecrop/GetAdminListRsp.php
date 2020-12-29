<?php

/**
 * Description of SetSessionInfoReq
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\servicecrop;


class GetAdminListRsp
{ 
    public $admin = null; // AppAdmin array

    static public function ParseFromArray($arr)
    { 
        $info = new GetAdminListRsp();

        foreach($arr["admin"] as $item) {
            $info->admin[] = AppAdmin::ParseFromArray($item);
        }

        return $info;
    }
}