<?php

	function dia($n) {
		switch ($n) {
			case 1: $dia="Lunes"; break;
			case 2:	$dia="Martes"; break;
			case 3:	$dia="Miercoles"; break;
			case 4:	$dia="Jueves"; break;
			case 5:	$dia="Viernes"; break;
			case 6:	$dia="Sabado"; break;
			case 7:	$dia="Domingo"; break;
			default:
				echo "El dia no existe <br>";
		}
		if (isset($dia)) 
			echo "El dia $n es $dia <br>";
	}

?>

<?php

	$n = rand(1,10);
	dia($n);

?>