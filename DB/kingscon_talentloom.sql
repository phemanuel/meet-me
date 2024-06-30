-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2024 at 01:34 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingscon_talentloom`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `dialing_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `dialing_code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', '+93', NULL, NULL),
(2, 'Albania', '+355', NULL, NULL),
(3, 'Algeria', '+213', NULL, NULL),
(4, 'American Samoa', '+1-684', NULL, NULL),
(5, 'Andorra', '+376', NULL, NULL),
(6, 'Angola', '+244', NULL, NULL),
(7, 'Anguilla', '+1-264', NULL, NULL),
(8, 'Antarctica', '+672', NULL, NULL),
(9, 'Antigua and Barbuda', '+1-268', NULL, NULL),
(10, 'Argentina', '+54', NULL, NULL),
(11, 'Armenia', '+374', NULL, NULL),
(12, 'Aruba', '+297', NULL, NULL),
(13, 'Australia', '+61', NULL, NULL),
(14, 'Austria', '+43', NULL, NULL),
(15, 'Azerbaijan', '+994', NULL, NULL),
(16, 'Bahamas', '+1-242', NULL, NULL),
(17, 'Bahrain', '+973', NULL, NULL),
(18, 'Bangladesh', '+880', NULL, NULL),
(19, 'Barbados', '+1-246', NULL, NULL),
(20, 'Belarus', '+375', NULL, NULL),
(21, 'Belgium', '+32', NULL, NULL),
(22, 'Belize', '+501', NULL, NULL),
(23, 'Benin', '+229', NULL, NULL),
(24, 'Bermuda', '+1-441', NULL, NULL),
(25, 'Bhutan', '+975', NULL, NULL),
(26, 'Bolivia', '+591', NULL, NULL),
(27, 'Bosnia and Herzegovina', '+387', NULL, NULL),
(28, 'Botswana', '+267', NULL, NULL),
(29, 'Brazil', '+55', NULL, NULL),
(30, 'British Indian Ocean Territory', '+246', NULL, NULL),
(31, 'British Virgin Islands', '+1-284', NULL, NULL),
(32, 'Brunei', '+673', NULL, NULL),
(33, 'Bulgaria', '+359', NULL, NULL),
(34, 'Burkina Faso', '+226', NULL, NULL),
(35, 'Burundi', '+257', NULL, NULL),
(36, 'Cambodia', '+855', NULL, NULL),
(37, 'Cameroon', '+237', NULL, NULL),
(38, 'Canada', '+1', NULL, NULL),
(39, 'Cape Verde', '+238', NULL, NULL),
(40, 'Cayman Islands', '+1-345', NULL, NULL),
(41, 'Central African Republic', '+236', NULL, NULL),
(42, 'Chad', '+235', NULL, NULL),
(43, 'Chile', '+56', NULL, NULL),
(44, 'China', '+86', NULL, NULL),
(45, 'Christmas Island', '+61', NULL, NULL),
(46, 'Cocos Islands', '+61', NULL, NULL),
(47, 'Colombia', '+57', NULL, NULL),
(48, 'Comoros', '+269', NULL, NULL),
(49, 'Cook Islands', '+682', NULL, NULL),
(50, 'Costa Rica', '+506', NULL, NULL),
(51, 'Croatia', '+385', NULL, NULL),
(52, 'Cuba', '+53', NULL, NULL),
(53, 'Curacao', '+599', NULL, NULL),
(54, 'Cyprus', '+357', NULL, NULL),
(55, 'Czech Republic', '+420', NULL, NULL),
(56, 'Democratic Republic of the Congo', '+243', NULL, NULL),
(57, 'Denmark', '+45', NULL, NULL),
(58, 'Djibouti', '+253', NULL, NULL),
(59, 'Dominica', '+1-767', NULL, NULL),
(60, 'Dominican Republic', '+1-809, +1-829, +1-849', NULL, NULL),
(61, 'East Timor', '+670', NULL, NULL),
(62, 'Ecuador', '+593', NULL, NULL),
(63, 'Egypt', '+20', NULL, NULL),
(64, 'El Salvador', '+503', NULL, NULL),
(65, 'Equatorial Guinea', '+240', NULL, NULL),
(66, 'Eritrea', '+291', NULL, NULL),
(67, 'Estonia', '+372', NULL, NULL),
(68, 'Ethiopia', '+251', NULL, NULL),
(69, 'Falkland Islands', '+500', NULL, NULL),
(70, 'Faroe Islands', '+298', NULL, NULL),
(71, 'Fiji', '+679', NULL, NULL),
(72, 'Finland', '+358', NULL, NULL),
(73, 'France', '+33', NULL, NULL),
(74, 'French Polynesia', '+689', NULL, NULL),
(75, 'Gabon', '+241', NULL, NULL),
(76, 'Gambia', '+220', NULL, NULL),
(77, 'Georgia', '+995', NULL, NULL),
(78, 'Germany', '+49', NULL, NULL),
(79, 'Ghana', '+233', NULL, NULL),
(80, 'Gibraltar', '+350', NULL, NULL),
(81, 'Greece', '+30', NULL, NULL),
(82, 'Greenland', '+299', NULL, NULL),
(83, 'Grenada', '+1-473', NULL, NULL),
(84, 'Guam', '+1-671', NULL, NULL),
(85, 'Guatemala', '+502', NULL, NULL),
(86, 'Guernsey', '+44-1481', NULL, NULL),
(87, 'Guinea', '+224', NULL, NULL),
(88, 'Guinea-Bissau', '+245', NULL, NULL),
(89, 'Guyana', '+592', NULL, NULL),
(90, 'Haiti', '+509', NULL, NULL),
(91, 'Honduras', '+504', NULL, NULL),
(92, 'Hong Kong', '+852', NULL, NULL),
(93, 'Hungary', '+36', NULL, NULL),
(94, 'Iceland', '+354', NULL, NULL),
(95, 'India', '+91', NULL, NULL),
(96, 'Indonesia', '+62', NULL, NULL),
(97, 'Iran', '+98', NULL, NULL),
(98, 'Iraq', '+964', NULL, NULL),
(99, 'Ireland', '+353', NULL, NULL),
(100, 'Isle of Man', '+44-1624', NULL, NULL),
(101, 'Israel', '+972', NULL, NULL),
(102, 'Italy', '+39', NULL, NULL),
(103, 'Ivory Coast', '+225', NULL, NULL),
(104, 'Jamaica', '+1-876', NULL, NULL),
(105, 'Japan', '+81', NULL, NULL),
(106, 'Jersey', '+44-1534', NULL, NULL),
(107, 'Jordan', '+962', NULL, NULL),
(108, 'Kazakhstan', '+7', NULL, NULL),
(109, 'Kenya', '+254', NULL, NULL),
(110, 'Kiribati', '+686', NULL, NULL),
(111, 'Kosovo', '+383', NULL, NULL),
(112, 'Kuwait', '+965', NULL, NULL),
(113, 'Kyrgyzstan', '+996', NULL, NULL),
(114, 'Laos', '+856', NULL, NULL),
(115, 'Latvia', '+371', NULL, NULL),
(116, 'Lebanon', '+961', NULL, NULL),
(117, 'Lesotho', '+266', NULL, NULL),
(118, 'Liberia', '+231', NULL, NULL),
(119, 'Libya', '+218', NULL, NULL),
(120, 'Liechtenstein', '+423', NULL, NULL),
(121, 'Lithuania', '+370', NULL, NULL),
(122, 'Luxembourg', '+352', NULL, NULL),
(123, 'Macau', '+853', NULL, NULL),
(124, 'Macedonia', '+389', NULL, NULL),
(125, 'Madagascar', '+261', NULL, NULL),
(126, 'Malawi', '+265', NULL, NULL),
(127, 'Malaysia', '+60', NULL, NULL),
(128, 'Maldives', '+960', NULL, NULL),
(129, 'Mali', '+223', NULL, NULL),
(130, 'Malta', '+356', NULL, NULL),
(131, 'Marshall Islands', '+692', NULL, NULL),
(132, 'Mauritania', '+222', NULL, NULL),
(133, 'Mauritius', '+230', NULL, NULL),
(134, 'Mayotte', '+262', NULL, NULL),
(135, 'Mexico', '+52', NULL, NULL),
(136, 'Micronesia', '+691', NULL, NULL),
(137, 'Moldova', '+373', NULL, NULL),
(138, 'Monaco', '+377', NULL, NULL),
(139, 'Mongolia', '+976', NULL, NULL),
(140, 'Montenegro', '+382', NULL, NULL),
(141, 'Montserrat', '+1-664', NULL, NULL),
(142, 'Morocco', '+212', NULL, NULL),
(143, 'Mozambique', '+258', NULL, NULL),
(144, 'Myanmar', '+95', NULL, NULL),
(145, 'Namibia', '+264', NULL, NULL),
(146, 'Nauru', '+674', NULL, NULL),
(147, 'Nepal', '+977', NULL, NULL),
(148, 'Netherlands', '+31', NULL, NULL),
(149, 'Netherlands Antilles', '+599', NULL, NULL),
(150, 'New Caledonia', '+687', NULL, NULL),
(151, 'New Zealand', '+64', NULL, NULL),
(152, 'Nicaragua', '+505', NULL, NULL),
(153, 'Niger', '+227', NULL, NULL),
(154, 'Nigeria', '+234', NULL, NULL),
(155, 'Niue', '+683', NULL, NULL),
(156, 'North Korea', '+850', NULL, NULL),
(157, 'Northern Mariana Islands', '+1-670', NULL, NULL),
(158, 'Norway', '+47', NULL, NULL),
(159, 'Oman', '+968', NULL, NULL),
(160, 'Pakistan', '+92', NULL, NULL),
(161, 'Palau', '+680', NULL, NULL),
(162, 'Palestine', '+970', NULL, NULL),
(163, 'Panama', '+507', NULL, NULL),
(164, 'Papua New Guinea', '+675', NULL, NULL),
(165, 'Paraguay', '+595', NULL, NULL),
(166, 'Peru', '+51', NULL, NULL),
(167, 'Philippines', '+63', NULL, NULL),
(168, 'Pitcairn', '+64', NULL, NULL),
(169, 'Poland', '+48', NULL, NULL),
(170, 'Portugal', '+351', NULL, NULL),
(171, 'Puerto Rico', '+1-787, +1-939', NULL, NULL),
(172, 'Qatar', '+974', NULL, NULL),
(173, 'Republic of the Congo', '+242', NULL, NULL),
(174, 'Reunion', '+262', NULL, NULL),
(175, 'Romania', '+40', NULL, NULL),
(176, 'Russia', '+7', NULL, NULL),
(177, 'Rwanda', '+250', NULL, NULL),
(178, 'Saint Barthelemy', '+590', NULL, NULL),
(179, 'Saint Helena', '+290', NULL, NULL),
(180, 'Saint Kitts and Nevis', '+1-869', NULL, NULL),
(181, 'Saint Lucia', '+1-758', NULL, NULL),
(182, 'Saint Martin', '+590', NULL, NULL),
(183, 'Saint Pierre and Miquelon', '+508', NULL, NULL),
(184, 'Saint Vincent and the Grenadines', '+1-784', NULL, NULL),
(185, 'Samoa', '+685', NULL, NULL),
(186, 'San Marino', '+378', NULL, NULL),
(187, 'Sao Tome and Principe', '+239', NULL, NULL),
(188, 'Saudi Arabia', '+966', NULL, NULL),
(189, 'Senegal', '+221', NULL, NULL),
(190, 'Serbia', '+381', NULL, NULL),
(191, 'Seychelles', '+248', NULL, NULL),
(192, 'Sierra Leone', '+232', NULL, NULL),
(193, 'Singapore', '+65', NULL, NULL),
(194, 'Sint Maarten', '+1-721', NULL, NULL),
(195, 'Slovakia', '+421', NULL, NULL),
(196, 'Slovenia', '+386', NULL, NULL),
(197, 'Solomon Islands', '+677', NULL, NULL),
(198, 'Somalia', '+252', NULL, NULL),
(199, 'South Africa', '+27', NULL, NULL),
(200, 'South Korea', '+82', NULL, NULL),
(201, 'South Sudan', '+211', NULL, NULL),
(202, 'Spain', '+34', NULL, NULL),
(203, 'Sri Lanka', '+94', NULL, NULL),
(204, 'Sudan', '+249', NULL, NULL),
(205, 'Suriname', '+597', NULL, NULL),
(206, 'Svalbard and Jan Mayen', '+47', NULL, NULL),
(207, 'Swaziland', '+268', NULL, NULL),
(208, 'Sweden', '+46', NULL, NULL),
(209, 'Switzerland', '+41', NULL, NULL),
(210, 'Syria', '+963', NULL, NULL),
(211, 'Taiwan', '+886', NULL, NULL),
(212, 'Tajikistan', '+992', NULL, NULL),
(213, 'Tanzania', '+255', NULL, NULL),
(214, 'Thailand', '+66', NULL, NULL),
(215, 'Togo', '+228', NULL, NULL),
(216, 'Tokelau', '+690', NULL, NULL),
(217, 'Tonga', '+676', NULL, NULL),
(218, 'Trinidad and Tobago', '+1-868', NULL, NULL),
(219, 'Tunisia', '+216', NULL, NULL),
(220, 'Turkey', '+90', NULL, NULL),
(221, 'Turkmenistan', '+993', NULL, NULL),
(222, 'Turks and Caicos Islands', '+1-649', NULL, NULL),
(223, 'Tuvalu', '+688', NULL, NULL),
(224, 'U.S. Virgin Islands', '+1-340', NULL, NULL),
(225, 'Uganda', '+256', NULL, NULL),
(226, 'Ukraine', '+380', NULL, NULL),
(227, 'United Arab Emirates', '+971', NULL, NULL),
(228, 'United Kingdom', '+44', NULL, NULL),
(229, 'United States', '+1', NULL, NULL),
(230, 'Uruguay', '+598', NULL, NULL),
(231, 'Uzbekistan', '+998', NULL, NULL),
(232, 'Vanuatu', '+678', NULL, NULL),
(233, 'Vatican', '+379', NULL, NULL),
(234, 'Venezuela', '+58', NULL, NULL),
(235, 'Vietnam', '+84', NULL, NULL),
(236, 'Wallis and Futuna', '+681', NULL, NULL),
(237, 'Western Sahara', '+212', NULL, NULL),
(238, 'Yemen', '+967', NULL, NULL),
(239, 'Zambia', '+260', NULL, NULL),
(240, 'Zimbabwe', '+263', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_logins`
--

