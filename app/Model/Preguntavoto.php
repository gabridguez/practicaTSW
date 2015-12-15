<?php
App::uses('AppModel', 'Model');
class Preguntavoto extends AppModel {
public $validate = array(
        'voto' => array(
            'rule' => 'notBlank'
        )
    );

public $belongsTo= array(
        'User' => array(
            'className' => 'User'
            
        ),
        'Pregunta' => array(
            'className' => 'Pregunta'
            
        )
    );
}

?>