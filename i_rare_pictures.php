
<link href="https://www.srilaprabhupadalila.org/css/lightgallery.css?css" rel="stylesheet">

<section id="experience" class="parallax-section">
     <div class="container">
          <div class="row">

               

               <div class="col-md-12 col-sm-12">
                    <div class="color-white experience-thumb">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.1s">
                              <h1>Srila Prabhupada's Rare Pictures</h1>
                              
                         </div>

                         <div class="wow fadeInUp color-white media" data-wow-delay="0.2s">
                            <div class="demo-gallery">
                                <ul id="lightgallery" class="list-unstyled row">
                                <?php 

                                    $date1=date_create(date("Y") . "-01-01");   // 1st of Jan
                                    $date2=date_create(date("Y-m-d"));          // Today's date
                                    
                                    $diff=date_diff($date1,$date2); 
                                    $numberOfDays =  $diff->format("%R%a ");
                                    $numberOfDays = intval($numberOfDays);

                                    $numberOfDays = $numberOfDays * 3;

                                    for($i = 1; $i >= 1; $i--)
                                    {
                                        $img_count = $numberOfDays + $i;
                                        if($img_count > 367) 
                                            $img_count = $img_count % 367;
                                        
                                        $img_count = str_pad($img_count, 3, '0', STR_PAD_LEFT);

                                        
                                        $display1_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/rare_picture/xxxhdpi/RP". $img_count .".png";

                                        $display2_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/sp_today/xxxhdpi/SPT". $img_count .".png";
                                   
                                        $display3_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/lila_smaran_1/xxxhdpi/LSO". $img_count .".png";

                                        $display4_photo = "https://anvfnzuaen.cloudimg.io/cdno/n/webp/https://sppb.blob.core.windows.net/images/lila_smaran_2/xxxhdpi/LST". $img_count .".png";

                                       

                                ?> 
                                
                                             <li class="col-xs-6 col-sm-4 col-md-3"  data-src="<?=$display1_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="<?=$display1_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="<?=$display2_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="<?=$display2_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="<?=$display3_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="<?=$display3_photo?>"> 
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-3"  data-src="<?=$display4_photo?>" >
                                                    <a href="">
                                                    <img class="img-responsive" src="<?=$display4_photo?>"> 
                                                    </a>
                                                </li>

                                       
                                        
                                
                                <?php 
                                         // End of If 
                                    } // End of For-loop 1
                                ?>
                                </ul>
                            </div><!--    demo-gallery -->
                         </div>

                         

                    </div>
               </div>

          </div>
     </div>
</section>

<script src="https://sppbcdn.azureedge.net/files/js/lightgallery-all.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
});
</script>

