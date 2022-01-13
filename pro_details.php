

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Right Choice</title>

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel=icon href=./imgs/logo3.png sizes="16x16" type="image/png">

</head>
<body> 
    
    <?php
        include("./inc/function.php");
        include("./inc/header.php");
        include("./inc/navbar.php");
        echo pro_details();
        include("./inc/footer.php");
    ?>

</body>
</html>