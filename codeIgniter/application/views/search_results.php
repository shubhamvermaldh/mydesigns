<?php include('include/header.php')  ?>
	<?php
	?>

	<!-- Page Content -->
	<div class="container">

	  <div class="row">

	    <!-- Blog Entries Column -->
	    <div class="col-md-8">

	      <h1 class="my-4">Search Results
	      </h1>

	      <!-- Blog Post -->
	    <?php if (count($posts)):
  	 		foreach ($posts as $post) :
	    ?>
	      <div class="card mb-4">
	        <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
	        <div class="card-body">
	          <h2 class="card-title"><?= $post->title ?></h2>
	          <p class="card-text"><?= $post->description ?></p>
	          <a href="#" class="btn btn-primary">Read More &rarr;</a>
	        </div>
	        <div class="card-footer text-muted">
	          Posted on January 1, 2017 by
	          <a href="#">Start Bootstrap</a>
	        </div>
	      </div>
      		<?php endforeach; ?>
      	<?php else: ?>
  			<p>No Record Found</p>
      	<?php endif; ?>

	      <!-- Pagination -->
	      <ul class="pagination justify-content-center mb-4">
	        <li class="page-item">
	          <a class="page-link" href="#">&larr; Older</a>
	        </li>
	        <li class="page-item disabled">
	          <a class="page-link" href="#">Newer &rarr;</a>
	        </li>
	      </ul>

	    </div>
		<?php include('include/sidebar.php')  ?>

	  </div>
	  <!-- /.row -->

	</div>
	<!-- /.container -->


<?php include('include/footer.php')  ?>
