-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 09:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('user','admin') DEFAULT 'user',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `username`, `password`, `email`, `avatar`, `created_at`, `role`, `phone`, `address`) VALUES
(1, 'Nguyễn Thị Alice', 'alice', '1234', 'alice@example.com', 'IMG_1619.JPG', '2024-07-22 07:47:10', 'user', '0123456788', '123 Alice St, Wonderland'),
(2, 'Trần Văn Bob', 'bob', '123456', 'bob@example.com', '2251120411_NguyenLeDuy_CN22H.jpg', '2024-07-22 07:47:10', 'admin', '0987654321', '456 Bob Ave, Exampletown'),
(3, 'Phùng Thanh Charlie', 'charlie', '123456', 'charlie@example.com', 'IMG_1570.jpg', '2024-07-22 07:47:10', 'user', '0111222333', '789 Charlie Blvd, Samplecity'),
(4, 'Nguyễn Thị Draven', 'Draven', '123456', 'Draven@example.com', 'IMG_1598.jpg', '2024-07-22 09:18:53', 'user', NULL, NULL),
(8, 'Nguyễn Văn Tèo', 'Nguyễn Văn Tèo', '123', 'teo@gmail.com', 'IMG_1604.jpg', '2024-07-22 10:01:15', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `discounted_price` int DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `description` text,
  `cover_image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `discounted_price`, `published_date`, `description`, `cover_image`, `category_id`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 459770, NULL, '1997-06-26', 'A young wizard\'s journey begins.', 'harry_potter_1.jpg', 1),
(2, 'To Kill a Mockingbird', 'Harper Lee', 322770, 280000, '1960-07-11', 'A novel about racial injustice in the Deep South.', 'to_kill_a_mockingbird.jpg', 2),
(3, '1984', 'George Orwell', 321270, 276000, '1949-06-08', 'A dystopian novel set in a totalitarian society.', '1984.jpg', 3),
(4, 'Pride and Prejudice', 'Jane Austen', 298770, 252000, '1813-01-28', 'A romantic novel about the manners and matrimonial machinations among the British gentry of the early 19th century.', 'pride_and_prejudice.jpg', 4),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 252270, NULL, '1925-04-10', 'A novel about the American dream and the roaring twenties.', 'the_great_gatsby.jpg', 5),
(6, 'Moby-Dick', 'Herman Melville', 357650, 335000, '1851-10-18', 'The narrative of Captain Ahab\'s obsessive quest to kill the white whale, Moby Dick.', 'moby_dick.jpg', 3),
(7, 'War and Peace', 'Leo Tolstoy', 482270, 437000, '1869-01-01', 'A historical novel that intertwines the lives of families during the Napoleonic Wars.', 'war_and_peace.jpg', 4),
(8, 'The Catcher in the Rye', 'J.D. Salinger', 310500, 287500, '1951-07-16', 'A story about teenage alienation and angst.', 'catcher_in_the_rye.jpg', 2),
(9, 'The Hobbit', 'J.R.R. Tolkien', 598770, 529770, '1937-09-21', 'A fantasy novel about the adventures of Bilbo Baggins.', 'the_hobbit.jpg', 1),
(10, 'Fahrenheit 451', 'Ray Bradbury', 391770, 367770, '1953-10-19', 'A novel about a future American society where books are outlawed and \"firemen\" burn any that are found.', 'fahrenheit_451.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cart_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `cart_status`) VALUES
(1, 1, '2024-07-27 17:00:00', '2024-07-28 00:51:45', 'active'),
(2, 2, '2024-07-27 17:00:00', '2024-07-28 00:51:52', 'abandon'),
(3, 3, '2024-07-27 17:00:00', '2024-07-28 00:53:28', 'paid'),
(5, 3, '2024-07-28 01:47:32', '2024-07-28 01:47:32', 'active'),
(6, 3, '2024-07-28 01:55:16', '2024-07-28 01:55:16', 'active'),
(21, 4, '2024-07-28 07:59:44', '2024-07-28 07:59:44', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `quantity`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 2),
(3, 2, 1, 3),
(4, 2, 8, 1),
(5, 3, 4, 2),
(6, 3, 7, 1),
(7, 3, 2, 1),
(29, 21, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sách thiếu nhi'),
(2, 'Sách kỹ năng sống'),
(3, 'Sách khoa học'),
(4, 'Sách gia đình'),
(5, 'Sách giáo khoa');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `book_id`, `comment_content`, `comment_time`) VALUES
(1, 1, 1, 'Great book!', '2023-01-01 10:00:00'),
(2, 2, 2, 'Really enjoyed it.', '2023-02-15 14:30:00'),
(3, 3, 3, 'Not my favorite.', '2023-03-20 18:45:00'),
(4, 1, 4, 'Highly recommended!', '2023-04-25 20:00:00'),
(5, 2, 5, 'A must-read.', '2023-05-30 09:15:00'),
(6, 3, 6, 'Couldn\'t put it down.', '2023-06-05 11:20:00'),
(7, 1, 7, 'Very inspiring.', '2023-07-10 13:25:00'),
(8, 2, 8, 'Well written.', '2023-08-15 15:30:00'),
(9, 3, 9, 'An interesting read.', '2023-09-20 17:35:00'),
(10, 1, 10, 'Loved the characters.', '2023-10-25 19:40:00'),
(11, 1, 1, 'Sách hay, dễ đọc', '2024-07-22 21:51:39'),
(12, 1, 1, 'Good', '2024-07-22 22:15:05'),
(13, 1, 1, 'CŨNG OKE', '2024-07-22 22:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `book_id`, `quantity`, `order_date`) VALUES
(1, 1, 1, 2, '2023-04-01'),
(2, 2, 2, 1, '2023-05-15'),
(3, 3, 3, 3, '2023-06-22'),
(4, 1, 4, 1, '2023-07-03'),
(5, 2, 5, 2, '2023-08-10'),
(6, 3, 6, 1, '2023-09-12'),
(7, 1, 7, 1, '2023-10-05'),
(8, 2, 8, 1, '2023-11-11'),
(9, 3, 9, 2, '2023-12-01'),
(10, 1, 10, 3, '2024-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
