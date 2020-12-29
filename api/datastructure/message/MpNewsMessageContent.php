<?php

/**
 * 图文类型消息的内容
 *  注意: 
 *      1) mpnews类型与news类型的差异:mpnews的图文内容存储在企业微信;
 *      2) 多次发送mpnews，会被认为是不同的图文，阅读、点赞的统计会被分开计算
 * 
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;
use \weworkapi\utils\QyApiError;



class MpNewsMessageContent
{
    public $msgtype = "mpnews"; 
    public $articles = null; // MpNewsArticle array

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    public function CheckMessageSendArgs()
    {
        $size = count($this->articles);
        if ($size < 1 || $size > 8) throw QyApiError("1~8 articles should be given");

        foreach($this->articles as $item) { 
            $item->CheckMessageSendArgs();
        }
    }

    public function MessageContent2Array(&$arr)
    {
        Utils::setIfNotNull($this->msgtype, "msgtype", $arr);
        $articleList = array();
        foreach($this->articles as $item) {
            $articleList[] = $item->Article2Array();
        }
        $arr[$this->msgtype]["articles"] = $articleList;
    }
}
