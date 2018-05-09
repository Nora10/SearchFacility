-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 11:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `member_id`) VALUES
(1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`) VALUES
(1, 'Cooking'),
(2, 'Cleaning'),
(3, 'Drivers'),
(4, 'Pilot'),
(5, 'Protocol'),
(6, 'Housekeeping'),
(7, 'Plumbers');

-- --------------------------------------------------------

--
-- Table structure for table `userupdates`
--

CREATE TABLE IF NOT EXISTS `userupdates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `office_room_number` text NOT NULL,
  `degrees` text NOT NULL,
  `degrees2` text NOT NULL,
  `degrees3` text NOT NULL,
  `degrees4` text NOT NULL,
  `biography` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Users will update certain info such as their resume' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `userupdates`
--

INSERT INTO `userupdates` (`id`, `job_title`, `office_room_number`, `degrees`, `degrees2`, `degrees3`, `degrees4`, `biography`) VALUES
(10, 'Teacher1', 'Golf 215', 'PHD Uni Ilorin', 'MSc Univ of PortHracourt', '', '', 'I ama  graduate of UniIlorin. I made a first class. in 1997, i started out at the ministry of agriculture teaching chemistry. I intend to do a post doctoral felloowship at the end of the coming year.');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `levels` int(11) NOT NULL,
  `address` text NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `salary` text NOT NULL,
  `dob` text NOT NULL,
  `state` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `office_room_number` varchar(255) NOT NULL,
  `degrees` text NOT NULL,
  `degrees2` text NOT NULL,
  `degrees3` text NOT NULL,
  `degrees4` text NOT NULL,
  `biography` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Viewed by HR department' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `lastname`, `firstname`, `phone`, `email`, `password`, `levels`, `address`, `marital_status`, `gender`, `salary`, `dob`, `state`, `photo`, `lga`, `department_id`, `job_title`, `office_room_number`, `degrees`, `degrees2`, `degrees3`, `degrees4`, `biography`) VALUES
(29, 'Trainers', 'Gucci', '08075478445', 'gucci@trainers.com', '2fb07e857f89a74dc607934351cf444d', 1, 'Lagos ', 'single', 'female', '45000', '1956/05/05', 'Sokoto', '15243569903019410.png', 'ikpoba', 1, 'Team Lead', 'Room 30', 'PHD Medicine', 'MSc Medicine', '', '', 'The AutoText feature has been part of Office for a long time, but is now part of Quick Parts, which was added to Office 2007. In addition to AutoText entries, the Quick Parts feature allows you to insert document properties (such as title and author) and fields (such as dates and page numbers). Quick Parts and AutoText entries are also known as “Building Blocks” and Word comes with many predefined building blocks. You can also add as many custom building blocks as you want.'),
(28, 'Obba', 'Joy', '0141414525', 'joy@obba.com', '9d52c00e5b139f4c5cb8ebda9801c5ff', 2, 'GTb junction Lagos', 'married', 'female', '50000', '1986/03/31', 'Delta State', '15243537058231812.png', 'Agbor', 3, 'Supervisor', 'Room 45', 'BEng Electrical', '', '', '', 'NOTE: We’ve previously written about how to reference text from other documents in Word so you can insert reusable content into other documents that will automatically update. The trick discussed in that article is similar to using an AutoText entry. However, once content is inserted using an AutoText entry, that content will NOT be automatically updated when you change the AutoText entry'),
(27, 'Kingsley', 'Precious', '0741454784', 'precious@kingsley.com', 'fc2762e6d88b1037d76f60b06239be3e', 1, 'emohua portharcourt', 'married', 'female', '10000', '1987/12/03', 'Rivers State', '1524353640202942.png', 'Emoha', 4, 'Associate deputy', 'Room 29', 'MSC Economics', 'BSC Economics', '', '', 'There is other software out there, like the free PhraseExpress for Windows, that performs a similar task system-wide. That’s great because it works in every app, not just Word, but AutoText has a few advantages of its own–namely, it has more formatting options (especially Word-specific ones) than PhraseExpress, and it’s available wherever Word is. So, if you aren’t allowed to install third-party programs on your work computer, for example, you can still use AutoText.'),
(26, 'Okubo ', 'Ebi', '0701454515', 'ebi@okubo.com', '8bff83b6b38f7a149a07018cc09c69ec', 3, 'Lagos apapa wharf', 'married', 'female', '30000', '1986/03/31', 'Delta State', '15243535092490235.png', 'ijaw', 3, 'Clerk', 'Room 35', 'SSCE', '', '', '', 'If you want your AutoText entry text to be stored with the paragraph formatting for all the paragraphs in the entry, including the last paragraph, make sure the paragraph mark at the end of the last paragraph is included in your selection. The paragraph mark stores the formatting for the paragraph. When you don’t select the paragraph mark at the end of the paragraph, that paragraph takes on the paragraph style of the surrounding text when you insert it. If you don’t see the paragraph mark at the end of each paragraph, you can choose to display them in the options. Any character formatting you applied to your AutoText content is automatically stored in the AutoText entry.'),
(25, 'Nzenaguora', 'Amaka', '08023456789', 'amaka@nzenaguora.com', 'a000381a8837d41670ab641a83076da8', 4, 'United States of America', 'married', 'female', '20000', '1994/01/01', 'Anambra State', '15243532127022400.png', 'Mbaise', 6, 'Assistant store keeper', 'Room 14', 'SSCE', '', '', '', 'NOTE: You may notice the “Save Selection to Quick Part Gallery” option available directly on the “Quick Parts” menu. This option adds the selected text as a “Quick Parts” entry, not an “AutoText” entry. “Quick Parts” and “AutoText” entries are both building blocks. You could add the entry that way, but we’re going to discuss adding it as an AutoText entry.'),
(23, 'Ekene', 'Okwems', '2703205986', 'ogey007@yahoo.co.uk', '183c33b9fddfb6b84d86cb0bfd625641', 2, '5911 plumtree lane', 'single', 'female', '800000', '1997/04/28', 'MICHIGAN', '15240002642856751.png', 'midland', 5, 'Professor1', 'rbn 202', 'Post Doc Mathematics', 'PHD Euler Maths', 'MSc Trigonometry', 'BSC Calculus', 'Mathematics is a beautiful study. It allows the beautification of complex multiples to  have a solution.he “Options” drop-down list allows you to specify how the entry is inserted into the document. If you’re inserting a small bit of text, such as a company name, select “Insert content only” which inserts the content of the entry inline at the cursor. You can also insert the content as its own paragraph or on its own page (perfect for creating standard cover pages).');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
