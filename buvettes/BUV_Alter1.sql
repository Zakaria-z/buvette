--
-- Index pour la table Buvette
--
ALTER TABLE Buvette
  ADD PRIMARY KEY (idB),
  ADD KEY fk_buvette_responsable (responsable);

--
-- Index pour la table Equipe
--
ALTER TABLE Equipe
  ADD CONSTRAINT PK_Equipe PRIMARY KEY (idE);

--
-- Index pour la table EstOuverte
--
ALTER TABLE EstOuverte
  ADD CONSTRAINT PK_EstOuverte PRIMARY KEY (idB,idM),
  ADD KEY fk_estouverte_idm (idM);

--
-- Index pour la table EstPresent
--
ALTER TABLE EstPresent
  ADD CONSTRAINT PK_EstPresent PRIMARY KEY (idV,idB,idM),
  ADD KEY fk_estpresent_idb (idB),
  ADD KEY fk_estpresent_idm (idM);

--
-- Index pour la table Match
--
ALTER TABLE Matchs
  ADD CONSTRAINT PK_Matchs PRIMARY KEY (idM),
  ADD KEY fk_matchs_eqa (eqA),
  ADD KEY fk_matchs_eqb (eqB);

--
-- Index pour la table Volontaire
--
ALTER TABLE Volontaire
  ADD CONSTRAINT PK_Volontaire PRIMARY KEY (idV);