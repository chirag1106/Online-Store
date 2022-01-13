
<div  class="pro_scroll" id="bodyright">
    <h3>View All Products From Here</h3>
    <form action="" method="post" id="pro_myForm2"  enctype="multipart/form-data">
        <table>
            <tr>
                <th>Sr No.</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Product Name</th>
                <th>Product Images</th>
                <th>Feature 1</th>
                <th>Feature 2</th>
                <th>Feature 3</th>
                <th>Feature 4</th>
                <th>Feature 5</th>
                <th>Price</th>
                <th>Model</th>
                <th>Warrenty</th>
                <th>For Whom</th>
                <th>Keyword</th>
                <th>Added Date</th>
            </tr>
            <?php
            include("../admin/inc/function.php");
            echo viewall_products();
            ?>
        </table>
        
    </form>
</div>
</div>





