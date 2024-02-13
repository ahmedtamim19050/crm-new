-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2024 at 05:08 PM
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
-- Database: `sohoj_crm_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causeable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causeable_id` bigint UNSIGNED DEFAULT NULL,
  `timelineable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timelineable_id` bigint UNSIGNED DEFAULT NULL,
  `recordable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recordable_id` bigint UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `modified` json DEFAULT NULL,
  `ip_address` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `reminder_email` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_sms` tinyint(1) NOT NULL DEFAULT '0',
  `callable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callable_id` bigint UNSIGNED DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `user_assigned_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` bigint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `order`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'category-1', 'Category 1', 2, '2023-12-30 12:45:04', '2023-12-30 12:49:18', NULL),
(2, 'category-2', 'Category 2', 1, '2023-12-30 12:45:04', '2023-12-30 12:45:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organisation_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `external_id`, `team_id`, `name`, `user_id`, `label`, `user_owner_id`, `created_at`, `updated_at`, `deleted_at`, `organisation_id`, `phone`, `email`) VALUES
(2, NULL, NULL, 'test', 3, NULL, 3, '2023-12-30 13:00:48', '2023-12-30 13:00:48', NULL, 2, '01305065919', 'tabitaislamprapti@gmail.com'),
(3, NULL, NULL, 'Flavia Perry', 3, NULL, 1, '2023-12-30 13:04:15', '2023-12-30 13:04:15', NULL, NULL, '+1 (708) 993-1629', 'kevygu@mailinator.com'),
(4, NULL, NULL, 'Ahmed', 3, NULL, 3, '2023-12-30 13:08:55', '2023-12-31 00:28:53', NULL, NULL, '+1958285769756', 'tamim@gmail.com'),
(5, NULL, NULL, 'test', 3, NULL, 3, '2023-12-30 23:30:07', '2023-12-30 23:30:07', NULL, 5, '01305065919', 'tabitaislamprapti@gmail.com'),
(6, NULL, NULL, 'test', 2, NULL, 2, '2024-01-02 00:11:36', '2024-01-03 00:08:16', NULL, 11, '+19582857697', 'dani@gmail.com'),
(8, NULL, NULL, 'Charissa', 2, NULL, NULL, '2024-01-03 00:02:24', '2024-01-09 20:03:13', NULL, 9, '+1 (506) 542-7109', 'pykaz@mailinator.com'),
(9, NULL, NULL, 'John', 2, NULL, NULL, '2024-01-04 07:20:18', '2024-01-09 19:59:36', NULL, 19, '+1 (605) 211-7657', 'qihyp@mailinator.com'),
(10, NULL, NULL, 'Isabelle', 2, NULL, NULL, '2024-01-04 08:46:37', '2024-01-04 08:46:37', NULL, 5, '013051651100', 'tamim@gmail.com'),
(11, NULL, NULL, 'Tasha hellid', 2, NULL, NULL, '2024-01-09 20:01:05', '2024-01-10 07:07:01', NULL, 19, '+1 (314) 641-6018', NULL),
(19, NULL, NULL, 'Fallon Little', 2, NULL, NULL, '2024-01-10 20:17:24', '2024-01-10 20:17:24', NULL, 26, '+1 (532) 211-8383', NULL),
(20, NULL, NULL, 'test', 2, NULL, NULL, '2024-01-10 23:00:37', '2024-01-10 23:00:37', NULL, 79, '05120', 'hello123@gmail.com'),
(21, NULL, NULL, 'test', 2, NULL, NULL, '2024-01-10 23:27:34', '2024-01-10 23:38:30', NULL, 78, '01305065919', 'tabitaislamprapti@gmail.com'),
(22, NULL, NULL, 'Quynn Barnes', 2, NULL, NULL, '2024-01-10 23:35:12', '2024-01-10 23:35:12', NULL, 78, '+1 (805) 266-8533', NULL),
(23, NULL, NULL, 'Christian', 2, NULL, NULL, '2024-01-10 23:42:04', '2024-01-11 04:10:30', NULL, 78, '+1 (238) 887-9221', 'xobapanyni@mailinator.com'),
(24, NULL, NULL, 'test', 2, NULL, NULL, '2024-01-10 23:45:12', '2024-01-10 23:45:12', NULL, 80, NULL, 'test'),
(25, NULL, NULL, 'Clayton Solomonn', 2, NULL, NULL, '2024-01-11 02:01:10', '2024-01-11 02:52:36', NULL, 9, '+1 (405) 338-1154', 'xovyd@mailinator.com'),
(26, NULL, NULL, 'Inez Baldwin', 2, NULL, NULL, '2024-01-11 04:11:01', '2024-01-11 04:11:01', NULL, NULL, '+1 (937) 583-4087', 'cepylywu@mailinator.com'),
(27, NULL, NULL, 'test2342342', 2, NULL, NULL, '2024-01-11 04:17:57', '2024-01-11 04:17:57', NULL, 86, 'Potter Sykes Co', 'tewyce@mailinator.com'),
(28, NULL, NULL, 'Shafira Alvarez', 2, NULL, NULL, '2024-01-15 23:29:00', '2024-01-15 23:29:00', NULL, NULL, '+1 (753) 909-5088', 'fumavad@mailinator.com'),
(29, NULL, NULL, 'Jarrod Galloway', 2, NULL, NULL, '2024-01-15 23:31:24', '2024-01-15 23:31:24', NULL, NULL, '+1 (307) 166-5589', 'wydesojih@mailinator.com'),
(34, NULL, NULL, 'ersrferg', 5, NULL, NULL, '2024-02-01 06:35:26', '2024-02-01 06:35:26', NULL, 92, 'Mccarty Fulton Traders', 'qaxymi@mailinator.com'),
(35, NULL, NULL, 'Cruz Marks', 6, NULL, NULL, '2024-02-10 00:35:00', '2024-02-10 00:35:00', NULL, NULL, '+1 (672) 777-7352', 'bepyx@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `client_organisation`
--

CREATE TABLE `client_organisation` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `organisation_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_organisation`
--

INSERT INTO `client_organisation` (`id`, `client_id`, `organisation_id`, `created_at`, `updated_at`) VALUES
(9, 27, 11, NULL, NULL),
(14, 34, 92, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_organisations`
--

