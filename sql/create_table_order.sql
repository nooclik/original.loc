--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.58.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 26.12.2017 22:33:11
-- Версия сервера: 5.7.13
-- Версия клиента: 4.1
-- Пожалуйста, сохраните резервную копию вашей базы перед запуском этого скрипта
--


SET NAMES 'utf8';

USE original;


--
-- Создать таблицу "`order`"
--


CREATE TABLE original.`order` (
  id int(11) NOT NULL AUTO_INCREMENT,
  product_id int(11) DEFAULT NULL,
  variation_id varchar(255) DEFAULT NULL,
  quantity smallint(6) DEFAULT NULL,
  price decimal(19, 2) DEFAULT NULL,
  user_id int(11) DEFAULT NULL,
  date_publish datetime DEFAULT NULL,
  date_update datetime DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
