<?php

/**
 * Description of SetSessionInfoReq
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\servicecrop;
use \weworkapi\utils\Utils;


class SetSessionInfoReq { 
    public $pre_auth_code = null; // string
    public $session_info = null; // SessionInfo

    public function FormatArgs()
    { 
        Utils::checkNotEmptyStr($this->pre_auth_code, "pre_auth_code");

        $args = array();

        $args["pre_auth_code"] = $this->pre_auth_code;
        $args["session_info"] = $this->session_info->FormatArgs();

        return $args;
    }
} 
