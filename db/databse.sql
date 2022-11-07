-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 07, 2022 at 09:56 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `value` int(3) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `p_id`, `value`, `title`, `text`, `created_at`, `edited_at`) VALUES
(1, 56, 70, 'I am a comment, very important', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:11', '2022-10-21 15:35:00'),
(2, 56, 60, 'I am another comment', 'not so important. \r\nWhat is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:31', '2022-10-21 15:34:31'),
(3, 56, 100, 'Hi, read me please', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-10-21 15:34:47', '2022-10-21 15:34:47'),
(5, 53, 70, 'something', 'something\r\nsomething... thing and other', '2022-10-23 16:40:47', '2022-10-23 16:40:47'),
(7, 55, 10, 'test  asd', 'some comments to test\r\ntest', '2022-10-23 19:31:32', '2022-10-23 19:32:05'),
(8, 46, 70, 'uuu', 'mkjhkjh\r\n;k;lk\r\n', '2022-10-23 21:37:42', '2022-10-23 21:37:42'),
(9, 42, 50, 'nice meeting', 'it was nice to meet with this person, I believe we can work together.\r\n', '2022-10-24 09:16:37', '2022-10-24 09:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `num_code` int(3) NOT NULL DEFAULT '0',
  `alpha_2_code` varchar(2) DEFAULT NULL,
  `alpha_3_code` varchar(3) DEFAULT NULL,
  `en_short_name` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`num_code`, `alpha_2_code`, `alpha_3_code`, `en_short_name`, `nationality`) VALUES
(4, 'AF', 'AFG', 'Afghanistan', 'Afghan'),
(8, 'AL', 'ALB', 'Albania', 'Albanian'),
(10, 'AQ', 'ATA', 'Antarctica', 'Antarctic'),
(12, 'DZ', 'DZA', 'Algeria', 'Algerian'),
(16, 'AS', 'ASM', 'American Samoa', 'American Samoan'),
(20, 'AD', 'AND', 'Andorra', 'Andorran'),
(24, 'AO', 'AGO', 'Angola', 'Angolan'),
(28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antiguan or Barbudan'),
(31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaijani, Azeri'),
(32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(36, 'AU', 'AUS', 'Australia', 'Australian'),
(40, 'AT', 'AUT', 'Austria', 'Austrian'),
(44, 'BS', 'BHS', 'Bahamas', 'Bahamian'),
(48, 'BH', 'BHR', 'Bahrain', 'Bahraini'),
(50, 'BD', 'BGD', 'Bangladesh', 'Bangladeshi'),
(51, 'AM', 'ARM', 'Armenia', 'Armenian'),
(52, 'BB', 'BRB', 'Barbados', 'Barbadian'),
(56, 'BE', 'BEL', 'Belgium', 'Belgian'),
(60, 'BM', 'BMU', 'Bermuda', 'Bermudian, Bermudan'),
(64, 'BT', 'BTN', 'Bhutan', 'Bhutanese'),
(68, 'BO', 'BOL', 'Bolivia (Plurinational State of)', 'Bolivian'),
(70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian'),
(72, 'BW', 'BWA', 'Botswana', 'Motswana, Botswanan'),
(74, 'BV', 'BVT', 'Bouvet Island', 'Bouvet Island'),
(76, 'BR', 'BRA', 'Brazil', 'Brazilian'),
(84, 'BZ', 'BLZ', 'Belize', 'Belizean'),
(86, 'IO', 'IOT', 'British Indian Ocean Territory', 'BIOT'),
(90, 'SB', 'SLB', 'Solomon Islands', 'Solomon Island'),
(92, 'VG', 'VGB', 'Virgin Islands (British)', 'British Virgin Island'),
(96, 'BN', 'BRN', 'Brunei Darussalam', 'Bruneian'),
(100, 'BG', 'BGR', 'Bulgaria', 'Bulgarian'),
(104, 'MM', 'MMR', 'Myanmar', 'Burmese'),
(108, 'BI', 'BDI', 'Burundi', 'Burundian'),
(112, 'BY', 'BLR', 'Belarus', 'Belarusian'),
(116, 'KH', 'KHM', 'Cambodia', 'Cambodian'),
(120, 'CM', 'CMR', 'Cameroon', 'Cameroonian'),
(124, 'CA', 'CAN', 'Canada', 'Canadian'),
(132, 'CV', 'CPV', 'Cabo Verde', 'Cabo Verdean'),
(136, 'KY', 'CYM', 'Cayman Islands', 'Caymanian'),
(140, 'CF', 'CAF', 'Central African Republic', 'Central African'),
(144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lankan'),
(148, 'TD', 'TCD', 'Chad', 'Chadian'),
(152, 'CL', 'CHL', 'Chile', 'Chilean'),
(156, 'CN', 'CHN', 'China', 'Chinese'),
(158, 'TW', 'TWN', 'Taiwan, Province of China', 'Chinese, Taiwanese'),
(162, 'CX', 'CXR', 'Christmas Island', 'Christmas Island'),
(166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Cocos Island'),
(170, 'CO', 'COL', 'Colombia', 'Colombian'),
(174, 'KM', 'COM', 'Comoros', 'Comoran, Comorian'),
(175, 'YT', 'MYT', 'Mayotte', 'Mahoran'),
(178, 'CG', 'COG', 'Congo (Republic of the)', 'Congolese'),
(180, 'CD', 'COD', 'Congo (Democratic Republic of the)', 'Congolese'),
(184, 'CK', 'COK', 'Cook Islands', 'Cook Island'),
(188, 'CR', 'CRI', 'Costa Rica', 'Costa Rican'),
(191, 'HR', 'HRV', 'Croatia', 'Croatian'),
(192, 'CU', 'CUB', 'Cuba', 'Cuban'),
(196, 'CY', 'CYP', 'Cyprus', 'Cypriot'),
(203, 'CZ', 'CZE', 'Czech Republic', 'Czech'),
(204, 'BJ', 'BEN', 'Benin', 'Beninese, Beninois'),
(208, 'DK', 'DNK', 'Denmark', 'Danish'),
(212, 'DM', 'DMA', 'Dominica', 'Dominican'),
(214, 'DO', 'DOM', 'Dominican Republic', 'Dominican'),
(218, 'EC', 'ECU', 'Ecuador', 'Ecuadorian'),
(222, 'SV', 'SLV', 'El Salvador', 'Salvadoran'),
(226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Equatorial Guinean, Equatoguinean'),
(231, 'ET', 'ETH', 'Ethiopia', 'Ethiopian'),
(232, 'ER', 'ERI', 'Eritrea', 'Eritrean'),
(233, 'EE', 'EST', 'Estonia', 'Estonian'),
(234, 'FO', 'FRO', 'Faroe Islands', 'Faroese'),
(238, 'FK', 'FLK', 'Falkland Islands (Malvinas)', 'Falkland Island'),
(239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands'),
(242, 'FJ', 'FJI', 'Fiji', 'Fijian'),
(246, 'FI', 'FIN', 'Finland', 'Finnish'),
(248, 'AX', 'ALA', 'Åland Islands', 'Åland Island'),
(250, 'FR', 'FRA', 'France', 'French'),
(254, 'GF', 'GUF', 'French Guiana', 'French Guianese'),
(258, 'PF', 'PYF', 'French Polynesia', 'French Polynesian'),
(260, 'TF', 'ATF', 'French Southern Territories', 'French Southern Territories'),
(262, 'DJ', 'DJI', 'Djibouti', 'Djiboutian'),
(266, 'GA', 'GAB', 'Gabon', 'Gabonese'),
(268, 'GE', 'GEO', 'Georgia', 'Georgian'),
(270, 'GM', 'GMB', 'Gambia', 'Gambian'),
(275, 'PS', 'PSE', 'Palestine, State of', 'Palestinian'),
(276, 'DE', 'DEU', 'Germany', 'German'),
(288, 'GH', 'GHA', 'Ghana', 'Ghanaian'),
(292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(296, 'KI', 'KIR', 'Kiribati', 'I-Kiribati'),
(300, 'GR', 'GRC', 'Greece', 'Greek, Hellenic'),
(304, 'GL', 'GRL', 'Greenland', 'Greenlandic'),
(308, 'GD', 'GRD', 'Grenada', 'Grenadian'),
(312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(316, 'GU', 'GUM', 'Guam', 'Guamanian, Guambat'),
(320, 'GT', 'GTM', 'Guatemala', 'Guatemalan'),
(324, 'GN', 'GIN', 'Guinea', 'Guinean'),
(328, 'GY', 'GUY', 'Guyana', 'Guyanese'),
(332, 'HT', 'HTI', 'Haiti', 'Haitian'),
(334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Heard Island or McDonald Islands'),
(336, 'VA', 'VAT', 'Vatican City State', 'Vatican'),
(340, 'HN', 'HND', 'Honduras', 'Honduran'),
(344, 'HK', 'HKG', 'Hong Kong', 'Hong Kong, Hong Kongese'),
(348, 'HU', 'HUN', 'Hungary', 'Hungarian, Magyar'),
(352, 'IS', 'ISL', 'Iceland', 'Icelandic'),
(356, 'IN', 'IND', 'India', 'Indian'),
(360, 'ID', 'IDN', 'Indonesia', 'Indonesian'),
(364, 'IR', 'IRN', 'Iran', 'Iranian, Persian'),
(368, 'IQ', 'IRQ', 'Iraq', 'Iraqi'),
(372, 'IE', 'IRL', 'Ireland', 'Irish'),
(376, 'IL', 'ISR', 'Israel', 'Israeli'),
(380, 'IT', 'ITA', 'Italy', 'Italian'),
(384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Ivorian'),
(388, 'JM', 'JAM', 'Jamaica', 'Jamaican'),
(392, 'JP', 'JPN', 'Japan', 'Japanese'),
(398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstani, Kazakh'),
(400, 'JO', 'JOR', 'Jordan', 'Jordanian'),
(404, 'KE', 'KEN', 'Kenya', 'Kenyan'),
(408, 'KP', 'PRK', 'Korea (Democratic People\'s Republic of)', 'North Korean'),
(410, 'KR', 'KOR', 'Korea (Republic of)', 'South Korean'),
(414, 'KW', 'KWT', 'Kuwait', 'Kuwaiti'),
(417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),
(418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'Lao, Laotian'),
(422, 'LB', 'LBN', 'Lebanon', 'Lebanese'),
(426, 'LS', 'LSO', 'Lesotho', 'Basotho'),
(428, 'LV', 'LVA', 'Latvia', 'Latvian'),
(430, 'LR', 'LBR', 'Liberia', 'Liberian'),
(434, 'LY', 'LBY', 'Libya', 'Libyan'),
(438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(440, 'LT', 'LTU', 'Lithuania', 'Lithuanian'),
(442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg, Luxembourgish'),
(446, 'MO', 'MAC', 'Macao', 'Macanese, Chinese'),
(450, 'MG', 'MDG', 'Madagascar', 'Malagasy'),
(454, 'MW', 'MWI', 'Malawi', 'Malawian'),
(458, 'MY', 'MYS', 'Malaysia', 'Malaysian'),
(462, 'MV', 'MDV', 'Maldives', 'Maldivian'),
(466, 'ML', 'MLI', 'Mali', 'Malian, Malinese'),
(470, 'MT', 'MLT', 'Malta', 'Maltese'),
(474, 'MQ', 'MTQ', 'Martinique', 'Martiniquais, Martinican'),
(478, 'MR', 'MRT', 'Mauritania', 'Mauritanian'),
(480, 'MU', 'MUS', 'Mauritius', 'Mauritian'),
(484, 'MX', 'MEX', 'Mexico', 'Mexican'),
(492, 'MC', 'MCO', 'Monaco', 'Monégasque, Monacan'),
(496, 'MN', 'MNG', 'Mongolia', 'Mongolian'),
(498, 'MD', 'MDA', 'Moldova (Republic of)', 'Moldovan'),
(499, 'ME', 'MNE', 'Montenegro', 'Montenegrin'),
(500, 'MS', 'MSR', 'Montserrat', 'Montserratian'),
(504, 'MA', 'MAR', 'Morocco', 'Moroccan'),
(508, 'MZ', 'MOZ', 'Mozambique', 'Mozambican'),
(512, 'OM', 'OMN', 'Oman', 'Omani'),
(516, 'NA', 'NAM', 'Namibia', 'Namibian'),
(520, 'NR', 'NRU', 'Nauru', 'Nauruan'),
(524, 'NP', 'NPL', 'Nepal', 'Nepali, Nepalese'),
(528, 'NL', 'NLD', 'Netherlands', 'Dutch, Netherlandic'),
(531, 'CW', 'CUW', 'Curaçao', 'Curaçaoan'),
(533, 'AW', 'ABW', 'Aruba', 'Aruban'),
(534, 'SX', 'SXM', 'Sint Maarten (Dutch part)', 'Sint Maarten'),
(535, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', 'Bonaire'),
(540, 'NC', 'NCL', 'New Caledonia', 'New Caledonian'),
(548, 'VU', 'VUT', 'Vanuatu', 'Ni-Vanuatu, Vanuatuan'),
(554, 'NZ', 'NZL', 'New Zealand', 'New Zealand, NZ'),
(558, 'NI', 'NIC', 'Nicaragua', 'Nicaraguan'),
(562, 'NE', 'NER', 'Niger', 'Nigerien'),
(566, 'NG', 'NGA', 'Nigeria', 'Nigerian'),
(570, 'NU', 'NIU', 'Niue', 'Niuean'),
(574, 'NF', 'NFK', 'Norfolk Island', 'Norfolk Island'),
(578, 'NO', 'NOR', 'Norway', 'Norwegian'),
(580, 'MP', 'MNP', 'Northern Mariana Islands', 'Northern Marianan'),
(581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'American'),
(583, 'FM', 'FSM', 'Micronesia (Federated States of)', 'Micronesian'),
(584, 'MH', 'MHL', 'Marshall Islands', 'Marshallese'),
(585, 'PW', 'PLW', 'Palau', 'Palauan'),
(586, 'PK', 'PAK', 'Pakistan', 'Pakistani'),
(591, 'PA', 'PAN', 'Panama', 'Panamanian'),
(598, 'PG', 'PNG', 'Papua New Guinea', 'Papua New Guinean, Papuan'),
(600, 'PY', 'PRY', 'Paraguay', 'Paraguayan'),
(604, 'PE', 'PER', 'Peru', 'Peruvian'),
(608, 'PH', 'PHL', 'Philippines', 'Philippine, Filipino'),
(612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn Island'),
(616, 'PL', 'POL', 'Poland', 'Polish'),
(620, 'PT', 'PRT', 'Portugal', 'Portuguese'),
(624, 'GW', 'GNB', 'Guinea-Bissau', 'Bissau-Guinean'),
(626, 'TL', 'TLS', 'Timor-Leste', 'Timorese'),
(630, 'PR', 'PRI', 'Puerto Rico', 'Puerto Rican'),
(634, 'QA', 'QAT', 'Qatar', 'Qatari'),
(638, 'RE', 'REU', 'Réunion', 'Réunionese, Réunionnais'),
(642, 'RO', 'ROU', 'Romania', 'Romanian'),
(643, 'RU', 'RUS', 'Russian Federation', 'Russian'),
(646, 'RW', 'RWA', 'Rwanda', 'Rwandan'),
(652, 'BL', 'BLM', 'Saint Barthélemy', 'Barthélemois'),
(654, 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian'),
(659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Kittitian or Nevisian'),
(660, 'AI', 'AIA', 'Anguilla', 'Anguillan'),
(662, 'LC', 'LCA', 'Saint Lucia', 'Saint Lucian'),
(663, 'MF', 'MAF', 'Saint Martin (French part)', 'Saint-Martinoise'),
(666, 'PM', 'SPM', 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais'),
(670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian'),
(674, 'SM', 'SMR', 'San Marino', 'Sammarinese'),
(678, 'ST', 'STP', 'Sao Tome and Principe', 'São Toméan'),
(682, 'SA', 'SAU', 'Saudi Arabia', 'Saudi, Saudi Arabian'),
(686, 'SN', 'SEN', 'Senegal', 'Senegalese'),
(688, 'RS', 'SRB', 'Serbia', 'Serbian'),
(690, 'SC', 'SYC', 'Seychelles', 'Seychellois'),
(694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leonean'),
(702, 'SG', 'SGP', 'Singapore', 'Singaporean'),
(703, 'SK', 'SVK', 'Slovakia', 'Slovak'),
(704, 'VN', 'VNM', 'Vietnam', 'Vietnamese'),
(705, 'SI', 'SVN', 'Slovenia', 'Slovenian, Slovene'),
(706, 'SO', 'SOM', 'Somalia', 'Somali, Somalian'),
(710, 'ZA', 'ZAF', 'South Africa', 'South African'),
(716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwean'),
(724, 'ES', 'ESP', 'Spain', 'Spanish'),
(728, 'SS', 'SSD', 'South Sudan', 'South Sudanese'),
(729, 'SD', 'SDN', 'Sudan', 'Sudanese'),
(732, 'EH', 'ESH', 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian'),
(740, 'SR', 'SUR', 'Suriname', 'Surinamese'),
(744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard'),
(748, 'SZ', 'SWZ', 'Swaziland', 'Swazi'),
(752, 'SE', 'SWE', 'Sweden', 'Swedish'),
(756, 'CH', 'CHE', 'Switzerland', 'Swiss'),
(760, 'SY', 'SYR', 'Syrian Arab Republic', 'Syrian'),
(762, 'TJ', 'TJK', 'Tajikistan', 'Tajikistani'),
(764, 'TH', 'THA', 'Thailand', 'Thai'),
(768, 'TG', 'TGO', 'Togo', 'Togolese'),
(772, 'TK', 'TKL', 'Tokelau', 'Tokelauan'),
(776, 'TO', 'TON', 'Tonga', 'Tongan'),
(780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinidadian or Tobagonian'),
(784, 'AE', 'ARE', 'United Arab Emirates', 'Emirati, Emirian, Emiri'),
(788, 'TN', 'TUN', 'Tunisia', 'Tunisian'),
(792, 'TR', 'TUR', 'Turkey', 'Turkish'),
(795, 'TM', 'TKM', 'Turkmenistan', 'Turkmen'),
(796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Turks and Caicos Island'),
(798, 'TV', 'TUV', 'Tuvalu', 'Tuvaluan'),
(800, 'UG', 'UGA', 'Uganda', 'Ugandan'),
(804, 'UA', 'UKR', 'Ukraine', 'Ukrainian'),
(807, 'MK', 'MKD', 'Macedonia (the former Yugoslav Republic of)', 'Macedonian'),
(818, 'EG', 'EGY', 'Egypt', 'Egyptian'),
(826, 'GB', 'GBR', 'United Kingdom of Great Britain and Northern Ireland', 'British, UK'),
(831, 'GG', 'GGY', 'Guernsey', 'Channel Island'),
(832, 'JE', 'JEY', 'Jersey', 'Channel Island'),
(833, 'IM', 'IMN', 'Isle of Man', 'Manx'),
(834, 'TZ', 'TZA', 'Tanzania, United Republic of', 'Tanzanian'),
(840, 'US', 'USA', 'United States of America', 'American'),
(850, 'VI', 'VIR', 'Virgin Islands (U.S.)', 'U.S. Virgin Island'),
(854, 'BF', 'BFA', 'Burkina Faso', 'Burkinabé'),
(858, 'UY', 'URY', 'Uruguay', 'Uruguayan'),
(860, 'UZ', 'UZB', 'Uzbekistan', 'Uzbekistani, Uzbek'),
(862, 'VE', 'VEN', 'Venezuela (Bolivarian Republic of)', 'Venezuelan'),
(876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis and Futuna, Wallisian or Futunan'),
(882, 'WS', 'WSM', 'Samoa', 'Samoan'),
(887, 'YE', 'YEM', 'Yemen', 'Yemeni'),
(894, 'ZM', 'ZMB', 'Zambia', 'Zambian');

-- --------------------------------------------------------

--
-- Table structure for table `country_informations`
--

CREATE TABLE `country_informations` (
  `alpha_2_code` char(3) NOT NULL DEFAULT '',
  `alpha_3_code` char(3) DEFAULT NULL,
  `num_code` int(10) DEFAULT NULL,
  `fips` char(3) DEFAULT NULL,
  `en_short_name` varchar(155) DEFAULT NULL,
  `capital` varchar(155) DEFAULT NULL,
  `area` int(10) DEFAULT NULL,
  `population` int(10) DEFAULT NULL,
  `continent` char(3) DEFAULT NULL,
  `tld` char(6) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_name` varchar(155) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `postal_code_format` varchar(55) DEFAULT NULL,
  `postal_code_regex` varchar(55) DEFAULT NULL,
  `languages` varchar(125) DEFAULT NULL,
  `geonameid` int(10) DEFAULT NULL,
  `neighbours` varchar(125) DEFAULT NULL,
  `equivalent_fips_code` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_informations`
--

INSERT INTO `country_informations` (`alpha_2_code`, `alpha_3_code`, `num_code`, `fips`, `en_short_name`, `capital`, `area`, `population`, `continent`, `tld`, `currency_code`, `currency_name`, `phone`, `postal_code_format`, `postal_code_regex`, `languages`, `geonameid`, `neighbours`, `equivalent_fips_code`) VALUES
('AD', 'AND', 20, 'AN', 'Andorra', 'Andorra la Vella', 468, 84000, 'EU', '.ad', 'EUR', 'Euro', 376, 'AD###', '^(?:AD)*(\\d{3})$', 'ca', 3041565, 'ES,FR', ''),
('AE', 'ARE', 784, 'AE', 'United Arab Emirates', 'Abu Dhabi', 82880, 4975593, 'AS', '.ae', 'AED', 'Dirham', 971, '', '', 'ar-AE,fa,en,hi,ur', 290557, 'SA,OM', ''),
('AF', 'AFG', 4, 'AF', 'Afghanistan', 'Kabul', 647500, 29121286, 'AS', '.af', 'AFN', 'Afghani', 93, '', '', 'fa-AF,ps,uz-AF,tk', 1149361, 'TM,CN,IR,TJ,PK,UZ', ''),
('AG', 'ATG', 28, 'AC', 'Antigua and Barbuda', 'St. John\'s', 443, 86754, 'NA', '.ag', 'XCD', 'Dollar', 1, '', '', 'en-AG', 3576396, '', ''),
('AI', 'AIA', 660, 'AV', 'Anguilla', 'The Valley', 102, 13254, 'NA', '.ai', 'XCD', 'Dollar', 1, '', '', 'en-AI', 3573511, '', ''),
('AL', 'ALB', 8, 'AL', 'Albania', 'Tirana', 28748, 2986952, 'EU', '.al', 'ALL', 'Lek', 355, '', '', 'sq,el', 783754, 'MK,GR,CS,ME,RS,XK', ''),
('AM', 'ARM', 51, 'AM', 'Armenia', 'Yerevan', 29800, 2968000, 'AS', '.am', 'AMD', 'Dram', 374, '######', '^(\\d{6})$', 'hy', 174982, 'GE,IR,AZ,TR', ''),
('AN', 'ANT', 530, 'NT', 'Netherlands Antilles', 'Willemstad', 960, 136197, 'NA', '.an', 'ANG', 'Guilder', 599, '', '', 'nl-AN,en,es', 0, 'GP', ''),
('AO', 'AGO', 24, 'AO', 'Angola', 'Luanda', 1246700, 13068161, 'AF', '.ao', 'AOA', 'Kwanza', 244, '', '', 'pt-AO', 3351879, 'CD,NA,ZM,CG', ''),
('AQ', 'ATA', 10, 'AY', 'Antarctica', '', 14000000, 0, 'AN', '.aq', '', '', 0, '', '', '', 6697173, '', ''),
('AR', 'ARG', 32, 'AR', 'Argentina', 'Buenos Aires', 2766890, 41343201, 'SA', '.ar', 'ARS', 'Peso', 54, '@####@@@', '^([A-Z]\\d{4}[A-Z]{3})$', 'es-AR,en,it,de,fr,gn', 3865483, 'CL,BO,UY,PY,BR', ''),
('AS', 'ASM', 16, 'AQ', 'American Samoa', 'Pago Pago', 199, 57881, 'OC', '.as', 'USD', 'Dollar', 1, '', '', 'en-AS,sm,to', 5880801, '', ''),
('AT', 'AUT', 40, 'AU', 'Austria', 'Vienna', 83858, 8205000, 'EU', '.at', 'EUR', 'Euro', 43, '####', '^(\\d{4})$', 'de-AT,hr,hu,sl', 2782113, 'CH,DE,HU,SK,CZ,IT,SI,LI', ''),
('AU', 'AUS', 36, 'AS', 'Australia', 'Canberra', 7686850, 21515754, 'OC', '.au', 'AUD', 'Dollar', 61, '####', '^(\\d{4})$', 'en-AU', 2077456, '', ''),
('AW', 'ABW', 533, 'AA', 'Aruba', 'Oranjestad', 193, 71566, 'NA', '.aw', 'AWG', 'Guilder', 297, '', '', 'nl-AW,es,en', 3577279, '', ''),
('AX', 'ALA', 248, '', 'Aland Islands', 'Mariehamn', 0, 26711, 'EU', '.ax', 'EUR', 'Euro', 358, '', '', 'sv-AX', 661882, '', 'FI'),
('AZ', 'AZE', 31, 'AJ', 'Azerbaijan', 'Baku', 86600, 8303512, 'AS', '.az', 'AZN', 'Manat', 994, 'AZ ####', '^(?:AZ)*(\\d{4})$', 'az,ru,hy', 587116, 'GE,IR,AM,TR,RU', ''),
('BA', 'BIH', 70, 'BK', 'Bosnia and Herzegovina', 'Sarajevo', 51129, 4590000, 'EU', '.ba', 'BAM', 'Marka', 387, '#####', '^(\\d{5})$', 'bs,hr-BA,sr-BA', 3277605, 'CS,HR,ME,RS', ''),
('BB', 'BRB', 52, 'BB', 'Barbados', 'Bridgetown', 431, 285653, 'NA', '.bb', 'BBD', 'Dollar', 1, 'BB#####', '^(?:BB)*(\\d{5})$', 'en-BB', 3374084, '', ''),
('BD', 'BGD', 50, 'BG', 'Bangladesh', 'Dhaka', 144000, 156118464, 'AS', '.bd', 'BDT', 'Taka', 880, '####', '^(\\d{4})$', 'bn-BD,en', 1210997, 'MM,IN', ''),
('BE', 'BEL', 56, 'BE', 'Belgium', 'Brussels', 30510, 10403000, 'EU', '.be', 'EUR', 'Euro', 32, '####', '^(\\d{4})$', 'nl-BE,fr-BE,de-BE', 2802361, 'DE,NL,LU,FR', ''),
('BF', 'BFA', 854, 'UV', 'Burkina Faso', 'Ouagadougou', 274200, 16241811, 'AF', '.bf', 'XOF', 'Franc', 226, '', '', 'fr-BF', 2361809, 'NE,BJ,GH,CI,TG,ML', ''),
('BG', 'BGR', 100, 'BU', 'Bulgaria', 'Sofia', 110910, 7148785, 'EU', '.bg', 'BGN', 'Lev', 359, '####', '^(\\d{4})$', 'bg,tr-BG', 732800, 'MK,GR,RO,CS,TR,RS', ''),
('BH', 'BHR', 48, 'BA', 'Bahrain', 'Manama', 665, 738004, 'AS', '.bh', 'BHD', 'Dinar', 973, '####|###', '^(\\d{3}\\d?)$', 'ar-BH,en,fa,ur', 290291, '', ''),
('BI', 'BDI', 108, 'BY', 'Burundi', 'Bujumbura', 27830, 9863117, 'AF', '.bi', 'BIF', 'Franc', 257, '', '', 'fr-BI,rn', 433561, 'TZ,CD,RW', ''),
('BJ', 'BEN', 204, 'BN', 'Benin', 'Porto-Novo', 112620, 9056010, 'AF', '.bj', 'XOF', 'Franc', 229, '', '', 'fr-BJ', 2395170, 'NE,TG,BF,NG', ''),
('BL', 'BLM', 652, 'TB', 'Saint Barthelemy', 'Gustavia', 21, 8450, 'NA', '.gp', 'EUR', 'Euro', 590, '### ###', '', 'fr', 3578476, '', ''),
('BM', 'BMU', 60, 'BD', 'Bermuda', 'Hamilton', 53, 65365, 'NA', '.bm', 'BMD', 'Dollar', 1, '@@ ##', '^([A-Z]{2}\\d{2})$', 'en-BM,pt', 3573345, '', ''),
('BN', 'BRN', 96, 'BX', 'Brunei', 'Bandar Seri Begawan', 5770, 395027, 'AS', '.bn', 'BND', 'Dollar', 673, '@@####', '^([A-Z]{2}\\d{4})$', 'ms-BN,en-BN', 1820814, 'MY', ''),
('BO', 'BOL', 68, 'BL', 'Bolivia', 'Sucre', 1098580, 9947418, 'SA', '.bo', 'BOB', 'Boliviano', 591, '', '', 'es-BO,qu,ay', 3923057, 'PE,CL,PY,BR,AR', ''),
('BQ', 'BES', 535, '', 'Bonaire, Saint Eustatius and Saba ', '', 0, 18012, 'NA', '.bq', 'USD', 'Dollar', 599, '', '', 'nl,pap,en', 7626844, '', ''),
('BR', 'BRA', 76, 'BR', 'Brazil', 'Brasilia', 8511965, 201103330, 'SA', '.br', 'BRL', 'Real', 55, '#####-###', '^(\\d{8})$', 'pt-BR,es,en,fr', 3469034, 'SR,PE,BO,UY,GY,PY,GF,VE,CO,AR', ''),
('BS', 'BHS', 44, 'BF', 'Bahamas', 'Nassau', 13940, 301790, 'NA', '.bs', 'BSD', 'Dollar', 1, '', '', 'en-BS', 3572887, '', ''),
('BT', 'BTN', 64, 'BT', 'Bhutan', 'Thimphu', 47000, 699847, 'AS', '.bt', 'BTN', 'Ngultrum', 975, '', '', 'dz', 1252634, 'CN,IN', ''),
('BV', 'BVT', 74, 'BV', 'Bouvet Island', '', 0, 0, 'AN', '.bv', 'NOK', 'Krone', 0, '', '', '', 3371123, '', ''),
('BW', 'BWA', 72, 'BC', 'Botswana', 'Gaborone', 600370, 2029307, 'AF', '.bw', 'BWP', 'Pula', 267, '', '', 'en-BW,tn-BW', 933860, 'ZW,ZA,NA', ''),
('BY', 'BLR', 112, 'BO', 'Belarus', 'Minsk', 207600, 9685000, 'EU', '.by', 'BYR', 'Ruble', 375, '######', '^(\\d{6})$', 'be,ru', 630336, 'PL,LT,UA,RU,LV', ''),
('BZ', 'BLZ', 84, 'BH', 'Belize', 'Belmopan', 22966, 314522, 'NA', '.bz', 'BZD', 'Dollar', 501, '', '', 'en-BZ,es', 3582678, 'GT,MX', ''),
('CA', 'CAN', 124, 'CA', 'Canada', 'Ottawa', 9984670, 33679000, 'NA', '.ca', 'CAD', 'Dollar', 1, '@#@ #@#', '^([ABCEGHJKLMNPRSTVXY]\\d[ABCEGHJKLMNPRSTVWXYZ]) ?(\\d[AB', 'en-CA,fr-CA,iu', 6251999, 'US', ''),
('CC', 'CCK', 166, 'CK', 'Cocos Islands', 'West Island', 14, 628, 'AS', '.cc', 'AUD', 'Dollar', 61, '', '', 'ms-CC,en', 1547376, '', ''),
('CD', 'COD', 180, 'CG', 'Democratic Republic of the Congo', 'Kinshasa', 2345410, 70916439, 'AF', '.cd', 'CDF', 'Franc', 243, '', '', 'fr-CD,ln,kg', 203312, 'TZ,CF,SS,RW,ZM,BI,UG,CG,AO', ''),
('CF', 'CAF', 140, 'CT', 'Central African Republic', 'Bangui', 622984, 4844927, 'AF', '.cf', 'XAF', 'Franc', 236, '', '', 'fr-CF,sg,ln,kg', 239880, 'TD,SD,CD,SS,CM,CG', ''),
('CG', 'COG', 178, 'CF', 'Republic of the Congo', 'Brazzaville', 342000, 3039126, 'AF', '.cg', 'XAF', 'Franc', 242, '', '', 'fr-CG,kg,ln-CG', 2260494, 'CF,GA,CD,CM,AO', ''),
('CH', 'CHE', 756, 'SZ', 'Switzerland', 'Berne', 41290, 7581000, 'EU', '.ch', 'CHF', 'Franc', 41, '####', '^(\\d{4})$', 'de-CH,fr-CH,it-CH,rm', 2658434, 'DE,IT,LI,FR,AT', ''),
('CI', 'CIV', 384, 'IV', 'Ivory Coast', 'Yamoussoukro', 322460, 21058798, 'AF', '.ci', 'XOF', 'Franc', 225, '', '', 'fr-CI', 2287781, 'LR,GH,GN,BF,ML', ''),
('CK', 'COK', 184, 'CW', 'Cook Islands', 'Avarua', 240, 21388, 'OC', '.ck', 'NZD', 'Dollar', 682, '', '', 'en-CK,mi', 1899402, '', ''),
('CL', 'CHL', 152, 'CI', 'Chile', 'Santiago', 756950, 16746491, 'SA', '.cl', 'CLP', 'Peso', 56, '#######', '^(\\d{7})$', 'es-CL', 3895114, 'PE,BO,AR', ''),
('CM', 'CMR', 120, 'CM', 'Cameroon', 'Yaounde', 475440, 19294149, 'AF', '.cm', 'XAF', 'Franc', 237, '', '', 'en-CM,fr-CM', 2233387, 'TD,CF,GA,GQ,CG,NG', ''),
('CN', 'CHN', 156, 'CH', 'China', 'Beijing', 9596960, 1330044000, 'AS', '.cn', 'CNY', 'Yuan Renminbi', 86, '######', '^(\\d{6})$', 'zh-CN,yue,wuu,dta,ug,za', 1814991, 'LA,BT,TJ,KZ,MN,AF,NP,MM,KG,PK,KP,RU,VN,IN', ''),
('CO', 'COL', 170, 'CO', 'Colombia', 'Bogota', 1138910, 44205293, 'SA', '.co', 'COP', 'Peso', 57, '', '', 'es-CO', 3686110, 'EC,PE,PA,BR,VE', ''),
('CR', 'CRI', 188, 'CS', 'Costa Rica', 'San Jose', 51100, 4516220, 'NA', '.cr', 'CRC', 'Colon', 506, '####', '^(\\d{4})$', 'es-CR,en', 3624060, 'PA,NI', ''),
('CS', 'SCG', 891, 'YI', 'Serbia and Montenegro', 'Belgrade', 102350, 10829175, 'EU', '.cs', 'RSD', 'Dinar', 381, '#####', '^(\\d{5})$', 'cu,hu,sq,sr', 0, 'AL,HU,MK,RO,HR,BA,BG', ''),
('CU', 'CUB', 192, 'CU', 'Cuba', 'Havana', 110860, 11423000, 'NA', '.cu', 'CUP', 'Peso', 53, 'CP #####', '^(?:CP)*(\\d{5})$', 'es-CU', 3562981, 'US', ''),
('CV', 'CPV', 132, 'CV', 'Cape Verde', 'Praia', 4033, 508659, 'AF', '.cv', 'CVE', 'Escudo', 238, '####', '^(\\d{4})$', 'pt-CV', 3374766, '', ''),
('CW', 'CUW', 531, 'UC', 'Curacao', ' Willemstad', 0, 141766, 'NA', '.cw', 'ANG', 'Guilder', 599, '', '', 'nl,pap', 7626836, '', ''),
('CX', 'CXR', 162, 'KT', 'Christmas Island', 'Flying Fish Cove', 135, 1500, 'AS', '.cx', 'AUD', 'Dollar', 61, '####', '^(\\d{4})$', 'en,zh,ms-CC', 2078138, '', ''),
('CY', 'CYP', 196, 'CY', 'Cyprus', 'Nicosia', 9250, 1102677, 'EU', '.cy', 'EUR', 'Euro', 357, '####', '^(\\d{4})$', 'el-CY,tr-CY,en', 146669, '', ''),
('CZ', 'CZE', 203, 'EZ', 'Czech Republic', 'Prague', 78866, 10476000, 'EU', '.cz', 'CZK', 'Koruna', 420, '### ##', '^(\\d{5})$', 'cs,sk', 3077311, 'PL,DE,SK,AT', ''),
('DE', 'DEU', 276, 'GM', 'Germany', 'Berlin', 357021, 81802257, 'EU', '.de', 'EUR', 'Euro', 49, '#####', '^(\\d{5})$', 'de', 2921044, 'CH,PL,NL,DK,BE,CZ,LU,FR,AT', ''),
('DJ', 'DJI', 262, 'DJ', 'Djibouti', 'Djibouti', 23000, 740528, 'AF', '.dj', 'DJF', 'Franc', 253, '', '', 'fr-DJ,ar,so-DJ,aa', 223816, 'ER,ET,SO', ''),
('DK', 'DNK', 208, 'DA', 'Denmark', 'Copenhagen', 43094, 5484000, 'EU', '.dk', 'DKK', 'Krone', 45, '####', '^(\\d{4})$', 'da-DK,en,fo,de-DK', 2623032, 'DE', ''),
('DM', 'DMA', 212, 'DO', 'Dominica', 'Roseau', 754, 72813, 'NA', '.dm', 'XCD', 'Dollar', 1, '', '', 'en-DM', 3575830, '', ''),
('DO', 'DOM', 214, 'DR', 'Dominican Republic', 'Santo Domingo', 48730, 9823821, 'NA', '.do', 'DOP', 'Peso', 1, '#####', '^(\\d{5})$', 'es-DO', 3508796, 'HT', ''),
('DZ', 'DZA', 12, 'AG', 'Algeria', 'Algiers', 2381740, 34586184, 'AF', '.dz', 'DZD', 'Dinar', 213, '#####', '^(\\d{5})$', 'ar-DZ', 2589581, 'NE,EH,LY,MR,TN,MA,ML', ''),
('EC', 'ECU', 218, 'EC', 'Ecuador', 'Quito', 283560, 14790608, 'SA', '.ec', 'USD', 'Dollar', 593, '@####@', '^([a-zA-Z]\\d{4}[a-zA-Z])$', 'es-EC', 3658394, 'PE,CO', ''),
('EE', 'EST', 233, 'EN', 'Estonia', 'Tallinn', 45226, 1291170, 'EU', '.ee', 'EUR', 'Euro', 372, '#####', '^(\\d{5})$', 'et,ru', 453733, 'RU,LV', ''),
('EG', 'EGY', 818, 'EG', 'Egypt', 'Cairo', 1001450, 80471869, 'AF', '.eg', 'EGP', 'Pound', 20, '#####', '^(\\d{5})$', 'ar-EG,en,fr', 357994, 'LY,SD,IL', ''),
('EH', 'ESH', 732, 'WI', 'Western Sahara', 'El-Aaiun', 266000, 273008, 'AF', '.eh', 'MAD', 'Dirham', 212, '', '', 'ar,mey', 2461445, 'DZ,MR,MA', ''),
('ER', 'ERI', 232, 'ER', 'Eritrea', 'Asmara', 121320, 5792984, 'AF', '.er', 'ERN', 'Nakfa', 291, '', '', 'aa-ER,ar,tig,kun,ti-ER', 338010, 'ET,SD,DJ', ''),
('ES', 'ESP', 724, 'SP', 'Spain', 'Madrid', 504782, 46505963, 'EU', '.es', 'EUR', 'Euro', 34, '#####', '^(\\d{5})$', 'es-ES,ca,gl,eu,oc', 2510769, 'AD,PT,GI,FR,MA', ''),
('ET', 'ETH', 231, 'ET', 'Ethiopia', 'Addis Ababa', 1127127, 88013491, 'AF', '.et', 'ETB', 'Birr', 251, '####', '^(\\d{4})$', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 337996, 'ER,KE,SD,SS,SO,DJ', ''),
('FI', 'FIN', 246, 'FI', 'Finland', 'Helsinki', 337030, 5244000, 'EU', '.fi', 'EUR', 'Euro', 358, '#####', '^(?:FI)*(\\d{5})$', 'fi-FI,sv-FI,smn', 660013, 'NO,RU,SE', ''),
('FJ', 'FJI', 242, 'FJ', 'Fiji', 'Suva', 18270, 875983, 'OC', '.fj', 'FJD', 'Dollar', 679, '', '', 'en-FJ,fj', 2205218, '', ''),
('FK', 'FLK', 238, 'FK', 'Falkland Islands', 'Stanley', 12173, 2638, 'SA', '.fk', 'FKP', 'Pound', 500, '', '', 'en-FK', 3474414, '', ''),
('FM', 'FSM', 583, 'FM', 'Micronesia', 'Palikir', 702, 107708, 'OC', '.fm', 'USD', 'Dollar', 691, '#####', '^(\\d{5})$', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 2081918, '', ''),
('FO', 'FRO', 234, 'FO', 'Faroe Islands', 'Torshavn', 1399, 48228, 'EU', '.fo', 'DKK', 'Krone', 298, 'FO-###', '^(?:FO)*(\\d{3})$', 'fo,da-FO', 2622320, '', ''),
('FR', 'FRA', 250, 'FR', 'France', 'Paris', 547030, 64768389, 'EU', '.fr', 'EUR', 'Euro', 33, '#####', '^(\\d{5})$', 'fr-FR,frp,br,co,ca,eu,oc', 3017382, 'CH,DE,BE,LU,IT,AD,MC,ES', ''),
('GA', 'GAB', 266, 'GB', 'Gabon', 'Libreville', 267667, 1545255, 'AF', '.ga', 'XAF', 'Franc', 241, '', '', 'fr-GA', 2400553, 'CM,GQ,CG', ''),
('GB', 'GBR', 826, 'UK', 'United Kingdom', 'London', 244820, 62348447, 'EU', '.uk', 'GBP', 'Pound', 44, '@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|GIR0AA', '^(([A-Z]\\d{2}[A-Z]{2})|([A-Z]\\d{3}[A-Z]{2})|([A-Z]{2}\\d', 'en-GB,cy-GB,gd', 2635167, 'IE', ''),
('GD', 'GRD', 308, 'GJ', 'Grenada', 'St. George\'s', 344, 107818, 'NA', '.gd', 'XCD', 'Dollar', 1, '', '', 'en-GD', 3580239, '', ''),
('GE', 'GEO', 268, 'GG', 'Georgia', 'Tbilisi', 69700, 4630000, 'AS', '.ge', 'GEL', 'Lari', 995, '####', '^(\\d{4})$', 'ka,ru,hy,az', 614540, 'AM,AZ,TR,RU', ''),
('GF', 'GUF', 254, 'FG', 'French Guiana', 'Cayenne', 91000, 195506, 'SA', '.gf', 'EUR', 'Euro', 594, '#####', '^((97|98)3\\d{2})$', 'fr-GF', 3381670, 'SR,BR', ''),
('GG', 'GGY', 831, 'GK', 'Guernsey', 'St Peter Port', 78, 65228, 'EU', '.gg', 'GBP', 'Pound', 44, '@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|GIR0AA', '^(([A-Z]\\d{2}[A-Z]{2})|([A-Z]\\d{3}[A-Z]{2})|([A-Z]{2}\\d', 'en,fr', 3042362, '', ''),
('GH', 'GHA', 288, 'GH', 'Ghana', 'Accra', 239460, 24339838, 'AF', '.gh', 'GHS', 'Cedi', 233, '', '', 'en-GH,ak,ee,tw', 2300660, 'CI,TG,BF', ''),
('GI', 'GIB', 292, 'GI', 'Gibraltar', 'Gibraltar', 7, 27884, 'EU', '.gi', 'GIP', 'Pound', 350, '', '', 'en-GI,es,it,pt', 2411586, 'ES', ''),
('GL', 'GRL', 304, 'GL', 'Greenland', 'Nuuk', 2166086, 56375, 'NA', '.gl', 'DKK', 'Krone', 299, '####', '^(\\d{4})$', 'kl,da-GL,en', 3425505, '', ''),
('GM', 'GMB', 270, 'GA', 'Gambia', 'Banjul', 11300, 1593256, 'AF', '.gm', 'GMD', 'Dalasi', 220, '', '', 'en-GM,mnk,wof,wo,ff', 2413451, 'SN', ''),
('GN', 'GIN', 324, 'GV', 'Guinea', 'Conakry', 245857, 10324025, 'AF', '.gn', 'GNF', 'Franc', 224, '', '', 'fr-GN', 2420477, 'LR,SN,SL,CI,GW,ML', ''),
('GP', 'GLP', 312, 'GP', 'Guadeloupe', 'Basse-Terre', 1780, 443000, 'NA', '.gp', 'EUR', 'Euro', 590, '#####', '^((97|98)\\d{3})$', 'fr-GP', 3579143, 'AN', ''),
('GQ', 'GNQ', 226, 'EK', 'Equatorial Guinea', 'Malabo', 28051, 1014999, 'AF', '.gq', 'XAF', 'Franc', 240, '', '', 'es-GQ,fr', 2309096, 'GA,CM', ''),
('GR', 'GRC', 300, 'GR', 'Greece', 'Athens', 131940, 11000000, 'EU', '.gr', 'EUR', 'Euro', 30, '### ##', '^(\\d{5})$', 'el-GR,en,fr', 390903, 'AL,MK,TR,BG', ''),
('GS', 'SGS', 239, 'SX', 'South Georgia and the South Sandwich Islands', 'Grytviken', 3903, 30, 'AN', '.gs', 'GBP', 'Pound', 0, '', '', 'en', 3474415, '', ''),
('GT', 'GTM', 320, 'GT', 'Guatemala', 'Guatemala City', 108890, 13550440, 'NA', '.gt', 'GTQ', 'Quetzal', 502, '#####', '^(\\d{5})$', 'es-GT', 3595528, 'MX,HN,BZ,SV', ''),
('GU', 'GUM', 316, 'GQ', 'Guam', 'Hagatna', 549, 159358, 'OC', '.gu', 'USD', 'Dollar', 1, '969##', '^(969\\d{2})$', 'en-GU,ch-GU', 4043988, '', ''),
('GW', 'GNB', 624, 'PU', 'Guinea-Bissau', 'Bissau', 36120, 1565126, 'AF', '.gw', 'XOF', 'Franc', 245, '####', '^(\\d{4})$', 'pt-GW,pov', 2372248, 'SN,GN', ''),
('GY', 'GUY', 328, 'GY', 'Guyana', 'Georgetown', 214970, 748486, 'SA', '.gy', 'GYD', 'Dollar', 592, '', '', 'en-GY', 3378535, 'SR,BR,VE', ''),
('HK', 'HKG', 344, 'HK', 'Hong Kong', 'Hong Kong', 1092, 6898686, 'AS', '.hk', 'HKD', 'Dollar', 852, '', '', 'zh-HK,yue,zh,en', 1819730, '', ''),
('HM', 'HMD', 334, 'HM', 'Heard Island and McDonald Islands', '', 412, 0, 'AN', '.hm', 'AUD', 'Dollar', 0, '', '', '', 1547314, '', ''),
('HN', 'HND', 340, 'HO', 'Honduras', 'Tegucigalpa', 112090, 7989415, 'NA', '.hn', 'HNL', 'Lempira', 504, '@@####', '^([A-Z]{2}\\d{4})$', 'es-HN', 3608932, 'GT,NI,SV', ''),
('HR', 'HRV', 191, 'HR', 'Croatia', 'Zagreb', 56542, 4491000, 'EU', '.hr', 'HRK', 'Kuna', 385, '#####', '^(?:HR)*(\\d{5})$', 'hr-HR,sr', 3202326, 'HU,SI,CS,BA,ME,RS', ''),
('HT', 'HTI', 332, 'HA', 'Haiti', 'Port-au-Prince', 27750, 9648924, 'NA', '.ht', 'HTG', 'Gourde', 509, 'HT####', '^(?:HT)*(\\d{4})$', 'ht,fr-HT', 3723988, 'DO', ''),
('HU', 'HUN', 348, 'HU', 'Hungary', 'Budapest', 93030, 9982000, 'EU', '.hu', 'HUF', 'Forint', 36, '####', '^(\\d{4})$', 'hu-HU', 719819, 'SK,SI,RO,UA,CS,HR,AT,RS', ''),
('ID', 'IDN', 360, 'ID', 'Indonesia', 'Jakarta', 1919440, 242968342, 'AS', '.id', 'IDR', 'Rupiah', 62, '#####', '^(\\d{5})$', 'id,en,nl,jv', 1643084, 'PG,TL,MY', ''),
('IE', 'IRL', 372, 'EI', 'Ireland', 'Dublin', 70280, 4622917, 'EU', '.ie', 'EUR', 'Euro', 353, '', '', 'en-IE,ga-IE', 2963597, 'GB', ''),
('IL', 'ISR', 376, 'IS', 'Israel', 'Jerusalem', 20770, 7353985, 'AS', '.il', 'ILS', 'Shekel', 972, '#####', '^(\\d{5})$', 'he,ar-IL,en-IL,', 294640, 'SY,JO,LB,EG,PS', ''),
('IM', 'IMN', 833, 'IM', 'Isle of Man', 'Douglas, Isle of Man', 572, 75049, 'EU', '.im', 'GBP', 'Pound', 44, '@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|GIR0AA', '^(([A-Z]\\d{2}[A-Z]{2})|([A-Z]\\d{3}[A-Z]{2})|([A-Z]{2}\\d', 'en,gv', 3042225, '', ''),
('IN', 'IND', 356, 'IN', 'India', 'New Delhi', 3287590, 1173108018, 'AS', '.in', 'INR', 'Rupee', 91, '######', '^(\\d{6})$', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 1269750, 'CN,NP,MM,BT,PK,BD', ''),
('IO', 'IOT', 86, 'IO', 'British Indian Ocean Territory', 'Diego Garcia', 60, 4000, 'AS', '.io', 'USD', 'Dollar', 246, '', '', 'en-IO', 1282588, '', ''),
('IQ', 'IRQ', 368, 'IZ', 'Iraq', 'Baghdad', 437072, 29671605, 'AS', '.iq', 'IQD', 'Dinar', 964, '#####', '^(\\d{5})$', 'ar-IQ,ku,hy', 99237, 'SY,SA,IR,JO,TR,KW', ''),
('IR', 'IRN', 364, 'IR', 'Iran', 'Tehran', 1648000, 76923300, 'AS', '.ir', 'IRR', 'Rial', 98, '##########', '^(\\d{10})$', 'fa-IR,ku', 130758, 'TM,AF,IQ,AM,PK,AZ,TR', ''),
('IS', 'ISL', 352, 'IC', 'Iceland', 'Reykjavik', 103000, 308910, 'EU', '.is', 'ISK', 'Krona', 354, '###', '^(\\d{3})$', 'is,en,de,da,sv,no', 2629691, '', ''),
('IT', 'ITA', 380, 'IT', 'Italy', 'Rome', 301230, 60340328, 'EU', '.it', 'EUR', 'Euro', 39, '#####', '^(\\d{5})$', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 3175395, 'CH,VA,SI,SM,FR,AT', ''),
('JE', 'JEY', 832, 'JE', 'Jersey', 'Saint Helier', 116, 90812, 'EU', '.je', 'GBP', 'Pound', 44, '@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|GIR0AA', '^(([A-Z]\\d{2}[A-Z]{2})|([A-Z]\\d{3}[A-Z]{2})|([A-Z]{2}\\d', 'en,pt', 3042142, '', ''),
('JM', 'JAM', 388, 'JM', 'Jamaica', 'Kingston', 10991, 2847232, 'NA', '.jm', 'JMD', 'Dollar', 1, '', '', 'en-JM', 3489940, '', ''),
('JO', 'JOR', 400, 'JO', 'Jordan', 'Amman', 92300, 6407085, 'AS', '.jo', 'JOD', 'Dinar', 962, '#####', '^(\\d{5})$', 'ar-JO,en', 248816, 'SY,SA,IQ,IL,PS', ''),
('JP', 'JPN', 392, 'JA', 'Japan', 'Tokyo', 377835, 127288000, 'AS', '.jp', 'JPY', 'Yen', 81, '###-####', '^(\\d{7})$', 'ja', 1861060, '', ''),
('KE', 'KEN', 404, 'KE', 'Kenya', 'Nairobi', 582650, 40046566, 'AF', '.ke', 'KES', 'Shilling', 254, '#####', '^(\\d{5})$', 'en-KE,sw-KE', 192950, 'ET,TZ,SS,SO,UG', ''),
('KG', 'KGZ', 417, 'KG', 'Kyrgyzstan', 'Bishkek', 198500, 5508626, 'AS', '.kg', 'KGS', 'Som', 996, '######', '^(\\d{6})$', 'ky,uz,ru', 1527747, 'CN,TJ,UZ,KZ', ''),
('KH', 'KHM', 116, 'CB', 'Cambodia', 'Phnom Penh', 181040, 14453680, 'AS', '.kh', 'KHR', 'Riels', 855, '#####', '^(\\d{5})$', 'km,fr,en', 1831722, 'LA,TH,VN', ''),
('KI', 'KIR', 296, 'KR', 'Kiribati', 'Tarawa', 811, 92533, 'OC', '.ki', 'AUD', 'Dollar', 686, '', '', 'en-KI,gil', 4030945, '', ''),
('KM', 'COM', 174, 'CN', 'Comoros', 'Moroni', 2170, 773407, 'AF', '.km', 'KMF', 'Franc', 269, '', '', 'ar,fr-KM', 921929, '', ''),
('KN', 'KNA', 659, 'SC', 'Saint Kitts and Nevis', 'Basseterre', 261, 51134, 'NA', '.kn', 'XCD', 'Dollar', 1, '', '', 'en-KN', 3575174, '', ''),
('KP', 'PRK', 408, 'KN', 'North Korea', 'Pyongyang', 120540, 22912177, 'AS', '.kp', 'KPW', 'Won', 850, '###-###', '^(\\d{6})$', 'ko-KP', 1873107, 'CN,KR,RU', ''),
('KR', 'KOR', 410, 'KS', 'South Korea', 'Seoul', 98480, 48422644, 'AS', '.kr', 'KRW', 'Won', 82, 'SEOUL ###-###', '^(?:SEOUL)*(\\d{6})$', 'ko-KR,en', 1835841, 'KP', ''),
('KW', 'KWT', 414, 'KU', 'Kuwait', 'Kuwait City', 17820, 2789132, 'AS', '.kw', 'KWD', 'Dinar', 965, '#####', '^(\\d{5})$', 'ar-KW,en', 285570, 'SA,IQ', ''),
('KY', 'CYM', 136, 'CJ', 'Cayman Islands', 'George Town', 262, 44270, 'NA', '.ky', 'KYD', 'Dollar', 1, '', '', 'en-KY', 3580718, '', ''),
('KZ', 'KAZ', 398, 'KZ', 'Kazakhstan', 'Astana', 2717300, 15340000, 'AS', '.kz', 'KZT', 'Tenge', 7, '######', '^(\\d{6})$', 'kk,ru', 1522867, 'TM,CN,KG,UZ,RU', ''),
('LA', 'LAO', 418, 'LA', 'Laos', 'Vientiane', 236800, 6368162, 'AS', '.la', 'LAK', 'Kip', 856, '#####', '^(\\d{5})$', 'lo,fr,en', 1655842, 'CN,MM,KH,TH,VN', ''),
('LB', 'LBN', 422, 'LE', 'Lebanon', 'Beirut', 10400, 4125247, 'AS', '.lb', 'LBP', 'Pound', 961, '#### ####|####', '^(\\d{4}(\\d{4})?)$', 'ar-LB,fr-LB,en,hy', 272103, 'SY,IL', ''),
('LC', 'LCA', 662, 'ST', 'Saint Lucia', 'Castries', 616, 160922, 'NA', '.lc', 'XCD', 'Dollar', 1, '', '', 'en-LC', 3576468, '', ''),
('LI', 'LIE', 438, 'LS', 'Liechtenstein', 'Vaduz', 160, 35000, 'EU', '.li', 'CHF', 'Franc', 423, '####', '^(\\d{4})$', 'de-LI', 3042058, 'CH,AT', ''),
('LK', 'LKA', 144, 'CE', 'Sri Lanka', 'Colombo', 65610, 21513990, 'AS', '.lk', 'LKR', 'Rupee', 94, '#####', '^(\\d{5})$', 'si,ta,en', 1227603, '', ''),
('LR', 'LBR', 430, 'LI', 'Liberia', 'Monrovia', 111370, 3685076, 'AF', '.lr', 'LRD', 'Dollar', 231, '####', '^(\\d{4})$', 'en-LR', 2275384, 'SL,CI,GN', ''),
('LS', 'LSO', 426, 'LT', 'Lesotho', 'Maseru', 30355, 1919552, 'AF', '.ls', 'LSL', 'Loti', 266, '###', '^(\\d{3})$', 'en-LS,st,zu,xh', 932692, 'ZA', ''),
('LT', 'LTU', 440, 'LH', 'Lithuania', 'Vilnius', 65200, 3565000, 'EU', '.lt', 'LTL', 'Litas', 370, 'LT-#####', '^(?:LT)*(\\d{5})$', 'lt,ru,pl', 597427, 'PL,BY,RU,LV', ''),
('LU', 'LUX', 442, 'LU', 'Luxembourg', 'Luxembourg', 2586, 497538, 'EU', '.lu', 'EUR', 'Euro', 352, '####', '^(\\d{4})$', 'lb,de-LU,fr-LU', 2960313, 'DE,BE,FR', ''),
('LV', 'LVA', 428, 'LG', 'Latvia', 'Riga', 64589, 2217969, 'EU', '.lv', 'EUR', 'Euro', 371, 'LV-####', '^(?:LV)*(\\d{4})$', 'lv,ru,lt', 458258, 'LT,EE,BY,RU', ''),
('LY', 'LBY', 434, 'LY', 'Libya', 'Tripolis', 1759540, 6461454, 'AF', '.ly', 'LYD', 'Dinar', 218, '', '', 'ar-LY,it,en', 2215636, 'TD,NE,DZ,SD,TN,EG', ''),
('MA', 'MAR', 504, 'MO', 'Morocco', 'Rabat', 446550, 31627428, 'AF', '.ma', 'MAD', 'Dirham', 212, '#####', '^(\\d{5})$', 'ar-MA,fr', 2542007, 'DZ,EH,ES', ''),
('MC', 'MCO', 492, 'MN', 'Monaco', 'Monaco', 2, 32965, 'EU', '.mc', 'EUR', 'Euro', 377, '#####', '^(\\d{5})$', 'fr-MC,en,it', 2993457, 'FR', ''),
('MD', 'MDA', 498, 'MD', 'Moldova', 'Chisinau', 33843, 4324000, 'EU', '.md', 'MDL', 'Leu', 373, 'MD-####', '^(?:MD)*(\\d{4})$', 'ro,ru,gag,tr', 617790, 'RO,UA', ''),
('ME', 'MNE', 499, 'MJ', 'Montenegro', 'Podgorica', 14026, 666730, 'EU', '.me', 'EUR', 'Euro', 382, '#####', '^(\\d{5})$', 'sr,hu,bs,sq,hr,rom', 3194884, 'AL,HR,BA,RS,XK', ''),
('MF', 'MAF', 663, 'RN', 'Saint Martin', 'Marigot', 53, 35925, 'NA', '.gp', 'EUR', 'Euro', 590, '### ###', '', 'fr', 3578421, 'SX', ''),
('MG', 'MDG', 450, 'MA', 'Madagascar', 'Antananarivo', 587040, 21281844, 'AF', '.mg', 'MGA', 'Ariary', 261, '###', '^(\\d{3})$', 'fr-MG,mg', 1062947, '', ''),
('MH', 'MHL', 584, 'RM', 'Marshall Islands', 'Majuro', 181, 65859, 'OC', '.mh', 'USD', 'Dollar', 692, '', '', 'mh,en-MH', 2080185, '', ''),
('MK', 'MKD', 807, 'MK', 'Macedonia', 'Skopje', 25333, 2062294, 'EU', '.mk', 'MKD', 'Denar', 389, '####', '^(\\d{4})$', 'mk,sq,tr,rmm,sr', 718075, 'AL,GR,CS,BG,RS,XK', ''),
('ML', 'MLI', 466, 'ML', 'Mali', 'Bamako', 1240000, 13796354, 'AF', '.ml', 'XOF', 'Franc', 223, '', '', 'fr-ML,bm', 2453866, 'SN,NE,DZ,CI,GN,MR,BF', ''),
('MM', 'MMR', 104, 'BM', 'Myanmar', 'Nay Pyi Taw', 678500, 53414374, 'AS', '.mm', 'MMK', 'Kyat', 95, '#####', '^(\\d{5})$', 'my', 1327865, 'CN,LA,TH,BD,IN', ''),
('MN', 'MNG', 496, 'MG', 'Mongolia', 'Ulan Bator', 1565000, 3086918, 'AS', '.mn', 'MNT', 'Tugrik', 976, '######', '^(\\d{6})$', 'mn,ru', 2029969, 'CN,RU', ''),
('MO', 'MAC', 446, 'MC', 'Macao', 'Macao', 254, 449198, 'AS', '.mo', 'MOP', 'Pataca', 853, '', '', 'zh,zh-MO,pt', 1821275, '', ''),
('MP', 'MNP', 580, 'CQ', 'Northern Mariana Islands', 'Saipan', 477, 53883, 'OC', '.mp', 'USD', 'Dollar', 1, '', '', 'fil,tl,zh,ch-MP,en-MP', 4041468, '', ''),
('MQ', 'MTQ', 474, 'MB', 'Martinique', 'Fort-de-France', 1100, 432900, 'NA', '.mq', 'EUR', 'Euro', 596, '#####', '^(\\d{5})$', 'fr-MQ', 3570311, '', ''),
('MR', 'MRT', 478, 'MR', 'Mauritania', 'Nouakchott', 1030700, 3205060, 'AF', '.mr', 'MRO', 'Ouguiya', 222, '', '', 'ar-MR,fuc,snk,fr,mey,wo', 2378080, 'SN,DZ,EH,ML', ''),
('MS', 'MSR', 500, 'MH', 'Montserrat', 'Plymouth', 102, 9341, 'NA', '.ms', 'XCD', 'Dollar', 1, '', '', 'en-MS', 3578097, '', ''),
('MT', 'MLT', 470, 'MT', 'Malta', 'Valletta', 316, 403000, 'EU', '.mt', 'EUR', 'Euro', 356, '@@@ ###|@@@ ##', '^([A-Z]{3}\\d{2}\\d?)$', 'mt,en-MT', 2562770, '', ''),
('MU', 'MUS', 480, 'MP', 'Mauritius', 'Port Louis', 2040, 1294104, 'AF', '.mu', 'MUR', 'Rupee', 230, '', '', 'en-MU,bho,fr', 934292, '', ''),
('MV', 'MDV', 462, 'MV', 'Maldives', 'Male', 300, 395650, 'AS', '.mv', 'MVR', 'Rufiyaa', 960, '#####', '^(\\d{5})$', 'dv,en', 1282028, '', ''),
('MW', 'MWI', 454, 'MI', 'Malawi', 'Lilongwe', 118480, 15447500, 'AF', '.mw', 'MWK', 'Kwacha', 265, '', '', 'ny,yao,tum,swk', 927384, 'TZ,MZ,ZM', ''),
('MX', 'MEX', 484, 'MX', 'Mexico', 'Mexico City', 1972550, 112468855, 'NA', '.mx', 'MXN', 'Peso', 52, '#####', '^(\\d{5})$', 'es-MX', 3996063, 'GT,US,BZ', ''),
('MY', 'MYS', 458, 'MY', 'Malaysia', 'Kuala Lumpur', 329750, 28274729, 'AS', '.my', 'MYR', 'Ringgit', 60, '#####', '^(\\d{5})$', 'ms-MY,en,zh,ta,te,ml,pa,th', 1733045, 'BN,TH,ID', ''),
('MZ', 'MOZ', 508, 'MZ', 'Mozambique', 'Maputo', 801590, 22061451, 'AF', '.mz', 'MZN', 'Metical', 258, '####', '^(\\d{4})$', 'pt-MZ,vmw', 1036973, 'ZW,TZ,SZ,ZA,ZM,MW', ''),
('NA', 'NAM', 516, 'WA', 'Namibia', 'Windhoek', 825418, 2128471, 'AF', '.na', 'NAD', 'Dollar', 264, '', '', 'en-NA,af,de,hz,naq', 3355338, 'ZA,BW,ZM,AO', ''),
('NC', 'NCL', 540, 'NC', 'New Caledonia', 'Noumea', 19060, 216494, 'OC', '.nc', 'XPF', 'Franc', 687, '#####', '^(\\d{5})$', 'fr-NC', 2139685, '', ''),
('NE', 'NER', 562, 'NG', 'Niger', 'Niamey', 1267000, 15878271, 'AF', '.ne', 'XOF', 'Franc', 227, '####', '^(\\d{4})$', 'fr-NE,ha,kr,dje', 2440476, 'TD,BJ,DZ,LY,BF,NG,ML', ''),
('NF', 'NFK', 574, 'NF', 'Norfolk Island', 'Kingston', 35, 1828, 'OC', '.nf', 'AUD', 'Dollar', 672, '####', '^(\\d{4})$', 'en-NF', 2155115, '', ''),
('NG', 'NGA', 566, 'NI', 'Nigeria', 'Abuja', 923768, 154000000, 'AF', '.ng', 'NGN', 'Naira', 234, '######', '^(\\d{6})$', 'en-NG,ha,yo,ig,ff', 2328926, 'TD,NE,BJ,CM', ''),
('NI', 'NIC', 558, 'NU', 'Nicaragua', 'Managua', 129494, 5995928, 'NA', '.ni', 'NIO', 'Cordoba', 505, '###-###-#', '^(\\d{7})$', 'es-NI,en', 3617476, 'CR,HN', ''),
('NL', 'NLD', 528, 'NL', 'Netherlands', 'Amsterdam', 41526, 16645000, 'EU', '.nl', 'EUR', 'Euro', 31, '#### @@', '^(\\d{4}[A-Z]{2})$', 'nl-NL,fy-NL', 2750405, 'DE,BE', ''),
('NO', 'NOR', 578, 'NO', 'Norway', 'Oslo', 324220, 5009150, 'EU', '.no', 'NOK', 'Krone', 47, '####', '^(\\d{4})$', 'no,nb,nn,se,fi', 3144096, 'FI,RU,SE', ''),
('NP', 'NPL', 524, 'NP', 'Nepal', 'Kathmandu', 140800, 28951852, 'AS', '.np', 'NPR', 'Rupee', 977, '#####', '^(\\d{5})$', 'ne,en', 1282988, 'CN,IN', ''),
('NR', 'NRU', 520, 'NR', 'Nauru', 'Yaren', 21, 10065, 'OC', '.nr', 'AUD', 'Dollar', 674, '', '', 'na,en-NR', 2110425, '', ''),
('NU', 'NIU', 570, 'NE', 'Niue', 'Alofi', 260, 2166, 'OC', '.nu', 'NZD', 'Dollar', 683, '', '', 'niu,en-NU', 4036232, '', ''),
('NZ', 'NZL', 554, 'NZ', 'New Zealand', 'Wellington', 268680, 4252277, 'OC', '.nz', 'NZD', 'Dollar', 64, '####', '^(\\d{4})$', 'en-NZ,mi', 2186224, '', ''),
('OM', 'OMN', 512, 'MU', 'Oman', 'Muscat', 212460, 2967717, 'AS', '.om', 'OMR', 'Rial', 968, '###', '^(\\d{3})$', 'ar-OM,en,bal,ur', 286963, 'SA,YE,AE', ''),
('PA', 'PAN', 591, 'PM', 'Panama', 'Panama City', 78200, 3410676, 'NA', '.pa', 'PAB', 'Balboa', 507, '', '', 'es-PA,en', 3703430, 'CR,CO', ''),
('PE', 'PER', 604, 'PE', 'Peru', 'Lima', 1285220, 29907003, 'SA', '.pe', 'PEN', 'Sol', 51, '', '', 'es-PE,qu,ay', 3932488, 'EC,CL,BO,BR,CO', ''),
('PF', 'PYF', 258, 'FP', 'French Polynesia', 'Papeete', 4167, 270485, 'OC', '.pf', 'XPF', 'Franc', 689, '#####', '^((97|98)7\\d{2})$', 'fr-PF,ty', 4030656, '', ''),
('PG', 'PNG', 598, 'PP', 'Papua New Guinea', 'Port Moresby', 462840, 6064515, 'OC', '.pg', 'PGK', 'Kina', 675, '###', '^(\\d{3})$', 'en-PG,ho,meu,tpi', 2088628, 'ID', ''),
('PH', 'PHL', 608, 'RP', 'Philippines', 'Manila', 300000, 99900177, 'AS', '.ph', 'PHP', 'Peso', 63, '####', '^(\\d{4})$', 'tl,en-PH,fil', 1694008, '', ''),
('PK', 'PAK', 586, 'PK', 'Pakistan', 'Islamabad', 803940, 184404791, 'AS', '.pk', 'PKR', 'Rupee', 92, '#####', '^(\\d{5})$', 'ur-PK,en-PK,pa,sd,ps,brh', 1168579, 'CN,AF,IR,IN', ''),
('PL', 'POL', 616, 'PL', 'Poland', 'Warsaw', 312685, 38500000, 'EU', '.pl', 'PLN', 'Zloty', 48, '##-###', '^(\\d{5})$', 'pl', 798544, 'DE,LT,SK,CZ,BY,UA,RU', ''),
('PM', 'SPM', 666, 'SB', 'Saint Pierre and Miquelon', 'Saint-Pierre', 242, 7012, 'NA', '.pm', 'EUR', 'Euro', 508, '#####', '^(97500)$', 'fr-PM', 3424932, '', ''),
('PN', 'PCN', 612, 'PC', 'Pitcairn', 'Adamstown', 47, 46, 'OC', '.pn', 'NZD', 'Dollar', 870, '', '', 'en-PN', 4030699, '', ''),
('PR', 'PRI', 630, 'RQ', 'Puerto Rico', 'San Juan', 9104, 3916632, 'NA', '.pr', 'USD', 'Dollar', 1, '#####-####', '^(\\d{9})$', 'en-PR,es-PR', 4566966, '', ''),
('PS', 'PSE', 275, 'WE', 'Palestinian Territory', 'East Jerusalem', 5970, 3800000, 'AS', '.ps', 'ILS', 'Shekel', 970, '', '', 'ar-PS', 6254930, 'JO,IL', ''),
('PT', 'PRT', 620, 'PO', 'Portugal', 'Lisbon', 92391, 10676000, 'EU', '.pt', 'EUR', 'Euro', 351, '####-###', '^(\\d{7})$', 'pt-PT,mwl', 2264397, 'ES', ''),
('PW', 'PLW', 585, 'PS', 'Palau', 'Melekeok', 458, 19907, 'OC', '.pw', 'USD', 'Dollar', 680, '96940', '^(96940)$', 'pau,sov,en-PW,tox,ja,fil,zh', 1559582, '', ''),
('PY', 'PRY', 600, 'PA', 'Paraguay', 'Asuncion', 406750, 6375830, 'SA', '.py', 'PYG', 'Guarani', 595, '####', '^(\\d{4})$', 'es-PY,gn', 3437598, 'BO,BR,AR', ''),
('QA', 'QAT', 634, 'QA', 'Qatar', 'Doha', 11437, 840926, 'AS', '.qa', 'QAR', 'Rial', 974, '', '', 'ar-QA,es', 289688, 'SA', ''),
('RE', 'REU', 638, 'RE', 'Reunion', 'Saint-Denis', 2517, 776948, 'AF', '.re', 'EUR', 'Euro', 262, '#####', '^((97|98)(4|7|8)\\d{2})$', 'fr-RE', 935317, '', ''),
('RO', 'ROU', 642, 'RO', 'Romania', 'Bucharest', 237500, 21959278, 'EU', '.ro', 'RON', 'Leu', 40, '######', '^(\\d{6})$', 'ro,hu,rom', 798549, 'MD,HU,UA,CS,BG,RS', ''),
('RS', 'SRB', 688, 'RI', 'Serbia', 'Belgrade', 88361, 7344847, 'EU', '.rs', 'RSD', 'Dinar', 381, '######', '^(\\d{6})$', 'sr,hu,bs,rom', 6290252, 'AL,HU,MK,RO,HR,BA,BG,ME,XK', ''),
('RU', 'RUS', 643, 'RS', 'Russia', 'Moscow', 17100000, 140702000, 'EU', '.ru', 'RUB', 'Ruble', 7, '######', '^(\\d{6})$', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 2017370, 'GE,CN,BY,UA,KZ,LV,PL,EE,LT,FI,MN,NO,AZ,KP', ''),
('RW', 'RWA', 646, 'RW', 'Rwanda', 'Kigali', 26338, 11055976, 'AF', '.rw', 'RWF', 'Franc', 250, '', '', 'rw,en-RW,fr-RW,sw', 49518, 'TZ,CD,BI,UG', ''),
('SA', 'SAU', 682, 'SA', 'Saudi Arabia', 'Riyadh', 1960582, 25731776, 'AS', '.sa', 'SAR', 'Rial', 966, '#####', '^(\\d{5})$', 'ar-SA', 102358, 'QA,OM,IQ,YE,JO,AE,KW', ''),
('SB', 'SLB', 90, 'BP', 'Solomon Islands', 'Honiara', 28450, 559198, 'OC', '.sb', 'SBD', 'Dollar', 677, '', '', 'en-SB,tpi', 2103350, '', ''),
('SC', 'SYC', 690, 'SE', 'Seychelles', 'Victoria', 455, 88340, 'AF', '.sc', 'SCR', 'Rupee', 248, '', '', 'en-SC,fr-SC', 241170, '', ''),
('SD', 'SDN', 729, 'SU', 'Sudan', 'Khartoum', 1861484, 35000000, 'AF', '.sd', 'SDG', 'Pound', 249, '#####', '^(\\d{5})$', 'ar-SD,en,fia', 366755, 'SS,TD,EG,ET,ER,LY,CF', ''),
('SE', 'SWE', 752, 'SW', 'Sweden', 'Stockholm', 449964, 9555893, 'EU', '.se', 'SEK', 'Krona', 46, '### ##', '^(?:SE)*(\\d{5})$', 'sv-SE,se,sma,fi-SE', 2661886, 'NO,FI', ''),
('SG', 'SGP', 702, 'SN', 'Singapore', 'Singapur', 693, 4701069, 'AS', '.sg', 'SGD', 'Dollar', 65, '######', '^(\\d{6})$', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 1880251, '', ''),
('SH', 'SHN', 654, 'SH', 'Saint Helena', 'Jamestown', 410, 7460, 'AF', '.sh', 'SHP', 'Pound', 290, 'STHL 1ZZ', '^(STHL1ZZ)$', 'en-SH', 3370751, '', ''),
('SI', 'SVN', 705, 'SI', 'Slovenia', 'Ljubljana', 20273, 2007000, 'EU', '.si', 'EUR', 'Euro', 386, '####', '^(?:SI)*(\\d{4})$', 'sl,sh', 3190538, 'HU,IT,HR,AT', ''),
('SJ', 'SJM', 744, 'SV', 'Svalbard and Jan Mayen', 'Longyearbyen', 62049, 2550, 'EU', '.sj', 'NOK', 'Krone', 47, '', '', 'no,ru', 607072, '', ''),
('SK', 'SVK', 703, 'LO', 'Slovakia', 'Bratislava', 48845, 5455000, 'EU', '.sk', 'EUR', 'Euro', 421, '### ##', '^(\\d{5})$', 'sk,hu', 3057568, 'PL,HU,CZ,UA,AT', ''),
('SL', 'SLE', 694, 'SL', 'Sierra Leone', 'Freetown', 71740, 5245695, 'AF', '.sl', 'SLL', 'Leone', 232, '', '', 'en-SL,men,tem', 2403846, 'LR,GN', ''),
('SM', 'SMR', 674, 'SM', 'San Marino', 'San Marino', 61, 31477, 'EU', '.sm', 'EUR', 'Euro', 378, '4789#', '^(4789\\d)$', 'it-SM', 3168068, 'IT', ''),
('SN', 'SEN', 686, 'SG', 'Senegal', 'Dakar', 196190, 12323252, 'AF', '.sn', 'XOF', 'Franc', 221, '#####', '^(\\d{5})$', 'fr-SN,wo,fuc,mnk', 2245662, 'GN,MR,GW,GM,ML', ''),
('SO', 'SOM', 706, 'SO', 'Somalia', 'Mogadishu', 637657, 10112453, 'AF', '.so', 'SOS', 'Shilling', 252, '@@  #####', '^([A-Z]{2}\\d{5})$', 'so-SO,ar-SO,it,en-SO', 51537, 'ET,KE,DJ', ''),
('SR', 'SUR', 740, 'NS', 'Suriname', 'Paramaribo', 163270, 492829, 'SA', '.sr', 'SRD', 'Dollar', 597, '', '', 'nl-SR,en,srn,hns,jv', 3382998, 'GY,BR,GF', ''),
('SS', 'SSD', 728, 'OD', 'South Sudan', 'Juba', 644329, 8260490, 'AF', '', 'SSP', 'Pound', 211, '', '', 'en', 7909807, 'CD,CF,ET,KE,SD,UG,', ''),
('ST', 'STP', 678, 'TP', 'Sao Tome and Principe', 'Sao Tome', 1001, 175808, 'AF', '.st', 'STD', 'Dobra', 239, '', '', 'pt-ST', 2410758, '', ''),
('SV', 'SLV', 222, 'ES', 'El Salvador', 'San Salvador', 21040, 6052064, 'NA', '.sv', 'USD', 'Dollar', 503, 'CP ####', '^(?:CP)*(\\d{4})$', 'es-SV', 3585968, 'GT,HN', ''),
('SX', 'SXM', 534, 'NN', 'Sint Maarten', 'Philipsburg', 0, 37429, 'NA', '.sx', 'ANG', 'Guilder', 599, '', '', 'nl,en', 7609695, 'MF', ''),
('SY', 'SYR', 760, 'SY', 'Syria', 'Damascus', 185180, 22198110, 'AS', '.sy', 'SYP', 'Pound', 963, '', '', 'ar-SY,ku,hy,arc,fr,en', 163843, 'IQ,JO,IL,TR,LB', ''),
('SZ', 'SWZ', 748, 'WZ', 'Swaziland', 'Mbabane', 17363, 1354051, 'AF', '.sz', 'SZL', 'Lilangeni', 268, '@###', '^([A-Z]\\d{3})$', 'en-SZ,ss-SZ', 934841, 'ZA,MZ', ''),
('TC', 'TCA', 796, 'TK', 'Turks and Caicos Islands', 'Cockburn Town', 430, 20556, 'NA', '.tc', 'USD', 'Dollar', 1, 'TKCA 1ZZ', '^(TKCA 1ZZ)$', 'en-TC', 3576916, '', ''),
('TD', 'TCD', 148, 'CD', 'Chad', 'N\'Djamena', 1284000, 10543464, 'AF', '.td', 'XAF', 'Franc', 235, '', '', 'fr-TD,ar-TD,sre', 2434508, 'NE,LY,CF,SD,CM,NG', ''),
('TF', 'ATF', 260, 'FS', 'French Southern Territories', 'Port-aux-Francais', 7829, 140, 'AN', '.tf', 'EUR', 'Euro  ', 0, '', '', 'fr', 1546748, '', ''),
('TG', 'TGO', 768, 'TO', 'Togo', 'Lome', 56785, 6587239, 'AF', '.tg', 'XOF', 'Franc', 228, '', '', 'fr-TG,ee,hna,kbp,dag,ha', 2363686, 'BJ,GH,BF', ''),
('TH', 'THA', 764, 'TH', 'Thailand', 'Bangkok', 514000, 67089500, 'AS', '.th', 'THB', 'Baht', 66, '#####', '^(\\d{5})$', 'th,en', 1605651, 'LA,MM,KH,MY', ''),
('TJ', 'TJK', 762, 'TI', 'Tajikistan', 'Dushanbe', 143100, 7487489, 'AS', '.tj', 'TJS', 'Somoni', 992, '######', '^(\\d{6})$', 'tg,ru', 1220409, 'CN,AF,KG,UZ', ''),
('TK', 'TKL', 772, 'TL', 'Tokelau', '', 10, 1466, 'OC', '.tk', 'NZD', 'Dollar', 690, '', '', 'tkl,en-TK', 4031074, '', ''),
('TL', 'TLS', 626, 'TT', 'East Timor', 'Dili', 15007, 1154625, 'OC', '.tl', 'USD', 'Dollar', 670, '', '', 'tet,pt-TL,id,en', 1966436, 'ID', ''),
('TM', 'TKM', 795, 'TX', 'Turkmenistan', 'Ashgabat', 488100, 4940916, 'AS', '.tm', 'TMT', 'Manat', 993, '######', '^(\\d{6})$', 'tk,ru,uz', 1218197, 'AF,IR,UZ,KZ', ''),
('TN', 'TUN', 788, 'TS', 'Tunisia', 'Tunis', 163610, 10589025, 'AF', '.tn', 'TND', 'Dinar', 216, '####', '^(\\d{4})$', 'ar-TN,fr', 2464461, 'DZ,LY', ''),
('TO', 'TON', 776, 'TN', 'Tonga', 'Nuku\'alofa', 748, 122580, 'OC', '.to', 'TOP', 'Pa\'anga', 676, '', '', 'to,en-TO', 4032283, '', ''),
('TR', 'TUR', 792, 'TU', 'Turkey', 'Ankara', 780580, 77804122, 'AS', '.tr', 'TRY', 'Lira', 90, '#####', '^(\\d{5})$', 'tr-TR,ku,diq,az,av', 298795, 'SY,GE,IQ,IR,GR,AM,AZ,BG', ''),
('TT', 'TTO', 780, 'TD', 'Trinidad and Tobago', 'Port of Spain', 5128, 1228691, 'NA', '.tt', 'TTD', 'Dollar', 1, '', '', 'en-TT,hns,fr,es,zh', 3573591, '', ''),
('TV', 'TUV', 798, 'TV', 'Tuvalu', 'Funafuti', 26, 10472, 'OC', '.tv', 'AUD', 'Dollar', 688, '', '', 'tvl,en,sm,gil', 2110297, '', ''),
('TW', 'TWN', 158, 'TW', 'Taiwan', 'Taipei', 35980, 22894384, 'AS', '.tw', 'TWD', 'Dollar', 886, '#####', '^(\\d{5})$', 'zh-TW,zh,nan,hak', 1668284, '', ''),
('TZ', 'TZA', 834, 'TZ', 'Tanzania', 'Dodoma', 945087, 41892895, 'AF', '.tz', 'TZS', 'Shilling', 255, '', '', 'sw-TZ,en,ar', 149590, 'MZ,KE,CD,RW,ZM,BI,UG,MW', ''),
('UA', 'UKR', 804, 'UP', 'Ukraine', 'Kiev', 603700, 45415596, 'EU', '.ua', 'UAH', 'Hryvnia', 380, '#####', '^(\\d{5})$', 'uk,ru-UA,rom,pl,hu', 690791, 'PL,MD,HU,SK,BY,RO,RU', ''),
('UG', 'UGA', 800, 'UG', 'Uganda', 'Kampala', 236040, 33398682, 'AF', '.ug', 'UGX', 'Shilling', 256, '', '', 'en-UG,lg,sw,ar', 226074, 'TZ,KE,SS,CD,RW', ''),
('UM', 'UMI', 581, '', 'United States Minor Outlying Islands', '', 0, 0, 'OC', '.um', 'USD', 'Dollar ', 1, '', '', 'en-UM', 5854968, '', ''),
('US', 'USA', 840, 'US', 'United States', 'Washington', 9629091, 310232863, 'NA', '.us', 'USD', 'Dollar', 1, '#####-####', '^\\d{5}(-\\d{4})?$', 'en-US,es-US,haw,fr', 6252001, 'CA,MX,CU', ''),
('UY', 'URY', 858, 'UY', 'Uruguay', 'Montevideo', 176220, 3477000, 'SA', '.uy', 'UYU', 'Peso', 598, '#####', '^(\\d{5})$', 'es-UY', 3439705, 'BR,AR', ''),
('UZ', 'UZB', 860, 'UZ', 'Uzbekistan', 'Tashkent', 447400, 27865738, 'AS', '.uz', 'UZS', 'Som', 998, '######', '^(\\d{6})$', 'uz,ru,tg', 1512440, 'TM,AF,KG,TJ,KZ', ''),
('VA', 'VAT', 336, 'VT', 'Vatican', 'Vatican City', 0, 921, 'EU', '.va', 'EUR', 'Euro', 379, '#####', '^(\\d{5})$', 'la,it,fr', 3164670, 'IT', ''),
('VC', 'VCT', 670, 'VC', 'Saint Vincent and the Grenadines', 'Kingstown', 389, 104217, 'NA', '.vc', 'XCD', 'Dollar', 1, '', '', 'en-VC,fr', 3577815, '', ''),
('VE', 'VEN', 862, 'VE', 'Venezuela', 'Caracas', 912050, 27223228, 'SA', '.ve', 'VEF', 'Bolivar', 58, '####', '^(\\d{4})$', 'es-VE', 3625428, 'GY,BR,CO', ''),
('VG', 'VGB', 92, 'VI', 'British Virgin Islands', 'Road Town', 153, 21730, 'NA', '.vg', 'USD', 'Dollar', 1, '', '', 'en-VG', 3577718, '', ''),
('VI', 'VIR', 850, 'VQ', 'U.S. Virgin Islands', 'Charlotte Amalie', 352, 108708, 'NA', '.vi', 'USD', 'Dollar', 1, '#####-####', '^\\d{5}(-\\d{4})?$', 'en-VI', 4796775, '', ''),
('VN', 'VNM', 704, 'VM', 'Vietnam', 'Hanoi', 329560, 89571130, 'AS', '.vn', 'VND', 'Dong', 84, '######', '^(\\d{6})$', 'vi,en,fr,zh,km', 1562822, 'CN,LA,KH', ''),
('VU', 'VUT', 548, 'NH', 'Vanuatu', 'Port Vila', 12200, 221552, 'OC', '.vu', 'VUV', 'Vatu', 678, '', '', 'bi,en-VU,fr-VU', 2134431, '', ''),
('WF', 'WLF', 876, 'WF', 'Wallis and Futuna', 'Mata Utu', 274, 16025, 'OC', '.wf', 'XPF', 'Franc', 681, '#####', '^(986\\d{2})$', 'wls,fud,fr-WF', 4034749, '', ''),
('WS', 'WSM', 882, 'WS', 'Samoa', 'Apia', 2944, 192001, 'OC', '.ws', 'WST', 'Tala', 685, '', '', 'sm,en-WS', 4034894, '', ''),
('XK', 'XKX', 0, 'KV', 'Kosovo', 'Pristina', 0, 1800000, 'EU', '', 'EUR', 'Euro', 0, '', '', 'sq,sr', 831053, 'RS,AL,MK,ME', ''),
('YE', 'YEM', 887, 'YM', 'Yemen', 'Sanaa', 527970, 23495361, 'AS', '.ye', 'YER', 'Rial', 967, '', '', 'ar-YE', 69543, 'SA,OM', ''),
('YT', 'MYT', 175, 'MF', 'Mayotte', 'Mamoudzou', 374, 159042, 'AF', '.yt', 'EUR', 'Euro', 262, '#####', '^(\\d{5})$', 'fr-YT', 1024031, '', ''),
('ZA', 'ZAF', 710, 'SF', 'South Africa', 'Pretoria', 1219912, 49000000, 'AF', '.za', 'ZAR', 'Rand', 27, '####', '^(\\d{4})$', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 953987, 'ZW,SZ,MZ,BW,NA,LS', ''),
('ZM', 'ZMB', 894, 'ZA', 'Zambia', 'Lusaka', 752614, 13460305, 'AF', '.zm', 'ZMK', 'Kwacha', 260, '#####', '^(\\d{5})$', 'en-ZM,bem,loz,lun,lue,ny,toi', 895949, 'ZW,TZ,MZ,CD,NA,MW,AO', ''),
('ZW', 'ZWE', 716, 'ZI', 'Zimbabwe', 'Harare', 390580, 11651858, 'AF', '.zw', 'ZWL', 'Dollar', 263, '', '', 'en-ZW,sn,nr,nd', 878675, 'ZA,MZ,BW,ZM', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `count`, `created_at`, `edited_at`) VALUES
(1, 'Brave', 'some fighters\r\nthey fight every night.', NULL, '2022-10-08 22:33:36', '2022-10-22 22:09:50'),
(3, 'gladiators', 'Arena heros', NULL, '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
(4, 'sleeper', 'bed lovers who stay up late and sleep till noon.', NULL, '2022-10-08 22:34:51', '2022-10-08 20:34:17'),
(10, 'test', 'test', NULL, '2022-10-23 16:16:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `p_id`, `img_path`, `comment`, `uploaded_at`) VALUES
(18, 56, '1666201103-56.jpg', '', '2022-10-19 19:38:23'),
(24, 55, '1666249335-55.jpg', 'Orlando when will be aged', '2022-10-20 09:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `title`, `description`) VALUES
(2, 'My best work', 'not that important'),
(8, 'presedent', 'this title belong to me alone'),
(10, 'jack title', 'this is a work that only jack can do'),
(12, 'Brave', 'solder'),
(15, 'asda', 'asdasd'),
(18, 'Queen', 'katie is not qualified to be a queen, she is much better than that..'),
(20, 'Brave fighter', 'always available, fighting for the truth...'),
(21, 'Brave JET', 'always FLYING...');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `description`, `extra`) VALUES
(5, 'Arabic', 'fantastic', 'something about Arabic, it is something.'),
(9, 'English', 'most common language', 'say something'),
(10, 'French', 'description', 'extra personal notes'),
(11, 'Portuguese', 'porto description', 'extra personal data');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `sex`, `email`, `img`, `birthday`, `created_at`, `edited_at`, `added_by`) VALUES
(42, 'Alfonso', 'Martinho', 'male', 'AM@gmail.com', NULL, '1980-10-22', '2022-10-13 20:23:47', '2022-10-24 11:02:26', 16),
(43, 'Bethany', 'Bernando', 'female', 'Bernando@gmail.com', NULL, NULL, '2022-10-13 20:24:10', '2022-10-19 18:36:31', 16),
(44, 'Captin', 'Boolean', 'male', 'Salty@gmail.com', NULL, NULL, '2022-10-13 20:24:46', '2022-10-14 16:09:09', 16),
(45, 'Ebrahim', 'Salto', 'male', 'e.salto@gmail.com', NULL, '1990-01-23', '2022-10-13 20:25:30', '2022-10-24 11:02:38', 16),
(46, 'Fredrick', 'Labo', 'male', 'labo@gmail.com', NULL, NULL, '2022-10-13 20:26:09', NULL, 16),
(47, 'George', 'Creepo', 'male', 'smily_g@gmail.com', NULL, '1970-02-03', '2022-10-13 20:26:42', '2022-10-24 11:02:54', 16),
(48, 'Haroot', 'Bebayan', 'male', 'h.b@gmail.com', NULL, NULL, '2022-10-13 20:27:09', '2022-10-19 18:36:43', 16),
(49, 'Israel', 'beni', 'male', 'I.beni@gmail.com', NULL, NULL, '2022-10-13 20:27:42', NULL, 16),
(51, 'Kathren', 'Sorbonne', 'female', 'kasor@gmail.com', NULL, NULL, '2022-10-13 20:29:54', NULL, 16),
(52, 'Linda', 'sweet', 'female', 'lsweet@gmail.com', NULL, NULL, '2022-10-13 20:30:13', '2022-10-24 09:19:48', 16),
(53, 'Marcos', 'Pavoto', 'male', 'pavma@gmail.com', NULL, NULL, '2022-10-13 20:30:45', '2022-10-24 09:20:33', 16),
(54, 'Nona', 'Pretty', 'female', 'sweet_n@gmail.com', NULL, '1973-10-05', '2022-10-13 20:31:08', '2022-10-22 10:20:23', 16),
(55, 'Orlando', 'boxer', 'male', 'ob@gmail.com', NULL, NULL, '2022-10-13 20:31:29', '2022-10-24 09:21:03', 16),
(56, 'Patrick', 'Mano', 'male', 'mano_p@gmail.com', NULL, NULL, '2022-10-13 20:32:43', '2022-10-24 09:21:06', 16),
(69, 'test', 'testing', 'female', 'test@test.com', NULL, '3214-02-02', '2022-10-24 12:42:35', NULL, 16),
(70, 'asdasd', 'asdasd', 'female', 'asd@asdasd', NULL, '1982-09-22', '2022-10-24 12:52:09', '2022-10-24 12:56:52', 16),
(71, 'test', 'test', 'male', 'ts@safasfd', NULL, '1970-01-01', '2022-10-27 19:17:33', NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `people_countries`
--

CREATE TABLE `people_countries` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_countries`
--

INSERT INTO `people_countries` (`id`, `p_id`, `c_id`, `comment`) VALUES
(2, 43, 4, 'aaa\r\naaa\r\naaaasdadaad\r\n'),
(3, 44, 4, 'asdqqweqweasdad'),
(4, 45, 4, 'dddddd'),
(5, 43, 28, 'aaaaadsasds'),
(6, 42, 36, 'dddsad\r\nasd'),
(8, 54, 4, 'adasdads'),
(10, 54, 8, 'aa'),
(11, 55, 4, '\'\'\''),
(12, 43, 470, 'jhg'),
(13, 42, 44, 'ss'),
(15, 71, 8, 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `people_groups`
--

CREATE TABLE `people_groups` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_groups`
--

INSERT INTO `people_groups` (`id`, `group_id`, `p_id`, `comment`, `created_at`) VALUES
(1, 1, 54, 'dd', '2022-10-22 20:05:04'),
(2, 4, 46, 'kkkjjjkjkjkjkjkjkj', '2022-10-22 20:05:04'),
(3, 1, 51, 'aassaassasasas', '2022-10-22 20:05:04'),
(4, 1, 53, 'ssdsdsdsdddsdsd', '2022-10-22 20:05:04'),
(6, 4, 54, 'xxxcxcxccxxc', '2022-10-22 20:05:04'),
(8, 1, 56, 'zdddzddzd', '2022-10-22 20:05:04'),
(9, 3, 48, 'gtgtggtg', '2022-10-22 20:05:04'),
(10, 3, 47, 'hghgh', '2022-10-22 20:05:04'),
(11, 3, 46, 'kkjhs df', '2022-10-22 20:05:04'),
(12, 4, 44, 'jack /n ;slkf;lksf', '2022-10-22 20:05:04'),
(13, 4, 45, 'sdfsferrbrbtb', '2022-10-22 20:05:04'),
(14, 4, 43, 'bgbgbgbtbtgb', '2022-10-22 20:05:04'),
(15, 4, 42, 'hnhnhnynynnh', '2022-10-22 20:05:04'),
(18, 1, 42, 'aadd\r\nddadad', '2022-10-23 16:13:25'),
(19, 1, 52, 'ddssaa', '2022-10-23 16:14:12'),
(24, 10, 51, 'aaa\r\nbbb', '2022-10-23 16:20:07'),
(25, 3, 71, 'manager', '2022-10-27 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `people_languages`
--

CREATE TABLE `people_languages` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `lan_id` int(11) NOT NULL,
  `levle` enum('25','50','75','100') NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_languages`
--

INSERT INTO `people_languages` (`id`, `p_id`, `lan_id`, `levle`, `comment`) VALUES
(70, 46, 9, '25', ''),
(85, 45, 11, '100', 'lorem a;lskjd apwoj mvn ,xmnvc\r\nlaskdj alksdj pawojd lakjf sd'),
(86, 46, 10, '75', 'well, speaking has a shy personality\r\nand can be relyed on!'),
(87, 55, 11, '50', 'nice accent, Brazilian.'),
(88, 55, 9, '50', 'facing some difficulties to express, but understandable language.'),
(90, 43, 11, '75', ''),
(92, 56, 11, '75', ''),
(93, 53, 10, '75', ''),
(95, 56, 10, '100', 'asd'),
(98, 44, 5, '50', ''),
(99, 44, 11, '75', ''),
(100, 44, 10, '100', 'aasd'),
(105, 51, 10, '25', ''),
(106, 51, 10, '25', ''),
(107, 46, 11, '25', ''),
(108, 46, 11, '25', ''),
(109, 46, 10, '25', ''),
(110, 49, 10, '25', '765'),
(111, 45, 11, '50', 'ddsadsad'),
(112, 45, 5, '25', 'ssad'),
(115, 48, 10, '50', 'nice'),
(118, 56, 9, '100', 'mother tongue'),
(119, 52, 9, '75', 'no comment, has an accent?'),
(125, 42, 5, '25', ''),
(126, 42, 9, '75', '\'\''),
(127, 42, 11, '50', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `people_timezones`
--

CREATE TABLE `people_timezones` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_timezones`
--

INSERT INTO `people_timezones` (`id`, `p_id`, `t_id`, `status`) VALUES
(31, 42, 3, 'status'),
(32, 42, 4, NULL),
(35, 43, 3, 'status'),
(36, 43, 4, NULL),
(38, 42, 1, NULL),
(39, 42, 108, NULL),
(40, 45, 402, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people_titles`
--

CREATE TABLE `people_titles` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_titles`
--

INSERT INTO `people_titles` (`id`, `t_id`, `p_id`, `description`) VALUES
(11, 2, 45, 'a'),
(13, 21, 43, 'best'),
(14, 10, 52, 'bestysasd'),
(15, 2, 43, ' asdasdasd'),
(16, 18, 54, 'test * \r\n* test\r\nshe might be a queen, but she is just a local queen in a small community.\r\nthere are other people who hold this position.'),
(21, 8, 42, 'aa\r\n ss dd'),
(22, 8, 44, 'something about something'),
(25, 21, 55, 'asd\r\nasd\r\n\r\na'),
(26, 2, 55, 'a'),
(27, 8, 46, 'kjhkjh'),
(28, 21, 46, 'jkhkjhkjh'),
(29, 2, 42, 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int(11) NOT NULL,
  `number` varchar(256) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `number`, `p_id`, `description`, `created_at`, `edited_at`) VALUES
(1, '888718827131', NULL, 'removed', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(2, '332332332', NULL, 'brother', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(3, '99009900990099', NULL, 'test test test', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(24, '99009900990099', NULL, 'asdasdada', '2022-10-11 09:16:28', NULL),
(25, '123111', NULL, '2321312', '2022-10-11 09:46:30', NULL),
(42, '123456789', 55, 'personal', '2022-10-13 20:33:17', NULL),
(44, '32456788913', 56, 'mother', '2022-10-13 20:33:55', NULL),
(46, '771223123', 49, 'General', '2022-10-13 21:31:50', NULL),
(48, '4432512345', 49, 'General', '2022-10-13 21:32:16', NULL),
(49, '12312341255213', 53, 'private / emergency', '2022-10-13 21:32:40', NULL),
(53, '33213333', 52, 'ads', '2022-10-18 23:57:21', NULL),
(54, '998808880', 51, 'privet', '2022-10-18 23:58:14', NULL),
(55, '21020203', 46, 'test test test', '2022-10-18 23:59:17', NULL),
(56, '2223332222', 54, 'General', '2022-10-19 00:00:19', NULL),
(57, '13213123123', 45, 'General', '2022-10-19 21:35:09', NULL),
(58, '1233333', 45, 'asd', '2022-10-19 21:36:02', NULL),
(59, '990123', 55, 'net', '2022-10-19 21:37:43', NULL),
(66, '9988776655', 56, 'personal privte.', '2022-10-20 10:40:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prayers`
--

CREATE TABLE `prayers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'show',
  `p_id` int(11) NOT NULL,
  `edited_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prayers`
--

INSERT INTO `prayers` (`id`, `title`, `text`, `status`, `p_id`, `edited_at`, `created_at`) VALUES
(1, 'test prayer item', 'this is a text to test the prayers feature.', 'nothing', 42, '2022-11-04 14:11:42', '2022-11-06 00:42:13'),
(2, 'test prayer item 22', 'this is a text to test the prayers feature.222', 'nothing', 42, '2022-11-04 14:11:42', '2022-11-04 13:11:00'),
(3, 'as', 'qqq\r\nssss', 'nothing', 47, '2022-11-06 00:46:34', '2022-11-06 00:54:54'),
(4, 'pr', 'dlldld', 'show', 46, '2022-11-06 00:55:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(11) NOT NULL,
  `p_id1` int(11) NOT NULL,
  `p_id2` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `p_id1`, `p_id2`, `description`) VALUES
(6, 47, 69, 'asd'),
(9, 43, 42, 'asd'),
(10, 48, 42, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `text`, `status`, `created_at`, `edited_at`, `p_id`) VALUES
(1, 'upgrade the profile', 'try to communicate with your supperviser.', 'show', '2022-11-07 10:51:43', NULL, 42);

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `country_code` varchar(4) NOT NULL,
  `gmt_offset` float NOT NULL,
  `dst_offset` float NOT NULL,
  `raw_offset` float NOT NULL,
  `w_dts` date DEFAULT NULL,
  `s_dts` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `timezone`, `country_code`, `gmt_offset`, `dst_offset`, `raw_offset`, `w_dts`, `s_dts`) VALUES
(1, 'Europe/Andorra', 'AD', 1, 2, 1, NULL, NULL),
(2, 'Asia/Dubai', 'AE', 4, 4, 4, NULL, NULL),
(3, 'Asia/Kabul', 'AF', 4.5, 4.5, 4.5, NULL, NULL),
(4, 'America/Antigua', 'AG', -4, -4, -4, NULL, NULL),
(5, 'America/Anguilla', 'AI', -4, -4, -4, NULL, NULL),
(6, 'Europe/Tirane', 'AL', 1, 2, 1, NULL, NULL),
(7, 'Asia/Yerevan', 'AM', 4, 4, 4, NULL, NULL),
(8, 'Africa/Luanda', 'AO', 1, 1, 1, NULL, NULL),
(9, 'Antarctica/Casey', 'AQ', 8, 8, 8, NULL, NULL),
(10, 'Antarctica/Davis', 'AQ', 7, 7, 7, NULL, NULL),
(11, 'Antarctica/DumontDUrville', 'AQ', 10, 10, 10, NULL, NULL),
(12, 'Antarctica/Mawson', 'AQ', 5, 5, 5, NULL, NULL),
(13, 'Antarctica/McMurdo', 'AQ', 13, 12, 12, NULL, NULL),
(14, 'Antarctica/Palmer', 'AQ', -3, -4, -4, NULL, NULL),
(15, 'Antarctica/Rothera', 'AQ', -3, -3, -3, NULL, NULL),
(16, 'Antarctica/South_Pole', 'AQ', 13, 12, 12, NULL, NULL),
(17, 'Antarctica/Syowa', 'AQ', 3, 3, 3, NULL, NULL),
(18, 'Antarctica/Vostok', 'AQ', 6, 6, 6, NULL, NULL),
(19, 'America/Argentina/Buenos_Aires', 'AR', -3, -3, -3, NULL, NULL),
(20, 'America/Argentina/Catamarca', 'AR', -3, -3, -3, NULL, NULL),
(21, 'America/Argentina/Cordoba', 'AR', -3, -3, -3, NULL, NULL),
(22, 'America/Argentina/Jujuy', 'AR', -3, -3, -3, NULL, NULL),
(23, 'America/Argentina/La_Rioja', 'AR', -3, -3, -3, NULL, NULL),
(24, 'America/Argentina/Mendoza', 'AR', -3, -3, -3, NULL, NULL),
(25, 'America/Argentina/Rio_Gallegos', 'AR', -3, -3, -3, NULL, NULL),
(26, 'America/Argentina/Salta', 'AR', -3, -3, -3, NULL, NULL),
(27, 'America/Argentina/San_Juan', 'AR', -3, -3, -3, NULL, NULL),
(28, 'America/Argentina/San_Luis', 'AR', -3, -3, -3, NULL, NULL),
(29, 'America/Argentina/Tucuman', 'AR', -3, -3, -3, NULL, NULL),
(30, 'America/Argentina/Ushuaia', 'AR', -3, -3, -3, NULL, NULL),
(31, 'Pacific/Pago_Pago', 'AS', -11, -11, -11, NULL, NULL),
(32, 'Europe/Vienna', 'AT', 1, 2, 1, NULL, NULL),
(33, 'Antarctica/Macquarie', 'AU', 11, 11, 11, NULL, NULL),
(34, 'Australia/Adelaide', 'AU', 10.5, 9.5, 9.5, NULL, NULL),
(35, 'Australia/Brisbane', 'AU', 10, 10, 10, NULL, NULL),
(36, 'Australia/Broken_Hill', 'AU', 10.5, 9.5, 9.5, NULL, NULL),
(37, 'Australia/Currie', 'AU', 11, 10, 10, NULL, NULL),
(38, 'Australia/Darwin', 'AU', 9.5, 9.5, 9.5, NULL, NULL),
(39, 'Australia/Eucla', 'AU', 8.75, 8.75, 8.75, NULL, NULL),
(40, 'Australia/Hobart', 'AU', 11, 10, 10, NULL, NULL),
(41, 'Australia/Lindeman', 'AU', 10, 10, 10, NULL, NULL),
(42, 'Australia/Lord_Howe', 'AU', 11, 10.5, 10.5, NULL, NULL),
(43, 'Australia/Melbourne', 'AU', 11, 10, 10, NULL, NULL),
(44, 'Australia/Perth', 'AU', 8, 8, 8, NULL, NULL),
(45, 'Australia/Sydney', 'AU', 11, 10, 10, NULL, NULL),
(46, 'America/Aruba', 'AW', -4, -4, -4, NULL, NULL),
(47, 'Europe/Mariehamn', 'AX', 2, 3, 2, NULL, NULL),
(48, 'Asia/Baku', 'AZ', 4, 5, 4, NULL, NULL),
(49, 'Europe/Sarajevo', 'BA', 1, 2, 1, NULL, NULL),
(50, 'America/Barbados', 'BB', -4, -4, -4, NULL, NULL),
(51, 'Asia/Dhaka', 'BD', 6, 6, 6, NULL, NULL),
(52, 'Europe/Brussels', 'BE', 1, 2, 1, NULL, NULL),
(53, 'Africa/Ouagadougou', 'BF', 0, 0, 0, NULL, NULL),
(54, 'Europe/Sofia', 'BG', 2, 3, 2, NULL, NULL),
(55, 'Asia/Bahrain', 'BH', 3, 3, 3, NULL, NULL),
(56, 'Africa/Bujumbura', 'BI', 2, 2, 2, NULL, NULL),
(57, 'Africa/Porto-Novo', 'BJ', 1, 1, 1, NULL, NULL),
(58, 'America/St_Barthelemy', 'BL', -4, -4, -4, NULL, NULL),
(59, 'Atlantic/Bermuda', 'BM', -4, -3, -4, NULL, NULL),
(60, 'Asia/Brunei', 'BN', 8, 8, 8, NULL, NULL),
(61, 'America/La_Paz', 'BO', -4, -4, -4, NULL, NULL),
(62, 'America/Kralendijk', 'BQ', -4, -4, -4, NULL, NULL),
(63, 'America/Araguaina', 'BR', -3, -3, -3, NULL, NULL),
(64, 'America/Bahia', 'BR', -3, -3, -3, NULL, NULL),
(65, 'America/Belem', 'BR', -3, -3, -3, NULL, NULL),
(66, 'America/Boa_Vista', 'BR', -4, -4, -4, NULL, NULL),
(67, 'America/Campo_Grande', 'BR', -3, -4, -4, NULL, NULL),
(68, 'America/Cuiaba', 'BR', -3, -4, -4, NULL, NULL),
(69, 'America/Eirunepe', 'BR', -5, -5, -5, NULL, NULL),
(70, 'America/Fortaleza', 'BR', -3, -3, -3, NULL, NULL),
(71, 'America/Maceio', 'BR', -3, -3, -3, NULL, NULL),
(72, 'America/Manaus', 'BR', -4, -4, -4, NULL, NULL),
(73, 'America/Noronha', 'BR', -2, -2, -2, NULL, NULL),
(74, 'America/Porto_Velho', 'BR', -4, -4, -4, NULL, NULL),
(75, 'America/Recife', 'BR', -3, -3, -3, NULL, NULL),
(76, 'America/Rio_Branco', 'BR', -5, -5, -5, NULL, NULL),
(77, 'America/Santarem', 'BR', -3, -3, -3, NULL, NULL),
(78, 'America/Sao_Paulo', 'BR', -2, -3, -3, NULL, NULL),
(79, 'America/Nassau', 'BS', -5, -4, -5, NULL, NULL),
(80, 'Asia/Thimphu', 'BT', 6, 6, 6, NULL, NULL),
(81, 'Africa/Gaborone', 'BW', 2, 2, 2, NULL, NULL),
(82, 'Europe/Minsk', 'BY', 3, 3, 3, NULL, NULL),
(83, 'America/Belize', 'BZ', -6, -6, -6, NULL, NULL),
(84, 'America/Atikokan', 'CA', -5, -5, -5, NULL, NULL),
(85, 'America/Blanc-Sablon', 'CA', -4, -4, -4, NULL, NULL),
(86, 'America/Cambridge_Bay', 'CA', -7, -6, -7, NULL, NULL),
(87, 'America/Creston', 'CA', -7, -7, -7, NULL, NULL),
(88, 'America/Dawson', 'CA', -8, -7, -8, NULL, NULL),
(89, 'America/Dawson_Creek', 'CA', -7, -7, -7, NULL, NULL),
(90, 'America/Edmonton', 'CA', -7, -6, -7, NULL, NULL),
(91, 'America/Glace_Bay', 'CA', -4, -3, -4, NULL, NULL),
(92, 'America/Goose_Bay', 'CA', -4, -3, -4, NULL, NULL),
(93, 'America/Halifax', 'CA', -4, -3, -4, NULL, NULL),
(94, 'America/Inuvik', 'CA', -7, -6, -7, NULL, NULL),
(95, 'America/Iqaluit', 'CA', -5, -4, -5, NULL, NULL),
(96, 'America/Moncton', 'CA', -4, -3, -4, NULL, NULL),
(97, 'America/Montreal', 'CA', -5, -4, -5, NULL, NULL),
(98, 'America/Nipigon', 'CA', -5, -4, -5, NULL, NULL),
(99, 'America/Pangnirtung', 'CA', -5, -4, -5, NULL, NULL),
(100, 'America/Rainy_River', 'CA', -6, -5, -6, NULL, NULL),
(101, 'America/Rankin_Inlet', 'CA', -6, -5, -6, NULL, NULL),
(102, 'America/Regina', 'CA', -6, -6, -6, NULL, NULL),
(103, 'America/Resolute', 'CA', -6, -5, -6, NULL, NULL),
(104, 'America/St_Johns', 'CA', -3.5, -2.5, -3.5, NULL, NULL),
(105, 'America/Swift_Current', 'CA', -6, -6, -6, NULL, NULL),
(106, 'America/Thunder_Bay', 'CA', -5, -4, -5, NULL, NULL),
(107, 'America/Toronto', 'CA', -5, -4, -5, NULL, NULL),
(108, 'America/Vancouver', 'CA', -8, -7, -8, NULL, NULL),
(109, 'America/Whitehorse', 'CA', -8, -7, -8, NULL, NULL),
(110, 'America/Winnipeg', 'CA', -6, -5, -6, NULL, NULL),
(111, 'America/Yellowknife', 'CA', -7, -6, -7, NULL, NULL),
(112, 'Indian/Cocos', 'CC', 6.5, 6.5, 6.5, NULL, NULL),
(113, 'Africa/Kinshasa', 'CD', 1, 1, 1, NULL, NULL),
(114, 'Africa/Lubumbashi', 'CD', 2, 2, 2, NULL, NULL),
(115, 'Africa/Bangui', 'CF', 1, 1, 1, NULL, NULL),
(116, 'Africa/Brazzaville', 'CG', 1, 1, 1, NULL, NULL),
(117, 'Europe/Zurich', 'CH', 1, 2, 1, NULL, NULL),
(118, 'Africa/Abidjan', 'CI', 0, 0, 0, NULL, NULL),
(119, 'Pacific/Rarotonga', 'CK', -10, -10, -10, NULL, NULL),
(120, 'America/Santiago', 'CL', -3, -4, -4, NULL, NULL),
(121, 'Pacific/Easter', 'CL', -5, -6, -6, NULL, NULL),
(122, 'Africa/Douala', 'CM', 1, 1, 1, NULL, NULL),
(123, 'Asia/Chongqing', 'CN', 8, 8, 8, NULL, NULL),
(124, 'Asia/Harbin', 'CN', 8, 8, 8, NULL, NULL),
(125, 'Asia/Kashgar', 'CN', 8, 8, 8, NULL, NULL),
(126, 'Asia/Shanghai', 'CN', 8, 8, 8, NULL, NULL),
(127, 'Asia/Urumqi', 'CN', 8, 8, 8, NULL, NULL),
(128, 'America/Bogota', 'CO', -5, -5, -5, NULL, NULL),
(129, 'America/Costa_Rica', 'CR', -6, -6, -6, NULL, NULL),
(130, 'America/Havana', 'CU', -5, -4, -5, NULL, NULL),
(131, 'Atlantic/Cape_Verde', 'CV', -1, -1, -1, NULL, NULL),
(132, 'America/Curacao', 'CW', -4, -4, -4, NULL, NULL),
(133, 'Indian/Christmas', 'CX', 7, 7, 7, NULL, NULL),
(134, 'Asia/Nicosia', 'CY', 2, 3, 2, NULL, NULL),
(135, 'Europe/Prague', 'CZ', 1, 2, 1, NULL, NULL),
(136, 'Europe/Berlin', 'DE', 1, 2, 1, NULL, NULL),
(137, 'Europe/Busingen', 'DE', 1, 2, 1, NULL, NULL),
(138, 'Africa/Djibouti', 'DJ', 3, 3, 3, NULL, NULL),
(139, 'Europe/Copenhagen', 'DK', 1, 2, 1, NULL, NULL),
(140, 'America/Dominica', 'DM', -4, -4, -4, NULL, NULL),
(141, 'America/Santo_Domingo', 'DO', -4, -4, -4, NULL, NULL),
(142, 'Africa/Algiers', 'DZ', 1, 1, 1, NULL, NULL),
(143, 'America/Guayaquil', 'EC', -5, -5, -5, NULL, NULL),
(144, 'Pacific/Galapagos', 'EC', -6, -6, -6, NULL, NULL),
(145, 'Europe/Tallinn', 'EE', 2, 3, 2, NULL, NULL),
(146, 'Africa/Cairo', 'EG', 2, 2, 2, NULL, NULL),
(147, 'Africa/El_Aaiun', 'EH', 0, 0, 0, NULL, NULL),
(148, 'Africa/Asmara', 'ER', 3, 3, 3, NULL, NULL),
(149, 'Africa/Ceuta', 'ES', 1, 2, 1, NULL, NULL),
(150, 'Atlantic/Canary', 'ES', 0, 1, 0, NULL, NULL),
(151, 'Europe/Madrid', 'ES', 1, 2, 1, NULL, NULL),
(152, 'Africa/Addis_Ababa', 'ET', 3, 3, 3, NULL, NULL),
(153, 'Europe/Helsinki', 'FI', 2, 3, 2, NULL, NULL),
(154, 'Pacific/Fiji', 'FJ', 13, 12, 12, NULL, NULL),
(155, 'Atlantic/Stanley', 'FK', -3, -3, -3, NULL, NULL),
(156, 'Pacific/Chuuk', 'FM', 10, 10, 10, NULL, NULL),
(157, 'Pacific/Kosrae', 'FM', 11, 11, 11, NULL, NULL),
(158, 'Pacific/Pohnpei', 'FM', 11, 11, 11, NULL, NULL),
(159, 'Atlantic/Faroe', 'FO', 0, 1, 0, NULL, NULL),
(160, 'Europe/Paris', 'FR', 1, 2, 1, NULL, NULL),
(161, 'Africa/Libreville', 'GA', 1, 1, 1, NULL, NULL),
(162, 'Europe/London', 'GB', 0, 1, 0, NULL, NULL),
(163, 'America/Grenada', 'GD', -4, -4, -4, NULL, NULL),
(164, 'Asia/Tbilisi', 'GE', 4, 4, 4, NULL, NULL),
(165, 'America/Cayenne', 'GF', -3, -3, -3, NULL, NULL),
(166, 'Europe/Guernsey', 'GG', 0, 1, 0, NULL, NULL),
(167, 'Africa/Accra', 'GH', 0, 0, 0, NULL, NULL),
(168, 'Europe/Gibraltar', 'GI', 1, 2, 1, NULL, NULL),
(169, 'America/Danmarkshavn', 'GL', 0, 0, 0, NULL, NULL),
(170, 'America/Godthab', 'GL', -3, -2, -3, NULL, NULL),
(171, 'America/Scoresbysund', 'GL', -1, 0, -1, NULL, NULL),
(172, 'America/Thule', 'GL', -4, -3, -4, NULL, NULL),
(173, 'Africa/Banjul', 'GM', 0, 0, 0, NULL, NULL),
(174, 'Africa/Conakry', 'GN', 0, 0, 0, NULL, NULL),
(175, 'America/Guadeloupe', 'GP', -4, -4, -4, NULL, NULL),
(176, 'Africa/Malabo', 'GQ', 1, 1, 1, NULL, NULL),
(177, 'Europe/Athens', 'GR', 2, 3, 2, NULL, NULL),
(178, 'Atlantic/South_Georgia', 'GS', -2, -2, -2, NULL, NULL),
(179, 'America/Guatemala', 'GT', -6, -6, -6, NULL, NULL),
(180, 'Pacific/Guam', 'GU', 10, 10, 10, NULL, NULL),
(181, 'Africa/Bissau', 'GW', 0, 0, 0, NULL, NULL),
(182, 'America/Guyana', 'GY', -4, -4, -4, NULL, NULL),
(183, 'Asia/Hong_Kong', 'HK', 8, 8, 8, NULL, NULL),
(184, 'America/Tegucigalpa', 'HN', -6, -6, -6, NULL, NULL),
(185, 'Europe/Zagreb', 'HR', 1, 2, 1, NULL, NULL),
(186, 'America/Port-au-Prince', 'HT', -5, -4, -5, NULL, NULL),
(187, 'Europe/Budapest', 'HU', 1, 2, 1, NULL, NULL),
(188, 'Asia/Jakarta', 'ID', 7, 7, 7, NULL, NULL),
(189, 'Asia/Jayapura', 'ID', 9, 9, 9, NULL, NULL),
(190, 'Asia/Makassar', 'ID', 8, 8, 8, NULL, NULL),
(191, 'Asia/Pontianak', 'ID', 7, 7, 7, NULL, NULL),
(192, 'Europe/Dublin', 'IE', 0, 1, 0, NULL, NULL),
(193, 'Asia/Jerusalem', 'IL', 2, 3, 2, NULL, NULL),
(194, 'Europe/Isle_of_Man', 'IM', 0, 1, 0, NULL, NULL),
(195, 'Asia/Kolkata', 'IN', 5.5, 5.5, 5.5, NULL, NULL),
(196, 'Indian/Chagos', 'IO', 6, 6, 6, NULL, NULL),
(197, 'Asia/Baghdad', 'IQ', 3, 3, 3, NULL, NULL),
(198, 'Asia/Tehran', 'IR', 3.5, 4.5, 3.5, NULL, NULL),
(199, 'Atlantic/Reykjavik', 'IS', 0, 0, 0, NULL, NULL),
(200, 'Europe/Rome', 'IT', 1, 2, 1, NULL, NULL),
(201, 'Europe/Jersey', 'JE', 0, 1, 0, NULL, NULL),
(202, 'America/Jamaica', 'JM', -5, -5, -5, NULL, NULL),
(203, 'Asia/Amman', 'JO', 2, 3, 2, NULL, NULL),
(204, 'Asia/Tokyo', 'JP', 9, 9, 9, NULL, NULL),
(205, 'Africa/Nairobi', 'KE', 3, 3, 3, NULL, NULL),
(206, 'Asia/Bishkek', 'KG', 6, 6, 6, NULL, NULL),
(207, 'Asia/Phnom_Penh', 'KH', 7, 7, 7, NULL, NULL),
(208, 'Pacific/Enderbury', 'KI', 13, 13, 13, NULL, NULL),
(209, 'Pacific/Kiritimati', 'KI', 14, 14, 14, NULL, NULL),
(210, 'Pacific/Tarawa', 'KI', 12, 12, 12, NULL, NULL),
(211, 'Indian/Comoro', 'KM', 3, 3, 3, NULL, NULL),
(212, 'America/St_Kitts', 'KN', -4, -4, -4, NULL, NULL),
(213, 'Asia/Pyongyang', 'KP', 9, 9, 9, NULL, NULL),
(214, 'Asia/Seoul', 'KR', 9, 9, 9, NULL, NULL),
(215, 'Asia/Kuwait', 'KW', 3, 3, 3, NULL, NULL),
(216, 'America/Cayman', 'KY', -5, -5, -5, NULL, NULL),
(217, 'Asia/Almaty', 'KZ', 6, 6, 6, NULL, NULL),
(218, 'Asia/Aqtau', 'KZ', 5, 5, 5, NULL, NULL),
(219, 'Asia/Aqtobe', 'KZ', 5, 5, 5, NULL, NULL),
(220, 'Asia/Oral', 'KZ', 5, 5, 5, NULL, NULL),
(221, 'Asia/Qyzylorda', 'KZ', 6, 6, 6, NULL, NULL),
(222, 'Asia/Vientiane', 'LA', 7, 7, 7, NULL, NULL),
(223, 'Asia/Beirut', 'LB', 2, 3, 2, NULL, NULL),
(224, 'America/St_Lucia', 'LC', -4, -4, -4, NULL, NULL),
(225, 'Europe/Vaduz', 'LI', 1, 2, 1, NULL, NULL),
(226, 'Asia/Colombo', 'LK', 5.5, 5.5, 5.5, NULL, NULL),
(227, 'Africa/Monrovia', 'LR', 0, 0, 0, NULL, NULL),
(228, 'Africa/Maseru', 'LS', 2, 2, 2, NULL, NULL),
(229, 'Europe/Vilnius', 'LT', 2, 3, 2, NULL, NULL),
(230, 'Europe/Luxembourg', 'LU', 1, 2, 1, '2022-10-29', '2023-03-26'),
(231, 'Europe/Riga', 'LV', 2, 3, 2, NULL, NULL),
(232, 'Africa/Tripoli', 'LY', 2, 2, 2, NULL, NULL),
(233, 'Africa/Casablanca', 'MA', 0, 0, 0, NULL, NULL),
(234, 'Europe/Monaco', 'MC', 1, 2, 1, NULL, NULL),
(235, 'Europe/Chisinau', 'MD', 2, 3, 2, NULL, NULL),
(236, 'Europe/Podgorica', 'ME', 1, 2, 1, NULL, NULL),
(237, 'America/Marigot', 'MF', -4, -4, -4, NULL, NULL),
(238, 'Indian/Antananarivo', 'MG', 3, 3, 3, NULL, NULL),
(239, 'Pacific/Kwajalein', 'MH', 12, 12, 12, NULL, NULL),
(240, 'Pacific/Majuro', 'MH', 12, 12, 12, NULL, NULL),
(241, 'Europe/Skopje', 'MK', 1, 2, 1, NULL, NULL),
(242, 'Africa/Bamako', 'ML', 0, 0, 0, NULL, NULL),
(243, 'Asia/Rangoon', 'MM', 6.5, 6.5, 6.5, NULL, NULL),
(244, 'Asia/Choibalsan', 'MN', 8, 8, 8, NULL, NULL),
(245, 'Asia/Hovd', 'MN', 7, 7, 7, NULL, NULL),
(246, 'Asia/Ulaanbaatar', 'MN', 8, 8, 8, NULL, NULL),
(247, 'Asia/Macau', 'MO', 8, 8, 8, NULL, NULL),
(248, 'Pacific/Saipan', 'MP', 10, 10, 10, NULL, NULL),
(249, 'America/Martinique', 'MQ', -4, -4, -4, NULL, NULL),
(250, 'Africa/Nouakchott', 'MR', 0, 0, 0, NULL, NULL),
(251, 'America/Montserrat', 'MS', -4, -4, -4, NULL, NULL),
(252, 'Europe/Malta', 'MT', 1, 2, 1, NULL, NULL),
(253, 'Indian/Mauritius', 'MU', 4, 4, 4, NULL, NULL),
(254, 'Indian/Maldives', 'MV', 5, 5, 5, NULL, NULL),
(255, 'Africa/Blantyre', 'MW', 2, 2, 2, NULL, NULL),
(256, 'America/Bahia_Banderas', 'MX', -6, -5, -6, NULL, NULL),
(257, 'America/Cancun', 'MX', -6, -5, -6, NULL, NULL),
(258, 'America/Chihuahua', 'MX', -7, -6, -7, NULL, NULL),
(259, 'America/Hermosillo', 'MX', -7, -7, -7, NULL, NULL),
(260, 'America/Matamoros', 'MX', -6, -5, -6, NULL, NULL),
(261, 'America/Mazatlan', 'MX', -7, -6, -7, NULL, NULL),
(262, 'America/Merida', 'MX', -6, -5, -6, NULL, NULL),
(263, 'America/Mexico_City', 'MX', -6, -5, -6, NULL, NULL),
(264, 'America/Monterrey', 'MX', -6, -5, -6, NULL, NULL),
(265, 'America/Ojinaga', 'MX', -7, -6, -7, NULL, NULL),
(266, 'America/Santa_Isabel', 'MX', -8, -7, -8, NULL, NULL),
(267, 'America/Tijuana', 'MX', -8, -7, -8, NULL, NULL),
(268, 'Asia/Kuala_Lumpur', 'MY', 8, 8, 8, NULL, NULL),
(269, 'Asia/Kuching', 'MY', 8, 8, 8, NULL, NULL),
(270, 'Africa/Maputo', 'MZ', 2, 2, 2, NULL, NULL),
(271, 'Africa/Windhoek', 'NA', 2, 1, 1, NULL, NULL),
(272, 'Pacific/Noumea', 'NC', 11, 11, 11, NULL, NULL),
(273, 'Africa/Niamey', 'NE', 1, 1, 1, NULL, NULL),
(274, 'Pacific/Norfolk', 'NF', 11.5, 11.5, 11.5, NULL, NULL),
(275, 'Africa/Lagos', 'NG', 1, 1, 1, NULL, NULL),
(276, 'America/Managua', 'NI', -6, -6, -6, NULL, NULL),
(277, 'Europe/Amsterdam', 'NL', 1, 2, 1, NULL, NULL),
(278, 'Europe/Oslo', 'NO', 1, 2, 1, NULL, NULL),
(279, 'Asia/Kathmandu', 'NP', 5.75, 5.75, 5.75, NULL, NULL),
(280, 'Pacific/Nauru', 'NR', 12, 12, 12, NULL, NULL),
(281, 'Pacific/Niue', 'NU', -11, -11, -11, NULL, NULL),
(282, 'Pacific/Auckland', 'NZ', 13, 12, 12, NULL, NULL),
(283, 'Pacific/Chatham', 'NZ', 13.75, 12.75, 12.75, NULL, NULL),
(284, 'Asia/Muscat', 'OM', 4, 4, 4, NULL, NULL),
(285, 'America/Panama', 'PA', -5, -5, -5, NULL, NULL),
(286, 'America/Lima', 'PE', -5, -5, -5, NULL, NULL),
(287, 'Pacific/Gambier', 'PF', -9, -9, -9, NULL, NULL),
(288, 'Pacific/Marquesas', 'PF', -9.5, -9.5, -9.5, NULL, NULL),
(289, 'Pacific/Tahiti', 'PF', -10, -10, -10, NULL, NULL),
(290, 'Pacific/Port_Moresby', 'PG', 10, 10, 10, NULL, NULL),
(291, 'Asia/Manila', 'PH', 8, 8, 8, NULL, NULL),
(292, 'Asia/Karachi', 'PK', 5, 5, 5, NULL, NULL),
(293, 'Europe/Warsaw', 'PL', 1, 2, 1, NULL, NULL),
(294, 'America/Miquelon', 'PM', -3, -2, -3, NULL, NULL),
(295, 'Pacific/Pitcairn', 'PN', -8, -8, -8, NULL, NULL),
(296, 'America/Puerto_Rico', 'PR', -4, -4, -4, NULL, NULL),
(297, 'Asia/Gaza', 'PS', 2, 3, 2, NULL, NULL),
(298, 'Asia/Hebron', 'PS', 2, 3, 2, NULL, NULL),
(299, 'Atlantic/Azores', 'PT', -1, 0, -1, NULL, NULL),
(300, 'Atlantic/Madeira', 'PT', 0, 1, 0, NULL, NULL),
(301, 'Europe/Lisbon', 'PT', 0, 1, 0, NULL, NULL),
(302, 'Pacific/Palau', 'PW', 9, 9, 9, NULL, NULL),
(303, 'America/Asuncion', 'PY', -3, -4, -4, NULL, NULL),
(304, 'Asia/Qatar', 'QA', 3, 3, 3, NULL, NULL),
(305, 'Indian/Reunion', 'RE', 4, 4, 4, NULL, NULL),
(306, 'Europe/Bucharest', 'RO', 2, 3, 2, NULL, NULL),
(307, 'Europe/Belgrade', 'RS', 1, 2, 1, NULL, NULL),
(308, 'Asia/Anadyr', 'RU', 12, 12, 12, NULL, NULL),
(309, 'Asia/Irkutsk', 'RU', 9, 9, 9, NULL, NULL),
(310, 'Asia/Kamchatka', 'RU', 12, 12, 12, NULL, NULL),
(311, 'Asia/Khandyga', 'RU', 10, 10, 10, NULL, NULL),
(312, 'Asia/Krasnoyarsk', 'RU', 8, 8, 8, NULL, NULL),
(313, 'Asia/Magadan', 'RU', 12, 12, 12, NULL, NULL),
(314, 'Asia/Novokuznetsk', 'RU', 7, 7, 7, NULL, NULL),
(315, 'Asia/Novosibirsk', 'RU', 7, 7, 7, NULL, NULL),
(316, 'Asia/Omsk', 'RU', 7, 7, 7, NULL, NULL),
(317, 'Asia/Sakhalin', 'RU', 11, 11, 11, NULL, NULL),
(318, 'Asia/Ust-Nera', 'RU', 11, 11, 11, NULL, NULL),
(319, 'Asia/Vladivostok', 'RU', 11, 11, 11, NULL, NULL),
(320, 'Asia/Yakutsk', 'RU', 10, 10, 10, NULL, NULL),
(321, 'Asia/Yekaterinburg', 'RU', 6, 6, 6, NULL, NULL),
(322, 'Europe/Kaliningrad', 'RU', 3, 3, 3, NULL, NULL),
(323, 'Europe/Moscow', 'RU', 4, 4, 4, NULL, NULL),
(324, 'Europe/Samara', 'RU', 4, 4, 4, NULL, NULL),
(325, 'Europe/Volgograd', 'RU', 4, 4, 4, NULL, NULL),
(326, 'Africa/Kigali', 'RW', 2, 2, 2, NULL, NULL),
(327, 'Asia/Riyadh', 'SA', 3, 3, 3, NULL, NULL),
(328, 'Pacific/Guadalcanal', 'SB', 11, 11, 11, NULL, NULL),
(329, 'Indian/Mahe', 'SC', 4, 4, 4, NULL, NULL),
(330, 'Africa/Khartoum', 'SD', 3, 3, 3, NULL, NULL),
(331, 'Europe/Stockholm', 'SE', 1, 2, 1, NULL, NULL),
(332, 'Asia/Singapore', 'SG', 8, 8, 8, NULL, NULL),
(333, 'Atlantic/St_Helena', 'SH', 0, 0, 0, NULL, NULL),
(334, 'Europe/Ljubljana', 'SI', 1, 2, 1, NULL, NULL),
(335, 'Arctic/Longyearbyen', 'SJ', 1, 2, 1, NULL, NULL),
(336, 'Europe/Bratislava', 'SK', 1, 2, 1, NULL, NULL),
(337, 'Africa/Freetown', 'SL', 0, 0, 0, NULL, NULL),
(338, 'Europe/San_Marino', 'SM', 1, 2, 1, NULL, NULL),
(339, 'Africa/Dakar', 'SN', 0, 0, 0, NULL, NULL),
(340, 'Africa/Mogadishu', 'SO', 3, 3, 3, NULL, NULL),
(341, 'America/Paramaribo', 'SR', -3, -3, -3, NULL, NULL),
(342, 'Africa/Juba', 'SS', 3, 3, 3, NULL, NULL),
(343, 'Africa/Sao_Tome', 'ST', 0, 0, 0, NULL, NULL),
(344, 'America/El_Salvador', 'SV', -6, -6, -6, NULL, NULL),
(345, 'America/Lower_Princes', 'SX', -4, -4, -4, NULL, NULL),
(346, 'Asia/Damascus', 'SY', 2, 3, 2, NULL, NULL),
(347, 'Africa/Mbabane', 'SZ', 2, 2, 2, NULL, NULL),
(348, 'America/Grand_Turk', 'TC', -5, -4, -5, NULL, NULL),
(349, 'Africa/Ndjamena', 'TD', 1, 1, 1, NULL, NULL),
(350, 'Indian/Kerguelen', 'TF', 5, 5, 5, NULL, NULL),
(351, 'Africa/Lome', 'TG', 0, 0, 0, NULL, NULL),
(352, 'Asia/Bangkok', 'TH', 7, 7, 7, NULL, NULL),
(353, 'Asia/Dushanbe', 'TJ', 5, 5, 5, NULL, NULL),
(354, 'Pacific/Fakaofo', 'TK', 13, 13, 13, NULL, NULL),
(355, 'Asia/Dili', 'TL', 9, 9, 9, NULL, NULL),
(356, 'Asia/Ashgabat', 'TM', 5, 5, 5, NULL, NULL),
(357, 'Africa/Tunis', 'TN', 1, 1, 1, NULL, NULL),
(358, 'Pacific/Tongatapu', 'TO', 13, 13, 13, NULL, NULL),
(359, 'Europe/Istanbul', 'TR', 2, 3, 2, NULL, NULL),
(360, 'America/Port_of_Spain', 'TT', -4, -4, -4, NULL, NULL),
(361, 'Pacific/Funafuti', 'TV', 12, 12, 12, NULL, NULL),
(362, 'Asia/Taipei', 'TW', 8, 8, 8, NULL, NULL),
(363, 'Africa/Dar_es_Salaam', 'TZ', 3, 3, 3, NULL, NULL),
(364, 'Europe/Kiev', 'UA', 2, 3, 2, NULL, NULL),
(365, 'Europe/Simferopol', 'UA', 2, 4, 4, NULL, NULL),
(366, 'Europe/Uzhgorod', 'UA', 2, 3, 2, NULL, NULL),
(367, 'Europe/Zaporozhye', 'UA', 2, 3, 2, NULL, NULL),
(368, 'Africa/Kampala', 'UG', 3, 3, 3, NULL, NULL),
(369, 'Pacific/Johnston', 'UM', -10, -10, -10, NULL, NULL),
(370, 'Pacific/Midway', 'UM', -11, -11, -11, NULL, NULL),
(371, 'Pacific/Wake', 'UM', 12, 12, 12, NULL, NULL),
(372, 'America/Adak', 'US', -10, -9, -10, NULL, NULL),
(373, 'America/Anchorage', 'US', -9, -8, -9, NULL, NULL),
(374, 'America/Boise', 'US', -7, -6, -7, NULL, NULL),
(375, 'America/Chicago', 'US', -6, -5, -6, NULL, NULL),
(376, 'America/Denver', 'US', -7, -6, -7, NULL, NULL),
(377, 'America/Detroit', 'US', -5, -4, -5, NULL, NULL),
(378, 'America/Indiana/Indianapolis', 'US', -5, -4, -5, NULL, NULL),
(379, 'America/Indiana/Knox', 'US', -6, -5, -6, NULL, NULL),
(380, 'America/Indiana/Marengo', 'US', -5, -4, -5, NULL, NULL),
(381, 'America/Indiana/Petersburg', 'US', -5, -4, -5, NULL, NULL),
(382, 'America/Indiana/Tell_City', 'US', -6, -5, -6, NULL, NULL),
(383, 'America/Indiana/Vevay', 'US', -5, -4, -5, NULL, NULL),
(384, 'America/Indiana/Vincennes', 'US', -5, -4, -5, NULL, NULL),
(385, 'America/Indiana/Winamac', 'US', -5, -4, -5, NULL, NULL),
(386, 'America/Juneau', 'US', -9, -8, -9, NULL, NULL),
(387, 'America/Kentucky/Louisville', 'US', -5, -4, -5, NULL, NULL),
(388, 'America/Kentucky/Monticello', 'US', -5, -4, -5, NULL, NULL),
(389, 'America/Los_Angeles', 'US', -8, -7, -8, NULL, NULL),
(390, 'America/Menominee', 'US', -6, -5, -6, NULL, NULL),
(391, 'America/Metlakatla', 'US', -8, -8, -8, NULL, NULL),
(392, 'America/New_York', 'US', -5, -4, -5, NULL, NULL),
(393, 'America/Nome', 'US', -9, -8, -9, NULL, NULL),
(394, 'America/North_Dakota/Beulah', 'US', -6, -5, -6, NULL, NULL),
(395, 'America/North_Dakota/Center', 'US', -6, -5, -6, NULL, NULL),
(396, 'America/North_Dakota/New_Salem', 'US', -6, -5, -6, NULL, NULL),
(397, 'America/Phoenix', 'US', -7, -7, -7, NULL, NULL),
(398, 'America/Shiprock', 'US', -7, -6, -7, NULL, NULL),
(399, 'America/Sitka', 'US', -9, -8, -9, NULL, NULL),
(400, 'America/Yakutat', 'US', -9, -8, -9, NULL, NULL),
(401, 'Pacific/Honolulu', 'US', -10, -10, -10, NULL, NULL),
(402, 'America/Montevideo', 'UY', -2, -3, -3, NULL, NULL),
(403, 'Asia/Samarkand', 'UZ', 5, 5, 5, NULL, NULL),
(404, 'Asia/Tashkent', 'UZ', 5, 5, 5, NULL, NULL),
(405, 'Europe/Vatican', 'VA', 1, 2, 1, NULL, NULL),
(406, 'America/St_Vincent', 'VC', -4, -4, -4, NULL, NULL),
(407, 'America/Caracas', 'VE', -4.5, -4.5, -4.5, NULL, NULL),
(408, 'America/Tortola', 'VG', -4, -4, -4, NULL, NULL),
(409, 'America/St_Thomas', 'VI', -4, -4, -4, NULL, NULL),
(410, 'Asia/Ho_Chi_Minh', 'VN', 7, 7, 7, NULL, NULL),
(411, 'Pacific/Efate', 'VU', 11, 11, 11, NULL, NULL),
(412, 'Pacific/Wallis', 'WF', 12, 12, 12, NULL, NULL),
(413, 'Pacific/Apia', 'WS', 14, 13, 13, NULL, NULL),
(414, 'Asia/Aden', 'YE', 3, 3, 3, NULL, NULL),
(415, 'Indian/Mayotte', 'YT', 3, 3, 3, NULL, NULL),
(416, 'Africa/Johannesburg', 'ZA', 2, 2, 2, NULL, NULL),
(417, 'Africa/Lusaka', 'ZM', 2, 2, 2, NULL, NULL),
(418, 'Africa/Harare', 'ZW', 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `other_pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL,
  `current_t` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `other_pass`, `created_at`, `edited_at`, `current_t`) VALUES
(16, 'jack', '$2y$10$iaHACDVPkG/z.Db.wSkdiOuZkmetyxsHMB0dbqzJP2sv0Jn21mOAC', '$2y$10$.DJ9VEwltc0Ud5OCql5XjO.SbTBTF/pRs.lxnFlOs8opCxg47L.qi', '2022-10-08 03:46:05', NULL, 230);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `search` (`id`,`p_id`,`title`(30),`text`(30)),
  ADD KEY `comments_ibfk_1` (`p_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`num_code`),
  ADD UNIQUE KEY `alpha_2_code` (`alpha_2_code`),
  ADD UNIQUE KEY `alpha_3_code` (`alpha_3_code`);

--
-- Indexes for table `country_informations`
--
ALTER TABLE `country_informations`
  ADD PRIMARY KEY (`alpha_2_code`),
  ADD KEY `country` (`en_short_name`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `search` (`title`(50),`description`(50));

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SEARCH` (`title`(50),`description`(50));

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_ibfk_1` (`added_by`);

--
-- Indexes for table `people_countries`
--
ALTER TABLE `people_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person` (`p_id`),
  ADD KEY `country` (`c_id`);

--
-- Indexes for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `people_groups_ibfk_1` (`group_id`);

--
-- Indexes for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`),
  ADD KEY `people_languages_ibfk_1` (`lan_id`),
  ADD KEY `people_languages_ibfk_2` (`p_id`);

--
-- Indexes for table `people_timezones`
--
ALTER TABLE `people_timezones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cascade` (`p_id`),
  ADD KEY `title_id` (`t_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_numbers_ibfk_1` (`p_id`);

--
-- Indexes for table `prayers`
--
ALTER TABLE `prayers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relations_ibfk_1` (`p_id1`),
  ADD KEY `relations_ibfk_2` (`p_id2`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_ibfk_1` (`p_id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_code` (`country_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `current_t` (`current_t`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `people_countries`
--
ALTER TABLE `people_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `people_groups`
--
ALTER TABLE `people_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `people_languages`
--
ALTER TABLE `people_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `people_timezones`
--
ALTER TABLE `people_timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `people_titles`
--
ALTER TABLE `people_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `prayers`
--
ALTER TABLE `prayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`alpha_2_code`) REFERENCES `country_informations` (`alpha_2_code`);

--
-- Constraints for table `imgs`
--
ALTER TABLE `imgs`
  ADD CONSTRAINT `imgs_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `people_countries`
--
ALTER TABLE `people_countries`
  ADD CONSTRAINT `country` FOREIGN KEY (`c_id`) REFERENCES `countries` (`num_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD CONSTRAINT `people_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_groups_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD CONSTRAINT `people_languages_ibfk_1` FOREIGN KEY (`lan_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_languages_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_timezones`
--
ALTER TABLE `people_timezones`
  ADD CONSTRAINT `people_timezones_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_timezones_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `timezones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD CONSTRAINT `cascade` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_titles_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `job_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prayers`
--
ALTER TABLE `prayers`
  ADD CONSTRAINT `prayers_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`p_id1`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`p_id2`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timezones`
--
ALTER TABLE `timezones`
  ADD CONSTRAINT `timezones_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `countries` (`alpha_2_code`),
  ADD CONSTRAINT `timezones_ibfk_2` FOREIGN KEY (`country_code`) REFERENCES `country_informations` (`alpha_2_code`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`current_t`) REFERENCES `timezones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
