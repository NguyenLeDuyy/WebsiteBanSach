-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2024 at 05:57 PM
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
(8, 'Nguyễn Văn Tèo', 'Nguyễn Văn Tèo', '123', 'teo@gmail.com', 'IMG_1604.jpg', '2024-07-22 10:01:15', 'user', NULL, NULL),
(10, '', '', '', '', NULL, '2024-08-05 11:00:33', 'user', NULL, NULL),
(11, 'Nguyễn Lê Duy', 'Nguyễn Lê Duy', '123456', 'duy123@gmail.com', 'rubiks-cube-digital-art-wallpaper.jpg', '2024-08-05 11:04:24', 'user', '', ''),
(12, 'Lê Duy', 'Lê Duy', '123456', 'leduy@gmail.com', NULL, '2024-08-05 11:41:14', 'user', NULL, NULL);

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
  `image_urls` json DEFAULT NULL,
  `discount_percentage` decimal(10,0) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `discounted_price`, `published_date`, `description`, `cover_image`, `image_urls`, `discount_percentage`, `category_id`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 459770, NULL, '1997-06-26', 'A young wizard\'s journey begins.', 'harry_potter_1.jpg', NULL, NULL, 1),
(2, 'To Kill a Mockingbird', 'Harper Lee', 322770, 280000, '1960-07-11', 'A novel about racial injustice in the Deep South.', 'to_kill_a_mockingbird.jpg', NULL, NULL, 2),
(3, '1984', 'George Orwell', 321270, 276000, '1949-06-08', 'A dystopian novel set in a totalitarian society.', '1984.jpg', NULL, NULL, 3),
(4, 'Pride and Prejudice', 'Jane Austen', 298770, 252000, '1813-01-28', 'A romantic novel about the manners and matrimonial machinations among the British gentry of the early 19th century.', 'pride_and_prejudice.jpg', NULL, NULL, 1),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 252270, NULL, '1925-04-10', 'A novel about the American dream and the roaring twenties.', 'the_great_gatsby.jpg', NULL, NULL, 5),
(6, 'Moby-Dick', 'Herman Melville', 357650, 335000, '1851-10-18', 'The narrative of Captain Ahab\'s obsessive quest to kill the white whale, Moby Dick.', 'moby_dick.jpg', NULL, NULL, 3),
(7, 'War and Peace', 'Leo Tolstoy', 482270, 437000, '1869-01-01', 'A historical novel that intertwines the lives of families during the Napoleonic Wars.', 'war_and_peace.jpg', '[\"war_and_peace_2.jpg\", \"war_and_peace_3.jpg\", \"war_and_peace_4.jpg\"]', NULL, 4),
(8, 'The Catcher in the Rye', 'J.D. Salinger', 310500, 287500, '1951-07-16', 'A story about teenage alienation and angst.', 'catcher_in_the_rye.jpg', NULL, NULL, 2),
(9, 'The Hobbit', 'J.R.R. Tolkien', 598770, 529770, '1937-09-21', 'A fantasy novel about the adventures of Bilbo Baggins.', 'the_hobbit.jpg', NULL, NULL, 1),
(10, 'Fahrenheit 451', 'Ray Bradbury', 391770, 367770, '1953-10-19', 'A novel about a future American society where books are outlawed and \"firemen\" burn any that are found.', 'fahrenheit_451.jpg', NULL, NULL, 3),
(11, 'Bộ Sách \"Who Is - Là Ai\" - Mang Các Con Khám Phá Bảo Tàng Chân Dung Những Vĩ Nhân Đã Làm Thay Đổi Thế Giới (Combo 19 Cuốn)', 'Various Authors', 63200, 79000, '2023-01-01', 'A collection of biographies of influential figures who changed the world.', 'who_is_la_ai.jpg', NULL, 20, 4),
(12, 'Combo Vô Cùng Tàn Nhẫn Vô Cùng Yêu Thương - BẢN ĐẶC BIỆT (Bộ 4 Tập)', 'Various Authors', 63200, 79000, '2023-02-01', 'A special edition combo of the \"Vô Cùng Tàn Nhẫn Vô Cùng Yêu Thương\" series.', 'vo_cung_tan_nhan_vo_cung_yeu_thuong.jpeg', NULL, 20, 4),
(13, 'Tri Thức Về Vạn Vật - Một Thế Giới Trực Quan Chưa Từng Thấy', 'Various Authors', 63200, 79000, '2023-03-01', 'An illustrated guide to the knowledge of everything.', 'tri_thuc_ve_van_vat.jpg', NULL, 20, 4),
(14, 'Tiểu Học Vui - Vững Bước Lớp 5 - 101 Câu Đố Rèn Trí Não Luyện Kỹ Năng', 'Various Authors', 63200, 79000, '2023-04-01', '101 puzzles to train the brain and develop skills for 5th graders.', 'tieu_hoc_vui_lop_5.png', NULL, 20, 4),
(15, 'Tiểu Học Vui - Tăng Tốc Lớp 4 - 101 Câu Đố Rèn Trí Não Luyện Kỹ Năng', 'Various Authors', 63200, 79000, '2023-05-01', '101 puzzles to train the brain and develop skills for 4th graders.', 'tieu_hoc_vui_lop_4.png', NULL, 20, 4),
(16, 'Hiểu Về Cảm Xúc Và Hành Vi Của Trẻ - Con Không Thích Nhường!', 'Various Authors', 47200, 59000, '2023-06-01', 'Understanding children\'s emotions and behaviors.', 'con_khong_thich_nhuong.png', NULL, 20, 4),
(17, 'Tư Duy Logic - Trò Chơi Tư Duy Cho Trẻ (Dành Cho Bé Từ 5 Tuổi)', 'Various Authors', 63200, 79000, '2023-07-01', 'Logical thinking games for children aged 5 and above.', 'tu_duy_logic.png', NULL, 20, 4),
(18, 'Rèn Luyện Sự Tập Trung - Trò Chơi Tư Duy Cho Trẻ (Dành Cho Bé Từ 5 Tuổi)', 'Various Authors', 39800, 49000, '2023-08-01', 'Focus training games for children aged 5 and above.', 'ren_luyen_su_tap_trung.jpeg', NULL, 20, 4),
(19, 'Dầu Và Máu - Mohammed Bin Salman Và Tham Vọng Tái Thiết Kinh Tế Ả-Rập', 'Bradley Hope, Justin Scheck', 249000, 199200, '2022-11-07', 'Dầu Và Máu không chỉ là một cuốn sách đơn thuần về chính trị và kinh tế, mà còn là một tác phẩm văn học, là một câu chuyện tuyệt vời về quyền lực, tham vọng và những biến động của thế giới hiện đại. Nhiều câu chuyện trong cuốn sách có thể còn gây nhiều tranh cãi, nhưng đây cũng là một cái nhìn mới cho độc giả, một cơ hội để hiểu rõ hơn về những sức mạnh và mâu thuẫn địa chính trị đang định hình thế giới xung quanh chúng ta. Cuốn sách cũng làm cho độc giả hiểu hơn về một Trung Đông phát triển về kinh tế và đang dần độc lập về chính trị nơi tôi cũng đã có dịp ghé thăm và làm việc lâu dài.', 'dauVaMau1.png', '[\"dauVaMau2.png\", \"dauVaMau3.jpeg\", \"dauVaMau4.jpeg\"]', 20, 2);

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
(2, 2, '2024-07-27 17:00:00', '2024-07-28 00:51:52', 'abandon'),
(3, 3, '2024-07-27 17:00:00', '2024-07-28 00:53:28', 'paid'),
(5, 3, '2024-07-28 01:47:32', '2024-07-28 01:47:32', 'active'),
(6, 3, '2024-07-28 01:55:16', '2024-07-28 01:55:16', 'active'),
(21, 4, '2024-07-28 07:59:44', '2024-07-28 07:59:44', 'active'),
(33, 1, '2024-08-05 07:13:04', '2024-08-05 07:13:04', 'active'),
(52, 12, '2024-08-05 15:57:46', '2024-08-05 15:57:46', 'active');

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
(3, 2, 1, 3),
(4, 2, 8, 1),
(5, 3, 4, 2),
(6, 3, 7, 1),
(7, 3, 2, 1),
(29, 21, 7, 3),
(61, 33, 9, 1),
(76, 52, 7, 2);

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `link`) VALUES
(1, 'Nền Giáo Dục Của Người Giàu - Những Bài Học Để Thành Công Chỉ Trường Đời Mới Dạy', 'Nền Giáo Dục Của Người Giàu - Những Bài Học Để Thành Công Chỉ Trường Đời Mới Dạy', 'nengiaoduccuanguoigiau.jpg', 'https://example.com/1'),
(2, 'Thiết Kế Game Nâng Cao - Nâng Nghệ Thuật Thiết Kế Game Lên Tầm Cao Mới', 'Thiết Kế Game Nâng Cao - Nâng Nghệ Thuật Thiết Kế Game Lên Tầm Cao Mới', 'thietkegamenangcao.jpg', 'https://example.com/2'),
(3, 'Chuyển Đổi Số - Năm Giai Đoạn Triển Khai Công Nghệ Số Cho Doanh Nghiệp: Các Bước Chuyển Đổi Số Trong Doanh Nghiệp', 'Chuyển Đổi Số - Năm Giai Đoạn Triển Khai Công Nghệ Số Cho Doanh Nghiệp: Các Bước Chuyển Đổi Số Trong Doanh Nghiệp', 'chuyendoiso.jpg', 'https://example.com/3'),
(4, 'NHỮNG THÁCH THỨC CỦA NHÀ LÃNH ĐẠO', 'NHỮNG THÁCH THỨC CỦA NHÀ LÃNH ĐẠO', 'thachthucnhlanhdao.jpg', 'https://example.com/4'),
(5, 'Deep Work - Làm Việc Sâu: Kĩ Năng Làm Việc Thông Minh Trong Thời Đại 4.0', 'Deep Work - Làm Việc Sâu: Kĩ Năng Làm Việc Thông Minh Trong Thời Đại 4.0', 'deepwork.jpg', 'https://example.com/5'),
(6, '6 Cuốn Sách Sẽ Thay Đổi Tư Duy Của Bạn Mãi Mãi Về Sau', '6 Cuốn Sách Sẽ Thay Đổi Tư Duy Của Bạn Mãi Mãi Về Sau', '6cuonsach.jpg', 'https://example.com/6'),
(7, 'TOP 100 CUỐN SÁCH KỸ NĂNG HAY NHẤT CỦA ALPHA BOOKS', 'TOP 100 CUỐN SÁCH KỸ NĂNG HAY NHẤT CỦA ALPHA BOOKS', 'top100sachkynang.jpg', 'https://example.com/7'),
(8, 'Alpha Books - Hành Trình Vươn Tầm Tri Thức', 'Alpha Books - Hành Trình Vươn Tầm Tri Thức', 'alphabooks.jpeg', 'https://example.com/8');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
