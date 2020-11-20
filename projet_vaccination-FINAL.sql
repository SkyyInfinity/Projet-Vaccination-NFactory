-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 nov. 2020 à 09:52
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
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `message`, `created_at`, `statut`) VALUES
(1, 'Yohann Matsiona', 'yohannmats@gmail.com', 'yohann alha odaznoazb', '2020-11-16 19:47:01', 'new'),
(2, 'Yohann Matsiona', 'yohannmats@gmail.com', 'yohann 1', '2020-11-16 20:37:55', 'new'),
(3, 'Yohann caffrey', 'yohannmats@gmail.com', 'yohann 2', '2020-11-16 20:38:44', 'new'),
(4, 'Yohann Matsiona', 'yohannmats@gmail.com', 'id\r\n    Title\r\n    Auteur\r\n    Action', '2020-11-16 20:54:38', 'new'),
(5, 'Yohann Matsiona', 'yohannmats@gmail.com', 'lorem ips', '2020-11-16 20:54:52', 'new'),
(6, 'Yohann Matsiona', 'yohannmats@gmail.com', 'lorme dozjed hoicezb ouhdoeo', '2020-11-16 20:55:03', 'new'),
(17, 'Yohann Matsiona', 'yohannmats@gmail.com', 'le j c\'est le s le j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le sle j c\'est le s', '2020-11-19 15:23:32', 'new'),
(19, 'MyVaccine.org', 'contact@myvaccine.org', 'pensez à faire vos Vaccins', '2020-11-19 18:55:09', 'new'),
(20, 'MyVaccine.org', 'contact@myvaccine.org', 'pensez à faire vos Vaccins', '2020-11-19 18:55:53', 'new'),
(21, 'MyVaccine.org', 'contact@myvaccine.org', 'pensez à faire vos Vaccins', '2020-11-19 18:55:59', 'new'),
(22, 'MyVaccine.org', 'contact@myvaccine.org', 'pensez à faire vos Vaccins', '2020-11-19 18:56:28', 'new'),
(23, 'MyVaccine.org', 'contact@myvaccine.org', 'pensez à faire vos Vaccins', '2020-11-19 18:57:35', 'new');

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
(1, 'Hautecoeur', 'Dylan', 'dylan.hautecoeur@gmail.com', '$2y$10$J.p.g0rZjorpTN1GaKqlGOXw6Y4rjcDK2BpwhMGAA6aaESWHv5XYa', '2020-11-13 19:41:54', 'D0wzhVnnH9d5lw1XAewy3bEdimUsj5K2C6t5HeDsut2O1SpgZ8rQqMjHe9V3GX0dE8wPKms9B3W2ayWQg4o6lwJxYulHez7QdnFYYy47tpbXfUxER5vNnoT6', 'admin'),
(3, 'Neymare', 'Jean', 'jean.neymare@gmail.com', '$2y$10$Xuz/a6AmItM/zOVM0MqpIOSgyZwJFJufinGq5An2K.1UHbPOqilhi', '2020-11-13 21:26:11', '2xwhUdySaMNxoldvwM1Iwn8lXPQ2nIPgfUC4s4nBgKo5rDutR8R9zZ5wF1VoXgWWYDdItgaKIGtS46Z8ZmXboxUaP2P4c12ZrGyakxeKBqkADrAPdSbAdlhT', 'abonne'),
(29, 'Michel', 'Michel', 'michel@hotmail.fr', '$2y$10$nKdZ8RiC1srxBCSw0a1hiuIYBKQJMzrsjL9iyOrFxZ32L7pSeVgMG', '2020-11-14 20:28:46', '5w2KXtmKk5XhkasIsctWq6h3ENbliAPa9diy0d73lUGO39kclZO3Cu2nnlQs1chEAVtDglfGkj8Quy0F3sCizq89xsaiLIZn9YaR2At8AhSIXIZ7In9S6wy0', 'abonne'),
(39, 'Luck', 'Lucky', 'lucky.luck@gmail.com', '$2y$10$bpwffGtYudfahi3/I6jVPOlzmQ39NrHs9TMNaZ3EKxFEXDt/Dg2em', '2020-11-14 20:47:25', 'nnTXsLCvGZQHbe5Ive2o6gTIKQ3idURYwrIq3UUwXOtEEIg2nGhs5Yadg3Ylw9H6gIT3RTUGmnzULrmJt6pWYbP0Aodc9d1KTWh95IjA2Oh91gs2vwcaAOOO', 'abonne'),
(40, 'Sannier', 'Océane', 'oceane.sannier76@gmail.com', '$2y$10$Xgk.Nw4d/S.3r8fiST5m0./XyRqG8GTicyn79nENYKSGUmlThIebK', '2020-11-14 23:09:24', 'YXuiiXoKQ7XeAvkKpVdt41HzqS8KILseiWcspLSVlj71B89qn1lr3dRhifBpxxIjuJnZDcTixakSyl4X77e6Qm5GoznmvyAxxqiNx31Hnztf2G4doY5ayFCx', 'abonne'),
(41, 'Alfonzo', 'Roberto', 'alfonzo.roberto@caliente.br', '$2y$10$/D1qmnutm9qRlO92i3d8EOtFlz5rKymqk5Y99MxhoY0vsVPDug7I2', '2020-11-16 16:25:06', 'Z2Ik8jeYe2wmvl7efaTsPFyKels4d16Clg4tgNA2KaHXWmfPmvmUSITkqflzoQG5kSmopGpvMaioyoHfk11ChdGK2yyoYoRe53XlEh4tt3Pk2Vdby0M84jaD', 'abonne'),
(52, 'blabla', 'blabla', 'tartempion@gmail.com', '$2y$10$greBLNlhj4n4r4i14zYSte1ZHe8K.fIkEChzkgb/6tXNJttz2sHFm', '2020-11-17 16:15:24', '8dV81iQXz68DJgQgO5ZKLSegjzi5gNLxBGGzby1e1WdAl5rQ3EfAHVvbo5ZfMDZ3V7ytuehdk3egQBkRf8sRQMVADkmTJSZXIcbJJCzb7Hl4xJYldqg74hu2', 'abonne');

