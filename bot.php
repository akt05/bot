<?php
require "./vendor/autoload.php";
use Jajo\JSONDB;

$Bot = new Boting\Boting();
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();
}


#########################################################################################################################################################
$Bot->command("/[!.\/]start/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    try {

        
        $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Started bot."]);
    } catch (Exception $e) {
        if ($e->getErrorCode() == 400) {
            echo "User stopped bot!";
        }
    }
});
#########################################################################################################################################################
$Bot->command("/[!.\/]sms ?(.*)/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    $ulke = $Match->group(1);
            if($ulke == ""){
            $sms_api = getenv("SMS_API");
            $site = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=".$sms_api."&action=getNumber&service=nf&country=0");
            
            $number = explode(":7", $site);
            $Bot->sendMessage(["chat_id" => $ChatId, "text" => $number[1]]);
             
            preg_match_all('@ACCESS_NUMBER:(.*?):@si', $site, $id);
            

            $Bot->sendMessage(["chat_id" => $ChatId, "text" => "https://sms-activate.ru/stubs/handler_api.php?api_key=".$sms_api."&action=getStatus&id=".$id[1][0]]);        
                
            }
    
            else{
            
            $sms_api = getenv("SMS_API");
            $site = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=".$sms_api."&action=getNumber&service=nf&country=".$ulke);
            
            $number = explode(":7", $site);
            $Bot->sendMessage(["chat_id" => $ChatId, "text" => $number[1]]);
             
            preg_match_all('@ACCESS_NUMBER:(.*?):@si', $site, $id);
                
            
            $Bot->sendMessage(["chat_id" => $ChatId, "text" => "https://sms-activate.ru/stubs/handler_api.php?api_key=".$sms_api."&action=getStatus&id=".$id[1][0]]);        
            }
     
});
#########################################################################################################################################################
$Bot->command("/[!.\/]kod/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    try {

        
        $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Started bot."]);
    } catch (Exception $e) {
        if ($e->getErrorCode() == 400) {
            echo "User stopped bot!";
        }
    }
});
#########################################################################################################################################################





if (empty(getenv("BOT_TOKEN"))) {
    echo "Please add token";
    die();
} else {
    echo "alive";
    $Bot->Handler(getenv("BOT_TOKEN"));
}
