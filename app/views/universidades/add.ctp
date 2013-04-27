<div class="universidades form">
<?php echo $this->Form->create('Universidad'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Universidad'); ?></legend>
	<?php
	    echo $this->Form->input('activo',array('type'=>'checkbox','checked'=>true));
		echo $this->Form->input('codigo', array('label'=>'Código'));
		echo $this->Form->input('name',array('label' => 'Nombre'));
		echo $this->Form->input('ciudad');
		echo $this->Form->input('calendario');
		echo $this->Form->input('disponibilidad_id');
		echo $this->Form->input('demanda_id');
		echo $this->Form->input('website',array('label' => 'Pagina Web'));
		echo $this->Form->input('idioma',array('label'=> 'Requisito de Idioma'));
		echo $this->Form->input('user_id',array('type' => 'hidden'));
		echo $this->Form->input('pais_id', array('label'=>'País'));
		echo $this->Form->input('activo', array('value'=> '1', 'type' =>'hidden'));
		
			
		echo $this->Form->input('Carrera',array('label'=>'Carreras Relacionadas','type'=>'checkbox','multiple'=>'checkbox','style' => '','class'=>'iaminline'));

		echo $this->Form->input('Requisito',array('label'=>'Consideraciones Relacionadas','type'=>'checkbox','multiple'=>'checkbox','style' => '','class'=>'iaminline'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar',true)); ?>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Universidades',true), array('action' => 'index')); ?></li>
	</ul>
</div> 
