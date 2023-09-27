<?php 
    
    if(isset($_GET['rowcount'], $_GET["colcount"])){
        $colcount = $_REQUEST["colcount"];
        $rowcount = $_REQUEST["rowcount"];

        if($colcount > 150 | $rowcount > 150){//Ha a sor vagy oszlop nagyobb mint 150 
            $response = "Túl nagy megadott paraméter!";
            echo $response;
            return;
        }

        if($colcount < 1 | $rowcount < 1){//Ha a sor vagy oszlop kisebb mint 1
            $response = "Túl kicsi megadott paraméter!";
            echo $response;
            return;
        }

        $red = 0;//0 - 255
        $green = 0;//0 - 255
        $blue = 0;//0 - 255

        $current_color = "";

        $color_step = 255 / (($colcount * $rowcount) / 7);

        $steps = array(
            0=>false,
            1=>false,
            2=>false,
            3=>false,
            4=>false,
            5=>false,
            6=>false,
            7=>false,
        );

        create_tabla();
    }
    else{
        $response = "Nincs megadva a sor vagy az oszlopszám!";
        echo $response;
    }

    function advance_color(){
        
        
        global $steps;
        global $color_step;

        global $red, $green, $blue;
        //1. a teljes színátmenet kezdete 0, 0, 0
        if(one_color_step("R", 0, true) == true) return;//1 red->255 RGB(255, 0, 0)
        if(one_color_step("G", 1, true) == true) return;//2. green->255 RGB(255, 255, 0)
        if(one_color_step("R", 2, false) == true) return;//3. red->0 RGB(0, 255, 0)
        if(one_color_step("B", 3, true) == true) return;//4. blue->255 RGB(0, 255, 255)
        if(one_color_step("G", 4, false) == true) return;//5. green->0 RGB(0, 0, 255)
        if(one_color_step("R", 5, true) == true) return;//6. red->255 RGB(255, 0, 255)
        if(one_color_step("B", 6, false) == true) return;//7. blue->0 RGB(255, 0, 0)
        //8. a teljes színátmenet vége 255, 255, 255*/
    }

    function one_color_step(string $color, int $stepsindex, bool $isIncreasing){
        global $steps, $color_step;
        global $red, $green, $blue;

        if($isIncreasing){//növekedik az érték
            if($steps[$stepsindex] == false){//ha még nem történt meg a lépés
                switch($color){
                    case "R":
                        if($red+$color_step > 255){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $red+=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                    case "G":
                        if($green+$color_step > 255){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $green+=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                    case "B":
                        if($blue+$color_step > 255){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $blue+=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                }
            }
            else{
                return false;
            }
        }
        else{
            if($steps[$stepsindex] == false){
                switch($color){
                    case "R":
                        if($red-$color_step < 0){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $red-=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                    case "G":
                        if($green-$color_step < 0){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $green-=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                    case "B":
                        if($blue-$color_step < 0){//ha tovább menne 255-ön a lépés
                            $steps[$stepsindex] = true;//megtörtént a lépés
                            return false;//ne kilépjen az enclosing function-ből
                        }
                        else{ 
                            $blue-=$color_step;//szín megváltoztatása
                            return true;//lépjen ki az enclosing function-ből
                        }
                }
            }
            else{
                return false;
            }
        }
    }

    function create_tabla(){
        global $colcount, $rowcount;

        global $current_color;
        
        global $red, $green, $blue;

        global $steps;

        $steps = array(
            0=>false,
            1=>false,
            2=>false,
            3=>false,
            4=>false,
            5=>false,
            6=>false,
            7=>false,
        );

        $response = "<table id='tabla' cellspacing=0>\r\n";
        for($i = 0; $i < $rowcount; $i++){//sorokon végighaladás
            $response.= "<tr>";
            
            for($j = 0; $j < $colcount; $j++){//cellákon végighaladás

                $current_color = "";
                
                $current_color .= str_pad(dechex($red), 2, "0", STR_PAD_LEFT);
                $current_color .= str_pad(dechex($green), 2, "0", STR_PAD_LEFT);
                $current_color .= str_pad(dechex($blue), 2, "0", STR_PAD_LEFT);

                $response.= "<td><span style='background-color: #$current_color;
                                              display: block;
                                              width: 10px;
                                              height: 10px;'
                                       title='HEX = #$current_color\r\nRGB = $red, $green, $blue'></span></td>";//háttérszín beállítása, szín info kiírása
                advance_color();
            }
            
            $current_color = "";
            $response.= "</tr>\r\n";
        }
        $response.="</table>";
        echo $response;
    }
?>