<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar programas.
 */
?>
<div class="programas index">
	<h2><?php __('Programas');?></h2>
	<table cellpadding="0" cellspacing="0">

<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('Programa','name');?></th>
		<th><?php echo $this->Paginator->sort('Nombre','name2');?></th>
		<th><?php echo $this->Paginator->sort('Descripción','descripcion');?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>

<?php
/**
 * Contenido de cada columna de la tabla disponibilidades
 */
?>

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
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $programa['Programa']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>

<?php
/**
 * Botones para el cambio de página
 */
?>
	<p>
		<?php echo $this->Paginator->counter(array('format' => __('Página %page% de %pages%, mostrando %current% registros de %count% totales, empezando en %start%, terminando en %end%', true)));	?>	
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	  	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<?php
/**
 * Menú principal con la lista de todas las áreas disponibles para usar por el usuario
 */
?>

<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Programa', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>