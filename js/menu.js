$(".menutop-right").click(function(event) {
    $("#myTopnav").toggle();
    event.stopPropagation();

    if (screen.width > 767) {
        var position = $(this).offset();
        $("#myTopnav").offset({ top: position.top + 27, left: position.left - 268 });
    }
});


$("body").click(function(event) {
    // $("#myTopnav").hide();
    if ($("#myTopnav").css("display") == "block") {
        $("#myTopnav").hide();
        event.stopPropagation();
    }
});

$("#myTopnav").click(function(event) {
    event.stopPropagation();
});

$("#myTopnav a").click(function(event) {
    $("#myTopnav").hide();
    event.stopPropagation();
});


function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    // Android detection 
    if (/android/i.test(userAgent)) {
        $(".openAndriod").show();
        $(".footerNew").hide();
    }

    // iOS detection 
    else if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        $(".openApple").show();
        $(".footerNew").hide();
    }

    else {
        $(".footerNew").show();
    }


}

getMobileOperatingSystem();


$(window).scroll(function() {


    if ($(window).scrollTop() == 0) {
        $(".gototop").hide();
        $(".gotodown").show();
    } else {
        $(".gototop").show();
        $(".gotodown").hide();
    }

});

$(".gotodown").click(function() {
    // $(window).scrollTop(  + 200 );
    $("HTML, BODY").animate({ scrollTop: $(window).scrollTop() + 420 }, 1000);
});
$(".gototop").click(function() {
    //$(window).scrollTop( 0 );
    $("HTML, BODY").animate({ scrollTop: 0 }, 1000);
});