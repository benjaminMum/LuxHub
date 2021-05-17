-- MySQL Script generated by MySQL Workbench
-- Tue May 11 08:16:42 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema LuxHub
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema LuxHub
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LuxHub` DEFAULT CHARACTER SET utf8 ;
USE `LuxHub` ;

-- -----------------------------------------------------
-- Table `LuxHub`.`Movies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Movies` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Movies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `movie_code` VARCHAR(45) NOT NULL,
  `title` VARCHAR(80) NOT NULL,
  `release_date` DATE NOT NULL,
  `duration` INT NOT NULL,
  `description` VARCHAR(1024) NOT NULL,
  `legal_age` INT NOT NULL,
  `thumbnails` VARCHAR(255) NOT NULL,
  `trailers` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Unique_movie` (`movie_code` ASC) INVISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`Theaters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Theaters` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Theaters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `columns` INT NOT NULL,
  `line` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Unique_theatre` (`name` ASC) INVISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`Sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Sessions` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Sessions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Movies_id` INT NOT NULL,
  `Theaters_id` INT NOT NULL,
  `session_code` VARCHAR(45) NOT NULL,
  `language` VARCHAR(10) NOT NULL,
  `date` DATE NOT NULL,
  `starting_hour` TIME NOT NULL,
  `duration` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Unique_session` (`session_code` ASC) VISIBLE,
  INDEX `fk_Sessions_Movies1_idx` (`Movies_id` ASC) VISIBLE,
  INDEX `fk_Sessions_Theaters1_idx` (`Theaters_id` ASC) VISIBLE,
  CONSTRAINT `fk_Sessions_Movies1`
    FOREIGN KEY (`Movies_id`)
    REFERENCES `LuxHub`.`Movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sessions_Theaters1`
    FOREIGN KEY (`Theaters_id`)
    REFERENCES `LuxHub`.`Theaters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`Account_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Account_type` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Account_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Unique_account_type` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`People`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`People` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`People` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Account_type_id` INT NOT NULL,
  `client_code` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `birthdate` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Unique_person` (`client_code` ASC) VISIBLE,
  INDEX `fk_People_Account_type_idx` (`Account_type_id` ASC) VISIBLE,
  CONSTRAINT `fk_People_Account_type`
    FOREIGN KEY (`Account_type_id`)
    REFERENCES `LuxHub`.`Account_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`Reservations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Reservations` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Reservations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `People_id` INT NOT NULL,
  `Sessions_id` INT NOT NULL,
  `reservation_code` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Reservations_People1_idx` (`People_id` ASC) VISIBLE,
  INDEX `fk_Reservations_Sessions1_idx` (`Sessions_id` ASC) VISIBLE,
  CONSTRAINT `fk_Reservations_People1`
    FOREIGN KEY (`People_id`)
    REFERENCES `LuxHub`.`People` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservations_Sessions1`
    FOREIGN KEY (`Sessions_id`)
    REFERENCES `LuxHub`.`Sessions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LuxHub`.`Seats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LuxHub`.`Seats` ;

CREATE TABLE IF NOT EXISTS `LuxHub`.`Seats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Reservations_id` INT NOT NULL,
  `Name` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Seats_Reservations1_idx` (`Reservations_id` ASC) VISIBLE,
  CONSTRAINT `fk_Seats_Reservations1`
    FOREIGN KEY (`Reservations_id`)
    REFERENCES `LuxHub`.`Reservations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
