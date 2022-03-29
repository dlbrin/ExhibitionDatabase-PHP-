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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color: #ecf0f3;">
	<div class="wrapper d-flex align-items-stretch">
		<?php include 'includes/sidebar.php'; ?>
		<div id="content" class="p-4 p-md-5">
			<?php include 'includes/navbar.php'; ?>
			<div class="header-of-page">
				<h1>بەشێ قەرزێن پێشانگەها راستی</h1>
				<p>تایبەتە ب  هەمی قەرزێن پێشانگەهێ</p>
				<div class="new-form-page">
					<?php
					$BillId = sec($_GET['id']);
					$BillQueryA = mysqli_query($db , "SELECT * FROM `bill` WHERE `bill_id` = '$BillId'");
					while($BillRowA = mysqli_fetch_assoc($BillQueryA)){?>
						<div class="new-form-details">
							<div class="new-form-details-header">
								<div class="first-form-header">
									<h3>پێشانگەها راستی</h3>
									<h2>بۆ فرۆتنا کەلوپەلێن کەهرەبایی و مالان ب کەت و کوم</h2>
									<div>
										<h2>بەروار:  <?php echo sec($BillRowA['BillDate']);?></h2>
									</div>
								</div>
								<div class="second-form-header">
									<img src="assets/images/formslogo.png" alt="">
								</div>
								<div class="third-form-header">
									<h3>ناڤونیشان: ئاکرێ - بەرامبەری پێشانگەهێن ئوتومبێلا</h3>
									<h2>ژمارێن مۆبایلا: </h2>
									<span style="color: #2ecc71;">07503076969</span>
									<span style="color: #c0392b;">07504256910</span>
								</div>
							</div>
							<div class="new-form-details-middle">
								<div class="new-form-details-middle-name">
									<span>ناڤ: <?php echo sec($BillRowA['UserName']);?></span>
								</div>
								<div class="new-form-details-middle-address">
									<span>ناڤونیشان: <?php echo sec($BillRowA['UserAddress']);?></span>
								</div>
								<div class="new-form-details-middle-phone">
									<span>ژ.مۆبایلێ: ( <?php echo sec($BillRowA['UserPhone']);?></span><span> )</span>
								</div>
							</div>
							<div class="new-form-details-final">
								<table>
									<tr style="background-color: #FC813C;">
										<td>ناڤی بابەتی</td>
										<td>ژمارا بابەتی</td>
										<td>دانە</td>
										<td>بها</td>
										<td>بهایێ گشتی</td>
										<td>تێبینی</td>
									</tr>
									<?php
									$BillQuery = mysqli_query($db , "SELECT * FROM `middlebill` WHERE `bill_id` = '$BillId'");
									while($BillRow = mysqli_fetch_assoc($BillQuery)){?>
										<tr>
											<td><?php echo sec($BillRow['article_name']);?></td>
											<td><?php echo sec($BillRow['article_code']);?></td>
											<td><?php echo sec($BillRow['article_number']);?></td>
											<td><?php echo sec($BillRow['article_price']);?></td>
											<td><?php echo sec($BillRow['sumof_articleprice']);?></td>
											<td><?php echo sec($BillRow['article_note']);?></td>
										</tr>
									<?php  }?>
									<tr>
										<td colspan="4" style="color: #022069; ">کۆی گشتی</td>
										<td colspan="2"><?php echo sec($BillRowA['totalprice_ofarticle']);?></td>
									</tr>
									<?php
									$ConQuery = mysqli_query($db , "SELECT * FROM `dept` WHERE `bill_id` = '$BillId'");
									while($ConRow = mysqli_fetch_assoc($ConQuery)){?>
										<tr>
											<td colspan="4" style="color: #022069; ">واصل ل رۆژا (<?php echo sec($ConRow['debt_date']);?>)</td>
											<td colspan="2"><?php echo sec($ConRow['continued_money']);?></td>
										</tr>
										<tr>
											<td colspan="4" style="color: #022069; ">باقی</td>
											<td colspan="2"><?php echo sec($ConRow['dept_money']);?></td>
										</tr>
									<?php  }?>
								</table>
								<div class="new-form-details-footer">
									<div class="new-form-details-footer-saman">
										<span>ژمارا گرنتیێ( <?php echo sec($BillRowA['warranty_number']);?></span><span> )</span>
									</div>
									<div class="new-form-details-footer-agesaman">
										<span>ماوێ گرنتیێ ( <?php echo sec($BillRowA['warranty_period']);?></span><span> )</span>
									</div>
									<div class="new-form-details-footer-signature">
										<span>ئیمزا </span><input type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="showdebt-button">
							<div class="button-edit">
								<a href="" data-bs-toggle="modal" data-bs-target="#edit<?php echo sec($BillRowA['bill_id']);?>"><i class="far fa-edit"></i></a>
							</div>
							<div class="button-print">
								<a href="" onclick="window.print();"><i class="fas fa-print"></i></a>
							</div>
						</div>
					<?php  }?>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<?php
	$BillId = sec($_GET['id']);
	$BillQueryM = mysqli_query($db , "SELECT * FROM `bill` WHERE `bill_id` = '$BillId'");
	while($BillRowM = mysqli_fetch_assoc($BillQueryM)){?>
		<div class="modal fade" id="edit<?php echo sec($BillRowM['bill_id']);?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">دەستکاریکرن</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="POST" action="modal/DebtForm.php">
						<div class="modal-body">
							<div class="edit-modal-debt">
								<input type="text" name="billid" value="<?php echo sec($BillRowM['bill_id']);?>" hidden>
								<div class="edit-modal-debt-con">
									<h1>ئەرێ هەمی پارە هاتە واصل کرن ؟</h1>
									<button name="yeschek">بەلێ</button>
								</div>
								<hr>
								<?php
								$ConQueryM = mysqli_query($db , "SELECT * FROM `dept` WHERE `bill_id` = '$BillId' ORDER BY `id` DESC LIMIT 1");
								while($ConRowM = mysqli_fetch_assoc($ConQueryM)){?>
									<div class="edit-modal-debt-conmon">
										<input type="text" name="debtid" value="<?php echo sec($ConRowM['id']);?>" hidden>
										<h1>یان بەشەک ژ قەرزی ڤەگەراند: </h1>
										<span>المجموع عام</span><input type="text" value="<?php echo sec($BillRowM['totalprice_ofarticle']);?>" readonly>
										<span>باقی</span><input type="text" value="<?php echo sec($ConRowM['dept_money']);?>" id="total-all-data" readonly>
										<span>چەند هاتە ڤەگەراندن</span><input type="text" name="howmanycon" id="continuedcost" >
										<span>دۆماهیک باقی</span><select name="sumallcon">
											<option id="totalallcon"></option>
										</select>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-primary" name="DebtChange">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="jquery-3.5.0.min.js"></script>
	<script>
		$('#continuedcost').on('blur', function(e) {
			var tt = $("#total-all-data");
			var cc = $("#continuedcost");
			ttt = parseFloat(tt.val());
			ccc = parseFloat(cc.val());
			var totalcon = 0;
			if (!isNaN(ttt) && !isNaN(ccc)) {
				totalcon = ((ttt - ccc).toFixed(0));
			}
			$("#totalallcon").text(totalcon);
		});
	</script>
</body>
</html>