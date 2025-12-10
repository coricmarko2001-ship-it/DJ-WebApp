<?php
include 'process_login.php';  

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST['id'];

    
    $deleteQuery = "DELETE FROM korisnici WHERE id_korisnika = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId); 
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
            echo "success";  
        } else {
            echo "error"; 
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "error";  
    }

    mysqli_close($conn); 
}
?>
