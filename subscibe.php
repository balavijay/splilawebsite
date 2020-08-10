<?php



$file = 'splila.splila';

$email = $_POST['email'] . "\n";


file_put_contents($file, $email, FILE_APPEND | LOCK_EX);


// the message
$msg = "New member request from Srila Prabhupada Lila website by :  " . $email ;

if($msg){
    mail("balavijay@gmail.com","Newsletter Request",$msg);
    mail("srilaprabhupadatoday@gmail.com","Newsletter Request",$msg);
}




header("Location: /mail-confirmation");

?>