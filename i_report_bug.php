<form class="form-horizontal" action="mail/mail_local.php" onsubmit="return validateBug();" method="post" enctype="multipart/form-data" style="margin: 20px" >
    <input type="hidden" name="type" value="BUG">
    <input type="hidden" name="title" value="BUG">
    
    <div class="form-group">

        <label class="control-label col-sm-2">Name:</label>

        <div class="col-sm-10">

            <input type="text" class="form-control" name="name" id="name" required="" placeholder="Please enter your Name">

        </div>

    </div>



    <div class="form-group">

        <label class="control-label col-sm-2">Email:</label>

        <div class="col-sm-10">

            <input type="email" class="form-control" name="email" id="email" required="" placeholder="Please enter your Email">

        </div>

    </div>



    <div class="form-group">

    <label class="control-label col-sm-2">Steps to reproduce the bug :</label>

    <div class="col-sm-10"> 

        <textarea rows="8" cols="80" class="form-control" name="description" required="" id="rb_description" placeholder="Enter Steps to reproduce the bug"></textarea> 

    </div>

    </div>





    <div class="form-group"> 

    <div class="col-sm-offset-2 col-sm-10">

        <button type="submit"  class="btn btn-default section-btn btn btn-success">Submit</button>

    </div>

    </div>

</form>

<script>
function validateBug(){
    $('#rb_description').val( $.trim($('#rb_description').val()));

    if($('#rb_description').val().length <= 10){
        $("<p><i class='fa fa-times' style='color:#ff0000;'> </i> We request you to send a valid Bug.<p>").insertBefore("#rb_description");
        return false;
    }
}
</script>