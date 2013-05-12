<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar usuarios.
 */
?>
<div class="users index">
	<h2><?php __('Usuarios');?></h2>
	<table cellpadding="0" cellspacing="0">

<?php
/**
 * Titulo de cada columna de la tabla universidades
 */
?>
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('Usuario');?></th>
		<th><?php echo $this->Paginator->sort('Contraseña');?></th>
		<th><?php echo $this->Paginator->sort('Grupo','group_id');?></th>
		<th><?php echo $this->Paginator->sort('activo');?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>

<?php
/**
 * Contenido de cada columna de la tabla disponibilidades
 */
?>

	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['Group']['name']; ?>&nbsp;</td>
		<td style="text-align:center;">
				<?php 
					if($user['User']['activo'] == '1'){
						echo $this->Html->image('activo.png',array('alt'=>'Activo','width'=>'30px'));
					}else{
						echo $this->Html->image('inactivo.png',array('alt'=>'Inactivo','width'=>'30px'));
					}
				?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Grupos', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>