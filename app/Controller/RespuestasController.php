<?php
class RespuestasController extends AppController {


   public $helpers = array('Html', 'Form', 'Flash');
   public $components = array('Flash');

   public function beforeFilter() {
    parent::beforeFilter();
        $this->Auth->allow('index'); // vistas que pueden ser accesibles sin loguearse
    }

    public function votar($id = null,$voto) {//$id es el id de respuesta
    	$this->autoRender = false;
        if (!$id) {
            throw new NotFoundException(__('Invalid respuesta'));
        }
        $respuesta = $this->Respuesta->findById($id);
        $votoBD=$this->Respuesta->Respuestavoto->findByUserIdAndRespuestaId($this->Auth->user('id'),$id);
        if($votoBD){
        	 $this->Flash->error(__("You can't vote again this answer."));
        	 return $this->redirect(array('controller' => 'preguntas', 'action' => 'view',$respuesta['Respuesta']['pregunta_id']));
        }
        if (!$respuesta) {
            throw new NotFoundException(__('Invalid respuesta'));
        }
        /*
        echo "autor:";
        print $this->Auth->user('id');
        echo "<br>voto:";
        print $voto;
        echo "<br>idrespuesta:";
        print $id;
        echo "<br>";
        */
        if ($this->request->is('get')) {
        	 
            $this->Respuesta->Respuestavoto->create();
            $this->Respuesta->Respuestavoto->set('user_id', $this->Auth->user('id'));
            $this->Respuesta->Respuestavoto->set('voto', $voto);
            $this->Respuesta->Respuestavoto->set('respuesta_id', $id);
             
            if ($this->Respuesta->Respuestavoto->save($this->request->data)) {
                $this->Flash->success(__('Your vote has been saved.'));
                
                
            }else{
            	$this->Flash->error(__('Unable to add your vote.'));
            }
            
            return $this->redirect(array('controller' => 'preguntas', 'action' => 'view',$respuesta['Respuesta']['pregunta_id']));
        }
    }



    public function getVotos($idrespuesta){
    	$this->autoRender = false;
    	$this->set('votos', $this->Respuesta->Votosrespuesta->findAllByRespuestaId($idrespuesta));
    }

}