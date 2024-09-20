SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+06:00"; -- time zone for the database session


--                 Database: Flex

-- --------------------------------------------------------

-- Create the 'categories' table

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


-- Data for Categories

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
  (1, 'Hindi Movies'),
  (2, 'English Movies'),
  (3, 'Animation Movies'),
  (4, 'South Indian Dubbed Movies'),
  (5, 'English Hindi Dubbed Movies'),
  (6, 'English & Foreign TV Series'),
  (7, 'Dubbed TV Series & Shows'),
  (8, 'Indian TV Series'),
  (9, 'Hindi TV Serials'),
  (10, 'Bangla Movies');




-- Table structure for Movies

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `mid` int(100) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(150) NOT NULL,
  `movie_genre` varchar(30) NOT NULL,
  `movie_cover_path` varchar(200) NOT NULL,
  `movie_file_path` varchar(200) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`mid`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4; -- define the characteristics of the table

-- Sample Data for Movies

INSERT INTO `movies` (`mid`, `movie_name`, `movie_genre`, `movie_cover_path`, `movie_file_path`, `category_id`) VALUES
(1, 'Jawan', 'action', 'media/covers/jawan.jpg', 'media/movies/Jawan Trailer.mp4', 1),
(2, 'Blue Beetle', 'sci-fi', 'media/covers/blue beetle.jpg', 'media/movies/Blue Beetle Trailer.mp4', 2),
(3, 'Black Adam', 'action', 'media/covers/black adam.jpg', 'media/movies/Black Adam Trailer.mp4', 2),
(4, 'Avengers Infinity War', 'action', 'media/covers/avengers infinity war.jpg', 'media/movies/Avengers Infinity War Trailer.mp4', 2),
(5, 'Godzila vs. Kong', 'action', 'media/covers/godzila vs. kong.jpg', 'media/movies/Godzila vs. Kong Trailer.mp4', 2),
(6, 'Avengers Endgame', 'sci-fi', 'media/covers/avengers endgame.jpg', 'media/movies/Avengers Endgame Trailer.mp4', 2),
(7, 'The Adam Project', 'sci-fi', 'media/covers/the adam project.jpg', 'media/movies/The Adam Project Trailer.mp4', 2),
(8, 'The Flash', 'sci-fi', 'media/covers/the flash.jpg', 'media/movies/The Flash Trailer.mp4', 2),
(9, 'The Conjuring 1', 'horror', 'media/covers/the conjuring 1.jpg', 'media/movies/The Conjuring 1 Trailer.mp4', 2),
(10, 'The Conjuring 2', 'horror', 'media/covers/the conjuring 2.jpg', 'media/movies/The Conjuring 2 Trailer.mp4', 2),
(11, 'The Nun', 'horror', 'media/covers/the nun.jpg', 'media/movies/The Nun Trailer.mp4', 2),
(12, 'Transformer The Last Knight', 'action', 'media/covers/transformer the last knight.jpg', 'media/movies/Transformer The Last Knight Trailer.mp4', 2),
(13, 'Battleship', 'sci-fi', 'media/covers/battleship.jpg', 'media/movies/Battleship Trailer.mp4', 2),
(14, 'Interstellar', 'sci-fi', 'media/covers/interstellar.jpg', 'media/movies/Interstellar Trailer.mp4', 2),
(15, 'Johny English Reborn', 'comedy', 'media/covers/johny english reborn.jpg', 'media/movies/Johny English Reborn Trailer.mp4', 2),
(16, 'Justice League', 'action', 'media/covers/justice league.jpg', 'media/movies/Justice League Trailer.mp4', 2),
(17, 'The Pops Exorcist', 'horror', 'media/covers/the pops exorcist.jpg', 'media/movies/The Pops Exorcist Trailer.mp4', 2),
(18, 'Total Dhamaal', 'comedy', 'media/covers/total dhamaal.jpg', 'media/movies/Total Dhamaal Trailer.mp4', 1),
(19, '3 Idiots', 'comedy', 'media/covers/3 idiots.jpg', 'media/movies/3 Idiots Trailer.mp4', 1),
(20, 'Phir Hera Pheri', 'comedy', 'media/covers/phir hera pheri.jpg', 'media/movies/Phir Hera Pheri Trailer.mp4', 1),
(21, 'The Devil Conspiracy', 'horror', 'media/covers/the devil conspiracy.jpg', 'media/movies/The Devil Conspiracy Trailer.mp4', 2),
(22, 'Khatta Meetha', 'comedy', 'media/covers/khatta meetha.jpg', 'media/movies/Khatta Meetha Trailer.mp4', 1),
(23, 'Welcome', 'comedy', 'media/covers/welcome.jpg', 'media/movies/Welcome.mp4', 1),
(24, 'The Nun 2', 'horror', 'media/covers/the nun 2.jpg', 'media/movies/The Nun 2 Trailer.mp4', 2);




-- Table Structure for Users

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4; -- define the characteristics of the table
-- first 10 uid reserve for admin
-- Sample Data for Admin & User

INSERT INTO `users` (`uid`, `name`, `profile_image`, `email`, `password`) VALUES
(1, 'Nazmus Saif', 'media/profileimage/admin1.png', 'saif@flex.com', 'saif'),
(2, 'Tanvir Zaman', 'media/profileimage/admin2.jpg', 'tanvir@flex.com', 'tanvir'),
(3, 'Eastiaq Evan', 'media/profileimage/admin3.jpg', 'evan@flex.com', 'evan'),
(11, 'Alam Shikdar', 'media/profileimage/alam.jpg', 'user@flex.com', 'user');
COMMIT;


-- Table Structure for comments

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `comment_text` varchar(500) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`mid`) REFERENCES `movies`(`mid`),
  FOREIGN KEY (`uid`) REFERENCES `users`(`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
