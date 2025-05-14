<?php
include("menu_bs.php");
include_once("libreria/carteles.php");

$cats = Cartel::categorias();
$cats2 = Cartel::otras_categorias(); 
echo '
<div class="container-fluid">

    <div class="row">
        
        <!-- Primera Cartelera -->
        <div class="col-sm-6">
            <div id="capa_d">
                <h3>BIBLIOTECA T1</h3>
                <h4>Primera Cartelera</h4>
                <ul class="nav nav-pills nav-stacked">';

//  la primera cartelera
foreach ($cats as $cat) {
    echo '<li><a href="#"><span onclick="cargar(\'#capa_C\',\'mostrar_cartelera.php?b=' . $cat['categoria'] . '\')">' . $cat['categoria'] . '</span></a></li>';
}

echo '           
                </ul>
            </div>
        </div>
        
        <!-- Segunda Cartelera -->
        <div class="col-sm-6">
            <div id="capa_d_2">
                <h3>BIBLIOTECA T2</h3>
                <h4>Segunda Cartelera</h4>
                <ul class="nav nav-pills nav-stacked">';

//categorías de la segunda cartelera
foreach ($cats2 as $cat) {
    echo '<li><a href="#"><span onclick="cargar(\'#capa_C\',\'mostrar_cartelera.php?b=' . $cat['categoria'] . '\')">' . $cat['categoria'] . '</span></a></li>';
}

echo '           
                </ul>
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <!-- Aquí se mostrarán las carteleras seleccionadas -->
        <div class="col-sm-12">
            <div id="capa_C">  
                <!-- Aquí se cargará el contenido de la cartelera según la categoría seleccionada -->
            </div>
        </div>
    </div>

</div>';
?>
