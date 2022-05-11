<?php

use app\core\form\Form; ?>


<?php 
/** @var $this \app\core\View */
$this->title = 'Login';
?>

<div class="container mt-3">
    <h1>Login</h1>
    <?php
    $form = Form::begin('', "post");
    ?>
    <div class="d-flex row gx-5  mt-2 ">
        <div class="col">
            <?php echo $form->field($model, 'email') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'password')->passwordField() ?>
        </div>
    </div>
    <input type="submit" class="btn btn-primary mt-2" name="Submit">

    <?php Form::end() ?>

</div>