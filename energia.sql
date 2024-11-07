CREATE TABLE `Energiaforrasok` (
  `energiaforras_id` INT PRIMARY KEY AUTO_INCREMENT,
  `tipus` VARCHAR(255) NOT NULL,
  `leiras` TEXT,
  `kornyezeti_hatas` TEXT
);

CREATE TABLE `Orszagok` (
  `orszag_id` INT PRIMARY KEY AUTO_INCREMENT,
  `nev` VARCHAR(255) NOT NULL,
  `gdp` DECIMAL(15,2),
  `terulet_km2` DECIMAL(10,2),
  `fejlettsegi_szint` VARCHAR(255)
);

CREATE TABLE `Energiafogyasztas` (
  `fogyasztas_id` INT PRIMARY KEY AUTO_INCREMENT,
  `orszag_id` INT,
  `ev` INT,
  `fogyasztas_mwh` DECIMAL(10,2),
  `nepesseg` INT,
  `egy_fore_juto_fogyasztas` DECIMAL(10,2)
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

ALTER TABLE `Energiafogyasztas` ADD FOREIGN KEY (`orszag_id`) REFERENCES `Orszagok` (`orszag_id`);

ALTER TABLE `MegujuloEnergia` ADD FOREIGN KEY (`orszag_id`) REFERENCES `Orszagok` (`orszag_id`);

ALTER TABLE `MegujuloEnergia` ADD FOREIGN KEY (`energiaforras_id`) REFERENCES `Energiaforrasok` (`energiaforras_id`);

ALTER TABLE `EnergiaHatekonysag` ADD FOREIGN KEY (`orszag_id`) REFERENCES `Orszagok` (`orszag_id`);
