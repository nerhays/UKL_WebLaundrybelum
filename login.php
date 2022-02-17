<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$result = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($result);
if($cek > 0){
	$data = mysqli_fetch_assoc($result);
	if($data['level']=="admin"){
 
		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		$_SESSION['level'] = "admin";
		header("location:admin");
 
	}else if($data['level']=="kasir"){

		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		$_SESSION['level'] = "kasir";

		header("location:petugas");
	}else if($data['level']=="owner"){

		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		$_SESSION['level'] = "owner";

		header("location:owner");
	}else{

		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>
