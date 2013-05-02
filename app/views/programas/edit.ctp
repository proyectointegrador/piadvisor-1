﻿<div class="programas form">
<?php echo $this->Form->create('Programa');?>
	<fieldset>
		<legend><?php __('Editar Programa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => 'Programa'));
		echo $this->Form->input('name2',array('label' => 'Nombre'));
		echo $this->Form->input('descripcion',array('label' => 'Descripción'));
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Programas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lista Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>