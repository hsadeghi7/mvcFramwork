<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{

    public function login()
    {
        $this->setLayout('auth');
        echo $this->render('login');
    }
    public function register(Request $request)
    {
        $user = new User;
        if ($request->isPost()) {
            $this->setLayout('auth');
            $user->loadData($request->getBody());

            if ($user->validation() && $user->save()) {
                
                Application::$app->response->redirect('/');
            }
            return $this->render("register", [
                "model" => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            "model" => $user
        ]);
    }
}
