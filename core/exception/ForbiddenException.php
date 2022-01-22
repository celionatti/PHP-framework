<?php

/**User: Celio Natti** */

namespace nattiframework\core\exception;

/**
 * class ForbiddenException
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\exception
 */

 class ForbiddenException extends \Exception
 {
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
 }