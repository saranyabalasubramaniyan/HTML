-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 09:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitename`
--
CREATE DATABASE IF NOT EXISTS `infinitydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `infinitydb`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
CREATE TABLE `product` (
  `product_id` mediumint(8) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `price` DOUBLE(10,2) NOT NULL,
  `long_description` varchar(250) NOT NULL,
  `category` varchar(20) NOT NULL,
  `product_image_name` varchar(128) NOT NULL,
  `product_image` LONGBLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_time` date NOT NULL
)

CREATE TABLE `orderitem` (
  `order_id` int(11) NOT NULL PRIMARY KEY,
  `product_id` int(11) NOT NULL PRIMARY KEY,
  `quantity` int(11) NOT NULL
)

CREATE TABLE `customers` (
  `customer_id` mediumint(8) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customers` (`first_name`, `last_name`, `email`, `pass`) VALUES
('Adams', 'Hills', 'adams.hills@gmail.com', '1c573dfeb388b562b55948af954a7b344dde1cc2099e978a992790429e7c01a4205506a93d9aef3bab32d6f06d75b7777a7ad8859e672fedb6a096ae369254d2'),
('Baker', 'Mason', 'baker.mason@gmail.com', '88ad80e3600c1be894d41dc8f25d30f7e61f5d11ebd94b6b781caf5f8c2d866521c4697892f328441a14ae840560fb367fcf73303968d3a1fa02e13994e32f71'),
('Melissa', 'Bank', 'melissa.bank@gmail.com', '368c7d14dad7196b49a4947c8e95f7d490cbcd9835c77d1a353b1223c510cefb5b356f7f6fe389a7fdba24e0d40dc62c8782992d41ca631fe932b30480b475a5'),
('Toni', 'Morrison', 'toni.morrison@gmail.com', '015ce5cf680a6911acb07c13a0022939681c1de5cd4d9a3c49f9da2cde9507270431e3d81ad0c2d1aed9a3d0ee03d9c84a789599967517c417786632bd2d6a53'),
('Jonathan', 'Franzen', 'jonathan.franzen@gmail.com', '3d962211ac6fefe6ef1ad36db3e4be7e6243c0f07ac11f209009c7d5777a80717f15bf36309efb56313704c224d3b211fdcece3071a00a9544bb286fafeb0eb4'),
('Don', 'DeLillo', 'don.deLillo@gmail.com', 'af9ae0766337a63a2b4bc15c1bd2fc288a1a28d43807dc9e21dddaaccb31e7f83f80aae93d29cb28c03040af816c49a1e9d553b57abac0e560ccbbc343459a55'),
('Graham', 'Greene', 'graham.greene@gmail.com', '6201404dd00d4c31971b1a6ffbc76b40ba4bba8eb7a62bd4d27c394ad89a49b25e78c0154683a51067771c54a2459b4c57710283a72e1f4dca82293c4d688556'),
('Michael', 'Chabon', 'michael.chabon@gmail.com', 'd5d81d94808b1613eb086d45ba9afce33720de0a62d380dede5a886b9288de89f977b89ed4895c259666618caac90d74e120833c22e1e17b05a5eee649494f2d'),
('Richard', 'Brautigan', 'richard.brautigan@gmail.com', '94b550bdcc1d36a3ff9cbb7d7aa9d43fac1070caa8ee1c23867169a9d4b50d776ae036bfe6768247838ae7a2466469ce9a0fee43aab89b3821246e2dcb462f3e'),
('Russell', 'Banks', 'russell.banks@gmail.com', 'bc618f7d0688466fa094dc9a25df9e8365f68a121b82571489170e98298999e3c63d037d41fb1833c15fb638bec666c706e0256d1bb123bb56c29e2734620827');

INSERT INTO `product` (`product_name`, `price`, `long_description`, `category`,`product_image_name`,`product_image`) VALUES
('Hot Wheels- Ultimate Garage', '29.99', 'This Hot Wheels™ City set is the ULTIMATE challenge in the TALLEST Ultimate Garage playset so far, offering endless storytelling and vehicle action play! The enormous toy garage has parking for up to 100+ vehicles and a surprising Robo T-Rex nemesis that fuels kids’ imagination! Kids take their Hot Wheels® toy cars all the way up in the kid-powered two-car elevator, then race down through the multi-level garage and experiment with multi-play mode for continuous thrills! Connects to other Hot Wheels® sets (sold separately) and includes two Hot Wheels® 1:64 scale vehicles, plus a feature for Hot Wheels™ id action, too! Plug in the Hot Wheels™ id Portal (sold separately) to unlock the additional play experience: scan a car, race opponents, escape from the Robo T-Rex and win! Colors and decorations may vary.','Toys','hotwheels.jpg','hotwheels.jpg'),
('Nintendo-Animal Crossing', '59.99', 'Build your community from scratch on a deserted island brimming with possibility;','Games','animalCrossing.jpg','animalCrossing.jpg'),
('Cat in the Hat', '7.49', 'The story centers on a tall anthropomorphic cat who wears a red and white-striped top hat and a red bow tie. The Cat shows up at the house of Sally and her brother one rainy day when their mother is away.','Books','cat_in_the_hat.jpg','cat_in_the_hat.jpg'),
('Ginger, The Giraffe', '19.59', 'Read this warm tale of camaraderie and affection set in the wild and beautiful Savannah in our free illustrated kids book.','Books','Ginger-the-girraffe-cover.jpg','Ginger-the-girraffe-cover.jpg'),
('Lego Classic', '15.00', 'Create anything you can imagine with these huge LEGO® Classic brick sets, stuffed full with LEGO® pieces like wheels, windows, eyes, leaves, flags','Games','lego.jpg','lego.jpg'),
('Marvel-Captain America', '12.00', 'Recipient of the Super Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.','Toys','marvel.jpg','marvel.jpg'),
('Play Station 5 - Spiderman', '49.99', 'Experience the rise of Miles Morales as the new hero masters incredible, explosive new powers to become his own Spider-Man on PS5.','Games','spiderman_ps5.jpg','spiderman_ps5.jpg'),
('Nintendo - Super Mario Bros Deluxe', '60.00', 'Take on two family-friendly, side-scrolling adventures with up to three friends* as you try to save the Mushroom Kingdom. ','Games','supermario_deluxe.jpg','supermario_deluxe.jpg'),
('What are Stars', '8.40', 'Curious little children can lift over 30 flaps to find the answers to these questions and many more in this delightful introduction to stars and the night sky','Books','WhatAreStars.jpg','WhatAreStars.jpg');