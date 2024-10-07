<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>IncidenciesJa! - Registre</title>
    <link rel="stylesheet" href="../public/css/loginregistre.css">
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body class="body_session">
    <div class="login-container">
    <form class="login-form" method="POST" action="../controllers/UsuariController.php?action=registre">
        <p class="heading">Registrat</p>
        <div class="input-group">
            <input
                required
                name="nom"
                placeholder="Nom"
                type="text"
            />
        </div>
        <div class="input-group">
            <input
                required
                name="cognoms"
                placeholder="Cognoms"
                type="text"
            />
        </div>
        <div class="input-group">
            <input
                required
                name="email"
                placeholder="Email"
                type="email"
            />
        </div>
        <div class="input-group">
            <input
                required
                placeholder="Password"
                name="contrasenya"
                type="password"
            />
        </div>
        <button type="submit">Registre</button>
        <div class="bottom-text">
        <p>Ja tinc compta <a href="./login.php">Iniciar Sessió</a></p>
        </div>
    </form>
</div>
</body>
</html>
