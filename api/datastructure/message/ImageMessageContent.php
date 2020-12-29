<?php

/**
 * 图片类型消息
 *
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;



class ImageMessageContent
{
    public $msgtype = "image"; 
    private $media_id = null; // string

    public function __construct($media_id=null)
    {
        $this->media_id = $media_id;
    }

    public function CheckMessageSendArgs()
    {
        Utils::checkNotEmptyStr($this->media_id, "media_id");
    }

    public function MessageContent2Array(&$arr)
    {
        Utils::setIfNotNull($this->msgtype, "msgtype", $arr);

    $contentArr = array("media_id" => $this->media_id);
        Utils::setIfNotNull($contentArr, $this->msgtype, $arr);
    }
}