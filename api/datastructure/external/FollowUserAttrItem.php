<?php

/**
 * 修改
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\external;


class FollowUserAttrItem
{
    public $userid = null;  //添加了此外部联系人的企业成员userid
    public $remark = null;  //该成员对此外部联系人的备注
    public $description = null; //该成员对此外部联系人的描述
    public $createtime = null;	//添加时间

    public function __construct($userid = null, $remark = null, $description = null, $createtime = null)
    {
            $this->userid = $userid;
            $this->remark = $remark;
            $this->description = $description;
            $this->createtime = $createtime;
    }
}

