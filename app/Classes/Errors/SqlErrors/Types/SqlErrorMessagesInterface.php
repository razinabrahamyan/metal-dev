<?php

namespace App\Classes\Errors\SqlErrors\Types;

interface SqlErrorMessagesInterface
{
    public function setErrorCode(int $errorCode);

    public function getMessage() : string;
}
