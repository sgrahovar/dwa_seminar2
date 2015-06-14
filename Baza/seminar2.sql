-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2015 at 08:34 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminar2`
--
CREATE DATABASE IF NOT EXISTS `seminar2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seminar2`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DonationID` int(11) NOT NULL,
  `CommentText` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ReplyTo` int(11) DEFAULT NULL,
  `DatePosted` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  KEY `DonationID` (`DonationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `UserID`, `DonationID`, `CommentText`, `ReplyTo`, `DatePosted`) VALUES
(1, 33, 20, ' d', NULL, '2015-06-10'),
(2, 33, 20, ' Comment sadasdasdas', 0, '2015-06-10'),
(3, 33, 20, ' xdxdxd', 0, '2015-06-10'),
(4, 33, 20, ' ddd', NULL, '2015-06-10'),
(5, 33, 37, ' Random comment about a random topic! ', NULL, '2015-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `alpha_2` varchar(2) NOT NULL DEFAULT '',
  `alpha_3` varchar(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `alpha_2`, `alpha_3`) VALUES
(1, 'Afghanistan', 'af', 'afg'),
(2, 'Aland Islands', 'ax', 'ala'),
(3, 'Albania', 'al', 'alb'),
(4, 'Algeria', 'dz', 'dza'),
(5, 'American Samoa', 'as', 'asm'),
(6, 'Andorra', 'ad', 'and'),
(7, 'Angola', 'ao', 'ago'),
(8, 'Anguilla', 'ai', 'aia'),
(9, 'Antarctica', 'aq', ''),
(10, 'Antigua and Barbuda', 'ag', 'atg'),
(11, 'Argentina', 'ar', 'arg'),
(12, 'Armenia', 'am', 'arm'),
(13, 'Aruba', 'aw', 'abw'),
(14, 'Australia', 'au', 'aus'),
(15, 'Austria', 'at', 'aut'),
(16, 'Azerbaijan', 'az', 'aze'),
(17, 'Bahamas', 'bs', 'bhs'),
(18, 'Bahrain', 'bh', 'bhr'),
(19, 'Bangladesh', 'bd', 'bgd'),
(20, 'Barbados', 'bb', 'brb'),
(21, 'Belarus', 'by', 'blr'),
(22, 'Belgium', 'be', 'bel'),
(23, 'Belize', 'bz', 'blz'),
(24, 'Benin', 'bj', 'ben'),
(25, 'Bermuda', 'bm', 'bmu'),
(26, 'Bhutan', 'bt', 'btn'),
(27, 'Bolivia, Plurinational State of', 'bo', 'bol'),
(28, 'Bonaire, Sint Eustatius and Saba', 'bq', 'bes'),
(29, 'Bosnia and Herzegovina', 'ba', 'bih'),
(30, 'Botswana', 'bw', 'bwa'),
(31, 'Bouvet Island', 'bv', ''),
(32, 'Brazil', 'br', 'bra'),
(33, 'British Indian Ocean Territory', 'io', ''),
(34, 'Brunei Darussalam', 'bn', 'brn'),
(35, 'Bulgaria', 'bg', 'bgr'),
(36, 'Burkina Faso', 'bf', 'bfa'),
(37, 'Burundi', 'bi', 'bdi'),
(38, 'Cambodia', 'kh', 'khm'),
(39, 'Cameroon', 'cm', 'cmr'),
(40, 'Canada', 'ca', 'can'),
(41, 'Cape Verde', 'cv', 'cpv'),
(42, 'Cayman Islands', 'ky', 'cym'),
(43, 'Central African Republic', 'cf', 'caf'),
(44, 'Chad', 'td', 'tcd'),
(45, 'Chile', 'cl', 'chl'),
(46, 'China', 'cn', 'chn'),
(47, 'Christmas Island', 'cx', ''),
(48, 'Cocos (Keeling) Islands', 'cc', ''),
(49, 'Colombia', 'co', 'col'),
(50, 'Comoros', 'km', 'com'),
(51, 'Congo', 'cg', 'cog'),
(52, 'Congo, The Democratic Republic of the', 'cd', 'cod'),
(53, 'Cook Islands', 'ck', 'cok'),
(54, 'Costa Rica', 'cr', 'cri'),
(55, 'Cote d''Ivoire', 'ci', 'civ'),
(56, 'Croatia', 'hr', 'hrv'),
(57, 'Cuba', 'cu', 'cub'),
(58, 'Curacao', 'cw', 'cuw'),
(59, 'Cyprus', 'cy', 'cyp'),
(60, 'Czech Republic', 'cz', 'cze'),
(61, 'Denmark', 'dk', 'dnk'),
(62, 'Djibouti', 'dj', 'dji'),
(63, 'Dominica', 'dm', 'dma'),
(64, 'Dominican Republic', 'do', 'dom'),
(65, 'Ecuador', 'ec', 'ecu'),
(66, 'Egypt', 'eg', 'egy'),
(67, 'El Salvador', 'sv', 'slv'),
(68, 'Equatorial Guinea', 'gq', 'gnq'),
(69, 'Eritrea', 'er', 'eri'),
(70, 'Estonia', 'ee', 'est'),
(71, 'Ethiopia', 'et', 'eth'),
(72, 'Falkland Islands (Malvinas)', 'fk', 'flk'),
(73, 'Faroe Islands', 'fo', 'fro'),
(74, 'Fiji', 'fj', 'fji'),
(75, 'Finland', 'fi', 'fin'),
(76, 'France', 'fr', 'fra'),
(77, 'French Guiana', 'gf', 'guf'),
(78, 'French Polynesia', 'pf', 'pyf'),
(79, 'French Southern Territories', 'tf', ''),
(80, 'Gabon', 'ga', 'gab'),
(81, 'Gambia', 'gm', 'gmb'),
(82, 'Georgia', 'ge', 'geo'),
(83, 'Germany', 'de', 'deu'),
(84, 'Ghana', 'gh', 'gha'),
(85, 'Gibraltar', 'gi', 'gib'),
(86, 'Greece', 'gr', 'grc'),
(87, 'Greenland', 'gl', 'grl'),
(88, 'Grenada', 'gd', 'grd'),
(89, 'Guadeloupe', 'gp', 'glp'),
(90, 'Guam', 'gu', 'gum'),
(91, 'Guatemala', 'gt', 'gtm'),
(92, 'Guernsey', 'gg', 'ggy'),
(93, 'Guinea', 'gn', 'gin'),
(94, 'Guinea-Bissau', 'gw', 'gnb'),
(95, 'Guyana', 'gy', 'guy'),
(96, 'Haiti', 'ht', 'hti'),
(97, 'Heard Island and McDonald Islands', 'hm', ''),
(98, 'Holy See (Vatican City State)', 'va', 'vat'),
(99, 'Honduras', 'hn', 'hnd'),
(100, 'Hong Kong', 'hk', 'hkg'),
(101, 'Hungary', 'hu', 'hun'),
(102, 'Iceland', 'is', 'isl'),
(103, 'India', 'in', 'ind'),
(104, 'Indonesia', 'id', 'idn'),
(105, 'Iran, Islamic Republic of', 'ir', 'irn'),
(106, 'Iraq', 'iq', 'irq'),
(107, 'Ireland', 'ie', 'irl'),
(108, 'Isle of Man', 'im', 'imn'),
(109, 'Israel', 'il', 'isr'),
(110, 'Italy', 'it', 'ita'),
(111, 'Jamaica', 'jm', 'jam'),
(112, 'Japan', 'jp', 'jpn'),
(113, 'Jersey', 'je', 'jey'),
(114, 'Jordan', 'jo', 'jor'),
(115, 'Kazakhstan', 'kz', 'kaz'),
(116, 'Kenya', 'ke', 'ken'),
(117, 'Kiribati', 'ki', 'kir'),
(118, 'Korea, Democratic People''s Republic of', 'kp', 'prk'),
(119, 'Korea, Republic of', 'kr', 'kor'),
(120, 'Kuwait', 'kw', 'kwt'),
(121, 'Kyrgyzstan', 'kg', 'kgz'),
(122, 'Lao People''s Democratic Republic', 'la', 'lao'),
(123, 'Latvia', 'lv', 'lva'),
(124, 'Lebanon', 'lb', 'lbn'),
(125, 'Lesotho', 'ls', 'lso'),
(126, 'Liberia', 'lr', 'lbr'),
(127, 'Libyan Arab Jamahiriya', 'ly', 'lby'),
(128, 'Liechtenstein', 'li', 'lie'),
(129, 'Lithuania', 'lt', 'ltu'),
(130, 'Luxembourg', 'lu', 'lux'),
(131, 'Macao', 'mo', 'mac'),
(132, 'Macedonia, The former Yugoslav Republic of', 'mk', 'mkd'),
(133, 'Madagascar', 'mg', 'mdg'),
(134, 'Malawi', 'mw', 'mwi'),
(135, 'Malaysia', 'my', 'mys'),
(136, 'Maldives', 'mv', 'mdv'),
(137, 'Mali', 'ml', 'mli'),
(138, 'Malta', 'mt', 'mlt'),
(139, 'Marshall Islands', 'mh', 'mhl'),
(140, 'Martinique', 'mq', 'mtq'),
(141, 'Mauritania', 'mr', 'mrt'),
(142, 'Mauritius', 'mu', 'mus'),
(143, 'Mayotte', 'yt', 'myt'),
(144, 'Mexico', 'mx', 'mex'),
(145, 'Micronesia, Federated States of', 'fm', 'fsm'),
(146, 'Moldova, Republic of', 'md', 'mda'),
(147, 'Monaco', 'mc', 'mco'),
(148, 'Mongolia', 'mn', 'mng'),
(149, 'Montenegro', 'me', 'mne'),
(150, 'Montserrat', 'ms', 'msr'),
(151, 'Morocco', 'ma', 'mar'),
(152, 'Mozambique', 'mz', 'moz'),
(153, 'Myanmar', 'mm', 'mmr'),
(154, 'Namibia', 'na', 'nam'),
(155, 'Nauru', 'nr', 'nru'),
(156, 'Nepal', 'np', 'npl'),
(157, 'Netherlands', 'nl', 'nld'),
(158, 'New Caledonia', 'nc', 'ncl'),
(159, 'New Zealand', 'nz', 'nzl'),
(160, 'Nicaragua', 'ni', 'nic'),
(161, 'Niger', 'ne', 'ner'),
(162, 'Nigeria', 'ng', 'nga'),
(163, 'Niue', 'nu', 'niu'),
(164, 'Norfolk Island', 'nf', 'nfk'),
(165, 'Northern Mariana Islands', 'mp', 'mnp'),
(166, 'Norway', 'no', 'nor'),
(167, 'Oman', 'om', 'omn'),
(168, 'Pakistan', 'pk', 'pak'),
(169, 'Palau', 'pw', 'plw'),
(170, 'Palestinian Territory, Occupied', 'ps', 'pse'),
(171, 'Panama', 'pa', 'pan'),
(172, 'Papua New Guinea', 'pg', 'png'),
(173, 'Paraguay', 'py', 'pry'),
(174, 'Peru', 'pe', 'per'),
(175, 'Philippines', 'ph', 'phl'),
(176, 'Pitcairn', 'pn', 'pcn'),
(177, 'Poland', 'pl', 'pol'),
(178, 'Portugal', 'pt', 'prt'),
(179, 'Puerto Rico', 'pr', 'pri'),
(180, 'Qatar', 'qa', 'qat'),
(181, 'Reunion', 're', 'reu'),
(182, 'Romania', 'ro', 'rou'),
(183, 'Russian Federation', 'ru', 'rus'),
(184, 'Rwanda', 'rw', 'rwa'),
(185, 'Saint Barthelemy', 'bl', 'blm'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'sh', 'shn'),
(187, 'Saint Kitts and Nevis', 'kn', 'kna'),
(188, 'Saint Lucia', 'lc', 'lca'),
(189, 'Saint Martin (French Part)', 'mf', 'maf'),
(190, 'Saint Pierre and Miquelon', 'pm', 'spm'),
(191, 'Saint Vincent and The Grenadines', 'vc', 'vct'),
(192, 'Samoa', 'ws', 'wsm'),
(193, 'San Marino', 'sm', 'smr'),
(194, 'Sao Tome and Principe', 'st', 'stp'),
(195, 'Saudi Arabia', 'sa', 'sau'),
(196, 'Senegal', 'sn', 'sen'),
(197, 'Serbia', 'rs', 'srb'),
(198, 'Seychelles', 'sc', 'syc'),
(199, 'Sierra Leone', 'sl', 'sle'),
(200, 'Singapore', 'sg', 'sgp'),
(201, 'Sint Maarten (Dutch Part)', 'sx', 'sxm'),
(202, 'Slovakia', 'sk', 'svk'),
(203, 'Slovenia', 'si', 'svn'),
(204, 'Solomon Islands', 'sb', 'slb'),
(205, 'Somalia', 'so', 'som'),
(206, 'South Africa', 'za', 'zaf'),
(207, 'South Georgia and The South Sandwich Islands', 'gs', ''),
(208, 'South Sudan', 'ss', 'ssd'),
(209, 'Spain', 'es', 'esp'),
(210, 'Sri Lanka', 'lk', 'lka'),
(211, 'Sudan', 'sd', 'sdn'),
(212, 'Suriname', 'sr', 'sur'),
(213, 'Svalbard and Jan Mayen', 'sj', 'sjm'),
(214, 'Swaziland', 'sz', 'swz'),
(215, 'Sweden', 'se', 'swe'),
(216, 'Switzerland', 'ch', 'che'),
(217, 'Syrian Arab Republic', 'sy', 'syr'),
(218, 'Taiwan, Province of China', 'tw', ''),
(219, 'Tajikistan', 'tj', 'tjk'),
(220, 'Tanzania, United Republic of', 'tz', 'tza'),
(221, 'Thailand', 'th', 'tha'),
(222, 'Timor-Leste', 'tl', 'tls'),
(223, 'Togo', 'tg', 'tgo'),
(224, 'Tokelau', 'tk', 'tkl'),
(225, 'Tonga', 'to', 'ton'),
(226, 'Trinidad and Tobago', 'tt', 'tto'),
(227, 'Tunisia', 'tn', 'tun'),
(228, 'Turkey', 'tr', 'tur'),
(229, 'Turkmenistan', 'tm', 'tkm'),
(230, 'Turks and Caicos Islands', 'tc', 'tca'),
(231, 'Tuvalu', 'tv', 'tuv'),
(232, 'Uganda', 'ug', 'uga'),
(233, 'Ukraine', 'ua', 'ukr'),
(234, 'United Arab Emirates', 'ae', 'are'),
(235, 'United Kingdom', 'gb', 'gbr'),
(236, 'United States', 'us', 'usa'),
(237, 'United States Minor Outlying Islands', 'um', ''),
(238, 'Uruguay', 'uy', 'ury'),
(239, 'Uzbekistan', 'uz', 'uzb'),
(240, 'Vanuatu', 'vu', 'vut'),
(241, 'Venezuela, Bolivarian Republic of', 've', 'ven'),
(242, 'Viet Nam', 'vn', 'vnm'),
(243, 'Virgin Islands, British', 'vg', 'vgb'),
(244, 'Virgin Islands, U.S.', 'vi', 'vir'),
(245, 'Wallis and Futuna', 'wf', 'wlf'),
(246, 'Western Sahara', 'eh', 'esh'),
(247, 'Yemen', 'ye', 'yem'),
(248, 'Zambia', 'zm', 'zmb'),
(249, 'Zimbabwe', 'zw', 'zwe');

-- --------------------------------------------------------

--
-- Table structure for table `credittransactions`
--

CREATE TABLE IF NOT EXISTS `credittransactions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DonationID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Datetime` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`,`DonationID`),
  KEY `DonationID` (`DonationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `credittransactions`
--

INSERT INTO `credittransactions` (`ID`, `UserID`, `DonationID`, `Amount`, `Datetime`) VALUES
(1, 2, 11, 10, '0000-00-00 00:00:00'),
(2, 2, 11, 100, '0000-00-00 00:00:00'),
(3, 2, 11, 1000, '0000-00-00 00:00:00'),
(4, 2, 11, 90, '0000-00-00 00:00:00'),
(5, 2, 9, 1000, '0000-00-00 00:00:00'),
(6, 2, 9, 1500, '0000-00-00 00:00:00'),
(7, 2, 9, 200, '0000-00-00 00:00:00'),
(8, 2, 2, 10, '2015-06-13 00:00:00'),
(9, 2, 2, 10, '2015-06-13 22:51:47'),
(10, 2, 3, 50, '2015-06-13 23:05:56'),
(11, 2, 3, 30, '2015-06-13 23:06:47'),
(12, 2, 10, 80000, '2015-06-13 23:32:19'),
(13, 2, 10, 20000, '2015-06-13 23:32:33'),
(14, 2, 10, 30000, '2015-06-13 23:40:27'),
(15, 2, 9, 500000, '2015-06-13 23:42:49'),
(16, 2, 11, 50, '2015-06-13 23:45:25'),
(17, 2, 11, 100, '2015-06-13 23:45:31'),
(18, 2, 11, 100, '2015-06-13 23:45:35'),
(19, 2, 11, 100, '2015-06-13 23:45:39'),
(20, 2, 4, 60000, '2015-06-14 20:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `donation_page`
--

CREATE TABLE IF NOT EXISTS `donation_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Name_hr` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Description_hr` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Name_en` varchar(50) NOT NULL,
  `Description_en` text NOT NULL,
  `Picture_url` varchar(500) NOT NULL,
  `targetAmount` double NOT NULL,
  `currentAmount` double NOT NULL,
  `endDate` date NOT NULL,
  `isRunning` tinyint(1) NOT NULL DEFAULT '1',
  `isSuccessful` tinyint(1) NOT NULL DEFAULT '0',
  `TagID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  KEY `TagID` (`TagID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `donation_page`
--

INSERT INTO `donation_page` (`ID`, `UserID`, `Name_hr`, `Description_hr`, `Name_en`, `Description_en`, `Picture_url`, `targetAmount`, `currentAmount`, `endDate`, `isRunning`, `isSuccessful`, `TagID`) VALUES
(2, 2, 'Mandijin ožiljak', '<p>Amanda Kuck, 4 godine, dijagnosticiran je na 6/6/15 s DIPG, najtežem i agresivnog tumora na mozgu za liječenje. Ova stranica se postaviti kako bi se prikupiti sredstva obitelj Kuck će vam u bliskoj budućnosti kako bi se platiti za medicinski zapisi i mnoge druge stvari.</p>', 'Mandy''s scar', '<p>Amanda Kuck, 4 years old, was diagnosed on 6/6/15 with DIPG , the most difficult and aggressive brain tumor to treat. This page is being set up to help raise the funds the Kuck family will need in the near future to help pay for medical bills and many other things. </p>', '4851487_1433710305.666', 250000, 20, '2015-07-31', 1, 0, 1),
(3, 3, 'Pokop Gamela i Lakreishe', '<p>Molim pomoć podržavaju zakapanje dvije prekrasne, ljubavi duhova. Sa nema životno osiguranje politike na bilo koji od ove djece, naša obitelj se bori da bi mogli imati pogreb ove dvije su vrlo zaslužuje. Gemel starosti 26 i njegova mlađa sestra Lakreisha starosti 15 i preminuo 7. lipnja zajedno zbog motor nesreća. Uz bilo podrške molimo Bogu i ostaviti ga u rukama da ćemo biti u mogućnosti prikupiti dovoljno sredstava da stavi svoje dvije najdraže s ostatkom.</p>', 'Laying to rest Gemel & Lakreisha', '<p><span style="font-family: Lato, sans-serif;"><span style="font-size: 18px; line-height: 25px;">Please help support the burial of two beautiful, loving spirits. With no life insurance policies on either of these children, our family is fighting to be able to have the funeral these two are very deserving of. Gemel age 26 and his younger sister Lakreisha age 15 both passed away June 7th together due to a motorcycle accident. With Any support we pray to God and leave it in his hands that we will be able to raise adequate funds to lay our two loved ones to rest.</span></span></p>\r\n<p> </p>', '4862056_1433743333.0989', 25000, 80, '2015-06-30', 1, 0, 2),
(4, 2, 'Troškovi obitelji Domingues', '<p>Naš dragi prijatelj Raquel je suprug bio u strašnoj prometnoj nesreći u subotu ujutro. Ona je morala reći svoje dečke (3. razred i 6. razreda) da je njihov otac neće uspjeti. Ne znam da sam ikad upoznao par koji se činilo da ispunite jedni druge koliko Airesu i Raquel završiti jedni druge. A, oni su prvi ljudi koji se brine za i pomaganje drugima. Molite za Raquel i njezinih dječaka. Put naprijed je zastrašujuće. Ako se osjećate tako sklon, donirajte za ovaj Go fondu me da smo postavili pokušati pokriti neposredne troškove i buduće troškove za dječake.</p>', 'Domingues Family Expenses', '<p>Our dear friend Raquel''s husband was in a terrible car accident early Saturday morning. She''s had to tell their boys (3rd grade and 6th grade) that their father isn''t going to make it. I don''t know that I''ve ever met a couple that seemed to complete each other as much as Aires and Raquel complete each other. And, they are the first people to be taking care of and helping others. Please pray for Raquel and her boys. The road ahead is daunting. If you feel so inclined, please donate to this Go Fund Me that we''ve set up to try and cover immediate expenses, and future expenses for the boys.</p>\r\n<p> </p>', '4569757_1433701691.918', 50000, 60000, '2015-08-23', 1, 1, 5),
(5, 3, 'Podrška za Richarda i familiju', '<p>Kao što svi čuli do sada, Richard je na odmoru u Kostariki s nekoliko njegovih članova obitelji, kada tragičan događaj udario. On je zamahnuo u ocean Par</p>\r\n<p>e subota noć i nije vidio ili čuo od tada. Im postavljanje ovaj račun za pomoć pokriti troškove koje obitelj i prijatelji su otišli iz džepa za pomoć suradnika u potrazi za našeg voljenog Richarda. Sve što mogu dati pomaže i da će biti mnogo poštovati, hvala vam svima unaprijed i nadajmo se da je pronašao uskoro! http://www.turnto10.com/story/29269481/ri-officer-missing-off-costa-rica</p>', 'Support for Richard and fam/friends', '<p>As you all have heard by now, Richard was vacationing in Costa Rica with a few of his family members when a tragic event struck. He was swept out into the ocean lat</p>\r\n<p>e Saturday night and hasn''t been seen or heard from since. Im setting this account up to help cover the expenses that family and friends have gone out of pocket for to help aide in the search for our beloved Richard. Anything you can give helps and would be greatly appreciated, thank you all in advance and let''s hope that he is found soon! http://www.turnto10.com/story/29269481/ri-officer-missing-off-costa-rica</p>\r\n<p> </p>\r\n<p> </p>', '4877537_1433865928.5633', 10000, 0, '2015-09-18', 1, 0, 3),
(6, 4, 'Pomozi Melissi Zeimet', '<p>Molim Pomoć. Melissa Zeimet .. Izgubila njezin sin Logana u tragičnom događaju sinoć. Beba je Otac ga je i općenarodni Amber Alert je izdana. nedugo nakon što je tamo i pronađeni su mrtvi u oci izgorio kamion u Missouriju .. Ona treba pomoć s pogrebne troškove, kao i sigurni smo da će trebati neko savjetovanje i za nju i njezin drugi sin .. To je bio tragičnog događaja koji je završio vrlo loše ... Molim pomoć na bilo koji način možete ..... bilo malo će pomoći ...... Ona mora da ga je vratila u Iowi, pogreb, i podrška za nju i njezinog sina i slobodnog vremena s posla ... ona treba svu pomoć koju može dobiti</p>', 'Help Melissa Zeimet', '<p>Please Help. Melissa Zeimet?.. She lost Her Son logan in a tragic event last night. The Baby''s Father took him and a nation wide amber alert was issued. shortly there after both were found dead in the fathers burnt truck in Missouri.. She needs help with funeral expenses as well as we are sure she will need some counseling for both her and her other son.. This was a tragic event that ended very badly... Please help in any way you can..... any little bit will help......She has to have him brought back to Iowa, funeral, and support for her and her son, and time off from work... she needs all the help she can get</p>', '4851487_1433710305.107', 20000, 0, '2015-10-14', 1, 0, 6),
(7, 5, 'Naing Myanmar obiteljski restoran', '<p>Naing Mianmar Obitelj Restoran je u obiteljskom vlasništvu restoran trenutno nalazi na 3308 S. Cedar Street u Lansing, Michigan. Restoran je u vlasništvu Mi Latt Thanda (koji kuha) i njezin suprug Moe Naing Israel (koji služi hranu). Obojica rade duge sate na restuarant, uz pomoć dva honorarnih zaposlenika. Podrijetlom iz Burme (Mianmar), oni emigrirao u SAD-u snu otvaranja Restuarant. Njihova mala restoran je postao popularno mjesto s kult sljedeće, poznat po ukusnim, svježe i dobro pripremljene svježe hrane po izuzetno povoljnim cijenama. Oni imaju dvoje male djece, Jason, 1 i Samuel, 10.</p>\r\n<p> </p>\r\n<p>Oni su nedavno bili prisiljeni zatvoriti svoja vrata jer im je stanodavac odbija platiti račun za vodu. Ovaj marljiva imigrant obitelji nema drugih izvora prihoda, a oni ne mogu priuštiti izgubljenu dobit. Lansing odbor vode i svjetlosti je isključiti vodu u trgovački centar gdje se nalazite, ostavljajući im drugog izbora nego zatvoriti svoja vrata.</p>\r\n<p> </p>\r\n<p>Ova obitelj je američki san biti uništena zbog djelovanja njihovog stanodavca, Harpreet Singh i Prab Investments, koji nije bio spreman na suradnju.</p>\r\n<p> </p>\r\n<p>Pokažimo Ova prekrasna obiteljska neki američki gostoljubivost i pomoći im zadržati svoj san (i svoj jedini izvor prihoda) živ, dok u isto vrijeme imajući prekrasan restoran gore i trčanje.</p>', 'Naing Myanmar Family Restaurant', '<p>Naing Myanmar Family Restaurant is a small family-owned restaurant currently located at 3308 S. Cedar Street in Lansing, Michigan. The restaurant is owned by Mi Latt Thanda (who cooks) and her husband Moe Naing Israel (who serves the food). They both work long hours at the restuarant, with the help of two part-time employees. Originally from Burma (Myanmar), they immigrated to the USA with the dream of opening a restuarant. Their little restaurant has become a popular place with a cult following, known for the delicious, fresh and well-prepared fresh food at extremely reasonable prices. They have two young children, Jason, 1, and Samuel, 10.</p>\r\n<p> </p>\r\n<p>They have recently been forced to close their doors because their landlord refuses to pay the water bill. This hard-working immigrant family has no other source of income, and they cannot afford the lost income. The Lansing Board of Water and Light has shut off the water to the strip mall where they''re located, leaving them no choice but to close their doors.</p>\r\n<p> </p>\r\n<p>This family''s American dream is being destroyed because of the actions of their landlord, Harpreet Singh and Prab Investments, who is not being cooperative.</p>\r\n<p> </p>\r\n<p>Let''s show this wonderful family some American hospitality and help them keep their dream (and their only source of income) alive, while at the same time keeping a wonderful restaurant up and running.</p>\r\n<p> </p>', '4877946_1433864779.4132', 10000, 0, '2015-09-25', 1, 0, 2),
(8, 5, 'Tonyin put prema oporavku', '<p>Naš prijatelj Tonya prisustvovao Red Sox / Oakland Athletics igru ​​na petak 5 lipnja sa svojim sinom i prijateljem Samom kad je udario u lice slomljenog šišmiša. Igra je zaustavljena i Tonya je požurio Beth Israel bolnicu u Bostonu s po život opasne ozljede.</p>\r\n<p> </p>\r\n<p>Ovaj incident je bio prekriven nacionalnoj mediji. Mnogi od vas to vidio na vijestima, internet, ili možda su gledajući igru ​​kad je nastao.</p>\r\n<p> </p>\r\n<p>Ono što možda ne znate tko Tonya je kao osoba. Ona je lijepa, pozitivna, optimistična, radin samohrana majka koja će učiniti sve za svoju obitelj, prijatelje, a posebno njezin sin.</p>\r\n<p> </p>\r\n<p>U subotu navečer, 6. lipnja sa svojom obitelji i Sam po boku, Tonya probudio sljedećeg petka hitne operacije. Bila je lucidan, nije znao gdje je i bio u mogućnosti odgovoriti na pitanja. To je ohrabrujući i dobrodošlicu vijesti.</p>\r\n<p> </p>\r\n<p>Međutim, njezini ozljede su ozbiljne, ona je i dalje na intenzivnoj njezi, a njezin put do oporavka će biti dugo i teško. Ona neće biti u mogućnosti vratiti se na posao već neko vrijeme, a njezini troškovi će se gomilati.</p>\r\n<p> </p>\r\n<p>Tražimo prijatelje, baseball navijača i igrača, i bilo tko da pogleda ovu fundraiser pomoći osloboditi neke od financijski teret donacijom. Sve donacije uvelike su cijenjena i sav prihod će ići izravno na Tonya Carpenter i njezinog sina kako bi plaćanje računa za potrebe, kirurških troškova, troškova sanacije i općih potreba u ovom teškom trenutku.</p>\r\n<p> </p>\r\n<p>Ova stranica fundraiser će redovito pratiti s promjenama na Tonya oporavka, pa se vratite.</p>\r\n<p> </p>\r\n<p>U ime Tonya najuže obitelji i prijateljima, hvala vam za sve vaše ljubavi i podršci.</p>\r\n<p> </p>\r\n<p>Mickey Markou &amp; Michele Fleury</p>', 'Tonya''s Road to Recovery', '<p>Our friend Tonya attended the Red Sox / Oakland Athletics game on Friday, June 5th with her son and friend Sam when she was struck in the face by a broken bat.  The game was stopped and Tonya was rushed to Beth Israel hospital in Boston with life threatening injuries.</p>\r\n<p> </p>\r\n<p>This incident was covered nationally by the media.  Many of you saw this on the news, internet, or might have been watching the game when it occurred.</p>\r\n<p> </p>\r\n<p>What you may not know is who Tonya is as a person.  She’s a beautiful, positive, upbeat, hardworking single mom who would do anything for her family, friends, and especially her son.  </p>\r\n<p> </p>\r\n<p>On Saturday evening, June 6th with her family and Sam by her side, Tonya woke following Friday''s emergency surgery.  She was lucid, knew where she was, and was able to answer questions. This was encouraging and welcoming news.</p>\r\n<p> </p>\r\n<p>However, her injuries are serious, she is still in intensive care, and her road to recovery will be long and difficult.  She will not be able to go back to work for some time and her expenses will pile up.</p>\r\n<p> </p>\r\n<p>We are asking friends, baseball fans and players, and anyone that views this fundraiser to help relieve some of the financial burden by donating. All donations are greatly appreciated and all proceeds will go directly to Tonya Carpenter and her son to help pay bills for necessities, surgical expenses, rehabilitation expenses, and general needs during this difficult time.</p>\r\n<p> </p>\r\n<p>This fundraiser page will be monitored regularly with updates on Tonya’s recovery, so please check back.</p>\r\n<p> </p>\r\n<p>On behalf of Tonya’s immediate family and friends, we thank you for all of your love and support.</p>\r\n<p> </p>\r\n<p>Mickey Markou &amp; Michele Fleury</p>\r\n<p> </p>', '4889650_1433942684.8927', 30000, 0, '2016-05-20', 1, 0, 1),
(9, 5, 'Završetak Channanijinog bucket lista', '<p>Kao što svi vjerojatno znate ja sam smrtno bolesna, te su dali rok za život. Uz svačija pomoć i ljubaznim donacijama sam zamalo završio moj popis Kanta, ali postoji jedna stvar koju bih volio učiniti prije nego što bude prekasno.</p>\r\n<p>Volio bih ići na Brit Awards iduće godine i imaju VIP iskustvo hoda po crvenom tepihu.</p>\r\n<p>Trebam svačija pomoć da bi to bilo moguće</p>\r\n<p> </p>\r\n<p>Mnogo ljubav x</p>', 'Completing Channans Bucket List', '<p>As everyone may know I am terminally ill and have been given a time limit to live. With everyone''s help and kind donations I have very nearly completed my Bucket List but there is one thing I would love to do before it''s too late. </p>\r\n<p>I would love to go to The Brit Awards next year and have the VIP experience of walking on the red carpet. </p>\r\n<p>I need everyone''s help to make this possible</p>\r\n<p> </p>\r\n<p>Much love x </p>\r\n<p> </p>', '4713874_1432650829.2083', 2000, 502700, '2015-10-28', 1, 1, 1),
(10, 2, 'Olechoski Children''s School Fund', '<p>U Olechoski i Coffey obitelji slomljenog srca nedavnim gubitkom Kate. Kate je najdivnija i ljubavi supruga, majka, sestra i prijateljica. Njezin sjajni duh je dotaknuo živote tolikih njezinih voljenih prijatelja i članova obitelji.</p>\r\n<p> </p>\r\n<p>Da se slavi spomen Kate, tražimo od vas da velikodušno daruju u odgojnu fond za potporu Kate i Craig je troje djece: Evan (6), Charlie (4) i Stella (1).</p>\r\n<p> </p>\r\n<p>Vaša milostiv donacije nadamo se da će poduprijeti tu djecu za mnogo godina da dođem. Mi smo tako zahvalan za sve vaše ljubavi podršku i molitvama za to vrijeme tragedije. Neka vas i vaše obitelji Bog blagoslovi kao što je on svakako blagoslov Kate, koja je uz njega sada.</p>', 'Olechoski Children''s School Fund', '<p>The Olechoski and Coffey families are heartbroken by the recent loss of Kate. Kate was the most wonderful and loving wife, mother, sister and friend. Her glowing spirit has touched the lives of so many of her beloved friends and family members. </p>\r\n<p> </p>\r\n<p>To memorialize Kate, we are asking you to graciously donate to an educational fund to support Kate and Craig''s three children: Evan (6), Charlie (4) and Stella (1). </p>\r\n<p> </p>\r\n<p>Your gracious donations will hopefully support these children for many years to come. We are so thankful for all of your loving support and your prayers during this time of tragedy. May God bless you and your families as He is most certainly blessing Kate, who is by His side now.</p>\r\n<p> </p>', '4841972_1433548834.5342', 75000, 130000, '2015-11-19', 1, 1, 4),
(11, 2, 'Oporavak obitelji Eyl od tornada', '<p>U četvrtak, 4 lipanj, 2015, Lorraine i Billa Eyl kuća zauzeo povijesnoj tornada. Ali su izgubili više od jedne kuće - izgubili dom.</p>\r\n<p> </p>\r\n<p>Lorraine i Bill Eyl izgradili svoju kuću u zemlji izvan Berthoud 1972. Nakon migraciju na Colorado od istočne obale, nakon Billove djetinjstvo kauboj fantazije, mladi par je vidio priliku za stvaranje farmi život da bih dugo zamislio za svoje mlade djeca.</p>\r\n<p> </p>\r\n<p>Od tada, kroz svoje uloge kao poduzetnika i odgajatelja, oni su pridonijeli gotovo nedokučiva količinu ljubavi i radosti (i ne mali iznos optimizma i brige za životinje) na okolne zajednice. Oni su sanirane divljih životinja i savjetovao divljih tinejdžera, sami cementiranje kao stupova Berthoud-Longmont području.</p>\r\n<p> </p>\r\n<p>Nažalost, stupove (i gotovo sve ostalo) su srušila je neodoljivom snagom tornada koji je preobrazio 43 godina obiteljske povijesti u hrpu ruševina u trenu.</p>\r\n<p> </p>\r\n<p>Srećom, kombinacija dobre osiguranja i neobuzdanog optimizma će osigurati da Eyls nisu srušene iskustvom. Međutim, postoje neke gubitke da ni osiguranje, niti optimizam će zamijeniti. Za tih gubitaka, tražimo da se naša nevjerojatno podržavaju i ljubiti zajednicu za pomoć. Kao Eyls planiraju obnoviti na zemlji koju su pod nazivom dom za 43 godina, pozivamo vas na sudjelovanje - ne u kraj, ali u novom početku.</p>', 'Eyl Family Tornado Recovery', '<p>On Thursday, June 4, 2015, Lorraine and Bill Eyl''s house was taken by a historic tornado. But they lost more than a house -- they lost a home.</p>\r\n<p> </p>\r\n<p>Lorraine and Bill Eyl built their house in the country outside of Berthoud in 1972. After migrating to Colorado from the East Coast, following Bill''s boyhood cowboy fantasies, the young couple saw an opportunity to create the farm life they''d long envisioned for their young children. </p>\r\n<p> </p>\r\n<p>Since then, through their roles as entrepreneurs and educators, they have contributed a nearly unfathomable amount of love and joy (and no small amount of optimism and animal care) to the surrounding community. They''ve rehabilitated wild animals and advised wild teenagers, cementing themselves as pillars of the Berthoud-Longmont area. </p>\r\n<p> </p>\r\n<p>Sadly, the pillars (and nearly everything else) were toppled by the irresistible force of a tornado that transformed 43 years of family history into a pile of rubble in an instant.</p>\r\n<p> </p>\r\n<p>Fortunately, the combination of good insurance and irrepressible optimism will ensure that the Eyls are not ruined by the experience. However, there are some losses that neither insurance nor optimism will replace. For those losses, we are looking to our incredibly supportive and loving community for help. As the Eyls plan to rebuild on the land they''ve called home for 43 years, we invite you to participate -- not in an ending, but in a new beginning.</p>\r\n<p> </p>', '4870461_fb_1433816646.7197_funds', 15000, 1550, '2015-09-26', 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `donation_tags`
--

CREATE TABLE IF NOT EXISTS `donation_tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tag_hr` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Tag_en` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donation_tags`
--

INSERT INTO `donation_tags` (`ID`, `Tag_hr`, `Tag_en`) VALUES
(1, 'Medicina', 'Medical'),
(2, 'Udruge', 'Charities'),
(3, 'Volontiranje', 'Volunteer'),
(4, 'Školovanje', 'Education'),
(5, 'Sport', 'Sport'),
(6, 'Ostalo', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `Role`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Password` varchar(512) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CountryID` int(11) NOT NULL,
  `Role` int(11) NOT NULL,
  `Picture_url` varchar(500) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FacebookID` bigint(20) DEFAULT NULL,
  `Credits` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CountyID` (`CountryID`),
  KEY `RoleID` (`Role`),
  KEY `ID - transactions` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Password`, `Name`, `Surname`, `CountryID`, `Role`, `Picture_url`, `Email`, `FacebookID`, `Credits`) VALUES
(2, '$2y$10$rd1cpfAgAkU6cURz2PD3a.OUkWUNSpJcI4KaiDQaWUwFc87EP8eNS', 'Sanjin', 'Grahovar Sadikovic', 1, 2, '', 'sanjin.grahovar@gmail.com', 953780997987511, 309650),
(3, '$2y$10$3wBDHPBWz66t1Ja2LRHs6eiJ8u0W78m5Yl0g7gz30vbjJY7tvQyge', 'Bob', 'Boban', 38, 1, '', 'bob@bob.bob', NULL, 200),
(4, '$2y$10$Qg97YfHgRIuJiK3DJsw43O4zwCu1K0NgmaHajVpxYE/c6GmWqQrfm', 'John', 'Doe', 236, 1, '', 'john@doe.com', NULL, NULL),
(5, '$2y$10$L3COWCSWu3OfeF7EV5Wx/OVNp2.BJP1KvMIRKqylnQ7sgXScdbU4G', 'Jane', 'Doe', 139, 1, '', 'jane@doe.com', NULL, 50);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credittransactions`
--
ALTER TABLE `credittransactions`
  ADD CONSTRAINT `credittransactions_ibfk_1` FOREIGN KEY (`DonationID`) REFERENCES `donation_page` (`ID`),
  ADD CONSTRAINT `credittransactions_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `donation_page`
--
ALTER TABLE `donation_page`
  ADD CONSTRAINT `donation_page_ibfk_2` FOREIGN KEY (`TagID`) REFERENCES `donation_tags` (`ID`),
  ADD CONSTRAINT `donation_page_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `CountryID_countries.ID` FOREIGN KEY (`CountryID`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `roles` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
