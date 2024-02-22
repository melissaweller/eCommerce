<!DOCTYPE html>
<html>
<head>
<style>
	.sidenav {position: fixed;
  			z-index: 1;
  			top: 0;
  			left: 0;
  			overflow-x: hidden;
  			margin-left: 20px;
	}
	.sidenav a {padding: 6px 6px 6px 32px;
  				display: block;
	}
	.main {margin-left: 300px; 
  			margin-top: 60px;
	}	
</style>
</head>
<body>
	<div class="sidenav">
  		<h1>Contact Us</h1>
    	<a href="Contact/index.php">Landing Page</a>
    	<a href="#">About Us</a>
    	<a href="#">Contact Us</a>
    	<a href="#">See the messages we get</a>
	</div>

	<div class="main">
  		<h2>Contact Us</h2>
  		<p>Wanna reach us? Write your email information and message in the following form and then submit.</p>

  		<form method="post" name="contact_form" action="contact-form-handler.php" >
    		<table style="width:100%;max-width:550px;border:0;" cellpadding="8" cellspacing="0">
    			<tr> <td>
    			<label for="email">Email address:</label>
    			</td> <td>
    			<input name="email" type="text" style="width: 400px;" />
    			</td> </tr> <tr> <td>
    			<label for="Comments">Message:</label>
    			</td> <td>
   				<textarea name="Comments" rows="7" cols="40" style="width: 400px;"></textarea>
    			</td> </tr> <tr> <td>
    			<input name="skip_Submit" type="submit" value="Send!"/>
    			</td> </tr>
    		</table>
    	</form>
	</div>
</body>
</html> 