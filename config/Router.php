<?php 

namespace Thazin\Core;

use Thazin\App\Exceptions\NotFoundException;
use Thazin\Core\View;
use Thazin\Core\Request;
use Thazin\Core\Response;
use Thazin\Core\Controller;
use Thazin\Core\DB\Database;

class Router{
    public string $layout = 'main'; 
    public Request $request;
    public Response $response;
    public View $view;
    public Controller $controller;
    public static Router $router;
    public static string $ROOT_DIR;
    public Database $db;
    protected array $routes = [];
    public function __construct($rootPath,array $config)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View();
        $this->controller = new Controller();
        $this->db = new Database($config['db']);
        self::$router = $this;
        self::$ROOT_DIR = $rootPath;
    }
    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
    }  
    public function resolve()
    {
      $path = $this->request->getPath();
      $method = $this->request->method();
      $callback = $this->routes[$method][$path] ?? false;
      if($callback === false)
      {
        $this->response->setStatusCode(404);
        throw new NotFoundException();
      }
      if(is_string($callback))
      {
        return $this->view->renderView($callback);
      }
      if(is_array($callback))
      {
        $controller = new $callback[0]();
        $this->controller = $controller;
        $controller->action = $callback[1];
        // foreach($controller->getMiddlewares() as $middleware)
        // {
        //   $middleware->execute();
        // }
        $callback[0] = $controller;
      }
      return call_user_func($callback,$this->request,$this->response);
    }
    public function run()
    {
        try {
            echo $this->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error',[
                'exception' => $e
            ]);
        }
    }

}