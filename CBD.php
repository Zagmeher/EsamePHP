<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBD</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
    <body class="sfumature-container">
        <?php include 'header.php'; ?>
        <div class = "CBD" >
            <?php include 'functions.php'; // Include il file delle funzioni
            imp_dett('dettCBD.json'); // Include il file JSON ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>