-- MySQL Script generated by MySQL Workbench
-- Thu Jan 23 18:45:30 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_espaco_do_transito
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_espaco_do_transito
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_espaco_do_transito` DEFAULT CHARACTER SET utf8 ;
USE `db_espaco_do_transito` ;

-- -----------------------------------------------------
-- Table `db_espaco_do_transito`.`tb_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_espaco_do_transito`.`tb_message` (
  `idtb_message` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `topic` VARCHAR(45) NOT NULL,
  `message` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`idtb_message`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

CREATE TABLE IF NOT EXISTS `db_espaco_do_transito`.`tb_user` (
  `idtb_user` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtb_user`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `db_espaco_do_transito`.`tb_post` (
  `idtb_post` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `body` TEXT NULL,
  `postDate` DATE NULL,
  PRIMARY KEY (`idtb_post`))
ENGINE = InnoDB;

insert into tb_message(email, name, topic, message, date) values('ruan.vscherer@gmail.com', 'Ruan', 'Ajuda', 'Oi', date(now()));

insert into tb_user(login, password) values("admin", "123");