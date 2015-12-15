<?php
App::uses('AppModel', 'Model');
class Respuestavoto extends AppModel {
public $validate = array(
        'voto' => array(
            'rule' => 'notBlank'
        )
    );

public $belongsTo= array(
        'User' => array(
            'className' => 'User'
            
        ),
        'Respuesta' => array(
            'className' => 'Respuesta'
            
        )
    );
}

?>