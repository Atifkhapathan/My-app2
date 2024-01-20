<html lang="en">

<head>
    <title>Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        header {
            background-color: #2ecc71;
            /* Green */
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .logo {
            width: 50%;
            /* Set the width to 50% of the container */
            max-width: 200px;
            /* Set a maximum width if needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        form {
            width: 70%;
        }
form {
        width: 80%;
        align-content: center;
    }
    </style>
</head>

<body>
<header>
        <img src="../../presentation/includes/image/logo.png" alt="PMPML Logo" class="logo">
        <h1>PMPML Online Bus Pass Generator</h1>
    </header>
    <div class="container" align="center">
        <H1>Reset Password</H1>
        <div class="alert alert-primary" role="alert">
            <?php
            if (isset($_REQUEST['msg'])) {
                echo $_REQUEST['msg'];
            }
            ?>
        </div>
        <div class="mb-3">
            <form action="check.php" method="post">
                <label>New Password:</label><br>
                <input type="password" name="password" placeholder="Enter New Password" minlength="8"><br><br>
                <label>Confirm Password:</label><br>
                <input type="password" name="cpassword" placeholder="Confirm Password" minlength="8"><br><br>
                <label>Enter OTP</label><br>
                <input type="text" name="otp" placeholder="5 Digits OTP">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Verify OTP</button>
        </div>
        </form>
        </div>
        
</body>
</html>   