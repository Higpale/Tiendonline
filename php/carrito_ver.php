<?php // Activa la sesión
    require_once '../include/start.php';
    // Solo mostrará la web de: sesión iniciada, que no esté vacio el carrito y que hayamos pulsado el botón del carrito en index
    if(!isset($_SESSION['usesion']) || !isset($_SESSION['sumocart']) || !isset($_POST['vercart'])) {
        header("location: ../index.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8"/>
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <script src="../js/script.js" type="text/javascript" defer></script>
        <title>Blousses Carrito</title>

        <style>
            main button {
                cursor: default;
            }
            h1 span, h2 span {
                color: #1b857e;
            }
            nav aside { 
                width: 59%;
            }
            h2 {
                color: #004484;
                letter-spacing: 4px;
            }
            .carts button:hover{
                background: #955144;
                transition-duration: .3s;
            }
        </style>

    </head>

    <body>

        <nav>

            <div class="header-section container">
                <img class="logo" src="../img/logoshop.png" alt="logo">
                <h1>Blou<s>s</s>ses <span>Carrito</span></h1>
                <aside>
                    <a href="#arriba">❇Inicio</a>
                    <a href="#articulos">❉Árticulos</a>
                    <a href="#total">❈Total</a>
                </aside>
                <div>
                    <a href="../index.php"><button><img class="cart" src="../img/home.png" alt="principal"></button></a>
                </div>
            </div>
            
            <div class="cajausu">
                    <form action="sesion_cerrar.php" method="POST">			
                        <input id="btndlg" type="submit" value="« Salir"/>
                    </form>
                    <div>¡Bienvenido al carrito '<?php echo $_SESSION['usesion']; ?>'!</div>
			</div> <!-- El botón de cerrar sesión -->

        </nav>
        
        <header id="arriba">

            <?php include_once '../include/ondas.php'; ?>

        </header>

        <main>

            <section class="principal2 products" id="articulos">

                <?php foreach($_SESSION['articulos'] as $articulo) { ?>

                <aside>

                    <figure class="carts"> <!-- 0,1,2,7,8,10 Artículos -->
                        <form id="form<?php echo $articulo['narti']; ?>A" action="carrito_restar.php" method="POST"></form>
                        <form id="form<?php echo $articulo['narti']; ?>B" action="carrito_restar.php" method="POST"></form>
                             <input form="form<?php echo $articulo['narti']; ?>A" name="nartic" type="hidden" value="<?php echo $articulo['narti']; ?>"/>
                             <button form="form<?php echo $articulo['narti']; ?>A" name="descarro0" type="submit"><span><?php echo $articulo['precio']; ?></span> €</button>
                             <input form="form<?php echo $articulo['narti']; ?>B" name="nartic" type="hidden" value="<?php echo $articulo['narti']; ?>"/>
                            <?php if ($articulo['canti']>1) { ?>
                             <button form="form<?php echo $articulo['narti']; ?>B" name="descarro1" type="submit">x<span><?php echo $articulo['canti']; ?></span></button>
                            <?php } ?> <!-- -> Información para la cantidad si es más de 1 <- -->                        
                    </figure>

                    <article>              

                        <input id="contador<?php echo $articulo['narti']; ?>" type="hidden" value="0"/>
                        <img id="articulo<?php echo $articulo['narti']; ?>" onclick="alternar('<?php echo $articulo['narti']; ?>',1)" src="../img/0/<?php echo $articulo['narti']; ?>/1.jpg" alt="Raton<?php echo $articulo['narti']; ?>"/>                    
																	       <!-- -> Alterna imagen, no de repetir articulo <- -->
                        <div class="marca<?php echo $articulo['narti']; ?>">
                            <h3><?php echo $articulo['marca']; ?><br/><?php echo $articulo['modelo']; ?></h3>
                            <p>
                                <b>Peso:</b> <?php echo $articulo['peso']; ?><br/>
                                <b>Conexión:</b> <?php echo $articulo['conexion']; ?><br/>
                                <b>Batería:</b> <?php echo $articulo['bateria']; ?><br/>
                                <b>Material:</b> <?php echo $articulo['material']; ?><br/>
                                <b>Botones:</b> <?php echo $articulo['botones']; ?><br/>           
                            </p>
                        </div>                    

                    </article>

                </aside>    

            <?php } ?>

            </section>

        </main>


        <footer>

            <div class="ondeo">  
            </div>
            
            <div class="pie" id="total">

                <a href="#arriba">
                    <img src="../img/isometrica.png" alt="salón isométrico" class="logome"/>
                </a>   

				<aside>
                    <h2><span>							
						<?php 
							$total=0;
							foreach($_SESSION['articulos'] as $articulo) { 
								$total+=$articulo['precio']*$articulo['canti']; // -> *$articulo['canti'] <- Precio por cantidad que se suma al total
							}
							echo $total;
						?>
					€</span> en Carrito 🛒</h2>
                </aside>
                
            </div>

            <?php include_once '../include/ola.php'; ?>
           
        </footer>

    </body>

</html>
