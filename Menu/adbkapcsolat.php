<? 
    $adb = mysqli_connect("localhost", "root", "password", "reg");

    function randomstring($h=10)
    {
		$s = "";
        for ($i=0; $i <= $h; $i++)
        {
            $s.= chr(rand(32, 126));
        }
        return $s;
    };
?>