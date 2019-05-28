-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 08:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omtsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `movie_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`fname`, `lname`, `movie_title`) VALUES
('Jennifer', 'Leigh', 'Annihilation'),
('Natalie', 'Portman', 'Annihilation'),
('Tessa', 'Thompson', 'Annihilation'),
('Chadwick', 'Boseman', 'Black Panther'),
('Lupita', 'Nyong\'o', 'Black Panther'),
('Michael', 'Jordan', 'Black Panther'),
('Bruce', 'Willis', 'Death Wish'),
('Elisabeth', 'Shue', 'Death Wish'),
('Vincent', 'D\'Onofrio', 'Death Wish'),
('Eddie', 'Redmayne', 'Early Man'),
('Maisie', 'Williams', 'Early Man'),
('Tom', 'Hiddleston', 'Early Man'),
('Angourie', 'Rice', 'Every Day'),
('Debby', 'Ryan', 'Every Day'),
('Justice', 'Smith', 'Every Day'),
('Dakota', 'Johnson', 'Fifty Shades Freed'),
('Eric', 'Johnson', 'Fifty Shades Freed'),
('Jamie', 'Dornan', 'Fifty Shades Freed'),
('Jason', 'Batement', 'Games Night'),
('Kyle', 'Chandler', 'Games Night'),
('Rachel', 'McAdams', 'Games Night'),
('Domhall', 'Gleeson', 'Peter Rabbit'),
('Fayssal', 'Bazzi', 'Peter Rabbit'),
('James', 'Corden', 'Peter Rabbit'),
('Johnny', 'Depp', 'Pirates of the Caribbean: The Curse of the Black Pearl'),
('Keira', 'Knightley', 'Pirates of the Caribbean: The Curse of the Black Pearl'),
('Orlando', 'Bloom', 'Pirates of the Caribbean: The Curse of the Black Pearl'),
('Jennifer', 'Lawrence', 'Red Sparrow'),
('Joel', 'Edgarton', 'Red Sparrow'),
('Matthias', 'Schoenaerts', 'Red Sparrow'),
('Alek', 'Skarlatos', 'The 15:17 to Paris'),
('Anthony', 'Sadler', 'The 15:17 to Paris'),
('Spencer', 'Stone', 'The 15:17 to Paris'),
('Hugh', 'Jackman', 'The Greatest Showman'),
('Michelle', 'Williams', 'The Greatest Showman'),
('Zac', 'Efron', 'The Greatest Showman');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `street_num` int(11) DEFAULT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `postal_code` char(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `email_address` varchar(50) NOT NULL,
  `credit_num` varchar(20) DEFAULT NULL,
  `credit_expiry` date DEFAULT NULL,
  `admin` char(1) DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`fname`, `lname`, `account_id`, `password`, `street_num`, `street_name`, `postal_code`, `country`, `city`, `phone_num`, `email_address`, `credit_num`, `credit_expiry`, `admin`) VALUES
('Stefan', 'Urosevic', 1, 'password', 23, 'Ringal', 'H6S4G9', 'Canada', 'Kingston', '1231231231', 'stefan@email.com', '111111111111', '2021-03-01', 'T'),
('Zane', 'Little', 2, 'i<3stefan', 47, 'Nulley', 'M1K5T3', 'Canada', 'Kingston', '3453453453', 'zane@email.com', '999999999999', '0000-00-00', 'F'),
('Alex', 'Wojaczek', 3, 'stefanisthebest', 13, 'Bobuddy', 'H8D5P3', 'Canada', 'Kingston', '2342342342', 'alex@email.com', '222222222222', '2019-07-01', 'F'),
('Cotton', 'Eyed-Joe', 4, 'whathappenedtomyeye?', 37, 'Josie Valley', '11093', 'WhereDidYouComeFrom', 'WhereDidYouGo', '7897897897', 'cotton@eyedmail.com', '555555555555', '2022-12-01', 'F'),
('Polly', 'Parrot', 5, 'cracker', NULL, NULL, NULL, NULL, NULL, NULL, 'pollywant@cracker.com', NULL, NULL, 'F'),
('Christian', 'Grey', 6, 'GodILookGood', NULL, NULL, NULL, NULL, NULL, NULL, 'narcissist@narcissist.com', NULL, NULL, 'F'),
('Testy', 'McTestyFace', 8, 'test', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_title` varchar(100) NOT NULL,
  `rating` enum('G','PG','PG-13','R','NR') DEFAULT NULL,
  `plot` text,
  `director_fname` varchar(50) DEFAULT NULL,
  `director_lname` varchar(50) DEFAULT NULL,
  `prod_company` varchar(50) DEFAULT NULL,
  `running_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_title`, `rating`, `plot`, `director_fname`, `director_lname`, `prod_company`, `running_time`) VALUES
