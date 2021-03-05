<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--    <h2>--><?//=generateRandomEmail(generateRandomName())?><!--</h2>-->
    <?php
        $randomName = generateRandomName();
        $randomEmail = generateRandomEmail($randomName);
        $randomCode = generateCode();

        echo "<h1>$randomName</h1>" .
            "<h2>$randomEmail</h2>" .
            "<p>$randomCode</p>";
    ?>
</body>
</html>