<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Pregled rezervacija</title>
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
        <h2>Pregled korisnika</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Korisnika</th>
                    <th>Ime korisnika</th>
                    <th>Prezime korisnika</th>
                    <th>Korisničko ime</th>
                    <th>Lozinka</th>
                    <th>Email</th>
                    <th>Izmjene</th>
                </tr>
            </thead>
            <tbody>
                <?php
                @include 'process_login.php';

                if (!$conn) {
                    die("Konekcija na bazu nije uspjela: " . mysqli_connect_error());
                }

                $select = "SELECT k.id_korisnika, k.ime, k.prezime, k.korisnicko_ime, k.lozinka, k.email
                           FROM korisnici k";

                $result = mysqli_query($conn, $select);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id_korisnika']}</td>
                                <td>{$row['ime']}</td>
                                <td>{$row['prezime']}</td>
                                <td>{$row['korisnicko_ime']}</td>
                                <td>{$row['lozinka']}</td>
                                <td>{$row['email']}</td>
                                <td class='action-buttons'>
                                    <button class='edit-button' onclick='editUser({$row['id_korisnika']})'>Izmijeni</button>
                                    <button class='delete-button' onclick='deleteUser({$row['id_korisnika']})'>Obriši</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nema dostupnih korisnika.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2023 DJ Jay D. Sva prava zadržana.</p>
    </footer>

    <script>
    function editUser(userId) {
        const confirmation = confirm("Da li želite da izmijenite korisnika ?");
        if (confirmation) {
            window.location.href = "edit_korisnik.php?id=" + userId;
        }
    }

    function deleteUser(userId) {
        const confirmation = confirm("Da li ste sigurni da želite da obrišete korisnika ?");
        if (confirmation) {
            
            fetch("obrisi_korisnika.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + userId
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else {
                    throw new Error("Greška prilikom brisanja korisnika.");
                }
            })
            .then(data => {
                if (data.trim() === "success") {
                    alert("Korisnik je uspešno obrisan.");
                    window.location.reload(); 
                } else {
                    alert("Došlo je do greške pri brisanju korisnika.");
                }
            })
            .catch(err => {
                alert(err.message); 
            });
        }
    }
</script>

</body>
</html>
