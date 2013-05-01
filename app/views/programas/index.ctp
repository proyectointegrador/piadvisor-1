<div class="programas index">
	<h2><?php __('Programas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('name2');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($programas as $programa):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $programa['Programa']['id']; ?>&nbsp;</td>
		<td><?php echo $programa['Programa']['name']; ?>&nbsp;</td>
		<td><?php echo $programa['Programa']['name2']; ?>&nbsp;</td>
		<td><?php echo $programa['Programa']['descripcion']; ?>&nbsp;</td>
		<td><?php echo $programa['Programa']['activo']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $programa['Programa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $programa['Programa']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $programa['Programa']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $programa['Programa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Programa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>