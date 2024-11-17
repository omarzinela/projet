create table if not exists Entrainements (
    EntrainementId char(36) primary key default UUID(), -- UUID
    EntrainementNom varchar(100),
    EntrainementTimestamp int(11) unsigned, -- Unix Timestamp
    Categorie varchar(50) default 'course',
    Lieu varchar(50) default 'ESIGELEC',
    Description varchar(512),
    MaxParticipants smallint(5) unsigned default 0, -- max de 65535
    EntrainementThumbnail varchar(255) default 'img/logo-reshaped.png'
);

create table if not exists Utilisateurs (
    UtilisateurId char(36) primary key default UUID(), -- UUID
    Nom varchar(100),
    Prenom varchar(100),
    Mail varchar(255) unique,
    Pass char(60),
    EstAdmin bit default false
);

create table if not exists Inscriptions (
    InscriptionId char(36) primary key default UUID(), -- UUID
    EntrainementId char(36), -- UUID
    UtilisateurId char(36), -- UUID
    InscriptionTimestamp int(11) unsigned, -- Unix Timestamp
    constraint fk_EntrainementId foreign key (EntrainementId) references Entrainements(EntrainementId),
    constraint fk_UtilisateurId foreign key (UtilisateurId) references Utilisateurs(UtilisateurId)
);
