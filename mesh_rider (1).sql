-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 12:42 PM
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
-- Database: `mesh_rider`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('trip','vehicle') NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `item_id`, `type`, `status`, `booking_date`) VALUES
(1, 1, 1, 'trip', 'cancelled', '2026-01-15 14:28:48'),
(2, 1, 18, 'vehicle', 'cancelled', '2026-01-15 14:28:48'),
(3, 1, 1, 'trip', 'cancelled', '2026-01-15 15:46:02'),
(4, 1, 19, 'vehicle', 'cancelled', '2026-01-15 15:46:02'),
(5, 1, 8, 'trip', 'pending', '2026-01-15 15:53:27'),
(6, 1, 19, 'vehicle', 'pending', '2026-01-15 15:53:27'),
(7, 1, 11, 'trip', 'cancelled', '2026-01-15 16:11:40'),
(8, 1, 11, 'vehicle', 'pending', '2026-01-15 16:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `category` enum('camping','water','hiking') DEFAULT 'camping',
  `image_url` varchar(255) DEFAULT 'default_trip.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `price`, `location`, `duration`, `category`, `image_url`) VALUES
(1, 'مخيم وادي رم الشهير', 55, 'وادي رم', 'يومين', 'camping', 'default_trip.jpg'),
(2, 'سيق الموجب المائي', 30, 'البحر الميت', '6 ساعات', 'water', 'default_trip.jpg'),
(3, 'مخيم وادي رم النجوم', 60, 'وادي رم', 'يومين', 'camping', 'default_trip.jpg'),
(4, 'مغامرة سيق الموجب', 35, 'البحر الميت', '6 ساعات', 'water', 'default_trip.jpg'),
(5, 'جولة البتراء الوردية', 45, 'البتراء', 'يوم كامل', 'hiking', 'default_trip.jpg'),
(6, 'تخييم غابات برقش', 25, 'إربد', 'يومين', 'camping', 'default_trip.jpg'),
(7, 'مسار دبين الطبيعي', 20, 'جرش', '8 ساعات', 'hiking', 'default_trip.jpg'),
(8, 'غطس العقبة المرجاني', 50, 'العقبة', '4 ساعات', 'water', 'default_trip.jpg'),
(9, 'رحلة قلعة عجلون', 15, 'عجلون', '5 ساعات', 'hiking', 'default_trip.jpg'),
(10, 'مخيم الرمان البيئي', 30, 'البلقاء', 'يومين', 'camping', 'default_trip.jpg'),
(11, 'جولة الشوبك التاريخية', 40, 'معان', 'يوم كامل', 'hiking', 'default_trip.jpg'),
(12, 'مغامرة وادي الهيدان', 35, 'مادبا', '7 ساعات', 'water', 'default_trip.jpg'),
(13, 'تخييم ضانا الجبلي', 55, 'الطفيلة', '3 أيام', 'camping', 'default_trip.jpg'),
(14, 'مسار وادي بن حماد', 25, 'الكرك', '6 ساعات', 'water', 'default_trip.jpg'),
(15, 'رحلة قصر عمرة الصحراوي', 20, 'الزرقاء', '4 ساعات', 'hiking', 'default_trip.jpg'),
(16, 'جولة وسط البلد وعمان', 15, 'عمان', '6 ساعات', 'hiking', 'default_trip.jpg'),
(17, 'مغامرة وادي غوير', 45, 'الطفيلة', '10 ساعات', 'water', 'default_trip.jpg'),
(18, 'تخييم وادي نميرة', 30, 'الأغوار', 'يومين', 'camping', 'default_trip.jpg'),
(19, 'رحلة شلالات ماعين', 40, 'مادبا', 'يوم كامل', 'water', 'default_trip.jpg'),
(20, 'مسار أم قيس الأثري', 20, 'إربد', '5 ساعات', 'hiking', 'default_trip.jpg'),
(21, 'تخييم محمية الأزرق', 35, 'الأزرق', 'يومين', 'camping', 'default_trip.jpg'),
(22, 'مغامرة وادي القلط', 30, 'القدس/الأغوار', '8 ساعات', 'hiking', 'default_trip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('user','moderator','admin') DEFAULT 'user',
  `points` int(11) DEFAULT 100,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `role`, `points`, `created_at`) VALUES
(1, 'eman', 'eman@test.com', '$2y$10$j3w8px7CHMGqdD.nI/4VjOo5FKAN6CzIX78JWnx7zIhm7uVKE2bzu', '00000000000000000000', 'user', 100, '2026-01-15 14:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `type` enum('4x4','bike','bus') DEFAULT '4x4',
  `specs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `price_per_day`, `type`, `specs`) VALUES
(1, 'تويوتا لاندكروزر', 70, '4x4', 'محرك 4.5، دفع رباعي كامل'),
(2, 'دراجة جبلية احترافية', 15, 'bike', 'مناسبة للطرق الوعرة'),
(3, 'تويوتا لاندكروزر 2024', 85, '4x4', 'V8، دفع رباعي كامل، شاشة ونظام ملاحة'),
(4, 'نيسان باترول فتك', 75, '4x4', 'محرك 4800، مناسب جداً للرمل'),
(5, 'جيب رانجلر روبيكون', 90, '4x4', 'سقف مكشوف، إطارات جبلية ضخمة'),
(6, 'ميتسوبيشي باجيرو', 55, '4x4', 'اقتصادية وقوية للمسافات الطويلة'),
(7, 'فورد إكسبيديشن عائلي', 100, '4x4', '7 مقاعد، تكييف مركزي، مريحة جداً'),
(8, 'باص مرسيدس سبرينتر', 120, 'bus', '15 راكب، مقاعد جلد، واي فاي'),
(9, 'باص هايس سياحي', 80, 'bus', '12 راكب، تكييف قوي، وسيع من الداخل'),
(10, 'دراجة KTM جبلية', 40, 'bike', 'محرك 450cc، للطرق الوعرة جداً'),
(11, 'دراجة هارلي ديفيدسون', 110, 'bike', 'للهواة، محرك ضخم، مريحة للخطوط'),
(12, 'دراجة صحراوية Yamaha', 35, 'bike', 'خفيفة وسريعة للكثبان الرملية'),
(13, 'لاند روفر ديفندر', 130, '4x4', 'فخامة وقوة في آن واحد'),
(14, 'شيفروليه تاهو Z71', 95, '4x4', 'نظام تعليق خاص للبر'),
(15, 'باص كوستر سياحي', 150, 'bus', '22 راكب، مخصص للرحلات الجماعية'),
(16, 'دراجة هوندا CRF', 30, 'bike', 'مناسبة للمبتدئين في المسارات الجبلية'),
(17, 'سوزوكي جيمني', 45, '4x4', 'صغيرة، قوية جداً في التضاريس الضيقة'),
(18, 'دوج رام 1500', 110, '4x4', 'حوض واسع للمعدات، قوة سحب هائلة'),
(19, 'باص GMC سافانا', 90, 'bus', '9 مقاعد VIP، مريح جداً للعائلات'),
(20, 'دراجة كواساكي نينجا', 85, 'bike', 'للسرعة على الطرق المعبدة'),
(21, 'رينج روفر سبورت', 160, '4x4', 'قمة الفخامة والرفاهية'),
(22, 'باص فولفو سياحي ضخم', 250, 'bus', '50 راكب، حمام داخلي، شاشات عرض');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
