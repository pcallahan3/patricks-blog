<?php if($featured_pages) : ?>
	<?php foreach($featured_pages as $page) :?>
		<div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<ul class="list-group">
					<div class="featured-page">
						<?php $page_title = $page->title; ?>
						<!--Render page title and body-->
						
						<h2 class="page-header text-center"><a href="<?php echo base_url(); ?>pages/show/<?php echo $page->slug; ?>"><?php echo $page->title; ?></a></h2>
						<?php echo $page->body; ?>
					</div>
				</ul>
    		</div>
	<?php endforeach; ?>
<?php endif; ?>






    			