CREATE TABLE `client_organisations` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `organisation_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', NULL, NULL),
(2, 'Albania', NULL, NULL),
(3, 'Algeria', NULL, NULL),
(4, 'American Samoa', NULL, NULL),
(5, 'Andorra', NULL, NULL),
(6, 'Angola', NULL, NULL),
(7, 'Anguilla', NULL, NULL),
(8, 'Antarctica', NULL, NULL),
(9, 'Antigua and Barbuda', NULL, NULL),
(10, 'Argentina', NULL, NULL),
(11, 'Armenia', NULL, NULL),
(12, 'Aruba', NULL, NULL),
(13, 'Australia', NULL, NULL),
(14, 'Austria', NULL, NULL),
(15, 'Azerbaijan', NULL, NULL),
(16, 'Bahamas', NULL, NULL),
(17, 'Bahrain', NULL, NULL),
(18, 'Bangladesh', NULL, NULL),
(19, 'Barbados', NULL, NULL),
(20, 'Belarus', NULL, NULL),
(21, 'Belgium', NULL, NULL),
(22, 'Belize', NULL, NULL),
(23, 'Benin', NULL, NULL),
(24, 'Bermuda', NULL, NULL),
(25, 'Bhutan', NULL, NULL),
(26, 'Bolivia', NULL, NULL),
(27, 'Bosnia and Herzegovina', NULL, NULL),
(28, 'Botswana', NULL, NULL),
(29, 'Bouvet Island', NULL, NULL),
(30, 'Brazil', NULL, NULL),
(31, 'British Indian Ocean Territory', NULL, NULL),
(32, 'Brunei Darussalam', NULL, NULL),
(33, 'Bulgaria', NULL, NULL),
(34, 'Burkina Faso', NULL, NULL),
(35, 'Burundi', NULL, NULL),
(36, 'Cambodia', NULL, NULL),
(37, 'Cameroon', NULL, NULL),
(38, 'Canada', NULL, NULL),
(39, 'Cape Verde', NULL, NULL),
(40, 'Cayman Islands', NULL, NULL),
(41, 'Central African Republic', NULL, NULL),
(42, 'Chad', NULL, NULL),
(43, 'Chile', NULL, NULL),
(44, 'China', NULL, NULL),
(45, 'Christmas Island', NULL, NULL),
(46, 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'Colombia', NULL, NULL),
(48, 'Comoros', NULL, NULL),
(49, 'Congo', NULL, NULL),
(50, 'Congo, the Democratic Republic of the', NULL, NULL),
(51, 'Cook Islands', NULL, NULL),
(52, 'Costa Rica', NULL, NULL),
(53, 'Cote D\'Ivoire', NULL, NULL),
(54, 'Croatia', NULL, NULL),
(55, 'Cuba', NULL, NULL),
(56, 'Cyprus', NULL, NULL),
(57, 'Czech Republic', NULL, NULL),
(58, 'Denmark', NULL, NULL),
(59, 'Djibouti', NULL, NULL),
(60, 'Dominica', NULL, NULL),
(61, 'Dominican Republic', NULL, NULL),
(62, 'Ecuador', NULL, NULL),
(63, 'Egypt', NULL, NULL),
(64, 'El Salvador', NULL, NULL),
(65, 'Equatorial Guinea', NULL, NULL),
(66, 'Eritrea', NULL, NULL),
(67, 'Estonia', NULL, NULL),
(68, 'Ethiopia', NULL, NULL),
(69, 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'Faroe Islands', NULL, NULL),
(71, 'Fiji', NULL, NULL),
(72, 'Finland', NULL, NULL),
(73, 'France', NULL, NULL),
(74, 'French Guiana', NULL, NULL),
(75, 'French Polynesia', NULL, NULL),
(76, 'French Southern Territories', NULL, NULL),
(77, 'Gabon', NULL, NULL),
(78, 'Gambia', NULL, NULL),
(79, 'Georgia', NULL, NULL),
(80, 'Germany', NULL, NULL),
(81, 'Ghana', NULL, NULL),
(82, 'Gibraltar', NULL, NULL),
(83, 'Greece', NULL, NULL),
(84, 'Greenland', NULL, NULL),
(85, 'Grenada', NULL, NULL),
(86, 'Guadeloupe', NULL, NULL),
(87, 'Guam', NULL, NULL),
(88, 'Guatemala', NULL, NULL),
(89, 'Guinea', NULL, NULL),
(90, 'Guinea-Bissau', NULL, NULL),
(91, 'Guyana', NULL, NULL),
(92, 'Haiti', NULL, NULL),
(93, 'Heard Island and Mcdonald Islands', NULL, NULL),
(94, 'Holy See (Vatican City State)', NULL, NULL),
(95, 'Honduras', NULL, NULL),
(96, 'Hong Kong', NULL, NULL),
(97, 'Hungary', NULL, NULL),
(98, 'Iceland', NULL, NULL),
(99, 'India', NULL, NULL),
(100, 'Indonesia', NULL, NULL),
(101, 'Iran, Islamic Republic of', NULL, NULL),
(102, 'Iraq', NULL, NULL),
(103, 'Ireland', NULL, NULL),
(104, 'Israel', NULL, NULL),
(105, 'Italy', NULL, NULL),
(106, 'Jamaica', NULL, NULL),
(107, 'Japan', NULL, NULL),
(108, 'Jordan', NULL, NULL),
(109, 'Kazakhstan', NULL, NULL),
(110, 'Kenya', NULL, NULL),
(111, 'Kiribati', NULL, NULL),
(112, 'Korea, Democratic People\'s Republic of', NULL, NULL),
(113, 'Korea, Republic of', NULL, NULL),
(114, 'Kuwait', NULL, NULL),
(115, 'Kyrgyzstan', NULL, NULL),
(116, 'Lao People\'s Democratic Republic', NULL, NULL),
(117, 'Latvia', NULL, NULL),
(118, 'Lebanon', NULL, NULL),
(119, 'Lesotho', NULL, NULL),
(120, 'Liberia', NULL, NULL),
(121, 'Libyan Arab Jamahiriya', NULL, NULL),
(122, 'Liechtenstein', NULL, NULL),
(123, 'Lithuania', NULL, NULL),
(124, 'Luxembourg', NULL, NULL),
(125, 'Macao', NULL, NULL),
(126, 'Macedonia, the Former Yugoslav Republic of', NULL, NULL),
(127, 'Madagascar', NULL, NULL),
(128, 'Malawi', NULL, NULL),
(129, 'Malaysia', NULL, NULL),
(130, 'Maldives', NULL, NULL),
(131, 'Mali', NULL, NULL),
(132, 'Malta', NULL, NULL),
(133, 'Marshall Islands', NULL, NULL),
(134, 'Martinique', NULL, NULL),
(135, 'Mauritania', NULL, NULL),
(136, 'Mauritius', NULL, NULL),
(137, 'Mayotte', NULL, NULL),
(138, 'Mexico', NULL, NULL),
(139, 'Micronesia, Federated States of', NULL, NULL),
(140, 'Moldova, Republic of', NULL, NULL),
(141, 'Monaco', NULL, NULL),
(142, 'Mongolia', NULL, NULL),
(143, 'Montserrat', NULL, NULL),
(144, 'Morocco', NULL, NULL),
(145, 'Mozambique', NULL, NULL),
(146, 'Myanmar', NULL, NULL),
(147, 'Namibia', NULL, NULL),
(148, 'Nauru', NULL, NULL),
(149, 'Nepal', NULL, NULL),
(150, 'Netherlands', NULL, NULL),
(151, 'Netherlands Antilles', NULL, NULL),
(152, 'New Caledonia', NULL, NULL),
(153, 'New Zealand', NULL, NULL),
(154, 'Nicaragua', NULL, NULL),
(155, 'Niger', NULL, NULL),
(156, 'Nigeria', NULL, NULL),
(157, 'Niue', NULL, NULL),
(158, 'Norfolk Island', NULL, NULL),
(159, 'Northern Mariana Islands', NULL, NULL),
(160, 'Norway', NULL, NULL),
(161, 'Oman', NULL, NULL),
(162, 'Pakistan', NULL, NULL),
(163, 'Palau', NULL, NULL),
(164, 'Palestinian Territory, Occupied', NULL, NULL),
(165, 'Panama', NULL, NULL),
(166, 'Papua New Guinea', NULL, NULL),
(167, 'Paraguay', NULL, NULL),
(168, 'Peru', NULL, NULL),
(169, 'Philippines', NULL, NULL),
(170, 'Pitcairn', NULL, NULL),
(171, 'Poland', NULL, NULL),
(172, 'Portugal', NULL, NULL),
(173, 'Puerto Rico', NULL, NULL),
(174, 'Qatar', NULL, NULL),
(175, 'Reunion', NULL, NULL),
(176, 'Romania', NULL, NULL),
(177, 'Russian Federation', NULL, NULL),
(178, 'Rwanda', NULL, NULL),
(179, 'Saint Helena', NULL, NULL),
(180, 'Saint Kitts and Nevis', NULL, NULL),
(181, 'Saint Lucia', NULL, NULL),
(182, 'Saint Pierre and Miquelon', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', NULL, NULL),
(184, 'Samoa', NULL, NULL),
(185, 'San Marino', NULL, NULL),
(186, 'Sao Tome and Principe', NULL, NULL),
(187, 'Saudi Arabia', NULL, NULL),
(188, 'Senegal', NULL, NULL),
(189, 'Serbia and Montenegro', NULL, NULL),
(190, 'Seychelles', NULL, NULL),
(191, 'Sierra Leone', NULL, NULL),
(192, 'Singapore', NULL, NULL),
(193, 'Slovakia', NULL, NULL),
(194, 'Slovenia', NULL, NULL),
(195, 'Solomon Islands', NULL, NULL),
(196, 'Somalia', NULL, NULL),
(197, 'South Africa', NULL, NULL),
(198, 'South Georgia and the South Sandwich Islands', NULL, NULL),
(199, 'Spain', NULL, NULL),
(200, 'Sri Lanka', NULL, NULL),
(201, 'Sudan', NULL, NULL),
(202, 'Suriname', NULL, NULL),
(203, 'Svalbard and Jan Mayen', NULL, NULL),
(204, 'Swaziland', NULL, NULL),
(205, 'Sweden', NULL, NULL),
(206, 'Switzerland', NULL, NULL),
(207, 'Syrian Arab Republic', NULL, NULL),
(208, 'Taiwan, Province of China', NULL, NULL),
(209, 'Tajikistan', NULL, NULL),
(210, 'Tanzania, United Republic of', NULL, NULL),
(211, 'Thailand', NULL, NULL),
(212, 'Timor-Leste', NULL, NULL),
(213, 'Togo', NULL, NULL),
(214, 'Tokelau', NULL, NULL),
(215, 'Tonga', NULL, NULL),
(216, 'Trinidad and Tobago', NULL, NULL),
(217, 'Tunisia', NULL, NULL),
(218, 'Turkey', NULL, NULL),
(219, 'Turkmenistan', NULL, NULL),
(220, 'Turks and Caicos Islands', NULL, NULL),
(221, 'Tuvalu', NULL, NULL),
(222, 'Uganda', NULL, NULL),
(223, 'Ukraine', NULL, NULL),
(224, 'United Arab Emirates', NULL, NULL),
(225, 'United Kingdom', NULL, NULL),
(226, 'United States', NULL, NULL),
(227, 'United States Minor Outlying Islands', NULL, NULL),
(228, 'Uruguay', NULL, NULL),
(229, 'Uzbekistan', NULL, NULL),
(230, 'Vanuatu', NULL, NULL),
(231, 'Venezuela', NULL, NULL),
(232, 'Viet Nam', NULL, NULL),
(233, 'Virgin Islands, British', NULL, NULL),
(234, 'Virgin Islands, U.s.', NULL, NULL),
(235, 'Wallis and Futuna', NULL, NULL),
(236, 'Western Sahara', NULL, NULL),
(237, 'Yemen', NULL, NULL),
(238, 'Zambia', NULL, NULL),
(239, 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int UNSIGNED NOT NULL,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 4, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(57, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(58, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(59, 8, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{}', 3),
(60, 8, 'color', 'color', 'Color', 1, 1, 1, 1, 1, 1, '{}', 4),
(61, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(62, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(63, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{\"display\":{\"width\":\"6\"}}', 1),
(65, 10, 'titles', 'text', 'Titles', 1, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 3),
(66, 10, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 11),
(67, 10, 'price', 'text', 'Price', 1, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 4),
(69, 10, 'status', 'checkbox', 'Status', 1, 1, 1, 1, 1, 1, '{\"on\":\"Active\",\"off\":\"Deactive\",\"checked\":true,\"display\":{\"width\":\"6\"}}', 6),
(70, 10, 'client_limit', 'number', 'Client Limit', 0, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 7),
(71, 10, 'organization_limit', 'number', 'Organization Limit', 0, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 8),
(72, 10, 'deal_limit', 'number', 'Deal Limit', 0, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 9),
(73, 10, 'lead_limit', 'text', 'Lead Limit', 0, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 10),
(74, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{\"display\":{\"width\":\"6\"}}', 12),
(75, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(77, 1, 'user_belongsto_package_relationship', 'relationship', 'packages', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Package\",\"table\":\"packages\",\"type\":\"belongsTo\",\"column\":\"package_id\",\"key\":\"id\",\"label\":\"titles\",\"pivot_table\":\"activities\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(78, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 7),
(79, 1, 'package_id', 'text', 'Package Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(80, 1, 'monthly_charge', 'text', 'Monthly Charge', 0, 1, 1, 1, 1, 1, '{}', 13),
(81, 1, 'client_limit', 'text', 'Client Limit', 0, 1, 1, 1, 1, 1, '{}', 14),
(82, 1, 'organization_limit', 'text', 'Organization Limit', 0, 1, 1, 1, 1, 1, '{}', 15),
(83, 1, 'deal_limit', 'text', 'Deal Limit', 0, 1, 1, 1, 1, 1, '{}', 16),
(84, 1, 'lead_limit', 'text', 'Lead Limit', 0, 1, 1, 1, 1, 1, '{}', 17);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'App\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2023-12-30 12:45:03', '2024-02-09 09:35:50'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2023-12-30 12:45:04', '2023-12-30 12:49:09'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(8, 'labels', 'labels', 'Label', 'Labels', NULL, 'App\\Models\\Label', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(10, 'packages', 'packages', 'Package', 'Packages', 'voyager-backpack', 'App\\Models\\Package', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-02-01 03:43:58', '2024-02-09 09:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `organisation_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualified` tinyint(1) NOT NULL DEFAULT '0',
  `expected_close` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `closed_status` enum('won','lost') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `external_id`, `lead_id`, `client_id`, `organisation_id`, `title`, `label`, `description`, `amount`, `email`, `phone`, `address`, `city`, `state`, `post_code`, `country`, `currency`, `qualified`, `expected_close`, `closed_at`, `closed_status`, `user_id`, `user_owner_id`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(1, '639c5cf6-c49d-4ef8-9661-69983d3bfb74', NULL, 2, 3, 'Molestiae aliquam ei', '1', 'Do repellendus Inci', 12000, 'byvokikyx@mailinator.com', '+1 (344) 465-5263', 'Sequi et voluptates', 'Dolorem exercitation', 'Eligendi adipisicing', 'Fuga Et explicabo', 'other', 'USD', 0, NULL, NULL, NULL, 3, 1, '2023-12-30 13:05:07', '2023-12-30 13:05:07', NULL, 2),
(2, '5d13d364-630e-4a5d-9af9-31b2dbe59ef8', NULL, 2, 3, 'Molestiae aliquam ei', '1', 'Do repellendus Inci', 12000, 'byvokikyx@mailinator.com', '+1 (344) 465-5263', 'Sequi et voluptates', 'Dolorem exercitation', 'Eligendi adipisicing', 'Fuga Et explicabo', 'other', 'USD', 0, NULL, NULL, NULL, 3, 1, '2023-12-30 13:05:16', '2023-12-30 13:10:37', NULL, 1),
(3, 'efce5591-3a7a-4791-b828-37dea4a84b6e', NULL, 4, 4, 'Molestiae aliquam ei', '1', 'Do repellendus Inci', 12000, 'byvokikyx@mailinator.com', '+1 (344) 465-5263', 'Sequi et voluptates', 'Dolorem exercitation', 'Eligendi adipisicing', 'Fuga Et explicabo', 'other', 'USD', 0, NULL, NULL, NULL, 3, 1, '2023-12-30 13:09:05', '2023-12-30 13:09:05', NULL, 2),
(4, '8cdf1777-78b4-4957-83c4-309ee1ed23f6', NULL, 2, 2, 'Mollit nemo eligendi', '1', 'Dignissimos dolorem', 12000, 'bytiqutyv@mailinator.com', '+1 (123) 157-8388', 'Culpa eum rerum sunt', 'Et ex in quibusdam i', 'Itaque repudiandae q', 'Proident do necessi', 'other', 'EUR', 0, NULL, NULL, NULL, 3, 3, '2023-12-30 13:10:33', '2023-12-30 13:10:33', NULL, 1),
(5, '69dedce5-b17e-440f-aa10-a0636e9e4d5c', NULL, 6, 11, 'tst hello test', '2', 'Dolorum commodo sit  test', 12300, 'sixumalo@mailinator.co', '+1 (754) 507-8778', 'Accusamus culpa qui', 'Est aut anim lorem e', 'Dolores culpa porro', 'Eius neque totam aut', 'UK', 'GBP', 0, NULL, NULL, NULL, 2, 3, '2024-01-02 00:12:25', '2024-01-02 02:14:01', NULL, 1),
(6, 'd883f76f-f2c2-4bbe-bef1-7feb4a97939b', NULL, 6, 11, 'tst hello test', '2', 'Dolorum commodo sit  test', 12300, 'sixumalo@mailinator.co', '+1 (754) 507-8778', 'Accusamus culpa qui', 'Est aut anim lorem e', 'Dolores culpa porro', 'Eius neque totam aut', 'UK', 'GBP', 0, NULL, NULL, NULL, 2, NULL, '2024-01-02 02:18:44', '2024-01-02 02:18:44', NULL, 2),
(7, '1f1b0b70-7eff-4122-8227-66155e121f30', NULL, 6, 10, 'Aut ea odio illum v', '1', 'Dolores et porro eiu', 12000, 'luxyji@mailinator.com', '+1 (698) 288-9262', 'Voluptates sunt quis', 'Distinctio Duis qui', 'Impedit sint enim d', 'Aut nostrud ipsum o', 'UK', 'EUR', 0, NULL, NULL, NULL, 2, NULL, '2024-01-02 23:48:19', '2024-01-02 23:48:19', NULL, 2),
(8, '0b58e050-5538-4e47-9609-da000a561b6c', NULL, 6, 16, 'Tempora voluptatem', '2', 'Ullam dolore blandit', 12000, 'cuhofat@mailinator.com', '+1 (212) 971-8623', 'Quasi dicta rerum ea', 'Dolor officia ex sed', 'Porro consequatur C', 'Minus quo ut obcaeca', 'other', 'GBP', 0, NULL, NULL, NULL, 2, 2, '2024-01-02 23:50:09', '2024-01-02 23:50:09', NULL, 2),
(11, '719077ed-1d72-43ea-bed3-99863b04396e', NULL, 8, 16, 'Suscipit architecto', '2', 'Quia dolorem eos in', NULL, 'rulixika@mailinator.com', '+1 (595) 165-9287', 'Aliquam et doloribus', 'Consequatur sequi in', 'Placeat doloribus a', 'Magna nesciunt enim', 'UK', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-04 07:37:17', '2024-01-04 07:37:17', NULL, 1),
(12, '27618126-8a41-4883-96e9-6e9d1d308ab7', NULL, 6, 10, 'Ipsam error et accus', '1', 'Voluptas qui unde ut', NULL, 'bazel@mailinator.com', '+1 (364) 644-3405', 'Rerum non neque temp', 'Quis ut vitae quam v', 'Animi aut molestiae', 'Reprehenderit facil', 'UK', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-04 07:38:04', '2024-01-04 07:38:04', NULL, 2),
(17, '45f80ce9-532b-42d7-951e-2356d2c5e9c4', NULL, NULL, 19, 'Eos voluptas amet', '2', 'Dolore cillum iusto', NULL, 'gmai@gmail.com', '0130032000', 'fello', 'Culpa dolor similiq', 'Barisal', '1200', 'Bangladesh', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-09 20:50:47', '2024-01-09 21:34:28', NULL, 1),
(18, '475a8a35-ebd2-4a4c-94dd-d6515e46ed3a', NULL, NULL, 23, 'Possimus qui aliqua', '2', 'Voluptatem Blanditi', NULL, 'nazyrysyp@mailinator.com', 'Hooper Marquez Co', 'Cillum modi eligendi', 'Quidem enim ex aliqu', 'Barisal', 'Cupiditate architect', 'other', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-09 20:51:45', '2024-01-09 20:51:45', NULL, 2),
(19, '380e5f70-8946-40f7-b288-1bd398190e97', NULL, NULL, 25, 'Aut quo perspiciatis', '1', 'Commodo ipsa pariat', NULL, 'qihu@mailinator.com', 'Boyle Langley Co', 'Aut qui magna tempor', 'Quas ut in quos cons', 'Aperiam sapiente ali', 'In nostrud minim tem', 'Belarus', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-11 00:07:57', '2024-01-11 00:07:57', NULL, 2),
(20, '497f416f-2a0e-480c-8ba5-3d4964b5795e', NULL, NULL, 25, 'Aut quo perspiciatis', '1', 'Commodo ipsa pariat', NULL, 'qihu@mailinator.com', 'Boyle Langley Co', 'Aut qui magna tempor', 'Quas ut in quos cons', 'Aperiam sapiente ali', 'In nostrud minim tem', 'Belarus', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-11 00:08:27', '2024-01-11 00:08:27', NULL, 2),
(21, '9ba517f4-bdc5-4870-84b7-edfc38468475', NULL, NULL, 13, 'Et nulla ut ipsum si', '1', 'Deserunt laboris ver', NULL, 'tabitaislamprapti@gmail.com', '01305065919', 'Barisal sadar road', 'barisal', 'Barisal/Barisal/Muslim', '8200', 'Barbados', NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-11 00:09:12', '2024-01-11 00:09:12', NULL, 2),
(22, 'dc1d63f4-b581-4a7e-8e5c-5f51cba7574d', NULL, NULL, 12, 'Laborum tenetur cill', '1', 'Consequuntur magni d', NULL, 'mekimecot@mailinator.com', 'Holder Stanley Associates', 'Ut reprehenderit mo', 'Qui veritatis perfer', '123213', 'Perspiciatis volupt', NULL, NULL, 0, NULL, NULL, NULL, 2, NULL, '2024-01-11 00:21:03', '2024-01-11 00:21:03', NULL, 2),
(23, '00683f10-11f0-4ee8-a30b-112b73722946', NULL, NULL, 92, 'trwgs', '1', 'gefdgdfv', NULL, 'qaxymi@mailinator.com', 'Mccarty Fulton Traders', 'Soluta quibusdam id', 'Aliqua Sit modi eni', 'Dolor quae officiis', 'Iste quae quia quis', 'Argentina', NULL, 0, NULL, NULL, NULL, 5, NULL, '2024-02-01 07:19:29', '2024-02-01 07:19:29', NULL, 2),
(24, 'f5803bad-c113-46fd-ab45-4ad5a038e885', NULL, NULL, 92, 'fdsfsd', '1', 'sdvsdvsd', NULL, 'qaxymi@mailinator.com', 'Mccarty Fulton Traders', 'Soluta quibusdam id', 'Aliqua Sit modi eni', 'Dolor quae officiis', 'Iste quae quia quis', 'Argentina', NULL, 0, NULL, NULL, NULL, 5, NULL, '2024-02-01 07:19:44', '2024-02-01 07:19:44', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `fileable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileable_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local',
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `slug`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Matthew Conrad', 'Aperiam doloribus qu', '#6b5014', '2023-12-30 12:51:48', '2023-12-30 12:51:48'),
(2, 'Dolan Ware', 'Odit deserunt lorem', '#19397c', '2023-12-30 12:51:54', '2023-12-30 12:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `organisation_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `external_id`, `client_id`, `organisation_id`, `title`, `label`, `description`, `amount`, `email`, `phone`, `address`, `city`, `state`, `post_code`, `country`, `currency`, `user_id`, `user_owner_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'f49769bf-7ac0-4ee0-a93c-673f6bbd02c7', 2, 1, 'Exercitation perfere', '2', 'test hello', 3800, 'tamim@gmail.com', '+1 (372) 346-8468', 'Culpa rem', 'Mollit nihil dolor d', 'Neque sunt id volu', 'Molestiae laboris et', 'UK', 'EUR', 3, 3, '2023-12-30 13:11:04', '2023-12-30 23:30:59', NULL),
(3, '0e4554f9-f176-482a-a225-7913b7017be6', 6, 15, 'In eiusmod vero sed', '2', NULL, 8300, 'ronazin@mailinator.com', '+1 (818) 462-9651', 'Fugiat repudiandae q', 'Velit eum eu enim au', 'Accusantium quam aut', 'Voluptates modi volu', 'other', 'USD', 2, 1, '2024-01-02 00:18:27', '2024-01-02 00:18:27', NULL),
(4, 'cc88ba72-92d4-46f4-a24d-92fed013a4d0', 6, 14, 'Architecto sed deser', '1', 'test 2', 2700, 'xesoru@mailinator.com', '+1 (787) 999-8662', 'Quos aute numquam pa', 'Quod quaerat tempore', 'Irure commodi pariat', 'Rem quo numquam non', 'UK', 'EUR', 2, NULL, '2024-01-02 23:53:21', '2024-01-02 23:58:47', NULL),
(5, '57329463-1c35-4c01-b0bf-c7e0d522a92e', 9, 15, 'Neque non culpa ad', '2', NULL, NULL, 'mokun@mailinator.com', '+1 (201) 318-1942', 'Est deserunt eu in q', 'Dolorum laborum quam', 'Sit exercitationem e', 'Quod omnis minus fug', 'other', NULL, 2, NULL, '2024-01-04 07:34:45', '2024-01-04 07:34:45', NULL),
(6, '5825f858-b629-4faf-bc78-3d2ae1ff35b5', 10, 21, 'Reprehenderit sint', '2', NULL, NULL, 'hysile@mailinator.com', 'Dixon and Carr Trading', 'Aspernatur aliquid n', 'Quod est necessitati', 'Vero ea amet ut vol', 'Porro sed maxime non', NULL, NULL, 2, NULL, '2024-01-04 10:57:04', '2024-01-04 10:57:04', NULL),
(9, '2cd9ddb4-970c-4eea-b396-5395e3096eeb', NULL, 75, NULL, NULL, NULL, NULL, 'tecuxohu@mailinator.com', 'Golden and Arnold Plc', 'Dolore id ut ipsum', 'Nihil pariatur Haru', 'Expedita tenetur adi', 'Pariatur In reprehe', 'Austria', NULL, 2, NULL, '2024-01-10 23:57:40', '2024-01-10 23:57:40', NULL),
(10, 'ee188c27-13c1-483d-8caa-099b55247061', NULL, 11, NULL, '2', NULL, NULL, 'sagow@mailinator.com', 'Hancock and Morales Co', 'Sed aut magnam quo m', 'Exercitation dolorem', 'test', 'Vel vel quaerat haru', 'Belgium', NULL, 2, NULL, '2024-01-11 00:13:08', '2024-01-11 00:13:08', NULL),
(11, '4617f800-d65a-4b5d-ae24-ee0f49f5be2c', NULL, 29, NULL, '1', NULL, NULL, 'tabitaislamprapti@gmail.com', '01305065919', 'Barisal sadar road', 'barisal', 'Nulla cillum enim te', '8200', 'Belgium', NULL, 2, NULL, '2024-01-11 00:14:14', '2024-01-11 00:15:02', NULL),
(12, 'b8c560cb-7f4d-40f1-b6e0-fdd08f7d05c0', NULL, 81, NULL, '2', NULL, NULL, 'nulypecy@mailinator.com', 'Frederick and Ramirez Traders', 'Sit aliqua Volupta', 'Accusamus ex est ex', 'Omnis corporis est', 'Laborum elit eum a', 'Tonga', NULL, 2, NULL, '2024-01-11 03:25:22', '2024-01-11 03:25:22', NULL),
(13, '0bd3f591-57b6-41a3-b04e-0c1670a08285', NULL, 87, NULL, '2', NULL, NULL, 'vyjohon@mailinator.com', 'Lynch Jackson Trading', 'Quasi ex ipsa irure', 'Sit fugiat dolor i', 'Aliquip ut voluptate', 'Magni non ullamco fa', 'Pitcairn', NULL, 2, NULL, '2024-01-11 04:19:17', '2024-01-11 04:19:17', NULL),
(14, '38e2a65e-9a93-4d01-b345-2e3ab11952a4', NULL, 88, NULL, '1', NULL, NULL, 'cawunizo@mailinator.com', 'Downs and Carr LLC', 'Tempore Nam veniam', 'Temporibus duis in e', 'Atque culpa numquam', 'Non molestiae quam f', 'Netherlands', NULL, 2, NULL, '2024-01-11 04:24:25', '2024-01-11 04:24:25', NULL),
(15, 'a61fd01b-51c8-4437-8976-506819c857ce', NULL, 89, NULL, '1', NULL, NULL, 'gunatahemi@mailinator.com', 'Robles Fulton Trading', 'Consectetur quo tem', 'Magni exercitation u', 'Ducimus dolores ea', 'Sunt quia et perspic', 'Solomon Islands', NULL, 2, NULL, '2024-01-11 04:26:07', '2024-01-11 04:26:07', NULL),
(16, '78b87a74-760e-41ca-8759-f19157ae74c3', NULL, 91, NULL, '1', NULL, NULL, 'najuxukyj@mailinator.com', 'Fischer and Shelton Associates', 'Officia et ut blandi', 'Aliqua Sint exercit', 'Cum sunt harum et es', 'Sed sint aut volupta', 'Costa Rica', NULL, 2, NULL, '2024-01-11 04:30:48', '2024-01-16 01:04:25', NULL),
(18, 'c5ccd1c2-5fb0-46d0-b10d-4862f7e855ac', NULL, 92, NULL, '1', NULL, NULL, 'qaxymi@mailinator.com', 'Mccarty Fulton Traders', 'Soluta quibusdam id', 'Aliqua Sit modi eni', 'Dolor quae officiis', 'Iste quae quia quis', 'Argentina', NULL, 5, NULL, '2024-02-01 07:13:30', '2024-02-01 07:13:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lunches`
--

CREATE TABLE `lunches` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `reminder_email` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_sms` tinyint(1) NOT NULL DEFAULT '0',
  `lunchable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunchable_id` bigint UNSIGNED DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `user_assigned_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `reminder_email` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_sms` tinyint(1) NOT NULL DEFAULT '0',
  `meetingable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meetingable_id` bigint UNSIGNED DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `user_assigned_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-12-30 12:45:03', '2023-12-30 12:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2023-12-30 12:45:03', '2023-12-30 12:45:03', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2023-12-30 12:45:03', '2023-12-30 12:45:03', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2023-12-30 12:45:04', '2023-12-30 12:45:04', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2023-12-30 12:45:04', '2023-12-30 12:45:04', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2023-12-30 12:45:04', '2023-12-30 12:45:04', 'voyager.pages.index', NULL),
(14, 1, 'Labels', '', '_self', NULL, NULL, NULL, 15, '2023-12-30 12:51:37', '2023-12-30 12:51:37', 'voyager.labels.index', NULL),
(15, 1, 'Packages', '', '_self', 'voyager-backpack', NULL, NULL, 16, '2024-02-01 03:43:58', '2024-02-01 03:43:58', 'voyager.packages.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint UNSIGNED NOT NULL,
  `metable_id` bigint NOT NULL,
  `metable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `metable_id`, `metable_type`, `column_name`, `column_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Lead', 'close_date', '1998-03-15', '2023-12-30 12:53:33', '2023-12-30 12:53:33'),
(2, 2, 'App\\Models\\Client', 'l_name', 'rest', '2023-12-30 13:00:48', '2023-12-30 13:00:48'),
(3, 2, 'App\\Models\\Client', 'position', 'test', '2023-12-30 13:00:48', '2023-12-30 13:00:48'),
(4, 2, 'App\\Models\\Lead', 'close_date', '2015-04-08', '2023-12-30 13:11:04', '2023-12-30 14:36:05'),
(5, 5, 'App\\Models\\Client', 'l_name', 'rest', '2023-12-30 23:30:07', '2023-12-30 23:30:07'),
(6, 5, 'App\\Models\\Client', 'position', 'test', '2023-12-30 23:30:07', '2023-12-30 23:30:07'),
(7, 4, 'App\\Models\\Client', 'l_name', 'Tamim', '2023-12-30 23:51:08', '2023-12-31 00:26:32'),
(8, 5, 'App\\Models\\Organisation', 'street', 'barisal helloo', '2023-12-31 00:36:37', '2023-12-31 01:10:39'),
(9, 5, 'App\\Models\\Organisation', 'place', 'SOmoly-3', '2023-12-31 00:36:37', '2023-12-31 01:15:35'),
(10, 5, 'App\\Models\\Organisation', 'post_code', '1200', '2023-12-31 00:36:37', '2023-12-31 01:22:33'),
(11, 5, 'App\\Models\\Organisation', 'company_email', 'tamim@gmail.com', '2023-12-31 00:36:37', '2023-12-31 01:00:49'),
(12, 5, 'App\\Models\\Organisation', 'company_phone', '013051651100', '2023-12-31 00:36:37', '2023-12-31 00:53:52'),
(13, 5, 'App\\Models\\Organisation', 'company_twitter', 'https://www.facebook.com/', '2023-12-31 00:36:37', '2023-12-31 03:34:08'),
(14, 5, 'App\\Models\\Organisation', 'company_tiktok', 'Dejesus and Church LLC', '2023-12-31 00:36:37', '2023-12-31 00:36:37'),
(15, 5, 'App\\Models\\Organisation', 'company_youtube', 'test', '2023-12-31 00:36:37', '2023-12-31 05:49:04'),
(16, 5, 'App\\Models\\Organisation', 'company_fb', 'https://www.facebook.com/', '2023-12-31 00:36:37', '2023-12-31 03:33:59'),
(17, 5, 'App\\Models\\Organisation', 'niche', 'Sunt molestias simil', '2023-12-31 00:36:37', '2023-12-31 00:36:37'),
(18, 6, 'App\\Models\\Organisation', 'street', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(19, 7, 'App\\Models\\Organisation', 'street', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(20, 6, 'App\\Models\\Organisation', 'place', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(21, 7, 'App\\Models\\Organisation', 'place', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(22, 6, 'App\\Models\\Organisation', 'post_code', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(23, 7, 'App\\Models\\Organisation', 'post_code', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(24, 7, 'App\\Models\\Organisation', 'company_email', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(25, 6, 'App\\Models\\Organisation', 'company_email', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(26, 7, 'App\\Models\\Organisation', 'company_phone', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(27, 6, 'App\\Models\\Organisation', 'company_phone', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(28, 7, 'App\\Models\\Organisation', 'company_twitter', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(29, 6, 'App\\Models\\Organisation', 'company_twitter', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(30, 7, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(31, 6, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(32, 7, 'App\\Models\\Organisation', 'company_youtube', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(33, 6, 'App\\Models\\Organisation', 'company_youtube', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(34, 7, 'App\\Models\\Organisation', 'company_fb', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(35, 6, 'App\\Models\\Organisation', 'company_fb', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(36, 7, 'App\\Models\\Organisation', 'niche', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(37, 6, 'App\\Models\\Organisation', 'niche', NULL, '2023-12-31 06:01:36', '2023-12-31 06:01:36'),
(38, 8, 'App\\Models\\Organisation', 'street', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(39, 8, 'App\\Models\\Organisation', 'place', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(40, 8, 'App\\Models\\Organisation', 'post_code', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(41, 8, 'App\\Models\\Organisation', 'company_email', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(42, 8, 'App\\Models\\Organisation', 'company_phone', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(43, 8, 'App\\Models\\Organisation', 'company_twitter', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(44, 8, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(45, 8, 'App\\Models\\Organisation', 'company_youtube', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(46, 8, 'App\\Models\\Organisation', 'company_fb', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(47, 8, 'App\\Models\\Organisation', 'niche', NULL, '2023-12-31 06:01:48', '2023-12-31 06:01:48'),
(48, 9, 'App\\Models\\Organisation', 'street', 'Quia ipsum accusamus', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(49, 9, 'App\\Models\\Organisation', 'place', 'Iusto nisi et exerci', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(50, 9, 'App\\Models\\Organisation', 'post_code', '120', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(51, 9, 'App\\Models\\Organisation', 'company_email', 'reriv@mailinator.com', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(52, 9, 'App\\Models\\Organisation', 'company_phone', 'Ashley and Bush Inc', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(53, 9, 'App\\Models\\Organisation', 'company_twitter', 'Fletcher and Martinez Plc', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(54, 9, 'App\\Models\\Organisation', 'company_tiktok', 'Salas Macdonald Co', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(55, 9, 'App\\Models\\Organisation', 'company_youtube', 'Sampson and Hess Plc', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(56, 9, 'App\\Models\\Organisation', 'company_fb', 'Mcmahon and Hansen Co', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(57, 9, 'App\\Models\\Organisation', 'niche', 'Sit culpa Nam bland', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(58, 9, 'App\\Models\\Organisation', 'social_name[0', 'facebook', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(59, 9, 'App\\Models\\Organisation', 'social_url[0', 'nsdgjndfjgfdgnf', '2024-01-01 03:57:17', '2024-01-01 03:57:17'),
(60, 10, 'App\\Models\\Organisation', 'street', 'Veniam fuga Quidem', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(61, 10, 'App\\Models\\Organisation', 'place', 'Dicta eiusmod impedi', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(62, 10, 'App\\Models\\Organisation', 'post_code', 'Ut qui tenetur volup', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(63, 10, 'App\\Models\\Organisation', 'company_email', 'jufiny@mailinator.com', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(64, 10, 'App\\Models\\Organisation', 'company_phone', 'Henson Chen Trading', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(65, 10, 'App\\Models\\Organisation', 'company_twitter', 'Stuart Walton Associates', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(66, 10, 'App\\Models\\Organisation', 'company_tiktok', 'Welch and Quinn Traders', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(67, 10, 'App\\Models\\Organisation', 'company_youtube', 'Erickson Sweet LLC', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(68, 10, 'App\\Models\\Organisation', 'company_fb', 'Puckett Abbott Plc', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(69, 10, 'App\\Models\\Organisation', 'niche', 'Quia necessitatibus', '2024-01-01 04:30:13', '2024-01-01 04:30:13'),
(70, 10, 'App\\Models\\Organisation', 'social', '[{\"name\":\"tamim\",\"url\":\"Voluptatem natus cum\"},{\"name\":\"Rogan Francis\",\"url\":\"Quidem consequuntur\"}]', '2024-01-01 04:30:13', '2024-01-01 22:41:59'),
(71, 11, 'App\\Models\\Organisation', 'street', 'Sed aut magnam quo m', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(72, 11, 'App\\Models\\Organisation', 'place', 'Exercitation dolorem', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(73, 11, 'App\\Models\\Organisation', 'post_code', 'Vel vel quaerat haru', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(74, 11, 'App\\Models\\Organisation', 'company_email', 'sagow@mailinator.com', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(75, 11, 'App\\Models\\Organisation', 'company_phone', 'Hancock and Morales Co', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(76, 11, 'App\\Models\\Organisation', 'company_twitter', 'Vinson Baird Trading', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(77, 11, 'App\\Models\\Organisation', 'company_tiktok', 'Greer Mcfadden Co', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(78, 11, 'App\\Models\\Organisation', 'company_youtube', 'Hamilton and Poole Associates', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(79, 11, 'App\\Models\\Organisation', 'company_fb', 'Reid and Grimes Inc', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(80, 11, 'App\\Models\\Organisation', 'niche', 'Molestias unde asper', '2024-01-01 04:37:46', '2024-01-01 04:37:46'),
(81, 11, 'App\\Models\\Organisation', 'social', '[{\"name\":\"Jonas Rodgers\",\"url\":\"Ut nihil ipsa id in\"},{\"name\":\"fbx\",\"url\":\"Non dolores quia bea\"}]', '2024-01-01 04:37:46', '2024-01-01 06:06:14'),
(82, 12, 'App\\Models\\Organisation', 'street', 'Ut reprehenderit mo', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(83, 12, 'App\\Models\\Organisation', 'place', 'Qui veritatis perfer', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(84, 12, 'App\\Models\\Organisation', 'post_code', 'Perspiciatis volupt', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(85, 12, 'App\\Models\\Organisation', 'company_email', 'mekimecot@mailinator.com', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(86, 12, 'App\\Models\\Organisation', 'company_phone', 'Holder Stanley Associates', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(87, 12, 'App\\Models\\Organisation', 'company_twitter', 'Finley Myers Inc', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(88, 12, 'App\\Models\\Organisation', 'company_tiktok', 'Sosa Levine LLC', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(89, 12, 'App\\Models\\Organisation', 'company_youtube', 'Huber and Randolph Associates', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(90, 12, 'App\\Models\\Organisation', 'company_fb', 'West Cruz Inc', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(91, 12, 'App\\Models\\Organisation', 'niche', 'Excepturi voluptate', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(92, 12, 'App\\Models\\Organisation', 'social', '[{\"name\":\"Kirk Crane\",\"url\":\"Et quibusdam dolor s\"}]', '2024-01-01 04:42:27', '2024-01-01 04:42:27'),
(94, 9, 'App\\Models\\Organisation', 'social', '{\"1\":{\"name\":\"Timon Alvarado\",\"url\":\"Ratione hic vero qui\"},\"2\":{\"name\":\"Malik Mckenzie\",\"url\":\"Veniam minim eaque\"},\"3\":{\"name\":\"Samuel Lindsey\",\"url\":\"Aut fugit eu rerum\"},\"4\":{\"name\":\"test\",\"url\":\"test\"}}', '2024-01-01 06:17:14', '2024-01-01 06:26:07'),
(95, 13, 'App\\Models\\Organisation', 'street', 'Omnis quis natus mol', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(96, 13, 'App\\Models\\Organisation', 'place', 'Doloribus minim magn', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(97, 13, 'App\\Models\\Organisation', 'post_code', 'Reprehenderit et vol', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(98, 13, 'App\\Models\\Organisation', 'company_email', 'vojixymeh@mailinator.com', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(99, 13, 'App\\Models\\Organisation', 'company_phone', 'Moses Gentry Inc', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(100, 13, 'App\\Models\\Organisation', 'company_twitter', 'Hoover and Cervantes Associates', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(101, 13, 'App\\Models\\Organisation', 'company_tiktok', 'Garrison and Henderson Plc', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(102, 13, 'App\\Models\\Organisation', 'company_youtube', 'Madden Cash Co', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(103, 13, 'App\\Models\\Organisation', 'company_fb', 'Higgins Cole Associates', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(104, 13, 'App\\Models\\Organisation', 'niche', 'Modi ad laboriosam', '2024-01-01 06:46:40', '2024-01-01 06:46:40'),
(105, 14, 'App\\Models\\Organisation', 'street', 'Reiciendis eos fugia', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(106, 14, 'App\\Models\\Organisation', 'place', 'Libero eveniet eius', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(107, 14, 'App\\Models\\Organisation', 'post_code', 'Rem odio provident', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(108, 14, 'App\\Models\\Organisation', 'company_email', 'hofafa@mailinator.com', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(109, 14, 'App\\Models\\Organisation', 'company_phone', 'Waters and Suarez Associates', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(110, 14, 'App\\Models\\Organisation', 'company_twitter', 'Castillo Allison Associates', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(111, 14, 'App\\Models\\Organisation', 'company_tiktok', 'Mathis Wilcox Co', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(112, 14, 'App\\Models\\Organisation', 'company_youtube', 'Adkins and Moses Trading', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(113, 14, 'App\\Models\\Organisation', 'company_fb', 'Ruiz Goodman LLC', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(114, 14, 'App\\Models\\Organisation', 'niche', 'Corporis voluptas es', '2024-01-01 06:47:18', '2024-01-01 06:47:18'),
(115, 14, 'App\\Models\\Organisation', 'social', '{\"2\":{\"name\":\"test\",\"url\":\"test\"}}', '2024-01-01 07:15:49', '2024-01-01 22:31:26'),
(116, 15, 'App\\Models\\Organisation', 'street', 'Et ea quam quia accu', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(117, 15, 'App\\Models\\Organisation', 'place', 'Et accusantium facer', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(118, 15, 'App\\Models\\Organisation', 'post_code', 'Enim sit consequat', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(119, 15, 'App\\Models\\Organisation', 'company_email', 'hexenowoj@mailinator.com', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(120, 15, 'App\\Models\\Organisation', 'company_phone', 'Mcknight Flores Plc', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(121, 15, 'App\\Models\\Organisation', 'company_twitter', 'Mercado and Stone Traders', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(122, 15, 'App\\Models\\Organisation', 'company_tiktok', 'Kemp Sweeney Traders', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(123, 15, 'App\\Models\\Organisation', 'company_youtube', 'Kline Hays Plc', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(124, 15, 'App\\Models\\Organisation', 'company_fb', 'Poole Mcleod Co', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(125, 15, 'App\\Models\\Organisation', 'niche', 'Voluptas qui odio ne', '2024-01-01 22:53:41', '2024-01-01 22:53:41'),
(126, 15, 'App\\Models\\Organisation', 'social', '{\"2\":{\"name\":\"Elton Jackson\",\"url\":\"Asperiores quod reru\"}}', '2024-01-01 22:53:41', '2024-01-01 22:53:50'),
(127, 3, 'App\\Models\\Lead', 'close_date', '2020-12-18', '2024-01-02 00:18:27', '2024-01-02 00:18:27'),
(128, 4, 'App\\Models\\Lead', 'close_date', '2019-12-11', '2024-01-02 23:53:21', '2024-01-02 23:53:21'),
(129, 8, 'App\\Models\\Client', 'l_name', 'Jena Larson', '2024-01-03 00:02:24', '2024-01-03 00:02:24'),
(130, 8, 'App\\Models\\Client', 'position', 'Dignissimos est vol', '2024-01-03 00:02:24', '2024-01-03 00:02:24'),
(131, 6, 'App\\Models\\Client', 'l_name', 'test', '2024-01-03 00:03:49', '2024-01-03 00:03:49'),
(132, 19, 'App\\Models\\Organisation', 'street', 'Aut consectetur opti', '2024-01-04 07:20:14', '2024-01-04 07:20:14'),
(133, 19, 'App\\Models\\Organisation', 'place', 'Asperiores ut incidu', '2024-01-04 07:20:14', '2024-01-04 07:20:14'),
(134, 19, 'App\\Models\\Organisation', 'post_code', 'Non non quae invento', '2024-01-04 07:20:14', '2024-01-04 07:20:14'),
(135, 19, 'App\\Models\\Organisation', 'company_email', 'zycoruv@mailinator.com', '2024-01-04 07:20:14', '2024-01-04 07:20:14'),
(136, 19, 'App\\Models\\Organisation', 'company_phone', 'Hunt Chavez LLC', '2024-01-04 07:20:14', '2024-01-04 07:20:14'),
(137, 9, 'App\\Models\\Client', 'l_name', 'Brock', '2024-01-04 07:20:18', '2024-01-09 19:57:42'),
(138, 9, 'App\\Models\\Client', 'position', 'Quod sit enim autem', '2024-01-04 07:20:18', '2024-01-04 07:20:18'),
(139, 19, 'App\\Models\\Organisation', 'company_fb', 'test', '2024-01-04 07:23:36', '2024-01-04 07:23:36'),
(140, 5, 'App\\Models\\Lead', 'close_date', '2014-08-17', '2024-01-04 07:34:45', '2024-01-04 07:34:45'),
(141, 20, 'App\\Models\\Organisation', 'street', 'fello', '2024-01-04 08:46:20', '2024-01-04 08:46:20'),
(142, 20, 'App\\Models\\Organisation', 'place', 'test', '2024-01-04 08:46:20', '2024-01-04 08:46:20'),
(143, 20, 'App\\Models\\Organisation', 'post_code', '1200', '2024-01-04 08:46:20', '2024-01-04 08:46:20'),
(144, 20, 'App\\Models\\Organisation', 'company_email', 'gmai@gmail.com', '2024-01-04 08:46:20', '2024-01-04 08:46:20'),
(145, 20, 'App\\Models\\Organisation', 'company_phone', '0130032000', '2024-01-04 08:46:20', '2024-01-04 08:46:20'),
(146, 10, 'App\\Models\\Client', 'l_name', 'Hyde', '2024-01-04 08:46:37', '2024-01-04 08:46:37'),
(147, 10, 'App\\Models\\Client', 'position', 'test', '2024-01-04 08:46:37', '2024-01-04 08:46:37'),
(148, 21, 'App\\Models\\Organisation', 'street', 'Aspernatur aliquid n', '2024-01-04 10:56:48', '2024-01-04 10:56:48'),
(149, 21, 'App\\Models\\Organisation', 'place', 'Similique culpa per', '2024-01-04 10:56:48', '2024-01-04 10:56:48'),
(150, 21, 'App\\Models\\Organisation', 'post_code', 'Porro sed maxime non', '2024-01-04 10:56:48', '2024-01-04 10:56:48'),
(151, 21, 'App\\Models\\Organisation', 'company_email', 'hysile@mailinator.com', '2024-01-04 10:56:48', '2024-01-04 10:56:48'),
(152, 21, 'App\\Models\\Organisation', 'company_phone', 'Dixon and Carr Trading', '2024-01-04 10:56:48', '2024-01-04 10:56:48'),
(153, 6, 'App\\Models\\Lead', 'close_date', '1974-08-30', '2024-01-04 10:57:04', '2024-01-04 10:57:04'),
(154, 22, 'App\\Models\\Organisation', 'street', 'Magni corrupti qui', '2024-01-04 11:01:51', '2024-01-04 11:01:51'),
(155, 22, 'App\\Models\\Organisation', 'place', 'Omnis sunt aperiam', '2024-01-04 11:01:51', '2024-01-04 11:01:51'),
(156, 22, 'App\\Models\\Organisation', 'post_code', 'Eaque ipsa deserunt', '2024-01-04 11:01:51', '2024-01-04 11:01:51'),
(157, 22, 'App\\Models\\Organisation', 'company_email', 'sehy@mailinator.com', '2024-01-04 11:01:51', '2024-01-04 11:01:51'),
(158, 22, 'App\\Models\\Organisation', 'company_phone', 'Hines Vang Traders', '2024-01-04 11:01:51', '2024-01-04 11:01:51'),
(159, 23, 'App\\Models\\Organisation', 'street', 'Cillum modi eligendi', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(160, 23, 'App\\Models\\Organisation', 'place', 'Repellendus Sit nih', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(161, 23, 'App\\Models\\Organisation', 'post_code', 'Cupiditate architect', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(162, 23, 'App\\Models\\Organisation', 'state', 'Barisal', '2024-01-09 19:10:21', '2024-01-09 19:13:32'),
(163, 23, 'App\\Models\\Organisation', 'company_email', 'nazyrysyp@mailinator.com', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(164, 23, 'App\\Models\\Organisation', 'company_phone', 'Hooper Marquez Co', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(165, 23, 'App\\Models\\Organisation', 'company_twitter', 'Gould Hammond Inc', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(166, 23, 'App\\Models\\Organisation', 'company_tiktok', 'Pickett Navarro Plc', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(167, 23, 'App\\Models\\Organisation', 'company_youtube', 'Burnett Hurst Inc', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(168, 23, 'App\\Models\\Organisation', 'company_fb', 'Vasquez and Knight LLC', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(169, 23, 'App\\Models\\Organisation', 'niche', 'Accusantium voluptat', '2024-01-09 19:10:21', '2024-01-09 19:10:21'),
(170, 23, 'App\\Models\\Organisation', 'country', 'other', '2024-01-09 19:16:53', '2024-01-09 19:17:07'),
(171, 11, 'App\\Models\\Client', 'l_name', 'Whitfield test', '2024-01-09 20:01:05', '2024-01-10 07:10:18'),
(172, 7, 'App\\Models\\Lead', 'close_date', NULL, '2024-01-09 20:21:11', '2024-01-09 20:21:11'),
(173, 24, 'App\\Models\\Organisation', 'street', 'Dolores laborum nost', '2024-01-09 20:51:20', '2024-01-09 20:51:20'),
(174, 24, 'App\\Models\\Organisation', 'place', 'Magnam est impedit', '2024-01-09 20:51:20', '2024-01-09 20:51:20'),
(175, 24, 'App\\Models\\Organisation', 'post_code', '123', '2024-01-09 20:51:20', '2024-01-09 20:51:20'),
(176, 24, 'App\\Models\\Organisation', 'company_email', 'dani@gmail.com', '2024-01-09 20:51:20', '2024-01-09 20:51:20'),
(177, 24, 'App\\Models\\Organisation', 'company_phone', '+19582857697', '2024-01-09 20:51:20', '2024-01-09 20:51:20'),
(178, 8, 'App\\Models\\Lead', 'close_date', '1978-11-16', '2024-01-09 20:51:59', '2024-01-09 20:51:59'),
(179, 25, 'App\\Models\\Organisation', 'street', 'Aut qui magna tempor', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(180, 25, 'App\\Models\\Organisation', 'place', 'Quas ut in quos cons', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(181, 25, 'App\\Models\\Organisation', 'post_code', 'In nostrud minim tem', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(182, 25, 'App\\Models\\Organisation', 'state', 'Aperiam sapiente ali', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(183, 25, 'App\\Models\\Organisation', 'company_email', 'qihu@mailinator.com', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(184, 25, 'App\\Models\\Organisation', 'company_phone', 'Boyle Langley Co', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(185, 25, 'App\\Models\\Organisation', 'company_twitter', 'Day and Jarvis LLC', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(186, 25, 'App\\Models\\Organisation', 'company_tiktok', 'Lott and Logan LLC', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(187, 25, 'App\\Models\\Organisation', 'company_youtube', 'Bolton and Beasley Traders', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(188, 25, 'App\\Models\\Organisation', 'company_fb', 'Conrad Dodson Trading', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(189, 25, 'App\\Models\\Organisation', 'niche', 'Commodo laborum Nos', '2024-01-10 19:57:32', '2024-01-10 19:57:32'),
(190, 26, 'App\\Models\\Organisation', 'street', 'Aut qui magna tempor', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(191, 26, 'App\\Models\\Organisation', 'place', 'Quas ut in quos cons', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(192, 26, 'App\\Models\\Organisation', 'post_code', 'In nostrud minim tem', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(193, 26, 'App\\Models\\Organisation', 'state', 'Aperiam sapiente ali', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(194, 26, 'App\\Models\\Organisation', 'company_email', 'qihu@mailinator.com', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(195, 26, 'App\\Models\\Organisation', 'company_phone', 'Boyle Langley Co', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(196, 26, 'App\\Models\\Organisation', 'company_twitter', 'Day and Jarvis LLC', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(197, 26, 'App\\Models\\Organisation', 'company_tiktok', 'Lott and Logan LLC', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(198, 26, 'App\\Models\\Organisation', 'company_youtube', 'Bolton and Beasley Traders', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(199, 26, 'App\\Models\\Organisation', 'company_fb', 'Conrad Dodson Trading', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(200, 26, 'App\\Models\\Organisation', 'niche', 'Commodo laborum Nos', '2024-01-10 19:58:31', '2024-01-10 19:58:31'),
(201, 26, 'App\\Models\\Organisation', 'country', 'Afghanistan', '2024-01-10 20:17:10', '2024-01-10 20:17:10'),
(202, 19, 'App\\Models\\Client', 'l_name', 'Freeman', '2024-01-10 20:17:24', '2024-01-10 20:17:24'),
(203, 27, 'App\\Models\\Organisation', 'street', 'Cumque sit rerum exp', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(204, 27, 'App\\Models\\Organisation', 'place', 'Porro optio dolore', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(205, 27, 'App\\Models\\Organisation', 'post_code', 'Qui ipsum dolorem it', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(206, 27, 'App\\Models\\Organisation', 'state', 'Omnis laboris blandi', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(207, 27, 'App\\Models\\Organisation', 'company_email', 'semugypon@mailinator.com', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(208, 27, 'App\\Models\\Organisation', 'company_phone', 'Kim Compton Traders', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(209, 27, 'App\\Models\\Organisation', 'company_twitter', 'Burt and Roberson Plc', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(210, 27, 'App\\Models\\Organisation', 'company_tiktok', 'Cleveland and Ashley Trading', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(211, 27, 'App\\Models\\Organisation', 'company_youtube', 'Knox Malone Traders', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(212, 27, 'App\\Models\\Organisation', 'company_fb', 'Sullivan and Wood Co', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(213, 27, 'App\\Models\\Organisation', 'niche', 'Omnis ad consequuntu', '2024-01-10 20:17:44', '2024-01-10 20:17:44'),
(214, 28, 'App\\Models\\Organisation', 'street', 'Adipisicing perferen', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(215, 28, 'App\\Models\\Organisation', 'place', 'Quia dolores quaerat', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(216, 28, 'App\\Models\\Organisation', 'post_code', 'Est labore ducimus', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(217, 28, 'App\\Models\\Organisation', 'state', 'Sunt reiciendis ulla', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(218, 28, 'App\\Models\\Organisation', 'country', 'Norway', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(219, 28, 'App\\Models\\Organisation', 'company_email', 'byhy@mailinator.com', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(220, 28, 'App\\Models\\Organisation', 'company_phone', 'Hamilton Valdez Trading', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(221, 28, 'App\\Models\\Organisation', 'company_twitter', 'Weiss and Barton Trading', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(222, 28, 'App\\Models\\Organisation', 'company_tiktok', 'Cox and Malone LLC', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(223, 28, 'App\\Models\\Organisation', 'company_youtube', 'Conner Bonner Inc', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(224, 28, 'App\\Models\\Organisation', 'company_fb', 'Haney Key Inc', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(225, 28, 'App\\Models\\Organisation', 'niche', 'Excepteur ipsa in v', '2024-01-10 20:22:30', '2024-01-10 20:22:30'),
(226, 29, 'App\\Models\\Organisation', 'street', 'Barisal sadar road', '2024-01-10 20:46:35', '2024-01-10 20:46:35'),
(227, 29, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:46:35', '2024-01-10 20:46:35'),
(228, 29, 'App\\Models\\Organisation', 'post_code', '8200', '2024-01-10 20:46:35', '2024-01-10 20:46:35'),
(229, 29, 'App\\Models\\Organisation', 'company_email', 'tabitaislamprapti@gmail.com', '2024-01-10 20:46:35', '2024-01-10 20:46:35'),
(230, 29, 'App\\Models\\Organisation', 'company_phone', '01305065919', '2024-01-10 20:46:35', '2024-01-10 20:46:35'),
(231, 30, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(232, 30, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(233, 30, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(234, 30, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(235, 30, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(236, 31, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(237, 31, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(238, 31, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(239, 31, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(240, 31, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40'),
(241, 32, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(242, 32, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(243, 32, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(244, 32, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(245, 32, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(246, 33, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(247, 33, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(248, 33, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(249, 33, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(250, 33, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13'),
(251, 34, 'App\\Models\\Organisation', 'street', 'Voluptas minim irure', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(252, 34, 'App\\Models\\Organisation', 'place', 'Officia dolores dele', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(253, 34, 'App\\Models\\Organisation', 'post_code', 'Aut sed officia qui', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(254, 34, 'App\\Models\\Organisation', 'company_email', 'lylofizexa@mailinator.com', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(255, 34, 'App\\Models\\Organisation', 'company_phone', 'Andrews Bruce Inc', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(256, 35, 'App\\Models\\Organisation', 'street', 'Voluptas minim irure', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(257, 35, 'App\\Models\\Organisation', 'place', 'Officia dolores dele', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(258, 35, 'App\\Models\\Organisation', 'post_code', 'Aut sed officia qui', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(259, 35, 'App\\Models\\Organisation', 'company_email', 'lylofizexa@mailinator.com', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(260, 35, 'App\\Models\\Organisation', 'company_phone', 'Andrews Bruce Inc', '2024-01-10 20:56:45', '2024-01-10 20:56:45'),
(261, 36, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15'),
(262, 36, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15'),
(263, 36, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15'),
(264, 36, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15'),
(265, 36, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15'),
(266, 37, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24'),
(267, 37, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24'),
(268, 37, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24'),
(269, 37, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24'),
(270, 37, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24'),
(271, 38, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:09:16', '2024-01-10 21:09:16'),
(272, 38, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:09:16', '2024-01-10 21:09:16'),
(273, 38, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:09:16', '2024-01-10 21:09:16'),
(274, 38, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:09:16', '2024-01-10 21:09:16'),
(275, 38, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:09:16', '2024-01-10 21:09:16'),
(276, 39, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:09:23', '2024-01-10 21:09:23'),
(277, 39, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:09:23', '2024-01-10 21:09:23'),
(278, 39, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:09:23', '2024-01-10 21:09:23'),
(279, 39, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:09:23', '2024-01-10 21:09:23'),
(280, 39, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:09:23', '2024-01-10 21:09:23'),
(281, 40, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49'),
(282, 40, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49'),
(283, 40, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49'),
(284, 40, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49'),
(285, 40, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49'),
(286, 41, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(287, 41, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(288, 41, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(289, 41, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(290, 41, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(291, 42, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(292, 42, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(293, 42, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(294, 42, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(295, 42, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10'),
(296, 43, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(297, 43, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(298, 43, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(299, 43, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(300, 43, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(301, 44, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(302, 44, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(303, 44, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(304, 44, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(305, 44, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28'),
(306, 45, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12'),
(307, 45, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12'),
(308, 45, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12'),
(309, 45, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12'),
(310, 45, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12'),
(311, 46, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53'),
(312, 46, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53'),
(313, 46, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53'),
(314, 46, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53'),
(315, 46, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53'),
(316, 47, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05'),
(317, 47, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05'),
(318, 47, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05'),
(319, 47, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05'),
(320, 47, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05'),
(321, 48, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23'),
(322, 48, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23'),
(323, 48, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23'),
(324, 48, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23'),
(325, 48, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23'),
(326, 49, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16'),
(327, 49, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16'),
(328, 49, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16'),
(329, 49, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16'),
(330, 49, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16'),
(331, 50, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53'),
(332, 50, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53'),
(333, 50, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53'),
(334, 50, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53'),
(335, 50, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53'),
(336, 51, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54'),
(337, 51, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54'),
(338, 51, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54'),
(339, 51, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54'),
(340, 51, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54'),
(341, 52, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(342, 53, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(343, 52, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(344, 53, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(345, 53, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(346, 52, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(347, 52, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(348, 53, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(349, 52, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(350, 53, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(351, 54, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(352, 55, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(353, 54, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(354, 55, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(355, 56, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(356, 54, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(357, 55, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(358, 56, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(359, 54, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(360, 55, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(361, 56, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(362, 54, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(363, 55, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(364, 56, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(365, 56, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57'),
(366, 57, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:24:16', '2024-01-10 21:24:16'),
(367, 57, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:24:17', '2024-01-10 21:24:17'),
(368, 57, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:24:17', '2024-01-10 21:24:17'),
(369, 57, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:24:17', '2024-01-10 21:24:17'),
(370, 57, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:24:17', '2024-01-10 21:24:17'),
(371, 58, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19'),
(372, 58, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19'),
(373, 58, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19'),
(374, 58, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19'),
(375, 58, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19'),
(376, 59, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48'),
(377, 59, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48'),
(378, 59, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48'),
(379, 59, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48'),
(380, 59, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48'),
(381, 60, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03'),
(382, 60, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03'),
(383, 60, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03'),
(384, 60, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03'),
(385, 60, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03'),
(386, 61, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59'),
(387, 61, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59'),
(388, 61, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59'),
(389, 61, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59'),
(390, 61, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59'),
(391, 62, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37'),
(392, 62, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37'),
(393, 62, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37'),
(394, 62, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37'),
(395, 62, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37'),
(396, 63, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01'),
(397, 63, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01'),
(398, 63, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01'),
(399, 63, 'App\\Models\\Organisation', 'company_email', NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01'),
(400, 63, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01'),
(401, 64, 'App\\Models\\Organisation', 'street', 'test', '2024-01-10 22:08:22', '2024-01-10 22:08:22'),
(402, 64, 'App\\Models\\Organisation', 'place', NULL, '2024-01-10 22:08:22', '2024-01-10 22:08:22'),
(403, 64, 'App\\Models\\Organisation', 'post_code', NULL, '2024-01-10 22:08:22', '2024-01-10 22:08:22'),
(404, 64, 'App\\Models\\Organisation', 'company_email', 'test@gmail.com', '2024-01-10 22:08:22', '2024-01-10 22:08:22'),
(405, 64, 'App\\Models\\Organisation', 'company_phone', NULL, '2024-01-10 22:08:22', '2024-01-10 22:08:22'),
(406, 65, 'App\\Models\\Organisation', 'street', 'Laudantium velit v', '2024-01-10 22:11:44', '2024-01-10 22:11:44'),
(407, 65, 'App\\Models\\Organisation', 'place', 'Non minim aliquam am', '2024-01-10 22:11:44', '2024-01-10 22:11:44'),
(408, 65, 'App\\Models\\Organisation', 'post_code', 'Ex aliquip ea dolore', '2024-01-10 22:11:44', '2024-01-10 22:11:44'),
(409, 65, 'App\\Models\\Organisation', 'company_email', 'syceqi@mailinator.com', '2024-01-10 22:11:44', '2024-01-10 22:11:44'),
(410, 65, 'App\\Models\\Organisation', 'company_phone', 'Gallegos Owen Inc', '2024-01-10 22:11:44', '2024-01-10 22:11:44'),
(411, 66, 'App\\Models\\Organisation', 'street', 'Cum id et sit labor', '2024-01-10 22:17:54', '2024-01-10 22:17:54'),
(412, 66, 'App\\Models\\Organisation', 'place', 'Aut rerum beatae lab', '2024-01-10 22:17:54', '2024-01-10 22:17:54'),
(413, 66, 'App\\Models\\Organisation', 'post_code', 'Labore sint quia asp', '2024-01-10 22:17:54', '2024-01-10 22:17:54'),
(414, 66, 'App\\Models\\Organisation', 'company_email', 'leze@mailinator.com', '2024-01-10 22:17:54', '2024-01-10 22:17:54'),
(415, 66, 'App\\Models\\Organisation', 'company_phone', 'Henry and Brock Traders', '2024-01-10 22:17:54', '2024-01-10 22:17:54'),
(416, 67, 'App\\Models\\Organisation', 'street', 'Quo enim id in quis', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(417, 67, 'App\\Models\\Organisation', 'place', 'Beatae error obcaeca', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(418, 67, 'App\\Models\\Organisation', 'post_code', 'Veniam quisquam sim', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(419, 67, 'App\\Models\\Organisation', 'state', 'Voluptas quaerat sit', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(420, 67, 'App\\Models\\Organisation', 'country', 'Cambodia', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(421, 67, 'App\\Models\\Organisation', 'company_email', 'qunohoban@mailinator.com', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(422, 67, 'App\\Models\\Organisation', 'company_phone', 'Villarreal Lane Associates', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(423, 67, 'App\\Models\\Organisation', 'company_twitter', 'Macias Pate Inc', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(424, 67, 'App\\Models\\Organisation', 'company_tiktok', 'Shannon Snider Trading', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(425, 67, 'App\\Models\\Organisation', 'company_youtube', 'Clemons Osborne Co', '2024-01-10 22:21:09', '2024-01-10 22:21:09'),
(426, 67, 'App\\Models\\Organisation', 'company_fb', 'Leblanc Mckenzie Inc', '2024-01-10 22:21:10', '2024-01-10 22:21:10'),
(427, 67, 'App\\Models\\Organisation', 'niche', 'Ipsam dolores ex ape', '2024-01-10 22:21:10', '2024-01-10 22:21:10'),
(428, 68, 'App\\Models\\Organisation', 'street', 'hello', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(429, 68, 'App\\Models\\Organisation', 'place', 'barisal', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(430, 68, 'App\\Models\\Organisation', 'post_code', '8200', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(431, 68, 'App\\Models\\Organisation', 'state', 'Barisal', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(432, 68, 'App\\Models\\Organisation', 'country', 'Bangladesh', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(433, 68, 'App\\Models\\Organisation', 'company_email', 'tea@gmail.com', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(434, 68, 'App\\Models\\Organisation', 'company_phone', '48935y3489', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(435, 68, 'App\\Models\\Organisation', 'company_twitter', 'jfsgh', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(436, 68, 'App\\Models\\Organisation', 'company_tiktok', 'fdsfsd', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(437, 68, 'App\\Models\\Organisation', 'company_youtube', 'hdfdis', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(438, 68, 'App\\Models\\Organisation', 'company_fb', 'dfsd', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(439, 68, 'App\\Models\\Organisation', 'niche', 'sdfsdf', '2024-01-10 22:30:31', '2024-01-10 22:30:31'),
(440, 69, 'App\\Models\\Organisation', 'street', 'Officia ut et possim', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(441, 69, 'App\\Models\\Organisation', 'place', 'Id sint aspernatur r', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(442, 69, 'App\\Models\\Organisation', 'post_code', 'Veniam et mollit iu', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(443, 69, 'App\\Models\\Organisation', 'state', 'Adipisci voluptatem', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(444, 69, 'App\\Models\\Organisation', 'country', 'Poland', '2024-01-10 22:34:36', '2024-01-10 22:34:36');
INSERT INTO `metas` (`id`, `metable_id`, `metable_type`, `column_name`, `column_value`, `created_at`, `updated_at`) VALUES
(445, 69, 'App\\Models\\Organisation', 'company_email', 'satutivyla@mailinator.com', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(446, 69, 'App\\Models\\Organisation', 'company_phone', 'Osborne and Riddle Trading', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(447, 69, 'App\\Models\\Organisation', 'company_twitter', 'Bush and Solis Plc', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(448, 69, 'App\\Models\\Organisation', 'company_tiktok', 'Gomez Cruz Associates', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(449, 69, 'App\\Models\\Organisation', 'company_youtube', 'Bridges Farrell Associates', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(450, 69, 'App\\Models\\Organisation', 'company_fb', 'Wallace and Hood Plc', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(451, 69, 'App\\Models\\Organisation', 'niche', 'Veritatis aute venia', '2024-01-10 22:34:36', '2024-01-10 22:34:36'),
(452, 70, 'App\\Models\\Organisation', 'street', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(453, 70, 'App\\Models\\Organisation', 'place', 'Baridal', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(454, 70, 'App\\Models\\Organisation', 'post_code', '23432', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(455, 70, 'App\\Models\\Organisation', 'state', 'Barisal', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(456, 70, 'App\\Models\\Organisation', 'country', 'Belarus', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(457, 70, 'App\\Models\\Organisation', 'company_email', 'testzdhhz@gmail.com', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(458, 70, 'App\\Models\\Organisation', 'company_phone', '013050202', '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(459, 70, 'App\\Models\\Organisation', 'company_twitter', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(460, 70, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(461, 70, 'App\\Models\\Organisation', 'company_youtube', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(462, 70, 'App\\Models\\Organisation', 'company_fb', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(463, 70, 'App\\Models\\Organisation', 'niche', NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22'),
(464, 71, 'App\\Models\\Organisation', 'street', 'Quibusdam quia qui s', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(465, 71, 'App\\Models\\Organisation', 'place', 'Quia a hic dignissim', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(466, 71, 'App\\Models\\Organisation', 'post_code', 'Itaque hic quam corp', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(467, 71, 'App\\Models\\Organisation', 'state', 'Aliquid rerum conseq', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(468, 71, 'App\\Models\\Organisation', 'country', 'Anguilla', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(469, 71, 'App\\Models\\Organisation', 'company_email', 'wagaj@mailinator.com', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(470, 71, 'App\\Models\\Organisation', 'company_phone', 'Lloyd and Moore Traders', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(471, 71, 'App\\Models\\Organisation', 'company_twitter', 'Cobb Norton LLC', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(472, 71, 'App\\Models\\Organisation', 'company_tiktok', 'Rogers Black Co', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(473, 71, 'App\\Models\\Organisation', 'company_youtube', 'Michael Pierce Inc', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(474, 71, 'App\\Models\\Organisation', 'company_fb', 'Wells and Hale Plc', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(475, 71, 'App\\Models\\Organisation', 'niche', 'Perferendis adipisci', '2024-01-10 22:36:34', '2024-01-10 22:36:34'),
(476, 72, 'App\\Models\\Organisation', 'street', 'Iure rerum voluptate', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(477, 72, 'App\\Models\\Organisation', 'place', 'Aliquid consequatur', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(478, 72, 'App\\Models\\Organisation', 'post_code', 'Aute tempore ut cup', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(479, 72, 'App\\Models\\Organisation', 'state', 'Ipsam duis veniam a', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(480, 72, 'App\\Models\\Organisation', 'country', 'Honduras', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(481, 72, 'App\\Models\\Organisation', 'company_email', 'xyxukywomy@mailinator.com', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(482, 72, 'App\\Models\\Organisation', 'company_phone', 'Wilson and Lee Plc', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(483, 72, 'App\\Models\\Organisation', 'company_twitter', 'Morse and Lara Co', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(484, 72, 'App\\Models\\Organisation', 'company_tiktok', 'Parker Haynes LLC', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(485, 72, 'App\\Models\\Organisation', 'company_youtube', 'Collins and Bray Co', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(486, 72, 'App\\Models\\Organisation', 'company_fb', 'Koch Hale Co', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(487, 72, 'App\\Models\\Organisation', 'niche', 'Expedita delectus s', '2024-01-10 22:44:25', '2024-01-10 22:44:25'),
(488, 73, 'App\\Models\\Organisation', 'street', 'Est optio dolore v', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(489, 73, 'App\\Models\\Organisation', 'place', 'Est velit exercitati', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(490, 73, 'App\\Models\\Organisation', 'post_code', 'Cupiditate est sed s', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(491, 73, 'App\\Models\\Organisation', 'state', 'In nobis consectetur', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(492, 73, 'App\\Models\\Organisation', 'country', 'Eritrea', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(493, 73, 'App\\Models\\Organisation', 'company_email', 'cigynep@mailinator.com', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(494, 73, 'App\\Models\\Organisation', 'company_phone', 'Lindsey Camacho Inc', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(495, 73, 'App\\Models\\Organisation', 'company_twitter', 'Floyd Daniels Associates', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(496, 73, 'App\\Models\\Organisation', 'company_tiktok', 'Mccall Finch Associates', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(497, 73, 'App\\Models\\Organisation', 'company_youtube', 'Byrd Jacobs Associates', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(498, 73, 'App\\Models\\Organisation', 'company_fb', 'Humphrey Garrett Inc', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(499, 73, 'App\\Models\\Organisation', 'niche', 'Sit laborum ut eu te', '2024-01-10 22:44:56', '2024-01-10 22:44:56'),
(500, 74, 'App\\Models\\Organisation', 'street', 'crf', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(501, 74, 'App\\Models\\Organisation', 'place', 'barisal', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(502, 74, 'App\\Models\\Organisation', 'post_code', 'barisal', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(503, 74, 'App\\Models\\Organisation', 'state', 'bari', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(504, 74, 'App\\Models\\Organisation', 'country', 'Andorra', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(505, 74, 'App\\Models\\Organisation', 'company_email', 'test123@gmail.com', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(506, 74, 'App\\Models\\Organisation', 'company_phone', '23423423', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(507, 74, 'App\\Models\\Organisation', 'company_twitter', NULL, '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(508, 74, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(509, 74, 'App\\Models\\Organisation', 'company_youtube', NULL, '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(510, 74, 'App\\Models\\Organisation', 'company_fb', NULL, '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(511, 74, 'App\\Models\\Organisation', 'niche', 'bari', '2024-01-10 22:46:49', '2024-01-10 22:46:49'),
(512, 75, 'App\\Models\\Organisation', 'street', 'Dolore id ut ipsum', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(513, 75, 'App\\Models\\Organisation', 'place', 'Nihil pariatur Haru', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(514, 75, 'App\\Models\\Organisation', 'post_code', 'Pariatur In reprehe', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(515, 75, 'App\\Models\\Organisation', 'state', 'Expedita tenetur adi', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(516, 75, 'App\\Models\\Organisation', 'country', 'Austria', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(517, 75, 'App\\Models\\Organisation', 'company_email', 'tecuxohu@mailinator.com', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(518, 75, 'App\\Models\\Organisation', 'company_phone', 'Golden and Arnold Plc', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(519, 75, 'App\\Models\\Organisation', 'company_twitter', 'Boyer Hale Inc', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(520, 75, 'App\\Models\\Organisation', 'company_tiktok', 'Good and Mcleod Inc', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(521, 75, 'App\\Models\\Organisation', 'company_youtube', 'Lane and Flowers Traders', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(522, 75, 'App\\Models\\Organisation', 'company_fb', 'Kline Haney Traders', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(523, 75, 'App\\Models\\Organisation', 'niche', 'Enim eum veniam aut', '2024-01-10 22:49:34', '2024-01-10 22:49:34'),
(524, 76, 'App\\Models\\Organisation', 'street', 'Ducimus itaque blan', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(525, 76, 'App\\Models\\Organisation', 'place', 'Qui sapiente sed vol', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(526, 76, 'App\\Models\\Organisation', 'post_code', 'Voluptatum consequat', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(527, 76, 'App\\Models\\Organisation', 'state', 'Velit laboris est no', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(528, 76, 'App\\Models\\Organisation', 'country', 'Montenegro', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(529, 76, 'App\\Models\\Organisation', 'company_email', 'jolifar@mailinator.com', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(530, 76, 'App\\Models\\Organisation', 'company_phone', 'Walters and Finley Inc', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(531, 76, 'App\\Models\\Organisation', 'company_twitter', 'Crosby Zamora Traders', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(532, 76, 'App\\Models\\Organisation', 'company_tiktok', 'Pickett Mercer Traders', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(533, 76, 'App\\Models\\Organisation', 'company_youtube', 'Marks Rios Co', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(534, 76, 'App\\Models\\Organisation', 'company_fb', 'Drake and Juarez Plc', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(535, 76, 'App\\Models\\Organisation', 'niche', 'Voluptatem deserunt', '2024-01-10 22:50:16', '2024-01-10 22:50:16'),
(536, 77, 'App\\Models\\Organisation', 'street', 'Sunt sit ullamco et', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(537, 77, 'App\\Models\\Organisation', 'place', 'Dicta ea eligendi in', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(538, 77, 'App\\Models\\Organisation', 'post_code', 'Voluptates odio sit', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(539, 77, 'App\\Models\\Organisation', 'state', 'Mollit dolorum quos', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(540, 77, 'App\\Models\\Organisation', 'country', 'Slovenia', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(541, 77, 'App\\Models\\Organisation', 'company_email', 'citic@mailinator.com', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(542, 77, 'App\\Models\\Organisation', 'company_phone', 'Acevedo Patterson LLC', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(543, 77, 'App\\Models\\Organisation', 'company_twitter', 'Baxter Knowles Associates', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(544, 77, 'App\\Models\\Organisation', 'company_tiktok', 'Santos Spears Traders', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(545, 77, 'App\\Models\\Organisation', 'company_youtube', 'Cooke Miles Inc', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(546, 77, 'App\\Models\\Organisation', 'company_fb', 'Leonard Ellison Co', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(547, 77, 'App\\Models\\Organisation', 'niche', 'Rerum ut exercitatio', '2024-01-10 22:52:35', '2024-01-10 22:52:35'),
(548, 78, 'App\\Models\\Organisation', 'street', 'Esse est consequatu', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(549, 78, 'App\\Models\\Organisation', 'place', 'Quia iste nesciunt', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(550, 78, 'App\\Models\\Organisation', 'post_code', 'Minus similique quo', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(551, 78, 'App\\Models\\Organisation', 'state', 'Voluptas eu doloribu', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(552, 78, 'App\\Models\\Organisation', 'country', 'Botswana', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(553, 78, 'App\\Models\\Organisation', 'company_email', 'tywafaq@mailinator.com', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(554, 78, 'App\\Models\\Organisation', 'company_phone', 'Hampton Rollins Traders', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(555, 78, 'App\\Models\\Organisation', 'company_twitter', 'Wyatt Dominguez Trading', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(556, 78, 'App\\Models\\Organisation', 'company_tiktok', 'Briggs Sparks Trading', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(557, 78, 'App\\Models\\Organisation', 'company_youtube', 'Mckenzie and Roberts LLC', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(558, 78, 'App\\Models\\Organisation', 'company_fb', 'Fleming Morales Co', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(559, 78, 'App\\Models\\Organisation', 'niche', 'Sit elit est id of', '2024-01-10 22:53:48', '2024-01-10 22:53:48'),
(560, 79, 'App\\Models\\Organisation', 'street', 'crg', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(561, 79, 'App\\Models\\Organisation', 'place', 'barisal', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(562, 79, 'App\\Models\\Organisation', 'post_code', '120', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(563, 79, 'App\\Models\\Organisation', 'state', 'bari', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(564, 79, 'App\\Models\\Organisation', 'country', 'Belgium', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(565, 79, 'App\\Models\\Organisation', 'company_email', 'hello123@gmail.com', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(566, 79, 'App\\Models\\Organisation', 'company_phone', '05120', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(567, 79, 'App\\Models\\Organisation', 'company_twitter', NULL, '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(568, 79, 'App\\Models\\Organisation', 'company_tiktok', '21342', '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(569, 79, 'App\\Models\\Organisation', 'company_youtube', NULL, '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(570, 79, 'App\\Models\\Organisation', 'company_fb', NULL, '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(571, 79, 'App\\Models\\Organisation', 'niche', NULL, '2024-01-10 22:54:44', '2024-01-10 22:54:44'),
(572, 20, 'App\\Models\\Client', 'l_name', 'test', '2024-01-10 23:00:37', '2024-01-10 23:00:37'),
(573, 20, 'App\\Models\\Client', 'position', '123', '2024-01-10 23:00:37', '2024-01-10 23:00:37'),
(574, 80, 'App\\Models\\Organisation', 'street', 'Dolores laborum nost', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(575, 80, 'App\\Models\\Organisation', 'place', 'barisal', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(576, 80, 'App\\Models\\Organisation', 'post_code', '123', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(577, 80, 'App\\Models\\Organisation', 'state', 'baridasdas', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(578, 80, 'App\\Models\\Organisation', 'country', 'Bangladesh', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(579, 80, 'App\\Models\\Organisation', 'company_email', 'dani@gmail.com', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(580, 80, 'App\\Models\\Organisation', 'company_phone', '+19582857697', '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(581, 80, 'App\\Models\\Organisation', 'company_twitter', NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(582, 80, 'App\\Models\\Organisation', 'company_tiktok', NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(583, 80, 'App\\Models\\Organisation', 'company_youtube', NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(584, 80, 'App\\Models\\Organisation', 'company_fb', NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(585, 80, 'App\\Models\\Organisation', 'niche', NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32'),
(586, 21, 'App\\Models\\Client', 'l_name', 'rest', '2024-01-10 23:27:34', '2024-01-10 23:37:29'),
(587, 21, 'App\\Models\\Client', 'position', 'test', '2024-01-10 23:27:34', '2024-01-10 23:41:45'),
(588, 22, 'App\\Models\\Client', 'l_name', 'Hays', '2024-01-10 23:35:12', '2024-01-10 23:35:12'),
(589, 22, 'App\\Models\\Client', 'position', 'Explicabo Suscipit', '2024-01-10 23:35:12', '2024-01-10 23:35:12'),
(590, 23, 'App\\Models\\Client', 'l_name', 'Cainx', '2024-01-10 23:42:04', '2024-01-11 04:10:49'),
(591, 23, 'App\\Models\\Client', 'position', 'Vero', '2024-01-10 23:42:04', '2024-01-10 23:42:21'),
(592, 24, 'App\\Models\\Client', 'l_name', NULL, '2024-01-10 23:45:12', '2024-01-10 23:45:12'),
(593, 24, 'App\\Models\\Client', 'position', NULL, '2024-01-10 23:45:12', '2024-01-10 23:45:12'),
(594, 9, 'App\\Models\\Lead', 'close_date', NULL, '2024-01-10 23:57:40', '2024-01-10 23:57:40'),
(595, 20, 'App\\Models\\Deal', 'close_date', '1992-02-03', '2024-01-11 00:08:28', '2024-01-11 00:08:28'),
(596, 21, 'App\\Models\\Deal', 'close_date', '2008-11-06', '2024-01-11 00:09:12', '2024-01-11 00:09:12'),
(597, 22, 'App\\Models\\Deal', 'close_date', '1971-09-11', '2024-01-11 00:21:04', '2024-01-11 00:21:04'),
(598, 25, 'App\\Models\\Client', 'l_name', 'test', '2024-01-11 02:52:29', '2024-01-11 02:52:45'),
(599, 81, 'App\\Models\\Organisation', 'street', 'Sit aliqua Volupta', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(600, 81, 'App\\Models\\Organisation', 'place', 'Accusamus ex est ex', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(601, 81, 'App\\Models\\Organisation', 'post_code', 'Laborum elit eum a', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(602, 81, 'App\\Models\\Organisation', 'state', 'Omnis corporis est', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(603, 81, 'App\\Models\\Organisation', 'country', 'Tonga', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(604, 81, 'App\\Models\\Organisation', 'company_email', 'nulypecy@mailinator.com', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(605, 81, 'App\\Models\\Organisation', 'company_phone', 'Frederick and Ramirez Traders', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(606, 81, 'App\\Models\\Organisation', 'company_twitter', 'Duke and Russo Co', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(607, 81, 'App\\Models\\Organisation', 'company_tiktok', 'Leach Watson Inc', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(608, 81, 'App\\Models\\Organisation', 'company_youtube', 'Holland and Roberson Inc', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(609, 81, 'App\\Models\\Organisation', 'company_fb', 'Vincent and Hoffman Traders', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(610, 81, 'App\\Models\\Organisation', 'niche', 'Ipsam earum et animi', '2024-01-11 03:25:13', '2024-01-11 03:25:13'),
(611, 82, 'App\\Models\\Organisation', 'street', 'Veniam et ut atque', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(612, 82, 'App\\Models\\Organisation', 'place', 'Eum est tempor repr', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(613, 82, 'App\\Models\\Organisation', 'post_code', 'Commodo assumenda fu', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(614, 82, 'App\\Models\\Organisation', 'state', 'Nihil a beatae minim', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(615, 82, 'App\\Models\\Organisation', 'country', 'Sierra Leone', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(616, 82, 'App\\Models\\Organisation', 'company_email', 'tewyce@mailinator.com', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(617, 82, 'App\\Models\\Organisation', 'company_phone', 'Potter Sykes Co', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(618, 82, 'App\\Models\\Organisation', 'company_twitter', 'Pitts and Salinas Trading', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(619, 82, 'App\\Models\\Organisation', 'company_tiktok', 'Meadows and Strickland Trading', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(620, 82, 'App\\Models\\Organisation', 'company_youtube', 'Gay Dickson Plc', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(621, 82, 'App\\Models\\Organisation', 'company_fb', 'Wilder and Randolph Associates', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(622, 82, 'App\\Models\\Organisation', 'niche', 'Sed provident ab qu', '2024-01-11 03:55:40', '2024-01-11 03:55:40'),
(623, 83, 'App\\Models\\Organisation', 'street', 'Veniam et ut atque', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(624, 83, 'App\\Models\\Organisation', 'place', 'Eum est tempor repr', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(625, 83, 'App\\Models\\Organisation', 'post_code', 'Commodo assumenda fu', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(626, 83, 'App\\Models\\Organisation', 'state', 'Nihil a beatae minim', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(627, 83, 'App\\Models\\Organisation', 'country', 'Sierra Leone', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(628, 83, 'App\\Models\\Organisation', 'company_email', 'tewyce@mailinator.com', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(629, 83, 'App\\Models\\Organisation', 'company_phone', 'Potter Sykes Co', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(630, 83, 'App\\Models\\Organisation', 'company_twitter', 'Pitts and Salinas Trading', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(631, 83, 'App\\Models\\Organisation', 'company_tiktok', 'Meadows and Strickland Trading', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(632, 83, 'App\\Models\\Organisation', 'company_youtube', 'Gay Dickson Plc', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(633, 83, 'App\\Models\\Organisation', 'company_fb', 'Wilder and Randolph Associates', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(634, 83, 'App\\Models\\Organisation', 'niche', 'Sed provident ab qu', '2024-01-11 03:56:38', '2024-01-11 03:56:38'),
(635, 84, 'App\\Models\\Organisation', 'street', 'Veniam et ut atque', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(636, 84, 'App\\Models\\Organisation', 'place', 'Eum est tempor repr', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(637, 84, 'App\\Models\\Organisation', 'post_code', 'Commodo assumenda fu', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(638, 84, 'App\\Models\\Organisation', 'state', 'Nihil a beatae minim', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(639, 84, 'App\\Models\\Organisation', 'country', 'Sierra Leone', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(640, 84, 'App\\Models\\Organisation', 'company_email', 'tewyce@mailinator.com', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(641, 84, 'App\\Models\\Organisation', 'company_phone', 'Potter Sykes Co', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(642, 84, 'App\\Models\\Organisation', 'company_twitter', 'Pitts and Salinas Trading', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(643, 84, 'App\\Models\\Organisation', 'company_tiktok', 'Meadows and Strickland Trading', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(644, 84, 'App\\Models\\Organisation', 'company_youtube', 'Gay Dickson Plc', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(645, 84, 'App\\Models\\Organisation', 'company_fb', 'Wilder and Randolph Associates', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(646, 84, 'App\\Models\\Organisation', 'niche', 'Sed provident ab qu', '2024-01-11 03:57:29', '2024-01-11 03:57:29'),
(647, 85, 'App\\Models\\Organisation', 'street', 'Veniam et ut atque', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(648, 85, 'App\\Models\\Organisation', 'place', 'Eum est tempor repr', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(649, 85, 'App\\Models\\Organisation', 'post_code', 'Commodo assumenda fu', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(650, 85, 'App\\Models\\Organisation', 'state', 'Nihil a beatae minim', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(651, 85, 'App\\Models\\Organisation', 'country', 'Sierra Leone', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(652, 85, 'App\\Models\\Organisation', 'company_email', 'tewyce@mailinator.com', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(653, 85, 'App\\Models\\Organisation', 'company_phone', 'Potter Sykes Co', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(654, 85, 'App\\Models\\Organisation', 'company_twitter', 'Pitts and Salinas Trading', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(655, 85, 'App\\Models\\Organisation', 'company_tiktok', 'Meadows and Strickland Trading', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(656, 85, 'App\\Models\\Organisation', 'company_youtube', 'Gay Dickson Plc', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(657, 85, 'App\\Models\\Organisation', 'company_fb', 'Wilder and Randolph Associates', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(658, 85, 'App\\Models\\Organisation', 'niche', 'Sed provident ab qu', '2024-01-11 03:57:55', '2024-01-11 03:57:55'),
(659, 86, 'App\\Models\\Organisation', 'street', 'Veniam et ut atque', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(660, 86, 'App\\Models\\Organisation', 'place', 'Eum est tempor repr', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(661, 86, 'App\\Models\\Organisation', 'post_code', 'Commodo assumenda fu', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(662, 86, 'App\\Models\\Organisation', 'state', 'Nihil a beatae minim', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(663, 86, 'App\\Models\\Organisation', 'country', 'Sierra Leone', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(664, 86, 'App\\Models\\Organisation', 'company_email', 'tewyce@mailinator.com', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(665, 86, 'App\\Models\\Organisation', 'company_phone', 'Potter Sykes Co', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(666, 86, 'App\\Models\\Organisation', 'company_twitter', 'Pitts and Salinas Trading', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(667, 86, 'App\\Models\\Organisation', 'company_tiktok', 'Meadows and Strickland Trading', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(668, 86, 'App\\Models\\Organisation', 'company_youtube', 'Gay Dickson Plc', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(669, 86, 'App\\Models\\Organisation', 'company_fb', 'Wilder and Randolph Associates', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(670, 86, 'App\\Models\\Organisation', 'niche', 'Sed provident ab qu', '2024-01-11 03:59:34', '2024-01-11 03:59:34'),
(671, 26, 'App\\Models\\Client', 'l_name', 'Blanchard', '2024-01-11 04:11:01', '2024-01-11 04:11:01'),
(672, 26, 'App\\Models\\Client', 'position', 'Eum nemo qui rerum l', '2024-01-11 04:11:01', '2024-01-11 04:11:01'),
(673, 27, 'App\\Models\\Client', 'l_name', '34r2wrewrf', '2024-01-11 04:17:57', '2024-01-11 04:17:57'),
(674, 27, 'App\\Models\\Client', 'position', '123', '2024-01-11 04:17:57', '2024-01-11 04:17:57'),
(675, 87, 'App\\Models\\Organisation', 'street', 'Quasi ex ipsa irure', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(676, 87, 'App\\Models\\Organisation', 'place', 'Sit fugiat dolor i', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(677, 87, 'App\\Models\\Organisation', 'post_code', 'Magni non ullamco fa', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(678, 87, 'App\\Models\\Organisation', 'state', 'Aliquip ut voluptate', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(679, 87, 'App\\Models\\Organisation', 'country', 'Pitcairn', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(680, 87, 'App\\Models\\Organisation', 'company_email', 'vyjohon@mailinator.com', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(681, 87, 'App\\Models\\Organisation', 'company_phone', 'Lynch Jackson Trading', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(682, 87, 'App\\Models\\Organisation', 'company_twitter', 'Mckenzie and Sloan Trading', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(683, 87, 'App\\Models\\Organisation', 'company_tiktok', 'Stout and Stokes Traders', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(684, 87, 'App\\Models\\Organisation', 'company_youtube', 'Hendricks Martinez Inc', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(685, 87, 'App\\Models\\Organisation', 'company_fb', 'Mitchell and Ford Plc', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(686, 87, 'App\\Models\\Organisation', 'niche', 'Nulla sint asperior', '2024-01-11 04:19:11', '2024-01-11 04:19:11'),
(687, 88, 'App\\Models\\Organisation', 'street', 'Tempore Nam veniam', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(688, 88, 'App\\Models\\Organisation', 'place', 'Temporibus duis in e', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(689, 88, 'App\\Models\\Organisation', 'post_code', 'Non molestiae quam f', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(690, 88, 'App\\Models\\Organisation', 'state', 'Atque culpa numquam', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(691, 88, 'App\\Models\\Organisation', 'country', 'Netherlands', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(692, 88, 'App\\Models\\Organisation', 'company_email', 'cawunizo@mailinator.com', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(693, 88, 'App\\Models\\Organisation', 'company_phone', 'Downs and Carr LLC', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(694, 88, 'App\\Models\\Organisation', 'company_twitter', 'Stevenson Briggs LLC', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(695, 88, 'App\\Models\\Organisation', 'company_tiktok', 'Herring Tran Traders', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(696, 88, 'App\\Models\\Organisation', 'company_youtube', 'Mckay and Ramos Traders', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(697, 88, 'App\\Models\\Organisation', 'company_fb', 'England and Fox LLC', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(698, 88, 'App\\Models\\Organisation', 'niche', 'Dolor amet ea esse', '2024-01-11 04:24:16', '2024-01-11 04:24:16'),
(699, 89, 'App\\Models\\Organisation', 'street', 'Consectetur quo tem', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(700, 89, 'App\\Models\\Organisation', 'place', 'Magni exercitation u', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(701, 89, 'App\\Models\\Organisation', 'post_code', 'Sunt quia et perspic', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(702, 89, 'App\\Models\\Organisation', 'state', 'Ducimus dolores ea', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(703, 89, 'App\\Models\\Organisation', 'country', 'Solomon Islands', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(704, 89, 'App\\Models\\Organisation', 'company_email', 'gunatahemi@mailinator.com', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(705, 89, 'App\\Models\\Organisation', 'company_phone', 'Robles Fulton Trading', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(706, 89, 'App\\Models\\Organisation', 'company_twitter', 'Faulkner and Vaughan Plc', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(707, 89, 'App\\Models\\Organisation', 'company_tiktok', 'Bradshaw Mays LLC', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(708, 89, 'App\\Models\\Organisation', 'company_youtube', 'Holland Thornton Co', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(709, 89, 'App\\Models\\Organisation', 'company_fb', 'Fischer and Barker Inc', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(710, 89, 'App\\Models\\Organisation', 'niche', 'Laboriosam et ducim', '2024-01-11 04:26:05', '2024-01-11 04:26:05'),
(711, 90, 'App\\Models\\Organisation', 'street', 'Quas ut soluta amet', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(712, 90, 'App\\Models\\Organisation', 'place', 'Perferendis culpa v', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(713, 90, 'App\\Models\\Organisation', 'post_code', 'Et id exercitatione', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(714, 90, 'App\\Models\\Organisation', 'state', 'Voluptas accusantium', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(715, 90, 'App\\Models\\Organisation', 'country', 'Myanmar', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(716, 90, 'App\\Models\\Organisation', 'company_email', 'gigakuk@mailinator.com', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(717, 90, 'App\\Models\\Organisation', 'company_phone', 'Reynolds Nichols Traders', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(718, 90, 'App\\Models\\Organisation', 'company_twitter', 'Watson Vega LLC', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(719, 90, 'App\\Models\\Organisation', 'company_tiktok', 'Jarvis and Gardner Trading', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(720, 90, 'App\\Models\\Organisation', 'company_youtube', 'Saunders Mcneil Co', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(721, 90, 'App\\Models\\Organisation', 'company_fb', 'Glass Leach Inc', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(722, 90, 'App\\Models\\Organisation', 'niche', 'Omnis possimus at s', '2024-01-11 04:29:05', '2024-01-11 04:29:05'),
(723, 91, 'App\\Models\\Organisation', 'street', 'Officia et ut blandi', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(724, 91, 'App\\Models\\Organisation', 'place', 'Aliqua Sint exercit', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(725, 91, 'App\\Models\\Organisation', 'post_code', 'Sed sint aut volupta', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(726, 91, 'App\\Models\\Organisation', 'state', 'Cum sunt harum et es', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(727, 91, 'App\\Models\\Organisation', 'country', 'Comoros', '2024-01-11 04:30:13', '2024-01-16 01:03:40'),
(728, 91, 'App\\Models\\Organisation', 'company_email', 'najuxukyj@mailinator.com', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(729, 91, 'App\\Models\\Organisation', 'company_phone', 'Fischer and Shelton Associates', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(730, 91, 'App\\Models\\Organisation', 'company_twitter', 'Weiss Mejia Traders', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(731, 91, 'App\\Models\\Organisation', 'company_tiktok', 'Sosa Guthrie Inc', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(732, 91, 'App\\Models\\Organisation', 'company_youtube', 'Bartlett Mclean LLC', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(733, 91, 'App\\Models\\Organisation', 'company_fb', 'Schroeder Sanchez Associates', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(734, 91, 'App\\Models\\Organisation', 'niche', 'Magni velit quam dol', '2024-01-11 04:30:13', '2024-01-11 04:30:13'),
(735, 92, 'App\\Models\\Organisation', 'street', 'Soluta quibusdam id', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(736, 92, 'App\\Models\\Organisation', 'place', 'Aliqua Sit modi eni', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(737, 92, 'App\\Models\\Organisation', 'post_code', 'Iste quae quia quis', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(738, 92, 'App\\Models\\Organisation', 'state', 'Dolor quae officiis', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(739, 92, 'App\\Models\\Organisation', 'country', 'Argentina', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(740, 92, 'App\\Models\\Organisation', 'company_email', 'qaxymi@mailinator.com', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(741, 92, 'App\\Models\\Organisation', 'company_phone', 'Mccarty Fulton Traders', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(742, 92, 'App\\Models\\Organisation', 'company_twitter', 'Salazar Michael Inc', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(743, 92, 'App\\Models\\Organisation', 'company_tiktok', 'Fitzpatrick and Hull LLC', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(744, 92, 'App\\Models\\Organisation', 'company_youtube', 'Walter and Farley Co', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(745, 92, 'App\\Models\\Organisation', 'company_fb', 'Norman Benson LLC', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(746, 92, 'App\\Models\\Organisation', 'niche', 'Sed mollitia aliquip', '2024-02-01 06:00:17', '2024-02-01 06:00:17'),
(747, 30, 'App\\Models\\Client', 'l_name', 'Mohammad Rivers', '2024-02-01 06:05:25', '2024-02-01 06:05:25'),
(748, 30, 'App\\Models\\Client', 'position', 'test', '2024-02-01 06:05:25', '2024-02-01 06:05:25'),
(749, 31, 'App\\Models\\Client', 'l_name', 'teafds', '2024-02-01 06:06:07', '2024-02-01 06:06:07'),
(750, 31, 'App\\Models\\Client', 'position', 'sfsdv', '2024-02-01 06:06:07', '2024-02-01 06:06:07'),
(751, 32, 'App\\Models\\Client', 'l_name', 'dfsdfs', '2024-02-01 06:09:51', '2024-02-01 06:09:51'),
(752, 32, 'App\\Models\\Client', 'position', 'sfsdf', '2024-02-01 06:09:51', '2024-02-01 06:09:51'),
(753, 33, 'App\\Models\\Client', 'l_name', 'rgrgegeg', '2024-02-01 06:17:04', '2024-02-01 06:17:04'),
(754, 33, 'App\\Models\\Client', 'position', 'erger', '2024-02-01 06:17:04', '2024-02-01 06:17:04'),
(755, 34, 'App\\Models\\Client', 'l_name', 'ergrgeger', '2024-02-01 06:35:26', '2024-02-01 06:35:26'),
(756, 34, 'App\\Models\\Client', 'position', NULL, '2024-02-01 06:35:26', '2024-02-01 06:35:26'),
(757, 93, 'App\\Models\\Organisation', 'street', 'Obcaecati id nostru', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(758, 93, 'App\\Models\\Organisation', 'place', 'Distinctio Porro eu', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(759, 93, 'App\\Models\\Organisation', 'post_code', 'Optio minus consequ', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(760, 93, 'App\\Models\\Organisation', 'state', 'Deserunt est dolor u', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(761, 93, 'App\\Models\\Organisation', 'country', 'Nigeria', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(762, 93, 'App\\Models\\Organisation', 'company_email', 'wubet@mailinator.com', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(763, 93, 'App\\Models\\Organisation', 'company_phone', 'Vaughn Duncan LLC', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(764, 93, 'App\\Models\\Organisation', 'company_twitter', 'Warren Wiley Traders', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(765, 93, 'App\\Models\\Organisation', 'company_tiktok', 'Hinton Phelps Associates', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(766, 93, 'App\\Models\\Organisation', 'company_youtube', 'Buck French Plc', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(767, 93, 'App\\Models\\Organisation', 'company_fb', 'Sampson Ryan Trading', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(768, 93, 'App\\Models\\Organisation', 'niche', 'Commodi voluptatem l', '2024-02-01 07:05:03', '2024-02-01 07:05:03'),
(769, 23, 'App\\Models\\Deal', 'close_date', '2024-02-02', '2024-02-01 07:19:29', '2024-02-01 07:19:29'),
(770, 24, 'App\\Models\\Deal', 'close_date', '2024-02-10', '2024-02-01 07:19:44', '2024-02-01 07:19:44'),
(771, 94, 'App\\Models\\Organisation', 'street', 'Quae et pariatur Ob', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(772, 94, 'App\\Models\\Organisation', 'place', 'Magna asperiores lib', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(773, 94, 'App\\Models\\Organisation', 'post_code', 'Porro perspiciatis', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(774, 94, 'App\\Models\\Organisation', 'state', 'Eius iste qui in sae', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(775, 94, 'App\\Models\\Organisation', 'country', NULL, '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(776, 94, 'App\\Models\\Organisation', 'company_email', 'vocehesy@mailinator.com', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(777, 94, 'App\\Models\\Organisation', 'company_phone', 'Mack Lyons Pls', '2024-02-10 00:35:06', '2024-02-10 00:38:25'),
(778, 94, 'App\\Models\\Organisation', 'company_twitter', 'Small Mayer Associates', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(779, 94, 'App\\Models\\Organisation', 'company_tiktok', 'Peck and Huffman Plc', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(780, 94, 'App\\Models\\Organisation', 'company_youtube', 'Todd and Humphrey LLC', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(781, 94, 'App\\Models\\Organisation', 'company_fb', 'Miles Kerr Inc', '2024-02-10 00:35:06', '2024-02-10 00:35:06'),
(782, 94, 'App\\Models\\Organisation', 'niche', 'Voluptatem Voluptat', '2024-02-10 00:35:06', '2024-02-10 00:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2023_11_17_181054_create_clients_table', 1),
(30, '2023_11_18=7_183625_create_organisations_table', 1),
(31, '2023_11_18_055934_create_leads_table', 1),
(32, '2023_11_18_184214_create_peoples_table', 1),
(33, '2023_11_23_104024_create_notes_table', 1),
(34, '2023_11_23_105815_create_activities_table', 1),
(35, '2023_11_23_150359_create_tasks_table', 1),
(36, '2023_11_24_134552_create_calls_table', 1),
(37, '2023_11_24_180420_create_meetings_table', 1),
(38, '2023_11_24_182521_create_lunches_table', 1),
(39, '2023_11_24_183852_create_files_table', 1),
(40, '2023_11_25_050532_create_deals_table', 1),
(41, '2023_11_26_141937_create_products_table', 1),
(42, '2023_11_27_041857_create_product_prices_table', 1),
(43, '2023_12_06_112503_add_address_to_organisations_table', 1),
(44, '2023_12_06_121009_add_organisation_id_to_clients_table', 1),
(45, '2023_12_08_035043_add_user_id_to_categories_table', 1),
(46, '2023_12_08_035813_add_user_id_to_organisations_table', 1),
(47, '2023_12_08_062328_add_unit_price_id_to_products_table', 1),
(48, '2023_12_08_075209_add_category_id_to_deals_table', 1),
(49, '2023_12_20_042548_create_metas_table', 1),
(50, '2023_12_22_063608_create_labels_table', 1),
(51, '2023_12_28_125634_add_client_id_to_leads_table', 1),
(52, '2023_12_28_131843_add_client_id_to_meetings_table', 1),
(53, '2023_12_28_133012_add_client_id_to_lunches_table', 1),
(54, '2024_01_11_094724_create_client_organisations_table', 2),
(55, '2024_01_11_095848_create_client_organisation_table', 3),
(58, '2024_02_01_082207_create_packages_table', 4),
(59, '2024_02_01_112710_add_package_id_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noteable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noteable_id` bigint UNSIGNED NOT NULL,
  `pinned` tinyint(1) NOT NULL DEFAULT '0',
  `noted_at` timestamp NULL DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `external_id`, `name`, `description`, `label`, `user_created_id`, `user_updated_id`, `user_deleted_id`, `user_restored_id`, `user_owner_id`, `created_at`, `updated_at`, `deleted_at`, `address`, `user_id`) VALUES
(1, 'fa8e9249-21d1-4fa9-ba74-4d5c396a0d74', 'test', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-30 12:52:33', '2023-12-30 12:52:33', NULL, NULL, 3),
(2, '2071bac9-d664-441f-9287-a029cbedd724', 'Ahmed', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-30 13:00:42', '2023-12-30 13:00:42', NULL, NULL, 3),
(3, 'ea0e6b67-956f-494c-9562-3e6a7113b378', 'Kamal Shepard', NULL, '2', NULL, NULL, NULL, NULL, 1, '2023-12-30 13:04:24', '2023-12-30 13:04:24', NULL, NULL, 3),
(4, '52be14e9-f3cb-4249-a898-afb9a7e2483b', 'Riya moni', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-30 13:09:00', '2023-12-30 13:09:00', NULL, NULL, 3),
(5, '82de611b-768a-4cf5-b813-ff50fd0749cf', 'ahmeds', NULL, '2', NULL, NULL, NULL, NULL, 2, '2023-12-30 23:29:57', '2023-12-31 00:50:06', NULL, NULL, 3),
(6, 'b994ff75-4932-46bf-bd0b-6d610b291b0c', 'test', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-31 06:01:36', '2023-12-31 06:01:36', NULL, NULL, 3),
(7, '5b40b152-9752-487a-b228-8ba9a19e4367', 'test', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-31 06:01:36', '2023-12-31 06:01:36', NULL, NULL, 3),
(8, '4a8236cd-041c-4ea8-829f-95241cf1d1c5', 'test', NULL, '1', NULL, NULL, NULL, NULL, 3, '2023-12-31 06:01:48', '2023-12-31 06:01:48', NULL, NULL, 3),
(9, '8677f32e-33b1-4970-aaa4-691f139310e6', 'Amir Gould', NULL, '1', NULL, NULL, NULL, NULL, 3, '2024-01-01 03:57:17', '2024-01-01 03:57:17', NULL, NULL, 2),
(10, '677e6a7b-5e23-455d-b1dd-7e8380f52abc', 'Fuller Dotson', NULL, '1', NULL, NULL, NULL, NULL, 1, '2024-01-01 04:30:13', '2024-01-01 04:30:13', NULL, NULL, 2),
(11, '9d2a187e-eade-446a-879b-4ada2023f674', 'Samuel Buckley', NULL, '2', NULL, NULL, NULL, NULL, 2, '2024-01-01 04:37:46', '2024-01-01 04:37:46', NULL, NULL, 2),
(12, 'e8449fc8-2300-4d11-bd5b-6bb3fd524abf', 'Keelie Preston', NULL, '2', NULL, NULL, NULL, NULL, 2, '2024-01-01 04:42:27', '2024-01-01 04:42:27', NULL, NULL, 2),
(13, 'c82edcf2-e9b3-4e82-931e-12dfe0c9d734', 'Ross Duffy', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-01 06:46:40', '2024-01-01 06:46:40', NULL, NULL, 2),
(14, 'e62b242a-d1a0-4231-b655-6253906894fd', 'Hilda Stafford', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-01 06:47:18', '2024-01-01 06:47:18', NULL, NULL, 2),
(15, '3b83c229-dc7e-4526-ad33-75a298a450c2', 'Dai Contreras', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-01 22:53:41', '2024-01-01 22:53:41', NULL, NULL, 2),
(16, '969bbca3-13f9-4657-b884-271a0d411ba4', 'hello', NULL, '1', NULL, NULL, NULL, NULL, 2, '2024-01-02 00:11:48', '2024-01-02 00:11:48', NULL, NULL, 2),
(17, '16879061-0256-4228-a9c1-06d24dcc884f', 'Katelyn Anthony', NULL, '1', NULL, NULL, NULL, NULL, 2, '2024-01-02 23:48:30', '2024-01-02 23:48:30', NULL, NULL, 2),
(19, '34e3a905-d95d-4188-a3b4-770db486f1eb', 'Reece Owens', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-04 07:20:14', '2024-01-04 07:20:14', NULL, NULL, 2),
(21, 'f5e9e741-a9cc-4b16-9971-76a93d07b9bd', 'Teagan Kennedy', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-04 10:56:48', '2024-01-04 10:56:48', NULL, NULL, 2),
(22, 'ecbe2184-f6b4-4463-ae83-ea9fa69afbdf', 'Kitra Barnes', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-04 11:01:51', '2024-01-04 11:01:51', NULL, NULL, 2),
(23, '40c49dbb-4e7a-418e-9d5a-24a39ea71476', 'Yardley Holloway', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-09 19:10:21', '2024-01-09 19:10:21', NULL, NULL, 2),
(24, '55415226-1c6f-46e3-97a5-c032202d3b76', 'Daniel Dodson', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-09 20:51:20', '2024-01-09 20:51:20', NULL, NULL, 2),
(25, 'af65bb76-a20d-4b47-bfb5-8e5ce7c6168e', 'Sonia Barnett', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 19:57:32', '2024-01-10 19:57:32', NULL, NULL, 2),
(26, '4b880e0c-a8d0-4c8e-880b-3d64ad7bf4c8', 'Sonia Barnet', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 19:58:31', '2024-01-10 20:17:10', NULL, NULL, 2),
(27, '71f140fd-11f8-4fe9-855c-6c2bcde5bea0', 'Eliana Monroe', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:17:44', '2024-01-10 20:17:44', NULL, NULL, 2),
(28, 'bc6d5c5c-ff95-45bc-bb08-081c8035358c', 'Patience Foster', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:22:30', '2024-01-10 20:22:30', NULL, NULL, 2),
(29, 'b0388d0b-52cd-44cc-b889-cd4c603cb10d', 'test rest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:46:35', '2024-01-10 20:46:35', NULL, NULL, 2),
(30, '98491ec0-438c-4c8f-9401-0ff5c624f6bf', 'test', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40', NULL, NULL, 2),
(31, '5d17aa3f-cb5f-44ec-8d03-fae3177f21df', 'test', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:51:40', '2024-01-10 20:51:40', NULL, NULL, 2),
(32, '364eb8c4-03f5-4da8-978c-fa7c82fb6839', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13', NULL, NULL, 2),
(33, '4f262900-02c3-4b6f-8d94-326e27289068', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:54:13', '2024-01-10 20:54:13', NULL, NULL, 2),
(34, 'a8ec9fc5-38cc-482a-a12f-176cbbacb79d', 'Herman Cain', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:56:45', '2024-01-10 20:56:45', NULL, NULL, 2),
(35, '4a27651c-8218-4d44-89bb-db7ffff1e264', 'Herman Cain', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:56:45', '2024-01-10 20:56:45', NULL, NULL, 2),
(36, 'dcded87e-c492-4b61-bb36-b6542e6f4430', 'test', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:58:15', '2024-01-10 20:58:15', NULL, NULL, 2),
(37, '340e5b09-384d-47b5-acc9-fc8b8684d185', 'test', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 20:58:24', '2024-01-10 20:58:24', NULL, NULL, 2),
(39, 'a8321caa-0d78-4930-befb-611f2ee8ed14', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:09:22', '2024-01-10 21:09:22', NULL, NULL, 2),
(40, '4a4714a9-3311-462a-af6e-f90018e04401', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:09:49', '2024-01-10 21:09:49', NULL, NULL, 2),
(41, 'b2dfd426-fabe-4901-8ca9-4c7478771b47', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10', NULL, NULL, 2),
(42, '9e225daf-15d6-4d17-8b47-4efbde563c9f', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:12:10', '2024-01-10 21:12:10', NULL, NULL, 2),
(43, '940bb27c-8812-4729-aad1-b480b1142a94', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28', NULL, NULL, 2),
(44, 'e3be2671-993b-4332-a2f2-c8138b095d2a', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:13:28', '2024-01-10 21:13:28', NULL, NULL, 2),
(45, '6de8f219-5843-486a-996c-1e7449599806', 'testst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:14:12', '2024-01-10 21:14:12', NULL, NULL, 2),
(46, 'dea3cf6e-a839-4a24-a0be-1ace7030413f', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:14:53', '2024-01-10 21:14:53', NULL, NULL, 2),
(47, '57a2cd88-ba79-44bc-ba71-3104144fc456', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:15:05', '2024-01-10 21:15:05', NULL, NULL, 2),
(48, 'ebe3d865-5f5d-494e-8a05-a163e1a047e4', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:16:23', '2024-01-10 21:16:23', NULL, NULL, 2),
(49, '7cd59930-0caf-4abe-98ff-981ab9abe3ed', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:19:16', '2024-01-10 21:19:16', NULL, NULL, 2),
(50, 'a947072c-e598-408a-8331-6836b49d4795', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:21:53', '2024-01-10 21:21:53', NULL, NULL, 2),
(51, 'f6821e63-bff2-40fd-8c7f-0ca65448b5f7', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:54', '2024-01-10 21:23:54', NULL, NULL, 2),
(52, 'd3c51779-31a2-497a-95e0-f079025a7f97', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:56', '2024-01-10 21:23:56', NULL, NULL, 2),
(53, '22c73f1d-db2b-4694-bf16-e5b172781ed2', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:56', '2024-01-10 21:23:56', NULL, NULL, 2),
(54, '9fc7d9f2-905b-4e74-ac80-7e4b21de6e88', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57', NULL, NULL, 2),
(55, '49b8b01d-5843-476d-9f9a-4c72a1350592', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57', NULL, NULL, 2),
(56, '0b7c8aa3-d4ff-4e80-90c8-874a2da0aece', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:23:57', '2024-01-10 21:23:57', NULL, NULL, 2),
(57, '4fec8d1e-e98a-46f0-afbf-19ddac218511', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:24:16', '2024-01-10 21:24:16', NULL, NULL, 2),
(58, '2bb0533d-a244-4b66-b0dc-d3d50210cb30', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:24:19', '2024-01-10 21:24:19', NULL, NULL, 2),
(59, '4e8680c7-6878-4eaf-b972-6aab61cbb8c8', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:24:48', '2024-01-10 21:24:48', NULL, NULL, 2),
(60, '29777c0a-edf5-4f10-9148-857869a905ff', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:56:03', '2024-01-10 21:56:03', NULL, NULL, 2),
(61, 'fe2aa797-0ae3-4897-ba53-12f70596f88a', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 21:57:59', '2024-01-10 21:57:59', NULL, NULL, 2),
(62, 'b6c0dc65-c470-4d89-86e6-6cab14aad4d6', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:05:37', '2024-01-10 22:05:37', NULL, NULL, 2),
(63, 'f0ba2010-b634-45f7-ba41-734f3b400c69', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:07:01', '2024-01-10 22:07:01', NULL, NULL, 2),
(64, '5858d5e2-8e79-403e-aa90-d99d3b224530', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:08:22', '2024-01-10 22:08:22', NULL, NULL, 2),
(65, '7bb3cf1e-8dfe-4f36-bfd0-513dd1f9d07d', 'Carla Finley', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:11:44', '2024-01-10 22:11:44', NULL, NULL, 2),
(66, '693bc437-6504-4db5-b40b-0d12fa7d665a', 'Tasha Avery', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:17:54', '2024-01-10 22:17:54', NULL, NULL, 2),
(67, '4327c9af-ce78-4b10-acf0-a6cec9a93ed4', 'Cedric Estes', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:21:09', '2024-01-10 22:21:09', NULL, NULL, 2),
(68, '69cdce86-52e4-4048-bd41-b9ffa3d6cef4', 'hello test', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:30:31', '2024-01-10 22:30:31', NULL, NULL, 2),
(69, '61f9530d-3eee-4fdf-9c82-9b8e3bcf5834', 'Martha Harvey', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:34:36', '2024-01-10 22:34:36', NULL, NULL, 2),
(70, '968791b4-d770-404a-b864-14f701b0128d', 'test@gamil.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:35:22', '2024-01-10 22:35:22', NULL, NULL, 2),
(71, 'e2ffd926-d30e-459c-b633-e3496813bbc3', 'Shelby Ray', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:36:34', '2024-01-10 22:36:34', NULL, NULL, 2),
(72, 'a4c8ec56-fa29-4e9a-af4e-35eb81b224a3', 'Rhea Jensen', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:44:25', '2024-01-10 22:44:25', NULL, NULL, 2),
(73, 'da08f85c-7ab8-4a37-b46d-4047269eab07', 'Tasha Hutchinson', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:44:56', '2024-01-10 22:44:56', NULL, NULL, 2),
(74, '950d24b2-0db6-4d8c-a8f5-6d9a607eb4e3', 'test`132', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:46:49', '2024-01-10 22:46:49', NULL, NULL, 2),
(75, 'b8335c6d-3793-405e-86e5-d5b40a0706e5', 'Denise Rivera', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:49:34', '2024-01-10 22:49:34', NULL, NULL, 2),
(76, '2b8f6599-e7b2-436d-b061-936f4617a1e7', 'Arsenio Wolfe', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:50:16', '2024-01-10 22:50:16', NULL, NULL, 2),
(77, 'ad0aedbe-c080-41dc-8771-d254fa6cec9b', 'Damon White', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:52:35', '2024-01-10 22:52:35', NULL, NULL, 2),
(78, 'd214a672-6691-4fd9-bc4c-d07828227e7d', 'Margaret Stanton', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:53:48', '2024-01-10 22:53:48', NULL, NULL, 2),
(79, '01edcf29-dc65-4de0-b264-6f940c22cb00', 'hello123w', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 22:54:44', '2024-01-10 22:54:44', NULL, NULL, 2),
(80, 'b7cdc270-7811-4ce9-b8d4-3fefb6d8e8a1', 'Daniel Dodson', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-10 23:03:32', '2024-01-10 23:03:32', NULL, NULL, 2),
(81, '9ede798a-fffa-4283-b5d0-8674d78d6a9c', 'Jenna Mccall', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 03:25:13', '2024-01-11 03:25:13', NULL, NULL, 2),
(86, '5d5a2c19-723f-43a5-88f0-751e7461e5b8', 'Deirdre Paul', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-01-11 03:59:34', '2024-01-11 03:59:34', NULL, NULL, 2),
(87, 'f9701fa6-ae92-4149-91f0-f9133c8fb11b', 'Palmer Carney', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 04:19:10', '2024-01-11 04:19:10', NULL, NULL, 2),
(88, '514aa9d1-f687-4cf6-ada0-9c8c33dbb673', 'Elvis Maldonado', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 04:24:16', '2024-01-11 04:24:16', NULL, NULL, 2),
(89, '2be6f421-5b24-4c1e-b5bf-04ad4f739081', 'Caesar Dalton', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 04:26:05', '2024-01-11 04:26:05', NULL, NULL, 2),
(90, 'bd0aba03-31be-4eaf-be0e-d410e4316044', 'Mariam Strickland', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 04:29:05', '2024-01-11 04:29:05', NULL, NULL, 2),
(91, '14790bdc-f588-42d8-8848-77aa4fd2f222', 'Karleigh Joseph', NULL, '1', NULL, NULL, NULL, NULL, NULL, '2024-01-11 04:30:13', '2024-01-11 04:30:13', NULL, NULL, 2),
(92, '4d0328ff-7061-4645-9cf5-434375a699a7', 'Quincy Riggs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-01 06:00:17', '2024-02-01 06:00:17', NULL, NULL, 5),
(93, '17c97ff5-02a4-4b55-abaa-6e2dea282021', 'Chaney Park', NULL, '2', NULL, NULL, NULL, NULL, NULL, '2024-02-01 07:05:03', '2024-02-01 07:05:03', NULL, NULL, 5),
(94, '9d101d0f-fa34-4cb3-bf8e-4907c1887537', 'Bo Stuar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 00:35:06', '2024-02-10 00:38:18', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` bigint NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `client_limit` int DEFAULT NULL,
  `organization_limit` int DEFAULT NULL,
  `deal_limit` int DEFAULT NULL,
  `lead_limit` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `status`, `client_limit`, `organization_limit`, `deal_limit`, `lead_limit`, `created_at`, `updated_at`) VALUES
(1, 'test', '<p>test</p>', 100, 1, 10, 10, 10, 10, '2024-02-01 05:42:43', '2024-02-01 05:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2023-12-30 12:45:04', '2023-12-30 12:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maiden_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `organisation_id` bigint UNSIGNED DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `external_id`, `title`, `first_name`, `middle_name`, `last_name`, `maiden_name`, `birthday`, `gender`, `description`, `organisation_id`, `user_created_id`, `user_updated_id`, `user_deleted_id`, `user_restored_id`, `user_owner_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, NULL, 'Nadine Chapman', NULL, 'Xenos Bradley', NULL, NULL, 'male', NULL, 5, 3, NULL, NULL, NULL, NULL, '2023-12-31 05:01:32', '2023-12-31 05:01:32', NULL),
(3, NULL, NULL, 'X Ahmed', NULL, 'Tamim', NULL, NULL, 'female', NULL, 5, 3, NULL, NULL, NULL, NULL, '2023-12-31 05:01:59', '2023-12-31 05:41:42', NULL),
(4, NULL, NULL, 'Nadine Chapman', NULL, 'Xenos Bradley', NULL, NULL, 'female', NULL, 5, 3, NULL, NULL, NULL, NULL, '2023-12-31 05:28:49', '2023-12-31 05:41:32', NULL),
(5, NULL, NULL, 'test', NULL, 'test2', NULL, NULL, 'female', NULL, 5, 3, NULL, NULL, NULL, NULL, '2023-12-31 05:41:53', '2023-12-31 05:41:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(2, 'browse_bread', NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(3, 'browse_database', NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(4, 'browse_media', NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(5, 'browse_compass', NULL, '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(6, 'browse_menus', 'menus', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(7, 'read_menus', 'menus', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(8, 'edit_menus', 'menus', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(9, 'add_menus', 'menus', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(10, 'delete_menus', 'menus', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(11, 'browse_roles', 'roles', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(12, 'read_roles', 'roles', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(13, 'edit_roles', 'roles', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(14, 'add_roles', 'roles', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(15, 'delete_roles', 'roles', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(16, 'browse_users', 'users', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(17, 'read_users', 'users', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(18, 'edit_users', 'users', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(19, 'add_users', 'users', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(20, 'delete_users', 'users', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(21, 'browse_settings', 'settings', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(22, 'read_settings', 'settings', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(23, 'edit_settings', 'settings', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(24, 'add_settings', 'settings', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(25, 'delete_settings', 'settings', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(26, 'browse_categories', 'categories', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(27, 'read_categories', 'categories', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(28, 'edit_categories', 'categories', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(29, 'add_categories', 'categories', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(30, 'delete_categories', 'categories', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(31, 'browse_posts', 'posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(32, 'read_posts', 'posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(33, 'edit_posts', 'posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(34, 'add_posts', 'posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(35, 'delete_posts', 'posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(36, 'browse_pages', 'pages', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(37, 'read_pages', 'pages', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(38, 'edit_pages', 'pages', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(39, 'add_pages', 'pages', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(40, 'delete_pages', 'pages', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(41, 'browse_labels', 'labels', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(42, 'read_labels', 'labels', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(43, 'edit_labels', 'labels', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(44, 'add_labels', 'labels', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(45, 'delete_labels', 'labels', '2023-12-30 12:51:37', '2023-12-30 12:51:37'),
(46, 'browse_packages', 'packages', '2024-02-01 03:43:58', '2024-02-01 03:43:58'),
(47, 'read_packages', 'packages', '2024-02-01 03:43:58', '2024-02-01 03:43:58'),
(48, 'edit_packages', 'packages', '2024-02-01 03:43:58', '2024-02-01 03:43:58'),
(49, 'add_packages', 'packages', '2024-02-01 03:43:58', '2024-02-01 03:43:58'),
(50, 'delete_packages', 'packages', '2024-02-01 03:43:58', '2024-02-01 03:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2023-12-30 12:45:04', '2023-12-30 12:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_rate` decimal(8,2) DEFAULT NULL,
  `product_category_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `unit_price` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_variation_id` bigint UNSIGNED DEFAULT NULL,
  `unit_price` int DEFAULT NULL,
  `cost_per_unit` int DEFAULT NULL,
  `direct_cost` int DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2023-12-30 12:45:03', '2023-12-30 12:45:03'),
(2, 'user', 'Normal User', '2023-12-30 12:45:03', '2023-12-30 12:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `due_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `reminder_email` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_sms` tinyint(1) NOT NULL DEFAULT '0',
  `taskable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taskable_id` bigint UNSIGNED DEFAULT NULL,
  `user_created_id` bigint UNSIGNED DEFAULT NULL,
  `user_updated_id` bigint UNSIGNED DEFAULT NULL,
  `user_deleted_id` bigint UNSIGNED DEFAULT NULL,
  `user_restored_id` bigint UNSIGNED DEFAULT NULL,
  `user_owner_id` bigint UNSIGNED DEFAULT NULL,
  `user_assigned_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2023-12-30 12:45:04', '2023-12-30 12:45:04'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2023-12-30 12:45:04', '2023-12-30 12:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `monthly_charge` int DEFAULT NULL,
  `client_limit` int DEFAULT NULL,
  `organization_limit` int DEFAULT NULL,
  `deal_limit` int DEFAULT NULL,
  `lead_limit` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `package_id`, `monthly_charge`, `client_limit`, `organization_limit`, `deal_limit`, `lead_limit`) VALUES
(1, 1, 'Erasmus Huffman', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2023-12-30 12:41:29', '2023-12-30 12:41:29', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Amir Ramirez', 'byjo@mailinator.com', 'users/default.png', NULL, '$2y$10$aXMHx5q2l.W9mT1LKp3sguLUwAMtUeq4u3VNDzfOXAJn72QKvyKaS', NULL, NULL, '2023-12-30 12:50:00', '2023-12-30 12:50:00', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Todd Fry', 'solirujoly@mailinator.com', 'users/default.png', NULL, '$2y$10$nj6fesxPUvMslFN5HVyFd.kTIsE51/55HIyu9.Xb8O49umVY/3x92', NULL, NULL, '2023-12-30 12:52:15', '2023-12-30 12:52:15', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Scarlett Frederick', 'sihalisu@mailinator.com', 'users/default.png', NULL, '$2y$10$Nilu5eqApK1mCc0ryrdb4.Un07JcRp1lkJ.QREt1V5f6rEUt/kIhi', NULL, NULL, '2024-02-01 05:44:08', '2024-02-01 05:44:08', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'Jessica Brown', 'qutub@mailinator.com', 'users/default.png', NULL, '$2y$10$LbwZ7z4R7R9kVymoOyq9yOseEmncAbPN87jbw4Q5UkAcCaIPTASGi', NULL, NULL, '2024-02-01 05:47:22', '2024-02-01 05:47:22', 1, 100, 2, 2, 2, 1),
(6, 2, 'Idona Herring', 'muxytevih@mailinator.com', 'users/default.png', NULL, '$2y$10$4on7jWR1.jnO1KFCkTZB7.wyQnGpXALXpd8RvmZqlIIwR/QjotQOW', NULL, NULL, '2024-02-10 00:34:07', '2024-02-10 00:34:07', 1, 100, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_causeable_type_causeable_id_index` (`causeable_type`,`causeable_id`),
  ADD KEY `activities_timelineable_type_timelineable_id_index` (`timelineable_type`,`timelineable_id`),
  ADD KEY `activities_recordable_type_recordable_id_index` (`recordable_type`,`recordable_id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_callable_type_callable_id_index` (`callable_type`,`callable_id`),
  ADD KEY `calls_user_created_id_foreign` (`user_created_id`),
  ADD KEY `calls_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `calls_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `calls_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `calls_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `calls_user_assigned_id_foreign` (`user_assigned_id`),
  ADD KEY `calls_team_id_index` (`team_id`),
  ADD KEY `calls_client_id_foreign` (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`),
  ADD KEY `clients_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `clients_team_id_index` (`team_id`),
  ADD KEY `clients_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `client_organisation`
--
ALTER TABLE `client_organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_organisation_client_id_foreign` (`client_id`),
  ADD KEY `client_organisation_organisation_id_foreign` (`organisation_id`);

--
-- Indexes for table `client_organisations`
--
ALTER TABLE `client_organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_organisations_client_id_foreign` (`client_id`),
  ADD KEY `client_organisations_organisation_id_foreign` (`organisation_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_user_id_foreign` (`user_id`),
  ADD KEY `deals_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `deals_lead_id_index` (`lead_id`),
  ADD KEY `deals_client_id_index` (`client_id`),
  ADD KEY `deals_organisation_id_index` (`organisation_id`),
  ADD KEY `deals_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_fileable_type_fileable_id_index` (`fileable_type`,`fileable_id`),
  ADD KEY `files_user_created_id_foreign` (`user_created_id`),
  ADD KEY `files_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `files_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `files_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `files_team_id_index` (`team_id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_user_id_foreign` (`user_id`),
  ADD KEY `leads_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `leads_client_id_index` (`client_id`),
  ADD KEY `leads_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `lunches`
--
ALTER TABLE `lunches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lunches_lunchable_type_lunchable_id_index` (`lunchable_type`,`lunchable_id`),
  ADD KEY `lunches_user_created_id_foreign` (`user_created_id`),
  ADD KEY `lunches_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `lunches_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `lunches_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `lunches_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `lunches_user_assigned_id_foreign` (`user_assigned_id`),
  ADD KEY `lunches_team_id_index` (`team_id`),
  ADD KEY `lunches_client_id_foreign` (`client_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_meetingable_type_meetingable_id_index` (`meetingable_type`,`meetingable_id`),
  ADD KEY `meetings_user_created_id_foreign` (`user_created_id`),
  ADD KEY `meetings_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `meetings_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `meetings_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `meetings_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `meetings_user_assigned_id_foreign` (`user_assigned_id`),
  ADD KEY `meetings_team_id_index` (`team_id`),
  ADD KEY `meetings_client_id_foreign` (`client_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_noteable_type_noteable_id_index` (`noteable_type`,`noteable_id`),
  ADD KEY `notes_user_created_id_foreign` (`user_created_id`),
  ADD KEY `notes_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `notes_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `notes_user_restored_id_foreign` (`user_restored_id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisations_user_created_id_foreign` (`user_created_id`),
  ADD KEY `organisations_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `organisations_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `organisations_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `organisations_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `organisations_user_id_foreign` (`user_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peoples_organisation_id_foreign` (`organisation_id`),
  ADD KEY `peoples_user_created_id_foreign` (`user_created_id`),
  ADD KEY `peoples_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `peoples_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `peoples_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `peoples_user_owner_id_foreign` (`user_owner_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `products_team_id_index` (`team_id`),
  ADD KEY `products_product_category_id_index` (`product_category_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_team_id_index` (`team_id`),
  ADD KEY `product_prices_product_id_index` (`product_id`),
  ADD KEY `product_prices_product_variation_id_index` (`product_variation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_taskable_type_taskable_id_index` (`taskable_type`,`taskable_id`),
  ADD KEY `tasks_user_created_id_foreign` (`user_created_id`),
  ADD KEY `tasks_user_updated_id_foreign` (`user_updated_id`),
  ADD KEY `tasks_user_deleted_id_foreign` (`user_deleted_id`),
  ADD KEY `tasks_user_restored_id_foreign` (`user_restored_id`),
  ADD KEY `tasks_user_owner_id_foreign` (`user_owner_id`),
  ADD KEY `tasks_user_assigned_id_foreign` (`user_assigned_id`),
  ADD KEY `tasks_team_id_index` (`team_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_package_id_foreign` (`package_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `client_organisation`
--
ALTER TABLE `client_organisation`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_organisations`
--
ALTER TABLE `client_organisations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lunches`
--
ALTER TABLE `lunches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_assigned_id_foreign` FOREIGN KEY (`user_assigned_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_organisation`
--
ALTER TABLE `client_organisation`
  ADD CONSTRAINT `client_organisation_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_organisation_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_organisations`
--
ALTER TABLE `client_organisations`
  ADD CONSTRAINT `client_organisations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_organisations_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD CONSTRAINT `leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lunches`
--
ALTER TABLE `lunches`
  ADD CONSTRAINT `lunches_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_assigned_id_foreign` FOREIGN KEY (`user_assigned_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lunches_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_assigned_id_foreign` FOREIGN KEY (`user_assigned_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organisations`
--
ALTER TABLE `organisations`
  ADD CONSTRAINT `organisations_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisations_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisations_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisations_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organisations_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peoples`
--
ALTER TABLE `peoples`
  ADD CONSTRAINT `peoples_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD CONSTRAINT `peoples_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `peoples_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `peoples_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `peoples_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `peoples_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_assigned_id_foreign` FOREIGN KEY (`user_assigned_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_created_id_foreign` FOREIGN KEY (`user_created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_deleted_id_foreign` FOREIGN KEY (`user_deleted_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_restored_id_foreign` FOREIGN KEY (`user_restored_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_updated_id_foreign` FOREIGN KEY (`user_updated_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
