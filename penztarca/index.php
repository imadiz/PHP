<?
    if(!isset($_GET['p']))
        include('kezdo.html');
    else
    {
        switch($_GET['p'])//A '@' supress-eli a művelet által okozott warning-ot.
        {
            case 'regisztracio':
                @session_destroy();
                include('regisztracio.html');
            break;
            case 'yourwallet':
                include('wallet.html');
                break;
            default:
                @session_destroy();
                include("kezdo.html");
            break;
        }
    }
?>