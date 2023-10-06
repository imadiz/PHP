<?
$orszagok = array("Spanyolország", "Görögország", "Törökország", "Örményország");
    if(!isset($_SESSION['Taxi']))
    {    
        print("<style>
               input[type='radio']{
                   margin: 5px 5px;
               }
               input[type='submit']{
                   margin-top: 5px;
               }
               </style>
               <h4>Szavazás</h4>
               <form action='szavazas_ir.php' method='post' target='kisablak'>
                   <input type='radio' name='szavazas' value='1'>$orszagok[0]<br>
                   <input type='radio' name='szavazas' value='2'>$orszagok[1]<br>
                   <input type='radio' name='szavazas' value='3'>$orszagok[2]<br>
                   <input type='radio' name='szavazas' value='4'>$orszagok[3]<br>
                   <input type='submit' value='Szavazok'>
               </form>
               <iframe name='kisablak'></iframe>");
    }
    else{
        $fp = fopen("szavazasok.txt", "r");
        $allas = fread($fp, filesize("szavazasok.txt"));
        $db = explode(";", $allas);
        fclose($fp);
        print "Szavazás állása:<br><br>
               $orszagok[0] | ".$db[0]."<br>
               $orszagok[1] | ".$db[1]."<br>
               $orszagok[2] | ".$db[2]."<br>
               $orszagok[3] | ".$db[3]."<br>";
    }
?>