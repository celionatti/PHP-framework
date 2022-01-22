<?php

/**User: Celio Natti** */

namespace nattiframework\core\middlewares;

/**
 * class BaseMiddleware
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\middlewares
 */

 abstract class BaseMiddleware
 {
     abstract public function execute();
 }