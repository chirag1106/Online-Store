 <!-- start header -->
 <div id="header">
        
        <!-- start logo -->
        <div id="logo">
            <a href="index.php"><img src="./imgs/logo3.png" alt="logo"></a>
        </div>
        <!-- close logo -->

        <div id="link">
            <ul>
                <li>
                    <a href="#">Admin Login</a>
                    <form method="POST" action="admin_login.php">
                        <table>
                            <tr>
                                <td>Enter Your Username : </td>
                                <td><input type="text" name="admin_user" placeholder="Enter Here" required></td>
                            </tr>
                            <tr>
                                <td>Enter Password : </td>
                                <td><input type="password" name="admin_pass" placeholder="Enter Here" required></td>
                            </tr>
                        </table>
                        <center>
                            <input type="submit" value="Login" name="admin_login"/>
                            <input type="button" value="Forget Password ?" name="forget_pass"/ >
                        </center>
                    </form>
                </li>
                
                <li>
                    <a href="#">Sign Up</a>
                    <form method="post" enctype="multipart/form-data">  
                        <table>
                            <tr>
                                <td>Enter Your Name : </td>
                                <td> <input type="text" name="u_name" autocomplete="off" placeholder="Enter Here" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Your Email : </td>
                                <td><input type="email" name="u_email" autocomplete="off" placeholder="Enter Here" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Password : </td>
                                <td><input type="password" name="u_pass" autocomplete="off" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Your Address : </td>
                                <td><textarea name="u_add" autocomplete="off"  placeholder="Enter Here" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Enter Your Country : </td>
                                <td><input type="text" name="u_country" autocomplete="off" placeholder="Enter Here" required /></td>
                            </tr>
                            <tr>
                                <td>Enter Your State : </td>
                                <td><input type="text" name="u_state" autocomplete="off" placeholder="Enter Here" required /></td>
                            </tr>
                            <tr>
                                <td>Enter Your Pincode : </td>
                                <td><input type="text" name="u_pin" autocomplete="off" placeholder="Enter Here" required /></td>
                            </tr>
                            <tr>
                                <td>Enter Your DOB : </td>
                                <td><input type="date" name="u_dob" autocomplete="off" placeholder="Enter Here" required/></td>
                            </tr>
                            <tr>
                                <td>Enter Your Phone No. : </td>
                                <td><input type="tel" name="u_phone" autocomplete="off" placeholder="Enter Here" required/></td>
                            </tr>
                        </table>
                        <center>
                            <input type="submit" value="SignUp" name="u_signup" >
                            <input type="reset" value="Reset" name="Reset" >
                        </center>
                    </form>
                </li>

                <li>
                    <a href="#">Login</a>
                    <form method="post">
                        <table>
                            <tr>
                                <td>Enter Your Email : </td>
                                <td><input type="email" name="login_email" placeholder="Enter Here" required></td>
                            </tr>
                            <tr>
                                <td>Enter Password : </td>
                                <td><input type="password" name="login_pass" placeholder="Enter Here" required></td>
                            </tr>
                        </table>
                        <center>
                            <input type="submit" value="Login" name="u_login"/>
                            <input type="button" value="Forget Password ?" name="forget_pass"/ >
                        </center>
                    </form>
                </li>
            </ul>
        </div>

        <!-- start search bar -->
        <div id="search">
            <form action="user_search.php"  method="get" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search From Here..." autocomplete="off" >
                <button id="search_btn">Search</button>
                <button id="cart_btn"><a href="cart.php">Cart (<?php  echo cart_count();  ?>)</a></button>
            </form>
        </div>
        <!-- close search bar -->
    </div>
    <!-- close header -->