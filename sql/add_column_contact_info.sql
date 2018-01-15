--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.58.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 15.01.2018 13:33:13
-- Версия сервера: 5.6.37
-- Версия клиента: 4.1
-- Пожалуйста, сохраните резервную копию вашей базы перед запуском этого скрипта
--


SET NAMES 'utf8';

USE original;


--
-- Изменить таблицу "`order`"
--
ALTER TABLE `order`
  ADD COLUMN contact_info VARCHAR(255) DEFAULT NULL AFTER user_id;