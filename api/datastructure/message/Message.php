<?php

//include_once(__DIR__."/../../utils/error.inc.php");
//include_once(__DIR__."/../../utils/Utils.class.php");
namespace weworkapi\api\datastructure\message;

use \weworkapi\utils\Utils;
use \weworkapi\utils\QyApiError;

/**
 * 应用消息处理
 */
class Message 
{ 
    public $sendToAll = false; // bool, 是否全员发送, 即文档所谓 @all
    public $touser = null; // string array
    public $toparty = null; // uint array
    public $totag = null; // uint array 
    public $agentid = null; // uint
    public $safe = null; // uint, 表示是否是保密消息，0表示否，1表示是，默认0 
    public $messageContent = null; // xxxMessageContent
    protected $msgObj = null;   //当前消息对象,jiang.ding加

    public function CheckMessageSendArgs()
    { 
        if (count($this->touser) > 1000) throw new QyApiError("touser should be no more than 1000");
        if (count($this->toparty) > 100) throw new QyApiError("toparty should be no more than 100");
        if (count($this->totag) > 100) throw new QyApiError("toparty should be no more than 100");

        if (is_null($this->messageContent)) throw new QyApiError("messageContent is empty");
        $this->getCurrMsgObj();     // 获取当前消息对象,并验证消息内容,(jiang.ding追加)
        $this->msgObj->CheckMessageSendArgs();

    }

    public function Message2Array()
    { 
        $args = array();
        
        if (true == $this->sendToAll) {
            Utils::setIfNotNull("@all", "touser", $args);
        } else { 
            //
            $touser_string = null;
            foreach($this->touser as $item) { 
                $touser_string = $touser_string . $item . "|";
            }
            Utils::setIfNotNull($touser_string, "touser", $args);

            //
            $toparty_string = null;
            foreach($this->toparty as $item) { 
                $toparty_string = $toparty_string . $item . "|";
            }
            Utils::setIfNotNull($toparty_string, "toparty", $args);

            //
            $totag_string = null;
            foreach($this->totag as $item) { 
                $totag_string = $totag_string . $item . "|";
            }
            Utils::setIfNotNull($totag_string, "totag", $args);
        }
        Utils::setIfNotNull($this->agentid, "agentid", $args);
        Utils::setIfNotNull($this->safe, "safe", $args);
        $this->msgObj->MessageContent2Array($args);

        return $args;
    }
    
    /**
     * 获取当前消息对象,并验证消息内容
     *       jiang.ding加
     */
    public function getCurrMsgObj() {
        $type = array_keys($this->messageContent)[0];   // 获取消息类型
        switch ($type) {    
            case 'text':    //文本
                $this->msgObj = new TextMessageContent($this->messageContent['text']);
                break;
             case 'textcard':   //文本卡片
                 $textCard = $this->messageContent['textcard'];
                $this->msgObj = new TextCardMessageContent($textCard['title'],$textCard['description'],$textCard['url'],$textCard['btntxt']);
                break;
             case 'image':  //图片
                 $this->msgObj = new ImageMessageContent($this->messageContent['image']['media_id']);
                break;
             case 'file':   //文件
                $this->msgObj = new FileMessageContent();
                break;
             case 'video':  //视频
                $video = $this->messageContent['video'];
                $this->msgObj = new VideoMessageContent($video['media_id'],$video['title'],$video['description']);
                break;
            case 'voice':  //音频
                $this->msgObj = new VoiceMessageContent($this->messageContent['voice']['media_id']);
                break;
            case 'news':  //mpnews类型与news类型相同点: 都是图文消息类型    `   //-- 待完善
//                $this->msgObj = new VideoMessageContent();
                break;
            case 'mpnews':  //mpnews类型与news类型的差异:mpnews的图文内容存储在企业微信;多次发送mpnews，会被认为是不同的图文，阅读、点赞的统计会被分开计算      //-- 待完善
            
//                $this->msgObj = new VideoMessageContent();
                break;
            default:
                throw new QyApiError('msgtype: '. $type .' is error');
                break;
        }
    }
}
