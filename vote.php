<?php
include 'connect_mysql.php';
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


$sql="INSERT INTO `articlevote`(`answer`, `ip`, `date`) VALUES ('$answer', '$ip', '$dt')";

//-------------CHECKING---------------------
$insert = mysqli_query($db,$sql);
    if($insert == true) {
    echo "OK";
    } else {
     echo "Pizdec";
    }

//header( 'Location: http://localhost/ArticleVote/form_new/', true, 307 );

/*
echo '<pre>';
echo htmlspecialchars(print_r($_POST, true));
echo '</pre>';

*/