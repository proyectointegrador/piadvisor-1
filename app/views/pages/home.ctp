<?php 
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Esta es la vista inicial del sistema.
 */
?>
<?php

?>
<?php echo $this->Form->create('Page',array('action'=>'listado_universidades'));
 ?>





<div class="container">
</br>
      <div class="form-signin">
<?php
	echo $this->Form->input('programa_id',array('empty'=>'----'));
	echo $this->Form->input('carrera_id',array('empty'=>'----'));
	echo $this->Form->input('region_id',array('options' => $regiones,'empty'=>'----'));
?>

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

<div id="paisajax" class="pais_content">
	<?php

		echo $this->Form->input('Page.pais_id',array('empty'=>'----','label'=>'País'));
	  ?>
 </div>


        <button class="btn btn-large btn-primary" type="submit">Buscar</button>
		
		
<div style="color: gray;">
  <p>Nota: Puedes buscar seleccionando una carrera y/o región y/o país.</p>
</div>


<?php echo $this->Form->end();
 ?>
      </div>

    </div> <!-- /container -->

<?php
  echo $this->Js->writeBuffer();
?>





