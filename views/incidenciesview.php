<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header('Location: ../views/login.php');
    exit;
}

$rol = $_SESSION['usuari']['rol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencies <?php echo $_SESSION['usuari']['nom']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/aside.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/incidencies.css">
</head>
<body>
    <?php include '../components/aside.php'; ?>
    <div class="container">
        <!----------------- Menu incidencies ----------------->
        <div class="menu_incidencies">
            <h2>Incidencies</h2>
            <div>
                <button type="button" class="add_incidencia" id="afegir_incidencia">
                    <span class="add_incidencia_button__text">Afegir</span>
                    <span class="add_incidencia_button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                </button>
            </div>
        </div>
        <?php include '../components/afegirincidencies.php'; ?>
        <?php include '../components/incidencies.php'; ?>
    </div>
</body>
</html>