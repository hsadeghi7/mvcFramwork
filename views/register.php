<?php 
/** @var $this \app\core\View */
$this->title = 'Register';
?> 

<div class="container mt-5">
    <h1>Register</h1>
    <?php

    use app\core\form\Form;

    $form = Form::begin('', "post");
    ?>
    <div class="d-flex row gx-5 mt-2 ">
        <div class="col">
            <?php echo $form->field($model, 'firstName') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastName') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

    <input type="submit" class="btn btn-primary" name="Submit">

    <?php Form::end() ?>


</div>