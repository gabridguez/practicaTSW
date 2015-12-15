<?php

// app/Controller/UsersController.php
App::uses('AppController', 'Controller');


// app/Controller/UsersController.php
class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login','language'); // vistas que pueden ser accesibles sin loguearse
    }
    public function login() {

    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }


    }
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
   
    public function view($id = null) {
        if($id!=$this->Auth->user('id')){
            $this->Flash->error(__("You can't access to this user settings page"));
            $this->redirect($this->referer());
        }else{
            $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));

            /*
            msgid "Invalid user"
            msgstr "Usuario no valido"

            */
        }
        $this->set('user', $this->User->read(null, $id));
        }
        
    }

    public function add() {

        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['role'] = 'author'; //$this->Auth->user('id')
            $data = $this->request->data;
            //print_r($data); die();
            if (is_uploaded_file($data['User']['foto']['tmp_name']))
            {
                move_uploaded_file(
                    $this->request->data['User']['foto']['tmp_name'],
                    __DIR__.'/../webroot/img/ProfilePics/' . $this->request->data['User']['username'].".png"
                    );
                

    // store the filename in the array to be saved to the db
                $this->request->data['User']['foto'] = "ProfilePics/".$this->request->data['User']['username'].".png";
            }else{
                $this->request->data['User']['foto'] = "ProfilePics/default.png";
            
            }

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved','default', array(),'good'));
                $this->redirect(array('controller' => 'preguntas','action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        

    }


public function language($idioma = null) {
        if($idioma==null){
            $this->Session->write('Config.language', 'esp');
           
        }else{
            $this->Session->write('Config.language', $idioma);
            
        }
        $this->redirect($this->referer());
    }

           /* if(!empty($this->data))
                {
                    //Check if image has been uploaded
                    if(!empty($this->data['User']['upload']['name']))
                    {
                        $file = $this->data['User']['upload']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'CakePHP/app/webroot/img/' . $file['name']);

                            //prepare the filename for database entry
                            $this->data['User']['foto'] = $file['name'];
                        }
                    }

                    //now do the save
                    $this->User->save($this->request->data) ;
                }*/
    

                public function edit($id = null) {
                    $this->User->id = $id;
                    if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid user'));
                    }
                    if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->User->save($this->request->data)) {
                            $this->Flash->success(__('The changes have been saved'));
                            $this->redirect(array('controller' => 'preguntas','action' => 'index'));
                        } else {
                            $this->redirect(array('controller' => 'users','action' => 'edit'));
                            $this->Flash->error(__('The changes could not be saved. Please, try again'));
                        }
                    } else {
                        $this->request->data = $this->User->read(null, $id);
                        unset($this->request->data['User']['password']);
                    }
                }
    



    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}