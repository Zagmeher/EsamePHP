<?php
// Inizializza le variabili
$nome = $cognome = $email = $messaggio = "";
$errori = [];
$registrazioneCompletata = false;

// Processa il form quando viene inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione nome
    if (empty($_POST["nome"])) {
        $errori["nome"] = "Il nome è obbligatorio";
    } else {
        $nome = pulisciInput($_POST["nome"]);
        if (!preg_match("/^[a-zA-Z àèìòùáéíóúÀÈÌÒÙÁÉÍÓÚ']+$/", $nome)) {
            $errori["nome"] = "Il nome può contenere solo lettere e spazi";
        }
    }
    
    // Validazione cognome
    if (empty($_POST["cognome"])) {
        $errori["cognome"] = "Il cognome è obbligatorio";
    } else {
        $cognome = pulisciInput($_POST["cognome"]);
        if (!preg_match("/^[a-zA-Z àèìòùáéíóúÀÈÌÒÙÁÉÍÓÚ']+$/", $cognome)) {
            $errori["cognome"] = "Il cognome può contenere solo lettere e spazi";
        }
    }
    
    // Validazione email
    if (empty($_POST["email"])) {
        $errori["email"] = "L'email è obbligatoria";
    } else {
        $email = pulisciInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errori["email"] = "Formato email non valido";
        }
    }
    
    // Validazione messaggio
    if (empty($_POST["messaggio"])) {
        $errori["messaggio"] = "Il messaggio è obbligatorio";
    } else {
        $messaggio = pulisciInput($_POST["messaggio"]);
    }
    
    // Se non ci sono errori, procedi con il salvataggio
    if (empty($errori)) {
        // Prepara il testo da salvare
        $dataInvio = date("Y-m-d H:i:s");
        $testoMessaggio = "---------------------------------------------\n";
        $testoMessaggio .= "Data: {$dataInvio}\n";
        $testoMessaggio .= "Nome: {$nome}\n";
        $testoMessaggio .= "Cognome: {$cognome}\n";
        $testoMessaggio .= "Email: {$email}\n";
        $testoMessaggio .= "Messaggio: {$messaggio}\n";
        $testoMessaggio .= "---------------------------------------------\n\n";
        
        // Salva i dati nel file TXT
        $fileMessaggi = 'Messaggi.txt';
        
        if (file_put_contents($fileMessaggi, $testoMessaggio, FILE_APPEND | LOCK_EX)) {
            $registrazioneCompletata = true;
            
            // Reset dei campi del form
            $nome = $cognome = $email = $messaggio = "";
        } else {
            $errori["generale"] = "Errore durante il salvataggio dei dati. Riprova più tardi.";
        }
    }
}

// Funzione per pulire
function pulisciInput($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="sfumature-container">
    <?php include 'header.php'; ?>
    <div class="contatti">
        <div>
            <div>
                <h2>Invio Messaggio</h2>
            </div>
            <div>
                <?php if ($registrazioneCompletata): ?>
                    <div>
                        Messaggio inviato con successo! I tuoi dati sono stati salvati.
                    </div>
                <?php endif; ?>
                
                <?php if (isset($errori["generale"])): ?>
                    <div>
                        <?php echo $errori["generale"]; ?>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div>
                        <div>
                            <div>
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                                <?php if (isset($errori["nome"])): ?>
                                    <div><?php echo $errori["nome"]; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="cognome">Cognome</label>
                                <input type="text" id="cognome" name="cognome" value="<?php echo $cognome; ?>">
                                <?php if (isset($errori["cognome"])): ?>
                                    <div><?php echo $errori["cognome"]; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        <?php if (isset($errori["email"])): ?>
                            <div><?php echo $errori["email"]; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <label for="messaggio">Messaggio</label>
                        <textarea id="messaggio" name="messaggio"><?php echo $messaggio; ?></textarea>
                        <?php if (isset($errori["messaggio"])): ?>
                            <div><?php echo $errori["messaggio"]; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit">Invia</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>