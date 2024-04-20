<?php
include '../includes/config.php';

if(isset($_POST['InForm'])){
	
	// $query = mysqli_query($db , "INSERT INTO `koga`(`name_of_sub` , `num_subb` , `price_subb`, `date_subb`) VALUES ('$nameofsub' , '$numofsub' , '$priceofsub' , '$dateofsub')");
	// if($query){
	// 	$KogaQuery = mysqli_query($db , "SELECT * FROM `koga`");
	// 	while($KogaRow = mysqli_fetch_assoc($KogaQuery)){
	// 		$Kogaid = sec($KogaRow['name_of_sub']);
	// 	}

	$nameofsub = $_POST['nameofsub'];
		$codeofsub = $_POST['codeofsub'];
		$numofsub = $_POST['numofsub'];
		$priceofsub = $_POST['priceofsub'];
		$sumofsub = $_POST['sumofsub'];
		$numofpsola = $_POST['numofpsola'];
		$dateofsub = $_POST['dateofsub'];
		$noteofsub = $_POST['noteofsub'];
					foreach($codeofsub as $index => $codeofsubs)
					{
						$f_codeofsub = $codeofsubs;
						$f_nameofsub = $nameofsub[$index];
						$f_numofsub = $numofsub[$index];
						$f_priceofsub = $priceofsub[$index];
						$f_sumofsub = $sumofsub[$index];
						$f_numofpsola = $numofpsola[$index];
						$f_dateofsub = $dateofsub[$index];
						$f_noteofsub = $noteofsub[$index];

						$MiddleQuery = mysqli_query($db , "INSERT INTO `middlekoga`(`sub_name` , `code_of_sub` , `num_of_sub` , `price_of_sub` , `sum_of_sub` , `num_of_psola` , `date_of_sub` , `note_of_sub`) VALUES ('$f_nameofsub' , '$f_codeofsub' , '$f_numofsub' , '$f_priceofsub' , '$f_sumofsub' , '$f_numofpsola' , '$f_dateofsub' , '$f_noteofsub')");
						header('Location: ../koga.php?d');
					}
				}
		


// }




if(isset($_POST['refresh'])){
	$KogaQueryC = mysqli_query($db , "SELECT * FROM `middlekoga`");
	while($KogaRowC = mysqli_fetch_assoc($KogaQueryC)){
		$NumSub = sec($KogaRowC['num_of_sub']);
		$NSub = sec($KogaRowC['code_of_sub']);
		if($NumSub == 0){
			$NumQueryD = mysqli_query($db , "DELETE FROM `middlekoga` WHERE `code_of_sub` = '$NSub'");

		}
		header("Location: ../ShowKoga.php");
	}
}

?>