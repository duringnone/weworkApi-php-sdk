<?php

/**
 * Description of InvoiceInfo
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\invoice;


class InvoiceInfo
{
    public $card_id = null; // string
    public $begin_time = null; // string
    public $end_time = null; // string
    public $openid = null; // string
    public $type = null; // string
    public $payee = null; // string
    public $detail = null; // string
    public $user_info = null; // InvoiceUserInfo 
}
