<!--Show page -->

<!--Format date-->
<?php $date = strtotime($page->create_date); ?>
<?php $formatted_date = date('F j,Y,g:i a', $date); ?>


<h2 class="page-header text-center"><?php echo $page->title; ?>
	<h6 class="text center"> <strong>Created on: <?php echo $formatted_date ?><br></strong></h6>
</h2>


<h5 class="text center"><?php echo $page->body1; ?></h5>
<h5 class="text center"><?php echo $page->body2; ?></h5>