-- --------------------------------------------------------

--
-- Structure de la table `users_vaccins`
--

CREATE TABLE `users_vaccins` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vaccin` int(11) NOT NULL,
  `date_vaccin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_vaccins`
--

INSERT INTO `users_vaccins` (`id`, `id_user`, `id_vaccin`, `date_vaccin`) VALUES
(1, 52, 1, '0000-00-00 00:00:00'),
(2, 52, 4, '2020-11-18 12:11:34'),
(3, 52, 2, '2020-11-18 12:11:34'),
(11, 52, 0, '2020-11-20 09:27:51'),
(12, 52, 0, '2020-11-20 09:33:24');

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
(1, 'Act-Hib®', 'Méningites à Haemophilus influenzae de type b', 'Classe pharmacothérapeutique : Vaccins bactériens - code ATC : J07AG01.\r\n\r\nACT-HIB est un vaccin. Les vaccins sont utilisés pour protéger contre les maladies infectieuses.\r\n\r\nQuand ACT-HIB est injecté, les défenses naturelles du corps élaborent une protection contre ces maladies.\r\n\r\nCe vaccin est indiqué pour la prévention des infections invasives à Haemophilus influenzae type b (méningites, septicémies, cellulites, arthrites, épiglottites,…) chez l’enfant à partir de 2 mois.\r\n\r\nIl ne protège pas contre les infections dues à d’autres types d’Haemophilus influenzae, ni contre les méningites causées par d’autres origines.\r\n\r\nEn aucun cas, la protéine tétanique contenue dans ce vaccin ne peut remplacer la vaccination tétanique habituelle.', '> 1 flacon(s) en verre - 1 seringue(s) préremplie(s) en verre de 0,5 ml\r\nCode CIP : 334 720-1 ou 34009 334 720 1 6\r\nDéclaration de commercialisation : 19/03/1992\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 33,63 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 34,65 € \r\nTaux de remboursement : 65%', '2020-11-12 00:00:00', '2020-11-18 14:48:32'),
(2, 'Avaxim 160®', 'Hépatite A', 'AVAXIM 160 U est un vaccin.\r\n\r\nLes vaccins sont utilisés pour vous protéger contre les maladies infectieuses.\r\n\r\nCe vaccin aide à protéger contre l\'infection provoquée par le virus de l\'hépatite A chez les personnes âgées de 16 ans et plus.\r\n\r\nL\'infection par l\'hépatite A est due à un virus qui attaque le foie. Elle peut être transmise par des aliments ou boissons contenant le virus. La coloration jaune de la peau (jaunisse) et une sensation de malaise généralisé font partie des symptômes.\r\n\r\nQuand vous recevez une injection d\'AVAXIM 160 U, les défenses naturelles de votre corps élaborent une protection contre l\'infection causée par le virus de l\'hépatite A.\r\n\r\nCe vaccin doit être administré conformément aux recommandations officielles.', '> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec 1 aiguille(s) attachée\r\nCode CIP : 341 665-2 ou 34009 341 665 2 5\r\nDéclaration de commercialisation : 05/02/2018\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 20,86 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 21,88 € \r\nTaux de remboursement : 65%', '2020-11-13 09:02:21', '2020-11-18 14:43:12'),
(17, 'Avaxim 80®', 'Hépatite A', 'AVAXIM 80 U PEDIATRIQUE est un vaccin.\r\n\r\nLes vaccins sont utilisés pour vous protéger contre les maladies infectieuses.\r\n\r\nCe vaccin aide à protéger votre enfant âgé de 12 mois à 15 ans inclus contre l’infection provoquée par le virus de l’hépatite A.\r\n\r\nL\'infection par l\'hépatite A est due à un virus qui attaque le foie.\r\n\r\nElle peut être transmise par des aliments ou boissons contenant le virus.\r\n\r\nLa coloration jaune de la peau (jaunisse) et une sensation de malaise généralisé font partie des symptômes.\r\n\r\nQuand votre enfant reçoit une injection d\'AVAXIM 80 U PEDIATRIQUE, les défenses naturelles de son corps élaborent une protection contre l\'infection causée par le virus hépatite A.\r\n\r\nCe vaccin doit être administré conformément aux recommandations officielles.', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec une aiguille attachée\r\nCode CIP : 356 772-4 ou 34009 356 772 4 2\r\nDéclaration de commercialisation : 22/09/2017\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 13,69 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 14,71 € \r\nTaux de remboursement : 65%', '2020-11-18 14:49:20', '0000-00-00 00:00:00'),
(18, 'Bexsero®', 'Méningites et septicémies à méningocoques', 'Composition en substances actives\r\n  Suspension (Composition pour 0,50 ml)\r\n>  protéine de fusion recombinante NHBA de Neisseria meningitidis groupe B   50 microgrammes\r\n>  protéine recombinante NadA de Neisseria meningitidis groupe B   50 microgrammes\r\n>  protéine de fusion recombinante fHbp de Neisseria meningitidis groupe B   50 microgrammes\r\n>  vésicules de membrane externe (OMV) de Neisseria meningitidis groupe B   25 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec une aiguille attachée\r\nCode CIP : 356 772-4 ou 34009 356 772 4 2\r\nDéclaration de commercialisation : 22/09/2017\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 13,69 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 14,71 € \r\nTaux de remboursement : 65%', '2020-11-18 14:50:43', '0000-00-00 00:00:00'),
(20, 'Boostrixtetra®', 'Diphtérie |  Tétanos |  Poliomyélite |  Coqueluche', 'Composition en substances actives\r\n  Suspension (Composition pour une dose)\r\n>  anatoxine diphtérique   supérieur ou égal à 2 UI (2,5 Lf)\r\n>  anatoxine tétanique   supérieur ou égal à 20 UI (5 Lf)\r\n>  antigène coquelucheux : anatoxine   8 microgrammes\r\n>  antigène coquelucheux : hémagglutinine filamenteuse   8 microgrammes\r\n>  antigène coquelucheux : pertactine   2,5 microgrammes\r\n>  virus poliomyelitique souche Mahoney de type 1 inactivé   40 Unités antigène D\r\n>  virus poliomyélitique souche MEF-1 de type 2 inactivé   8 Unités antigène D\r\n>  virus poliomyélitique souche Saukett de type 3 inactivé   32 Unités antigène D', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec aiguille(s)\r\nCode CIP : 367 738-7 ou 34009 367 738 7 5\r\nDéclaration de commercialisation : 19/09/2005\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 21,15 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 22,17 € \r\nTaux de remboursement : 65%', '2020-11-18 14:53:22', '0000-00-00 00:00:00'),
(21, 'Cervarix®', 'Infections à Papillomavirus humains (HPV)', 'Composition en substances actives\r\n  Suspension (Composition pour une dose de 0,5 ml)\r\n>  protéine L1 de Papillomavirus humain de type 16 (HPV) (recombinant, adsorbé, avec adjuvant)   20 microgrammes\r\n>  protéine L1 de Papillomavirus humain de type 18 (HPV) (recombinant, adsorbé, avec adjuvant)   20 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec 1 aiguille(s)\r\nCode CIP : 381 642-3 ou 34009 381 642 3 7\r\nDéclaration de commercialisation : 21/03/2008\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 93,89 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 94,91 € \r\nTaux de remboursement : 65%', '2020-11-18 14:53:57', '0000-00-00 00:00:00'),
(22, 'Encepur 0,5 ml®', 'Encéphalite à tiques', 'Le virus de l’encéphalite à tiques peut provoquer des infections graves voire mortelles des méninges, du cerveau et/ou de la moelle épinière.\r\n\r\nCe vaccin ne protège que contre l’infection provoquée par le virus de l’encéphalite à tiques, transmise lors de la morsure d’une tique. Il ne protège pas contre l’infection provoquée par la bactérie Borrelia qui est aussi transmise par les tiques et qui provoque des symptômes similaires.\r\n\r\nENCEPUR est indiqué pour l\'immunisation contre l\'encéphalite à tiques des sujets âgés d’au moins 12 ans.\r\n\r\nLes vaccins appartiennent à un groupe de médicaments qui stimulent le système immunitaire (le système de défense naturelle du corps contre les infections) pour développer une protection contre les maladies.\r\n\r\nENCEPUR ne peut pas provoquer la maladie pour laquelle il vous protège.\r\n\r\nComme avec tous les vaccins, ENCEPUR peut ne pas complètement protéger toutes les personnes vaccinées.', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec aiguille attachée\r\nCode CIP : 367 745-3 ou 34009 367 745 3 7\r\nDéclaration de commercialisation : 17/03/2009\r\nCette présentation est agréée aux collectivités\r\nPrix libre, médicament non remboursable', '2020-11-18 15:04:00', '0000-00-00 00:00:00'),
(23, 'Engerix B 10®', 'Hépatite B', 'Ce vaccin peut être administré aux nouveau-nés, aux enfants et aux adolescents jusqu’à l’âge de 15 ans inclus.\r\n\r\nL\'hépatite B est une maladie infectieuse du foie causée par un virus. Certaines personnes portent le virus de l\'hépatite B dans leur organisme, mais ne peuvent pas s’en débarrasser. Elles peuvent toujours infecter d’autres personnes et sont considérées comme porteuses du virus. La maladie est propagée par le virus qui pénètre dans l\'organisme après un contact avec des fluides corporels, le plus souvent par le sang d\'une personne infectée.\r\nSi la mère est porteuse du virus ; elle peut le transmettre à son bébé à la naissance. Il est également possible d\'attraper le virus d’un porteur, par exemple, par le biais de rapports sexuels non protégés, de partage d’aiguilles d\'injection ou lors d’un traitement par un équipement médical n’ayant pas été correctement stérilisé.\r\n\r\nLes principaux signes de la maladie incluent maux de tête, fièvre, nausées et jaunisse (jaunissement de la peau et les yeux) mais, chez environ 3 patients sur 10 il n\'y a aucun signe de maladie.\r\n\r\nChez les personnes infectées par l\'hépatite B, 1 adulte sur 10 et jusqu’à 9 bébés sur 10 deviendront porteurs du virus et seront susceptibles de continuer à développer des lésions hépatiques graves et, dans certains cas un cancer du foie.\r\n\r\nComment ENGERIX B 10 microgrammes/0,5 ml fonctionne :\r\n\r\nENGERIX B 10 microgrammes/0,5 ml contient une petite quantité de « l’enveloppe externe » du virus de l\'hépatite B. Cette « enveloppe externe » n\'est pas contagieuse et ne peut pas vous rendre malade.\r\n\r\n· Lorsque l’on vous administrera le vaccin, il va déclencher le système immunitaire de votre corps pour le préparer à se protéger contre ces virus dans le futur.\r\n\r\n· ENGERIX B 10 microgrammes/0,5 ml ne vous protègera pas si vous êtes déjà infecté par le virus de l\'hépatite B.\r\n\r\n· ENGERIX B 10 microgrammes/0,5 ml peut seulement vous aider à vous protéger contre l\'infection par le virus de l\'hépatite B.', 'Présentations\r\n> 1 seringue(s) backstop préremplie(s) en verre de 0,5 ml\r\nCode CIP : 351 670-9 ou 34009 351 670 9 5\r\nDéclaration de commercialisation : 15/02/2001\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 8,58 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 9,60 € \r\nTaux de remboursement : 65%', '2020-11-18 15:04:33', '0000-00-00 00:00:00'),
(24, 'Gardasil®', 'Infections à Papillomavirus humains (HPV)', 'Suspension (Composition pour une dose de 0,5 ml)\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 11   40 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 16   40 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 18   20 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 6   20 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre avec 2 aiguille(s) de 0,5 ml\r\nCode CIP : 377 130-1 ou 34009 377 130 1 6\r\nDéclaration de commercialisation : 07/11/2007\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 104,27 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 105,29 € \r\nTaux de remboursement : 65%', '2020-11-18 15:14:18', '0000-00-00 00:00:00'),
(25, 'Gardasil 9®', 'Infections à Papillomavirus humains (HPV)', 'Composition en substances actives\r\n  Suspension (Composition pour une dose de 0,5 ml)\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 11   40 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 16   60 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 18   40 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 6   30 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 31   20 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 33   20 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 45   20 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 52   20 microgrammes\r\n>  protéine L1 recombinante adsorbée du virus humain Papillomavirus HPV type 58   20 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec aiguille(s)\r\nCode CIP : 34009 300 562 0 2\r\nDéclaration de commercialisation : 16/08/2018\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 115,81 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 116,83 € \r\nTaux de remboursement : 65%', '2020-11-18 15:14:55', '0000-00-00 00:00:00'),
(26, 'HBVAXPRO 10®', 'Hépatite B', 'Composition en substances actives\r\n  Suspension (Composition pour 1 ml)\r\n>  antigène de surface de l\'hépatite B recombinant   10 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 1 ml avec 2 aiguille(s)\r\nCode CIP : 369 246-4 ou 34009 369 246 4 2\r\nDéclaration de commercialisation : 25/09/2006\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 14,46 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 15,48 € \r\nTaux de remboursement : 65%', '2020-11-18 15:15:29', '0000-00-00 00:00:00'),
(27, 'HBVAXPRO 5®', 'Hépatite B', 'Composition en substances actives\r\n  Suspension (Composition pour 0,5 ml)\r\n>  antigène de surface de l\'hépatite B recombinant   5 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec 2 aiguille(s)\r\nCode CIP : 369 242-9 ou 34009 369 242 9 1\r\nDéclaration de commercialisation : 07/08/2006\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 8,15 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 9,17 € \r\nTaux de remboursement : 65%', '2020-11-18 15:16:01', '0000-00-00 00:00:00'),
(28, 'Havrix 1440®', 'Hépatite A', 'Indications thérapeutiques\r\nClasse pharmacothérapeutique - code ATC : VACCIN CONTRE L’HEPATITE A (J : Anti-infectieux)\r\n\r\nCe médicament est un vaccin.\r\n\r\nCe médicament est préconisé dans la prévention de l’infection provoquée par le virus de l’hépatite A chez l’adulte de plus de 15 ans.\r\n\r\nL’hépatite A est une infection virale du foie. Lorsqu’une personne reçoit ce vaccin, le système immunitaire (le système de défense naturelle de l’organisme) fabrique sa propre protection (anticorps) contre la maladie. Aucun des composants contenus dans le vaccin ne peut provoquer une hépatite A.\r\n\r\nLa vaccination contre l\'hépatite virale A est recommandée pour les sujets qui présentent un risque d’exposition au virus de l’hépatite A.\r\n\r\nIl ne protège pas contre les infections dues à d\'autres types de virus de l\'hépatite, ni d\'autres agents pathogènes connus du foie.\r\n\r\nCe vaccin doit être administré conformément aux recommandations officielles.\r\n\r\nComposition en substances actives\r\n  Suspension (Composition pour 1 ml)\r\n>  virus de l\'hépatite A souche HM175 inactivé adsorbé   1440 U', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 1 ml\r\nCode CIP : 337 751-5 ou 34009 337 751 5 5\r\nDéclaration de commercialisation : 19/11/1994\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 20,86 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 21,88 € \r\nTaux de remboursement : 65%', '2020-11-18 15:16:46', '0000-00-00 00:00:00'),
(29, 'Havrix 720®', 'Hépatite A', 'Indications thérapeutiques\r\nClasse pharmacothérapeutique - code ATC : VACCIN CONTRE L’HEPATITE A (J : Anti-infectieux)\r\n\r\nCe médicament est un vaccin.\r\n\r\nCe médicament est préconisé dans la prévention de l’infection provoquée par le virus de l’hépatite A chez l’enfant à partir de l’âge de 1 an.\r\n\r\nL’hépatite A est une infection virale du foie. Lorsqu’un enfant reçoit ce vaccin, le système immunitaire (le système de défense naturelle de l’organisme) fabrique sa propre protection (anticorps) contre la maladie. Aucun des composants contenus dans le vaccin ne peut provoquer une hépatite A.\r\n\r\nLa vaccination contre l’hépatite virale A est recommandée pour les sujets qui présentent un risque d’exposition au virus de l’hépatite A.\r\n\r\nIl ne protège pas contre les infections dues à d\'autres types de virus de l\'hépatite, ni d\'autres agents pathogènes connus du foie.\r\n\r\nCe vaccin doit être administré conformément aux recommandations officielles.\r\n\r\nComposition en substances actives\r\n  Suspension (Composition pour 0,5 ml de suspension injectable)\r\n>  virus de l\'hépatite A souche HM175 inactivé adsorbé   720 U', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml\r\nCode CIP : 347 604-5 ou 34009 347 604 5 7\r\nDéclaration de commercialisation : 11/01/1999\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 13,69 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 14,71 € \r\nTaux de remboursement : 65%', '2020-11-18 15:18:23', '0000-00-00 00:00:00'),
(31, 'Hexyon®', 'Diphtérie |  Tétanos |  Poliomyélite |  Coqueluche', 'Composition en substances actives\r\n  Suspension (Composition pour 0,50 ml)\r\n>  anatoxine diphtérique   supérieur ou égal à 20 UI\r\n>  anatoxine tétanique   supérieur ou égal à 40 UI\r\n>  antigène coquelucheux : anatoxine   25 microgrammes\r\n>  antigène coquelucheux : hémagglutinine filamenteuse   25 microgrammes\r\n>  virus poliomyelitique souche Mahoney de type 1 inactivé   40 U.D\r\n>  virus poliomyélitique souche MEF-1 de type 2 inactivé   8 U.D\r\n>  virus poliomyélitique souche Saukett de type 3 inactivé   32 U.D\r\n>  antigène de surface de l\'hépatite B recombinant   10 microgrammes\r\n>  polyoside Haemophilus influenzae type b conjugué à l\'anatoxine tétanique  12 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec 2 aiguille(s)\r\nCode CIP : 273 503-6 ou 34009 273 503 6 8\r\nDéclaration de commercialisation : 04/04/2016\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 34,45 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 35,47 € \r\nTaux de remboursement : 65%', '2020-11-18 15:20:32', '0000-00-00 00:00:00'),
(32, 'Imovax Polio®', 'Poliomyélite', 'Composition en substances actives\r\n  Suspension (Composition pour une dose de 0,5 ml)\r\n>  virus poliomyelitique souche Mahoney de type 1 inactivé   40 Unité antigène D\r\n>  virus poliomyélitique souche MEF-1 de type 2 inactivé   8 Unité antigène D\r\n>  virus poliomyélitique souche Saukett de type 3 inactivé   32 Unité antigène D', 'Présentations\r\n> 1 seringue(s) pré-remplie(s) en verre de 0,5 ml\r\nCode CIP : 325 755-0 ou 34009 325 755 0 3\r\nDéclaration de commercialisation : 01/11/1998\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 3,70 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 4,72 € \r\nTaux de remboursement : 65%', '2020-11-18 15:21:17', '0000-00-00 00:00:00'),
(33, 'Influvac tetra®', 'Grippe', 'Indications thérapeutiques\r\nINFLUVAC TETRA est un vaccin. Ce vaccin vous aide, vous ou votre enfant à vous protéger contre la grippe, en particulier les personnes présentant un risque élevé de complications associées. INFLUVAC TETRA est indiqué chez l’adulte et l’enfant à partir de 3 ans. INFLUVAC TETRA doit être utilisé selon les recommandations officielles.\r\n\r\nQuand une personne reçoit le vaccin INFLUVAC TETRA, son système immunitaire (système de défense naturelle de l’organisme) développe sa propre protection (anticorps) contre la maladie. Aucun des composants contenus dans le vaccin ne peut provoquer la grippe.\r\n\r\nLa grippe est une maladie qui peut se propager rapidement et qui est causée par différentes souches de virus qui peuvent changer chaque année. C’est pourquoi vous ou votre enfant pouvez avoir besoin d’être vacciné chaque année. Le plus grand risque de contracter la grippe se situe pendant les mois les plus froids, entre octobre et mars. Si vous ou votre enfant n’avez pas été vacciné durant l’automne, il est encore possible de l’être jusqu’au printemps car vous ou votre enfant courrez le risque de contracter la grippe jusqu’à cette période. Votre médecin pourra vous recommander le meilleur moment pour vous faire vacciner.\r\n\r\nINFLUVAC TETRA vous protégera, vous ou votre enfant, contre les quatre souches de virus contenues dans le vaccin environ 2 à 3 semaines après l’injection.\r\n\r\nLa période d’incubation de la grippe est de quelques jours ; ainsi, si vous ou votre enfant êtes exposé(e) à la grippe juste avant ou juste après la vaccination, vous ou votre enfant pouvez encore développer la maladie.\r\n\r\nLe vaccin ne vous protégera pas, vous ou votre enfant, contre un rhume bien que certains symptômes soient similaires à ceux de la grippe.', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec aiguille(s)\r\nCode CIP : 34009 301 177 1 2\r\nDéclaration de commercialisation : 04/09/2018\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 11,17 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 12,19 € \r\nTaux de remboursement : 65%', '2020-11-18 15:22:29', '0000-00-00 00:00:00'),
(34, 'Ixiaro®', 'Encéphalite japonaise', 'Composition en substances actives\r\n  Suspension (Composition pour une dose de 0,5 ml)\r\n>  virus de l\'encéphalite japonaise inactivé, souche SA(14)-14-2   6 microgrammes', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml\r\nCode CIP : 393 959-7 ou 34009 393 959 7 5\r\nDéclaration de commercialisation : 28/07/2009\r\nCette présentation est agréée aux collectivités\r\nPrix libre, médicament non remboursable', '2020-11-18 15:22:55', '0000-00-00 00:00:00'),
(35, 'Menjugate 10®', 'Méningites et septicémies à méningocoques', 'Indications thérapeutiques\r\nClasse pharmacothérapeutique - code ATC : J07A H\r\n\r\nMENJUGATE est un vaccin qui est utilisé pour prévenir une maladie causée par une bactérie appelée Neisseria meningitidis du sérogroupe C (à laquelle il est également fait référence sous le nom de bactérie méningococcique du sérogroupe C). Le vaccin fonctionne en forçant votre corps à créer sa propre protection (anticorps) contre ces bactéries méningococciques du groupe C.\r\n\r\nLes bactéries Neisseria meningitidis du sérogroupe C peuvent causer des infections graves et mettant quelquefois en jeu la vie des patients telles que la méningite et la septicémie (empoisonnement du sang).\r\n\r\nCe vaccin est utilisé pour l\'immunisation active des enfants dès l\'âge de 2 mois, des adolescents et des adultes et protège uniquement contre les bactéries méningococciques du sérogroupe C. Il ne peut pas protéger contre d’autres sérogroupes (souches) de bactéries méningococciques ou contre d’autres causes de méningite et de septicémie (empoisonnement du sang). Si à un moment quelconque vous ou votre enfant présentez des douleurs/raideur de la nuque ou une gêne à la lumière (photophobie), une somnolence ou une confusion, des taches rouges ou violettes ressemblant à des contusions qui ne disparaissent pas à la pression, vous devez contacter immédiatement votre médecin ou le Service des Urgences local.\r\n\r\nCe vaccin ne provoque pas de méningite à méningocoque C (maladie méningococcique du groupe C).\r\n\r\nCe vaccin contient la protéine Cross Reacting Material (appelée CRM197) dérivée des bactéries causant la diphtérie. MENJUGATE ne protège pas contre la diphtérie. Ceci signifie que vous (ou votre enfant) devrez recevoir d’autres vaccins immunisants contre la diphtérie quand ils sont dus ou quand votre médecin vous le recommande.', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,6 ml\r\nCode CIP : 34009 300 176 0 9\r\nDéclaration de commercialisation : 23/09/2015\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 19,94 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 20,96 € \r\nTaux de remboursement : 65%', '2020-11-18 15:23:25', '0000-00-00 00:00:00'),
(36, 'Menveo®', 'Méningites et septicémies à méningocoques', 'Composition en substances actives\r\n  Poudre (Composition pour 0,5 ml de vaccin reconstitué)\r\n>  Neisseria meningitidis du groupe A (oligoside de) conjugué à la protéine CRM197  10 µg d\'oligoside de Neisseria meningitidis du groupe A\r\n  Solution (Composition pour 0,5 ml de vaccin reconstitué)\r\n>  oligoside de Neisseria meningitidis du groupe C conjugué à la protéine CRM197  5 µg d\'oligoside de Neisseria meningitidis du groupe C\r\n>  oligoside de Neisseria meningitidis du groupe W135 conjugué à la protéine CRM197  5 µg d\'oligoside de Neisseria meningitidis du groupe W135\r\n>  oligoside de Neisseria meningitidis du groupe Y conjugué à la protéine CRM197  5 µg d\'oligoside de Neisseria meningitidis du groupe Y', 'Présentations\r\n> 1 flacon(s) en verre - 1 flacon(s) en verre\r\nCode CIP : 217 029-0 ou 34009 217 029 0 3\r\nDéclaration de commercialisation : 17/12/2012\r\nCette présentation est agréée aux collectivités\r\nInscription sur la liste de rétrocession au titre de son AMM, selon les conditions précisées au Journal Officiel. Prix de cession publié au Journal Officiel.\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 40,80 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 41,82 € \r\nTaux de remboursement : 65%', '2020-11-18 15:24:30', '0000-00-00 00:00:00'),
(37, 'NeisVac®', 'Méningites et septicémies à méningocoques', 'Indications thérapeutiques\r\nClasse pharmacothérapeutique : vaccin anti-méningococcique\r\n\r\nNEISVAC appartient à un groupe général de médicaments appelé vaccins, qui sont utilisés pour protéger contre les maladies infectieuses. NEISVAC est utilisé pour prévenir la maladie due à la bactérie appelée Neisseria meningitidis du groupe C. Ce vaccin agit en aidant votre organisme à créer sa propre protection (anticorps) contre la bactérie du groupe C.\r\n\r\nNeisseria meningitidis du groupe C peut provoquer des infections graves, telles que la méningite et la septicémie (empoisonnement du sang). Ces infections sont parfois mortelles.\r\n\r\nCe vaccin protège uniquement contre la maladie causée par la bactérie méningocoque de groupe C. Il ne protège pas contre les autres groupes de méningocoques ou les autres organismes qui provoquent des méningites et l’empoisonnement du sang. Comme avec les autres vaccins, NEISVAC ne peut pas protéger complètement contre les infections méningococciques du groupe C chez toutes les personnes qui sont vaccinées.', 'Présentations\r\n> 1 seringue(s) préremplie(s) en verre de 0,5 ml avec 2 aiguille(s)\r\nCode CIP : 362 773-9 ou 34009 362 773 9 7\r\nDéclaration de commercialisation : 08/12/2003\r\nCette présentation est agréée aux collectivités\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 19,94 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 20,96 € \r\nTaux de remboursement : 65%', '2020-11-18 15:25:04', '0000-00-00 00:00:00'),
(38, 'Nimenrix®', 'Méningites et septicémies à méningocoques', 'Composition en substances actives\r\n  Poudre (Composition pour une dose de 0,5 ml de solution)\r\n>  polyoside de Neisseria meningitidis de groupe A conjugué à l\'anatoxine tétanique  5 microgrammes polyoside de Neisseria meningitidis de groupe A\r\n>  polyoside de Neisseria meningitidis de groupe C conjugué à la protéine tétanique   5 microgrammes polyoside de Neisseria meningitidis de groupe C\r\n>  polyoside de Neisseria meningitidis de groupe W-135 conjugué à l\'anatoxine tétanique  5 microgrammes polyoside de Neisseria meningitidis de groupe W135 pr une dose de 0,5 ml de solution\r\n>  polyoside de Neisseria meningitidis de groupe Y conjugué à l\'anatoxine tétanique  5 microgrammes polyoside de Neisseria meningitidis de groupe Y\r\n  Solvant (Composition )\r\n>  Pas de substance active.', 'Présentations\r\n> 1 flacon(s) en verre - 1 seringue(s) préremplie(s) en verre avec 2 aiguille(s)\r\nCode CIP : 222 539-3 ou 34009 222 539 3 0\r\nDéclaration de commercialisation : 29/11/2012\r\nCette présentation est agréée aux collectivités\r\nInscription sur la liste de rétrocession au titre de son AMM, selon les conditions précisées au Journal Officiel. Prix de cession publié au Journal Officiel.\r\nEn pharmacie de ville : Prix hors honoraire de dispensation : 40,80 € Honoraire de dispensation : 1,02 € Prix honoraire compris : 41,82 € \r\nTaux de remboursement : 65%', '2020-11-18 15:25:42', '0000-00-00 00:00:00'),
(40, 'Pneumovax®', 'Méningites et septicémies à méningocoques', 'Indications thérapeutiques\r\nClasse pharmacothérapeutique: vaccin pneumococcique, Code ATC: J07AL.\r\n\r\nPNEUMOVAX est un vaccin pneumococcique. Les vaccins sont utilisés pour protéger vous ou votre enfant contre les maladies infectieuses. Votre médecin a recommandé que vous ou votre enfant (âgé de 2 ans et plus) receviez le vaccin pour vous aider à vous protéger contre des infections graves dues à des bactéries appelées pneumocoques.\r\n\r\nLes pneumocoques peuvent provoquer des infections des poumons (en particulier les pneumonies), de l\'enveloppe entourant le cerveau et la moelle épinière (méningites) ainsi que du sang (bactériémie ou septicémie). Le vaccin protégera vous ou votre enfant uniquement contre les infections pneumococciques dues aux types de bactéries contenues dans le vaccin. Cependant, les 23 types pneumococciques contenus dans le vaccin sont responsables de la plupart des infections dues aux pneumocoques (environ 9 infections sur 10).\r\n\r\nLorsque vous ou votre enfant recevez le vaccin, les défenses naturelles du corps produisent des anticorps qui protègent des infections pneumococciques.\r\n\r\nLes infections pneumococciques surviennent dans le monde entier et peuvent être contractées sans distinction de personne ou d\'âge cependant le risque est accru pour :\r\n\r\n· les personnes âgées,\r\n\r\n· les personnes qui n\'ont plus de rate ou dont la rate ne fonctionne pas,\r\n\r\n· les personnes présentant une faible résistance aux infections car elles sont atteintes de maladies chroniques ou d\'infections (comme les maladies cardiaques, les maladies pulmonaires, le diabète sucré, les maladies rénales, les maladies hépatiques ou les infections par le VIH),\r\n\r\n· les personnes présentant une faible résistance aux infections dû à un traitement contre certaines maladies (telles que le cancer).', 'présentation indisponible', '2020-11-18 15:28:51', '0000-00-00 00:00:00'),
(41, 'Rabipur®', 'Rage', 'Indications thérapeutiques\r\nQu’est-ce que Rabipur\r\n\r\nRabipur est un vaccin contenant le virus de la rage qui a été tué. Après administration du vaccin, le système immunitaire (les défenses naturelles de l’organisme contre les infections) produit des anticorps contre le virus responsable de la rage. Ces anticorps protègent contre les infections ou les maladies provoquées par le virus responsable de la rage. Aucun des composants du vaccin ne peut provoquer la rage.\r\n\r\nDans quel cas Rabipur est-il utilisé\r\n\r\nRabipur peut être utilisé chez des personnes de tous âges.\r\n\r\nRabipur peut être utilisé pour prévenir la rage:\r\n\r\n· avant un risque possible d\'exposition au virus de la rage (prophylaxie pré-exposition).\r\n\r\nou\r\n\r\n· après une exposition suspectée ou prouvée au virus de la rage (prophylaxie post-exposition).\r\n\r\nLa rage est une infection qui peut être transmise lorsqu\'une personne est mordue, griffée ou même simplement léchée par un animal infecté, en particulier si la peau est déjà abîmée. Le contact avec des pièges pour animaux ayant été léchés ou mordus par des animaux infectés peut également provoquer des infections chez les Hommes.', 'présentation indisponible', '2020-11-18 15:29:26', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_vaccins`
--
ALTER TABLE `users_vaccins`
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
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `users_vaccins`
--
ALTER TABLE `users_vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `vaccins`
--
ALTER TABLE `vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
