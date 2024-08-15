-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 04:14 PM
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
-- Database: `gallery_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registered_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `name`, `password`, `email`, `registered_timestamp`) VALUES
(1, 'tdbpathiraja', 'Tharindu', 'tharindu@1234', 'tdbpathiraja@gmail.com', '2024-07-16 14:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `beverages`
--

CREATE TABLE `beverages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Beverage') NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `time` enum('Breakfast','Lunch','Tea Time','Dinner') NOT NULL,
  `persons` int(11) NOT NULL,
  `cuisines` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` (`id`, `name`, `category`, `price`, `image_url`, `description`, `ingredients`, `time`, `persons`, `cuisines`) VALUES
(2, 'Watermelon Juice', 'Beverage', 100.00, NULL, 'Fresh watermelon Juice', 'Watermelon , Sugar , Water', 'Breakfast', 1, NULL),
(3, 'Virgin Mojito', 'Beverage', 450.00, NULL, 'At number one (but in no particular order) is the alcohol-free Mojito. A firm favourite with bar-goers, the Mojito offers drinkers a delightfully refreshing cocktail. Filled with lime \'zingyness\', sugar sweetness and mint freshness, they\'re undeniably easy to drink.', 'Fresh lime juice, lime wedges, sugar syrup, mint leaves, soda water', 'Lunch', 1, NULL),
(4, 'Shirley Temple', 'Beverage', 600.00, NULL, 'Continuing on our alcohol-free quest, we\'ve got an absolute classic on the non-alcoholic drinks to order at a bar list... the Shirley Temple!', 'Grenadine, ginger ale', 'Lunch', 1, NULL),
(5, 'Black Coffee', 'Beverage', 100.00, 'black-coffee.jpg', 'Black coffee is a robust and aromatic beverage made from ground coffee beans, enjoyed for its strong flavor and invigorating effect. It\'s often consumed without milk, cream, or sugar, highlighting the pure taste of the coffee.', 'Water, Coffee beans.', 'Tea Time', 1, NULL),
(6, 'Milk Tea', 'Beverage', 60.00, 'milk-tea.jpeg', 'Milk tea is a popular beverage that combines brewed tea with milk, creating a creamy and flavorful drink. It\'s enjoyed both hot and cold, often sweetened with sugar or honey for added richness.', 'Water, Milk, Tea Leaves', 'Tea Time', 1, 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `name`, `image`, `position`, `twitter`, `facebook`, `instagram`, `linkedin`) VALUES
(1, 'Peter Kuruvita', 'Peter Kuruvita.jpg', 'Head Chef', NULL, NULL, NULL, NULL),
(2, 'Saman Wijeratne', 'Saman Wijeratne.jpg', 'Chef', NULL, NULL, NULL, NULL),
(3, 'Ramasamy Selvaraju', 'Ramasamy Selvaraju.jpg', 'Chef', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `closure_info`
--

CREATE TABLE `closure_info` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `close_reason` varchar(255) NOT NULL,
  `display_message` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `closure_info`
--

INSERT INTO `closure_info` (`id`, `start_date`, `end_date`, `close_reason`, `display_message`) VALUES
(17, '0000-00-00', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Dessert') NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `time` enum('Breakfast','Lunch','Tea Time','Dinner') NOT NULL,
  `persons` int(11) NOT NULL,
  `cuisines` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`id`, `name`, `category`, `price`, `image_url`, `description`, `ingredients`, `time`, `persons`, `cuisines`) VALUES
(1, 'Curd', 'Dessert', 100.00, 'dairy-curd-culture-500x500.jpg', 'Curd is obtained by coagulating milk in a sequential process called curdling. It can be a final dairy product or the first stage in cheesemaking. The coagulation can be caused by adding rennet, a culture, or any edible acidic substance such as lemon juice or vinegar, and then allowing it to coagulate', 'Milk, Starter culture (usually yogurt or curd), Sugar (optional), Flavorings (optional, such as vanilla or fruit).', 'Breakfast', 1, NULL),
(2, 'Chocolate Cake', 'Dessert', 250.00, 'chocolate-cake.jpg', 'A chocolate cake is a rich and indulgent dessert loved worldwide. It typically features layers of moist chocolate sponge cake, decadent chocolate frosting, and sometimes filled or topped with chocolate ganache or chocolate chips. It\'s known for its deep cocoa flavor, often enhanced with ingredients like vanilla extract and sometimes coffee for added depth. Chocolate cakes can vary in texture from light and fluffy to dense and fudgy, making them a versatile choice for any occasion, from birthdays to special celebrations.', 'Chocolate or cocoa powder', 'Tea Time', 1, NULL),
(3, 'Fruit salad', 'Dessert', 120.00, 'Fruktsallad.jpg', 'Fruit salad is a dish consisting of various kinds of fruit, sometimes served in a liquid, either their juices or a syrup. In different forms, fruit salad can be served as an appetizer or a side as a salad. A fruit salad is sometimes known as a fruit cocktail (often connoting a canned product), or fruit cup (when served in a small container).', 'Fruit, fruit juice or syrup', 'Lunch', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_hall_info`
--

