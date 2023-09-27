<h1>Első program</h1>

<?php

if(isset($_GET['a']) && isset($_GET['b'])){
       $a = $_GET['a'];
       $b = $_GET['b'];
       if($_GET['b']!=0){
              print("$a + $b = ".($a+$b)."<br>
                     $a - $b = ".($a-$b)."<br>
                     $a * $b = ".($a*$b)."<br>
                     $a / $b = ".($a/$b)."<br><hr>");
       }
}
else{
       $a = rand(2, 99);
       $b = rand(2, 99);
       print("Adj meg paramétereket, pl. így:
              
              <blockquote>
                     <a href='?a=$a&b=$b'>?a=$a&b=$b</a>
              </blockquote>");
}
?>