('Annihilation', 'PG-13', 'A biologist signs up for a dangerous, secret expedition where the laws of nature don\'t apply.', 'Alex', 'Garland', 'DNA Films', 115),
('Black Panther', 'PG', 'T\'Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of T\'Challa\'s father\'s mistake.', 'Ryan', 'Coogler', 'Marvel Studios', 134),
('Death Wish', 'R', 'A mild-mannered father is transformed into a killing machine after his family is torn apart by a violent act.', 'Eli', 'Roth', 'Cave 76', 107),
('Early Man', 'G', 'Set at the dawn of time, when prehistoric creatures and woolly mammoths roamed the earth, Early Man tells the story of Dug, along with sidekick Hognob as they unite his tribe against a mighty enemy Lord Nooth and his Bronze Age City to save their home.', 'Nick', 'Park', 'Aardman Animations', 89),
('Every Day', 'PG', 'A shy teenager falls for someone who transforms into another person every day.', 'Michael', 'Sucsy', 'FilmWave', 97),
('Fifty Shades Freed', 'R', 'Anastasia and Christian get married, but Jack Hyde continues to threaten their relationship.', 'James', 'Foley', 'Universal Pictures', 105),
('Games Night', 'PG-13', 'A group of friends who meet regularly for game nights find themselves trying to solve a murder mystery.', 'John', 'Daley', 'Aggregate Films', 100),
('Peter Rabbit', 'G', 'Feature adaptation of Beatrix Potter\'s classic tale of a rebellious rabbit trying to sneak into a farmer\'s vegetable garden.', 'Will', 'Gluck', '2.0 Entertainment', 95),
('Pirates of the Caribbean: The Curse of the Black Pearl', 'PG-13', 'Blacksmith Will Turner teams up with eccentric pirate \'Captain\' Jack Sparrow to save his love, the governor\'s daughter, from Jack\'s former pirate allies, who are now undead.', 'Gore', 'Verbinski', 'Walt Disney Pictures', 143),
('Red Sparrow', 'R', 'Ballerina Dominika Egorova is recruited to \'Sparrow School,\' a Russian intelligence service where she is forced to use her body as a weapon. Her first mission, targeting a C.I.A. agent, threatens to unravel the security of both nations.', 'Francis', 'Lawrence', 'Chernin Entertainment', 139),
('The 15:17 to Paris', 'PG-13', 'Three Americans discover a terrorist plot aboard a train while in France.', 'Clint', 'Eastwood', 'Warner Bros.', 94),
('The Greatest Showman', 'PG', 'Celebrates the birth of show business, and tells of a visionary who rose from nothing to create a spectacle that became a worldwide sensation.', 'Michael', 'Gracey', 'Chernin Entertainment', 105);

-- --------------------------------------------------------

--
-- Table structure for table `movie_duration`
--

