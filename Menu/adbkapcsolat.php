<? 
    $adb = mysqli_connect("localhost", "root", "password", "reg");

    function randomstring($h=10)
    {
        for ($i=0; $i <= $h; $i++)
        {
            $s.= chr(rand(0, 255));
        }
        return $s;
    };
?>