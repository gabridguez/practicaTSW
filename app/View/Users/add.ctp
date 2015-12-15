
<!-- app/View/Users/add.ctp -->
<div class="container">
<div class="row">
<div class="users form">
<?php echo $this->Form->create('User',array('type' => 'file'));//'enctype'=>'multipart/form-data', ?>
    <fieldset>
        <legend><?php echo __('Join Question World'); ?></legend>
        <?php echo $this->Form->input('username',array("class"=>"form-control","label"=>__("Username")));
        echo $this->Form->input('name',array("class"=>"form-control","label"=>__("Name")));
        echo $this->Form->input('foto', array('type'=>'file',"class"=>"file file-loading","data-show-upload"=>"false","label"=>__("Picture")));
        echo $this->Form->input('email', array('type' => 'email',"class"=>"form-control","label"=>__("Email")));
        echo $this->Form->input('password',array("class"=>"form-control","label"=>__("Password")));


    ?>
    </fieldset>

<?php 
 echo $this->Form->button(__('Sign up'), array(

   'type' => 'submit',
    'class' => 'botonA btn btn-default ',
    'escape' => false
));
echo $this->Form->end(); ?>
</div>

</div>
</div>
