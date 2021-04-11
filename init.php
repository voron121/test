<?php

use App\Registry;

require_once __DIR__ . "/vendor/autoload.php";

class Template
{
    public static function renderTemplate(string $templatePath, array $data = [])
    {
        require_once TEMPLATE_PATH . "/layout/head.php";
        require TEMPLATE_PATH . $templatePath . ".php";
        require_once TEMPLATE_PATH . "/layout/footer.php";
    }
}

$db = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

Registry::set("db", $db);

?>