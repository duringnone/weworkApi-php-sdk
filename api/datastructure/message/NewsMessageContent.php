<?php

/**
 * 图文消息类型的内容
 *
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;
use \weworkapi\utils\QyApiError;


class NewsMessageContent
{
    public $msgtype = "news"; 
    public $articles = null; // NewsArticle array

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