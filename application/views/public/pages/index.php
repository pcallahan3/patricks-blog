<!--Index page -->

<?php if($featured_pages) : ?>
	<?php foreach($featured_pages as $page) :?>
		<div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<ul class="list-group">
					<div class="featured-page">
					<!--Format date-->
					<?php $date = strtotime($page->create_date); ?>
					<?php $formatted_date = date('F j,Y,g:i a', $date); ?>
						<!--Render page title and body-->
						<h2 class="page-header text-center"><a href="<?php echo base_url(); ?>pages/show/<?php echo $page->slug; ?>"><?php echo $page->title; ?></a></h2>
						<h6 class="text center"> <strong>Created on: <?php echo $formatted_date ?><br></strong></h6>
						<?php echo $page->body1; ?>
					</div>
				</ul>
    		</div>
	<?php endforeach; ?>
<?php endif; ?>






    			