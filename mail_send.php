
<?php

$msg = $_POST['fd_name'] . "\n" . $_POST['fd_email'] . "\n" . $_POST['fd_description'];

if($msg){
    mail("balavijay@gmail.com","Feedback/Suggestion/Bug from site",$msg);
    mail("srilaprabhupadatoday@gmail.com","Feedback/Suggestion/Bug from site",$msg);
}



header("Location: /share-confirmation");

?>
