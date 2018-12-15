<?php
echo $this->Form->create('File', array(
    'type' => 'file'
));

echo $this->Form->input(false, array(
    'label' => 'bestand uploaden',
    'type' => 'file'
));

echo $this->Form->submit('Bestand uploaden');

echo $this->Form->end();
