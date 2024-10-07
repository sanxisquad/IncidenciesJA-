<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>IncidenciesJa! - Login</title>
    <link rel="stylesheet" href="../public/css/loginregistre.css">
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body class="body_session">
<div class="login-container">
  <form class="login-form" method="POST" action="../controllers/UsuariController.php?action=login">
    <p class="heading">Iniciar sessió</p>
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
    <button type="submit">Login</button>
    <div class="bottom-text">
      <p>No tinc compta <a href="./registre.php">Registrat</a></p>
      <p><a href="#">No recordes la contrasenya?</a></p>
    </div>
  </form>
</div>
</body>
</html>
