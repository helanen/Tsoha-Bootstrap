CREATE TABLE Kuluttaja(
  id SERIAL PRIMARY KEY,
  name varchar(20) NOT NULL,
  password varchar(30) NOT NULL
);

CREATE TABLE Jaakaappi(
  id SERIAL PRIMARY KEY,
  name varchar(20) NOT NULL
);

CREATE TABLE Syojat(
  kuluttaja_id INTEGER REFERENCES Kuluttaja(id),
  jaakaappi_id INTEGER REFERENCES Jaakaappi(id)
);

CREATE TABLE Elintarvike(
  id SERIAL PRIMARY KEY,
  jaakaappi_id INTEGER REFERENCES Jaakaappi(id),
  name varchar(50) NOT NULL,
  maara varchar(20),
  expiry varchar(10),
  omistaja varchar(20),
  luokka varchar(50),
  added varchar(10),
  kaytto varchar(50),
  description varchar(400)
);

CREATE TABLE Elintarviketyyppi(
  name varchar(50) NOT NULL,
  id SERIAL PRIMARY KEY
);

CREATE TABLE Luokittelu(
  elintarvike_id INTEGER REFERENCES Elintarvike(id),
  elintarviketyyppi_id INTEGER REFERENCES Elintarviketyyppi(id)
);

