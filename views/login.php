<?php

/** @var $model \nattiframework\models\User */

/** @var $this \nattiframework\core\View */

$this->title = 'NattiFramework | Login';

?>
<h1>Login Form</h1>

<?php $form =  \nattiframework\core\form\Form::begin('', 'post') ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<a href="/forgotpassword" class="text-dark float-end">Forgot Password?</a>
<a href="/register" class="p-2 mb-2 text-dark">Not yet a Member? Register</a>
<button type="submit" class="btn btn-danger w-100">Login</button>
<?php \nattiframework\core\form\Form::end() ?>