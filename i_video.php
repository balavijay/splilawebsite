
<style>

		.img-responsive {	
			padding-right: 20px;
			cursor: pointer;
		}		
		.video-responsive {
			width: 640px;
			height: 360px;
			
		}

		.bluelink, .bluelink:hover, .bluelink:visited  {
			color: blue;
			padding: 20px;
		}
		 

		@media(max-width:768px) {
            .img-responsive  {
                max-width:100%;
                padding:0px !important;
			}
			.video-responsive {
				width: 100%;
				height: 300px;	
			}
			
        }
	</style>

<script type="text/javascript">

		var thumbnail_click =   function(video_id, container_id){

		
			var img = "#vimg_" + container_id;
			
			
			var i_width = $(img).width();
			var i_height = $(img).height();

			var iframe = document.createElement('iframe');
			iframe.id = "vframe_" + container_id;
			
			iframe.width = i_width;
			iframe.height = i_height;
			iframe.frameborder = 0;
			iframe.allow='autoplay'

			var data_href = $(img).attr("data-href");
			$(img).attr("src", "");
			

			$( iframe ).insertAfter( "#thumbnail_click_" +  container_id );
			$( "#thumbnail_click_" +  container_id ).remove();
			var final_video_url = "https://www.youtube.com/embed/" + video_id + "?autoplay=1&rel=0";
			
			
			$("#vframe_" + container_id).attr("src", final_video_url );
			
			if(data_href)
			$("#vframe_" + container_id).after("<a href='"+ data_href +"' class='bluelink' target='_blank'>Click to open in New tab</a>")

		}; 



	</script>