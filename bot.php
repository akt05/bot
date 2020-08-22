
<?php
require "./vendor/autoload.php";
use Jajo\JSONDB;

$Bot = new Boting\Boting();
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();
}


#########################################################################################################################################################
$host = getenv("MYSQL_HOST");
$user = getenv("MYSQL_USER");
$pass = getenv("MYSQL_PASS");
$dbname = getenv("MYSQL_DB");
    
@$baglanti = new mysqli($host, $user, $pass, $dbname);
    if(mysqli_connect_error())
    {
        echo mysqli_connect_error();
        
    }

$baglanti->set_charset("utf8");
#########################################################################################################################################################
$Bot->command("/[!.\/]start/m", function ($Update, $Match) use ($Bot) {
    $ChatId = $Update["message"]["chat"]["id"];
    try {

        
        
        
        if($baglanti->query("UPDATE makale SET baslik = 31 WHERE id = 1")){
            $Bot->sendMessage(["chat_id" => $ChatId, "text" => "oldu"]);
        }
        
    } catch (Exception $e) {
        if ($e->getErrorCode() == 400) {
            echo "User stopped bot!";
        }
    }
});
#########################################################################################################################################################

#########################################################################################################################################################





if (empty(getenv("BOT_TOKEN"))) {
    echo "Please add token";
    die();
} else {
    echo "alive";
    $Bot->Handler(getenv("BOT_TOKEN"));
}
