<!-- File: /app/View/Preguntas/edit.ctp -->
<div class=" login-box"><div class="col-md-8">
<h1><?= __("Edit Question")?></h1>
<?php
echo $this->Form->create('Pregunta');
echo $this->Form->input('title',array("label"=>__("Title"),"class"=>"form-control"));
echo $this->Form->input('description', array('rows' => '3',"label"=>__("Question"),"class"=>"form-control"));
//echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->button(__('Save Changes'), array(

   'type' => 'submit',
    'class' => 'botonA btn btn-default ',
    'escape' => false
));
echo $this->Form->end();
?>
</div></div>
