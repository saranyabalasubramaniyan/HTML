-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 05:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinitydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `customer_id` int(11) NOT NULL,
  `cardHolderName` varchar(40) NOT NULL,
  `cardNumber` int(16) NOT NULL,
  `expirationMonth` int(4) NOT NULL,
  `expirationYear` int(4) NOT NULL,
  `cardIdNumber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(11, 'saranya', 'b', 'saranya@smail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85'),
(12, 'vihaan', 'bubby', 'vihaan@vmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe'),
(13, 'Reeves', 'Steve', 'reevesteve@mmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe'),
(14, 'rewer', 'stef', 'wertSter@hmail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85'),
(15, 'Ravi', 'krishna', 'ravi.krishna@kmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe'),
(16, 'sweet', 'sour', 'sweet.sour@smail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` double(10,2) NOT NULL,
  `long_description` varchar(250) NOT NULL,
  `category` varchar(20) NOT NULL,
  `product_image_name` varchar(128) NOT NULL,
  `product_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `long_description`, `category`, `product_image_name`, `product_image`) VALUES
(19, 'HW-Ultimate Garage', 29.99, 'This Hot Wheels™ City set is the ULTIMATE challenge in the TALLEST Ultimate Garage playset so far, offering endless storytelling and vehicle action play!', 'Toys', 'hotwheels.jpg', 0x686f74776865656c732e6a7067),
(20, 'Nintendo-Animal Crossing', 59.99, 'Build your community from scratch on a deserted island brimming with possibility;', 'Games', 'animalCrossing.jpg', 0x616e696d616c43726f7373696e672e6a7067),
(21, 'Cat in the Hat', 7.49, 'The story centers on a tall anthropomorphic cat who wears a red and white-striped top hat and a red bow tie. The Cat shows up at the house of Sally and her brother one rainy day when their mother is away.', 'Books', 'cat_in_the_hat.jpg', 0x6361745f696e5f7468655f6861742e6a7067),
(22, 'Ginger, The Giraffe', 19.59, 'Read this warm tale of camaraderie and affection set in the wild and beautiful Savannah in our free illustrated kids book.', 'Books', 'Ginger-the-girraffe-cover.jpg', 0x47696e6765722d7468652d67697272616666652d636f7665722e6a7067),
(23, 'Lego Classic', 15.00, 'Create anything you can imagine with these huge LEGO® Classic brick sets, stuffed full with LEGO® pieces like wheels, windows, eyes, leaves, flags', 'Games', 'lego.jpg', 0x6c65676f2e6a7067),
(24, 'Marvel-Captain America', 12.00, 'Recipient of the Super Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.', 'Toys', 'marvel.jpg', 0x6d617276656c2e6a7067),
(25, 'Play Station 5 - Spiderman', 49.99, 'Experience the rise of Miles Morales as the new hero masters incredible, explosive new powers to become his own Spider-Man on PS5.', 'Games', 'spiderman_ps5.jpg', 0x7370696465726d616e5f7073352e6a7067),
(26, 'Nintendo - Super Mario Bros Deluxe', 60.00, 'Take on two family-friendly, side-scrolling adventures with up to three friends* as you try to save the Mushroom Kingdom. ', 'Games', 'supermario_deluxe.jpg', 0x73757065726d6172696f5f64656c7578652e6a7067),
(27, 'What are Stars', 8.40, 'Curious little children can lift over 30 flaps to find the answers to these questions and many more in this delightful introduction to stars and the night sky', 'Books', 'WhatAreStars.jpg', 0x5768617441726553746172732e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
