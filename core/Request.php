<?php

/**User:Celio Natti** */

namespace nattiframework\core;

/**
 * class Request
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core
 */

 class Request
 {
     public function getPath()
     {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
     }

     public function method()
     {
        return strtolower($_SERVER['REQUEST_METHOD']);
     }

     public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

     public function getBody()
     {
         $data = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

         return $data;
     }
 }