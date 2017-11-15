-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 04:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sengoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_area`
--

CREATE TABLE `activity_area` (
  `AreaID` int(11) NOT NULL,
  `AreaName` varchar(100) NOT NULL,
  `AreaDesc` text NOT NULL,
  `UserID` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_area`
--

INSERT INTO `activity_area` (`AreaID`, `AreaName`, `AreaDesc`, `UserID`, `Created`) VALUES
(1, 'Butchery', 'Butchery Details', 1, '2017-11-07 14:54:47'),
(2, 'Foundry', 'Foundry Details', 1, '2017-11-07 14:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `activity_category`
--

CREATE TABLE `activity_category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `CategoryNick` varchar(100) NOT NULL,
  `CategoryDesc` text NOT NULL,
  `UserID` int(1) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_category`
--

INSERT INTO `activity_category` (`CategoryID`, `CategoryName`, `CategoryNick`, `CategoryDesc`, `UserID`, `Created`) VALUES
(1, 'Support', 'Supp', 'Support Details', 1, '2017-11-07 14:52:21'),
(2, 'Corrective', 'Corr', 'Corrective Details', 1, '2017-11-07 14:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `activity_details`
--

CREATE TABLE `activity_details` (
  `DetailID` int(11) NOT NULL,
  `DetailText` text NOT NULL,
  `ActyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_details`
--

INSERT INTO `activity_details` (`DetailID`, `DetailText`, `ActyID`) VALUES
(1, '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1),
(2, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 2),
(3, '<p>After scouring through CodePen, I&rsquo;ve organized the absolute best calendar UIs I could find that was created specifically for websites. All of these calendars run on CSS for the interface, although some add JavaScript functionality to create some cool interactive features.</p>\n<p><br />Take a peek at these snippets and see what you think!</p>', 3),
(4, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 4),
(5, '<p>test</p>', 5),
(6, '<p>The quick brown fox</p>', 6),
(7, '<p>asdfasdfasf</p>', 7),
(8, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage ...There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage ...</p>\r\n<ol>\r\n<li>1</li>\r\n<li>2</li>\r\n<li>3</li>\r\n<li>54</li>\r\n<li>2</li>\r\n<li>4</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage ...</p>\r\n<p><strong>There are many variations of passages</strong> of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage ...</p>', 8),
(9, '<p><code>&lt;?php echo ?&gt;</code></p>\r\n<pre class="language-java"><code>8\r\ndown vote\r\nSELECT a.image_id \r\nFROM list a\r\nINNER JOIN list b\r\n   ON a.image_id = b.image_id\r\n   AND b.style_id = 25\r\n   AND b.style_value = ''big''\r\nINNER JOIN list c\r\n   ON a.image_id = c.image_id\r\n   AND c.style_id = 27\r\n   AND c.style_value = ''round''\r\nWHERE a.style_id = 24 </code></pre>\r\n<p>&nbsp;</p>\r\n<p>8down vote<br />SELECT a.image_id <br />FROM list a<br />INNER JOIN list b<br /> ON a.image_id = b.image_id<br /> AND b.style_id = 25<br /> AND b.style_value = ''big''<br />INNER JOIN list c<br /> ON a.image_id = c.image_id<br /> AND c.style_id = 27<br /> AND c.style_value = ''round''<br />WHERE a.style_id = 24</p>\r\n<p>&nbsp;</p>\r\n<p><code></code></p>', 9),
(10, '<p>testing</p>', 10),
(11, '<p><strong>max-width:800px;</strong><br /><strong> background-color: #fff;</strong><br />}</p>\r\n<p><em>.table td, .table th {</em><br /><em> padding:5px;</em><br /><em>}</em></p>\r\n<ul>\r\n<li>.table tr.is-selected {</li>\r\n<li>background: #CB356B; /* fallback for old browsers */</li>\r\n<li>background: -webkit-linear-gradient(to right, #BD3F32, #CB356B); /*\r\n<ul>\r\n<li>Chrome 10-25, Safari 5.1-6 */</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>background: linear-gradient(to right, #BD3F32, #CB356B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */</li>\r\n<li>color: #fff;<br />}</li>\r\n</ul>\r\n<ol>\r\n<li>.table tr.is-answered {</li>\r\n</ol>', 11),
(12, '<p>class="navbar-link"&gt;</p>\r\n<p><img style="border-radius: 50%; width: 30px; height: 50px;" src="style/img/zild.png" /> <span style="margin-left: 5px;"> zild</span></p>\r\n<p>&nbsp;</p>\r\n<div class="navbar-dropdown is-boxed">&nbsp;</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Settings</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<hr class="navbar-divider" />\r\n<div class="navbar-item">&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Log-Out</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 12),
(13, '<p>sfsdf</p>', 13),
(14, '<p>sfsdf</p>', 14),
(15, '<p>sfsdf</p>', 15),
(16, '<p>sfsdf</p>', 16),
(17, '<p>sfsdf</p>', 17),
(18, '<p>sfsdf</p>', 18),
(19, '<p>sfsdf</p>', 19),
(20, '', 20),
(21, '<p>asdfasf</p>', 21),
(22, '<p>asfasdf</p>', 22),
(23, '<p>asfasdf</p>', 23),
(24, '<p>asfasdf</p>', 24),
(25, '<p>asfasdf</p>', 25),
(26, '<p>asfasdf</p>', 26),
(27, '<p>asfasdf</p>', 27),
(28, '<p>asfasdf</p>', 28),
(29, '<p>asfasdf</p>', 29),
(30, '<p>asfasdf</p>', 30),
(31, '<p>asfasdf</p>', 31),
(32, '<p>asfasdf</p>', 32),
(33, '<p>asfasdf</p>', 33),
(34, '<p>asdf</p>', 34),
(35, '<p>asdf</p>', 35),
(36, '<p>asdf</p>', 36),
(37, '<p>asdf</p>', 37),
(38, '<p>asdf</p>', 38),
(39, '<p>asdf</p>', 39),
(40, '<p>asdf</p>', 40),
(41, '<p>asdf</p>', 41),
(42, '<p>asdf</p>', 42),
(43, '<p>asdfasf</p>', 43),
(44, '<p>asdfasf</p>', 44),
(45, '<p>asdfasf</p>', 45),
(46, '<p>asdfasf</p>', 46),
(47, '<p>asdfasf</p>', 47),
(48, '<p>asdfasf</p>', 48),
(49, '<p>asdf</p>', 49),
(50, '<p>asdf</p>', 50),
(51, '<p>asdf</p>', 51),
(52, '<p>test</p>', 52),
(53, '<p>test</p>', 53),
(54, '<p>test</p>', 54),
(55, '<p>test</p>', 55),
(56, '<p>start</p>', 56),
(57, '<p>har</p>', 57),
(58, '<p>asdf</p>', 58),
(59, '<p>xcvxcvxcv</p>', 59),
(60, '<p>sadfasdfasdf</p>', 60),
(61, '<p>stest</p>', 61),
(62, '<p>asdf</p>', 62),
(63, '<p>cv</p>', 63),
(64, '<p>Test</p>', 64),
(65, '<p>asdfasdf22</p>', 65),
(66, '<p>sadfsadfsd</p>', 66),
(67, '<p>test</p>', 67),
(68, '<p>test 2</p>', 68),
(69, '<p>But. A big but: Lorem Ipsum is not t the root of the problem, it just shows what''s going wrong. Chances are there wasn''t collaboration, communication, and checkpoints, there wasn''t a process agreed upon or specified with the granularity required. It''s content strategy gone awry right from the start. Forswearing the use of Lorem Ipsum wouldn''t have helped, won''t help now. It''s like saying you''re a bad designer, use less bold text, don''t use italics in every other paragraph. True enough, but that''s not all that it takes to get things back on track.</p>', 69),
(70, '<p>test</p>', 70),
(71, '<p>the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog</p>', 71),
(72, '<p>Installation of VM to support solarwinds requirements</p>\r\n<p><!-- JQUERY UI CSS</p>\r\n<p><link rel="stylesheet" href="../sengoku/style/css/jquery-ui.css">--></p>\r\n<p><!-- FONT AWESOME (CDN) --></p>', 72),
(73, '<p>There''s another question out there similar to this, but it didn''t seem to answer&nbsp;my&nbsp;question.</p>\n<p>My question is this: why am I getting back this error&nbsp;ERROR 1222 (21000): The used SELECT statements have a different number of columns&nbsp;from the following SQL</p>', 73),
(74, '<p>Lorem Ipsum:&nbsp;Usage,&nbsp;Common examples,&nbsp;Translation,&nbsp;Variants and technical information<br />Essay:&nbsp;Lorem Ipsum--when, and when not to use it<br />Plugins:<br />Content management systems (CMS):&nbsp;Joomla,&nbsp;Wordpress,&nbsp;Magento,&nbsp;Google Docs,&nbsp;Drupal<br />Editors:&nbsp;Notepad++,&nbsp;Sublime Text,&nbsp;Office suites</p>', 74),
(75, '<p>ipsum''s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero''s text doesn''t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p>', 75),
(76, '<p>Most of its text is made up from sections 1.10.32&ndash;3 of Cicero''s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum&nbsp;quia&nbsp;dolor sit amet,&nbsp;</p>', 76),
(77, '<p><em>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those</em> who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who&nbsp;loves or pursues or desires to obtain pain of itself, because it is pain, butoccasionally&nbsp;circumstances occur in which toil and pain can procure him some great&nbsp;pleasure.&nbsp;To take a trivial example, which of us ever&nbsp;undertakes&nbsp;laborious physical exercise, except to obtain some advantage from it? But who&nbsp;has any right to&nbsp;find fault&nbsp;with a man who&nbsp;chooses to enjoy a pleasure&nbsp;that has no annoying consequences, or&nbsp;one&nbsp;who&nbsp;avoids a pain&nbsp;that&nbsp;produces no&nbsp;resultant pleasure?</p>\n<p><strong>On the other hand, we denounce</strong> with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so&nbsp;blinded by desire, that they cannot foresee&nbsp;the pain and trouble that are bound to ensue; and equal&nbsp;blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil&nbsp;and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', 77);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `LogID` int(11) NOT NULL,
  `ActyID` int(11) NOT NULL,
  `LogText` text NOT NULL,
  `LogSeverityID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LogDate` datetime DEFAULT NULL,
  `LogCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LogIssue` int(11) DEFAULT NULL,
  `is_Resolved` int(11) DEFAULT '0',
  `ReferTo` int(11) DEFAULT NULL COMMENT 'Answer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`LogID`, `ActyID`, `LogText`, `LogSeverityID`, `UserID`, `LogDate`, `LogCreated`, `LogIssue`, `is_Resolved`, `ReferTo`) VALUES
(1, 1, 'Start of Activity', 2, 1, '2017-11-09 20:00:00', '2017-11-07 14:55:16', NULL, 0, 0),
(2, 2, 'Start of Activity', 1, 1, '2017-11-07 20:00:00', '2017-11-07 15:00:12', NULL, 0, 0),
(3, 2, '<p>test</p>', 1, 2, '2017-11-02 01:00:00', '2017-11-07 16:20:04', NULL, 0, 0),
(4, 2, '<p>test</p>', 2, 2, '2017-11-11 02:00:00', '2017-11-07 16:20:15', NULL, 0, 0),
(5, 2, '<p>har</p>', 1, 1, '2017-11-01 22:53:00', '2017-11-08 14:53:05', NULL, 0, 0),
(6, 2, '<p>test</p>', 2, 1, '2017-11-09 03:00:00', '2017-11-08 16:40:32', NULL, 0, 0),
(7, 2, '<p>testsss</p>', 2, 1, '2017-11-09 03:00:00', '2017-11-08 16:40:36', NULL, 0, 0),
(8, 2, '<p>testsss haha</p>', 1, 1, '2017-11-09 03:00:00', '2017-11-08 16:40:54', NULL, 0, 0),
(9, 2, '<p>testsss haha</p>', 1, 1, '2017-11-09 03:00:00', '2017-11-08 16:40:57', NULL, 0, 0),
(10, 1, '<p>test</p>', 0, 1, '2017-11-03 02:00:00', '2017-11-08 16:44:43', NULL, 0, 0),
(11, 2, '<p>&nbsp;test</p>', 0, 1, '2017-11-04 19:00:00', '2017-11-09 15:21:56', 1, 1, 0),
(12, 2, '<p>test</p>', 0, 1, '2017-11-01 01:00:00', '2017-11-09 16:01:41', 0, 0, 0),
(13, 2, '<p>test</p>', 0, 1, '2017-11-01 01:00:00', '2017-11-09 16:01:44', 1, 1, 0),
(14, 1, '<p>update the quick brown fox jumps over the lazy dog</p>', 0, 1, '2017-11-10 02:00:00', '2017-11-09 16:20:18', 0, 0, 0),
(15, 1, '<p>update the quick brown fox jumps over the lazy dog&nbsp;</p>', 1, 1, '2017-11-10 02:00:00', '2017-11-09 16:20:28', 1, 0, 0),
(16, 2, '<p>test</p>', 0, 1, '2017-11-10 20:00:00', '2017-11-10 13:33:49', 0, 0, 0),
(17, 2, '<p>test</p>', 0, 1, '2017-10-10 21:47:00', '2017-11-10 13:47:15', 1, 1, 0),
(18, 2, '<p>test</p>', 1, 1, '2017-11-11 20:00:00', '2017-11-10 14:06:27', 0, 0, 0),
(19, 2, '<p>hahaha</p>', 1, 1, '2017-11-10 20:00:00', '2017-11-10 14:06:37', 0, 0, 0),
(20, 2, '<p>test</p>', 0, 1, '2017-11-10 20:00:00', '2017-11-10 14:14:07', 0, 0, 19),
(21, 2, '<p>test</p>', 1, 1, '2017-11-10 20:00:00', '2017-11-10 14:14:50', 0, 0, 20),
(22, 2, '<p>is 16</p>', 1, 1, '2017-11-10 20:00:00', '2017-11-10 14:15:56', 0, 0, 16),
(23, 2, '<p>referring to #2</p>', 0, 1, '2017-11-10 20:00:00', '2017-11-10 14:22:30', 0, 0, 2),
(24, 2, '<p><strong>test</strong></p>', 1, 1, '2017-11-11 22:29:00', '2017-11-10 14:29:19', 0, 0, 23),
(25, 1, '<p>test hahaha</p>', 1, 1, '2017-11-11 17:00:00', '2017-11-11 07:20:44', 0, 0, 0),
(26, 2, '<p>test</p>', 1, 1, '2017-12-09 17:16:00', '2017-11-11 09:16:45', 0, 0, 0),
(27, 2, '<p>test</p>', 1, 1, '2017-11-29 17:18:00', '2017-11-11 09:18:08', 0, 0, 0),
(28, 2, '<p>test</p>', 1, 1, '2017-11-29 17:18:00', '2017-11-11 09:18:12', 0, 0, 0),
(29, 2, '<p>test</p>', 1, 1, '2017-11-29 17:18:00', '2017-11-11 09:18:13', 0, 0, 0),
(30, 2, '<p>test</p>', 1, 1, '2017-11-30 17:18:00', '2017-11-11 09:18:25', 0, 0, 0),
(31, 1, '<p>test</p>', 1, 1, '2017-10-10 17:55:00', '2017-11-11 09:55:11', 0, 0, 0),
(32, 1, '<p>test</p>', 1, 1, '2017-09-08 17:55:00', '2017-11-11 09:55:37', 0, 0, 0),
(33, 1, '<p>test</p>', 0, 1, '2017-11-17 18:44:00', '2017-11-11 10:44:32', 0, 0, 0),
(34, 1, '<p>test</p>', 0, 1, '2017-11-18 18:44:00', '2017-11-11 10:44:36', 0, 0, 0),
(35, 3, 'Start of Activity', 1, 1, '2017-11-04 19:00:00', '2017-11-11 15:15:56', NULL, 0, NULL),
(36, 3, '<p>some updates here</p>', 0, 1, '2017-11-11 20:00:00', '2017-11-11 15:16:34', 0, 1, 0),
(37, 3, '<p>test</p>', 1, 1, '2017-11-05 23:16:00', '2017-11-11 15:17:04', 0, 1, 0),
(38, 1, '<p><em>solved</em></p>', 0, 1, '2017-11-18 03:00:00', '2017-11-11 16:21:03', 0, 0, 15),
(39, 4, 'Start of Activity', 2, 1, '2017-11-12 09:00:00', '2017-11-12 02:34:34', NULL, 0, NULL),
(40, 2, '<p>this resolv</p>', 0, 1, '2017-11-12 14:00:00', '2017-11-12 03:17:56', 0, 0, 13),
(41, 2, '<p>test</p>', 0, 1, '2017-11-12 15:00:00', '2017-11-12 04:12:44', 0, 0, 40),
(42, 2, '<p>test</p>', 1, 1, '2017-11-12 15:00:00', '2017-11-12 04:13:30', 0, 1, 40),
(43, 3, '<p>some issue</p>', 2, 1, '2017-11-04 12:24:00', '2017-11-12 04:24:12', 1, 1, 0),
(44, 3, '<p>this is resolved</p>', 0, 1, '2017-11-12 14:00:00', '2017-11-12 04:26:38', 0, 1, 43),
(45, 3, '<p>this is resolved</p>', 0, 1, '2017-11-12 14:00:00', '2017-11-12 04:30:34', 0, 1, 43),
(46, 3, '<p>test</p>', 2, 1, '2017-11-12 15:00:00', '2017-11-12 04:30:53', 0, 1, 45),
(47, 3, '<p>yesss</p>', 1, 1, '2017-11-12 16:00:00', '2017-11-12 04:32:23', 0, 1, 36),
(48, 3, '<p>test</p>', 1, 1, '2017-11-12 15:00:00', '2017-11-12 04:33:41', 0, NULL, 37),
(49, 5, 'Start of Activity', 2, 1, '2017-11-18 15:00:00', '2017-11-12 04:45:04', NULL, NULL, NULL),
(50, 5, '<p>issue</p>', 1, 1, '2017-11-12 15:00:00', '2017-11-12 04:45:13', 1, 1, 0),
(51, 5, '<p>resolve issue 50</p>', 0, 1, '2017-11-12 19:00:00', '2017-11-12 15:20:29', 0, NULL, 50),
(52, 6, 'Start of Activity', 1, 1, '2017-11-12 03:00:00', '2017-11-12 15:44:03', NULL, NULL, NULL),
(53, 6, '<p>test</p>', 0, 1, '2017-11-12 02:00:00', '2017-11-12 15:44:17', 1, NULL, 0),
(54, 6, '<p>2</p>', 1, 1, '2017-11-11 02:00:00', '2017-11-12 15:50:26', 1, NULL, 0),
(55, 7, 'Start of Activity', 3, 1, '2017-11-12 03:00:00', '2017-11-12 15:51:50', NULL, 0, NULL),
(56, 7, '<p>sadfasdf</p>', 0, 1, '2017-11-12 02:00:00', '2017-11-12 15:51:59', 1, 1, 0),
(57, 7, '<p>asfasdfasdf</p>', 0, 1, '2017-11-12 02:00:00', '2017-11-12 15:52:40', 1, 1, 0),
(58, 7, '<p>sfsdfsdf</p>', 1, 1, '2017-11-12 03:00:00', '2017-11-12 15:52:49', 0, 0, 57),
(59, 7, '<p>fix</p>', 1, 1, '2017-11-12 02:00:00', '2017-11-12 15:56:09', 0, 0, 56),
(60, 7, '<p>test</p>', 0, 1, '2017-11-12 02:00:00', '2017-11-12 15:56:24', 1, 0, 0),
(61, 1, '<p>test</p>', 0, 1, '2017-11-12 02:00:00', '2017-11-12 15:59:37', 0, 0, 0),
(62, 8, 'Start of Activity', 3, 1, '2017-11-13 03:00:00', '2017-11-12 16:02:47', NULL, 0, NULL),
(63, 8, '<p>test</p>', 0, 1, '2017-11-10 02:00:00', '2017-11-12 16:02:58', 1, 0, 0),
(64, 8, '<p>asdfasdfasf</p>', 1, 1, '2017-11-13 03:00:00', '2017-11-12 16:03:05', 1, 1, 0),
(65, 8, '<p>asdfasfasdf</p>', 1, 1, '2017-11-13 02:00:00', '2017-11-12 16:03:12', 0, 0, 64),
(66, 9, 'Start of Activity', 2, 1, '2017-11-02 02:00:00', '2017-11-12 16:04:36', NULL, 0, NULL),
(67, 10, 'Start of Activity', 3, 1, '2017-11-18 02:00:00', '2017-11-12 16:13:48', NULL, 0, NULL),
(68, 10, '<p>1</p>', 0, 1, '2017-11-13 02:00:00', '2017-11-12 16:13:56', 1, 0, 0),
(69, 10, '<p>test</p>', 1, 1, '2017-11-13 03:00:00', '2017-11-12 16:14:04', 1, 0, 0),
(70, 10, '<p>test</p>', 0, 1, '2017-11-13 03:00:00', '2017-11-12 16:14:11', 0, 0, 69),
(71, 11, 'Start of Activity', 1, 1, '2017-11-13 02:00:00', '2017-11-12 16:15:11', NULL, 0, NULL),
(72, 11, '<p>1</p>', 1, 1, '2017-11-11 02:00:00', '2017-11-12 16:15:18', 1, 0, 0),
(73, 11, '<p>test</p>', 0, 1, '2017-11-13 03:00:00', '2017-11-12 16:15:32', 1, 1, 0),
(74, 11, '<p>har</p>', 0, 1, '2017-11-13 02:00:00', '2017-11-12 16:15:39', 0, 0, 73),
(75, 12, 'Start of Activity', 3, 2, '2017-11-13 02:00:00', '2017-11-12 16:22:16', NULL, 0, NULL),
(76, 13, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:28:53', NULL, 0, NULL),
(77, 14, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:28:54', NULL, 0, NULL),
(78, 15, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:28:54', NULL, 0, NULL),
(79, 16, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:28:55', NULL, 0, NULL),
(80, 17, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:28:55', NULL, 0, NULL),
(81, 18, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:29:20', NULL, 0, NULL),
(82, 19, 'Start of Activity', 3, 2, '2017-11-16 02:00:00', '2017-11-12 16:29:21', NULL, 0, NULL),
(83, 20, 'Start of Activity', 2, 1, '0000-00-00 00:00:00', '2017-11-12 16:49:12', NULL, 0, NULL),
(84, 21, 'Start of Activity', 1, 1, '2017-11-13 04:00:00', '2017-11-12 17:00:47', NULL, 0, NULL),
(85, 22, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:04:26', NULL, 0, NULL),
(86, 23, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:07:57', NULL, 0, NULL),
(87, 24, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:07:57', NULL, 0, NULL),
(88, 25, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:08:09', NULL, 0, NULL),
(89, 26, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:08:13', NULL, 0, NULL),
(90, 27, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:08:22', NULL, 0, NULL),
(91, 28, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:09:20', NULL, 0, NULL),
(92, 29, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:10:07', NULL, 0, NULL),
(93, 30, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:10:52', NULL, 0, NULL),
(94, 31, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:11:07', NULL, 0, NULL),
(95, 32, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:11:58', NULL, 0, NULL),
(96, 33, 'Start of Activity', 1, 1, '2017-11-03 03:00:00', '2017-11-12 17:12:19', NULL, 0, NULL),
(97, 34, 'Start of Activity', 2, 1, '2017-11-13 03:00:00', '2017-11-12 17:13:56', NULL, 0, NULL),
(98, 35, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:02', NULL, 0, NULL),
(99, 36, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:03', NULL, 0, NULL),
(100, 37, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:18', NULL, 0, NULL),
(101, 38, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:19', NULL, 0, NULL),
(102, 39, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:36', NULL, 0, NULL),
(103, 40, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:41', NULL, 0, NULL),
(104, 41, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:42', NULL, 0, NULL),
(105, 42, 'Start of Activity', 1, 1, '2017-11-13 03:00:00', '2017-11-12 17:14:42', NULL, 0, NULL),
(106, 43, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:15:30', NULL, 0, NULL),
(107, 44, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:15:30', NULL, 0, NULL),
(108, 45, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:15:48', NULL, 0, NULL),
(109, 46, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:16:05', NULL, 0, NULL),
(110, 47, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:16:19', NULL, 0, NULL),
(111, 48, 'Start of Activity', 2, 1, '2017-11-13 04:00:00', '2017-11-12 17:16:32', NULL, 0, NULL),
(112, 49, 'Start of Activity', 1, 1, '2017-11-13 05:00:00', '2017-11-12 17:20:38', NULL, 0, NULL),
(113, 50, 'Start of Activity', 1, 1, '2017-11-17 03:00:00', '2017-11-12 17:24:17', NULL, 0, NULL),
(114, 51, 'Start of Activity', 1, 1, '2017-11-17 03:00:00', '2017-11-12 17:25:27', NULL, 0, NULL),
(115, 52, 'Start of Activity', 3, 1, '2017-11-11 03:00:00', '2017-11-12 17:27:18', NULL, 0, NULL),
(116, 53, 'Start of Activity', 3, 1, '2017-11-11 03:00:00', '2017-11-12 17:27:57', NULL, 0, NULL),
(117, 54, 'Start of Activity', 3, 1, '2017-11-11 03:00:00', '2017-11-12 17:28:08', NULL, 0, NULL),
(118, 55, 'Start of Activity', 1, 1, '2017-11-17 04:00:00', '2017-11-12 17:28:23', NULL, 0, NULL),
(119, 55, '<p>test</p>', 0, 2, '2017-11-13 12:00:00', '2017-11-13 02:28:45', 0, 0, 0),
(120, 56, 'Start of Activity', 3, 2, '2017-11-13 14:00:00', '2017-11-13 02:32:02', NULL, 0, NULL),
(121, 57, 'Start of Activity', 1, 2, '2017-11-13 14:00:00', '2017-11-13 02:32:44', NULL, 0, NULL),
(122, 58, 'Start of Activity', 1, 2, '2017-11-13 14:00:00', '2017-11-13 02:33:20', NULL, 0, NULL),
(123, 59, 'Start of Activity', 1, 2, '2017-11-13 14:00:00', '2017-11-13 02:33:37', NULL, 0, NULL),
(124, 60, 'Start of Activity', 2, 2, '2017-11-13 14:00:00', '2017-11-13 02:34:43', NULL, 0, NULL),
(125, 61, 'Start of Activity', 0, 2, '2017-11-13 14:00:00', '2017-11-13 02:36:08', NULL, 0, NULL),
(126, 62, 'Start of Activity', 2, 2, '2017-11-13 13:00:00', '2017-11-13 03:05:07', NULL, 0, NULL),
(127, 63, 'Start of Activity', 2, 2, '2017-11-13 14:00:00', '2017-11-13 03:05:23', NULL, 0, NULL),
(128, 64, 'Start of Activity', 0, 2, '2017-11-13 14:00:00', '2017-11-13 03:24:12', NULL, 0, NULL),
(129, 65, 'Start of Activity', 0, 2, '2017-11-09 14:00:00', '2017-11-13 03:37:46', NULL, 0, NULL),
(130, 66, 'Start of Activity', 2, 2, '2017-11-13 15:00:00', '2017-11-13 03:46:48', NULL, 0, NULL),
(131, 67, 'Start of Activity', 2, 2, '2017-11-11 14:00:00', '2017-11-13 04:09:36', NULL, 0, NULL),
(132, 68, 'Start of Activity', 0, 2, '2017-11-13 15:00:00', '2017-11-13 05:14:40', NULL, 0, NULL),
(133, 68, '<p>test</p>', 0, 1, '2017-11-13 16:00:00', '2017-11-13 06:21:04', 0, 0, 0),
(134, 68, '<p>test</p>', 0, 1, '2017-11-13 16:00:00', '2017-11-13 06:21:49', 0, 0, 0),
(135, 68, '<p>test</p>', 0, 1, '2017-11-18 16:00:00', '2017-11-13 06:25:52', 0, 0, 0),
(136, 68, '<p>ssss</p>', 2, 1, '2017-11-13 16:00:00', '2017-11-13 06:26:01', 1, 0, 0),
(137, 68, '<p>asdfasdf</p>', 1, 1, '2017-11-11 14:26:00', '2017-11-13 06:26:48', 0, 0, 0),
(138, 68, '<p>asdfasdf</p>', 1, 1, '2017-11-11 14:26:00', '2017-11-13 06:26:50', 1, 0, 0),
(139, 68, '<p>asdfasdf</p>', 1, 1, '2017-11-11 14:26:00', '2017-11-13 06:27:04', 1, 1, 0),
(140, 68, '<p>test</p>', 0, 1, '2017-11-11 16:00:00', '2017-11-13 06:27:11', 0, 0, 0),
(141, 68, '<p>test</p>', 0, 1, '2017-11-11 16:00:00', '2017-11-13 06:27:14', 1, 1, 0),
(142, 68, '<p>test</p>', 0, 1, '2017-11-11 14:27:00', '2017-11-13 06:27:43', 0, 0, 141),
(143, 68, '<p>test</p>', 1, 1, '2017-11-11 16:00:00', '2017-11-13 06:28:57', 0, 0, 141),
(144, 68, '<p>test</p>', 0, 1, '2017-11-13 15:00:00', '2017-11-13 06:29:05', 0, 0, 139),
(145, 69, 'Start of Activity', 2, 2, '2017-11-13 18:00:00', '2017-11-13 06:45:20', NULL, 0, NULL),
(146, 69, '<p>some issue occured</p>', 0, 2, '2017-11-13 18:00:00', '2017-11-13 06:45:59', 1, 0, 0),
(147, 69, '<p>another issue</p>', 1, 1, '2017-11-13 18:00:00', '2017-11-13 06:46:23', 0, 0, 0),
(148, 69, '<p>issue</p>', 0, 1, '2017-11-13 18:00:00', '2017-11-13 06:46:38', 1, 1, 0),
(149, 69, '<p>resolve this issue</p>', 0, 1, '2017-11-13 19:00:00', '2017-11-13 06:46:49', 0, 0, 148),
(150, 68, '<p>har</p>', 1, 1, '2017-11-13 21:00:00', '2017-11-13 13:30:12', 0, 0, 0),
(151, 70, 'Start of Activity', 0, 1, '2017-11-14 03:00:00', '2017-11-13 16:24:44', NULL, 0, NULL),
(152, 71, 'Start of Activity', 2, 1, '2017-11-14 03:00:00', '2017-11-13 16:25:57', NULL, 0, NULL),
(153, 71, '<p>test</p>', 1, 1, '2017-11-14 04:00:00', '2017-11-13 17:09:17', 1, 0, 0),
(154, 71, '<p>haafgasdf f fsdasdf</p>', 0, 1, '2017-11-14 04:00:00', '2017-11-13 17:09:29', 0, 0, 0),
(155, 72, 'Start of Activity', 2, 1, '2017-11-14 22:00:00', '2017-11-14 12:27:36', NULL, 0, NULL),
(156, 73, 'Start of Activity', 0, 1, '2017-11-15 03:00:00', '2017-11-14 16:20:57', NULL, 0, NULL),
(157, 72, '<p>test 1</p>', 0, 1, '2017-11-15 02:00:00', '2017-11-14 16:28:56', 0, 0, 0),
(158, 72, '<p>test 1test&nbsp;</p>', 0, 1, '2017-11-15 02:00:00', '2017-11-14 16:29:00', 0, 0, 0),
(159, 74, 'Start of Activity', 0, 1, '2017-11-15 21:00:00', '2017-11-15 12:02:01', NULL, 0, NULL),
(160, 75, 'Start of Activity', 0, 1, '2017-11-15 21:00:00', '2017-11-15 12:02:44', NULL, 0, NULL),
(161, 76, 'Start of Activity', 2, 1, '2017-11-15 21:00:00', '2017-11-15 12:03:11', NULL, 0, NULL),
(162, 77, 'Start of Activity', 2, 1, '2017-11-15 21:00:00', '2017-11-15 12:03:53', NULL, 0, NULL),
(163, 72, '<p>test</p>', 1, 1, '2017-11-15 21:00:00', '2017-11-15 12:22:57', 1, 0, 0),
(164, 72, '<p>&nbsp;</p>\n<table>\n<tbody>\n<tr>\n<td class="line-content"><span class="html-tag">&lt;p <span class="html-attribute-name">class</span>="<span class="html-attribute-value">control</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;div <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-item has-dropdown is-hoverable</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;a <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-link</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;img <span class="html-attribute-name">style</span>="<span class="html-attribute-value">border-radius:50%;width:30px;height:50px</span>" <span class="html-attribute-name">src</span>="<a class="html-attribute-value html-resource-link" href="style/img/zild.png" target="_blank" rel="noopener">style/img/zild.png</a>"&gt;</span> <span class="html-tag">&lt;span <span class="html-attribute-name">style</span>="<span class="html-attribute-value">margin-left:5px;</span>"&gt;</span> zild<span class="html-tag">&lt;/span&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;/a&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;div <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-dropdown is-boxed</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;a <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-item </span>" <span class="html-attribute-name">href</span>="<a class="html-attribute-value html-external-link" href="../documentation/overview/start/" target="_blank" rel="noopener">/documentation/overview/start/</a>"&gt;</span></td>\n</tr>\n</tbody>\n</table>', 1, 1, '2017-11-15 21:00:00', '2017-11-15 12:23:32', 0, 0, 0),
(165, 72, '<table>\n<tbody>\n<tr>\n<td class="line-content"><span class="html-tag">&lt;p <span class="html-attribute-name">class</span>="<span class="html-attribute-value">control</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;div <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-item has-dropdown is-hoverable</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;a <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-link</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;img <span class="html-attribute-name">style</span>="<span class="html-attribute-value">border-radius:50%;width:30px;height:50px</span>" <span class="html-attribute-name">src</span>="<a class="html-attribute-value html-resource-link" href="style/img/zild.png" target="_blank" rel="noopener">style/img/zild.png</a>"&gt;</span> <span class="html-tag">&lt;span <span class="html-attribute-name">style</span>="<span class="html-attribute-value">margin-left:5px;</span>"&gt;</span> zild<span class="html-tag">&lt;/span&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;/a&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;div <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-dropdown is-boxed</span>"&gt;</span></td>\n</tr>\n<tr>\n<td class="line-number">&nbsp;</td>\n<td class="line-content"><span class="html-tag">&lt;a <span class="html-attribute-name">class</span>="<span class="html-attribute-value">navbar-item </span>" <span class="html-attribute-name">href</span>="<a class="html-attribute-value html-external-link" href="../documentation/overview/start/" target="_blank" rel="noopener">/documentation/overview/start/</a>"&gt;</span></td>\n</tr>\n</tbody>\n</table>', 0, 1, '2017-11-15 21:00:00', '2017-11-15 12:23:50', 1, 0, 0),
(166, 77, '<p><span style="color: #4a4a4a; font-family: BlinkMacSystemFont, -apple-system, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Fira Sans'', ''Droid Sans'', ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px; background-color: #f4f4f4;">&nbsp;how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who&nbsp;loves or pursues or desires to obtain pain of itself, because it is pain, butoccasionally&nbsp;circumstance</span></p>', 1, 1, '2017-11-15 21:00:00', '2017-11-15 12:24:56', 0, 0, 0),
(167, 75, '<p>Normal <strong>Log</strong></p>', 1, 1, '2017-11-15 22:00:00', '2017-11-15 12:49:01', 0, 0, 0),
(168, 75, '<p>sample of an&nbsp; <em>issue</em> log</p>', 2, 1, '2017-11-15 19:00:00', '2017-11-15 12:49:19', 1, 1, 0),
(169, 75, '<p>sample of&nbsp;<em>resolution&nbsp;</em>log</p>', 0, 1, '2017-11-15 22:00:00', '2017-11-15 12:49:57', 0, 0, 168),
(170, 75, '<p>test log</p>', 1, 1, '2017-11-15 22:00:00', '2017-11-15 12:50:07', 0, 0, 0),
(171, 75, '<p style="margin: 0px 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; vertical-align: baseline; clear: both; color: #242729;">The codes look simple, but I cannot remove the label from the graph. I tried a lot of solutions I found online, but most of them use Chart.js v1.x. How can I remove the dataset laels&nbsp; I tried a lot of solutions I found online, but most of them use Chart.js v1.x.</p>\n<p style="margin: 0px 0px 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial, ''Helvetica Neue'', Helvetica, sans-serif; vertical-align: baseline; clear: both; color: #242729;">&nbsp;</p>', 1, 1, '2017-11-01 20:50:00', '2017-11-15 12:50:39', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_severity`
--

CREATE TABLE `activity_severity` (
  `SeverityID` int(11) NOT NULL,
  `SeverityName` varchar(100) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_severity`
--

INSERT INTO `activity_severity` (`SeverityID`, `SeverityName`, `UserID`, `Created`) VALUES
(0, 'Low', 1, '2017-11-07 15:26:53'),
(1, 'Med', 1, '2017-11-10 14:39:41'),
(2, 'High', 1, '2017-11-07 15:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `activity_titles`
--

CREATE TABLE `activity_titles` (
  `ActyID` int(11) NOT NULL,
  `ActyTitle` varchar(100) NOT NULL,
  `is_Open` varchar(80) NOT NULL DEFAULT 'open',
  `UserID` int(11) NOT NULL,
  `SeverityID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `AreaID` int(11) NOT NULL,
  `ActyStartDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ActyPostDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_titles`
--

INSERT INTO `activity_titles` (`ActyID`, `ActyTitle`, `is_Open`, `UserID`, `SeverityID`, `CategoryID`, `AreaID`, `ActyStartDate`, `ActyPostDate`, `ModifiedDate`, `ModifiedUserID`) VALUES
(1, 'IpsumÂ is dummy text of the printing and typesetting industry. Lorem Ipsum has been the', '0', 1, 2, 1, 1, '2017-11-09 12:00:00', '2017-11-11 15:03:10', '2017-11-11 15:03:10', 1),
(2, 'Why do we use it?', '0', 1, 0, 1, 2, '2017-11-01 10:00:00', '2017-11-08 16:42:09', '2017-11-08 16:42:09', 1),
(3, '10 Open Source Calendar UI Layouts Built With CSS', '0', 1, 1, 2, 2, '2017-11-04 11:00:00', '2017-11-11 15:15:56', '2017-11-11 15:15:56', 0),
(4, 'Where can I get some?', '0', 1, 2, 1, 2, '2017-11-12 01:00:00', '2017-11-12 02:34:33', '2017-11-12 02:34:33', 0),
(5, 'test', '0', 1, 2, 1, 2, '2017-11-18 07:00:00', '2017-11-12 04:45:04', '2017-11-12 04:45:04', 0),
(6, 'Stranger Things', '0', 1, 1, 2, 2, '2017-11-11 19:00:00', '2017-11-12 15:44:03', '2017-11-12 15:44:03', 0),
(7, 'Dfasdf', '0', 1, 2, 2, 2, '2017-11-11 19:00:00', '2017-11-14 06:08:10', '2017-11-14 06:08:10', 1),
(8, 'Sakto', '0', 1, 0, 2, 2, '2017-11-12 19:00:00', '2017-11-13 16:24:26', '2017-11-13 16:24:25', 1),
(9, 'Hahaha', '0', 1, 2, 2, 2, '2017-11-01 18:00:00', '2017-11-12 16:13:09', '2017-11-12 16:13:09', 1),
(10, 'testing', '0', 1, 3, 1, 2, '2017-11-17 18:00:00', '2017-11-12 16:13:48', '2017-11-12 16:13:48', 0),
(11, 'Working', '0', 1, 2, 2, 2, '2017-11-12 18:00:00', '2017-11-12 16:20:52', '2017-11-12 16:20:52', 1),
(12, 'Hahahaha', '0', 2, 2, 2, 2, '2017-11-12 18:00:00', '2017-11-12 16:23:28', '2017-11-12 16:23:28', 2),
(13, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:28:53', '2017-11-12 16:28:53', 0),
(14, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:28:54', '2017-11-12 16:28:54', 0),
(15, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:28:54', '2017-11-12 16:28:54', 0),
(16, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:28:54', '2017-11-12 16:28:54', 0),
(17, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:28:55', '2017-11-12 16:28:55', 0),
(18, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:29:20', '2017-11-12 16:29:20', 0),
(19, 'sdfsadf', '0', 2, 3, 1, 2, '2017-11-15 18:00:00', '2017-11-12 16:29:20', '2017-11-12 16:29:20', 0),
(20, '', '0', 1, 2, 0, 0, '0000-00-00 00:00:00', '2017-11-12 16:49:12', '2017-11-12 16:49:12', 0),
(21, 'test', '0', 1, 1, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:00:47', '2017-11-12 17:00:47', 0),
(22, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:04:26', '2017-11-12 17:04:26', 0),
(23, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:07:56', '2017-11-12 17:07:56', 0),
(24, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:07:57', '2017-11-12 17:07:57', 0),
(25, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:08:08', '2017-11-12 17:08:08', 0),
(26, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:08:12', '2017-11-12 17:08:12', 0),
(27, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:08:22', '2017-11-12 17:08:22', 0),
(28, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:09:20', '2017-11-12 17:09:20', 0),
(29, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:10:06', '2017-11-12 17:10:06', 0),
(30, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:10:52', '2017-11-12 17:10:52', 0),
(31, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:11:07', '2017-11-12 17:11:07', 0),
(32, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:11:57', '2017-11-12 17:11:57', 0),
(33, 'sadfasdf', '0', 1, 1, 2, 2, '2017-11-02 19:00:00', '2017-11-12 17:12:18', '2017-11-12 17:12:18', 0),
(34, 'asdf', '0', 1, 2, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:13:56', '2017-11-12 17:13:56', 0),
(35, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:02', '2017-11-12 17:14:02', 0),
(36, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:03', '2017-11-12 17:14:03', 0),
(37, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:18', '2017-11-12 17:14:18', 0),
(38, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:19', '2017-11-12 17:14:19', 0),
(39, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:36', '2017-11-12 17:14:36', 0),
(40, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:41', '2017-11-12 17:14:41', 0),
(41, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:41', '2017-11-12 17:14:41', 0),
(42, 'asdf', '0', 1, 1, 1, 2, '2017-11-12 19:00:00', '2017-11-12 17:14:42', '2017-11-12 17:14:42', 0),
(43, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:15:29', '2017-11-12 17:15:29', 0),
(44, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:15:30', '2017-11-12 17:15:30', 0),
(45, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:15:47', '2017-11-12 17:15:47', 0),
(46, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:16:05', '2017-11-12 17:16:05', 0),
(47, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:16:19', '2017-11-12 17:16:19', 0),
(48, 'asdfasf', '0', 1, 2, 2, 2, '2017-11-12 20:00:00', '2017-11-12 17:16:31', '2017-11-12 17:16:31', 0),
(49, 'fsdf', '0', 1, 1, 2, 2, '2017-11-12 21:00:00', '2017-11-12 17:20:38', '2017-11-12 17:20:38', 0),
(50, 'asdf', '0', 1, 1, 2, 2, '2017-11-16 19:00:00', '2017-11-12 17:24:16', '2017-11-12 17:24:16', 0),
(51, 'asdf', '0', 1, 1, 2, 2, '2017-11-16 19:00:00', '2017-11-12 17:25:27', '2017-11-12 17:25:27', 0),
(52, 'Haha', '0', 1, 0, 2, 2, '2017-11-10 19:00:00', '2017-11-13 15:48:36', '2017-11-13 15:48:35', 1),
(53, 'Haha', '0', 1, 0, 2, 2, '2017-11-10 19:00:00', '2017-11-14 05:03:25', '2017-11-14 05:03:24', 1),
(54, 'haha', '0', 1, 3, 2, 2, '2017-11-10 19:00:00', '2017-11-12 17:28:07', '2017-11-12 17:28:07', 0),
(55, 'asdfasdf', '0', 1, 1, 2, 2, '2017-11-16 20:00:00', '2017-11-12 17:28:22', '2017-11-12 17:28:22', 0),
(56, 'start', '0', 2, 3, 1, 2, '2017-11-13 06:00:00', '2017-11-13 02:32:02', '2017-11-13 02:32:02', 0),
(57, 'Har', '0', 2, 2, 2, 2, '2017-11-13 06:00:00', '2017-11-13 02:33:00', '2017-11-13 02:32:59', 2),
(58, 'asdf', '0', 2, 1, 1, 2, '2017-11-13 06:00:00', '2017-11-13 02:33:19', '2017-11-13 02:33:19', 0),
(59, 'xcvxcv', '0', 2, 1, 1, 2, '2017-11-13 06:00:00', '2017-11-13 02:33:37', '2017-11-13 02:33:37', 0),
(60, 'asdf', '0', 2, 2, 1, 2, '2017-11-13 06:00:00', '2017-11-13 02:34:43', '2017-11-13 02:34:43', 0),
(61, 'test', '0', 2, 0, 1, 2, '2017-11-13 06:00:00', '2017-11-13 02:36:08', '2017-11-13 02:36:08', 0),
(62, 'asdf', '0', 2, 2, 2, 2, '2017-11-13 05:00:00', '2017-11-13 03:05:07', '2017-11-13 03:05:07', 0),
(63, 'cvcvcv', '0', 2, 2, 1, 2, '2017-11-13 06:00:00', '2017-11-13 03:05:22', '2017-11-13 03:05:22', 0),
(64, 'Zild', '0', 2, 2, 1, 1, '2017-10-31 16:00:00', '2017-11-13 05:51:20', '2017-11-13 05:51:19', 1),
(65, 'Sdfasdf22', '0', 2, 0, 1, 2, '2017-11-08 10:00:00', '2017-11-13 05:45:22', '2017-11-13 05:45:21', 1),
(66, 'ahahaha', '0', 2, 2, 2, 2, '2017-11-13 07:00:00', '2017-11-13 03:46:48', '2017-11-13 03:46:48', 0),
(67, 'test', '0', 2, 2, 1, 2, '2017-11-11 06:00:00', '2017-11-13 04:09:36', '2017-11-13 04:09:36', 0),
(68, 'Test 2', '0', 2, 2, 2, 2, '2017-11-13 07:00:00', '2017-11-13 05:50:54', '2017-11-13 05:50:54', 1),
(69, 'So Lorem Ipsum is bad ', '0', 2, 0, 1, 2, '2017-11-13 10:00:00', '2017-11-13 17:16:26', '2017-11-13 17:16:25', 1),
(70, 'test', '0', 1, 0, 1, 2, '2017-11-13 19:00:00', '2017-11-13 16:24:44', '2017-11-13 16:24:44', 0),
(71, ' the quick brown fox jumps over the lazy dog 2', '0', 1, 2, 1, 2, '2017-11-13 19:00:00', '2017-11-14 15:34:30', '2017-11-14 15:34:30', 1),
(72, 'JQUERY UI CSS JQUERY UI CSS', '0', 1, 2, 1, 2, '2017-11-14 14:00:00', '2017-11-14 16:28:26', '2017-11-14 16:28:26', 1),
(73, 'statements have a different number of columns', '0', 1, 0, 1, 2, '2017-11-14 19:00:00', '2017-11-14 16:20:57', '2017-11-14 16:20:57', 0),
(74, 'Lorem Ipsum: usage', '0', 1, 0, 1, 2, '2017-11-15 13:00:00', '2017-11-15 12:02:01', '2017-11-15 12:02:01', 0),
(75, 'Pseudo-Latin text used in web design', '0', 1, 0, 2, 2, '2017-11-15 13:00:00', '2017-11-15 12:02:44', '2017-11-15 12:02:44', 0),
(76, 'Lorem Ipsum: common examples', '0', 1, 2, 1, 2, '2017-11-15 13:00:00', '2017-11-15 12:03:11', '2017-11-15 12:03:11', 0),
(77, 'Lorem Ipsum: translation', '0', 1, 2, 1, 2, '2017-11-15 13:00:00', '2017-11-15 12:03:52', '2017-11-15 12:03:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(80) NOT NULL,
  `TagDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`, `TagDate`) VALUES
(51, 'pudge', '2017-11-15 12:00:48'),
(52, 'lem', '2017-11-15 12:00:48'),
(53, 'anna', '2017-11-15 12:00:48'),
(54, 'php', '2017-11-15 12:00:48'),
(55, 'server', '2017-11-15 12:00:48'),
(56, 'solarwinds', '2017-11-15 12:00:48'),
(60, 'pudge', '2017-11-15 12:00:48'),
(61, 'tiny', '2017-11-15 12:00:48'),
(62, 'janin', '2017-11-15 12:00:48'),
(63, 'ryan', '2017-11-15 12:00:48'),
(64, 'php', '2017-11-15 12:00:48'),
(65, 'server', '2017-11-15 12:00:48'),
(66, 'lem', '2017-11-15 12:00:48'),
(67, 'janin', '2017-11-15 12:00:48'),
(68, 'anna', '2017-11-15 12:00:48'),
(69, 'pudge', '2017-11-15 12:00:48'),
(70, 'tiny', '2017-11-15 12:00:48'),
(71, 'lem', '2017-11-15 12:00:48'),
(72, 'pudge', '2017-11-15 12:00:48'),
(73, 'tiny', '2017-11-15 12:00:48'),
(74, 'pudge', '2017-11-15 12:00:48'),
(75, 'tiny', '2017-11-15 12:00:48'),
(84, 'pudge', '2017-11-15 12:00:48'),
(85, 'tiny', '2017-11-15 12:00:48'),
(86, 'pudge', '2017-11-15 12:00:48'),
(87, 'tiny', '2017-11-15 12:00:48'),
(88, 'anna', '2017-11-15 12:00:48'),
(89, 'test', '2017-11-15 12:00:48'),
(93, 'pudge', '2017-11-15 12:00:48'),
(94, 'tiny', '2017-11-15 12:00:48'),
(95, 'anna', '2017-11-15 12:00:48'),
(99, 'pudge', '2017-11-15 12:00:48'),
(100, 'tiny', '2017-11-15 12:00:48'),
(101, 'zild', '2017-11-15 12:00:48'),
(102, 'pudge', '2017-11-15 12:00:48'),
(103, 'tiny', '2017-11-15 12:00:48'),
(104, 'pudge', '2017-11-15 12:00:48'),
(105, 'tiny', '2017-11-15 12:00:48'),
(106, 'pudge', '2017-11-15 12:00:48'),
(107, 'tiny', '2017-11-15 12:00:48'),
(108, 'pudge', '2017-11-15 12:00:48'),
(109, 'tiny', '2017-11-15 12:00:48'),
(110, 'pudge', '2017-11-15 12:00:48'),
(111, 'tiny', '2017-11-15 12:00:48'),
(112, 'pudge', '2017-11-15 12:00:48'),
(113, 'tiny', '2017-11-15 12:00:48'),
(114, 'pudge', '2017-11-15 12:00:48'),
(115, 'tiny', '2017-11-15 12:00:48'),
(116, 'pudge', '2017-11-15 12:00:48'),
(117, 'tiny', '2017-11-15 12:00:48'),
(118, 'pudge', '2017-11-15 12:00:48'),
(119, 'tiny', '2017-11-15 12:00:48'),
(120, 'anna', '2017-11-15 12:00:48'),
(121, 'pudge', '2017-11-15 12:00:48'),
(122, 'tiny', '2017-11-15 12:00:48'),
(123, 'test', '2017-11-15 12:00:48'),
(124, 'pudge', '2017-11-15 12:00:48'),
(125, 'tiny', '2017-11-15 12:00:48'),
(126, 'test', '2017-11-15 12:00:48'),
(127, 'pudge', '2017-11-15 12:00:48'),
(128, 'tiny', '2017-11-15 12:00:48'),
(129, 'test', '2017-11-15 12:00:48'),
(130, 'pudge', '2017-11-15 12:00:48'),
(131, 'tiny', '2017-11-15 12:00:48'),
(132, 'test', '2017-11-15 12:00:48'),
(133, 'ha', '2017-11-15 12:00:48'),
(134, 'pudge', '2017-11-15 12:00:48'),
(135, 'tiny', '2017-11-15 12:00:48'),
(136, 'test', '2017-11-15 12:00:48'),
(137, 'ha', '2017-11-15 12:00:48'),
(138, 'pudge', '2017-11-15 12:00:48'),
(139, 'tiny', '2017-11-15 12:00:48'),
(140, 'test', '2017-11-15 12:00:48'),
(141, 'ha', '2017-11-15 12:00:48'),
(142, 'pudge', '2017-11-15 12:00:48'),
(143, 'tiny', '2017-11-15 12:00:48'),
(144, 'test', '2017-11-15 12:00:48'),
(145, 'ha', '2017-11-15 12:00:48'),
(146, 'pudge', '2017-11-15 12:00:48'),
(147, 'tiny', '2017-11-15 12:00:48'),
(148, 'test', '2017-11-15 12:00:48'),
(149, 'ha', '2017-11-15 12:00:48'),
(150, 'pudge', '2017-11-15 12:00:48'),
(151, 'tiny', '2017-11-15 12:00:48'),
(152, 'test', '2017-11-15 12:00:48'),
(153, 'ha', '2017-11-15 12:00:48'),
(154, 'pudge', '2017-11-15 12:00:48'),
(155, 'tiny', '2017-11-15 12:00:48'),
(156, 'test', '2017-11-15 12:00:48'),
(157, 'ha', '2017-11-15 12:00:48'),
(158, 'pudge', '2017-11-15 12:00:48'),
(159, 'tiny', '2017-11-15 12:00:48'),
(160, 'test', '2017-11-15 12:00:48'),
(161, 'ha', '2017-11-15 12:00:48'),
(162, 'pudge', '2017-11-15 12:00:48'),
(163, 'tiny', '2017-11-15 12:00:48'),
(164, 'test', '2017-11-15 12:00:48'),
(165, 'ha', '2017-11-15 12:00:48'),
(166, 'pudge', '2017-11-15 12:00:48'),
(167, 'tiny', '2017-11-15 12:00:48'),
(168, 'pudge', '2017-11-15 12:00:48'),
(169, 'tiny', '2017-11-15 12:00:48'),
(170, 'test', '2017-11-15 12:00:48'),
(171, 'pudge', '2017-11-15 12:00:48'),
(172, 'tiny', '2017-11-15 12:00:48'),
(173, 'test', '2017-11-15 12:00:48'),
(174, 'pudge', '2017-11-15 12:00:48'),
(175, 'tiny', '2017-11-15 12:00:48'),
(176, 'test', '2017-11-15 12:00:48'),
(177, 'pudge', '2017-11-15 12:00:48'),
(178, 'tiny', '2017-11-15 12:00:48'),
(179, 'test', '2017-11-15 12:00:48'),
(180, 'pudge', '2017-11-15 12:00:48'),
(181, 'tiny', '2017-11-15 12:00:48'),
(182, 'test', '2017-11-15 12:00:48'),
(183, 'pudge', '2017-11-15 12:00:48'),
(184, 'tiny', '2017-11-15 12:00:48'),
(185, 'test', '2017-11-15 12:00:48'),
(186, 'pudge', '2017-11-15 12:00:48'),
(187, 'tiny', '2017-11-15 12:00:48'),
(188, 'test', '2017-11-15 12:00:48'),
(189, 'pudge', '2017-11-15 12:00:48'),
(190, 'tiny', '2017-11-15 12:00:48'),
(191, 'test', '2017-11-15 12:00:48'),
(192, 'pudge', '2017-11-15 12:00:48'),
(193, 'tiny', '2017-11-15 12:00:48'),
(194, 'pudge', '2017-11-15 12:00:48'),
(195, 'tiny', '2017-11-15 12:00:48'),
(196, 'pudge', '2017-11-15 12:00:48'),
(197, 'tiny', '2017-11-15 12:00:48'),
(198, 'pudge', '2017-11-15 12:00:48'),
(199, 'tiny', '2017-11-15 12:00:48'),
(200, 'pudge', '2017-11-15 12:00:48'),
(201, 'tiny', '2017-11-15 12:00:48'),
(202, 'pudge', '2017-11-15 12:00:48'),
(203, 'tiny', '2017-11-15 12:00:48'),
(204, 'pudge', '2017-11-15 12:00:48'),
(205, 'tiny', '2017-11-15 12:00:48'),
(206, 'test', '2017-11-15 12:00:48'),
(207, 'pudge', '2017-11-15 12:00:48'),
(208, 'tiny', '2017-11-15 12:00:48'),
(209, 'pudge', '2017-11-15 12:00:48'),
(210, 'tiny', '2017-11-15 12:00:48'),
(217, 'pudge', '2017-11-15 12:00:48'),
(218, 'tiny', '2017-11-15 12:00:48'),
(219, 'anna', '2017-11-15 12:00:48'),
(220, 'pudge', '2017-11-15 12:00:48'),
(221, 'tiny', '2017-11-15 12:00:48'),
(222, 'test', '2017-11-15 12:00:48'),
(223, 'anna', '2017-11-15 12:00:48'),
(224, 'pudge', '2017-11-15 12:00:48'),
(225, 'tiny', '2017-11-15 12:00:48'),
(226, 'zild', '2017-11-15 12:00:48'),
(233, 'pudge', '2017-11-15 12:00:48'),
(234, 'tiny', '2017-11-15 12:00:48'),
(235, 'zild', '2017-11-15 12:00:48'),
(236, 'pudge', '2017-11-15 12:00:48'),
(237, 'tiny', '2017-11-15 12:00:48'),
(238, 'zild', '2017-11-15 12:00:48'),
(239, 'pudge', '2017-11-15 12:00:48'),
(240, 'tiny', '2017-11-15 12:00:48'),
(241, 'pudge', '2017-11-15 12:00:48'),
(242, 'tiny', '2017-11-15 12:00:48'),
(243, 'pudge', '2017-11-15 12:00:48'),
(244, 'tiny', '2017-11-15 12:00:48'),
(245, 'pudge', '2017-11-15 12:00:48'),
(246, 'tiny', '2017-11-15 12:00:48'),
(247, 'pudge', '2017-11-15 12:00:48'),
(248, 'tiny', '2017-11-15 12:00:48'),
(255, 'pudge', '2017-11-15 12:00:48'),
(256, 'tiny', '2017-11-15 12:00:48'),
(257, 'anna', '2017-11-15 12:00:48'),
(258, 'pudge', '2017-11-15 12:00:48'),
(259, 'tiny', '2017-11-15 12:00:48'),
(260, 'anna', '2017-11-15 12:00:48'),
(270, 'pudge', '2017-11-15 12:00:48'),
(271, 'tiny', '2017-11-15 12:00:48'),
(272, 'anna', '2017-11-15 12:00:48'),
(277, 'pudge', '2017-11-15 12:00:48'),
(278, 'tiny', '2017-11-15 12:00:48'),
(279, 'anna', '2017-11-15 12:00:48'),
(280, 'janin', '2017-11-15 12:00:48'),
(281, 'pudge', '2017-11-15 12:00:48'),
(282, 'tiny', '2017-11-15 12:00:48'),
(283, 'zild', '2017-11-15 12:00:48'),
(284, 'janin', '2017-11-15 12:00:48'),
(295, 'pudge', '2017-11-15 12:00:48'),
(296, 'tiny', '2017-11-15 12:00:48'),
(297, 'anna', '2017-11-15 12:00:48'),
(302, 'pudge', '2017-11-15 12:00:48'),
(303, 'tiny', '2017-11-15 12:00:48'),
(304, 'lem', '2017-11-15 12:00:48'),
(305, 'haha', '2017-11-15 12:00:48'),
(306, 'pudge', '2017-11-15 12:00:48'),
(307, 'tiny', '2017-11-15 12:00:48'),
(311, 'janin', '2017-11-15 12:00:48'),
(312, 'php', '2017-11-15 12:00:48'),
(313, 'server', '2017-11-15 12:00:48'),
(314, '192.168.2.1', '2017-11-15 12:00:48'),
(315, 'zild', '2017-11-15 12:00:48'),
(316, 'pudge', '2017-11-15 12:00:48'),
(317, 'tiny', '2017-11-15 12:00:48'),
(318, 'anna', '2017-11-15 12:00:48'),
(319, 'pudge', '2017-11-15 12:00:48'),
(320, 'tiny', '2017-11-15 12:00:48'),
(324, 'pudge', '2017-11-15 12:00:48'),
(325, 'tiny', '2017-11-15 12:00:48'),
(326, 'zild', '2017-11-15 12:00:48'),
(327, 'pudge', '2017-11-15 12:00:48'),
(328, 'tiny', '2017-11-15 12:00:48'),
(329, 'janin', '2017-11-15 12:00:48'),
(330, 'ryan', '2017-11-15 12:00:48'),
(331, 'php', '2017-11-15 12:00:48'),
(332, 'test', '2017-11-15 12:00:48'),
(336, 'pudge', '2017-11-15 12:00:48'),
(337, 'tiny', '2017-11-15 12:00:48'),
(338, 'anna', '2017-11-15 12:00:48'),
(339, 'iphone', '2017-11-15 12:02:01'),
(340, 'samsung', '2017-11-15 12:02:01'),
(341, 'janin', '2017-11-15 12:02:01'),
(342, 'ubuntu', '2017-11-15 12:02:44'),
(343, 'version', '2017-11-15 12:02:44'),
(344, 'tiny', '2017-11-15 12:03:11'),
(345, 'har', '2017-11-15 12:03:11'),
(346, 'test', '2017-11-15 12:03:53'),
(347, 'zzzx', '2017-11-15 12:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tag_map`
--

CREATE TABLE `tag_map` (
  `TagMapID` int(11) NOT NULL,
  `ActyID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_map`
--

INSERT INTO `tag_map` (`TagMapID`, `ActyID`, `TagID`) VALUES
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(60, 1, 60),
(61, 1, 61),
(62, 1, 62),
(63, 1, 63),
(64, 3, 64),
(65, 3, 65),
(66, 3, 66),
(67, 3, 67),
(68, 3, 68),
(69, 4, 69),
(70, 4, 70),
(71, 4, 71),
(72, 5, 72),
(73, 5, 73),
(74, 6, 74),
(75, 6, 75),
(84, 9, 84),
(85, 9, 85),
(86, 10, 86),
(87, 10, 87),
(88, 10, 88),
(89, 10, 89),
(93, 11, 93),
(94, 11, 94),
(95, 11, 95),
(99, 12, 99),
(100, 12, 100),
(101, 12, 101),
(102, 13, 102),
(103, 13, 103),
(104, 14, 104),
(105, 14, 105),
(106, 15, 106),
(107, 15, 107),
(108, 16, 108),
(109, 16, 109),
(110, 17, 110),
(111, 17, 111),
(112, 18, 112),
(113, 18, 113),
(114, 19, 114),
(115, 19, 115),
(116, 20, 116),
(117, 20, 117),
(118, 21, 118),
(119, 21, 119),
(120, 21, 120),
(121, 22, 121),
(122, 22, 122),
(123, 22, 123),
(124, 23, 124),
(125, 23, 125),
(126, 23, 126),
(127, 24, 127),
(128, 24, 128),
(129, 24, 129),
(130, 25, 130),
(131, 25, 131),
(132, 25, 132),
(133, 25, 133),
(134, 26, 134),
(135, 26, 135),
(136, 26, 136),
(137, 26, 137),
(138, 27, 138),
(139, 27, 139),
(140, 27, 140),
(141, 27, 141),
(142, 28, 142),
(143, 28, 143),
(144, 28, 144),
(145, 28, 145),
(146, 29, 146),
(147, 29, 147),
(148, 29, 148),
(149, 29, 149),
(150, 30, 150),
(151, 30, 151),
(152, 30, 152),
(153, 30, 153),
(154, 31, 154),
(155, 31, 155),
(156, 31, 156),
(157, 31, 157),
(158, 32, 158),
(159, 32, 159),
(160, 32, 160),
(161, 32, 161),
(162, 33, 162),
(163, 33, 163),
(164, 33, 164),
(165, 33, 165),
(166, 34, 166),
(167, 34, 167),
(168, 35, 168),
(169, 35, 169),
(170, 35, 170),
(171, 36, 171),
(172, 36, 172),
(173, 36, 173),
(174, 37, 174),
(175, 37, 175),
(176, 37, 176),
(177, 38, 177),
(178, 38, 178),
(179, 38, 179),
(180, 39, 180),
(181, 39, 181),
(182, 39, 182),
(183, 40, 183),
(184, 40, 184),
(185, 40, 185),
(186, 41, 186),
(187, 41, 187),
(188, 41, 188),
(189, 42, 189),
(190, 42, 190),
(191, 42, 191),
(192, 43, 192),
(193, 43, 193),
(194, 44, 194),
(195, 44, 195),
(196, 45, 196),
(197, 45, 197),
(198, 46, 198),
(199, 46, 199),
(200, 47, 200),
(201, 47, 201),
(202, 48, 202),
(203, 48, 203),
(204, 49, 204),
(205, 49, 205),
(206, 49, 206),
(207, 50, 207),
(208, 50, 208),
(209, 51, 209),
(210, 51, 210),
(217, 54, 217),
(218, 54, 218),
(219, 54, 219),
(220, 55, 220),
(221, 55, 221),
(222, 55, 222),
(223, 55, 223),
(224, 56, 224),
(225, 56, 225),
(226, 56, 226),
(233, 57, 233),
(234, 57, 234),
(235, 57, 235),
(236, 58, 236),
(237, 58, 237),
(238, 58, 238),
(239, 59, 239),
(240, 59, 240),
(241, 60, 241),
(242, 60, 242),
(243, 61, 243),
(244, 61, 244),
(245, 62, 245),
(246, 62, 246),
(247, 63, 247),
(248, 63, 248),
(255, 66, 255),
(256, 66, 256),
(257, 66, 257),
(258, 67, 258),
(259, 67, 259),
(260, 67, 260),
(270, 65, 270),
(271, 65, 271),
(272, 65, 272),
(277, 68, 277),
(278, 68, 278),
(279, 68, 279),
(280, 68, 280),
(281, 64, 281),
(282, 64, 282),
(283, 64, 283),
(284, 64, 284),
(295, 52, 295),
(296, 52, 296),
(297, 52, 297),
(302, 8, 302),
(303, 8, 303),
(304, 8, 304),
(305, 8, 305),
(306, 70, 306),
(307, 70, 307),
(311, 69, 311),
(312, 69, 312),
(313, 69, 313),
(314, 69, 314),
(315, 69, 315),
(316, 53, 316),
(317, 53, 317),
(318, 53, 318),
(319, 7, 319),
(320, 7, 320),
(324, 71, 324),
(325, 71, 325),
(326, 71, 326),
(327, 73, 327),
(328, 73, 328),
(329, 73, 329),
(330, 73, 330),
(331, 73, 331),
(332, 73, 332),
(336, 72, 336),
(337, 72, 337),
(338, 72, 338),
(339, 74, 339),
(340, 74, 340),
(341, 74, 341),
(342, 75, 342),
(343, 75, 343),
(344, 76, 344),
(345, 76, 345),
(346, 77, 346),
(347, 77, 347);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Team` varchar(80) NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastLogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Team`, `isAdmin`, `Created`, `LastLogin`) VALUES
(1, 'zild', 'zild', 'ssa', 1, '2017-11-07 14:53:22', '2017-11-15 14:10:02'),
(2, 'anna', 'anna', 'ssd', 0, '2017-11-07 14:53:22', '2017-11-15 14:10:12'),
(3, 'lem', 'lem', 'ssa', 0, '2017-11-07 14:53:22', '0000-00-00 00:00:00'),
(4, 'janin', 'janin', 'ssd', 0, '2017-11-07 14:53:22', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_area`
--
ALTER TABLE `activity_area`
  ADD PRIMARY KEY (`AreaID`);

--
-- Indexes for table `activity_category`
--
ALTER TABLE `activity_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `activity_details`
--
ALTER TABLE `activity_details`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `activity_severity`
--
ALTER TABLE `activity_severity`
  ADD PRIMARY KEY (`SeverityID`);

--
-- Indexes for table `activity_titles`
--
ALTER TABLE `activity_titles`
  ADD PRIMARY KEY (`ActyID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `tag_map`
--
ALTER TABLE `tag_map`
  ADD PRIMARY KEY (`TagMapID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_area`
--
ALTER TABLE `activity_area`
  MODIFY `AreaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `activity_category`
--
ALTER TABLE `activity_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `activity_details`
--
ALTER TABLE `activity_details`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT for table `activity_severity`
--
ALTER TABLE `activity_severity`
  MODIFY `SeverityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `activity_titles`
--
ALTER TABLE `activity_titles`
  MODIFY `ActyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT for table `tag_map`
--
ALTER TABLE `tag_map`
  MODIFY `TagMapID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
