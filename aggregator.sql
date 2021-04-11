/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 5.7.29-log : Database - aggregator
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Ид товара',
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Название товара',
  `ImageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ссылка на полное изображение',
  `AvgPrice` bigint(20) DEFAULT NULL COMMENT 'Средняя цена товара',
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления товара',
  `Author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Имя пользователя, который добавил товар',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Ид отзыва',
  `ProductId` bigint(20) DEFAULT NULL COMMENT 'Ид товара с отзывом',
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Имя пользователя кто оставил отзыв',
  `Review` text COLLATE utf8mb4_unicode_ci COMMENT 'Текст отзыва',
  `Rating` smallint(6) DEFAULT NULL COMMENT 'Пользовательская оценка товара',
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата добавления отзыва',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