CREATE TABLE `event_hall_info` (
  `hall_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_hall_info`
--

INSERT INTO `event_hall_info` (`hall_id`, `category_name`, `seating_capacity`, `image`, `description`) VALUES
(1, 'Lotus Hall', 350, 'lotus-hall-banner.svg', 'Suitable for small events'),
(2, 'Golden Hall', 250, 'golden-hall-banner.svg', 'Suitable for weddings and indoor functions');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`, `alt_text`) VALUES
(1, 'gallery-1.jpg', 'Gallery Image 1'),
(2, 'gallery-2.jpg', 'Gallery Image 2'),
(3, 'gallery-3.jpg', 'Gallery Image 3'),
(4, 'gallery-4.jpg', 'Gallery Image 4'),
(5, 'gallery-5.jpg', 'Gallery Image 5'),
(6, 'gallery-6.jpg', 'Gallery Image 6'),
(7, 'gallery-7.jpg', 'Gallery Image 7'),
(8, 'gallery-8.jpg', 'Gallery Image 8');

-- --------------------------------------------------------

--
-- Table structure for table `hall_reservations`
--

CREATE TABLE `hall_reservations` (
  `reservation_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hall_category` varchar(100) NOT NULL,
  `arrival_time` varchar(10) NOT NULL,
  `planned_leave_time` varchar(10) NOT NULL,
  `booked_date` date NOT NULL,
  `participant_count` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `booking_id` varchar(50) NOT NULL,
  `reservation_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Main-Meal','Special') NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `time` enum('Breakfast','Lunch','Tea Time','Dinner') NOT NULL,
  `persons` int(11) NOT NULL,
  `cuisines` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `name`, `category`, `price`, `image_url`, `description`, `ingredients`, `time`, `persons`, `cuisines`) VALUES
(9, 'Fried Rice (Chicken Tandoori)', 'Main-Meal', 450.00, 'fried-rice.jpg', 'Vegetable fried rice is a savory and aromatic dish that combines fluffy rice with a colorful array of fresh vegetables. Stir-fried to perfection, it features tender carrots, crisp bell peppers, crunchy green beans, and sweet corn, all delicately seasoned with soy sauce and a hint of garlic. The flavors meld together beautifully, offering a satisfying balance of textures and tastes in every bite. Whether enjoyed as a standalone meal or paired with your favorite protein, vegetable fried rice is a timeless classic that delights with its simplicity and wholesome goodness.', 'Rice, Mixed vegetables (carrots, peas, bell peppers, corn), Soy sauce, Garlic, Ginger, Scrambled eggs (optional), Spring onions', 'Lunch', 1, 'Chinese'),
(10, 'The Full English Breakfast Delight', 'Main-Meal', 250.00, 'english-breakfast.jpg', 'This hearty breakfast features a golden fried egg paired with savory sausages and crispy roasted potatoes. Accompanied by buttered toast, tangy baked beans, and fresh arugula, it offers a delightful balance of flavors. Enjoy a side of grilled tomato and mushrooms, all complemented with a warm cup of coffee.', 'Toast with butter, fried egg, baked beans, sausages, grilled tomato, mushrooms, arugula, roasted potatoes, coffee.', 'Breakfast', 1, 'British');

-- --------------------------------------------------------

--
-- Table structure for table `operations_team_users`
--

CREATE TABLE `operations_team_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registered_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_orders`
--

