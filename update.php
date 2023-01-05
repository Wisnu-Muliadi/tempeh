<?php 

	require "connection.php";
	
	$upid = $_GET["update"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$upid'");
	$userob = mysqli_fetch_assoc($result);

	if(isset($_POST["update"])) {
		$nomorhp = $_POST["nomorhp"];
		$email = $_POST["email"];
		if($_POST["admin"]) { $admin = 2; } else { $admin = 1; }
		
		mysqli_query($conn, "UPDATE users SET nomor_hp = '$nomorhp', email = '$email', level = '$admin' WHERE id = '$upid'");
		Header("Location: adminpage.php");
		
	}
?>

<html>
	<head>
		<title>UPDATE DATA</title>
		<style>
			label{
				display: block;
			}
			ul{
				list-style-type: none;
			}
		</style>
	</head>
	<body>
		
		<form action="" method="post">
			<ul>
				<li>
					<label>Nomor HP</label>
					<input type="text" name="nomorhp" id="nomorhp" value="<?php echo $userob["nomor_hp"];?>">
				</li>
				<li>
					<label>Email</label>
					<input type="text" name="email" id="email" value="<?php echo $userob["email"];?>">
				</li>
				<li>
					<label>Admin</label>
					<input type="checkbox" name="admin" id="admin"<?php if($userob["level"] == 2) { echo "checked";}?>>
				</li>
				<li><button action="submit" name="update">UPDATE</button></li>
			</ul>
		</form>
		
	</body>
</html>