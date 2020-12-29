<?php

/**
 * Description of GetLoginInfoRsp
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\serviceprovider;
use \weworkapi\utils\Utils;



class LoginCorpInfo
{ 
    public $corpid = null; // string

    static public function ParseFromArray($arr)
    { 
        $info = new LoginCorpInfo();

        $info->corpid = Utils::arrayGet($arr, "corpid"); 

        return $info;
    } 
}
