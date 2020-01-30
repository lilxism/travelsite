-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 06:25 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(100) NOT NULL,
  `country` varchar(50) COLLATE utf8_bin NOT NULL,
  `imgfile` varchar(50) COLLATE utf8_bin NOT NULL,
  `place` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(10000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `country`, `imgfile`, `place`, `description`) VALUES
(1, 'Malaysia', 'mas/klcc.jpg', 'KLCC', 'Kuala Lumpur City Centre (KLCC) is a multipurpose development area in Kuala Lumpur, Malaysia.  			There are a number of shopping complexes such as Suria KLCC and Avenue K. There are also hotels within walking distance. Built on 1 January 1992 until 31 December 1994, the Petronas Twin Towers was the tallest building in the world from 1 January 1998 to 31 December 2004. Currently, it still holds the record for the tallest twin buildings in the world. It is the headquarters of Petronas, a Fortune 100 state owned oil company and also the largest company in South East Asia. If you like shopping, KLCC will be your right choice to travel.'),
(2, 'Malaysia', 'mas/melaka.jpg', 'Melaka', 'Melaka also known as \"The Historic State\" is a state in Malaysia located in the southern region of the Malay Peninsula, next to the Strait of Malacca. The Jonker Walk is the Chinatown street of Melaka, Malaysia located along Jonker Street. Next to Jonker Street is the Harmony Street. There are a lot of religious places that can be found there. For example, the temples, mosques and churches. It is a place where different religions are able to practice along the same street peacefully. You can also find a lot of delicious local food in Melaka. So, if you like to learn culture while enjoying delicious local food, then Melaka should be in your itinerary.'),
(3, 'Malaysia', 'mas/penang.jpg', 'Penang', 'Penang island is famous for its delicious delicacies, beaches and arts. George Town, which is the capital of Penang is the second largest city in Malaysia. It is as well home to a UNESCO World Heritage Site. One of the must-do in Penang is to hunt down all the arts along the streets. Penang Street Art is a project by ldocal artist, Ernest Zacharevic. His artwork is spread out across Penang\'s city centre. So, if you are seeking for some good local art in Malaysia, Penang will be the right place to go. Of course, Penang is also famous for its local food such as Char Koay Teow, Assam Laksa, chendol, curry noodles and oyster omelette.'),
(4, 'Thailand', 'thai/bangkok.jpg', 'Bangkok', 'Bangkok is always among the world top tourist destinations. The city is a true tourist paradise, proved by the growing number of travelers coming each year. Besides the city itself, Bangkok is also surrounded by many interesting provinces worth visiting. There are a great variety of tourist places in Bangkok, mostly historical attractions and temples with elaborate architecture and art. '),
(5, 'Thailand', 'thai/chiang.jpg', 'Chiang Mai', 'Chiang Mai is a city in mountainous northern Thailand. Founded in 1296, it was capital of the independent Lanna Kingdom until 1558. Its Old City area still  retains vestiges of walls and moats from its history as a cultural and religious center. It is also home to hundreds of elaborate Buddhist temples, including 14th-century Wat Phra Singh and 15th-century Wat Chedi Luang, adorned with carved serpents.'),
(6, 'Thailand', 'thai/phi.jpg', 'Phi Phi Islands', 'Phi Phi Islands have become one of the prime holiday destinations in southern Thailand for obvious reasons. This small archipelago of six islands is stunningly beautiful and can offer an ideal vacation for almost any taste. It is also a great location for water-sports lover. If you want to escape winter and enjoy the nature in between jungle and sea, then Phi Phi Islands will surely meet your expectations.'),
(7, 'Singapore', 'sing/marinabay.jpg', 'Marina Bay Sands', 'Marina Bay Sands is an integrated resort fronting Marina Bay in Singapore. Signature attractions include The Shoppes at Marina Bay Sands, The Sands Expo and Convention Centre and Art Science Museum. You can also relax in utmost luxury at the world\'s largest rooftop Infinity Pool, sipping champagne and looking out over the breathtaking city skyline. If you seek for some luxury enjoyment, then Marina Bay will be the right choice for you. Not to mention that there is also a casino!'),
(8, 'Singapore', 'sing/river.jpg', 'River Cruise', 'Whether cruising its waters or sitting along the river banks, viewing the Singapore River is a quintessential experience while in the city. Night owls will want to make their way here for the party scenes along the riverfront, but it is also possible to take in historic architecture and bridges aboard a Singapore River cruise or on a city sightseeing tour that also stops at other popular attractions like Merlion Park, Kampong Glam, and Chinatown.'),
(9, 'Singapore', 'sing/universal.jpg', 'Universal Studios', 'Universal Studios Singapore is a theme park located within Resorts World Sentosa on Sentosa Island, Singapore. It features 24 rides, shows and attractions in seven themed zones. It was a key component of Genting\'s bid for the right to build Singapore\'s second integrated resort. Each zone is based on a blockbuster movie or a television show, featuring their own unique attractions, character appearances, dining and shopping areas.');

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE `nation` (
  `country` varchar(50) COLLATE utf8_bin NOT NULL,
  `bgimg` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`country`, `bgimg`) VALUES
('Malaysia', 'mas/twin.png'),
('Singapore', 'sing/sing.jpg'),
('Thailand', 'thai/thai.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `PlanId` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `Country` varchar(30) COLLATE utf8_bin NOT NULL,
  `DateDep` date DEFAULT NULL,
  `DateReturn` date DEFAULT NULL,
  `Hotel` int(1) DEFAULT '0',
  `Luggage` int(1) DEFAULT '0',
  `Passport` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`PlanId`, `username`, `Country`, `DateDep`, `DateReturn`, `Hotel`, `Luggage`, `Passport`) VALUES
(1, 'Lily', 'Malaysia', '2018-05-15', '2018-05-17', 1, 1, 1),
(2, 'Lily', 'Singapore', '2018-05-14', '2018-05-15', 1, 0, 0),
(3, 'Lily', 'Thailand', '2018-05-14', '2018-05-15', 1, 0, 1),
(5, 'Traveller', 'Singapore', '2018-05-24', '2018-05-26', 0, 1, 0),
(6, 'Traveller', 'Thailand', '2018-05-16', '2018-05-17', 1, 1, 0),
(7, 'Traveller', 'Malaysia', '2018-05-17', '2018-05-25', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `shareId` int(11) NOT NULL,
  `country` varchar(50) COLLATE utf8_bin NOT NULL,
  `comment` varchar(10000) COLLATE utf8_bin NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`shareId`, `country`, `comment`, `username`) VALUES
(7, 'Malaysia', 'I like Malaysia. Text me if you want to go there...', 'Traveller'),
(8, 'Singapore', 'Well, I just want to stay at home...really....', 'Lily');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Lily', '$2y$10$8himSWb6qSjhUGZHwSNsuOfAcDOYSiKpiew7cfOMrG3vZeCg8JldK'),
('Traveller', '$2y$10$p1ulKm05kPAqw5428dW2N.1HJK.H1UnaMJEglkk6mgLqvL4u6PxQO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `country_fk` (`country`);

--
-- Indexes for table `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`country`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`PlanId`),
  ADD KEY `username_fk` (`username`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`shareId`),
  ADD KEY `username_fk_share` (`username`),
  ADD KEY `country_fk_share` (`country`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `PlanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `shareId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `country_fk` FOREIGN KEY (`country`) REFERENCES `nation` (`country`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `username_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `country_fk_share` FOREIGN KEY (`country`) REFERENCES `nation` (`country`),
  ADD CONSTRAINT `username_fk_share` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
