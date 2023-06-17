-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 mai 2023 à 20:26
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `labged`
--

-- --------------------------------------------------------

--
-- Structure de la table `chercheur`
--

CREATE TABLE `chercheur` (
  `id` int(2) NOT NULL,
  `num_dEquipe` int(15) NOT NULL,
  `nom` char(15) NOT NULL,
  `prenom` char(15) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sex` char(5) NOT NULL,
  `epouse_de` char(15) NOT NULL,
  `dernier_diplome` char(15) NOT NULL,
  `an_obt_diplome` year(4) NOT NULL,
  `grade` char(5) NOT NULL,
  `an_obt_grade` year(4) NOT NULL,
  `statut` char(5) NOT NULL,
  `domaine_principal` char(15) NOT NULL,
  `Structure_de_rattachement` char(15) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chercheur`
--

INSERT INTO `chercheur` (`id`, `num_dEquipe`, `nom`, `prenom`, `date_de_naissance`, `sex`, `epouse_de`, `dernier_diplome`, `an_obt_diplome`, `grade`, `an_obt_grade`, `statut`, `domaine_principal`, `Structure_de_rattachement`, `email`) VALUES
(1, 1, 'khadir', 'mohamd tarek', '1972-07-05', 'Mr', '', 'Habilitation', 0000, 'Pr', 0000, 'P Et', 'Informatique', 'U.Annaba', 'khadir@labged.net					'),
(2, 1, 'Benabbas', 'farouk', '1958-10-14', 'Mr', '', 'Doctorat', 0000, 'MCB', 0000, 'P Et', 'Informatique', 'U.Annaba', 'benabbas@labged.net					'),
(3, 1, 'Dendani', 'Nadjet', '1958-10-14', 'Mme', 'Haddiby', 'Doctorat', 0000, 'MCB', 0000, 'P Et', 'Informatique', 'U.Annaba', 'dendani@labged.net					'),
(4, 1, 'Klai', 'Sihem', '1972-05-02', 'Mme', 'Soukehal', 'Doctorat', 0000, 'MCB', 0000, 'P Et', 'Informatique', 'U.Annaba', 'klai@labged.net					'),
(5, 1, 'Ghazi', 'Sabri', '1982-12-29', 'Mr', '', 'Doctorat', 0000, 'MCB', 0000, 'P Et', 'Informatique', 'U.Annaba', 'ghazi@labged.net					'),
(6, 1, 'Khedairia', 'Sofiane', '1981-03-15', 'Mr', '', 'Doctorat', 0000, 'MCB', 0000, 'P H.E', 'Informatique', 'U.Souk Ahras', 'khedairia@labged.net					'),
(19, 3, 'Sellami', 'Mokhtar', '0000-00-00', 'Mr', '', 'doc.d\'Etat', 0000, 'Pr', 0000, 'P H.E', 'Informatique', '', 'sellami@labged.net'),
(20, 3, 'Benouareth', 'Abdallah', '0000-00-00', 'Mr', '', 'Doc. d\'Etat', 0000, 'MCB', 0000, 'P Et', 'Informatique', '', 'benouareth@labged.net'),
(21, 3, 'Dib', 'Ahmed', '0000-00-00', 'Mr', '', 'doc.d\'Etat', 0000, 'MCB', 0000, 'P H.E', 'Informatique', '', 'dib@labged.net'),
(76, 16, 'mourad', 'dfdsfsdf', '2023-05-12', '', '', '', 0000, '', 0000, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `encadreur`
--

CREATE TABLE `encadreur` (
  `id_ec` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `encadreur`
--

INSERT INTO `encadreur` (`id_ec`, `nom`, `prenom`) VALUES
(1, 'khadir ', 'tarek'),
(15, 'akil', 'akilll'),
(16, 'akil', 'akilll'),
(17, 'fadil', 'bbb'),
(18, 'fadil', 'bbb'),
(19, 'batman', 'laid'),
(20, 'fadilz', 'tarek'),
(21, '', ''),
(22, 'khadir ', 'fdsfdsdf'),
(23, '', ''),
(24, 'khadir ', 'tarek'),
(25, 'khadir ', 'tarek'),
(26, 'batman', 'akilll'),
(27, 'khadir ', 'fdsfdsdf'),
(28, 'khadir ', 'tarek'),
(29, 'khadir ', 'tarek'),
(30, 'khadir ', 'tarekkkk'),
(31, 'khadir ', 'tarek'),
(32, 'bahi', 'sds'),
(33, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `numero` int(11) NOT NULL,
  `intitule_DEquipe` varchar(255) NOT NULL,
  `acronyme_DEquipe` char(8) NOT NULL,
  `chef_DEquipe` char(20) NOT NULL,
  `description_scientifique` text NOT NULL,
  `adequation` text NOT NULL,
  `environnement_et_contraint` text NOT NULL,
  `traveaux_en_cours` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`numero`, `intitule_DEquipe`, `acronyme_DEquipe`, `chef_DEquipe`, `description_scientifique`, `adequation`, `environnement_et_contraint`, `traveaux_en_cours`) VALUES
(1, 'Outils et applications, pour le traitement, classifications, organisation et partage de documents																																								', 'TCOPD', 'Khadir Mohamed Tarek', 'Le traitement du document, sous ses formes divers, nécessite une maîtrise complète des paradigmes, approches et méthodes intervenant dans les différentes étapes et traitement dudit documents. En effet, des méthodes heuristiques nonlineaires basées sur un apprentissage comme:\r\n1-les Réseaux de Neurones Artificiels (RNA) sous ses différentes formes, les Modèles Markoviens (HMM), les Machines à Vecteurs de Supports (SVM), peuvent entrer dans la construction d\'un classifieur pour un système de reconnaissance automatique, de modélisation ou de fouille de données ou clustering (identification de classes).\r\n2-Les approches décisionnelles données par les systèmes expert (SE) ou les systèmes a base de cas (Case Based Reasoniong (CBR) avec ses différente\r\n3-Les méthodes organisationnelles et taxonomiques comme les Ontologies\r\n4-Les systèmes collaboratifs de partage de données, qui peuvent intégrer les approches et paradigmes sus cités.\r\nDans ce qui suit une brèves descriptions des différents paradigmes, outils et approches utilisées. L\'utilisation de ses outils se fera sur des domaines d\'applications tel que, le traitement de documents anciens et nouveaux, les plates formes de télé-enseignement et plates formes collaboratives, les systèmes d\'aide a la maintenance et au diagnostic, la prédiction et la modélisation de l\'écrit et le parlé en langue Arabe, etc.\r\nApproches et paradigmes de traitement de documents\r\na) Méthodes non linéaires et apprentissages\r\nb) Ontologies et organisations\r\nc) Systèmes collaboratifs\r\nd) Systèmes Experts \r\ne) Systèmes à Base de Cas (Case Based Reasoning (CBR)) \r\nMaîtrise d\'outils de simulations et de développements																																																			\r\n																							', 'Depuis 2011, l\'équipe TCODP, à su constituer une composante humaine necessaire a son devellopement. En effet, quatre de ses membres ont pus obtenir leurs doctorats, le dernier est en phase de finalisation. L\'équipe a encadrée pas moins de 15 projets de Master, 10 théses de doctorat dont 7 ont déja soutenus. De ce fait l\'équipe a largement atteint les objectifs de formation, et avec les habilitations à venir de 4 de ses MCB, la formation devrait croitre significativement. D\'un point de vue production scientifique, et avec 13 publications dans des journaux spécialisé dans 2 de classe A, et pas moins de 7 ouvrages et chapitres de livres ainsi que les differentes conférences indéxées IEEE ou Springer, l\'équipe a pus acquerir une éxpérience no négligeable. Il est toutefois important de noter que la priorité, maintenant, est la publications dans les journaux de classe A+ ou exeptionel.                                                                   Bien que le premier objectif d\'une équipe de recherche soit scientifique, le rayonnement sur la sphére socio-économique du pays et de la région reste d\'une importance capitale et conditione l\'existance méme d\'une structure de recherche. A cet effet les recherches orienté principalement vers les problémes industriel ont porté leurs fruits et ont permis de signer 2 contrats avec Sonelgaz SPA et plus précisément la Direction Générale de la et de la Prospective (DGSP) dont le premier a été finalisé en 2014. Un troisiéme contrat toujours avec Sonelgaz mais cette fois avec l\'Opérateur Systéme (OS) est en passe d\'étre signé. Ce partenariat a non seulement permis de travailler sur des thématique réelles d\'actualitées, concrétisant des théses de doctorats en relation directe avec l\'industrie mais aussi a permis de générer des fond assez important pour le Laboratoire et l\'université.																																																				\r\n																																										', 'l\'éuipe a bénéficier cette année de nouveaux locaux, l\'environement physique devient alors plus correct. Les contraintes existantes se situent maintenant au niveau de la lourdeur bureaucratique pour beneficier et utilier le financement du l\'équipe et du laboratoire. En effet, l\'impossibilité de pouvoir payer les frais de participations aux conférence, et ceci meme au niveau national, reste un handicap de taille qui freinent l\'évolution du processus de recherche d\'un doctorants.', 'Les travaux de l\'équipe en cours, peuvent êtres regrouper en trois thématique globale:\r\n1. Modélisation et prévisions des séries temporelles en utilisant les paradigmes de l\'IA, entre autre les Réseaux de neurones Artificielles (RNA). Plusieurs domaines d\'application sont abordé les plus significatifs et porteurs, sont la prévision de la demande en énergie fossile (Electricité et gaz) ainsi que les prévisions de productions des énergies renouvelables  ENR et la prévision de la pollution.\r\n2. Gestions des connaissances pour l\'aide a la décisions. Cette thématique aborde d\'abords l\'organisation et la formalisation des connaissance d\'un domaine donné sous forme ontologique. Ensuite, des systèmes de requêtes et de raisonnement, type SPARQL et Systèmes experts peuvent y êtres greffés ainsi que des opération de fusions et d\'appareillement de connaissances. les domaines d\'applications sont diverses, l\'équipe se concentre sur la  gestion des connaissance des turbines a gaz pour l\'aide a la maintenance.\r\n3. La commande prédictive des systèmes industriels. Un domaine plus électronique qu\'informatique, mais l\'introduction des paradigmes de l\'intelligence artificielle type RNA, ouvre un champ d\'action propice.'),
(2, 'Reconnaissance et indexation du documents écrit', 'RIDE', 'Farah Nadir', '', '', '', ''),
(3, 'Engineering des connaissances, travail collaboratif 																																								', 'EGTC', 'Sellami Mokhtar', '', '', '', ''),
(4, 'devlopement mobile', 'dvp', 'zenine ouassi', '', 'cfbdfbdbdb', 'dsgsdgds', 'dsgsg'),
(9, 'devml', 'non', 'kader', 'nous somme vous etes', 'sdsdsqdq', 'sqsqdqddqdqqs', 'qdsfqsfsq'),
(16, 'annaba', 'khenchla', 'nazim', 'sdsqdqsdqsd', 'dsqsqdsqd', 'sqdqdsqsdsq', 'dsqsqdqsdqsdsqdqsdqs');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_et` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_et`, `nom`, `prenom`) VALUES
(15, 'zenine', 'morad'),
(16, 'zenine', 'morad'),
(17, 'bounour', 'wael'),
(18, 'younes', 'benmridja'),
(19, 'menai', 'rayen'),
(20, 'bounour', 'taher'),
(21, 'zenine', 'ouassim'),
(22, 'zenine', 'ouassim'),
(23, 'ali rachedi', 'ouassim'),
(24, 'zenine', 'ouassim'),
(25, 'zenine', 'ouassim'),
(26, 'zenine', 'ouassim'),
(27, 'zenine', 'ouassim'),
(28, 'zenine', 'ouassim'),
(29, 'zenine', 'ouassim'),
(30, 'zenine', 'ouassim'),
(31, 'zenine', 'ouassim'),
(32, 'zenine', 'ouassim'),
(33, 'zenine', 'ouassim');

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE `laboratoire` (
  `acronyme_du_laboratoire` char(6) NOT NULL,
  `etablissement_de_recherche` char(40) DEFAULT NULL,
  `intitule_du_laboratoire` char(20) DEFAULT NULL,
  `nom_prenom_directeur` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `laboratoire`
--

INSERT INTO `laboratoire` (`acronyme_du_laboratoire`, `etablissement_de_recherche`, `intitule_du_laboratoire`, `nom_prenom_directeur`) VALUES
('Labged', 'Universite d\'Annaba Badji Mokhtar', 'Informatique', 'Farah Nadir');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(5) NOT NULL,
  `rolee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `rolee`) VALUES
(1, 'Utilsateur'),
(2, 'Chef D\'equipe');

-- --------------------------------------------------------

--
-- Structure de la table `mombre`
--

CREATE TABLE `mombre` (
  `id_m` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mombre`
--

INSERT INTO `mombre` (`id_m`, `projet_id`, `nom`, `prenom`) VALUES
(5, 8, 'mourad', 'ali'),
(6, 8, 'mohcen', 'ahmed');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_p` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `chefprojet` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_p`, `code`, `type`, `chefprojet`, `date_debut`, `date_fin`) VALUES
(1, 'fgfdg55', 'dfsfdfd', 'ali rachdi ', '2023-05-12', '2023-05-15'),
(8, 'base de donne', 'dure', 'zenine ouassim', '2023-05-03', '2022-09-03'),
(9, 'minou23', 'aritm', 'mourad almdar', '2023-05-14', '2023-05-21'),
(10, 'bdd02', 'dfdsf', 'ali rachdi ', '2023-05-13', '2023-05-11'),
(11, 'sds', 'qdqsdqsd', 'ali rachdi ', '2023-05-19', '2023-05-04');

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id_t` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `encadreur_id` int(11) NOT NULL,
  `theme` text NOT NULL,
  `resume` text NOT NULL,
  `date_soutenance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `these`
--

INSERT INTO `these` (`id_t`, `etudiant_id`, `encadreur_id`, `theme`, `resume`, `date_soutenance`) VALUES
(8, 15, 15, 'oui biue', 'oui buien', '2023-06-01'),
(11, 19, 19, 'more', 'fmdlmddf', '2020-10-16'),
(15, 26, 26, 'lacrim', '235oiolkokok', '2023-05-31'),
(16, 29, 29, 'laboratoire de recherche ', 'pas pour le moment', '2023-06-08'),
(17, 30, 30, 'laboratoire de recherche ', 'pas pour le moment', '2023-06-08'),
(18, 32, 32, 'application mobile', 'dfsdfsdfsdfdsfds', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `these_etudiant_encadreur`
--

CREATE TABLE `these_etudiant_encadreur` (
  `id` int(11) NOT NULL,
  `these_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `encadreur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `these_etudiant_encadreur`
--

INSERT INTO `these_etudiant_encadreur` (`id`, `these_id`, `etudiant_id`, `encadreur_id`) VALUES
(5, 11, 19, 19),
(12, 15, 26, 26),
(15, 16, 29, 29),
(16, 17, 30, 30);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(255) NOT NULL,
  `passwordd` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `role`, `passwordd`, `confirmpassword`) VALUES
(2, 'mourad', 'amine', 'mourad23@gmail.com', 1, 'annaba23', 'annaba23'),
(3, 'mourad', 'plom', 'dgsgs@mfkhlmkdlf.com', 1, 'azerty23', 'azerty23'),
(4, 'mpmk', 'plom', 'amar23@gmail.com', 1, 'annaba23', 'annaba23'),
(5, 'firas', 'alirachdi', 'mourad2dsfds3@gmail.com', 1, 'annaba23', 'annaba23'),
(8, 'hgfhfgh', 'ghfgfhfg', 'wassilm65@gmail.com', 2, 'annaba23', 'annaba23'),
(9, 'mourad', 'plomfhg', 'mourad2sdq3@gmail.com', 2, 'annaba23', 'annaba23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe` (`num_dEquipe`);

--
-- Index pour la table `encadreur`
--
ALTER TABLE `encadreur`
  ADD PRIMARY KEY (`id_ec`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_et`);

--
-- Index pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD PRIMARY KEY (`acronyme_du_laboratoire`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mombre`
--
ALTER TABLE `mombre`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `projet` (`projet_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `these`
--
ALTER TABLE `these`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `etudiant` (`etudiant_id`),
  ADD KEY `encadreur` (`encadreur_id`);

--
-- Index pour la table `these_etudiant_encadreur`
--
ALTER TABLE `these_etudiant_encadreur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `these` (`these_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chercheur`
--
ALTER TABLE `chercheur`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `encadreur`
--
ALTER TABLE `encadreur`
  MODIFY `id_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_et` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `mombre`
--
ALTER TABLE `mombre`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `these_etudiant_encadreur`
--
ALTER TABLE `these_etudiant_encadreur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD CONSTRAINT `equipe` FOREIGN KEY (`num_dEquipe`) REFERENCES `equipe` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mombre`
--
ALTER TABLE `mombre`
  ADD CONSTRAINT `projet` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `these`
--
ALTER TABLE `these`
  ADD CONSTRAINT `encadreur` FOREIGN KEY (`encadreur_id`) REFERENCES `encadreur` (`id_ec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id_et`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `these_etudiant_encadreur`
--
ALTER TABLE `these_etudiant_encadreur`
  ADD CONSTRAINT `these` FOREIGN KEY (`these_id`) REFERENCES `these` (`id_t`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
