<section id="ajax_<?=$q?>" class="parallax-section">

    <div class="" style="text-align: center;" id="load_more_block_<?=$q?>">
        <div class="loadMore"> 
            <a id="ajax_text_<?=$q?>" href="#" onclick="return loadCards('<?=$q?>')" class="section-btn btn btn-success">Load more </a>
        </div>
    </div>

    <div id="ajax_loader_<?=$q?>" class="memory-loader" style="display:none;">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
       
    </div>

    <br />

</section>


<script>




    function loadCards(q)

    {

        if(inProgress == true)
            return false;

        inProgress = true;

        $("#ajax_loader_"+q).show();
        $("#ajax_text_"+q).hide();

        var ajax_url = "/ajax_memories.php?q="+q;

       
   

        var jqxhr = $.get( ajax_url , function(data) {

           
            $(data).insertBefore("#ajax_"+q);

        
            $("#ajax_loader_"+q).hide();
            $("#ajax_text_"+q).show();
            $("#ajax_"+q).hide();

        });





        jqxhr.always(function() {

            inProgress = false;

        });



        return false;

    }





    var inProgress;



</script>