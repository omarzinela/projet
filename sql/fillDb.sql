insert into Entrainements (EntrainementNom, EntrainementTimestamp, Categorie, Description, MaxParticipants) values
('Course de 5km - Débutants', unix_timestamp('2024-01-10 08:00:00'), '5km', 'Course de 5 km pour les coureurs débutants, objectif : terminer', 30),
('Course nocturne - 10km', unix_timestamp('2022-02-20 19:30:00'), '10km', 'Course nocturne de 10 km, ambiance fun et dynamique', 50),
('Semi-marathon de printemps', unix_timestamp('2034-03-25 07:00:00'), 'Semi-Marathon', 'Préparation pour un semi-marathon, idéal pour les coureurs intermédiaires', 100),
('Marathon des Alpes', unix_timestamp('2024-04-15 06:00:00'), 'Marathon', 'Course longue de 42 km dans les montagnes, réservé aux coureurs expérimentés', 200),
('Course d\'obstacles 10km', unix_timestamp('2034-05-05 08:30:00'), 'Obstacles', 'Course de 10 km avec obstacles à franchir, défi pour tous les niveaux', 50),
('Ultra Trail 50km', unix_timestamp('2024-06-10 05:00:00'), 'Ultra-Trail', 'Course de 50 km à travers des sentiers en montagne, pour les coureurs endurants', 100),
('Course de relais - 4x5km', unix_timestamp('2025-07-01 09:00:00'), 'Relais', 'Course par équipe, chaque participant court 5 km', 20),
('Course sur sable - 10km', unix_timestamp('2034-08-15 10:00:00'), 'Course sur sable', 'Course de 10 km sur plage, résister à la chaleur et au sable', 30),
('Run & Fun 3km', unix_timestamp('2034-09-05 18:00:00'), 'Course Fun', 'Course de 3 km avec des animations tout au long du parcours, pour tous les âges', 40);

insert into Utilisateurs (Nom, Prenom, Mail, Pass, EstAdmin) values
('Doe', 'Jane', 'jane.doe@example.com', '$2a$07$nGYCCmhrzjrgdcxjH$$$$.xLJMTJxaRa12DnhpAJmKQw.NXXZHgyq', false),
('Smith', 'John', 'john.smith@example.com', '$2a$07$wD8tHY5UPdH9U2fkb9U0CwZyRqxJAswMcmKKdCeuAiYs8XlJS2qOG', true),
('Martin', 'Claire', 'claire.martin@example.com', '$2a$07$X9jz8hV4O9IbYH0Mdt7h.AgVrrhMlABrlyd8pn3UMKMCzpxlmZym6', false),
('Dupont', 'Louis', 'louis.dupont@example.com', '$2a$07$YOuRnp6nCKa2l1cKrxCZOS1u5hclN2xl11Z1yYcSLnyCP9Av9lzS2', true),
('Durand', 'Marie', 'marie.durand@example.com', '$2a$07$FjOw9HGntbknKvU8ElOChdHeu4Yx17ZQ.S9H/x9gxXZhJ0QFsDL9a', true),
('Leclerc', 'Paul', 'paul.leclerc@example.com', '$2a$07$BOK1Kfpzjf5tmMb9YsHFG0vVpK3J5lkG2ZXHtTbhD7G1OuvnnM1AK', false),
('Petit', 'Sophie', 'sophie.petit@example.com', '$2a$07$H4qPFOJ8EjmEXgPmTW1Ojpo6Vq9HdxHttwZqxaMwqf4XZtuk2uuey', false),
('Lemoine', 'Julien', 'julien.lemoine@example.com', '$2a$07$TLsh0yckZjYaI4hgJfB/.FEmAnXz9bm6qFSaXmTZllL03FifvqVze', true),
('Benoit', 'Isabelle', 'isabelle.benoit@example.com', '$2a$07$gcmjmjLPpHlUIM32Wy3//w7a6EvzQ0nL9xv59ZY5aMZfJtIZk9Nsm', false),
('Meyer', 'Eric', 'eric.meyer@example.com', '$2a$07$Tqdyj7pc.mU9BdD1jfd8fTm0Y1Xb0RJLbLwFTpmZn6CzKSOFwpOiO', true);
