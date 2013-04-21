<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar Requisitos.
 */
 ?>
 <div class="requisitos index">
	<h2><?php echo __('Requisitos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('clave'); ?></th>
			<th><?php echo $this->Paginator->sort('descripciÃ³n'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($requisitos as $requisito): ?>
	<tr>
		<td><?php echo h($requisito['Requisito']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requisito['Categoria']['name'], array('controller' => 'categorias', 'action' => 'view', $requisito['Categoria']['id'])); ?>
		</td>
		<td><?php echo h($requisito['Requisito']['clave']); ?>&nbsp;</td>
		<td><?php echo h($requisito['Requisito']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $requisito['Requisito']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('PÃ¡gina %page% de %pages%, mostrando %current% registros de %count% totales, empezando en %start%, terminando en %end%', true)
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
		<li><?php echo $this->Html->link(__('Nuevo Requisito',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Categorias',true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria',true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
