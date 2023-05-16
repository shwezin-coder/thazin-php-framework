<h1>Register</h1>
<?php 
  $form = Thazin\Core\Form\Form::begin('register','post');
    echo $form->field($table,'first_name');
    echo $form->field($table,'last_name');
    echo $form->field($table,'email');
    echo $form->field($table,'password')->passwordField();
    echo $form->field($table,'confirm_password')->passwordField();
?>
   <button type="submit" class="btn btn-primary">Register</button>
<?php 
  echo Thazin\Core\Form\Form::end(); 
?>