<html lang="en">

<head>
    <title>Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <H1>OTP Login</H1>
        <div class="alert alert-primary" role="alert">
            <?php
            if (isset($_REQUEST['msg'])) {
                echo $_REQUEST['msg'];
            }
            ?>
        </div>
        <div class="mb-3">
            <form action="check.php" method="post">
                <label>Enter OTP</label>
                <input type="text" name="otp" placeholder="5 Digits OTP">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Verify OTP</button>
        </div>
        </form>
        </div>
        
</body>
</html>   