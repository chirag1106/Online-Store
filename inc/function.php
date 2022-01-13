<?php
   
    function getIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
 
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $ip;
    }

    function add_cart(){
        include("./inc/db.php");
        if(isset($_POST['cart_btn'])){
            $pro_id = $_POST['pro_id'];
            $ip = getIp();
            $add_cart = $con->prepare("insert into cart(pro_id, qty, ip_add) values('$pro_id', '1', '$ip') ");
            
            $check_cart = $con->prepare("select * from cart where pro_id = '$pro_id' and ip_add = '$ip' ");
            $check_cart->execute();

            $row_check = $check_cart->rowCount();

            if($row_check == 1){
                echo "<script>alert('This Product Already Added In Your Cart')</script>";
            }
            else{
                if($add_cart->execute()){
                    echo "<script>alert('Added To Cart !!!');</script>";
                    echo "<script>window.open('cart.php', '_self')</script>"; 
                }
                else{
                    echo "<script>alert('TRY AGAIN !!!')</script>";
                }
            } 
        }
    }

    // header.php function
    function cart_count(){
        include("./inc/db.php");
        $ip = getIp();
        $get_cart_item = $con->prepare("select * from cart where ip_add = '$ip' ");
        $get_cart_item->execute();

        $count_cart_item = $get_cart_item->rowCount();

        echo $count_cart_item;
    }

    function cart_display(){
        include("./inc/db.php");
        $ip = getIp();
        $get_cart_item = $con->prepare("select * from cart where ip_add = '$ip'");
        $get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cart_item->execute();

        $cart_empty = $get_cart_item->rowCount();
        if($cart_empty == 0){
            echo"<center><h2>No Product Found In Cart <a href='index.php'>Continue Shoping</a></h2></center>";    
        }
        else{
            if(isset($_POST['up_qty'])){
                $quantity = $_POST['qty'];

                foreach($quantity as $key=>$value){
                    $update_qty = $con->prepare("update cart set qty = '$value' where cart_id = '$key' ");
                    if($update_qty->execute()){
                        echo"<script>window.open('cart.php', '_self')</script>";
                    }
                }

            }
            echo"<table cellspacing='0' cellpadding='0'>
            <tr>
                <th>Image</th>
                <th width='50%'>Product Name</th>
                <th width='15%'>Quantity</th>
                <th width='10%'>Price</th>
                <th>Remove</th>
                <th>Sub Total</th>
            </tr>";
            $net_total = 0;
            while($row_cart = $get_cart_item->fetch()) :
                $pro_id = $row_cart['pro_id']; 
                $product = $con->prepare("select * from products where pro_id = '$pro_id' ");
                $product->setFetchMode(PDO:: FETCH_ASSOC);
                $product->execute();
                $row_product = $product->fetch();
                echo"<tr>
                        <td><img src='./imgs/pro_img/".$row_product['pro_img1']."'</td>
                        <td>".$row_product['pro_name']."</td>
                        <td><input type='text' name='qty[".$row_cart['cart_id']."]' value='".$row_cart['qty']."'/>
                        <input type='submit' name='up_qty' value='Save' /></td>
                        <td>".$row_product['pro_price']."</td>
                        <td><a href='delete.php?delete_id=".$row_product['pro_id']."'>Delete</a></td>
                        <td>"; 
                            $qty = $row_cart['qty'];
                            $pro_price = $row_product['pro_price'];
                            $sub_total = $pro_price* $qty;
                            echo $sub_total;
                            $net_total = $net_total + $sub_total;
                    echo"</td>
                    </tr>";
            endwhile;
            echo"<tr>
                    <td></td>
                    <td><button id=''><a href='./index.php'>Continue Shopping</a></button></td>
                    <td><button><a href='./checkout.php'>Checkout</a></button></td>
                    <td></td><td><b>Net Total = </b></td>
                    <td><b> $net_total</b></td>
                </tr>";
        }
    }

    function checkout(){
        include("./inc/db.php");
        $ip = getIp();
        $get_cart_item = $con->prepare("select * from cart where ip_add = '$ip'");
        $get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cart_item->execute();

        $cart_empty = $get_cart_item->rowCount();
        if($cart_empty == 0){
            echo"<center><h2>No Product Found In Cart <a href='index.php'>Continue Shoping</a></h2></center>";    
        }
        else{
            if(isset($_POST['up_qty'])){
                $quantity = $_POST['qty'];

                foreach($quantity as $key=>$value){
                    $update_qty = $con->prepare("update cart set qty = '$value' where cart_id = '$key' ");
                    if($update_qty->execute()){
                        echo"<script>window.open('cart.php', '_self')</script>";
                    }
                }

            }
            echo"<table cellspacing='0' cellpadding='0'>
            <tr>
            <th>Image</th>
            <th width='50%'>Product Name</th>
            <th width='15%'>Quantity</th>
            <th width='10%'>Price</th>
            <th>Remove</th>
            <th>Sub Total</th>
            </tr>";
            $net_total = 0;
            while($row_cart = $get_cart_item->fetch()) :
                $pro_id = $row_cart['pro_id']; 
                $product = $con->prepare("select * from products where pro_id = '$pro_id' ");
                $product->setFetchMode(PDO:: FETCH_ASSOC);
                $product->execute();
                $row_product = $product->fetch();
                echo"<tr>
                        <td><img src='./imgs/pro_img/".$row_product['pro_img1']."'</td>
                        <td>".$row_product['pro_name']."</td>
                        <td><input type='text' name='qty[".$row_cart['cart_id']."]' value='".$row_cart['qty']."'/>
                        <input type='submit' name='up_qty' value='Save' /></td>
                        <td>".$row_product['pro_price']."</td>
                        <td><a href='delete.php?delete_id=".$row_product['pro_id']."'>Delete</a></td>
                        <td>"; 
                            $qty = $row_cart['qty'];
                            $pro_price = $row_product['pro_price'];
                            $sub_total = $pro_price* $qty;
                            echo $sub_total;
                            $net_total = $net_total + $sub_total;
                    echo"</td>
                    </tr>";
            endwhile;
            echo"<tr>
                    <td></td>
                    <td><button id=''><a href='./index.php'>Continue Shopping</a></button></td>
                    <td></td>
                    <td></td><td><b>Net Total = </b></td>
                    <td><b> $net_total</b></td>
                </tr>";
        }
    }

    // delete.php function
    function delete_cart_item(){
        include("./inc/db.php");
        if(isset($_GET['delete_id'])){
            $del_pro_id = $_GET['delete_id'];
            $del_pro = $con->prepare("delete from cart where pro_id = '$del_pro_id'");
            if($del_pro->execute()){
                echo "<script>alert('Delete From Cart !!!')</script>";
                echo "<script>window.open('cart.php', '_self')</script>"; 
            }
            else{
                echo "<script>alert('TRY AGAIN !!!')</script>";
            }
        }
    }

    // bodyleft.php functions  
    function display_products(){
        include("./inc/db.php");

        $fetch_cat = $con->prepare("select * from main_cat LIMIT 0,4 ");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        

        while($row_cat= $fetch_cat->fetch()) :
        $cat_id = $row_cat['cat_id'];
        echo" <h3>".$row_cat['cat_name']."</h3> ";
        echo"<ul>";
        $fetch_pro = $con->prepare("select * from products where cat_id = '$cat_id' LIMIT 0,3");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();
        
        while($row_pro= $fetch_pro->fetch()) :
            echo"<li>
                    <form method='post' enctype='multipart/form-data' >
                    <a href='pro_details.php?pro_id=".$row_pro['pro_id']."' >
                        <h4>".$row_pro['pro_name']."</h4>
                        <img src='./imgs/pro_img/".$row_pro['pro_img1']."'/>
                        <center>
                            <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                            <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id'/>
                            <button id='pro_btn' name='cart_btn'>Cart</button>
                            <button id='pro_btn'><a href='#'>Wishlist</a></button>
                        </center>
                    </a>
                    </form>
                </li>
                ";
        endwhile;
        echo"</ul><br clear='all'/>   ";
        endwhile;
        
    }

    // pro_details.php function
    function pro_details(){
        include("./inc/db.php");
        if(isset($_GET['pro_id'])){
            $pro_id = $_GET['pro_id'];

            $fetch_pro = $con->prepare("select * from products where pro_id = '$pro_id'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();

            $row_pro = $fetch_pro->fetch();
            $pro_cat_id = $row_pro['cat_id'];

            echo"<div id='pro_parent'>
                    <div id='pro_img'>
                        <img src='./imgs/pro_img/".$row_pro['pro_img1']."'/>
                        <ul>
                            <li><img src='./imgs/pro_img/".$row_pro['pro_img1']."'/></li>
                            <li><img src='./imgs/pro_img/".$row_pro['pro_img2']."'/></li>
                            <li><img src='./imgs/pro_img/".$row_pro['pro_img3']."'/></li>
                            <li><img src='./imgs/pro_img/".$row_pro['pro_img4']."'/></li>
                        </ul>
                    </div>
                    <div id='pro_features'>
                        <h3>".$row_pro['pro_name']."</h3>
                        <ul>
                            <li>".$row_pro['pro_feature1']."</li>
                            <li>".$row_pro['pro_feature2']."</li>
                            <li>".$row_pro['pro_feature3']."</li>
                            <li>".$row_pro['pro_feature4']."</li>
                            <li>".$row_pro['pro_feature5']."</li>
                        </ul>
                        <ul>
                            <li>Model No : ".$row_pro['pro_model']."</li>
                            <li>Color :</li>
                            <li>In Box :</li>
                            <li>Warrenty : ".$row_pro['pro_warrenty']."</li> 
                            <li>Warrenty Type :</li>
                        </ul>
                        <br clear='all'>
                        <hr>
                        <center>
                            <h4>Selling Price : ".$row_pro['pro_price']."</h4>
                            <form method='post' action=''>
                                <input type='hidden' value='".$row_pro['pro_id']."' name='pro_id'/>
                                <button name='cart_btn'>Buy Now</button>
                                <button name='cart_btn'>Add To Cart</button>
                            </form>
                        </center>
                    </div>
                </div>
                
                <div id='sim_pro'>
                    <h3>Related Products</h3>
                    <ul>";
                        echo add_cart();
                        $sim_pro = $con->prepare("select * from products where pro_id != '$pro_id' AND cat_id = '$pro_cat_id' LIMIT 0,5 ");
                        $sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
                        $sim_pro->execute();
                        while($row_pro2 = $sim_pro->fetch()) :
                            echo"<li>
                                    <a href='pro_details.php?pro_id=".$row_pro2['pro_id']."'>
                                        <img src='./imgs/pro_img/".$row_pro2['pro_img1']."';
                                        <br>
                                        <p>".$row_pro2['pro_name']."</p>
                                        <p>Price: ".$row_pro2['pro_price']."</p>
                                    </a>
                                 </li>";
                        endwhile;
                echo"</ul>
                </div>";
        }
    }

    // navbar.php function
    function all_cat(){
        include("./inc/db.php");
        
        $all_cat = $con->prepare("select * from main_cat");
        $all_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $all_cat->execute();

        while($row_cat = $all_cat->fetch() ):
            echo"<li> <a href='cat_details.php?cat_id=".$row_cat['cat_id']."'>".$row_cat['cat_name']."</a> </li>";
        endwhile;
    }

    // cat_details.php functions
    function cat_name(){
        include("./inc/db.php");
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $cat_name = $con->prepare("select * from main_cat where cat_id = '$cat_id'");
            $cat_name->setFetchMode(PDO :: FETCH_ASSOC);
            $cat_name->execute();            

            $main_cat_name = $cat_name->fetch();
            echo"<h3>".$main_cat_name['cat_name']."</h3>";
        }    
    }
    
    function cat_details(){
        include("./inc/db.php");

        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $cat_pro = $con->prepare("select * from products where cat_id = '$cat_id'");
            $cat_pro->setFetchMode(PDO :: FETCH_ASSOC);
            $cat_pro->execute();

            while($row_cat= $cat_pro->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_cat['pro_id']."' >
                            <h4>".$row_cat['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_cat['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_cat['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    function viewall_sub_cat(){
        include("./inc/db.php");
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $sub_cat = $con->prepare("select * from sub_cat where cat_id = '$cat_id'");
            $sub_cat->setFetchMode(PDO::FETCH_ASSOC);
            $sub_cat->execute();
            echo"<h3>Sub-Categories</h3>";
            while($row_sub_cat = $sub_cat->fetch()) : 
                echo" <li><a href='cat_details.php?sub_cat_id=".$row_sub_cat['sub_cat_id']."'>".$row_sub_cat['sub_cat_name']."</a></li> ";
            endwhile;
        }
    }

    function sub_cat_name(){
        include("./inc/db.php");
        if(isset($_GET['sub_cat_id'])){
            $sub_cat_id = $_GET['sub_cat_id'];
            $sub_cat = $con->prepare("select * from sub_cat where sub_cat_id = '$sub_cat_id'");
            $sub_cat->setFetchMode(PDO :: FETCH_ASSOC);
            $sub_cat->execute();            

            $sub_cat_name = $sub_cat->fetch();
            echo"<h3>".$sub_cat_name['sub_cat_name']."</h3>";
        }    
    }

    function sub_cat_details(){
        include("./inc/db.php");

        if(isset($_GET['sub_cat_id'])){
            $sub_cat_id = $_GET['sub_cat_id'];
            $sub_cat_pro = $con->prepare("select * from products where sub_cat_id = '$sub_cat_id'");
            $sub_cat_pro->setFetchMode(PDO :: FETCH_ASSOC);
            $sub_cat_pro->execute();

            while($row_sub_cat= $sub_cat_pro->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_sub_cat['pro_id']."' >
                            <h4>".$row_sub_cat['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_sub_cat['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_sub_cat['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    function viewall_cat(){
        include("./inc/db.php");
        if(isset($_GET['sub_cat_id'])){
            $main_cat = $con->prepare("select * from main_cat ");
            $main_cat->setFetchMode(PDO::FETCH_ASSOC);
            $main_cat->execute();
            echo"<h3>Categories</h3>";

            while($row_cat = $main_cat->fetch()) : 
                echo" <li><a href='cat_details.php?cat_id=".$row_cat['cat_id']."'>".$row_cat['cat_name']."</a></li> ";
            endwhile;
        }
    }

    // birthday navbar
    function birthday_name(){
        include("./inc/db.php");
        if(isset($_GET['bd_men'])){
            echo" <h3>Birthday Gifts For Men</h3>";
        }
        if(isset($_GET['bd_women'])){
            echo" <h3>Birthday Gifts for Women</h3>";
        }
        if(isset($_GET['bd_kids'])){
            echo" <h3>Birthday Gifts For Kids</h3>";
        }
    }

    function birthday(){
        include("./inc/db.php");
        if(isset($_GET['bd_men'])){
            $fetch_pro = $con->prepare("select * from products where for_whom = 'men' OR for_whom= 'all'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();

            while($row_men = $fetch_pro->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_men['pro_id']."' >
                            <h4>".$row_men['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_men['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_men['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }

        if(isset($_GET['bd_women'])){
            $fetch_pro = $con->prepare("select * from products where for_whom = 'women' OR for_whom ='all' ");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();

            while($row_men = $fetch_pro->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_men['pro_id']."' >
                            <h4>".$row_men['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_men['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_men['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }

        if(isset($_GET['bd_kids'])){
            $fetch_pro = $con->prepare("select * from products where for_whom = 'kids' ");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();

            while($row_men = $fetch_pro->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_men['pro_id']."' >
                            <h4>".$row_men['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_men['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_men['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    // gift for him navbar
    function all_about_men_name(){
        include("./inc/db.php");
        if(isset($_GET['men_watch'])){
            echo" <h3>Watches For Men</h3>";
        }
        if(isset($_GET['men_belt'])){
            echo" <h3>Belts For Men</h3>";
        }
        if(isset($_GET['men_perfumes'])){
            echo" <h3>Perfumes For Men</h3>";
        }
    }

    function all_about_men(){
        include("./inc/db.php");
        if(isset($_GET['men_watch'])){
            $men_watch = "watch";
            $watch = $con->prepare("select * from products where for_whom = 'men' and pro_name like '%$men_watch%' ");
            $watch->setFetchMode(PDO:: FETCH_ASSOC);
            $watch->execute();

            while($row_watch = $watch->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_watch['pro_id']."' >
                            <h4>".$row_watch['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_watch['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }

        if(isset($_GET['men_belt'])){
            $men_belt = "belt";
            $belt = $con->prepare("select * from products where for_whom = 'men' and pro_name like '%$men_belt%' ");
            $belt->setFetchMode(PDO:: FETCH_ASSOC);
            $belt->execute();

            while($row_belt = $belt->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_belt['pro_id']."' >
                            <h4>".$row_belt['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_belt['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
        if(isset($_GET['men_perfumes'])){
            $men_perfumes = "perfume";
            $perfumes = $con->prepare("select * from products where for_whom = 'men' and pro_name like '%$men_perfumes%' ");
            $perfumes->setFetchMode(PDO:: FETCH_ASSOC);
            $perfumes->execute();

            while($row_perfume = $perfumes->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_perfume['pro_id']."' >
                            <h4>".$row_perfume['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_perfume['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_perfume['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    // gift for her navbar
    function all_about_women_name(){
        include("./inc/db.php");
        if(isset($_GET['women_watch'])){
            echo" <h3>Watches For Women</h3>";
        }
        if(isset($_GET['women_belt'])){
            echo" <h3>Belts For Women</h3>";
        }
        if(isset($_GET['women_perfumes'])){
            echo" <h3>Perfumes For Women</h3>";
        }
    }

    function all_about_women(){
        include("./inc/db.php");
        if(isset($_GET['women_watch'])){
            $women_watch = "watch";
            $watch = $con->prepare("select * from products where for_whom = 'women' and pro_name like '%$women_watch%' ");
            $watch->setFetchMode(PDO:: FETCH_ASSOC);
            $watch->execute();

            while($row_watch = $watch->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_watch['pro_id']."' >
                            <h4>".$row_watch['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_watch['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }

        if(isset($_GET['women_belt'])){
            $women_belt = "belt";
            $belt = $con->prepare("select * from products where for_whom = 'women' and pro_name like '%$women_belt%' ");
            $belt->setFetchMode(PDO:: FETCH_ASSOC);
            $belt->execute();

            while($row_belt = $belt->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_belt['pro_id']."' >
                            <h4>".$row_belt['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_belt['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
        if(isset($_GET['women_perfumes'])){
            $women_perfumes = "perfume";
            $perfumes = $con->prepare("select * from products where for_whom = 'women' and pro_name like '%$women_perfumes%' ");
            $perfumes->setFetchMode(PDO:: FETCH_ASSOC);
            $perfumes->execute();

            while($row_perfume = $perfumes->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_perfume['pro_id']."' >
                            <h4>".$row_perfume['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_perfume['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_perfume['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

     // gift for kids navbar
     function all_about_kids_name(){
        include("./inc/db.php");
        if(isset($_GET['kids_watch'])){
            echo" <h3>Watches For Kids</h3>";
        }
        if(isset($_GET['kids_belt'])){
            echo" <h3>Belts For Kids</h3>";
        }
        if(isset($_GET['kids_perfumes'])){
            echo" <h3>Games For Kids</h3>";
        }
    }

    function all_about_kids(){
        include("./inc/db.php");
        if(isset($_GET['kids_watch'])){
            $kids_watch = "watch";
            $watch = $con->prepare("select * from products where for_whom = 'kids' and pro_name like '%$kids_watch%' ");
            $watch->setFetchMode(PDO:: FETCH_ASSOC);
            $watch->execute();

            while($row_watch = $watch->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_watch['pro_id']."' >
                            <h4>".$row_watch['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_watch['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_watch['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }

        if(isset($_GET['kids_belt'])){
            $kids_belt = "belt";
            $belt = $con->prepare("select * from products where for_whom = 'kids' and pro_name like '%$kids_belt%' ");
            $belt->setFetchMode(PDO:: FETCH_ASSOC);
            $belt->execute();

            while($row_belt = $belt->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_belt['pro_id']."' >
                            <h4>".$row_belt['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_belt['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_belt['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
        if(isset($_GET['kids_games'])){
            $kids_games = "game";
            $games = $con->prepare("select * from products where for_whom = 'kids' and pro_name like '%$kids_games%' ");
            $games->setFetchMode(PDO:: FETCH_ASSOC);
            $games->execute();

            while($row_game = $games->fetch()) :
                echo"<li>
                        <a href='pro_details.php?pro_id=".$row_game['pro_id']."' >
                            <h4>".$row_game['pro_name']."</h4>
                            <img src='./imgs/pro_img/".$row_game['pro_img1']."'/>
                            <center>
                                <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_game['pro_id']."'>View</a></button>
                                <button id='pro_btn'><a href='#'>Cart</a></button>
                                <button id='pro_btn'><a href='#'>Wishlist</a></button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    function user_search(){
        include("./inc/db.php");
        if(isset($_GET['user_query'])){
            $user_query = $_GET['user_query'];
            if($user_query == NULL){
                echo "<script>window.open('index.php', '_self')</script>";
            }
            $search = $con->prepare("select * from products where pro_name like '%$user_query%' or pro_keyword like '%$user_query%'");
            $search->setFetchMode(PDO:: FETCH_ASSOC);
            $search->execute();

            if($search->rowCount() == 0){
                echo "<h4>Product Not Found With This Keyword!!!</h4>";
            }
            else{
                while($row_search = $search->fetch()) : 
                    echo"<li>
                            <a href='pro_details.php?pro_id=".$row_search['pro_id']."' >
                                <h4>".$row_search['pro_name']."</h4>
                                <img src='./imgs/pro_img/".$row_search['pro_img1']."'/>
                                <center>
                                    <button id='pro_btn'><a href='pro_details.php?pro_id=".$row_search['pro_id']."'>View</a></button>
                                    <button id='pro_btn'><a href='#'>Cart</a></button>
                                    <button id='pro_btn'><a href='#'>Wishlist</a></button>
                                </center>
                            </a>
                        </li>";
                endwhile;
            }
        }
    }

    function u_signup(){
        include("./inc/db.php");
        if(isset($_POST['u_signup'])){
            $u_name = $_POST['u_name'];
            $u_email = $_POST['u_email'];

            $u_add = $_POST['u_add'];
            $u_country = $_POST['u_country'];
            $u_state = $_POST['u_state'];
            $u_pin = $_POST['u_pin'];
            $u_dob = $_POST['u_dob'];
            $u_phone = $_POST['u_phone'];

            $u_pass = $_POST['u_pass'];

            $add_user = $con->prepare("insert into user(u_name, u_email, u_pass, u_add, u_pin, u_dob, u_phone, u_country, u_state, u_reg_date) values('$u_name', '$u_email', '$u_pass', '$u_add', '$u_pin', '$u_dob', '$u_phone', '$u_country', '$u_state', NOW() ) ");
            if($add_user->execute()){
                echo"<script>alert('Congo Registration Successfull !!')</script>";
                echo"<script>window.open('./index.php', '_self')</script>";
            }
            else{
                echo"<script>alert('Registration Fail Please Try Again !!!')</script>";
            }
        }
    }

    function admin_login(){
        include("./inc/db.php");
        if(isset($_POST['admin_login'])){
            $username = $_POST['admin_user'];
            $password = $_POST['admin_pass'];

            $check_admin = $con->prepare("select * from admin_user where admin_username = '$username' AND admin_password = '$password'");
            $check_admin->setFetchMode(PDO:: FETCH_ASSOC);
            $check_admin->execute();
            
            $row= $check_admin->rowCount();
         
            if($row == 1){
                echo"<script>alert('Login Successful !!!');</script>";
                echo"<script>window.open('./admin/index.php', '_self')</script>";
            }
            else{
                echo"<script>alert('You Are Not Admin, Can't Login !!!');</script>";
                echo"<script>window.open('./index.php', '_self')</script>";
            }
        }   
    }

    function u_login(){
        include("./inc/db.php");
        if(isset($_POST['u_login'])){
            $u_email = $_POST['login_email'];
            $u_pass = $_POST['login_pass'];

            $check_user = $con->prepare("select * from user where u_email = '$u_email' AND u_pass = '$u_pass' ");
            $check_user->setFetchMode(PDO:: FETCH_ASSOC);
            $check_user->execute();

            $row = $check_user->rowCount();
            if($row == 0){
                echo"<script>alert('Please Sign-Up !!');</script>";
                echo"<li>
                <a href='#'>Login</a>
                <form method='post'>
                    <table>
                        <tr>
                            <td>Enter Your Email : </td>
                            <td><input type='email' name='login_email' placeholder='Enter Here' required></td>
                        </tr>
                        <tr>
                            <td>Enter Password : </td>
                            <td><input type='password' name='login_pass' placeholder='Enter Here' required></td>
                        </tr>
                    </table>
                    <center>
                        <input type='submit' value='Login' name='u_login'/>
                        <input type='button' value='Forget Password ?' name='forget_pass'/ >
                    </center>
                </form>
            </li>";
            }
            else{
                $row_user = $check_user->fetch();
                echo"<li>".$row_user['u_name']."</li>";
            }
        }
    }
?>
