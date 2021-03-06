-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 nov. 2020 à 19:42
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Dodge'),
(2, 'Mercedes'),
(3, 'Bugatti'),
(4, 'Ferrari'),
(14, 'Audi'),
(21, 'BMW'),
(22, 'Ford'),
(23, 'Hyundai'),
(36, 'Chevrolet'),
(37, 'Renault'),
(38, ' Aston Martin');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `Comment_id` int(3) NOT NULL,
  `Comment_post_id` int(3) NOT NULL,
  `Comment_user` int(3) NOT NULL,
  `Comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `Comment_content` text NOT NULL,
  `Comment_status` varchar(255) NOT NULL,
  `Comment_date` text NOT NULL DEFAULT current_timestamp(),
  `comment_user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`Comment_id`, `Comment_post_id`, `Comment_user`, `Comment_author`, `comment_email`, `Comment_content`, `Comment_status`, `Comment_date`, `comment_user_image`) VALUES
(100, 42, 38, 'TAHA', 'taharafik89@gmail.com', 'Benzooooooooo', 'Approved', '03/11/20', 'Inst-image-37.jpg'),
(102, 220, 38, 'TAHA', 'taharafik89@gmail.com', 'Nice Car\r\n', 'Approved', '04/11/20', 'Inst-image-37.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` int(3) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` text NOT NULL DEFAULT current_timestamp(),
  `post_image` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` text NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Dodge Demon', 38, 'Taha RafiQ', '25/10/20', 'Dodge Challenger Demon.jpg', '<p>La <strong>Challenger</strong> de troisième génération est une muscle car produite par le constructeur automobile américain Dodge à partir de 2008. Elle vient remplacer la seconde génération de la Dodge Stratus coupé et relance ainsi Dodge dans le domaine des muscle cars.</p><p>Ah, the Dodge Demon; star of episode four of all-new TG TV. It’s an unhinged, drag-racing ultra-muscle-car that spanks the bonkers 707bhp Dodge Hellcat into second class citizenship of Muscle Car&nbsp;world.</p><p>How? Well, it’s all thanks to 840bhp, 770lb ft of torque and some of the craziest drag tech ever put on a production car. And did we mention that it’ll do wheelies? Yep, Dodge has gone mad and we love&nbsp;it.&nbsp;</p><p>The Demon is the work of Dodge’s most hardcore guys who are car enthusiasts of the highest order. They holed themselves up in a room, applied the logic of aftermarket but then massaged it within the restraints of American&nbsp;regulation.</p><p>You get the impression that working on the Demon project would be fun (beers at lunch, Dickies denim and lots of heavy metal) but they’ve also proven they’re incredible engineers, given it’s&nbsp;mad as a badger but will still keep the government happy. It even has the benefit of a warranty slapped on the windscreen.&nbsp;What’s been achieved with the Demon is remarkable, as it’s not re-written the rulebook, but fed it spine first into the&nbsp;shredder.&nbsp;</p><p>The Demon has&nbsp;so many world firsts that Dodge’s official press release would have been better written on a scroll rather than hectares of paper. And no matter how many times you read them, they never get any less&nbsp;impressive.&nbsp;</p><p>To make them easier&nbsp;to swallow, we’ve&nbsp;galleried&nbsp;up all the Demon’s incredible stats, world firsts and heavy artillery pub ammo to show you just how mad this wheelie-popping lunatic is. Seriously, if there’s one car you need in your hand of Top Trumps, it’s this&nbsp;one.&nbsp;</p>', 'car cars Demon Dodge Srt Hemi Super Fast Speed Drag Race', 2, 'Public', 10),
(2, 4, 'Ferrari F12', 38, 'Taha RAfiQ', '24/10/20', 'Ferrari F12 Berlinetta.jpg', '<p>La <strong>Ferrari F12berlinetta</strong> ou <strong>F12</strong> est une voiture sportive de grand tourisme produite par le constructeur italien Ferrari. Elle a été dévoilée au public le 29 fevrier 2012.</p><p>Elle remplace la Ferrari 599 GTB Fiorano (ou Ferrari 599 GTO) commercialisée en 2006, et s\'inscrit et succède, plus généralement, à la lignée traditionnelle des GT Ferrari à 2 places équipées d\'un V12 à l\'avant.</p><p>En 2017, la F12berlinetta est remplacée par la Ferrari 812 Superfast.</p><p>Les premières photos de la remplaçante de la Fiorano sont dévoilées le 29 février 2012. Elle est présentée à l\'occasion du 82e Salon International de l\'Auto et Accessoires de Genève le 6 mars de la même année. Alors que la presse spécialisée pensait qu’elle allait endosser le patronyme de F620 GT ou F620, le \"Cavallino\" a nommé sa nouvelle voiture F12berlinetta, modèle de route le plus puissant jamais proposé par la firme de Maranello.</p><p>La F12berlinetta bénéficie de plusieurs innovations technologiques dérivées de l\'expérience acquise en F1 afin de se mettre au niveau de ses concurrentes, les coupés V12 tels que la Lamborghini Aventador1,2.</p><p>Le V12 à 65° placé en position centrale avant, dérivé de celui qui équipait les Ferrari Enzo et Ferrari FXX, voit sa cylindrée augmentée à 6 262 cm3 et délivre 735 ch + 6 ch grappillés à haute vitesse grâce à une sorte de gavage en air du moteur(soit 118 ch/litre) à 8&nbsp;250 tours par minute mais dispose de 80&nbsp;% de cette valeur dès 2&nbsp;500 tours. Le rapport volumétrique atteint une valeur très élevée de 13,5:1 pour un moteur atmosphérique essence. La voiture est équipée d\'une boîte manuelle robotisée type F1 avec un double embrayage.</p><p>Selon le constructeur, la vitesse maximale obtenue est de 340 km/h, le 0 à 100 km/h est donné pour 3,1 secondes et le 0 à 200 km/h pour 8,5 secondes.</p>', 'car cars F12 Ferrari', 0, 'Public', 1),
(40, 1, 'Classic Charger 1967 ', 38, 'Taha RAfiQ', '25/10/20', '1967 Dodge Charger RT.jpg', '<p><i><strong>From the November 1967 issue of </strong></i><strong>Car and Driver</strong><i><strong>.</strong></i></p><p>Last year, we applauded Plymouth for building what we thought was the best looking Detroit car of 1967, the Barracuda. A remarkable feat, considering the <strong>Chrysler</strong> Corporation\'s odd, unstable styling history which, since the Airflow, has been marked by committee-styled cars which, aside from lacking integrity of design, have oscillated between being far out to the point of vulgarity and being timid to the point of sterility—a seemingly endless series of over-compensations for each preceding year. With this background, we were pleasantly surprised by the ‘67 Barracuda, but quite prepared to wait years before Chrysler came up with a worthy successor. We conjured a picture of designers and stylists lying about their studios, spent, from their Barracuda effort, and barely able to create so much as a new bumper for 1968.</p>', 'car cars Charger Dodge Srt Hemi', 1, 'Public', 15),
(41, 3, 'Bugatti Veyron', 38, 'Taha RAfiQ', '23/10/20', 'Bugatti Veyron.jpeg', '<p>La <strong>Veyron </strong>16.4 est une supercar du constructeur automobile français <strong>Bugatti</strong> produite de 2005 à 2015, atteignant la vitesse de 431,072 km/h dans sa version Super Sport, elle était alors la voiture de série la plus rapide du monde.</p>', 'car cars Bugatti Veyron Speed', 0, 'Public', 4),
(42, 2, 'Mercedes AMG', 38, 'User', '24/10/20', 'Amg Classe C coupe.jpeg', '<p><strong>Mercedes-AMG</strong> est un préparateur allemand de voitures du constructeur <strong>Mercedes-Benz</strong>. Devenu une filiale de la marque depuis 1999, c\'est le seul constructeur au monde à proposer plus de quinze modèles de plus de 500 chevaux et certains modèles dépassent les 600 chevaux.</p>', 'car cars Mercedes Amg Coupe Classe C ', 0, 'Public', 5),
(50, 14, 'Audi R8 2020', 38, 'Taha RAfiQ', '24/10/20', '356933_2020_Audi_R8.jpg', '<h3><strong>2020 Audi R8 Models</strong></h3><p>Just two trims are available in the R8 lineup: V10 and V10 Performance.</p><p>The standard Audi R8 V10 comes with 5.2-liter V10 (shocker) that develops 562 hp and 406 lb-ft of torque. The model is only available with a seven-speed dual-clutch automatic and Quattro all-wheel-drive. Speaking of wheels, the R8\\\\\\\\\\\\\\\'s are 19-inch items, with 20s optional. LED headlights are standard, with laser lighting available, and the cockpit features heated seats with power-adjustment, as well as dual-zone climate control, Alcantara headlining and Nappa leather upholstery. Keyless entry, heated mirrors, rain-sensing wipers, cruise control, an electrically-deployable rear wing, and adaptive magnetic dampers are also standard. You also get a 13-speaker Bang &amp; Olufsen audio setup, wireless charging, and a 12.3-inch driver instrument display with navigation and smartphone connectivity.</p><p>The R8 V10 Performance has an upgraded engine with 602 hp and 413 lb-ft of torque. It also gets carbon fiber trimmings on the interior and sports seats. However, these seats do without adjustment, and the performance focus is further amplified by the deletion of the B&amp;O sound system that you now have to pay extra for. On the plus side, you get 20-inch wheels, laser headlights, and carbon-ceramic brakes as standard. In addition, the trunk features a fixed carbon-fiber wing.</p><h4><a href=\"\\\"><i>2020 Audi R8 Coupe Trims &amp; Specs</i></a></h4>', 'car cars Audi Superfast Speed 2020 R8 V10', 0, 'Public', 2),
(51, 14, 'Audi Q8', 38, 'Taha RAfiQ', '25/10/20', '401940-2020-audi-q8.jpg', '<h4><strong>Bienvenue dans la 8e dimension.</strong></h4><p>Le premier SUV Coupé Audi voit grand : calandre Singleframe imposante, ailes élargies, jantes de 22’’… sans oublier son arsenal technologique de pointe. Inspirée de l’Audi quattro originelle, l’Audi Q8 s’impose dès le premier regard comme la nouvelle référence des SUV Coupé premium. Du jamais vu.</p>', 'car cars Audi Superfast Speed Q8', 0, 'Public', 5),
(70, 21, 'BMW 2 Serie 2021', 38, 'Taha RAfiQ', '25/10/20', '2021-bmw-2-series.jpg', '<p>The 2021 BMW 2-series delivers everything we love about <a href=\"https://www.caranddriver.com/bmw\"><strong>BMW\'s</strong></a> sporty driving dynamics in a handsome, well-priced package. Offered in both hardtop coupe and softtop convertible body styles, the 2-series is a compact sports car with plenty of compelling traits. The 230i model is powered by a 248-hp turbocharged four-cylinder, but upgrading to the M240i swaps in a turbocharged 3.0-liter inline-six that makes a stout 335 horsepower. Rear-wheel drive is standard, but BMW offers its xDrive all-wheel drive system as an option on both models. If you\'re looking for more practicality, you might find that one of this car\'s four-door rivals—such as the <a href=\"https://www.caranddriver.com/audi/a3\"><strong>Audi A3</strong></a>, the <a href=\"https://www.caranddriver.com/mercedes-benz/a-class\"><strong>Mercedes-Benz A-class</strong></a>, or even <a href=\"https://www.caranddriver.com/bmw/2-series-gran-coupe\"><strong>BMW\'s own 2-series Gran Coupe</strong></a>—fits the bill, but the 2-series coupe and convertible will be the choice of those who value driving verve over day-to-day usefulness.</p>', 'car cars BMW Superfast Speed 2SERIE 2021', 0, 'Public', 4),
(71, 37, 'Renault Megane 2021', 38, 'Taha RAfiQ', '26/10/20', 'modele_voiture_future_Renault.jpg', '<h4><strong>RENAULT Mégane 4 restylée</strong></h4><p>L\'ancienne génération de Mégane avait eu droit à un lifting assez visible, avec la greffe d\'un nouveau faciès. Mais le modèle actuel prefere, lui, se contenter d\'un coup de jeune subtil, qui ne saute pas aux yeux d\'emblée. Pour identifier ce restylage, le plus sûr reste de regarder sa calandre, dont les barrettes sont dédoublées, le pare-chocs avant, qui évoque un peu l\'ancienne Golf R-Line avec son dessin plus agressif sur certaines finitions, ou encore les phares, dotés d\'un éclairage 100 % diodes. De l\'arrière, c\'est finalement peut-être plus facile, puisque les feux adoptent une toute nouvelle signature et abandonnent leur partie blanche. Une finition RS Line apparaît également en remplacement de l\'ancienne GT Line, ainsi que trois nouvelles teintes et des jantes inédites. Mais pas de quoi démoder l\'ancienne version : une continuité devenue une volonté de la marque pour limiter la décote.</p><p><strong>Un écran plus grand et mieux intégré</strong></p><p>Dans l\'habitacle, malgré une organisation similaire, le changement apparaît déjà plus tangible. Toujours au format portrait, l\'écran des versions hautes grimpe de 8,7 pouces à 9,3 pouces, tout en bénéficiant d\'une intégration plus soignée, alors que l\'instrumentation peut devenir 100 % numérique. Empruntées au Kadjar… ou au Dacia Duster, les nouvelles molettes de climatisation améliorent aussi la qualité perçue, afin de mieux lutter contre la Peugeot 308, reine de la catégorie en France, ou la Volkswagen Golf, imbattable en Europe. Un souci du détail qui va jusqu\'à l\'arrivée d\'un rétroviseur intérieur sans rebord, dès le troisième niveau.</p>', 'car cars Renault Megane 4 2021', 0, 'Public', 5),
(72, 22, 'MUSTANG 5.0 V8 GT 2020', 38, 'Taha RAfiQ', '26/10/20', 'MUSTANG 5.0 V8 GT 2020.jpg', '<h4><strong>MUSTANG 5.0 V8 GT 2020</strong></h4><p>L’emblématique coupé sport de Ford est ici pour rester. En attendant sa future version hybride, la Mustang continue d’offrir un moteur turbocompressé à quatre cylindres de 310 chevaux en version de base et le fameux V8 de 460 chevaux en version GT (480 dans l’édition Bullitt). L’année 2020 apporte des améliorations techniques à la Shelby GT350R de 526 chevaux. Surtout, elle marque le retour de la Shelby GT500 avec un V8 suralimenté de 760 chevaux… mais sans boîte manuelle.</p>', 'car cars MUSTANG 5.0 V8 GT 2020 Superfast ford', -1, 'Public', 10),
(73, 23, 'TUCSON Hyundai  2020', 38, 'Taha RAfiQ', '26/10/20', 'tucson-tl-fl-design-kv-pc.jpg', '<h3><strong>Découvrez le Nouveau Tucson</strong></h3><p>Associant un design modernisé et plus racé à une pléthore de nouvelles technologies intelligentes et de systèmes d\'aide à la conduite de dernière génération, notre SUV compact TUCSON se distingue par des prestations sans précédent.</p><h4><strong>Un design fluide et raffiné</strong></h4><p>Le Nouveau Tucson doit son allure racée et athlétique à ses surfaces fluides et raffinées, à ses lignes parfaitement définies et à ses proportions équilibrées. Le style dynamique et les performances de Tucson vous apporteront l’assurance et la sécurité dont vous avez besoin pour élargir vos frontières. Tucson rend vos défis quotidiens plus faciles et plus agréables, quelle que soit leur taille. L’habitacle du Nouveau Tucson présente une planche de bord robuste et de nouvelles fonctionnalités afin d’assurer au conducteur un espace de conduite plaisant et épuré.&nbsp;</p><h4><strong>Un espace de chargement modulable</strong></h4><p>Le tout nouveau Tucson combine matériaux ultra-résistants et technologie de sécurité intelligente, son habitacle est fabriqué en acier avancé à haute résistance par procédé d\'estampage à chaud, afin d’offrir une protection totale de tous ses occupants.</p><h4><strong>Sécurité renforcée</strong></h4><p>Le tout nouveau Tucson combine matériaux ultrarésistants et technologie de sécurité intelligente pour offrir une protection totale de ses occupants. L\'habitacle est fabriqué en acier avancé à haute résistance par procédé d\'estampage à chaud.</p><h4><strong>Moteur 1.6 CRDI</strong></h4><p>Performances réactives, passage de rapports rapide et meilleure économie de carburant. Un résultat obtenu en couplant le nouveau 1.6CRDi à la transmission à double embrayage (DCT) 7 rapports de Hyundai.</p>', 'car cars TUCSON Speed 2020 hyundai', 2, 'Public', 24),
(220, 38, 'Aston Martin Vantage 2020 ', 38, 'Taha RAfiQ', '26/10/20', '23d49e7b8ea3d2447b6a5c61ce8daeeb.jpg', '<h4><strong>2020 Aston Martin Vantage</strong></h4><p>The Vantage is raw and instinctive, unwavering in its singular purpose: to overwhelm the senses through its world-renowned design, agile performance and dedicated craftsmanship. Its heart beats with a high powered 4.0 liter twin-turbocharged V8, producing that visceral Aston Martin roar. The convertible (Volante) variant is set to debut sometime in 2020 and we will share it here when we learn more.</p><p>There\'s an elite group of sports cars that deliver driving thrills and looks to kill, and the 2020 Aston Martin Vantage is one of them. With sculpted bodywork that appears both aggressive and beautiful, this entry-level (if there is such a thing) <strong>Aston Martin</strong> lives up to is lofty pedigree. The rear-drive coupe is powered by a thunderous twin-turbo V-8, but only the track-ready AMR model offers a manual transmission. Although alternatives from <strong>Porsche</strong> and <strong>Mercedes-AMG</strong> offer more approachable performance heights, the Aston provides a longer leash for sideways and smoky antics. The 2020 Vantage may not be the most sophisticated <strong>sports car</strong> available today, but it\'s one of the feistiest and flashiest.</p>', 'car cars 2020 Aston Martin Vantage speed Super fast', 1, 'Public', 58);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring222'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(38, 'TAHOSSE', '$2y$10$W5GzghRe2Esr9vndeT.HpOz5vyhEqPpawXtr5J69qXREw/1CjBUG.', 'TAHA', 'RAFIQ', 'taharafik89@gmail.com', 'Inst-image-37.jpg', 'Admin', '$2y$10$iusesomecrazystring222'),
(46, 'user', '$2y$10$iusesomecrazystring22uKz.T5ON53pFn51AJwgdhObXSpimowY.', 'USER1', 'USER1', 'User1@user.com', '23d49e7b8ea3d2447b6a5c61ce8daeeb.jpg', 'Admin', '$2y$10$iusesomecrazystring222'),
(49, 'user1', '$2y$10$iusesomecrazystring22uKz.T5ON53pFn51AJwgdhObXSpimowY.', 'USER', 'USER', 'User@user.com', 'MUSTANG 5.0 V8 GT 2020.jpg', 'Admin', '$2y$10$iusesomecrazystring222'),
(50, 'user2', '$1$ODHTbpHS$zO.O67zayfKwKymOkBCRx.', 'USER2', 'USER', 'User2@user.com', 'CHEVROLET SILVERADO - 2020.jpg', 'Admin', ''),
(59, 'user7', '$2y$10$.MZG.WG1EN2QquAtcnVNhOCuGbnqGJfgqEMWpEXSxolp/ApHVbPye', 'USER7', 'USER', 'user7@user.com', 'red dead redemption II dark.jpg', 'Subscriber', '$2y$10$iusesomecrazystring222'),
(73, 'user9', '$2y$10$eCPri8.bJts2RPWi0Ym8oO9vllenChsNneMkRo8d6HvQnF7QWg2QO', 'USER9', 'USER', 'user9@user.com', 'Hungarian Parliament.jpg', 'Subscriber', '$2y$10$iusesomecrazystring222'),
(74, 'user8', '$2y$10$bqoMTuB86ZaotgnKtkQs1OBzn.F46j.if/tjhYOrM4dkaN3flLc/a', 'USER8', 'USER', 'user8@user.com', 'cropped-3840-2400-798128.jpg', 'Subscriber', '$2y$10$iusesomecrazystring222'),
(75, 'user10', '$2y$10$Ix2bXCfL4HOgNzHbGIBnBO5xCeP61/2c5aqg2HNpQpx2AHNVPQoBi', 'USER10', 'USER', 'user10@user.com', 'Challenger Srt Hellcat.jpg', 'Subscriber', '$2y$10$iusesomecrazystring222');

-- --------------------------------------------------------

--
-- Structure de la table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
