<?php
include 'get_Ip.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'OK';
}

$answer= filter_input(INPUT_POST,'vote');


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
    VALUES (:answer, :ip, :dt)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
    $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
    // use exec() because no results are returned
    $dsn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$dsn = null;
?>


//header( 'Location: http://localhost/ArticleVote/form_new/', true, 307 );
*/
/*
echo '<pre>';
echo htmlspecialchars(print_r($_POST, true));
echo '</pre>';

*/