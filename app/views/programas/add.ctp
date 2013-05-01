<div class="programas form">
<?php echo $this->Form->create('Programa');?>
	<fieldset>
		<legend><?php __('Add Programa'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Programas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>