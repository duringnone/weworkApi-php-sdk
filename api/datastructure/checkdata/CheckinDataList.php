<?php

/**
 * Description of CheckinDataList
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\checkdata;

class CheckinDataList
{
    public $checkindata = null; // CheckinData array

    static public function ParseFromArray($arr)
    { 
        $info = new CheckinDataList();

        foreach($arr["checkindata"] as $item) { 
            $info->info[] = CheckinData::ParseFromArray($item);
        }

        return $info;
    }
}