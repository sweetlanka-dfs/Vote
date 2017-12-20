<?php
include 'get_Ip.php';

$answer= filter_input(INPUT_POST,'vote', FILTER_SANITIZE_STRING);
$ipUser = filter_input(INPUT_GET, $ip, FILTER_VALIDATE_IP)

//---------SET_TIME-----------

date_default_timezone_set('UTC');
$dt = date("Y-m-d H:i:s");

//----------PDO----------------
$host = 'localhost';
$db   = 'diamantedesk';
$user = 'root';
$pass = '';
$charset = 'utf8';

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    $dsn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, $opt);
    // set the PDO error mode to exception
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `articlevote`(`answer`, `ip`, `date`)
    VALUES (:answer, :ipUser, :dt)";
    $stmt = $dsn->prepare($sql);
    $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
    $stmt->bindParam(':ipUser', $ipUser, PDO::PARAM_STR);
    $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$dsn = null;
?>


