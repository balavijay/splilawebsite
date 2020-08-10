<section id="autoSection" class="parallax-section">

</section>


<script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script>

<script>

    $(document).ready(function(){

        var counter = 1;
        var maxCounter  = 1;


        $(window).scroll(function() {
            var hT = $('#autoSection').offset().top,
            hH = $('#autoSection').outerHeight(),
            wH = $(window).height(),
            wS = $(this).scrollTop();
            if (wS > (hT+hH-wH)){
                if( counter <= maxCounter ){
                        counter++;
                        loadSections();
                    }
            }
        });


    });



    function loadSections()

    {

        if(inProgress == true)
            return false;

        inProgress = true;



        var jqxhr = $.get( "i_auto_section.php" , function(data) {

            

            // $("div#card_container_main").append(data);

        

            $(data).insertBefore("#autoSection");


        });





        jqxhr.always(function() {

            inProgress = false;

        });



        return false;

    }



    var past = 1;

    var inProgress;



</script>