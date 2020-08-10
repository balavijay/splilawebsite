<?php

$file = 'splila.splila';
$email = $_POST['email'] . "\n";

file_put_contents($file, $email, FILE_APPEND | LOCK_EX);

header("Location: /");
?>