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
	
<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>

	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('Carrera','name'); ?></th>
		<th><?php echo $this->Paginator->sort('Nombre','name2'); ?></th>
		<th><?php echo $this->Paginator->sort('area_id'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($carreras as $carrera): ?>

<?php
/**
 * Contenido de cada columna de la tabla disponibilidades
 */
?>

	<tr>
		<td><?php echo h($carrera['Carrera']['id']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['name']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['name2']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Area']['name']); ?>	</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $carrera['Carrera']['id'])); ?>
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
 * Menu principial con la lista de todas las areas disponibles para usar por el usuario
 */
?>

<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Carrera',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Areas',true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
	</ul>
</div>
