<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }// Resume the session
include('../../data/connect.php');
// Retrieve data from session
$passData = isset($_SESSION["passData"]) ? $_SESSION["passData"] : [];
$fileNames = isset($_SESSION["fileNames"]) ? $_SESSION["fileNames"] : [];
/*INSERT INTO `passes`(`pass_id`, `user_id`, `dob`, `pass_type`, `pass_zone`, `class`, `course`, `pass_cost`, `pass_status`, `adh`, `adhar_document_path`, `other_document_path`, `bonafide_document_path`, `id_card_document_path`, `created_at`, `updated_at`) 
VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]')*/
$user_id = $_SESSION['data']['user_id'];
$dob = ""; // Replace with the actual date of birth
$pass_type = ""; // Replace with the actual pass type
$pass_zone = ""; // Replace with the actual pass zone
$class = ""; // Replace with the actual class
$course = ""; // Replace with the actual course
$pass_cost = 0; // Replace with the actual pass cost
$pass_status = "Inactive"; // Replace with the actual pass status
$adh = "";
$adhar_document_path = "";
$other_document_path = "";
$bonafide_document_path = "";
$id_card_document_path = "";
$Comment="";
$validity_start="" ;
$validity_end="";
$approval_status="Inactive";
// Check if the required data is present
if (!empty($passData) && !empty($fileNames)) {
    $pass_type = $passData["passType"];
    if ($passData["passType"] === "daily") {
        $adh = $passData["adhaar"];
        $pass_zone = $passData["zone"];
        $adhar_document_path = $fileNames["adh"];
        if ($passData["zone"] === "pp") {
            $cost = 50;
        } else {
            $cost = 120;
        }
        $approval_status="Active";
    } elseif ($passData["passType"] === "monthly") {
    
        $adh = $passData["adhaar"];
        $pass_zone = $passData["zone"];
        $adhar_document_path = $fileNames["adh"];
        if ($passData["zone"] === "pp") {
            $cost = 1200;
        } else {
            $cost = 1700;
        }
    } elseif ($passData["passType"] === "senior") {
        $adh = $passData["adhaar"];
        $pass_zone = $passData["zone"];
        $adhar_document_path = $fileNames["adh"];
        $dob = $passData["dob"];
        $cost = 500;
    } elseif ($passData["passType"] === "student") {
       
        $class = $passData["class"]; // Replace with the actual class
        $course = $passData["course"];
        $dob = $passData["dob"];
        $bonafide_document_path = $fileNames["bonafide"];
        $id_card_document_path = $fileNames["idcard"];
        $adhar_document_path = $fileNames["adh"];
        $cost = 750;
    }

    echo '</pre>';
} 
else {
    header("Location: pass.php");
    exit;
}
$insert = mysqli_query($conn, "INSERT INTO `passes`(`user_id`, `dob`, `pass_type`, `pass_zone`, `class`, `course`, `pass_cost`, `pass_status`, `adh`, `adhar_document_path`, `other_document_path`, `bonafide_document_path`, `id_card_document_path`, `created_at`, `updated_at`, `Comment`, `validity_start`, `validity_end`, `approval_status`)
VALUES ('$user_id', '$dob', '$pass_type', '$pass_zone', '$class', '$course', '$cost', '$pass_status', '$adh', '$adhar_document_path', '$other_document_path', '$bonafide_document_path', '$id_card_document_path', NOW(), NOW(), '$Comment', '$validity_start', '$validity_end', '$approval_status');");

echo '<script>
alert("Applied For Pass Sucessfully");
window.location = "./pass.php";
</script>';
// Optionally, you can clear the session data after printing it
unset($_SESSION["passData"]);
unset($_SESSION["fileNames"]);
?>