CREATE TABLE `movie_duration` (
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `theatre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_duration`
--

INSERT INTO `movie_duration` (`start_date`, `end_date`, `movie_title`, `theatre_name`) VALUES
('2018-08-02', '2018-11-21', 'Annihilation', 'Cineplex Odeon'),
('2018-08-05', '2018-11-19', 'Annihilation', 'Landmark Cinemas'),
('2018-02-14', '2018-05-07', 'Black Panther', 'Cineplex Odeon'),
('2018-02-13', '2018-05-02', 'Black Panther', 'Landmark Cinemas'),
('2017-02-14', '2019-02-14', 'Fifty Shades Freed', 'Cineplex Odeon'),
('2019-06-19', '2018-10-02', 'Games Night', 'Cineplex Odeon'),
('2019-06-18', '2018-09-29', 'Games Night', 'Landmark Cinemas'),
('2018-02-16', '2003-04-23', 'Peter Rabbit', 'Cineplex Odeon'),
('2018-02-09', '2003-04-22', 'Peter Rabbit', 'Landmark Cinemas'),
('2018-02-03', '2003-04-22', 'Peter Rabbit', 'The Screening Room'),
('2003-07-08', '2003-10-27', 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Cineplex Odeon'),
('2003-07-13', '2003-10-25', 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas'),
('2003-07-09', '2003-10-24', 'Pirates of the Caribbean: The Curse of the Black Pearl', 'The Screening Room'),
('2018-02-08', '2018-04-29', 'The 15:17 to Paris', 'Landmark Cinemas'),
('2018-02-07', '2018-04-15', 'The 15:17 to Paris', 'The Screening Room'),
('2012-03-22', '2012-08-12', 'The Greatest Showman', 'Cineplex Odeon'),
('2012-03-23', '2012-07-04', 'The Greatest Showman', 'The Screening Room');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `account_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `theatre_name` varchar(50) NOT NULL,
  `theatre_num` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `showing_date` date NOT NULL,
  `ticket_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`account_id`, `movie_title`, `theatre_name`, `theatre_num`, `start_time`, `showing_date`, `ticket_num`) VALUES
(1, 'Annihilation', 'Cineplex Odeon', 4, '16:40:00', '2018-02-13', 2),
(1, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas', 2, '15:50:00', '2018-02-27', 1),
(1, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas', 2, '18:50:00', '2018-02-27', 2),
(1, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas', 2, '21:50:00', '2018-02-27', 4),
(1, 'The 15:17 to Paris', 'Landmark Cinemas', 3, '16:45:00', '2018-02-15', 3),
(2, 'Games Night', 'Cineplex Odeon', 2, '17:20:00', '2018-01-05', 2),
(2, 'Annihilation', 'Landmark Cinemas', 4, '22:00:00', '2018-01-03', 1),
(3, 'Black Panther', 'Cineplex Odeon', 4, '19:00:00', '2017-12-27', 3),
(3, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas', 2, '15:50:00', '2018-02-27', 1),
(3, 'Peter Rabbit', 'The Screening Room', 4, '16:50:00', '2017-12-28', 1),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-14', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-15', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-16', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-17', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-18', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-19', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-20', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-21', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-22', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-23', 90),
(6, 'Fifty Shades Freed', 'Cineplex Odeon', 4, '21:20:00', '2017-02-24', 90),
(8, 'Annihilation', 'Landmark Cinemas', 4, '19:15:00', '2018-04-02', 2),
(8, 'Black Panther', 'Landmark Cinemas', 4, '21:30:00', '2018-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `account_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `review_contents` text NOT NULL,
  `time_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`account_id`, `movie_title`, `review_contents`, `time_posted`) VALUES
(1, 'Black Panther', 'Wait a minute, this isn\'t a jungle book spin-off', '2018-01-26 19:56:18'),
(1, 'Early Man', 'Groundbreaking', '2018-02-27 17:03:15'),
(1, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'It was good. I like when Captain Jack does the thing', '2018-02-28 16:34:23'),
(1, 'Black Panther', 'fgh', '2018-03-29 20:42:40'),
(1, 'Black Panther', 'g', '2018-03-29 21:15:15'),
(1, 'Black Panther', 'Test', '2018-03-29 21:41:33'),
(1, 'Black Panther', 'dfgdf', '2018-03-29 21:44:35'),
(1, 'Black Panther', 'Test', '2018-03-29 21:45:31'),
(1, 'Annihilation', 'Review For Annihilation', '2018-03-29 21:45:56'),
(1, 'Annihilation', 'dsf', '2018-03-29 21:52:14'),
(1, 'Annihilation', 'sdfsdf', '2018-03-29 21:53:10'),
(1, 'Annihilation', 'sdf', '2018-03-29 21:53:39'),
(2, 'Games Night', 'It was fun but I didn\'t really get to interact as much as I hoped. I felt like I was just watching someone else\'s games night. Will not be playing games here again.', '2014-07-04 11:02:05'),
(4, 'The 15:17 to Paris', 'My train to paris will be here in 5 minutes', '2017-12-14 15:12:34'),
(4, 'The 15:17 to Paris', 'MY TRAIN TO PARIS IS LATE!!!', '2017-12-14 15:22:27'),
(5, 'Black Panther', 'squawk', '2018-01-26 19:56:18'),
(5, 'The 15:17 to Paris', 'squawk', '2018-01-26 19:57:23'),
(5, 'Peter Rabbit', 'squawk', '2018-01-26 19:57:36'),
(5, 'Every Day', 'squawk', '2018-01-26 19:58:02'),
(5, 'Black Panther', 'squawk', '2018-01-26 19:58:36'),
(5, 'Fifty Shades Freed', 'squawk', '2018-01-26 19:58:59'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-14 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-15 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-16 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-17 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-18 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-19 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-20 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-21 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-22 23:01:00'),
(6, 'Fifty Shades Freed', 'Christian Grey looks so good', '2017-02-23 23:01:00'),
(6, 'Fifty Shades Freed', 'IVE BEEN FROM THE THEATRE JUST CAUSE I MADE OUT WITH THE SCREEN A LITTLE!!! 0/10', '2017-02-24 23:01:00'),
(8, 'Annihilation', 'Who Wrote This?', '2018-03-31 01:17:29'),
(8, 'Annihilation', 'SDSFDS', '2018-03-31 12:35:11'),
(9, 'Annihilation', 'Add A review', '2018-04-02 02:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `start_time` time NOT NULL,
  `theatre_num` int(11) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `theatre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showings`
--

INSERT INTO `showings` (`start_time`, `theatre_num`, `seats_available`, `movie_title`, `theatre_name`) VALUES
('02:17:00', 4, 41, 'Peter Rabbit', 'The Screening Room'),
('14:30:00', 4, 36, 'Black Panther', 'Cineplex Odeon'),
('15:15:00', 4, 23, 'Black Panther', 'Cineplex Odeon'),
('15:30:00', 4, 12, 'Black Panther', 'Landmark Cinemas'),
('15:50:00', 2, 23, 'Black Panther', 'Landmark Cinemas'),
('15:50:00', 4, 107, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas'),
('16:05:00', 4, 86, 'Peter Rabbit', 'Landmark Cinemas'),
('16:15:00', 4, 77, 'Games Night', 'Landmark Cinemas'),
('16:30:00', 3, 57, 'Annihilation', 'Landmark Cinemas'),
('16:35:00', 2, 37, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'The Screening Room'),
('16:40:00', 4, 36, 'Annihilation', 'Cineplex Odeon'),
('16:45:00', 3, 99, 'The 15:17 to Paris', 'Landmark Cinemas'),
('16:50:00', 2, 20, 'Red Sparrow', 'The Screening Room'),
('16:50:00', 4, 82, 'The Greatest Showman', 'Cineplex Odeon'),
('16:50:00', 4, 41, 'Peter Rabbit', 'The Screening Room'),
('17:10:00', 2, 104, 'Peter Rabbit', 'Cineplex Odeon'),
('17:20:00', 2, 83, 'Games Night', 'Cineplex Odeon'),
('17:30:00', 2, 27, 'Black Panther', 'Cineplex Odeon'),
('18:00:00', 3, 24, 'Black Panther', 'Cineplex Odeon'),
('18:30:00', 4, 7, 'Black Panther', 'Landmark Cinemas'),
('18:35:00', 2, 70, 'Peter Rabbit', 'Landmark Cinemas'),
('18:35:00', 2, 68, 'The Greatest Showman', 'The Screening Room'),
('18:50:00', 2, 31, 'Black Panther', 'Landmark Cinemas'),
('18:50:00', 4, 17, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas'),
('19:00:00', 2, 37, 'Games Night', 'Landmark Cinemas'),
('19:00:00', 4, 9, 'Black Panther', 'Cineplex Odeon'),
('19:05:00', 3, 97, 'The 15:17 to Paris', 'Landmark Cinemas'),
('19:15:00', 4, 54, 'Annihilation', 'Landmark Cinemas'),
('19:30:00', 4, 42, 'Annihilation', 'Cineplex Odeon'),
('19:40:00', 3, 116, 'Peter Rabbit', 'Cineplex Odeon'),
('19:40:00', 4, 35, 'Games Night', 'Cineplex Odeon'),
('19:50:00', 3, 79, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Cineplex Odeon'),
('20:45:00', 4, 42, 'Black Panther', 'Cineplex Odeon'),
('21:20:00', 4, 90, 'Fifty Shades Freed', 'Cineplex Odeon'),
('21:20:00', 4, 62, 'Peter Rabbit', 'Landmark Cinemas'),
('21:30:00', 4, 7, 'Black Panther', 'Landmark Cinemas'),
('21:40:00', 2, 14, 'Games Night', 'Landmark Cinemas'),
('21:45:00', 3, 58, 'Black Panther', 'Cineplex Odeon'),
('21:45:00', 3, 105, 'The 15:17 to Paris', 'Landmark Cinemas'),
('21:50:00', 2, 5, 'Black Panther', 'Landmark Cinemas'),
('21:50:00', 4, 54, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Landmark Cinemas'),
('22:00:00', 2, 10, 'Games Night', 'Cineplex Odeon'),
('22:00:00', 3, 73, 'Annihilation', 'Landmark Cinemas'),
('22:00:00', 4, 47, 'Peter Rabbit', 'Cineplex Odeon'),
('22:20:00', 4, 26, 'Annihilation', 'Cineplex Odeon'),
('22:25:00', 4, 43, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'Cineplex Odeon');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `movie_title` varchar(100) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `street_num` int(11) DEFAULT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `postal_code` char(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `contact_fname` varchar(50) DEFAULT NULL,
  `contact_lname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`movie_title`, `company_name`, `street_num`, `street_name`, `postal_code`, `country`, `city`, `phone_num`, `contact_fname`, `contact_lname`) VALUES
('The Greatest Showman', '20th Century Fox', 33, 'Bloor', 'M4W3H1', 'Canada', 'Toronto', '4169210001', 'Jiminy', 'Cricket'),
('Pirates of the Caribbean: The Curse of the Black Pearl', 'Buena Vista International', 500, 'Buena Vista', '91505', 'USA', 'Burbank', '18182955200', 'John', 'Smith'),
('Every Day', 'Elevation Pictures', 166, 'Pearl', 'M5H1L3', 'Canada', 'Toronto', '4165835800', 'Nown', 'Aym'),
('Early Man', 'Entertainment One', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Death Wish', 'MGM', 245, 'Beverly', '90210', 'USA', 'Beverly Hills', '3104493000', 'Cotton', 'Eyed-Joe'),
('Annihilation', 'Paramount Pictures', 5555, 'Melrose', NULL, 'USA', 'Los Angeles', NULL, 'Jim', 'Gianopulos'),
('Peter Rabbit', 'Sony Pictures Entertainment', 1303, 'Young', 'M4T2Y9', 'Canada', 'Toronto', '4169225740', NULL, NULL),
('Red Sparrow', 'Twentieth Century Fox', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Fifty Shades Freed', 'Universal Pictures', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Black Panther', 'Walt Disney Studios Motion Pictures', 500, 'Buena Vista', '91505', 'USA', 'Burbank', '18182955200', 'John', 'Smith'),
('Games Night', 'Warner Bros.', 3400, 'Riverside', '91522', 'USA', 'Burbank', '18189778687', NULL, 'Warner'),
('The 15:17 to Paris', 'Warner Bros.', 3400, 'Riverside', '91522', 'USA', 'Burbank', '18189778687', NULL, 'Warner');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `theatre_num` int(11) NOT NULL,
  `max_seats` int(11) DEFAULT NULL,
  `screen_size` enum('s','m','l') DEFAULT NULL,
  `theatre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`theatre_num`, `max_seats`, `screen_size`, `theatre_name`) VALUES
(1, 150, 'l', 'Cineplex Odeon'),
(1, 130, 'l', 'Landmark Cinemas'),
(2, 175, 'l', 'Cineplex Odeon'),
(2, 200, 'l', 'Landmark Cinemas'),
(2, 50, 's', 'The Screening Room'),
(3, 110, 'm', 'Cineplex Odeon'),
(3, 105, 'm', 'Landmark Cinemas'),
(3, 20, 's', 'The Screening Room'),
(4, 90, 'm', 'Cineplex Odeon'),
(4, 101, 'm', 'The Screening Room');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_complex`
--

CREATE TABLE `theatre_complex` (
  `theatre_name` varchar(50) NOT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `street_num` int(11) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `postal_code` char(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre_complex`
--

INSERT INTO `theatre_complex` (`theatre_name`, `phone_num`, `street_num`, `street_name`, `postal_code`, `country`, `city`) VALUES
('Cineplex Odeon', '6136340152', 626, 'Gardiners', 'K7M 3X9', 'Canada', 'Kingston'),
('Landmark Cinemas', '6135477887', 120, 'Dalton', 'K7K 0C3', 'Canada', 'Kingston'),
('The Screening Room', '6135426080', 1201, 'Princess', 'K7L 5M6', 'Canada', 'Kingston');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`movie_title`,`fname`,`lname`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_title`);

--
-- Indexes for table `movie_duration`
--
ALTER TABLE `movie_duration`
  ADD PRIMARY KEY (`movie_title`,`theatre_name`,`start_date`,`end_date`),
  ADD KEY `movie_duration_ibfk_1` (`theatre_name`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`account_id`,`theatre_name`,`theatre_num`,`start_time`,`showing_date`),
  ADD KEY `reservation_ibfk_2` (`start_time`),
  ADD KEY `reservation_ibfk_3` (`theatre_num`),
  ADD KEY `reservation_ibfk_4` (`theatre_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`account_id`,`time_posted`),
  ADD KEY `movie_title` (`movie_title`);

--
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`start_time`,`theatre_num`,`theatre_name`),
  ADD KEY `showings_ibfk_1` (`theatre_name`),
  ADD KEY `showings_ibfk_2` (`movie_title`),
  ADD KEY `showings_ibfk_3` (`theatre_num`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`company_name`,`movie_title`),
  ADD KEY `supplier_ibfk_1` (`movie_title`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`theatre_num`,`theatre_name`),
  ADD KEY `theatre_ibfk_1` (`theatre_name`);

--
-- Indexes for table `theatre_complex`
--
ALTER TABLE `theatre_complex`
  ADD PRIMARY KEY (`theatre_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`movie_title`) REFERENCES `movie` (`movie_title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_duration`
--
ALTER TABLE `movie_duration`
  ADD CONSTRAINT `movie_duration_ibfk_1` FOREIGN KEY (`theatre_name`) REFERENCES `theatre_complex` (`theatre_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_duration_ibfk_2` FOREIGN KEY (`movie_title`) REFERENCES `movie` (`movie_title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `customer` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`start_time`) REFERENCES `showings` (`start_time`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`theatre_num`) REFERENCES `theatre` (`theatre_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`theatre_name`) REFERENCES `theatre_complex` (`theatre_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`movie_title`) REFERENCES `movie` (`movie_title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showings`
--
ALTER TABLE `showings`
  ADD CONSTRAINT `showings_ibfk_1` FOREIGN KEY (`theatre_name`) REFERENCES `theatre_complex` (`theatre_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `showings_ibfk_2` FOREIGN KEY (`movie_title`) REFERENCES `movie` (`movie_title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `showings_ibfk_3` FOREIGN KEY (`theatre_num`) REFERENCES `theatre` (`theatre_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`movie_title`) REFERENCES `movie` (`movie_title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theatre`
--
ALTER TABLE `theatre`
  ADD CONSTRAINT `theatre_ibfk_1` FOREIGN KEY (`theatre_name`) REFERENCES `theatre_complex` (`theatre_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
