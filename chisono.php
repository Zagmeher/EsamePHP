<?php
require_once 'functions.php';
$servizi = caricaServizi('./json/lavori.json'); // Carica i servizi dal file JSON
$id = $_GET['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chisono</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="sfumature-container">
    <?php include 'header.php'; ?> 
    
    <div class="chisono">
        <h1>Su di me</h1>
        <img src="./img/me.jpg" alt="Immagine del profilo" class="imgMe">
        <ul style="list-style-type: none; padding: 0; font-size: 18px; line-height: 1.6;">
            <li><strong>Nome:</strong> Angelo Iandolo</li>
            <li><strong>Professione:</strong> Sviluppatore Web</li>
            <li><strong>Esperienza:</strong> 5 anni nel settore IT</li>
            <li><strong>Hobby:</strong> Motori, Informatica, Film</li>
            <li><strong>Obiettivi:</strong> Creare soluzioni innovative e migliorare continuamente le mie competenze</li>
        </ul>
    </div>

    
    <?php include 'footer.php'; ?>
    
</bod>
</html>

