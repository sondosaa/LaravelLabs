<?php

$errors =[];

if (empty($_REQUEST["firstName"])&& $_REQUEST["firstName"]=="") {
    $errors['firstName']="firstName_is_empty";
}

if (empty($_REQUEST["lastName"]) ||$_REQUEST["lastName"]=="") {
    $errors["lastName"]="lastName_is_empty";
}

if (empty($_REQUEST["userName"])&& $_REQUEST["userName"]=="") {
    $errors['userName']="userName_is_empty";
}

if (empty($_REQUEST["password"]) ||$_REQUEST["password"]=="") {
    $errors["password"]="password_is_empty";
}

if (empty($_REQUEST["gender"]) ||$_REQUEST["gender"]=="") {
    $errors["gender"]="gender_is_empty";
}

$str="Edit.php?";
if (count($errors)>0) {
    foreach ($errors as $k=>$val) {
        $str.=$k."=".$val."&";
    }
    header("Location: $str");
    return;
}

$smth = $_GET["firstName"].".".$_GET["lastName"].":".$_GET["userName"].":".$_GET["gender"].":".$_GET["address"].":".$_GET["city"].":";
foreach ($_GET["skills"] as $key => $value) {
    $smth .= $value.",";
}

session_start();
$a=$_SESSION['line'];

$smth .= PHP_EOL;
var_dump($smth);

$data = file("form.txt");
$file = fopen("form.txt", "w");
foreach ($data as $key => $line) {
    if ($key == $a) {
        echo "found";
        fputs($file, $smth);
    } else {
        fputs($file, $line);
    }
}
fclose($file);

header("Location:table.php");
