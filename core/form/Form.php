<?php

/**User: Celio Natti ** */

namespace nattiframework\core\form;

use nattiframework\core\Model;

/**
 * class Form
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\form
 */

 class Form
 {
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
 }