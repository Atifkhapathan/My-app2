<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./styles.css">
    <script src="./script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        header {
            background-color: #2ecc71;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .logo {
            width: 50%;
            max-width: 200px;
            height: auto;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            animation: fadeInDown 0.5s;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        h1 {
            margin-top: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        /* Additional styles for sections */
        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>
    <div id="loading-spinner"></div>
    <header>
        <img src="../../presentation/includes/image/logo.png" alt="PMPML Logo" class="logo">
        <h1>PMPML Online Bus Pass Generator</h1>
    </header>

    <nav>
        <section id="proceed">
            <a onclick="moveTo('dashboard.php')" style="color: #fff;">Info</a>
            <a onclick="moveTo('Profile.php')" style="color: #fff;">Profile</a>
            <a onclick="moveTo('pass.php')" style="color: #fff;">Pass</a>
            <a onclick="moveTo('status.php')" style="color: #fff;">Status</a>
            <a onclick="moveTo('documents.php')" style="color: #fff;">Document</a>
            <a onclick="moveTo('map.php')" style="color: #fff;">Routes & Planning</a>
            <a onclick="moveTo('logout.php')" style="color: #fff;">Logout</a>
        </section>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if (!empty($_SESSION['data']['photo'])) : ?>
                    <img src="../../data/uploads/photos/<?php echo $_SESSION['data']['photo']; ?>" alt="User Photo"
                        class="img-fluid">
                <?php else : ?>
                    <!-- Default user photo if not provided -->
                    <img src="default_photo.jpg" alt="Default User Photo" class="img-fluid">
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h1><?php echo $_SESSION['data']['name']; ?></h1>
                <p>Username: <?php echo $_SESSION['data']['user_name']; ?></p>
                <p>Email: <?php echo $_SESSION['data']['email']; ?></p>
                <p>Phone Number: <?php echo $_SESSION['data']['phone']; ?></p>
            </div>
        </div>
    </div>

   
</body>

</html>
