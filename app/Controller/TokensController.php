<?php
App::uses('AppController', 'Controller');

class TokensController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'buildToken');
    }

    public function buildToken() {
        $this->layout = 'default';
        $token = $this->Token->build();
        pr($token);
        die();
    }

    public function index() {
        $this->layout = 'default';
    
    }
}
