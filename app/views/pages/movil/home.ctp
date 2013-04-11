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

$continentes = Configure::read('Continentes');

?>
<?php echo $this->Form->create('Page',array('action'=>'listado_universidades')); ?>





<div class="container">
      <div class="form-signin">
<?php
	echo $this->Form->input('carrera_id',array('empty'=>'----', 'class'=>'input-block-level'));
	echo $this->Form->input('continente_id',array('options' => $continentes,'empty'=>'----', 'class'=>'input-block-level'));
?>

<?php

	$this->Js->get('#PageContinenteId')->event('change', $this->Js->request( 
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

		echo $this->Form->input('Page.pais_id',array('empty'=>'----', 'class'=>'input-block-level','label'=>'País'));
	  ?>
 </div>


        <button class="btn btn-large btn-block btn-primary" type="submit">Buscar</button>
		
		
<div style="color: gray;">
  <p>Nota: Puedes buscar seleccionando una carrera y/o continente y/o país.</p>
</div>


<?php echo $this->Form->end();
 ?>
      </div>

    </div> <!-- /container -->

<?php
  echo $this->Js->writeBuffer();
?>





