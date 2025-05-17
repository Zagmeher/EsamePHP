<?php
function impjson($filePath) {
    if (!file_exists($filePath)) {
        echo "<p style='color:red;'>File non trovato: $filePath</p>";
        return;
    }

    $dati = json_decode(file_get_contents($filePath), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "<p style='color:red;'>Errore nel parsing JSON: " . json_last_error_msg() . "</p>";
        return;
    }

    foreach ($dati as $item) {
        if (isset($item['url'])) {
            echo "<h2><a href='" . htmlspecialchars($item['url']) . "'>" . htmlspecialchars($item['titolo']) . "</a></h2>";
            echo "<p>" . htmlspecialchars($item['descrizione']) . "</p>";
        } else {
            echo "<h2>" . htmlspecialchars($item['titolo']) . "</h2>";
            echo "<p>" . htmlspecialchars($item['descrizione']) . "</p>";
        }

    }
}

function imp_dett($filePath) {
    // Leggi il contenuto del file
    $contenuto = file_get_contents($filePath);

    // Decodifica il JSON in un array associativo
    $dati = json_decode($contenuto, true);

    // Verifica se la decodifica ha avuto successo
    if ($dati) {
        
        echo "<ul>";
        echo "<h3>" . htmlspecialchars($dati['title']) . "</h3>";
        echo "<li>Cliente: " . htmlspecialchars($dati['client']) . "</li>";
        echo "<li>Data: " . htmlspecialchars($dati['date']) . "</li>";
        echo "</ul>";
        echo "<img src='" . htmlspecialchars($dati['image']) . "' alt='Immagine prodotto' style='max-width: 300px;'>";
    } else {
        echo "Errore nella lettura del file JSON.";
    }
}

?>
