/* 2012036901 윤진한 */

/* Ex1 */
DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` INTEGER NOT NULL,
  `name` varchar(10) NOT NULL,
  `year` TINYINT NOT NULL default '1',
  `dept_no` INTEGER NOT NULL,
  `major` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `dept_no` INTEGER NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `office_tel` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`dept_no`),
  UNIQUE KEY (`dept_name`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `student` MODIFY `major` varchar(40);

ALTER TABLE `student` ADD COLUMN `genders` varchar(10) DEFAULT NULL;

ALTER TABLE `department` MODIFY `dept_name` varchar(40);

ALTER TABLE `department` MODIFY `office` varchar(30);

/* Ex2 */
ALTER TABLE `student` DROP COLUMN `genders`;

LOCK TABLES `student` WRITE;
INSERT INTO `student` VALUES (20070002, 'James Bond', 3, 4, 'Business Administration'),
(20060001, 'Queenie', 4, 4, 'Business Administration'),
(20030001, 'Reonardo', 4, 2, 'Electronic Engineering'),
(20040003, 'Julia', 3, 2, 'Electronic Engineering'),
(20060002, 'Roosevelt', 3, 1, 'Computer Science'),
(20100002, 'Fearne', 3, 4, 'Business Administration'),
(20110001, 'Chloe', 2, 1, 'Computer Science'),
(20080003, 'Amy', 4, 3, 'Law'),
(20040002, 'Selina', 4, 5, 'English Literature'),
(20070001, 'Ellen', 4, 4, 'Business Administration'),
(20100001, 'Kathy', 3, 4, 'Business Administration'),
(20110002, 'Lucy', 2, 2, 'Electronic Engineering'),
(20030002, 'Michelle', 5, 1, 'Computer Science'),
(20070003, 'April', 4, 3, 'Law'),
(20070005, 'Alicia', 2, 5, 'English Literature'),
(20100003, 'Yullia', 3, 1, 'Computer Science'),
(20070007, 'Ashlee', 2, 4, 'Business Administration');
UNLOCK TABLES;

LOCK TABLES `department` WRITE;
INSERT INTO department(dept_name,office,office_tel) VALUES ('Computer Science', 'Engineering building', '02-3290-0123'),
('Electronic Engineering', 'Engineering building', '02-3290-2345'),
('Law', 'Law building', '02-3290-7896'),
('Business Administration', 'Administration building', '02-3290-1112'),
('English Literature', 'Literature building', '02-3290-4412');
UNLOCK TABLES;

/* Ex3 */
UPDATE `department` SET `dept_name` = 'Electronic and Electrical Engineering' WHERE `dept_name` = 'Electronic Engineering';
UPDATE `student` SET `major` = 'Electronic and Electrical Engineering' WHERE `major` = 'Electronic Engineering';

INSERT INTO department(dept_name,office,office_tel) VALUES ('Education','Education building','02-3290-2347');

UPDATE `student` SET `major` = 'Education', `dept_no` = 6 WHERE `name` = 'Chloe';

DELETE FROM `student` WHERE `name` = 'Michelle';
DELETE FROM `student` WHERE `name` = 'Fearne';

/* Ex4 */
select * from student where major = 'Computer Science';
select student_id,year,major from student;
select * from student where year = 3;
select * from student where (year = 1) or (year = 2);
select s.student_id,s.name,s.year,s.dept_no,s.major from student s join department d on s.dept_no = d.dept_no where d.dept_name = 'Business Administration';

/* Ex5 */
select * from student where student_id like '%2007%';
select * from student order by student_id;
select major from student group by major having avg(year) > 3;
select * from student where student_id like '%2007%' and major = 'Business Administration' limit 2;
