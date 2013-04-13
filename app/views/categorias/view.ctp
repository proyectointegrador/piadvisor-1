<div class="categorias view">
<h2><?php  echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), null, __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requisitos'), array('controller' => 'requisitos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requisito'), array('controller' => 'requisitos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Requisitos'); ?></h3>
	<?php if (!empty($categoria['Requisito'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Clave'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Descripcion2'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modifed'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Requisito'] as $requisito): ?>
		<tr>
			<td><?php echo $requisito['id']; ?></td>
			<td><?php echo $requisito['categoria_id']; ?></td>
			<td><?php echo $requisito['clave']; ?></td>
			<td><?php echo $requisito['descripcion']; ?></td>
			<td><?php echo $requisito['descripcion2']; ?></td>
			<td><?php echo $requisito['created']; ?></td>
			<td><?php echo $requisito['modifed']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'requisitos', 'action' => 'view', $requisito['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'requisitos', 'action' => 'edit', $requisito['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'requisitos', 'action' => 'delete', $requisito['id']), null, __('Are you sure you want to delete # %s?', $requisito['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Requisito'), array('controller' => 'requisitos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
