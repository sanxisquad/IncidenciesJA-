<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="../public/css/main.css">
    
    <title>IncidenciesJa! - Login</title>
</head>
<body class="body_session">
  <div class="login_container">
    <img src="../public/assets/brand/logo_lletres_white.png" alt="">
    <form class="login_form" method="POST" action="../controllers/UsuariController.php?action=login">
      <div class="input_group">
        <input
          required
          name="email"
          placeholder="Email"
          type="email"
        />
      </div>
      <div class="input_group">
        <input
          required
          placeholder="Password"
          name="contrasenya"
          type="password"
        />
      </div>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
