-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wonderland`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_buyer_id` int(10) NOT NULL,
  `user_seller_id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `order_price` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_buyer_id`, `user_seller_id`, `service_id`, `date_time`, `order_price`, `status`) VALUES
(11, 5, 3, 16, '0000-00-00 00:00:00', 590, 0),
(12, 3, 2, 17, '0000-00-00 00:00:00', 290, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `pro_rate` decimal(2,1) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `cat_id`, `pro_rate`, `name`, `price`, `description`, `image_path`, `seller_id`) VALUES
(5, 1, '4.5', 'Proofreading & Editing', 245, 'Mauris imperdiet orci dapibus, commodo libero nec, interdum tortor. Morbi in nibh faucibus, cursus velit.', 'n_793.png', 3),
(6, 3, '4.9', 'CV Modification', 290, 'Proin pretium maximus neque, cursus consectetur elit molestie nec. Nunc imperdiet, ut faucibus enim tincidunt eu.', 'n_793_n.png', 2),
(7, 3, '4.8', 'Personal Statement Guidance', 450, 'Aenean in ipsum in quam tempus ultrices. Nulla eleifend ultricies ipsum, in accumsan ante auctor eu. ', 'n_793_np.png', 2),
(8, 1, '5.0', 'Letter of Recommendation', 250, 'Fusce lacinia tellus quis sem interdum porttitor. Maecenas vitae iaculis quam, nec porttitor sem.', 'n_793_nx.png', 4),
(12, 2, '4.2', 'TOEFL/GRE Consultation', 990, 'Cras elementum, elit at dictum vulputate, neque est efficitur magna, ac cursus ex libero sed ex.', 'n_793_o.png', 3),
(13, 2, '4.3', 'Graduate School Recommendation', 249, 'Cras interdum tempus volutpat. In tortor risus, varius sit amet nisl nec, egestas tempor ex.', 'n_793_od.png', 2),
(14, 2, '3.9', 'Timeline Guidance', 550, 'Integer mattis tincidunt nisi sit amet accumsan. Fusce quis fringilla risus. Sed a facilisis nisi.', 'n_793_ol.png', 4),
(15, 3, '4.0', 'CV/PS Polish up', 150, 'Fusce sed nulla nisl. Suspendisse feugiat sapien sed metus pulvinar, eget bibendum augue molestie.', 'n_793_ot.png', 4),
(16, 1, '3.6', 'Scholarship Argument Letter', 590, 'Phasellus sodales viverra ex ac luctus. Morbi fermentum lectus eget risus facilisis venenatis.', 'n_793_pa.png', 3),
(17, 1, '4.2', 'Love Letter Writing', 290, 'Morbi dui leo, tempor vitae est a, pellentesque hendrerit leo. In vel pretium dui. Duis eget est id urna faucibus viverra.', 'n_793_ph.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `priority` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `name`, `priority`) VALUES
(1, 'Writing', 4),
(2, 'Consultant', 3),
(3, 'Guidance/Tips', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contacts` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `is_seller` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL DEFAULT '/CW2/Pages/images/portrait.png',
  `country` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `contacts`, `bio`, `is_seller`, `email`, `image_path`, `country`, `university`) VALUES
(1, 'Ethan', '200', '18205224180', 'handsome', 0, 'minghao.du18@student.xjtlu.edu.cn', '/CW2/Pages/images/portrait.png	', 'China', 'XJTLU'),
(2, 'Stanley', '200', '18205224180', 'I am super hero!', 1, 'tianlei.shi18@student.xjtlu.edu.cn', '/CW2/Pages/images/portrait.png	', 'China', 'XJTLU'),
(3, 'Xia Zong', '200', 'summerzong@outlook.com', 'hhh', 1, 'Xia.Zong18@student.xjtlu.edu.cn', '/CW2/Pages/images/portrait.png', 'China', 'XJTLU'),
(4, 'OuYang', '300', '120', 'Hahahaha', 1, 'hongyan.ouyang17@student.xjtlu.edu.cn', '/CW2/Pages/images/portrait.png	', 'China', 'XJTLU'),
(5, 'ZYX', '100', '114', 'hahahaha', 0, 'yaxin.zhang17@student.xjtlu.edu.cn', '/CW2/Pages/images/portrait.png	', 'China', 'XJTLU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_buyer_id` (`user_buyer_id`),
  ADD KEY `user_seller_id` (`user_seller_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_buyer_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_seller_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
