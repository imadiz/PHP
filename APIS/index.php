<?php
		$fu = fopen( "https://api.coingecko.com/api/v3/exchange_rates" , "r" ) ;

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
        include("randomuser_chip.html")
	?>