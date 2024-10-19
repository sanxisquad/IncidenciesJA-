<?php
include_once '../controllers/IncidenciaController.php';

$controller = new IncidenciaController();
$incidencies = $controller->obtenir_totes();
$tipus_incidencia = $controller->obtenir_tipus_incidencia();
$usuaris = $controller->obtenir_usuaris();
?>

<div id="modal_veure" class="modal_veure_incidencia">
    <div class="modal-content">
        <span class="close_modal_veure">&times;</span>
        <form class="form_veure" action="../controllers/IncidenciaController.php" method="POST">
            <input type="hidden" name="id_incidencia_veure" value="">
            <label for="titol">Títol</label>
            <input type="text" name="titol_veure">
            <label for="tipus">Tipus incidencia</label>
            <select name="id_tipo_incidencia_veure" id="id_tipo_incidencia" required>
                <?php
                    while ($tipus = $tipus_incidencia->fetch_assoc()) {
                        echo "<option value='" . $tipus['id_tipus_incidencia'] . "'>" . $tipus['nom'] . "</option>";
                    }
                ?>
            </select>
            <label for="tipus">Usuari supervisor</label>
            <p name="usuari_veure"></p>
            <label for="prioritat">Prioritat</label>
            <div class="radio_afegir">
                <label class="radio">
                    <input type="radio" name="prioritat_veure" value="baixa">
                    <span class="name">Baixa</span>
                </label>
                <label class="radio">
                    <input type="radio" name="prioritat_veure" value="mitjana">
                    <span class="name">Mitjana</span>
                </label>
                <label class="radio">
                    <input type="radio" name="prioritat_veure" value="alta">
                    <span class="name">Alta</span>
                </label>
            </div>
            <div class="radio_afegir">
                <label class="radio">
                    <input type="radio" name="estat_veure" value="pendent">
                    <span class="name">Pendent</span>
                </label>
                <label class="radio">
                    <input type="radio" name="estat_veure" value="enproces">
                    <span class="name">En Procés</span>
                </label>
                <label class="radio">
                    <input type="radio" name="estat_veure" value="resolta">
                    <span class="name">Resolta</span>
                </label>
            </div>
            <label for="data_creacio">Data creació</label>
            <p name="data_creacio_veure"></p>
            <label for="descripcio">Descripcio</label>
            <textarea name="descripcio_veure"></textarea>
            <button type="submit" name="action" value="actualitzar">Actualitzar</button>
            <button type="submit" name="action" value="eliminar">Eliminar</button>
        </form>
    </div>
</div>