<?php

/**User:Celio Natti** */

namespace nattiframework\core;

use nattiframework\core\exception\NotFoundException;


/**
 * class Router
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core
 */

 class Router
 {
     public Request $request;
     public Response $response;

     protected array $routes = [];

     /**
      * Router constructor
      *
      *@param \nattiframework\core\Request $request
      *@param \nattiframework\core\Response $response
      */
     public function __construct(Request $request, Response $response)
     {
         $this->request = $request;
         $this->response = $response;
     }

     public function get(string $path, $callback)
     {
         $this->routes['get'][$path] = $callback;
     }

     public function post(string $path, $callback)
     {
         $this->routes['post'][$path] = $callback;
     }

     public function resolve()
     {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback){
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }

        if(is_array($callback)){
            /** @var \nattiframework\core\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

         return call_user_func($callback, $this->request, $this->response);
     }
 }