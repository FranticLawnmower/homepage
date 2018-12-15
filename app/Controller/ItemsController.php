<?php
class ItemsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function index() {
    
    }

    public function add() {
        if(!empty($this->data)) {
            if($item_guid = $this->Item->saveItem($this->data['Item'])) {
                if(!empty($this->data['File'])) {
                    //save files
                    $this->loadModel('File');
                    $this->File->saveFiles($this->data['File'], $item_guid);
                }
            return true;
            }
        }
        return false;
    }
}
