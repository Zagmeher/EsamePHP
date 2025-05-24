<?php
require_once 'functions.php';
$servizi = caricaServizi('./json/dettagliLav.json'); // Carica i servizi dal file JSON
$id = $_GET['id'] ?? null;

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
    <body>
        <?php include 'header.php'; ?>
        <div class = "dettaglio" >
            <?php
            if ($id) {
                $dettaglio = mostraDettaglioPerID('./json/dettagliLav.json', $id);
                if ($dettaglio) {
                    echo "<div class='servizio'>";
                    echo "<h2 class='servizio__titolo'>{$dettaglio['titolo']}</h2>";
                    echo "<p class='servizio__descrizione'>{$dettaglio['descrizione']}</p>";
                    echo "<span class='servizio__prezzo'>Prezzo: {$dettaglio['prezzo']}€</span>";
                    echo "</div>";
            }
        }
            ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>