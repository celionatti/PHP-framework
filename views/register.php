<?php

/** @var $model \nattiframework\models\User */

/** @var $this \nattiframework\core\View */

$this->title = 'NattiFramework | Registration';

?>
<h1>Registration Form</h1>

<?php $form =  \nattiframework\core\form\Form::begin('', 'post') ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname') ?>
    </div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

<a href="/login" class="p-2 mb-2 text-dark">Already a Member? Login</a>
<button type="submit" class="btn btn-warning w-100">Register</button>
<?php \nattiframework\core\form\Form::end() ?>