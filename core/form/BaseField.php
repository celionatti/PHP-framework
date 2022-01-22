<?php

/**User: Celio Natti** */

namespace nattiframework\core\form;

use nattiframework\core\Model;

/**
 * Class BaseField
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\core\form
 */

 abstract class BaseField
 {
    public Model $model;
    public string $attribute;

    /**
     * Class constructor
     * @param \nattiframework\core\Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    
    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf(
            '
                <div class="mb-3">
                    <label for="%s" class="form-label">%s</label>
                    %s
                    <div id="" class="form-text invalid-feedback">
                        %s
                    </div>
                </div>
            ',
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
 }