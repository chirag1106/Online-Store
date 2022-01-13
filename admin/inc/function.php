<?php
    //cat.php function
    function add_Cat(){
        include("../admin/inc/db.php");
        if(isset($_POST['add_cat'])){
            $cat_name = $_POST['cat_name'];
            $add_cat = $con->prepare("insert into main_cat (cat_name) values ('$cat_name')");
            if($add_cat->execute()){
                echo "<script>alert('Category Added Successfully !!!')</script>";
                echo "<script>window.open('index.php?viewall_cat', '_self')</script>"; 
            }
            else{
                echo "<script>alert('Category Not Added Successfully !!!')</script>";
            }
        }
    }

    // for drop down categories
    function viewall_cat(){
        include("../admin/inc/db.php");
        $fetch_cat = $con->prepare("select * from main_cat ORDER BY cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        while($row = $fetch_cat->fetch()) :
            echo "<option value='".$row['cat_id']."'>". $row['cat_name'] ."</option>";
        endwhile;
    }

    // cat.php function
    function viewall_category(){
        include("../admin/inc/db.php");
        $fetch_cat = $con->prepare("select * from main_cat ORDER BY cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $i =1;
        while($row = $fetch_cat->fetch()) :
            echo "  <tr>
                    <td>".$i++."</td> 
                    <td>".$row['cat_name']."</td> 
                    <td><a href='index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
                    <td><a href='index.php?del_cat=".$row['cat_id']."' >Delete</a></td>
                    </tr>";
        endwhile;
    }

    // edit_cat.php function
    function edit_cat(){
        include('../admin/inc/db.php');
        if(isset($_GET['edit_cat'])){
            $cat_id = $_GET['edit_cat'];

            $fetch_cat_name = $con->prepare("select * from main_cat where cat_id = '$cat_id' ");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
            $row = $fetch_cat_name->fetch();

            echo"<form method='post' id='myForm'>
                    <table>
                        <tr>
                            <td>Category Name :</td>
                            <td><input type='text' name='up_cat_name' value='".$row['cat_name']."'/></td>
                        </tr>
                    </table>
                <center><button type='submit' name='update_cat'>Update Category Name</button></center>
                </form>";

                if(isset($_POST['update_cat'])){
                    $up_cat_name = $_POST['up_cat_name'];
                    
                    $update_cat_name = $con->prepare("update main_cat set cat_name = '$up_cat_name' where cat_id = '$cat_id'");

                    // $update_cat_name->execute();
                    if($update_cat_name->execute()){
                        echo "<script>alert('Category Updated Successfully !!!')</script>"; 
                        echo "<script>window.open('index.php?viewall_cat', '_self')</script>";
                    }
                    else{
                        echo "<script>alert('Category Not Updated !!!')</script>";
                    }
                }
        }
    }

    // delete_cat.php function
    function delete_cat(){
        include('../admin/inc/db.php');
        if(isset($_GET['del_cat'])){
            $cat_id = $_GET['del_cat'];

            $delete_cat = $con->prepare("delete from main_cat where cat_id = '$cat_id' ");
            if($delete_cat->execute()){
                echo "<script>alert('Category Deleted Successfully !!!')</script>"; 
                echo "<script>window.open('index.php?viewall_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Category Not Deleted !!!')</script>";
            }   
        }
    }



    //sub_cat.php function
    function add_sub_cat(){
        include("../admin/inc/db.php");
        if(isset($_POST['add_sub_cat'])){
            $cat_id = $_POST['main_cat'];
            $sub_cat_name = $_POST['sub_cat_name'];
        
            $add_sub_cat = $con->prepare("insert into sub_cat(sub_cat_name,cat_id) values('$sub_cat_name','$cat_id')");
            if($add_sub_cat->execute()){
                echo "<script>alert('Sub Category Added Successfully !!!')</script>"; 
                echo "<script>window.open('index.php?viewall_sub_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Sub Category Not Added Successfully !!!')</script>";
            }
        }
    }

    // for drop down sub categories
    function viewall_sub_cat(){
        include("../admin/inc/db.php");
        $fetch_sub_cat = $con->prepare("select * from sub_cat ORDER BY sub_cat_name");
        $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_sub_cat->execute();
        while($row = $fetch_sub_cat->fetch()) :
            echo "<option value='".$row['sub_cat_id']."'>". $row['sub_cat_name'] ."</option>";
        endwhile;
    }

    // sub_cat.php function
    function viewall_sub_category(){
        include("../admin/inc/db.php");
        $fetch_sub_cat = $con->prepare("select * from sub_cat ORDER BY sub_cat_name");
        $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_sub_cat->execute();
        

        // $cat_id = $fetch_sub_cat['cat_id'];
        // $fetch_cat = $con->prepare("select * from main_cat where cat_id = '$cat_id'");
        // $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        // $fetch_cat->execute();
        // $row_cat= $fetch_cat->fetch();

        $i = 1;
        while($row = $fetch_sub_cat->fetch()) :
            echo "  <tr>
                    <td>".$i++."</td> 
                    <td>".$row['sub_cat_name']."</td> 
                    <td><a href='index.php?edit_sub_cat=".$row['sub_cat_id']."' >Edit</a></td>
                    <td><a href='index.php?del_sub_cat=".$row['sub_cat_id']."' >Delete</a></td>
                    </tr>";
        endwhile;
    }

    // edit_sub_cat.php function
    function edit_sub_cat(){
        include("../admin/inc/db.php");
        if(isset($_GET['edit_sub_cat'])){
            $sub_cat_id = $_GET['edit_sub_cat'];

            $fetch_sub_cat_name = $con->prepare("select * from sub_cat where sub_cat_id = '$sub_cat_id'");
            $fetch_sub_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat_name->execute();
            $row_sub_cat = $fetch_sub_cat_name->fetch();

            $cat_id = $row_sub_cat['cat_id'];
            $fetch_cat = $con->prepare("select * from main_cat where cat_id = '$cat_id'");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat= $fetch_cat->fetch();

            echo"<form method='post' id='myForm'>
                    <table>
                        <tr>
                            <td>Select Main Category :</td>
                            <td>
                                <select name='main_cat_id'>
                                    <option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
                                    echo viewall_Cat();
                            echo"</select>
                            </td>
                        </tr>
                        <tr>
                            <td>Update Sub-Category :</td>
                            <td><input type='text' name='up_sub_cat_name' value='".$row_sub_cat['sub_cat_name']."'/></td>
                        </tr>
                    </table>
                <center><button type='submit' name='update_sub_cat'>Update Sub-Category Name</button></center>
                </form>";

                if(isset($_POST['update_sub_cat'])){
                    $cat_id = $_POST['main_cat_id'];
                    $up_sub_cat_name = $_POST['up_sub_cat_name'];
                    
                    $update_sub_cat_name = $con->prepare("update sub_cat set sub_cat_name = '$up_sub_cat_name', cat_id = '$cat_id' where sub_cat_id = '$sub_cat_id'");

                    // $update_cat_name->execute();
                    if($update_sub_cat_name->execute()){
                        echo "<script>alert('Sub-Category Updated Successfully !!!')</script>"; 
                        echo "<script>window.open('index.php?viewall_sub_cat', '_self')</script>";
                    }
                    else{
                        echo "<script>alert('Sub-Category Not Updated !!!')</script>";
                    }
                }  
        }
    }

    //delete_sub_cat.php function
    function delete_sub_cat(){
        include('../admin/inc/db.php');
        if(isset($_GET['del_sub_cat'])){
            $sub_cat_id = $_GET['del_sub_cat'];

            $delete_sub_cat = $con->prepare("delete from sub_cat where sub_cat_id = '$sub_cat_id' ");
            if($delete_sub_cat->execute()){
                echo "<script>alert('Sub-Category Deleted Successfully !!!')</script>"; 
                echo "<script>window.open('index.php?viewall_sub_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Sub-Category Not Deleted !!!')</script>";
            }   
        }
    }



    // product.php function
    function add_product(){
        include("../admin/inc/db.php");
     if(isset($_POST['add_product'])){
         $pro_name = $_POST['pro_name'];
         $cat_id = $_POST['main_cat'];
         $sub_cat_id = $_POST['sub_cat'];

         $pro_img1 = $_FILES['pro_img1'] ['name'];
         $pro_img1_tmp = $_FILES['pro_img1'] ['tmp_name'];
         
         $pro_img2 = $_FILES['pro_img2'] ['name'];
         $pro_img2_tmp = $_FILES['pro_img2'] ['tmp_name'];
         
         $pro_img3 = $_FILES['pro_img3'] ['name'];
         $pro_img3_tmp = $_FILES['pro_img3'] ['tmp_name'];
         
         $pro_img4 = $_FILES['pro_img4'] ['name'];
         $pro_img4_tmp = $_FILES['pro_img4'] ['tmp_name'];
         
         move_uploaded_file($pro_img1_tmp, "../imgs/pro_img/$pro_img1");
         move_uploaded_file($pro_img2_tmp, "../imgs/pro_img/$pro_img2");
         move_uploaded_file($pro_img3_tmp, "../imgs/pro_img/$pro_img3");
         move_uploaded_file($pro_img4_tmp, "../imgs/pro_img/$pro_img4");

         $pro_feature1 = $_POST['pro_feature1'];
         $pro_feature2 = $_POST['pro_feature2'];
         $pro_feature3 = $_POST['pro_feature3'];
         $pro_feature4 = $_POST['pro_feature4'];
         $pro_feature5 = $_POST['pro_feature5'];

         $pro_price = $_POST['pro_price'];
         $pro_model = $_POST['pro_model'];
         $pro_warrenty = $_POST['pro_warrenty'];
         $pro_for_whom = $_POST['pro_for_whom'];
         $pro_keyword = $_POST['pro_keyword'];

         $add_product = $con->prepare("insert into products (pro_name, cat_id, sub_cat_id, pro_img1, pro_img2, pro_img3, pro_img4, pro_feature1, pro_feature2, pro_feature3, pro_feature4, pro_feature5, pro_price, pro_model, pro_warrenty, pro_keyword, pro_added_date, for_whom) values ('$pro_name', '$cat_id', '$sub_cat_id', '$pro_img1', '$pro_img2', '$pro_img3', '$pro_img4', '$pro_feature1', '$pro_feature2', '$pro_feature3', '$pro_feature4', '$pro_feature5', '$pro_price', '$pro_model', '$pro_warrenty', '$pro_keyword', NOW(),  '$pro_for_whom')");
        //   NOW() for getting current date and time 
         
         if($add_product->execute()){
             echo "<script>alert('Product Added Successfully !!!')</script>"; 
             echo "<script>window.open('index.php?viewall_products', '_self')</script>";
         }
         else{
             echo "<script>alert('Product Not Added Successfully !!!')</script>";
         }
     }
    }

    // viewall_products.php function
   function viewall_products(){
    include("../admin/inc/db.php");
        $fetch_pro = $con->prepare("select * from products ORDER BY 1 DESC");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();
        $i = 1;
        while($row = $fetch_pro->fetch()) :
            echo "  <tr>
                    <td>".$i++."</td> 
                    <td><a href='index.php?edit_product=".$row['pro_id']."'>Edit</a></td>
                    <td><a href='index.php?del_product=".$row['pro_id']."' >Delete</a></td>
                    <td>".$row['pro_name']."</td> 
                    <td style='min-width:250px'> 
                        <img src='../imgs/pro_img/".$row['pro_img1']."'/>
                         <img src='../imgs/pro_img/".$row['pro_img2']."'/>
                         <img src='../imgs/pro_img/".$row['pro_img3']."''/>
                         <img src='../imgs/pro_img/".$row['pro_img4']."'/>
                    </td> 
                    <td>".$row['pro_feature1']."</td> 
                    <td>".$row['pro_feature2']."</td> 
                    <td>".$row['pro_feature3']."</td> 
                    <td>".$row['pro_feature4']."</td> 
                    <td>".$row['pro_feature5']."</td> 
                    <td>".$row['pro_price']."</td> 
                    <td>".$row['pro_model']."</td> 
                    <td>".$row['pro_warrenty']."</td> 
                    <td>".$row['for_whom']."</td> 
                    <td>".$row['pro_keyword']."</td> 
                    <td class='date'>".$row['pro_added_date']."</td> 

                    </tr>";
        endwhile;
   }

   // edit_product.php function
   function edit_product(){
    include("../admin/inc/db.php");
    if(isset($_GET['edit_product'])){
        $pro_id = $_GET['edit_product'];

        $fetch_pro= $con->prepare("select * from products where pro_id = '$pro_id'");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();
        $row_pro = $fetch_pro->fetch();

        $cat_id = $row_pro['cat_id'];
        $fetch_cat = $con->prepare("select * from main_cat where cat_id = '$cat_id'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $row_cat= $fetch_cat->fetch();

        $sub_cat_id = $row_pro['sub_cat_id'];
        $fetch_sub_cat = $con->prepare("select * from sub_cat where sub_cat_id = '$sub_cat_id'");
        $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_sub_cat->execute();
        $row_sub_cat= $fetch_sub_cat->fetch();

        echo"
        <form method='post' id='myForm' enctype='multipart/form-data'>
        <table>
            <tr>
                <td>Update Product Name :</td>
                <td><input type='text' name='pro_name' value='".$row_pro['pro_name']."' required/></td>
            </tr>
            <tr>
                <td>Select Category Name :</td>
                <td>
                    <select name='main_cat_id' id='main_cat_dropdown'>
                        <option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
                        echo viewall_cat();
                echo"</select>
                </td>
            </tr>
            <tr>
                <td>Select Sub-Category Name :</td>
                <td>
                    <select name='sub_cat_id' id='sub_cat_dropdown'>
                    <option value='".$row_sub_cat['sub_cat_id']."'>".$row_sub_cat['sub_cat_name']."</option>";
                        echo viewall_sub_cat();
                echo"</select>
                </td>
            </tr>
            <tr>
                <td>Update Product Image 1 :</td>
                <td>
                    <input type='file' name='pro_img1' />
                    <img src='../imgs/pro_img/".$row_pro['pro_img1']."' style='width:60px; height:60px' />
                </td>
            </tr>
            <tr>
                <td>Update Product Image 2 :</td>
                <td>
                    <input type='file' name='pro_img2' />
                    <img src='../imgs/pro_img/".$row_pro['pro_img2']."' style='width:60px; height:60px'/>
                </td>
            </tr>
            <tr>
                <td>Update Product Image 3 :</td>
                <td>
                    <input type='file' name='pro_img3' />
                    <img src='../imgs/pro_img/".$row_pro['pro_img3']."' style='width:60px; height:60px'/>
                </td>
            </tr>
            <tr>
                <td>Update Product Image 4 :</td>
                <td>
                    <input type='file' name='pro_img4' />
                    <img src='../imgs/pro_img/".$row_pro['pro_img4']."' style='width:60px; height:60px'/>
                </td>
            </tr>
            <tr>
                <td>Update Feature 1:</td>
                <td><input type='text' name='pro_feature1' value='".$row_pro['pro_feature1']."' required/></td>
            </tr>
            <tr>    
                <td>Update Feature 2:</td>
                <td><input type='text' name='pro_feature2' value='".$row_pro['pro_feature2']."' required/></td>
            </tr>
            <tr>
                <td>Update Feature 3:</td>
                <td><input type='text' name='pro_feature3' value='".$row_pro['pro_feature3']."' required/></td>
            </tr>
            <tr>
                <td>Update Feature 4:</td>
                <td><input type='text' name='pro_feature4' value='".$row_pro['pro_feature4']."' required/></td>
            </tr>
            <tr>
                <td>Update Feature 5:</td>
                <td><input type='text' name='pro_feature5' value='".$row_pro['pro_feature5']."' required/></td>
            </tr>
            <tr>
                <td>Update Price:</td>
                <td><input type='text' name='pro_price' value='".$row_pro['pro_price']."' required/></td>
            </tr>
            <tr>
                <td>Update Model No. :</td>
                <td><input type='text' name='pro_model' value='".$row_pro['pro_model']."' required/></td>
            </tr>
            <tr>
                <td>Update Warrenty:</td>
                <td><input type='text' name='pro_warrenty' value='".$row_pro['pro_warrenty']."' required/></td>
            </tr>
            <tr>
                <td>Update Keyword:</td>
                <td><input type='text' name='pro_keyword' value='".$row_pro['pro_keyword']."' required/></td>
            </tr>
        </table>
        <center><button type='submit' name='update_product'>Edit Product</button></center>
        </form> ";

        if(isset($_POST['update_product'])){
            
            $pro_name = $_POST['pro_name'];
            $cat_id = $_POST['main_cat_id'];
            $sub_cat_id = $_POST['sub_cat_id'];

            if($_FILES['pro_img1'] ['tmp_name'] == ""){} 
            else{
                $pro_img1 = $_FILES['pro_img1'] ['name'];
                $pro_img1_tmp = $_FILES['pro_img1'] ['tmp_name'];
                move_uploaded_file($pro_img1_tmp, "../imgs/pro_img/$pro_img1");
                $up_img1 = $con->prepare("update products set pro_img1 = '$pro_img1' where pro_id ='$pro_id'");
                $up_img1->execute();
            }
            if($_FILES['pro_img2'] ['tmp_name'] == ""){} 
            else{
                $pro_img2 = $_FILES['pro_img2'] ['name'];
                $pro_img2_tmp = $_FILES['pro_img2'] ['tmp_name'];
                move_uploaded_file($pro_img2_tmp, "../imgs/pro_img/$pro_img2");
                $up_img2 = $con->prepare("update products set pro_img1 = '$pro_img2' where pro_id ='$pro_id'");
                $up_img2->execute();
            }
            if($_FILES['pro_img3'] ['tmp_name'] == ""){} 
            else{
                $pro_img3 = $_FILES['pro_img3'] ['name'];
                $pro_img3_tmp = $_FILES['pro_img3'] ['tmp_name'];
                move_uploaded_file($pro_img3_tmp, "../imgs/pro_img/$pro_img3");
                $up_img3 = $con->prepare("update products set pro_img1 = '$pro_img3' where pro_id ='$pro_id'");
                $up_img3->execute();
            }
            if($_FILES['pro_img4'] ['tmp_name'] == ""){} 
            else{
                $pro_img4 = $_FILES['pro_img4'] ['name'];
                $pro_img4_tmp = $_FILES['pro_img4'] ['tmp_name'];
                move_uploaded_file($pro_img4_tmp, "../imgs/pro_img/$pro_img4");
                $up_img4 = $con->prepare("update products set pro_img1 = '$pro_img4' where pro_id ='$pro_id'");
                $up_img4->execute();
            }

            $pro_feature1 = $_POST['pro_feature1'];
            $pro_feature2 = $_POST['pro_feature2'];
            $pro_feature3 = $_POST['pro_feature3'];
            $pro_feature4 = $_POST['pro_feature4'];
            $pro_feature5 = $_POST['pro_feature5'];

            $pro_price = $_POST['pro_price'];
            $pro_model = $_POST['pro_model'];
            $pro_warrenty = $_POST['pro_warrenty'];
            $pro_keyword = $_POST['pro_keyword'];
            
            $update_product = $con->prepare("update products set 
            pro_name = '$pro_name',
            cat_id = '$cat_id', 
            sub_cat_id = '$sub_cat_id', 
            pro_feature1 = '$pro_feature1',
            pro_feature2 = '$pro_feature2',
            pro_feature3 = '$pro_feature3',
            pro_feature4 = '$pro_feature4',
            pro_feature5 = '$pro_feature5',
            pro_price = '$pro_price',
            pro_model = '$pro_model',
            pro_warrenty = '$pro_warrenty',
            pro_keyword = '$pro_keyword',
            pro_added_date = NOW()
            
            where pro_id = '$pro_id' ");

            // $update_cat_name->execute();
            if($update_product->execute()){
                echo "<script>alert('Product Updated Successfully !!!')</script>"; 
                echo "<script>window.open('index.php?viewall_products', '_self')</script>";
            }
            else{
                echo "<script>alert('Product Not Updated !!!')</script>";
            }
        }  
    }
   }

   // delete_product.php function
   function delete_product(){
    include("../admin/inc/db.php");
    if(isset($_GET['del_product'])){
        $pro_id = $_GET['del_product'];

        $delete_product= $con->prepare("delete from products where pro_id = '$pro_id' ");
            if($delete_product->execute()){
                echo "<script>alert('Product Deleted Successfully !!!')</script>"; 
                echo "<script>window.open('index.php?viewall_products', '_self')</script>";
            }
            else{
                echo "<script>alert('Product Not Deleted !!!')</script>";
            }
        }     
   }

?>