<div class="menu_incidencies">
    <div class="menu_incidencies_legend">
        <h2>Incidencies</h2>
    </div>
    <!-- <div class="select-container">
        <select name="filtre_estat" id="filtre_estat" onchange="filtrar()">
            <option value="" selected>Filtrar per estat</option>
            <option value="">Totes</option>
            <option value="pendent">Pendents</option>
            <option value="enproces">En Procés</option>
            <option value="resolta">Resolta</option>
        </select>
    </div>
    <div>
        <button type="button" class="add_incidencia" id="afegir_incidencia">
            <span class="add_incidencia_button__text">Afegir</span>
            <span class="add_incidencia_button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
        </button>
    </div> -->
</div>
<?php include '../components/incidencies.php'; ?>
<?php include '../components/afegirincidencies.php'; ?>
<?php include '../components/veureincidencia.php'; ?>

<script>
    function filtrar() {
        var estat = document.getElementById('filtre_estat').value;
        if (estat != '') {
            window.location.href = window.location.pathname + '?estat=' + estat;
        } else {
            window.location.href = window.location.pathname;
        }
    }
</script>