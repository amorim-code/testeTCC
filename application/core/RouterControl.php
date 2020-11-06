<?php

namespace application\core;

class RouterControl
{
    private $url;
    private $controller;
    private $method;
    private $params = array();

    public function __construct()
    {

    }

    public function start($request)
    {
       if ($request['url'] != '') {
        $this->url = explode('/', $request['url']);

        $this->controller = ucfirst($this->url[0]);
        array_shift($this->url);
 
        $this->method = $this->url[0];
        array_shift($this->url);
 
        $this->params = $this->url;

        if($this->method == '')
        {
            $this->method = 'index';
        }
       } else {
        $this->controller = 'Login';
        $this->method = 'index';
       }
    }

    public function load()
    {
        $control = "application\\controllers\\" . $this->controller;
        $page = new $control;
        $page->{$this->method}();
    }

    /*
    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        $this->initialize();
        require_once('../application/config/router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $ex = explode('/', $uri);
    
        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {

        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                if($this->uri == "")
                {
                   // (new \application)
                }
                break;
        }
    }  

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);
            
            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
                
            }
            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();                    

                    break;
                } else {
                    //$this->executeController($get['call']);
                }
            }
        }
    }


    /*private function executeController($get)
    {
        $ex = explode('@', $get);
        if (!isset($ex[0]) || !isset($ex[1])) {
            (new \app\controller\MessageController)->message('Dados inválidos', 'Controller ou método não encontrado: ' . $get, 404);
            return;
        }

        $cont = 'app\\controller\\' . $ex[0];
        if (!class_exists($cont)) {
            (new \app\controller\MessageController)->message('Dados inválidos', 'Controller não encontrada: ' . $get, 404);
            return;
        }


        if (!method_exists($cont, $ex[1])) {
            (new \app\controller\MessageController)->message('Dados inválidos', 'Método não encontrado: ' . $get, 404);
            return;
        }

        call_user_func_array([
            new $cont,
            $ex[1]
        ], []);
    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }*/
}
