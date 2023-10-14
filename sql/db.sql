DROP DATABASE IF EXISTS `Doctor Checkup`;
CREATE DATABASE IF NOT EXISTS `Doctor Checkup` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Doctor Checkup`;


CREATE TABLE IF NOT EXISTS `Patient` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(15) NOT NULL DEFAULT '',
   `subject` varchar(50) NOT NULL DEFAULT '',
    `Message` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
