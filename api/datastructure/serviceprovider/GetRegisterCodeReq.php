<?php

/**
 * Description of GetLoginInfoRsp
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\serviceprovider;
use \weworkapi\utils\Utils;


class GetRegisterCodeReq
{ 
    public $template_id = null; // string 
    public $corp_name = null; // string 
    public $admin_name = null; // string
    public $admin_mobile = null; // string

    public function FormatArgs()
    { 
        Utils::checkNotEmptyStr($this->template_id, "template_id");

        $args = array();

		Utils::setIfNotNull($this->template_id, "template_id", $args);
		Utils::setIfNotNull($this->corp_name, "corp_name", $args);
		Utils::setIfNotNull($this->admin_name, "admin_name", $args);
		Utils::setIfNotNull($this->admin_mobile, "admin_mobile", $args);

        return $args;
    }
}