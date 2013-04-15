<table class="table table-striped" >
	<tr>
			<th><?php echo _('Codigo'); ?></th>
			<th><?php echo _('Universidad'); ?></th>
			<th><?php echo _('Idioma'); ?></th>
			<th><?php echo _('Detalles'); ?></th>
	</tr>
	<?php foreach ($universidades as $universidad): ?>
	<tr>
		<td><?php echo h($universidad['Universidad']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['name']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['idioma']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver Detalles'), array('action' => 'ver_universidad', $universidad['Universidad']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>