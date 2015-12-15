<div class="container">
      <div class="row">

<?php 
  //print_r($user);
/*
$time=new DateTime($user['User']['created']);
            $time=$time->format('Y-m-d');
echo $time;
echo "<br>";
echo date('Y-m-d');
echo "<br>";
$semanaPasada= time()-(7*24*60*60);
$semanaPasada= date('Y-m-d',$semanaPasada);
echo "semanaPasada".$semanaPasada;
echo "<br>";

echo $time;
echo "<br>";
echo $time-$semanaPasada;
*/
?>
       <div class="col-md-12 preguntaQW">
        <div class="col-md-2">
          <?php echo $this->Html->image($user['User']['foto'], array('alt' => 'UserImg', 'class' => "img-circle img-responsive img-QWquestion", 'width' => "304", 'height' => "236"));?>
          <div class="row">
           
          </div>
          <div class="row">
            <a href="" class="userName"><p class="userName tamanhoTextoNombreUsuario"><?php echo h($user['User']['username']); ?></p></a>
          </div>
        </div>
        <div class="col-md-10">
          <div class="row texto-preguntaQW">
            <span class="tamanhoTituloPregunta"><?= __("Name")?>:</span>
            <span class="tamanhoTituloPregunta"><?php echo h($user['User']['name']); ?></span>
            <br><br>

            <span class="tamanhoTituloPregunta"><?= __("Email")?>:</span>
            <span class="tamanhoTituloPregunta"><?php echo h($user['User']['email']); ?></span>
            <br><br>

            <span class="tamanhoTituloPregunta"><?= __("Join date(YYYY-MM-DD)")?>:</span>
            <?php 
            $time=new DateTime($user['User']['created']);
            $time=$time->format('Y-m-d');
            ?>
            <span class="tamanhoTituloPregunta"><?php echo h($time); ?></span>
            <br><br>
            
            <span class="tamanhoTituloPregunta"><?= __("Number of rated answers")?>:</span>
            <span class="tamanhoTituloPregunta"><?php echo sizeof($user['Votosrespuesta']); ?></span>
            <br><br>

             <span class="tamanhoTituloPregunta"><?= __("Number of questions")?>:</span>
            <span class="tamanhoTituloPregunta"><?php echo sizeof($user['Pregunta']); ?></span>
            <br><br>

             <span class="tamanhoTituloPregunta"><?= __("Number of answers")?>:</span>
            <span class="tamanhoTituloPregunta"><?php echo sizeof($user['Votosrespuesta']); ?></span>
            <br><br>
          <?php echo $this->Html->link(
                               __('Edit'),
                               '/users/edit/'.$currentLogin['id']
                               ); ?>
            
          </div>
          
        </div>
      </div>   </div>


      