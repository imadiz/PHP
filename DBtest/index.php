<style>
    div
    {
        background-color: #DDD;
        border: solid 2px #888;
    }
    h1,h2
    {
        text-align: center;
    }
    div#lista
    {
        width: 260px;
        float: left;
    }
    div#reszletek
    {
        margin-left: 300px;
        padding: 8px 24px;
    }
    div#reszletek span
    {
        display: inline-block;
        width: 300px;
        text-align: right;
        color: #666;
        padding-right: 16px;
    }
    div#lista a
    {
        display: block;
        margin: 4px;
        width: 250px;
        text-align: justify;
        color: #666;
        text-decoration: none;
    }
    a:hover
    {
        color: #000;
    }
</style>

<?
        $adb = mysqli_connect("localhost", "root", "password", "foldrajz");

        $kontinensek = ["Európa", "Amerika", "Ázsia", "Óceánia", "Afrika", "Antarktisz"];

        $tabla = mysqli_query($adb, "SELECT *
                                     FROM orszagok");

        print("<div id='lista'>");

        while ($sor = mysqli_fetch_array($tabla))
        {
            print("<a href='./?orsz=$sor[id]'>$sor[orszag]</a>");
        }

        print("</div>");
        print("<div id='reszletek'>");

        if(!isset($_GET['orsz']))
        {
            print("<h2>Válassz országot a bal oldali listából!");
        }
        else
        {
            $orszag = mysqli_fetch_array(mysqli_query($adb, "SELECT *, nepesseg/terulet*1000 AS nepsuruseg
                                                             FROM orszagok
                                                             WHERE id='$_GET[orsz]'"));
            print("<h1>$orszag[orszag]</h1>
                   <h2>$orszag[fovaros]</h2>
                   <span>Földrajzi elhelyezkedés</span> $orszag[foldr_hely]<br>
                   <span>Terület</span> $orszag[terulet] km<sup>2</sup><br>
                   <span>Népesség</span> $orszag[nepesseg] ezer fő<br>
                   <span>Népsűrűség (SQL)</span> $orszag[nepsuruseg] fő/km<sup>2</sup><br>
                   <span>Népsűrűség (PHP)</span> ".$orszag['nepesseg'] * 1000/$orszag['terulet']."fő/km<sup>2</sup><br>
                   <span>Térkép</span><a href='https://google.com/maps/place/$orszag[orszag]' target=_blank>[Google Maps]</a>");
        }

        print("</div>");

        mysqli_close($adb);
?>