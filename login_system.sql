-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 04:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--
CREATE DATABASE IF NOT EXISTS `login_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login_system`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `course_category` varchar(255) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `instructor_email` varchar(255) NOT NULL,
  `rating` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `course_modules` text DEFAULT NULL,
  `course_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_image`, `course_category`, `instructor_name`, `instructor_email`, `rating`, `description`, `course_modules`, `course_fee`) VALUES
(1, 'Python for Data Science', 'https://th.bing.com/th/id/R.b1c66d2b33344feb0f619c5804026f44?rik=AG78vppewWX0ug&pid=ImgRaw&r=0', 'Data Science', 'John Smith', 'johnsmith@email.com', 4.5, 'Learn Python for data analysis and visualization', 'Introduction to Python;Data Manipulation with Pandas;Data Visualization with Matplotlib', '300.00'),
(2, 'Web Development with React', 'https://th.bing.com/th/id/R.776fd8269417774ef8b29304781e5277?rik=rV1PD0yroPYvSw&pid=ImgRaw&r=0', 'Web Development', 'Jane Doe', 'janedoe@email.com', 4.8, 'Learn how to build web applications using React', 'Introduction to React;Components and Props;State and Lifecycle;Routing', '400.00'),
(3, 'Java Programming', 'https://th.bing.com/th/id/R.003a9bb51342b68184fb56efbe849076?rik=2D2NUUEXF5F%2fdw&pid=ImgRaw&r=0', 'Programming', 'Sarah Lee', 'sarahlee@email.com', 4.8, 'Learn Java programming from scratch', 'Introduction to Java;Data types and variables;Control statements', '600.00'),
(4, 'Web Development with HTML and CSS', 'https://logodix.com/logo/470216.png', 'Web Development', 'Tom Jones', 'tomjones@email.com', 4.2, 'Learn to create responsive web pages with HTML and CSS', 'Introduction to HTML;CSS Styling;Web Page Layout', '400.00'),
(5, 'Android App Development', 'https://th.bing.com/th/id/R.be9dda907b0dd518a0325a70b68ba69c?rik=QG1bc7ffBd1b%2fw&pid=ImgRaw&r=0', 'Mobile App Development', 'David Kim', 'davidkim@email.com', 4.6, 'Learn to build Android apps using Java', 'Introduction to Android Development;UI Design;Data Storage', '300.00'),
(6, 'Machine Learning', 'https://th.bing.com/th/id/OIP.dDKPvmo7OWwPoWBa06smfAHaFj?pid=ImgDet&rs=1', 'Data Science', 'Rachel Green', 'rachelgreen@email.com', 4.7, 'Learn to build predictive models using Python', 'Introduction to Machine Learning;Data Preprocessing;Supervised Learning', '1000.00'),
(7, 'Blockchain Fundamentals', 'https://th.bing.com/th/id/R.f5f15d7bbaf8556fcf0da67d65dcc486?rik=Qc0GfkY1U68h%2fQ&pid=ImgRaw&r=0', 'Blockchain', 'Jack Johnson', 'jackjohnson@email.com', 4.4, 'Learn the basics of blockchain technology', 'Introduction to Blockchain;Consensus Mechanisms;Smart Contracts', '900.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `content_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `totalModule` int(11) NOT NULL,
  `moduleNumber` int(11) NOT NULL,
  `moduleName` varchar(255) NOT NULL,
  `totalLecture` int(11) NOT NULL,
  `lectureNumber` int(11) NOT NULL,
  `lectureName` varchar(255) NOT NULL,
  `lectureDescription` text NOT NULL,
  `videoName` varchar(255) NOT NULL,
  `lectureVideoLinks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`content_id`, `course_id`, `totalModule`, `moduleNumber`, `moduleName`, `totalLecture`, `lectureNumber`, `lectureName`, `lectureDescription`, `videoName`, `lectureVideoLinks`) VALUES
(1, 1, 3, 1, 'Introduction to Programming', 5, 1, 'What is Programming?', 'This lecture introduces the basics of programming.', 'Introduction Video', 'https://www.youtube.com/embed/zOjov-2OZ0E'),
(2, 1, 3, 1, 'Introduction to Programming', 5, 2, 'Variables and Data Types', 'This lecture covers variables and data types in programming.', 'Variables and Data Types Video', 'https://www.youtube.com/embed/kqtD5dpn9C8'),
(3, 1, 3, 1, 'Introduction to Programming', 5, 3, 'Operators and Expressions', 'This lecture covers operators and expressions in programming.', 'Operators and Expressions Video', 'https://www.youtube.com/embed/VSEnzzjAm0c'),
(4, 1, 3, 1, 'Introduction to Programming', 5, 4, 'Control Structures', 'This lecture covers control structures in programming.', 'Control Structures Video', 'https://www.youtube.com/embed/MHPGeQD8TvI'),
(5, 1, 3, 1, 'Introduction to Programming', 5, 5, 'Functions and Modules', 'This lecture covers functions and modules in programming.', 'Functions and Modules Video', 'https://www.youtube.com/watch?v=mno789'),
(6, 1, 3, 2, 'Intermediate to Programming', 5, 1, 'What is Programming?', 'This lecture introduces the basics of programming.', 'Introduction Video', 'https://www.youtube.com/embed/Z1Yd7upQsXY'),
(7, 1, 3, 2, 'Intermediate to Programming', 5, 2, 'Variables and Data Types', 'This lecture covers variables and data types in programming.', 'Variables and Data Types Video', 'https://www.youtube.com/watch?v=def123'),
(8, 1, 3, 2, 'Intermediate to Programming', 5, 3, 'Operators and Expressions', 'This lecture covers operators and expressions in programming.', 'Operators and Expressions Video', 'https://www.youtube.com/watch?v=ghi789'),
(9, 1, 3, 2, 'Intermediate to Programming', 5, 4, 'Control Structures', 'This lecture covers control structures in programming.', 'Control Structures Video', 'https://www.youtube.com/watch?v=jkl456'),
(10, 1, 3, 2, 'Intermediate to Programming', 5, 5, 'Functions and Modules', 'This lecture covers functions and modules in programming.', 'Functions and Modules Video', 'https://www.youtube.com/embed/79pKwdiqcwI');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_courses`
--

CREATE TABLE `recommended_courses` (
  `recommended_course_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommended_courses`
--

INSERT INTO `recommended_courses` (`recommended_course_id`, `course_id`) VALUES
(13, 1),
(5, 2),
(1, 4),
(20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`) VALUES
('Md. Jidanul Hakim Jitu', 'jisan.jitu@yahoo.com', '123', '$2y$10$ZkKwfilMN.AaUQG6cT9QkODBpZmFPXFpiQVCERWP8gASFdU0yxcdK'),
('Md. Jidanul Hakim Jitu', 'jitu000166@gmail.com', 'jitu', '$2y$10$IQhsFKy0bhCw6mYO8VUhYuqydKZefkUSxFqgw9ibPW2.2KsO767ee'),
('Md. Jidanul Hakim Jitu', 'bita.gama0001@gmail.com', '1234', '$2y$10$qWAEA8GXfp9bdadzDoHEcO9FjFJVCdGUofoFIb/TggCm/D2o4shla'),
('Md. Jidanul Hakim', 'hola@gmail.com', '1123', '$2y$10$zc6mZCqcwA695lD.fTsTOuYrRbHWrxVrUVafhFUTiyZ6rAuHzoTsi'),
('Code Guard', 'hola123@gmail.com', 'root', '$2y$10$8NrMc3G42gpqTQZvm6wQquwTIDt5ktMHkaNmx9uCIoz0OHKU46LH.'),
('Md. Jidanul Hakim', 'hola@gmail.com', '123', '$2y$10$MMP.sZ/RG/zya78D.UVoHOgJ5LgMnUtg6BhrAbR5wx6C9FZPVnbWa'),
('Md. Jidanul Hakim Jitu', 'bita.gama0001@gmail.com', '123', '$2y$10$ct58OG1ff5x6ONpQ2yFO7OYfkINR0mIKxUo0wETfOW0tt1WOZ/Pja'),
('Code Guard', 'hola123@gmail.com', '123', '$2y$10$xXBLZGqOPa57nhASgWZ/Eee8nFv2nLa9TjV5u4ePvdDda6NMiNmtu'),
('Code Guard', 'hola123@gmail.com', '123', '$2y$10$Xja6jsgSfx8RHZ.ysqZxRe.HOBzbxPqZueA0SsyNETr.xh3OmuloS'),
('Code Guard', 'hola123@gmail.com', '123', '$2y$10$xeh7vN9j.ZAdyp3/82qKQOsBwAZUY1/5MrkM2YoxUu9kiIoAE6EMu'),
('Code Guard', 'hola123@gmail.com', '123', '$2y$10$ASveIRHwqRCrG0Vj5mmHqOotPSwDpcdetS/ieG8YN4.QY9RMjQyUO'),
('Md. Jidanul Hakim', 'hola22@gmail.com', 'jitu', '$2y$10$pZhrdy61KbNtydrleZEzAOb9rmXrUEU8s4piRKk8tEMXCh9iX7h/O'),
('Md. Jidanul Hakim', 'hola222@gmail.com', 'jitu', '$2y$10$JysTUfrLQj6pRCdq7/h9d.dFTSZXzmhEaS0p.W.daf25q6.ePB1J2'),
('Md. Jidanul Hakim', 'hola222@gmail.com', '12', '$2y$10$ws21CE5/eyX3Nry/NkrWQOygxEFUlAN55rwiyOxc6BxgJKyvBQrje'),
('Md. Jidanul Hakim', 'hola222@gmail.com', 'jitu', '$2y$10$Th8hZGLU47WzEXWzn1h78uvLIkjCyS4LyyRRHMS4dR.9Ej1vJSvYS'),
('Md. Jidanul Hakim', 'hola222@gmail.com', '123', '$2y$10$bhtIlxTUoNyJf/pGscf.U.TcB.dKsBvv4fBhhf3RNKCk/OL2JZHTK'),
('Md. Jidanul Hakim', 'hola222@gmail.com', '123', '$2y$10$N1Vl1CuJEDcgPCI0pR8PZuWLOxdSOvAABvCgl4e2C4kX2bLpMdTuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `fk_course_content_course_id` (`course_id`);

--
-- Indexes for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  ADD PRIMARY KEY (`recommended_course_id`),
  ADD UNIQUE KEY `unique_course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  MODIFY `recommended_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `fk_course_content_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  ADD CONSTRAINT `recommended_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-03-07 13:15:19', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
