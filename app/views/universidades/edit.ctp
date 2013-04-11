<div class="universidades form">
<?php echo $this->Form->create('Universidad'); ?>
	<fieldset>
		<legend><?php echo __('Editar Universidad'); ?></legend>
	<?php
	    echo $this->Form->input('activo');
		echo $this->Form->input('id');
		echo $this->Form->input('codigo',array('type'=>'hidden'));
		echo $this->Form->input('name',array('label' => 'Nombre'));
		echo $this->Form->input('ciudad');
		echo $this->Form->input('calendario');
		echo $this->Form->input('disponibilidad_id');
		echo $this->Form->input('demanda_id');
		echo $this->Form->input('website');
		echo $this->Form->input('user_id',array('type'=>'hidden'));
		echo $this->Form->input('pais_id');

		
		echo $this->Form->input('Carrera',array('label'=>'Carreras Relacionadas','multiple'=>'checkbox','class'=>'iaminline'));
		echo $this->Form->input('Requisito',array('label'=>'Requisitos Relacionados','type'=>'checkbox','multiple'=>'checkbox','style' => '','class'=>'iaminline'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lista Universidades',true), array('action' => 'index')); ?></li>
		
	</ul>
</div>
