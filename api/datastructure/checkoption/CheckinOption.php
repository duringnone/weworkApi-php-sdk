<?php

//include_once(__DIR__."/../../utils/Utils.class.php");
namespace weworkapi\api\datastructure\checkoption;

use \weworkapi\utils\Utils;


class CheckinOption 
{
    public $info = null; // CheckinInfo array

    static public function ParseFromArray($arr)
    { 
        $info = new CheckinOption();

        foreach($arr["info"] as $item) { 
            $info->info[] = CheckinInfo::ParseFromArray($item);
        }

        return $info;
    }
}

