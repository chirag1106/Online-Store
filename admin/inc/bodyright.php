<?php
    if(!isset($_GET['viewall_cat'])) {
    if(!isset($_GET['viewall_sub_cat'])) {
    if(!isset($_GET['add_product'])) {
    if(!isset($_GET['viewall_products'])) {
?>
    <!-- start bodyright -->
    <div id="bodyright">
        <?php
            if(isset($_GET['edit_cat'])){
                include('../admin/edit_cat.php');
            }
            if(isset($_GET['edit_sub_cat'])){
                include('../admin/edit_sub_cat.php');
            }
            if(isset($_GET['edit_product'])){
                include('../admin/edit_product.php');
            }
            if(isset($_GET['del_cat'])){
                include('../admin/delete_cat.php');
            }
            if(isset($_GET['del_sub_cat'])){
                include('../admin/delete_sub_cat.php');
            }
            if(isset($_GET['del_product'])){
                include('../admin/delete_product.php');
            }
        ?>
        <h3>Welcome, Admin!</h3>
        <h4 style="padding: 2%; font-size:20px;">You can edit and review all your products from here.<br>
            You'll find all management option in Content Management Panel.<br>
            For any query contact on : +91 9343947243</h4>
    </div>
    <!-- close bodright -->
    
    </div>
<?php  
    }
    }
    }
    }
?>