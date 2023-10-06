<?

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <title>
    <?
        isset($_GET['p']) ? $p = $_GET['p']: $p = "";
        switch($p){
            case "":
                print("Egyszer használatos kuponkód az egyik menüpontban!");
                break;
            case "rolunk":
                print("");
                break;
            case "termekek":
                print("Böngéssz termékeink között!");
                break;
            case "karrier":
                print("Kezd nálunk a karriered!");
                break;
            case "forum":
                print("Kérdezz egy aktív közösségtől!");
                break;
            case "kapcs":
                print("Vedd fel a kapcsolatot az ügyfélszolgálatunkkal!");
                break;
            default:
                print("404 - Nincs iyen oldal");
                break;
        }
    ?>
    </title>
</head>
<body>
    <div id="menu">
        [<a href="./">Kezdőoldal</a> ||
        <a href="./?p=rolunk">Rólunk</a> |
        <a href="./?p=termekek">Termékeink</a> |
        <a href="./?p=karrier">Karrier</a> |
        <a href="./?p=forum">Fórum</a> |
        <a href="./?p=kapcs">Kapcsolat</a>]
    </div>
    <div id='tartalom'>
    <?
    isset($_GET['p']) ? $p = $_GET['p']: $p = null;
        switch($p){
            case "":
                print("<h1>Akciók, aktualitások</h1>");
                break;
            case "rolunk":
                print("<h1>Rólunk</h1>");            
                print("Az oldalt eddig $n látogató látta.<br>");
                print("SessionID: ".session_id());
                break;
            case "termekek":
                print("<h1>Termékeink</h1>");
                break;
            case "karrier":
                print("<h1>Karrier</h1>");
                include("szavazas.php");
                break;
            case "forum":
                print("<h1>Fórum</h1>");
                break;
            case "kapcs":
                include("elerhetoseg.");
                break;
            default:
                print("<h1>404</h1>");
                break;
        }
        $fajlnev = date("Ymd").".txt";

                if(!file_exists($fajlnev))//Ha nincs ilyen fájl
                {
                    $fp = fopen($fajlnev, "w");//Fájl létrehozás
                    //Az fopen method egy resource-t ad vissza ami egy memóriában eltárolt(logikai) fájl.
                    fwrite($fp, "0");
                    fclose($fp);
                }
            
                $fp = fopen($fajlnev, "r");
                $n = fread($fp,filesize($fajlnev));
                fclose($fp);
            
                if(!isset($_SESSION['eg']))
                {
                    $n++;
                
                    $fp = fopen($fajlnev, "w");//Felülírás
                    fwrite($fp, $n);
                    fclose($fp);
                
                    $_SESSION['eg'] = "kábel";
                }
    ?>
    </div>
</body>
</html>