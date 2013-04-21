<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar Universidades.
 */

?>
<div class="universidades index">
	<h2><?php echo __('Universidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('código'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre','name'); ?></th>
			<th><?php echo $this->Paginator->sort('ciudad'); ?></th>
			<th><?php echo $this->Paginator->sort('calendario'); ?></th>
			<th><?php echo $this->Paginator->sort('disponibilidad_id'); ?></th>
			<th><?php echo $this->Paginator->sort('demanda_id'); ?></th>
			<th><?php echo $this->Paginator->sort('página web'); ?></th>
			<th><?php echo $this->Paginator->sort('País','pais_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($universidades as $universidad): ?>
	<tr>
		<td><?php echo h($universidad['Universidad']['id']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['name']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['calendario']); ?>&nbsp;</td>
		<td>
			<?php echo h($universidad['Disponibilidad']['name']); ?>
		</td>
		<td>
			<?php echo h($universidad['Demanda']['name']); ?>
		</td>
		<td><?php echo h($universidad['Universidad']['website']); ?>&nbsp;</td>
		<td>
			<?php echo h($universidad['Pais']['name']); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $universidad['Universidad']['id'])); ?>
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
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Universidad',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Disponibilidades',true), array('controller' => 'disponibilidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Demandas',true), array('controller' => 'demandas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Categorias',true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Paises',true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Regiones',true), array('controller' => 'regiones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Carreras',true), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Areas',true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Requisitos',true), array('controller' => 'requisitos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuarios',true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Grupos',true), array('controller' => 'groups', 'action' => 'index')); ?> </li>

	</ul>
</div>
