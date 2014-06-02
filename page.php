<?php
error_reporting(E_ALL);
$host = "localhost"; // Je host
$user = "maico"; // Je MySQL gebruikersnaam
$pass = "test"; // Je MySQL wachtwoord
$datb = "nieuwspagina"; // Je MySQL database

// Verbinding maken
mysql_connect($host, $user, $pass) or die ("Er is iets mis gegaan");
mysql_select_db($datb) or die ("Er is iets mis gegaan");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Nieuwspagina - Gemaakt door Maico</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

</head>
<body style="font:16px 'Ubuntu', Verdana, Geneva, sans-serif;">

<div style="width:500px; margin:0 auto;">
    <h1 style="text-align:center;">Onderhoudbare Nieuwspagina</h1>
    <hr />
    <p>

        <!-- Nieuwsberichten -->

        <?php
        // Nieuwsberichten ophalen
        $sql = mysql_query("SELECT * FROM gastenboek ORDER BY datum DESC");
        if (mysql_num_rows($sql) == 0) {
            // Als er nog geen reacties geplaatst zijn
            echo 'We hebben nog geen reacties!';
        } else {
            while($data = mysql_fetch_assoc($sql)) {
                // Als er wel reacties zijn geplaatst worden deze nu weergegeven
                echo '<div class="article">
                    <h3>'.$data['titel'].'</h3>
                    <span class="date">'.$data['datum'].'</span>
                    <div>'.$data['artikel'].'</div>
                </div>';
            }
        }

        ?>

    </p>
</div>
</body>
</html>