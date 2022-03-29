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
<h1>داتایێن بەشێ فروتنا فۆرما یێن هەڤانە: </h1>
				<div class="month-data-cards">
<?php
error_reporting(0);
				$MonthFQuery = mysqli_query($db , "SELECT MONTHNAME(article_date) AS fmname, sum(sumof_articleprice) AS ftotal, sum(article_number) AS an FROM `middlebill` GROUP BY MONTHNAME(article_date)");

				while($MonthFRow = mysqli_fetch_assoc($MonthFQuery)){ ?>
					<div class="month-data">
						<h3><?php echo sec($MonthFRow['fmname']);  ?></h3>
					<span><?php echo sec($MonthFRow['ftotal']); ?> هزار</span>
				</div>
					<?php
					if($MonthFRow['fmname'] == 'January'){
						$jabeb = sec($MonthFRow['ftotal']);
						$jabeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'February'){
						$febeb = sec($MonthFRow['ftotal']);
						$febeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'March'){
						$mabeb = sec($MonthFRow['ftotal']);
						echo $mabeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'April'){
						$apbeb = sec($MonthFRow['ftotal']);
						$apbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'May'){
						$maybeb = sec($MonthFRow['ftotal']);
						$maybeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'June'){
						$junbeb = sec($MonthFRow['ftotal']);
						$junbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'July'){
						$julbeb = sec($MonthFRow['ftotal']);
						$julbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'August'){
						$augbeb = sec($MonthFRow['ftotal']);
						$augbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'September'){
						$sepbeb = sec($MonthFRow['ftotal']);
						$sepbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'October'){
						$octbeb = sec($MonthFRow['ftotal']);
						$octbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'November'){
						$novbeb = sec($MonthFRow['ftotal']);
						$novbeban = sec($MonthFRow['an']);
					}
					if($MonthFRow['fmname'] == 'December'){
						$decbeb = sec($MonthFRow['ftotal']);
						$decbeban = sec($MonthFRow['an']);
					}
				}?>
			</div>

			<h1>داتایێن بەشێ گوگەهێ یێن هەڤانە: </h1>
				<div class="month-data-cards">
<?php
				$MonthdQuery = mysqli_query($db , "SELECT MONTHNAME(date_of_sub) AS dmname, sum(price_of_sub) AS dtotal FROM `middlekoga` GROUP BY MONTHNAME(date_of_sub)");

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
					$AllMoney = $jabeb - ($jabeban * $jandbeb);
					echo $AllMoney; ?></span>
			</div>

			<div class="month-data">
				<h3>February: </h3>
				<span>
				<?php 
				$AllMoney = 0;
				$AllMoney = $febeb - ($febeban * $febdbeb);
				echo $AllMoney; ?>
				</span>
		</div class="month-data">

		<div class="month-data">
			<h3>March: </h3>
			<span>
			<?php 
			$AllMoney = 0;
			$AllMoney = $mabeb - ($mabeban * $mardbeb);
			echo $AllMoney; ?>
		</span>
	</div>

	<div class="month-data">
		<h3>April: </h3>
		<span>
			<?php 
		$AllMoney = 0;
		$AllMoney = $apbeb - ($apbeban * $apdbeb);
		echo $AllMoney; ?>
	</span>

</div>

<div class="month-data">
	<h3>May: </h3>
	<span>
	 <?php 
	$AllMoney = 0;
	$AllMoney = $maybeb - ($maybeban * $maydbeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>June: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = $junbeb - ($junbeban * $jundbeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>July: </h3>
	<span>
		<?php 
	$AllMoney = 0;
	$AllMoney = $julbeb - ($julbeban * $juldbeb);
	echo $AllMoney; ?>
</span>

</div>

<div class="month-data">
	<h3>August: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = $augbeb - ($augbeban * $augdbeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>September: </h3> 
	<span>
		<?php 
	$AllMoney = 0;
	$AllMoney = $sepbeb - ($sepbeban * $sepdbeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>October: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = $octbeb - ($octbeban * $octdbeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>November: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = $novbeb - ($novbeban * $novdbeb);
	echo $AllMoney; ?>
</span>
</div>

<div class="month-data">
	<h3>December: </h3>
	<span>
	<?php 
	$AllMoney = 0;
	$AllMoney = $decbeb - ($decdbeb * $decdbeb);
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

