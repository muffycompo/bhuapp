-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2012 at 12:46 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bhuapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`) VALUES
(1, 'Zenith Bank'),
(2, 'Diamond Bank'),
(3, 'EWT-Micro Finance Bank'),
(4, 'UBA Bank');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE IF NOT EXISTS `biodata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `sex_id` int(11) NOT NULL,
  `state_of_origin_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `marital_status_id` int(11) NOT NULL,
  `formno` varchar(10) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(30) NOT NULL,
  `home_address` text NOT NULL,
  `gsm_no` varchar(15) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `pastor_name` varchar(40) NOT NULL,
  `pastor_address` text NOT NULL,
  `pastor_gsm_no` varchar(15) NOT NULL,
  `denomination_id` varchar(30) NOT NULL,
  `maiden_name` varchar(30) NOT NULL,
  `former_name` varchar(30) NOT NULL,
  `is_suspended` tinyint(1) NOT NULL,
  `is_expelled` tinyint(1) NOT NULL,
  `is_denied_admission` tinyint(1) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `title_id`, `sex_id`, `state_of_origin_id`, `country_id`, `religion_id`, `marital_status_id`, `formno`, `surname`, `firstname`, `othernames`, `home_address`, `gsm_no`, `email_address`, `date_of_birth`, `pastor_name`, `pastor_address`, `pastor_gsm_no`, `denomination_id`, `maiden_name`, `former_name`, `is_suspended`, `is_expelled`, `is_denied_admission`, `reason`) VALUES
(2, 2, 1, 1, 9, 118, 1, 1, '943056', 'Onen', 'Mfawa', 'Alfred Barka', 'Somewhere in nevada', '08059443154', 'muffycompoqm@gmail.com', '1994-09-12', 'Rev. Father Johnson', 'Some Church in the heavens', '08030796088', '3', '', '', 1, 0, 0, 'I was sturborn'),
(5, 5, 0, 0, 0, 0, 0, 0, '252903', 'Onen', 'Ikpi', '', '', '08030796088', 'ikpi03@gmail.com', '', '', '', '', '', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Andorra'),
(2, 'United Arab Emirate'),
(3, 'Afghanistan'),
(4, 'Antigua - Barbuda'),
(5, 'Anguilla'),
(6, 'Albania'),
(7, 'Armenia'),
(8, 'Argentina'),
(9, 'Australia'),
(10, 'Aruba'),
(11, 'Azerbaijan'),
(12, 'Bosnia'),
(13, 'Barbados'),
(14, 'Bangladesh'),
(15, 'Belgium'),
(16, 'Burkina Faso'),
(17, 'Bulgaria'),
(18, 'Bahrain'),
(19, 'Burundi'),
(20, 'Benin'),
(21, 'Bermuda'),
(22, 'Brunei'),
(23, 'Bolivia'),
(24, 'Brazil'),
(25, 'Bahamas'),
(26, 'Bhutan'),
(27, 'Botswana'),
(28, 'Belarus'),
(29, 'Belize'),
(30, 'Canada'),
(31, 'Curacao'),
(32, 'Central Africa Republic'),
(33, 'Congo'),
(34, 'Switzerland'),
(35, 'Christmas Island'),
(36, 'Cook Islands'),
(37, 'Chile'),
(38, 'Cameroon'),
(39, 'China'),
(40, 'Colombia'),
(41, 'Costa Rica'),
(42, 'Cote D''Ivoire'),
(43, 'Cuba'),
(44, 'Cape Verde'),
(45, 'Cyprus'),
(46, 'Czech Republic'),
(47, 'Germany'),
(48, 'Djibouti'),
(49, 'Denmark'),
(50, 'Dominica'),
(51, 'Dominican Republic'),
(52, 'Algeria'),
(53, 'Ecuador'),
(54, 'Estonia'),
(55, 'Egypt'),
(56, 'Eritrea'),
(57, 'Spain'),
(58, 'Ethiopia'),
(59, 'Finland'),
(60, 'Fiji'),
(61, 'Faroe Islands'),
(62, 'France'),
(63, 'Great Britain'),
(64, 'Grenada'),
(65, 'Georgia'),
(66, 'Ghana'),
(67, 'Greenland'),
(68, 'Guinea'),
(69, 'Guadaloupe'),
(70, 'Equatorial Guinea'),
(71, 'Greece'),
(72, 'Guatemala'),
(73, 'Guam'),
(74, 'Guyana'),
(75, 'Hong Kong'),
(76, 'Honduras'),
(77, 'Croatia'),
(78, 'Haiti'),
(79, 'Hungary'),
(80, 'Iran'),
(81, 'Indonesia'),
(82, 'Israel'),
(83, 'India'),
(84, 'Iraq'),
(85, 'Ireland'),
(86, 'Iceland'),
(87, 'Italy'),
(88, 'Jamaica'),
(89, 'Jordan'),
(90, 'Japan'),
(91, 'Kenya'),
(92, 'Kyrgyzstan'),
(93, 'Cambodia'),
(94, 'Kiribati'),
(95, 'Korea'),
(96, 'Kuwait'),
(97, 'Kazakhstan'),
(98, 'Laos'),
(99, 'Lebanon'),
(100, 'St Lucia'),
(101, 'Liechtenstein'),
(102, 'Liberia'),
(103, 'Luxembourg'),
(104, 'Latvia'),
(105, 'Lybia'),
(106, 'Morocco'),
(107, 'Moldova'),
(108, 'Macedonia'),
(109, 'Mali'),
(110, 'Myanmar'),
(111, 'Mongolia'),
(112, 'Malta'),
(113, 'Mexico'),
(114, 'Malaysia'),
(115, 'Mozambique'),
(116, 'Namibia'),
(117, 'Niger'),
(118, 'Nigeria'),
(119, 'Nicaragua'),
(120, 'Netherlands'),
(121, 'Norway'),
(122, 'Nepal'),
(123, 'Nauru'),
(124, 'New Zealand'),
(125, 'Oman'),
(126, 'Panama'),
(127, 'Peru'),
(128, 'Philippines'),
(129, 'Pakistan'),
(130, 'Poland'),
(131, 'Puerto Rico'),
(132, 'Portugal'),
(133, 'Paraguay'),
(134, 'Qatar'),
(135, 'Romania'),
(136, 'Russia'),
(137, 'Rwanda'),
(138, 'Saudi Arabia'),
(139, 'Sudan'),
(140, 'Sweden'),
(141, 'Singapore'),
(142, 'Slovenia'),
(143, 'Slovakia'),
(144, 'San Marino'),
(145, 'Senegal'),
(146, 'Somalia'),
(147, 'Suriname'),
(148, 'Serbia - Montenegro'),
(149, 'El Salvador'),
(150, 'Syria'),
(151, 'Chad'),
(152, 'Togo'),
(153, 'Thailand'),
(154, 'Tokelau'),
(155, 'Tunisia'),
(156, 'Tonga'),
(157, 'Turkey'),
(158, 'Tridinidad Tobago'),
(159, 'Taiwan'),
(160, 'Ukraine'),
(161, 'United Kingdom'),
(162, 'United States'),
(163, 'Uruguay'),
(164, 'Vatican'),
(165, 'Venezuela'),
(166, 'Vietnam'),
(167, 'South Africa'),
(168, 'Zimbawe');

-- --------------------------------------------------------

--
-- Table structure for table `denomination`
--

CREATE TABLE IF NOT EXISTS `denomination` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `denomination_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `denomination`
--

