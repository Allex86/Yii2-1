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

-- Дамп структуры для таблица yii2basic_test.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы yii2basic_test.product: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `price`, `created_at`) VALUES
	(21, 'product_1', '100500', '2018-06-12 09:21:47'),
	(23, 'product_2', '100501', '2018-06-12 09:22:44'),
	(24, 'product_3', '100502', '2018-06-12 09:22:57'),
	(25, 'product_4', '100503', '2018-06-12 09:23:13'),
	(26, 'product_5', '100504', '2018-06-12 09:23:22'),
	(29, 'product_555', '555', '2018-06-15 01:27:56'),
	(32, 'qweqwqwe', '333', '2018-06-15 03:07:31');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
