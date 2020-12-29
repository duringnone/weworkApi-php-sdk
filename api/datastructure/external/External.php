<?php

/**
 * 外部联系人
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\external;

use \weworkapi\utils\Utils;



class External {
    
    public $external_userid = null;
    public $name = null;	
    public $avatar = null;
    public $position = null;    //职位
    public $type = null;    //外部联系人类型，1-微信用户(暂时仅内测企业有此类型)，2-企业微信用户
    public $gender = null;
    public $unionid	= null;     //外部联系人的微信unionid
    public $corp_name = null;   //所在企业的简称
    public $corp_full_name = null;	//所在企业的主体名称
    public $external_profile = null;    //自定义展示信息

    static public function Array2User($arr)
    {
        $user = new External();

        $user->external_userid = Utils::arrayGet($arr, "external_userid");
        $user->name = Utils::arrayGet($arr, "name");
        $user->position = Utils::arrayGet($arr, "position");
        $user->avatar = Utils::arrayGet($arr, "avatar");
        $user->type = Utils::arrayGet($arr, "type");
        $user->gender = Utils::arrayGet($arr, "gender");
        $user->unionid = Utils::arrayGet($arr, "unionid");
        $user->corp_name = Utils::arrayGet($arr, "corp_name");
        $user->corp_full_name = Utils::arrayGet($arr, "corp_full_name");
        $user->external_profile = Utils::arrayGet($arr, "external_profile");
       
       # 组装属性列表
         if (array_key_exists("external_profile", $arr)) { 
            $profileList = $arr["external_profile"]["external_attr"];
            $typeArr = ['text','web','miniprogram'];     //external_profile.external_attrs的type类型
            if (is_array($profileList)) {
                $user->external_profile = new ExternalAttrList();
                foreach ($profileList as $item) {
                    $type = $item["type"];
                    $name = $item["name"];
                    $contentArr = $item[$typeArr[$type]];
                    $user->external_profile->external_attr['external_attr'][] = new ExternalAttrItem($type, $name,$contentArr);
                }
            }
        }
        
        return $user;
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
