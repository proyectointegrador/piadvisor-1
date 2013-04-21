<table class="table table-striped" >
	<tr>
			<th><?php echo __('Codigo'); ?></th>
			<th><?php echo __('Universidad'); ?></th>
			<th><?php echo __('Idioma'); ?></th>
			<th><?php echo __('Ciudad'); ?></th>
			<th><?php echo __('Detalles'); ?></th>
	</tr>
	<?php foreach ($universidades as $universidad): ?>
	<tr>
		<td><?php echo h($universidad['Universidad']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['name']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['idioma']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['ciudad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver Detalles'), array('action' => 'ver_universidad', $universidad['Universidad']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>