<?php
require('./fpdf186/fpdf.php'); // Include the FPDF library

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pass_id'])) {
        require_once('../data/connect.php');

        $pass_id = $_GET['pass_id'];

        // Perform validation, authentication, and other security checks if needed

        // Fetch pass and user details from the database
        $selectQuery = "SELECT passes.*, users.name, users.email, users.photo FROM passes JOIN users ON passes.user_id = users.user_id WHERE pass_id = $pass_id";
        $result = $conn->query($selectQuery);

        if ($result && $result->num_rows > 0) {
            $passDetails = $result->fetch_assoc();

            // Create a PDF document
            $pdf = new FPDF();
            $pdf->AddPage();

            // Add logo
            $pdf->Image('../presentation/includes/image/logo.png', 10, 10, 40); // Adjust the path and dimensions as needed

            // Set font
            $pdf->SetFont('Arial', 'B', 16);

            // Add PASS INFORMATION title
            $pdf->Cell(0, 10, 'PASS INFORMATION', 0, 1, 'C');
            $pdf->Ln(10);

            // Set font for data
            $pdf->SetFont('Arial', '', 12);

            // Add user details to the PDF with borders and center alignment
            $pdf->Cell(40, 10, 'User Name:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['name'], 1, 1, 'L');
            $pdf->Cell(40, 10, 'User Email:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['email'], 1, 1, 'L');
            $pdf->Cell(40, 10, 'Pass ID:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['pass_id'], 1, 1, 'L');
            $pdf->Cell(40, 10, 'Pass Type:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['pass_type'], 1, 1, 'L');
            $pdf->Cell(40, 10, 'Pass Cost:', 1, 0, 'L');
            $pdf->Cell(0, 10, number_format($passDetails['pass_cost'], 2), 1, 1, 'L');
            $pdf->Cell(40, 10, 'Validity Start:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['validity_start'], 1, 1, 'L');
            $pdf->Cell(40, 10, 'Validity End:', 1, 0, 'L');
            $pdf->Cell(0, 10, $passDetails['validity_end'], 1, 1, 'L');

            // Calculate dimensions for passport-size photo (2x2 inches)
            $photoWidth = 40; // in mm
            $photoHeight = 50; // in mm

            // Calculate the position to center the photo
            $centerX = ($pdf->GetPageWidth() - $photoWidth) / 2;
            $centerY = $pdf->GetY() + 10; // Adjust the Y position as needed

            // Add the user photo with specified dimensions
            $pdf->Image('../data/uploads/photos/' . $passDetails['photo'], $centerX, $centerY, $photoWidth);

            // Output the PDF to the browser
            $pdf->Output();
        } else {
            echo "Pass not found.";
        }

        $conn->close();
    } else {
        echo "Invalid request. Pass ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
