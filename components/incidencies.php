<?php
include_once '../controllers/IncidenciaController.php';

$controller = new IncidenciaController();

if(isset($_GET['estat'])) {
    $incidencies = $controller->filtre_estat($_GET['estat']);
} else {
    $incidencies = $controller->obtenir_totes();
}
$tipus_incidencia = $controller->obtenir_tipus_incidencia();
$usuaris = $controller->obtenir_usuaris();
?>

<div class="container_incidencies">
    <?php if ($incidencies && $incidencies->num_rows > 0) : ?>
        <?php while ($incidencia = $incidencies->fetch_assoc()) : ?>
            <div onclick="veureIncidencia(<?php echo $incidencia['id_incidencia']?>)" class="incidencia-card prioritat-<?php echo $incidencia['prioritat']?>">
                <input type="hidden" name="id_usuari_actiu" value="<?= $_SESSION['usuari']['id']?>">
                <h2 class="incidencia-title"><?php echo $incidencia['titol']?></h2>
                <p class="incidencia-type"><?php echo $incidencia['tipus_incidencia']?></p>
                <p class="incidencia-status"><?php echo $incidencia['estat']?></p>
                <p class="incidencia-date"><?php echo $incidencia['data_creacio']?></p>
                <p class="incidencia-supervisor"><?php echo $incidencia['nom_usuari_supervisor']?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hi ha incidències disponibles.</p>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var modal = $("#modal_veure");
    $(".close_modal_veure").click(function() {
        modal.fadeOut(300);
    });
    $(window).click(function(event) {
        if (event.target == modal[0]) {
            modal.fadeOut(300);
        }
    });
});
function veureIncidencia(id) {
    $("#modal_veure").fadeIn(300);
    $.ajax({
        url: "../controllers/IncidenciaController.php?action=obtenir_per_id",
        type: "POST", 
        data: {
            id: id
        },
        success: function(response) {
            var incidencia = JSON.parse(response);
            $("input[name=titol_veure]").val(incidencia.titol);
            if ($("select[name=id_tipo_incidencia_veure] option[value='" + incidencia.id_tipo_incidencia + "']").length) {
                $("select[name=id_tipo_incidencia_veure]").val(incidencia.id_tipo_incidencia);
            }
            if ($("select[name=id_usuari_veure] option[value='" + incidencia.id_usuari + "']").length) {
                $("select[name=id_usuari_veure]").val(incidencia.id_usuari);
            }
            if ($("input[name=prioritat_veure][value='" + incidencia.prioritat + "']").length) {
                $("input[name=prioritat_veure][value='" + incidencia.prioritat + "']").prop("checked", true);
            }
            if ($("input[name=estat_veure][value='" + incidencia.estat + "']").length) {
                $("input[name=estat_veure][value='" + incidencia.estat + "']").prop("checked", true);
            }
            $("p[name=data_creacio_veure]").text(incidencia.data_creacio);
            $("p[name=usuari_veure]").text(incidencia.nom);
            $("textarea[name=descripcio_veure]").val(incidencia.descripcio);
            $("input[name=id_incidencia_veure]").val(incidencia.id_incidencia);

            if(incidencia.id_usuari == $("input[name=id_usuari_actiu]").val()){
                $("button[name=action]").show();
            } else {
                $("button[name=action]").hide();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX: ", error);
            console.log("Detalles: ", xhr.responseText);
        }
    });
}

</script>
</script>