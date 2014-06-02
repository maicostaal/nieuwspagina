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

    <form method="post" action=""><p>
            <span class="label">Titel van het bericht:</span><br />
            <input type="text" style="width:478px; padding:5px 10px; margin:0; -webkit-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.5); -moz-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.5); box-shadow:0px 2px 5px rgba(50, 50, 50, 0.5); border:1px solid #000" name="naam" maxlength="16" /><br /><br />
            <span class="label">Inhoud van het bericht:</span><br />
            <textarea style="width:478px; height:250px; padding:5px 10px; margin:0; -webkit-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.5); -moz-box-shadow: 0px 2px 5px rgba(50, 50, 50, 0.5); box-shadow:0px 2px 5px rgba(50, 50, 50, 0.5); border:1px solid #000" name="bericht" id="tekst" rows="6" cols="37"></textarea><br /><br />
            <input class="input"  type="submit" value="Toevoegen" onclick="this.value='Nieuwsbericht wordt geplaatst...';" /> <input class="input"  type="reset" value="Herstel" />
        </p></form>
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