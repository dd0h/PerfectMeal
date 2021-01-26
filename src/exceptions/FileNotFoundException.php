<?php


class FileNotFoundException extends Exception
{
    public function errorMessage() {
        header("Status: 404 Not Found");
        echo "<h1>404 File not found</h1>";
    }
}