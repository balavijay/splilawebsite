$(function() {

    var selectedClass = "";

    $(".fil-cat").click(function() {

        if ($(this).attr("data-rel") == "All") {
            $(".Snippets").show();
            $(".Vignettes").show();
            $(".Episodes").show();

        } else {

            selectedClass = $(this).attr("data-rel");
            $(".Snippets").hide();
            $(".Vignettes").hide();
            $(".Episodes").hide()
            $("." + selectedClass).show();

        }

    });


    $("font").removeProp("face");
    $("font").removeProp("size");
    $("font").removeProp("color");
    $("font").prop("class", "fontclass");

    call_from_function = false;
    call_hash_bang_logic();




});


function call_hash_bang_logic() {

    var hash = location.hash;

    if (hash) {

        parts = hash.split('/');

        if (parts.length == 1) {
            // Level 1 checking if #location #devotees #qualities #topics

            if (parts[0] == "#location" || parts[0] == "#devotees" || parts[0] == "#qualities" || parts[0] == "#topics") {

                $(parts[0]).trigger("click"); //Tab Level 1 call
            }

        } else if (parts.length == 4) {
            // Level 2 - converting #/memories-by-location/ahmedabad-india/5047 into #location

            var current_name = parts[1].split('-');

            if (current_name[2] == "location")
                current_name[2] = "#location";
            else if (current_name[2] == "devotee")
                current_name[2] = "#devotees";
            else if (current_name[2] == "quality")
                current_name[2] = "#qualities";
            else if (current_name[2] == "topic")
                current_name[2] = "#topics";

            if (current_name[2] == "#location" || current_name[2] == "#devotees" || current_name[2] == "#qualities" || current_name[2] == "#topics") {
                $(current_name[2]).trigger("click");
                load_listing(hash.substring(1)); //Tab Level 2 call
            }
        } else if (parts.length == 6) {
            // Level 3 - converting #/location/ahmedabad-india/srila-prabhupada-charms-everyone-in-meeting/5047/8553 into  #location & #/memories-by-location/ahmedabad-india/5047

            var level1;
            var level2;
            level1 = parts[1];

            if (level1 == "location") {
                level1 = "#location";
                level2 = "/memories-by-location/";
            } else if (level1 == "devotee") {
                level1 = "#devotees";
                level2 = "/memories-by-devotee/";
            } else if (level1 == "quality") {
                level1 = "#qualities";
                level2 = "/memories-by-quality/";
            } else if (level1 == "topic") {
                level1 = "#topics";
                level2 = "/memories-by-topic/";
            }

            if (level1 == "#location" || level1 == "#devotees" || level1 == "#qualities" || level1 == "#topics") {
                $(level1).trigger("click");
                load_listing(level2 + parts[2] + "/" + parts[4]);
                load_memory_read_content(hash.substring(1)); //Tab Level 3 call

            }
        }
    }
}

$(".nav-tabs li").click(function() {

    $(this).siblings().removeClass("active");
    $(this).addClass("active");

    var tabname = $(this).attr("data-tabname");
    $("#" + tabname).siblings().hide();
    $("#" + tabname).show();

    // Hash bang logic 
    hash = location.hash;

    if ("#" + $(this).attr("id") != hash)
        location.hash = $(this).attr("id");


    scrolltotitle("#memory-title");

});



function load_listing(memory_by_url) {

    var memory_by_array = memory_by_url.split("/");
    var current_tab = memory_by_array[1];

    $("#" + current_tab + "_home").hide();
    $("#" + current_tab + "_inner").hide();
    $("#" + current_tab + "_read").hide();

    $("#" + current_tab + "_inner").html("<div class='memory-loader'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><span >Loading...</span></div>");
    $("#" + current_tab + "_inner").show();

    scrolltotitle("#memory-title");


    /// Hash Bang logic
    location.hash = memory_by_url;

    var ajax_url = "/memory_listing.php?q=" + memory_by_url;

    var jqxhr = $.get(ajax_url, function(data) {

        $("#" + current_tab + "_inner").html(data);
        scrolltotitle("#memory-title");

    });


}


function load_memory_read_content(memory_by_url) {
    var memory_by_array = memory_by_url.split("/");

    current_tab = memory_by_array[1];


    $("#memories-by-" + current_tab + "_home").hide();
    $("#memories-by-" + current_tab + "_inner").hide();
    $("#memories-by-" + current_tab + "_read").hide();

    $("#memories-by-" + current_tab + "_read").html("<div class='memory-loader'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><span >Loading...</span></div>");
    $("#memories-by-" + current_tab + "_read").show();

    scrolltotitle("#memory-title");

    /// Hash Bang logic
    location.hash = memory_by_url;

    var ajax_url = "/memory_read.php?q=" + memory_by_url;

    var jqxhr = $.get(ajax_url, function(data) {

        $("#memories-by-" + current_tab + "_read").html(data);
        scrolltotitle("#memory-title");
    });
}



function load_memory_by(memory_by_url) {

    $("#memories-by-" + memory_by_url + "_home").show();
    $("#memories-by-" + memory_by_url + "_inner").hide();
    $("#memories-by-" + memory_by_url + "_read").hide();

    if (memory_by_url == "devotee")
        memory_by_url = "devotees";
    else if (memory_by_url == "quality")
        memory_by_url = "qualities";
    else if (memory_by_url == "topic")
        memory_by_url = "topics";

    location.hash = memory_by_url;
    scrolltotitle("#memory-title");

}

function load_memory_cat(memory_by_url) {

    $("#memories-by-" + memory_by_url + "_home").hide();
    $("#memories-by-" + memory_by_url + "_inner").show();
    $("#memories-by-" + memory_by_url + "_read").hide();

    if (memory_by_url == "devotee")
        memory_by_url = "devotees";
    else if (memory_by_url == "quality")
        memory_by_url = "qualities";
    else if (memory_by_url == "topic")
        memory_by_url = "topics";

    location.hash = memory_by_url;
    scrolltotitle("#memory-title");



}



function scrolltotitle(scrollobj) {
    var view_position = $(scrollobj).position().top;

    if (view_position)
        $("HTML, BODY").animate({ scrollTop: view_position }, 500);
}