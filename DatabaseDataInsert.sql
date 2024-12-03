INSERT INTO countries (name, iso_alpha3, area_km2, population, gdp, hdi, developement_level) VALUES
('United States', 'USA', 9833520, 331002651, 21433226.00, 0.926, 'Developed'),
('Germany', 'DEU', 357022, 83166711, 4223000.00, 0.947, 'Developed'),
('India', 'IND', 3287263, 1393409038, 3171000.00, 0.645, 'Developing'),
('Brazil', 'BRA', 8515767, 213993437, 2478000.00, 0.754, 'Developing'),
('China', 'CHN', 9596961, 1444216107, 16800000.00, 0.761, 'Developing'),
('France', 'FRA', 551695, 67372000, 2932000.00, 0.903, 'Developed'),
('South Africa', 'ZAF', 1219090, 59308690, 419000.00, 0.709, 'Developing'),
('Australia', 'AUS', 7692024, 25687041, 1393000.00, 0.951, 'Developed'),
('Japan', 'JPN', 377975, 125960000, 4937000.00, 0.925, 'Developed'),
('Norway', 'NOR', 323802, 5391369, 482000.00, 0.961, 'Developed');

INSERT INTO energy_sources (renewable, origin, energy_type, description, environmental_effect) VALUES
(TRUE, 'Solar', 'Solar Energy', 'Energy generated from sunlight using photovoltaic panels or solar concentrators.', 'Minimal carbon emissions'),
(TRUE, 'Wind', 'Wind Energy', 'Energy derived from wind turbines that convert wind motion into electricity.', 'Minimal environmental impact'),
(TRUE, 'Water', 'Hydropower', 'Energy generated from the flow of water in rivers or dams.', 'Can disrupt aquatic ecosystems'),
(TRUE, 'Geothermal', 'Geothermal Energy', 'Heat energy extracted from underground hot springs or volcanic areas.', 'Minimal emissions, localized geological impact'),
(TRUE, 'Biomass', 'Biomass Energy', 'Energy from organic materials like wood, agricultural residues, or waste.', 'Carbon-neutral if managed sustainably'),
(FALSE, 'Fossil', 'Coal', 'Energy derived from burning coal for electricity.', 'High carbon emissions and air pollution'),
(FALSE, 'Fossil', 'Natural Gas', 'Energy from burning methane-rich gas extracted from underground.', 'Lower emissions than coal, but still significant'),
(FALSE, 'Fossil', 'Oil', 'Energy from refined petroleum used in transportation and heating.', 'High carbon emissions'),
(FALSE, 'Nuclear', 'Nuclear Energy', 'Energy generated through nuclear fission in reactors.', 'Low emissions, requires careful waste management'),
(TRUE, 'Marine', 'Tidal Energy', 'Energy generated from tidal movements in oceans or seas.', 'Minimal carbon footprint, may impact marine life');

INSERT INTO energy_consumption (energy_source_id, country_id, year, consumption_mwh) VALUES
(1, 1, 2020, 1000000.00),
(2, 1, 2020, 500000.00),
(3, 1, 2020, 300000.00),
(4, 2, 2020, 400000.00),
(5, 2, 2020, 200000.00),
(6, 3, 2020, 1000000.00),
(7, 3, 2020, 500000.00),
(8, 4, 2020, 700000.00),
(9, 5, 2020, 800000.00),
(10, 6, 2020, 300000.00);

INSERT INTO energy_production (country_id, energy_source_id, year, production_mwh) VALUES
(1, 1, 2020, 1100000.00),
(1, 2, 2020, 600000.00),
(2, 3, 2020, 350000.00),
(2, 4, 2020, 180000.00),
(3, 5, 2020, 1200000.00),
(4, 6, 2020, 500000.00),
(5, 7, 2020, 900000.00),
(6, 8, 2020, 400000.00),
(7, 9, 2020, 700000.00),
(8, 10, 2020, 200000.00);

INSERT INTO transition_progress (country_id, year, renewable_share, carbon_emissions) VALUES
(1, 2020, 25.50, 5000000.00),
(2, 2020, 30.00, 3000000.00),
(3, 2020, 15.00, 7000000.00),
(4, 2020, 20.00, 5000000.00),
(5, 2020, 18.00, 8000000.00),
(6, 2020, 35.00, 2000000.00),
(7, 2020, 12.00, 4000000.00),
(8, 2020, 40.00, 1000000.00),
(9, 2020, 45.00, 1500000.00),
(10, 2020, 50.00, 500000.00);

INSERT INTO investments (country_id, year, amount_usd, sector) VALUES
(1, 2020, 1000000000.00, 'Solar'),
(1, 2020, 500000000.00, 'Wind'),
(2, 2020, 300000000.00, 'Hydropower'),
(2, 2020, 200000000.00, 'Geothermal'),
(3, 2020, 700000000.00, 'Biomass'),
(4, 2020, 150000000.00, 'Tidal'),
(5, 2020, 900000000.00, 'Natural Gas'),
(6, 2020, 300000000.00, 'Nuclear'),
(7, 2020, 400000000.00, 'Coal'),
(8, 2020, 250000000.00, 'Marine');
