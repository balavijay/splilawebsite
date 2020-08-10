<section id="home_cards" class="parallax-section">


    <div id="home_card_ajax_loader" style="text-align: center; display:none;">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
        Loading....
    </div>

</section>

<script>

    $(document).ready(function(){
       
        loadHomeCards();

    });



    function loadHomeCards()

    {

        if(inProgress == true)
            return false;

        inProgress = true;

        $("#home_card_ajax_loader").show();
       // $("#ajax_text").hide();

       var d = new Date();
       var date = d.getDate();
       var month = d.getMonth() + 1;

       var today_client_url = "ajax.php?f=cards&day=" + 0 + "&date=" + date + "&month=" + month;

       console.log(today_client_url);

        var jqxhr = $.get( today_client_url, function(data) {
            

            $("#home_cards").html(data);
            
            $("#home_card_ajax_loader").hide();
          //  $("#ajax_text").show();

        });





        jqxhr.always(function() {

            inProgress = false;

        });



        return false;

    }



    var past = 0;

    var inProgress;



</script>