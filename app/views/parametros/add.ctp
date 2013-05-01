<div class="parametros form">
<?php echo $this->Form->create('Parametro');?>
	<fieldset>
		<legend><?php __('Add Parametro'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Parametros', true), array('action' => 'index'));?></li>
	</ul>
</div>