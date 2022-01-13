
<div id="bodyright">

    <h3>View All Sub-Categories</h3>
        <form action="" method="post" id="myForm2" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Sr No.</th>
                    <th>Sub-Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php 
                    include("../admin/inc/function.php"); 
                    echo viewall_sub_category();
                ?>

            </table>
        </form>

    <h3>Add New Sub Category From Here</h3>
    <form action="" method="post" id="myForm">
        <table>
            <tr>
                <td>Select Category Name :</td>
                <td>
                    <select name="main_cat" id="main_cat_dropdown">
                    <option value="">Select Category</option>
                        <?php
                            // include("../admin/inc/function.php");
                            echo viewall_cat(); 
                           
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Sub Category Name :</td>
                <td><input type="text" name="sub_cat_name" placeholder="Enter Sub Category" required/></td>
            </tr>
        </table>
        <center><button type="submit"  name="add_sub_cat">Add Sub Category</button></center>
    </form>
</div>
</div>

<?php
//    include("../admin/inc/function.php");
   echo add_sub_cat();   
?>

