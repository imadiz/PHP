<?
    include('adbconn.php');

    mysqli_query($adb, "INSERT INTO felhasznalo (uname, upw, uid, balance, Elsobelepes)
                        VALUES('$_POST[uname]', '$_POST[upw]', '".randomstring(10)."', 0, 1)");

    WriteLog("Sikeres regisztráció!", 0);
    
    print("<script>
                alert('Sikeres regisztráció!');
                parent.location.href = './';
           </script>")

?>