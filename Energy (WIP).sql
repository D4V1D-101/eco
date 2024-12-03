CREATE TABLE `Countries` (
  `country_id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `iso_alpha3` VARCHAR(3) NOT NULL,
  `area_km2` DECIMAL(10,2) NOT NULL,
  `population` INT NOT NULL,
  `gdp` DECIMAL(15,2),
  `hdi` DECIMAL(5,3),
  `developement_level` VARCHAR(255)
);

CREATE TABLE `EnergySources` (
  `energy_source_id` INT PRIMARY KEY AUTO_INCREMENT,
  `renewable` BOOL,
  `origin` VARCHAR(255),
  `energy_type` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `environmental_effect` TEXT
);

CREATE TABLE `EnergyConsumption` (
  `energy_consumption_id` INT PRIMARY KEY AUTO_INCREMENT,
  `energy_source_id` INT,
  `country_id` INT,
  `year` INT,
  `consumption_mwh` DECIMAL(10,2)
);

CREATE TABLE `EnergyProduction` (
  `energy_production_id` INT PRIMARY KEY AUTO_INCREMENT,
  `country_id` INT,
  `energy_source_id` INT,
  `year` INT,
  `production_mwh` DECIMAL(10,2)
);

CREATE TABLE `MegujuloEnergia` (
  `energia_id` INT PRIMARY KEY AUTO_INCREMENT,
  `orszag_id` INT,
  `ev` INT,
  `megujulo_fogyasztas_mwh` DECIMAL(10,2),
  `energiaforras_id` INT,
  `arany` DECIMAL(5,2),
  `forraskategoria` VARCHAR(255),
  `epites_koltseg` DECIMAL(15,2)
);

CREATE TABLE `EnergiaHatekonysag` (
  `hatekonysag_id` INT PRIMARY KEY AUTO_INCREMENT,
  `orszag_id` INT,
  `ev` INT,
  `hatekonysag_eredmeny` DECIMAL(5,2),
  `energia_megtakaritas_mwh` DECIMAL(10,2),
  `emiszios_csokkenes_kgco2` DECIMAL(10,2),
  `beruhazas_kolteseg` DECIMAL(15,2)
);

ALTER TABLE `EnergyConsumption` ADD FOREIGN KEY (`country_id`) REFERENCES `Countries` (`country_id`);

ALTER TABLE `EnergyConsumption` ADD FOREIGN KEY (`energy_source_id`) REFERENCES `EnergySources` (`energy_source_id`);

ALTER TABLE `EnergyProduction` ADD FOREIGN KEY (`energy_source_id`) REFERENCES `EnergySources` (`energy_source_id`);

ALTER TABLE `EnergyProduction` ADD FOREIGN KEY (`country_id`) REFERENCES `Countries` (`country_id`);
