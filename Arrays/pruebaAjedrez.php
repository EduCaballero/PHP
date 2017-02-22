<?php

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
   