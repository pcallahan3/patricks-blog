<!--Pages index page-->

<h2 class="page-header">Test Index</h2>
<?php if($this->session->flashdata('success')) :  ?>

	<?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' ; ?>
<?php endif ;?>
<?php if($this->session->flashdata('error')) :  ?>

	<?php echo '<div class="alert alert-danger">'.$this->session->flashdata('success').'</div>' ; ?>
<?php endif ;?>

<!--Table to display page data-->
<?php if($users) : ?>
<table class="table table-striped">
	<tr>
		<th>User Name</th>
		
	</tr>
	
	 <!--Loop through pages table-->
	<?php foreach($users as $user) : ?>
		

	
		<tr>
		
			<td><?php echo $user->username; ?></td>
			
		</tr>
	<?php endforeach;  ?>
</table>

<?php else : ?>
	<p>No Pages</p>
<?php endif; ?>