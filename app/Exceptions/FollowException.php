<?php

namespace App\Exceptions;

class FollowException extends BaseException
{
    protected $errorMessages = [
        'invalid-follow' => 'The following relation is not valid'
    ]; 
}