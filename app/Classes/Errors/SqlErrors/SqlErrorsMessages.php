<?php

namespace App\Classes\Errors\SqlErrors;

use App\Classes\Errors\SqlErrors\Types\SqlErrorMessagesInterface;

class SqlErrorsMessages
{
    private $errorCode = '';
    private $entity;

    public function __construct(SqlErrorMessagesInterface $entity)
    {
        $this->entity = $entity;
    }

    public function getAlertMessage()
    {
        return $this->getEntity()
                    ->setErrorCode($this->getErrorCode())
                    ->getMessage();
    }

    /**
     * @return string
     */
    public function getErrorCode() : string
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return SqlErrorsMessages
     */
    public function setErrorCode(string $errorCode) : SqlErrorsMessages
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
