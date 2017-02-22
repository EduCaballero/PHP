<?php

	function readArray($arr) {
		foreach($arr as $pos=>$valor) {
			if ($pos!=0) echo " ";
			echo "$valor";
		}
	}

	$arr = array(1, 2, 3, "responda","otra","vez");
	readarray($arr);

?>