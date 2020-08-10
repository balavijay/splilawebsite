$("font").removeProp("face");
$("font").removeProp("size");
$("font").removeProp("color");
$("font").prop("class", "fontclass");
$(".cr_more span").removeProp("style");

$(document).ready(function() {


    container_height = $('.cr_more').attr('data-crheight');
    if (container_height == undefined)
        container_height = 330; //default value

    var cr_moretext = "Read More";
    var lesstext = "";
    $('.cr_more').each(function() {
        var content_height = $(this).height();
        if (content_height > container_height) {

            $(this).height(container_height - 30 + "px").css("overflow", "hidden");
            $(this).siblings(".cr_showhide").html(cr_moretext).css("display", "block");

        }
    });
    $(".cr_showhide").click(function() {

        $(this).siblings(".cr_more").height("auto").css("overflow", "visible");
        $(this).hide();

        return false;
    });

});