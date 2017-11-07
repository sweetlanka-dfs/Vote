<?php
include 'get_Ip.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'OK';
}

$answer= $_POST['vote'];

 //-------------CHECKING AS ARRAY-----------
/*if (is_array($answer)) {
    foreach ($answer as $key => $value) {
        echo $value;
    }
} else exit('Это не массив');
?>

*/

//---------SET_TIME-----------

date_default_timezone_set('UTC');
$dt = date("Y-m-d H:i:s");

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
    $sql = "INSERT INTO articlevote (answer, ip, date)
    VALUES ('$answer', '$ip', '$dt')";
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

/*$sql = "INSERT INTO articlevote(answer,
            ip,
            date
            ) VALUES (
            :answer,
            :ip,
            :dt)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
$stmt->bindParam(':dt', $dt, PDO::PARAM_STR);

$stmt->execute();
*/
/*
try {
    $db = new PDO('mysql:host=localhost;dbname=diamantedesk', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    foreach($db->query('INSERT INTO `articlevote`(`answer`, `ip`, `date`) VALUES ('$answer', '$ip', '$dt')') as $sql) {
        $insert = mysqli_query($db,$sql);
    }
    $db = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
*/

/*$sql="INSERT INTO `articlevote`(`answer`, `ip`, `date`) VALUES ('$answer', '$ip', '$dt')";

//-------------CHECKING---------------------
$insert = mysqli_query($db,$sql);
    if($insert == true) {
    echo "OK";
    } else {
     echo "Pizdec";
    }

//header( 'Location: http://localhost/ArticleVote/form_new/', true, 307 );
*/
/*
echo '<pre>';
echo htmlspecialchars(print_r($_POST, true));
echo '</pre>';

*/