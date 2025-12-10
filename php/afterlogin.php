<?php
include 'process_login.php';

$sql_mjesta = "SELECT id_mjesta, naziv_mjesta FROM mjesto";
$result_mjesta = $conn->query($sql_mjesta);

$sql_dogadjaji = "SELECT id_dogadjaja, naziv_dogadjaja FROM dogadjaji";
$result_dogadjaji = $conn->query($sql_dogadjaji);
?>

<!DOCTYPE html>
<html lang="sr">

<head>
  <meta charset="UTF-8">
  <title>Član - DJ Jay D</title>
  <link rel="stylesheet" href="styles.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>
    $(function() {
      $("#datum").datepicker({
        dateFormat: "dd-mm-yy" 
      });
    });
  </script>
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
    <h2>Rezervišite svoj termin na vrijeme!</h2>
    <form action="process_form.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="mjesto">Mjesto:</label>
      <select id="mjesto" name="mjesto" required>
        <option value="" selected hidden></option> 
        <?php
        if ($result_mjesta->num_rows > 0) {
            while($row = $result_mjesta->fetch_assoc()) {
                echo '<option value="' . $row["id_mjesta"] . '">' . $row["naziv_mjesta"] . '</option>';
            }
        }
        ?>
      </select><br><br>

      <label for="dogadjaj">Događaj:</label>
      <select id="dogadjaj" name="dogadjaj" required>
        <option value="" selected hidden></option> 
        <?php
        if ($result_dogadjaji->num_rows > 0) {
            while($row = $result_dogadjaji->fetch_assoc()) {
                echo '<option value="' . $row["id_dogadjaja"] . '">' . $row["naziv_dogadjaja"] . '</option>';
            }
        }
        ?>
      </select><br><br>

      <label for="datum">Datum:</label>
      <input type="text" id="datum" name="datum" required><br><br>

      <input type="submit" value="Pošalji">
      <button class="btnlogin" name="odustani" type="button" onclick="window.location.href='login.php'">Odustani</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2023 DJ Jay D. Sva prava zadržana.</p>
  </footer>
</body>

</html>
