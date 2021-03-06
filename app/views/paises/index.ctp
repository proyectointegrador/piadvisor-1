<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar paises.
 */
?>
<div class="paises index">
	<h2><?php echo __('Paises'); ?></h2>
	<table cellpadding="0" cellspacing="0">

<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('Nombre','name'); ?></th>
		<th><?php echo $this->Paginator->sort('Región','region'); ?></th>
		<th><?php echo $this->Paginator->sort('bandera'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($paises as $pais): ?>

<?php
/**
 * Contenido de cada columna de la tabla disponibilidades
 */
?>

	<tr>
		<td><?php echo h($pais['Pais']['id']); ?>&nbsp;</td>
		<td><?php echo h($pais['Pais']['name']); ?>&nbsp;</td>
		<td><?php echo h($pais['Region']['name']); ?>&nbsp;</td>
		<td style="text-align:center;">
			<?php
			if(!empty($pais['Pais']['bandera'])){
				echo $this->Html->image('paises/'.$pais['Pais']['bandera'],array('width'=>'20px','height'=>'20px'));
			}
			?>
		</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $pais['Pais']['id'])); ?>
			
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
		<li><?php echo $this->Html->link(__('Nuevo País',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Universidades',true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>
