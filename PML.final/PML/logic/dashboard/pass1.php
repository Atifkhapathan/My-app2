<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  } // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passType = $_POST["passType"];

    if ($passType === "daily") {
        $dailyAdhaar = sanitizeInput($_POST["dailyAdhaar"]);
        $dailyAdh = $_FILES["dailyAdh"];
        $adhphoto_name=$dailyAdh['name'];
        $adhphoto_tmp=$dailyAdh['tmp_name'];  
        $upload_dir = "../../data/passuploads/";
        move_uploaded_file( $adhphoto_tmp, $upload_dir .   $adhphoto_name); 
        $dailyZone = sanitizeInput($_POST["dailyZone"]);

        if (!isValidAdhaar($dailyAdhaar)) {
            header("Location: pass.php?message=Invalid Adhaar number for Daily Pass");
            exit;
        }

        // Store data in session
        $_SESSION["passData"] = [
            "passType" => $passType,
            "adhaar" => $dailyAdhaar,
            "zone" => $dailyZone
        ];

        // Store file names in session
        $_SESSION["fileNames"] = [
            "adh" => $dailyAdh["name"]
        ];
    } elseif ($passType === "monthly") {
        $monthlyAdhaar = sanitizeInput($_POST["monthlyAdhaar"]);
        $monthlyAdh = $_FILES["monthlyAdh"];
        $adhphoto_name=$monthlyAdh['name'];
        $adhphoto_tmp=$monthlyAdh['tmp_name'];  
        $upload_dir = "../../data/passuploads/";
        move_uploaded_file( $adhphoto_tmp, $upload_dir .   $adhphoto_name);
        $monthlyZone = sanitizeInput($_POST["monthlyZone"]);
        
        if (!isValidAdhaar($monthlyAdhaar)) {
            header("Location: pass.php?message=Invalid Adhaar number for Monthly Pass");
            exit;
        }

        // Store data in session
        $_SESSION["passData"] = [
            "passType" => $passType,
            "adhaar" => $monthlyAdhaar,
            "zone" => $monthlyZone
        ];

        // Store file names in session
        $_SESSION["fileNames"] = [
            "adh" => $monthlyAdh["name"]
        ];
        

    } elseif ($passType === "senior") {
        $seniorAdhaar = sanitizeInput($_POST["seniorAdhaar"]);
        $seniorDob = sanitizeInput($_POST["seniorDob"]);
        
        $seniorAdh = $_FILES["seniorAdh"];
        $adhphoto_name=$seniorAdh['name'];
        $adhphoto_tmp=$seniorAdh['tmp_name'];  
        $upload_dir = "../../data/passuploads/";
        move_uploaded_file( $adhphoto_tmp, $upload_dir .   $adhphoto_name);
        
        $seniorZone = sanitizeInput($_POST["seniorZone"]);

        if (!isValidAdhaar($seniorAdhaar)) {
            header("Location: pass.php?message=Invalid Adhaar number for Senior Citizen Pass");
            exit;
        }

        // Store data in session
        $_SESSION["passData"] = [
            "passType" => $passType,
            "adhaar" => $seniorAdhaar,
            "dob" => $seniorDob,
            "adh" => $seniorAdh,
            "zone" => $seniorZone
        ];

        // Store file names in session
        $_SESSION["fileNames"] = [
            "adh" => $seniorAdh["name"]
        ];
    } elseif ($passType === "student") {
        $studentClass = sanitizeInput($_POST["studentClass"]);
        $studentCourse = sanitizeInput($_POST["studentCourse"]);
        $studentDob = sanitizeInput($_POST["studentDob"]);
        
        $studentBonafide = $_FILES["studentBonafide"];
        $bonafide_name=$studentBonafide['name'];
        $bonafide_tmp=$studentBonafide['tmp_name'];
        $upload_dir = "../../data/passuploads/";
        move_uploaded_file( $bonafide_tmp, $upload_dir .   $bonafide_name);

        $studentIdCard = $_FILES["studentIdCard"];
        $idphoto_name=$studentIdCard['name'];
        $idphoto_tmp=$studentIdCard['tmp_name'];  
        move_uploaded_file( $idphoto_tmp, $upload_dir .   $idphoto_name);
        
        $studentAdh = $_FILES["studentAdh"];
        $adhphoto_name=$studentAdh['name'];
        $adhphoto_tmp=$studentAdh['tmp_name'];  
        move_uploaded_file( $adhphoto_tmp, $upload_dir .   $adhphoto_name);
        // Store data in session
        $_SESSION["passData"] = [
            "passType" => $passType,
            "class" => $studentClass,
            "course" => $studentCourse,
            "dob" => $studentDob,
            "bonafide" => $studentBonafide,
            "idcard" => $studentIdCard,
            "adh" => $studentAdh
        ];

        // Store file names in session
        $_SESSION["fileNames"] = [
            "bonafide" => $studentBonafide["name"],
            "idcard" => $studentIdCard["name"],
            "adh" => $studentAdh["name"]
        ];
    }

    // Add similar blocks for other pass types if needed

    header("Location: pass2.php");
    exit;
}

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isValidAdhaar($adhaar)
{
    return preg_match('/^\d{12}$/', $adhaar);
}
?>
