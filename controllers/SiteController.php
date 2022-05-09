<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{

    public function home()
    {
        $params = [
            'name' =>'hassan'
        ];
        return $this->render('home', $params);
    }
    public function contact()
    {
        return  $this->render('contact');
    }
    public function handleContact(Request $request)
    {

        $body = $request->getBody();
        return 'Handeling submmited data1';
    }
}