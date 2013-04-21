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
									'data' => $this->data
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
									'data' => $this->data
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
									'data' => $this->data
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
									'data' => $this->data
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