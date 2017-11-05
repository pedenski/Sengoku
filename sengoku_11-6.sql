-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 05:23 PM
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
(1, 'Armoury', 'Armoury', 1, '2017-11-02 09:26:35'),
(2, 'Hatchery', 'Hatchery Stuff', 1, '2017-11-02 09:26:48'),
(3, 'Butchery', 'Butchery Stuff', 1, '2017-11-02 09:27:06'),
(4, 'Foundry', 'Foundry Stuff', 1, '2017-11-02 09:27:13');

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
(1, 'Optimization', 'Opti', 'Lorem ipsum dulum', 1, '2017-11-02 09:19:47'),
(2, 'Corrective', 'Corr', 'Lorem ipsum dulum', 1, '2017-11-02 09:20:00'),
(3, 'Preventive', 'Prev', 'Lorem ipsum dulum', 1, '2017-11-02 09:20:11'),
(4, 'Deployment', 'Deploy', 'Lorem ipsum dulum', 1, '2017-11-02 09:20:20'),
(5, 'Support', 'Supp', 'Lorem ipsum dulum', 1, '2017-11-02 09:20:32');

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
(48, '<p>test</p>', 94),
(49, '<p>us mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum&nbsp;felis venenatisefficitur. Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, faci</p>', 95),
(50, '<p><strong>Lorem ipsum dolor sit a</strong>met, consectetur adipiscing elit.&nbsp;Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum&nbsp;felis venenatis</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum&nbsp;felis venenati</p>', 96),
(51, '<p>Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.</p>', 97),
(52, '<p>Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.</p>', 98),
(53, '', 99),
(54, '<p>Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum&nbsp;felis venenatisefficitur. Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.</p>', 100),
(55, '<p>test</p>', 101),
(56, '', 102),
(57, '<p>que risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum&nbsp;felis venenatisefficitur. Aenean ac&nbsp;eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facili</p>', 103),
(58, '', 104),
(59, '<p>sdf</p>', 105),
(60, '<p>sdf</p>', 106),
(61, '<p>I am trying to search for multiple strings within a larger string and if none of them are a match, manipulate the original string. Here is the code:</p>\n<pre class="language-php"><code>$searchthis = ''this is a string''\n$arr = array(''foo'', ''bar'');\nforeach ($arr as &amp;$value) {\n  if (strpos($searchthis, $value) !== false) {\n    break;\n  }\n  else{\n    $searchthis = $searchthis . '' addthis'';\n  }\n}</code></pre>\n<p>I am trying to search for multiple strings within a larger string and if none of them are a match, manipulate the original string. Here is the code:</p>', 107),
(62, '<pre class="language-markup"><code>&lt;script src="//code.jquery.com/jquery-3.2.1.min.js"&gt;&lt;/script&gt;\n&lt;script src="//code.jboxcdn.com/0.4.9/jBox.min.js"&gt;&lt;/script&gt;\n&lt;link href="//code.jboxcdn.com/0.4.9/jBox.css" rel="stylesheet"&gt;</code></pre>\n<p>Please use the&nbsp;jBox CDN&nbsp;(code.jboxcdn.com) only for development and testing. For production, I recommend to save the files on your own server.</p>\n<p>jBox is also available on&nbsp;npm:&nbsp;npm install jbox</p>', 108),
(63, '<p>test</p>', 109),
(64, '<p>test</p>', 110),
(65, '<p>test</p>', 111),
(66, '<p>testtest</p>', 112),
(67, '<p>Oh, there she goes again<br />Every morning it''s the same<br />You walk on by my house<br />I wanna call out your name</p>\n<p>I wanna tell you how beautiful you are from where I''m standing<br />You got me thinking what we could be ''cause...</p>\n<p>I keep craving, craving<br />You don''t know it but it''s true<br />Can''t get my mouth to say the words they wanna say to you<br />This is typical of love<br />Can''t wait anymore, I won''t wait<br />I need to tell you how I feel when I see us together forever</p>\n<p>In my dreams you''re with me<br />We''ll be everything I want us to be<br />And from there&mdash;who knows?<br />Maybe this will be the night that we kiss for the first time<br />Or is that just me and my imagination?</p>\n<p>We walk, we laugh, we spend our time<br />Walking by the ocean side<br />Our hands are gently intertwined<br />A feeling I just can''t describe<br />All this time we spent alone<br />Thinking we could not belong<br />To something so damn beautiful<br />So damn beautiful</p>\n<p>I keep craving, craving, you don''t know it, but it''s true<br />Can''t get my mouth to say the words they wanna say to you<br />This is typical of love<br />Can''t wait anymore, I won''t wait<br />I need to tell you how I feel when I see us together forever</p>\n<p>In my dreams you''re with me<br />We''ll be everything I want us to be<br />And from there&mdash;who knows?<br />Maybe this will be the night that we kiss for the first time<br />Or is that just me and my imagination?</p>\n<p>Whoa, whoa, whoa<br />Imagination<br />Whoa, whoa, whoa<br />Imagination<br />Whoa, whoa, whoa</p>\n<p>In my dreams you''re with me<br />We''ll be everything I want us to be<br />And from there&mdash;who knows?<br />Maybe this will be the night that we kiss for the first time<br />Or is that just me and my imagination?</p>\n<p>I keep craving, craving<br />You don''t know it, but it''s true<br />Can''t get my mouth to say the words they wanna say to you</p>', 113),
(68, '<p>The&nbsp;switch&nbsp;statement is similar to a series of IF statements on the same expression. In many occasions, you may want to compare the same variable (or expression) with many different values, and execute a different piece of code depending on which value it equals to. This is exactly what the&nbsp;switch&nbsp;statement is for.</p>\n<pre class="language-markup"><code>Note: Note that unlike some other languages, the continue statement applies to switch and acts similar to break. If you have a switch inside a loop and wish to continue to the next iteration of the outer loop, use continue 2.</code></pre>\n<p>It is important to understand how the&nbsp;switch&nbsp;statement is executed in order to avoid mistakes. The&nbsp;switchstatement executes line by line (actually, statement by statement). In the beginning, no code is executed. Only when a&nbsp;case&nbsp;statement is found whose expression evaluates to a value that matches the value of the&nbsp;switchexpression does PHP begin to execute the statements. PHP continues to execute the statements until the end of the&nbsp;switch&nbsp;block, or the first time it sees a&nbsp;break&nbsp;statement. If you don''t write a&nbsp;break&nbsp;statement at the end of a case''s statement list, PHP will go on executing the statements of the following case. For example:</p>', 114),
(69, '<p>Whenever you want to start a new line, you can close a&nbsp;columns&nbsp;container and start a new one. But you can also add the&nbsp;is-multiline&nbsp;modifier and add&nbsp;morecolumn elements that would fit in a </p><p>single row.</p><p><br data-mce-bogus="1"></p><pre class="language-markup" contenteditable="false"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>columns is-multiline is-mobile<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-half<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-half<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column is-one-quarter<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>is-one-quarter<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>column<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>\n    Auto\n  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>\n<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span></pre>', 115),
(70, '<p>The&nbsp;switch&nbsp;statement is similar to a series of IF statements on the same expression. In many occasions, you may want to compare the same variable (or expression) with many different values, and execute a different piece of code depending on which value it equals to. This is exactly what the&nbsp;switch&nbsp;statement is for.</p>\n<p>Note: Note that unlike some other languages, the continue statement applies to switch and acts similar to break. If you have a switch inside a loop and wish to continue to the next iteration of the outer loop, use continue 2.<br />It is important to understand how the&nbsp;switch&nbsp;statement is executed in order to avoid mistakes. The&nbsp;switchstatement executes line by line (actually, statement by statement). In the beginning, no code is executed. Only when a&nbsp;case&nbsp;statement is found whose expression evaluates to a value that matches the value of the&nbsp;switchexpression does PHP begin to execute the statements. PHP continues to execute the statements until the end of the&nbsp;switch&nbsp;block, or the first time it sees a&nbsp;break&nbsp;statement. If you don''t write a&nbsp;break&nbsp;statement at the end of a case''s statement list, PHP will go on executing the statements of the following case. For example:</p>', 116),
(71, '<p>I realize this question is quite old but is there a reason that no answer has been accepted on this thread? Rocket Hazmat has the correct answer with the PHP date function, which takes the format and timestamp and gives a readable string of the date. If this is what you are looking for please mark it as accepted, or specify further in your question.&nbsp;&ndash;&nbsp;Jake&nbsp;Dec 3 ''</p>', 117),
(72, '<p>Turn on the record player And drop that 45 Little thing I wanna say it Baby you blow my mind I hope to meet you later When we step out tonight Other girls are overrated But baby you''re so fine And I can see that I want you I''ll be your soldier On a mission for you Any day without you Makes my heart feel so sorry Baby don''t worry, worry, girl As true as the stardust in your eyes There''s only one way to paradise Stuck in my mind like my favourite song You keep me dancing, dancing, dancing Till the lights come on x4 You see the man before you He''ll give you everything I''m standin in your corner Fight for ya always (win/will)</p>', 118),
(73, '<p>tetetetetetetetettetetetetetetetettetetetetetetetettetetetetetetetettetetetetetetetettetetetetetetetettetetetetetetetet</p>', 119),
(74, '<p>test</p>', 120),
(75, '<p>Oh-oh, ooh<br />You''ve been runnin'' round, runnin'' round, runnin'' round throwin'' that dirt all on my name<br />''Cause you knew that I, knew that I, knew that I''d call you up<br />You''ve been going round, going round, going round every party in L.A.<br />''Cause you knew that I, knew that I, knew that I''d be at one, oh<br />I know that dress is karma, perfume regret<br />You got me thinking ''bout when you were mine, oh<br />And now I''m all up on ya, what you expect?<br />But you''re not coming home with me tonight<br />You just want attention, you don''t want my heart<br />Maybe you just hate the thought of me with someone new<br />Yeah, you just want attention, I knew from the start<br />You''re just making sure I''m never gettin'' over you<br />you''ve been runnin'' round, runnin'' round, runnin'' round throwing that dirt all on my name<br />''Cause you knew that I, knew that I, knew that I''d call you up<br />Baby, now that we''re, now that we''re, now that we''re right here standing face-to-face<br />You already know, already know, already know that you won, oh<br />I know that dress is karma (dress is karma), perfume regret<br />You got me thinking ''bout when you were mine (you got me thinking ''bout when you were mine)<br />And now I''m all up on ya (all up on ya), what you expect? (oh baby)<br />But you''re not coming home with me tonight (oh no)<br />You just want attention, you don''t want my heart<br />Maybe you just hate the thought of me with someone new<br />Yeah, you just want attention, I knew from the start<br />You''re just making sure I''m never gettin'' over you, oh<br />What are you doin'' to me, what are you doin'', huh?<br />(What are you doin''?)<br />What are you doin'' to me, what are you doin'', huh?<br />(What are you doin''?)<br />What are you doin'' to me, what are you doin'', huh?<br />(What are you doin''?)<br />What are you doin'' to me, what are you doin'', huh?<br />I know that dress is karma, perfume regret<br />You got me thinking ''bout when you were mine<br />And now I''m all up on ya, what you expect?<br />But you''re not coming home with me tonight<br />You just want attention, you don''t want my heart<br />Maybe you just hate the thought of me with someone new<br />Yeah, you just want attention, I knew from the start<br />You''re just making sure I''m never gettin'' over you (over you)<br />What are you doin'' to me? (hey) what are you doin'', huh? (what are you doin'', what?)<br />What are you doin'', huh? (what are you doin'' to me?)&nbsp;<br />(What are you doin'', huh?) (yeah, you just want attention)<br />What are you doin'' to me, what are you doin'', huh? (I knew from the start)<br />(You''re just making sure I''m never gettin'' over you) what are you doin'' to me, what are you doin'', huh?<br />Oh, oh</p>', 121),
(76, '<p>The 2017&nbsp;Overwatch&nbsp;World Cup finals saw reigning champions South Korea take on Canada, the mighty titan versus the underdog. There was cheers, excitement, and one very polite signholder in the crowd.</p>\n<p>South Korea&rsquo;s upcoming&nbsp;Overwatch&nbsp;League team is called the Seoul Dynasty for a reason: the region&rsquo;s dominance in many esports also extends to&nbsp;Overwatch, as many of the world&rsquo;s best hail from South Korea. Canada, meanwhile, had become a home crowd favorite after South Korea eliminated the US in the first round.</p>', 122),
(77, ' \n            <small>[Reason for edit]:</small>\n\n          <p>The 2017Â OverwatchÂ World Cup finals saw reigning champions South Korea take on Canada, the mighty titan versus the underdog. There was cheers, excitement, and one very polite signholder in the crowd.</p>\n<p>South Koreaâ€™s upcomingÂ OverwatchÂ League team is called the Seoul Dynasty for a reason: the regionâ€™s dominance in many esports also extends toÂ Overwatch, as many of the worldâ€™s best hail from South Korea. Canada, meanwhile, had become a home crowd favorite after South Korea eliminated the US in the first round.</p>    \n        ', 123),
(78, ' \n            <small>[Reason for edit]:</small>\n\n          <p>The 2017Â OverwatchÂ World Cup finals saw reigning champions South Korea take on Canada, the mighty titan versus the underdog. There was cheers, excitement, and one very polite signholder in the crowd.</p>\n<p>South Koreaâ€™s upcomingÂ OverwatchÂ League team is called the Seoul Dynasty for a reason: the regionâ€™s dominance in many esports also extends toÂ Overwatch, as many of the worldâ€™s best hail from South Korea. Canada, meanwhile, had become a home crowd favorite after South Korea eliminated the US in the first round.</p>    \n        ', 124),
(79, '<p><br /> public function Severity_Status($SeverityID)<br /> {<br /> switch($SeverityID){<br /> case 1:<br /> return "is-success";<br /> break;<br /> case 2:<br /> return "is-warning";<br /> break;<br /> case 3:<br /> return "is-danger";<br /> break;</p>\n<p>}<br /> }</p>', 125),
(80, '<p>test</p>', 126),
(81, '<p>test2</p>', 127),
(82, '<p>hahah</p>', 128),
(83, '<p>hahahaha</p>', 129),
(84, '<p>czxczxczxczxc</p>', 130),
(85, '<p>cvcvcvcv</p>', 131),
(86, '<p>bvbvbv</p>', 132),
(87, '<p>test</p>', 133),
(88, ' \n            <small>[Reason for edit]:</small>\n\n          <p>test</p>    \n        ', 134),
(89, ' \n            <small>[Reason for edit]:</small>\n\n          <p>test</p>    \n        ', 135),
(90, ' \n            <small>[Reason for edit]:</small>\n\n          <p>test</p>    \n        ', 136),
(91, ' \n            <small>[Reason for edit]:</small>\n\n          <p>test</p>    \n        ', 137),
(92, '<p>cvcvcvcv</p>', 138);

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
  `LogCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`LogID`, `ActyID`, `LogText`, `LogSeverityID`, `UserID`, `LogDate`, `LogCreated`) VALUES
(1, 111, 'Start of Activity', 0, 1, '2017-11-09 12:50:00', '2017-11-04 04:51:46'),
(2, 112, 'Start of Activity', 0, 1, '2020-11-09 15:00:00', '2017-11-04 04:52:30'),
(3, 113, 'Start of Activity', 1, 1, '2017-11-04 16:00:00', '2017-11-04 05:52:33'),
(4, 114, 'Start of Activity', 3, 1, '2017-11-01 14:00:00', '2017-11-04 06:20:23'),
(5, 115, 'Start of Activity', 2, 1, '2017-11-07 17:00:00', '2017-11-04 06:26:26'),
(6, 116, 'Start of Activity', 2, 1, '2017-11-09 16:00:00', '2017-11-04 06:31:21'),
(7, 116, '&lt;p&gt;test&lt;/p&gt;', 1, 1, '2017-11-03 17:00:00', '2017-11-04 07:29:15'),
(8, 116, '&lt;p&gt;hahah&lt;/p&gt;', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:29:29'),
(9, 116, '&lt;p&gt;test&lt;/p&gt;', 2, 1, '0000-00-00 00:00:00', '2017-11-04 07:29:36'),
(10, 116, '&lt;p&gt;hahahaha&lt;/p&gt;', 3, 1, '2017-11-04 16:00:00', '2017-11-04 07:29:43'),
(11, 116, '&lt;p&gt;&lt;strong&gt;tests&lt;/strong&gt;&lt;/p&gt;', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:30:05'),
(12, 116, '&lt;p&gt;&lt;span style=&quot;color: #4a4a4a; font-family: BlinkMacSystemFont, -apple-system, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Fira Sans'', ''Droid Sans'', ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;Note: Note that unlike some other languages, the continue statement applies to switch and acts similar to break. If you have a switch inside&amp;nbsp;&lt;/span&gt;&lt;/p&gt;', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:30:28'),
(13, 115, '&lt;p&gt;test&lt;/p&gt;', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:30:45'),
(14, 116, '<p>hahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:31:31'),
(15, 116, '<p><strong>Test</strong></p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:31:38'),
(16, 116, '<pre class="language-markup"><code>&lt;?php echo test; ?&gt;</code></pre>\n<p>hahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 07:32:59'),
(17, 116, '', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:27:01'),
(18, 116, '<p>sfsf</p>', 3, 1, '2017-11-02 20:00:00', '2017-11-04 11:27:06'),
(19, 116, '<p>haha</p>', 3, 1, '2017-11-02 20:00:00', '2017-11-04 11:28:04'),
(20, 116, '<p>hahaha</p>', 2, 1, '0000-00-00 00:00:00', '2017-11-04 11:28:31'),
(21, 116, '<p>hahaha</p>', 2, 1, '2017-11-09 19:00:00', '2017-11-04 11:28:34'),
(22, 116, '<p>hahaha</p>', 2, 1, '2017-11-09 19:00:00', '2017-11-04 11:28:35'),
(23, 116, '<p>323</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:30:41'),
(24, 116, '<p>hahah</p>', 1, 1, '2017-11-10 21:00:00', '2017-11-04 11:33:30'),
(25, 116, '<p>hahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:33:45'),
(26, 116, '<p>123</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:33:51'),
(27, 116, '<p>hahah323232</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:34:26'),
(28, 116, '<p>cxvxcvx</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:34:36'),
(29, 116, '<p>bvbv3434</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:34:50'),
(30, 116, '<p>atte</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:35:49'),
(31, 116, '<p>ayyyy</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:35:53'),
(32, 116, '<p>maroon5</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:43:23'),
(33, 116, '<p>maroon5</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:44:00'),
(34, 116, '<p>afd</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:44:04'),
(35, 116, '<p>addd</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:44:41'),
(36, 116, '<p>dffdf</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:45:11'),
(37, 116, '<p>hahahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:45:56'),
(38, 116, '<p>hahahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:46:10'),
(39, 116, '<p>sdfsdf</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:46:44'),
(40, 116, '<p>sdfsdf</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:47:37'),
(41, 117, 'Start of Activity', 2, 1, '2017-11-30 19:47:00', '2017-11-04 11:48:02'),
(42, 117, '<p>hahaha</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:48:16'),
(43, 117, '<p>hahahafdfd</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:48:44'),
(44, 117, '<p>232</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:48:49'),
(45, 117, '<p>vc</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:48:56'),
(46, 117, '', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:49:42'),
(47, 117, '<p>df</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:49:44'),
(48, 117, '<p>dfd</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:51:17'),
(49, 117, '<p>cvcv</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:51:29'),
(50, 117, '<p>test</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:52:13'),
(51, 117, '<p>test</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:52:35'),
(52, 117, '<p>test</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:53:27'),
(53, 117, '<p>test</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:54:32'),
(54, 117, '<p>sdf</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:55:28'),
(55, 117, '<p>sdf</p>', 1, 1, '2017-11-02 19:55:00', '2017-11-04 11:55:31'),
(56, 117, '<p>cv</p>', 1, 1, '2017-11-03 19:55:00', '2017-11-04 11:55:38'),
(57, 117, '<p>dfdf</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:56:08'),
(58, 117, '<p>test</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:56:22'),
(59, 117, '<p>cvcvc</p>', 1, 1, '0000-00-00 00:00:00', '2017-11-04 11:56:41'),
(60, 117, '<p>dancing dancing</p>', 2, 1, '2017-11-10 19:57:00', '2017-11-04 11:58:00'),
(61, 118, 'Start of Activity', 2, 1, '2017-11-25 21:00:00', '2017-11-04 11:59:21'),
(62, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes There''s only one way to paradise Stuck in my mind like my favourite song You keep me dancing, dancing, dancing</span></p>', 1, 1, '2017-11-04 21:00:00', '2017-11-04 11:59:37'),
(63, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-24 21:00:00', '2017-11-04 11:59:49'),
(64, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-02 18:00:00', '2017-11-04 11:59:58'),
(65, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-04 20:00:00', '2017-11-04 12:00:14'),
(66, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-04 20:02:00', '2017-11-04 12:00:21'),
(67, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-04 20:02:00', '2017-11-04 12:00:31'),
(68, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 2, 1, '2017-11-04 20:02:00', '2017-11-04 12:00:33'),
(69, 118, '<p><span style="color: #2c3e50; font-family: -apple-system, BlinkMacSystemFont, ''Segoe UI'', Roboto, Oxygen, Ubuntu, Cantarell, ''Open Sans'', ''Helvetica Neue'', sans-serif; font-size: 18px; white-space: pre-wrap;">As true as the stardust in your eyes </span></p>', 3, 1, '2017-11-04 20:02:00', '2017-11-04 12:00:45'),
(70, 114, '<p>test</p>', 1, 1, '2017-10-31 22:00:00', '2017-11-04 12:02:11'),
(71, 118, '<p>gar</p>', 2, 1, '2017-11-04 22:00:00', '2017-11-04 12:02:45'),
(72, 119, 'Start of Activity', 2, 1, '2017-11-16 20:22:00', '2017-11-04 12:22:14'),
(73, 118, '<p>berverly</p>', 1, 1, '2017-11-07 20:00:00', '2017-11-04 12:30:30'),
(74, 120, 'Start of Activity', 1, 1, '2017-11-24 20:00:00', '2017-11-04 12:31:09'),
(75, 119, '<p>test</p>', 1, 1, '2017-11-03 20:00:00', '2017-11-04 15:29:23'),
(76, 119, '<p>test</p>', 2, 1, '2017-11-16 20:00:00', '2017-11-04 15:29:45'),
(77, 119, '<p>hahaha</p>', 2, 1, '2017-11-10 20:00:00', '2017-11-04 15:30:05'),
(78, 118, '<p>test</p>', 2, 1, '2017-07-05 11:00:00', '2017-11-05 01:36:52'),
(79, 121, 'Start of Activity', 3, 1, '2017-11-05 13:10:00', '2017-11-05 05:10:47'),
(80, 122, 'Start of Activity', 1, 1, '2017-11-05 13:00:00', '2017-11-05 05:23:52'),
(81, 123, 'Start of Activity', 2, 1, '2017-11-05 13:00:00', '2017-11-05 05:25:30'),
(82, 124, 'Start of Activity', 2, 1, '2017-11-05 13:00:00', '2017-11-05 05:25:39'),
(83, 122, '<p>test</p>', 2, 1, '2017-11-11 15:00:00', '2017-11-05 05:28:30'),
(84, 122, '<p>the quick brown fox</p>', 2, 1, '2017-11-10 13:29:00', '2017-11-05 05:29:23'),
(85, 125, 'Start of Activity', 3, 1, '2017-11-05 23:00:00', '2017-11-05 14:50:52'),
(86, 126, 'Start of Activity', 3, 1, '2017-11-05 23:00:00', '2017-11-05 14:53:21'),
(87, 127, 'Start of Activity', 3, 1, '2017-11-05 23:00:00', '2017-11-05 14:54:33'),
(88, 128, 'Start of Activity', 2, 1, '2017-11-08 23:34:00', '2017-11-05 15:34:56'),
(89, 129, 'Start of Activity', 2, 1, '2017-11-08 02:00:00', '2017-11-05 15:36:55'),
(90, 130, 'Start of Activity', 2, 1, '2017-11-17 02:00:00', '2017-11-05 15:45:39'),
(91, 131, 'Start of Activity', 1, 1, '2017-11-07 01:00:00', '2017-11-05 15:46:19'),
(92, 132, 'Start of Activity', 2, 1, '2017-11-07 02:00:00', '2017-11-05 15:50:58'),
(93, 133, 'Start of Activity', 1, 1, '2017-11-14 03:00:00', '2017-11-05 15:53:09'),
(94, 134, 'Start of Activity', 2, 1, '2017-11-14 03:00:00', '2017-11-05 15:54:51'),
(95, 135, 'Start of Activity', 2, 1, '2017-11-14 03:00:00', '2017-11-05 15:55:25'),
(96, 136, 'Start of Activity', 2, 1, '2017-11-14 03:00:00', '2017-11-05 15:55:27'),
(97, 137, 'Start of Activity', 2, 1, '2017-11-14 03:00:00', '2017-11-05 15:55:27'),
(98, 138, 'Start of Activity', 2, 1, '2017-10-31 01:00:00', '2017-11-05 15:58:56');

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
(1, 'Low', 1, '2017-10-30 15:16:37'),
(2, 'Med', 1, '2017-11-04 11:01:02'),
(3, 'High', 1, '2017-10-30 15:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `activity_titles`
--

CREATE TABLE `activity_titles` (
  `ActyID` int(11) NOT NULL,
  `ActyTitle` varchar(100) NOT NULL,
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

INSERT INTO `activity_titles` (`ActyID`, `ActyTitle`, `UserID`, `SeverityID`, `CategoryID`, `AreaID`, `ActyStartDate`, `ActyPostDate`, `ModifiedDate`, `ModifiedUserID`) VALUES
(94, 'The quick Brown Fox', 1, 2, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(95, 'Lorem ipsum dolor sit amet, consectetur adipiscing eli', 1, 2, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(96, 'facilisis sodales sem.', 1, 1, 3, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(97, 'Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor ur', 1, 3, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(98, 'Aenean ac eleifend lacus, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor ur', 1, 3, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(99, '  &lt;div class=&quot;level-item&quot;&gt;           &lt;div class=&quot;Divider&quot;&gt;&lt;/div&g', 1, 2, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(100, 'Pellentesque risus mi, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet f', 1, 2, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(101, 'Pellentesque risus mi, tempus ', 1, 3, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(102, 'Test', 1, 3, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(103, 'sollicitudin porttitor, t', 1, 3, 1, 0, '2017-11-02 09:31:02', '2017-11-02 09:29:14', '2017-11-05 14:49:43', 0),
(104, '', 1, 2, 0, 0, '0000-00-00 00:00:00', '2017-11-03 14:10:14', '2017-11-05 14:49:43', 0),
(105, 'sdf', 1, 2, 0, 0, '2017-11-02 14:10:00', '2017-11-03 14:10:39', '2017-11-05 14:49:43', 0),
(106, 'sdf', 1, 0, 1, 4, '2017-11-09 18:00:00', '2017-11-03 16:29:16', '2017-11-05 14:49:43', 0),
(107, 'PHP Loop to search for string, execute if no match', 1, 0, 2, 4, '2017-11-03 19:00:00', '2017-11-03 16:31:07', '2017-11-05 14:49:43', 0),
(108, 'Piece of cake: Include jQuery, jBox.min.js and jBox.css. Ready to rock &amp; roll!', 1, 0, 2, 4, '2017-11-16 20:00:00', '2017-11-03 16:51:29', '2017-11-05 14:49:43', 0),
(109, 'test', 1, 0, 2, 4, '2017-11-09 04:50:00', '2017-11-04 04:50:24', '2017-11-05 14:49:43', 0),
(110, 'test', 1, 0, 2, 4, '2017-11-09 04:50:00', '2017-11-04 04:51:11', '2017-11-05 14:49:43', 0),
(111, 'test', 1, 0, 2, 4, '2017-11-09 04:50:00', '2017-11-04 04:51:46', '2017-11-05 14:49:43', 0),
(112, 'testtest', 1, 0, 2, 4, '2020-11-09 07:00:00', '2017-11-04 04:52:30', '2017-11-05 14:49:43', 0),
(113, 'Package Control', 1, 1, 2, 3, '2017-11-04 08:00:00', '2017-11-04 05:52:33', '2017-11-05 14:49:43', 0),
(114, 'switch ', 1, 3, 3, 3, '2017-11-01 06:00:00', '2017-11-04 06:20:22', '2017-11-05 14:49:43', 0),
(115, 'Column options', 1, 2, 2, 4, '2017-11-07 09:00:00', '2017-11-04 06:26:25', '2017-11-05 14:49:43', 0),
(116, 'TheÂ switchÂ statement is similar to a series of IF statements on', 1, 2, 2, 3, '2017-11-09 08:00:00', '2017-11-04 06:31:20', '2017-11-05 14:49:43', 0),
(117, 'Convert timestamp to readable date/time PHP', 1, 2, 3, 4, '2017-11-30 11:47:00', '2017-11-04 11:48:02', '2017-11-05 14:49:43', 0),
(118, 'Til The Lights Come On', 1, 2, 4, 4, '2017-11-25 13:00:00', '2017-11-04 11:59:21', '2017-11-05 14:49:43', 0),
(119, 'tetetetetetetetet', 1, 2, 3, 4, '2017-11-16 12:22:00', '2017-11-04 12:22:13', '2017-11-05 14:49:43', 0),
(120, 'test', 1, 1, 2, 4, '2017-11-24 12:00:00', '2017-11-04 12:31:09', '2017-11-05 14:49:43', 0),
(121, 'Attention', 1, 3, 5, 2, '2017-11-05 05:10:00', '2017-11-05 05:10:47', '2017-11-05 14:49:43', 0),
(122, 'Overwatch World Cup Comes Down To A Fight Over Meters', 1, 1, 2, 2, '2017-11-05 05:00:00', '2017-11-05 05:23:51', '2017-11-05 14:49:43', 0),
(123, 'Overwatch World Cup Comes Down To A Fight Over Meters', 1, 2, 2, 2, '2017-11-05 05:00:00', '2017-11-05 05:25:30', '2017-11-05 14:49:43', 0),
(124, 'Overwatch World Cup Comes Down To A Fight Over Meters', 1, 2, 2, 2, '2017-11-05 05:00:00', '2017-11-05 05:25:39', '2017-11-05 14:49:43', 0),
(125, 'Shadow', 1, 3, 2, 2, '2017-11-05 14:53:56', '2017-11-05 05:25:39', '2017-11-05 14:50:52', 0),
(126, 'test', 1, 3, 1, 2, '2017-11-05 15:00:00', '2017-11-05 14:53:21', '2017-11-05 14:53:21', 0),
(127, 'test2', 1, 3, 1, 2, '2017-11-05 15:00:00', '2017-11-05 14:54:33', '2017-11-05 14:54:33', 0),
(128, 'hah', 1, 2, 3, 3, '2017-11-08 15:34:00', '2017-11-05 15:34:56', '2017-11-05 15:34:56', 0),
(129, 'hahah', 1, 2, 2, 4, '2017-11-07 18:00:00', '2017-11-05 15:36:54', '2017-11-05 15:36:54', 0),
(130, 'zxczxczx', 1, 2, 3, 2, '2017-11-16 18:00:00', '2017-11-05 15:45:39', '2017-11-05 15:45:39', 0),
(131, 'vcvcvcv', 1, 1, 2, 3, '2017-11-06 17:00:00', '2017-11-05 15:46:19', '2017-11-05 15:46:19', 0),
(132, 'bvbvbvb', 1, 2, 2, 3, '2017-11-06 18:00:00', '2017-11-05 15:50:58', '2017-11-05 15:50:58', 0),
(133, 'harhar', 1, 1, 2, 2, '2017-11-13 19:00:00', '2017-11-05 15:53:09', '2017-11-05 15:53:09', 0),
(134, 'Harhar', 1, 2, 2, 2, '2017-11-13 19:00:00', '2017-11-05 15:54:51', '2017-11-05 15:54:51', 0),
(135, 'Harhar', 1, 2, 2, 2, '2017-11-13 19:00:00', '2017-11-05 15:55:25', '2017-11-05 15:55:25', 0),
(136, 'Harhar', 1, 2, 2, 2, '2017-11-13 19:00:00', '2017-11-05 15:55:27', '2017-11-05 15:55:27', 0),
(137, 'Harhar', 1, 2, 2, 2, '2017-11-13 19:00:00', '2017-11-05 15:55:27', '2017-11-05 15:55:27', 0),
(138, 'xcxcxcx', 1, 2, 2, 3, '2017-10-30 17:00:00', '2017-11-05 15:58:55', '2017-11-05 15:58:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`) VALUES
(101, 'pudge'),
(102, 'zild'),
(103, 'anna'),
(104, 'tiny'),
(105, 'pudge'),
(106, 'tiny'),
(107, 'test'),
(108, 'anna'),
(109, 'zild'),
(110, 'haha'),
(111, 'pudge'),
(112, 'tiny'),
(113, 'zild'),
(114, 'anna'),
(115, 'test'),
(116, 'routers'),
(117, 'pudge'),
(118, 'tiny'),
(119, 'pudge'),
(120, 'tiny'),
(121, 'pudge'),
(122, 'tiny'),
(123, 'pudge'),
(124, 'tiny'),
(125, 'pudge'),
(126, 'tiny'),
(127, 'tet'),
(128, 'ha'),
(129, 'pudge'),
(130, 'tiny'),
(131, 'ryan'),
(132, 'zild'),
(133, 'anna'),
(134, 'the'),
(135, 'quick'),
(136, 'bro'),
(137, 'fox'),
(138, 'jumps'),
(139, 'pudge'),
(140, 'tiny'),
(141, 'pudge'),
(142, 'tiny'),
(143, 'sdf'),
(144, 'pudge'),
(145, 'tiny'),
(146, 'pudge'),
(147, 'tiny'),
(148, 'pudge'),
(149, 'tiny'),
(150, 'pudge'),
(151, 'tiny'),
(152, 'pudge'),
(153, 'tiny'),
(154, 'test'),
(155, 'sadf'),
(156, 'shawn'),
(157, 'mendez'),
(158, 'pudge'),
(159, 'tiny'),
(160, 'pudge'),
(161, 'tiny'),
(162, 'pudge'),
(163, 'tiny'),
(164, 'pudge'),
(165, 'tiny'),
(166, 'pudge'),
(167, 'tiny'),
(168, 'pudge'),
(169, 'tiny'),
(170, 'zild'),
(171, 'anna'),
(172, 'pudge'),
(173, 'tiny'),
(174, 'dance'),
(175, 'pudge'),
(176, 'tiny'),
(177, 'zild'),
(178, 'anna'),
(179, 'lem'),
(180, 'test'),
(181, 'pudge'),
(182, 'tiny'),
(183, 'janin'),
(184, 'anna'),
(185, 'lem'),
(186, 'jorge'),
(187, 'jr'),
(188, 'ryan'),
(189, 'benjie'),
(190, 'pj'),
(191, 'clint'),
(192, 'pudge'),
(193, 'tiny'),
(194, 'janin'),
(195, 'anna'),
(196, 'lem'),
(197, 'jorge'),
(198, 'jr'),
(199, 'ryan'),
(200, 'benjie'),
(201, 'pj'),
(202, 'pudge'),
(203, 'tiny'),
(204, 'janin'),
(205, 'anna'),
(206, 'jorge'),
(207, 'jr'),
(208, 'ryan'),
(209, 'benjie'),
(210, 'pj'),
(211, 'pudge'),
(212, 'tiny'),
(213, 'lem'),
(214, 'pudge'),
(215, 'tiny'),
(216, 'pudge'),
(217, 'tiny'),
(218, 'pudge'),
(219, 'tiny'),
(220, 'pudge'),
(221, 'tiny'),
(222, 'pudge'),
(223, 'tiny'),
(224, 'pudge'),
(225, 'tiny'),
(226, 'pudge'),
(227, 'tiny'),
(228, 'pudge'),
(229, 'tiny'),
(230, 'pudge'),
(231, 'tiny'),
(232, 'pudge'),
(233, 'tiny'),
(234, 'pudge'),
(235, 'pudge'),
(236, 'tiny'),
(237, 'tiny'),
(238, 'pudge'),
(239, 'tiny'),
(240, 'ann'),
(241, 'anna');

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
(67, 94, 101),
(68, 94, 102),
(69, 94, 103),
(70, 94, 104),
(71, 95, 105),
(72, 95, 106),
(73, 95, 107),
(74, 95, 108),
(75, 95, 109),
(76, 95, 110),
(77, 96, 111),
(78, 96, 112),
(79, 96, 113),
(80, 96, 114),
(81, 96, 115),
(82, 96, 116),
(83, 97, 117),
(84, 97, 118),
(85, 99, 119),
(86, 99, 120),
(87, 100, 121),
(88, 100, 122),
(89, 101, 123),
(90, 101, 124),
(91, 102, 125),
(92, 102, 126),
(93, 102, 127),
(94, 102, 128),
(95, 103, 129),
(96, 103, 130),
(97, 103, 131),
(98, 103, 132),
(99, 103, 133),
(100, 103, 134),
(101, 103, 135),
(102, 103, 136),
(103, 103, 137),
(104, 103, 138),
(105, 104, 139),
(106, 104, 140),
(107, 105, 141),
(108, 105, 142),
(109, 106, 143),
(110, 107, 144),
(111, 107, 145),
(112, 108, 146),
(113, 108, 147),
(114, 109, 148),
(115, 109, 149),
(116, 110, 150),
(117, 110, 151),
(118, 111, 152),
(119, 111, 153),
(120, 112, 154),
(121, 112, 155),
(122, 113, 156),
(123, 113, 157),
(124, 114, 158),
(125, 114, 159),
(126, 115, 160),
(127, 115, 161),
(128, 116, 162),
(129, 116, 163),
(130, 117, 164),
(131, 117, 165),
(132, 118, 166),
(133, 118, 167),
(134, 119, 168),
(135, 119, 169),
(136, 119, 170),
(137, 119, 171),
(138, 120, 172),
(139, 120, 173),
(140, 120, 174),
(141, 121, 175),
(142, 121, 176),
(143, 121, 177),
(144, 121, 178),
(145, 121, 179),
(146, 121, 180),
(147, 122, 181),
(148, 122, 182),
(149, 122, 183),
(150, 122, 184),
(151, 122, 185),
(152, 122, 186),
(153, 122, 187),
(154, 122, 188),
(155, 122, 189),
(156, 122, 190),
(157, 122, 191),
(158, 123, 192),
(159, 123, 193),
(160, 123, 194),
(161, 123, 195),
(162, 123, 196),
(163, 123, 197),
(164, 123, 198),
(165, 123, 199),
(166, 123, 200),
(167, 123, 201),
(168, 124, 202),
(169, 124, 203),
(170, 124, 204),
(171, 124, 205),
(172, 124, 206),
(173, 124, 207),
(174, 124, 208),
(175, 124, 209),
(176, 124, 210),
(177, 125, 211),
(178, 125, 212),
(179, 125, 213),
(180, 126, 214),
(181, 126, 215),
(182, 127, 216),
(183, 127, 217),
(184, 128, 218),
(185, 128, 219),
(186, 129, 220),
(187, 129, 221),
(188, 130, 222),
(189, 130, 223),
(190, 131, 224),
(191, 131, 225),
(192, 132, 226),
(193, 132, 227),
(194, 133, 228),
(195, 133, 229),
(196, 134, 230),
(197, 134, 231),
(198, 135, 232),
(199, 135, 233),
(200, 136, 234),
(201, 137, 235),
(202, 136, 236),
(203, 137, 237),
(204, 138, 238),
(205, 138, 239),
(206, 138, 240),
(207, 138, 241);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Team` varchar(80) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastLogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Team`, `Created`, `LastLogin`) VALUES
(1, 'zild', 'zild', 'ssa', '2017-10-30 15:17:43', '0000-00-00 00:00:00'),
(2, 'anna', 'anna', 'ssd', '2017-10-31 05:00:23', '0000-00-00 00:00:00'),
(3, 'ryan', 'ryan', 'ssa', '2017-11-01 13:43:02', '0000-00-00 00:00:00'),
(4, 'lem', 'lem', 'ssa', '2017-11-05 01:43:06', '0000-00-00 00:00:00'),
(5, 'benjie', 'benjie', 'ssa', '2017-11-05 01:43:06', '0000-00-00 00:00:00'),
(6, 'jr', 'jr', 'ssd', '2017-11-05 01:43:33', '0000-00-00 00:00:00'),
(7, 'jorge', 'jorge', 'ssd', '2017-11-05 01:43:33', '0000-00-00 00:00:00'),
(8, 'janin', 'janin', 'ssd', '2017-11-05 01:43:40', '0000-00-00 00:00:00'),
(9, 'clint', 'clint', '', '2017-11-05 05:24:47', '0000-00-00 00:00:00'),
(10, 'pj', 'pj', '', '2017-11-05 05:24:47', '0000-00-00 00:00:00');

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
  MODIFY `AreaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `activity_category`
--
ALTER TABLE `activity_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `activity_details`
--
ALTER TABLE `activity_details`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `activity_severity`
--
ALTER TABLE `activity_severity`
  MODIFY `SeverityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `activity_titles`
--
ALTER TABLE `activity_titles`
  MODIFY `ActyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `tag_map`
--
ALTER TABLE `tag_map`
  MODIFY `TagMapID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
