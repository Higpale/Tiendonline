<!DOCTYPE html>
<html lang="es">   
    
    <?php require_once 'include/start.php'; // Activa la sesión ?>

    <head>
        <meta charset="UTF-8"/>
	    <link rel="icon" type="image/png" href="img/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script src="js/script.js" type="text/javascript" defer></script>     
        <title>Blousses</title>

        <style>
        
        <?php if(!isset($_SESSION['usesion'])) { ?>
            .carts {
                margin-bottom: 20px;
            }
        <?php } ?>

        <?php if(isset($_SESSION['sumocart'])) { ?>
            nav button {
                border-top: 5px dashed #004484; /* #1b857e */
                padding-top: 2px;
            }
        <?php } ?>

        </style>

    </head>

    <body id="inicio">

        <nav>

            <div class="header-section container">
                <img class="logo" src="img/logoshop.png" alt="logo">
                <h1>Blou<s>s</s>ses</h1>
                <aside>
                    <a href="#inicio">❇Inicio</a>
                    <a href="#articulos">❉Árticulos</a>
                    <a href="#redes">❊Redes</a>
                    <?php if(!isset($_SESSION['usesion'])) { ?>
                        <a href="#login">※Login</a>
                    <?php } ?>
                </aside>
                <div>
                    <?php if(isset($_SESSION['usesion'])) { ?>
                        <form action="php/carrito_ver.php" method="POST">	
                            <button name="vercart" type="submit"><img class="cart" src="img/cart.png" alt="carrito"></button>
                        </form>	
                    <?php } ?>
                </div>
            </div>
            <!-- El visionado del carrito y el botón de cerrar sesión solo de existir sesión -->
            <div class="cajausu">
                <?php if(isset($_SESSION['usesion'])) { ?>
                    <form action="php/sesion_cerrar.php" method="POST">			
                        <input name="salirlg" type="submit" value="« Salir"/>
                    </form>
                    <div>¡Bienvenido '<?php echo $_SESSION['usesion']; ?>'!</div>
                <?php } ?>
			</div>

        </nav>
    
        <header id="arriba">

            <section>

                <div class="deslizar">

					<h2 class="desliza s1">Ratones del<br/>mar para<br/>su hogar</h2>
                    <h2 class="desliza s2">Tonos<br/>azulados y<br/>agradables</h2>
                    <h2 class="desliza s3">Diseños<br/>y colores<br/>pastel</h2>

                </div>
                
            </section>

            <?php include_once 'include/ondas.php'; ?>

        </header>
            

        <main>

            <section class="principal2 products" id="articulos">

                <aside> <!-- Cada artículo tiene un formulario propio -->

                    <figure class="carts">  <!-- 0 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?> <!-- El botón de compra y sus datos a enviar solo de existir sesión -->
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio0" type="hidden" value="20"/>
                                <input name="marca0" type="hidden" value="EliteKeys"/>
                                <input name="modelo0" type="hidden" value="EK-LT50"/>
                                <input name="peso0" type="hidden" value="50 g"/>
                                <input name="conexion0" type="hidden" value="Bluetooth 5.2"/>
                                <input name="bateria0" type="hidden" value="9 meses"/>
                                <input name="material0" type="hidden" value="Resina"/>
                                <input name="botones0" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro0" type="submit" class="btn-add-cart"><span>20</span> € 🛒</button>
                            </form>
                        <?php } ?>
                    </figure>

                    <article>              

                        <input id="contador0" type="hidden" value="0"/>
                        <img id="articulo0" onclick="alternar('0',0)" src="img/0/0/1.jpg" alt="Raton0"/>                    

                        <div class="marca0">
                            <h3>EliteKeys<br/>EK-LT50</h3>
                            <p>
                                <b>Peso:</b> 50 g<br/>
                                <b>Conexión:</b> Bluetooth 5.2<br/>
                                <b>Batería:</b> 9 meses<br/>
                                <b>Material:</b> Resina<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>                
                            </p>
                        </div>                    

                    </article>

                </aside>
                
                <aside>

                    <figure class="carts"> <!-- 1 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?>
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio1" type="hidden" value="19"/>
                                <input name="marca1" type="hidden" value="FlexiKeys"/>
                                <input name="modelo1" type="hidden" value="FK-Silent"/>
                                <input name="peso1" type="hidden" value="40 g"/>
                                <input name="conexion1" type="hidden" value="Bluetooth 4.0"/>
                                <input name="bateria1" type="hidden" value="5 meses"/>
                                <input name="material1" type="hidden" value="Resina"/>
                                <input name="botones1" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro1" type="submit" class="btn-add-cart"><span>19</span> € 🛒</button>
                            </form>
                        <?php } ?>
                    </figure>

                    <article>
                        
                        <input id="contador1" type="hidden" value="0"/>
                        <img id="articulo1" onclick="alternar('1',0)" src="img/0/1/1.jpg" alt="Raton1"/>                    

                        <div class="marca1">
                            <h3>FlexiKeys<br/>FK-Silent</h3>
                            <p>
                                <b>Peso:</b> 40 g<br/>
                                <b>Conexión:</b> Bluetooth 4.0<br/>
                                <b>Batería:</b> 5 meses<br/>
                                <b>Material:</b> Resina<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>
                            </p>
                        </div>                    

                    </article>

                </aside>

                <aside>

                    <figure class="carts">  <!-- 2 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?>
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio2" type="hidden" value="20"/>
                                <input name="marca2" type="hidden" value="Hyperclick"/>
                                <input name="modelo2" type="hidden" value="HCK-16"/>
                                <input name="peso2" type="hidden" value="70 g"/>
                                <input name="conexion2" type="hidden" value="Bluetooth 5.1"/>
                                <input name="bateria2" type="hidden" value="7 meses"/>
                                <input name="material2" type="hidden" value="Resina"/>
                                <input name="botones2" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro2" type="submit" class="btn-add-cart"><span>20</span> € 🛒</button>                  
                            </form>
                        <?php } ?> 
                    </figure>

                    <article>
                        
                        <input id="contador2" type="hidden" value="0"/>
                        <img id="articulo2" onclick="alternar('2',0)" src="img/0/2/1.jpg" alt="Raton2"/>
                        
                        <div class="marca2">
                            <h3>Hyperclick<br/>HCK-16</h3>
                            <p>
                                <b>Peso:</b> 70 g<br/>
                                <b>Conexión:</b> Bluetooth 5.1<br/>
                                <b>Batería:</b> 7 meses<br/>
                                <b>Material:</b> Resina<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>                                
                            </p>
                        </div>                  

                    </article>

                </aside>

                <aside>

                    <figure class="carts"> <!-- 7 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?>
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio7" type="hidden" value="18"/>
                                <input name="marca7" type="hidden" value="StarType"/>
                                <input name="modelo7" type="hidden" value="ST-Max"/>
                                <input name="peso7" type="hidden" value="30 g"/>
                                <input name="conexion7" type="hidden" value="Bluetooth 5.0"/>
                                <input name="bateria7" type="hidden" value="11 meses"/>
                                <input name="material7" type="hidden" value="Plástico"/>
                                <input name="botones7" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro7" type="submit" class="btn-add-cart"><span>18</span> € 🛒</button>
                            </form>
                        <?php } ?>
                    </figure>

                    <article>
                        
                        <input id="contador7" type="hidden" value="0"/>
                        <img id="articulo7" onclick="alternar('7',0)" src="img/0/7/1.jpg" alt="Raton7"/>
                        
                        <div class="marca7">
                            <h3>StarType<br/>ST-Max</h3>
                            <p>
                                <b>Peso:</b> 30 g<br/>
                                <b>Conexión:</b> Bluetooth 5.0<br/>
                                <b>Batería:</b> 11 meses<br/>
                                <b>Material:</b> Plástico<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>                     
                            </p>
                        </div>                    

                    </article>

                </aside>

                <aside>

                    <figure class="carts"> <!-- 8 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?>
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio8" type="hidden" value="17"/>
                                <input name="marca8" type="hidden" value="CompEase"/>
                                <input name="modelo8" type="hidden" value="CE-R10"/>
                                <input name="peso8" type="hidden" value="46 g"/>
                                <input name="conexion8" type="hidden" value="Bluetooth 4.2"/>
                                <input name="bateria8" type="hidden" value="8 meses"/>
                                <input name="material8" type="hidden" value="Resina"/>
                                <input name="botones8" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro8" type="submit" class="btn-add-cart"><span>17</span> € 🛒</button>
                            </form>
                        <?php } ?>
                    </figure>

                    <article>

                        <input id="contador8" type="hidden" value="0"/>
                        <img id="articulo8" onclick="alternar('8',0)" src="img/0/8/1.jpg" alt="Raton8"/>                    

                        <div class="marca8">
                            <h3>CompEase<br/>CE-R10</h3>
                            <p>
                                <b>Peso:</b> 46 g<br/>
                                <b>Conexión:</b> Bluetooth 4.2<br/>
                                <b>Batería:</b> 8 meses<br/>
                                <b>Material:</b> Resina<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>                           
                            </p>
                        </div>                    

                    </article>

                </aside>

                <aside>

                    <figure class="carts"> <!-- 10 Artículo -->
                        <?php if(isset($_SESSION['usesion'])) { ?>
                            <form action="php/carrito_sumar.php" method="POST">
                                <input name="precio10" type="hidden" value="22"/>
                                <input name="marca10" type="hidden" value="ZetaGear"/>
                                <input name="modelo10" type="hidden" value="ZG-100"/>
                                <input name="peso10" type="hidden" value="40 g"/>
                                <input name="conexion10" type="hidden" value="Bluetooth 5.0"/>
                                <input name="bateria10" type="hidden" value="6 meses"/>
                                <input name="material10" type="hidden" value="Plástico"/>
                                <input name="botones10" type="hidden" value="2 + 1 rueda"/>
                                <input name="sumocart" type="hidden" value="sumocart"/>
                                <button name="alcarro10" type="submit" class="btn-add-cart"><span>22</span> € 🛒</button>
                            </form>
                        <?php } ?>
                    </figure>
                    
                    <article>

                        <input id="contador10" type="hidden" value="0"/>
                        <img id="articulo10" onclick="alternar('10',0)" src="img/0/10/1.jpg" alt="Raton10"/>                    

                        <div class="marca10">
                            <h3>ZetaGear<br/>ZG-100</h3>
                            <p>
                                <b>Peso:</b> 40 g<br/>
                                <b>Conexión:</b> Bluetooth 5.0<br/>
                                <b>Batería:</b> 6 meses<br/>
                                <b>Material:</b> Plástico<br/>
                                <b>Botones:</b> 2 + 1 rueda<br/>                          
                            </p>
                        </div>                    

                    </article>

                </aside>

            </section>

        </main>


        <footer>

            <div class="ondeo">  
            </div>
            
            <div class="pie" id="redes">

                <section>
                    <a href="#arriba"><img src="img/facebook.png" alt="imagen"/></a>
                    <a href="#arriba"><img src="img/twitter.png" alt="imagen"/></a>
                    <a href="#arriba"><img src="img/instagram.png" alt="imagen"/></a>
                    <a href="#arriba"><img src="img/rss.png" alt="imagen"/></a>
                </section>

                <a href="#arriba">
                    <img src="img/isometrica.png" alt="salón isométrico" class="logome"/>
                </a>   
                
                <?php if(!isset($_SESSION['usesion'])) { ?> <!-- Login solo de no existir sesión -->

				<aside id="login">
                    
                    <h3>Login</h3>

                    <form action="php/sesion_abrir.php" method="POST">
                        <input name="usuario" type="text" placeholder="|Usuario|" maxlength="20" value="" required/><br><br>
                        <input name="contra" type="password" placeholder="|Contraseña|" maxlength="20" value="" required/><br><br> 
                        <input name="entrarlg" type="submit" value="Entrar »"/>           
                    </form>

                </aside>  
                
                <?php } ?>
                
            </div>

            <?php include_once 'include/ola.php'; ?>
           
        </footer>

    </body>

</html>