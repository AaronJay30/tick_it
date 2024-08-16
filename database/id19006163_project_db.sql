-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2022 at 12:19 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19006163_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `Category` varchar(255) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `image`, `content`, `Category`, `published_date`) VALUES
(1, 'The plot-twist', 'Bea Alessandra V. Sison', 'BI628fa59b2880a7.84707286.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at interdum est. Maecenas et accumsan ipsum. Aliquam erat volutpat. Morbi sed mauris sit amet erat imperdiet efficitur porttitor a ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt at tellus vitae pharetra. Integer eros magna, vestibulum eu aliquam vel, sollicitudin at dolor. Suspendisse quis tortor egestas leo pellentesque imperdiet nec vel sem. Pellentesque commodo, dui quis dignissim eleifend, ligula ligula gravida diam, suscipit interdum orci enim nec eros.  ', 'Movie', '2022-05-27'),
(2, 'The Mayon Volcano', 'Stephen Curry', 'BI628fa8abca9251.53255486.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at interdum est. Maecenas et accumsan ipsum. Aliquam erat volutpat. Morbi sed mauris sit amet erat imperdiet efficitur porttitor a ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt at tellus vitae pharetra. Integer eros magna, vestibulum eu aliquam vel, sollicitudin at dolor. Suspendisse quis tortor egestas leo pellentesque imperdiet nec vel sem. Pellentesque commodo, dui quis dignissim eleifend, ligula ligula gravida diam, suscipit interdum orci enim nec eros.       ', 'Volcano', '2022-05-27'),
(3, 'Maldives Beach', 'Marvin Nodora', 'BI628fa976d33e54.59607220.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at interdum est. Maecenas et accumsan ipsum. Aliquam erat volutpat. Morbi sed mauris sit amet erat imperdiet efficitur porttitor a ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt at tellus vitae pharetra. Integer eros magna, vestibulum eu aliquam vel, sollicitudin at dolor. Suspendisse quis tortor egestas leo pellentesque imperdiet nec vel sem. Pellentesque commodo, dui quis dignissim eleifend, ligula ligula gravida diam, suscipit interdum orci enim nec eros. ', 'Beach', '2022-05-27'),
(4, 'Boracay', 'Aaron Jay Gabato', 'BI628faa4fe957a2.67417014.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at interdum est. Maecenas et accumsan ipsum. Aliquam erat volutpat. Morbi sed mauris sit amet erat imperdiet efficitur porttitor a ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt at tellus vitae pharetra. Integer eros magna, vestibulum eu aliquam vel, sollicitudin at dolor. Suspendisse quis tortor egestas leo pellentesque imperdiet nec vel sem. Pellentesque commodo, dui quis dignissim eleifend, ligula ligula gravida diam, suscipit interdum orci enim nec eros.    ', 'Beach', '2022-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`id`, `name`, `email`, `content`) VALUES
(9, 'Aaron Jay Gabato', 'aaronjaygabato30@gmail.com', 'Can I postpone my ticket?'),
(10, 'Aaron Jay Gabato', 'aaaaarondalla@gmail.com', 'Can I refund the ticket?');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `cover_img` text NOT NULL,
  `description` text NOT NULL,
  `director` varchar(255) NOT NULL,
  `duration` float NOT NULL,
  `date_showing` date NOT NULL,
  `end_date` date NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `cover_img`, `description`, `director`, `duration`, `date_showing`, `end_date`, `price`) VALUES
