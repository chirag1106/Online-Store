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
        
        echo "<div id='bodyleft'>"; 
            cat_name(); sub_cat_name(); birthday_name(); all_about_men_name();
            all_about_women_name(); all_about_kids_name();
            echo"<ul>";  
                cat_details(); sub_cat_details(); birthday(); all_about_men();
                all_about_women(); all_about_kids(); 
            echo"</ul>
        </div>";

        if(isset($_GET['cat_id']) or isset($_GET['sub_cat_id']) ){
            echo "<div id='bodyright'>"; 
                echo"<ul>";  
                    viewall_sub_cat(); viewall_cat(); 
                echo"</ul>
            </div><br clear='all'>";
        }
        else{
            include("./inc/bodyright.php");
        }

        include("./inc/footer.php");
    ?>
</body>
</html>