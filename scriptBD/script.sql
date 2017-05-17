-- MySQL Script generated by MySQL Workbench
-- 05/17/17 08:30:47
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbClientes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbClientes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbClientes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dbClientes` ;

-- -----------------------------------------------------
-- Table `dbClientes`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbClientes`.`Clientes` (
  `cli_id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `cli_fantasia` VARCHAR(255) NULL COMMENT '',
  `cli_responsavel` VARCHAR(255) NULL COMMENT '',
  `cli_doctipo` VARCHAR(5) NULL COMMENT '',
  `cli_docnumero` VARCHAR(50) NULL COMMENT '',
  `cli_timestamp` TIMESTAMP NULL COMMENT '',
  PRIMARY KEY (`cli_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbClientes`.`Estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbClientes`.`Estados` (
  `est_id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `est_nome` VARCHAR(50) NULL COMMENT '',
  `est_timestamp` TIMESTAMP NULL COMMENT '',
  PRIMARY KEY (`est_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbClientes`.`Cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbClientes`.`Cidades` (
  `cid_id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `cid_nome` VARCHAR(50) NULL COMMENT '',
  `cid_timestamp` TIMESTAMP NULL COMMENT '',
  `est_id` BIGINT NULL COMMENT '',
  PRIMARY KEY (`cid_id`)  COMMENT '',
  INDEX `cidades_fk_1_idx` (`est_id` ASC)  COMMENT '',
  CONSTRAINT `cidades_fk_1`
    FOREIGN KEY (`est_id`)
    REFERENCES `dbClientes`.`Estados` (`est_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbClientes`.`Logradouros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbClientes`.`Logradouros` (
  `log_id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `log_cep` VARCHAR(9) NULL COMMENT '',
  `log_nome` VARCHAR(100) NULL COMMENT '',
  `log_tipo` VARCHAR(50) NULL COMMENT '',
  `log_bairro` VARCHAR(100) NULL COMMENT '',
  `log_timestamp` TIMESTAMP NULL COMMENT '',
  `cid_id` BIGINT NULL COMMENT '',
  PRIMARY KEY (`log_id`)  COMMENT '',
  INDEX `logradouros_fk_1_idx` (`cid_id` ASC)  COMMENT '',
  CONSTRAINT `logradouros_fk_1`
    FOREIGN KEY (`cid_id`)
    REFERENCES `dbClientes`.`Cidades` (`cid_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbClientes`.`Enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbClientes`.`Enderecos` (
  `end_id` BIGINT NOT NULL AUTO_INCREMENT COMMENT '',
  `end_complemento` VARCHAR(255) NULL COMMENT '',
  `end_numero` VARCHAR(255) NULL COMMENT '',
  `cli_id` BIGINT NULL COMMENT '',
  `log_id` BIGINT NULL COMMENT '',
  PRIMARY KEY (`end_id`)  COMMENT '',
  INDEX `enderecos_fk_1_idx` (`log_id` ASC)  COMMENT '',
  CONSTRAINT `enderecos_fk_1`
    FOREIGN KEY (`log_id`)
    REFERENCES `dbClientes`.`Logradouros` (`log_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `enderecos_fk_2`
    FOREIGN KEY (`log_id`)
    REFERENCES `dbClientes`.`Clientes` (`cli_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
