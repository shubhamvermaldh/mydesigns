<?php include('include/header.php')  ?>
	
<div class="container ">
	<div class="">
		<a class="btn btn-info" href="<?= base_url('admin/add_post') ?>">Add Post</a>
	</div>
	<?php 
		$feedback_class = $this->session->flashdata('feedback_class');
	    if ($feedback = $this->session->flashdata('feedback')) {
	        echo '<p class="text-danger '.$feedback_class.' alert">'.$feedback.'</p>';
	    }
	?>
	<table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Edit/Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	// print_r('<pre>');
	  	// print_r($posts);

	  	if (count($posts)) : 
		  		$count = $this->uri->segment(3); 
  	 		foreach ($posts as $key => $post) :
		  	?>
		    <tr>
	      		<th scope="row"><?= ++$count ?></th>
	     		<td><?= $post->title ?> </td>
	      		<td>
			      	<a class="btn btn-primary" href="<?= base_url('admin/edit_post/'.$post->id) ?>">Edit</a>
		      		<a class="btn btn-danger" href="<?= base_url('admin/delete_post/'.$post->id) ?>">Delete</a>
	      		</td>
		    </tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td col="4">No Record Found</td>
			</tr>
		<?php endif; ?>
	  </tbody>
	</table>



	<?= $this->pagination->create_links(); ?>

</div>

<?php include('include/footer.php')  ?>
