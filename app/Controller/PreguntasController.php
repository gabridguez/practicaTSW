<?php
class PreguntasController extends AppController {


 public $helpers = array('Html', 'Form', 'Flash');
 public $components = array('Flash');

 public function beforeFilter() {
    parent::beforeFilter();
        $this->Auth->allow('index','view','buscar'); // vistas que pueden ser accesibles sin loguearse
    }
    public function index() {
        $this->set('preguntas', $this->Pregunta->find('all',array(
    //'conditions' => array('Model.field' => $thisValue), //array of conditions
    'recursive' => 2, //int
    //array of field names
    //'fields' => array('Model.field1', 'DISTINCT Model.field2'),
    //string or array defining order
            'order' => array( 'Pregunta.created' => 'desc')
    //'group' => array('Model.field'), //fields to GROUP BY
    //'limit' => n, //int
    //'page' => n, //int
    //'offset' => n, //int
   // 'callbacks' => true //other possible values are false, 'before', 'after'
            )));
    }


public function buscar() {
    $searchtext = $this->request->query['searchtext'];
    $busqueda=$this->Pregunta->find('all',array(
    'conditions' => array("OR" => array(
                            'Pregunta.title LIKE' => "%".$searchtext."%",
                            'Pregunta.description LIKE' => "%".$searchtext."%")), //array of conditions
    'recursive' => 2, //int
    'order' => array( 'Pregunta.created' => 'desc')
            ));

    if($busqueda==NULL){
        $this->Flash->error(__('No questions found.'));
        return $this->redirect(
            array('controller' => 'preguntas', 'action' => 'index')
        );
    }else{
         $this->set('preguntas',$busqueda );
    //$this->set('preguntas', array());
    $this->render('/preguntas/index');
    }
   
}

    public function mine() {
        $this->set('preguntas', $this->Pregunta->find('all',array(
    'conditions' => array('Pregunta.user_id' => $this->Auth->user('id')), //array of conditions
    'recursive' => 2, //int
    'order' => array( 'Pregunta.created' => 'desc')
            )));
        $this->render('/preguntas/index');
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid pregunta'));
        }

        //$pregunta = $this->Pregunta->findById($id);
        $pregunta = $this->Pregunta->find('first',array(
                    'conditions' => array('Pregunta.id' => $id), //array of conditions
                    'recursive' => 2, //pregunta->respuesta->voto
                    //array of field names
                    //'fields' => array('Model.field1', 'DISTINCT Model.field2'),
                    //string or array defining order
                    //'order' => array('Model.created', 'Model.field3 DESC'),
                    //'group' => array('Model.field'), //fields to GROUP BY
                    //'limit' => 10 //int
                    //'page' => n, //int
                   // 'offset' => n, //int
                    //'callbacks' => true //other possible values are false, 'before', 'after'
                    ));
        if (!$pregunta) {
            throw new NotFoundException(__('Invalid pregunta'));
        }
        /////////////////////7$this->set('pregunta', $pregunta);

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
  $this->set('votos', $a);

  $this->set('pregunta', $pregunta);
       // $this->set('respuestas', $this->Pregunta->Respuesta->findAllByPreguntaId($id));
      /*  $this->set('prueba', $this->Pregunta->Respuesta->Respuestavoto->find('threaded', array(
        'fields' => array('id', '_id')
        ));*/


}

public function add() {
    if ($this->request->is('post')) {
        $this->Pregunta->create();
        $this->Pregunta->set('user_id', $this->Auth->user('id'));
        if ($this->Pregunta->save($this->request->data)) {
            $this->Flash->success(__('Your question has been saved.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to add your question.'));
    }
}
public function addrespuesta($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid question'));
    }
    $pregunta = $this->Pregunta->findById($id);
    if (!$pregunta) {
        throw new NotFoundException(__('Invalid question'));
    }
    if ($this->request->is('post')) {
       //$respuesta = $this->request->query['respuesta'];
        $this->Pregunta->Respuesta->create();
        $this->Pregunta->Respuesta->set('user_id', $this->Auth->user('id'));
        $this->Pregunta->Respuesta->set('pregunta_id', $id);
       //$this->Pregunta->Respuesta->set('respuesta', $respuesta);    //da un error pero inserta
        if ($this->Pregunta->Respuesta->save($this->request->data)) {
            $this->Flash->success(__('Your answer has been saved.'));
            return $this->redirect(array('action' => 'view',$id));
        }
        $this->Flash->error(__('Unable to add your answer.'));
    }
}



public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid question'));
    }

    $pregunta = $this->Pregunta->findById($id);
    if (!$pregunta) {
        throw new NotFoundException(__('Invalid question'));
    }

    if ($this->request->is(array('pregunta', 'put'))) {
        $this->Pregunta->id = $id;
        if ($this->Pregunta->save($this->request->data)) {
            $this->Flash->success(__('Your question has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your question.'));
    }

    if (!$this->request->data) {
        $this->request->data = $pregunta;
    }
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Pregunta->delete($id)) {
        $this->Flash->success(
            __('The question has been deleted.', h($id))
            );
    } else {
        $this->Flash->error(
            __('The question could not be deleted.', h($id))
            );
    }

    return $this->redirect(array('action' => 'index'));
}
}

?>