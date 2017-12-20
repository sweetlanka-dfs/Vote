<?php
error_reporting(E_ALL | E_STRICT);
include_once 'get_Ip.php';
$answer= filter_input(INPUT_POST,'vote', FILTER_SANITIZE_STRING);

//---------SET_TIME-----------

date_default_timezone_set('UTC');
$dt = date("Y-m-d H:i:s");

//----------PDO----------------
$host = 'localhost';
$db = 'diamantedesk';
$user = 'root';
$pass = '';
$charset = 'utf8';

try {
    $dsn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dsn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dsn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $sql = "INSERT INTO `articlevote`(`answer`, `ip`, `date`)
    VALUES (:answer, :ip, :dt)";
    $stmt = $dsn->prepare($sql);
    $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
    $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
    $stmt->execute();
}
catch(PDOException $e) {
    die('Connect ERROR with DB: ' . $e->getMessage());
}

$dsn = null;

?>




