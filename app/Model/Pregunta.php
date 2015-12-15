<?php
App::uses('AppModel', 'Model');
class Pregunta extends AppModel {
public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'description' => array(
            'rule' => 'notBlank'
        )
    );

public $hasMany= array(
        'Respuesta' => array(
            'className' => 'Respuesta',
            //'conditions' => array('Respuesta.approved' => '1'),
            'order' => 'Respuesta.created DESC'
        ),
        'Preguntavoto' => array(
            'className' => 'Preguntavoto'
            
        )
    );



public $belongsTo= array(
        'Categoria' => array(
            'className' => 'Categoria'
        ),
        'User' => array(
            'className' => 'User'
            
        )
    );



}

?>