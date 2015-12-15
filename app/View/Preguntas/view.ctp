<!-- File: /app/View/Preguntas/view.ctp -->






<div id="contenedorPreguntas" class="container">
      <div class="row">


       <div class="col-md-12 preguntaQW">
        <div class="col-md-2">
          <?php echo $this->Html->image($pregunta['User']['foto'], array('alt' => 'UserImg', 'class' => "img-circle img-responsive img-QWquestion", 'width' => "304", 'height' => "236"));?>
          <div class="row">
            <!--div class=" QW-valorar">
              <a href="#" class="QW-valorar-positivo"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a>
              <span class="votos">0</span>
              <a href="#" class="QW-valorar-negativo"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
            </div-->
          </div>
          <div class="row">
            <a href="" class="userName"><p class="userName tamanhoTextoNombreUsuario"><?php echo h($pregunta['User']['username']); ?></p></a>
          </div>
        </div>
        <div class="col-md-10">
          <div class="row texto-preguntaQW">
            <a href="#pregunta" class="tamanhoTituloPregunta questionTitle"><?php echo h($pregunta['Pregunta']['title']); ?></a>
            <p align="justify" class="tamanhoTextoPregunta"><?php echo $pregunta['Pregunta']['description']; ?></p>
          </div>
          <div class="row ">
            <div class="QW-info-pack">
              <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text"><?php echo sizeof($pregunta['Respuesta']); ?> </span><span class="glyphicon glyphicon-comment QW-info-icon" aria-hidden="true"></span></a>
              <!--a href="#" class="QW-info-color"><span class="glyphicon QW-info-text">0 </span><span class="glyphicon glyphicon-eye-open QW-info-icon" aria-hidden="true"></span></a>
              <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text">0 </span><span class="glyphicon glyphicon-star-empty QW-info-icon" aria-hidden="true"></span></a-->
            </div>
          </div>
        </div>
      </div>   </div>


      <div class="row">

        <div class="col-md-12 responderQW">
        	<?php
//echo $pregunta['Pregunta']['id'];
           echo $this->Form->create('Pregunta',array("type"=>"post", "action"=>"addrespuesta/".$pregunta['Pregunta']['id'] ));
                echo $this->Form->input("respuesta",array("name"=>"respuesta",'label' => false,"div"=> false,"class"=>"form-control", "placeholder"=>__("Input a new answer"),"escape"=>false,"rows"=>'4'));
                echo $this->Form->button('<i class="glyphicon glyphicon-pencil"></i>', array(
                  "type"=>"submit",
    'class' => 'btn btn-default',
    'escape' => false
));
                echo $this->Form->end();
/*echo $this->Form->create('Respuesta');
ALTER TABLE `users` CHANGE `foto` `foto` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default.png';
echo $this->Form->input('respuesta', array('rows' => '3'));
echo $this->Form->end('Save Respuesta');*/
?>
          <!--form class="" role="">
            <div class="form-group">
             <div class="input-group">
              <input type="text" class="form-control" placeholder="respuesta" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
            </div>
          </div>
        </form-->
      </div>
      <ul id="respuestas">
<?php foreach ($pregunta['Respuesta'] as $respuesta): ?>
  <li>
   <div class="col-md-12 respuestaQW">
    <div class="col-md-2">
      <?php echo $this->Html->image($respuesta['User']['foto'], array('alt' => 'UserImg', 'class' => "img-circle img-responsive img-QWanswer", 'width' => "304", 'height' => "236"));?>
     
      <div class="row">
        <div class=" QW-valorar">
          <?= $this->Html->link(
     __('Vote +'),
    array('controller' => 'respuestas', 'action' => 'votar', $respuesta['id'],1),
    array('class'=>"QW-valorar-positivo")
); ?>
          <!--a href="#" class="QW-valorar-positivo"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a-->
          <span class="votos"><?php echo $votos[$respuesta['id']]  ?></span>
          <!--a href="#" class="QW-valorar-negativo"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a-->
          <?= $this->Html->link(
     __('Vote -'),
    array('controller' => 'respuestas', 'action' => 'votar', $respuesta['id'],0),
    array('class'=>"QW-valorar-negativo")
); ?>
        </div>
      </div>
      <div class="row">
        <a href="" class="userName"><p class="userName tamanhoTextoNombreUsuarioRespuesta"><?php echo $respuesta['User']['username']; ?></p></a>
      </div>
    </div>
    <div class="col-md-10">
      <div class="row texto-preguntaQW">
        <p><?php echo $respuesta['respuesta']; ?></p>
      </div>

    </div>
  </div>
  
</li>
<?php endforeach; ?>


</ul>

</div>
</div>




