<?php 
    // Put each element into an array.
    $elements = explode('#', $cribArray[0]["imagenescrib"]);

    // Create a new empty array.
    $args = array();
?>
<div class="se-pre-con">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>
<div id="site-wrap-detallecrib">
    <div class="canvas-cribhunt-detalle">
            <div class="frame">
                <div class="bit-2">
                    <div class="linea-prop-crib">
                        <div class="titulo-crib"><?php echo $cribArray[0]["titulocrib"]; ?></div>
                    </div>
                    <div class="imagen-principal-crib">
                        <ul class="bxslider">
                            <?php 
                                for( $i = 0; $i < count($elements); $i++) {
                                    $args[$elements[$i]] = $elements[$i];
                                    echo '<a class="inline" data-fancybox-type="iframe" rel="group" href="'. $args[$elements[$i]] . '" ><li><img src="'. $args[$elements[$i]] . '" /></li></a>';
                                }
                             ?>
                        </ul>
                        <div id="bx-pager" class="frame">
                            <?php 
                                for( $i = 0; $i < count($elements); $i++) {
                                    $args[$elements[$i]] = $elements[$i];
                                    echo '<a class="imagen-carrousel bit-4" data-slide-index="' . $i . '" href=""><img src="'. $args[$elements[$i]] . '" /></a>';
                                }
                             ?>
                        </div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Dirección</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["direccioncrib"]; ?></div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Colonia</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["coloniacrib"]; ?></div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Ciudad</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["ciudadcrib"]; ?></div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Código Postal</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["cpcrib"]; ?></div>
                    </div>
                </div>
                <div class="bit-2">
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Precio</div>
                        <div class="elemento-crib">$<?php echo $cribArray[0]["preciocrib"]; ?>MXN / Mes</div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Categoría</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["categoriacrib"]; ?></div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Características</div>
                        <div class="elemento-crib">
                            <?php echo $cribArray[0]["caracteristicascrib"]; ?>
                        </div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Requisitos</div>
                        <div class="elemento-crib">
                            <?php echo $cribArray[0]["requisitoscrib"]; ?>
                        </div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Universidades aledañas</div>
                        <div class="elemento-crib">
                            <?php echo $cribArray[0]["universidadescrib"]; ?>
                        </div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">Estado</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["estadocrib"]; ?></div>
                    </div>
                    <div class="linea-prop-crib">
                        <div class="titulo-prop-crib">País</div>
                        <div class="elemento-crib"><?php echo $cribArray[0]["paiscrib"]; ?></div>
                    </div>
                </div>
            </div>
    </div>
</div>