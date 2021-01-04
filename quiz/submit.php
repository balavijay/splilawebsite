<!DOCTYPE html>

<html lang="en">

    <!-- HEAD -->

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title> Srila Prabhupada Lila - Quiz</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/custom.css" />
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto'>
    </head>

    <!-- BODY -->

    <body>


        <header class="main-header">
			<div class="top-menu navbar-fixed-top"> <div class="navbar-brand">Srila Prabhupada Lila Quiz </div></div>
		</header>

 

<?php
    // building array of variables
    $content = http_build_query(array(
                'name'      => $_POST["name"],
                'festival'  => $_POST["festival"],
                'year'      => $_POST["year"],
                'score'     => $_POST["score"],
                'location'  => $_POST["location"],
                'mobile'    => $_POST["mobile"],
                'email'     => $_POST["email"],
                'age'       => $_POST["age"],
                'testimonial' => $_POST["testimonial"],
                'newsletter' => $_POST["newsletter"]

                ));
    // creating the context change POST to GET if that is relevant 
    $context = stream_context_create(array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $content, )));

    $result = file_get_contents('https://srilaprabhupadalila.com/v2/api/participants', null, $context);
    //dumping the reuslt
     
    echo $result;
?>

<div class="body-container">
<div id="section1" class="col-md-12 home">
<p style="font-size:18px">
<br><br><br>
Dear <?=$_POST["name"]?>,  
Thank you for Participating in Quiz !! 
<br>
<br>


<i>
"We are therefore trying to give human society the opportunity for a life of happiness, good health, peace of mind and all good qualities through God consciousness."
</i>
<br /><br />
- Srila Prabhupada <br /><br /> 
</p>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://www.srilaprabhupadalila.org/js/jquery.min.js"></script>

<script>
     
    var data = {
        name: '<?=$_POST["name"]?>',
        festival: '<?=$_POST["festival"]?>',
        year: '<?=$_POST["year"]?>',
        score: '<?=$_POST["score"]?>',
        location: '<?=$_POST["location"]?>',
        mobile: '<?=$_POST["mobile"]?>',
        email: '<?=$_POST["email"]?>',
        age: '<?=$_POST["age"]?>',
        testimonial: '<?=$_POST["testimonial"]?>',
        newsletter: '<?=$_POST["newsletter"]?>',

    }
    
//     $.post('https://srilaprabhupadalila.com/v2/api/participants', data , function(result) {
//     alert('successfully posted  ');
// });

</script>
</body>
</html>