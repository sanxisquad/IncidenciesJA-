<aside>
    <nav>
        <div class="user_header">
            <img class="img_header" src="../public/assets/profile/<?php echo $_SESSION['usuari']['imatge']?>" alt="user">
            <p><?php echo $_SESSION['usuari']['rol']?></p>
        </div>
        <div class="navigation_header">
            <a class="links_header" href="../views/dashboardview.php"><i class="fa-solid fa-gauge"></i></a>
            <a class="links_header" href="../views/incidenciesview.php"><i class="fa-solid fa-triangle-exclamation"></i></a>
        </div>
        <div class="options_header">
            <a class="links_header" href="../views/perfil.php"><i class="fa-solid fa-user"></i></a>
            <a class="links_header" href="../controllers/UsuariController.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </nav>
</aside>