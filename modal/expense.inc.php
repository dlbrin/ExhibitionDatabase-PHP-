<?php
include '../includes/config.php';

if(isset($_POST['expbtn'])){
	$type_of_expense = sec($_POST['type_of_expense']);
	$money_of_expense = sec($_POST['money_of_expense']);
	$by_person = sec($_POST['by_person']);
	$date_of_expense = sec($_POST['date_of_expense']);
	$note_of_expense = sec($_POST['note_of_expense']);

	if(empty($type_of_expense) || empty($money_of_expense) || empty($by_person) || empty($date_of_expense)){
		$_SESSION['EmptyExp'] = "هیڤیدارین هەمی خاڵان پر بکە";
		header('Location: ../expense.php');
	}else{
		$ExpeQuery = mysqli_query($db , "INSERT INTO `expense`(`type_of_expense` , `money_of_expense` , `by_person` , `day_of_expense` , `note_of_expense`) VALUES('$type_of_expense' , '$money_of_expense' , '$by_person' , '$date_of_expense' , '$note_of_expense')");
		if($ExpeQuery){
			header('Location: ../expense.php');
		}
	}
}
?>