<?php

	$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan' );
	
	function registrasi($data) {
		global $conn;
		
		$username = $data["username"];
		$password = $data["password"];
		$password2 = $data["password2"];
		
		// cek username
		$usedname = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
		if(mysqli_fetch_assoc($usedname)) {
			echo "<script>
				alert('Username TELAH DIAMBIL! Ganti Username');
				</script>";
				return 0;
		}
		
		// cek password
		if($password != $password2) {
			return 0;
		}
		
		// SUCCESS
		mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password', NULL, NULL, '1')");
		return 1;
	}
	
	function loginlvl($data) {
		global $conn;
		
		$nm = $data["usernamel"];
		$pw = $data["passwordl"];
		$user = mysqli_query($conn, "SELECT level FROM users WHERE username = '$nm' AND password = '$pw'");
		$userdt = mysqli_fetch_assoc($user);
		
		// cek user
		if($userdt == 0) {
			return 0;
		}
		
		// return level
		return $userdt["level"];
	}
	
?>