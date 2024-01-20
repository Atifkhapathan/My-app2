<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
include('../../data/connect.php');
$pass_id = $_GET['pass_id'];
$pass_cost = $_GET['pass_cost'];
$pass_type=$_GET['pass_type']; // connect 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
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
    </style>
</head>

<body>
    <header>
        <img src="../../presentation/includes/image/logo.png" alt="PMPML Logo" class="logo">
        <h1>PMPML Online Bus Pass Generator</h1>

    </header>
    <div class="container mt-5">
        <h2>Payment Form</h2>

        <!-- Payment Form -->
        <form action="process.php" method="post">
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Select Payment Method:</label>
                <select class="form-select" id="paymentMethod" name="paymentMethod">
                    <option value="paypal">PayPal</option>
                    <option value="creditCard">Credit Card</option>
                </select>
            </div>

            <!-- Amount Input -->
            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" value=<?php echo "$pass_cost" ?> readonly>
            </div>

            <!-- PayPal Section -->
            <div id="paypalSection" class="payment-section" style="display: none;">
                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal Logo" class="img-fluid mb-3">
                <div class="mb-3">
                    <label for="mobileNumber" class="form-label">Enter Mobile Number:</label>
                    <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter mobile number">
                </div>
                <!-- Additional PayPal content goes here -->
            </div>

            <!-- Credit Card Section -->
            <div id="creditCardSection" class="payment-section" style="display: none;">
                <img src="https://www.freepnglogos.com/uploads/visa-logo-download-png-21.png" alt="Visa Logo" class="img-fluid mb-3">
                <div class="mb-3">
                    <label for="creditCardNumber" class="form-label">Enter Credit Card Number:</label>
                    <input type="text" class="form-control" id="creditCardNumber" name="creditCardNumber" placeholder="Enter credit card number">
                </div>
                <!-- Additional Credit Card content goes here -->
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
            <input type="hidden" name="pass_id" value="<?php echo $pass_id; ?>">
            <input type="hidden" name="pass_cost" value="<?php echo $pass_cost; ?>">
            <input type="hidden"name="pass_type" value="<?php echo $pass_type;?>
            <!-- Submit Button -->
           
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show/hide payment sections based on the selected payment method
            $('#paymentMethod').change(function() {
                var selectedMethod = $(this).val();
                $('.payment-section').hide();
                $('#' + selectedMethod + 'Section').show();
            });
        });
    </script>
</body>

</html>