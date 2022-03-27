<?php
$smth = $_SERVER["QUERY_STRING"].PHP_EOL;
$data = file("form.txt");
$file = fopen("form.txt", "w");
foreach ($data as $key => $line) {
    var_dump($line);
    if ($line == $smth || $line == $_SERVER["QUERY_STRING"]) {
        echo "found";
    } else {
        fputs($file, $line);
    }
}
fclose($file);
header("Location: table.php");
