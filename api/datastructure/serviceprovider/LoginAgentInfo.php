<?php

/**
 * Description of GetLoginInfoRsp
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\serviceprovider;
use \weworkapi\utils\Utils;


class LoginAgentInfo 
{ 
    public $agentid = null; // uint 
    public $auth_type = null; // uint 

    static public function ParseFromArray($arr)
    { 
        $info = new LoginAgentInfo();

        $info->agentid = Utils::arrayGet($arr, "agentid"); 
        $info->auth_type = Utils::arrayGet($arr, "auth_type"); 

        return $info;
    } 
}