CREATE TABLE `pre_orders` (
  `id` int(11) NOT NULL,
  `preorder_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `meal_details` text NOT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(50) NOT NULL,
  `order_status` enum('Pending','Order Processing','Foods Ready') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `orderneed_time` varchar(10) NOT NULL,
  `order_method` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_orders`
--

INSERT INTO `pre_orders` (`id`, `preorder_id`, `username`, `meal_details`, `order_date`, `order_time`, `order_status`, `created_at`, `message`, `orderneed_time`, `order_method`) VALUES
(22, 'PO_669c0d3d0c440', 'tdbpathiraja', 'Fried Rice (Chicken) - Qty: 1', '2024-07-22', 'Lunch', 'Order Processing', '2024-07-20 19:17:17', '', '15:47', 'PickUp'),
(23, 'PO_669c0e1663a86', 'tdbpathiraja', 'Curd - Qty: ', '2024-07-22', 'Breakfast', 'Pending', '2024-07-20 19:20:54', '', '15:47', 'PickUp'),
(24, 'PO_669ccd4f8b004', 'tdbwoods', 'Chocolate Cake - Qty: 1, Black Coffee - Qty: 2', '2024-07-23', 'Tea Time', 'Pending', '2024-07-21 08:56:47', '', '17:26', 'Dining'),
(25, 'PO_66a399cd0ec1d', 'tdbwoods', 'Fruit salad - Qty: 1', '2024-07-27', 'Lunch', 'Pending', '2024-07-26 12:42:53', '', '13:15', 'PickUp'),
(26, 'PO_66a39b3f3d929', 'tdbwoods', 'The Full English Breakfast Delight - Qty: 1', '2024-07-25', 'Breakfast', 'Pending', '2024-07-26 12:49:03', '', '09:00', 'PickUp');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `terms` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `description`, `terms`, `image_url`) VALUES
(6, '50% OFF THREE ITEMS', 'gag', 'gag', 'promotion16.svg');

-- --------------------------------------------------------

--
-- Table structure for table `sidedishes`
--

CREATE TABLE `sidedishes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Side-Dish') NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `time` enum('Breakfast','Lunch','Tea Time','Dinner') NOT NULL,
  `persons` int(11) NOT NULL,
  `cuisines` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sidedishes`
--

