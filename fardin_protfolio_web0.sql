-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2026 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fardin_protfolio_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `bio`, `experience`, `resume`) VALUES
(2, '1000031692-removebg-preview.png', 'Hi, I\'m Fardin E Ehsan — a passionate Web Developer, Graphic Designer, and UI/UX Designer who loves creating modern, clean, and user-friendly digital solutions.\r\n\r\nI specialize in website design & development, graphic design, and business productivity tools like Microsoft Office. My goal is always to deliver designs that are not only visually attractive but also practical and result-driven.\r\n\r\nAlongside freelancing, I work full-time as a Sales & Distribution Officer, which gives me strong real-world business experience. This helps me understand client needs better and build solutions that actually grow businesses — not just look good.\r\n\r\nI believe in quality, performance, and long-term value. Let’s build something amazing together.\r\n', '✔ 3+ Years Experience ', '1 (2).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `excerpt`, `content`, `image`, `created_at`) VALUES
(1, 'sdaf ert e', 'gds', 'sf w56 w', '524148962_669680242788878_372095849956175216_n.jpg', '2026-02-12 07:20:17'),
(3, 'rat ', ' art qrt ', ' er ewt ertwrt k erhqkwe urhkkeruh jer sdf,sdj,f .', '1770888499_download (1).jpg', '2026-02-12 09:28:19'),
(4, 'dfa sgs', 'gsdg s', 'Blog cards এখন horizontal slider।\n\nLeft/Right arrow দিয়ে scroll করা যাবে।\n\nResponsive: mobile-এ arrow ছোট হবে।\n\nRead More button ঠিক থাকবে এবং নতুন page খুলবে।\n\nযদি চাও, আমি এই slider কে mouse drag বা swipe support দিতেও বানাতে পারি, যেন mobile-এ swipe করে scroll করা যায়।\n\nচাও আমি সেটা যোগ করি?', '1770889045_download.jpg', '2026-02-12 09:37:25'),
(5, 'gufgyf', 'fgfhhgfg utgyu,tg', 'ffdgh', '520541528_600921896408411_4173653846024294540_n.jpg', '2026-02-12 09:41:33'),
(6, 'vxdfsf', 'sfsdfs', 'gdfgss', '1770902318_IMG_7652.jpg', '2026-02-12 13:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `title`, `number`, `suffix`, `icon`, `status`) VALUES
(2, 'Total Projects', 27, '+', '🗂️', 1),
(3, 'Happy Clients', 5, '+', '😀', 1),
(4, 'Reviews', 9, '+', '📝', 1),
(5, 'Satisfaction Clients', 95, '%', '✅', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(2, 'What services do you offer?', 'I provide Graphic Design, Web Design, Web Development, and Microsoft Office solutions.'),
(3, 'How can I contact you?', 'You can reach me via the contact form on my website or email me directly at [your email].'),
(4, 'Do you offer full-time services?', 'Yes, I am available for full-time work as well as freelance projects.'),
(5, 'What is your pricing model?', 'Pricing depends on the project type; you can check the Pricing section for details.'),
(6, 'Can I see your previous work?', 'Yes, visit the Portfolio section to see my completed projects.');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `subtitles` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `title`, `subtitle`, `subtitles`, `description`, `created_at`) VALUES
(1, 'Hi, I am Fardin', 'Full Stack Developer', 'Web Developer, Designer, Freelancer', 'I build modern, fast and professional websites.', '2026-02-12 07:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `image`, `created_at`) VALUES
(1, '475fd097-88a9-41d6-a5c5-94a964b4ad10.png', '2026-02-12 07:03:11'),
(2, 'download (2).jpg', '2026-02-12 07:03:52'),
(3, 'download.jpg', '2026-02-12 07:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `attachment`, `created_at`) VALUES
(14, 'huays', 'gasdf@gmail.com', 'aytrfg qae rh ', '1770888112_Sales Work.docx', '2026-02-12 15:21:52'),
(15, 'Sagor Khan', 'Sagor@gmail.com', 'hi sir', '1772791888_.trashed-1773941061-IMG_20260128_171625.jpg', '2026-03-06 16:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `description`, `service_id`, `link`, `image`, `active`, `created_at`) VALUES
(2, 'Invoice Design', 'চাও হলে আমি এখন তোমাকে animated progress bar স', 3, 'https://chatgpt.com/c/6986033f-7d58-8320-b02e-b2b38a1056e9', 'Invoice Fisha it.jpg', 1, '2026-02-12 12:44:09'),
(3, 'Company Pad Design', 'চাও হলে আমি এখন তোমাকে animated progress bar স', 3, 'https://chatgpt.com/c/6986033f-7d58-8320-b02e-b2b38a1056e9', 'Pad Fisha It.jpg', 1, '2026-02-12 12:44:37'),
(4, 'Logo Wih My Company', 'চাও হলে আমি এখন তোমাকে animated progress bar স', 3, 'https://chatgpt.com/c/6986033f-7d58-8320-b02e-b2b38a1056e9', '19014473_Stone_text_effect_01.jpg', 1, '2026-02-12 12:46:28'),
(5, 'Buisness Card', 'চাও হলে আমি এখন তোমাকে animated progress bar স', 3, 'https://chatgpt.com/c/6986033f-7d58-8320-b02e-b2b38a1056e9', '16 [Converted]-01.jpg', 1, '2026-02-12 12:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `details` text NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `plan`, `price`, `discount`, `details`, `icon`, `created_at`) VALUES
(1, 'Basic', '99', '9', '1 Page Website,\r\nResponsive Design,Modern Layout,\r\nContact Form Setup,\r\nBasic SEO,\r\nFast Loading,\r\n3 Days Delivery,\r\nFree Support 3 Days\r\n', '💼', '2026-02-12 07:10:33'),
(2, 'Standard', '1000', '100', 'Up to 5 Pages Website,\r\nCustom UI Design,\r\nAdmin Panel,\r\nDatabase Integration,\r\nPortfolio Section,\r\nBlog Setup,\r\nSEO Optimization,\r\nSpeed Optimization,\r\n7 Days Delivery,\r\nFree Support 7 Days\r\n', '🚀', '2026-02-12 07:10:33'),
(3, 'Premium', '2000', '300', 'Unlimited Pages Website,\r\nFull Custom Design,\r\nAdvanced Admin Dashboard,\r\nBlog System,\r\nE-commerce or Dynamic Features,\r\nSecurity Setup,\r\nPerformance Optimization,\r\nContent Upload,\r\nMicrosoft Office Support,\r\nUnlimited Revision,\r\nPriority Support,\r\n15 Days Delivery\r\n', '🏆', '2026-02-12 07:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `rating` int(11) DEFAULT 5,
  `image` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `country`, `message`, `rating`, `image`, `verified`, `status`, `created_at`) VALUES
(1, 'FARDIN E EHSAN', 'bangladesh', 'dfs', 5, '1770880462_524350300_763649232850150_6148029036503540561_n.jpg', 1, 1, '2026-02-12 07:14:22'),
(2, 'Jony', 'USA', 'gsdr', 2, '1770888080_download (1).jpg', 0, 1, '2026-02-12 09:21:20'),
(3, 'John Doe', 'USA', 'Excellent work! Highly professional and delivered on time.', 4, '1770901191_download.jpg', 1, 1, '2026-02-12 12:59:51'),
(4, 'Ahmed Ali', 'UK', '\"I am satisfied with the service. Will hire again for future projects.\"', 5, '1770901272_download (2).jpg', 1, 1, '2026-02-12 13:01:12'),
(5, 'Jony', 'bangladesh', 'dffgdgb', 3, '1770902687_cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDI0LTEyL3Jhd3BpeGVsb2ZmaWNlMTBfYWR1bHRfaW5kaWFuX2xhdWdoaW5nX2FuZF9oYXZpbmdfZnVuX2luZGlhbl9idV8yNTNkNzMyYy03M2FiLTRlMDEtYTkwYy0zYjE1MGE2OTEzNWVfMS5wbmc.webp', 0, 1, '2026-02-12 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`) VALUES
(3, '🎨  Graphic Design', 'Creative logos, banners & marketing visuals that make your brand stand out.'),
(4, '💻 Web Design', 'Modern, responsive and user-friendly website layouts for all devices.'),
(5, '⚙ Web Development', 'Fast, secure and dynamic websites built with PHP & MySQL.'),
(6, '📊 Microsoft Office', 'Excel automation, reports & smart tools to improve productivity.'),
(7, '📈 Business & Sales Support', 'Practical sales strategies and business solutions to grow your company.');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `phone` varchar(50) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `footer_text` text DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT '',
  `seo_desc` text DEFAULT NULL,
  `theme_color` varchar(10) DEFAULT '#22c55e',
  `live_mode` tinyint(1) DEFAULT 1,
  `fb_link` varchar(255) DEFAULT '',
  `twitter_link` varchar(255) DEFAULT '',
  `instagram_link` varchar(255) DEFAULT '',
  `linkedin_link` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `site_favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `email`, `phone`, `address`, `footer_text`, `seo_title`, `seo_desc`, `theme_color`, `live_mode`, `fb_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `logo`, `site_favicon`) VALUES
(1, 'Fardin E Ehsan Protfolio', 'fardin.web.000@gmail.com', '+880 130 758 7006', 'Satkhira,khulna', '2025 Fardin E Ehsan. All Rights Reserved.', 'Freelancer', 'I build responsive websites, web applications, and professional portfolios for clients worldwide.', '#22c55e', 1, '', '', '', '', '1770885147_Fardin Logo-01.png', '1772803663_IMG_20250118_104727.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `percent`) VALUES
(2, 'Graphic Design', 60),
(3, 'Logo & Branding', 70),
(4, 'Canva / Photoshop', 80),
(5, 'UI/UX Layout ', 60),
(6, 'Microsoft Excel ', 85),
(7, 'Sales & Distribution ', 90),
(8, 'Client Communi cation ', 90),
(9, 'Web Development ', 85),
(10, 'Web Design', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
