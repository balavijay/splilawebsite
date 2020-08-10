<?php




	session_start();

		

    include_once("common.php");
    
    $page_type = $_GET['q'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <meta name="apple-itunes-app" content="app-id=1211997347">

    <title>Srila Prabhupada Lila</title>
    <link rel="shortcut icon" href="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.nethttps://sppbcdn.azureedge.net/images/favicon.ico" >

    <?php
    include "i_head_scripts.php";
    ?>	
    

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- Head includes Section -->
    <?php
    include "i_styles.php";
    ?>

    <!-- PRE LOADER -->

    <div class="preloader">
    Loading ...
    </div>


    <!-- Navigation Section -->
    <?php
    include "i_menu_items.php";
    ?>	

    

<?php

$show_error = false;

$day = date("d");

$mon = date("m");



$date_str = date("F") . "-" . $day;


$metadata_url = "data/pagedescription.JSON";

$metadata  = file_get_contents($metadata_url);


if($metadata === FALSE)

{

    /* No content from server */

    $show_error = true;

}else{

    $metadatajson = json_decode($metadata);
   

    if($metadatajson == NULL)

        $show_error = true;

    else if( $metadatajson->errCode != 0)

        $show_error = true;


}

?>		


 <?php
   
    $page_topImage = "";
    foreach($metadatajson->resource as $item){
        if($item->content_type && $item->content_type == $page_type)
        {
             $page_title = $item->title;
             $page_content_text  = $item->content_text;
             $page_content_url  = $item->content_url;
             
           
             if($item->topImage)
                $page_topImage =   $item->topImage;
            else 
                $page_topImage = "ic_sp_1.jpg";

        }
    }

   


?>


    <!-- Main Section -->

    <section id="inner" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-sm-2">
                    <div class="inner-thumb-img" ><img src="https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/splilawebsite/prabhupada/<?=$page_topImage?>" class="innerImg" /></div>
                </div>

                <div class="col-md-9 col-sm-9">
                    <div class="inner-thumb">
                        <div class="section-title">
                             
                            <h1 class="wow fadeInUp" data-wow-delay="0.6s"> <?=$page_title?> </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.9s"> <?=$page_content_text?>  </p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>




<?php
    include "mail_error.php";
?>  

<section class="parallax-section" >
        <div class="container">
        <div class="row">
        <div class="col-md-11 col-sm-11">
            <br /><br />

            <iframe id="videoframe" width="560" height="315" src="https://www.youtube.com/embed/kiwrmUg9h3Y?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="true" align="left" style="text-align: left; margin-right: 20px;"></iframe>
            
            <p> When <b>His Divine Grace A.C. Bhaktivedanta Swami Srila Prabhupada</b> entered the port of New York City on September 17, 1965 few Americans took notice - but he was not merely another immigrant. He was on a mission to introduce the ancient teachings of Vedic India into mainstream America.  Before Srila Prabhupada passed away on November 14, 1977 at the age of 81, his mission proved successful. He had founded the International Society for Krishna Consciousness (ISKCON) and saw it grow into a worldwide confederation of more than 100 temples, ashrams and cultural centers. </p> <br />
            <p> Srila Prabhupada was born Abhay Charan De on September 1, 1896 to a pious Hindu family in Calcutta. As a youth growing up in British - controlled India, Abhay became involved with Mahatma Gandhi’s civil disobedience movement to secure independence for his nation. It was, however, a 1922 meeting with a prominent scholar and religious leader, Srila Bhaktisiddhanta Sarasvati, which proved most influential on Abhay’s future calling. Srila Bhaktisiddhanta was a leader in the Gaudiya Vaishnava denomination, a monotheistic tradition within the broad Hindu culture, and asked Abhay to bring the teachings of Lord Krishna to the English-speaking world. Abhay became a disciple of Srila Bhaktisiddhanta in 1933, and resolved to carry out his mentor’s request. Abhay, later known by the honorific A.C. Bhaktivedanta Swami Prabhupada, spent the next 32 years preparing for his journey west.</p> <br />
            <p> In 1965, at the age of sixty-nine, Srila Prabhupada traveled to New York City aboard a cargo ship. The journey was treacherous, and the elderly spiritual teacher suffered two heart attacks aboard ship. Arriving in the United States with just seven dollars in Indian rupees and his translations of sacred Sanskrit texts, Srila Prabhupada began to share the timeless wisdom of Krishna consciousness. His message of peace and goodwill resonated with many young people, some of whom came forward to become serious students of the Krishna tradition.  With the help of these students, Srila Prabhupada rented a small storefront on New York’s Lower East Side to use as a temple. On July 11, 1966, he officially registered his organization in the state of New York, formally founding the International Society for Krishna Consciousness. </p> <br />
            <p> In the eleven years that followed, Srila Prabhupada circled the globe 14 times on lecture tours, bringing the teachings of Lord Krishna to thousands of people on six continents.  Men and women from all backgrounds and walks of life came forward to accept his message, and with their help, Srila Prabhupada established ISKCON centers and projects throughout the world. Under his inspiration, Krishna devotees established ic_temples, rural communities, educational institutions, and started what would become the world’s largest vegetarian food relief program.    With the desire to nourish the roots of Krishna consciousness in its home, Srila Prabhupada returned to India several times, where he sparked a revival in the Vaishnava tradition. In India, he opened dozens of ic_temples, including large centers in the holy towns of Vrindavan and Mayapur. </p> <br />
            <p> Srila Prabhupada’s most significant contributions, perhaps, are his books.  He authored over 70 volumes on the Krishna tradition, which are highly respected by scholars for their authority, depth, fidelity to the tradition, and clarity.  Several of his works are used as textbooks in numerous college courses.  His writings have been translated into 76 languages. His most prominent works include:  Bhagavad-gita As It Is, the 30-volume Srimad-Bhagavatam, and the 17-volume Sri Caitanya-caritamrita.</p> <br />
            <p> In this age of consumerism and modern technology, practically everything is available at the fingertips of consumers. Alas! The same is not the case with spirituality; one may argue that there is enough information about spirituality on the internet and there are many do-it-yourself guides that could make one a deeply spiritual person. But what is spirituality is all about, how do you choose one spiritual product rather than the other? Does it involve choosing a spiritual master or teacher? If so, is it something available at one’s fingertips? </p> <br />
            <p> Fifty years ago, the West was in a similar dilemma; materialistic expansionism had led to two ghastly world wars. Various committees and organizations formed to create world peace only helped in increasing the number of flags and wars. At that time the youth of America, disillusioned by the misplaced efforts of their predecessors, started embracing eastern traditions of spirituality. Thus began a steady stream of teachers, from varied eastern traditions, populating the western spiritual market place. Unfortunately many of these teachers came to exploit the uninformed western youth.</p> <br />
            <p> At this juncture, on September 17, 1965 there arrived an elderly Indian saint, to proclaim the age-old message of India’s foremost scripture, theBhagavad-gita. A.C. Bhaktivedanta Swami Srila Prabhupada, later lovingly called by his disciples as “Srila Prabhupada,” not only proclaimed the message of theBhagavad-gita, but also led a life of a true spiritualist. His personality attracted thousands of hard-core westerners towards Indian spirituality. His divine compassion erased the apparent wide generational gap, and those disillusioned western youth happily embraced this elderly saint. What are the qualities of Srila Prabhupada that attracted them?  For decades Srila Prabhupada only saw reversals in India, but how was he so selfless and how did he achieve so much success in a short period of time?</p> <br />
            <p> Ancient scriptures of India extol the virtues of a true spiritualist. The Bhagavad-gita, Srimad Bhagavatam, Chaitanya Charitamrita, Bhakti Rasamrita Sindhu list 85 qualities a true spiritualist should possess and one can note that Srila Prabhupada had all of the above qualities in completeness.</p> <br />
            <p> The objective of this app, Srila Prabhupada lila, is to curate the history of Srila Prabhupada and his institutions, extol his divine qualities, his legacy, his disciples etc. We request the users of the app to appreciate and connect themselves with Srila Prabhupada, the greatest ambassador of Indian spiritualism.</p> <br />

            <p> 
            <b>Classification of Pastimes:</b> <br />
            Many devotees who regularly chant 16 rounds of the Hare Krishna Maha-mantra have worked with great care to index the Memories of Srila Prabhupada against the following:
            <ul>
                <li> 85 Qualities of a Pure Devotee </li> 
                <li> 125 Keywords or Topics </li> 
                <li> Location where it happened </li> 
                <li> Devotee who narrated it </li> 
            </ul>
            </p> 

            <p> These classifications have also been verified by a few other volunteers. </p>
            <p> Srila Prabhupada is a pure devotee of Lord Krishna and there are many facets to his lila. In spite of our best efforts, it is quite possible that we might have erred in classifying a Memory appropriately. We request our readers to mail us their feedback at <a href="mailto:srilaprabhupadalila@gmail.com" > srilaprabhupadalila@gmail.com </a>. With your help, we can definitely improve our understanding of Srila Prabhupada’s Lila. </p>
            <br /><br />
          </div>
          </div>
          </div>
     </div>
</section>


    


    
    <!-- Footer Section -->
    <?php
        include "i_footer_links.php";
    ?>

    <!-- Scripts -->
    <?php
        include "i_script_links.php";
    ?>

<script>

       function changeWidthForMobile() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

          // Android detection 
          if (/android/i.test(userAgent)) {
            $("#videoframe").attr("width", "100%");
          }

          // iOS detection 
          if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            $("#videoframe").attr("width", "100%");
          }

          
      }

        changeWidthForMobile();

</script>   

</body>

</html>
