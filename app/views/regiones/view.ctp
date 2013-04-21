<div class="regiones view">
<h2><?php  __('Region');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $region['Region']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $region['Region']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Activo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $region['Region']['activo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Region', true), array('action' => 'edit', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Region', true), array('action' => 'delete', $region['Region']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Regiones', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises', true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais', true), array('controller' => 'paises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Paises');?></h3>
	<?php if (!empty($region['Pais'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Bandera'); ?></th>
		<th><?php __('Region Id'); ?></th>
		<th><?php __('Activo'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($region['Pais'] as $pais):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $pais['id'];?></td>
			<td><?php echo $pais['name'];?></td>
			<td><?php echo $pais['bandera'];?></td>
			<td><?php echo $pais['region_id'];?></td>
			<td><?php echo $pais['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'paises', 'action' => 'view', $pais['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'paises', 'action' => 'edit', $pais['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'paises', 'action' => 'delete', $pais['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pais['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pais', true), array('controller' => 'paises', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
