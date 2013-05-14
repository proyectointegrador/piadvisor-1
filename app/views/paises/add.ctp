<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para agregar paises.
 */
?>

<?php
/**
 * Campos para agregar los datos a país
 */
?>

<div class="paises form">
<?php echo $this->Form->create('Pais',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Pais'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Nombre'));
		echo $this->Form->input('region_id',array('label'=>'Región'));
		echo $this->Form->input('activo', array('value'=> '1', 'type' =>'hidden'));
		echo $this->Form->input('File.image',array('type'=>'file','label'=>'Bandera'));
		
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
		<li><?php echo $this->Html->link(__('Lista Paises',true), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Universidades',true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
	</ul>
</div>
