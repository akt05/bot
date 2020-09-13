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
$Bot->command("/[!.\/]racon/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "ben kaldım kardeş, ben kaldım."]);
}); 
#########################################################################################################################################################
$Bot->command("/Rıfkı/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "kes lan amcık"]);
});
#########################################################################################################################################################
$Bot->command("/amk/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "küfür etmezsek sevirim günah çünkü Allah ilerde sormaz mı?"]);
});
#########################################################################################################################################################
$Bot->command("/aferin oluma/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "estağfurullah herzamanki hâlim"]);
});
#########################################################################################################################################################
$Bot->command("/sakin olum/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "tamam sakinim ama dokunanı sikerim"]);
});
#########################################################################################################################################################
$Bot->command("/ali/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "kerpeten Ali nabün la"]);
});
#########################################################################################################################################################
$Bot->command("/day[iı]/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "buyur yeğen"]);
});
#########################################################################################################################################################
$Bot->command("/bilmem/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "bilemem kardeş meyveyi soymadan içinden ne çıkacak bile
mem"]);
});
#########################################################################################################################################################
$Bot->command("/[iı]yi geceler/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Yat zıbar lan Kürşad sende uyu lan yarın okula gidicen"]);
});
#########################################################################################################################################################
$Bot->command("/aq/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "küfür etme ağzını yüzünü sikerim"]);
});
#########################################################################################################################################################
$Bot->command("/amk/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "küfür etme ağzını yüzünü sikerim"]);
});
#########################################################################################################################################################
$Bot->command("/sikik/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "küfür etme ağzını yüzünü sikerim"]);
});
#########################################################################################################################################################
$Bot->command("/yaraq/mi", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "küfür etme ağzını yüzünü sikerim"]);
});
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
