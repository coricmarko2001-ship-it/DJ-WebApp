<?php
@include 'process_login.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $select = "SELECT * FROM korisnici WHERE korisnicko_ime = '$username' AND lozinka = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('location:afterlogin.php');
        exit();
    } else {
        $error[] = 'Pogrešna lozinka ili korisničko ime.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Događaji - DJ Jay D</title>
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

<section class="contentlogin">
    <div class="container">
        <div class="card text-center">
            <h2 class="logintext">Uloguj se kao:</h2>
            
            <form action="" method="post">
                
                
                
                <div class="divButtonContainer">
                    <button class="btnlogin" name="register" type="button" onclick="window.location.href='adminlogin.php'">Administrator</button>
					<button class="btnlogin" name="register" type="button" onclick="window.location.href='login.php'">Korisnik</button>
                </div>

                
                <?php 
                if (isset($error)) {
                    foreach($error as $error) {
                        echo "<p class='error'>" . $error . "</p>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2023 DJ Jay D. Sva prava zadržava.</p>
</footer>
</body>
</html>
