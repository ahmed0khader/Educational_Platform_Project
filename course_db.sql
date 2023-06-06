-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 مايو 2023 الساعة 12:17
-- إصدار الخادم: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `bookmark`
--

INSERT INTO `bookmark` (`user_id`, `playlist_id`) VALUES
('iwPD2TFsnOb83RtG9MJo', '2YScwZg91zHbnyGWbQLz'),
('HeLTdFuEvHFtSHufG1CR', 'VcHjneYFIe6r5U9i7c7U'),
('el3aBu9LmQ6bJOQ9haNp', 'VcHjneYFIe6r5U9i7c7U'),
('L0JEfhqQWLQqNB2SOYX7', 'vGsGo98R3vcIYKvDXPNM');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `tutor_id`, `comment`, `date`) VALUES
('dpY1cvlBEDzLDmVoE1DE', 'kKEw5Ztv9gNjzS4R6yAV', 'HeLTdFuEvHFtSHufG1CR', 'uTZuKlKLZSGZeYVSH0zX', 'شكراً دكتور\r\n', '2023-05-08 16:05:15'),
('opKteBHYzdPriZNmODK9', 'kKEw5Ztv9gNjzS4R6yAV', 'el3aBu9LmQ6bJOQ9haNp', 'uTZuKlKLZSGZeYVSH0zX', 'شكرا ي دكتور ', '2023-05-08 17:51:03'),
('s9RTXd9kr0FQttUvPMtP', 'wMTJAwzDLoeuRCiuFkMn', 'L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'شكراً لجهودك ي دكتور', '2023-05-15 09:46:25'),
('WxLh6gBwbK04sEB3uvq0', '8sUwJbrmd3V0y09RyD8G', 'iwPD2TFsnOb83RtG9MJo', 'URzk1KgetuF89CIVWUAf', 'شرح جيد', '2023-05-04 11:24:19'),
('YO7sqj2Q05d2DYKjDjMh', 'OkkbgsVdkiidgHhq01vv', 'L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'شكراً لجهودك دكتور قاسم', '2023-05-15 09:47:14');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`name`, `email`, `number`, `message`) VALUES
('marwan alhajer', 'marwan@gmail.com', 598986203, 'نص افتراصي'),
('أحمد أيمن', 'ahmed1@gmail.com', 598986203, 'هل يمكنكم توفير مدرس لتخصص أدارة الأعمال');

-- --------------------------------------------------------

--
-- بنية الجدول `content`
--

CREATE TABLE `content` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `content`
--

INSERT INTO `content` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('8sUwJbrmd3V0y09RyD8G', 'URzk1KgetuF89CIVWUAf', '2YScwZg91zHbnyGWbQLz', 'مفهوم  قاعدة البيانات وإدارتها الجزء 1', ' شرح مفهوم  قاعدة البيانات وإدارتها الجزء 1', '4ImyNArAuIQ4OjWukGCr.mp4', 'pvlF6fZ2dtDLGFwLXOnY.png', '2023-05-04', 'active'),
('Mvq7n7UgdhkfIbQPSoqm', 'URzk1KgetuF89CIVWUAf', '2YScwZg91zHbnyGWbQLz', 'مفهوم  قاعدة البيانات وإدارتها الجزء 2', 'شرح مفهوم  قاعدة البيانات وإدارتها الجزء 1', 'lJ5ly1XniqlAM2qPqPZS.mp4', 'ViSwSsCwvIZx0ECRIpB1.png', '2023-05-07', 'active'),
('CFxrZKyZvHjSCozirwqp', 'URzk1KgetuF89CIVWUAf', 'gSVc4BfxmRTrJV1s6A1a', 'شرح مقدمة في تصميم صفحات الويب', 'شرح مقدمة في تصميم صفحات الويب', 'xBTjDADEU3l7TPQY3EMJ.mp4', 'ZWWwQsdesFE0fvxIgr0G.png', '2023-05-07', 'active'),
('MqGXVSrWKVKNXvdqQeyt', 'URzk1KgetuF89CIVWUAf', 'gSVc4BfxmRTrJV1s6A1a', 'شرح انشاء ملف ب html', 'شرح انشاء ملف ب html', 'eNa4njExZzP58hAitP0m.mp4', 'wIelrpaGfbxMw1zr0hLp.png', '2023-05-07', 'active'),
('LxxGFjco93KyB8yop75K', '5H3zHd2bnJMmgPnypb4u', 'VLjeUKhANgvYXK9CtPM4', 'شرح الوحدة الثانية في مقرر معالجة البيانات', 'شرح الوحدة الثانية في مقرر معالجة البيانات ', 'Tmo2fw7mzjwCoYV785X5.mp4', '8YJwVxsrWQnahiv5RRir.png', '2023-05-07', 'active'),
('3c54Hkosuf10FlVU72Xc', '5H3zHd2bnJMmgPnypb4u', 'VLjeUKhANgvYXK9CtPM4', 'شرح الوحدة الثانية من معالجة البيانات الجزء 2', 'شرح الوحدة الثانية من معالجة البيانات الجزء 2', 'jRPFJoTsWD8jcR4HiHNK.mp4', 'K8EfsC9dIalUq1YzrYVf.png', '2023-05-07', 'active'),
('5JxPAPKYhb7wKInoxRid', 'Oq7qK6hiyjQO6LeRdQIK', 'XvPdf00k0pxNYUKG9Lqm', 'حل مسائل رياضية الجزء الأول', 'حل مسائل رياضية مقرر الرسم بالحاسوب', 'Xv9fkk5K44L4dQ8jSx8U.mp4', 'cnd89tcMU1MhykUuiseo.png', '2023-05-07', 'active'),
('S2UsNI2QiSyHk5g8Lm4a', 'Oq7qK6hiyjQO6LeRdQIK', 'XvPdf00k0pxNYUKG9Lqm', 'حل مسائل رياضية الجزء الثاني', 'حل مسائل رياضية الجزء الأول', 'sFDMA1eElm4cjDYspwV3.mp4', 'oYRTf8ld2d9yFOB6PQ5e.png', '2023-05-07', 'active'),
('Y5VmGaC04tX6dZgkjvfT', 'Jbqsxhl8H7DUy4HCRPTa', '4lxDSt4y0NMoApDQggrN', 'شرح جمل التحكم جزء 1', 'شرح جمل التحكم', 'c8LTdPFni984rPC0pX2K.mp4', 'oh6A7l21rNPIPcH31R2w.jpeg', '2023-05-07', 'active'),
('LwU8FGEvaURJoXrUF2XP', 'Jbqsxhl8H7DUy4HCRPTa', '4lxDSt4y0NMoApDQggrN', 'شرح جمل التحكم جزء 2', 'شرح جمل التحكم', 'F9Bx2c8BcFEbbNM2MYqN.mp4', 'yx9NQqr78XUdB9ZuPSzY.jpeg', '2023-05-07', 'active'),
('kKEw5Ztv9gNjzS4R6yAV', 'uTZuKlKLZSGZeYVSH0zX', 'VcHjneYFIe6r5U9i7c7U', 'شرح الوحدة الاولى', 'شرح الوحدة الاولى', '5VBQeJfcZtHV6Dhauvxt.mp4', '2bG5jsAANk6akbiVo0ot.png', '2023-05-08', 'active'),
('867DL68b8ErxkZp2vXtB', 'uQkVy00W8ZK30yn5ujXs', 'RoE3ad4aAxpOvHMtDizD', ' شرح  الوحدة الثانية معالجة البيانات', ' شرح  الوحدة الثانية معالجة البيانات', 'ZzU1ZKuzeYzNTDcBjYmJ.mp4', 'y5vOcf1eY4a4juAKneIR.png', '2023-05-08', 'active'),
('TmbcZNiJrAyBK6SuwSlP', 'x4YTH8VwvtGgh0cYuQME', 'TP0HJGoKDzhsEVhx3JPo', 'شرح جمل التحكم جزء 1', 'شرح جمل التحكم جزء 1', 'XHKIIFSj1cnmmxCjWzLI.mp4', 'YXmINq5Ch37kHt7jD6O4.jpeg', '2023-05-08', 'active'),
('zJzDU3c1j2rBK9uheVWJ', '5H3zHd2bnJMmgPnypb4u', 'vGsGo98R3vcIYKvDXPNM', 'الوحدة الأولى من مقرر هندسة البرمجيات', 'شرح الوحدة الأولى من مقرر هندسة البرمجيات\r\nبعنوان &#34;مقدمة في هندسة البرمحيات&#34;', 'TmiE6AoeP9iWcoHDSeKL.mp4', 'ELjCDjQqA6MBkq1pN3Pa.jpg', '2023-05-15', 'active'),
('wMTJAwzDLoeuRCiuFkMn', '5H3zHd2bnJMmgPnypb4u', 'vGsGo98R3vcIYKvDXPNM', 'الوحدة التانية من مقرر هندسة البرمجيات', 'شرح الوحدة التانية لمقرر هندسة البرمجيات \r\nبعنوان: متطلبات مستخدم هندسة البرمجيات', 'QgkViZlx4qGAWEhHAj6K.mp4', 'icnK9V2tQ7weh8L1A3YM.jpg', '2023-05-15', 'active'),
('OkkbgsVdkiidgHhq01vv', '5H3zHd2bnJMmgPnypb4u', 'vGsGo98R3vcIYKvDXPNM', 'الوحدة الثالثة لمقرر هندسة البرمجيات', 'شرح الوحدة الثاثة لمقرر هندسة البرمجيات\r\nبعنوان: تحليل متطلبات البرمجيات', 'UJlE0fJLLfNQpkTO54HT.mp4', 'nUWqwjKTpQ9UngChNmmO.jpg', '2023-05-15', 'active'),
('kzl9AwNnNKuUhBeVucJk', '5H3zHd2bnJMmgPnypb4u', 'MQpm4STmnyhxwPL8gjwj', 'الجزء الأول من الجانب العملي لمقرر قاعدة البيانات وادارتها', 'شرح كل ما يتعلق بالجزء الأول للجانب العملي لمقرر قاعدة البيانات \r\nسيتم شرح في هذا الجزء \r\nإنشاء وحذف قاعدة البيانات\r\nإنشاء و حذف جدول من قاعدة البيانات\r\nالمفاتيح ', 'kJjkHhLm6y8Q07tH94s1.mp4', 'jgpiFxHxTkgyRRS9buTz.jpg', '2023-05-15', 'active');

-- --------------------------------------------------------

--
-- بنية الجدول `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `following_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `following_id`) VALUES
(25, 'iwPD2TFsnOb83RtG9MJo', 'URzk1KgetuF89CIVWUAf'),
(26, '7GXrXcaFphR0VWUfVsY3', 'Oq7qK6hiyjQO6LeRdQIK'),
(27, '7GXrXcaFphR0VWUfVsY3', '5H3zHd2bnJMmgPnypb4u'),
(28, '7GXrXcaFphR0VWUfVsY3', 'x4YTH8VwvtGgh0cYuQME'),
(29, '7GXrXcaFphR0VWUfVsY3', 'uTZuKlKLZSGZeYVSH0zX'),
(30, '7GXrXcaFphR0VWUfVsY3', 'Jbqsxhl8H7DUy4HCRPTa'),
(31, '7GXrXcaFphR0VWUfVsY3', 'URzk1KgetuF89CIVWUAf'),
(32, '7GXrXcaFphR0VWUfVsY3', 'uQkVy00W8ZK30yn5ujXs'),
(33, 'L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u'),
(35, 'L0JEfhqQWLQqNB2SOYX7', 'URzk1KgetuF89CIVWUAf'),
(36, 'L0JEfhqQWLQqNB2SOYX7', 'Jbqsxhl8H7DUy4HCRPTa'),
(37, 'L0JEfhqQWLQqNB2SOYX7', 'uTZuKlKLZSGZeYVSH0zX'),
(38, 'L0JEfhqQWLQqNB2SOYX7', 'x4YTH8VwvtGgh0cYuQME'),
(39, 'L0JEfhqQWLQqNB2SOYX7', 'Oq7qK6hiyjQO6LeRdQIK'),
(40, 'L0JEfhqQWLQqNB2SOYX7', 'uQkVy00W8ZK30yn5ujXs'),
(41, 'ZBdDXsCRDAoZYsQJ4NKJ', '5H3zHd2bnJMmgPnypb4u'),
(42, 'ZBdDXsCRDAoZYsQJ4NKJ', 'x4YTH8VwvtGgh0cYuQME'),
(43, 'ZBdDXsCRDAoZYsQJ4NKJ', 'URzk1KgetuF89CIVWUAf'),
(44, 'ZBdDXsCRDAoZYsQJ4NKJ', 'Jbqsxhl8H7DUy4HCRPTa'),
(45, 'ZBdDXsCRDAoZYsQJ4NKJ', 'uTZuKlKLZSGZeYVSH0zX'),
(46, 'ZBdDXsCRDAoZYsQJ4NKJ', 'Oq7qK6hiyjQO6LeRdQIK'),
(47, 'ZBdDXsCRDAoZYsQJ4NKJ', 'uQkVy00W8ZK30yn5ujXs'),
(48, 'HeLTdFuEvHFtSHufG1CR', '5H3zHd2bnJMmgPnypb4u'),
(49, 'HeLTdFuEvHFtSHufG1CR', 'x4YTH8VwvtGgh0cYuQME'),
(50, 'el3aBu9LmQ6bJOQ9haNp', 'x4YTH8VwvtGgh0cYuQME');

-- --------------------------------------------------------

--
-- بنية الجدول `likes`
--

CREATE TABLE `likes` (
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `likes`
--

INSERT INTO `likes` (`user_id`, `tutor_id`, `content_id`) VALUES
('iwPD2TFsnOb83RtG9MJo', 'URzk1KgetuF89CIVWUAf', '8sUwJbrmd3V0y09RyD8G'),
('L0JEfhqQWLQqNB2SOYX7', 'Oq7qK6hiyjQO6LeRdQIK', 'S2UsNI2QiSyHk5g8Lm4a'),
('HeLTdFuEvHFtSHufG1CR', 'uTZuKlKLZSGZeYVSH0zX', 'kKEw5Ztv9gNjzS4R6yAV'),
('L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'wMTJAwzDLoeuRCiuFkMn'),
('L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'OkkbgsVdkiidgHhq01vv');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `title`, `text`) VALUES
(28, 'iwPD2TFsnOb83RtG9MJo', 'URzk1KgetuF89CIVWUAf', 'شرح', 'شرح ممتاز أستاذ'),
(29, 'URzk1KgetuF89CIVWUAf', 'iwPD2TFsnOb83RtG9MJo', 'شكر ', 'اشكرك على حسن تعليقك'),
(30, 'el3aBu9LmQ6bJOQ9haNp', 'x4YTH8VwvtGgh0cYuQME', 'قاعدة بيانات', 'مرحبا دكتور متى راح ينزل الكورس الجديد'),
(31, 'el3aBu9LmQ6bJOQ9haNp', 'x4YTH8VwvtGgh0cYuQME', 'قاعدة بيانات', 'مرحبا دكتور متى راح ينزل الكورس الجديد'),
(32, 'x4YTH8VwvtGgh0cYuQME', 'el3aBu9LmQ6bJOQ9haNp', 'بخصوص مادة قاعدة البيانات', 'ان شاء الله غدا راح ينزل الجزء التاني '),
(33, 'L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'الجانب العملي لمقرر قاعدة البيانات', 'مرحبا دكتور قاسم \r\nبخصوص المقرر العملي متى راح تنشر شرح خاص بالجانب العملي لمقرر قاعدة البيانات\r\n'),
(34, 'L0JEfhqQWLQqNB2SOYX7', '5H3zHd2bnJMmgPnypb4u', 'الجانب العملي لمقرر قاعدة البيانات', 'مرحبا دكتور قاسم \r\nبخصوص الجانب العملي لمقرر قاعدة البيانات متى سيتم شرحها '),
(35, 'L0JEfhqQWLQqNB2SOYX7', 'Jbqsxhl8H7DUy4HCRPTa', 'بخصوص الجانب العملي لمقرر تصميم منطق', 'مرحبا دكتور مصلح \r\nبخصوص الجانب العملي لمادة تصميم منطق متى بكون جاهز الشرح الخاص بالعملي '),
(36, '5H3zHd2bnJMmgPnypb4u', 'L0JEfhqQWLQqNB2SOYX7', 'الجانب العملي لمقرر قاعدة البيانات', 'ان شاء الله في بداية الاسبوع المقبل \r\nسيتم نشر فيديوهات للجانب العملي لهذا المقرر');

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `related_to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) DEFAULT 0,
  `type` enum('message','follow','new') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `related_to`, `text`, `seen`, `type`) VALUES
(30, 'URzk1KgetuF89CIVWUAf', NULL, 'قام admin1 بعمل متابعة لك.', 1, 'follow'),
(31, 'URzk1KgetuF89CIVWUAf', NULL, 'رسالة جديدة.', 1, 'message'),
(32, 'iwPD2TFsnOb83RtG9MJo', NULL, 'رسالة جديدة.', 1, 'message'),
(33, 'Oq7qK6hiyjQO6LeRdQIK', NULL, 'قام nidalrdwan بعمل متابعة لك.', 1, 'follow'),
(34, '5H3zHd2bnJMmgPnypb4u', NULL, 'قام nidalrdwan بعمل متابعة لك.', 1, 'follow'),
(35, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام nidalrdwan بعمل متابعة لك.', 1, 'follow'),
(36, 'uTZuKlKLZSGZeYVSH0zX', NULL, 'قام nidalrdwan بعمل متابعة لك.', 0, 'follow'),
(37, 'Jbqsxhl8H7DUy4HCRPTa', NULL, 'قام nidalrdwan بعمل متابعة لك.', 0, 'follow'),
(38, 'URzk1KgetuF89CIVWUAf', NULL, 'قام nidalrdwan بعمل متابعة لك.', 1, 'follow'),
(39, 'uQkVy00W8ZK30yn5ujXs', NULL, 'قام nidalrdwan بعمل متابعة لك.', 0, 'follow'),
(40, 'iwPD2TFsnOb83RtG9MJo', 'Mvq7n7UgdhkfIbQPSoqm', 'قام المدرس teacher بإضافة درس جديد مفهوم  قاعدة البيانات وإدارتها الجزء 2.', 0, 'new'),
(41, '7GXrXcaFphR0VWUfVsY3', 'Mvq7n7UgdhkfIbQPSoqm', 'قام المدرس teacher بإضافة درس جديد مفهوم  قاعدة البيانات وإدارتها الجزء 2.', 1, 'new'),
(42, 'iwPD2TFsnOb83RtG9MJo', 'CFxrZKyZvHjSCozirwqp', 'قام المدرس teacher بإضافة درس جديد شرح مقدمة في تصميم صفحات الويب.', 0, 'new'),
(43, '7GXrXcaFphR0VWUfVsY3', 'CFxrZKyZvHjSCozirwqp', 'قام المدرس teacher بإضافة درس جديد شرح مقدمة في تصميم صفحات الويب.', 1, 'new'),
(44, 'iwPD2TFsnOb83RtG9MJo', 'MqGXVSrWKVKNXvdqQeyt', 'قام المدرس teacher بإضافة درس جديد شرح انشاء ملف ب html.', 0, 'new'),
(45, '7GXrXcaFphR0VWUfVsY3', 'MqGXVSrWKVKNXvdqQeyt', 'قام المدرس teacher بإضافة درس جديد شرح انشاء ملف ب html.', 1, 'new'),
(46, '7GXrXcaFphR0VWUfVsY3', 'LxxGFjco93KyB8yop75K', 'قام المدرس قاسم زرندح بإضافة درس جديد شرح الوحدة الثانية في مقرر معالجة البيانات.', 1, 'new'),
(47, '7GXrXcaFphR0VWUfVsY3', '3c54Hkosuf10FlVU72Xc', 'قام المدرس قاسم زرندح بإضافة درس جديد شرح الوحدة الثانية من معالجة البيانات الجزء 2.', 1, 'new'),
(48, '5H3zHd2bnJMmgPnypb4u', NULL, 'قام ahmedkheder بعمل متابعة لك.', 1, 'follow'),
(49, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام ahmedkheder بعمل متابعة لك.', 1, 'follow'),
(50, 'URzk1KgetuF89CIVWUAf', NULL, 'قام ahmedkheder بعمل متابعة لك.', 1, 'follow'),
(51, 'Jbqsxhl8H7DUy4HCRPTa', NULL, 'قام ahmedkheder بعمل متابعة لك.', 0, 'follow'),
(52, 'uTZuKlKLZSGZeYVSH0zX', NULL, 'قام ahmedkheder بعمل متابعة لك.', 0, 'follow'),
(53, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام ahmedkheder بعمل متابعة لك.', 1, 'follow'),
(54, 'Oq7qK6hiyjQO6LeRdQIK', NULL, 'قام ahmedkheder بعمل متابعة لك.', 1, 'follow'),
(55, 'uQkVy00W8ZK30yn5ujXs', NULL, 'قام ahmedkheder بعمل متابعة لك.', 0, 'follow'),
(56, '7GXrXcaFphR0VWUfVsY3', '5JxPAPKYhb7wKInoxRid', 'قام المدرس Fadi Al-Muslimi بإضافة درس جديد حل مسائل رياضية الجزء الأول.', 0, 'new'),
(57, 'L0JEfhqQWLQqNB2SOYX7', '5JxPAPKYhb7wKInoxRid', 'قام المدرس Fadi Al-Muslimi بإضافة درس جديد حل مسائل رياضية الجزء الأول.', 1, 'new'),
(58, '7GXrXcaFphR0VWUfVsY3', 'S2UsNI2QiSyHk5g8Lm4a', 'قام المدرس Fadi Al-Muslimi بإضافة درس جديد حل مسائل رياضية الجزء الثاني.', 0, 'new'),
(59, 'L0JEfhqQWLQqNB2SOYX7', 'S2UsNI2QiSyHk5g8Lm4a', 'قام المدرس Fadi Al-Muslimi بإضافة درس جديد حل مسائل رياضية الجزء الثاني.', 1, 'new'),
(60, '5H3zHd2bnJMmgPnypb4u', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 1, 'follow'),
(61, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 1, 'follow'),
(62, 'URzk1KgetuF89CIVWUAf', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 1, 'follow'),
(63, 'Jbqsxhl8H7DUy4HCRPTa', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 0, 'follow'),
(64, 'uTZuKlKLZSGZeYVSH0zX', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 0, 'follow'),
(65, 'Oq7qK6hiyjQO6LeRdQIK', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 1, 'follow'),
(66, 'uQkVy00W8ZK30yn5ujXs', NULL, 'قام MahmoudZaanin بعمل متابعة لك.', 0, 'follow'),
(67, '7GXrXcaFphR0VWUfVsY3', 'Y5VmGaC04tX6dZgkjvfT', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 1.', 0, 'new'),
(68, 'L0JEfhqQWLQqNB2SOYX7', 'Y5VmGaC04tX6dZgkjvfT', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 1.', 1, 'new'),
(69, 'ZBdDXsCRDAoZYsQJ4NKJ', 'Y5VmGaC04tX6dZgkjvfT', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 1.', 1, 'new'),
(70, '7GXrXcaFphR0VWUfVsY3', 'LwU8FGEvaURJoXrUF2XP', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 2.', 0, 'new'),
(71, 'L0JEfhqQWLQqNB2SOYX7', 'LwU8FGEvaURJoXrUF2XP', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 2.', 1, 'new'),
(72, 'ZBdDXsCRDAoZYsQJ4NKJ', 'LwU8FGEvaURJoXrUF2XP', 'قام المدرس مصلح مصلح بإضافة درس جديد شرح جمل التحكم جزء 2.', 1, 'new'),
(73, '7GXrXcaFphR0VWUfVsY3', 'kKEw5Ztv9gNjzS4R6yAV', 'قام المدرس wesam بإضافة درس جديد شرح الوحدة الاولى.', 0, 'new'),
(74, 'L0JEfhqQWLQqNB2SOYX7', 'kKEw5Ztv9gNjzS4R6yAV', 'قام المدرس wesam بإضافة درس جديد شرح الوحدة الاولى.', 1, 'new'),
(75, 'ZBdDXsCRDAoZYsQJ4NKJ', 'kKEw5Ztv9gNjzS4R6yAV', 'قام المدرس wesam بإضافة درس جديد شرح الوحدة الاولى.', 0, 'new'),
(76, '7GXrXcaFphR0VWUfVsY3', '867DL68b8ErxkZp2vXtB', 'قام المدرس Muhammad Abu Al-Jabin بإضافة درس جديد  شرح  الوحدة الثانية معالجة البيانات.', 0, 'new'),
(77, 'L0JEfhqQWLQqNB2SOYX7', '867DL68b8ErxkZp2vXtB', 'قام المدرس Muhammad Abu Al-Jabin بإضافة درس جديد  شرح  الوحدة الثانية معالجة البيانات.', 1, 'new'),
(78, 'ZBdDXsCRDAoZYsQJ4NKJ', '867DL68b8ErxkZp2vXtB', 'قام المدرس Muhammad Abu Al-Jabin بإضافة درس جديد  شرح  الوحدة الثانية معالجة البيانات.', 0, 'new'),
(79, '7GXrXcaFphR0VWUfVsY3', 'TmbcZNiJrAyBK6SuwSlP', 'قام المدرس admin11 بإضافة درس جديد شرح جمل التحكم جزء 1.', 0, 'new'),
(80, 'L0JEfhqQWLQqNB2SOYX7', 'TmbcZNiJrAyBK6SuwSlP', 'قام المدرس admin11 بإضافة درس جديد شرح جمل التحكم جزء 1.', 1, 'new'),
(81, 'ZBdDXsCRDAoZYsQJ4NKJ', 'TmbcZNiJrAyBK6SuwSlP', 'قام المدرس admin11 بإضافة درس جديد شرح جمل التحكم جزء 1.', 0, 'new'),
(82, '5H3zHd2bnJMmgPnypb4u', NULL, 'قام marwan alhajer بعمل متابعة لك.', 0, 'follow'),
(83, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام marwan alhajer بعمل متابعة لك.', 1, 'follow'),
(84, 'x4YTH8VwvtGgh0cYuQME', NULL, 'قام alaa بعمل متابعة لك.', 1, 'follow'),
(85, 'x4YTH8VwvtGgh0cYuQME', NULL, 'رسالة جديدة.', 1, 'message'),
(86, 'x4YTH8VwvtGgh0cYuQME', NULL, 'رسالة جديدة.', 1, 'message'),
(87, 'el3aBu9LmQ6bJOQ9haNp', NULL, 'رسالة جديدة.', 1, 'message'),
(88, '5H3zHd2bnJMmgPnypb4u', NULL, 'رسالة جديدة.', 0, 'message'),
(89, '5H3zHd2bnJMmgPnypb4u', NULL, 'رسالة جديدة.', 0, 'message'),
(90, 'Jbqsxhl8H7DUy4HCRPTa', NULL, 'رسالة جديدة.', 0, 'message'),
(91, 'L0JEfhqQWLQqNB2SOYX7', NULL, 'رسالة جديدة.', 0, 'message'),
(92, '7GXrXcaFphR0VWUfVsY3', 'zJzDU3c1j2rBK9uheVWJ', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الأولى من مقرر هندسة البرمجيات.', 0, 'new'),
(93, 'L0JEfhqQWLQqNB2SOYX7', 'zJzDU3c1j2rBK9uheVWJ', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الأولى من مقرر هندسة البرمجيات.', 0, 'new'),
(94, 'ZBdDXsCRDAoZYsQJ4NKJ', 'zJzDU3c1j2rBK9uheVWJ', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الأولى من مقرر هندسة البرمجيات.', 0, 'new'),
(95, 'HeLTdFuEvHFtSHufG1CR', 'zJzDU3c1j2rBK9uheVWJ', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الأولى من مقرر هندسة البرمجيات.', 0, 'new'),
(96, '7GXrXcaFphR0VWUfVsY3', 'wMTJAwzDLoeuRCiuFkMn', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة التانية من مقرر هندسة البرمجيات.', 0, 'new'),
(97, 'L0JEfhqQWLQqNB2SOYX7', 'wMTJAwzDLoeuRCiuFkMn', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة التانية من مقرر هندسة البرمجيات.', 0, 'new'),
(98, 'ZBdDXsCRDAoZYsQJ4NKJ', 'wMTJAwzDLoeuRCiuFkMn', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة التانية من مقرر هندسة البرمجيات.', 0, 'new'),
(99, 'HeLTdFuEvHFtSHufG1CR', 'wMTJAwzDLoeuRCiuFkMn', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة التانية من مقرر هندسة البرمجيات.', 0, 'new'),
(100, '7GXrXcaFphR0VWUfVsY3', 'OkkbgsVdkiidgHhq01vv', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الثالثة لمقرر هندسة البرمجيات.', 0, 'new'),
(101, 'L0JEfhqQWLQqNB2SOYX7', 'OkkbgsVdkiidgHhq01vv', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الثالثة لمقرر هندسة البرمجيات.', 0, 'new'),
(102, 'ZBdDXsCRDAoZYsQJ4NKJ', 'OkkbgsVdkiidgHhq01vv', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الثالثة لمقرر هندسة البرمجيات.', 0, 'new'),
(103, 'HeLTdFuEvHFtSHufG1CR', 'OkkbgsVdkiidgHhq01vv', 'قام المدرس قاسم زرندح بإضافة درس جديد الوحدة الثالثة لمقرر هندسة البرمجيات.', 0, 'new'),
(104, '7GXrXcaFphR0VWUfVsY3', 'kzl9AwNnNKuUhBeVucJk', 'قام المدرس قاسم زرندح بإضافة درس جديد الجزء الأول من الجانب العملي لمقرر قاعدة البيانات وادارتها.', 0, 'new'),
(105, 'L0JEfhqQWLQqNB2SOYX7', 'kzl9AwNnNKuUhBeVucJk', 'قام المدرس قاسم زرندح بإضافة درس جديد الجزء الأول من الجانب العملي لمقرر قاعدة البيانات وادارتها.', 0, 'new'),
(106, 'ZBdDXsCRDAoZYsQJ4NKJ', 'kzl9AwNnNKuUhBeVucJk', 'قام المدرس قاسم زرندح بإضافة درس جديد الجزء الأول من الجانب العملي لمقرر قاعدة البيانات وادارتها.', 0, 'new'),
(107, 'HeLTdFuEvHFtSHufG1CR', 'kzl9AwNnNKuUhBeVucJk', 'قام المدرس قاسم زرندح بإضافة درس جديد الجزء الأول من الجانب العملي لمقرر قاعدة البيانات وادارتها.', 0, 'new');

-- --------------------------------------------------------

--
-- بنية الجدول `playlist`
--

CREATE TABLE `playlist` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `playlist`
--

INSERT INTO `playlist` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
('2YScwZg91zHbnyGWbQLz', 'URzk1KgetuF89CIVWUAf', 'قواعد البيانات وإدارتها', 'شرح مقرر قواعد البيانات وإدارتها بالتفصيل ', 'yDqV58B5MgMwli0NQH4F.jpeg', '2023-05-04', 'active'),
('gSVc4BfxmRTrJV1s6A1a', 'URzk1KgetuF89CIVWUAf', 'تصميم صفحات الويب', 'شرح كل ما يخص تصميم صفحات الويب', 'u6LklPgNdJ9iux1285CE.png', '2023-05-07', 'active'),
('VLjeUKhANgvYXK9CtPM4', '5H3zHd2bnJMmgPnypb4u', 'معالجة البيانات', 'شرح معالجة البيانات', 'uHOz43Hql3Y71ZJsVVGE.jpeg', '2023-05-07', 'active'),
('XvPdf00k0pxNYUKG9Lqm', 'Oq7qK6hiyjQO6LeRdQIK', 'رسم بالحاسوب', 'شرح مقرر رسم بالحاسوب ', 'X6pVWPa95fUmFpPYOKLq.jpeg', '2023-05-07', 'active'),
('4lxDSt4y0NMoApDQggrN', 'Jbqsxhl8H7DUy4HCRPTa', 'اسمبلي', 'شرح مقرر اسمبلي', 'xNrxcVbVCSO82t9RHoRY.jpeg', '2023-05-07', 'active'),
('VcHjneYFIe6r5U9i7c7U', 'uTZuKlKLZSGZeYVSH0zX', 'رسم بالحاسوب', 'شرح رسم بالحاسوب', 'LGTfuFV1MUbSv83r81eA.png', '2023-05-08', 'active'),
('RoE3ad4aAxpOvHMtDizD', 'uQkVy00W8ZK30yn5ujXs', 'معالجة البيانات', 'شرح معالجة البيانات', 'stcKtjFrT7YoyPx6OVYO.png', '2023-05-08', 'active'),
('TP0HJGoKDzhsEVhx3JPo', 'x4YTH8VwvtGgh0cYuQME', 'اسمبلي', 'شرح مادة اسمبلي', 'vNTs6UeWXKezkhIp3j1n.jpeg', '2023-05-08', 'active'),
('vGsGo98R3vcIYKvDXPNM', '5H3zHd2bnJMmgPnypb4u', 'هندسة البرمجيات', 'كل ما يخص مقرر هندسة البرمجيات \r\nجامعة القدس المفتوحة فرع شمال غزة ', 'cmQZJIA9m0kMY4yeIQHS.jpg', '2023-05-15', 'active'),
('MQpm4STmnyhxwPL8gjwj', '5H3zHd2bnJMmgPnypb4u', 'قاعدة البيانات وادارتها', 'شرح الجانب العملي لمقرر قاعدة البيانات و ادارتها', 'lczxLj2BrlfAy405UiuZ.jpg', '2023-05-15', 'active');

-- --------------------------------------------------------

--
-- بنية الجدول `tutors`
--

CREATE TABLE `tutors` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tutors`
--

INSERT INTO `tutors` (`id`, `name`, `profession`, `email`, `password`, `image`) VALUES
('5H3zHd2bnJMmgPnypb4u', 'قاسم زرندح', 'مدرس', 'admin11@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'yerCqoxjJKsXDwRZS5Vv.jpg'),
('x4YTH8VwvtGgh0cYuQME', 'admin11', 'مدرس', 'admin12@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'bC4ahBWbu5CpAxcBEw88.jpg'),
('URzk1KgetuF89CIVWUAf', 'teacher', 'مدرس', 'teacher@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'y7V7idc7KEsNDzFSBGLq.jpg'),
('Jbqsxhl8H7DUy4HCRPTa', 'مصلح مصلح', 'مطور', 'Mosleh@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'zqHluJR2I8oF53AuxpL0.jpg'),
('uTZuKlKLZSGZeYVSH0zX', 'wesam', 'مهندس', 'wesam@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'llN9YYGwdeCS2YEDFA2b.png'),
('Oq7qK6hiyjQO6LeRdQIK', 'Fadi Al-Muslimi', 'مطور', 'Fadi@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'SAALz9p3rCNTHpLh35un.jpg'),
('uQkVy00W8ZK30yn5ujXs', 'Muhammad Abu Al-Jabin', 'مدرس', 'Muhammad@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '5SeJtgxSDYgiQOFBUv9r.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
('7GXrXcaFphR0VWUfVsY3', 'nidalrdwan', 'nidal21@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'r6Mffy5HdzSw9ecgpjj6.jpeg'),
('7tEc2BElGDF09C35wt0w', 'ali', 'ali@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'CJYtC8XTVT7wBg2yutdM.jpeg'),
('el3aBu9LmQ6bJOQ9haNp', 'alaa', 'alaa@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'c56JL25IQJKvpbPbFpjI.jpg'),
('FT3hPTumsl12ziizIWC8', 'nidalrdwan', 'nidal@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'YxRqcEyDtNtyMBAMarbc.jpg'),
('HeLTdFuEvHFtSHufG1CR', 'marwan alhajer', 'marwan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'jOLGSUaWNouVyqMflCj1.jpg'),
('iwPD2TFsnOb83RtG9MJo', 'admin1', 'admin1@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'ynetKUGznft8OylBTe4O.jpeg'),
('L0JEfhqQWLQqNB2SOYX7', 'ahmedkheder', 'ahmed1@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'bpcled9UT1IffSWLIgVL.jpeg'),
('lOTGlrHHDcgaeAzIXrQj', 'lena', 'lena@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Vn3M2MSpl75Cias5hPy5.jpeg'),
('p16Mrw1BL3zxHd8B8Pef', 'zain', 'zain@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'HvONaHLCt80CFo7uDYCD.jpeg'),
('RIQhsEEvlz9AFrPD6e2B', 'omar', 'omar@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'eicRWQS00Jt2mWCdgyFm.jpeg'),
('SEIqOml7OWp4LzHzfG3j', 'Mohammed', 'Mohammed@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Ywa9ui1zwxEKeKcv81rs.jpeg'),
('WaYdDMEbwq1Z0XGuP7n0', 'Mohannad', 'Mohannad@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'QyH8KYHrZcPYpehQYpfo.jpeg'),
('wNBoFxA2pfAeBwPvLP5N', 'nidal2', 'nidal2@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'pHNNPD1xYJF6RpsANVVk.jpeg'),
('ZBdDXsCRDAoZYsQJ4NKJ', 'MahmoudZaanin', 'Mahmoud@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Eno2U7seOaurb4vrFmEr.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
