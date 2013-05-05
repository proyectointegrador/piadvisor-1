<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Cambiar Contraseña'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('current_password',array('label'=>'Contraseña actual','type'=>'password'));
		echo $this->Form->input('passwd',array('label'=>'Contraseña nueva','type'=>'password'));
		echo $this->Form->input('passwd_confirm',array('label'=>'Confirmar contraseña','type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

	</ul>
</div>