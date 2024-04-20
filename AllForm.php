<?php include 'includes/config.php';
if($AdminId == false){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>بەشێ هەمی فۆرمێن پێشانگەهێ</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="assets/images/DpuLogoPng.png">
	<link href="fontawesome/all.min.css" rel="stylesheet">
	<link href="fontawesome/fontawesome.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color: #ecf0f3;">
	<div class="wrapper d-flex align-items-stretch">
		<?php include 'includes/sidebar.php'; ?>
		<div id="content" class="p-4 p-md-5">
			<?php include 'includes/navbar.php'; ?>
			<div class="header-of-page">
				<div class="headre-of-page-with-search">
					<div class="headre-of-page-with-search-txt">
						<h1>بەشێ هەمی فۆرمێن پێشانگەهێ</h1>
						<p>تایبەتە ب هەمی فۆرمێن پێشانگەهێ</p>
					</div>
					<div class="headre-of-page-with-search-serach">
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<input type="text" name="search" placeholder="بگەرێ بۆ ژمارا فۆرمێ، ناڤێ کەسی، ژمارا مۆبایلێ، رۆژا کرینێ...">
							<button>بگەرێ</button>
						</form>
					</div>
				</div>
				<!-- DATA SEARCH -->
				<?php
				if(isset($_GET['search'])){
					$Data = sec($_GET['search']);
					$SearchQuery = mysqli_query($db , "SELECT * FROM `bill` WHERE `bill_id` LIKE '%$Data%' OR `UserName` LIKE '%$Data%' OR `UserPhone` LIKE '%$Data%' OR `BillDate` LIKE '%$Data%'");
					if(mysqli_num_rows($SearchQuery) > 0){?>
						<div class="show-our-table" style="margin-top: 50px;">
							<div class="day-of-expense">
								<h1>ئەنجامێ گەرانێ</h1>
							</div>
							<table>
								<tr style="background-color: #FC813C;">
									<td>ژمارا فۆرمێ</td>
									<td>ناڤێ کەسی</td>
									<td>ناڤۆنیشان</td>
									<td>ژمارا مۆبایلێ</td>
									<td>رۆژا کرینێ</td>
									<td>بها</td>
									<td>واصل</td>
									<td>کردار</td>
								</tr>
								<?php
								$sum = 0;
								while($SearchRow = mysqli_fetch_assoc($SearchQuery)){
									$sum += sec($SearchRow['totalprice_ofarticle'])?>
									<tr>
										<td><?php echo sec($SearchRow['bill_id']);?></td>
										<td><?php echo sec($SearchRow['UserName']);?></td>
										<td><?php echo sec($SearchRow['UserAddress']);?></td>
										<td><?php echo sec($SearchRow['UserPhone']);?></td>
										<td><?php echo sec($SearchRow['BillDate']);?></td>
										<td><?php echo sec($SearchRow['totalprice_ofarticle']);?></td>
										<td><?php echo sec($SearchRow['continued']);?></td>
										<td><a href="ShowForm.php?FormId=<?php echo sec($SearchRow['bill_id']);?>">ببینە</a></td>
									</tr>
								<?php } ?>
								<tr>
									<td style="color: #022069;">کۆی گشتی: </td>
									<td style="color: #022069;"><?php echo $sum?> هزار</td>
								</tr>
							</table>
							<a href="AllForm.php">ڤەگەرێ دەستپێکێ</a>
						</div>
						<?php
					}else{?>
						<h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;">ببورە هیچ داتا ب ڤی ناڤی نینە....</h1>
						<br>
						<center><a href="AllForm.php">ڤەگەرێ دەستپێکێ</a></center>
					<?php }
					exit();
				}
				?>
				<!-- END DATA SEARCH -->
				<div class="show-our-table" style="margin-top: 50px;">
					<div class="day-of-expense">
						<h1>فۆرمێن پێشانگەهێ</h1>
					</div>
					<table>
						<tr style="background-color: #FC813C;">
							<td>ژمارا فۆرمێ</td>
							<td>ناڤێ کەسی</td>
							<td>ناڤۆنیشان</td>
							<td>ژمارا مۆبایلێ</td>
							<td>رۆژا کرینێ</td>
							<td>بها</td>
							<td>واصل</td>
							<td>کردار</td>
						</tr>
						<?php
						$sum = 0;
						$BillQuery = mysqli_query($db , "SELECT * FROM `bill`");
						while($BillRow = mysqli_fetch_assoc($BillQuery)){
							$sum += sec($BillRow['totalprice_ofarticle'])?>
							<tr>
								<td><?php echo sec($BillRow['bill_id']);?></td>
								<td><?php echo sec($BillRow['UserName']);?></td>
								<td><?php echo sec($BillRow['UserAddress']);?></td>
								<td><?php echo sec($BillRow['UserPhone']);?></td>
								<td><?php echo sec($BillRow['BillDate']);?></td>
								<td><?php echo sec($BillRow['totalprice_ofarticle']);?></td>
								<td><?php echo sec($BillRow['continued']);?></td>
								<td><a href="ShowForm.php?FormId=<?php echo sec($BillRow['bill_id']);?>">ببینە</a></td>
							</tr>
						<?php } ?>
						<tr>
							<td style="color: #022069;">کۆی گشتی: </td>
							<td style="color: #022069;"><?php echo $sum?> هزار</td>
						</tr>
					</table>
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