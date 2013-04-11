<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar carreras.
 */

?>
<div class="carreras index">
	<h2><?php echo __('Carreras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Carrera'); ?></th>
			<th><?php echo $this->Paginator->sort('name2','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($carreras as $carrera): ?>
	<tr>
		<td><?php echo h($carrera['Carrera']['id']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['name']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['name2']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($carrera['Area']['name'], array('controller' => 'areas', 'action' => 'view', $carrera['Area']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $carrera['Carrera']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} totales, empezando en {:start}, terminando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Carrera',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Areas',true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
	</ul>
</div>
