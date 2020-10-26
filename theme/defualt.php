<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo $css_path ?>">
    <link rel="stylesheet" type="text/css" href="../css/gen-header.css">
    <link rel="stylesheet" type="text/css" href="../css/defaults.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/gen-footer.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="clickmenu">
    <i class="fa fa-bars"></i>
</div>
<div class="menu">
    <i class="fa fa-close"></i>
    <div class="men-reponse">
        <ul>
            <li onmouseenter="hideactive2()" onmouseleave="showactive()" id="def-active2" class="active2"><a
                        href="#">خانه</a></li>
            <li onmouseenter="hideactive2()" onmouseleave="showactive2()"><a href="#">مدرسه</a></li>
            <li onmouseenter="hideactive2()" onmouseleave="showactive2()"><a href="#">علامه</a></li>
            <li onmouseenter="hideactive2()" onmouseleave="showactive2()"><a href="#">برنامه</a></li>
            <li onmouseenter="hideactive2()" onmouseleave="showactive2()"><a href="#">ماشین</a></li>
        </ul>
    </div>
    <div class="circles-responive">
        <div class="courses-res">
            <h4>دوره های شما</h4>
            <h3>20</h3>
        </div>
        <div class="questions-res">
            <h4>سوالات شما</h4>
            <h3>123</h3>
        </div>
        <div class="projects-res">
            <h4>پروژه های شما</h4>
            <h3>4</h3>
        </div>
    </div>
    <hr class="seprateCourseres">
    <div class="copy-right-res">
        <p>کپی از این سایت تنها با ذکر منبع مجاز میباشد</p>
    </div>
    <hr class="seprateCourseres">
    <div class="social-res">
        <ul>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-telegram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
    </div>
</div>
<div class="body" id="body">
    <div class="logout" onmouseleave="doeshide()">
        <h4>خارج شوید</h4>
        <i class="fa fa-sign-out"></i>
    </div>
    <header>
        <nav id="menu">
            <ul>
                <li onmouseenter="hideactive()" onmouseleave="showactive()" id="def-active" class="top-menu active"><a
                            href="#">خانه</a></li>
                <li onmouseenter="hideactive()" onmouseleave="showactive()" class="top-menu"><a href="#">مدرسه</a></li>
                <li onmouseenter="hideactive()" onmouseleave="showactive()" class="top-menu"><a href="#">علامه</a></li>
                <li onmouseenter="hideactive()" onmouseleave="showactive()" class="top-menu"><a href="#">برنامه</a></li>
                <li onmouseenter="hideactive()" onmouseleave="showactive()" class="top-menu"><a href="#">ماشین</a></li>
            </ul>
        </nav>
    </header>
    <div class="d-l">
        <div class="light-dark">
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
	<?php echo $content ?>
</div>
<footer class="footer">
    <div class="footer-container">
        <div class="quick">
            <h3>دسترسی سریع</h3>
            <ul>
                <li><a href="#">دوره های عالی</a></li>
                <li><a href="#">صفحه های عالی</a></li>
                <li><a href="#">سوالات عالی</a></li>
                <li><a href="#">نظرات عالی</a></li>
                <li><a href="#">آموزش های عالی</a></li>
            </ul>
        </div>
        <div class="aboutus">
            <h3>درباره ما</h3>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شکاربردهای متنوع با هدف بهبود
                ابزارهای کاربردی می باشد. کتابهای زیادی در ش</p>
        </div>
        <div class="contactus">
            <h3>ارتباط با ما</h3>
            <p>تلفن : 0912242242355</p>
            <p>آدرس : سعادت آباد - خ 25 - طبقه 2</p>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="285" height="227" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=pardis%20noor&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://fmovies2.org">fmovies</a></div>
                <style>.mapouter {
                        position: relative;
                        text-align: right;
                        height: 227px;
                        width: 285px;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 227px;
                        width: 285px;
                    }</style>
            </div>
        </div>
        <div class="copy-right">
            <div class="copy">
                <p>© استفاده از مطالب سایت تنها با درج لینک مستقیم به آن مطلب مجاز است.</p>
            </div>
            <div class="social">
                <ul>
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-instagram"></i></li>
                    <li><i class="fa fa-pinterest"></i></li>
                    <li><i class="fa fa-telegram"></i></li>
                    <li><i class="fa fa-whatsapp"></i></li>
                </ul>
            </div>
        </div>
</footer>
<script src="../js/gen-header.js"></script>
</body>
</html>
