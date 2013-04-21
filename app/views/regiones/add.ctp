<div class="regiones form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php __('Add Region'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Regiones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Paises', true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais', true), array('controller' => 'paises', 'action' => 'add')); ?> </li>
	</ul>
</div>