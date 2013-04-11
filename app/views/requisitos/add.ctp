<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para listar Requisitos.
 */

<div class="requisitos form">
<?php echo $this->Form->create('Requisito'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Requisito'); ?></legend>
	<?php
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('clave');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('descripcion2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Requisitos',true), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Categorias',true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria',true), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div> 
