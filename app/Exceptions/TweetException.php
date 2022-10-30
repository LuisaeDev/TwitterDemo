<?php

namespace App\Exceptions;

class TweetException extends BaseException
{
    protected $errorMessages = [
        'invalid-tweet-type' => 'El tipo de tweet "$type" no es válido',
        'forbidden-resource' => [ 'Se ha denegado el acceso al tweet solicitado', 403 ],
    ]; 
}