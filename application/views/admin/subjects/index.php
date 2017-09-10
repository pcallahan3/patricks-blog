<!--Subject index page-->
<h2 class="page-header">Subjects</h2>
<?php if($this->session->flashdata('success')) :  ?>

	<?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' ; ?>
<?php endif ;?>

<!--Table to display subjects data-->
<?php if($subjects) : ?>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Date Created</th>
	</tr>

	<?php foreach($subjects as $subject) : ?>
		<tr>
			<td><?php echo $subject->id; ?></td>
			<td><?php echo $subject->name; ?></td>
			<td><?php echo $subject->create_date; ?></td>
		</tr>
	<?php endforeach;  ?>
</table>

<?php else : ?>
	<p>No Subjects</p>
<?php endif; ?>