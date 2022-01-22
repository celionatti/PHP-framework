<?php

/** @var $this \nattiframework\core\View */
/** @var $model \nattiframework\models\ContactForm */

use nattiframework\core\form\Form;
use nattiframework\core\form\TextareaField;

$this->title = 'Contact';

?>
<h1>Contact Us</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>