
<?php

if($show_error){
    $errorURL = "https://www.srilaprabhupadalila.org/" . $_SERVER['REQUEST_URI'];
   
    $msg = "API Error on page  :  " . $errorURL;

    mail("balavijay@gmail.com","API Error",$msg);  
    //mail("srilaprabhupadalila@gmail.com","API Error",$msg);

?>	

    <div class="row">
        <div class="col-lg-12"><p class="red">There is a problem in loading. Please visit again.  </p></div>
    </div>


<?php
}
?>