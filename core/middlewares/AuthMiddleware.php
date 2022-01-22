<?php

/**User: Celio Natti** */

namespace nattiframework\core\middlewares;

use nattiframework\core\Application;
use nattiframework\core\exception\ForbiddenException;

/**
 * class AuthMiddleware
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\middlewares
 */

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * AuthMiddleware constructor
     * 
     * @param array $actions
     */
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }
}
