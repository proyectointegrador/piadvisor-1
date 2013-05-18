<?php
/**
 *Autores:
 *  Edgar Garc�a Camarillo
 *  Eugenio Rafael Garc�a Garc�a
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripci�n: Esta es la vista de administraci�n
 * 				para agregar grupos.
 */
?>

<?php
/**
 * Campos para agregar los datos a grupo
 */
?>

<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php __('Nuevo Grupo'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>

<?php
/**
 * Men� principal con la lista de todas las �reas disponibles para usar por el usuario
 */
?>

<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Grupo', true), array('action' => 'index'));?></li>
	</ul>
</div>