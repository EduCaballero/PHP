<?php


 $num1 = $_GET['num'];
 $resultado = '';
 
 // Create a lookup array that contains all of the Roman numerals.
 $array = array(
 'D' => 500,
 'CD' => 400,
 'C' => 100,
 'XC' => 90,
 'L' => 50,
 'XL' => 40,
 'X' => 10,
 'IX' => 9,
 'V' => 5,
 'IV' => 4,
 'I' => 1);
 
 foreach($array as $roman => $value){
  // Determine the number of matches
  $matches = intval($num1/$value);
 
  // Add the same number of characters to the string
  $resultado .= str_repeat($roman,$matches);
 
  // Set the integer to be the remainder of the integer and the value
  $num1 = $num1 % $value;
  
 }
 
 echo $resultado;