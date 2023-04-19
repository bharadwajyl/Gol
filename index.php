<?php
@include_once("./admin/db.php");
$content = array();
$result_nav = $conn->query("SELECT * FROM gol_nav");
$result_header = $conn->query("SELECT * FROM gol_header");
$result_team = $conn->query("SELECT * FROM gol_team");
if ($result_header->num_rows > 0) {
    while($row = $result_header->fetch_assoc()) {
        $header_tag = "".$row["header_tag"]."";
        $header_title = "".$row["title"]."";
        $header_image = "".$row["header_image"]."";
        $header_button_text = "".$row["button_text"]."";
        $header_button_link = "".$row["button_link"]."";
    }
}

if ($result_team->num_rows > 0) {
    while($row = $result_team->fetch_assoc()) {
        $content[team][] = array(
            "title"  =>  "".$row["title"]."", 
            "subtitle"  =>  "".$row["subtitle"]."", 
            "desc"      =>   "".$row["description"]."",
            "image"      =>   "".$row["image"]."",
            "icon"      =>   "".$row["icon"]."",
            array("social_icons"      =>   "".$row["social_icons"]."",
            "social_icons_url"      =>   "".$row["social_icons_url"]."")
        );
    }
}
file_put_contents("api.json", json_encode($content));
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>A Government Authorized Travel Agent</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!--META TAGS-->
<meta charset="UTF-8" />
<meta name="language" content="ES" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/home.css" />
<link rel="stylesheet" href="assets/css/animate.css" />

<body>

