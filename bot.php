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

if (empty(getenv("BOT_TOKEN"))) {
    echo "Please add token";
    die();
} else {
    echo "alive";
    $Bot->Handler(getenv("BOT_TOKEN"));
}
