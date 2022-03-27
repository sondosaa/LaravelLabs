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

$str="Form.php?";
if (count($errors)>0) {
    foreach ($errors as $k=>$val) {
        $str.=$k."=".$val."&";
    }
    header("Location: $str");
    return;
}


try {
    $text = fopen("form.txt", "a");
    fwrite($text, $_REQUEST["firstName"].'.'. $_REQUEST["lastName"]. ":");
    fwrite($text, $_REQUEST["userName"]. ":");
    fwrite($text, $_REQUEST["gender"]. ":");
    if (empty($_REQUEST["address"])) {
        fwrite($text, "none provided:");
    } else {
        fwrite($text, $_REQUEST["address"].":");
    }
    if (empty($_REQUEST["city"])) {
        fwrite($text, "none provided:");
    } else {
        fwrite($text, $_REQUEST["city"].":");
    }
    if (empty($_REQUEST["skills"])) {
        fwrite($text, "none provided:");
    } else {
        foreach ($_REQUEST["skills"] as $skill) {
            fwrite($text, "$skill,");
        }
        fwrite($text, PHP_EOL);
    }
    fclose($text);
} catch (Exception $e) {
    $e->get_message();
}

header("Location:table.php");
