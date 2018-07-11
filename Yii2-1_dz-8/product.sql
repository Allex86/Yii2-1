-- --------------------------------------------------------
-- Хост:                         192.168.83.137
-- Версия сервера:               10.0.34-MariaDB-0ubuntu0.16.04.1 - Ubuntu 16.04
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных yii2basic_test
CREATE DATABASE IF NOT EXISTS `yii2basic_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `yii2basic_test`;

-- Дамп структуры для таблица yii2basic_test.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fx_access_user` (`user_id`),
  KEY `fx_access_event` (`event_id`),
  CONSTRAINT `fx_access_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `fx_access_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.access: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` (`id`, `event_id`, `user_id`) VALUES
	(18, 27, 30),
	(19, 28, 30),
	(20, 32, 30),
	(22, 35, 29),
	(24, 35, 1),
	(25, 35, 2),
	(26, 35, 3),
	(27, 35, 29),
	(28, 35, 31);
/*!40000 ALTER TABLE `access` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic_test.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `dt` datetime NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fx_event_user` (`creator_id`),
  CONSTRAINT `fx_event_user` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.event: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `text`, `dt`, `creator_id`, `created_at`) VALUES
	(1, 'text', '0000-00-00 00:00:00', 1, 333),
	(2, 'text', '0000-00-00 00:00:00', 2, 444),
	(3, 'text', '0000-00-00 00:00:00', 3, 555),
	(25, 'text user_5', '0000-00-00 00:00:00', 1, NULL),
	(26, 'text user_5', '0000-00-00 00:00:00', 1, 0),
	(27, 'qweqweqwe', '1111-11-11 00:00:00', 29, 1530248988),
	(28, 'qwe', '2222-11-11 00:00:00', 29, 1530249575),
	(30, 'new ewent 1', '0000-00-00 00:00:00', 30, 1530442338),
	(32, 'qweewq', '2018-07-25 00:00:00', 29, 1530528993),
	(33, '123', '2018-07-31 00:00:00', 30, 1530536705),
	(34, '456', '2018-07-30 00:00:00', 30, 1530536716),
	(35, '789', '2018-07-28 00:00:00', 30, 1530536726);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic_test.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.migration: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1529407718),
	('m180619_114558_migrate_test_create_user', 1529411041),
	('m180619_114610_migrate_test_create_event', 1529411041),
	('m180619_114640_migrate_test_create_access', 1529411041),
	('m180621_111601_add_new_key_to_user', 1529644700);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic_test.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.product: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `price`, `created_at`) VALUES
	(21, 'product_1', '100500', 2147483647),
	(23, 'product_2', '100501', 2147483647),
	(24, 'product_3', '100502', 2147483647),
	(25, 'product_4', '100503', 2147483647),
	(26, 'product_5', '100504', 2147483647),
	(29, 'product_555', '555', 2147483647),
	(32, 'qweqwqwe', '333', 2147483647);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic_test.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.user: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `name`, `surname`, `password_hash`, `access_token`, `auth_key`, `created_at`, `updated_at`) VALUES
	(1, 'user_1', 'user_1', 'user_1', '111', '111', '111', 111, 111),
	(2, 'user_2', 'user_2', 'user_2', '222', '222', '222', 222, 222),
	(3, 'user_3', 'user_3', 'user_3', '333', '333', '333', 333, 333),
	(29, '100500', '100500', '100500', '$2y$13$IPImwdoGSqoA2EmTOtqQ5OR4pyM5nEJKmP2x8vCl4Kb9iywf8dUkW', NULL, 'b2tEcnSmh9iIBFqRPHSn6DHE6sPoTix9', 1530011232, 1530011232),
	(30, '100505', '100505', '100505', '$2y$13$1XO2paizGH.xUMC2jHqJsO9VzuA6Oi2T3ohfnQoBt8KG7IAQ72cEu', NULL, 'Y2HSRoivXJmK3Db71rxaXY-BRNti8xB7', 1530011232, 1530011232),
	(31, '111', '111', '111', '$2y$13$mD4G/bDsnVZBZOko56IJRuoT2BsM3XLgA/YkkQVjCHDLjfxz.Ly2S', NULL, 'mLzhowqpKqadZyBD7cWFLYKbz9ZrdJZu', 1530016753, 1530016753);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
