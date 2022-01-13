-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 04:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_cat`
--

CREATE TABLE `main_cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_cat`
--

INSERT INTO `main_cat` (`cat_id`, `cat_name`) VALUES
(1, 'Fashion'),
(2, 'Mobiles'),
(3, 'Electronics'),
(4, 'Home'),
(5, 'Appliances'),
(6, 'Beauty'),
(7, 'Furniture'),
(8, 'Sports'),
(9, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) NOT NULL,
  `pro_name` text NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `pro_img1` text NOT NULL,
  `pro_img2` text NOT NULL,
  `pro_img3` text NOT NULL,
  `pro_img4` text NOT NULL,
  `pro_feature1` text NOT NULL,
  `pro_feature2` text NOT NULL,
  `pro_feature3` text NOT NULL,
  `pro_feature4` text NOT NULL,
  `pro_feature5` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_model` text NOT NULL,
  `pro_warrenty` text NOT NULL,
  `pro_keyword` text NOT NULL,
  `pro_added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `for_whom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `cat_id`, `sub_cat_id`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_feature1`, `pro_feature2`, `pro_feature3`, `pro_feature4`, `pro_feature5`, `pro_price`, `pro_model`, `pro_warrenty`, `pro_keyword`, `pro_added_date`, `for_whom`) VALUES
(14, 'Skinny Men Blue Jeans', 1, 1, 'Skinny Men Blue Jeans img1.PNG', 'Skinny Men Blue Jeans img2.PNG', 'Skinny Men Blue Jeans img3.PNG', 'Skinny Men Blue Jeans img4.PNG', 'size : 38', 'Strechable', 'Black Color', 'Cotton Blend', 'Western Wear', '799', 'MEN-10001', '7 Days', 'Jeans,cotton,western wear,black', '2021-09-07 05:55:40', 'men'),
(15, 'Printed Men Polo Neck Dark Blue T-Shirt', 1, 1, 'Printed Men Polo Neck Dark Blue T-Shirt img1.PNG', 'Printed Men Polo Neck Dark Blue T-Shirt img2.PNG', 'Printed Men Polo Neck Dark Blue T-Shirt img3.PNG', 'Printed Men Polo Neck Dark Blue T-Shirt img4.PNG', 'Size: L, XL, XXL', 'Short Sleeves', 'Slim', 'Polyester', 'Polo Neck', '300', 'MEN-10002', '7 Days', 'polo,t-shirts,polyester,slim', '2021-09-07 06:02:24', 'men'),
(16, 'Men Black Artificial Leather, Texas Leatherite Belt', 1, 1, 'Men Black Artificial Leather, Texas Leatherite Belt img1.PNG', 'Men Black Artificial Leather, Texas Leatherite Belt img2.PNG', 'Men Black Artificial Leather, Texas Leatherite Belt img4.PNG', 'Men Black Artificial Leather, Texas Leatherite Belt img3.PNG', 'Ratched Belt', 'Autolock', 'Size : one size', 'Color : Black', 'Belt Width : 1.5inches', '441', 'MEN-10003', '1 months', 'auto,ratched belt,belt,black', '2021-09-07 06:18:32', 'men'),
(17, 'Fastrack Two Timers Analog Watch', 1, 1, 'Fastrack Two Timers Analog Watch img1.PNG', 'Fastrack Two Timers Analog Watch img2.PNG', 'Fastrack Two Timers Analog Watch img3.PNG', 'Fastrack Two Timers Analog Watch img4.PNG', 'Analog', 'Two-Timmer', 'Water Resistant', 'Casual', 'Thick Strap', '2595', 'MEN-10004', '2 years', 'fastrack,watch,men,watch for men,casual watch,two-timmer', '2021-09-07 06:26:55', 'men'),
(18, 'DENVER Hamilton Perfume Eau de Parfum - 60 ml', 1, 1, 'DENVER Hamilton Perfume Eau de Parfum - 60 ml img1.PNG', 'DENVER Hamilton Perfume Eau de Parfum - 60 ml img2.PNG', 'DENVER Hamilton Perfume Eau de Parfum - 60 ml img3.PNG', 'DENVER Hamilton Perfume Eau de Parfum - 60 ml img4.PNG', 'Eau de Parfum', 'Ideal For : Men', 'Strong Fragnance', 'Quantity : 60ml', 'Package : 1Perfume', '215', 'MEN-10005', '2 Days', 'perfumes, denver perfumes, classic', '2021-09-07 06:34:52', 'men'),
(19, 'Self Design Banarasi Silk Blend, Cotton Blend Saree  (Pink)', 1, 2, 'Self Design Banarasi Silk Blend, Cotton Blend Saree  (Pink) img1.PNG', 'Self Design Banarasi Silk Blend, Cotton Blend Saree  (Pink) img4.PNG', 'Self Design Banarasi Silk Blend, Cotton Blend Saree  (Pink) img2.PNG', 'Self Design Banarasi Silk Blend, Cotton Blend Saree  (Pink) img3.PNG', 'Saree For Wedding', 'Pattern : Self Design', 'Occasion: Casual, Wedding, Party & Festive', 'Decorative Material Zari', 'Secondary Color Multicolor', '582', 'WOMEN-10001', '1 Month', 'Casual, Wedding, Party & Festive saree,Saree For Wedding', '2021-09-07 06:42:50', 'women'),
(20, 'Casual Petal Sleeves Solid Women Maroon Top', 1, 2, 'Casual Petal Sleeves Solid Women Maroon Top img1.PNG', 'Casual Petal Sleeves Solid Women Maroon Top img3.PNG', 'Casual Petal Sleeves Solid Women Maroon Top img2.PNG', 'Casual Petal Sleeves Solid Women Maroon Top img4.PNG', 'Neck: Round Neck', 'Sleeve Length: 3/4 Sleeve', 'Type: Regular Top', 'Sleeve Style: Petal Sleeves', 'Fabric: Rayon', '318', 'WOMEN-10002', '14 Days', 'women wear, top,round neck,rayon,regular top', '2021-09-07 06:57:25', 'women'),
(21, 'Imara038-B Analog Watch - For Women', 1, 2, 'Imara038-B Analog Watch - For Women img1.PNG', 'Imara038-B Analog Watch - For Women img2.PNG', 'Imara038-B Analog Watch - For Women img3.PNG', 'Imara038-B Analog Watch - For Women img4.PNG', 'Display Type: Analog', 'Occasion: Casual', 'Watch Type: Wrist Watch', 'Mechanism: Quartz', 'Mechanism: Quartz', '1293', 'WOMEN-10003', '2 years', 'watch, women watch,analog,wrist watch', '2021-09-07 07:05:42', 'women'),
(22, 'Women Formal Black Synthetic Belt', 1, 2, 'Women Formal Black Synthetic Belt img1.PNG', 'Women Formal Black Synthetic Belt img2.PNG', 'Women Formal Black Synthetic Belt img3.PNG', 'Women Formal Black Synthetic Belt img4.PNG', 'Leather Type: Napa', 'Tanning Process: Synthetic', 'Tanning Process: Synthetic', 'Other Features: Width/Broadness-1 Inch,25 mm', 'Size: 30', '256', 'WOMEN-10004', '2 Months', 'women bekt,belt,black belt,leather belt', '2021-09-07 08:05:07', 'women'),
(23, 'Cobra Hugs Perfume 100 ml Eau de Parfum - 100 ml', 1, 2, 'Cobra Hugs Perfume 100 ml Eau de Parfum - 100 ml img1.PNG', 'Cobra Hugs Perfume 100 ml Eau de Parfum - 100 ml img2.PNG', 'Cobra Hugs Perfume 100 ml Eau de Parfum - 100 ml img3.PNG', 'Cobra Hugs Perfume 100 ml Eau de Parfum - 100 ml img1.PNG', 'Fragrance Classification: Eau de Parfum', 'Sales Package: 1 Cobra Hugs Perfume', 'Country of Origin: India', 'Quantity: 100 ml', 'Ideal For: Women', '995', 'WOMEN-10005', 'NO Warrenty', 'women,women perfumes,fashion,cobra', '2021-09-07 08:12:06', 'women'),
(24, 'Boys Festive & Party Kurta and Pyjama Set', 1, 3, 'Boys Festive & Party Kurta and Pyjama Set img2.PNG', 'Boys Festive & Party Kurta and Pyjama Set img1.PNG', 'Boys Festive & Party Kurta and Pyjama Set img3.PNG', 'Boys Festive & Party Kurta and Pyjama Set img1.PNG', 'In Box: 1 Pyjama, 1 Kurta', 'Size: 2 - 3 Years', 'Label Size: 20', 'Brand Color: yellow', 'Type: Kurta and Pyjama Set', '519', 'KIDS-10001', 'No Warrenty', 'kurta,pajama,yellow,kids,boys', '2021-09-07 08:27:46', 'kids'),
(25, 'Baby Girls Lehenga Choli Ethnic Wear Embroidered Lehenga, Choli and Dupatta Set', 1, 3, 'Baby Girls Lehenga Choli Ethnic Wear Embroidered Lehenga, Choli and Dupatta Set img1.PNG', 'Baby Girls Lehenga Choli Ethnic Wear Embroidered Lehenga, Choli and Dupatta Set img2.PNG', 'Baby Girls Lehenga Choli Ethnic Wear Embroidered Lehenga, Choli and Dupatta Set img1.PNG', 'Baby Girls Lehenga Choli Ethnic Wear Embroidered Lehenga, Choli and Dupatta Set img2.PNG', 'Brand: Kedar Fab', 'Label Size: 8-9 Years', 'Type: Lehenga, Choli and Dupatta Set', 'Primary Color: Red', 'Embroidered Lehenga', '449', 'KIDS-10002', 'No Warrenty', 'lenga,Embroidered Lehenga,red color', '2021-09-07 08:33:21', 'kids'),
(26, 'Digital Watches For Boys', 1, 3, 'Digital Watches For Men img1.PNG', 'Digital Watches For Men img2.PNG', 'Digital Watches For Men img3.PNG', 'Digital Watches For Men img4.PNG', 'Occasion: Party-Wedding, Casual, Formal, Sports', 'Watch Type: Sports Watch, Wrist Watch, Chronographs', 'Pack of 1', 'Mechanism: Digital', 'Display Type Digital', '999', 'KIDS-10003', '1 Year', 'watch, women watch,digital,wrist watch,kids watch', '2021-09-07 08:56:33', 'kids'),
(27, 'realme 8 5G (Supersonic Blue, 128 GB)  (8 GB RAM)', 2, 4, 'realme 8 5G (Supersonic Blue, 128 GB)  (8 GB RAM) img1.PNG', 'realme 8 5G (Supersonic Blue, 128 GB)  (8 GB RAM) img2.PNG', 'realme 8 5G (Supersonic Blue, 128 GB)  (8 GB RAM) img3.PNG', 'realme 8 5G (Supersonic Blue, 128 GB)  (8 GB RAM) img4.PNG', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB', '16.51 cm (6.5 inch) Full HD+ Display', '48MP + 2MP + 2MP | 16MP Front Camera', '5000 mAh Battery', 'MediaTek Dimensity 700 (MT6833) Processor', '18499', 'MOB-10001', '1 Year', 'realme,mobile,smartphone,blue,mediaTek', '2021-09-07 09:06:43', 'all'),
(28, 'SAMSUNG Galaxy A72 (Awesome Black, 128 GB)  (8 GB RAM)', 2, 5, 'SAMSUNG Galaxy A72 (Awesome Black, 128 GB)  (8 GB RAM) img1.PNG', 'SAMSUNG Galaxy A72 (Awesome Black, 128 GB)  (8 GB RAM) img2.PNG', 'SAMSUNG Galaxy A72 (Awesome Black, 128 GB)  (8 GB RAM) img3.PNG', 'SAMSUNG Galaxy A72 (Awesome Black, 128 GB)  (8 GB RAM) img4.PNG', '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB', '17.02 cm (6.7 inch) Full HD+ Display', '64MP + 12MP + 8MP + 5MP | 32MP Front Camera', '5000 mAh Lithium-ion Battery', 'Qualcomm Snapdragon 720G Processor', '34999', 'MOB-10002', '1 Year', 'samsung,mobile,black,snapdragon', '2021-09-07 09:13:10', 'all'),
(29, 'Mi 11X (Cosmic Black, 128 GB)  (8 GB RAM)', 2, 6, 'Mi 11X (Cosmic Black, 128 GB)  (8 GB RAM) img1.PNG', 'Mi 11X (Cosmic Black, 128 GB)  (8 GB RAM) img2.PNG', 'Mi 11X (Cosmic Black, 128 GB)  (8 GB RAM) img3.PNG', 'Mi 11X (Cosmic Black, 128 GB)  (8 GB RAM) img4.PNG', '8 GB RAM | 128 GB ROM', '16.94 cm (6.67 inch) Full HD+ Display', '48MP + 8MP + 5MP | 20MP Front Camera', '4520 mAh Battery', 'Qualcomm Snapdragon 870 Processor', '28295', 'MOB-10003', '1 Year', 'mi,mobile,black,dual camera,snapdragon', '2021-09-07 09:20:02', 'all'),
(30, 'MSI GF63 Thin Core i5 10th Gen - (8 GB/1 TB HDD/Windows 10 Home/4 GB Graphics/NVIDIA GeForce GTX 1650 Max Q/60 Hz) GF63 Thin 10SCXR-1618IN / GF63 Thin 10SC-612IN Gaming Laptop  (15.6 inch, Black, 1.86 KG)', 3, 7, 'MSI GF63 Thin Core i5 10th Gen img1.PNG', 'MSI GF63 Thin Core i5 10th Gen img2.PNG', 'MSI GF63 Thin Core i5 10th Gen img4.PNG', 'MSI GF63 Thin Core i5 10th Gen img3.PNG', 'NVIDIA GeForce GTX 1650 Max Q', '5.6 inch Full HD LED Backlit IPS Display (60Hz Refresh Rate, 45%NTSC Color Gamut)', 'Light Laptop without Optical Disk Drive', 'Pre-installed Genuine Windows 10 OS', '8 GB/1 TB HDD/Windows 10 Home/4 GB Graphics', '55990', 'LAP-10001', '2 Years', 'laptop,msi,8gb ram,1tb ssd,5.6inch', '2021-09-07 10:01:03', 'all'),
(31, 'Gizmore TWIN 2010 10 W Laptop/Desktop Speaker  (Black, 2.0 Channel)', 3, 8, 'Gizmore TWIN 2010 10 W Laptop Speaker img1.PNG', 'Gizmore TWIN 2010 10 W Laptop Speaker img2.PNG', 'Gizmore TWIN 2010 10 W Laptop Speaker img3.PNG', 'Gizmore TWIN 2010 10 W Laptop Speaker img4.PNG', 'Sales Package: 2 Speakers', 'Power Output: (RMS) 10 W', 'Frequency Response: 20 Hz - 20000 Hz', 'Wired/Wireless: Wired', 'Compatible Devices: Mobile, Computer, MP3/MP4 Player', '549', 'AUD-10001', '2 Months', 'speakers,laptop speakers, desktop speakers, wired', '2021-09-07 10:25:51', 'all'),
(32, 'HP LaserJet Pro MFP M126nw Multi-function Monochrome Laser Printer  (Black, Toner Cartridge)', 3, 9, 'HP LaserJet Pro Multi-function Monochrome Laser Printer img1.PNG', 'HP LaserJet Pro Multi-function Monochrome Laser Printer img2.PNG', 'HP LaserJet Pro Multi-function Monochrome Laser Printer img3.PNG', 'HP LaserJet Pro Multi-function Monochrome Laser Printer img4.PNG', 'Output: Monochrome', 'Print Speed Mono A4: 20 ppm', 'Duty cycle (monthly, A4): 8000 pages', 'WiFi, Ethernet | USB', 'Laser', '18990', 'PR-10001', '2 Years', 'printer,black cartridge,toner,HP printer,all in one,laserJet', '2021-09-07 10:46:31', 'all'),
(33, 'NAALSA RIYA Stainless Steel Premium High-Carbon Professional Kitchen Knife Set with Non-Stick Coating, 6-Pieces Carbon Steel Knife Set(Pack of 6)', 4, 10, 'NAALSA RIYA Stainless Steel Premium High-Carbon Professional Kitchen Knife Set img1.PNG', 'NAALSA RIYA Stainless Steel Premium High-Carbon Professional Kitchen Knife Set img2.PNG', 'NAALSA RIYA Stainless Steel Premium High-Carbon Professional Kitchen Knife Set img3.PNG', 'NAALSA RIYA Stainless Steel Premium High-Carbon Professional Kitchen Knife Set img4.PNG', 'Suitable for: slicing, bread cutting, vegetable chopping', 'Blade Type: high carbon steel', 'Handle Material: virgin plastic', 'Sales Package: 6', 'Sheath Included: Yes', '1199', 'CHO-10001', '6 Months', 'knives,chooper,stainless steel,black blade', '2021-09-07 11:16:12', 'all'),
(34, 'PMS New Unbreakable 1500 ML Air Tight Kitchen Plastic Storage Container, Cereal Dispenser, Plastic Grocery Container, Food Storage container, Snacks container, Easy Flow - Clear And Transparent storage, Square container 1500 ML (White_Set of 12) - 1500 ml Plastic Grocery Container  (Pack of 12, White)', 4, 11, 'Unbreakable 1500 ML Air Tight Kitchen Plastic Storage Container img1.PNG', 'Unbreakable 1500 ML Air Tight Kitchen Plastic Storage Container img2.PNG', 'Unbreakable 1500 ML Air Tight Kitchen Plastic Storage Container img3.PNG', 'Unbreakable 1500 ML Air Tight Kitchen Plastic Storage Container img1.PNG', '1500ML Square Storage Container', 'Space Saving Design', 'Clear Containers Are 100% Dishwasher Safe', 'Air Tight Container & Clear', '100% Food Grade Virgin High Quality Plastic', '1014', 'BOT-10001', '2 Months', 'containers,bottles,air tight,fridger safe', '2021-09-07 11:23:02', 'women'),
(35, 'Sleepyhead Flip - Dual Sided 5 inch Queen High Density (HD) Foam Mattress  (L x W: 78 inch x 60 inch)', 4, 12, 'Sleepyhead Flip - Dual Sided 5 inch Queen High Density (HD) Foam Mattress img1.PNG', 'Sleepyhead Flip - Dual Sided 5 inch Queen High Density (HD) Foam Mattress img2.PNG', 'Sleepyhead Flip - Dual Sided 5 inch Queen High Density (HD) Foam Mattress img3.PNG', 'Sleepyhead Flip - Dual Sided 5 inch Queen High Density (HD) Foam Mattress img4.PNG', 'Size: Queen', 'Mattress Features: Reversible Mattress, Rolled & Vacuumed Mattress, Sag Resistant Mattress, Zero Partner Disturbance', 'Upholstery Material: Polyester', 'Support Layer High Density (HD) Foam', 'Mattress Top Normal Top', '7999', 'MAT-10001', '5 Years', 'matress,support layer,HD foam,grey color', '2021-09-07 11:38:35', 'all'),
(36, 'Thomson OATHPRO Series 139 cm (55 inch) Ultra HD (4K) LED Smart Android TV with Digital Plus  (55 OATHPRO 0101)', 5, 13, 'Smart Android TV img1.PNG', 'Smart Android TV img2.PNG', 'Smart Android TV img3.PNG', 'Smart Android TV img4.PNG', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube', 'Operating System: Android (Google Assistant & Chromecast in-built)', 'Resolution: Ultra HD (4K) 3840 x 2160 Pixels', 'Sound Output: 30 W', 'Refresh Rate: 60 Hz', '37999', 'TEL-10001', '3 Years', 'television,TV,thomsom,android tv,android 10', '2021-09-07 11:44:01', 'all'),
(37, 'CARRIER 1.5 Ton 3 Star Split AC - White  (18K 3 Star Ester Pro R32 Split AC, Copper Condenser)', 5, 14, 'CARRIER 1.5 Ton 3 Star Split AC img1.PNG', 'CARRIER 1.5 Ton 3 Star Split AC img2.PNG', 'CARRIER 1.5 Ton 3 Star Split AC img3.PNG', 'CARRIER 1.5 Ton 3 Star Split AC img4.PNG', '3 Star BEE Rating 2021 : For energy savings upto 15% (compared to Non-Inverter 1 Star)', 'Auto Restart: No need to manually reset the settings post power-cut', 'Copper : Energy efficient, best in class cooling with easy maintenance.', 'Sleep Mode: Auto-adjusts the temperature to ensure comfort during your sleep', '1.5 ton', '30999', 'AIR-10001', '5 Years', 'ac,air conditioner,carrier,1.5 ton', '2021-09-07 11:49:03', 'all'),
(38, 'SAMSUNG 7 kg 5 Star Wifi AI-Enabled Fully Automatic Front Load Black, Grey ', 5, 15, 'SAMSUNG 7 kg  washing machine img1.PNG', 'SAMSUNG 7 kg  washing machine img2.PNG', 'SAMSUNG 7 kg  washing machine img3.PNG', 'SAMSUNG 7 kg  washing machine img4.PNG', 'Fully Automatic Front Load Washing Machines have Great Wash Quality with very less running cost', '1200 rpm : Higher the spin speed, lower the drying time', '5 Star Rating', '7 kg load', 'Wifi Enabled', '34399', 'WAS-10001', '5 Years', 'washing machine,7kg,wifi enabled', '2021-09-07 12:10:42', 'women'),
(39, 'LOTUS HERBALS WhiteGlow Skin Whitening And Brightening Gel, Face Cream with SPF-25, for all skin types  (40 g)', 6, 16, 'LOTUS HERBALS WhiteGlow Skin img1.PNG', 'LOTUS HERBALS WhiteGlow Skin img2.PNG', 'LOTUS HERBALS WhiteGlow Skin img3.PNG', 'LOTUS HERBALS WhiteGlow Skin img4.PNG', 'Applied For: Skin Brightening', 'Ideal For: Women', 'Type: Gel', 'Container Type: Jars', 'Maximum Shelf Life 36 Months', '182', 'SKIN-10001', 'No Warrenty', 'gel,cream,skin cream, lotus,', '2021-09-07 12:16:42', 'women'),
(40, 'Organicure Red Onion Black Seed Hair Oil for Hair Regrowth With Castor, Argan & Bhringraj; Anti Hair fall & Dandruff Control Hair Oil For Men & Women Hair Oil  (100 ml)', 6, 17, 'Red Onion Black Seed Hair Oil img1.PNG', 'Red Onion Black Seed Hair Oil img2.PNG', 'Red Onion Black Seed Hair Oil img3.PNG', 'Red Onion Black Seed Hair Oil img4.PNG', 'With Natural Onion Hair Oil for hair growth with kalonji and castor oil', 'Herbal hair oil comprises of key components such as pure red onion extracts and Black seed, Almond, Grapeseed, castor oil with argan Oil, Jojoba Oil, Amla, Bhrami, Hibiscus, Neem, Bhringraj, Mango Butter, Shea Butter, Sandalwood Oil, and Rose Oil Coconut Oil, Sunflower Oil, Vitamin E, Isoamyl laurate.', 'Red Onion oil provides sulfur that promotes hair growth, Vitamin E lends best hair nourishment thereby reduces dandruff, flakes, and frizz, improving hair health and shine', 'Natural and herbal oil minimizes hair loss, stimulates hair growth and controls hair from falling out. Onion oil and castor oil also encourage natural hair growth.', 'The natural and essential oils stimulate hair growth while nourishing the scalp and hair follicles.', '244', 'HAIR-10001', 'No Warrenty', 'hair oil,natural oil,herbal oil,hair growth,dandruff', '2021-09-07 12:25:12', 'all'),
(41, 'Homes Opus Engineered Wood Queen Box Bed  (Finish Color - Dark Melamine Wenge, Delivery Condition - Knock Down)', 7, 19, 'Wood Queen Box Bed img1.PNG', 'Wood Queen Box Bed img2.PNG', 'Wood Queen Box Bed img3.PNG', 'Wood Queen Box Bed img4.PNG', 'Bed Material Subtype: Particle Board', 'W x H x D: 162.05 cm x 79.75 cm x 213.1 cm (5 ft 3 in x 2 ft 7 in x 6 ft 11 in)', 'Storage Type: Box', 'Delivery Condition: Knock Down - Delivered in non-assembled pieces, installation by service partner', 'Size: Queen', '13753', 'BED-10001', '1 Year', 'bed,wooden bed,durable', '2021-09-07 12:54:38', 'all'),
(42, 'MAYBELLINE NEW YORK Sara Eye Makeup Colossal Kajal Colosal Bold Liner and Colossal Waterproof Mascara', 6, 18, 'MAYBELLINE NEW YORK Sara Eye Makeup img1.PNG', 'MAYBELLINE NEW YORK Sara Eye Makeup img2.PNG', 'MAYBELLINE NEW YORK Sara Eye Makeup img3.PNG', 'MAYBELLINE NEW YORK Sara Eye Makeup img4.PNG', 'Waterproof smudge proof and last for upto 12 hours', 'The Mascara has 2X collagen for long voluminous lashes ', 'Infused with Aloe Vera for keeping your eyes cool', 'Matte and smudge proof ', 'Pencil Form', '548', 'MAKE-10001', 'No Warrenty', 'maybelline,make up,eye liner', '2021-09-07 13:02:34', 'women'),
(43, 'CasaStyle Adona LHS L Shape Fabric 5 Seater Sofa  (Finish Color - Blue-Light Grey,', 7, 20, '5 Seater Sofa img1.PNG', '5 Seater Sofa img2.PNG', '5 Seater Sofa img3.PNG', '5 Seater Sofa img1.PNG', 'Upholestry: Polycotton', 'Filling Material: Foam', 'W x H x D: 256.54 cm x 83.82 cm x 137.16 cm (8 ft 5 in x 2 ft 9 in x 4 ft 6 in)', 'Left Facing', 'Delivery Condition: DIY - Basic assembly to be done with simple tools by the customer, comes with instructions.', '21799', 'SOFA-10001', '8 Years', 'sofa,5 seater,blue color,l shape', '2021-09-07 13:09:50', 'all'),
(44, 'BLUEWUD Amalet Engineered Wood Study Table  (Free Standing, Finish Color - Wenge', 7, 21, 'BLUEWUD Amalet Engineered Wood Study Table img1.PNG', 'BLUEWUD Amalet Engineered Wood Study Table img2.PNG', 'BLUEWUD Amalet Engineered Wood Study Table img3.PNG', 'BLUEWUD Amalet Engineered Wood Study Table img4.PNG', 'Material: Particle Board', 'Configuration: Straight', 'Height x Width: 72 cm x 116 cm (2 ft 4 in x 3 ft 9 in)', 'Storage Included', 'DIY - Basic assembly to be done with simple tools by the customer, comes with instructions.', '5361', 'OFF-10001', '1 Year', 'office table, wooden table,office', '2021-09-07 13:17:40', 'all'),
(45, 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 4)', 8, 22, 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 4) img1.PNG', 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 4) img2.PNG', 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 4) img3.PNG', 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 4) img4.PNG', 'Type: Round Neck', 'Sleeve: Half Sleeve', 'Fabric: Polycotton', 'Fit: Regular', 'Sales Package: Pack of 4 Round Neck T-shirts', '637', 'CLO-10001', '7 Days Replacement', 'sports T-shirts,sports clothing,round neck', '2021-09-07 13:24:40', 'men'),
(46, 'Combo Pack of 2 Sports Shoes Running Shoes For Men ', 8, 23, 'Combo Pack of 2 Sports Shoes Running Shoes For Men img1.PNG', 'Combo Pack of 2 Sports Shoes Running Shoes For Men img2.PNG', 'Combo Pack of 2 Sports Shoes Running Shoes For Men img3.PNG', 'Combo Pack of 2 Sports Shoes Running Shoes For Men img4.PNG', 'Color: Blue', 'Ideal for: Men', 'Sole material: PVC', 'Sales package: 2 Pair OF Shoes', 'Occasion: Sports', '498', 'SHOE-10001', '7 Days Replacement', 'men shoes,sport shoes, blue shoes,', '2021-09-07 13:34:13', 'men'),
(47, 'Adrenex Combo - 2 Badminton Racquet with Shuttle Badminton Kit', 8, 24, 'Badminton Racquet img1.PNG', 'Badminton Racquet img2.PNG', 'Badminton Racquet img3.PNG', 'Badminton Racquet img4.PNG', 'Sport Type: Badminton ', 'Contains: 2 Badminton Racquet', 'Width: 20.5 cm, Height: 68.5 cm, Depth: 6 cm ', 'Color: Red, Yellow ', 'Ideal For: Men, Women, Boys, Girls ', '521', 'GEAR-10001', '14 Days Replacement', 'badminton, sports gear, combo', '2021-09-07 13:40:15', 'all'),
(48, 'Miss & Chief 1:18 Very High Speed Race Car Style 4 channel Radio Control RC Car  (Red)', 9, 25, 'Speed Race Car img1.PNG', 'Speed Race Car img2.PNG', 'Speed Race Car img3.PNG', 'Speed Race Car img4.PNG', 'Width x Height: 23.5 cm x 9 cm ', 'Age: 3+ Years', 'Material: Plastic', 'Battery Operated, 6 Battteries ', 'Non-rechargeable Batteries', '1525', 'REM-10001', 'No Warrenty', 'remote control car,kids toy,toy car,red car', '2021-09-07 13:53:51', 'kids'),
(49, 'BOZICA BEST BABY GIFT 100 PCS(92 PIECES+8 TYRES) Building Blocks,Creative Learning Educational Toy for Kids Puzzle Assembling Shape Building Unbreakable Toy Set  (100 Pieces)', 9, 26, 'Toy for Kids Puzzle img1.PNG', 'Toy for Kids Puzzle img2.PNG', 'Toy for Kids Puzzle img3.PNG', 'Toy for Kids Puzzle img4.PNG', 'Skillset: Alphabet & Number Recognition, Creativity & Imagination, Hand & Eye Co-ordination, Rhythm & Pattern Recognition, Color & Shape Recognition, General Knowledge, Time Management', 'Material: Plastic ', 'Age: 4+ Years ', '100 Pieces Puzzle', 'Polypropylene Soft Plastic', '581', 'PUZ-10001', '7 Days Replacement', 'kids,kids puzzle,kids toys,kids games, 100 piece puzzle', '2021-09-07 14:04:27', 'kids'),
(50, 'Crispy toys Big Size Funny Unicorn Stuffed Animal Plush for kids, 85 CM (Pink) 100% Safe for Kids Made in India. - 85 cm  (Pink)', 9, 27, 'Stuffed Animal Plush for kid img1.PNG', 'Stuffed Animal Plush for kid img2.PNG', 'Stuffed Animal Plush for kid img3.PNG', 'Stuffed Animal Plush for kid img3.PNG', 'Character: Unicorn', 'Washable ', 'Age: 3+ Years', 'Super Soft Plush Toy Soft Stuffed for Kids', 'Fur fabrics Excellent filling fiber ', '649', 'SOFT-10001', '14 Days Replacement', 'soft toy, pink color toy,girl toy', '2021-09-07 14:09:20', 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, 'Men', 1),
(2, 'Women', 1),
(3, 'Kids', 1),
(4, 'Realme', 2),
(5, 'Samsung', 2),
(6, 'MI', 2),
(7, 'Laptops & Desktops', 3),
(8, 'Audio Devices', 3),
(9, 'IT Peripherals', 3),
(10, 'Choppers & Knives', 4),
(11, 'Bottles & Containers', 4),
(12, 'Mattressess & Bedsheets', 4),
(13, 'Televisions', 5),
(14, 'Air Conditioners', 5),
(15, 'Washing Machines', 5),
(16, 'Skin Care', 6),
(17, 'Hair Care', 6),
(18, 'Make-Up', 6),
(19, 'Beds', 7),
(20, 'Sofas', 7),
(21, 'Office Tables', 7),
(22, 'Sports Clothing', 8),
(23, 'Sports Shoes', 8),
(24, 'Sports Gear', 8),
(25, 'Remote Control Toys', 9),
(26, 'Puzzles', 9),
(27, 'Soft Toys', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_cat`
--
ALTER TABLE `main_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_cat`
--
ALTER TABLE `main_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
