<div class="programas form">
<?php echo $this->Form->create('Programa');?>
	<fieldset>
		<legend><?php __('Edit Programa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('name2');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Programa.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Programa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Programas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>