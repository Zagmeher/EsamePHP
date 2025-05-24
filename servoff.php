<?php
require_once 'functions.php';
$servizi = caricaServizi('./json/servoff.json'); // Carica i servizi dal file JSON
$id = $_GET['id'] ?? null;
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>servoff</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="sfumature-container">
    <?php 
    include 'header.php'; 
    ?> 
    <div class="servoff">
        <h1>Servizi Offerti</h1>
        <img src="./img/ServOff.png" alt="Immagine dei servizi" class="imgServ">
        <div class="descServ">
            <h3> I miei servizi </h3>
            <p>Offro una vasta gamma di servizi professionali per soddisfare le tue esigenze, garantendo qualità e affidabilità in ogni progetto.</p>
        </div>
    

    <div class="lavori">
        <?php
        mostraElencoServizi($servizi);
        ?>
    </div>
    </div>
    
    <?php include 'footer.php'; ?>
    
</body>
</html>
