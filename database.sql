-- -----------------------------------------------------
-- Schema astar_bdd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `astar_bdd` DEFAULT CHARACTER SET utf8;

USE `astar_bdd`;

DROP USER IF EXISTS 'username'@'localhost';
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `astar_bdd`.* TO 'username'@'localhost';
FLUSH PRIVILEGES;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Rarity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Rarity`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Rarity` (
    `idRarity` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`idRarity`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item_Stats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item_Stats`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item_Stats` (
    `idItem_Stats` INT NOT NULL AUTO_INCREMENT,
    `bonus` TINYINT NULL,
    `attack` INT NULL,
    `defense` INT NULL,
    `speed` INT NULL,
    `hp` INT NULL,
    PRIMARY KEY (`idItem_Stats`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item_Categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item_Categories`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item_Categories` (
    `idItem_Categories` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`idItem_Categories`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item` (
    `idItem` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `item_stats` INT NULL,
    `item_categories` INT NULL,
    `item_rarity` INT NULL,
    PRIMARY KEY (`idItem`),
    CONSTRAINT `item_stats` FOREIGN KEY (`item_stats`) REFERENCES `astar_bdd`.`Item_Stats` (`idItem_Stats`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `item_categories` FOREIGN KEY (`item_categories`) REFERENCES `astar_bdd`.`Item_Categories` (`idItem_Categories`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `item_rarity` FOREIGN KEY (`item_rarity`) REFERENCES `astar_bdd`.`Rarity` (`idRarity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monstre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monstre`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monstre` (
    `idMonstre` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `image` TEXT(255) NULL,
    `base_attack` INT NULL,
    `base_defense` INT NULL,
    `base_speed` INT NULL,
    `base_hp` INT NULL,
    `base_rarity` INT NULL,
    PRIMARY KEY (`idMonstre`),
    CONSTRAINT `rarity` FOREIGN KEY (`base_rarity`) REFERENCES `astar_bdd`.`Rarity` (`idRarity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monster_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monster_Type`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monster_Type` (
    `idMonster_Type` INT NOT NULL AUTO_INCREMENT,
    `nameType` VARCHAR(45) NULL,
    `weakness` JSON NULL,
    `resistant` JSON NULL,
    `immune` JSON NULL,
    PRIMARY KEY (`idMonster_Type`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monster_Type_Relation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monster_Type_Relation`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monster_Type_Relation` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `monster_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `monster` FOREIGN KEY (`monster_id`) REFERENCES `astar_bdd`.`Monstre` (`idMonstre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `astar_bdd`.`Monster_Type` (`idMonster_Type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Evolve`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Evolve`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Evolve` (
    `idEvolve` INT NOT NULL AUTO_INCREMENT,
    `base_monster` INT NULL,
    `evolve_level` INT NULL,
    `evolved_monster` INT NULL,
    `tokens` INT NULL,
    PRIMARY KEY (`idEvolve`),
    CONSTRAINT `base_monster` FOREIGN KEY (`base_monster`) REFERENCES `astar_bdd`.`Monstre` (`idMonstre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `evolved_monster` FOREIGN KEY (`evolved_monster`) REFERENCES `astar_bdd`.`Monstre` (`idMonstre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `token` FOREIGN KEY (`tokens`) REFERENCES `astar_bdd`.`Item` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Dungeon`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Dungeon`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Dungeon` (
    `idDungeon` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `dungeon_rarity` INT NULL,
    `stamina_cost` INT NULL,
    `available_days` JSON NULL,
    `loot_table` JSON NULL,
    PRIMARY KEY (`idDungeon`),
    CONSTRAINT `dungeon_rarity` FOREIGN KEY (`dungeon_rarity`) REFERENCES `astar_bdd`.`Rarity` (`idRarity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Player`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Player` (
    `idPlayer` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NULL,
    `img` TEXT(255) NULL,
    `lvl` INT NULL,
    `xp` DOUBLE NULL,
    `money` INT NULL,
    `gem` INT NULL,
    `stamina` INT NULL,
    `create_time` VARCHAR(255) NOT NULL,
    `last_login` VARCHAR(255) NULL,
    PRIMARY KEY (`idPlayer`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Portal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Portal`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`Portal` (
    `idPortal` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `gem_cost` INT NULL,
    `monster_table` JSON NULL,
    `portal_rarity` INT NULL,
    PRIMARY KEY (`idPortal`),
    CONSTRAINT `portal_rarity` FOREIGN KEY (`portal_rarity`) REFERENCES `astar_bdd`.`Rarity` (`idRarity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`timestamps`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`timestamps`;

CREATE TABLE IF NOT EXISTS `astar_bdd`.`timestamps` (
    `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `update_time` TIMESTAMP NULL
);