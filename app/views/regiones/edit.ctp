<div class="regiones form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php __('Editar Region'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Regiones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lista Paises', true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
	</ul>
</div>