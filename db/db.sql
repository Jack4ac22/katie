-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 24, 2022 at 02:49 PM
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
(70, 'asdasd', 'asdasd', 'female', 'asd@asdasd', NULL, '1982-09-22', '2022-10-24 12:52:09', '2022-10-24 12:56:52', 16);

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
(9, 46, 8, 'test'),
(10, 54, 8, 'aa'),
(11, 55, 4, '\'\'\''),
(12, 43, 470, 'jhg');

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
(23, 10, 42, 'aaa', '2022-10-23 16:19:42'),
(24, 10, 51, 'aaa\r\nbbb', '2022-10-23 16:20:07');

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
(28, 21, 46, 'jkhkjhkjh');

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
(52, '12313323', 43, 'Please verify the description, it should not contain special characters.', '2022-10-15 17:47:43', NULL),
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
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `p_id1` int(11) NOT NULL,
  `p_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `contenent` varchar(255) DEFAULT 'private',
  `country` varchar(255) DEFAULT 'private',
  `zone` varchar(255) NOT NULL,
  `GMT_difference` int(11) NOT NULL,
  `daylight_saving` tinyint(1) NOT NULL DEFAULT '0',
  `winter` date NOT NULL,
  `summer` date NOT NULL,
  `created_at` date NOT NULL,
  `edited_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `other_pass`, `created_at`, `edited_at`) VALUES
(16, 'jack', '$2y$10$iaHACDVPkG/z.Db.wSkdiOuZkmetyxsHMB0dbqzJP2sv0Jn21mOAC', '$2y$10$.DJ9VEwltc0Ud5OCql5XjO.SbTBTF/pRs.lxnFlOs8opCxg47L.qi', '2022-10-08 03:46:05', NULL);

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
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD KEY `relations_ibfk_1` (`p_id1`),
  ADD KEY `relations_ibfk_2` (`p_id2`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `people_countries`
--
ALTER TABLE `people_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `people_groups`
--
ALTER TABLE `people_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `people_languages`
--
ALTER TABLE `people_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `people_titles`
--
ALTER TABLE `people_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`p_id1`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`p_id2`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
