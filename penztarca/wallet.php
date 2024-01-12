<?

include("adbconn.php");
//$_REQUEST['r']-el és $_REQUEST['p']-el lehet hozzáférni az AJAX-al küldött adatokhoz.

$userdata = mysqli_fetch_array(mysqli_query($adb, "SELECT * FROM felhasznalo WHERE uid = '$_SESSION[id]'"));//Felhasználói adatok

switch($_REQUEST['r'])
{
    case "FirstLoad":
        $isFirstLogin = $userdata['Elsobelepes'];
        if($isFirstLogin)//Ha ez az első belépés
            echo "FirstLogin;null";
        else//Ha nem
            echo "Balance;$userdata[balance]";//Egyenleg küldése
    break;
    case "OpeningBalance":
        $input = $_REQUEST['p'];
        if ($input < 0)
            $input = 0;

        if ($input > 1000000)
            $input = 1000000;

        ModifyBalance($input);//Nyitóegyenleg beállítása

        mysqli_query($adb, "UPDATE felhasznalo SET Elsobelepes = 0 WHERE uid = '$_SESSION[id]'");//User belépett
        
        WriteLog("BalanceChange: Nyitóegyenleg", "$input", "$input");
        echo "Reload;null";
    break;
    case "Logout":
        WriteLog("Kijelentkezés", -1);
        echo "Logout;index.php";
    break;
    case "AddIncome":
        $input = $_REQUEST['p'];
        if ($input < 0)
            $input = 0;

        if ($input > 1000000)
            $input = 1000000;

        ModifyBalance($input);
        WriteLog("BalanceChange: Bevétel", $userdata['balance'], $input);
        echo "Balance;".GetBalance();
    break;
    case "AddExpenditure":
        $input = $_REQUEST['p'];
        if ($input < 0)
            $input = 0;

        if ($input > 1000000)
            $input = 1000000;

        ModifyBalance($input * -1);
        WriteLog("BalanceChange: Kiadás", $userdata['balance'], "-$input");
        echo "Balance;".GetBalance();
    break;
    case "GetChanges":
        $longquery = mysqli_query($adb, "SELECT TimeStamp, Text, BalanceChange FROM log 
                                         WHERE uid = '$_SESSION[id]' AND Text LIKE 'BalanceChange%'
                                         ORDER BY TimeStamp DESC");
                                        
        $CurrentRow = mysqli_fetch_array($longquery);
        $table = "<th>Időpont</th><th>Bevétel/Kiadás</th><th>Összeg</th>\n";
        while ($CurrentRow != null)//Amíg van sor
        {
            //Átalakítás HTML-be

            $table .= "<tr>\n";
            $table .= "<td>$CurrentRow[TimeStamp]</td><td>".trim(explode(':', $CurrentRow['Text'])[1])."</td><td>$CurrentRow[BalanceChange] Ft</td>\n";
            $table .= "</tr>\n";

            $CurrentRow = mysqli_fetch_array($longquery);//Következő sor
        }
        echo "ChangesTable;$table";
    break;
    default:
        echo "$_REQUEST[r];$_REQUEST[p]";
    break;
}

?>