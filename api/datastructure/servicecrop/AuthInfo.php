<?php

/**
 * Description of SetSessionInfoReq
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\servicecrop;


class AuthInfo 
{ 
    public $agent = null; // AgentBriefEx array

    static public function ParseFromArray($arr)
    { 
        $info = new AuthInfo();

        foreach($arr["agent"] as $item) { 
            $info->agent[] = AgentBriefEx::ParseFromArray($item);
        }

        return $info;
    }
}
