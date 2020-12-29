<?php

/**
 * 文本卡片类型消息
 *
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;


class TextCardMessageContent
{
    public $msgtype = "textcard"; 
    public $title = null; // string
    public $description = null; // string
    public $url = null; // string
    public $btntxt = null; // string

    public function __construct($title=null, $description=null, $url=null, $btntxt=null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->btntxt = $btntxt;
    }

    public function CheckMessageSendArgs()
    {
        Utils::checkNotEmptyStr($this->title, "title");
        Utils::checkNotEmptyStr($this->description, "description");
        Utils::checkNotEmptyStr($this->url, "url");
    }

    public function MessageContent2Array(&$arr)
    {
        Utils::setIfNotNull($this->msgtype, "msgtype", $arr);

    $contentArr = array();
    {
        Utils::setIfNotNull($this->title, "title", $contentArr);
        Utils::setIfNotNull($this->description, "description", $contentArr);
        Utils::setIfNotNull($this->url, "url", $contentArr);
        Utils::setIfNotNull($this->btntxt, "btntxt", $contentArr);
    }
            Utils::setIfNotNull($contentArr, $this->msgtype, $arr);
    }
}