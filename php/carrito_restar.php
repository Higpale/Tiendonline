<html>
	<head></head>
	<body> <!-- Formulario automaticamente enviado por un script para que acepte el ver -->
		<form id="aver" action="carrito_ver.php" method="POST"> 
			<input type="hidden" name="vercart" value="autoenvio"/>
		</form>

<?php // 0,1,2,7,8,10 Artículos
    require_once '../include/start.php'; // Activa la sesión
    
    if(isset($_POST['descarro1']) && isset($_SESSION['usesion']) && isset($_SESSION['articulos'])){ // Entra de pulsar el botón de la cantidad, existe el array de articulos y existe la sesión
		for($i=0;$i<count($_SESSION['articulos']);$i++){
			if($_SESSION['articulos'][$i]['narti']==$_POST['nartic']){
				$_SESSION['articulos'][$i]['canti']--;
			}
		}
		?> <script> document.getElementById('aver').submit(); </script> <?php
		exit();
    } else if(isset($_POST['descarro0']) && isset($_SESSION['usesion']) && isset($_SESSION['articulos'])){ // Entra de pulsar el botón del precio, existe el array de articulos y existe la sesión
        for($i=0;$i<count($_SESSION['articulos']);$i++){
			if($_SESSION['articulos'][$i]['narti']==$_POST['nartic']){
				unset($_SESSION['articulos'][$i]); // Borra la posición, pero mantiene el hueco en los índices
				$_SESSION['articulos']=array_values($_SESSION['articulos']); // Reindexa el array numéricamente desde 0, eliminando los huecos
				if(empty($_SESSION['articulos'])){ // De estar vacio el array articulos, lo borra, borrando tambien el indicador de que en su momento sumamos y volvemos a la web principal
					unset($_SESSION['articulos']);
					unset($_SESSION['sumocart']);
					header("location: ../index.php");
					exit();
				}
			}
		}
		?> <script> document.getElementById('aver').submit(); </script> <?php
		exit();
    } else {
		header("location: ../index.php");
		exit();
	}
?>

	</body>
</html>