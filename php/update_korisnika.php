<?php
@include 'process_login.php';

if (!$conn) {
    die("Konekcija na bazu nije uspjela: " . mysqli_connect_error());
}


if (isset($_POST['id_korisnika'])) {
    
    $id_korisnika = $_POST['id_korisnika'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $email = $_POST['email'];

    
    $update = "UPDATE korisnici SET ime = '$ime', prezime = '$prezime', korisnicko_ime = '$korisnicko_ime', lozinka = '$lozinka', email = '$email' WHERE id_korisnika = $id_korisnika";

    if (mysqli_query($conn, $update)) {
        
        header("Location:pregled.php"); 
        exit();
    } else {
        echo "Greška prilikom ažuriranja: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
