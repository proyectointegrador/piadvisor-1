<div class="regiones form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php __('Edit Region'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Region.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Region.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Regiones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Paises', true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais', true), array('controller' => 'paises', 'action' => 'add')); ?> </li>
	</ul>
</div>