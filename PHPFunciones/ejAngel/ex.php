<?php

	// en PHP los valores numericos se consideran numeros reales 
	function digits($n) {
		if ($n>=1) {
			digits($n/10);	
			echo "$n<br>";
		}
	}

	function suma($a,$b) {
		$res = $a+$b;
		echo $res;
	}
	
	function multiploDeTres($numero) {
		if($numero%3==0) return true;
		return false;
	}
?>

<?php

	if (multiploDeTres(23456)) echo "Es multiple de 3<br>";
	else echo "No es multiple de 3<br>";
	
	digits(10);
	//suma(15,25);
?>