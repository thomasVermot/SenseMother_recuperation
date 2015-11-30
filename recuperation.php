<link rel="stylesheet" type="text/css" href="style.css">
<?php

$url = "https://apis.sen.se/v2/feeds/WwK075FKCLWHYH5RtOVSMRNakFjNpQNH/events/"; //Example
$login = ""; // your sense.mother login
$password = ""; // your sense.mother password
$commande = "curl ".$url." -u ".$login.":".$password." > donnees.json";

shell_exec ($commande);

$json = file_get_contents("donnees.json");
$json_a = json_decode($json, true);

function afficherArray($array,$prefix){
	foreach ($array as $key => $value) {
	    echo '<div class="'.$key.' " title="subelement'.$prefix.'">';
	    if(!is_array($value) ){
		    echo '<p><strong>'.$key.'</strong> => <span>'.$value.'</span></p>';
		}
		else{
			echo '<p class="title"><strong>'.$key.'</strong></p>';
			afficherArray($value,$prefix+1);
		}
	    echo '</div>';
	}
}

afficherArray($json_a,0);