(8, 'Doctor Strange in the Multiverse of Madness', 'Action/Adventure', '628b8e8e3f0ab6.46662958.jpg', ' Dr Stephen Strange casts a forbidden spell that opens a portal to the multiverse. However, a threat emerges that may be too big for his team to handle.  ', 'Sam Raimi', 2.6, '2022-05-06', '2022-06-06', 300),
(10, 'Spider-Man: No Way Home', 'Action/Adventure', '628b93b71a5fa4.50286093.jpg', ' With Spider-Mans identity now revealed, our friendly neighborhood web-slinger is unmasked and no longer able to separate his normal life as Peter Parker from the high stakes of being a superhero. When Peter asks for help from Doctor Strange, the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man. ', 'Jon Watts', 2.15, '2020-12-17', '2021-01-20', 290),
(11, 'The Whole Truth', 'Thriller/Mystery', '628b97e82add99.70371936.jpg', ' When two siblings stumble on a strange hole in the wall of their grandparents house, horrifying incidents reveal sinister secrets about their family.  ', 'Courtney Hunt', 2.05, '2021-12-02', '2022-01-13', 250),
(12, 'Morbius', 'Action/Adventure', '628b9914615c38.43394143.jpg', ' Biochemist Michael Morbius tries to cure himself of a rare blood disease, but he inadvertently infects himself with a form of vampirism instead.', 'Daniel Espinosa', 1.44, '2022-04-01', '2022-05-19', 250),
(13, 'Umma', 'Thriller/Supernatural', '628b996980f202.09007633.jpg', ' Amanda and her daughter live a quiet life on an American farm, but when the remains of her estranged mother arrive from Korea, Amanda becomes haunted by the fear of turning into her own mother.', 'Iris Shim', 1.23, '2022-03-18', '2022-04-16', 250),
(14, 'Uncharted', 'Adventure/Action', '628b99a753ac90.72423672.jpg', ' Street-smart Nathan Drake is recruited by seasoned treasure hunter Victor \"Sully\" Sullivan to recover a fortune amassed by Ferdinand Magellan, and lost 500 years ago by the House of Moncada.   ', 'Ruben Fleischer', 1.57, '2022-05-25', '2022-06-06', 300),
(15, 'Sonic the Hedgehog 2', 'Adventure/Comedy', '628b99e53add60.59291784.jpg', ' When the manic Dr Robotnik returns to Earth with a new ally, Knuckles the Echidna, Sonic and his new friend Tails is all that stands in their way. ', 'Jeff Fowler', 2.02, '2022-04-08', '2022-06-10', 300),
(17, 'The Devils Light', 'Horror/Thriller', '628c88017d14d1.93552762.jpg', ' A nun prepares to perform an exorcism and comes face to face with a demonic force with mysterious ties to her past.', ' Daniel Stamm', 1.33, '2022-10-28', '2022-11-30', 280),
(18, 'Black Panther: Wakanda Forever', 'Action/Adventure/Drama', '628c8868e4f9f5.59647533.jpg', ' A sequel that will continue to explore the world of Wakanda and all the characters introduced in the 2018 film.', 'Ryan Coogler', 2.2, '2022-11-11', '2022-12-18', 290),
(19, ' After Ever Happy', 'Drama/Romance', '628c88b9eef2b5.39083468.jpg', ' As a shocking truth about a couples families emerges, the two lovers discover they are not so different from each other. Tessa is no longer the sweet, simple, good girl she was when she met Hardin — any more than he is the cruel, moody boy she fell so hard for.', ' Castille Landon', 1.59, '2022-09-07', '2022-10-24', 270),
(20, 'Thor: Love and Thunder', 'Action/Adventure/Fantasy', '628c8918ee22a4.73734560.jpg', ' Thor enlists the help of Valkyrie, Korg and ex-girlfriend Jane Foster to fight Gorr the God Butcher, who intends to make the gods extinct.', ' Taika Waititi', 2.26, '2022-07-08', '2022-08-21', 300),
(21, '365 Days: This Day', 'Drama/Romance', '628cf123b3f961.36265131.jpg', ' Laura and Massimo are back and stronger than ever. But Massimos family ties and a mysterious man bidding for Lauras heart complicate the lovers lives.', ' Barbara Bialowas', 1.51, '2022-04-27', '2022-05-31', 300),
(22, 'Firestarter', 'Drama/Horror/Sci-fi', '628cf8a457b5c8.90717044.jpg', ' A young girl tries to understand how she mysteriously gained the power to set things on fire with her mind.\r\n\r\n', ' Keith Thomas', 1.34, '2022-05-13', '2022-06-13', 200),
(23, ' Chip and Dale: Rescue Rangers', 'Animation/Adventure/Comedy', '628cf9177899f6.20501213.jpg', ' Thirty years after their popular television show ended, chipmunks Chip and Dale live very different lives. When a cast member from the original series mysteriously disappears, the pair must reunite to save their friend.', 'Akiva Schaffer', 1.37, '2022-05-20', '2022-06-21', 230),
(24, 'The Lost City', 'Action/Adventure/Comedy', 'MP6291ecd9da99f8.83271656.jpg', ' A reclusive romance novelist on a book tour with her cover model gets swept up in a kidnapping attempt that lands them both in a cutthroat jungle adventure.', 'Adam Nee', 1.52, '2022-05-25', '2022-06-23', 210),
(25, 'Jurassic World Dominion', 'Action/Adventure/Sci-fi', 'MP6291efc94c6a96.55524967.jpg', 'Four years after the destruction of Isla Nublar, dinosaurs now live--and hunt--alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with historys most fearsome creatures in a new Era.', 'Colin Trevorrow', 2.26, '2022-05-24', '2022-06-29', 250),
(26, ' Fantastic Beasts: The Secrets of Dumbledore', 'Action/Adventure/Fantasy', 'MP6291f05f2a0971.21169195.jpg', 'Albus Dumbledore assigns Newt and his allies with a mission related to the rising power of Grindelwald.', 'David Yates', 2.22, '2022-04-15', '2022-07-01', 290);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` varchar(255) NOT NULL,
  `ticket_quantity` int(255) NOT NULL,
  `addons` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `referenceId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `first_name`, `last_name`, `full_name`, `title`, `phone_number`, `address`, `email`, `schedule_date`, `schedule_time`, `ticket_quantity`, `addons`, `total_price`, `referenceId`) VALUES
(23, 'Bea Alessandra', 'Sison', 'Bea Alessandra Sison', '365 Days: This Day', '0945-157-1295', '#211, Purok Sampaguita, Poblacion West, Science City of Munoz, Nueva Ecija', 'aaronjaygabato30@gmail.com', '2022-05-31', '8:00 PM', 2, 'Large Popcorn + Large Drink', '760', 'TI-6291ea258caef5.95110551'),
(24, 'Aaron', 'Gabato', 'Aaron Gabato', 'Uncharted', '0945-157-1295', '#211, Purok Sampaguita, Poblacion West', 'aaaaarondalla@gmail.com', '2022-05-30', '1:30 PM', 2, 'Medium Popcorn + Medium Drink', '740', 'TI-6291f9975f2947.94880097');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(5, 'Aaron Jay Gabato', 'aaronjaygabato30@gmail.com', '1c0a11cc4ddc0dbd3fa4d77232a4e22e', 'admin'),
(6, 'Aaron', 'aaaaarondalla@gmail.com', '1c0a11cc4ddc0dbd3fa4d77232a4e22e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
