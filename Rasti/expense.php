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
</head>
<body style="background-color: #ecf0f3;">
	<div class="wrapper d-flex align-items-stretch">
		<?php include 'includes/sidebar.php'; ?>
		<div id="content" class="p-4 p-md-5">
			<?php include 'includes/navbar.php'; ?>
			<div class="header-of-page">
				<h1>بەشێ خەرجیێن پێشانگەها راستی</h1>
				<p>تایبەتە ب خەرجیێن ئەڤرۆ یێن پێشانگەهێ</p>
				<div class="our-table">
					<table>
						<tr style="background-color: #022069;">
							<td>جورێ خەرجیێ</td>
							<td>پارێ خەرجیێ</td>
							<td>ژ لایێ</td>
							<td>رۆژ</td>
							<td>تێبینی</td>
							<td>داخلکرن</td>
						</tr>
						<tr>
							<form method="POST" action="modal/expense.inc.php">
								<td><input type="text" name="type_of_expense"></td>
								<td><input type="number" name="money_of_expense"></td>
								<td><input type="text" name="by_person"></td>
								<td><input type="date" name="date_of_expense"></td>
								<td><input type="text" name="note_of_expense"></td>
								<td><button name="expbtn"><i class="fas fa-location-arrow"></i>&nbspداخلکرن</button></td>
							</form>
						</tr>
					</table>
				</div>
				<div class="show-our-table">
					<div class="day-of-expense">
						<h1>خەرجیێن ئەڤرۆ : <?php echo date('Y/m/d');?></h1>
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
						$OurDate = date('Y/m/d');
						$ExpQuery = mysqli_query($db , "SELECT * FROM `expense` WHERE `day_of_expense` = '$OurDate' ORDER BY `id` DESC");
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
	<?php
	if(isset($_SESSION['EmptyExp'])){?>
		<script>
			swal({
				title: "<?php echo $_SESSION['EmptyExp']; ?>",
				icon: "error",
				button: "باشە",
			});
		</script>
		<?php unset($_SESSION['EmptyExp']); } ?>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	</html>