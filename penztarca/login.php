<?

    include('adbconn.php');

    $login = mysqli_query($adb, "SELECT * FROM felhasznalo WHERE uname LIKE '$_POST[uname]' AND upw LIKE '$_POST[upw]'");
    $logindata = mysqli_fetch_array($login);

    if(mysqli_num_rows($login) != false)
    {
        session_start();

        $_SESSION['id'] = $logindata['uid'];
        WriteLog("Sikeres bejelentkezés", $_SESSION['id'], $logindata['balance']);
        print("<script>parent.location.href = './?p=yourwallet';</script>");
    }
    else
    {
        print("<script>alert('Hibás bejelentkezési adatok!');</script>");
    }

?>