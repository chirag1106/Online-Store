 <!-- start navbar -->
 <div id="navbar">
        <ul id="main_nav">
            <li>
                <a href="#">CATEGORIES</a>
                <ul>
                    <?php
                    echo all_cat();
                    ?>
                </ul>
            </li>
            
            <li>
                <a href="#">BIRTHDAY</a>
                <ul>
                    <li><a href="cat_details.php?bd_men">Men</a></li>
                    <li><a href="cat_details.php?bd_women">Women</a></li>
                    <li><a href="cat_details.php?bd_kids">Kids</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#">GIFTS FOR HIM</a>
                <ul>
                    <li><a href="cat_details.php?men_watch">Watch</a></li>
                    <li><a href="cat_details.php?men_belt">Belt</a></li>
                    <li><a href="cat_details.php?men_perfumes">Perfumes</a></li>
                </ul>
            </li>

            <li><a href="#">FLOWERS</a></li>
            
            <li>
                <a href="#">GIFTS FOR HER</a>
                <ul>
                    <li><a href="cat_details.php?women_watch">Watch</a></li>
                    <li><a href="cat_details.php?women_belt">Belt</a></li>
                    <li><a href="cat_details.php?women_perfumes">Perfumes</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#">GIFTS FOR KIDS</a>
                <ul>
                    <li><a href="cat_details.php?kids_watch">Watch</a></li>
                    <li><a href="cat_details.php?kids_belt">Belt</a></li>
                    <li><a href="cat_details.php?kids_games">Games</a></li>
                </ul>
            </li>
            
            <li><a href="#">BRANDS</a></li>
            <li><a href="#">OFFER ZONE</a></li>
        </ul>
    </div>
    <!-- close navbar -->