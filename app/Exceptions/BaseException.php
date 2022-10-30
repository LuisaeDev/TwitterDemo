<?php

namespace App\Exceptions;

use App\Traits\ApiResponses;
use Exception;

class BaseException extends Exception

{
    use ApiResponses;
    
    public function __construct(string $code, array $params = [])
    {
        $this->code = $code;
        $message = $this->errorMessages[$this->code];
        if (is_array($message)) {
            $this->message = trans($message[0], $params);
            $this->httpError = $message[1];
        } else {
            $this->message = trans($message, $params);
            $this->httpError = 400;
        }
    }

    public function render()
    {
        return $this->responseError($this->getCode(), $this->getMessage(), [], $this->httpError);
    }
}