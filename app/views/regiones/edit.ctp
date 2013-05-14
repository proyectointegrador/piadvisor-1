<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para editar regiones.
 */
?>

<?php
/**
 * Campos para editar los datos de regiones
 */
?>

<div class="regiones form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php __('Editar Region'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('activo', array('value'=> '1', 'type' =>'hidden'));
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
		<li><?php echo $this->Html->link(__('Lista Regiones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lista Paises', true), array('controller' => 'paises', 'action' => 'index')); ?> </li>
	</ul>
</div>