<div class="requisitos view">
<h2><?php  echo __('Requisito'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requisito['Categoria']['name'], array('controller' => 'categorias', 'action' => 'view', $requisito['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clave'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['clave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion2'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['descripcion2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($requisito['Requisito']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requisito'), array('action' => 'edit', $requisito['Requisito']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requisito'), array('action' => 'delete', $requisito['Requisito']['id']), null, __('Are you sure you want to delete # %s?', $requisito['Requisito']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requisitos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requisito'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
