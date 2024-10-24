<?php
include_once '../controllers/DashboardController.php';
$dashboard = new DashboardController();
?>
<h1 class="title">Les meves incidencies</h1>
<div class="dashboard">
    <div id="firstFilter" class="filter-switch">
        <input id="option1" name="options" type="radio" />
        <label class="option" for="option1">Admin</label>
        <input checked="" id="option2" name="options" type="radio" />
        <label class="option" for="option2">Tecnic</label>
        <span class="background"></span>
    </div>
    <div class="contador_incidencia">
        <p><?php echo $dashboard->totalIncidencies()->fetch_row()[0]; ?></p>
        <h2>Total incidencies</h2>
    </div>
    <div class="incidencies_contadors">
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incidenciesPendents()->fetch_row()[0]; ?></p>
            <h2>Pendents</h2>
        </div>
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incidenciesEnProces()->fetch_row()[0]; ?></p>
            <h2>En procés</h2>
        </div>
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incidenciesResoltes()->fetch_row()[0]; ?></p>
            <h2>Resoltes</h2>
        </div>
    </div>
    <div class="incidencies_contadors">
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incideciesAltes()->fetch_row()[0]; ?></p>
            <h2>Alta</h2>
        </div>
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incideciesModerades()->fetch_row()[0]; ?></p>
            <h2>Moderada</h2>
        </div>
        <div class="contador_incidencia">
            <p><?php echo $dashboard->incideciesBaixes()->fetch_row()[0]; ?></p>
            <h2>Baixa</h2>
        </div>
    </div>
    <div class="ultimes_incidencies">
        <h2>Ultimes incidencies</h2>
    </div>
</div>