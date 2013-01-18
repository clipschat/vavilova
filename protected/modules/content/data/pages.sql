CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang` char(2) DEFAULT 'ru' COMMENT 'Язык',
  `title` varchar(200) NOT NULL COMMENT 'Заголовок',
  `url` varchar(250) DEFAULT NULL COMMENT 'Адрес',
  `text` text NOT NULL COMMENT 'Текст',
  `is_published` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Опубликована',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Создана',
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `pages` (`id`, `lang`, `title`, `url`, `text`, `is_published`, `date_create`) VALUES
(1, 'ru', 'Главная страница', '/', 'Yii — это высокоэффективный основанный на компонентной структуре PHP-фреймворк для\r\n    разработки масштабных веб-приложений. Он позволяет максимально применить концепцию повторного\r\n    использования кода и может существенно ускорить процесс веб-разработки. Название Yii\r\n    (произносится как Yee или [ji:]) означает простой (easy), эффективный (efficient) и расширяемый\r\n    (extensible).    ', 1, '2011-06-25 16:23:15'),
(2, 'ru', 'О нас', '', 'История Yii началась 1 января 2008 года, как проект по исправлению некоторых изъянов в фреймворке PRADO (победителя «<a href="http://ru.wikipedia.org/wiki/Zend_Technologies" title="Zend Technologies">Zend</a> PHP 5 coding contest»<sup><a href="http://ru.wikipedia.org/wiki/Yii#cite_note-1">[2]</a></sup>). Например, PRADO медленно обрабатывал сложные страницы, имел крутую кривую обучения и был довольно труден в настройке.<sup><a href="http://ru.wikipedia.org/wiki/Yii#cite_note-2">[3]</a></sup> В октябре 2008 года, после более 10 месяцев закрытой разработки, вышла первая <a href="http://ru.wikipedia.org/wiki/%D0%90%D0%BB%D1%8C%D1%84%D0%B0-%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%8F" title="Альфа-версия">альфа-версия</a>. 3 декабря 2008 был выпущен Yii 1.0<sup><a href="http://ru.wikipedia.org/wiki/Yii#cite_note-about-yii-0">[1]</a></sup>    ', 1, '2011-09-10 17:11:25'),
(3, 'en', 'Main page', '/', '<p><strong>Yii</strong> is pronounced as Yee or [ji:], and is an acroynym for "<strong>Yes It Is!</strong>". This is often the accurate, and most concise response to inquires from those new to Yii: <br />Is it fast? ... Is it secure? ... Is it professional? ... Is it right for my next project? ... <strong>Yes, it is!</strong></p>\r\n  <p>Yii is a free, open-source Web application development framework written in PHP5 that promotes clean, <a href="http://en.wikipedia.org/wiki/Don%27t_repeat_yourself" rel="nofollow">DRY</a>\r\n design and encourages rapid development. It works to streamline your \r\napplication development and helps to ensure an extremely efficient, \r\nextensible, and maintainable end product.</p>\r\n  <p>Being extremely performance optimized, Yii is a perfect choice for \r\nany sized project. However, it has been built with sophisticated, \r\nenterprise applications in mind. You have full control over the \r\nconfiguration from head-to-toe (presentation-to-persistence) to conform \r\nto your enterprise development guidelines. It comes packaged with tools \r\nto help test and debug your application, and has clear and comprehensive\r\n documentation.</p>\r\n  <p>To learn more about what Yii brings to the table, check out the <a href="http://www.yiiframework.com/features/">features section</a>.</p>  ', 1, '2011-09-11 00:00:53'),
(4, 'en', 'About us', '', '<p>Yii is the brainchild of its founder, Qiang Xue, who started the Yii project on January 1, 2008. Qiang previously developed and\r\n  maintained the <a href="http://www.pradosoft.com/" rel="nofollow">Prado</a>\r\n framework. The years of experience gained and developer feedback \r\ngathered from that project solidified the need for an extremely fast, \r\nsecure and professional framework that is tailor-made to meet the \r\nexpectations of Web 2.0 application development. On December 3, 2008, \r\nafter nearly one year''s\r\n  development, Yii 1.0 was formally released to the public.</p>\r\n  <p>Its extremely impressive performance metrics when compared to other \r\nPHP-based frameworks immediately drew very positive attention and its \r\npopularity and adoption continues to grow at an ever increasing rate.</p>    ', 1, '2011-09-11 00:33:10');

ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;