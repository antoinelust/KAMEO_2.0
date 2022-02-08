-- MySQL Script generated by MySQL Workbench
-- Tue Feb  8 15:19:18 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema kameo-bdd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kameo-bdd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kameo-bdd` DEFAULT CHARACTER SET utf8 ;
USE `kameo-bdd` ;

-- -----------------------------------------------------
-- Table `kameo-bdd`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`companies` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `billing_group` INT(2) NULL,
  `street` TEXT NULL,
  `zip` INT(11) NULL,
  `city` TEXT NULL,
  `vat_number` VARCHAR(50) NULL,
  `type` ENUM('client', 'prospect', 'old_prospect', 'old_client', 'not_interested') NULL,
  `aquisition` VARCHAR(150) NULL,
  `audience` ENUM('B2B', 'B2C', 'INDEPENDANT') NULL,
  `status` ENUM('actif', 'inactif') NULL DEFAULT 'actif',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` TEXT NOT NULL,
  `userscol` TEXT NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `emai_verified_at` TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(45) NULL,
  `phone` VARCHAR(20) NULL,
  `zip` INT(11) NULL,
  `strett` TEXT NULL,
  `city` TEXT NULL,
  `work_street` TEXT NULL,
  `work_zip` INT(11) NULL,
  `work_city` TEXT NULL,
  `role` INT(11) NULL DEFAULT 0,
  `status` ENUM('actif', 'inactif') NULL DEFAULT 'actif',
  `companys_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_companys_idx` (`companys_id` ASC),
  CONSTRAINT `fk_users_companys`
    FOREIGN KEY (`companys_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`companies_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`companies_contact` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(255) NOT NULL,
  `function` VARCHAR(255) NOT NULL,
  `type` ENUM('billing', 'ccBilling', 'contact') NOT NULL DEFAULT 'contact',
  `companies_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_companies_contact_companies1_idx` (`companies_id` ASC),
  CONSTRAINT `fk_companies_contact_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`offer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`offer` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `probability` INT(3) NOT NULL,
  `type` VARCHAR(25) NOT NULL,
  `amount` INT(11) NOT NULL,
  `margin` INT(3) NULL,
  `validity_date` DATE NULL,
  `start` DATE NULL,
  `end` DATE NULL,
  `file_name` VARCHAR(150) NOT NULL,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `step` ENUM('ongoing', 'done', 'lost') NOT NULL,
  `companies_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_offer_companies1_idx` (`companies_id` ASC),
  CONSTRAINT `fk_offer_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `kameo-bdd`.`offers_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`offers_details` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_type` VARCHAR(150) NULL,
  `item_id` INT NULL,
  `lising_price` FLOAT NULL,
  `selling_price` FLOAT NULL,
  `contract_duration` INT NULL,
  `size` VARCHAR(10) NULL,
  `status` ENUM('actif', 'inactif') NULL DEFAULT 'actif',
  `offer_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_offers_details_offer1_idx` (`offer_id` ASC),
  CONSTRAINT `fk_offers_details_offer1`
    FOREIGN KEY (`offer_id`)
    REFERENCES `kameo-bdd`.`offer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`bikes_catalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`bikes_catalog` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(20) NULL,
  `model` VARCHAR(30) NULL,
  `frame_type` VARCHAR(30) NULL,
  `utilisation` VARCHAR(30) NULL,
  `electric` VARCHAR(1) NULL,
  `motor` VARCHAR(150) NULL,
  `battery` VARCHAR(150) NULL,
  `transmition` VARCHAR(150) NULL,
  `sizes` SET('XS', 'S', 'M', 'L', 'XL', 'unique') NULL,
  `season` VARCHAR(150) NOT NULL,
  `buying_price` FLOAT NULL,
  `price_htva` FLOAT NOT NULL,
  `minimal_stock` INT(11) NOT NULL DEFAULT 0,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`bikes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`bikes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `frame_number` VARCHAR(45) NULL,
  `size` VARCHAR(10) NULL,
  `color` VARCHAR(150) NOT NULL,
  `contract_type` VARCHAR(150) NULL,
  `contract_start` DATE NOT NULL,
  `contract_end` DATE NOT NULL,
  `estimated_delivery_date` DATE NOT NULL,
  `delivery_date` DATE NOT NULL,
  `selling_date` DATE NOT NULL,
  `client_name` VARCHAR(255) NULL,
  `frame_reference` VARCHAR(50) NULL,
  `key_reference` VARCHAR(50) NOT NULL,
  `locker_reference` VARCHAR(50) NOT NULL,
  `plate_number` VARCHAR(50) NOT NULL,
  `billing_type` VARCHAR(150) NOT NULL,
  `lising_price` FLOAT NOT NULL,
  `selling_price` FLOAT NULL,
  `usable` VARCHAR(2) NULL,
  `insurance` VARCHAR(1) NULL,
  `insurance_individual` VARCHAR(1) NULL,
  `insurance_civil_responsivity` VARCHAR(1) NOT NULL,
  `insurance_civil_responsivity_contract` TEXT NOT NULL,
  `bike_price` FLOAT NOT NULL,
  `bike_buying_date` DATE NOT NULL,
  `billing_group` INT(2) NULL,
  `gps_id` VARCHAR(255) NOT NULL,
  `localisation` VARCHAR(255) NOT NULL,
  `comment_billing` TEXT NULL,
  `address` TEXT NULL,
  `display_group` VARCHAR(255) NULL DEFAULT '1generic',
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `bikes_catalog_id` INT UNSIGNED NOT NULL,
  `companies_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bikes_bikes_catalog1_idx` (`bikes_catalog_id` ASC),
  INDEX `fk_bikes_companies1_idx` (`companies_id` ASC),
  CONSTRAINT `fk_bikes_bikes_catalog1`
    FOREIGN KEY (`bikes_catalog_id`)
    REFERENCES `kameo-bdd`.`bikes_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bikes_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`customers_bikes_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`customers_bikes_access` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(50) NULL,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `users_id` INT UNSIGNED NOT NULL,
  `bikes_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customers_bikes_access_users1_idx` (`users_id` ASC),
  INDEX `fk_customers_bikes_access_bikes1_idx` (`bikes_id` ASC),
  CONSTRAINT `fk_customers_bikes_access_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_bikes_access_bikes1`
    FOREIGN KEY (`bikes_id`)
    REFERENCES `kameo-bdd`.`bikes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`customers_buildings_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`customers_buildings_access` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `users_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customers_buildings_access_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_customers_buildings_access_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`bikes_buildings_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`bikes_buildings_access` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `bikes_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bikes_buildings_access_bikes1_idx` (`bikes_id` ASC),
  CONSTRAINT `fk_bikes_buildings_access_bikes1`
    FOREIGN KEY (`bikes_id`)
    REFERENCES `kameo-bdd`.`bikes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`buildings` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference` VARCHAR(150) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `address` TEXT NOT NULL,
  `customers_buildings_access_id` INT UNSIGNED NOT NULL,
  `companies_id` INT UNSIGNED NOT NULL,
  `bikes_buildings_access_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_buildings_customers_buildings_access1_idx` (`customers_buildings_access_id` ASC),
  INDEX `fk_buildings_companies1_idx` (`companies_id` ASC),
  INDEX `fk_buildings_bikes_buildings_access1_idx` (`bikes_buildings_access_id` ASC),
  CONSTRAINT `fk_buildings_customers_buildings_access1`
    FOREIGN KEY (`customers_buildings_access_id`)
    REFERENCES `kameo-bdd`.`customers_buildings_access` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_buildings_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_buildings_bikes_buildings_access1`
    FOREIGN KEY (`bikes_buildings_access_id`)
    REFERENCES `kameo-bdd`.`bikes_buildings_access` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`accessories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`accessories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` VARCHAR(15) NOT NULL,
  `contract_type` VARCHAR(150) NOT NULL,
  `contract_start` DATE NULL,
  `contract_end` DATE NULL,
  `contract_amount` FLOAT NULL,
  `selling_date` DATE NULL,
  `selling_amount` FLOAT NULL,
  `estimated_delivery_date` DATE NULL,
  `delivery_date` DATE NULL,
  `status` ENUM('actif', 'inactif') NULL DEFAULT 'actif',
  `users_id` INT UNSIGNED NOT NULL,
  `bikes_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_accessories_users1_idx` (`users_id` ASC),
  INDEX `fk_accessories_bikes1_idx` (`bikes_id` ASC),
  CONSTRAINT `fk_accessories_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_accessories_bikes1`
    FOREIGN KEY (`bikes_id`)
    REFERENCES `kameo-bdd`.`bikes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`accessories_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`accessories_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `parent_category` INT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`accessories_catalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`accessories_catalog` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(100) NOT NULL,
  `model` VARCHAR(100) NOT NULL,
  `sizes` SET('XS', 'S', 'M', 'L', 'XL', 'S/M', 'M/L', 'L/XL', 'unique') NOT NULL DEFAULT 'unique',
  `buying_price` FLOAT NULL,
  `price_htva` FLOAT NOT NULL,
  `description` TEXT NULL,
  `provider` VARCHAR(50) NOT NULL,
  `minimal_stock` INT(11) NOT NULL DEFAULT 0,
  `optimal_stock` INT(11) NOT NULL DEFAULT 0,
  `display` VARCHAR(1) NULL DEFAULT 'N',
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `accessories_categories_id` INT UNSIGNED NOT NULL,
  `accessories_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_accessories_catalog_accessories_categories1_idx` (`accessories_categories_id` ASC),
  INDEX `fk_accessories_catalog_accessories1_idx` (`accessories_id` ASC),
  CONSTRAINT `fk_accessories_catalog_accessories_categories1`
    FOREIGN KEY (`accessories_categories_id`)
    REFERENCES `kameo-bdd`.`accessories_categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_accessories_catalog_accessories1`
    FOREIGN KEY (`accessories_id`)
    REFERENCES `kameo-bdd`.`accessories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`boxes_catalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`boxes_catalog` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(50) NOT NULL,
  `production_price` FLOAT NOT NULL,
  `installation_price` FLOAT NOT NULL,
  `location_price` FLOAT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`boxes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`boxes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference` VARCHAR(150) NOT NULL,
  `model` VARCHAR(15) NOT NULL,
  `contract_start` DATE NULL,
  `contract_end` DATE NULL,
  `amount_type` FLOAT NULL,
  `billing_group` INT(1) NULL,
  `door` ENUM('open', 'closed') NOT NULL DEFAULT 'closed',
  `open_date` TIMESTAMP NOT NULL,
  `status` ENUM('actif', 'inactif') NOT NULL DEFAULT 'actif',
  `boxes_catalog_id` INT UNSIGNED NOT NULL,
  `buildings_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_boxes_boxes_catalog1_idx` (`boxes_catalog_id` ASC),
  INDEX `fk_boxes_buildings1_idx` (`buildings_id` ASC),
  CONSTRAINT `fk_boxes_boxes_catalog1`
    FOREIGN KEY (`boxes_catalog_id`)
    REFERENCES `kameo-bdd`.`boxes_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_boxes_buildings1`
    FOREIGN KEY (`buildings_id`)
    REFERENCES `kameo-bdd`.`buildings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`reservation` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `start` TIMESTAMP NOT NULL,
  `end` TIMESTAMP NOT NULL,
  `building_start` VARCHAR(150) NOT NULL,
  `building_end` VARCHAR(150) NOT NULL,
  `extensions` INT(2) NULL DEFAULT 0,
  `initial_end_date` TIMESTAMP NULL,
  `status` ENUM('actif', 'inactif') NULL DEFAULT 'actif',
  `bikes_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reservation_bikes1_idx` (`bikes_id` ASC),
  INDEX `fk_reservation_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_reservation_bikes1`
    FOREIGN KEY (`bikes_id`)
    REFERENCES `kameo-bdd`.`bikes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`reservation_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`reservation_details` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `action` VARCHAR(150) NOT NULL,
  `timestamp` TIMESTAMP NOT NULL,
  `outcome` VARCHAR(150) NOT NULL,
  `boxes_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reservation_details_boxes1_idx` (`boxes_id` ASC),
  CONSTRAINT `fk_reservation_details_boxes1`
    FOREIGN KEY (`boxes_id`)
    REFERENCES `kameo-bdd`.`boxes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`barcodes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`barcodes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(20) NOT NULL,
  `barcode` VARCHAR(20) NOT NULL,
  `size` VARCHAR(20) NULL,
  `color` VARCHAR(20) NULL,
  `catalog_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`bills`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`bills` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `bineficiary_company` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL,
  `amount_htva` FLOAT NOT NULL,
  `amount_vat` FLOAT NOT NULL,
  `billing_group` INT NULL,
  `communication` VARCHAR(45) NULL,
  `file_name` VARCHAR(255) NOT NULL,
  `facture_send` VARCHAR(1) NOT NULL DEFAULT 'N',
  `facture_send_date` DATE NULL,
  `facture_paid` VARCHAR(1) NULL DEFAULT 'N',
  `facture_paid_date` DATE NULL,
  `facture_limit_paid_date` DATE NULL,
  `accounting` VARCHAR(1) NOT NULL DEFAULT 'N',
  `type` VARCHAR(50) NULL,
  `payement` ENUM('cash', 'sumUp', 'transfer', 'visa') NULL,
  `credit_note_id` INT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `companies_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bills_users1_idx` (`users_id` ASC),
  INDEX `fk_bills_companies1_idx` (`companies_id` ASC),
  CONSTRAINT `fk_bills_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bills_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`entretiens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`entretiens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `external_bike` INT(1) NULL DEFAULT 0,
  `bike_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `status` VARCHAR(100) NOT NULL,
  `comment` TEXT NULL,
  `internal_comment` TEXT NULL,
  `out_date_planned` DATE NULL,
  `number_entretien` INT(2) NOT NULL,
  `end_date` DATE NULL,
  `out_date` DATE NULL,
  `client_warned` INT(1) NOT NULL DEFAULT 0,
  `avoid_billing` INT(1) NOT NULL DEFAULT 0,
  `lising_to_bill` INT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`facture_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`facture_details` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(150) NOT NULL,
  `item_id` INT NOT NULL,
  `comments` VARCHAR(255) NULL,
  `start` DATE NULL,
  `end` DATE NULL,
  `amount_htva` FLOAT NOT NULL,
  `amount_vat` FLOAT NOT NULL,
  `entretiens_id` INT UNSIGNED NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_facture_details_entretiens1_idx` (`entretiens_id` ASC),
  CONSTRAINT `fk_facture_details_entretiens1`
    FOREIGN KEY (`entretiens_id`)
    REFERENCES `kameo-bdd`.`entretiens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`entretien_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`entretien_details` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_type` ENUM('service', 'accessory', 'otherAccessory') NULL,
  `item_id` INT NULL,
  `duration` INT NULL,
  `amount` FLOAT NULL,
  `description` TEXT NULL,
  `entretiens_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_entretien_details_entretiens1_idx` (`entretiens_id` ASC),
  CONSTRAINT `fk_entretien_details_entretiens1`
    FOREIGN KEY (`entretiens_id`)
    REFERENCES `kameo-bdd`.`entretiens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`ean_end_provider_codes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`ean_end_provider_codes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_type` ENUM('bike', 'accessory') NULL,
  `item_id` INT NOT NULL,
  `size` VARCHAR(45) NULL,
  `ean_code` TEXT NULL,
  `provider_code` TEXT NULL,
  `ean_end_provider_codescol` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`external_bikes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`external_bikes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(45) NOT NULL,
  `model` VARCHAR(255) NOT NULL,
  `color` TEXT NULL,
  `frame_reference` VARCHAR(4255) NULL,
  `companies_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_external_bikes_companies1_idx` (`companies_id` ASC),
  INDEX `fk_external_bikes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_external_bikes_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_external_bikes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`feedback`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`feedback` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `not` INT(1) NULL,
  `comment` TEXT NULL,
  `entretien` INT(1) NULL,
  `status` VARCHAR(15) NULL,
  `feedbackcol` VARCHAR(45) NULL,
  `reservation_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_feedback_reservation1_idx` (`reservation_id` ASC),
  CONSTRAINT `fk_feedback_reservation1`
    FOREIGN KEY (`reservation_id`)
    REFERENCES `kameo-bdd`.`reservation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`grouped_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`grouped_orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `companies_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_grouped_orders_companies1_idx` (`companies_id` ASC),
  INDEX `fk_grouped_orders_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_grouped_orders_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `kameo-bdd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grouped_orders_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `kameo-bdd`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`bike_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`bike_orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` VARCHAR(45) NOT NULL,
  `color` VARCHAR(45) NULL,
  `remark` TEXT NULL,
  `status` ENUM('new', 'confirm', 'done') NULL DEFAULT 'new',
  `amount` FLOAT NULL,
  `type` ENUM('leasing', 'annualLeasing', 'fullLeasing', 'selling') NULL DEFAULT 'leasing',
  `estimated_delivery_date` DATE NULL,
  `delivery_address` VARCHAR(255) NULL,
  `comment_admin` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `bikes_id` INT UNSIGNED NULL,
  `grouped_orders_id` INT UNSIGNED NOT NULL,
  `bikes_catalog_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bike_orders_bikes1_idx` (`bikes_id` ASC),
  INDEX `fk_bike_orders_grouped_orders1_idx` (`grouped_orders_id` ASC),
  INDEX `fk_bike_orders_bikes_catalog1_idx` (`bikes_catalog_id` ASC),
  CONSTRAINT `fk_bike_orders_bikes1`
    FOREIGN KEY (`bikes_id`)
    REFERENCES `kameo-bdd`.`bikes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bike_orders_grouped_orders1`
    FOREIGN KEY (`grouped_orders_id`)
    REFERENCES `kameo-bdd`.`grouped_orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bike_orders_bikes_catalog1`
    FOREIGN KEY (`bikes_catalog_id`)
    REFERENCES `kameo-bdd`.`bikes_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`accessory_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`accessory_orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` VARCHAR(45) NOT NULL,
  `type` ENUM('leasing', 'selling') NOT NULL,
  `amount` FLOAT NOT NULL,
  `description` TEXT NOT NULL,
  `estimated_delivery_date` DATE NULL,
  `delivery_address` TEXT NULL,
  `billing_type` TEXT NULL,
  `status` ENUM('new', 'confirmed', 'closed') NOT NULL DEFAULT 'new',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `grouped_orders_id` INT UNSIGNED NOT NULL,
  `accessories_id` INT UNSIGNED NULL,
  `accessories_catalog_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_accessory_orders_grouped_orders1_idx` (`grouped_orders_id` ASC),
  INDEX `fk_accessory_orders_accessories1_idx` (`accessories_id` ASC),
  INDEX `fk_accessory_orders_accessories_catalog1_idx` (`accessories_catalog_id` ASC),
  CONSTRAINT `fk_accessory_orders_grouped_orders1`
    FOREIGN KEY (`grouped_orders_id`)
    REFERENCES `kameo-bdd`.`grouped_orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_accessory_orders_accessories1`
    FOREIGN KEY (`accessories_id`)
    REFERENCES `kameo-bdd`.`accessories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_accessory_orders_accessories_catalog1`
    FOREIGN KEY (`accessories_catalog_id`)
    REFERENCES `kameo-bdd`.`accessories_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`boxe_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`boxe_orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `installation_price` FLOAT NOT NULL,
  `amount` FLOAT NOT NULL,
  `estimated_delivery_date` DATE NULL,
  `status` ENUM('new', 'confirmed', 'closed') NOT NULL DEFAULT 'new',
  `created_at` TIMESTAMP NULL,
  `updated` TIMESTAMP NULL,
  `boxes_catalog_id` INT UNSIGNED NOT NULL,
  `grouped_orders_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_boxe_orders_boxes_catalog1_idx` (`boxes_catalog_id` ASC),
  INDEX `fk_boxe_orders_grouped_orders1_idx` (`grouped_orders_id` ASC),
  CONSTRAINT `fk_boxe_orders_boxes_catalog1`
    FOREIGN KEY (`boxes_catalog_id`)
    REFERENCES `kameo-bdd`.`boxes_catalog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_boxe_orders_grouped_orders1`
    FOREIGN KEY (`grouped_orders_id`)
    REFERENCES `kameo-bdd`.`grouped_orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`success_messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`success_messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `msg_number` VARCHAR(10) NULL,
  `text_fr` TEXT NULL,
  `text_en` TEXT NULL,
  `text_nl` TEXT NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`error_messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`error_messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `msg_number` VARCHAR(10) NULL,
  `text_fr` TEXT NULL,
  `text_en` TEXT NULL,
  `text_nl` TEXT NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`service_entretiens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`service_entretiens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(150) NOT NULL,
  `description` TEXT NOT NULL,
  `minute` FLOAT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kameo-bdd`.`plannings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kameo-bdd`.`plannings` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `step` INT NOT NULL,
  `address` TEXT NOT NULL,
  `item_type` VARCHAR(45) NOT NULL,
  `item_id` INT NOT NULL,
  `moving_time` INT(4) NOT NULL,
  `execution_time` INT(4) NOT NULL,
  `planned_start_hour` TIME NOT NULL,
  `planned_end_hour` TIME NOT NULL,
  `real_start_hour` TIME NULL,
  `real_end_hour` TIME NULL,
  `description` TEXT NULL,
  `status` ENUM('confirmed', 'done') NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;