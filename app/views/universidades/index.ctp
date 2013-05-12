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
	
<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>

	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
		<th><?php echo $this->Paginator->sort('código'); ?></th>
		<th><?php echo $this->Paginator->sort('Nombre','name'); ?></th>
		<th><?php echo $this->Paginator->sort('ciudad'); ?></th>
		<th><?php echo $this->Paginator->sort('País','pais_id'); ?></th>
		<th><?php echo $this->Paginator->sort('Publicado','activo'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>

<?php
/**
 * Contenido de cada columna de la tabla universidades
 */
?>

	<?php foreach ($universidades as $universidad): ?>
	<tr>
		<td><?php echo h($universidad['Programa']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($universidad['Universidad']['codigo']), array('action' => 'view', $universidad['Universidad']['id'])); ?></td>
		<td><?php echo h($universidad['Universidad']['name']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Pais']['name']); ?></td>
		<td style="text-align:center;">
		<?php 
			if($universidad['Universidad']['activo'] == '1'){
				echo $this->Html->image('activo.png',array('alt'=>'Activo','width'=>'30px'));
			}else{
				echo $this->Html->image('inactivo.png',array('alt'=>'Inactivo','width'=>'30px'));
			}
		?>
		</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Editar',true), array('action' => 'edit', $universidad['Universidad']['id'])); ?>
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
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Universidad',true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Disponibilidades',true), array('controller' => 'disponibilidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Demandas',true), array('controller' => 'demandas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Categorias',true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Paises',true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Regiones',true), array('controller' => 'regiones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Carreras',true), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Areas',true), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Requisitos',true), array('controller' => 'requisitos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Programas',true), array('controller' => 'programas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Configuraciones',true), array('controller' => 'parametros', 'action' => 'edit',1)); ?> </li>
		<li><?php echo $this->Html->link(__('Grupos',true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Usuarios',true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cambiar Contraseña',true), array('controller' => 'users', 'action' => 'cambiar_pass')); ?> </li>
	</ul>
</div>
