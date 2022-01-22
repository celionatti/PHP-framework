<?php

/**User: Celio Natti** */

namespace nattiframework\core\exception;

/**
 * class NotFoundException
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\exception
 */

 class NotFoundException extends \Exception
 {
    protected $message = 'Page not found';
    protected $code = 404;
 }