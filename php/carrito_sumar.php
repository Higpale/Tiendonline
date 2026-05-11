<?php // 0,1,2,7,8,10 Artículos // los -><- es la parte que corresponde para evitar artículos repetidos
    require_once '../include/start.php'; // Activa la sesión	

    if(isset($_POST['sumocart']) && isset($_SESSION['usesion'])){ // Entra de pulsar el botón del carrito y existe la sesión
        $_SESSION['sumocart'] = $_POST['sumocart'];
        // ->
        $repe=11;
        
        if(isset($_SESSION['articulos'])){ // Por si ya está el artículo en el carrito, solo suma la cantidad
			for($j=0;$j<count($_SESSION['articulos']);$j++){
				if(isset($_SESSION['articulos'][$j])){
					for($k=0;$k<=10;$k++){
						if(isset($_POST['alcarro'.$k])){
							if($_SESSION['articulos'][$j]['narti']==$k){
								$_SESSION['articulos'][$j]['canti']++;
								$repe=$k;
							}
						}
					}
				}
			}
		}
        // <-
        for($i=0;$i<=10;$i++){ // Para agregar artículo al carrito
            if(isset($_POST['alcarro'.$i]) && $repe!=$i){ // -> && $repe!=$i <-
				$_SESSION['articulos'][] = [
					"narti" => $i,
					"canti" => 1, // -> "canti" => 1, <-
					"precio" => $_POST['precio'.$i],
					"marca" => $_POST['marca'.$i],
					"modelo" => $_POST['modelo'.$i],
					"peso" => $_POST['peso'.$i],
					"conexion" => $_POST['conexion'.$i],
					"bateria" => $_POST['bateria'.$i],
					"material" => $_POST['material'.$i],
					"botones" => $_POST['botones'.$i]
				];				
            }
        }
        header("location: ../index.php");
        exit();
    } else {
        header("location: ../index.php");
        exit();
    }
?>
