<div class="form-signin" style="margin-top:10px">

<?php
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
echo $this->Form->input('User.username',array('label'=>'Usuario'));
echo $this->Form->input('User.password',array('label'=>'Contraseña'));
?>

	<?php
	echo $this->Form->end('Entrar');
	?>
<?php

echo $this->Html->link('¿Olvidaste tu contraseña?',array('action'=>'recuperar_pass'));
?>
</div>