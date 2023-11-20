<style>
    div#szamoltadatok{
        float: left;
        border: solid 1px #AAA;
    }
    table{
        float: left;
        margin-right: 25px;
    }
    td{
        padding: 5px;
    }
    tr{
        background-color: #CCC;
        text-align: center;
    }
    tr:first-child td{
        background-color: #999;
    }
</style>
<?
    $adb = mysqli_connect("localhost", "root", "password", "userlogin");

    $tabla = mysqli_query($adb, "SELECT * FROM user");

    print("<table>\n");
print("<tr>
    <td>uid</td>
    <td>unev</td>
    <td>umail</td>
    <td>upw</td>
    <td>uirszam</td>
    <td>udatum</td>
    <td>ustatusz</td>
    <td>login</td>
</tr>\n");
    while($sor = mysqli_fetch_array($tabla))
    {
        
    print("<tr>
        <td>$sor[uid].</td>
        <td>$sor[unev]</td>
        <td>$sor[umail]</td>
        <td>$sor[upw]</td>
        <td>$sor[uirszam]</td>
        <td>$sor[udatum]</td>
        <td>$sor[ustatusz]</td>
        <td>");
        $logintabla = mysqli_query($adb, "SELECT lbe FROM login WHERE luid LIKE $sor[uid]");
        while($loginsor = mysqli_fetch_array($logintabla))
        {
            print("$loginsor[lbe]<br>");
        } 
        print("</td>
        </tr>\n");
    }
    print("</table>\n");

    print("<div id='szamoltadatok'>\n");
    print("\t<h2>Extra adatok</h2>\n");
    print("</div>");
?>