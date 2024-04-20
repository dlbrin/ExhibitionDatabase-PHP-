<?php include 'includes/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>چوونا ژوور</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/DpuLogoPng.png">
    <link href="fontawesome/all.min.css" rel="stylesheet">
    <link href="fontawesome/fontawesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color: #ecf0f3;">
    <div class="lg-container">
        <div class="lg-row">
            <div class="lg-row-logo">
                <img src="assets/images/technical-support.svg" alt="">
            </div>
            <div class="lg-row-header">
                <h1><i class="fas fa-lock"></i> چوونا ژوور</h1>
            </div>
            <form class="lg-row-inp" method="POST" action="modal/login.inc.php">
                <input type="email" name="email" placeholder="ناڤونیشانێ ئەلێکترۆنی">
                <input type="password" name="password" placeholder="وشا نهێنی">
                <button name="adm_log">چوونا ژوور</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_SESSION['AdminEmpty'])){?>
        <script>
            swal({
                title: "<?php echo $_SESSION['AdminEmpty']; ?>",
                icon: "error",
                button: "باشە",
            });
        </script>
        <?php unset($_SESSION['AdminEmpty']); } ?>
        <?php
        if(isset($_SESSION['AdminWrong'])){?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['AdminWrong']; ?>",
                    icon: "error",
                    button: "باشە",
                });
            </script>
            <?php unset($_SESSION['AdminWrong']); } ?>
        </body>
        </html>