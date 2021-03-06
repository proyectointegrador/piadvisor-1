<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades', true), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Posts');?></h3>
	<?php if (!empty($user['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['user_id'];?></td>
			<td><?php echo $post['title'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Universidades');?></h3>
	<?php if (!empty($user['Universidad'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Codigo'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Ciudad'); ?></th>
		<th><?php __('Idioma'); ?></th>
		<th><?php __('Calendario'); ?></th>
		<th><?php __('Disponibilidad Id'); ?></th>
		<th><?php __('Demanda Id'); ?></th>
		<th><?php __('Website'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Pais Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Activo'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Universidad'] as $universidad):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $universidad['id'];?></td>
			<td><?php echo $universidad['codigo'];?></td>
			<td><?php echo $universidad['name'];?></td>
			<td><?php echo $universidad['ciudad'];?></td>
			<td><?php echo $universidad['idioma'];?></td>
			<td><?php echo $universidad['calendario'];?></td>
			<td><?php echo $universidad['disponibilidad_id'];?></td>
			<td><?php echo $universidad['demanda_id'];?></td>
			<td><?php echo $universidad['website'];?></td>
			<td><?php echo $universidad['user_id'];?></td>
			<td><?php echo $universidad['pais_id'];?></td>
			<td><?php echo $universidad['created'];?></td>
			<td><?php echo $universidad['modified'];?></td>
			<td><?php echo $universidad['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'universidades', 'action' => 'view', $universidad['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'universidades', 'action' => 'edit', $universidad['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'universidades', 'action' => 'delete', $universidad['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $universidad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Universidad', true), array('controller' => 'universidades', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
