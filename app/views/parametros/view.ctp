<div class="parametros view">
<h2><?php  __('Parametro');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $parametro['Parametro']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $parametro['Parametro']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Texto1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $parametro['Parametro']['texto1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Texto2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $parametro['Parametro']['texto2']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parametro', true), array('action' => 'edit', $parametro['Parametro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Parametro', true), array('action' => 'delete', $parametro['Parametro']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $parametro['Parametro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parametros', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parametro', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
