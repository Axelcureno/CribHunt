<?php 
    // PSepara las imagenes y las inserta en un arreglo.
    $elements = explode('#', $cribArray[0]["imagenescrib"]);
    // Crea un nuevo arreglo para las imagenes.
    $args = array();

?>
<div id="site-wrap-detallecrib">
    <div class="canvas-cribhunt-detalle">
            <div class="frame mainframe">
                <div class="bit-2">
                    <div class="linea-prop-crib">
                        <div class="titulo-crib"><?php echo $cribArray[0]["titulocrib"]; ?></div>
                    </div>
                    <div class="imagen-principal-crib">
                        <ul class="bxslider">
                            <?php 
                                for( $i = 1; $i < count($elements); $i++) {
                                    $args[$elements[$i]] = $elements[$i];
                                    echo '<a class="iframe-img" rel="group" href="'. $args[$elements[$i]] . '" ><li><img src="'. $args[$elements[$i]] . '-/resize/x600/" /></li></a>';
                                }
                             ?>
                        </ul>
                        <div id="bx-pager" class="frame">
                            <?php 
                                for( $i = 1; $i < count($elements); $i++) {
                                    $args[$elements[$i]] = $elements[$i];
                                    echo '<a class="imagen-carrousel bit-4" data-slide-index="' . $i . '" href=""><img src="'. $args[$elements[$i]] . '-/preview/200x200/-/setfill/8d8578/-/stretch/fill/-/resize/240x160/" /></a>';
                                }
                             ?>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">Dirección</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["direccioncrib"]; ?></div>
                            </div>
                        </div>
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">Colonia</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["coloniacrib"]; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">Ciudad</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["ciudadcrib"]; ?></div>
                            </div>
                        </div>
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">Estado</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["estadocrib"]; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">Código Postal</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["cpcrib"]; ?></div>
                            </div>
                        </div>
                        <div class="bit-2">
                            <div class="linea-prop-crib">
                                <div class="titulo-prop-crib">País</div>
                                <div class="elemento-crib"><?php echo $cribArray[0]["paiscrib"]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bit-2">
                    <div class="frame">
                    <div class="bit-2">
                        <div class="linea-prop-crib">
                            <div class="titulo-prop-crib">Cuartos</div>
                            <div class="elemento-crib"><?php echo $cribArray[0]["cuartoscrib"]; ?></div>
                        </div>
                    </div>
                    <div class="bit-2">
                        <div class="linea-prop-crib">
                            <div class="titulo-prop-crib">Baños</div>
                            <div class="elemento-crib"><?php echo $cribArray[0]["banioscrib"]; ?></div>
                        </div>
                    </div>
                    </div>
                    <div class="frame">
                    <div class="bit-2">
                        <div class="linea-prop-crib">
                            <div class="titulo-prop-crib">Categoría</div>
                            <div class="elemento-crib"><?php echo ucfirst($cribArray[0]["categoriacrib"]); ?></div>
                        </div>
                    </div>
                    <div class="bit-2">
                        <div class="linea-prop-crib">
                            <div class="titulo-prop-crib">Precio</div>
                            <div class="elemento-crib">$<?php echo $cribArray[0]["preciocrib"]; ?>/Mes</div>
                        </div>
                    </div>
                    </div>
                    <div class="linea-prop-crib" >
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
                        <div class="elemento-crib">
                            <a class="inline-loquiero" href=".loquiero-forma"><button id="call-to-action" class="ripple">LO QUIERO</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<div style="display:none" class="loquiero-forma">
    <div class="titulo-subtitulo-loquiero">
        <h1>Ponte en contacto con el dueño</h1>
        <h2>Deja tus datos para que el dueño de este Crib pueda ponerse en contacto contigo lo más pronto posible. Si han transcurrido varios días y no has recibido respuesta recomendamos revisar la bandeja de correo no deseado.</h2>
    </div>
<div class="se-pre-con">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>
        <form id="forma-de-loquiero" action="" method="post" accept-charset="utf-8">
            <div class="frame">
                <input style="display:none;" type="text" name="titulo" value="<?php echo $cribArray[0]["titulocrib"]; ?>">
                <input style="display:none;" type="text" name="id" value="<?php echo $cribArray[0]["id"]; ?>">
                <input style="display:none;" type="text" name="idregistro" value="<?php echo $cribArray[0]["idusuarioqueregistracrib"]; ?>">
                <div class="bit-1">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="bit-1">
                    <input type="text" name="telefono" placeholder="Teléfono (Opcional)">
                </div>
                <div class="bit-1">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="bit-1">
                    <textarea type="text" name="mensaje" placeholder="Mensaje" required></textarea>
                </div>
                <div class="espacio-spinner" style="width: 100%; height: 100px; margin-top: 80px; margin-bottom: 70px; display:none;"></div>
                <div class="bit-1">
                    <button id="submit-loquiero-form" class="ripple">Enviar</button>
                </div>
            </div>
        </form>
    <div class="bit-1 resultado-loquiero"></div>
</div>
