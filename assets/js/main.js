//Document ready
$("document").ready(function(){
    //If window matches 920px screen
    if (window.matchMedia("(max-width: 920px)").matches === true) {
        $("body").append('<i class="fa fa-bars" onclick="nav(this.className)"></i>');
    }
});


//Nav
$(".drop_down").on("click", function(){
    if ($(".drop_down_content").is(":visible")){
        $(".drop_down_content").hide("slow");
    }
    $(this).children(".drop_down_content").is(":visible") ? 
    $(this).children(".drop_down_content").hide("slow") :
    $(this).children(".drop_down_content").show("slow");
});

function nav(x){
    if(x.match(/fa-times/g)){
        $(".fa-times").hide().addClass("fa-bars").fadeIn("slow");
        $(".fa-times").removeClass("fa-times");
        $("nav section:nth-child(2)").css("left","-300px");
        $("nav section:nth-child(3)").css("left","-300px");
    } else {
        $(".fa-bars").hide().addClass("fa-times").fadeIn("slow");
        $(".fa-bars").removeClass("fa-bars");
        $("nav section:nth-child(2)").css("left","0");
        $("nav section:nth-child(3)").css("left","0");
    }
}


