<?php

/**
 * Description of SendWorkWxRedpackReq
 *
 * @author jiang.ding
 */

namespace \weworkapi\api\datastructure\pay;


class QueryWorkWxRedpackReq
{ 
    public $nonce_str = null; // string
    public $sign = null; // string
    public $mch_billno = null; // string
    public $mch_id = null; // string
    public $appid = null; // string
}
