<?php

namespace App\Classes\Errors\SqlErrors\Types;

class UserErrorsHandler implements SqlErrorMessagesInterface
{
    private $errorCode;

    public function getMessage() : string
    {
        $message = 'Ошибка сохранения данных';

        switch ((int)$this->getErrorCode()) {
            case 1062:
            {
                $message = "Пользователь под таким логином уже зарезервирован";
            }
        }

        return $message;
    }

    /**
     * @param mixed $errorCode
     * @return UserErrorsHandler
     */
    public function setErrorCode($errorCode) : UserErrorsHandler
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
