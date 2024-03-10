USE supermercat;

CREATE TABLE usuari (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(250) NOT NULL UNIQUE,
  contrasenya VARCHAR(250) NOT NULL,
  admin ENUM('0', '1')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE producte (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(250) NOT NULL UNIQUE,
  preu DECIMAL(10, 2)
);
CREATE TABLE compra (
  id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  total DECIMAL(10, 2),
  FOREIGN KEY (client_id) REFERENCES usuari(id)
);

CREATE TABLE linea (
  num_linea INT AUTO_INCREMENT,
  compra_id INT,
  producte_id INT,
  quantitat INT,
  preu_unitari DECIMAL(10, 2),
  PRIMARY KEY (num_linea, compra_id, producte_id),
  FOREIGN KEY (compra_id) REFERENCES compra(id),
  FOREIGN KEY (producte_id) REFERENCES producte(id)
);
INSERT INTO producte (id, nom, preu) VALUES (1, 'Poma', 1.99);
INSERT INTO producte (id, nom, preu) VALUES (2, 'Pera', 0.99);
INSERT INTO producte (id, nom, preu) VALUES (3, 'Raim', 3.99);
INSERT INTO producte (id, nom, preu) VALUES (4, 'Patates', 1.99);
INSERT INTO producte (id, nom, preu) VALUES (5, 'Tomaquet', 1.99);


