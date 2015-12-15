<?php
App::uses('AppModel', 'Model');
class Respuesta extends AppModel {
public $validate = array(
        'respuesta' => array(
            'rule' => 'notBlank'
        )        
    );

public $belongsTo= array(
        'User' => array(
            'className' => 'User',
            
        ),
        'Pregunta' => array(
            'className' => 'Pregunta',
            
        )
    );

public $hasMany= array(
        'Respuestavoto' => array(
            'className' => 'Respuestavoto',
            
        )
    );
}

?>