<?php
echo $this->Form->create('token', array(
    'url' => $this->Html->url(array('controller' => 'tokens', 'action' => 'buildToken'))
));
echo $this->Form->input('token', array(
    'type' => 'submit',
    'class' => 'btn'
));

echo $this->Form->end();



