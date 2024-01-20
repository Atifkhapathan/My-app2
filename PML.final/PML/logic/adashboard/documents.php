<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMPML Online Bus Pass Generator Dashboard</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./script.js"></script>
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
            background-color: #f4f4f4;
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
            max-width: 100%;
            overflow-x: auto;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        caption {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2ecc71;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
            <a onclick="moveTo('pass.php')" style="color: #fff;">Pass</a>
            <a onclick="moveTo('status.php')" style="color: #fff;">Status</a>
            <a onclick="moveTo('documents.php')" style="color: #fff;">Document</a>
            <a onclick="moveTo('logout.php')" style="color: #fff;">Logout</a>
        </section>
    </nav>
    <br><br><br>
    <center>
        <h2>Uploaded Documents</h2>
    </center>
    <?php
    session_start();
    include('../../data/connect.php');
    $pass_id=$_REQUEST['pass_id'];
    $check = mysqli_query($conn, "select * from passes where pass_id=$pass_id");
    if (mysqli_num_rows($check) > 0) {
        $pass = mysqli_fetch_array($check);
    ?>
        <center>
            <div class="container">
                <table>
                    <caption><?php echo "Documents of PassID:$pass_id"; ?></caption>
                    <tr>
                        <th>Document name</th>
                        <th>View</th>
                    </tr>
                    <tr>
                        <td>Adress Proof</td>
                        <?php $ap = $pass['adhar_document_path']; ?>
                        <td><a href="../../data/passuploads/<?php echo $ap; ?>">view</a></td>
                    </tr>
                    <tr>
                        <td>Age Proof</td>
                        <?php $age = $pass['adhar_document_path']; ?>
                        <?php if ($age != NULL) {
                            echo "<td><a href='../../data/passuploads/$age'>view</a></td>";
                        } else {
                            echo "<td>Not Available</td>";
                        } ?>
                    </tr>
                    <tr>
                        <td>Bonafide</td>
                        <?php $bon = $pass['bonafide_document_path']; ?>
                        <?php if ($bon != NULL) {
                            echo "<td><a href='../../data/passuploads/$bon'>view</a></td>";
                        } else {
                            echo "<td>Not Available</td>";
                        } ?>
                    </tr>
                    <tr>
                        <td>idcard</td>
                        <?php $id = $pass['id_card_document_path']; ?>
                        <?php if ($id != NULL) {
                            echo "<td><a href='../../data/passuploads/$id'>view</a></td>";
                        } else {
                            echo "<td>Not Available</td>";
                        } ?>
                    </tr>
                    <tr>
                        <td>Adhar Card</td>
                        <?php $adhar = $pass['adhar_document_path']; ?>
                        <td><a href="../../data/passuploads/<?php echo $adhar; ?>">view</a></td>
                    </tr>
                </table>
            </div>
            <a href="javascript:history.back()" class="btn btn-success" >Back</a>
        </center>
    <?php } ?>
</body>

</html>