INSERT INTO `denomination` (`id`, `denomination_name`) VALUES
(1, 'Protestant '),
(2, 'Orthodox'),
(3, 'Catholic'),
(4, 'Anglican'),
(5, 'Presbyterian'),
(6, 'Baptists '),
(7, 'Amish'),
(8, 'Lutheran '),
(9, 'Quakers'),
(10, 'Seventh-day Adventists'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_choice_id` int(11) NOT NULL,
  `second_choice_id` int(11) NOT NULL,
  `jamb_number` varchar(20) NOT NULL,
  `jamb_score` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `first_choice_id`, `second_choice_id`, `jamb_number`, `jamb_score`) VALUES
(1, 2, 8, 12, '06440347AB', '201');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE IF NOT EXISTS `examinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `exam_date` varchar(4) NOT NULL,
  `exam_number` varchar(20) NOT NULL,
  `exam_subject_id` int(11) NOT NULL,
  `exam_grade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `user_id`, `exam_type_id`, `exam_date`, `exam_number`, `exam_subject_id`, `exam_grade_id`) VALUES
(5, 2, 1, '2010', '4123456789', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_grades`
--

CREATE TABLE IF NOT EXISTS `exam_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_grade_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `exam_grades`
--

INSERT INTO `exam_grades` (`id`, `exam_grade_name`) VALUES
(1, 'A1'),
(2, 'B2'),
(3, 'B3'),
(4, 'C4'),
(5, 'C5'),
(6, 'C6'),
(7, 'D7'),
(8, 'E8'),
(9, 'F9'),
(10, 'A/R');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subjects`
--

CREATE TABLE IF NOT EXISTS `exam_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `exam_subjects`
--

INSERT INTO `exam_subjects` (`id`, `subject_name`) VALUES
(1, 'Mathematics'),
(2, 'English Language'),
(3, 'Literature in English'),
(4, 'Physics '),
(5, 'Chemistry'),
(6, 'Biology'),
(7, 'Hausa Language'),
(8, 'Yoruba Language '),
(9, 'Igbo Language'),
(10, 'Further Mathematics '),
(11, 'Geography '),
(12, 'Economics '),
(13, 'Government '),
(14, 'Commerce'),
(15, 'Health Science'),
(16, 'History'),
(17, 'Agricultural Science'),
(18, 'Technical Drawing '),
(19, 'Financial Accounting '),
(20, 'Christian Religion Knowledge (CRK)'),
(21, 'Islamic Religion Knowledge (IRK)		'),
(22, 'Food and Nutrition		'),
(23, 'Visual Art		'),
(24, 'Home Management');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE IF NOT EXISTS `exam_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `exam_name`) VALUES
(1, 'WAEC'),
(2, 'NECO'),
(3, 'GCE	'),
(4, 'NABTEB	'),
(5, 'WASSCE');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE IF NOT EXISTS `institutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `institution_name` varchar(200) NOT NULL,
  `from_year` varchar(4) NOT NULL,
  `to_year` varchar(4) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `user_id`, `institution_name`, `from_year`, `to_year`, `qualification`) VALUES
(6, 2, 'Another School', '2000', '2002', 'JSCE');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_migrations`
--

