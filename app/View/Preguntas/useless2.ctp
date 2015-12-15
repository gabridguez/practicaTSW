<h1>Add Respuesta</h1>
<?php
echo $this->Form->create('Respuesta');

echo $this->Form->input('respuesta', array('rows' => '3'));
echo $this->Form->end('Save Respuesta');
?>