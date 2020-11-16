-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2020 à 09:24
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_vaccination`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `created_at`, `token`, `role`) VALUES
(1, 'Hautecoeur', 'Dylan', 'dylan.hautecoeur@gmail.com', '$2y$10$J.p.g0rZjorpTN1GaKqlGOXw6Y4rjcDK2BpwhMGAA6aaESWHv5XYa', '2020-11-13 19:41:54', 'D0wzhVnnH9d5lw1XAewy3bEdimUsj5K2C6t5HeDsut2O1SpgZ8rQqMjHe9V3GX0dE8wPKms9B3W2ayWQg4o6lwJxYulHez7QdnFYYy47tpbXfUxER5vNnoT6', 'abonne'),
(3, 'Neymare', 'Jean', 'jean.neymare@gmail.com', '$2y$10$Xuz/a6AmItM/zOVM0MqpIOSgyZwJFJufinGq5An2K.1UHbPOqilhi', '2020-11-13 21:26:11', '2xwhUdySaMNxoldvwM1Iwn8lXPQ2nIPgfUC4s4nBgKo5rDutR8R9zZ5wF1VoXgWWYDdItgaKIGtS46Z8ZmXboxUaP2P4c12ZrGyakxeKBqkADrAPdSbAdlhT', 'abonne'),
(29, 'Michel', 'Michel', 'michel@hotmail.fr', '$2y$10$nKdZ8RiC1srxBCSw0a1hiuIYBKQJMzrsjL9iyOrFxZ32L7pSeVgMG', '2020-11-14 20:28:46', '5w2KXtmKk5XhkasIsctWq6h3ENbliAPa9diy0d73lUGO39kclZO3Cu2nnlQs1chEAVtDglfGkj8Quy0F3sCizq89xsaiLIZn9YaR2At8AhSIXIZ7In9S6wy0', 'abonne'),
(39, 'Luck', 'Lucky', 'lucky.luck@gmail.com', '$2y$10$bpwffGtYudfahi3/I6jVPOlzmQ39NrHs9TMNaZ3EKxFEXDt/Dg2em', '2020-11-14 20:47:25', 'nnTXsLCvGZQHbe5Ive2o6gTIKQ3idURYwrIq3UUwXOtEEIg2nGhs5Yadg3Ylw9H6gIT3RTUGmnzULrmJt6pWYbP0Aodc9d1KTWh95IjA2Oh91gs2vwcaAOOO', 'abonne'),
(40, 'Sannier', 'Océane', 'oceane.sannier76@gmail.com', '$2y$10$Xgk.Nw4d/S.3r8fiST5m0./XyRqG8GTicyn79nENYKSGUmlThIebK', '2020-11-14 23:09:24', 'YXuiiXoKQ7XeAvkKpVdt41HzqS8KILseiWcspLSVlj71B89qn1lr3dRhifBpxxIjuJnZDcTixakSyl4X77e6Qm5GoznmvyAxxqiNx31Hnztf2G4doY5ayFCx', 'abonne');

-- --------------------------------------------------------

--
-- Structure de la table `users-vaccins`
--

CREATE TABLE `users-vaccins` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vaccin` int(11) NOT NULL,
  `date_vaccin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vaccins`
--

CREATE TABLE `vaccins` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `maladie_ciblées` varchar(80) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `presentation` varchar(2000) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vaccins`
--

INSERT INTO `vaccins` (`id`, `nom`, `maladie_ciblées`, `details`, `presentation`, `created_at`, `modified_at`) VALUES
(1, 'Act-Hib®', 'Méningites à Haemophilus influenzae de type b', 'Classe pharmacothérapeutique : Vaccins bactériens - code ATC : J07AG01.\r\n\r\nACT-HIB est un vaccin. Les vaccins sont utilisés pour protéger contre les maladies infectieuses.\r\n\r\nQuand ACT-HIB est injecté, les défenses naturelles du corps élaborent une protection contre ces maladies.\r\n\r\nCe vaccin est indiqué pour la prévention des infections invasives à Haemophilus influenzae type b (méningites, septicémies, cellulites, arthrites, épiglottites,…) chez l’enfant à partir de 2 mois.\r\n\r\nIl ne protège pas contre les infections dues à d’autres types d’Haemophilus influenzae, ni contre les méningites causées par d’autres origines.\r\n\r\nEn aucun cas, la protéine tétanique contenue dans ce vaccin ne peut remplacer la vaccination tétanique habituelle.\r\n\r\n', '> 1 flacon(s) en verre - 1 seringue(s) préremplie(s) en verre de 0,5 ml\r\nCode CIP : 334 720-1 ou 34009 334 720 1 6\r\nDéclaration de commercialisation : 19/03/1992\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 33,63 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 34,65 € \r\nTaux de remboursement : 65%', '2020-11-12 00:00:00', '2020-11-12 10:54:36'),
(2, 'Avaxim 160®', ' Hépatite A', 'L’hépatite A est une infection du foie provoquée par un virus. La transmission de la maladie s’effectue essentiellement à partir du virus présent dans les selles des personnes infectées.', 'Le vaccin contre l’hépatite A est prescrit par un médecin et remboursé par l’assurance maladie dans certaines conditions.\r\n\r\nLe vaccin est disponible en pharmacie et doit être conservé au réfrigérateur entre + 2° C et + 8° C. Il ne doit pas être congelé.\r\n\r\nL’injection du vaccin est prise en charge par l’assurance maladie et les complémentaires santé dans les conditions habituelles.\r\n\r\nIl n’y a pas d’avance de frais dans les centres de vaccination publics, en PMI et dans les CeGIDD.\r\n\r\nLe vaccin est administré par voie intramusculaire. Il doit être administré au moins quinze jours avant le départ.', '2020-11-13 09:02:21', '2020-11-13 00:00:00'),
(3, 'Avaxim 80®', ' Hépatite A', 'L’hépatite A est une infection du foie provoquée par un virus. La transmission de la maladie s’effectue essentiellement à partir du virus présent dans les selles des personnes infectées.', 'L’injection du vaccin est prise en charge par l’assurance maladie et les complémentaires santé dans les conditions habituelles.\r\n\r\nIl n’y a pas d’avance de frais dans les centres de vaccination publics, en PMI et dans les CeGIDD.\r\n\r\nLe vaccin est administré par voie intramusculaire. Il doit être administré au moins quinze jours avant le départ.', '2020-11-13 09:04:24', '2020-11-13 00:00:00'),
(4, 'Bexsero®', ' Méningites et septicémies à méningocoques', 'Les infections à méningocoques sont dues à une bactérie, Neisseria meningitidis, principalement de sérogroupes A, B, C, W et Y. En France, les principaux sérogroupes sont le B et le C.', 'Le vaccin contre les méningocoques est prescrit par un médecin et remboursé par l’assurance maladie dans certaines conditions.\r\n\r\nIl est disponible en pharmacie et doit être conservé au réfrigérateur entre + 2° C et + 8° C. Il ne doit pas être congelé.\r\n\r\nL’injection du vaccin est prise en charge par l’assurance maladie et les complémentaires santé dans les conditions habituelles.\r\n\r\nIl n’y a pas d’avance de frais pour la consultation dans les centres de vaccination publics et en PMI.\r\n\r\nLe vaccin est administré par voie intramusculaire.', '2020-11-13 09:05:37', '2020-11-13 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users-vaccins`
--
ALTER TABLE `users-vaccins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaccins`
--
ALTER TABLE `vaccins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users-vaccins`
--
ALTER TABLE `users-vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vaccins`
--
ALTER TABLE `vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
