<section id="education" class="parallax-section">

    <div class="" style="text-align: center;" id="load_more_block">
        <div class="loadMore"> 
            <a id="ajax_text" href="#" onclick="return loadCards()" class="section-btn btn btn-success">Load more pastimes</a>
        </div>
    </div>

    <div id="ajax_loader" style="text-align: center; display:none;">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
        Loading....
    </div>

</section>

<script>

    $(document).ready(function(){

        var auto_load_counter = -1;
        var max_auto_load = 3;

        $(window).scroll(function() {

            if($(window).scrollTop() + $(window).height()  == $(document).height() ) {
                
                
                if( auto_load_counter <= max_auto_load ){
                    auto_load_counter++;
                    loadCards();
                }
            }

        });


    });


    random_loader_count = 0;
    function loadCards()

    {

        if(inProgress == true)
            return false;

        inProgress = true;

        random_loader_count++;

        $("#ajax_loader").show();
        $("#ajax_text").hide();

        var jqxhr = $.get( "ajax_random.php?q=" + random_loader_count, function(data) {

            

            // $("div#card_container_main").append(data);

        

            $(data).insertBefore("#education");

            past += 1;

            $("#ajax_loader").hide();
            $("#ajax_text").show();

        });





        jqxhr.always(function() {

            inProgress = false;

        });



        return false;

    }



    var past = 1;

    var inProgress;



</script>