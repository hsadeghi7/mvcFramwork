<?php

namespace app\core;
class Response{

    public function setStutusCode(int $code)
    {
        http_response_code($code);
    }
    public function redirect(string $path)
    {
       header('Location:'.$path);
    }
}