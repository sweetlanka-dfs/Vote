<?php
$db = mysqli_connect('localhost','root','','diamantedesk');


//or die('Error connecting to MySQL server.');
//echo "Connected to MySQL<br>";


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