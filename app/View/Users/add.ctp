<h1>Add User</h1>
<div class="users-form">
<?php
    echo $this->Form->create('User');
    echo '<fieldset>';
        echo '<legend>'.__('Add User').'</legend>';
        echo $this->Form->input('name');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array(
                'admin' =>'Admin', 
                'author' => 'Author'
            )
        ));
    echo '</fieldset>';
    echo $this->Form->end(__('Submit'));
?>
</div>
