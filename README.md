# WeworkApi-php-sdk 
[企业微信PHP-SDK_2.0(ThinkPHP5.*版本)] 

```
1.前情回顾:
此PHP-SDK是改进后版本(相对于本人之前上传的),对应CSDN的weworkapi_2.0.zip,改进有以下几点:
    1) 新增部分外部联系人处理的SDK代码(截止到目前,企业微信官方SDK中没有关于外部联系人处理的SDK代码)
    2) 新增外部联系人回调事件处理
    3) 修改并纠正了部分语法问题
    4) 修改了原SDK的回调类中的验证回调url有效性,加密方法,解密方法(根据企业微信官方修改记录所做的同步修改,并测试有效)
    5) 具体可参照本人CSDN的两篇博客,博客中会着重说明本人在开发时遇到的问题及其解决方案,包括注意事项, 一篇企业应用开发(已发表),一篇企业外部联系人回调事件(待发表/近期发表,注意更新)

2. 业务和框架版本: 企业微信PHP-SDK_2.0(ThinkPHP5.*版本)

3. sdk涉及的功能tag: 企业微信/PHP-SDK/ThinkPHP5.*版本/回调事件/外部联系人  

4. weworkApi-php-sdk部分"踩坑"分析: https://blog.csdn.net/duringnone/article/details/84194475

```



# About

weworkapi_php 是为了简化开发者对企业微信API接口的使用而设计的，API调用库系列之php版本    
包括企业API接口、消息回调处理方法、第三方开放接口等    
本库仅做示范用，并不保证完全无bug；另外，作者会不定期更新本库，但不保证与官方API接口文档同步，因此一切以[官方文档](https://work.weixin.qq.com/api/doc)为准。

更多来自个人开发者的其它语言的库推荐：   
python : https://github.com/sbzhu/weworkapi_python    
ruby ： https://github.com/mycolorway/wework    
php : https://github.com/sbzhu/weworkapi_php  

# Requirement
经测试，PHP 5.3.3 ~ 7.2.0 版本均可使用

# Director 

├── api // API 接口  
│   ├── datastructure // API接口需要使用到的一些数据结构  
│   ├── examples // API接口的测试用例  
│   ├── README.md  
│   └── src // API接口的关键逻辑  
├── callback // 消息回调的一些方法  
├── config.php   
├── README.md  
└── utils // 一些基础方法  


# Director's Detail
```
		├─weworkapi           
		│  ├─api        功能接口目录
		│  │  ├─datastructure      功能类目录
		│  │  │  ├─approvaldata	OA数据接口
		│  │  │  ├─batch				批量数据处理目录
		│  │  │  ├─checkdata		打卡数据目录1(OA数据子集)
		│  │  │  ├─checkoption	打卡数据目录2(OA数据子集)
		│  │  │  ├─external			外部联系人目录
		│  │  │  ├─invoice			电子发票目录
		│  │  │  ├─menu				自建应用主页菜单目录
		│  │  │  ├─message		自建应用消息目录
		│  │  │  ├─oauth				oAuth权限认证目录
		│  │  │  ├─pay				企业微信支付目录
		│  │  │  ├─servicecrop		第三方服务商功能类
		│  │  │  ├─servicecrop		第三方服务商功能类
		│  │  │  ├─tag			标签目录
		│  │  │  ├─user		企业成员目录
		│  │  │  ├─Agent.php		自建应用类
		│  │  │  └─Department.php	企业部门类
		│  │  ├─examples      测试例子目录(仅供参考,修改后可能无效)
		│  │  ├─ src     工具类目录(类似第一点中结束的Tool类作用)
		│  │  │  ├─API.php			工具基类
		│  │  │  ├─CorpAPI.php		企业工具类
		│  │  │  ├─ServiceCorpAPI.php 	为服务商开放的接口,使用应用授权的token
		│  │  │  └─ServiceProviderAPI.php 为服务商开放的接口,使用应用授权的token
		│  │
		│  ├─callback                回调操作(第三方或服务商回调的操作)
		│  │
		│  ├─utils                异常类目录
		│  │ ├─Utils.php          公共功能类
		│  │ ├─HttpUtils.php       的curl请求http参数处理类 
		│  │ └─...			其他的都是异常处理类
		│  │
		│  ├─config.php           调试配置文件
		│  ├─README.md 	
```


# Usage
将本项目下载到你的目录，既可直接引用相关文件  
```
include_once("api/src/CorpAPI.class.php");

// 实例化 API 类
$api = new CorpAPI($corpId='ww55ca070cb9b7eb22', $secret='ktmzrVIlUH0UW63zi7-JyzsgTL9NfwUhHde6or6zwQY');

try { 
    // 创建 User
    $user = new User();
    {
        $user->userid = "userid";
        $user->name = "name";
        $user->mobile = "131488888888";
        $user->email = "sbzhu@ipp.cas.cn";
        $user->department = array(1); 
    } 
    $api->UserCreate($user);

    // 获取User
    $user = $api->UserGet("userid");

    // 删除User
    $api->UserDelete("userid"); 
} catch (Execption $e)  {
    echo $e->getMessage() . "\n";
    $api->UserDelete("userid");
}
```
详细使用方法参考每个模块下的测试用例

# 关于token的缓存
token是需要缓存的，不能每次调用都去获取token，[否者会中频率限制](https://work.weixin.qq.com/api/doc#10013/%E7%AC%AC%E5%9B%9B%E6%AD%A5%EF%BC%9A%E7%BC%93%E5%AD%98%E5%92%8C%E5%88%B7%E6%96%B0access_token)  
在本库的设计里，token是以类里的一个变量缓存的  
比如api/src/CorpAPI.class.php 里的$accessToken变量  
在类的生命周期里，这个accessToken都是存在的， 当且仅当发现token过期，CorpAPI类会自动刷新token   
刷新机制在 api/src/API.class.php  
所以，使用时，只需要全局实例化一个CorpAPI类，不要析构它，就可一直用它调函数，不用关心 token  
```
$api = new CorpAPI(corpid, corpsecret);
$api->dosomething()
$api->dosomething()
$api->dosomething()
....
```
当然，如果要更严格的做的话，建议自行修改，全局缓存token，比如存redis、存文件等，失效周期设置为2小时。


