-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2021 lúc 08:54 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `profilecv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes_post`
--

CREATE TABLE `likes_post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes_post`
--

INSERT INTO `likes_post` (`id`, `id_user`, `id_post`, `likes`) VALUES
(1, 13, 39, 14),
(6, 13, 38, 3),
(11, 25, 23, 2),
(13, 25, 22, 4),
(17, 25, 40, 14),
(20, 25, 1, 2),
(27, 25, 41, 19),
(37, 23, 42, 11),
(49, 24, 43, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `id_user_from`, `id_user_to`, `subject`, `content`, `time`) VALUES
(31, 15, 14, '<p> Chào <h1> Mỹ Tâm </h1></p>', 'Mình đang có Job ngon nè <br>\r\nBạn đang cần không ?', '2021-03-11 07:44:08'),
(32, 24, 14, '<p> Chào <h1> Mỹ Tâm </h1></p>', 'Bạn ơi ! Tối mình gặp nhau tại quán cà phê nhé', '2021-03-11 07:53:11'),
(35, 24, 14, 'Thu Ngân', 'Chỗ cũ nhé <br>\r\nTối gặp nà', '2021-03-11 08:00:16'),
(52, 25, 13, 'Hello Diệu Nhé', 'Admin', '2021-03-13 09:49:49'),
(53, 24, 13, '', '213123', '2021-03-15 22:36:12'),
(55, 25, 14, 'Admin', 'Hãy bảo mật tài khoản của mình tránh bị hacker tấn công nhé', '2021-03-16 19:50:05'),
(56, 25, 13, 'Admin', 'Chào Lan Lê', '2021-03-16 19:51:16'),
(57, 25, 13, 'Admin', 'Hãy bảo mật tài khoản của mình tránh khỏi bị hacker tấn công nhé', '2021-03-16 19:51:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `id_user`, `content`, `images`, `time`) VALUES
(18, 15, 'Xinh lém nhé !<br>\r\nAhihhi', '1.jpg', '2021-03-10 17:50:38'),
(19, 14, 'Bạn thấy mình như thế nào ?\r\n<br> <b> Thả tim  </b>giúp mình nhé', '2.jpg', '2021-03-11 02:42:56'),
(20, 15, 'hihhi <br>Các <b> cậu </b> thấy mình xinh không nà!\r\n<br> <b><i sytle=\"color : yellow\"> Nhận xét nhé</i></b>', '1615433134_2.jpg', '2021-03-11 03:25:34'),
(21, 15, 'Mình <b> xinh </b> lắm nhá !', '7.jpg', '2021-03-11 04:01:49'),
(22, 14, 'Hello Các bạn nhé<br>\r\n<b> Like </b> and <b> share</b> giúp mình nhé', '9.jpg', '2021-03-11 04:07:25'),
(23, 17, 'Như nè', '1615435719_12.jpg', '2021-03-11 04:08:39'),
(38, 13, 'sdgdfgd', '1615538680_11.jpg', '2021-03-12 08:44:40'),
(40, 25, 'sdgdsgsd', '1615540808_12.jpg', '2021-03-12 09:20:08'),
(41, 25, '123', '1615541206_3.jpg', '2021-03-12 09:26:46'),
(45, 23, 'dgfd', '1615622430_5.jpg', '2021-03-13 08:00:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `birthday`, `password`, `phone`, `address`, `work`, `images`, `website`, `github`, `twitter`, `instagram`, `facebook`, `time`, `user_status`) VALUES
(13, 'Lan Lê', 'lanle@gmail.com', '2001-02-10', '202cb962ac59075b964b07152d234b70', '02144551425', 'Đông Hà - Quảng Trị', 'Developer', '2.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:17:42', 0),
(14, 'Mỹ Tâm', 'mytam@gmail.com', '2001-03-06', '202cb962ac59075b964b07152d234b70', '0369852147', 'Dĩ An - Bình Dương', 'Front End', '4.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:17:51', 0),
(15, 'Phương Như', 'phuongnhu@gmail.com', '2000-06-04', '202cb962ac59075b964b07152d234b70', '0124564566', 'Sơn Trà - Đà Nẵng', 'Tester', '1.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:04', 0),
(16, 'Mỹ Kha', 'mykha@gmail.com', '1992-02-05', '202cb962ac59075b964b07152d234b70', '01223454554', 'Bình Sơn - Quảng Ngãi', 'Back End', '5.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:15', 0),
(17, 'Thảo Như', 'thaonhu@gmail.com', '2002-10-15', '202cb962ac59075b964b07152d234b70', '03255899363', 'Hương Trà - TT.Huế', 'PHP Dev', '6.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:24', 0),
(18, 'Kiều Tâm', 'kieutam@gmail.com', '1995-09-27', '202cb962ac59075b964b07152d234b70', '03695214465', 'Hải Lăng - Quảng Trị', 'JavaScript Dev', '7.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:32', 0),
(19, 'Lương Trần', 'luongtran@gmail.com', '1999-05-12', '202cb962ac59075b964b07152d234b70', '0321458777', 'Lệ Thủy - Quảng Bình', 'Developer', '8.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:41', 0),
(20, 'Quỳnh Thương', 'quynhthuong@gmail.com', '2000-01-19', '202cb962ac59075b964b07152d234b70', '032569999', 'Triệu Phong - Quảng Trị', 'Tester', '9.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:49', 0),
(21, 'Hạ My', 'hamy@gmail.com', '1999-12-06', '202cb962ac59075b964b07152d234b70', '0325899362', 'Gio Linh - Quảng Trị', 'CEO', '10.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:18:58', 0),
(22, 'Lê Ny', 'leny@gmail.com', '1996-08-15', '202cb962ac59075b964b07152d234b70', '0214457898', 'Hải Châu - Đà Nẵng', 'Senior C#', '11.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:19:15', 0),
(23, 'Mỹ Diệu', 'mydieu@gmail.com', '2003-05-06', '202cb962ac59075b964b07152d234b70', '0369852147', 'Hải Lăng - Quảng Trị', 'Node JS, React JS', '3.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-15 22:19:07', 0),
(24, 'Thu Ngân', 'thungan@gmail.com', '2000-12-18', '7363a0d0604902af7b70b271a0b96480', '059936612', 'Vĩnh Linh - Quảng Trị', 'Fullstack JavaScript', '1615920900_9.jpg', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', 'https://vi-vn.facebook.com/', '2021-03-16 18:55:00', 0),
(25, 'Admin TK', 'admin@gmail.com', '1999-12-11', '21232f297a57a5a743894a0e4a801fc3', '0347184502', 'Hải Lăng - Quảng Trị', 'Developer', 'IMG_20201001_205709.jpg', 'https://getbootstrap.com/docs/4.0/getting-started/introduction/', 'https://getbootstrap.com/docs/4.0/getting-started/introduction/', 'https://getbootstrap.com/docs/4.0/getting-started/introduction/', 'https://getbootstrap.com/docs/4.0/getting-started/introduction/', 'https://getbootstrap.com/docs/4.0/getting-started/introduction/', '2021-03-15 22:19:28', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `likes_post`
--
ALTER TABLE `likes_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_post` (`id_post`),
  ADD KEY `id_post_2` (`id_post`),
  ADD KEY `id_post_3` (`id_post`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `likes_post`
--
ALTER TABLE `likes_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
