<div id="parent">
    <!-- start bodyleft -->
    <div id="bodyleft">
        <h3>Content Management</h3>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?viewall_cat">Viewall Categories</a></li>
            <li><a href="index.php?viewall_sub_cat">Viewall Sub-Categories</a></li>
            <li><a href="index.php?add_product">Add New Products</a></li>
            <li><a href="index.php?viewall_products">Viewall Products</a></li>
        </ul>

    </div>
    <!-- close bodyleft -->

    <?php
    if(isset($_GET['viewall_cat'])) {
        include("../admin/cat.php");
    }
    if(isset($_GET['viewall_sub_cat'])) {
        include("../admin/sub_cat.php");
    }
    if(isset($_GET['add_product'])) {
        include("../admin/add_product.php");
    }
    if(isset($_GET['viewall_products'])) {
        include("../admin/viewall_products.php");
    }
    ?>
