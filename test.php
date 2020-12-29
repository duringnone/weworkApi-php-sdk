<?php


include_once("api/src/CorpAPI.class.php");

// ʵ���� API ��
$api = new CorpAPI($corpId='ww55ca070cb9b7eb22', $secret='ktmzrVIlUH0UW63zi7-JyzsgTL9NfwUhHde6or6zwQY');

try { 
    // ���� User
    $user = new User();
    {
        $user->userid = "userid";
        $user->name = "name";
        $user->mobile = "131488888888";
        $user->email = "sbzhu@ipp.cas.cn";
        $user->department = array(1); 
    } 
    $api->UserCreate($user);

    // ��ȡUser
    $user = $api->UserGet("userid");

    // ɾ��User
    $api->UserDelete("userid"); 
} catch (Execption $e) {
    echo $e->getMessage() . "\n";
    $api->UserDelete("userid");
}