<?php
$host = 'localhost';
$db   = 'diamantedesk';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


/*
 * -------ОТОБРАЖАЕТ ДАННЫЕ---------
 $query = "SELECT * FROM articlevote";


$result = mysqli_query($db, $query) or die('Error querying database.');

//mysqli_result::fetch_array -- mysqli_fetch_array
// — Выбирает одну строку из результирующего набора и помещает ее в ассоциативный массив, обычный массив или в оба

while ($row = mysqli_fetch_array($result)) {
    echo $row['id'] . ' ' . $row['ip'] . ': ' . $row['answer'] . ' ' . $row['date'] .'<br />';
}

mysqli_close($db);
*/