<?php

namespace weworkapi\utils;

/**
 * 这个异常类是后面加的,SDK中没有
 *
 * @author jiang.ding
 */
class InternalError  extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
