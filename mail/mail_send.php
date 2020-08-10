
<meta http-equiv="refresh" content="1;url= https://www.srilaprabhupadalila.org/share-confirmation">

<?php

$msg = $_POST['fd_name'] . "\n" . $_POST['fd_email'] . "\n" . $_POST['fd_description'];

if($msg){

    mail("srilaprabhupadatoday@gmail.com","Feedback/Suggestion/Bug from site",$msg);
    mail("balavijay@gmail.com","Feedback/Suggestion/Bug from site",$msg);
}



header("Location: https://www.srilaprabhupadalila.org/support-confirmation");

?>
