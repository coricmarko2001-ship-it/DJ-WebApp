<?php

include 'process_login.php';


if (isset($_POST['register'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $email = $_POST['email'];

    
    $insert = "INSERT INTO korisnici (ime, prezime, korisnicko_ime, lozinka, email) VALUES ('$ime', '$prezime', '$korisnicko_ime', '$lozinka', '$email')";

    
    if (mysqli_query($conn, $insert)) {
        
        header('location:login.php');
        exit();
    } else {
        echo "Greška pri registraciji: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="sr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registracija - DJ Jay D</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <h1>Jay D</h1>
    <nav>
      <ul>
        <li><a href="jayd.html">Početna</a></li>
        <li><a href="events.php">Događaji</a></li>
        <li><a href="gallery.html">Galerija</a></li>
        <li><a href="contact.html">Kontakt</a></li>
        <li><a href="prelogin.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <section>
    <h2>Postanite dio našeg tima</h2>
    <form action="" method="POST">
      <label for="ime">Ime:</label>
      <input type="text" id="ime" name="ime" required><br><br>

      <label for="prezime">Prezime:</label>
      <input type="text" id="prezime" name="prezime" required><br><br>

      <label for="korisnicko_ime">Korisničko ime:</label>
      <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>

      <label for="lozinka">Lozinka:</label>
      <input type="password" id="lozinka" name="lozinka" required><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <div class="divButtonContainer">
        <button class="btnlogin" name="register" type="submit">Potvrdi</button>
        <button class="btnlogin" name="cancel" type="button" onclick="window.location.href='login.php';">Odustani</button>
      </div>
    </form>
  </section>

  <footer>
    <p>&copy; 2023 DJ Jay D. Sva prava zadržana.</p>
  </footer>
</body>

</html>
