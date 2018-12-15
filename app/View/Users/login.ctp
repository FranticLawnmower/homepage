<div class="container">
<h1>User Login</h1>
<div class="users form">
<?php
echo $this->Flash->render('auth');
echo $this->Form->create('User');
    echo'<fieldset><legend>'.__('Please enter your username and password').'</legend>';
    echo$this->Form->input('name');
    echo$this->Form->input('password');
    echo '</fieldset>';
    echo $this->Form->end(__('Login'));

    echo 'Admin, Test';
?>
</div>
