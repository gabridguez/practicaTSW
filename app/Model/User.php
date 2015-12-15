<?php
// app/Model/User.php
//App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    public $validate = array(

        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Username already exists. Choose another one'
            )
        ),

        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            ),
            'length' => array(
            'rule'      => array('between', 8, 40),
            'message'   => 'Your password must be between 8 and 40 characters.',
            'on'        => 'create',  // we only need this validation on create
            )
        ),

        'password_repeat' => array(
                'compare' => array(
                        'rule'    => array('validate_passwords'),
                        'message' => 'Please confirm the password',
                            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
public function validate_passwords() { //password match check
    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_repeat'];
}
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

public $hasMany= array(
        'Votosrespuesta' => array(
            'className' => 'Respuestavoto'
            
        ),
        'Votospregunta' => array(
            'className' => 'Preguntavoto'
            
        ),
        'Pregunta' => array(
            'className' => 'Pregunta'
            
        ),
        'Respuesta' => array(
            'className' => 'Respuesta'
            
        )
    );


 
}

?>