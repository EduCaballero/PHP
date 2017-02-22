<?php

	function calculadora($op,$a,$b) {
		switch ($op) {
			case "suma":
				echo "La suma de $a + $b es ".($a+$b)."<br>";
				break;
			case "resta":
				echo "La resta de $a - $b es ".($a-$b)."<br>";
				break;
			case "producto":
				echo "El producto de $a * $b es ".($a*$b)."<br>";
				break;
			case "division":
				echo "La division entre $a/$b es ".($a/$b)."<br>";
				break;
		}
	}

?>

<?php

	$a = rand(1,50);
	$b = rand(1,50);
	$op = "suma";
	calculadora($op,$a,$b);
	$op = "resta";
	calculadora($op,$a,$b);	
	$op = "producto";
	calculadora($op,$a,$b);
?>