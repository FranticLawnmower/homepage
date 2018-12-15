<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'admin');
    }

    public function login() {
        if ($this->request->is('post')) {
            if($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username of password'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if($this->request->is('post')) {
            $this->User->create();
            if($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been added'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('The user could not be created'));
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if($this->User->save($this->request->data)) {
                $this->Flash->succes(__('The user has been saved'));
                return $this->redirect(array('action', 'index'));
            }
            $this->Flash->error(__('The user could not be saved, please try again'));
        }
        else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id) {
        $this->request->allowMethod('post');
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    /*vanaf hier nieuw*/
    public function admin() {
        //check of ingelogd
            if($this->isAuthorized($this->Auth->user())) {
            $user = $this->Auth->user();
            $this->set('user', $user);
            $this->loadModel('Item');
            $this->set('item_types', $this->Item->types);

    }
        else { 
        //anders naar login redirecten
            return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }
    }
}

