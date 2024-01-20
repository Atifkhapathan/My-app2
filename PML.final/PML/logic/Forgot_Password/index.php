<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../presentation/includes/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
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
            /* Adjust the width as needed */
        }
#loading-spinner {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 9999;
}

#loading-spinner::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 40px;
  height: 40px;
  margin: -20px 0 0 -20px;
  border: 4px solid #3498db; /* Blue border color */
  border-radius: 50%;
  border-top: 4px solid #e74c3c; /* Red border color (change as needed) */
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#proceed button {
  background-color: #007bff; /* Blue color */
  color: #fff; /* White text color */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

#proceed button:hover {
  background-color: #0056b3; /* Darker blue color on hover */
}

header {
  background-color: #2ecc71; /* Green */
  color: #fff;
  text-align: center;
  padding: 10px;
}
.logo {
  width: 50%; /* Set the width to 50% of the container */
  max-width: 200px; /* Set a maximum width if needed */
  height: auto; /* Maintain aspect ratio */
}
form {
        width: 80%;
        align-content: center;
    }

    input[type="email"] {
        width: 100%; /* Set the width to 100% of its container */
        padding: 10px; /* Add padding for better appearance */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }


    </style>
</head>

<body>
    <header>
        <img src="../../presentation/includes/image/logo.png" alt="PMPML Logo" class="logo">
        <h1>PMPML Online Bus Pass Generator</h1>
    </header>
    <div class="container center-container">
        <div>

            <center><H1>Forgot Password</H1></center>
            <div class="alert alert-primary" role="alert">
                <?php
                session_start();
                if (isset($_REQUEST['msg'])) {
                    echo $_REQUEST['msg'];
                }
                ?>
            </div>
            <center>
            <form action="send_otp.php" method="post">
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="user_email" placeholder="Enter Your Registered Email" required="">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Send OTP</button>
                </div>
            </form>
            <section id="proceed">
                <br>
                <button onclick="moveTo('../../presentation/account/register.html')" class="mb-3">Back To Home</button>
            </section>
            </center>
        </div>
    </div>
    <div id="loading-spinner"></div>
    <script>
    function moveTo(Add) {
    var loadingSpinner = document.getElementById('loading-spinner');
    loadingSpinner.style.display = 'block';

    // Simulate a delay (you can replace this with an actual loading process)
    setTimeout(function () {
        loadingSpinner.style.display = 'none';
        // Redirect to login.html after loading
        window.location.href = Add;
    }, 500); // Adjust the duration as needed
}
</script>
</body>

</html>