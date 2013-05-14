﻿<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para agregar usuarios.
 */
?>

<?php
/**
 * Campos para agregar los datos a usuarios
 */
?>

<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Nuevo Usuario'); ?></legend>
	<?php
		echo $this->Form->input('username', array('label'=>'Usuario'));
		echo $this->Form->input('passwd', array('label'=>'Contraseña'));
		echo $this->Form->input('passwd_confirm', array('label'=>'Confirmar Contraseña','type'=>'password'));
		echo $this->Form->input('group_id', array('label'=>'Grupo'));
		echo $this->Form->input('activo', array('type'=>'hidden','value'=>'1'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>

<?php
/**
 * Menú principal con la lista de todas las áreas disponibles para usar por el usuario
 */
?>

<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Usuarios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lista Grupos', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>