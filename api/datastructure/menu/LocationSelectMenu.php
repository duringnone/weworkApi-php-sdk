<?php

/**
 * Description of SubMenu
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\menu;

use weworkapi\utils\Utils;


class LocationSelectMenu { 
    public $type = "location_select";
    public $name = null; // string
    public $key = null; // string

	public function __construct($name=null, $key=null, $xxmenuArray=null)
	{
        $this->name = $name;
        $this->key = $key;
	}

    public static function Array2Menu($arr)
    {
        $menu = new LocationSelectMenu();

        $menu->type = Utils::arrayGet($arr, "type");
        $menu->name = Utils::arrayGet($arr, "name");
        $menu->key = Utils::arrayGet($arr, "key");

        return $menu;
    }
}