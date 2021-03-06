<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para agregar una Categoría.
 */
?>

<?php
/**
 * Campos para agregar los datos a categoria
 */
?>

<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Categoria'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Nombre'));
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
		<li><?php echo $this->Html->link(__('Lista Categorias',true), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Requisitos',true), array('controller' => 'requisitos', 'action' => 'index')); ?> </li>
	</ul>
</div>
