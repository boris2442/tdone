<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBNAME", "td1php");
define("DBPASS", "");
$dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    // echo "connexion a la database reussie";
} catch (PDOException $e) {

    die('Could not connect: ' . $e->getMessage());
}
?>