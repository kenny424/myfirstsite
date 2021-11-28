INSERT INTO `disp` (`fam`, `dis`, `ots`) 
VALUES ('Криворучко Н.А', 'МДК.02.01 КС', 'A410'),('Закирова Р.А', 'Приклад.Программирование', 'A310'),
('Кучерова Н.В', 'Архит.комп.сист', 'A403'),
('Губчевская Ек.А', 'Философия', 'Ин-1'),
('Тутарова В.Д', 'Систем.Программирование', 'Ин-2');

INSERT INTO `numb` (`fam`, `disp`, `ots`) 
VALUES ('Ефремов', 'Физика',5),('Филиппов', 'Математика',3),('Авдеев', 'Программирование',5),('Дорофеев', 'Физра',4),('Мишин', 'Информатика',3);

INSERT INTO `groups`(`name`, `photos`) 
VALUES 
('Саша','\gallyamov\group\1.jpg'),
('Петя','\gallyamov\group\2.jpg'),
('Макс','\gallyamov\group\3.jpg'),
('Катя','\gallyamov\group\4.jpg'),
('Серёжа','\gallyamov\group\5.jpg'),
('Слава','\gallyamov\group\6.jpg');

UPDATE `groups` SET `photos` = '\\gallyamov\\group\\1.jpg' WHERE `groups`.`id` = 1; UPDATE `groups` SET `photos` = '\\gallyamov\\group\\2.jpg' WHERE `groups`.`id` = 2; UPDATE `groups` SET `photos` = '\\gallyamov\\group\\3.jpg' WHERE `groups`.`id` = 3; UPDATE `groups` SET `photos` = '\\gallyamov\\group\\4.jpg' WHERE `groups`.`id` = 4; UPDATE `groups` SET `photos` = '\\gallyamov\\group\\5.jpg' WHERE `groups`.`id` = 5; UPDATE `groups` SET `photos` = '\\gallyamov\\group\\6.jpg' WHERE `groups`.`id` = 6;
UPDATE `klass` SET `nname` = 'Оренбуркина Маргарита Владимировна' WHERE `klass`.`id` = 1;