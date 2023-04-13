//Document ready
$(document).ready(function(){
    //Division_2 what customers are saying
    if (window.matchMedia("(max-width: 920px)").matches === false) {
        $(".division_2") > $(".active").next().css({ top: '-2rem' });
        $(".division_2") > $(".active").next().next().css({ top: '-4rem' });
        $(".division_2") > $(".active").next().next().next().css({ top: '-6rem' });
    }
});



//Testimonial
$(".team_container_icon").on("click", function(){
    $(this).parent().children(".team_container_icon").removeClass("active");
    $(this).addClass("active");
    let class_named = parseInt($(this).attr('class').split(' ')[1].replace("slide_", "")) - 1;
    $.get("api.json", function(content) { 
        $(".team_container_content_title").html(content[class_named].title);
        $(".team_container_content_sub_title").html(content[class_named].sub_title);
        $(".team_container_content_desc").html(content[class_named].desc);
    });
});


$(".cards").children("figure").on("click", function(){
    $(this).parent().children("figure").removeClass("active");
    $(this).addClass("active");
});
