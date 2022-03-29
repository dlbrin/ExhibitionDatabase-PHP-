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
	<title>بەشی کۆگەها پێشانگەهێ</title>
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
						<h1>بەشی کۆگەها پێشانگەها  راستی</h1>
						<p>تایبەتە ب هەمی بابەتێن ناڤا کۆگەهێ</p>
					</div>
					<div class="headre-of-page-with-search-serach">
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<input type="text" name="search" placeholder="بگەرێ بۆ ئایدی، ناڤێ بابەتی، کۆدا بابەتی، ، رۆژا کرینێ....">
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
					$SearchQuery = mysqli_query($db , "SELECT * FROM `middlekoga` WHERE `id` LIKE '%$Data%' OR `name_of_sub` LIKE '%$Data%' OR `code_of_sub` LIKE '%$Data%' OR `date_of_sub` LIKE '%$Data%'");
					if(mysqli_num_rows($SearchQuery) > 0){?>
						<div class="show-our-table" style="margin-top: 50px;">
							<div class="day-of-expense">
								<h1>ئەنجامێ گەرانێ</h1>
								<div class="refeshbtn">
									<form method="POST" action="modal/koga.inc.php">
										<button name="refresh">Refresh</button>
									</form>
								</div>
							</div>
							<table>
								<tr style="background-color: #FC813C;">
									<td>#</td>
									<td>ناڤێ بابەتی</td>
									<td>کۆدا بابەتی</td>
									<td>ژمارە</td>
									<td>بهایێ بابەتی</td>
									<td>کۆی گشتی</td>
									<td>ژمارا بسۆلێ</td>
									<td>رۆژا کرینێ</td>
									<td>تێبینی</td>
								</tr>
								<?php
								$sum = 0;
								while($SearchRow = mysqli_fetch_assoc($SearchQuery)){
									$sum += sec($SearchRow['sum_of_sub'])?>
									<tr>
										<td><?php echo sec($SearchRow['id']);?></td>
										<td><?php echo sec($SearchRow['name_of_sub']);?></td>
										<td><?php echo sec($SearchRow['code_of_sub']);?></td>
										<td><?php echo sec($SearchRow['num_of_sub']);?></td>
										<td><?php echo sec($SearchRow['price_of_sub']);?></td>
										<td><?php echo sec($SearchRow['sum_of_sub']);?></td>
										<td><?php echo sec($SearchRow['num_of_psola']);?></td>
										<td><?php echo sec($SearchRow['date_of_sub']);?></td>
										<td><?php echo sec($SearchRow['note_of_sub']);?></td>
									</tr>
								<?php } ?>
								<tr>
									<td style="color: #022069;">کۆی گشتی: </td>
									<td style="color: #022069;"><?php echo $sum?> هزار</td>
								</tr>
							</table>
							<a href="ShowKoga.php">ڤەگەرێ دەستپێکێ</a>
						</div>
						<?php
					}else{?>
						<h1 style="color: red; font-size: 26px; text-align: center; direction: rtl;">ببورە هیچ داتا ب ڤی ناڤی نینە....</h1>
						<br>
						<center><a href="ShowKoga.php">ڤەگەرێ دەستپێکێ</a></center>
					<?php }
					exit();
				}
				?>
				<!-- END DATA SEARCH -->
				<div class="show-our-table" style="margin-top: 50px;">
					<div class="day-of-expense">
						<h1>کۆگەها پێشانگەهێ</h1>
						<div class="refeshbtn">
							<form method="POST" action="modal/koga.inc.php">
								<button name="refresh">Refresh</button>
							</form>
						</div>
					</div>
					<table>
						<tr style="background-color: #FC813C;">
							<td>#</td>
							<td>ناڤێ بابەتی</td>
							<td>کۆدا بابەتی</td>
							<td>ژمارە</td>
							<td>بهایێ بابەتی</td>
							<td>کۆی گشتی</td>
							<td>ژمارا بسۆلێ</td>
							<td>رۆژا کرینێ</td>
							<td>تێبینی</td>
						</tr>
						<?php
						$sum = 0;
						$KogaQuery = mysqli_query($db , "SELECT * FROM `middlekoga`");
						while($KogaRow = mysqli_fetch_assoc($KogaQuery)){
							$sum += sec($KogaRow['sum_of_sub'])?>
							<tr>
								<td><?php echo sec($KogaRow['id']);?></td>
								<td><?php echo sec($KogaRow['sub_name']);?></td>
								<td><?php echo sec($KogaRow['code_of_sub']);?></td>
								<td><?php echo sec($KogaRow['num_of_sub']);?></td>
								<td><?php echo sec($KogaRow['price_of_sub']);?></td>
								<td><?php echo sec($KogaRow['sum_of_sub']);?></td>
								<td><?php echo sec($KogaRow['num_of_psola']);?></td>
								<td><?php echo sec($KogaRow['date_of_sub']);?></td>
								<td><?php echo sec($KogaRow['note_of_sub']);?></td>
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