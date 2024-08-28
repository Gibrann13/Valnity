-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 03:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(8) NOT NULL,
  `idTopic` int(8) DEFAULT NULL,
  `idUser` int(8) DEFAULT NULL,
  `userComment` varchar(255) DEFAULT NULL,
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idComment`, `idTopic`, `idUser`, `userComment`, `commentTime`) VALUES
(1, 1, 2, 'asasas', '2022-04-17 15:35:46'),
(2, 1, 2, 'ggggg', '2022-04-17 15:36:51'),
(3, 1, 2, 'ggggg', '2022-04-17 15:36:55'),
(4, 1, 2, 'as', '2022-04-20 01:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `idUser` varchar(255) DEFAULT NULL,
  `userFeedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `idUser`, `userFeedback`) VALUES
(1, '', 'bbb'),
(2, '', 'asas'),
(3, '', 'asas'),
(4, '', 'asas'),
(5, '2', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `idInfo` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `descr` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`idInfo`, `name`, `role`, `descr`, `picture`, `type`) VALUES
(1, 'ASCENT', NULL, 'An open playground for small wars of position and attrition divide two sites on Ascent. Each site can be fortified by irreversible bomb doors; once they’re down, you’ll have to destroy them or find another way. Yield as little territory as possible.', 'ValorantWallpaper_Ascent.jpg', 'map'),
(2, 'SPLIT', NULL, 'If you want to go far, you’ll have to go up. A pair of sites split by an elevated center allows for rapid movement using two rope ascenders. Each site is built with a looming tower vital for control. Remember to watch above before it all blows sky-high.', 'ValorantWallpaper_SplitMap.jgp', 'map'),
(3, 'HAVEN', NULL, 'Beneath a forgotten monastery, a clamour emerges from rival Agents clashing to control three sites. There’s more territory to control, but defenders can use the extra real estate for aggressive pushes.', 'ValorantWallpaper_Haven.jpg', 'map'),
(4, 'BRIMSTONE', 'CONTROLLER', 'Joining from the USA, Brimstone\'s orbital arsenal ensures his squad always has the advantage. His ability to deliver utility precisely and from a distance make him an unmatched boots-on-the-ground commander.', '1149317.jpg', 'agent'),
(5, 'PHOENIX', 'DUELIST', 'Hailing from the U.K., Phoenix\'s star power shines through in his fighting style, igniting the battlefield with flash and flare. Whether he\'s got backup or not, he\'ll rush into a fight on his own terms.', '1149608.jpg', 'agent'),
(6, 'SAGE', 'SENTINEL', 'The stronghold of China, Sage creates safety for herself and her team wherever she goes. Able to revive fallen friends and stave off aggressive pushes, she provides a calm center to a hellish fight.', '1110893.jpg', 'agent'),
(7, 'CLASSIC', 'SIDEARMS', 'Primary fire lands precise shots when still, and is equipped with an alternate burst-firing mode for close encounters.', 'classic.png', 'weapon'),
(8, 'SHORTY', 'SIDEARMS', 'A nimble, short barrel shotgun that is deadly at close range but can only fire twice before needing to reload. Pairs well with long range weapons.', 'shorty.png', 'weapon'),
(9, 'FRENZY', 'SIDEARMS', 'Lightweight machine pistol that excels at firing on the move. It’s high rate-of-fire can be difficult to control, so try short bursts at medium ranges.', 'frenzy.png', 'weapon'),
(10, 'GHOST', 'SIDEARMS', 'The Ghost is accurate and carries a large magazine if you miss. Distant targets require a controlled fire rate. Quickly tap the trigger when you can see the whites of their eyes.', 'ghost.png', 'weapon'),
(11, 'SOVA', 'INITIATOR', 'Born from the eternal winter of Russia\'s tundra, Sova tracks, finds, and eliminates enemies with ruthless efficiency and precision. His custom bow and incredible scouting abilities ensure that even if you run, you cannot hide.', '1149415.jpg', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `idTopic` int(8) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `postDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`idTopic`, `judul`, `deskripsi`, `picture`, `postDate`) VALUES
(1, 'Weapon Update', 'Bulldog and Stinger now delay firing inputs while bringing up the weapon to aim down sights (ADS)', 'Bulldog-Cover.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'biasa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'as', 'as@yahoo.com', 'f970e2767d0cfe75876ea857f92e319b', 'admin'),
(2, 'budi', 'budianto@yahoo', '006d2143154327a64d86a264aea225f3', 'biasa'),
(5, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'lala', 'lala@admin', 'e6c760b3216a51c656c5861d72d5bf62', 'admin'),
(7, 'popo', 'popp@a', 'f6122c971aeb03476bf01623b09ddfd4', 'biasa'),
(8, 'as', 'ass@yahoo.com', '964d72e72d053d501f2949969849b96c', 'biasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`idInfo`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`idTopic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `idInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `idTopic` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
