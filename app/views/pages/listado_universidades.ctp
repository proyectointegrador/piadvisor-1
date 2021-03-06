<?php 
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Esta es la vista se despliega las universidades de la version de pc.
 */
?>
<?php


?>


<!--Forma encargada de filtrar la informacion de las universidades al realizar una llamada ajax a listadoAjax-->

	 	<?php echo $this->Form->create('Page',array('action'=>'')); ?>
	 	<div class="forma on-6 columns">
	 		<div class="campo column" style="">
	 			<?php
	 			echo $this->Form->input('Page.name',array('class'=>'input-block-level','label'=>'Nombre'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<?php
	 			echo $this->Form->input('Page.carrera_id',array('class'=>'input-block-level','empty'=>'----'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<?php
	 			echo $this->Form->input('Page.region_id',array('class'=>'input-block-level','options' => $regiones,'empty'=>'----'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<div id="paisajax" class="paislistado">
					<?php

						echo $this->Form->input('Page.pais_id',array('class'=>'input-block-level','empty'=>'----','label'=>'País'));
					  ?>
				 </div>
	 		</div>
	 		<div class="campo column" style="">
	 			<?php
	 			echo $this->Form->input('Page.programa_id',array('class'=>'input-block-level','empty'=>'----'));
	 			?>
	 		</div>
	 		<?php
				$this->Js->get('#PageRegionId')->event('change', $this->Js->request( 
							array('controller' => 'pages', 'action' => 'paisajax'), 
							array( 
							'update' => '#paisajax',
							'async' => true, 
							'dataExpression' => true, 
							'method' => 'post', 
							'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
							) ) );
			?>
	 		<div class="campo column">
	 		
	 		<br/>
	 		<br/>
				<!--llamada a listadoAjax  -->

		  		<button id="Filtrar" class="btn"  style="text-align:right;">Filtrar</button>
		  		<?php
		  			$datos = $this->Js->get("#PageListadoUniversidadesForm")->serializeForm(array('isForm' => true, 'inline' => true));
		  			
					$this->Js->get('#Filtrar')->event('click', $this->Js->request( 
								array('controller' => 'pages', 'action' => 'listadoajax'), 
								array( 
								'update' => '#listadoajax',
								'async' => true, 
								'dataExpression' => true, 
								'method' => 'post', 
								'data' => $datos
								) ) );

				?>
		  	</div>
		</div>
		<?php echo $this->Form->end();?>



<!--se flitra la informacion de las universidades dependiendo de que atributo se selecciono  -->

<div id="listadoajax">
	<table class="table table-striped" >
		<tr>
				<th>
					<a id="Codigo" class="filtrouni" >Codigo</a>
					<?php
			  			
						$this->Js->get('#Codigo')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','codigo'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post', 
									'data' => $datos
									) ) );

					?>
				</th>
				<th>
					<a id="Universidad" class="filtrouni">Universidad</a>
					<?php
			  			
						$this->Js->get('#Universidad')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','name'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post', 
									'data' => $datos
									) ) );

					?>
				</th>
				<th>
					<a id="Idioma" class="filtrouni">Idioma</a>
					<?php
			  			
						$this->Js->get('#Idioma')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','idioma'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post', 
									'data' => $datos
									) ) );

					?>
				</th>
				<th>
					<a id="Ciudad" class="filtrouni">Ciudad</a>
					<?php
			  			
						$this->Js->get('#Ciudad')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','ciudad'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post', 
									'data' => $datos
									) ) );

					?>
				</th>
				<th><?php echo __('Detalles'); ?></th>
		</tr>

		<!--se despliega el listado de universidades  -->


		<?php foreach ($universidades as $universidad): ?>
			<tr>
				<td><?php echo h($universidad['Universidad']['codigo']); ?>&nbsp;</td>
				<td><?php echo h($universidad['Universidad']['name']); ?>&nbsp;</td>
				<td><?php echo h($universidad['Universidad']['idioma']); ?>&nbsp;</td>
				<td><?php echo h($universidad['Universidad']['ciudad']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver Detalles',true), array('action' => 'ver_universidad', $universidad['Universidad']['id'])); ?>
				</td>
			</tr>

		<?php endforeach; ?>
		</table>
</div>
		



<?php
  echo $this->Js->writeBuffer();
?>

<div style='background-color:#153458;height:100px;'>
Programas Internacionales 2013
</div>