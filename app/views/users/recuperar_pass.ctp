
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Recuperar Contraseña'); ?></legend>
	<?php
		echo $form->input('email', array('label' => 'Correo Electrónico:'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Recuperar', true));?>
