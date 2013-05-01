<div class="programas view">
<h2><?php  __('Programa');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $programa['Programa']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $programa['Programa']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $programa['Programa']['name2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $programa['Programa']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Activo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $programa['Programa']['activo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Programa', true), array('action' => 'edit', $programa['Programa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Programa', true), array('action' => 'delete', $programa['Programa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $programa['Programa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Programas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programa', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Universidades');?></h3>
	<?php if (!empty($programa['Universidad'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Codigo'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Ciudad'); ?></th>
		<th><?php __('Idioma'); ?></th>
		<th><?php __('Calendario'); ?></th>
		<th><?php __('Disponibilidad Id'); ?></th>
		<th><?php __('Demanda Id'); ?></th>
		<th><?php __('Website'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Pais Id'); ?></th>
		<th><?php __('Programa Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Activo'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($programa['Universidad'] as $universidad):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $universidad['id'];?></td>
			<td><?php echo $universidad['codigo'];?></td>
			<td><?php echo $universidad['name'];?></td>
			<td><?php echo $universidad['ciudad'];?></td>
			<td><?php echo $universidad['idioma'];?></td>
			<td><?php echo $universidad['calendario'];?></td>
			<td><?php echo $universidad['disponibilidad_id'];?></td>
			<td><?php echo $universidad['demanda_id'];?></td>
			<td><?php echo $universidad['website'];?></td>
			<td><?php echo $universidad['user_id'];?></td>
			<td><?php echo $universidad['pais_id'];?></td>
			<td><?php echo $universidad['programa_id'];?></td>
			<td><?php echo $universidad['created'];?></td>
			<td><?php echo $universidad['modified'];?></td>
			<td><?php echo $universidad['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'universidades', 'action' => 'view', $universidad['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'universidades', 'action' => 'edit', $universidad['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'universidades', 'action' => 'delete', $universidad['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $universidad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
