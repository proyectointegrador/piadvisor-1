<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Esta es la vista de administración
 * 				para editar paises.
 */
?>
<div class="paises form">
<?php echo $this->Form->create('Pais',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Pais'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('region_id', array('label'=>'Región'));
		echo $this->Form->input('activo', array('value'=> '1', 'type' =>'hidden'));
		echo $this->Form->input('File.image',array('type'=>'file','label'=>'Bandera'));
		if(!empty($this->data['Pais']['bandera'])){
			echo $this->Html->image('paises/'.$this->data['Pais']['bandera']);
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar',true)); ?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Paises',true), array('action' => 'index')); ?></li>
	</ul>
</div>
