
<div id="bodyright">
    <h3>Add New Products From Here</h3>
    <form action="" method="post" id="myForm" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Product Name :</td>
                <td><input type="text" name="pro_name" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Select Category Name :</td>
                <td>
                    <select name="main_cat" id="main_cat_dropdown" required>
                        <option value="">Select Category</option>
                        <?php
                            include("../admin/inc/function.php");
                            echo viewall_cat();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select Sub-Category Name :</td>
                <td>
                    <select name="sub_cat" id="sub_cat_dropdown" required>
                    <option value="">Select Sub Category</option>
                        <?php
                            // include("../admin/inc/function.php");
                            echo viewall_sub_cat();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select Product Image 1 :</td>
                <td><input type="file" name="pro_img1" required/></td>
            </tr>
            <tr>
                <td>Select Product Image 2 :</td>
                <td><input type="file" name="pro_img2" required/></td>
            </tr>
            <tr>
                <td>Select Product Image 3 :</td>
                <td><input type="file" name="pro_img3" required/></td>
            </tr>
            <tr>
                <td>Select Product Image 4 :</td>
                <td><input type="file" name="pro_img4" required/></td>
            </tr>
            <tr>
                <td>Enter Feature 1:</td>
                <td><input type="text" name="pro_feature1" placeholder="Enter Here" required/></td>
            </tr>
            <tr>    
                <td>Enter Feature 2:</td>
                <td><input type="text" name="pro_feature2" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Feature 3:</td>
                <td><input type="text" name="pro_feature3" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Feature 4:</td>
                <td><input type="text" name="pro_feature4" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Feature 5:</td>
                <td><input type="text" name="pro_feature5" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Price:</td>
                <td><input type="text" name="pro_price" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Model No. :</td>
                <td><input type="text" name="pro_model" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>Enter Warrenty:</td>
                <td><input type="text" name="pro_warrenty" placeholder="Enter Here" required/></td>
            </tr>
            <tr>
                <td>For Whom :</td>
                <td>
                    <select name="pro_for_whom" id="for_whome_dropdown" required>
                        <option value="">Select For Whom</option>
                        <option value="all">All</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="kids">Kids</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Keyword:</td>
                <td><input type="text" name="pro_keyword" placeholder="Enter Here" required/></td>
            </tr>
            
        </table>
        <center><button type="submit" name="add_product">Add Product</button></center>
    </form>
</div>


<?php
     echo add_product();
?>



