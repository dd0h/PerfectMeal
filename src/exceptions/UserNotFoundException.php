<?php


class UserNotFoundException extends Exception
{
    public function errorMessage() {
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
            .': User not found';
        return $errorMsg;
    }
}