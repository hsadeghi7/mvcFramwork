<?php

namespace app\core\exeption;

class NotFoundExeption extends \Exception
{
    protected $message = 'Page not found!';
    protected $code = 404;
}
