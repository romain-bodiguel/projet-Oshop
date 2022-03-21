-- Adminer 4.8.0 MySQL 5.5.5-10.3.27-MariaDB-0+deb10u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom de la marque',
  `footer_order` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'L''ordre d''affichage dans le footer ( 0 = pas affiché )',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'La date de création de la marque',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de dernière modification de la marque',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom de la catégorie',
  `subtitle` varchar(64) DEFAULT NULL COMMENT 'Le sous-titre de la catégorie',
  `picture` varchar(128) DEFAULT NULL COMMENT 'URL de l''image de la catégorie',
  `home_order` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'L''ordre de la catégorie sur la page d''accueil',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de dernière modification de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom du produit',
  `description` text DEFAULT NULL COMMENT 'La description du produit',
  `picture` varchar(128) DEFAULT NULL COMMENT 'URL de l''image du produit',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Le prix du produit',
  `rate` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'La note du produit de 1 à 5 (0 = pas de note)',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Le statut du produit (0 = masqué, 1 = en stock, 2 = pas en stock)',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'La date de création du produit',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de dernière modification du produit',
  `brand_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom du type',
  `footer_order` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'L''ordre d''affichage dans le footer ( 0 = pas affiché )',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'La date de création du type',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de dernière modification du type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Data for table `brand`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (1, 'oCirage', 1, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (2, 'BOOTstrap', 3, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (3, 'Talonette', 4, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (4, 'Shossures', 2, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (5, 'O\'shoes', 0, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (6, 'Pattes d\'eph', 0, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (7, 'PHPieds', 5, '2018-10-17 9:00:00', NULL);
INSERT INTO `brand` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (8, 'oPompes', 0, '2018-10-17 9:00:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `category`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (1, 'Détente', 'Se faire plaisir', 'assets/images/categ1.jpeg', 4, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (2, 'Au travail', 'C\'est parti', 'assets/images/categ2.jpeg', 2, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (3, 'Cérémonie', 'Bien choisir', 'assets/images/categ3.jpeg', 5, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (4, 'Sortir', 'Faire un tour', 'assets/images/categ4.jpeg', 3, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (5, 'Vintage', 'Découvrir', 'assets/images/categ5.jpeg', 1, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (6, 'Piscine et bains', NULL, NULL, 0, '2018-10-17 8:00:00', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES (7, 'Sport', NULL, NULL, 0, '2018-10-17 8:00:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `type`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (1, 'Chaussures de ville', 1, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (2, 'Chaussures de sport', 2, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (3, 'Tongs', 4, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (4, 'Chaussures ouvertes', 0, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (5, 'Talons éguilles', 0, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (6, 'Talons', 0, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (7, 'Pantoufles', 3, '2018-10-17 10:00:00', NULL);
INSERT INTO `type` (`id`, `name`, `footer_order`, `created_at`, `updated_at`) VALUES (8, 'Chaussons', 5, '2018-10-17 10:00:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `product`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (1, 'Kissing', 'Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.', 'assets/images/produits/1-kiss.jpg', 40, 4, 1, '2018-10-17 11:00:00', NULL, 2, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (2, 'Pink Lady', 'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.', 'assets/images/produits/2-rose.jpg', 20, 2, 1, '2018-10-17 11:00:00', NULL, 4, 6, 2);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (3, 'Panda', 'Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles et obscuros.', 'assets/images/produits/3-panda.jpg', 50, 5, 1, '2018-10-17 11:00:00', NULL, 5, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (4, 'Zombie', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 'assets/images/produits/4-zombie.jpg', 40, 2, 1, '2018-10-17 11:00:00', NULL, 7, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (5, 'Minion', 'Ut enim benefici liberalesque sumus, non ut exigamus gratiam (neque enim beneficium faeneramur sed natura propensi ad liberalitatem sumus), sic amicitiam non spe mercedis adducti sed quod omnis eius fructus in ipso amore inest, expetendam putamus.', 'assets/images/produits/5-minion.jpg', 44, 3, 1, '2018-10-17 11:00:00', NULL, 6, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (6, 'Père Noël', 'Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.', 'assets/images/produits/6-pernoel.jpg', 36, 2, 2, '2018-10-17 11:00:00', NULL, 8, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (7, 'Sleepy', 'Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque, ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito, post statum diem si id elegerit discessura, et incredibile est quo ardore apud eos in venerem uterque solvitur sexus.', 'assets/images/produits/7-sleepy.jpg', 40, 3, 1, '2018-10-17 11:00:00', NULL, 4, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (8, 'Bear', 'Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset.', 'assets/images/produits/8-bear.jpg', 46, 4, 1, '2018-10-17 11:00:00', NULL, 5, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (9, 'Pantufa', 'Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 'assets/images/produits/9-pantufa.jpg', 48, 4, 1, '2018-10-17 11:00:00', NULL, 6, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (10, 'Jack', 'Quam ob rem id primum videamus, si placet, quatenus amor in amicitia progredi debeat. Numne, si Coriolanus habuit amicos, ferre contra patriam arma illi cum Coriolano debuerunt? num Vecellinum amici regnum adpetentem, num Maelium debuerunt iuvare?', 'assets/images/produits/10-jack.jpg', 50, 3, 1, '2018-10-17 11:00:00', NULL, 8, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (11, 'Teeturtle', 'Nec minus feminae quoque calamitatum participes fuere similium. nam ex hoc quoque sexu peremptae sunt originis altae conplures, adulteriorum flagitiis obnoxiae vel stuprorum. inter quas notiores fuere Claritas et Flaviana, quarum altera cum duceretur ad mortem.', 'assets/images/produits/11-teeturtle.jpg', 50, 3, 1, '2018-10-17 11:00:00', NULL, 7, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (12, 'Pikachu', 'Claritas et Flaviana, quarum altera cum duceretur ad mortem, indumento, quo vestita erat, abrepto, ne velemen quidem secreto membrorum sufficiens retinere permissa est. ideoque carnifex nefas admisisse convictus inmane, vivus exustus est.', 'assets/images/produits/12-pika.jpg', 50, 4, 1, '2018-10-17 11:00:00', NULL, 2, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (13, 'Unicorn', 'Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.', 'assets/images/produits/13-unicorn.jpg', 50, 4, 1, '2018-10-17 11:00:00', NULL, 5, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (14, 'Shark', 'Intellectum est enim mihi quidem in multis, et maxime in me ipso, sed paulo ante in omnibus, cum M. Marcellum senatui reique publicae concessisti, commemoratis praesertim offensionibus, te auctoritatem huius ordinis dignitatemque rei publicae tuis vel doloribus vel suspicionibus anteferre', 'assets/images/produits/14-shark.jpg', 40, 3, 1, '2018-10-17 11:00:00', NULL, 7, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (15, 'Eagles', 'Ille quidem fructum omnis ante actae vitae hodierno die maximum cepit, cum summo consensu senatus, tum iudicio tuo gravissimo et maximo. Ex quo profecto intellegis quanta in dato beneficio sit laus, cum in accepto sit tanta gloria.', 'assets/images/produits/15-eagle.jpg', 34, 2, 1, '2018-10-17 11:00:00', NULL, 2, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (18, 'Pokeball', 'Sed ut tum ad senem senex de senectute, sic hoc libro ad amicum amicissimus scripsi de amicitia. Tum est Cato locutus, quo erat nemo fere senior temporibus illis, nemo prudentior; nunc Laelius et sapiens (sic enim est habitus) et amicitiae gloria excellens de amicitia loquetur.', 'assets/images/produits/18-pokeball.jpg', 46, 3, 2, '2018-10-17 11:00:00', NULL, 8, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (19, 'Hobbit', 'Tu velim a me animum parumper avertas, Laelium loqui ipsum putes. C. Fannius et Q. Mucius ad socerum veniunt post mortem Africani; ab his sermo oritur, respondet Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.', 'assets/images/produits/19-hobbit.jpg', 46, 3, 1, '2018-10-17 11:00:00', NULL, 6, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (20, 'Deadpool', 'Pandente itaque viam fatorum sorte tristissima, qua praestitutum erat eum vita et imperio spoliari, itineribus interiectis permutatione iumentorum emensis venit Petobionem oppidum Noricorum, ubi reseratae sunt insidiarum latebrae omnes, et Barbatio repente apparuit comes.', 'assets/images/produits/20-deadpool.jpg', 36, 4, 1, '2018-10-17 11:00:00', NULL, 2, 1, 7);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (21, 'Convrese', 'Sed ut tum ad senem senex de senectute, sic hoc libro ad amicum amicissimus scripsi de amicitia. Tum est Cato locutus, quo erat nemo fere senior temporibus illis, nemo prudentior; nunc Laelius et sapiens (sic enim est habitus) et amicitiae gloria excellens de amicitia loquetur.', 'assets/images/produits/21-converse.jpg', 60, 3, 1, '2018-10-17 11:00:00', NULL, 5, 5, 1);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (22, 'Mike', 'Tu velim a me animum parumper avertas, Laelium loqui ipsum putes. C. Fannius et Q. Mucius ad socerum veniunt post mortem Africani; ab his sermo oritur, respondet Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.', 'assets/images/produits/22-nike.jpg', 68, 3, 1, '2018-10-17 11:00:00', NULL, 5, 4, 1);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (23, 'Jardon', 'Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset.', 'assets/images/produits/23-jordan.jpg', 120, 4, 2, '2018-10-17 11:00:00', NULL, 7, 7, 2);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (24, 'Running', 'Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset.', 'assets/images/produits/24-running-nike.jpg', 80, 3, 1, '2018-10-17 11:00:00', NULL, 5, 7, 2);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (25, 'Sans dale', 'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.', 'assets/images/produits/25-100dales.jpg', 23, 2, 1, '2018-10-17 11:00:00', NULL, 7, 4, 4);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (26, 'Talon aibrille', 'Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.', 'assets/images/produits/26-oCirage.jpg', 240, 5, 1, '2018-10-17 11:00:00', NULL, 3, 3, 5);

COMMIT;