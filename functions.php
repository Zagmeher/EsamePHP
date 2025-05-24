<?php

/**
 * Carica e restituisce i dati JSON da un file specificato come array associativo.
 */
function caricaServizi($filePath) {
    if (!file_exists($filePath)) return [];
    return json_decode(file_get_contents($filePath), true);
}

// Mostra un elenco di servizi con link e descrizioni in formato HTML.
function mostraElencoServizi($servizi) {
    foreach ($servizi as $servizio) {
        $id = htmlspecialchars($servizio['id']);
        $titolo = htmlspecialchars($servizio['titolo']);
        echo "<ol><a href='dettaglioLav.php?id=$id'>$titolo</a></ol>";
        echo "<ol><p>" . htmlspecialchars($servizio['descrizione']) . "</p></ol>";
    }
}

// Mostra i dettagli di un servizio specifico identificato da un ID, leggendo i dati da un file JSON.
function mostraDettaglioPerID($filePath, $idRichiesto) {
    $dati = json_decode(file_get_contents($filePath), true);

    foreach ($dati as $servizio) {
        if (isset($servizio['id']) && $servizio['id'] == $idRichiesto) {
            echo "<h2>" . htmlspecialchars($servizio['titolo']) . "</h2>";
            echo "<ol><p>" . htmlspecialchars($servizio['cliente']) . "</p></ol>";
            echo "<ol><p>" . htmlspecialchars($servizio['descrizione']) . "</p></ol>";
            echo "<ol><p>" . htmlspecialchars($servizio['data']) . "</p></ol>";
            if (!empty($servizio['img'])) {
                echo "<img src='" . htmlspecialchars($servizio['img']) . "' alt='Immagine del servizio'>";
            }

            return;
        }
    }

    echo "<p>Servizio non trovato.</p>";
}


// Mostra i dettagli di un servizio specifico in formato HTML.
function mostraDettaglioServizio($servizio) {
    echo "<h1>" . htmlspecialchars($servizio['titolo']) . "</h1>";
    echo "<p>" . htmlspecialchars($servizio['descrizione']) . "</p>";
    echo "<a href='index.php'>← Torna all'elenco</a>";
}

?>