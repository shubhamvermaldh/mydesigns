<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Whatsapp</title>

    <style>
    	body, html {
    	  height:100%;
    	}

    	/* For demonstration purposes only */
    	.border span {
    	  border:1px dotted red;
    	  font-size:1.5rem;
    	}
    	div[class^="d"]{
    	}
    	button{
    		background-color: #45bb56;
    		color: #fff;
    	}
    </style>
</head>
<body>
 <div class="d-flex flex-column justify-content-center align-items-center h-100">
	
	<?php
		if (isset($_POST['submit'])) {
			header("Location: https://wa.me/91".$_POST['number']);
			// echo "<a href='https://wa.me/91".$_POST['number']."'>Click Here to chat</a>";
		}
	?>
	 <form method="post">
	  <div class="form-group">
	    <label for="email">Enter Whatsapp Number:</label>
	    <input type="tel" class="form-control" placeholder="Enter Number" name="number" id="email">
	  </div>
	  <button type="submit" name="submit" class="btn">Submit</button>
	</form> 
</div>

</body>
</html>