
<div id="bodyright">
    <h3>View All Categories</h3>
    <form action="" method="post" id="myForm2" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Sr No.</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php 
                include("../admin/inc/function.php"); 
                echo viewall_category();
            ?>
        
        </table>
    </form>

    <h3>Add New Category From Here</h3>
    <form action="" method="post" id="myForm">
        <table>
            <tr>
                <td>Enter Category Name :</td>
                <td><input type="text" name="cat_name" placeholder="Enter Here" required/></td>
            </tr>
        </table>
        <center><button type="submit" name="add_cat">Add Category</button></center>
    </form>
</div>
</div>

<?php
//    include("../admin/inc/function.php");
    echo add_cat();
    // echo delete_cat();
    
    
?>

