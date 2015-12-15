<!-- File: /app/View/Preguntas/index.ctp -->




<div id="contenedorPreguntas" class="container">
  
    
<div class="row">

 <ul class="ul-questions">
    <?php foreach ($preguntas as $pregunta): ?>
<li>
 <div class="col-md-12 preguntaQW">
  <div class="col-md-2">
   <a href="" class=""><!--$currentLogin['username']-->
    <?php echo $this->Html->image('default.png', array('alt' => 'UserImg', 'class' => "img-circle img-responsive img-QWquestion", 'width' => "304", 'height' => "236"));?><span></span></a>
    <div class="row">
      <div class=" QW-valorar">
        <a href="#" class="QW-valorar-positivo"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a>
        <span class="votos">0</span>
        <a href="#" class="QW-valorar-negativo"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
      </div>
    </div>
    <div class="row">
      <a href="user.html" class="userName"><p class="userName tamanhoTextoNombreUsuario"><?php echo h($pregunta['User']['username']); ?></p></a>
    </div>
  </div>
  <div class="col-md-10">
    <div class="row texto-preguntaQW ">
      
     <?php 

     echo $this->Form->postLink(
                    $pregunta['Pregunta']['title'],
                    array(
                    'action' => 'view', $pregunta['Pregunta']['id'] ),
                    array('class' => 'tamanhoTituloPregunta questionTitle', )
                );
                ?>
      <p align="justify" class="tamanhoTextoPregunta"><?php echo $pregunta['Pregunta']['description']; ?></p>
    </div>
    <div class="row ">
      <div class="QW-info-pack">
        <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text">0 </span><span class="glyphicon glyphicon-comment QW-info-icon" aria-hidden="true"></span></a>
        <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text">0 </span><span class="glyphicon glyphicon-eye-open QW-info-icon" aria-hidden="true"></span></a>
        <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text">0 </span><span class="glyphicon glyphicon-star-empty QW-info-icon" aria-hidden="true"></span></a>
        <?php
        if(AuthComponent::user('id') == $pregunta['Pregunta']['user_id'] ){
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $pregunta['Pregunta']['id'], 'class' =>'QW-info-color')
                );
            
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $pregunta['Pregunta']['id']),
                    array('confirm' => 'Are you sure?')
                );
            }?>
        
        
      </div>
    </div>

    
  </div>
</div>   
</li>
<?php endforeach; ?>

 </ul>


</div>

</div>











