<?php

include 'process_login.php';


$sql = "SELECT d.naziv_dogadjaja, d.datum, m.naziv_mjesta 
        FROM dogadjaji d 
        JOIN mjesto m ON d.id_mjesta = m.id_mjesta";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">

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

  <section id="event-section">
    <h2>Predstojeći događaji</h2>
    <p>Ne propustite uzbudljive nastupe DJ Jay D koji dolaze!</p>

    <?php
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo '<div class="event">';
            echo '<h3>' . $row["naziv_dogadjaja"] . '</h3>';
            echo '<p>Datum: ' . $row["datum"] . '</p>';
            echo '<p>Lokacija: ' . $row["naziv_mjesta"] . '</p>';

            
            $naziv_dogadjaja = $row["naziv_dogadjaja"];

            
            if ($naziv_dogadjaja === 'DJ Party u Beogradu') {
                echo '<img src="tomorowland.jpeg" alt="EXIT Festival" width="700" height="400">';
            } elseif ($naziv_dogadjaja === 'EXIT Festival') {
                echo '<img src="EXIT.jpg" alt="Tomorrowland Festival" width="700" height="400">';
            } elseif ($naziv_dogadjaja === 'Summer Festival') {
                echo '<img src="ultra.jpg" alt="Ultra Music Festival" width="700" height="400">';
            }

            echo '</div>';
        }
    } else {
        echo "<p>Nema predstojećih događaja.</p>";
    }

    
    $conn->close();
    ?>
  </section>

  <footer>
    <p>&copy; 2023 DJ Jay D. Sva prava zadržana.</p>
  </footer>
</body>

</html>
