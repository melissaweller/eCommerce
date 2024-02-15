<html>
<head>
	<title><?= $name ?> view</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
	<div id ='container'>
		<table class="table">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Weekly Flyer</th>
				<th>Mailing List</th>
			</tr>
		<?php
			foreach($data as $person){
				echo "
				<tr>
					<td>$person->first_name</td>
					<td>$person->last_name</td>
					<td>$person->email</td>
					<td>$person->weekly_flyer</td>
					<td>$person->mailing_list</td>
				</tr>";
			}
		?>
		</table>
	</div>
</body>
</html>