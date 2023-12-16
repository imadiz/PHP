<? 
    $adb = mysqli_connect("localhost", "root", "password", "reg");

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
?>