<?php

$message = "
<html>
	<head>
		<title>Wedding RSVP</title>
	</head>
	<body>
		<p>Somebody has RSVP!</p>
		<table>
	    		<tr>
	      			<th>Name</th>
	      			<th>No. Guests</th>
	      			<th>Coming?</th>
	    		</tr>
	    		<tr>
	      			<td>" . $_POST['name'] . "</td>
	      			<td>" . $_POST['num_guests'] . "</td>
	      			<td>" . ( ($_POST['attending']) ? 'Yes' : 'No' ) . "</td>
	    		</tr>
	  	</table>
	</body>
</html>
";

?>