<!--NAV-->
<nav class="flex">
    <section class="padding_1x">
        <img src="assets/images/logo.png" alt="" class="logo" />
    </section>
    <section class="padding_1x flex">
        <?php
        if ($result_nav->num_rows > 0) {
            while($row = $result_nav->fetch_assoc()) {
                if ("".$row["dropdown_nav"]."" == ""){
                    print("<a href='".$row['nav_url']."'>".$row['non_dropdown_nav']."</a>");
                } else{
                    $count = 0;
                    $dd_content = "";
                    $dd_nav = explode(", ", "".$row['dropdown_nav_content']."");
                    $nav_url = explode(", ", "".$row['nav_url']."");
                    foreach ($dd_nav as $d_nav){
                        $dd_content .= "<li><a href='$nav_url[$count]'>$d_nav</a></li>";
                        $count++;
                    }
                    print("
                        <aside class='drop_down'> <b>".$row['dropdown_nav']."</b>
                            <ul class='drop_down_content'>
                                $dd_content
                            </ul>
                        </aside>
                    ");
                }
            }
        }
        ?>
    </section>
    <section class="padding_1x">
        <a href="#">LogIn</a>
        <a href="#" class="btn btn_1">SignUp</a>
    </section>
</nav>


<!--HEADER-->
<header class="flex">
    <section class="flex_content padding_2x">
        <article class="padding_2x">
            <span class="tag medium"><?php print($header_tag) ?> <i class="fa fa-compass"></i></span>
            <h1 class="title big"><?php print($header_title) ?></h1>
            <a href="<?php print($header_button_link) ?>" class="btn btn_2"><?php print($header_button_text) ?></a>
        </article>
    </section>
    <section class="flex_content padding_2x">
        <figure>
            <img src="<?php print($header_image) ?>" alt="" loading="lazy" />
        </figure>
    </section>
</header>


<!--MAIN-->
<main>
    <!--division_1-->
    <div class="divisions division_1 padding_2x">
        <div class="title_header padding_1x">
            <h2 class="sub_title medium">Our Team</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
        </div>
        <div class="team_container padding_2x">
            <section class="team_container_icons padding_2x">
                <figure class="team_container_icon slide_1 active">
                    <img src="assets/images/testimonial/author/01.jpg" alt="" class="team_icon_0" />
                </figure>
                <figure class="team_container_icon slide_2">
                    <img src="assets/images/testimonial/author/01.jpg" alt="" class="team_icon_1" />
                </figure>
                <figure class="team_container_icon slide_3">
                    <img src="assets/images/testimonial/author/01.jpg" alt="" class="team_icon_2" />
                </figure>
                <figure class="team_container_icon slide_4">
                    <img src="assets/images/testimonial/author/01.jpg" alt="" class="team_icon_3" />
                </figure>
            </section>
            <section class="team_container_contents flex">
                <figure class="flex flex_content active">
                    <img src="assets/images/testimonial/02.jpg" alt="" loading="lazy" class="team_image flex_content" />
                    <figcaption class="flex_content">
                        <h3 class="title team_container_content_title  small">Sebastian Bennett</h3>
                        <strong class="sub_title team_container_content_sub_title">Founder, Lead Photographer, CEO</strong>
                        <p class="team_container_content_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <aside class="team_social_icons fixed_flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </aside>
                    </figcaption>
                </figure>
            </section>
        </div>
    </div>
    
    <!--division_2-->
    <div class="divisions division_2 padding_4x">
        <div class="title_header padding_1x">
            <h2 class="sub_title medium">What customer's are saying?</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
        </div>
        <section class="cards flex">
            <figure class="active">
                <img src="assets/images/testimonial/01.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/testimonial/02.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/testimonial/03.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/testimonial/04.jpg" alt="" loading="lazy" />
            </figure>
            <aside class="testimonial fixed_flex padding_1x">
                <img src="assets/images/testimonial/author/01.jpg" alt="" />
                <h3>"Great place to spend your vacation while exploring different  experiences."</h3>
            </aside>
        </section>
    </div>
    
    <!--division_3-->
    <div class="divisions division_3 padding_2x">
        <div class="title_header padding_1x">
            <h2 class="sub_title medium">Certificate</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
        </div>
        <section class="flex padding_2x">
            <figure>
                <img src="assets/images/certificate/01.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/certificate/01.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/certificate/01.jpg" alt="" loading="lazy" />
            </figure>
            <figure>
                <img src="assets/images/certificate/01.jpg" alt="" loading="lazy" />
            </figure>
        </section>
    </div>
    
    <!--division_4-->
    <div class="divisions division_4">
        <div class="flex">
            <section class="flex_content padding_2x">
                <h1 class="title medium">Download Our App</h1>
                <p>The best travel in the world</p>
                <a href="#" class="btn btn_1 g_play fixed_flex">
                    <img src="assets/images/play_store.png" alt="" />
                    <aside>
                        GET IT ON
                        <b>Google Play</b>
                    </aside>
                </a>
            </section>
            <section class="flex_content padding_2x">
                <figure>
                    <img src="assets/images/mobile_frame.png" alt="" loading="lazy" />
                </figure>
            </section>
        </div>
    </div>
</main>



<!--FOOTER-->
<footer class="padding_2x">
    <div class="flex">
        <section class="flex_content padding_2x">
            <img src="assets/images/icon.png" alt="" class="logo" />
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <aside class="fixed_flex">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </aside>
        </section>
        <section class="flex_content padding_2x">
            <h3>Company</h3>
            <a href="#">Events</a>
            <a href="#">Blogs</a>
            <a href="#">FAQ</a>
            <a href="#">Join Us</a>
        </section>
        <section class="flex_content padding_2x">
            <h3>About</h3>
            <a href="#">Project</a>
            <a href="#">Lorem</a>
            <a href="#">Services</a>
            <a href="#">Our Story</a>
        </section>
        <section class="flex_content padding_2x">
            <h3>Contact Us</h3>
            <a href="emailto:abc@lorem.com">abc@lorem.com</a>
            <a href="#">India</a>
        </section>
    </div>
    <div class="padding_1x">
        <strong>copyright © 2023 Gol Travels PVT.LTD</strong>
    </div>
</footer>


<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/home.js"></script>
</body>
</html>
