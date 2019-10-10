-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Φεβ 2016 στις 22:49:03
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `cd_store`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart`
--

CREATE TABLE IF NOT EXISTS `new_cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `cd_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cd_value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart_history`
--

CREATE TABLE IF NOT EXISTS `cart_history` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `cd_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cd_value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `cart_history`
--

INSERT INTO `cart_history` (`cart_id`, `cust_id`, `cd_id`, `cd_title`, `cd_value`) VALUES
(30, 6, 17, 'Born Under A Bad Sign', 7),
(31, 8, 43, 'Grit', 18),
(32, 8, 43, 'Grit', 18),
(33, 8, 43, 'Grit', 18),
(34, 8, 19, 'New Morning', 12);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
  `cd_id` int(11) NOT NULL,
  `cd_title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cd_artists` varchar(40) CHARACTER SET utf8 NOT NULL,
  `cd_date` int(4) NOT NULL,
  `cd_studio` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cd_description` varchar(400) CHARACTER SET utf8 NOT NULL,
  `cd_value` int(11) NOT NULL,
  `cd_stock` int(11) NOT NULL,
  `cd_icon_path` text CHARACTER SET utf8 NOT NULL,
  `cd_category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cd_isbn` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `cd`
--

INSERT INTO `cd` (`cd_id`, `cd_title`, `cd_artists`, `cd_date`, `cd_studio`, `cd_description`, `cd_value`, `cd_stock`, `cd_icon_path`, `cd_category`, `cd_isbn`) VALUES
(17, 'Born Under A Bad Sign', 'Albert King', 1967, 'Stax Studios,', 'Genre:Blues\r\nStyle:Delta Blues\r\nYear:1967\r\n', 7, 10, './images_upload/1.jpg', 'blues', 'alb67'),
(18, 'The Freewheelin', 'Bob Dylan', 1963, 'Columbia', 'Country:US\r\nReleased:1963\r\n Genre:Folk, World, & Country\r\n', 10, 10, './images_upload/2.jpg', 'folk', 'bln63'),
(19, 'New Morning', 'Bob Dylan', 1970, 'Columbia', 'Genre:Rock Style:Folk Rock, Country Rock Year:1970', 12, 40, './images_upload/3.jpg', 'folk', 'bln70'),
(20, 'Heathen Chemistry', 'Oasis', 2002, ' Big Brother Records', 'Genre:Rock, Pop\r\nStyle:Brit Pop, Alternative Rock\r\nYear:2002\r\n', 16, 30, './images_upload/6.jpg', 'rock', 'oss02'),
(21, 'I Am The Blues', 'Willie Dixon', 1969, 'Columbia', 'Genre:Blues\r\nStyle:Chicago Blues\r\nYear:1969\r\n', 15, 7, './images_upload/4.jpg', 'blues', 'wdi69'),
(22, 'Definitely Maybe', 'Oasis', 1994, ' Creation Records', 'Genre:Rock\r\nStyle:Alternative Rock, Brit Pop, Indie Rock\r\nYear:1994\r\n', 9, 12, './images_upload/5.jpg', 'rock', 'oss94'),
(23, 'Please Please Me', 'The Beattles', 1963, 'EMI Studios', 'Genre:Rock\r\nStyle:Beat, Rock & Roll\r\nYear:1963\r\n', 7, 24, './images_upload/7.jpg', 'rock', 'tbs63'),
(25, 'A Hard Days Night', 'The Beattles', 1964, 'EMI Studios', 'Genre:Rock, Stage n Screen\r\nStyle:Soundtrack, Beat, Pop Rock\r\nYear:1964\r\n', 11, 4, './images_upload/8.jpg', 'rock', 'tbs64'),
(26, 'Sgt Peppers Lonely Hearts Club Band', 'The Beattles', 1967, 'EMI Studios', 'Genre:Rock Style:Rock n Roll, Psychedelic Rock Year:1967', 10, 8, './images_upload/9.jpg', 'psychedelic', 'tbs67'),
(27, 'Flowers', 'The Rolling Stones', 1967, 'London Records', 'Genre:Rock, Pop\r\nStyle:Blues Rock, Rock & Roll, Rhythm & Blues, Ballad\r\nYear:1967\r\n', 10, 12, './images_upload/10.jpg', 'rock', 'trs67'),
(28, 'Rock N Rolling Stones', 'The Rolling Stones', 1972, 'Decca', 'Genre:Rock, Funk / Soul\r\nStyle:Rhythm & Blues, Classic Rock\r\nYear:1972\r\n', 9, 11, './images_upload/11.jpg', 'rock', 'trs72'),
(29, 'Story Of The Stones', 'The Rolling Stones', 1982, 'K-tel', 'Genre:Rock\r\nStyle:Classic Rock\r\nYear:1982\r\n', 14, 11, './images_upload/12.jpg', 'rock', 'trs82'),
(30, 'Abbey Road', 'The Beattles', 1969, 'EMI Studios', 'Genre:Rock\r\nStyle:Pop Rock\r\nYear:1969\r\n', 9, 21, './images_upload/14.jpg', 'rock', 'tbs69'),
(31, 'Forty Licks', 'The Rolling Stones', 2002, 'Decca', 'GenreRock\r\nStyle:Classic Rock\r\nYear:2002\r\n', 15, 15, './images_upload/13.jpg', 'rock', 'trs02'),
(32, 'A Quick One', 'The Who', 1966, 'IBC Records', 'Genre:Rock Style:Mod, Beat, Psychedelic Rock Year:1966', 15, 12, './images_upload/15.jpg', 'psychedelic', 'twh66'),
(33, 'Who Are You', 'The Who', 1978, 'Ramport Studio', 'Genre:Rock\r\nStyle:Classic Rock\r\nYear:1978\r\n', 13, 11, './images_upload/16.jpg', 'rock', 'twh78'),
(34, 'You Really Got Me', 'The Kinks', 1964, 'IBC Records', 'Country:US\r\nReleased:Nov 1964\r\nGenre:Rock\r\nStyle:Blues Rock, Rock n Roll, Classic Rock\r\n', 13, 6, './images_upload/17.jpg', 'rock', 'knk64'),
(35, 'The Piper At The Gates Of Dawn', 'Pink Floyd', 1967, 'EMI Studios', 'Genre:Rock Style:Psychedelic Rock Year:1967', 12, 11, './images_upload/18.jpg', 'psychedelic', 'pfl67'),
(36, 'The Dark Side Of The Moon', 'Pink Floyd', 1973, 'Abbey Road Studios', 'Genre:Rock\r\nStyle:Classic Rock, Prog Rock\r\nYear:1973\r\n', 13, 11, './images_upload/19.jpg', 'rock', 'pfl73'),
(37, 'The Wall', 'Pink Floyd', 1979, 'Britannia Row', 'Genre:Rock\r\nStyle:Prog Rock, Classic Rock\r\nYear:1979\r\n', 11, 12, './images_upload/20.png', 'rock', 'pfl79'),
(38, 'Animals', 'Pink Floyd', 1977, 'Britannia Row', 'Genre:Rock\r\nStyle:Prog Rock\r\nYear:1977\r\n', 14, 7, './images_upload/21.jpg', 'rock', 'pfl77'),
(39, 'Old New Borrowed And Blue', 'Slade', 1974, 'Polydor', 'Genre:Rock\r\nStyle:Pop Rock, Classic Rock\r\nYear:1974\r\n', 10, 76, './images_upload/22.png', 'rock', 'sld74'),
(40, 'Led Zeppelin IV', 'Led Zeppelin', 1971, 'Atlantic', 'Released:8 November 1971\r\nGenre:Rock\r\nStyle:Hard Rock, Classic Rock, Blues Rock\r\n', 19, 2, './images_upload/23.jpg', 'rock', 'lzp71'),
(41, 'Young Americans', 'David Bowie', 1975, 'RCA', 'Genre:Rock\r\nStyle:Pop Rock, Soul\r\nYear:1975\r\n', 14, 5, './images_upload/24.jpg', 'rock', 'dbe75'),
(42, 'Blackstar', 'David Bowie', 2016, 'Columbia', 'Genre:Jazz, Rock\r\nStyle:Experimental, Jazz Rock, Art Rock\r\nYear:2016\r\n', 21, 30, './images_upload/25.jpg', 'rock', 'dbe16'),
(43, 'Grit', 'Madrugada', 2002, 'Virgin', 'Genre:Rock\r\nBlues Rock, Emo, Soft Rock\r\nYear: 2002', 18, 30, './images_upload/26.jpg', 'rock', 'mgd02'),
(44, 'Appetite for Destruction', 'Guns N Roses', 1987, 'Rumbo Studios', 'Released:July 21, 1987\r\nGenre:Hard rock, heavy metal, hair metal', 10, 58, './images_upload/27.jpg', 'rock', 'gnr87');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_card` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cust_address` varchar(20) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_username`, `cust_password`, `cust_firstname`, `cust_lastname`, `cust_email`, `cust_card`, `cust_address`) VALUES
(2, 'bibo', '1234', 'georgia', 'biboudi', 'bbbb@grg.bb', 'gjyllj', 'adhjklfdddd'),
(3, 'babis', '1234', 'Î¼Ï€Î±Î¼Ï€Î¹Ï‚', 'ÎºÎ±Î»', 'as@gheg.op', 'hygkk', 'wdlly'),
(6, 'ale', '1234', 'alex', 'sof', 'metaxata07@gmail.com', 'ffssfss', 'metaxata , kefalonia'),
(7, 'aaaaa', '1234', 'aaaaaaaaa', 'bbbbbbbbb', 'metaxata07@gmail.com', 'ffssf', 'adhjklfdddd'),
(8, 'bibi', '1234', 'bibi', 'bo', 'bibibo@gmail.uk', '123456987', 'mkdir');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Ευρετήρια για πίνακα `cart_history`
--
ALTER TABLE `cart_history`
  ADD PRIMARY KEY (`cart_id`);

--
-- Ευρετήρια για πίνακα `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`cd_id`);

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_username` (`cust_username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT για πίνακα `cart_history`
--
ALTER TABLE `cart_history`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT για πίνακα `cd`
--
ALTER TABLE `cd`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT για πίνακα `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
