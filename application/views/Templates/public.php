<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Patricks Software Blog</title>

     <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php base_url(); ?> assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
         
          <a class="navbar-brand" href="#"><?php echo $this->brand; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <?php foreach($this->pages as $page) : ?>
            <li><a href="<?php echo base_url(); ?>pages/show<?php echo $page->slug; ?>"><?php echo $page->title; ?></a></li>
          <?php endforeach; ?>
           
              </ul>
            </li>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   

    <div class="container">
      <div class="jumbotron">
    
      <div class="container text-center">
         <img src="<?php echo base_url('imgs/landing_page_img.jpg'); ?>" class="rounded" alt="Software Development" width="600" />
       </div>
       
        <!-- These globals are located in the application/core/MY_Controller.php file-->
        <h1 class="text-center"><?php echo $this->banner_heading; ?></h1>
        <!--<p><?php //echo $this->banner_text; ?></p>-->
        <p class="text-center">This blog has random articles on computer science concepts</p>
      </div>

      <div class="row">
        <div class="col-md-12">
            <!--Load main view -->
          <?php $this->load->view($main); ?>
        </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
