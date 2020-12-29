<?php

/**
 * Description of InvoiceInfo
 *
 * @author jiang.ding
 */
namespace weworkapi\api\datastructure\invoice;



class BatchUpdateInvoiceStatusReq
{ 
    public $openid = null; // string
    public $reimburse_status = null; // string
    public $invoice_list = null; // InvoiceItem array 
}