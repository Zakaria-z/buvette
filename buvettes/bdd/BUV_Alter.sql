ALTER TABLE Buvette
  ADD CONSTRAINT fk_buvette_responsable FOREIGN KEY (responsable) REFERENCES Volontaire(idV);

ALTER TABLE EstOuverte
  ADD CONSTRAINT fk_estouverte_idb FOREIGN KEY (idB) REFERENCES Buvette(idB),
  ADD CONSTRAINT fk_estouverte_idm FOREIGN KEY (idM) REFERENCES Matchs(idM);

ALTER TABLE EstPresent
  ADD CONSTRAINT fk_estpresent_idb FOREIGN KEY (idB) REFERENCES Buvette(idB),
  ADD CONSTRAINT fk_estpresent_idm FOREIGN KEY (idM) REFERENCES Matchs(idM),
  ADD CONSTRAINT fk_estpresent_idv FOREIGN KEY (idV) REFERENCES Volontaire(idV);

ALTER TABLE Matchs
  ADD CONSTRAINT fk_matchs_eqa FOREIGN KEY (eqA) REFERENCES Equipe(idE),
  ADD CONSTRAINT fk_matchs_eqb FOREIGN KEY (eqB) REFERENCES Equipe(idE);