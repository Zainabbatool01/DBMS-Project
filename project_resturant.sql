-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 08:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `people_num` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `date`, `time`, `people_num`, `message`, `customer_id`) VALUES
(1, 'Zainab Batool', '2233049@gmail.com', '03321234567', '2024-05-01', '00:00:00', 0, '', NULL),
(12, 'Amna Sabir', '2233221@gmail.com', '03321234598', '2024-05-21', '09:43:41', 5, 'Arrange a surprise birthday wish for my sister kindly', 11),
(17, 'Sara Khan', 'sara.khan@hotmail.com', '03441234567', '2024-06-15', '20:00:00', 2, 'Anniversary celebration', 3),
(24, 'Amna Sabir', '2233221@gmail.com', '03321234598', '2024-05-21', '09:43:41', 5, 'Arrange a surprise birthday wish for my sister kindly', 11),
(35, 'Murtaza Husnain Babar', 'murtazahusnainbabar@gmail.com', '0332 4154781', '0000-00-00', '11:00:00', NULL, 'None', NULL),
(46, 'Ali Raza', 'ali.raza@gmail.com', '03331112222', '2024-06-10', '19:00:00', 3, 'Dinner reservation for family', 2),
(93, 'Zainab Batool', '2233049@gmail.com', '03321234567', '2024-05-01', '00:00:00', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `name`, `specialization`, `image_url`, `twitter_url`, `facebook_url`, `instagram_url`, `linkedin_url`) VALUES
(1, 'Danial Arif', 'Master Chef', 'assets/img/chefs/chefs-1.jpg', 'https://twitter.com/danialarif', 'https://facebook.com/danialarif', 'https://instagram.com/danialarif', 'https://linkedin.com/in/danialarif'),
(2, 'Zainab', 'Dessert Chef', 'assets/img/chefs/chefs-2.jpg', 'https://twitter.com/zainabdessert', 'https://facebook.com/zainabdessert', 'https://instagram.com/zainabdessert', 'https://linkedin.com/in/zainabdessert'),
(3, 'Amna Sabir', 'Cook', 'assets/img/chefs/chefs-3.jpg', 'https://twitter.com/amnasabircook', 'https://facebook.com/amnasabircook', 'https://instagram.com/amnasabircook', 'https://linkedin.com/in/amnasabircook');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `customer_id`) VALUES
(0, 'Zainab Batool', 'zainab@gmail.com', 'b', 'no', NULL),
(7, 'Zainab Batool', 'zainab@gmail.com', 'b', 'no', NULL),
(8, 'Ali Raza', 'ali.raza@gmail.com', 'Inquiry', 'What are the opening hours?', 2),
(9, 'Sara Khan', 'sara.khan@hotmail.com', 'Feedback', 'Great service!', 3),
(31, 'Bilal Ahmed', 'bilal.ahmed@yahoo.com', 'Complaint', 'Food was cold.', 4),
(42, 'Maria Iqbal', 'maria.iqbal@gmail.com', 'Reservation', 'Need a table for 5 on Saturday.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Ayesha', 'Ayesha204@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `party_type` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `party_type`, `price`, `description`) VALUES
(1, 'Birthday Party', 199.00, 'Experience renowned Pakistani hospitality. Complimentary Birthday dessert accompanied by a personalized message and candlelit presentation to make the celebration extra special. Special discounts and complimentary treats for birthday celebrations or group bookings.'),
(2, 'Private Party', 290.00, 'Choosing Delicious guarantees a memorable event with its inviting ambiance and attention to detail. Exclusive perks include customized menus tailored to your preferences, exclusive access to private dining areas for an intimate atmosphere, and special discounts or offers for large party bookings. Priority booking for hassle-free planning and a dedicated event coordinator to assist with every detail.'),
(3, 'Custom Party', 99.00, 'Elevate your celebrations with custom parties tailored to your preferences, creating unforgettable moments with every gathering. Priority seating for large groups, exclusive discounts for loyal customers, and personalized menu options for special occasions. Delicious stands out for its authentic flavors, inviting ambiance, and personalized service, offering an unforgettable dining experience.');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_id`, `payment`, `time`, `date`, `name`) VALUES
(1, 1, 1000.00, '12:30:00', '2024-05-17', 'Muhammad Bilal'),
(2, 1, 500.00, '14:00:00', '2024-05-18', 'Amna Sabir'),
(3, 1, 750.00, '15:45:00', '2024-05-19', 'Dua Maryam'),
(11, 1, 1000.00, '12:30:00', '2024-05-17', 'Muhammad Bilal'),
(22, 1, 500.00, '14:00:00', '2024-05-18', 'Amna Sabir'),
(33, 1, 750.00, '15:45:00', '2024-05-19', 'Dua Maryam'),
(44, 2, 1200.00, '13:00:00', '2024-05-20', 'Ali Raza'),
(51, 3, 900.00, '12:00:00', '2024-05-21', 'Sara Khan');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `testimonial` text DEFAULT NULL,
  `chef_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image_url`, `rating`, `testimonial`, `chef_id`) VALUES
(1, 'Shahzaib Khan', 'Ceo & Founder', 'assets/img/testimonials/testimonials-1.jpg', 5, 'Delicious redefines Pakistani cuisine with every dish. From rich curries to succulent kebabs, their menu is a celebration of flavor and culture. A culinary experience not to be missed.', NULL),
(2, 'Dua Maryam', 'Designer', 'assets/img/testimonials/testimonials-2.jpg', 5, 'At Delicious, every bite is a journey through the vibrant tastes of Pakistan. Authentic flavors, impeccable service, and a cozy atmosphere make it a must-visit for any food enthusiast.', NULL),
(3, 'Ayesha Rasheed', 'Student', 'assets/img/testimonials/testimonials-3.jpg', 5, 'Delicious brings the vibrant flavors of Pakistan to your plate. Each dish is a delightful fusion of tradition and innovation, promising a memorable dining experience every time.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_customer_payment` (`customer_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chef` (`chef_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
