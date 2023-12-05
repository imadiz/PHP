<?

    session_start();

    if(!isset($_POST['pw'])) { die("<script>alert('Nem írtál be jelszót!')</script>"); }

    if(!isset($_POST['user'])) { die("<script>alert('Nem írtál be felhasználónevet!')</script>"); }

    include("adbkapcsolat.php");
    
    $upw = md5($_POST['pw']);

    $user = mysqli_query($adb, "SELECT * FROM user
                                WHERE (unev = '$_POST[user]' OR umail = '$_POST[user]') AND upw = '$upw'");


    if(mysqli_num_rows($user))
    {
        $sor = mysqli_fetch_array($user);

        $_SESSION['uid'] = $sor['uid'];
        $_SESSION['unev'] = $sor['unev'];
        $_SESSION['umail'] = $sor['umail'];
        $_SESSION['upw'] = $sor['upw'];
        $_SESSION['ujog'] = $sor['ujog'];

        print('<script>
                parent.location.href = ./
               </script>');
    }
    
    if(mysqli_num_rows($user))
    { $sor = mysqli_fetch_array($user); }
    else
    { 
        die("<script>alert('Hibás belépési adatok!')</script>");
    }
    mysqli_close($adb);

    print("
        <script>
            alert('Sikeres bejelentkezés!')
            parent.location.href = './'
        </script>
    ")
?>