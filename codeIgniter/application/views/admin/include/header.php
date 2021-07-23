<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?= link_tag('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') ?>
	<?= link_tag('assets/css/style.css') ?>
</head>
<body>
	<header>
	  	<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		  <div class="container">
		    <a class="navbar-brand" href="#">Start Bootstrap</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarResponsive">
		      <ul class="navbar-nav ml-auto">
		        <li class="nav-item active">
		          <a class="nav-link" href="#">Home
		            <span class="sr-only">(current)</span>
		          </a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Services</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?= base_url('admin/logout'); ?>">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</header>

