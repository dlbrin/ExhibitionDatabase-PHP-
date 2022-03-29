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
	<title>قەرزێن پێشانگەهێ</title>
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
						<h1>بەشێ قەرزێن پێشانگەها راستی</h1>
						<p>تایبەتە ب  هەمی قەرزێن پێشانگەهێ</p>
					</div>
					<div class="headre-of-page-with-search-serach">
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<input type="text" name="search" placeholder="بگەرێ بۆ ناڤ، ژمارا مۆبایلێ، رۆژا کرینێ، ژمارا فۆرمێ...">
							<button>بگەرێ</button>
						</form>
					</div>
				</div>
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/js/popper.js"></script>
				<script src="assets/js/bootstrap.min.js"></script>
				<script src="assets/js/main.js"></script>
				<!-- DATA SEARCH -->
				<?php
				if(isset($_GET['search'])){
					$Data = sec($_GET['search']);
					$SearchQuery = mysqli_query($db , "SELECT * FROM `bill` WHERE `bill_id` LIKE '%$Data%' OR `UserName` LIKE '%$Data%' OR `UserPhone` LIKE '%$Data%' OR `BillDate` LIKE '%$Data%'");
					if(mysqli_num_rows($SearchQuery) > 0){?>
						<div class="show-our-table">
							<div class="day-of-expense">
								<h1>ئەنجامێ گەرانێ</h1>
							</div>
							<table>
								<tr>
									<td>ژمارا فۆرمێ</td>
									<td>ناڤێ بکڕی</td>
									<td>ژمارا مۆبایلا بکڕی</td>
									<td>رۆژا کرینێ</td>
									<td>واصل</td>
									<td>کردار</td>
								</tr>
								<?php
								while($SearchRow = mysqli_fetch_assoc($SearchQuery)){
									$iDbILL = sec($SearchRow['bill_id']);?>
									<tr>
										<td><?php echo sec($SearchRow['bill_id']);?></td>
										<td><?php echo sec($SearchRow['UserName']);?></td>
										<td><?php echo sec($SearchRow['UserPhone']);?></td>
										<td><?php echo sec($SearchRow['BillDate']);?></td>
										<td><?php echo sec($SearchRow['continued']);?></td>
										<td><a href="ShowDebt.php?id=<?php echo sec($SearchRow['bill_id']);?>" style="color: #022069;"><i class="far fa-eye"></i> ببینە</a></td>
									</tr>
								<?php }?>
							</table>
						</div>
						<?php
					}else{?>
						<h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;">ببورە هیچ داتا ب ڤی ناڤی نینە....</h1>
						<br>
						<center><a href="debt.php">ڤەگەرێ دەستپێکێ</a></center>
					<?php }
					exit();
				}
				?>
				<!-- END DATA SEARCH -->
				<div class="show-our-table">
					<div class="day-of-expense">
						<h1>لیستا قەرزان</h1>
					</div>
					<table>
						<tr>
							<td>ژمارا فۆرمێ</td>
							<td>ناڤێ بکڕی</td>
							<td>ژمارا مۆبایلا بکڕی</td>
							<td>رۆژا کرینێ</td>
							<td>واصل</td>
							<td>کردار</td>
						</tr>
						<?php
						$BillQuery = mysqli_query($db , "SELECT * FROM `bill` WHERE `continued` = 'نەخێر' ORDER BY `bill_id` DESC");
						while($BillRow = mysqli_fetch_assoc($BillQuery)){
							$BillId = sec($BillRow['bill_id']);?>
							<tr>
								<td><?php echo sec($BillRow['bill_id']);?></td>
								<td><?php echo sec($BillRow['UserName']);?></td>
								<td><?php echo sec($BillRow['UserPhone']);?></td>
								<td><?php echo sec($BillRow['BillDate']);?></td>
								<td><?php echo sec($BillRow['continued']);?></td>
								<td><a href="ShowDebt.php?id=<?php echo sec($BillRow['bill_id']);?>" style="color: #022069;"><i class="far fa-eye"></i> ببینە</a></td>
							</tr>
							
							<?php
							$sum = 0;
							$BillQueryCon = mysqli_query($db , "SELECT * FROM `dept` WHERE `con` = ' '"); }
							while($BillRowCon = mysqli_fetch_assoc($BillQueryCon)){
								$sum += sec($BillRowCon['dept_money']);}
								?>
								<tr>
									<td colspan="4" style="color: #022069;">کۆی گشتی</td>
									<td style="color: #022069;"><?php echo $sum?> هزار</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>