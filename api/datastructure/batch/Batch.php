<?php
//include_once(__DIR__."/../../utils/Utils.class.php");
namespace weworkapi\api\datastructure\batch;
use \weworkapi\utils\Utils;


class Batch { 

    static public function CheckBatchJobArgs($batchJobArgs)
    {
        Utils::checkNotEmptyStr($batchJobArgs->media_id, "media_id");
    } 

    static public function Array2BatchJobResult($arr,$jobId = '')
    {
        $batchJobResult = new BatchJobResult(); 

        $batchJobResult->status = Utils::arrayGet($arr, "status");
        $batchJobResult->type = Utils::arrayGet($arr, "type");
        $batchJobResult->total = Utils::arrayGet($arr, "total");
        $batchJobResult->percentage = Utils::arrayGet($arr, "percentage");
        $batchJobResult->result = Utils::arrayGet($arr, "result");
//        $batchJobResult->jobId = $jobId;  //jiang.ding加

        return $batchJobResult;
    }

	static public function IsJobFinished($batchJobResult)
	{
		return !is_null($batchJobResult->status) && $batchJobResult->status == BatchJobResult::STATUS_FINISHED;
	}
} // class Batch
