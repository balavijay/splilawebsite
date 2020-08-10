
<?php

	

session_start();



$show_msg = false;

$msg = "";



include("dbconnection.php");



if(isset($_POST['submit']))

{

    $title = "";

    $desc  = "";

    $uploadfile = "";

    $id = "";

    $show_msg = true;

    

    if(isset($_POST['title']))

        $title = $_POST['title'];

    

    if(isset($_POST['description']))

        $desc = $_POST['description'];

    

    if(count($_FILES) && $_FILES['userfile']['size'] !=0 )

    {

        print_r($_FILES);

        /* File is uploaded */

        

        $uploaddir = getcwd() . "/upload/";

        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))

        {

            /* Add to Database */

            $id = add_to_database($title, $desc, basename($_FILES['userfile']['name']));

            

            $newpath = $uploaddir . $id . "_" . basename($_FILES['userfile']['name']);

            

            rename($uploadfile, $newpath);

            

            

            $msg = "<i class='fa fa-check' style='color:#00ff00;'> </i>  Thank you very much for submitting the memory";

        }else{

            /* File uploaded is failed */

            $msg = "<i class='fa fa-times' style='color:#ff0000;'> </i> Failed to save the attached file. Please try again.";

        }

    }else{

        if(strlen($desc) <= 20)

        {

            $msg = "<i class='fa fa-times' style='color:#ff0000;'> </i> We request you to send a valid memory.";

        }else{

            /* Add to Database */

            add_to_database($title, $desc, $uploadfile);

            $msg = "<i class='fa fa-check' style='color:#00ff00;'> </i>  Thank you very much for submitting the memory";

        }

    }

    


}





function add_to_database($title, $desc, $uploadfile)

{

$dbManger = new DBManager();

$dbManger->getConnection();



$title = mysql_real_escape_string($title);

$desc  = mysql_real_escape_string ($desc);

$uploadfile = mysql_real_escape_string ($uploadfile);



$sql = "INSERT INTO `share_with_us` (`id`, `title`, `description`, `file`, `dt`) 

        VALUES (NULL, '$title', '$desc', '$uploadfile', CURRENT_TIMESTAMP);";



mysql_query($sql) or die("Hare Krishna" . mysql_error());



$id = mysql_insert_id();



$dbManger->closeConnection();



return $id;  

}



function setup_tables()

{

$dbManger = new DBManager();

$dbManger->getConnection();





$sql = "



CREATE TABLE `share_with_us` (

`id` int(11) NOT NULL,

`title` varchar(256) DEFAULT NULL,

`description` text,

`file` varchar(256) DEFAULT NULL,

`dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP

) ENGINE=MyISAM DEFAULT CHARSET=utf8;

";



mysql_query($sql) or die("Hare Krishna" . mysql_error());



$sql = "ALTER TABLE `share_with_us`

ADD PRIMARY KEY (`id`);";



mysql_query($sql) or die("Hare Krishna" . mysql_error());



$sql = "ALTER TABLE `share_with_us`

MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";



mysql_query($sql) or die("Hare Krishna" . mysql_error());



$dbManger->closeConnection();  

}





?>

<br /><br />

<?php
    if($show_msg) {
?>    
        <p style="margin-left:10px;"> <?=$msg?> </p>
<?php
    }
?>

            <p id="displayMsg" style="display:none" ></p>
			<form class="form-horizontal" method="POST" action="/share-with-us" onsubmit="return validateForm()" enctype="multipart/form-data" style="margin: 20px">

                                

                <div class="form-group">

                <label class="control-label col-sm-2">Title of the memory:</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="title" id="title" required="" placeholder="Title of the memory">

                </div>

                </div>



                <div class="form-group">

                <label class="control-label col-sm-2">Description:</label>

                <div class="col-sm-10"> 

                    <textarea rows="10" cols="80" class="form-control" required="" name="description" id="description" 

                placeholder="Type memory here or attach file"></textarea> 

                </div>

                </div>



                <div class="form-group"> 

                <div class="col-sm-offset-2 col-sm-10">

                

                <div class="fileinput fileinput-new" data-provides="fileinput">

                    </span><input name="userfile" type="file" /></span>

                </div>

                

                </div>

                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2"> </label>
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1" data-toggle="modal" data-target="#ackModal" > I agree to Terms &amp; Conditions </label>
                </div>



                <div class="form-group"> 

                <div class="col-sm-offset-2 col-sm-10">

                    <button type="submit" name="submit" onclick="javascript:validateForm();" class="btn btn-default section-btn btn btn-success">Submit</button>

                </div>

                </div>

                </form>

<script>

    var ckbox = $('#inlineCheckbox1');

    $('input').on('click',function () {
        if (ckbox.is(':checked')) {
            $("#displayMsg").hide().html("");
        } else {
            $("#modalClosebtn").trigger("click"); 
        }
    });

    function validateForm()
    {   
        $('#title').val( $.trim($('#title').val()));
        $('#description').val( $.trim($('#description').val()));

        if($('#description').val().length <= 20){
            $("#displayMsg").show().html("<i class='fa fa-times' style='color:#ff0000;'> </i> We request you to send a valid memory.");
            return false;
        }

        var ckbox = $('#inlineCheckbox1');
        if (ckbox.is(':checked')) {
        } 
        else{
            $("#displayMsg").show().html("<i class='fa fa-times' style='color:#ff0000;'> </i> Read & Accept Terms &amp; Conditions.");
            return false;
        }
        
    }
</script>



<!-- Modal -->
<div id="ackModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Terms &amp; Conditions</h4>
      </div>
      <div class="modal-body">
			<div class="row">

                <div style="text-align:justify; padding: 0px 20px 0px 20px;">

                    <p>

                    We, the devotees managing Srila Prabhupada Lila App and website, wish to have a single repository of all the pastimes of Srila Prabhupada, and those with his disciples and his organization ISKCON. We want this repository easily available to all the followers of Srila Prabhupada or his disciples. With the help of various vaishnavas we were able to collect thousands of pastimes, videos etc, 

                    which are already available in the app and website. But we are sure that there is much more to be collected and curated for the purpose of ISKCON devotee community.

                    </p>

                    <p>Hence we request you to share any of the following with us:</p>

                    <ul>

                    <li><span>Eyewitness accounts of Srila Prabhupada's pastimes</span></li>

                    <li>Testimonials or Glorifications by prominent personalities on Srila Prabhupada or his literature or his Organization></li>

                    <li>ISKCON's institutional history during Physical manifest lila of Srila Prabhupada and early 1980's</li>

                    <li>History of ISKCON Temples</li>

                    <li>Pictures or videos of Paraphernalia associated with Srila Prabhupada</li>

                    <li>Pictures or videos of Places associated with Srila Prabhupada, with relevant stories</li>

                    <li>Pictures of Disciples of Srila Prabhupada (Latest or pre 1977)</li>

                    <li>Any realizations of the devotees who had experienced any of the two above</li>

                    <li>Videos, audios, documentaries, documents related to the above</li>



                    </ul>

                    <p>We request you to mail across the above to <a href="mailto:srilaprabhupadalila@gmail.com">srilaprabhupadalila@gmail.com</a></p>

                    <p>If you are interested in helping us in researching on the pastimes of Srila Prabhupada, please do get in touch with us at the aforementioned address.

                    </p>


                   <button id="modalClosebtn" type="button" class="btn btn-default section-btn btn btn-success" data-dismiss="modal"> Accept </button> 
                </div>  
            </div>            
      </div>
    </div>

  </div>
</div>
