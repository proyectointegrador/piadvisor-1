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



<br/>

<div class="container-fluid">  
     <div class="accordion" id="accordion2">  
          

            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#filter">  
                 Redefinir búsqueda 
                </a>  
              </div>  
              <div id="filter" class="accordion-body collapse">  
                <div class="accordion-inner">  





	 	<?php echo $this->Form->create('Page',array('action'=>'listado_universidades')); ?>

	 			<label>Nombre</label>
	 			<input  type="text" class="input-block-level" id="appendedInputButton" style="text-align:right;" >
	 			<?php
	 			echo $this->Form->input('Page.carrera_id',array('empty'=>'----', 'class'=>'input-block-level'));
	 			?>	
	 			<?php
	 			echo $this->Form->input('Page.continente_id',array('options' => $continentes,'empty'=>'----', 'class'=>'input-block-level'));
	 			?>	

	 				 			<?php
	 			echo $this->Form->input('Page.pais_id',array('empty'=>'----', 'class'=>'input-block-level'));
	 			?>

<button id="Filtrar" class="btn btn-large btn-block btn-primary" type="submit">Filtrar</button>
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
	 			 		<?php echo $this->Form->end();?>
			







                 
                </div>  
              </div>  
            </div>  
             

            </div>  
          </div>  
    </div>






<div id="listadoajax">
	<table class="table table-striped" >
	<tr>
			<th><?php echo _('Universidad'); ?></th>
	</tr>
	<?php foreach ($universidades as $universidad): ?>
<a href="/es/recipes/view/6">
	
	<tr id ="<?php echo $universidad['Universidad']['id'];?>" onclick="goToDescription(this.id)">

		<td>

			<?php echo h($universidad['Universidad']['codigo']); ?>&nbsp; <?php echo h($universidad['Universidad']['name']); ?> <br/>

<?php echo _('Idioma'); ?>:&nbsp;<?php echo h($universidad['Universidad']['idioma']); ?><br/>




	</tr>
</a>
<?php endforeach; ?>
	</table>

</div>

<?php
  echo $this->Js->writeBuffer();
?>


<script type="text/javascript">
    function goToDescription(value){
        window.location = "./ver_universidad/"+value;
    }
</script>