CREATE TABLE IF NOT EXISTS `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravel_migrations`
--

INSERT INTO `laravel_migrations` (`bundle`, `name`, `batch`) VALUES
('application', '2012_12_25_141759_create_user_table', 1),
('application', '2012_12_25_141805_create_biodata_table', 1),
('application', '2012_12_25_141812_create_education_table', 1),
('application', '2012_12_25_141825_create_parentguardian_table', 1),
('application', '2012_12_25_141835_create_institution_table', 1),
('application', '2012_12_25_141844_create_examination_table', 1),
('application', '2012_12_25_141855_create_title_table', 1),
('application', '2012_12_25_141900_create_sex_table', 1),
('application', '2012_12_25_141906_create_states_table', 1),
('application', '2012_12_25_141910_create_country_table', 1),
('application', '2012_12_25_141924_create_religion_table', 1),
('application', '2012_12_25_141936_create_maritalstatus_table', 1),
('application', '2012_12_25_141945_create_programme_table', 1),
('application', '2012_12_25_141953_create_examsubject_table', 1),
('application', '2012_12_25_142002_create_examgrades_table', 1),
('application', '2012_12_25_142011_create_examtype_table', 1),
('application', '2012_12_25_213229_create_bank_table', 1),
('application', '2012_12_25_214313_create_pin_table', 1),
('application', '2012_12_27_192627_create_denomination_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE IF NOT EXISTS `marital_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marital_status_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `marital_status_name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(4, 'Widowed'),
(5, 'Seperated');

-- --------------------------------------------------------

--
-- Table structure for table `parent_guardian`
--

CREATE TABLE IF NOT EXISTS `parent_guardian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_name` varchar(40) NOT NULL,
  `parent_home_address` text NOT NULL,
  `parent_office_address` text NOT NULL,
  `relationship` varchar(120) NOT NULL,
  `parent_gsm_no` varchar(15) NOT NULL,
  `parent_email_address` varchar(200) NOT NULL,
  `parent_occupation` varchar(150) NOT NULL,
  `sponsor_name` varchar(40) NOT NULL,
  `sponsor_address` text NOT NULL,
  `sponsor_gsm_no` varchar(15) NOT NULL,
  `sponsor_occupation` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parent_guardian`
--

INSERT INTO `parent_guardian` (`id`, `user_id`, `parent_name`, `parent_home_address`, `parent_office_address`, `relationship`, `parent_gsm_no`, `parent_email_address`, `parent_occupation`, `sponsor_name`, `sponsor_address`, `sponsor_gsm_no`, `sponsor_occupation`) VALUES
(1, 2, 'Mr. John Wandara', 'Somewhere in Nevada and Jinx', 'Somewhere in Silicon Valley', 'Father', '08059443154', 'muffycompoqm@hotmail.com', 'Medical Doctor', 'Mr. John Wandara', 'Somewhere in Nevada and Jinx', '08059443154', 'Medical Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE IF NOT EXISTS `pins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teller` varchar(200) NOT NULL,
  `pin_no` varchar(200) NOT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `bank_id`, `user_id`, `teller`, `pin_no`, `pin_status`) VALUES
(1, 1, 2, '12345', '123456123456', 1),
(2, 2, 5, '54321', '654321654321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `programme_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `programme_name`) VALUES
(1, 'Accounting'),
(2, 'Anatomy'),
(3, 'Biochemistry'),
(4, 'Biology'),
(5, 'Botany'),
(6, 'Business Administration'),
(7, 'Chemistry'),
(8, 'Computer Science'),
(9, 'Economics'),
(10, 'English'),
(11, 'Mass Communication'),
(12, 'Medicine and Surgery'),
(13, 'Microbiology'),
(14, 'Mathematics'),
(15, 'Physiology'),
(16, 'Physics'),
(17, 'Political Science'),
(18, 'Sociology'),
(19, 'Statistics'),
(20, 'Zoology');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE IF NOT EXISTS `religion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `religion_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion_name`) VALUES
(1, 'Christian'),
(2, 'Muslim'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa-Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'FCT');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title_name`) VALUES
(1, 'Mr'),
(2, 'Miss'),
(3, 'Mrs'),
(4, 'Dr'),
(5, 'Prof'),
(6, 'Chief'),
(7, 'Alhaji'),
(8, 'Hajiya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'mfaone943056', '$2a$08$a8GrfbabjKNWSMnzzOopCuZGsseC.mkBpiyOZGET2Ynlt6dbG1ukm', '2012-12-26 20:54:37', '2012-12-26 20:54:37'),
(5, 'ikpone252903', '$2a$08$6TwPro/TOdlLpkLGAPdsNu7.nt3NJWoYB//Zt.IyaSaz0CVaRBgjK', '2012-12-27 18:33:24', '2012-12-27 18:33:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
