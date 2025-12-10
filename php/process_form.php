<?php

include 'process_login.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $mjesto = $_POST['mjesto']; 
    $dogadjaj = $_POST['dogadjaj']; 
    $datum = $_POST['datum']; 

    
    $datum = date('Y-m-d', strtotime($datum));

  
    $sql_user_id = "SELECT id_korisnika FROM korisnici WHERE email = '$email'";
    $result_user_id = $conn->query($sql_user_id);

    if ($result_user_id->num_rows > 0) {
        
        $row = $result_user_id->fetch_assoc();
        $id_korisnika = $row['id_korisnika'];

        
        $sql = "INSERT INTO rezervacije (id_korisnika, id_dogadjaja, id_mjesta, datum_rezervacije) 
                VALUES ('$id_korisnika', '$dogadjaj', '$mjesto', '$datum')";

        
        if ($conn->query($sql) === TRUE) {
            
            header("Location: after.php");
            exit();
        } else {
            echo "Greška: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Korisnik sa datim emailom ne postoji u bazi.";
    }

    
    $conn->close();
}
?>
