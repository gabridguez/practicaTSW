<!-- File: /app/View/Preguntas/index.ctp -->




<div id="contenedorPreguntas" class="container">
  
    
<div class="row">

 <ul class="ul-questions">
    <?php foreach ($preguntas as $pregunta): ?>
<li>
 <div class="col-md-12 preguntaQW">
  <div class="col-md-2">
   <a href="" class=""><!--$currentLogin['username']-->
    <?php echo $this->Html->image($pregunta['User']['foto'], array('alt' => 'UserImg', 'class' => "img-circle img-responsive img-QWquestion", 'width' => "304", 'height' => "236"));?><span></span></a>
    <div class="row">
      
    </div>
    <div class="row">
      <a href="" class="userName"><p class="userName tamanhoTextoNombreUsuario"><?php echo h($pregunta['User']['username']); ?></p></a>
    </div>
  </div>
  <div class="col-md-10">
    <div class="row texto-preguntaQW ">
      
     <?php 



     echo $this->Form->postLink(
                    $pregunta['Pregunta']['title'],
                    array(
                    'action' => 'view', $pregunta['Pregunta']['id'] ),
                    array('class' => 'tamanhoTituloPregunta questionTitle', 'method' =>'get')
                );
                ?>
      <p align="justify" class="tamanhoTextoPregunta"><?php echo $pregunta['Pregunta']['description']; ?></p>
    </div>
    <div class="row ">
      <div class="QW-info-pack">
        <a href="#" class="QW-info-color"><span class="glyphicon QW-info-text"><?php echo sizeof($pregunta['Respuesta']); ?> </span><span class="glyphicon glyphicon-comment QW-info-icon" aria-hidden="true"></span></a>
        
        <?php
        if(AuthComponent::user('id') == $pregunta['Pregunta']['user_id'] ){
                echo $this->Html->link(
                    __("Edit"),
                    array('action' => 'edit', $pregunta['Pregunta']['id']),
                     array('class' =>'botonA')
                );
            
                echo $this->Form->postLink(
                    __('Delete'),
                    array('action' => 'delete', $pregunta['Pregunta']['id']),

                     array('class' =>'botonA','confirm' => __('Are you sure?'))
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











