<?php

/**
 * 外部联系人的自定义展示信息，可以有多个字段和多种类型，包括文本，网页和小程序，仅当联系人类型是企业微信用户时有此字段，字段详情见对外属性；
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\external;
use \weworkapi\utils\ParameterError;

class ExternalAttrItem
{
    public $type = null;        //0-文本，1-网页,2-小程序
    public $name = null;        // 对应类型的标题名称,如: type=0时,name为文本名称
    public $attrList = null;    // 属性列表数组
    public $typeArr = ['text','web','miniprogram'];

    public function __construct($type = null, $name = null, $attrList = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->getAttrList($attrList);

    }

    public function getAttrList() {
        switch ($this->typeArr[$this->type]) {
            case 'text':    //文本类型
                $this->attrList = [
                    'text'=>$attrList
                ];
                break;
            case 'web':     //网页类型
                $this->attrList = [
                    'web'=>$attrList
                ];
                break;      //小程序类型
            case 'miniprogram':
                $this->attrList = [
                    'miniprogram'=>$attrList
                ];
                break;
            default:
                throw new ParameterError('无效的external_profile.external_attr 类型');
                break;
        }
    }

}

