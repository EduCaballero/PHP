<?php
//DOS espacios entre ejercicios para delimitarlo mejor y hacer más fácil su corrección
//ejercicio 1
for ($i = 0; $i < 10; $i++) {
    $array1[] = (rand(0, 100));
}

echo "----------------------------ejercicio------------------------ 2";
echo "<br>";

foreach ($array1 as $arrayActual) {
    echo $arrayActual . " ";
}
echo "<br>";
echo "<br>";

echo "----------------------------ejercicio------------------------ 3";
echo "<br>";

$suma = 0;
foreach ($array1 as $arrayActual) {
    $suma = $arrayActual + $suma;
}
echo "La suma es igual a " . $suma;

echo "<br>";

$media = $suma / count($array1);

echo "La media es de " . $media;

echo "<br>";
echo "<br>";

echo "----------------------------ejercicio------------------------ 4";
echo "<br>";

$mayor = 0;
$pos1 = [0];

foreach ($array1 as $pos=>$arrayActual) { // $pos=>$arrayActual -> lo primero siempre es la clave (posición), y lo segundo el valor
    if ($arrayActual > $mayor) {
        $mayor=$arrayActual;
        $pos1=$pos;
    }
}
echo "El máximo es ".$mayor;
echo "<br>";
echo "La posición del máximo es ".$pos1;
echo "<br>";
echo "<br>";

//foreach ($array1 as $arrayActual) {
//    if ($arrayActual > $mayor) {
//        $mayor=$arrayActual;
//        $pos1=
//    }
//}
//echo "El máximo es ".$mayor;
//echo "<br>";

echo "----------------------------ejercicio------------------------ 5";
echo "<br>";

// $min = $mayor; también se podría hacer así, ya que hemos calculado el mayor anteriormente
$min = $array1[0];
$pos2=0;

foreach ($array1 as $pos=>$arrayActual) {
    if ($arrayActual < $min) {
        $min=$arrayActual;
        $pos2=$pos;
    }
}
echo "El mínimo es ".$min;
echo "<br>";
echo "La posición del mínimo es ".$pos2;
echo "<br>";
echo "<br>";

echo "----------------------------ejercicio------------------------ 6";
echo "<br>";

$habitantes["Nombre"] = "Sara";
$habitantes["Apellidos"] = "Martínez";
$habitantes["Edad"] = "23";
$habitantes["Ciudad"] = "Barcelona";

echo $habitantes["Nombre"]." ".$habitantes["Apellidos"]." ".$habitantes["Edad"]." ".$habitantes["Ciudad"]; //también podríamos usar extract
echo "<br>";

$habitantes["Edad"] = "24";
extract($habitantes);
echo "$Nombre $Apellidos $Edad $Ciudad<br>";

unset ($habitantes["Ciudad"]);
/*extract($habitantes);
echo "$Nombre $Apellidos $Edad $Ciudad<br>";
echo "<br>";
 *  Preguntar por qué con esto sigue apareciendo Ciudad al ser llamado
 */

foreach ($habitantes as $habitantesActual) {
    echo $habitantesActual." ";
}
echo "<br>";
echo "<br>";

echo "----------------------------ejercicio------------------------ 7";
echo "<br>";

 for ($x=0;$x<8;$x++)
    {
        for ($y=0;$y<8;$y++)
        {
            //peones
            if ($x==1 || $x==6)
            {
             echo"p ";
            }
            //torres
            else if (($x==0 && $y==0) ||
                    ($x==7 && $y==0) ||
                    ($x==0 && $y==7) ||
                    ($x==7 && $y==7) 
                    )
            {
             echo"t ";
            }
            //caballos
            else if (($x==0 && $y==1) ||
                    ($x==7 && $y==1) ||
                    ($x==0 && $y==6) ||
                    ($x==7 && $y==6) 
                    )
            {
             echo"c ";
            }
            //alfiles
            else if (($x==0 && $y==2) ||
                    ($x==7 && $y==2) ||
                    ($x==0 && $y==5) ||
                    ($x==7 && $y==5) 
                    )
            {
             echo"a ";
            }
            //reina
            else if (($x==0 && $y==3) ||
                    ($x==7 && $y==3) 
                    )
            {
             echo"R ";
            }
            //rey
            else if (($x==0 && $y==4) ||
                    ($x==7 && $y==4) 
                    )
            {
             echo"r ";
            }
            else
            {
                echo". ";
            }
        }
        echo "<br>";
    }

echo "----------------------------ejercicio------------------------ 7.2";
echo "<br>";
echo "Como te comenté en clase, no lo veía con arrays normales, por eso lo hice con bucles anidados, pero en clase discutiendo con los compañeros lo acabé entendiendo";
echo "<br>";


$tablerofila0y7 = array("t", "c", "a", "r", "R", "a", "c", "t");
for ($x=0;$x<8;$x++) {
    if ($x==0 or $x==7) $tablero[$x] = $tablerofila0y7;
    else if ($x==1 or $x==6) {
        for ($y=0;$y<8;$y++)
        $tablero[$x][$y] = "p";
    }
    else {
        for ($y=0;$y<8;$y++)
        $tablero[$x][$y] = ".";
    }
}

foreach ($tablero as $x=>$fila) {
    foreach ($fila as $y=>$tabla) {
        if ($y!=0) echo " ";
        echo "$tabla";
    }
    echo "<br>";
}

echo "----------------------------ejercicio------------------------ 8";
echo "<br>";

//$estudiantes = array("Isabel" => 5, "Mireia" => 8, "Juan" => 7, "Pepe" => 4, "Miguel" => 6);

/*print_r($estudiantes);
foreach ($estudiantes as $estudiantesActual) {
    echo $estudiantesActual." ";
}
 * 
 */

$estudiantes = array (
    "Isabel" => array(5),
    "Mireia" => array(8),
    "Juan" => array(7),
    "Pepe" => array(4),
    "Miguel" => array(6),    
   );

   foreach ($estudiantes as $nnombre => $nnotas) {
       echo $nnombre.": "; //nombre alumno
       foreach($nnotas as $nnota) {
           echo $nnota;
       }
       echo "<br>";
    }
    
$notamayor = 0;
$posnotamayor = [0];

foreach ($estudiantes as $nnombre => $nnotas) {
    if ($nnotas > $notamayor) {
        $notamayor=$nnotas;
        $posnotamayor=$nnombre;        
    }
}

echo "La nota maxima es de ".$posnotamayor;
echo "<br>";

$notamenor = [11];
$posnotamenor = [0];

foreach ($estudiantes as $nnombre => $nnotas) { //esto se podría acortar haciéndolo dentro del foreach anterior
    if ($nnotas < $notamenor) {
        $notamenor=$nnotas;
        $posnotamenor=$nnombre;
    }
}
echo "La nota minima es de ".$posnotamenor;
echo "<br>";

$estudiantes["Miguel"] = [10]; //cambio valor multidimensional

 /*foreach ($estudiantes as $nnombre => $nnotas) {
       echo $nnombre.": "; //nombre alumno
       foreach($nnotas as $nnota) {
           echo $nnota;
       }
       echo "<br>";
    }
esto para comprobar que funciona el cambio*/

foreach ($estudiantes as $nnombre => $nnotas) {
    if ($nnotas > $notamayor) {
        $notamayor=$nnotas;
        $posnotamayor=$nnombre;        
    }
}

echo "La nota maxima rectificada es de ".$posnotamayor;
echo "<br>";






?>