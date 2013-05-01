<div class="parametros form">
<?php echo $this->Form->create('Parametro');?>
	<fieldset>
		<legend><?php __('Edit Parametro'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('texto1');
		echo $this->Form->input('texto2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Parametro.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Parametro.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parametros', true), array('action' => 'index'));?></li>
	</ul>
</div>