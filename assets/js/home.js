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
        $(".team_container_content_title").html(content["team"][class_named].title);
        $(".team_container_content_sub_title").html(content["team"][class_named].subtitle);
        $(".team_container_content_desc").html(content["team"][class_named].desc);
        $(".team_image").attr("src", content["team"][class_named].image);
        $(".team_icon_"+class_named).attr("src", content["team"][class_named].icon);
        let splitter = content["team"][class_named][0].social_icons.split(", ");
        let url = content["team"][class_named][0].social_icons_url.split(", ");
        let social_icons = "";
        for (let i=0; i<splitter.length; i++){
            social_icons += "<a href='"+ url[i] +"'><i class='fa fa-"+ splitter[i] +"'></i></a>";
        }
        $(".team_social_icons").html(social_icons);
    });
});


$(".cards").children("figure").on("click", function(){
    $(this).parent().children("figure").removeClass("active");
    $(this).addClass("active");
});
