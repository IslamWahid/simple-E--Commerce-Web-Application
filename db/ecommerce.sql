-- MySQL Script generated by MySQL Workbench
-- Fri 10 Feb 2017 12:57:10 AM EET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema E-Commerce
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema E-Commerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `E-Commerce` DEFAULT CHARACTER SET utf8 ;
USE `E-Commerce` ;

-- -----------------------------------------------------
-- Table `E-Commerce`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `birthdate` DATE NOT NULL,
  `job` VARCHAR(45) NULL,
  `address` VARCHAR(100) NULL,
  `creditlimit` DOUBLE UNSIGNED NOT NULL,
  `isadmin` TINYINT NOT NULL DEFAULT 0,
  `isdeleted` TINYINT NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `iduser_UNIQUE` (`iduser` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`category` (
  `idcategory` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `idsupercategory` INT NULL,
  `isdeleted` TINYINT NOT NULL,
  PRIMARY KEY (`idcategory`),
  INDEX `idparentcategory_idx` (`idsupercategory` ASC),
  CONSTRAINT `idsubcategory`
    FOREIGN KEY (`idsupercategory`)
    REFERENCES `E-Commerce`.`category` (`idcategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`product` (
  `idproduct` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` DOUBLE UNSIGNED NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `image` VARCHAR(45) NULL,
  `idcategory` INT NULL,
  `isdeleted` TINYINT NOT NULL,
  PRIMARY KEY (`idproduct`),
  INDEX `id_idx` (`idcategory` ASC),
  CONSTRAINT ``
    FOREIGN KEY (`idcategory`)
    REFERENCES `E-Commerce`.`category` (`idcategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`order` (
  `idorder` INT NOT NULL,
  `date` DATE NOT NULL,
  `iduser` INT NULL,
  `isdeleted` TINYINT NOT NULL,
  PRIMARY KEY (`idorder`),
  INDEX `_idx` (`iduser` ASC),
  CONSTRAINT `iduser`
    FOREIGN KEY (`iduser`)
    REFERENCES `E-Commerce`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`cart` (
  `idproduct` INT NOT NULL,
  `iduser` INT NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idproduct`, `iduser`),
  INDEX `fk_cart_1_idx` (`iduser` ASC),
  INDEX `fk_cart_2_idx` (`idproduct` ASC),
  CONSTRAINT `fk_cart_1`
    FOREIGN KEY (`iduser`)
    REFERENCES `E-Commerce`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_2`
    FOREIGN KEY (`idproduct`)
    REFERENCES `E-Commerce`.`product` (`idproduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`interest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`interest` (
  `iduser` INT NOT NULL,
  `idcategory` INT NOT NULL,
  PRIMARY KEY (`iduser`, `idcategory`),
  INDEX `fk_interest_2_idx` (`idcategory` ASC),
  CONSTRAINT `fk_interest_1`
    FOREIGN KEY (`iduser`)
    REFERENCES `E-Commerce`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_interest_2`
    FOREIGN KEY (`idcategory`)
    REFERENCES `E-Commerce`.`category` (`idcategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `E-Commerce`.`orderproduct`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `E-Commerce`.`orderproduct` (
  `idorder` INT NOT NULL,
  `idproduct` INT NOT NULL,
  `unitprice` DOUBLE UNSIGNED NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idorder`, `idproduct`),
  INDEX `fk_orderproduct_2_idx` (`idproduct` ASC),
  CONSTRAINT `fk_orderproduct_1`
    FOREIGN KEY (`idorder`)
    REFERENCES `E-Commerce`.`order` (`idorder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orderproduct_2`
    FOREIGN KEY (`idproduct`)
    REFERENCES `E-Commerce`.`product` (`idproduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
