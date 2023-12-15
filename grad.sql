-- Adminer 4.8.1 MySQL 10.5.19-MariaDB-0+deb11u2 dump

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
('gg',	'gg',	'11',	'gg@gmail.com',	'11',	'Hey feat coucou',	'✅',	3),
('t',	't',	'43',	'abc@gmail.com',	'23241234',	'REUSSI',	'❌',	4)
ON DUPLICATE KEY UPDATE `nom` = VALUES(`nom`), `prenom` = VALUES(`prenom`), `cp` = VALUES(`cp`), `email` = VALUES(`email`), `tel` = VALUES(`tel`), `message` = VALUES(`message`), `etat` = VALUES(`etat`), `id` = VALUES(`id`);

DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `produits` (`id`, `nom`, `desc`, `prix`, `quantite`, `img`) VALUES
(1,	'Accoya',	'',	29.99,	10,	'accoya.jpg'),
(2,	'Thermofrene',	'',	14.99,	10,	'thermofrene.png'),
(3,	'Kebony',	'',	19.99,	10,	'kebony.jpg'),
(4,	'Thermopin',	'',	10.00,	10,	'thermopin.jpg')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nom` = VALUES(`nom`), `desc` = VALUES(`desc`), `prix` = VALUES(`prix`), `quantite` = VALUES(`quantite`), `img` = VALUES(`img`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `pseudo`, `password`) VALUES
(2,	'test',	'$2y$10$Y0kzX0etCJw3942faLwnVeJe8XfmBHZ.HG.AY3eBRpj3tubwvUz7W'),
(3,	'admin',	'$2y$10$qiJhhuw9QCb/tL0lUuaiZOCUT8Ia6Sdhc9QZQnBV1vBNfpSdAqki6')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `pseudo` = VALUES(`pseudo`), `password` = VALUES(`password`);

-- 2023-12-15 10:54:28
