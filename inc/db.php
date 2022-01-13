<?php

// PDO -> PHP Data Object

// mysqli->connect()

$con = new PDO("mysql:host=localhost; dbname=online_store;","root","");



// CREATE TABLE `online_store`.`main_cat` ( 
//     `cat_id` INT(10) NOT NULL AUTO_INCREMENT , 
//     `cat_name` TEXT NOT NULL ,
//     PRIMARY KEY (`cat_id`)
// ) ENGINE = InnoDB;

// CREATE TABLE `online_store`.`sub_cat` ( 
//     `sub_cat_id` INT(10) NOT NULL AUTO_INCREMENT , 
//     `sub_name` TEXT NOT NULL , 
//     `cat_id` INT(10) NOT NULL , 
//     PRIMARY KEY (`sub_cat_id`)
// ) ENGINE = InnoDB;

// CREATE TABLE `online_store`.`produc  t` ( `pro_id` INT(10) NOT NULL AUTO_INCREMENT , `pro_name` TEXT NOT NULL , `cat_id` INT(10) NOT NULL , `sub_cat_id` INT(10) NOT NULL , `pro_img1` TEXT NOT NULL , `pro_img2` TEXT NOT NULL , `pro_img3` TEXT NOT NULL , `pro_img4` TEXT NOT NULL , `pro_feature1` TEXT NOT NULL , `pro_feature2` TEXT NOT NULL , `pro_feature3` TEXT NOT NULL , `pro_feature4` TEXT NOT NULL , `pro_feature5` TEXT NOT NULL , `pro_price` TEXT NOT NULL , `pro_model` TEXT NOT NULL , `pro_warrenty` TEXT NOT NULL , `pro_keyword` TEXT NOT NULL , `pro_added_date` TIMESTAMP NOT NULL , PRIMARY KEY (`pro_id`)) ENGINE = InnoDB;
?>