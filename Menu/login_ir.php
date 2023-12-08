<?

    session_start();

    if(!isset($_POST['pw'])) { die("<script>alert('Nem írtál be jelszót!')</script>"); }

    if(!isset($_POST['user'])) { die("<script>alert('Nem írtál be felhasználónevet!')</script>"); }

    include("adbkapcsolat.php");
    
    $upw = md5($_POST['pw']);

    $user = mysqli_query($adb, "SELECT * FROM user
                                WHERE (unev = '$_POST[user]' OR umail = '$_POST[user]')
                                 AND upw = '$upw'");

    if(mysqli_num_rows($user))
    {
        $sor = mysqli_fetch_array($user);

        $_SESSION['uid'] = $sor['UID'];
        $_SESSION['unev'] = $sor['unev'];
        $_SESSION['umail'] = $sor['umail'];
        $_SESSION['upw'] = $sor['upw'];
        $_SESSION['ujog'] = $sor['ujog'];

        mysqli_query($adb, "INSERT INTO login(LUID, LDatum, LIP)
                        VALUES('$_SESSION[uid]', NOW(), '$_SERVER[REMOTE_ADDR]')");//Beírás a login táblába

        $_SESSION['lid'] = mysqli_insert_id();
        print("<script>
                parent.location.href = './'
               </script>");
    }
    else
    { 
        die("<script>alert('Hibás belépési adatok!')</script>");
    }

    mysqli_close($adb);
?>