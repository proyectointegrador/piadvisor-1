<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar Disponibilidades.
 */

?>
<div class="disponibilidades index">
	<h2><?php echo __('Disponibilidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre','name'); ?></th>
			<th><?php echo $this->Paginator->sort('Descripción','descripcion'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($disponibilidades as $disponibilidad): ?>
	<tr>
		<td><?php echo h($disponibilidad['Disponibilidad']['id']); ?>&nbsp;</td>
		<td><?php echo h($disponibilidad['Disponibilidad']['name']); ?>&nbsp;</td>
		<td><?php echo h($disponibilidad['Disponibilidad']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $disponibilidad['Disponibilidad']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count% totales, empezando en %start%, terminando en %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Disponibilidad',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Universidades',true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>
