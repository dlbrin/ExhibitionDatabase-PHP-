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
	<title>زێدەکرن بۆ کۆگەهێ</title>
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
				<h1>بەشێ زێدەکرن بۆ کۆگەهێ ل پێشانگەها راستی</h1>
				<p>زێدەکرنا داتایان بۆ کۆگەها پێشانگەها  راستی</p>
				<div class="add-new-filed">
					<a href="javascript:void(0)" class="add-more-form float-end">زێدەکرن</a>
				</div>
				<div class="our-table-koga" style="margin-top: 50px;">
					<form method="POST" action="modal/koga.inc.php">
						<table>
							<thead>
								<tr style="background-color: #FC813C;">
								    <td> بابەت</td>
									<td>کۆدا بابەتی</td>
									<td>ژمارە</td>
									<td>بهایێ بابەتی</td>
									<td>کۆی گشتی</td>
									<td>ژمارا پسۆلێ</td>
									<td>رۆژا کرینێ</td>
									<td>تێبینی</td>
								</tr>
								<tr>
									<td><input type="text" name="nameofsub[]"></td>
									<td><input type="text" name="codeofsub[]"></td>
									<td><input type="number" name="numofsub[]" class="numofsub"></td>
									<td><input type="number" name="priceofsub[]" class="pofsub"></td>
									<td>
										<select name="sumofsub[]">
											<option class="sofsub"></option>
										</select>
									</td>
									<td><input type="text" name="numofpsola[]"></td>
									<td><input type="date" name="dateofsub[]"></td>
									<td><input type="text" name="noteofsub[]"></td>
								</tr>
								<tbody></tbody>
							</thead>
						</table>
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
	<script>
		$('.numofsub, .pofsub').on('blur', function(e) {
			var row = $(this).closest('tr');
			var numofsubb = $('.numofsub', row),
			pofsubb = $('.pofsub', row);
			nnumofsubb = parseFloat(numofsubb.val());
			ppofsubb = parseFloat(pofsubb.val());
			if (!isNaN(nnumofsubb) && !isNaN(ppofsubb)) {
				$(".sofsub").text((nnumofsubb * ppofsubb).toFixed(0));
			}
		});
	</script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.add-more-form', function () {
				var test = '<tr>\
				<td><input type="text" name="nameofsub[]"></td>\
				<td><input type="text" name="codeofsub[]"></td>\
				<td><input type="number" name="numofsub[]" class="numofsub"></td>\
				<td><input type="number" name="priceofsub[]" class="pofsub"></td>\
				<td>\
				<select name="sumofsub[]">\
				<option class="dddd"></option>\
				</select>\
				</td>\
				<td><input type="text" name="numofpsola[]"></td>\
				<td><input type="date" name="dateofsub[]"></td>\
				<td><input type="text" name="noteofsub[]"></td>\
				</tr>';
				$('table tbody').append(test);
				$('.numofsub, .pofsub').on('blur', function(e) {
					var row = $(this).closest('tr');
					var numofsubb = $('.numofsub', row),
					pofsubb = $('.pofsub', row),
					allall = $('.dddd', row);
					nnumofsubb = parseFloat(numofsubb.val());
					ppofsubb = parseFloat(pofsubb.val());
					allallall = parseFloat(allall.val());
					if (!isNaN(nnumofsubb) && !isNaN(ppofsubb)) {
						allall.text((nnumofsubb * ppofsubb).toFixed(0));
					}
				});
			});
		});
	</script>
</body>
</html>