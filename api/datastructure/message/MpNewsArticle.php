<?php

/**
 * 图文类型消息的标题
 *  注意: 
 *      1) mpnews类型与news类型的差异:mpnews的图文内容存储在企业微信;
 *      2) 多次发送mpnews，会被认为是不同的图文，阅读、点赞的统计会被分开计算
 * 
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;


class MpNewsArticle { 
    public $title = null; // string
    public $thumb_media_id = null; // string
    public $author = null; // string
    public $content_source_url = null; // string
    public $content = null; // string
    public $digest = null; // string

    public function __construct($title=null, $thumb_media_id=null, $author=null, $content_source_url=null,$content=null,$digest=null)
        {
        $this->title = $title;
        $this->thumb_media_id = $thumb_media_id;
        $this->author = $author;
        $this->content_source_url = $content_source_url;
        $this->content = $content;
        $this->digest = $digest;
    }

    public function CheckMessageSendArgs()
    { 
        Utils::checkNotEmptyStr($this->title, "title");
        Utils::checkNotEmptyStr($this->thumb_media_id, "thumb_media_id");
        Utils::checkNotEmptyStr($this->content, "content");
    }

    public function Article2Array() 
    {
        $args = array();
        Utils::setIfNotNull($this->title, "title", $args);
        Utils::setIfNotNull($this->thumb_media_id , "thumb_media_id", $args);
        Utils::setIfNotNull($this->author, "author", $args);
        Utils::setIfNotNull($this->content_source_url, "content_source_url", $args);
        Utils::setIfNotNull($this->content, "content", $args);
        Utils::setIfNotNull($this->digest, "digest", $args);

        return $args;
    }
}
