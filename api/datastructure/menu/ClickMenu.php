<?php

/**
 * 企业微信主页点击按钮(点击发送消息)
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\menu;

use weworkapi\utils\Utils;


class ClickMenu {
    public $type = "click";
    public $name = null; // string
    public $key = null; // string

    public function __construct($name=null, $key=null, $xxmenuArray=null)
    {
        $this->name = $name;
        $this->key = $key;
    }

    /**
     * 生成菜单(点击按钮)
     * @param type $arr
     * @return object
     */
    public static function Array2Menu($arr)
    {
        $menu = new ClickMenu();
        $menu->type = Utils::arrayGet($arr, "type");
        $menu->name = Utils::arrayGet($arr, "name");
        $menu->key = Utils::arrayGet($arr, "key");

        return $menu;
    }
}

