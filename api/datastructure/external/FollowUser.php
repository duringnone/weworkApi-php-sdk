<?php

/**
 * 外部联系人涉及的成员列表
 *
 * @author jiang.ding
 */

namespace weworkapi\api\datastructure\external;

use \weworkapi\utils\Utils;


class FollowUser {
    
    public $follow_user = null;  //添加了此外部联系人的企业成员信息
        
     static public function Array2User($arr)
    {
        $followUser = new FollowUser();
        
        # 组装成员列表
        if (is_array($arr)) {
            foreach ($arr as $item) {
                $userid = $item["userid"];
                $remark = $item["remark"];
                $description = $item["description"];
                $createtime = $item["createtime"];
                $followUser->follow_user[] = new FollowUserAttrItem($userid, $remark,$description,$createtime);
            }
        }
        return $followUser;
    }

    static public function Array2UserList($arr)
    {
        $userList = $arr["userlist"];

        $retUserList = array();
        if (is_array($userList)) {
            foreach ($userList as $item) {
                $user = User::Array2User($item);
                $retUserList[] = $user;
            }
        }
        return $retUserList;
    }

    static public function CheckUserCreateArgs($user)
    { 
        Utils::checkNotEmptyStr($user->userid, "userid"); 
        Utils::checkNotEmptyStr($user->name, "name");
        Utils::checkNotEmptyArray($user->department, "department");
    }

    static public function CheckUserUpdateArgs($user)
    { 
        Utils::checkNotEmptyStr($user->external_userid, "external_userid");
    } 

    static public function CheckuserBatchDeleteArgs($userIdList)
    {
        Utils::checkNotEmptyArray($userIdList, "userid list");
        foreach ($userIdList as $userId) {
                Utils::checkNotEmptyStr($userId, "userid");
        }
        if (count($userIdList) > 200) {
            throw QyApiError("no more than 200 userid once");
        }
    }

}
