<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Hello world</title>
</head>
<body>
<h1 style="display: block; margin: 0 auto">Hello world</h1>
<p>
    <?php
    require_once "system/config.php";
    require_once "mvc/model/judge.php";
    require_once "system/db.php";
    var_dump(JudgeModel::getStatusByProbId(1));
    ?>
</p>
<h2> salam </h2>
</body>
</html>