INSERT INTO `failed_logins` (`id`, `ip_address`, `email`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'phemanuel@yahoo.com', '2023-12-15 07:40:28', '2023-12-15 07:40:28'),
(2, '127.0.0.1', 'maxwell@gmail.com', '2023-12-15 07:41:08', '2023-12-15 07:41:08'),
(3, '129.205.113.187', 'miracle.kingsbranding@gmail.com', '2023-12-28 14:41:33', '2023-12-28 14:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `apply_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applies`
--

INSERT INTO `job_applies` (`id`, `job_id`, `user_id`, `apply_type`, `created_at`, `updated_at`) VALUES
(1, 6, '1', 'Job-Application', '2023-11-29 05:23:32', '2023-11-29 05:23:32'),
(2, 3, '1', 'Upskill-Application', '2023-11-29 05:23:58', '2023-11-29 05:23:58'),
(3, 9, '1', 'Job-Application', '2023-11-29 06:25:30', '2023-11-29 06:25:30'),
(4, 2, '1', 'Upskill-Application', '2023-11-29 06:26:26', '2023-11-29 06:26:26'),
(5, 2, '1', 'Job-Application', '2023-12-12 02:48:55', '2023-12-12 02:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `location_count` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `job_location`, `location_count`, `created_at`, `updated_at`) VALUES
(1, 'New York', 4, '2023-11-21 00:46:09', '2023-11-21 00:46:09'),
(2, 'Lagos', 2, '2023-11-20 22:55:47', '2023-11-21 07:05:10'),
(3, 'Ibadan', 2, '2023-11-20 22:56:10', '2023-11-20 22:56:10'),
(4, 'Portharcourt', 2, '2023-11-21 07:05:59', '2023-11-21 07:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_12_202202_create_user_skills_table', 1),
(6, '2023_10_16_210239_create_user_roles_table', 1),
(7, '2023_10_17_224227_create_user_experiences_table', 1),
(8, '2023_10_18_143740_user_education', 1),
(9, '2023_10_20_211718_create_user_services_table', 1),
(10, '2023_10_23_093958_create_user_portfolios_table', 1),
(11, '2023_10_23_101035_create_countries', 1),
(12, '2023_10_24_172008_add_login_attempts_to_users_table', 1),
(13, '2023_10_24_190839_create_failed_logins_table', 1),
(14, '2023_11_03_175527_add_user_category_to_users_table', 1),
(15, '2023_11_08_123018_create_user_category', 1),
(16, '2023_11_12_212828_create_post_jobs', 1),
(17, '2023_11_12_213816_create_job_locations_table', 1),
(18, '2023_11_20_161857_create_post_upskills_table', 2),
(19, '2023_11_22_235726_create_job_applies_table', 3),
(20, '2023_12_13_184616_create_user_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_jobs`
--

CREATE TABLE `post_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_status` varchar(255) NOT NULL,
  `job_category` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_payment` varchar(255) NOT NULL,
  `job_payment_method` varchar(255) DEFAULT NULL,
  `job_link` varchar(255) DEFAULT NULL,
  `job_location` varchar(255) NOT NULL,
  `no_of_views` int(11) DEFAULT NULL,
  `job_apply` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_jobs`
--

INSERT INTO `post_jobs` (`id`, `user_id`, `company_name`, `company_logo`, `job_name`, `job_description`, `job_status`, `job_category`, `job_type`, `job_payment`, `job_payment_method`, `job_link`, `job_location`, `no_of_views`, `job_apply`, `created_at`, `updated_at`) VALUES
(1, 3, 'Kings Branding Consult', 'company_logo/Kings Branding Consult_565593e83ee20f.png', 'Social Media Manager', '<p>Generate creative and engaging content for various social media platforms.<br />\r\nCurate relevant industry-related content to share with the community.<br />\r\nCommunity Management:</p>\r\n\r\n<p>Build and nurture a loyal online community by fostering engagement and interaction.<br />\r\nRespond promptly to comments, messages, and inquiries with a professional and personable tone.<br />\r\nSocial Media Advertising:</p>\r\n\r\n<p>Plan and execute social media advertising campaigns to reach target audiences.<br />\r\nMonitor and optimize ad performance to ensure maximum return on investment.<br />\r\nAnalytics and Reporting:</p>\r\n\r\n<p>Utilize analytics tools to track, analyze, and report on social media performance.<br />\r\nProvide regular insights and recommendations based on data analysis.<br />\r\nCollaboration with Cross-Functional Teams:</p>\r\n\r\n<p>Work closely with marketing, content, and design teams to align social media efforts with overall marketing objectives.<br />\r\nCoordinate social media activities with other departments as needed.<br />\r\nBrand Voice and Tone:</p>\r\n\r\n<p>Maintain and enhance the brand&#39;s voice and tone across all social media channels.<br />\r\nEnsure consistency in messaging and visuals.<br />\r\nRequirements:</p>\r\n\r\n<p>Professional Experience:</p>\r\n\r\n<p>Proven experience as a Social Media Manager or a similar role.<br />\r\nDemonstrated success in developing and implementing effective social media strategies.<br />\r\nCreativity:</p>\r\n\r\n<p>Strong creative and conceptual thinking with the ability to generate engaging content.<br />\r\nCommunication Skills:</p>\r\n\r\n<p>Excellent written and verbal communication skills.<br />\r\nAbility to craft compelling and concise copy for social media posts.<br />\r\nAnalytical Skills:</p>\r\n\r\n<p>Proficiency in social media analytics tools and data-driven decision-making.<br />\r\nAbility to interpret data and provide actionable insights.<br />\r\nSocial Media Advertising:</p>\r\n\r\n<p>Experience in planning and managing social media advertising campaigns.<br />\r\nFamiliarity with advertising platforms such as Facebook Ads Manager.<br />\r\nAdaptability:</p>\r\n\r\n<p>Ability to adapt to evolving social media trends and algorithm changes.<br />\r\nWillingness to experiment with new strategies to optimize performance.<br />\r\nCollaboration:</p>\r\n\r\n<p>Strong interpersonal skills and the ability to collaborate effectively with cross-functional teams.<br />\r\nComfortable working in a dynamic and fast-paced environment.<br />\r\nDegree in Marketing or Related Field:</p>\r\n\r\n<p>Bachelor&#39;s degree in Marketing, Communications, or a related field is preferred.</p>', 'Open', 'Sales and Marketing', 'Full Time', '$50-$150', NULL, NULL, 'Lagos', 1, 0, '2023-11-19 06:40:55', '2023-11-24 08:09:50'),
(2, 3, 'Kings Branding Consult', 'company_logo/Kings Branding Consult_565593e729a7e3.png', 'Content Writer', '<p>Generate creative and engaging content for various social media platforms.<br />\r\nCurate relevant industry-related content to share with the community.<br />\r\nCommunity Management:</p>\r\n\r\n<p>Build and nurture a loyal online community by fostering engagement and interaction.<br />\r\nRespond promptly to comments, messages, and inquiries with a professional and personable tone.<br />\r\nSocial Media Advertising:</p>\r\n\r\n<p>Plan and execute social media advertising campaigns to reach target audiences.<br />\r\nMonitor and optimize ad performance to ensure maximum return on investment.<br />\r\nAnalytics and Reporting:</p>\r\n\r\n<p>Utilize analytics tools to track, analyze, and report on social media performance.<br />\r\nProvide regular insights and recommendations based on data analysis.<br />\r\nCollaboration with Cross-Functional Teams:</p>\r\n\r\n<p>Work closely with marketing, content, and design teams to align social media efforts with overall marketing objectives.<br />\r\nCoordinate social media activities with other departments as needed.<br />\r\nBrand Voice and Tone:</p>\r\n\r\n<p>Maintain and enhance the brand&#39;s voice and tone across all social media channels.<br />\r\nEnsure consistency in messaging and visuals.<br />\r\nRequirements:</p>\r\n\r\n<p>Professional Experience:</p>\r\n\r\n<p>Proven experience as a Social Media Manager or a similar role.<br />\r\nDemonstrated success in developing and implementing effective social media strategies.<br />\r\nCreativity:</p>\r\n\r\n<p>Strong creative and conceptual thinking with the ability to generate engaging content.<br />\r\nCommunication Skills:</p>\r\n\r\n<p>Excellent written and verbal communication skills.<br />\r\nAbility to craft compelling and concise copy for social media posts.<br />\r\nAnalytical Skills:</p>\r\n\r\n<p>Proficiency in social media analytics tools and data-driven decision-making.<br />\r\nAbility to interpret data and provide actionable insights.<br />\r\nSocial Media Advertising:</p>\r\n\r\n<p>Experience in planning and managing social media advertising campaigns.<br />\r\nFamiliarity with advertising platforms such as Facebook Ads Manager.<br />\r\nAdaptability:</p>\r\n\r\n<p>Ability to adapt to evolving social media trends and algorithm changes.<br />\r\nWillingness to experiment with new strategies to optimize performance.<br />\r\nCollaboration:</p>\r\n\r\n<p>Strong interpersonal skills and the ability to collaborate effectively with cross-functional teams.<br />\r\nComfortable working in a dynamic and fast-paced environment.<br />\r\nDegree in Marketing or Related Field:</p>\r\n\r\n<p>Bachelor&#39;s degree in Marketing, Communications, or a related field is preferred.</p>', 'Open', 'Sales and Marketing', 'Full Time', '$50-$150', NULL, NULL, 'Ibadan', 13, 1, '2023-11-19 06:41:10', '2023-12-12 03:16:36'),
(3, 3, 'Emmanex IT Consult', 'company_logo/Emmanex IT Consult_565593e45265b5.png', 'Back-End  Web Developer', '<p><strong>Responsibilities:</strong></p>\r\n\r\n<ol>\r\n	<li>Design, develop, and maintain efficient, reusable, and reliable back-end code.</li>\r\n	<li>Collaborate with front-end developers to integrate user-facing elements with server-side logic.</li>\r\n	<li>Implement data security and protection measures to safeguard sensitive information.</li>\r\n	<li>Optimize the application for maximum speed and scalability.</li>\r\n	<li>Participate in the entire software development lifecycle, from concept and design to testing and deployment.</li>\r\n	<li>Conduct thorough testing of applications, identifying and fixing bugs and performance bottlenecks.</li>\r\n	<li>Collaborate with cross-functional teams to define, design, and ship new features.</li>\r\n	<li>Stay updated on emerging technologies and industry trends to ensure the continuous improvement of systems.</li>\r\n	<li>Troubleshoot, debug, and resolve issues in a timely manner.</li>\r\n	<li>Work closely with database administrators and infrastructure engineers to ensure seamless integration with the database and server.</li>\r\n</ol>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li>Proven experience as a back-end developer, with a strong portfolio of relevant projects.</li>\r\n	<li>Proficient in server-side languages such as PHP, Python, Ruby, Java, or .NET.</li>\r\n	<li>Experience with database management systems, including MySQL, PostgreSQL, or MongoDB.</li>\r\n	<li>Familiarity with front-end technologies (HTML, CSS, JavaScript) and their integration with back-end logic.</li>\r\n	<li>Knowledge of web services, RESTful APIs, and microservices architecture.</li>\r\n	<li>Understanding of code versioning tools, such as Git.</li>\r\n	<li>Strong problem-solving and analytical skills.</li>\r\n	<li>Ability to work independently and collaboratively within a team.</li>\r\n	<li>Excellent communication and documentation skills.</li>\r\n	<li>Bachelor&#39;s degree in Computer Science, Engineering, or a related field.</li>\r\n</ol>', 'Open', 'Development and Programming', 'Full Time', '$200-$300', NULL, NULL, 'New York', 0, 0, '2023-11-19 06:41:56', '2023-11-19 06:44:21'),
(5, 3, 'Storm Software', 'company_logo/Storm Software_56559444d5da7b.jpg', 'Web Designer', '<h3>Responsibilities:</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Web Design and Layout:</strong></p>\r\n\r\n	<ul>\r\n		<li>Develop visually appealing and user-friendly website layouts.</li>\r\n		<li>Create and optimize graphics for websites, ensuring a seamless and responsive design.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>UI/UX Design:</strong></p>\r\n\r\n	<ul>\r\n		<li>Design and improve user interfaces, focusing on usability and user experience.</li>\r\n		<li>Conduct user research to understand user needs and preferences.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Responsive Design:</strong></p>\r\n\r\n	<ul>\r\n		<li>Ensure websites are mobile-friendly and responsive across various devices and screen sizes.</li>\r\n		<li>Implement best practices for cross-browser compatibility.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Collaboration:</strong></p>\r\n\r\n	<ul>\r\n		<li>Work closely with web developers and other team members to bring designs to life.</li>\r\n		<li>Collaborate with stakeholders to gather requirements and feedback.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Graphic Design:</strong></p>\r\n\r\n	<ul>\r\n		<li>Design graphics, illustrations, and icons for website elements.</li>\r\n		<li>Create and optimize multimedia content for web applications.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Wireframing and Prototyping:</strong></p>\r\n\r\n	<ul>\r\n		<li>Develop wireframes and prototypes to illustrate design concepts.</li>\r\n		<li>Iterate on designs based on feedback and testing.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Brand Consistency:</strong></p>\r\n\r\n	<ul>\r\n		<li>Maintain consistency in design elements, ensuring alignment with brand guidelines.</li>\r\n		<li>Contribute to the development and enhancement of the overall brand identity.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<h3>Requirements:</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Education:</strong></p>\r\n\r\n	<ul>\r\n		<li>Bachelor&#39;s degree in Graphic Design, Web Design, or a related field.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Experience:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proven experience in web design with a strong portfolio showcasing previous work.</li>\r\n		<li>Familiarity with design tools such as Adobe Creative Suite, Sketch, or Figma.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Technical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proficiency in HTML, CSS, and other relevant front-end technologies.</li>\r\n		<li>Knowledge of responsive design principles and frameworks.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>UI/UX Principles:</strong></p>\r\n\r\n	<ul>\r\n		<li>Understanding of user-centered design principles and usability best practices.</li>\r\n		<li>Ability to translate user requirements into engaging and intuitive designs.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Creativity:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong creative and artistic abilities with an eye for detail.</li>\r\n		<li>Ability to generate innovative design ideas and concepts.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Communication Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Excellent communication skills to effectively present and explain design decisions.</li>\r\n		<li>Ability to work collaboratively in a team environment.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Adaptability:</strong></p>\r\n\r\n	<ul>\r\n		<li>Willingness to stay updated on industry trends and adapt to evolving design standards.</li>\r\n		<li>Ability to handle multiple projects and deadlines simultaneously.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Problem Solving:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong problem-solving skills and the ability to find creative solutions to design challenges.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p>This role requires a candidate who is not only skilled in web design but also passionate about creating engaging and user-centric digital experiences.</p>', 'Closed', 'Design and Creative', 'Full Time', '$50-$100', NULL, NULL, 'Ibadan', 2, 0, '2023-11-19 07:10:05', '2023-11-29 05:22:59'),
(6, 3, 'Kings Branding Consult', 'company_logo/Kings Branding Consult_5655b8d2f512b7.png', 'Digital Marketer', '<ol>\r\n	<li>\r\n	<p><strong>Developing and Executing Digital Marketing Strategies:</strong></p>\r\n\r\n	<ul>\r\n		<li>Create comprehensive digital marketing strategies aligned with business goals.</li>\r\n		<li>Implement and manage digital campaigns across various channels.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Content Creation and Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Develop engaging and creative content for digital platforms.</li>\r\n		<li>Oversee content calendars and ensure timely publication.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Search Engine Optimization (SEO):</strong></p>\r\n\r\n	<ul>\r\n		<li>Optimize website content for search engines to improve organic visibility.</li>\r\n		<li>Conduct keyword research and implement SEO best practices.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Social Media Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Manage and grow social media accounts.</li>\r\n		<li>Plan and execute social media campaigns to increase brand awareness.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Email Marketing:</strong></p>\r\n\r\n	<ul>\r\n		<li>Design and execute effective email marketing campaigns.</li>\r\n		<li>Develop strategies to grow and engage email subscriber lists.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Analytics and Data Analysis:</strong></p>\r\n\r\n	<ul>\r\n		<li>Monitor and analyze key performance indicators (KPIs).</li>\r\n		<li>Provide insights and recommendations based on data analysis.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Paid Advertising:</strong></p>\r\n\r\n	<ul>\r\n		<li>Plan, implement, and optimize paid advertising campaigns.</li>\r\n		<li>Manage budgets effectively for maximum ROI.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Market Research:</strong></p>\r\n\r\n	<ul>\r\n		<li>Stay updated on industry trends and competitors.</li>\r\n		<li>Conduct market research to identify opportunities and challenges.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Collaboration:</strong></p>\r\n\r\n	<ul>\r\n		<li>Coordinate with cross-functional teams, including designers and developers.</li>\r\n		<li>Work closely with sales and product teams to align marketing efforts.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Digital Marketer Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Education and Experience:</strong></p>\r\n\r\n	<ul>\r\n		<li>Bachelor&rsquo;s degree in Marketing, Digital Marketing, or a related field.</li>\r\n		<li>Proven experience in digital marketing roles.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Technical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proficiency in digital marketing tools and platforms.</li>\r\n		<li>Knowledge of SEO, SEM, and social media advertising.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Content Creation:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong writing and editing skills for creating compelling content.</li>\r\n		<li>Experience in multimedia content creation (graphics, videos, etc.).</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Analytical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Ability to interpret data and make data-driven decisions.</li>\r\n		<li>Familiarity with web analytics tools (Google Analytics, etc.).</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Creativity:</strong></p>\r\n\r\n	<ul>\r\n		<li>Innovative thinking to develop unique and engaging campaigns.</li>\r\n		<li>Ability to adapt to changing trends and technologies.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Communication Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Excellent communication skills, both written and verbal.</li>\r\n		<li>Ability to convey ideas effectively to diverse audiences.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Project Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong organizational and project management skills.</li>\r\n		<li>Ability to handle multiple projects simultaneously.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Adaptability:</strong></p>\r\n\r\n	<ul>\r\n		<li>Willingness to learn and adapt to evolving digital marketing trends.</li>\r\n		<li>Ability to thrive in a fast-paced and dynamic environment.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Certifications (Optional):</strong></p>\r\n\r\n	<ul>\r\n		<li>Certifications in digital marketing platforms (Google Ads, Facebook Blueprint, etc.) are a plus.</li>\r\n	</ul>\r\n	</li>\r\n</ol>', 'Open', 'Sales and Marketing', 'Full Time', '$50-$150', NULL, NULL, 'New York', 4, 1, '2023-11-21 00:45:35', '2023-11-29 06:21:15'),
(7, 3, 'Kings Branding Consult', 'company_logo/Kings Branding Consult_5655b8d51ca47f.png', 'Digital Marketer', '<ol>\r\n	<li>\r\n	<p><strong>Developing and Executing Digital Marketing Strategies:</strong></p>\r\n\r\n	<ul>\r\n		<li>Create comprehensive digital marketing strategies aligned with business goals.</li>\r\n		<li>Implement and manage digital campaigns across various channels.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Content Creation and Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Develop engaging and creative content for digital platforms.</li>\r\n		<li>Oversee content calendars and ensure timely publication.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Search Engine Optimization (SEO):</strong></p>\r\n\r\n	<ul>\r\n		<li>Optimize website content for search engines to improve organic visibility.</li>\r\n		<li>Conduct keyword research and implement SEO best practices.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Social Media Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Manage and grow social media accounts.</li>\r\n		<li>Plan and execute social media campaigns to increase brand awareness.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Email Marketing:</strong></p>\r\n\r\n	<ul>\r\n		<li>Design and execute effective email marketing campaigns.</li>\r\n		<li>Develop strategies to grow and engage email subscriber lists.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Analytics and Data Analysis:</strong></p>\r\n\r\n	<ul>\r\n		<li>Monitor and analyze key performance indicators (KPIs).</li>\r\n		<li>Provide insights and recommendations based on data analysis.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Paid Advertising:</strong></p>\r\n\r\n	<ul>\r\n		<li>Plan, implement, and optimize paid advertising campaigns.</li>\r\n		<li>Manage budgets effectively for maximum ROI.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Market Research:</strong></p>\r\n\r\n	<ul>\r\n		<li>Stay updated on industry trends and competitors.</li>\r\n		<li>Conduct market research to identify opportunities and challenges.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Collaboration:</strong></p>\r\n\r\n	<ul>\r\n		<li>Coordinate with cross-functional teams, including designers and developers.</li>\r\n		<li>Work closely with sales and product teams to align marketing efforts.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Digital Marketer Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Education and Experience:</strong></p>\r\n\r\n	<ul>\r\n		<li>Bachelor&rsquo;s degree in Marketing, Digital Marketing, or a related field.</li>\r\n		<li>Proven experience in digital marketing roles.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Technical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proficiency in digital marketing tools and platforms.</li>\r\n		<li>Knowledge of SEO, SEM, and social media advertising.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Content Creation:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong writing and editing skills for creating compelling content.</li>\r\n		<li>Experience in multimedia content creation (graphics, videos, etc.).</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Analytical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Ability to interpret data and make data-driven decisions.</li>\r\n		<li>Familiarity with web analytics tools (Google Analytics, etc.).</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Creativity:</strong></p>\r\n\r\n	<ul>\r\n		<li>Innovative thinking to develop unique and engaging campaigns.</li>\r\n		<li>Ability to adapt to changing trends and technologies.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Communication Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Excellent communication skills, both written and verbal.</li>\r\n		<li>Ability to convey ideas effectively to diverse audiences.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Project Management:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong organizational and project management skills.</li>\r\n		<li>Ability to handle multiple projects simultaneously.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Adaptability:</strong></p>\r\n\r\n	<ul>\r\n		<li>Willingness to learn and adapt to evolving digital marketing trends.</li>\r\n		<li>Ability to thrive in a fast-paced and dynamic environment.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Certifications (Optional):</strong></p>\r\n\r\n	<ul>\r\n		<li>Certifications in digital marketing platforms (Google Ads, Facebook Blueprint, etc.) are a plus.</li>\r\n	</ul>\r\n	</li>\r\n</ol>', 'Open', 'Sales and Marketing', 'Full Time', '$50-$150', NULL, NULL, 'New York', 11, 0, '2023-11-21 00:46:09', '2023-12-12 02:47:36'),
(8, 3, 'Emmanex IT Consult', 'company_logo/Emmanex IT Consult_5655b8e0489ac3.png', 'Front-End Developer', '<ol>\r\n	<li>\r\n	<p><strong>Web Development:</strong></p>\r\n\r\n	<ul>\r\n		<li>Develop visually appealing and user-friendly web interfaces.</li>\r\n		<li>Implement responsive design to ensure compatibility across various devices.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>HTML/CSS/JavaScript:</strong></p>\r\n\r\n	<ul>\r\n		<li>Write clean, efficient, and well-documented HTML, CSS, and JavaScript code.</li>\r\n		<li>Ensure cross-browser compatibility and consistent user experiences.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>User Interface (UI) Design:</strong></p>\r\n\r\n	<ul>\r\n		<li>Collaborate with UX designers to implement intuitive and functional UI designs.</li>\r\n		<li>Optimize application design for maximum speed and scalability.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Frameworks and Libraries:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proficiency in front-end frameworks such as React, Angular, or Vue.js.</li>\r\n		<li>Stay updated on the latest industry trends and emerging technologies.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Version Control/Git:</strong></p>\r\n\r\n	<ul>\r\n		<li>Use version control systems, particularly Git, to track changes and collaborate with other team members.</li>\r\n		<li>Contribute to code reviews and maintain coding standards.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Performance Optimization:</strong></p>\r\n\r\n	<ul>\r\n		<li>Identify and resolve performance issues in web applications.</li>\r\n		<li>Optimize code for maximum speed and scalability.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cross-Functional Collaboration:</strong></p>\r\n\r\n	<ul>\r\n		<li>Work closely with back-end developers and UX/UI designers to ensure seamless integration of front-end and back-end components.</li>\r\n		<li>Collaborate with other team members and stakeholders.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Testing and Debugging:</strong></p>\r\n\r\n	<ul>\r\n		<li>Conduct thorough testing of web applications to identify and fix bugs.</li>\r\n		<li>Debug issues and troubleshoot problems as they arise.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Continuous Learning:</strong></p>\r\n\r\n	<ul>\r\n		<li>Stay informed about the latest advancements in front-end technologies.</li>\r\n		<li>Attend workshops, webinars, and industry conferences to enhance skills.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Front-End Developer Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Education and Experience:</strong></p>\r\n\r\n	<ul>\r\n		<li>Bachelor&rsquo;s degree in Computer Science, Web Development, or a related field.</li>\r\n		<li>Proven experience as a Front-End Developer or similar role.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Technical Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Proficient in HTML, CSS, JavaScript, and front-end frameworks.</li>\r\n		<li>Knowledge of responsive design principles.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Programming Languages:</strong></p>\r\n\r\n	<ul>\r\n		<li>Experience with programming languages commonly used in web development.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Design Tools:</strong></p>\r\n\r\n	<ul>\r\n		<li>Familiarity with design tools like Adobe XD, Sketch, or Figma.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Testing Tools:</strong></p>\r\n\r\n	<ul>\r\n		<li>Experience with front-end testing and debugging tools.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Communication Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Effective communication skills to collaborate with team members and stakeholders.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Problem-Solving Skills:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong problem-solving skills to address technical issues and challenges.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Portfolio (Optional):</strong></p>\r\n\r\n	<ul>\r\n		<li>A portfolio showcasing previous front-end development projects is a plus.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Attention to Detail:</strong></p>\r\n\r\n	<ul>\r\n		<li>Strong attention to detail in ensuring pixel-perfect implementation of designs.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Adaptability:</strong></p>\r\n\r\n	<ul>\r\n		<li>Ability to adapt to evolving technologies and industry best practices.</li>\r\n	</ul>\r\n	</li>\r\n</ol>', 'Open', 'Design and Creative', 'Part Time', '$200-$300', NULL, NULL, 'New York', 2, 0, '2023-11-21 00:49:08', '2023-12-12 03:17:39'),
(9, 3, 'Cisco', 'company_logo/Cisco_5655be6268f96c.jpeg', 'Block-Chain Developer', '<p><strong>Responsibilities:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Blockchain Development:</strong> Design, implement, and maintain blockchain solutions.</li>\r\n	<li><strong>Smart Contracts:</strong> Develop and deploy smart contracts on blockchain platforms.</li>\r\n	<li><strong>Security:</strong> Ensure the security and integrity of blockchain-based systems and transactions.</li>\r\n	<li><strong>Technology Evaluation:</strong> Stay updated on the latest blockchain technologies and evaluate their potential applications.</li>\r\n	<li><strong>Collaboration:</strong> Work closely with cross-functional teams to integrate blockchain solutions into existing systems.</li>\r\n	<li><strong>Problem Solving:</strong> Troubleshoot and resolve issues related to blockchain implementation and performance.</li>\r\n	<li><strong>Optimization:</strong> Continuously optimize blockchain protocols and applications for improved efficiency.</li>\r\n	<li><strong>Documentation:</strong> Create comprehensive documentation for blockchain architectures, processes, and code.</li>\r\n	<li><strong>Testing:</strong> Conduct thorough testing of blockchain applications to ensure reliability and scalability.</li>\r\n	<li><strong>Compliance:</strong> Ensure compliance with legal and regulatory requirements for blockchain applications.</li>\r\n</ol>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Educational Background:</strong> Bachelor&#39;s or higher degree in Computer Science, Information Technology, or a related field.</li>\r\n	<li><strong>Experience:</strong> Proven experience in blockchain development, with a focus on creating decentralized applications and smart contracts.</li>\r\n	<li><strong>Programming Skills:</strong> Proficient in languages such as Solidity, C++, or JavaScript for blockchain development.</li>\r\n	<li><strong>Blockchain Platforms:</strong> Hands-on experience with major blockchain platforms such as Ethereum, Hyperledger, or Binance Smart Chain.</li>\r\n	<li><strong>Smart Contract Development:</strong> Expertise in creating and deploying smart contracts on blockchain networks.</li>\r\n	<li><strong>Security Awareness:</strong> Strong understanding of blockchain security principles and best practices.</li>\r\n	<li><strong>Collaboration Skills:</strong> Ability to work effectively in a collaborative, team-oriented environment.</li>\r\n	<li><strong>Problem-Solving:</strong> Excellent problem-solving skills with the ability to address complex issues in blockchain development.</li>\r\n	<li><strong>Adaptability:</strong> Willingness to adapt to emerging technologies and industry trends.</li>\r\n	<li><strong>Communication:</strong> Effective communication skills to convey complex technical concepts to both technical and non-technical stakeholders.</li>\r\n</ol>', 'Open', 'Development and Programming', 'Full Time', '$200-$300', NULL, NULL, 'Lagos', 1, 1, '2023-11-21 07:05:10', '2023-11-29 06:25:30'),
(10, 3, 'Cisco', 'company_logo/Cisco_5655be68103d85.jpeg', 'Block-Chain Developer', '<p><strong>Responsibilities:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Blockchain Development:</strong> Design, implement, and maintain blockchain solutions.</li>\r\n	<li><strong>Smart Contracts:</strong> Develop and deploy smart contracts on blockchain platforms.</li>\r\n	<li><strong>Security:</strong> Ensure the security and integrity of blockchain-based systems and transactions.</li>\r\n	<li><strong>Technology Evaluation:</strong> Stay updated on the latest blockchain technologies and evaluate their potential applications.</li>\r\n	<li><strong>Collaboration:</strong> Work closely with cross-functional teams to integrate blockchain solutions into existing systems.</li>\r\n	<li><strong>Problem Solving:</strong> Troubleshoot and resolve issues related to blockchain implementation and performance.</li>\r\n	<li><strong>Optimization:</strong> Continuously optimize blockchain protocols and applications for improved efficiency.</li>\r\n	<li><strong>Documentation:</strong> Create comprehensive documentation for blockchain architectures, processes, and code.</li>\r\n	<li><strong>Testing:</strong> Conduct thorough testing of blockchain applications to ensure reliability and scalability.</li>\r\n	<li><strong>Compliance:</strong> Ensure compliance with legal and regulatory requirements for blockchain applications.</li>\r\n</ol>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Educational Background:</strong> Bachelor&#39;s or higher degree in Computer Science, Information Technology, or a related field.</li>\r\n	<li><strong>Experience:</strong> Proven experience in blockchain development, with a focus on creating decentralized applications and smart contracts.</li>\r\n	<li><strong>Programming Skills:</strong> Proficient in languages such as Solidity, C++, or JavaScript for blockchain development.</li>\r\n	<li><strong>Blockchain Platforms:</strong> Hands-on experience with major blockchain platforms such as Ethereum, Hyperledger, or Binance Smart Chain.</li>\r\n	<li><strong>Smart Contract Development:</strong> Expertise in creating and deploying smart contracts on blockchain networks.</li>\r\n	<li><strong>Security Awareness:</strong> Strong understanding of blockchain security principles and best practices.</li>\r\n	<li><strong>Collaboration Skills:</strong> Ability to work effectively in a collaborative, team-oriented environment.</li>\r\n	<li><strong>Problem-Solving:</strong> Excellent problem-solving skills with the ability to address complex issues in blockchain development.</li>\r\n	<li><strong>Adaptability:</strong> Willingness to adapt to emerging technologies and industry trends.</li>\r\n	<li><strong>Communication:</strong> Effective communication skills to convey complex technical concepts to both technical and non-technical stakeholders.</li>\r\n</ol>', 'Open', 'Development and Programming', 'Full Time', '$200-$300', NULL, NULL, 'Portharcourt', 14, 0, '2023-11-21 07:05:59', '2023-12-12 02:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `post_upskills`
--

CREATE TABLE `post_upskills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `upskill_name` varchar(255) NOT NULL,
  `upskill_description` text NOT NULL,
  `upskill_status` varchar(255) NOT NULL,
  `upskill_category` varchar(255) NOT NULL,
  `upskill_link` varchar(255) DEFAULT NULL,
  `no_of_views` int(11) DEFAULT NULL,
  `upskill_apply` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_upskills`
--

INSERT INTO `post_upskills` (`id`, `user_id`, `company_name`, `company_logo`, `upskill_name`, `upskill_description`, `upskill_status`, `upskill_category`, `upskill_link`, `no_of_views`, `upskill_apply`, `created_at`, `updated_at`) VALUES
(2, 3, 'Cisco', 'company_logo/Cisco Inc_5655bcb9304eed.jpeg', 'Data Analytics', '<p><strong>Cisco is offering FREE trainings and certifications for people looking to learn:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>-Data Analytics.</strong></p>\r\n\r\n<p><strong>-Data Science.</strong></p>\r\n\r\n<p><strong>-Cybersecurity.</strong></p>\r\n\r\n<p><strong>-JavaScript.</strong></p>\r\n\r\n<p><strong>-Python</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>These are self-paced courses, so you can practice as you learn. Open these links to get started on your learning.</strong></p>', 'Open', 'Development and Programming', 'https://skillsforall.com/course/data-analytics-essentials?courseLang=en-US', 4, 1, '2023-11-21 05:11:47', '2023-12-12 03:19:25'),
(3, 3, 'Cisco', 'company_logo/Cisco_5655bcbbde5acd.jpeg', 'Data Science', '<p><strong>Cisco is offering FREE trainings and certifications for people looking to learn:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>-Data Analytics.</strong></p>\r\n\r\n<p><strong>-Data Science.</strong></p>\r\n\r\n<p><strong>-Cybersecurity.</strong></p>\r\n\r\n<p><strong>-JavaScript.</strong></p>\r\n\r\n<p><strong>-Python</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>These are self-paced courses, so you can practice as you learn. Open these links to get started on your learning.</strong></p>', 'Open', 'Development and Programming', 'https://skillsforall.com/course/introduction-data-science?courseLang=en-US', 8, 1, '2023-11-21 05:12:29', '2023-12-12 02:45:43'),
(4, 3, 'Cisco', 'company_logo/Cisco_5655bcbfd65dfa.jpeg', 'JavaScript', '<p><strong>Cisco is offering FREE trainings and certifications for people looking to learn:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>-Data Analytics.</strong></p>\r\n\r\n<p><strong>-Data Science.</strong></p>\r\n\r\n<p><strong>-Cybersecurity.</strong></p>\r\n\r\n<p><strong>-JavaScript.</strong></p>\r\n\r\n<p><strong>-Python</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>These are self-paced courses, so you can practice as you learn. Open these links to get started on your learning.</strong></p>', 'Open', 'Development and Programming', 'https://skillsforall.com/course/javascript-essentials-1?courseLang=en-US', 2, 0, '2023-11-21 05:13:33', '2023-12-28 14:26:06'),
(5, 3, 'Cisco', 'company_logo/Cisco_5655bcc5dea062.jpeg', 'Python Essentials', '<p><strong>Cisco is offering FREE trainings and certifications for people looking to learn:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>-Data Analytics.</strong></p>\r\n\r\n<p><strong>-Data Science.</strong></p>\r\n\r\n<p><strong>-Cybersecurity.</strong></p>\r\n\r\n<p><strong>-JavaScript.</strong></p>\r\n\r\n<p><strong>-Python</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>These are self-paced courses, so you can practice as you learn. Open these links to get started on your learning.</strong></p>', 'Open', 'Development and Programming', 'https://skillsforall.com/course/python-essentials-1?courseLang=en-US', 0, 0, '2023-11-21 05:15:09', '2023-11-24 08:09:41'),
(6, 3, 'Cisco', 'company_logo/Cisco_5655bcde6e88dd.jpeg', 'Cybersecurity', '<p><strong>&nbsp;Cisco is offering FREE trainings and certifications for people looking to learn:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>-Data Analytics.</strong></p>\r\n\r\n<p><strong>-Data Science.</strong></p>\r\n\r\n<p><strong>-Cybersecurity.</strong></p>\r\n\r\n<p><strong>-JavaScript.</strong></p>\r\n\r\n<p><strong>-Python</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>These are self-paced courses, so you can practice as you learn. Open these links to get started on your learning.</strong></p>', 'Open', 'Development and Programming', 'https://skillsforall.com/course/introduction-to-cybersecurity?courseLang=en-US', 0, 0, '2023-11-21 05:21:42', '2023-11-29 05:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_category` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_roles`)),
  `user_roles_major` varchar(255) DEFAULT NULL,
  `user_about` text DEFAULT NULL,
  `user_facebook` varchar(255) DEFAULT NULL,
  `user_twitter` varchar(255) DEFAULT NULL,
  `user_linkedin` varchar(255) DEFAULT NULL,
  `user_instagram` varchar(255) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_picture` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `user_url` varchar(255) DEFAULT NULL,
  `email_verified_status` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_name_link` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_attempts` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_category`, `full_name`, `email`, `email_verified_at`, `password`, `user_roles`, `user_roles_major`, `user_about`, `user_facebook`, `user_twitter`, `user_linkedin`, `user_instagram`, `country_code`, `user_phone`, `user_picture`, `profile_picture`, `user_url`, `email_verified_status`, `user_name`, `user_name_link`, `remember_token`, `created_at`, `updated_at`, `login_attempts`, `user_type`) VALUES
(1, '', 'AKINYOOYE AKINFEMI', 'emmakinyooye@gmail.com', '2023-10-23 02:28:56', '$2y$10$xqR6d8Opxa.8tGv9nMIdCe9q2cU8dshxBe8uxHWO86BsY2yUriY.C', '\"Community Manager,Life Coach,Product Designer,Web Developer,Backend Developer,Frontend Developer\"', 'Software Developer', '<p>Meet Femi Akinyooye, a logical full stack web developer, business consultant and tech clarity coach.</p>\r\n\r\n<p>He&#39;s the COO and co-founder of <a href=\"https://web.facebook.com/kingsbconsult?__cft__[0]=AZVML-wkEI7239xVir56fnMp1tYFRrx0J7wODGSe3W1363DKvrWCKX8HIZ5g-pl-qsGNmIGP2D8IM6xOR4IcpANGo8vQm-tcQWrS8Sbb-ucvF4algFnbWupKEyjlUjRJebfYx3O-73qVvYbsNVL-ZA0qTXofyf_2QJEAHA9ufRJndA&amp;__tn__=-]K-R\">Kings Branding Consult</a> Ltd, a startup that offers professional branding services to businesses, specializing in Marketing, Branding, and Digital literacy. Femi is also the CEO of <a href=\"https://web.facebook.com/profile.php?id=100083036147077&amp;__cft__[0]=AZVML-wkEI7239xVir56fnMp1tYFRrx0J7wODGSe3W1363DKvrWCKX8HIZ5g-pl-qsGNmIGP2D8IM6xOR4IcpANGo8vQm-tcQWrS8Sbb-ucvF4algFnbWupKEyjlUjRJebfYx3O-73qVvYbsNVL-ZA0qTXofyf_2QJEAHA9ufRJndA&amp;__tn__=-]K-R\">Emmanex I.T Consult</a>.</p>', 'https://www.facebook.com/akinyooye.emmanuel', NULL, 'https://linkedin.com/in/femi-akinyooye', 'https://instgram.com/techwithfemi', '+234', '7032689329', 'profile_pictures/femi-akinyooye_user_picture.jpg', 'profile_pictures/femi-akinyooye_profile_picture.jpg', 'https://talentloom.kingsconsult.com.ng/femi-akinyooye', 1, 'Femi Akinyooye', 'femi-akinyooye', 'uOSCY7jIL53WptHrKmz83saSGVw2lajLemFSW0crNGE4axG1QwiHqQsw9REo', '2023-10-23 02:15:40', '2023-12-01 04:59:11', 0, 'Freelancer'),
(2, NULL, 'Miracle Peters', 'miracle.kingsbranding@gmail.com', '2023-10-23 12:04:17', '$2y$10$uA65K1Wtf/PFFnrZztbIQOhFEPgHrJ.YB5YcCMfDQkv07b0QXD74W', '\"Researcher,Content Creator,Social Media Manager,Content Marketer,Virtual Assistant\"', 'Digital Marketer', NULL, NULL, NULL, 'www.linkedin.com/in/creativemiracle', 'https://instagram.com/the_socialmedia_goddess', '+234', '08104196102', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/mediagoddess-2_profile_picture.jpg', 'https://talentloom.kingsconsult.com.ng/mediagoddess-2', 1, 'mediagoddess', 'mediagoddess-2', 'cb994VEumLcLuc0bfUdvTGMmKKXWzGIV8nEx7H3aZS3Fv4glnjx7eFfDsMbo', '2023-10-23 12:02:53', '2023-12-28 14:41:41', 0, 'Freelancer'),
(3, 'n/a', 'Emmanex IT Consult', 'emmanexitconsult@gmail.com', NULL, '$2y$10$oUzTT98hqHulDpByXP9lau2KD2j3imJLDNaHVN8NV/7AF.ZE1Sqjm', '\"Design and Creative,Customer Service,Development and Programming\"', '', '<p>Emmanex IT Consult, your trusted partner in comprehensive technology solutions. At Emmanex, we seamlessly blend expertise and innovation to offer a spectrum of services, making us a one-stop destination for all your technology needs.</p>\r\n\r\n<p><strong>Web Development, Hardware Sales and Installation,&nbsp;IT Consultancy,&nbsp;Computer Engineering.</strong></p>\r\n\r\n<p>At Emmanex IT Consult, we take pride in our commitment to excellence, customer satisfaction, and staying at the forefront of technological advancements. Join hands with us, and let&#39;s embark on a journey of technological empowerment, where your success is our priority.</p>', 'https://facebook.com/emmanex-it-consult', 'https://twitter.com/emmanex-it-consult', 'https://linkedin.com/emmanex-it-consult', 'https://instgram.com/emmanex-it-consult', '+234', '8034271855', 'profile_pictures/blank.jpg', NULL, 'https://talentloom.kingsconsult.com.ng/emmanex-it-consult', 1, 'Emmanex IT Consult', 'emmanex-it-consult', 'CYEqKpVLYHxEurTiTXRq2g1ijiHMdvT21dICpf9b2zXlQXYEK6nulQ7Ydwlk', '2023-11-19 06:26:56', '2023-11-19 06:39:44', 0, 'Organization'),
(4, NULL, 'AKINYOOYE MAXWELL', 'maxwell@gmail.com', NULL, '$2y$10$o/y6hrPvdqhLKYSH1m9XT.bmjltauTEpTekvVAhvzkYSDw16q.oAy', '\"Photographer,Public Speaker\"', 'Web Developer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile_pictures/maxwell-akinyooye_user_picture.jpg', 'profile_pictures/maxwell-akinyooye_profile_picture.jpg', 'https://talentloom.kingsconsult.com.ng/maxwell-akinyooye', 1, 'Maxwell Akinyooye', 'maxwell-akinyooye', 'HEs6KV9Wt4SU1nNgbTDIYowDXx6nMgZE6xEGxfVj1QtMCNNTs8M2LJHA1nxk', '2023-12-01 04:38:31', '2023-12-15 07:41:17', 0, 'Freelancer'),
(8, 'Finance', 'AKINYOOYE TEMILOLUWA', 'phemanuel@yahoo.com', '2023-12-12 05:16:56', '$2y$10$fRjpSsK1aFjnRa.ld/j3t.4PsBgrPuQGUYcziY.nrUvrhtaUPkthq', NULL, 'Life Coach', NULL, NULL, NULL, NULL, NULL, '+234', '8053607789', 'profile_pictures/akinyooye-temiloluwa_user_picture.jpg', 'profile_pictures/akinyooye-temiloluwa_profile_picture.jpg', 'https://talentloom.kingsconsult.com.ng/akinyooye-temiloluwa', 1, 'AKINYOOYE TEMILOLUWA', 'akinyooye-temiloluwa', '3VbfZ5i4NggkOLdE9c2oV0IgluME2XWKQO1LziqPehK8tQCktOLl7Oh27KsK', '2023-12-12 05:14:15', '2023-12-16 02:32:30', 0, 'Freelancer');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Sales and Marketing', NULL, NULL),
(2, 'Design and Creative', NULL, NULL),
(3, 'Customer Service', NULL, NULL),
(4, 'Nonprofit and Volunteer', NULL, NULL),
(5, 'Finance', NULL, NULL),
(6, 'Development and Programming', NULL, NULL),
(7, 'Human Resources', NULL, NULL),
(8, 'Transportation and Logistics', NULL, NULL),
(9, 'Education', NULL, NULL),
(10, 'Healthcare', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `college_year` varchar(255) NOT NULL,
  `college_qualification` varchar(255) NOT NULL,
  `college_certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `college_name`, `college_year`, `college_qualification`, `college_certificate`, `created_at`, `updated_at`) VALUES
(1, 1, 'THE POLYTECHNIC IBADAN', '2008', 'BSC COMPUTER SCIENCE', 'certificates/Femi Akinyooye_2008_BSCC_THEP.pdf', '2023-10-23 02:55:30', '2023-10-23 02:55:30'),
(2, 1, 'UDACITY', '2021', 'FULL STACK WEB DEVELOPER', 'certificates/Femi Akinyooye_2021_FULL_UDACI.pdf', '2023-10-23 02:55:46', '2023-10-23 02:55:46'),
(3, 1, 'STORM SOFTWARE', '2010', 'DIPLOMA IN WEB DESIGN', 'certificates/Femi Akinyooye_2010_DIPLO_STORM.pdf', '2023-10-23 02:59:50', '2023-10-23 02:59:50'),
(4, 2, 'Ball State University, USA', '2027', 'B.A Business Administration', NULL, '2023-10-23 13:47:20', '2023-10-23 13:47:20'),
(5, 2, 'Digital Marketing &E-commerce', '2022', 'Google', 'certificates/mediagoddess_2022_Googl_Digit.pdf', '2023-10-23 13:48:23', '2023-10-23 13:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_company` varchar(255) NOT NULL,
  `company_year` varchar(255) NOT NULL,
  `user_company_role` varchar(255) NOT NULL,
  `user_about_role` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_experiences`
--

INSERT INTO `user_experiences` (`id`, `user_id`, `user_company`, `company_year`, `user_company_role`, `user_about_role`, `created_at`, `updated_at`) VALUES
(1, 1, 'Storm Software IT Services', '2011', 'Software Developer', '<p>I develop, analyze and test web and stand-alone applucations.</p>', '2023-10-23 03:01:37', '2023-10-23 03:01:37'),
(2, 1, 'Oyo State College of Health Science and Technology', '2021', 'Backend Web Developer', '<p>I develop, test and deploy web and stand-alone applications.</p>', '2023-10-23 03:02:11', '2023-10-23 03:02:11'),
(3, 2, 'Kings Branding Consult', '2020', 'CEO', '<ul>\r\n	<li>Managed and cordinated all business activities.</li>\r\n	<li>Worked with the COO to effectively run business operations</li>\r\n</ul>', '2023-10-23 13:50:36', '2023-10-23 13:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_email` varchar(255) NOT NULL,
  `to_user_email` varchar(255) NOT NULL,
  `from_user_fullname` varchar(255) NOT NULL,
  `to_user_fullname` varchar(255) NOT NULL,
  `from_user_type` varchar(255) NOT NULL,
  `to_user_type` varchar(255) NOT NULL,
  `from_user_picture` varchar(255) NOT NULL,
  `to_user_picture` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `message_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `from_user_id`, `to_user_id`, `from_user_email`, `to_user_email`, `from_user_fullname`, `to_user_fullname`, `from_user_type`, `to_user_type`, `from_user_picture`, `to_user_picture`, `message`, `message_type`, `message_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'emmakinyooye@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE AKINFEMI', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/femi-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Good morning Miracle,</p>\r\n\r\n<p>I m Femi Akinyooye, a web developer, I would love to work with you, you can find my portfolio with the link below.</p>\r\n\r\n<p>https://meet-me.kingsconsult.com.ng/FemiAkinyooye</p>', 'Direct Message', 'Read', '2023-12-15 06:29:47', '2023-12-16 02:15:07'),
(2, 1, 2, 'emmakinyooye@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE AKINFEMI', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/femi-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Good evening Miracle,</p>\r\n\r\n<p>I have not heard from you.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-15 06:30:36', '2023-12-16 02:15:07'),
(3, 4, 2, 'maxwell@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE MAXWELL', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Good morning Miracle,</p>\r\n\r\n<p>I m Maxwell Akinyooye, a web developer, I would love to work with you, you can find my portfolio with the link below.</p>\r\n\r\n<p>https://meet-me.kingsconsult.com.ng/MaxwellAkinyooye</p>', 'Direct Message', 'Read', '2023-12-15 07:41:52', '2023-12-16 02:12:06'),
(4, 2, 4, 'miracle.kingsbranding@gmail.com', 'maxwell@gmail.com', 'Miracle Peters', 'AKINYOOYE MAXWELL', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', '<p>Hi Maxwell,&nbsp;</p>\r\n\r\n<p>I&nbsp; have checked your profile, and it looks promising, let&#39;s connect asap, i would love to work on some lovely projects with you.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-15 08:12:54', '2023-12-16 03:13:52'),
(5, 2, 4, 'miracle.kingsbranding@gmail.com', 'maxwell@gmail.com', 'Miracle Peters', 'AKINYOOYE MAXWELL', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', '<p>Hi Maxwell,&nbsp;</p>\r\n\r\n<p>i Have not heard from you, i will be starting the project next week, and i need to know your stand. Please get back to me asap.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-15 08:28:45', '2023-12-16 03:13:52'),
(6, 2, 1, 'miracle.kingsbranding@gmail.com', 'emmakinyooye@gmail.com', 'Miracle Peters', 'AKINYOOYE AKINFEMI', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/femi-akinyooye_user_picture.jpg', '<p>Hi Femi,</p>\r\n\r\n<p>I have checked you out, and you have a very nice portfolio, i will contact you as soon as i have a project we can work on together.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-16 01:57:01', '2023-12-16 03:13:21'),
(7, 8, 2, 'phemanuel@yahoo.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE TEMILOLUWA', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/akinyooye-temiloluwa_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Good morning Miracle,</p>\r\n\r\n<p>I would want to connect with you.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-16 02:34:39', '2023-12-16 02:47:10'),
(8, 2, 8, 'miracle.kingsbranding@gmail.com', 'phemanuel@yahoo.com', 'Miracle Peters', 'AKINYOOYE TEMILOLUWA', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/akinyooye-temiloluwa_user_picture.jpg', '<p>Good day Temi,</p>\r\n\r\n<p>I would love to connect with you too.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-16 02:47:45', '2023-12-16 02:48:20'),
(11, 4, 2, 'maxwell@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE MAXWELL', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Hi Miracle,</p>\r\n\r\n<p>I am so sorry not to have responded earlier, something urgent came up, but i am done with it now, i am much avavilable for the project.</p>\r\n\r\n<p>You can share the project scope, so i know here i come in.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-16 03:28:55', '2023-12-16 03:31:36'),
(12, 4, 2, 'maxwell@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE MAXWELL', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Hi Miracle,&nbsp;</p>\r\n\r\n<p>I am still expecting your response.</p>\r\n\r\n<p>Thank you.</p>', 'Direct Message', 'Read', '2023-12-16 03:29:39', '2023-12-16 03:31:36'),
(13, 2, 4, 'miracle.kingsbranding@gmail.com', 'maxwell@gmail.com', 'Miracle Peters', 'AKINYOOYE MAXWELL', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', '<p>Hi Femi,&nbsp;</p>\r\n\r\n<p>i have sent the project scope to your email, kindly go through thoroughly and get back asap.</p>\r\n\r\n<p>Regards.</p>', 'Direct Message', 'Read', '2023-12-16 03:34:17', '2023-12-16 03:42:18'),
(14, 4, 2, 'maxwell@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE MAXWELL', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/maxwell-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Hi Miracle,</p>\r\n\r\n<p>I have gone through the project scope and it is very lovely, can we have a meeting on zoom to further agree on the mode of execution.</p>', 'Direct Message', 'Read', '2023-12-16 03:46:39', '2023-12-16 03:47:31'),
(15, 2, 1, 'miracle.kingsbranding@gmail.com', 'emmakinyooye@gmail.com', 'Miracle Peters', 'AKINYOOYE AKINFEMI', 'Freelancer', 'Freelancer', 'profile_pictures/mediagoddess-2_user_picture.jpg', 'profile_pictures/femi-akinyooye_user_picture.jpg', '<p>Hello there,</p>\r\n\r\n<p>Have you eaten today?</p>', 'Direct Message', 'Read', '2024-01-29 08:27:19', '2024-01-29 08:27:34'),
(16, 1, 2, 'emmakinyooye@gmail.com', 'miracle.kingsbranding@gmail.com', 'AKINYOOYE AKINFEMI', 'Miracle Peters', 'Freelancer', 'Freelancer', 'profile_pictures/femi-akinyooye_user_picture.jpg', 'profile_pictures/mediagoddess-2_user_picture.jpg', '<p>Ogbanje woman.</p>', 'Direct Message', 'Unread', '2024-01-29 08:28:04', '2024-01-29 08:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolios`
--

CREATE TABLE `user_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_portfolios`
--

INSERT INTO `user_portfolios` (`id`, `user_id`, `file_name`, `file_type`, `file_url`, `file_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'KBC WEBSITE DEVELOPMENT', 'Image', 'portfolio/image/Femi Akinyooye_65367af1462ac_65367.jpg', 'KBC WEBSITE DEVELOPMENT', '2023-10-23 20:25:18', '2023-10-23 21:32:48'),
(2, 1, 'NYFEW WEBSITE', 'Image', 'portfolio/image/Femi Akinyooye_6536748381f5b_65367.jpg', 'NYFEW WEBSITE', '2023-10-23 20:26:27', '2023-10-23 21:33:54'),
(3, 1, 'KBC LMS', 'Image', 'portfolio/image/Femi Akinyooye_653674b63e3f0_65367.jpg', 'KBC LMS', '2023-10-23 20:27:18', '2023-10-23 20:27:18'),
(4, 1, 'KBC CONTENT CALENDAR', 'Document', 'portfolio/document/Femi Akinyooye_653674d8f29c9_65367.pdf', 'KBC CONTENT CALENDAR', '2023-10-23 20:27:53', '2023-10-23 21:32:12'),
(5, 1, 'NYFEW BRAND STRATEGY', 'Document', 'portfolio/document/Femi Akinyooye_6536830676680_65368.pdf', 'NYFEW BRAND STRATEGY', '2023-10-23 21:28:22', '2023-10-23 21:28:22'),
(6, 2, 'KBC Digital Skills Workshop', 'Image', 'portfolio/image/mediagoddess_65368966104d4_65368.png', 'I oversaw the creative plots for this project', '2023-10-23 13:55:34', '2023-10-23 13:55:34'),
(7, 1, 'TalentLoom', 'Image', 'portfolio/image/Femi Akinyooye_658d7a98663a5_658d7.jpg', 'Connecting Freelancers and Employers.', '2023-12-28 13:39:36', '2023-12-28 13:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_roles` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_roles`, `created_at`, `updated_at`) VALUES
(1, 'Blogger', NULL, NULL),
(2, 'Influencer', NULL, NULL),
(3, 'Model', NULL, NULL),
(4, 'Researcher', NULL, NULL),
(5, 'Photographer', NULL, NULL),
(6, 'Content Creator', NULL, NULL),
(7, 'Social Media Manager', NULL, NULL),
(8, 'Videographer', NULL, NULL),
(9, 'Illustrator', NULL, NULL),
(10, 'Graphic Designer', NULL, NULL),
(11, 'Story Telling', NULL, NULL),
(12, 'Public Speaker', NULL, NULL),
(13, 'Content Marketer', NULL, NULL),
(14, 'Influencer Marketer', NULL, NULL),
(15, 'Music Creator', NULL, NULL),
(16, 'Business Owner', NULL, NULL),
(17, 'Entrepreneur', NULL, NULL),
(18, 'Community Manager', NULL, NULL),
(19, 'Virtual Assistant', NULL, NULL),
(20, 'Life Coach', NULL, NULL),
(21, 'Brand Strategist', NULL, NULL),
(22, 'Artist', NULL, NULL),
(23, 'Youtuber', NULL, NULL),
(24, 'Fashion Designer', NULL, NULL),
(25, 'Data Analyst', NULL, NULL),
(26, 'Data Scientist', NULL, NULL),
(27, 'Product Manager', NULL, NULL),
(28, 'Product Designer', NULL, NULL),
(29, 'Digital Marketer', NULL, NULL),
(30, 'Web Developer', NULL, NULL),
(31, 'Software Developer', NULL, NULL),
(32, 'Backend Developer', NULL, NULL),
(33, 'Frontend Developer', NULL, NULL),
(34, 'Lead Generator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_service` varchar(255) NOT NULL,
  `user_service_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `user_service`, `user_service_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', '<p>I develop user-friendly inteface for your business and organization.</p>\r\n\r\n<p>I bring your ideas to reality.</p>', '2023-10-23 03:38:36', '2023-10-25 00:11:30'),
(2, 1, 'Restful API', '<p>We develop secured API for interaction with frontend applications.</p>', '2023-10-23 03:39:33', '2023-10-23 18:37:35'),
(3, 1, 'Clarity Coach', '<p>I help freelancer get clarity on how to make good use of thier skills.</p>', '2023-10-23 16:13:35', '2023-10-23 16:13:35'),
(4, 1, 'Business Consultant', '<p>I help prospective and existing business owners leverage on tech to grow their business.</p>', '2023-10-23 16:20:29', '2023-10-23 16:20:29'),
(5, 2, 'Social Media Management', '<p>As your social media manager, I will bring your <strong>socials to life</strong> with my unique expertise.</p>', '2023-10-23 13:44:13', '2023-10-23 13:44:13'),
(6, 2, 'Content Writing', '<p>Want well structured written contents? I&#39;m the Ninja to make that happen!</p>', '2023-10-23 13:45:07', '2023-10-23 13:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_skill` varchar(255) NOT NULL,
  `user_skill_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `user_skill`, `user_skill_level`, `created_at`, `updated_at`) VALUES
(1, 1, 'Html Markup', '75', '2023-10-23 02:54:17', '2023-10-23 15:30:21'),
(2, 1, 'Javscript', '60', '2023-10-23 02:54:26', '2023-10-23 02:54:26'),
(3, 1, 'PHP', '80', '2023-10-23 02:54:33', '2023-10-23 02:54:33'),
(4, 1, 'Laravel', '60', '2023-10-23 02:54:44', '2023-10-23 02:54:44'),
(5, 1, 'ClickUp', '60', '2023-10-23 02:54:53', '2023-10-23 02:54:53'),
(6, 1, 'Team Work', '85', '2023-10-23 21:52:17', '2023-10-23 21:52:17'),
(7, 2, 'Content Writing', '99', '2023-10-23 13:40:52', '2023-10-23 13:40:52'),
(8, 2, 'Canva', '85', '2023-10-23 13:41:02', '2023-10-23 13:41:02'),
(9, 2, 'Social Media Management', '97', '2023-10-23 13:41:16', '2023-10-23 13:41:16'),
(10, 2, 'Analytics', '80', '2023-10-23 13:41:27', '2023-10-23 13:41:27'),
(11, 2, 'Web Development', '95', '2023-10-23 13:41:40', '2023-10-23 13:41:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post_jobs`
--
ALTER TABLE `post_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_upskills`
--
ALTER TABLE `post_upskills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_facebook_unique` (`user_facebook`),
  ADD UNIQUE KEY `users_user_twitter_unique` (`user_twitter`),
  ADD UNIQUE KEY `users_user_linkedin_unique` (`user_linkedin`),
  ADD UNIQUE KEY `users_user_instagram_unique` (`user_instagram`),
  ADD UNIQUE KEY `users_user_phone_unique` (`user_phone`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_user_name_link_unique` (`user_name_link`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_portfolios`
--
ALTER TABLE `user_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_jobs`
--
ALTER TABLE `post_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_upskills`
--
ALTER TABLE `post_upskills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_portfolios`
--
ALTER TABLE `user_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
