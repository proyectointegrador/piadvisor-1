<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para editar parámetros.
 */
?>

<?php
/**
 * Campos para editar los datos de parámetros
 */
?>

<div class="parametros form">
<?php echo $this->Form->create('Parametro');?>
	<fieldset>
		<legend><?php __('Configuración de Correo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => 'Nombre'));
		echo $this->Form->input('texto1',array('label' => 'Encabezado'));
		echo $this->Form->input('texto2',array('label' => 'Cuerpo'));
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
		<li><?php echo $this->Html->link(__('Lista Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>