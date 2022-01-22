<?php

/**User: Celio Natti ** */

namespace nattiframework\core;

use nattiframework\core\middlewares\BaseMiddleware;

/**
 * class Controller
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core
 */

 class Controller
 {
     public string $layout = 'main';
     public string $action = '';
     /**
      *
      * @var \nattiframework\core\middlewares\BaseMiddleware[]
      */
     protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
     public function render($view, $params = [])
     {
         return Application::$app->view->renderView($view, $params);
     }

     public function registerMiddleware(BaseMiddleware $middleware)
     {
        $this->middlewares[] = $middleware;
     }

     /**
      * Get the value of middlewares
      *
      * @return  \nattiframework\core\middlewares\BaseMiddleware[]
      */ 
     public function getMiddlewares()
     {
          return $this->middlewares;
     }
 }