<?php
include '../includes/config.php';

if(isset($_POST['adm_log'])){
	$email = sec($_POST['email']);
	$password = sec($_POST['password']);

	if(empty($email) || empty($password)){
		$_SESSION['AdminEmpty'] = "هەمی خاڵان پر بکە";
		header('Location: ../index.php');
	}else{
		$Encpassword = hash('gost', $password);
		$AdminQuery = mysqli_query($db , "SELECT * FROM `admin_table` WHERE `email` = '$email' AND `password` = '$Encpassword'");
		if(mysqli_num_rows($AdminQuery) > 0){
			$AdminDetails = $_SERVER['HTTP_USER_AGENT'];
			$AdminIp = $_SERVER['REMOTE_ADDR'];
			$InsertAdminDet = mysqli_query($db , "UPDATE `admin_table` SET `login_details` = '$AdminDetails' , `admin_ip` = '$AdminIp'");
			while($AdminRow = mysqli_fetch_assoc($AdminQuery)){
				$_SESSION['adminid'] = sec($AdminRow['id']);
				header('Location: ../home.php');
			}
		}else{
			$_SESSION['AdminWrong'] = "ناڤونیشانێ ئەلێکترۆنی یان وشا نهێنی دروست نینە";
		    header('Location: ../index.php');
		}
	}
}

?>