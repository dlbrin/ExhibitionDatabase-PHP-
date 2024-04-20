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
	<title>خەرجیێن پێشانگەهێ</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="assets/images/DpuLogoPng.png">
	<link href="fontawesome/all.min.css" rel="stylesheet">
	<link href="fontawesome/fontawesome.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</head>
<body style="background-color: #ecf0f3;">
	<div class="wrapper d-flex align-items-stretch">
		<?php include 'includes/sidebar.php'; ?>
		<div id="content" class="p-4 p-md-5">
			<?php include 'includes/navbar.php'; ?>
			<div class="header-of-page">
				<div class="headre-of-page-with-search">
					<div class="headre-of-page-with-search-txt">
						<h1>بەشێ خەرجیێن پێشانگەها راستی</h1>
						<p>تایبەتە ب  هەمی خەرجیێن پێشانگەهێ</p>
					</div>
					<div class="headre-of-page-with-search-serach">
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<input type="text" name="search" placeholder="بگەرێ بۆ جورێ خەرجیێ، ، پارێ خەرجیێ، ، ژ لایێ، رۆژ...">
							<button>بگەرێ</button>
						</form>
					</div>
				</div>
				<!-- DATA SEARCH -->
				<?php
				if(isset($_GET['search'])){
					$Data = sec($_GET['search']);
					$SearchQuery = mysqli_query($db , "SELECT * FROM `expense` WHERE `type_of_expense` LIKE '%$Data%' OR `money_of_expense` LIKE '%$Data%' OR `by_person` LIKE '%$Data%' OR `day_of_expense` LIKE '%$Data%'");
					if(mysqli_num_rows($SearchQuery) > 0){?>
						<div class="show-our-table">
							<div class="day-of-expense">
								<h1>ئەنجامێ گەرانێ</h1>
							</div>
							<table>
								<tr style="background-color: #FC813C;">
									<td>جورێ خەرجیێ</td>
									<td>پارێ خەرجیێ</td>
									<td>ژ لایێ</td>
									<td>رۆژ</td>
									<td>تێبینی</td>
								</tr>
								<?php
								$sum = 0;
								while($SearchRow = mysqli_fetch_assoc($SearchQuery)){
									$sum += sec($SearchRow['money_of_expense']);?>
									<tr>
										<td><?php echo sec($SearchRow['type_of_expense']);?></td>
										<td><?php echo sec($SearchRow['money_of_expense']);?> هزار</td>
										<td><?php echo sec($SearchRow['by_person']);?></td>
										<td><?php echo sec($SearchRow['day_of_expense']);?></td>
										<td><?php echo sec($SearchRow['note_of_expense']);?></td>
									</tr>
								<?php } ?>
								<tr>
									<td style="color: #022069;">کۆی گشتی: </td>
									<td style="color: #022069;"><?php echo $sum?> هزار</td>
								</tr>
							</table>
							<br>
							<a href="AllExpense.php">ڤەگەرێ دەستپێکێ</a>
						</div>
						<?php 
					}else{?>
						<h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;">ببورە هیچ داتا ب ڤی ناڤی نینە....</h1>
						<br>
						<center><a href="AllExpense.php">ڤەگەرێ دەستپێکێ</a></center>
					<?php }
					exit();
				}
				?>
				<!-- END DATA SEARCH -->
				<div class="month-data-cards">
					<?php
					$date = date("Y/m/d");
					$MonthQuery = mysqli_query($db , "SELECT MONTHNAME(day_of_expense) AS mname, sum(money_of_expense) AS total FROM `expense` GROUP BY MONTHNAME(day_of_expense)");
					while($MonthRow = mysqli_fetch_assoc($MonthQuery)){ ?>
						<div class="month-data">
							<h3><?php echo sec($MonthRow['mname']); ?></h3>
							<span><?php echo sec($MonthRow['total']); ?> هزار</span>
						</div>
					<?php } ?>
				</div>
				<div class="show-our-table">
					<div class="day-of-expense">
						<h1>لیستا خەرجیان</h1>
					</div>
					<table>
						<tr style="background-color: #FC813C;">
							<td>جورێ خەرجیێ</td>
							<td>پارێ خەرجیێ</td>
							<td>ژ لایێ</td>
							<td>رۆژ</td>
							<td>تێبینی</td>
						</tr>
						<?php
						$sum = 0;
						$ExpQuery = mysqli_query($db , "SELECT * FROM `expense` ORDER BY `id` DESC");
						while($ExpRow = mysqli_fetch_assoc($ExpQuery)){
							$sum += sec($ExpRow['money_of_expense'])?>
							<tr>
								<td><?php echo sec($ExpRow['type_of_expense']);?></td>
								<td><?php echo sec($ExpRow['money_of_expense']);?> هزار</td>
								<td><?php echo sec($ExpRow['by_person']);?></td>
								<td><?php echo sec($ExpRow['day_of_expense']);?></td>
								<td><?php echo sec($ExpRow['note_of_expense']);?></td>
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
</body>
</html>