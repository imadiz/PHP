<?

    session_start();

    if(!isset($_POST['upw'])) { die("<script>alert('Nem írtál be jelszót!')</script>"); }

    if($_POST['pwc'] != $_POST['upw']) { die("<script>alert('Nem egyezik a két jelszó!')</script>"); }

    include("adbkapcsolat.php");

    $upw = md5($_POST['upw']);

    $newuserquery = "INSERT INTO user (UID,           unev,          umail,           upw,               uip,            udatum, ustatusz, ukomment, ujog, ustrid) 
                               VALUES ('test', '".$_POST['unev']."', '".$_POST['umail']."', '$upw', '".$_SERVER['REMOTE_ADDR']."', NOW(), 'A', NULL, NULL, NULL)";
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