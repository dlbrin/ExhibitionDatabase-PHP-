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
	<title>فۆرما نووی</title>
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
				<h1>بەشێ دروستکرنا فۆرمەکا نووی</h1>
				<p>فۆرما نووی</p>
				<div class="add-new-filed">
					<a href="javascript:void(0)" class="add-more-form float-end">زێدەکرن</a>
				</div>
				<div class="new-form-page">
					<form method="POST" action="modal/newform.inc.php">
						<div class="new-form-details">
							<div class="new-form-details-header">
								<div class="first-form-header">
									<h3>پێشانگەها راستی</h3>
									<h2>بۆ فرۆتنا کەلوپەلێن کەهرەبایی و مالان ب کەت و کوم</h2>
									<div>
										<h2>بەروار:  <input type="date" name="FormDate"></h2>
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
									<span>ناڤ: </span><input type="text" name="UserName" >
								</div>
								<div class="new-form-details-middle-address">
									<span>ناڤونیشان: </span><input type="text" name="UserAddress">
								</div>
								<div class="new-form-details-middle-phone">
									<span>ژ.مۆبایلێ: (</span><input type="number" name="UserPhone" ><span>)</span>
								</div>
							</div>
							<div class="new-form-details-final">
								<table>
									<thead>
										<tr style="background-color: #FC813C;">
											<td>ناڤێ بابەتی</td>
											<td>ژمارا بابەتی</td>
											<td>دانە</td>
											<td>بها</td>
											<td>بهایێ گشتی</td>
											<td>تێبینی</td>
										</tr>
										<tr>
											<td>
												<select name="article[]" class="nameart" id="aioConceptName">
													<?php
													$NameQuery = mysqli_query($db , "SELECT * FROM `koga`");
													while($NameRow = mysqli_fetch_assoc($NameQuery)){?>
														<option value="<?php echo sec($NameRow['name_of_sub']);?>"><?php echo sec($NameRow['name_of_sub']);?></option>
													<?php } ?>
												</select>
											</td>
											<td><input type="text" name="articlecode[]"></td>
											<td><input type="text" name="articlenumber[]" class="articlenum"></td>
											<td><input type="text" name="articleprice[]" class="articlepri"></td>
											<td>
												<select name="articlesumprice[]">
													<option class="articlesumpri" id="all"></option>
												</select>
											</td>
											<td><input type="text" name="articlenote[]"></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<thead>
										<tr>
											<td colspan="4" style="color: #022069; ">کۆی گشتی</td>
											<td colspan="2"><select name="totalprice_ofarticle">
												<option id="total-all-data" class="totalofsum"></option>
											</select></td>
										</tr>
									</thead>
								</table>
								<div class="new-form-details-footer">
									<div class="new-form-details-footer-saman">
										<span>ژمارا گرنتیێ (</span><input type="text" name="warranty_number"><span>)</span>
									</div>
									<div class="new-form-details-footer-agesaman">
										<span>ماوێ گرنتیێ ( </span><input type="text" name="warranty_period"><span>)</span>
									</div>
									<div class="new-form-details-footer-signature">
										<span>ئیمزا </span><input type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="continued-cost">
							<div class="continued-cost-details-txt">
								<h1>پارە هەمی هاتە واصل کرن ؟</h1>
							</div>
							<div class="continued-cost-details">
								<div class="continued-cost-details-option">
									<input type="checkbox" name="continued[]" value="بەلێ"><label>بەلێ</label>
								</div>
								<div class="continued-cost-details-option">
									<input type="checkbox" name="continued[]" id="showField" value="نەخێر" onchange="myFunction()"><label>نەخێر</label>
								</div>
							</div>
							<div class="if-no-cheked">
								<span id="in1">چەند هاتە واصلکرن؟  <input type="text" name="howmanycon" id="continuedcost"></span>
								<br>
								<span id="in2">کۆژمێ قەرزی:
									<select name="sumallcon">
										<option id="totalallcon"></option>
									</select>
								</span>
							</div>
						</div>
						<div class="insert-form-data">
							<button name="InForm">هنارتن</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.add-more-form', function () {
				var test = '<tr>\
				<td>\
				<select name="article[]" class="nameart" id="aioConceptName">\
				<?php
				$NameQuery = mysqli_query($db , "SELECT * FROM `koga`");
				while($NameRow = mysqli_fetch_assoc($NameQuery)){?>
					<option value="<?php echo sec($NameRow['name_of_sub']);?>"><?php echo sec($NameRow['name_of_sub']);?></option>\
				<?php } ?>
				</select>\
				</td>\
				<td>\
				<input type="text" name="articlecode[]">\
				</td>\
				<td>\
				<input type="text" name="articlenumber[]" class="articlenum">\
				</td>\
				<td>\
				<input type="text" name="articleprice[]" class="articlepri">\
				</td>\
				<td>\
				<select name="articlesumprice[]">\
				<option class="articlesumpri" id="all"></option>\
				</select>\
				</td>\
				<td>\
				<input type="text" name="articlenote[]">\
				</td>\
				<tr>';
				$('table tbody').append(test);
				$('.articlenum, .articlepri').on('blur', function(e) {
					var row = $(this).closest('tr');
					var artnum = $('.articlenum', row),
					artpri = $('.articlepri', row),
					artsupr = $('.articlesumpri', row);
					arnum = parseFloat(artnum.val());
					arpri = parseFloat(artpri.val());
					arsupr = parseFloat(artsupr.val());
					if (!isNaN(arnum) && !isNaN(arpri)) {
						artsupr.text((arnum * arpri).toFixed(0));
					}
					var totalsum = 0;
					$(".articlesumpri").each(function(){
						var inputVal = $(this).val();
						if($.isNumeric(inputVal)){
							totalsum += parseFloat(inputVal);
						}
						$("#total-all-data").text(totalsum);
					});
				});
			});
			$('.articlenum, .articlepri').on('blur', function(e) {
				var row = $(this).closest('tr');
				var artnum = $('.articlenum', row),
				artpri = $('.articlepri', row),
				artsupr = $('.articlesumpri', row);
				arnum = parseFloat(artnum.val());
				arpri = parseFloat(artpri.val());
				arsupr = parseFloat(artsupr.val());
				if (!isNaN(arnum) && !isNaN(arpri)) {
					artsupr.text((arnum * arpri).toFixed(0));
				}
				var totalsum = 0;
				$(".articlesumpri").each(function(){
					var inputVal = $(this).val();
					if($.isNumeric(inputVal)){
						totalsum += parseFloat(inputVal);
					}
					$("#total-all-data").text(totalsum);
				});
			});
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="jquery-3.5.0.min.js"></script>
	<script>
		$('#in1').css('display','none');
		$('#in2').css('display','none');
		function myFunction() {
			if($('#showField').prop('checked')) {
				$('#in1').css('display','block');
				$('#in2').css('display','block');
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
			} else {
				$('#in1').css('display','none');
				$('#in2').css('display','none');
			}
		}
	</script>
</body>
</html>