INSERT INTO `sidedishes` (`id`, `name`, `category`, `price`, `image_url`, `description`, `ingredients`, `time`, `persons`, `cuisines`) VALUES
(2, 'Chunky Onion Salsa', 'Side-Dish', 350.00, 'chunky-onion-salsa.jpeg', 'This spicy tomato and onion salsa is the perfect accompaniment to a barbecue dinner.', '1 large red onion, chopped, 3 green onions, thinly sliced, 250g baby roma tomatoes, halved', 'Dinner', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialmeals`
--

CREATE TABLE `specialmeals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Special-Dish','Special-Beverage') NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `time` enum('Breakfast','Lunch','Tea Time','Dinner') NOT NULL,
  `persons` int(11) NOT NULL,
  `cuisines` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialmeals`
--

INSERT INTO `specialmeals` (`id`, `name`, `category`, `price`, `image_url`, `description`, `ingredients`, `time`, `persons`, `cuisines`) VALUES
(1, 'Massala Buriyani', 'Special-Dish', 700.00, 'masala-biriyani.jpg', 'Massala Buriyani', 'Rice', 'Breakfast', 3, 'Indian'),
(2, 'Mongolian Sawan', 'Special-Dish', 450.00, 'Mongolian-Jerk-Chicken-Sawan-1-removebg-preview.png', 'Fantastic Sawan for eating', 'Rice, fafa, fafa', 'Dinner', 5, 'Mexican');

-- --------------------------------------------------------

--
-- Table structure for table `special_events`
--

CREATE TABLE `special_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_events`
--

INSERT INTO `special_events` (`id`, `title`, `date`, `time`, `location`, `description`, `image`) VALUES
(1, 'Night Party', '2024-07-05', '20:00:00', 'Ball Room', 'Join us for a night of fun with live DJ music, dance, and exclusive cocktails!', 'Night-Pary-Banner.svg'),
(2, 'Live Musical Performance', '2024-07-13', '19:00:00', 'Gallery Cafe Main Hall', 'Enjoy an evening of live music by popular local bands and artists.', 'Live-Musical-Performance.svg'),
(3, 'Jazz Night', '2024-07-20', '18:00:00', 'Gallery Cafe Lounge', 'Relax with smooth jazz music and a selection of fine wines and cheeses.', 'JAZZ-Night.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tables_info`
--

CREATE TABLE `tables_info` (
  `table_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `total_count` int(11) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables_info`
--

INSERT INTO `tables_info` (`table_id`, `category_name`, `total_count`, `seating_capacity`, `image`, `description`) VALUES
(4, 'Deluxe Table', 10, 4, 'premium-table-banner.svg', 'A luxurious table with seating for four. Perfect for an intimate dining experience.'),
(5, 'Family Table', 1, 8, 'family-table-banner.svg', 'A spacious table that can accommodate up to eight people. Ideal for family gatherings and celebrations.'),
(6, 'Couple Table', 15, 2, 'couple-table-banner.svg', 'A cozy table for two. Perfect for a romantic day.');

-- --------------------------------------------------------

--
-- Table structure for table `table_reservations`
--

CREATE TABLE `table_reservations` (
  `reservation_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `table_category` varchar(100) NOT NULL,
  `arrival_time` varchar(10) NOT NULL,
  `planned_leave_time` varchar(10) NOT NULL,
  `booked_date` date NOT NULL,
  `message` text DEFAULT NULL,
  `booking_id` varchar(50) NOT NULL,
  `reservation_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_status` enum('Pending','Table Available','Table Unavailable','Table Booked For You') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_reservations`
--

INSERT INTO `table_reservations` (`reservation_id`, `username`, `table_category`, `arrival_time`, `planned_leave_time`, `booked_date`, `message`, `booking_id`, `reservation_timestamp`, `booking_status`) VALUES
(19, 'tdbpathiraja', 'Deluxe Table', '01:38', '14:38', '2024-07-23', '', 'booking_669c0b4bc52f3', '2024-07-20 19:08:59', 'Pending'),
(20, 'tdbwoods', 'Family Table', '17:27', '18:27', '2024-07-23', '', 'booking_669ccd74a4878', '2024-07-21 08:57:24', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `quote` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `quote`, `author`, `position`, `image`) VALUES
(1, 'Absolutely loved the cozy ambiance and exquisite flavors! A must-visit for food enthusiasts.', 'Sohan Edirisinghe', 'Businessmen', 'Sohan Edirisinghe.jpg'),
(2, 'Impressive service and a menu that delights both the eyes and the palate. Highly recommended!', 'Dulakshi Keshani', 'University Student', 'Dulakshi Keshani.jpg'),
(3, 'A gem of a find! The chef\'s specials were outstanding, paired with excellent wine recommendations.', 'Abhiman Wijesekara', 'University Student', 'abhiman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`) VALUES
(30, 'tdbwoods', 'Tharindu Darshana', 'prabhanathliyanage@gmail.com', '$2y$10$.hWcD.hjKo5eMOLgpOs6YO773RaNy2WvUAlvgM8hgsTjN3tYlOM7K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `beverages`
--
ALTER TABLE `beverages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closure_info`
--
ALTER TABLE `closure_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_hall_info`
--
ALTER TABLE `event_hall_info`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_reservations`
--
ALTER TABLE `hall_reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations_team_users`
--
ALTER TABLE `operations_team_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `preorder_id` (`preorder_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidedishes`
--
ALTER TABLE `sidedishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialmeals`
--
ALTER TABLE `specialmeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_events`
--
ALTER TABLE `special_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables_info`
--
ALTER TABLE `tables_info`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_reservations`
--
ALTER TABLE `table_reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beverages`
--
ALTER TABLE `beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `closure_info`
--
ALTER TABLE `closure_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_hall_info`
--
ALTER TABLE `event_hall_info`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hall_reservations`
--
ALTER TABLE `hall_reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `operations_team_users`
--
ALTER TABLE `operations_team_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pre_orders`
--
ALTER TABLE `pre_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sidedishes`
--
ALTER TABLE `sidedishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialmeals`
--
ALTER TABLE `specialmeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_events`
--
ALTER TABLE `special_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables_info`
--
ALTER TABLE `tables_info`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_reservations`
--
ALTER TABLE `table_reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
