-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cp` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `message` text NOT NULL,
  `etat` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `form` (`nom`, `prenom`, `cp`, `email`, `tel`, `message`, `etat`, `id`) VALUES
('test',	'test',	'1212',	'gg@gmail.com',	'5443232',	'Hey moi c\'est gaetan',	'✅',	1),
('test',	'test',	'1212',	'gg@gmail.com',	'5443232',	'Hey moi c\'est gaetan',	'📝',	2),
('gg',	'gg',	'11',	'gg@gmail.com',	'11',	'Hey feat coucou',	'📝',	3),
('t',	't',	'43',	'abc@gmail.com',	'23241234',	'REUSSI',	'❌',	4);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `pseudo`, `password`) VALUES
(2,	'test',	'$2y$10$Y0kzX0etCJw3942faLwnVeJe8XfmBHZ.HG.AY3eBRpj3tubwvUz7W'),
(3,	'admin',	'$2y$10$qiJhhuw9QCb/tL0lUuaiZOCUT8Ia6Sdhc9QZQnBV1vBNfpSdAqki6');

-- 2023-11-25 10:19:51
