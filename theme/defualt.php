<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo $css_path ?>">
    <link rel="stylesheet" type="text/css" href="../css/gen-header.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/gen-header.js"></script>
</head>
<body>
<div class="body">
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

</body>
</html>
