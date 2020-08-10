<?php





$name = $_POST['name'] . "\n";
$email = $_POST['email'] . "\n";
$service = $_POST['service'] . "\n";
$inspired = $_POST['inspired'] . "\n";





// the message
$msg = "Name:  " . $name  . "\n Email: " . $email  . "\n Service: " . $service  . "\n Inspired: " . $inspired;

if($name && $email && $service && $inspired){
    mail("balavijay@gmail.com","Willing to Support website ",$msg);  // for testing
    mail("srilaprabhupadatoday@gmail.com","Willing to Support website",$msg);
}



header("Location: https://www.srilaprabhupadalila.org/support-confirmation");

?>