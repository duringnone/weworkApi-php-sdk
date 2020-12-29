<?php

/**
 * Description of CheckinInfo
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\checkoption;

use \weworkapi\utils\Utils;


class SpeOffDays { 
    public $timestamp = null; // uint 
    public $notes = null; // string
    public $checkintime = null; // CheckinTime array 

    public static function ParseFromArray($arr)
    {
        $info = new SpeOffDays();

        $info->timestamp = Utils::arrayGet($arr, "timestamp");
        $info->notes = Utils::arrayGet($arr, "notes");

        foreach($arr["checkintime"] as $item) { 
            $info->checkintime[] = CheckinTime::ParseFromArray($item);
        }

        return $info;
    }
}