<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label'=>'Usuario'));
		echo $this->Form->input('password', array('label'=>'Contraseña'));
		echo $this->Form->input('group_id', array('label'=>'Grupo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Usuarios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lista Grupos', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>