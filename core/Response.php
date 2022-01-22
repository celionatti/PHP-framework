<?php

/**User: Celio Natti** */

namespace nattiframework\core;

/**
 * class Response
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core
 */

 class Response
 {
     public function setStatusCode(int $code)
     {
         http_response_code($code);
     }

    public function redirect($url)
    {
        header("Location: $url");
    }
 }