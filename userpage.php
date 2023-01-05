<?php

	require "connection.php";
	
	$users = mysqli_query($conn, "SELECT * FROM users");

?>

<html>
	<head>
		<title>USER PAGE</title>
	</head>
	<body>
		<h2>Non Admin</h2>
		
		<table border = 5 >
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Nomor HP</th>
				<th>Email</th>
			</tr>
			
			<?php $i = 1; foreach($users as $dt) { ?>
			<tr>
				<td>
					<?php echo $i++;?>
				</td>
				<td>
					<?php echo $dt["username"];?>
				</td>
				<td>
					<?php echo $dt["nomor_hp"];?>
				</td>
				<td>
					<?php echo $dt["email"];?>
				</td>
			</tr>
			<?php } ?>
		</table>
		
	</body>
</html>