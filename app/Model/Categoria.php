<?php
App::uses('AppModel', 'Model');
class Categoria extends AppModel {
public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        )
    );

public $hasMany= array(
        'Pregunta' => array(
            'className' => 'Pregunta'
        )
    );
}

?>