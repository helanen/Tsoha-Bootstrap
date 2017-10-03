-- Kuluttaja-taulun testidata
INSERT INTO Kuluttaja (name, password) VALUES ('Henri', 'Henri123');
INSERT INTO Jaakaappi (name) VALUES ('Mun jaakaappi');
INSERT INTO Jaakaappi (name) VALUES ('Mun toinen jaakaappi');
INSERT INTO Jaakaappi (name) VALUES ('Mun kolmas jaakaappi');
INSERT INTO Elintarvike (name, maara, expiry, omistaja, luokka, added, kaytto, description) VALUES ('Sika-nauta jauheliha', '400g', '03.10.2017', 'Henkka', 'Herkästi pilaantuvat', '28.09.2017', 'Makaronilaatikko', 'Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja ');
INSERT INTO Elintarvike (name, maara, expiry, omistaja, luokka, added, kaytto, description) VALUES ('HK-sinine', '500g', '03.10.2017', 'Henkka', 'Pitkäkestoinen tuote', '28.12.2017', 'Iltapala', 'Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja Lisatietoja ');
INSERT INTO Elintarvike (name, maara, expiry, omistaja, luokka, added, kaytto, description) VALUES ('Olut III', '48', '03.10.2017', 'Henkka', 'Juoma', '12.01.2018', 'Makaronilaatikko', 'Kyllähä tähä vois jotakin kirjottaa ');
INSERT INTO Elintarviketyyppi (name) VALUES ('Herkästi pilaantuvat');
INSERT INTO Elintarviketyyppi (name) VALUES ('Pitkäkestoiset tuotteet');
INSERT INTO Elintarviketyyppi (name) VALUES ('Juomat');

