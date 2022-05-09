<div class="container mb-3 mx-5">
    <h1>Register</h1>
    <?php

use app\core\form\Form;
use app\models\RegisterModel;
// $model = new RegisterModel;
 $form = Form::begin('', "post"); 

 ?>

    <div class="col">
        <?php echo $form->field($model, 'firstName') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastName') ?>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

    <input type="submit" class="btn btn-primary" name="Submit">

    <?php Form::end() ?>


</div>