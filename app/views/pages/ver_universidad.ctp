<?php 
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Esta es la vista del detalle de universidad.
 */
?>
  	<h3>		<?php echo h($universidad['Universidad']['name']); ?></h3>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
      <?php
        
        echo $this->Html->image('paises/'.$universidad['Pais']['bandera'], array('class'=>'img-rounded'));
      ?>

    </div>
    <div class="span10">
      <!--Body content-->
      <?php echo __('Codigo'); ?>: &nbsp;<?php echo h($universidad['Universidad']['codigo']); ?></br>
      <?php echo __('Ubicación'); ?>: &nbsp;<?php echo h($universidad['Universidad']['ciudad']); ?>, &nbsp;<?php echo h($universidad['Pais']['name']); ?></br>
      <?php echo __('Requisitos de Idioma'); ?>: &nbsp;<?php echo h($universidad['Universidad']['idioma']); ?></br>
			
      <?php echo __('Calendario'); ?>: &nbsp;<?php echo h($universidad['Universidad']['calendario']); ?></br>
      <?php echo __('Disponibilidad'); ?>: &nbsp;<?php echo h($universidad['Disponibilidad']['name']); ?></br>
       <?php echo __('Demanda'); ?>: &nbsp;<?php echo h($universidad['Demanda']['name']); ?>
     </br>
       <?php echo __('Programa'); ?>: &nbsp;<?php echo h($universidad['Programa']['name']); ?>
       </br>
      <?php echo __('Website'); ?>: &nbsp;<?php echo $this->Html->link($universidad['Universidad']['website'],'http://'.$universidad['Universidad']['website']); ?></br>
      <?php echo __('Más Información'); ?>: &nbsp;<?php echo $this->Html->link($universidad['Universidad']['codigo'],'http://mty116.mty.itesm.mx/temporal/pi/dyn/viewInfo.php?chUniCode='.$universidad['Universidad']['codigo']); ?></br>

        <a href="#myModal" role="button" class="btn" data-toggle="modal">Enviar información a mi correo</a>


    </div>
  </div>
</div>
</br>

<div class="modal hide fade" id="myModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Enviar Oportunidad de Intercambio</h3>
  </div>
  <div id="resultCorreo">
    <div class="modal-body">
        <?php
          echo $this->Form->create('Universidad');

          echo $this->Form->input('Universidad.id', array('type'=>'hidden', 'value'=>$universidad['Universidad']['id']));
          echo $this->Form->input('Page.correo',array('class'=>'input-block-level','label'=>'Correo:'));
          ?>
            </div>
    <div class="modal-footer">

      <a id="BtnEnviar" class="btn btn-primary">Enviar correo</a>
      <?php 
          $datos = $this->Js->get("#UniversidadVerUniversidadForm")->serializeForm(array('isForm' => true, 'inline' => true));

          $this->Js->get('#BtnEnviar')->event('click', $this->Js->request( 
          array('controller' => 'pages', 'action' => 'enviarcorreo'), 
          array( 
          'update' => '#resultCorreo',
          'async' => true, 
          'dataExpression' => true, 
          'method' => 'post', 
          'data' => $datos
          ) ) );
        ?>

      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>



<div class="related">
	<h3><?php echo __('Consideraciones Importantes'); ?></h3>
	<?php if (!empty($universidad['Requisito'])): ?>


   <div class="container-fluid">  
     <div class="accordion" id="accordion2">  
	<?php
		$i = 0;
		foreach ($universidad['Requisito'] as $requisito): ?>            

            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $requisito['clave']; ?>">  
                 <?php echo $requisito['clave']; ?>: <?php echo $requisito['Categoria']['name']; ?>  
                </a>  
              </div>  
              <div id="<?php echo $requisito['clave']; ?>" class="accordion-body collapse">  
                <div class="accordion-inner">  
                  <?php echo $requisito['descripcion']; ?> 
                </div>  
              </div>  
            </div>  
              	<?php endforeach; ?>

            </div>  
          </div>  
    </div> 
		
<?php endif; ?>

</div>



<div class="related">
  <h3><?php echo __('Areas'); ?></h3>
     <div class="container-fluid">  
     <div class="accordion" id="a3">  


  <?php 
$y=0;  

  if (!empty($areas)): 

    foreach ($areas as $area) {
  ?>


            <div class="accordion-group">  
              <div class="accordion-heading">  
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#a3" href="#<?php echo $y; ?>">  
                 <?php echo $area['Area']['name']; ?>  
                </a>  
              </div>
<div id="<?php echo $y; ?>" class="accordion-body collapse">  
                <div class="accordion-inner">  

   <table cellpadding = "0" cellspacing = "0">
    <tr>
      <th><?php echo __('Carrera'); ?></th>
    </tr>
    <?php
      $i = 0;
      foreach ($area['Carrera'] as $carrera): ?>

      <tr>
        <td><?php echo $carrera['name']; ?></td>
        </tr>

    <?php endforeach; ?>
              </table>

</div>


                </div>  
              </div>








 

<?php
$y++;

    }
    endif; ?>

            </div>  
          </div>  

</div>


        <script>
            $(function () {
                $('#tooltip1').tooltip();
            });
        </script>
<?php
  echo $this->Js->writeBuffer();
?>