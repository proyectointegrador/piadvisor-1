<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para agregar areas.
 */
?>

<?php
/**
 * Campos para agregar los datos a areas
 */
?>

<div class="areas form">
<?php echo $this->Form->create('Area'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Area'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar',true)); ?>
</div>

<?php
/**
 * Menú principal con la lista de todas las áreas disponibles para usar por el usuario
 */
?>

<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Areas',true), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Carreras',true), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
	</ul>
</div>
