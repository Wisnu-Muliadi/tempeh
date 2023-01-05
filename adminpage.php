<?php

	require "connection.php";
	
	$users = mysqli_query($conn, "SELECT * FROM users");

	// hapus dt
	if(isset($_GET["hapus"])) {
		$hps = $_GET["hapus"];
		mysqli_query($conn, "DELETE FROM users WHERE id = '$hps'");
		$users = mysqli_query($conn, "SELECT * FROM users");
	}
?>

<html>
	<head>
		<title>USER PAGE</title>
	</head>
	<body>
		<h2>Admin</h2>
		<table border = 5 >
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Nomor HP</th>
				<th>Email</th>
				<th>AKSI</th>
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
				<td>
					<a href="update.php?update=<?php echo $dt["id"]?>">UBAH</a> | <a href="?hapus=<?php echo $dt["id"]?>">HAPUS	</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		
	</body>
</html>