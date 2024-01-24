<?

$fu = fopen("https://randomuser.me/api/", "r");

$json = "";
while (!feof($fu))  $json .= fread($fu, 8192);

fclose( $fu ) ;

$adat = json_decode($json);

$userdata_array = array($adat->results[0]->name->title." ".$adat->results[0]->name->first." ".$adat->results[0]->name->last,//teljes név
                        $adat->results[0]->gender,// nem (férfi/nő)
                        $adat->results[0]->dob->date." (".$adat->results[0]->dob->age.")",// születési dátum
                        $adat->results[0]->location->country.", ".$adat->results[0]->location->city,// lakhely (ország és város két külön mezőben)
                        $adat->results[0]->email,// e-mail cím
                        $adat->results[0]->phone,// telefonszám
                        $adat->results[0]->login->username,// választott felhasználónév
                        $adat->results[0]->login->password, // választott belépési jelszó
                        $adat->results[0]->picture->large /* profilkép */);
$returnstring = implode(';', $userdata_array);
echo $returnstring;

?>