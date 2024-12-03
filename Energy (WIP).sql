CREATE TABLE `countries` (
  `country_id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `iso_alpha3` VARCHAR(3) NOT NULL,
  `area_km2` DECIMAL(10,2) NOT NULL,
  `population` INT NOT NULL,
  `gdp` DECIMAL(15,2),
  `hdi` DECIMAL(5,3),
  `developement_level` VARCHAR(255)
);

CREATE TABLE `energy_sources` (
  `energy_source_id` INT PRIMARY KEY AUTO_INCREMENT,
  `renewable` BOOL,
  `origin` VARCHAR(255),
  `energy_type` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `environmental_effect` TEXT
);

CREATE TABLE `energy_consumption` (
  `energy_consumption_id` INT PRIMARY KEY AUTO_INCREMENT,
  `energy_source_id` INT,
  `country_id` INT,
  `year` INT,
  `consumption_mwh` DECIMAL(10,2)
);

CREATE TABLE `energy_production` (
  `energy_production_id` INT PRIMARY KEY AUTO_INCREMENT,
  `country_id` INT,
  `energy_source_id` INT,
  `year` INT,
  `production_mwh` DECIMAL(10,2)
);

CREATE TABLE `transition_progress` (
  `progress_id` INT PRIMARY KEY AUTO_INCREMENT,
  `country_id` INT NOT NULL,
  `year` INT NOT NULL,
  `renewable_share` DECIMAL(5,2),
  `carbon_emissions` DECIMAL(15,2)
);

CREATE TABLE `investments` (
  `investment_id` INT PRIMARY KEY AUTO_INCREMENT,
  `country_id` INT NOT NULL,
  `year` INT NOT NULL,
  `amount_usd` DECIMAL(15,2),
  `sector` VARCHAR(255)
);

ALTER TABLE `investments` ADD FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

ALTER TABLE `transition_progress` ADD FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

ALTER TABLE `energy_consumption` ADD FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

ALTER TABLE `energy_consumption` ADD FOREIGN KEY (`energy_source_id`) REFERENCES `energy_sources` (`energy_source_id`);

ALTER TABLE `energy_production` ADD FOREIGN KEY (`energy_source_id`) REFERENCES `energy_sources` (`energy_source_id`);

ALTER TABLE `energy_production` ADD FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
