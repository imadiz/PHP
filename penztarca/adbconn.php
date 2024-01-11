<?

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
    
    function WriteLog(string $text, string $userid, int $balance)
    {
        global $adb;
        mysqli_query($adb, "INSERT INTO log(TimeStamp, Text, uid, Balance)
                            VALUES (NOW(), '$text', '$userid', $balance)");
    }
?>