<?
    session_start();
    $adb = mysqli_connect("localhost", "root", "password", "penztarca");

    function randomstring($h=10)
    {
		$s = "";
        $source = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i=0; $i <= $h; $i++)
        {
            $randchar = $source[rand(0, strlen($source) - 1)];
            $s .= $randchar;
        }
        return $s;
    };
    
    function WriteLog(string $text, int $balance, int $change = 0)
    {
        global $adb;
        if ($balance == -1)
        {
            mysqli_query($adb, "INSERT INTO log(TimeStamp, Text, uid, Balance)
                            VALUES (NOW(), '$text', '$_SESSION[id]', ".mysqli_fetch_array(mysqli_query($adb, "SELECT Balance FROM felhasznalo WHERE uid = '$_SESSION[id]'"))[0].")");
        }
        else
        {
            mysqli_query($adb, "INSERT INTO log(TimeStamp, Text, uid, Balance, BalanceChange)
                            VALUES (NOW(), '$text', '$_SESSION[id]', $balance, $change)");
        }
    }

    function ModifyBalance(int $ByAmount)
    {
        global $adb;
        mysqli_query($adb, "UPDATE felhasznalo SET balance = balance + $ByAmount  WHERE uid = '$_SESSION[id]'");//Egyenleg megváltoztatása
    }
    function GetBalance(){
        global $adb;
        return mysqli_fetch_array(mysqli_query($adb, "SELECT balance FROM felhasznalo WHERE uid = '$_SESSION[id]'"))[0];//Egyenleg lekérdezése
    }
?>