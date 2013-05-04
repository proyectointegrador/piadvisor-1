<div class="universidades view">
<h2><?php  echo __('Universidad'); ?></h2>
	<dl>
		<dt><?php echo __('Programa'); ?></dt>
		<dd>
			<?php echo h($universidad['Programa']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Idioma'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['idioma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calendario'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['calendario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disponibilidad'); ?></dt>
		<dd>
			<?php echo h($universidad['Disponibilidad']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Demanda'); ?></dt>
		<dd>
			<?php echo h($universidad['Demanda']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('País'); ?></dt>
		<dd>
			<?php echo h($universidad['Pais']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Último Usuario Que Modificó'); ?></dt>
		<dd>
			<?php echo h($universidad['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de Creación'); ?></dt>
		<dd>
			<?php 

				$date = new DateTime($universidad['Universidad']['created']);
				$date->setTimezone(new DateTimeZone('America/Monterrey'));
				echo $date->format('d/F/Y h:i:s a');
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ultima Modificación'); ?></dt>
		<dd>
			<?php  
				$date = new DateTime($universidad['Universidad']['modified']);
				$date->setTimezone(new DateTimeZone('America/Monterrey'));
				echo $date->format('d/F/Y h:i:s a');
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php 
					if($universidad['Universidad']['activo'] == '1'){
						echo $this->Html->image('activo.png',array('alt'=>'Activo','width'=>'30px'));
					}else{
						echo $this->Html->image('inactivo.png',array('alt'=>'Inactivo','width'=>'30px'));
					}
			?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo $this->Html->link(__('Inicio',true), array('controller' => 'universidades', 'action' => 'index')); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Universidad',true), array('action' => 'edit', $universidad['Universidad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Universidades',true), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Carreras Relacionadas'); ?></h3>
	<?php if (!empty($universidad['Carrera'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Siglas'); ?></th>
			<th><?php echo __('Nombre'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($universidad['Carrera'] as $carrera): ?>
			<tr>
				<td><?php echo $carrera['name']; ?></td>
				<td><?php echo $carrera['name2']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('Consideraciones Relacionadas'); ?></h3>
	<?php if (!empty($universidad['Requisito'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Clave'); ?></th>
			<th><?php echo __('Descripcion'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($universidad['Requisito'] as $requisito): ?>
			<tr>
				<td><?php echo $requisito['clave']; ?></td>
				<td><?php echo $requisito['descripcion']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>
