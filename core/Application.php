<?php

namespace app\core;


class Application
{
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public View $view;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public ?Controller $controller = null;
    public Session $session;
    public ?DbModel $user;
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller;
        $this->session = new Session;
        $this->db = new Database($config['db']);
        $this->view = new View;

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
            echo "<pre>";
            var_dump($this->user);
            exit;
        } else{
            $this->user = null;
        }

    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function run()
    {   try{

        echo $this->router->resolve();
    }catch(\Exception $e){
        $this->response->setStutusCode($e->getCode());
        echo $this->view->renderView('_error', [
            'exception' => $e
        ]);
    }
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user::primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {   
        $this->user = null; 
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
    
}
