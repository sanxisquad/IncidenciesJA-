<?php
if (!isset($_SESSION['usuari'])) {
    header('Location: ../views/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/header.css">

    <title><?php echo $title ?? 'Incidències'; ?></title>
    <?php
    if (isset($styles)) {
        foreach ($styles as $style) {
            echo "<link rel='stylesheet' href='$style'>";
        }
    }
    ?>
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="container">
        <?php
            if (isset($content)) {
                include $content;
            }
        ?>
    </div>
</body>
</html>
