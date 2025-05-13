<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chisono</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body class="sfumature-container">
    <?php 
    include 'functions.php'; // Include il file delle funzioni
    
    include 'header.php'; ?> 
    
    <div class="lavori">
    <?php impjson('lavori.json'); // Include il file JSON ?>
    </div>

    
    <?php include 'footer.php'; ?>
    
</bod>
</html>