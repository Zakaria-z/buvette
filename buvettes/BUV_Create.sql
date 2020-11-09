CREATE TABLE buvette
(
  idB int(11) NOT NULL AUTO_INCREMENT,
  nomB tinytext NOT NULL,
  emplacement tinytext NOT NULL,
  responsable int(11) NOT NULL,
  PRIMARY KEY (idB)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE equipe 
(
  idE varchar(5) NOT NULL,
  pays tinytext NOT NULL,
  drapeau tinytext NOT NULL,
  PRIMARY KEY (idE)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE estouverte 
(
  idB int(11) NOT NULL,
  idM int(11) NOT NULL,
  PRIMARY KEY (idB,idM)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE estpresent 
(
  idV int(11) NOT NULL,
  idB int(11) NOT NULL,
  idM int(11) NOT NULL,
  hdeb int(11) NOT NULL,
  hfin int(11) NOT NULL,
  PRIMARY KEY (idV,idB,idM)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE matchs 
(
  idM int(11) NOT NULL AUTO_INCREMENT,
  dateM date NOT NULL,
  eqA varchar(20) NOT NULL,
  eqB varchar(20) NOT NULL,
  scoreA int(11) DEFAULT NULL,
  scoreB int(11) DEFAULT NULL,
  PRIMARY KEY (idM)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE volontaire 
(
  idV int(5) NOT NULL AUTO_INCREMENT,
  nomV varchar(40) NOT NULL,
  naissance date,
  PRIMARY KEY (idV)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;