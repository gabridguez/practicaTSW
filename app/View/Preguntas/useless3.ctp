
<!--A PARTIR DE AQUI SON PRUEBAS SOBRA TOOOOOODOOOOOOO TOOODOOOOOOOO-->





<h1><?php echo h($pregunta['Pregunta']['title']); ?></h1>

<p><small>Created: <?php echo $pregunta['Pregunta']['created']; ?></small></p>

<p><?php echo h($pregunta['Pregunta']['description']); ?></p>
<br><br>

<p><?php echo "el id de la pregunta" ?></p>
<p><?php echo $pregunta['Pregunta']['id']; ?></p>
<p><?php echo "el titulo de la pregunta" ?></p>
<p><?php echo $pregunta['Pregunta']['title']; ?></p>
<br>


<?php



echo "VAMOS A PROBAR COSAS";
echo "<br>";echo "<br>";
print_r($votos);
echo "<br>";echo "<br>";
print_r($pregunta['Respuesta'][0]['User']['foto']);
echo "<br>";echo "<br>";
echo "FIN PROBAR COSAS";
/*
$a=array();
$r=array();
for ($i=0; $i < sizeof($pregunta['Respuesta']) ; $i++) { 
	//echo $pregunta['Respuesta'][$i]['id']."____________";
  $r[$pregunta['Respuesta'][$i]['id']]=$pregunta['Respuesta'][$i];
	$a[$pregunta['Respuesta'][$i]['id']]=0;
	for ($j=0; $j < sizeof($pregunta['Respuesta'][$i]['Respuestavoto']) ; $j++) { 
		//echo $pregunta['Respuesta'][$i]['Respuestavoto'][$j]['voto'];
		$aux=$pregunta['Respuesta'][$i]['Respuestavoto'][$j]['voto'];;
		if($aux==1){
			$a[$pregunta['Respuesta'][$i]['id']]=$a[$pregunta['Respuesta'][$i]['id']]+1;
		}else{
			$a[$pregunta['Respuesta'][$i]['id']]=$a[$pregunta['Respuesta'][$i]['id']]-1;
		}
	
}
}
arsort($a);

$respuestasOrdenadas = array();
foreach($a as $idRespuesta => $votos){
  array_push($respuestasOrdenadas, $r[$idRespuesta]);
}
$pregunta['Respuesta'] = $respuestasOrdenadas;
	
 */
	


//$respuesta['Respuestavoto'][0]['voto'];



?>

<?php foreach ($pregunta['Respuesta'] as $respuesta): ?>
	<p>----------------Area de pruebas----------------------------</p>
	
<p>esta respuesta tiene: <?php echo sizeof($respuesta['Respuestavoto']); ?>__ votos </p>

	<p>el id de la respuesta es: <?php echo $respuesta['id']; ?></p>
	<p>votacion es: <?php echo $votos[$respuesta['id']]  ?></p>
	<p><?php echo $respuesta['respuesta']; ?></p>

	<?php echo $this->Html->link(
    __('Vote +'),
    array('controller' => 'respuestas', 'action' => 'votar', $respuesta['id'],1)
); 


 echo $this->Html->link(
    __('Vote -'),
    array('controller' => 'respuestas', 'action' => 'votar', $respuesta['id'],0)
); ?>
<p>-----------------------------------------------------------</p>
<?php endforeach; ?>

<br><br>


<br>
<br><br><br>
<?php echo $this->Html->link(
    'Add Respuesta',
    array('controller' => 'preguntas', 'action' => 'addrespuesta', $pregunta['Pregunta']['id'])
); ?>