CREATE DATABASE IF NOT EXISTS `CLAVIERS_ET_SOURIS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CLAVIERS_ET_SOURIS`;


CREATE TABLE `SOURIS_COMPATIBLE` (
  `id_souris` int,
  `os` VARCHAR(42),
  `nom_driver` VARCHAR(42),
  PRIMARY KEY (`id_souris`, `os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `OS` (
  `nom` VARCHAR(42),
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLAVIER_COMPATIBLE` (
  `id_clavier` int,
  `os` VARCHAR(42),
  `nom_driver` VARCHAR(42),
  PRIMARY KEY (`id_clavier`, `os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SOURIS` (
  `id` int AUTO_INCREMENT,
  `prix` VARCHAR(42),
  `nom` VARCHAR(42),
  `marque` VARCHAR(42),
  `trackball` boolean not null,
  `trackpad` boolean not null,
  `bluetooth` boolean not null,
  `hlink` VARCHAR(200), /* hyperlien vers le site de la souris */
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLAVIER` (
  `id` int AUTO_INCREMENT,
  `prix` float,
  `nom` VARCHAR(42),
  `marque` VARCHAR(42),
  `mécanique` boolean not null,
  `nombre_touches` int,
  `split` boolean not null,
  `deux_parties` boolean not null,
  `columnar` boolean not null,
  `orthogonal` boolean not null,
  `manuform` boolean not null,
  `programmable` boolean,
  `bluetooth` boolean not null,
  `hlink` VARCHAR(200), /* hyperlien vers le site du clavier */
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SOURIS_SUR_CLAVIER` (
    `id_souris` int,
    `id_clavier` int,
    `position` VARCHAR(42),
    PRIMARY KEY (`id_souris`, `id_clavier`)
);

CREATE TABLE `SOURIS_SUR_ORDINATEUR` (
  `id_souris` int,
  `id_ordi` int,
  PRIMARY KEY (`id_souris`, `id_ordi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ORDINATEUR` (
  `id` int AUTO_INCREMENT,
  `nom` VARCHAR(42),
  `marque` VARCHAR(42),
  `prix` float,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLAVIER_SUR_ORDINATEUR` (
  `id_clavier` int,
  `id_ordi` int,
  PRIMARY KEY (`id_clavier`, `id_ordi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `SOURIS_COMPATIBLE` ADD FOREIGN KEY (`os`) REFERENCES `OS` (`nom`);
ALTER TABLE `SOURIS_COMPATIBLE` ADD FOREIGN KEY (`id_souris`) REFERENCES `SOURIS` (`id`);
ALTER TABLE `CLAVIER_COMPATIBLE` ADD FOREIGN KEY (`os`) REFERENCES `OS` (`nom`);
ALTER TABLE `CLAVIER_COMPATIBLE` ADD FOREIGN KEY (`id_clavier`) REFERENCES `CLAVIER` (`id`);
ALTER TABLE `SOURIS_SUR_CLAVIER` ADD FOREIGN KEY (`id_souris`) REFERENCES `SOURIS` (`id`);
ALTER TABLE `SOURIS_SUR_CLAVIER` ADD FOREIGN KEY (`id_clavier`) REFERENCES `CLAVIER` (`id`);
ALTER TABLE `SOURIS_SUR_ORDINATEUR` ADD FOREIGN KEY (`id_ordi`) REFERENCES `ORDINATEUR` (`id`);
ALTER TABLE `SOURIS_SUR_ORDINATEUR` ADD FOREIGN KEY (`id_souris`) REFERENCES `SOURIS` (`id`);
ALTER TABLE `CLAVIER_SUR_ORDINATEUR` ADD FOREIGN KEY (`id_ordi`) REFERENCES `ORDINATEUR` (`id`);
ALTER TABLE `CLAVIER_SUR_ORDINATEUR` ADD FOREIGN KEY (`id_clavier`) REFERENCES `CLAVIER` (`id`);

