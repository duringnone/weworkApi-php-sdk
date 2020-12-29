<?php

/**
 * Description of CheckinInfo
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\checkoption;

use \weworkapi\utils\Utils;



class CheckinTime { 
    public $work_sec = null; // int 
    public $off_work_sec = null; // int 
    public $remind_work_sec = null; // int 
    public $remind_off_work_sec = null; // int 

    public static function ParseFromArray($arr)
    {
        $info = new CheckinTime();

        $info->work_sec = Utils::arrayGet($arr, "work_sec");
        $info->off_work_sec = Utils::arrayGet($arr, "off_work_sec");
        $info->remind_work_sec = Utils::arrayGet($arr, "remind_work_sec");
        $info->remind_off_work_sec = Utils::arrayGet($arr, "remind_off_work_sec");

        return $info;
    }
}