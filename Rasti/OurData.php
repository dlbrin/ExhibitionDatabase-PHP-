<?php include 'includes/config.php';
if($AdminId == false){
	header('Location: index.php');
}?>
<!DOCTYPE html>
<html>
<head>
	<title>فایدە</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="assets/images/DpuLogoPng.png">
	<link href="fontawesome/all.min.css" rel="stylesheet">
	<link href="fontawesome/fontawesome.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="wrapper d-flex align-items-stretch">
		<?php include 'includes/sidebar.php'; ?>
		<div id="content" class="p-4 p-md-5">
			<?php include 'includes/navbar.php'; ?>
			<div class="header-of-page">
				<h1>بەشێ  فایدە  ل پێشانگەها راستی</h1>
				<p>فایدێ پێشانگەها  راستی</p>
			</div>
			<div class="all-data">
				<h1>داتایێن بەشێ خەرجیان یێن هەڤانە: </h1>
				<div class="month-data-cards">
				<?php
				error_reporting(0);
				$MonthQuery = mysqli_query($db , "SELECT MONTHNAME(day_of_expense) AS mname, sum(money_of_expense) AS total FROM `expense` GROUP BY MONTHNAME(day_of_expense)");
				while($MonthRow = mysqli_fetch_assoc($MonthQuery)){ ?>
					<div class="month-data">
					<h3><?php echo sec($MonthRow['mname']); ?></h3>
					<span><?php echo sec($MonthRow['total']); ?> هزار</span>
				</div>
			
					<?php
					if($MonthRow['mname'] == 'January'){
						$janeeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'February'){
						$febeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'March'){
						$meeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'April'){
						$aeeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'May'){
						$maeeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'June'){
						$jueeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'July'){
						$juleeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'August'){
						$augeeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'September'){
						$sepeeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'October'){
						$oceeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'November'){
						$noveeb = sec($MonthRow['total']);
					}
					if($MonthRow['mname'] == 'December'){
						$deceeb = sec($MonthRow['total']);
					} }?>
				</div>


<h1>داتایێن بەشێ فروتنا فۆرما یێن هەڤانە: </h1>
				<div class="month-data-cards">
<?php
				$MonthFQuery = mysqli_query($db , "SELECT MONTHNAME(BillDate) AS fmname, sum(totalprice_ofarticle) AS ftotal FROM `bill` GROUP BY MONTHNAME(BillDate)");

				while($MonthFRow = mysqli_fetch_assoc($MonthFQuery)){ ?>
					<div class="month-data">
						<h3><?php echo sec($MonthFRow['fmname']);  ?></h3>
					<span><?php echo sec($MonthFRow['ftotal']); ?> هزار</span>
				</div>
					<?php
					if($MonthFRow['fmname'] == 'January'){
						$jabeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'February'){
						$febeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'March'){
						$mabeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'April'){
						$apbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'May'){
						$maybeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'June'){
						$junbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'July'){
						$julbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'August'){
						$augbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'September'){
						$sepbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'October'){
						$octbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'November'){
						$novbeb = sec($MonthFRow['ftotal']);
					}
					if($MonthFRow['fmname'] == 'December'){
						$decbeb = sec($MonthFRow['ftotal']);
					}
				}?>
			</div>

			<h1>داتایێن بەشێ قەرزان یێن هەڤانە: </h1>
				<div class="month-data-cards">
<?php
				$MonthdQuery = mysqli_query($db , "SELECT MONTHNAME(debt_date) AS dmname, sum(dept_money) AS dtotal FROM `dept` WHERE `con` = ' ' GROUP BY MONTHNAME(debt_date)");

				while($MonthdRow = mysqli_fetch_assoc($MonthdQuery)){ ?>
					<div class="month-data">
						<h3><?php echo sec($MonthdRow['dmname']); ?></h3>
					<span><?php echo sec($MonthdRow['dtotal']); ?> هزار</span>
				</div>

					<?php
					if($MonthdRow['dmname'] == 'January'){
						$jandbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'February'){
						$febdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'March'){
						$mardbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'April'){
						$apdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'May'){
						$maydbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'June'){
						$jundbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'July'){
						$juldbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'August'){
						$augdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'September'){
						$sepdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'October'){
						$octdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'November'){
						$novdbeb = sec($MonthdRow['dtotal']);
					}
					if($MonthdRow['dmname'] == 'December'){
						$decdbeb = sec($MonthdRow['dtotal']);
					} } ?>
				</div>
				<hr>

<br>
				<div class="sum-all-data">
					<h1>فایدێ گشتی</h1>
					<div class="sum-all-card">
				<div class="month-data">
					<h3>January: </h3>
					<span><?php 
					$AllMoney = 0;
					$AllMoney = ($jabeb - $janeeb);
					echo $AllMoney; ?></span>
			</div>

			<div class="month-data">
				<h3>February: </h3>
				<span>
				<?php 
				$AllMoney = 0;
				$AllMoney = ($febeb - $febeb);
				echo $AllMoney; ?>
				</span>
		</div class="month-data">

		<div class="month-data">
			<h3>March: </h3>
			<span>
			<?php 
			$AllMoney = 0;
			$AllMoney = ($mabeb - $meeb);
			echo $AllMoney; ?>
		</span>
	</div>

	<div class="month-data">
		<h3>April: </h3>
		<span>
			<?php 
		$AllMoney = 0;
		$AllMoney = ($apbeb - $aeeb);
		echo $AllMoney; ?>
	</span>

</div>

<div class="month-data">
	<h3>May: </h3>
	<span>
	 <?php 
	$AllMoney = 0;
	$AllMoney = ($maybeb - $maeeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>June: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = ($junbeb - $jueeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>July: </h3>
	<span>
		<?php 
	$AllMoney = 0;
	$AllMoney = ($julbeb - $juleeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>August: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = ($augbeb - $augeeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>September: </h3> 
	<span>
		<?php 
	$AllMoney = 0;
	$AllMoney = ($sepbeb - $sepeeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>October: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = ($octbeb - $oceeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>November: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = ($novbeb - $noveeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>December: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = ($decbeb - $deceeb);
	echo $AllMoney; ?>
</span>
</div>
</div>
</div>

</div>
</div>
</div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

