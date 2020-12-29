<?php

/**
 * Description of GetLoginInfoRsp
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\serviceprovider;
use \weworkapi\utils\Utils;


class ContactSync
{ 
    public $access_token = null; // string
    public $expires_in = null; // uint 

    static public function ParseFromArray($arr)
    { 
        $info = new ContactSync();

        $info->access_token = Utils::arrayGet($arr, "access_token"); 
        $info->expires_in = Utils::arrayGet($arr, "expires_in"); 

        return $info;
    } 
}