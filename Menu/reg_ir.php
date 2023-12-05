<?

    session_start();

    if(!isset($_POST['upw'])) { die("<script>alert('Nem írtál be jelszót!')</script>"); }

    if($_POST['pwc'] != $_POST['upw']) { die("<script>alert('Nem egyezik a két jelszó!')</script>"); }

    include("adbkapcsolat.php");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE unev='$_POST[user]'")))
        die("<script>alert('Ez a felhasználónév már foglalt!')</script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE umail='$_POST[umail]'")))
        die("<script>alert('Ezzel az e-mail címmel már regisztráltál!')</script>");

    $upw = md5($_POST['upw']);

    $newuserquery = "INSERT INTO user (UID,           unev,          umail,           upw,               uip,            udatum, ustatusz, ukomment, ujog, ustrid) 
                               VALUES ('test', '".$_POST['unev']."', '".$_POST['umail']."', '$upw', '".$_SERVER['REMOTE_ADDR']."', NOW(), 'A', NULL, NULL, '".randomstring(10)."')";
    print($newuserquery);

    mysqli_query($adb, $newuserquery);

    mysqli_close($adb);

    print("
        <script>
            alert('Köszönjük regszitrációdat.')
            parent.location.href = './?p=login'
        </script>
    ")
?>