<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para agregar Requisitos.
 */
?>
<div class="requisitos form">
<?php echo $this->Form->create('Requisito'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Requisito'); ?></legend>
	<?php
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('clave');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('activo', array('value'=> '1', 'type' =>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar',true)); ?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Requisitos',true), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Categorias',true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
	</ul>
</div> 
