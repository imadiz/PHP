<?php
		$fu   = fopen( "https://api.coingecko.com/api/v3/exchange_rates" , "r" ) ;

		$json = "";
		while (!feof($fu))  $json .= fread($fu, 1024);

		fclose( $fu ) ;

		$adat = json_decode($json);

        $currencies = ["eur", "usd", "gbp", "chf", "czk", "pln"];
        print("<style>
                table td{
                    border: solid 1px black;
                    border-collapse: collapse;
                    text-align: center;
                }
               </style>");
        print("<table>");

        foreach($currencies as $curr)
        {
            print("<tr>
                    <td>".$adat->rates->$curr->name."</td>
                    <td>".round($adat->rates->huf->value / $adat->rates->$curr->value, 2)."</td>
                   </tr>");
        }
        print "</table>";
        print "<hr>";

        //Következő feladat

        $fu = fopen("https://randomuser.me/api/", "r");

        $json = "";
		while (!feof($fu))  $json .= fread($fu, 1024);

		fclose( $fu ) ;

		$adat = json_decode($json);
        print_r($adat);
        print("<hr>");

        // választott belépési jelszó
        // profilkép

        // teljes név
        print($adat->results[0]->name->title." ".$adat->results[0]->name->first." ".$adat->results[0]->name->last."<br>");

        // nem (férfi/nő)
        print($adat->results[0]->gender."<br>");

        // születési dátum
        print($adat->results[0]->dob->date." (".$adat->results[0]->dob->age.")"."<br>");

        // lakhely (ország és város két külön mezőben)
        print($adat->results[0]->location->country.", ".$adat->results[0]->location->city."<br>");

        // e-mail cím
        print($adat->results[0]->email."<br>");

        // telefonszám
        print($adat->results[0]->phone."<br>");

        // választott felhasználónév
	?>