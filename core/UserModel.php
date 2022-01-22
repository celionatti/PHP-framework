<?php

/**User: Celio Natti** */

namespace nattiframework\core;

use nattiframework\core\db\DbModel;

/**
 * class UserModel
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core
 */

 abstract class UserModel extends DbModel
 {
    abstract public function getDisplayName(): string;
 }