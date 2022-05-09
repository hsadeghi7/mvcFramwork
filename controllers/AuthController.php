<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login()
    {
        $this->setLayout('auth');
        echo $this->render('login');
    }
    public function register(Request $request)
    {
        $registerModel = new RegisterModel;
        if ($request->isPost()) {
            $this->setLayout('auth');
            $registerModel->loadData($request->getBody());

            if ($registerModel->validation() && $registerModel->register()) {
                return 'succes';
            }
            return $this->render("register", [
                "model" => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            "model" => $registerModel
        ]);
    }
}
