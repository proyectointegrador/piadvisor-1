﻿<div class="parametros form">
<?php echo $this->Form->create('Parametro');?>
	<fieldset>
		<legend><?php __('Configuración de Correo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => 'Nombre'));
		echo $this->Form->input('texto1',array('label' => 'Encabezado'));
		echo $this->Form->input('texto2',array('label' => 'Cuerpo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>