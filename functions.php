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
?>
