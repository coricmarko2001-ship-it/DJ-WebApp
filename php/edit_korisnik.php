<?php
@include 'process_login.php';

if (!$conn) {
    die("Konekcija na bazu nije uspjela: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    
    $select = "SELECT k.id_korisnika, k.ime, k.prezime, k.korisnicko_ime, k.lozinka, k.email FROM korisnici k WHERE k.id_korisnika = $userId";
    $result = mysqli_query($conn, $select);
    $user = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Izmjena korisnika</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Izmjena korisnika</h1>
    </header>

    <section>
        <h2>Izmijeni podatke korisnika</h2>
        <form action="update_korisnika.php" method="POST">
            <input type="hidden" name="id_korisnika" value="<?php echo $user['id_korisnika']; ?>">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" value="<?php echo $user['ime']; ?>" required><br>

            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" id="prezime" value="<?php echo $user['prezime']; ?>" required><br>

            <label for="korisnicko_ime">Korisničko ime:</label>
            <input type="text" name="korisnicko_ime" id="korisnicko_ime" value="<?php echo $user['korisnicko_ime']; ?>" required><br>

            <label for="lozinka">Lozinka:</label>
            <input type="password" name="lozinka" id="lozinka" value="<?php echo $user['lozinka']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required><br>

            <button type="submit">Potvrdi izmjene</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 DJ Jay D. Sva prava zadržana.</p>
    </footer>
</body>
</html>
