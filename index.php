<?php

$botToken = "5219379989:AAF7RzZXs4DKgONIjqDSmTRMYkIRqtpnHws";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);


$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];


switch($message) {

	case "/oi":
		sendMessage($chatId, "Olá");
		break;
		
	case "/video":
		sendVideo($chatId, "url/video.mp4");
		break;
		
	case "Bom dia":
	    $name = $update["message"]["from"]["first_name"];
	    sendMessage($chatId, "Bom dia ".$name);
	    break;	
	
}


function sendMessage ($chatId, $message) {
	
	$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
	file_get_contents($url);
	
}

function sendVideo ($chatId, $message) {

	$url = $GLOBALS[website]."/sendVideo?chat_id=".$chatId."&video=".$message;
	file_get_contents($url);
	
}
 
 
?>
