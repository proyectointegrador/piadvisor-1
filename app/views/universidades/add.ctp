<div class="universidades form">
<?php echo $this->Form->create('Universidad'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Universidad'); ?></legend>
	<?php
	    echo $this->Form->input('activo',array('label' => 'Publicar', 'type'=>'checkbox','checked'=>true));
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
		echo $this->Form->input('programa_id', array('label'=>'Programa'));		

			
	?>
	<div id="Carrera">
		<?php
			echo $this->Form->input('Carrera',array('label'=>'Carreras Relacionadas','type'=>'checkbox','multiple'=>'checkbox','style' => '','class'=>'iaminline'));
		?>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			var divCarrera = document.getElementById("Carrera");
			var divInter = divCarrera.childNodes[1];
			
			var fieldsets = divInter.getElementsByTagName("fieldset");

			for(var i = 0;i< fieldsets.length;i++){

				//inciializa los checkbox
				var checkboxes = fieldsets[i].getElementsByTagName('input');
				for(var j = 0;j < checkboxes.length; j++){
					checkboxes[j].checked = false;
				}

				var div = document.createElement('div');
				//creamos el checkbox
				var checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.value=i;
				checkbox.onchange = function(){
					var divCarrera = document.getElementById("Carrera");
					var divInter = divCarrera.childNodes[1];
					
					var fieldsets = divInter.getElementsByTagName("fieldset");

					var checkboxes = fieldsets[this.value].getElementsByTagName('input');
					if(this.checked){
						for(var i = 0;i < checkboxes.length; i++){
							checkboxes[i].checked = true;
						}
						
					}else{
						for(var i = 0;i < checkboxes.length; i++){
							checkboxes[i].checked = false;
						}
					}
				};

				//creamos el label
				var label = document.createElement('label')
				label.htmlFor = "Seleccionar Todos";
				label.appendChild(document.createTextNode('label'));
				label.innerHTML = "Seleccionar Todos";


				var legend = fieldsets[i].childNodes[0];
				div.appendChild(checkbox);
				div.appendChild(label);

				legend.appendChild(div);
			}			
		}
	</script>
	<?php
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
