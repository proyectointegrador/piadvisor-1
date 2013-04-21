<?php 
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Esta es la vista de la lista de universidades.
 */
?>
<?php

$continentes = Configure::read('Continentes');

?>



	 	<?php echo $this->Form->create('Page',array('action'=>'')); ?>
	 	<div class="forma on-5 columns">
	 		<div class="campo column" style="">
	 			<?php
	 			echo $this->Form->input('Page.name',array('class'=>'input-block-level','label'=>'Nombre'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<?php
	 			echo $this->Form->input('Page.carrera_id',array('empty'=>'----'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<?php
	 			echo $this->Form->input('Page.continente_id',array('options' => $continentes,'empty'=>'----'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 			<?php
	 			echo $this->Form->input('Page.pais_id',array('empty'=>'----'));
	 			?>
	 		</div>
	 		<div class="campo column">
	 		
	 		<br/>
	 		<br/>

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


<div id="listadoajax">
	<table class="table table-striped" >
		<tr>
				<th>
					<a id="Codigo" >Codigo</a>
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
					<a id="Universidad" >Universidad</a>
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
					<a id="Idioma" >Idioma</a>
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
					<a id="Ciudad" >Ciudad</a>
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