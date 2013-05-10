<table class="table table-striped" >
	<tr>
			<th><?php echo __('Universidad'); ?></th>
	</tr>
	<?php foreach ($universidades as $universidad): ?>
<a href="/es/recipes/view/6">
	
	<tr id ="<?php echo $universidad['Universidad']['id'];?>" onclick="goToDescription(this.id)">

		<td>

			<?php echo h($universidad['Universidad']['codigo']); ?>&nbsp; <?php echo h($universidad['Universidad']['name']); ?> <br/>

<?php echo __('Idioma'); ?>:&nbsp;<?php echo h($universidad['Universidad']['idioma']); ?><br/>
<?php echo __('Programa'); ?>: &nbsp;<?php echo h($universidad['Programa']['name']); ?><br/>




	</tr>
</a>
<?php endforeach; ?>
	</table>

<?php
  echo $this->Js->writeBuffer();
?>