<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\LoginForm;

class AuthController extends Controller
{
    
    public function login(Request $request, Response $response)
    {
        
        $loginForm = new LoginForm;
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validation() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }
    public function register(Request $request)
    {
        $user = new User;
        if ($request->isPost()) {
            $this->setLayout('auth');
            $user->loadData($request->getBody());
            if ($user->validation() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
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

    public function logout(Request $request, Response $response)
    {
       Application::$app->logout();
       $response->redirect('/');
    }
}
