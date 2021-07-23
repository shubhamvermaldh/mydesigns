<?php include('include/header.php')  ?>
	<?php
	?>

	<!-- Page Content -->
	<div class="container">

	  <div class="row">

	    <!-- Blog Entries Column -->
	    <div class="col-md-8">

	      <h1 class="my-4"><?= $post->title ?>
	      </h1>

	      <!-- Blog Post -->
	      <div class="card mb-4">
	        <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
	        <div class="card-body">
	          <h2 class="card-title"><?= $post->title ?></h2>
	          <p class="card-text"><?= $post->description ?></p>
	        </div>
	        <div class="card-footer text-muted">
	          Posted on <?= date('M d, Y', strtotime($post->create_at)) ;?>
	          <a href="#">Start Bootstrap</a>
	        </div>
	      </div>


	    </div>
		<?php include('include/sidebar.php')  ?>

	  </div>
	  <!-- /.row -->

	</div>
	<!-- /.container -->


<?php include('include/footer.php')  ?>
