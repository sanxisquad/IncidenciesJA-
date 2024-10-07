<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header('Location: ../views/login.php');
    exit;
}

if ($_SESSION['usuari']['rol'] = 'usuari') {
    header('Location: ../views/incidenciesview.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Benvingut/da, " . $_SESSION['usuari']['nom']; ?>
    <a href="../controllers/UsuariController.php?action=logout">Logout</a>
</body>
</html>