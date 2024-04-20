<?php
include '../includes/config.php';

if(isset($_POST['DebtChange'])){
	$billid = sec($_POST['billid']);
	$howmanycon = sec($_POST['howmanycon']);
	$sumallcon = sec($_POST['sumallcon']);
	$ConDate = date("Y-m-d h:i:sa");

	$debtid = sec($_POST['debtid']);
	$ChContinuedQuery = mysqli_query($db , "UPDATE `dept` SET `con` = 'بەلێ'  WHERE `id` = '$debtid'");

	$ContinuedQuery = mysqli_query($db , "INSERT INTO `dept`(`bill_id` , `continued_money` , `dept_money` , `debt_date`) VALUES ('$billid' , '$howmanycon' , '$sumallcon' , '$ConDate')");
	header("Location: ../ShowDebt.php?id=$billid");
}

if(isset($_POST['yeschek'])){
	$billid = sec($_POST['billid']);
	$YesContinuedQuery = mysqli_query($db , "UPDATE `bill` SET `continued` = 'بەلێ' WHERE `bill_id` = '$billid'");

	$DYesContinuedQuery = mysqli_query($db , "DELETE FROM `dept` WHERE `bill_id` = '$billid'");

	if($YesContinuedQuery){
		header("Location: ../debt.php");
	}
	
}
?>