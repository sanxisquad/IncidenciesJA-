<?php
include_once '../controllers/IncidenciaController.php';

$controller = new IncidenciaController();
$incidencies = $controller->obtenir_totes();
$tipus_incidencia = $controller->obtenir_tipus_incidencia();
$usuaris = $controller->obtenir_usuaris();
?>

<!----------------- Menu Afegir ----------------->

<div id="modal_afegir" class="modal_afegir_incidencia">
    <div class="modal-content">
        <span class="close_modal_afegir">&times;</span>
        <form action="../controllers/IncidenciaController.php?action=crear" method="POST" class="form_afegir">
            <input type="text" name="titol" id="titol" required placeholder="Titol">
            <select name="id_tipo_incidencia" id="id_tipo_incidencia" required>
                <option value="">Selecciona un tipus</option>
                <?php
                while ($tipus = $tipus_incidencia->fetch_assoc()) {
                    echo "<option value='" . $tipus['id_tipus_incidencia'] . "'>" . $tipus['nom'] . "</option>";
                }
                ?>
            </select>
            <select name="id_usuari" id="id_usuari" required>
                <option value="">Selecciona un usuari supervisor</option>
                <?php
                while ($usuari = $usuaris->fetch_assoc()) {
                    echo "<option value='" . $usuari['id_usuari'] . "'>" . $usuari['nom'] . "</option>";
                }
                ?>
            </select>
            <div class="radio_afegir">
                <label class="radio">
                    <input type="radio" name="prioritat" checked="" value="baixa">
                    <span class="name">Baixa</span>
                </label>
                <label class="radio">
                    <input type="radio" name="prioritat" value="mitjana">
                    <span class="name">Mitjana</span>
                </label>
                <label class="radio">
                    <input type="radio" name="prioritat" value="alta">
                    <span class="name">Alta</span>
                </label>
            </div>
            <div class="radio_afegir">
                <label class="radio">
                    <input type="radio" name="estat" checked="" value="pendent">
                    <span class="name">Pendent</span>
                </label>
                <label class="radio">
                    <input type="radio" name="estat" value="enproces">
                    <span class="name">En Procés</span>
                </label>
                <label class="radio">
                    <input type="radio" name="estat" value="resolta">
                    <span class="name">Resolta</span>
                </label>
            </div>
            <textarea name="descripcio" id="descripcio" requirede placeholder="Descripcio"></textarea>
            <button type="submit">Afegir</button>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    var modal = $("#modal_afegir");

    $("#afegir_incidencia").click(function() {
        modal.fadeIn(300);
    });

    $(".close_modal_afegir").click(function() {
        modal.fadeOut(300);
    });

    $(window).click(function(event) {
        if (event.target == modal[0]) {
            modal.fadeOut(300);
        }
    });
});
</script>

