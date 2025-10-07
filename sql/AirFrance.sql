drop database if exists AirFrance;
CREATE database AirFrance;
use AirFrance;

CREATE TABLE pilote (
    idpilote INT NOT NULL auto_increment,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    licence VARCHAR(20) UNIQUE NOT NULL,
    PRIMARY KEY (idpilote)
);

CREATE TABLE avion (
    idavion INT NOT NULL auto_increment,
    modele VARCHAR(50) NOT NULL,
    capacite INT NOT NULL,
    fabrication year NOT NULL,
    PRIMARY KEY (idavion)
);

CREATE TABLE vol (
    idvol INT NOT NULL auto_increment,
    idpilote INT NOT NULL,
    idavion INT NOT NULL,
    dated datetime NOT NULL,
    datea datetime NOT NULL,
    lieud VARCHAR(100) NOT NULL,
    lieua VARCHAR(100) NOT NULL,
    PRIMARY KEY (idvol),
    FOREIGN KEY (idpilote) references pilote(idpilote) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idavion) references avion(idavion) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE voyageur (
    idvoyageur INT NOT NULL auto_increment,
    nomv VARCHAR(50) NOT NULL,
    prenomv VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telephone VARCHAR(20) NULL,
    PRIMARY KEY (idvoyageur)
);

CREATE TABLE billet (
    idbillet INT NOT NULL auto_increment,
    idvol INT NOT NULL,
    idvoyageur INT NOT NULL,
    nump VARCHAR(10) NOT NULL,
    classe ENUM('Economie','Affaires','Première') NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (idbillet),
    FOREIGN KEY (idvol) references vol(idvol) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idvoyageur) references voyageur(idvoyageur) ON DELETE CASCADE ON UPDATE CASCADE
);