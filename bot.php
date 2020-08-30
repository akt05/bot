<?php
require "./vendor/autoload.php";
use Jajo\JSONDB;

$Bot = new Boting\Boting();
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();
}
#########################################################################################################################################################

#########################################################################################################################################################
$Bot->command("/[!.\/]yaraq/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Başlarım başlamam sanane lan amcık"]);
}); 
#########################################################################################################################################################
$Bot->command("/Rıfkı/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "kes lan amcık"]);
});
#########################################################################################################################################################
$Bot->command("/amk/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "sen sus lan"]);
});
#########################################################################################################################################################
$Bot->command("/aferin oluma/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "estağfurullah herzamanki hâlim"]);
});
#########################################################################################################################################################
$Bot->command("/sakin olum/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "tamam sakinim ama dokunanı sikerim"]);
});
#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################

#########################################################################################################################################################


if (empty(getenv("BOT_TOKEN"))) {
    echo "Please add token";
    die();
} else {
    echo "alive";
    $Bot->Handler(getenv("BOT_TOKEN"));
}
