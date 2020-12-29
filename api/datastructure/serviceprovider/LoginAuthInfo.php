<?php

/**
 * Description of GetLoginInfoRsp
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\serviceprovider;


class LoginAuthInfo
{ 
    public $department = null; // PartyInfo Array 

    static public function ParseFromArray($arr)
    { 
        $info = new LoginAuthInfo();

        foreach($arr["department"] as $item) {
            $info->department[] = PartyInfo::ParseFromArray($item);
        }
        return $info;
    } 
}