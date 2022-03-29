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
		<title>داشبۆرد</title>
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
					<h1>سیستەمێ  ئەلێکترونیێ پێشانگەها راستی</h1>
					<p>خێرهاتی بۆ پێشانگەها راستی</p>
					<div class="dashboard-carts">
						<div class="dasboard-cards-details">
							<div class="dasboard-cards-details-img">
								<img src="assets/images/chatbot.png" alt="">
							</div>
							<div class="dasboard-cards-details-txt">
								<h1>کەلوپەلێن کوگەهێ</h1>
								<?php
								$ExpQuery = mysqli_query($db , "SELECT * FROM `middlekoga`");
								$NumOfKoga = mysqli_num_rows($ExpQuery)?>
								<span><?php echo $NumOfKoga;?></span>
							</div>
						</div>
						<div class="dasboard-cards-details">
							<div class="dasboard-cards-details-img">
								<img src="assets/images/money-bag.png" alt="">
							</div>
							<div class="dasboard-cards-details-txt">
								<h1>خەرجیێن ئەڤرۆ</h1>
								<?php
								$sum = 0;
								$OurDate = date('Y/m/d');
								$ExpQuery = mysqli_query($db , "SELECT * FROM `expense` WHERE `day_of_expense` = '$OurDate' ORDER BY `id` DESC");
								while($ExpRow = mysqli_fetch_assoc($ExpQuery)){
								$sum += sec($ExpRow['money_of_expense']); }?>
								<span><?php echo $sum?> هزار</span>
							</div>
						</div>
						<div class="dasboard-cards-details">
							<div class="dasboard-cards-details-img">
								<img src="assets/images/debt.png" alt="">
							</div>
							<?php
							$sum = 0;
							$BillQueryCon = mysqli_query($db , "SELECT * FROM `dept` WHERE `con` = ' '");
							while($BillRowCon = mysqli_fetch_assoc($BillQueryCon)){
								$sum += sec($BillRowCon['dept_money']);}
							?>
							<div class="dasboard-cards-details-txt">
								<h1>کۆژمێ قەرزان</h1>
								<span><?php echo $sum?> هزار</span>
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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
</html>