<?
    //print_r($_POST);

    print $_POST['szavazas'];
    if(!isset($_POST['szavazas'])){
        die("<script>alert('Nem is szavaztál!')</script>");
    }

    if(!file_exists("szavazasok.txt")){
        $fp = fopen("szavazasok.txt", "w");
        fwrite($fp, "0;0;0;0");
        fclose($fp);
    }
?>