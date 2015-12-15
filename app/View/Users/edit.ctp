<div class="login-box"><div class="col-md-8">
<h1><?= __("Edit User")?></h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('name',array("label"=>__("Name"),"class"=>"form-control"));
echo $this->Form->input('email', array("label"=>__("Email"),"class"=>"form-control"));
//echo $this->Form->input('password', array("label"=>__("Email"),"class"=>"form-control"));
echo $this->Form->input('password', array("label"=>__("New Password"),"class"=>"form-control",'type' => 'password'));
echo $this->Form->input('password_repeat', array("label"=>__("Repeat New Password"),"class"=>"form-control",'type' => 'password'));

   // echo $this->Form->input('username', array('disabled' => 'disabled', 'value' => $username));
    //echo $this->Form->input('email');
    //echo $this->Form->input('newPassword', array('type' => 'password'));

echo $this->Form->button(__('Save User'), array(
   'type' => 'submit',
    'class' => 'botonA btn btn-default ',
    'escape' => false
));
echo $this->Form->end();
?>
</div></div>