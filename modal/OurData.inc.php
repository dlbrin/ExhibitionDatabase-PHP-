<?php
include '../includes/config.php';

if(isset($_POST['expsum'])){
	$expsum = sec($_POST['expsum']);
	$billsum = sec($_POST['billsum']);
	$allbillsum = sec($_POST['allbillsum']);
	$allmoney = sec($_POST['allmoney']);
	$date = sec($_POST['date']);

	$DataQuery = mysqli_query($db , "SELECT * FROM `ourdata`");
	while($DataRow = mysqli_fetch_assocc($DataQuery)){
		$OurDate = sec($DataRow['date']);
		if($OurDate == $date){

	}else{

	$KogaQuery = mysqli_query($db , "INSERT INTO `ourdata`(`expsum` , `billsum` , `allbillsum` , `allmoney` , `date`) VALUES ('$expsum' , '$billsum' , '$allbillsum' , '$allmoney' , '$date')");
}
	}

	
}


?>