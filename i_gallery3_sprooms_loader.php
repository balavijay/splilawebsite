<section id="ajax_home" class="parallax-section">

    <div class="" style="text-align: center;" id="load_more_block">
        <br />
        <div class="loadMore"> 
            <a id="ajax_text" href="#" onclick="return loadCards()" class="section-btn btn btn-success">Load more </a>
        </div>
    </div>

    <div id="ajax_loader" style="text-align: center; display:none;">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
       
    </div>

    <br />

</section>

<script>




    function loadCards()

    {

        if(inProgress == true)
            return false;

        inProgress = true;

        $("#ajax_loader").show();
        $("#ajax_text").hide();

        var ajax_url = "/ajax_gallery3_sprooms.php";

       console.log(ajax_url);
       console.log("<?=$data_url?>");
   

        var jqxhr = $.get( ajax_url , { data_url:"<?=$data_url?>" }, function(data) {

            $(data).insertBefore("#ajax_home");

            //console.log(data);
        
            $("#ajax_loader").hide();
            $("#ajax_text").show();
            $("#ajax_home").hide();

        });





        jqxhr.always(function() {

            inProgress = false;

        });



        return false;

    }





    var inProgress;



</script>