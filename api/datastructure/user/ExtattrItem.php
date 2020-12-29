<?php

/**
 * 修改
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\user;


class ExtattrItem
{
	public $name = null;
	public $value = null;

	public function __construct($name = null, $value = null)
	{
		$this->name = $name;
		$this->value = $value;
	}
}

