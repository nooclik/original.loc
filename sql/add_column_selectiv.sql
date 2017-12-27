--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.58.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 27.12.2017 13:31:37
-- Версия сервера: 5.6.37
-- Версия клиента: 4.1
-- Пожалуйста, сохраните резервную копию вашей базы перед запуском этого скрипта
--


SET NAMES 'utf8';

USE original;


--
-- Изменить таблицу "product"
--
ALTER TABLE product
  ADD COLUMN selective TINYINT(1) DEFAULT 0 AFTER quantity;