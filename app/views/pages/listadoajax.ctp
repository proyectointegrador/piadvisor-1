<table class="table table-striped" >
		<tr>
				<th>
					<a id="Codigo" class="filtrouni">Codigo
					<?php

			  			if($estado['orden'] == 'Universidad.codigo ASC'){
			  				echo $this->Html->image("flecha_azul_abajo.png",array('class'=>'imgfiltroorder'));
			  			}else if($estado['orden'] == 'Universidad.codigo DESC'){
			  				echo $this->Html->image("flecha_azul_arriba.png",array('class'=>'imgfiltroorder'));
			  			}
						$this->Js->get('#Codigo')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','codigo'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post'
									) ) );

					?>
					</a>
				</th>
				<th>
					<a id="Universidad" class="filtrouni">Universidad
					<?php
			  			if($estado['orden'] == 'Universidad.name ASC'){
			  				echo $this->Html->image("flecha_azul_abajo.png",array('class'=>'imgfiltroorder'));
			  			}else if($estado['orden'] == 'Universidad.name DESC'){
			  				echo $this->Html->image("flecha_azul_arriba.png",array('class'=>'imgfiltroorder'));
			  			}
						$this->Js->get('#Universidad')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','name'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post'
									) ) );

					?>
					</a>
				</th>
				<th>
					<a id="Idioma" class="filtrouni">Idioma
					<?php
			  			if($estado['orden'] == 'Universidad.idioma ASC'){
			  				echo $this->Html->image("flecha_azul_abajo.png",array('class'=>'imgfiltroorder'));
			  			}else if($estado['orden'] == 'Universidad.idioma DESC'){
			  				echo $this->Html->image("flecha_azul_arriba.png",array('class'=>'imgfiltroorder'));
			  			}
						$this->Js->get('#Idioma')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','idioma'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post'
									) ) );

					?>
					</a>
				</th>
				<th>
					<a id="Ciudad" class="filtrouni">Ciudad
					<?php
			  			if($estado['orden'] == 'Universidad.ciudad ASC'){
			  				echo $this->Html->image("flecha_azul_abajo.png",array('class'=>'imgfiltroorder'));
			  			}else if($estado['orden'] == 'Universidad.ciudad DESC'){
			  				echo $this->Html->image("flecha_azul_arriba.png",array('class'=>'imgfiltroorder'));
			  			}
						$this->Js->get('#Ciudad')->event('click', $this->Js->request( 
									array('controller' => 'pages', 'action' => 'listadoajaxordena','ciudad'), 
									array( 
									'update' => '#listadoajax',
									'async' => true, 
									'dataExpression' => true, 
									'method' => 'post'
									) ) );

					?>
					</a>
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

<?php
  echo $this->Js->writeBuffer();
?>