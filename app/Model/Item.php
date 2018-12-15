<?php
class Item extends AppModel {
    public $hasMany = array(
        'File' => array(
            'className' => 'File',
            'foreignKey' => 'item_guid'
        ));
    public $primaryKey = 'guid';

    public $types = array('art', 'code', 'sketch', 'hero');

    public function saveItem($item) {
        $guid = CakeText::uuid();
        $required_fields = array('type');
        foreach($required_fields as $field) {
            if(empty($item[$field])) {
                return false;
            }
        }
        if(!in_array($item['type'], $this->types)) {
            return false;
        }
        $saveData = array();
        $saveData['description'] = "";
        $saveData['subject'] = "";
        if(!empty($item['description'])) {
            $saveData['description'] = $item['description'];
        }
        if(!empty($item['subject'])) {
            $saveData['subject'] = $item['subject'];
        }
        $saveData['type'] = $item['type'];
        $saveData['guid'] = $guid;
        $this->create();
        if ($message = $this->save($saveData))
            return $guid;

        return false;
    }
}
