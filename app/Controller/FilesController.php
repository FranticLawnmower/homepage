<?php
class FilesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function add() {
        ini_set('max_file_size', '104857600');
        $this->autoRender = false;
        $response = json_encode($this->data);
        //pr($_FILES);
        $file = ""; //@TODO separate file decode bease 64 en send to filesystem
        //pr($response);
        //return $response;
        pr($_FILES);
        pr($this->data);
        pr($this->request);
        die();
        if(!empty($this->data)) {
            $this->File->uploadFiles("files" , $this->data['File']);
        }
    }
}
