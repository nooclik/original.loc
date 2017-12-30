--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.58.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 30.12.2017 15:07:14
-- Версия сервера: 5.7.13
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE original;

--
-- Описание для таблицы `order`
--
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  variation_id VARCHAR(255) DEFAULT NULL,
  quantity SMALLINT(6) DEFAULT NULL,
  price DECIMAL(19, 2) DEFAULT NULL,
  user_id INT(11) DEFAULT NULL,
  date_publish DATETIME DEFAULT NULL,
  date_update DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы attribute
--
DROP TABLE IF EXISTS attribute;
CREATE TABLE attribute (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы attribute_value
--
DROP TABLE IF EXISTS attribute_value;
CREATE TABLE attribute_value (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  attribute_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 13
AVG_ROW_LENGTH = 1365
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы auth_rule
--
DROP TABLE IF EXISTS auth_rule;
CREATE TABLE auth_rule (
  name VARCHAR(64) NOT NULL,
  data BLOB DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы brand
--
DROP TABLE IF EXISTS brand;
CREATE TABLE brand (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  image VARCHAR(50) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  slug VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 273
AVG_ROW_LENGTH = 61
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы carousel
--
DROP TABLE IF EXISTS carousel;
CREATE TABLE carousel (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  image VARCHAR(50) DEFAULT NULL,
  caption VARCHAR(150) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы category
--
DROP TABLE IF EXISTS category;
CREATE TABLE category (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  parent_id INT(11) DEFAULT NULL,
  slug VARCHAR(50) DEFAULT NULL,
  image VARCHAR(50) DEFAULT NULL,
  status TINYINT(1) DEFAULT 0,
  meta VARCHAR(255) DEFAULT NULL,
  date_publish DATETIME DEFAULT NULL,
  date_update DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы galery
--
DROP TABLE IF EXISTS galery;
CREATE TABLE galery (
  id INT(11) NOT NULL,
  item_id INT(11) NOT NULL,
  image_id INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы migration
--
DROP TABLE IF EXISTS migration;
CREATE TABLE migration (
  version VARCHAR(180) NOT NULL,
  apply_time INT(11) DEFAULT NULL,
  PRIMARY KEY (version)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы options
--
DROP TABLE IF EXISTS options;
CREATE TABLE options (
  option_name VARCHAR(50) DEFAULT NULL,
  option_value VARCHAR(150) DEFAULT NULL
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы product
--
DROP TABLE IF EXISTS product;
CREATE TABLE product (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) DEFAULT NULL,
  description LONGTEXT DEFAULT NULL,
  slug VARCHAR(100) DEFAULT NULL,
  meta VARCHAR(255) DEFAULT NULL,
  tags VARCHAR(255) DEFAULT NULL,
  brand_id INT(11) DEFAULT NULL,
  sku VARCHAR(255) DEFAULT NULL,
  price DECIMAL(19, 2) DEFAULT NULL,
  quantity SMALLINT(6) DEFAULT NULL,
  selective TINYINT(1) DEFAULT 0,
  image VARCHAR(255) DEFAULT NULL,
  stock_status_id INT(11) DEFAULT NULL,
  active TINYINT(1) DEFAULT 0,
  date_publish DATETIME DEFAULT NULL,
  date_update DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 147
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы product_attribut
--
DROP TABLE IF EXISTS product_attribut;
CREATE TABLE product_attribut (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  attribut_id INT(11) DEFAULT NULL,
  attribu_value_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы product_category
--
DROP TABLE IF EXISTS product_category;
CREATE TABLE product_category (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  category_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 31
AVG_ROW_LENGTH = 963
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы product_variation
--
DROP TABLE IF EXISTS product_variation;
CREATE TABLE product_variation (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  variation_id INT(11) DEFAULT NULL,
  sku VARCHAR(20) DEFAULT NULL,
  price DECIMAL(19, 2) DEFAULT NULL,
  quantity SMALLINT(6) DEFAULT NULL,
  image VARCHAR(255) DEFAULT NULL,
  stock_status_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 25
AVG_ROW_LENGTH = 963
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы stock_status
--
DROP TABLE IF EXISTS stock_status;
CREATE TABLE stock_status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы user
--
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  auth_key VARCHAR(32) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email (email),
  UNIQUE INDEX password_reset_token (password_reset_token),
  UNIQUE INDEX username (username)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы variation
--
DROP TABLE IF EXISTS variation;
CREATE TABLE variation (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 417
AVG_ROW_LENGTH = 157
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы auth_item
--
DROP TABLE IF EXISTS auth_item;
CREATE TABLE auth_item (
  name VARCHAR(64) NOT NULL,
  type SMALLINT(6) NOT NULL,
  description TEXT DEFAULT NULL,
  rule_name VARCHAR(64) DEFAULT NULL,
  data BLOB DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name),
  INDEX `idx-auth_item-type` (type),
  INDEX rule_name (rule_name),
  CONSTRAINT auth_item_ibfk_1 FOREIGN KEY (rule_name)
    REFERENCES auth_rule(name) ON DELETE SET NULL ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы auth_assignment
--
DROP TABLE IF EXISTS auth_assignment;
CREATE TABLE auth_assignment (
  item_name VARCHAR(64) NOT NULL,
  user_id VARCHAR(64) NOT NULL,
  created_at INT(11) DEFAULT NULL,
  PRIMARY KEY (item_name, user_id),
  CONSTRAINT auth_assignment_ibfk_1 FOREIGN KEY (item_name)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы auth_item_child
--
DROP TABLE IF EXISTS auth_item_child;
CREATE TABLE auth_item_child (
  parent VARCHAR(64) NOT NULL,
  child VARCHAR(64) NOT NULL,
  PRIMARY KEY (parent, child),
  INDEX child (child),
  CONSTRAINT auth_item_child_ibfk_1 FOREIGN KEY (parent)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT auth_item_child_ibfk_2 FOREIGN KEY (child)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы `order`
--
INSERT INTO `order` VALUES
(1, 135, '3', 2, 34.20, NULL, '2017-12-30 14:02:12', '2017-12-30 14:02:12');

-- 
-- Вывод данных для таблицы attribute
--
INSERT INTO attribute VALUES
(1, 'Аромат'),
(2, 'Верхние ноты'),
(3, 'Средние ноты'),
(4, 'Базовые ноты');

-- 
-- Вывод данных для таблицы attribute_value
--
INSERT INTO attribute_value VALUES
(1, 'Сладкий', 1),
(2, 'Морской', 1),
(3, 'Ветивер', 4),
(4, 'Ваниль', 4),
(5, 'Бензоин', 4),
(6, 'Бергамот', 2),
(7, 'Корица', 2),
(8, 'Кориандр', 2),
(9, 'Перец', 2),
(10, 'Белый кедр', 3),
(11, 'Шафран ', 3),
(12, 'Олибанум', 3);

-- 
-- Вывод данных для таблицы auth_rule
--

-- Таблица original.auth_rule не содержит данных

-- 
-- Вывод данных для таблицы brand
--
INSERT INTO brand VALUES
(1, 'ABAHNA', NULL, NULL, 'abahna'),
(2, 'ADIDAS', NULL, NULL, 'adidas'),
(3, 'AFFINESSENCE', NULL, NULL, 'affinessence'),
(4, 'AGENT PROVOCATEUR', NULL, NULL, 'agent-provocateur'),
(5, 'AJ Arabia', NULL, NULL, 'aj-arabia'),
(6, 'AJMAL', NULL, NULL, 'ajmal'),
(7, 'Al Haramain Perfumes', NULL, NULL, 'al-haramain-perfumes'),
(8, 'ALAIA PARIS', NULL, NULL, 'alaia-paris'),
(9, 'Alexandre.J', NULL, NULL, 'alexandre-j'),
(10, 'Alfred Dunhill', NULL, NULL, 'alfred-dunhill'),
(11, 'Alla Pugacheva', NULL, NULL, 'alla-pugacheva'),
(12, 'AMOUAGE ', NULL, NULL, 'amouage'),
(13, 'ANGEL SCHLESSER ', NULL, NULL, 'angel-schlesser'),
(14, 'Anna Sui ', NULL, NULL, 'anna-sui'),
(15, 'Annayake', NULL, NULL, 'annayake'),
(16, 'ANTONIO BANDERAS ', NULL, NULL, 'antonio-banderas'),
(17, 'Aramis ', NULL, NULL, 'aramis'),
(18, 'ARMAND BASI ', NULL, NULL, 'armand-basi'),
(19, 'Armani ', NULL, NULL, 'armani'),
(21, 'Arrogance ', NULL, NULL, 'arrogance'),
(22, 'ASGHARALI', NULL, NULL, 'asgharali'),
(23, 'ATELIER COLOGNE ', NULL, NULL, 'atelier-cologne'),
(24, 'AZZARO ', NULL, NULL, 'azzaro'),
(25, 'BALDESSARINI ', NULL, NULL, 'baldessarini'),
(26, 'Baldinini ', NULL, NULL, 'baldinini'),
(27, 'BALENCIAGA ', NULL, NULL, 'balenciaga'),
(29, 'Balmain ', NULL, NULL, 'balmain'),
(30, 'Bamotte ', NULL, NULL, 'bamotte'),
(31, 'BANANA ', NULL, NULL, 'banana'),
(32, 'BEBE ', NULL, NULL, 'bebe'),
(33, 'Bejar ', NULL, NULL, 'bejar'),
(34, 'Benefit ', NULL, NULL, 'benefit'),
(35, 'Beneton ', NULL, NULL, 'beneton'),
(36, 'Bentley ', NULL, NULL, 'bentley'),
(37, 'BEYONCE ', NULL, NULL, 'beyonce'),
(38, 'Bill Blass ', NULL, NULL, 'bill-blass'),
(39, 'Blackglama ', NULL, NULL, 'blackglama'),
(40, 'BLUMARINE ', NULL, NULL, 'blumarine'),
(41, 'BOIS 1920 ', NULL, NULL, 'bois-1920'),
(42, 'Bottega Veneta ', NULL, NULL, 'bottega-veneta'),
(43, 'Boucheron ', NULL, NULL, 'boucheron'),
(44, 'Boudicca ', NULL, NULL, 'boudicca'),
(45, 'BRITNEY SPEARS ', NULL, NULL, 'britney-spears'),
(46, 'BRUNO BANANI ', NULL, NULL, 'bruno-banani'),
(47, 'BRUT ', NULL, NULL, 'brut'),
(48, 'BURBERRY ', NULL, NULL, 'burberry'),
(49, 'Burdin ', NULL, NULL, 'burdin'),
(50, 'BVLGARI ', NULL, NULL, 'bvlgari'),
(51, 'Byblos', NULL, NULL, 'byblos'),
(52, 'BYREDO ', NULL, NULL, 'byredo'),
(53, 'CACHAREL ', NULL, NULL, 'cacharel'),
(54, 'Cafe Parfums ', NULL, NULL, 'cafe-parfums'),
(55, 'CALVIN KLEIN ', NULL, NULL, 'calvin-klein'),
(56, 'CANALI ', NULL, NULL, 'canali'),
(57, 'CAROLINA HERRERA ', NULL, NULL, 'carolina-herrera'),
(58, 'Carrera ', NULL, NULL, 'carrera'),
(59, 'CARTIER ', NULL, NULL, 'cartier'),
(60, 'Catalyst ', NULL, NULL, 'catalyst'),
(61, 'ROBERTO CAVALLI  ', NULL, NULL, 'roberto-cavalli'),
(62, 'CERRUTI ', NULL, NULL, 'cerruti'),
(63, 'CESARE PACIOTTI ', NULL, NULL, 'cesare-paciotti'),
(64, 'CHANEL ', NULL, NULL, 'chanel'),
(65, 'CHLOE ', NULL, NULL, 'chloe'),
(66, 'CHOPARD ', NULL, NULL, 'chopard'),
(67, 'Christian Audigier Ed Hardy ', NULL, NULL, 'christian-audigier-ed-hardy'),
(68, 'Christian Dior ', NULL, NULL, 'christian-dior'),
(69, 'Christian Lacroix ', NULL, NULL, 'christian-lacroix'),
(70, 'CHRISTINA AGUILERA ', NULL, NULL, 'christina-aguilera'),
(71, 'Clarins ', NULL, NULL, 'clarins'),
(72, 'CLINIQUE ', NULL, NULL, 'clinique'),
(73, 'Clive Christian ', NULL, NULL, 'clive-christian'),
(74, 'COACH ', NULL, NULL, 'coach'),
(75, 'COMME ', NULL, NULL, 'comme'),
(76, 'Comme des Garcons ', NULL, NULL, 'comme-des-garcons'),
(77, 'COURREGES ', NULL, NULL, 'courreges'),
(78, 'Courvoisier Cognac ', NULL, NULL, 'courvoisier-cognac'),
(79, 'CREED ', NULL, NULL, 'creed'),
(80, 'CUSTO BARCELONA ', NULL, NULL, 'custo-barcelona'),
(81, 'David Beckham ', NULL, NULL, 'david-beckham'),
(82, 'DAVID YURMAN ', NULL, NULL, 'david-yurman'),
(83, 'DAVIDOFF ', NULL, NULL, 'davidoff'),
(84, 'Del Pozo ', NULL, NULL, 'del-pozo'),
(85, 'DIESEL ', NULL, NULL, 'diesel'),
(86, 'Diptyque ', NULL, NULL, 'diptyque'),
(87, 'Disney ', NULL, NULL, 'disney'),
(88, 'DOLCE&GABBANA ', NULL, NULL, 'dolce-gabbana'),
(89, 'DONNA KARAN (DKNY)', NULL, NULL, 'donna-karan-dkny'),
(90, 'D''ORSAY ', NULL, NULL, 'd-orsay'),
(91, 'DSQUARED2', NULL, NULL, 'dsquared2'),
(92, 'Eisenberg ', NULL, NULL, 'eisenberg'),
(93, 'ELIE SAAB ', NULL, NULL, 'elie-saab'),
(94, 'Elizabeth Arden ', NULL, NULL, 'elizabeth-arden'),
(95, 'Ellen Tracy ', NULL, NULL, 'ellen-tracy'),
(96, 'Emilio Pucci ', NULL, NULL, 'emilio-pucci'),
(97, 'ENRIQUE IGLESIAS ', NULL, NULL, 'enrique-iglesias'),
(98, 'Ermenegildo Zegna ', NULL, NULL, 'ermenegildo-zegna'),
(99, 'ESCADA ', NULL, NULL, 'escada'),
(100, 'Escentric Molecules ', NULL, NULL, 'escentric-molecules'),
(101, 'Esteban ', NULL, NULL, 'esteban'),
(102, 'ESTEE LAUDER ', NULL, NULL, 'estee-lauder'),
(103, 'ETIENNE AIGNER ', NULL, NULL, 'etienne-aigner'),
(104, 'EUTOPIE ', NULL, NULL, 'eutopie'),
(105, 'EX NIHILO ', NULL, NULL, 'ex-nihilo'),
(106, 'FENDI ', NULL, NULL, 'fendi'),
(107, 'FERRAGAMO SALVATORE ', NULL, NULL, 'ferragamo-salvatore'),
(108, 'FERRARI ', NULL, NULL, 'ferrari'),
(109, 'Franck Boclet ', NULL, NULL, 'franck-boclet'),
(110, 'FRANCK OLIVIER ', NULL, NULL, 'franck-olivier'),
(111, 'Frederic Malle ', NULL, NULL, 'frederic-malle'),
(112, 'Gaultier ', NULL, NULL, 'gaultier'),
(113, 'GB Geoffrey Beene ', NULL, NULL, 'gb-geoffrey-beene'),
(114, 'Ghost ', NULL, NULL, 'ghost'),
(115, 'GIAN MARCO VENTURI ', NULL, NULL, 'gian-marco-venturi'),
(116, 'Gianfranco Ferre', NULL, NULL, 'gianfranco-ferre'),
(117, 'Giulietta Capuleti ', NULL, NULL, 'giulietta-capuleti'),
(118, 'GIVENCHY ', NULL, NULL, 'givenchy'),
(119, 'Gloria Vanderbilt ', NULL, NULL, 'gloria-vanderbilt'),
(120, 'Gres Parfums', NULL, NULL, 'gres-parfums'),
(121, 'GUCCI ', NULL, NULL, 'gucci'),
(122, 'GUERLAIN ', NULL, NULL, 'guerlain'),
(123, 'Guess ', NULL, NULL, 'guess'),
(124, 'GUY LAROCHE ', NULL, NULL, 'guy-laroche'),
(125, 'Hanae Mori ', NULL, NULL, 'hanae-mori'),
(126, 'HELLO KITTY ', NULL, NULL, 'hello-kitty'),
(127, 'HERMES ', NULL, NULL, 'hermes'),
(128, 'HOUSE OF SILLAGE ', NULL, NULL, 'house-of-sillage'),
(129, 'HUGO BOSS ', NULL, NULL, 'hugo-boss'),
(130, 'Hunca', NULL, NULL, 'hunca'),
(131, 'ICEBERG ', NULL, NULL, 'iceberg'),
(132, 'ISSEY MIYAKE ', NULL, NULL, 'issey-miyake'),
(133, 'JACQUES BOGART ', NULL, NULL, 'jacques-bogart'),
(135, 'JAMES BOND 007 ', NULL, NULL, 'james-bond-007'),
(136, 'Jasper Conran ', NULL, NULL, 'jasper-conran'),
(137, 'JEAN COUTURIER ', NULL, NULL, 'jean-couturier'),
(138, 'JEAN PAUL GAULTIER ', NULL, NULL, 'jean-paul-gaultier'),
(139, 'Jennifer Lopez ', NULL, NULL, 'jennifer-lopez'),
(140, 'Jessica McClintock ', NULL, NULL, 'jessica-mcclintock'),
(141, 'Jesus Del Pozo ', NULL, NULL, 'jesus-del-pozo'),
(142, 'Jil Sander ', NULL, NULL, 'jil-sander'),
(143, 'JIMMY CHOO ', NULL, NULL, 'jimmy-choo'),
(144, 'Jo Malone ', NULL, NULL, 'jo-malone'),
(145, 'Joe Sorrento ', NULL, NULL, 'joe-sorrento'),
(146, 'JOHN RICHMOND', NULL, NULL, 'john-richmond'),
(147, 'JOHN VARVATOS', NULL, NULL, 'john-varvatos'),
(148, 'Joop ', NULL, NULL, 'joop'),
(149, 'JUDITH LEIBER ', NULL, NULL, 'judith-leiber'),
(150, 'JUICY COUTURE ', NULL, NULL, 'juicy-couture'),
(151, 'JULIETTE HAS A GUN', NULL, NULL, 'juliette-has-a-gun'),
(152, 'Justin Bieber ', NULL, NULL, 'justin-bieber'),
(153, 'Karl Lagerfeld ', NULL, NULL, 'karl-lagerfeld'),
(154, 'Keiko Mecheri ', NULL, NULL, 'keiko-mecheri'),
(155, 'KENZO ', NULL, NULL, 'kenzo'),
(156, 'Kety Perry ', NULL, NULL, 'kety-perry'),
(157, 'KILIAN ', NULL, NULL, 'kilian'),
(158, 'KORLOFF Paris ', NULL, NULL, 'korloff-paris'),
(159, 'LA PERLA ', NULL, NULL, 'la-perla'),
(160, 'Lacoste ', NULL, NULL, 'lacoste'),
(161, 'LACROIX BAZAR ', NULL, NULL, 'lacroix-bazar'),
(162, 'LADY GAGA ', NULL, NULL, 'lady-gaga'),
(163, 'LALIQUE ', NULL, NULL, 'lalique'),
(164, 'LANCOME ', NULL, NULL, 'lancome'),
(165, 'LANVIN ', NULL, NULL, 'lanvin'),
(166, 'LAPIDUS ', NULL, NULL, 'lapidus'),
(167, 'L''Artisan Parfumeur ', NULL, NULL, 'l-artisan-parfumeur'),
(168, 'Le Galion ', NULL, NULL, 'le-galion'),
(169, 'LEE COOPER ORIGINALS ', NULL, NULL, 'lee-cooper-originals'),
(170, 'Les Liquides Imaginaires ', NULL, NULL, 'les-liquides-imaginaires'),
(171, 'LAURENT MAZZONE LM Parfums', NULL, NULL, 'laurent-mazzone-lm-parfums'),
(172, 'L''Occitane en Provence ', NULL, NULL, 'l-occitane-en-provence'),
(173, 'LOEWE ', NULL, NULL, 'loewe'),
(174, 'LOLITA LEMPICKA ', NULL, NULL, 'lolita-lempicka'),
(175, 'Louis Feraud ', NULL, NULL, 'louis-feraud'),
(176, 'LULUTAL BAHRAIN ', NULL, NULL, 'lulutal-bahrain'),
(177, 'M. Micallef', NULL, NULL, 'm-micallef'),
(179, 'MADONNA ', NULL, NULL, 'madonna'),
(180, 'Maison Francis Kurkdjian ', NULL, NULL, 'maison-francis-kurkdjian'),
(181, 'MANCERA ', NULL, NULL, 'mancera'),
(182, 'MANDARINA DUCK ', NULL, NULL, 'mandarina-duck'),
(183, 'MARC JACOBS ', NULL, NULL, 'marc-jacobs'),
(184, 'Princesse Marina De Bourbon', NULL, NULL, 'princesse-marina-de-bourbon'),
(185, 'MASAKI MATSUSHIMA ', NULL, NULL, 'masaki-matsushima'),
(186, 'Matthew Williamson ', NULL, NULL, 'matthew-williamson'),
(187, 'Mauboussin ', NULL, NULL, 'mauboussin'),
(188, 'MAX MARA ', NULL, NULL, 'max-mara'),
(189, 'MDCI Parfums ', NULL, NULL, 'mdci-parfums'),
(190, 'Mel Merio', NULL, NULL, 'mel-merio'),
(191, 'MEMO ', NULL, NULL, 'memo'),
(192, 'MEXX ', NULL, NULL, 'mexx'),
(193, 'MICHAIEL Kors', NULL, NULL, 'michaiel-kors'),
(194, 'Miller Harris ', NULL, NULL, 'miller-harris'),
(195, 'MISSONI ', NULL, NULL, 'missoni'),
(196, 'Mistral ', NULL, NULL, 'mistral'),
(197, 'MIU MIU ', NULL, NULL, 'miu-miu'),
(198, 'Molinard ', NULL, NULL, 'molinard'),
(199, 'MONTALE ', NULL, NULL, 'montale'),
(200, 'MONT BLANC ', NULL, NULL, 'mont-blanc'),
(201, 'MOSCHINO ', NULL, NULL, 'moschino'),
(202, 'Myrurgia ', NULL, NULL, 'myrurgia'),
(203, 'Nara ', NULL, NULL, 'nara'),
(204, 'Narciso RODRIGUEZ ', NULL, NULL, 'narciso-rodriguez'),
(205, 'Nasomatto ', NULL, NULL, 'nasomatto'),
(206, 'Nikos ', NULL, NULL, 'nikos'),
(207, 'NINA RICCI ', NULL, NULL, 'nina-ricci'),
(208, 'Nine West ', NULL, NULL, 'nine-west'),
(209, 'Novae Plus ', NULL, NULL, 'novae-plus'),
(210, 'OLFACTIVE STUDIO ', NULL, NULL, 'olfactive-studio'),
(211, 'ORMONDE JAYNE ', NULL, NULL, 'ormonde-jayne'),
(212, 'PACO RABANNE ', NULL, NULL, 'paco-rabanne'),
(213, 'PALOMA PICASSO ', NULL, NULL, 'paloma-picasso'),
(214, 'Parfums de Marly', NULL, NULL, 'parfums-de-marly'),
(215, 'Paris Hilton ', NULL, NULL, 'paris-hilton'),
(216, 'Penhaligon''s ', NULL, NULL, 'penhaligon-s'),
(217, 'POLA ', NULL, NULL, 'pola'),
(218, 'PRADA ', NULL, NULL, 'prada'),
(219, 'PUMA ', NULL, NULL, 'puma'),
(220, 'Rallet ', NULL, NULL, 'rallet'),
(221, 'RALPH LAUREN ', NULL, NULL, 'ralph-lauren'),
(222, 'RAMON MOLVIZAR ', NULL, NULL, 'ramon-molvizar'),
(223, 'Rampage ', NULL, NULL, 'rampage'),
(224, 'Reem Acra ', NULL, NULL, 'reem-acra'),
(225, 'Remy Latour ', NULL, NULL, 'remy-latour'),
(226, 'Repetto ', NULL, NULL, 'repetto'),
(227, 'Replay ', NULL, NULL, 'replay'),
(228, 'Revillon ', NULL, NULL, 'revillon'),
(230, 'ROBERTO VERINO ', NULL, NULL, 'roberto-verino'),
(231, 'Romea D''Ameor ', NULL, NULL, 'romea-d-ameor'),
(232, 'S.T. DUPONT ', NULL, NULL, 's-t-dupont'),
(233, 'Saint Tropez ', NULL, NULL, 'saint-tropez'),
(234, 'SALVADOR DALI ', NULL, NULL, 'salvador-dali'),
(235, 'SALVATORE FERRAGAMO ', NULL, NULL, 'salvatore-ferragamo'),
(236, 'SARAH JESSICA PARKER ', NULL, NULL, 'sarah-jessica-parker'),
(237, 'SERGE LUTENS ', NULL, NULL, 'serge-lutens'),
(238, 'Sergio Tacchini ', NULL, NULL, 'sergio-tacchini'),
(239, 'Sex In The City', NULL, NULL, 'sex-in-the-city'),
(240, 'SHAKIRA ', NULL, NULL, 'shakira'),
(241, 'SHAIK ', NULL, NULL, 'shaik'),
(242, 'SHISEIDO ', NULL, NULL, 'shiseido'),
(243, 'SISLEY ', NULL, NULL, 'sisley'),
(244, 'Slazenger ', NULL, NULL, 'slazenger'),
(245, 'Sospiro ', NULL, NULL, 'sospiro'),
(246, 'STELLA McCARTNEY ', NULL, NULL, 'stella-mccartney'),
(247, 'SWAROVSKI ', NULL, NULL, 'swarovski'),
(248, 'Syed Junaid Alam ', NULL, NULL, 'syed-junaid-alam'),
(249, 'Ted Lapidus ', NULL, NULL, 'ted-lapidus'),
(250, 'THIERRY MUGLER ', NULL, NULL, 'thierry-mugler'),
(251, 'Tiffany & Co ', NULL, NULL, 'tiffany-co'),
(252, 'TIZIANA TERENZI ', NULL, NULL, 'tiziana-terenzi'),
(253, 'Tom Ford ', NULL, NULL, 'tom-ford'),
(254, 'TOMMY HILFIGER ', NULL, NULL, 'tommy-hilfiger'),
(255, 'TOUS ', NULL, NULL, 'tous'),
(256, 'TRUSSARDI ', NULL, NULL, 'trussardi'),
(257, 'Ulric de Varens ', NULL, NULL, 'ulric-de-varens'),
(258, 'Ungaro ', NULL, NULL, 'ungaro'),
(259, 'V CANTO ', NULL, NULL, 'v-canto'),
(260, 'VALENTINO ', NULL, NULL, 'valentino'),
(261, 'Van Cleef & Arpels ', NULL, NULL, 'van-cleef-arpels'),
(262, 'VERA WANG ', NULL, NULL, 'vera-wang'),
(263, 'VERSACE ', NULL, NULL, 'versace'),
(264, 'Victoria''s Secret ', NULL, NULL, 'victoria-s-secret'),
(265, 'VIKTOR&ROLF ', NULL, NULL, 'viktor-rolf'),
(266, 'Wallpaper* STEIDL ', NULL, NULL, 'wallpaper-steidl'),
(267, 'Xerjoff ', NULL, NULL, 'xerjoff'),
(268, 'YOHJI YAMAMOTO ', NULL, NULL, 'yohji-yamamoto'),
(269, 'YVES ROCHER ', NULL, NULL, 'yves-rocher'),
(270, 'Yves Saint Laurent (YSL) ', NULL, NULL, 'yves-saint-laurent-ysl'),
(271, 'Zarkoperfume ', NULL, NULL, 'zarkoperfume'),
(272, 'Жириновский ', NULL, NULL, 'zhirinovskiy');

-- 
-- Вывод данных для таблицы carousel
--
INSERT INTO carousel VALUES
(10, 'Первый слайд', '1514304076.jpg', '');

-- 
-- Вывод данных для таблицы category
--
INSERT INTO category VALUES
(2, 'Женские', '<p>Полное описание товара</p>\r\n', NULL, 'zhenskiye', '', 0, 'a:3:{s:14:"meta_tag_title";s:17:"Мета-титл";s:20:"meta_tag_description";s:25:"Мета-описание";s:17:"meta_tag_keywords";s:19:"Мета-ключи";}', '2017-09-27 15:45:50', '2017-12-14 15:42:33'),
(3, 'Мужские', '', NULL, 'muzhskiye', '', 0, 'a:3:{s:14:"meta_tag_title";s:0:"";s:20:"meta_tag_description";s:0:"";s:17:"meta_tag_keywords";s:0:"";}', '2017-09-27 15:46:10', '2017-12-14 15:42:41'),
(4, 'Унисекс', '', NULL, 'uniseks', '', 0, 'a:3:{s:14:"meta_tag_title";s:0:"";s:20:"meta_tag_description";s:0:"";s:17:"meta_tag_keywords";s:0:"";}', '2017-09-27 15:46:19', '2017-12-14 15:42:46');

-- 
-- Вывод данных для таблицы galery
--

-- Таблица original.galery не содержит данных

-- 
-- Вывод данных для таблицы migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1496218956),
('m130524_201442_init', 1496218964),
('m140506_102106_rbac_init', 1496330667),
('m140602_111327_create_menu_table', 1496330632),
('m160312_050000_create_user', 1496330632);

-- 
-- Вывод данных для таблицы options
--
INSERT INTO options VALUES
('carousel_item', NULL);

-- 
-- Вывод данных для таблицы product
--

-- Таблица original.product не содержит данных

-- 
-- Вывод данных для таблицы product_attribut
--
INSERT INTO product_attribut VALUES
(1, 131, 2, 6),
(2, 131, 2, 8),
(3, 131, 4, 4),
(4, 131, 3, 10),
(5, 131, 3, 11);

-- 
-- Вывод данных для таблицы product_category
--
INSERT INTO product_category VALUES
(14, 130, 3),
(15, 131, 3),
(16, 132, 3),
(17, 133, 3),
(18, 134, 3),
(19, 135, 2),
(20, 136, 3),
(21, 137, 3),
(22, 138, 3),
(23, 139, 2),
(24, 140, 3),
(25, 141, 2),
(26, 142, 3),
(27, 143, 3),
(28, 144, 3),
(29, 145, 3),
(30, 146, 4);

-- 
-- Вывод данных для таблицы product_variation
--
INSERT INTO product_variation VALUES
(8, 130, 2, 'c12116', NULL, NULL, 'ADIDAS_CHAMPIONS_LEAGUE_(ARENA_EDITION)_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(9, 131, 2, 'c12117', 15.00, NULL, 'ADIDAS_CHAMPIONS_LEAGUE_(STAR_EDITION)_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(10, 132, 2, 'c7', NULL, NULL, 'ADIDAS_Dynamic_Pulse_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(11, 133, 2, 'c12118', NULL, NULL, 'ADIDAS_Extreme_Power_(SPECIAL_EDITION)_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(12, 134, 2, 'c4066', NULL, NULL, 'ADIDAS_Extreme_Power_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(13, 135, 3, 'c17', 34.20, NULL, 'ADIDAS_Fruity_Rhythm_dlja_zhenshhin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(14, 136, 2, 'c7207', NULL, NULL, 'ADIDAS_Get_Ready_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(15, 137, 2, 'c22', NULL, NULL, 'ADIDAS_Ice_Dive_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(16, 138, 2, 'c24', NULL, NULL, 'ADIDAS_Intense_Touch_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(17, 131, 3, 'c26', 28.40, NULL, 'ADIDAS_Natural_Vitality_dlja_zhenshhin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(18, 140, 2, 'c30', NULL, NULL, 'ADIDAS_Pure_Game_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(19, 141, 3, 'c32', NULL, NULL, 'ADIDAS_Pure_Lightness_dlja_zhenshhin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(20, 142, 2, 'c10609', NULL, NULL, 'ADIDAS_Team_Five_Special_Edition_dlja_muzhchin_100_ml_tualetnaja_voda_(edt)_.jpg', 1),
(21, 143, 3, 'c8659', NULL, NULL, 'ADIDAS_Team_Five_dlja_muzhchin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(22, 144, 3, 'c35', NULL, NULL, 'ADIDAS_Team_Force_dlja_muzhchin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(23, 145, 3, 'c39', NULL, NULL, 'ADIDAS_Victory_League_dlja_muzhchin_50_ml_tualetnaja_voda_(edt)_.jpg', 1),
(24, 146, 4, 'b032531', NULL, NULL, 'AFFINESSENCE_CEDRE-IRIS_uniseks_100_ml_parfjumernaja_voda_(EDP)_.jpg', 1);

-- 
-- Вывод данных для таблицы stock_status
--
INSERT INTO stock_status VALUES
(1, 'В наличии'),
(2, 'Под заказ'),
(3, 'Нет в наличии');

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'admin', 'I1LZTcPvBx81T1337iXvzkoWrBiToglx', '$2y$13$.o7ZK5PauK4dFWQmDp7VfeTRYqjpcrLwO.PoMwSVy0tIMxwtoGNUi', NULL, 'nooclik@gmail.com', 10, 1496220097, 1496220097);

-- 
-- Вывод данных для таблицы variation
--
INSERT INTO variation VALUES
(1, 'Мыло 170 мл', NULL),
(2, '100 мл туалетная вода (edt)', NULL),
(3, '50 мл туалетная вода (edt)', NULL),
(4, '100 мл парфюмерная вода (EDP)', NULL),
(5, 'Тестер 100 мл парфюмерная вода (EDP)', NULL),
(6, '50 мл парфюмерная вода (EDP)', NULL),
(7, 'Тестер 50 мл парфюмерная вода (EDP)', NULL),
(8, '25 мл парфюмерная вода (EDP)', NULL),
(9, '5 мл парфюмерная вода (EDP) миниатюра', NULL),
(10, '80 мл парфюмерная вода (EDP)', NULL),
(11, 'Тестер 50 мл parfum', NULL),
(12, '30 мл духи на масленой основе', NULL),
(13, '60 мл парфюмерная вода (EDP)', NULL),
(14, 'Тестер 30 мл духи на масленой основе', NULL),
(15, 'Тестер 60 мл парфюмерная вода (EDP)', NULL),
(16, '75 мл парфюмерная вода (EDP)', NULL),
(17, 'Тестер 75 мл парфюмерная вода (EDP)', NULL),
(18, '18 мл концентрированные масляные духи (conc. oil)', NULL),
(19, 'Подарочный набор', NULL),
(20, '20 мл духи на масленой основе', NULL),
(21, 'Тестер 20 мл духи на масленой основе', NULL),
(22, '12 мл духи на масленой основе', NULL),
(23, 'Тестер 12 мл духи на масленой основе', NULL),
(24, '30 мл парфюмерная вода (EDP)', NULL),
(25, 'Тестер 30 мл парфюмерная вода (EDP)', NULL),
(26, '90 мл парфюмерная вода (EDP)', NULL),
(27, 'Тестер 90 мл парфюмерная вода (EDP)', NULL),
(28, 'Масло для тела (Body Butter) 200g', NULL),
(29, 'Концентрированные духи 12 мл', NULL),
(30, '17,5 мл духи на масленой основе', NULL),
(31, '14 мл духи на масленой основе', NULL),
(32, '85 мл парфюмерная вода (EDP)', NULL),
(33, 'Тестер 85 мл парфюмерная вода (EDP)', NULL),
(34, '12 мл Концентрированные духи (conc. perf.)', NULL),
(35, '20 мл Концентрированные духи (conc. perf.)', NULL),
(36, 'BODY LOTION Молочко для тела 200 мл', NULL),
(37, 'BODY MIST Ароматная дымка для тела 100 мл', NULL),
(38, 'HAND WASH Жидкое мыло для рук 240 мл', NULL),
(39, 'SHOWER GEL Гель для душа 200 мл', NULL),
(40, 'SOAP Мыло 125gm', NULL),
(41, '24 мл духи на масленой основе', NULL),
(42, 'Тестер 24 мл духи на масленой основе', NULL),
(43, '15 мл духи на масленой основе', NULL),
(44, '26 мл духи на масленой основе', NULL),
(45, 'Тестер 26 мл духи на масленой основе', NULL),
(46, '100 мл парфюмерная вода (EDP)', NULL),
(47, '85 мл парфюмерная вода (EDP)', NULL),
(48, '12 мл (духи на масленой основе)', NULL),
(49, '6 мл (духи на масленой основе)', NULL),
(50, '50 мл парфюмерная вода (EDP)', NULL),
(51, '10 мл парфюмерная вода (EDP)', NULL),
(52, 'Lux Edition 100 мл парфюмерная вода (EDP)', NULL),
(53, '30 мл парфюмерная вода (EDP) Без упаковки', NULL),
(54, '30 мл туалетная вода (edt)', NULL),
(55, 'Тестер 100 мл туалетная вода (edt)', NULL),
(56, 'Бальзам после бритья 75 мл', NULL),
(57, '2 мл парфюмерная вода (EDP)', NULL),
(58, '2 мл парфюмерная вода (EDP)', NULL),
(59, '4,9 мл парфюмерная вода (EDP) миниатюра', NULL),
(60, '75 мл туалетная вода (edt)', NULL),
(61, 'Тестер 125 мл туалетная вода (edt)', NULL),
(62, 'Тестер 75 мл туалетная вода (edt)', NULL),
(63, '80 мл туалетная вода (edt)', NULL),
(64, 'Дезодорант 150 мл', NULL),
(65, 'Тестер 80 мл туалетная вода (edt)', NULL),
(66, '150 мл Дезодорант', NULL),
(67, '110 мл туалетная вода (edt)', NULL),
(68, '60 мл туалетная вода (edt)', NULL),
(69, 'Тестер 50 мл туалетная вода (edt)', NULL),
(70, 'Тестер 80 мл парфюмерная вода (EDP)', NULL),
(71, '7 мл парфюмерная вода (EDP) миниатюра', NULL),
(72, '7 мл туалетная вода (edt) миниатюра', NULL),
(73, '125 мл туалетная вода (edt)', NULL),
(74, '90 мл туалетная вода (edt)', NULL),
(75, 'Тестер 90 мл туалетная вода (edt)', NULL),
(76, '40 мл парфюмерная вода (EDP)', NULL),
(77, '20 мл парфюмерная вода (EDP)', NULL),
(78, '5 мл миниатюра', NULL),
(79, '5 мл туалетная вода (edt) миниатюра', NULL),
(80, '200 мл туалетная вода (edt)', NULL),
(81, 'Гель для душа 75 мл', NULL),
(82, '30 мл парфюмерная вода (EDP)', NULL),
(83, '30 мл туалетная вода (edt)', NULL),
(84, '3 мл парфюмерная вода (EDP) миниатюра', NULL),
(85, '1,5 мл туалетная вода (edt)', NULL),
(86, '20 мл туалетная вода (edt)', NULL),
(87, '4 мл парфюмерная вода (EDP) миниатюра', NULL),
(88, '10 мл парфюмерная вода (EDP) миниатюра', NULL),
(89, '30 туалетная вода (edt)', NULL),
(90, 'молочко для тела 75 мл', NULL),
(91, '45 мл парфюмерная вода (EDP)', NULL),
(92, '1,2 мл туалетная вода (edt)', NULL),
(93, 'Твердый дезодорант 75 мл', NULL),
(94, '25 мл туалетная вода (edt)', NULL),
(95, 'Гель для душа 200 мл', NULL),
(96, '100 мл туалетная вода (edt)', NULL),
(97, '100 мл туалетная вода (edt) плюс несессер', NULL),
(98, '2 мл туалетная вода (edt)', NULL),
(99, '50 мл туалетная вода (edt)', NULL),
(100, 'Тестер туалетная вода (edt) 100 мл', NULL),
(101, 'Тестер туалетная вода (edt) 50 мл', NULL),
(102, '40 мл парфюмерная вода (EDP)', NULL),
(103, '75 мл парфюмерная вода (EDP)', NULL),
(104, 'Крем для тела (Body Creme) 200 мл', NULL),
(105, 'Тестер парфюмерная вода (EDP) 40 мл', NULL),
(106, 'Тестер парфюмерная вода (EDP) 75 мл', NULL),
(107, '1,5 мл парфюмерная вода (EDP)', NULL),
(108, 'Гель для душа 250 мл', NULL),
(109, 'Дезодорант 100 мл (парф., стекло)', NULL),
(110, 'Подарочный набор (40 мл плюс косметичка)', NULL),
(111, 'Гель для душа Luxury Body Bath 200 мл', NULL),
(112, 'Косметичка FEMME JEWELLERY HOLDER', NULL),
(113, 'Бальзам после бритья 100 мл', NULL),
(114, 'Бальзам после бритья 75 мл', NULL),
(115, 'Несессер мужской', NULL),
(116, '1,2 мл парфюмерная вода (EDP)', NULL),
(117, 'Тестер туалетная вода (edt) 90 мл', NULL),
(118, '100 мл парфюмерная вода (EDP) плюс пробник', NULL),
(119, '40 мл туалетная вода (edt)', NULL),
(120, '100 мл edc', NULL),
(121, '50 мл edc', NULL),
(122, '20 мл Parfum EXTRACT', NULL),
(123, 'Тестер 90 мл EDC', NULL),
(124, '30 мл Гель для душа', NULL),
(125, '7,5 мл туалетная вода (edt) миниатюра', NULL),
(126, '4,5 мл туалетная вода (edt) миниатюра', NULL),
(127, '4,5 мл парфюмерная вода (EDP) миниатюра', NULL),
(128, '15 мл парфюмерная вода (EDP)', NULL),
(129, 'Гель для душа 150 мл', NULL),
(130, 'Тестер 60 мл туалетная вода (edt)', NULL),
(131, 'Тестер 40 мл туалетная вода (edt)', NULL),
(132, '35 мл туалетная вода (edt)', NULL),
(133, '85 мл туалетная вода (edt)', NULL),
(134, 'Тестер 85 мл туалетная вода (edt)', NULL),
(135, '35 мл парфюмерная вода (EDP)', NULL),
(136, '4,5 мл туалетная вода (edt)', NULL),
(137, '150 мл туалетная вода (edt)', NULL),
(138, '50 мл парфюмерная вода (EDP)', NULL),
(139, '10 мл edC', NULL),
(140, '5 мл парфюмерная вода (EDP)', NULL),
(141, '60 мл туалетная вода (edt)', NULL),
(142, 'Тестер 65 мл туалетная вода (edt)', NULL),
(143, '40 мл парфюмерная вода (EDP)', NULL),
(144, 'Тестер 65 мл парфюмерная вода (EDP)', NULL),
(145, '65 мл туалетная вода (edt)', NULL),
(146, 'парфюмерная вода для волос(hair perfume) 75 мл', NULL),
(147, '50 мл туалетная вода (edt)', NULL),
(148, 'Parfum Soir 50 мл парфюмерная вода (EDP)', NULL),
(149, '50 мл туалетная вода (edt) Мят-кор', NULL),
(150, '7 мл туалетная вода (edt) no box миниатюра', NULL),
(151, '4 мл туалетная вода (edt) миниатюра', NULL),
(152, 'Тестер 200 мл туалетная вода (edt)', NULL),
(153, '10 мл туалетная вода (edt)', NULL),
(154, 'Тестер 60 мл (2*30) туалетная вода (edt)', NULL),
(155, '100 мл туалетная вода (edt)', NULL),
(156, '9 мл парфюмерная вода (EDP)', NULL),
(157, '6 мл парфюмерная вода (EDP) миниатюра', NULL),
(158, '30 мл', NULL),
(159, '7,5 мл Духи (PARFUM)', NULL),
(160, 'Тестер 35 мл парфюмерная вода (EDP)', NULL),
(161, '150 мл парфюмерная вода (EDP)', NULL),
(162, '50 мл бальзам после бритья', NULL),
(163, '50 мл туалетная вода (edt) CONCENTREE', NULL),
(164, '2 мл edc', NULL),
(165, '2 мл туалетная вода (edt)', NULL),
(166, 'Дезодорант 100 мл', NULL),
(167, 'Тестер 100 мл туалетная вода (edt)', NULL),
(168, 'Cream 6gr', NULL),
(169, '2 мл туалетная вода (edt) в подарочной упаковке', NULL),
(170, '35 мл вуаль для волос', NULL),
(171, 'гель для душа 200 мл', NULL),
(172, '1,5 мл parfum миниатюра', NULL),
(173, '200 мл Гель для душа', NULL),
(174, '100 мл туалетная вода (edt) (cтарый дизайн)', NULL),
(175, 'Твердый дезодорант 75g', NULL),
(176, '4 мл туалетная вода (edt)', NULL),
(177, '1,5 мл туалетная вода (edt) в коробке миниатюра', NULL),
(178, '1,5 мл парфюмерная вода (EDP) подарочные миниатюра', NULL),
(179, '4 мл Emulsion De Parfum', NULL),
(180, 'Parfum 15 мл', NULL),
(181, '50 мл туалетная вода (edt) старый дизайн (2009)', NULL),
(182, '30 мл парфюмерная вода (EDP)', NULL),
(183, '75 мл парфюмерная вода (EDP)', NULL),
(184, '5 мл туалетная вода (edt)', NULL),
(185, '1 мл туалетная вода (edt)', NULL),
(186, '1 мл туалетная вода (edt)', NULL),
(187, '1,5 мл туалетная вода (edt) миниатюра', NULL),
(188, '1 мл edc', NULL),
(189, '125 мл edc', NULL),
(190, 'Тестер 125 мл edc', NULL),
(191, '10 мл туалетная вода (edt) миниатюра', NULL),
(192, '1 мл парфюмерная вода (EDP)', NULL),
(193, '3*20 мл парфюмерная вода (EDP)', NULL),
(194, 'Parfum 75 мл парфюмерная вода (EDP)', NULL),
(195, 'Тестер Parfum 75 мл парфюмерная вода (EDP)', NULL),
(196, '100 мл', NULL),
(197, 'Дезодорант 200 мл', NULL),
(198, 'Тестер 100 мл edc', NULL),
(199, '9 мл парфюмерная вода (EDP) миниатюра', NULL),
(200, '2,5 мл парфюмерная вода (EDP)', NULL),
(201, '75 мл PERFUMED OIL (духи на масленой основе)', NULL),
(202, '250 мл', NULL),
(203, '120 мл', NULL),
(204, 'Тестер 120 мл', NULL),
(205, 'Свеча 200 мл', NULL),
(206, '200 мл', NULL),
(207, '120 мл туалетная вода (edt)', NULL),
(208, '250 мл парфюмерная вода (EDP)', NULL),
(209, 'плюс 250 мл парфюмерная вода (EDP)', NULL),
(210, 'плюс 30 мл парфюмерная вода (EDP)', NULL),
(211, 'Тестер 100 туалетная вода (edt)', NULL),
(212, '50 туалетная вода (edt)', NULL),
(213, 'Тестер 50 парфюмерная вода (EDP)', NULL),
(214, 'Тестер Perfume Pen 8 мл туалетная вода (edt)', NULL),
(215, '4,5 мл парфюмерная вода (EDP)', NULL),
(216, 'Тестер 125 мл парфюмерная вода (EDP)', NULL),
(217, '40 мл туалетная вода (edt)', NULL),
(218, '75 мл туалетная вода (edt)', NULL),
(219, '8 мл туалетная вода (edt) миниатюра', NULL),
(220, 'Тестер 150 мл туалетная вода (edt)', NULL),
(221, '8 мл туалетная вода (edt)', NULL),
(222, 'Твердый дезодорант', NULL),
(223, '7 мл парфюмерная вода (EDP)', NULL),
(224, '30 мл парфюмерная вода (EDP) TO GO', NULL),
(225, '50 мл', NULL),
(226, '125 мл парфюмерная вода (EDP)', NULL),
(227, 'Тестер 30 мл туалетная вода (edt)', NULL),
(228, '100 мл спрей Limited edition 2016', NULL),
(229, '100 мл спрей', NULL),
(230, '30 мл спрей', NULL),
(231, 'Тестер 100 мл спрей', NULL),
(232, '100 мл спрей плюс 2 мл Escentric 03', NULL),
(233, '200 мл гель для душа', NULL),
(234, '30 мл спрей', NULL),
(235, 'Тестер 100 мл спрей', NULL),
(236, '100 мл спрей', NULL),
(237, '13 мл парфюмерная вода (EDP)', NULL),
(238, '50 мл edC', NULL),
(239, '50 парфюмерная вода (EDP) Мятый', NULL),
(240, '7,5 мл парфюмерная вода (EDP)', NULL),
(241, 'Тестер парфюмерная вода (EDP) 100 мл', NULL),
(242, 'Тестер 100 мл', NULL),
(243, 'Набор 5*7,5 мл парфюмерная вода (EDP)', NULL),
(244, '100 мл без целлофана. парфюмерная вода (EDP)', NULL),
(245, '100 мл парфюмерная вода (EDP)', NULL),
(246, 'НАБОР 5*7,5 мл парфюмерная вода (EDP)', NULL),
(247, 'НАБОР парфюмерная вода (EDP) 5*7,5 мл', NULL),
(248, '2 мл', NULL),
(249, 'Подарочный набор (5*7,5 мл парфюмерная вода (EDP))', NULL),
(250, '7,5 мл парфюмерная вода (EDP) миниатюра', NULL),
(251, 'Тестер 92 мл парфюмерная вода (EDP)', NULL),
(252, '30 мл туалетная вода (edt)', NULL),
(253, 'Тестер туалетная вода (edt) 75 мл', NULL),
(254, '30 мл туалетная вода (edt) б/цел', NULL),
(255, '8 мл туалетная вода (edt) б/кор. миниатюра', NULL),
(256, '100 мл парфюмерная вода (EDP) (черный флакон)', NULL),
(257, '100 мл туалетная вода (edt) (прозрачный флакон)', NULL),
(258, '30 мл парфюмерная вода (EDP) (черный флакон)', NULL),
(259, '30 мл туалетная вода (edt) (прозрачный флакон)', NULL),
(260, '50 мл парфюмерная вода (EDP) (черный флакон)', NULL),
(261, '50 мл туалетная вода (edt) (прозрачный флакон)', NULL),
(262, '15 мл туалетная вода (edt) no box', NULL),
(263, '15 мл парфюмерная вода (EDP) (New 2014)', NULL),
(264, '15 мл PARFUM', NULL),
(265, '3 мл туалетная вода (edt) миниатюра', NULL),
(266, 'Тестер 3*20 мл туалетная вода (edt)', NULL),
(267, '15 мл туалетная вода (edt)', NULL),
(268, '50 мл туалетная вода (edt) нов. дизайн', NULL),
(269, '90 мл туалетная вода (edt) нов. дизайн', NULL),
(270, '5 мл парфюмерная вода (EDP)', NULL),
(271, 'Тестер 60 (4*15 мл туалетная вода (edt))', NULL),
(272, '75 мл', NULL),
(273, 'Тестер туалетная вода (edt) 125 мл', NULL),
(274, 'Тестер 30 мл parfum', NULL),
(275, 'parf 14 мл', NULL),
(276, '7,5 мл parfum', NULL),
(277, '15 мл edc миниатюра', NULL),
(278, 'Тестер 100 мл EDC', NULL),
(279, '15 мл туалетная вода (edt) в мешочке', NULL),
(280, '75 мл Pure Perfume', NULL),
(281, 'Тестер 75 мл Pure Perfume', NULL),
(282, 'Тестер 75 мл Парфюм с распылителем', NULL),
(283, '100 мл Парфюм с распылителем', NULL),
(284, '35 мл Парфюм с распылителем', NULL),
(285, 'Тестер 100 мл Парфюм с распылителем', NULL),
(286, 'Дорожный вариант 4*9,5 мл парфюмерная вода (EDP)', NULL),
(287, '75 мл edc concentree', NULL),
(288, 'Тестер 75 мл edc', NULL),
(289, '90 мл парфюмерная вода (EDP)', NULL),
(290, 'Тестер парфюмерная вода (EDP) 90 мл', NULL),
(291, '90 мл туалетная вода (edt)', NULL),
(292, '40 мл', NULL),
(293, 'Тестер & Amber 50 мл туалетная вода (edt)', NULL),
(294, 'Тестер & Musk 50 мл туалетная вода (edt)', NULL),
(295, '60 мл', NULL),
(296, '200 мл Гель для душа (огненый шар)', NULL),
(297, '50 мл туалетная вода (edt) (огненый шар)', NULL),
(298, '75 мл туалетная вода (edt) (огненый шар)', NULL),
(299, '30 мл туалетная вода (edt) (белый шар)', NULL),
(300, '50 мл туалетная вода (edt) (белый шар)', NULL),
(301, '125 мл туалетная вода (edt)', NULL),
(302, 'Тестер 75 мл', NULL),
(303, '75 мл', NULL),
(304, 'Тестер 125 мл', NULL),
(305, '100 мл туалетная вода (edt) плюс крем', NULL),
(306, '7,5 мл PARFUM', NULL),
(307, 'Parfum (духи) 7,5 мл', NULL),
(308, '100 мл туалетная вода (edt) Metal', NULL),
(309, 'Тестер 100 мл туалетная вода (edt) Metal', NULL),
(310, '8 мл parfume pen (духи в форме ручки)', NULL),
(311, '9 мл PARFUME', NULL),
(312, '100 мл Дезодорант', NULL),
(313, '33 мл туалетная вода (edt)', NULL),
(314, '8 мл', NULL),
(315, '30 мл edc', NULL),
(316, 'Подарочный набор 3*10 мл парфюмерная вода (EDP)', NULL),
(317, '1,5 мл парфюмерная вода (EDP)', NULL),
(318, 'Тестер 100 парфюмерная вода (EDP)', NULL),
(319, '1,7 мл парфюмерная вода (EDP)', NULL),
(320, '75 парфюмерная вода (EDP)', NULL),
(321, 'Тестер 75 парфюмерная вода (EDP)', NULL),
(322, '100 мл туалетная вода (edt) новый дизайн', NULL),
(323, '100 мл туалетная вода (edt) DESIGN 2007', NULL),
(324, '5 мл туалетная вода (edt) DESIGN 2007 миниатюра', NULL),
(325, '50 мл туалетная вода (edt) DESIGN 2007', NULL),
(326, 'Дорожный вариант парфюмерная вода (EDP) 4*7,5 мл', NULL),
(327, '50 мл парфюмерная вода (EDP) стар. дизайн', NULL),
(328, '1,5 мл', NULL),
(329, 'Дорожный вариант 4*7,5 мл парфюмерная вода (EDP)', NULL),
(330, '30 мл парфюмерная вода (EDP) ( 4*7,5 )', NULL),
(331, '4*7,5 мл парфюмерная вода (EDP)', NULL),
(332, '88 мл туалетная вода (edt)', NULL),
(333, '45 мл парфюмерная вода (EDP)', NULL),
(334, '80 мл парфюмерная вода (EDP)', NULL),
(335, '30 мл парфюмерная вода (EDP) новый дизайн', NULL),
(336, '50 мл парфюмерная вода (EDP) новый дизайн', NULL),
(337, '90 мл парфюмерная вода (EDP) новый дизайн', NULL),
(338, 'Дезодорант 125 мл', NULL),
(339, 'Кремовый дезодорант 50 мл', NULL),
(340, 'Шариковый дезодорант 50 мл', NULL),
(341, 'Тестер 40 мл Parfum', NULL),
(342, 'parf 7,5 мл', NULL),
(343, 'шариковые духи (ролик - духи) 7,5 мл', NULL),
(344, '7,5 парфюмерная вода (EDP) миниатюра', NULL),
(345, 'Тестер 100 мл парфюмерная вода (EDP)', NULL),
(346, '100 мл PARFUM', NULL),
(347, 'Тестер 100 мл PARFUM', NULL),
(348, '5 мл парфюмерная вода (EDP) миниатюра без коробки', NULL),
(349, 'Parfum 100 мл парфюмерная вода (EDP)', NULL),
(350, '30 мл парфюмерная вода (EDP) Б/кор', NULL),
(351, '100 мл парфюмерная вода (EDP)', NULL),
(352, '30 мл парфюмерная вода (EDP)', NULL),
(353, '30 мл Б/кор парфюмерная вода (EDP)', NULL),
(354, 'Тестер 75 мл парфюмерная вода (EDP)', NULL),
(355, '70 мл парфюмерная вода (EDP)', NULL),
(356, '120 мл парфюмерная вода (EDP)', NULL),
(357, '60 мл парфюмерная вода (EDP)', NULL),
(358, '120 мл парфюмерная вода (EDP)', NULL),
(359, 'Несессер', NULL),
(360, '40 мл парфюмерная вода (EDP) (розовый)', NULL),
(361, 'Тестер 80 мл парфюмерная вода (EDP) (розовый)', NULL),
(362, 'Тестер 80 мл edр', NULL),
(363, 'шариковые духи (ролик - духи) 10 мл', NULL),
(364, 'Тестер 40 мл парфюмерная вода (EDP)', NULL),
(365, 'Parfum 30 мл парфюмерная вода (EDP)', NULL),
(366, 'Гель для душа 50 мл', NULL),
(367, 'Тестер 30 мл', NULL),
(368, 'Тестер 50 мл', NULL),
(369, '100 мл парфюмерная вода (EDP) старый дизайн', NULL),
(370, '1,2 мл туалетная вода (edt) (упак 12шт)', NULL),
(371, '4,9 мл туалетная вода (edt) миниатюра', NULL),
(372, '4.9 мл туалетная вода (edt) миниатюра', NULL),
(373, '3*2 мл миниатюра', NULL),
(374, '90 мл парфюмерная вода (EDP)', NULL),
(375, '30 мл EXTRAIT DE PARFUM', NULL),
(376, '30 мл туалетная вода (edt) plastic', NULL),
(377, '80 мл туалетная вода (edt)', NULL),
(378, '5,5 мл миниатюра', NULL),
(379, '150 мл мл молочко для тела', NULL),
(380, '30 мл Extrait de Parfum', NULL),
(381, '20 мл parfum', NULL),
(382, '2 мл parf миниатюра', NULL),
(383, 'Тестер 120 мл туалетная вода (edt)', NULL),
(384, '1,7 парфюмерная вода (EDP)', NULL),
(385, '6,5 мл туалетная вода (edt) миниатюра', NULL),
(386, '50 мл туалетная вода (edt) мятая', NULL),
(387, 'ДУХИ 5 мл Extrait de Parfum', NULL),
(388, 'ДУХИ 7,5 мл Extrait de Parfum', NULL),
(389, 'Подарочный набор 2* 30 мл парфюмерная вода (EDP)', NULL),
(390, '50 мл туалетная вода (edt) новый дизайн', NULL),
(391, '100 мл туалетная вода (edt) Мят-кор', NULL),
(392, 'Дезодорант спрей 150 мл', NULL),
(393, '60 мл парфюмерная вода (EDP)', NULL),
(394, '90 мл', NULL),
(395, '1,6 мл парфюмерная вода (EDP) миниатюра', NULL),
(396, '10 мл Духи (PARFUM) без спирта', NULL),
(397, 'Parfum 100 мл', NULL),
(398, 'Тестер Parfum 100 мл', NULL),
(399, 'Parfum 100 мл', NULL),
(400, '15 мл парфюмерная вода (EDP) миниатюра', NULL),
(401, '15 мл туалетная вода (edt) миниатюра', NULL),
(402, 'Тестер 90 мл', NULL),
(403, '125 мл туалетная вода (edt)', NULL),
(404, 'Тестер 90 мл парфюмерная вода (EDP) с крышкой', NULL),
(405, '50 мл Дезодорант', NULL),
(406, 'Твердый дезодорант 50g', NULL),
(407, 'Тестер 90 мл туалетная вода (edt) без крышки', NULL),
(408, 'Тестер 90 мл туалетная вода (edt) с крышкой', NULL),
(409, '4,5 мл туалетная вода (edt)', NULL),
(410, 'Подарочный набор (30 мл плюс 50 мл гель для душа )', NULL),
(411, '12,5 мл туалетная вода (edt) миниатюра', NULL),
(412, 'Духи (Parfum) 15 мл', NULL),
(413, 'Тестер парфюмерная вода (EDP) 80 мл', NULL),
(414, 'крем для нормальной кожи 7 мл', NULL),
(415, '60 мл edc', NULL),
(416, 'Parfum 75 мл туалетная вода (edt)', NULL);

-- 
-- Вывод данных для таблицы auth_item
--
INSERT INTO auth_item VALUES
('admin', 1, NULL, NULL, NULL, 1496332146, 1496332146),
('editor', 1, NULL, NULL, NULL, 1496332146, 1496332146),
('updateNews', 2, 'Редактирование новости', NULL, NULL, 1496332146, 1496332146),
('viewAdminPage', 2, 'Просмотр админки', NULL, NULL, 1496332146, 1496332146);

-- 
-- Вывод данных для таблицы auth_assignment
--
INSERT INTO auth_assignment VALUES
('admin', '1', 1496332146),
('editor', '2', 1496332146);

-- 
-- Вывод данных для таблицы auth_item_child
--
INSERT INTO auth_item_child VALUES
('admin', 'editor'),
('editor', 'updateNews'),
('admin', 'viewAdminPage');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;