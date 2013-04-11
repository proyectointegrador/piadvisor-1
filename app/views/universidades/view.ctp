<div class="universidades view">
<h2><?php  echo __('Universidad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calendario'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['calendario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disponibilidad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($universidad['Disponibilidad']['name'], array('controller' => 'disponibilidades', 'action' => 'view', $universidad['Disponibilidad']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Demanda'); ?></dt>
		<dd>
			<?php echo $this->Html->link($universidad['Demanda']['name'], array('controller' => 'demandas', 'action' => 'view', $universidad['Demanda']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($universidad['User']['username'], array('controller' => 'users', 'action' => 'view', $universidad['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo $this->Html->link($universidad['Pais']['name'], array('controller' => 'paises', 'action' => 'view', $universidad['Pais']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Universidad'), array('action' => 'edit', $universidad['Universidad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Universidad'), array('action' => 'delete', $universidad['Universidad']['id']), null, __('Are you sure you want to delete # %s?', $universidad['Universidad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidades'), array('controller' => 'disponibilidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad'), array('controller' => 'disponibilidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Demandas'), array('controller' => 'demandas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Demanda'), array('controller' => 'demandas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requisitos'), array('controller' => 'requisitos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requisito'), array('controller' => 'requisitos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Carreras'); ?></h3>
	<?php if (!empty($universidad['Carrera'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Name2'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($universidad['Carrera'] as $carrera): ?>
		<tr>
			<td><?php echo $carrera['id']; ?></td>
			<td><?php echo $carrera['name']; ?></td>
			<td><?php echo $carrera['name2']; ?></td>
			<td><?php echo $carrera['area_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'carreras', 'action' => 'view', $carrera['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'carreras', 'action' => 'edit', $carrera['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'carreras', 'action' => 'delete', $carrera['id']), null, __('Are you sure you want to delete # %s?', $carrera['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Requisitos'); ?></h3>
	<?php if (!empty($universidad['Requisito'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Clave'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Descripcion2'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($universidad['Requisito'] as $requisito): ?>
		<tr>
			<td><?php echo $requisito['id']; ?></td>
			<td><?php echo $requisito['categoria_id']; ?></td>
			<td><?php echo $requisito['clave']; ?></td>
			<td><?php echo $requisito['descripcion']; ?></td>
			<td><?php echo $requisito['descripcion2']; ?></td>
			<td><?php echo $requisito['created']; ?></td>
			<td><?php echo $requisito['modified']; ?></td>
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
