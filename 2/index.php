<?php
$szam = 1;
$max = 100;
print("<table style='border: solid 2px black; margin: auto;'>\r\n<tr>");
while($szam<=$max){
    print("<td>$szam</td>");
    if($szam%10==0 && $szam <$max) print("</tr>\r\n<tr>");
    $szam++;
}
print("</tr>\r\n</table><hr>\r\n\r\n");

$sor = 1;
$oszlop = 1;

function create_table(int $sor, int $oszlop){
    print("<table style='border: solid 2px black; margin: auto;'>\r\n<tr>");

    for($i=1; $i<=$sor; $i++){
        print("<tr>");
        for($j=1; $j<=$oszlop; $j++){
            print("<td title='$i * $j'>".$i*$j."</td>");
        }
    print("</tr>");
    }
    print("</tr>\r\n</table><hr>\r\n\r\n");
}

if(isset($_GET['sor']) && isset($_GET['oszlop'])){

    if(($_GET['sor'] > 0 & $_GET['sor'] < 25) &
       ($_GET['oszlop'] > 0 & $_GET['oszlop'] < 25)){
        $sor = $_GET['sor'];
        $oszlop = $_GET['oszlop'];

        create_table($sor, $oszlop);
       }
       else{
        $sor=10;
        $oszlop=10;

        create_table($sor, $oszlop);
       }
}
else{
    print("Add meg mind a két paramétert!");
}
?>