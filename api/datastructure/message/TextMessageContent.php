<?php

/**
 * 文本类型消息
 *
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;
use \weworkapi\utils\QyApiError;


class TextMessageContent
{
    public $msgtype = "text"; 
    private $content = null; // string

    public function __construct($content=null)
    {
        $this->content = $content;
    }

    public function CheckMessageSendArgs()
    {
        $len = strlen($this->content);
        if ($len == 0 || $len > 2048) {
            throw new QyApiError("invalid content length " . $len);
        }
    }

    public function MessageContent2Array(&$arr)
    {
        Utils::setIfNotNull($this->msgtype, "msgtype", $arr);
        $contentArr = array("content" => $this->content);
        Utils::setIfNotNull($contentArr, $this->msgtype, $arr);
    }
}
