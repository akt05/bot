
<?php
require "./vendor/autoload.php";
use Jajo\JSONDB;

$Bot = new Boting\Boting();
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();
}


$Bot->catch(function ($e) {
    echo $e;

    // $e->getErrorDescription();
    // $e->getErrorCode();
});

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

$Bot->command("/\/name ?(.*)/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Name = $Match->group(1);
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Hello, $Name"]);
});

$Bot->command("/\/photo/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendPhoto(["chat_id" => $ChatId, "photo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Telegram_2019_Logo.svg/1200px-Telegram_2019_Logo.svg.png", "caption" => "from Url"]);
    
    # If you are uploading file from local, you must pass true! #
    $Bot->sendPhoto(["chat_id" => $ChatId, "photo" => fopen("test.png", "r"), "caption" => "from Local"], true);
    $Bot->sendDocument(["chat_id" => $ChatId, "document" => fopen("test.png", "r"), "caption" => "from Local as Document"], true);
});

$Bot->command("/\/callback/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Example message for callback query", "reply_markup" => json_encode(["inline_keyboard" => [[["text" => "Click me", "callback_data" => "test"], ["text" => "Don't click me", "callback_data" => "test2"]]]])]);
});

$Bot->command("/\/keyboard/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Example message for keyboard", "reply_markup" => json_encode(["keyboard" => [[["text" => "Click me"], ["text" => "Don't click me"]]]])]);
});

$Bot->command("/Click me/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Thanks for click"]);
});

$Bot->command("/Don\'t click me/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"]; 
    $Bot->sendMessage(["chat_id" => $ChatId, "text" => "Why clicked?!", "reply_markup" => json_encode(["remove_keyboard" => TRUE])]);
});




if (empty(getenv("BOT_TOKEN"))) {
    echo "Please add token";
    die();
} else {
    echo "alive";
    $Bot->Handler(getenv("BOT_TOKEN"));
}
