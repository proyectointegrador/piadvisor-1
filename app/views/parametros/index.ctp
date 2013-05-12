<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar parametros.
 */
?>
<div class="parametros index">
	<h2><?php __('Configuración de Correo');?></h2>
	<table cellpadding="0" cellspacing="0">
	
<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('Nombre','name');?></th>
		<th><?php echo $this->Paginator->sort('Encabezado','texto1');?></th>
		<th><?php echo $this->Paginator->sort('Cuerpo','texto2');?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>

<?php
/**
 * Contenido de cada columna de la tabla disponibilidades
 */
?>

	<?php
	$i = 0;
	foreach ($parametros as $parametro):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $parametro['Parametro']['id']; ?>&nbsp;</td>
		<td><?php echo $parametro['Parametro']['name']; ?>&nbsp;</td>
		<td><?php echo $parametro['Parametro']['texto1']; ?>&nbsp;</td>
		<td><?php echo $parametro['Parametro']['texto2']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $parametro['Parametro']['id'])); ?>
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
	</ul>
</div>