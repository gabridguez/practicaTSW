
<div class="container">
	<div class="row login-box">
<!--div class="col-md-4"></div-->

<div class="col-md-4 ">

		<div class="users form login-form">
<?php echo $this->Session->flash(); ?>


<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username',array("class"=>"form-control","label"=>__("Username")));
        echo $this->Form->input('password',array("class"=>"form-control","label"=>__("Password")));
    ?>
    </fieldset>
    <?php
     echo $this->Form->button(__('Login'), array(

   // 'type' => 'button',
    'class' => 'botonA',
    'escape' => false
));
                echo $this->Form->end();
//echo $this->Form->end(__('LogiN'),array("class"=>"botonA"));
 ?>

<?php
 echo $this->Html->link( __("Sign Up"), 
   array(
   
   	'action'=>'add'),
    array('class' => 'botonA')
    	); 
?>
</div></div>
<!--div class="col-md-4"></div-->
	</div>

</div>
