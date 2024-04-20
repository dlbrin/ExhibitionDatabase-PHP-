<?php
include '../includes/config.php';

if(isset($_POST['InForm'])){
	$UserName = sec($_POST['UserName']);
	$UserAddress = sec($_POST['UserAddress']);
	$UserPhone = sec($_POST['UserPhone']);
	$FormDate = sec($_POST['FormDate']);
	$totalprice_ofarticle = sec($_POST['totalprice_ofarticle']);
	$warranty_number = sec($_POST['warranty_number']);
	$warranty_period = sec($_POST['warranty_period']);
	$continued = implode(',', $_POST['continued']);
	$query = mysqli_query($db , "INSERT INTO `bill`(`UserName` , `UserAddress` , `UserPhone` , `BillDate` , `totalprice_ofarticle` , `warranty_number` , `warranty_period` , `continued`) VALUES ('$UserName' , '$UserAddress' , '$UserPhone' , '$FormDate' , '$totalprice_ofarticle' , '$warranty_number' , '$warranty_period' , '" . $continued . "')");
	if($query){
		$BillQuery = mysqli_query($db , "SELECT * FROM `bill`");
		while($BillRow = mysqli_fetch_assoc($BillQuery)){
			$BillId = sec($BillRow['bill_id']);
		}

		

		$article = $_POST['article'];
		$articlecode = $_POST['articlecode'];
		$articlenumber = $_POST['articlenumber'];
		$articleprice = $_POST['articleprice'];
		$articlesumprice = $_POST['articlesumprice'];
		$articlenote = $_POST['articlenote'];
		foreach($article as $index => $articles)
		{
			$f_article = $articles;
			$f_articlecode = $articlecode[$index];
			$f_articlenumber = $articlenumber[$index];
			$f_articleprice = $articleprice[$index];
			$f_articlesumprice = $articlesumprice[$index];
			$f_articlenote = $articlenote[$index];

			$MiddleQuery = mysqli_query($db , "INSERT INTO `middlebill`(`bill_id` , `article_name` , `article_code` , `article_number` , `article_price` , `sumof_articleprice` , `article_date` , `article_note`) VALUES ('$BillId' , '$f_article' , '$f_articlecode' , '$f_articlenumber' , '$f_articleprice' , '$f_articlesumprice' , '$FormDate' , '$f_articlenote')");

			$_SESSION['YouWantPrint'] = "ئەرێ تە دڤێت بهێتە پرێنتکرن ؟";
			header('Location: ../NewForm.php?d');

			$KogaQuery = mysqli_query($db , "SELECT * FROM `middlekoga` WHERE `code_of_sub` = '$f_articlecode'");
			while($KogaRow = mysqli_fetch_assoc($KogaQuery)){
				$NumOfArticle = sec($KogaRow['num_of_sub']);
				$PriceOfArticle = sec($KogaRow['price_of_sub']);

				$MinNum = $NumOfArticle - $f_articlenumber;

				
				$PriceNum = $MinNum * $PriceOfArticle;

				$NumQuery = mysqli_query($db , "UPDATE `middlekoga` SET `num_of_sub` = '$MinNum' , `sum_of_sub` = '$PriceNum' WHERE `code_of_sub` = '$f_articlecode'");

			}

		}



	}
	if($continued == 'نەخێر'){
		$howmanycon = sec($_POST['howmanycon']);
	    $sumallcon = sec($_POST['sumallcon']);
	    $ConDate = date("Y-m-d h:i:sa");
		$ContinuedQuery = mysqli_query($db , "INSERT INTO `dept`(`bill_id` , `continued_money` , `dept_money` , `debt_date`) VALUES ('$BillId' , '$howmanycon' , '$sumallcon' , '$ConDate')");
	}
}



?>