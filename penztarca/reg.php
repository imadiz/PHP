<?
    include('adbconn.php');

    mysqli_query($adb, "INSERT INTO felhasznalo (uname, upw, uid, balance)
                        VALUES('$_POST[uname]', '$_POST[upw]', '".randomstring(10)."', 0)");
    print("<script>
                alert('Sikeres regisztráció!');
                parent.location.href = './';
           </script>")

?>