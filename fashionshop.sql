-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 09:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `bonus_id` int(11) NOT NULL,
  `bonus_percentage` int(3) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(11) NOT NULL,
  `code_number` varchar(255) NOT NULL,
  `code_amount` varchar(255) NOT NULL,
  `deposit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_zipcode` varchar(255) NOT NULL,
  `c_phonenumber` varchar(255) NOT NULL,
  `c_payment` varchar(255) NOT NULL,
  `c_nic` varchar(255) NOT NULL,
  `c_found` varchar(255) NOT NULL,
  `c_fav` varchar(255) NOT NULL,
  `c_gender` varchar(255) NOT NULL,
  `c_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_password`, `c_email`, `c_address`, `c_zipcode`, `c_phonenumber`, `c_payment`, `c_nic`, `c_found`, `c_fav`, `c_gender`, `c_photo`) VALUES
('Kyaw Zin Thant', 'kaskar123!', 'kaskar@gmail.com', 'Yangon', '+95', '09402199012', 'Paypal', '12/DGT(Naing)077242', 'Google', 'Shirts', 'Male', '1.jpg')
-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_type` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(11) NOT NULL,
  `total_deposit` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `total_deposit`, `c_id`) VALUES
(1, '234', 2),
(2, '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_percentage` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE `giftcode` (
  `code_id` int(11) NOT NULL,
  `code_number` varchar(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `deposit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_photo` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_discount` varchar(255) NOT NULL,
  `item_rating` varchar(255) NOT NULL,
  `item_sale_count` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `item_tag` varchar(255) NOT NULL,
  `item_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_photo`, `item_price`, `item_discount`, `item_rating`, `item_sale_count`, `item_type`, `item_category`, `item_description`, `item_tag`, `item_total`) VALUES
(13, 'Blue Striped T-shirt ', 'Blue Striped T-shirt .jpg', '100', '0', '0', '0', 'shirt', 'man', 'T-shirt in cotton jersey with a print motif.', 'Shirt', 30),
(14, 'Block-patterned T-shirt', 'Block-patterned T-shirt .jpg', '120', '10', '0', '0', 'shirt', 'man', 'T-shirt in jersey made from premium cotton.', 'Shirt', 50),
(15, 'concealed fastening checked shirt', 'concealed fastening checked shirt .jpg', '140', '5', '0', '0', 'shirt', 'man', 'Slim fit - a fitted shirt with shaping seams at the back.', 'Shirt', 40),
(16, 'Cotton piquÃ© T-shirt ', 'Cotton piquÃ© T-shirt .jpg', '100', '6', '0', '0', 'shirt', 'man', 'Round-necked jersey T-shirt in a stretch cotton blend. Slim fit.', 'Shirt', 30),
(17, 'Cotton piquÃ© T-shirt Light Gret Blue', 'Cotton piquÃ© T-shirt Light Gret Blue.jpg', '130', '0', '0', '0', 'shirt', 'man', 'Round-neck T-shirts in soft organic cotton jersey. Regular fit.\r\n\r\n', 'Shirt', 30),
(18, 'Fine-knit jumper Natural white', 'Fine-knit jumper Natural white.jpg', '150', '7', '0', '0', 'shirt', 'man', 'Long-sleeved top in sweatshirt fabric with a scuba feel. ', 'Shirt', 40),
(19, 'Textured wool-blend jumper green', 'Textured wool-blend jumper green.jpg', '160', '10', '0', '0', 'shirt', 'man', 'Block-coloured top in sweatshirt fabric with long raglan sleeves and ribbing at the cuffs and hem.', 'Shirt', 50),
(20, 'Cotton flannel trousers', 'Cotton flannel trousers .jpg', '150', '10', '0', '0', 'trouser', 'man', 'Trousers in sweatshirt fabric with an elasticated drawstring waist, slightly lower crotch, gently tapered legs, side pockets and ribbed hems.', 'Trouser', 40),
(21, 'Cotton joggers', 'Cotton joggers .jpg', '140', '8', '0', '0', 'trouser', 'man', 'Trousers in sweatshirt fabric with an elasticated drawstring waist, slightly lower crotch, gently tapered legs, side pockets and ribbed hems. Soft brushed inside.\r\n\r\n', 'Trouser', 40),
(22, 'Cotton twill joggers', 'Cotton twill joggers.jpg', '120', '10', '0', '0', 'trouser', 'man', 'Suit trousers in a wool-blend, marked flannel with an extended waistband with a concealed hook-and-eye fastener.', 'Trouser', 60),
(23, 'pleated tailored trousers', 'pleated tailored trousers.jpg', '190', '10', '0', '0', 'trouser', 'man', 'Suit trousers in wool twill with an extended waistband, concealed hook-and-eye fasteners and zip fly with a concealed button. ', 'Trouser', 60),
(24, 'Premium cotton twill trousers', 'Premium cotton twill trousers .jpg', '178', '10', '0', '0', 'trouser', 'man', ' 5-pocket trousers in slightly stretchy twill made from premium cotton with a regular waist and slim legs. Slim fit.', 'Trouser', 70),
(25, 'Trapered leg trouser', 'tapered leg trousers.jpg', '199', '10', '0', '0', 'trouser', 'man', 'Suit trousers in a slightly stretchy cotton weave with a concealed hook-and-eye fastener and zip fly. Pockets in the side seams, welt back pockets and creases. Slim fit.', 'Trouser', 70),
(26, 'Adidas Originals Campus sneakers', 'Adidas Originals Campus sneakers .jpg', '150', '10', '0', '0', 'shoe', 'man', 'Adidasâ€™ court-inspired Campus sneakers, which are a late â€˜70â€™s classic, are presented for AW17 in grey and white. Fabricated from leather and suede, these lightly textured low-top Adidas Originals Campus sneakers feature signature appliquÃ© stripes at the sides, a lace-up front fastening, embossed branding at the tongue and heel counter and a flat rubber sole. ', 'Shoe', 50),
(27, 'Adidas Originals Iniki sneakers', 'Adidas Originals Iniki sneakers .jpg', '160', '10', '0', '0', 'shoe', 'man', 'these Inki sneakers are constructed with a round toe, a lace-up front fastening, branding at the tongue and heel and serrated edge three stripe appliquÃ©s. ', 'Shoe', 60),
(28, 'Detroit Runner Sneaker', 'Detroit Runner sneakers.jpg', '199', '10', '0', '0', 'shoe', 'man', 'White cotton and leather Detroit Runner sneakers from Adidas by Raf Simons. ', 'Shoe', 50),
(29, 'Low 3 sneaker', 'Low 3 sneakers .jpg', '160', '0', '0', '0', 'shoe', 'man', 'Verdrant green leather Low 3 sneakers from ETQ. ', 'Shoe', 40),
(30, 'Race Runner', 'Race Runners .jpg', '250', '10', '0', '0', 'shoe', 'man', 'These Race Runner sneakers are perfect for dashing around a city-scape in sports luxury comfort. ', 'Shoe', 40),
(31, 'Leather loafer with GG web', 'Leather loafer with GG Web .jpg', '200', '10', '0', '0', 'shoe', 'man', 'Black leather with green and red Web. Double G hardware. Leather sole. 15mm heel. Made in Italy. ', 'Shoe', 30),
(32, 'Denim cap with applique', 'Denim cap with appliquÃ© .jpg', '60', '0', '0', '0', 'accessory', 'man', 'Denim cap with an embroidered appliquÃ© on the front and an adjustable tab with a metal fastener at the back.', 'Accessory', 50),
(33, 'Classic Paris East,West wallet', 'Classic Paris East,West wallet.jpg', '100', '0', '0', '0', 'accessory', 'man', 'Saint Laurentâ€™s Italian-made Classic Paris East/West wallet is constructed from smooth black leather and features the labelâ€™s embossed logo to the exterior. Detailed with eight internal card slots, two note compartments and two receipt slots; this handy Saint Laurent accessory also benefits from an internal embossed logo stamp. ', 'Accessory', 20),
(34, 'Cap', 'Cap .jpg', '50', '0', '0', '0', 'accessory', 'man', 'Cap with terry sweatband on the inside, an adjustable fastener at the back and reflective details.', 'Accessory', 30),
(35, 'logo buckle belt', 'logo buckle belt .jpg', '200', '10', '0', '0', 'accessory', 'man', 'This black leather Gold initials belt from Dolce & Gabbana features an adjustable fit and a signature logo buckle. ', 'Accessory', 40),
(36, 'Valentino Garavani V-Punk backpack', 'Valentino Garavani V-Punk backpack .jpg', '300', '10', '0', '0', 'accessory', 'man', 'Capture the essence of Italian luxury and glamour with the Valentino SS17 collection.', 'Accessory', 40),
(37, 'ribbed knit scarf', 'ribbed knit scarf.jpg', '180', '10', '0', '0', 'accessory', 'man', 'This black wool ribbed knit scarf is an essential and timeless addition to your wardrobe. ', 'Accessory', 50),
(38, 'chanel-shirt-dope-swag', 'chanel-shirt-dope-swag.jpg', '150', '0', '0', '0', 'shirt', 'woman', 'Butter beige boxy cashmere jumper from Khaite. ', 'Shirt', 40),
(39, 'Viscose shirt ', 'Viscose shirt .jpg', '100', '0', '0', '0', 'shirt', 'woman', 'Straight-cut shirt in a soft viscose weave with a chest pocket, buttons down the front and a rounded hem.', 'Shirt', 60),
(40, 'Embroidered viscose shirt', 'Embroidered viscose shirt .jpg', '120', '0', '0', '0', 'shirt', 'woman', 'Long shirt in a viscose weave with embroidery on the front, a collar and buttons down the front, a yoke at the back and long sleeves with buttoned cuffs.', 'Shirt', 50),
(41, 'Cotton shirt', 'Cotton shirt.jpg', '120', '0', '0', '0', 'shirt', 'woman', 'Shirt in an airy cotton weave with buttons down the front and long sleeves with buttoned cuffs. Rounded hem with slits in the sides.', 'Shirt', 50),
(42, 'tee-shirts-t-shirt-diy', '-tee-shirts-t-shirt-diy.jpg', '100', '0', '0', '0', 'shirt', 'woman', 'White cotton fitted layer shirt from Carven. ', 'Shirt', 50),
(43, 'Top with applique', 'Top with appliques.jpg', '100', '0', '0', '0', 'shirt', 'woman', 'Wide, short-sleeved top in marled cotton jersey with appliquÃ©s on the front.', 'Shirt', 40),
(44, 'Mensy Peg Trouser', 'Mensy Peg Trousers.jpg', '150', '0', '0', '0', 'trouser', 'woman', 'Black long wide-leg trousers from Joseph. ', 'Trouser', 60),
(45, 'The waist cropped trouser', 'The waist cropped trouser.jpg', '150', '0', '0', '0', 'trouser', 'woman', 'Camel cotton and wool blend belted high waist trousers from Sara Battaglia. ', 'Trouser', 50),
(46, 'flared trousers', 'flared trousers .jpg', '200', '0', '0', '0', 'trouser', 'woman', 'Red cotton blend flared trousers from Vivetta. ', 'Trouser', 60),
(47, 'plaid flared hem trousers ', 'plaid flared hem trousers .jpg', '180', '10', '0', '0', 'trouser', 'woman', 'Grey plaid flared hem trousers from Rosie Assoulin. ', 'Trouser', 60),
(48, 'classic tailored trousers ', 'classic tailored trousers .jpg', '200', '10', '0', '0', 'trouser', 'woman', 'Brown wool classic tailored trousers from Tome. ', 'Trouser', 50),
(49, 'Fabienne trousers ', 'Fabienne trousers .jpg', '200', '10', '0', '0', 'trouser', 'woman', 'These wool Fabienne trousers feature a high, fitted waist, a front button fastening, a houndstooth pattern, a pleated design, a wide leg and a long length. ', 'Trouser', 50),
(50, 'Faux Leather Tote Bag', 'Faux Leather Tote Bag.jpg', '200', '10', '0', '0', 'accessory', 'woman', 'Made in Italy to the houseâ€™s exacting standards, it features two rounded top handles, a detachable shoulder strap and a central embossed logo stamp. ', 'Accessory', 30),
(51, 'mini pyramid diamond necklace', 'mini pyramid diamond necklace .jpg', '200', '10', '0', '0', 'accessory', 'woman', '18kt yellow gold mini pyramid diamond necklace from Sarah Noor featuring a mini pyramid shaped pendant embellished with pavÃ© set 0.20 carat VS1 G colour diamonds and a delicate princess length chain. ', 'Accessory', 20),
(53, 'Round cross-baby bag', 'round cross-body bag .jpg', '150', '10', '0', '0', 'accessory', 'woman', 'Orange leather round cross-body bag from MANSUR GAVRIEL. ', 'Accessory', 40),
(54, '58 Tallulah aviator sunglasses ', '58 Tallulah aviator sunglasses .jpg', '200', '10', '0', '0', 'accessory', 'woman', 'Black metal 58 Tallulah aviator sunglasses from Sunday Somewhere. This item comes with a protective case. ', 'Accessory', 40),
(55, 'removable pom pom knit hat ', 'removable pom pom knit hat .jpg', '200', '10', '0', '0', 'accessory', 'woman', 'Grey angora blend, racoon fur and marmot fur removable pom pom knit hat from Yves Salomon Accessories. Please note that this item cannot be shipped outside the E.U.. Made in France', 'Accessory', 40),
(56, 'Shearling logo scarf ', 'Shearling logo scarf .jpg', '150', '10', '0', '0', 'accessory', 'woman', 'Black shearling logo scarf from Balenciaga featuring a logo detail and a soft lamb fur construction. ', 'Accessory', 40),
(57, 'Sandal', 'Sandals .jpg', '140', '0', '0', '0', 'shoe', 'woman', 'Sandals with a covered heel, ankle strap with a metal buckle and elastication, imitation leather linings and insoles and rubber soles. Heel 8 cm.', 'Shoe', 60),
(58, 'Ophelia over-the-knee boots ', 'Ophelia over-the-knee boots .jpg', '230', '10', '0', '0', 'shoe', 'woman', ' Pearl grey velvet and leather Ophelia over-the-knee boots featuring an almond toe, a thigh high style and a high stiletto heel. Made in Italy', 'Shoe', 40),
(59, 'Celeste booties', 'Celeste booties .jpg', '149', '10', '0', '0', 'shoe', 'woman', ' Black calf leather Celeste booties featuring an almond toe, a stretch fit, glitter details and a high stiletto heel. Made in Italy', 'Shoe', 50),
(60, 'Tournament shearling sneakers ', 'Tournament shearling sneakers .jpg', '150', '10', '0', '0', 'shoe', 'woman', 'Brown sheepskin Tournament shearling sneakers from Common Projects. Made in Italy', 'Shoe', 50),
(61, 'pearl strap hi-top sneakers ', 'pearl strap hi-top sneakers .jpg', '180', '10', '0', '0', 'shoe', 'woman', 'Blush pink calf leather and kid leather pearl strap hi-top sneakers from Nicholas Kirkwood featuring a round toe, a lace-up front fastening and a rubber sole. ', 'Shoe', 50),
(62, 'Huarache Run Ultra sneakers ', 'Huarache Run Ultra sneakers .jpg', '140', '0', '0', '0', 'shoe', 'woman', 'Set upon a cushioned Air heel unit, these Huarache Ultra sneakers feature a foam midsole, internal Flywire cables and flex grooves to the white rubber outsole for a flexible finish. ', 'Shoe', 60),
(63, 'Jersey top with a print motif', 'Jersey top with a print motif .jpg', '130', '0', '0', '0', 'shirt', 'kid', 'Fine-knit jumper in soft cotton with a motif and ribbing around the neckline, cuffs and hem.', 'Shirt', 40),
(64, 'Fine-knit jumper ', 'Fine-knit jumper .jpg', '146', '0', '0', '0', 'shirt', 'kid', 'Fine-knit jumper in soft cotton with a motif and ribbing around the neckline, cuffs and hem.', 'Shirt', 50),
(65, 'Jacquard-knit jumper ', 'Jacquard-knit jumper .jpg', '140', '0', '0', '0', 'shirt', 'woman', 'Jumper in a soft jacquard knit containing some alpaca wool with raglan sleeves and roll edges around the neckline, cuffs and hem.', 'Shirt', 50),
(66, 'Double-layered sweatshirt ', 'Double-layered sweatshirt .jpg', '145', '0', '0', '0', 'shirt', 'kid', 'The sweatshirt is layered at the bottom over woven fabric with a rounded hem and decorative buttons.', 'Shirt', 60),
(67, 'Fine-knit jumper Pink', 'Fine-knit jumper Pink.jpg', '130', '0', '0', '0', 'shirt', 'kid', 'Fine-knit jumper in a soft viscose blend with a motif on the front and a longer layer in a woven fabric at the hem. Slightly longer at the back.', 'Shirt', 50),
(68, 'Printed sweatshirt ', 'Printed sweatshirt .jpg', '150', '0', '0', '0', 'shirt', 'kid', 'Top in light, printed sweatshirt fabric with ribbing around the neckline, cuffs and hem.', 'Shirt', 40),
(69, 'Printed T-shirt ', 'Printed T-shirt .jpg', '100', '0', '0', '0', 'shirt', 'kid', 'Jersey T-shirt with a print motif.', 'Shirt', 50),
(70, 'Tregging', 'Treggings .jpg', '130', '7', '0', '0', 'trouser', 'kid', 'Treggings in sturdy jersey with an elasticated waist and decorative zips at the front.\r\n\r\n', 'Trouser', 60),
(71, 'Superstretch Skinny Fit Jeans Dark denim blue', 'Superstretch Skinny Fit Jeans Dark denim blue.jpg', '150', '0', '0', '0', 'trouser', 'kid', 'Leggings in washed superstretch denim with an elasticated waist, fake pockets at the front and real pockets at the back.', 'Trouser', 50),
(72, 'Superstretch Skinny Fit Jeans blue', 'Superstretch Skinny Fit Jeans blue.jpg', '150', '0', '0', '0', 'trouser', 'kid', 'Leggings in washed superstretch, flexible denim for maximum mobility with an elasticated waist, fake front pockets and real back pockets.', 'Trouser', 50),
(73, 'Leggings ', 'Leggings .jpg', '140', '0', '0', '0', 'trouser', 'kid', 'Leggings in sturdy jersey with an elasticated waist and imitation suede patches on the inside of the legs.', 'Trouser', 50),
(74, 'Jersey leggings ', 'Jersey leggings .jpg', '150', '0', '0', '0', 'trouser', 'kid', 'Jersey leggings with an elasticated waist.', 'Trouser', 40),
(75, 'floral print espadrilles ', 'floral print espadrilles .jpg', '189', '0', '0', '0', 'shoe', 'kid', 'High quality kidswear brand, Monnalisa fuses innovation with sustainability, producing socially responsible garments in pretty patterns and fun cartoon prints. ', 'Shoe', 50),
(76, 'pompom sneakers ', 'pompom sneakers .jpg', '158', '0', '0', '0', 'shoe', 'kid', 'White cotton and leather pompom sneakers from FLORENS featuring a round toe, a lace-up front fastening and a rubber sole. ', 'Shoe', 50),
(77, 'Sky sneakers ', 'Sky sneakers .jpg', '145', '0', '0', '0', 'shoe', 'kid', 'Grey leather Sky sneakers from PREMIATA KIDS. Made in Italy', 'Shoe', 40),
(78, 'glitter slip-on sneakers ', 'glitter slip-on sneakers .jpg', '150', '0', '0', '0', 'shoe', 'kid', 'Blue leather and velvet glitter slip-on sneakers from Quis Quis featuring elasticated side panels, a round toe and a flat rubber sole. ', 'Shoe', 50),
(79, 'slip-on sneakers ', 'slip-on sneakers .jpg', '150', '0', '0', '0', 'shoe', 'kid', 'Black suede slip-on sneakers from SALVATORE FERRAGAMO KIDS featuring a round toe, elasticated side panels, a brand embossed insole and a white rubber sole. ', 'Shoe', 50),
(80, 'Fingerless gloves', 'Fingerless gloves.jpg', '60', '0', '0', '0', 'accessory', 'kid', 'Fine-knit gloves with matching fingerless gloves with a print motif on the back. The gloves can be worn over each other or separately. ', 'Accessory', 30),
(81, 'Textured-knit hat', 'Textured-knit hat.jpg', '90', '0', '0', '0', 'accessory', 'kid', 'Hat in a soft rib knit containing glittery threads with decorative pompoms on the front.', 'Accessory', 50),
(82, 'Hairband with flowers', 'Hairband with flowers .jpg', '40', '0', '0', '0', 'accessory', 'kid', 'Pink flower hairband from Monnalisa. ', 'Accessory', 30),
(83, 'wildflower tulle hairclip ', 'wildflower tulle hairclip .jpg', '30', '0', '0', '0', 'accessory', 'kid', 'Shadow blue wildflower tulle hairclip from Tutu Du Monde featuring sequin embroidery. ', 'Accessory', 40),
(84, 'Hat with pompoms', 'Hat with pompoms .jpg', '30', '0', '0', '0', 'accessory', 'kid', 'Fine-knit hat in soft cotton with sequined embroidery and a ribbed hem.', 'Accessory', 60),
(85, 'Buttercup shoulder bag ', 'Buttercup shoulder bag .jpg', '90', '0', '0', '0', 'accessory', 'kid', 'Blue and navy Buttercup shoulder bag from Hucklebones London. ', 'Accessory', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total_price` int(100) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `item_quantity` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`bonus_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `deposit_id` (`deposit_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `deposit_id` (`deposit_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `bonus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_ibfk_2` FOREIGN KEY (`deposit_id`) REFERENCES `deposit` (`deposit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giftcode`
--
ALTER TABLE `giftcode`
  ADD CONSTRAINT `giftcode_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposit` (`deposit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
