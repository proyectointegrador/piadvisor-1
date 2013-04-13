<div class="carreras view">
<h2><?php  echo __('Carrera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name2'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['name2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carrera['Area']['name'], array('controller' => 'areas', 'action' => 'view', $carrera['Area']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carrera'), array('action' => 'edit', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carrera'), array('action' => 'delete', $carrera['Carrera']['id']), null, __('Are you sure you want to delete # %s?', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
