<?


date_default_timezone_set("Europe/Budapest");

$honapok = array("", "január", "február", "március",
                     "április", "május", "június",
                     "július", "augusztus", "szeptember",
                     "október", "november", "december");

$napnevek = array("vasárnap", 
                  "hétfő", 
                  "kedd", 
                  "szerda", 
                  "csütörtök", 
                  "péntek", 
                  "szombat");

$honev = $honapok[date("n")];

$nap = $napnevek[date("w")];

print "Oldalbetöltés ideje: ".date("Y. ").$honev.date(" d. ")." ".$nap.date(" H:i:s");
?>
<hr>
<?

$szaznapmulva = time() +100*24*60*60;

$szulnap = mktime(0, 0, 0, 1, 4, 2005);

print(date("Y-m-d D H:i:s", $szulnap)."<br>");

$mp = time() - $szulnap;

print $mp/(60*60*24);

?>