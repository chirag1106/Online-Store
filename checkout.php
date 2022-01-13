
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
    ?>
        <div class="cart">
            <form action="" method="post" enctype="multipart/form-data">
                    <?php echo checkout(); ?>
                </table>
                <div id="checkout">
                    <p>Pay Via.....</p>
                    <button name="cod" value=""><a href='#'>Cash On Delivery (COD)</a></button>
                    <button><a href='#'>Debit Card</a></button>
                    <button><a href='#'>Credit Card</a></button>
                    <button><a href='#'>Net Banking</a></button>
                </div>
            </form>
        </div>
    <?php
        include("./inc/footer.php");
    ?>
        
       
    ?>
</body>
</html>
