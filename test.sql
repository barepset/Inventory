-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2018 at 04:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `code` char(10) NOT NULL,
  `currdate` datetime NOT NULL,
  `pic` varchar(50) NOT NULL,
  `total` decimal(19,2) DEFAULT '0.00',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`code`, `currdate`, `pic`, `total`, `description`) VALUES
('1', '0000-00-00 00:00:00', 'aaa', '120000.00', 'test'),
('1212', '2018-03-19 00:00:00', 'awdad', '12000.00', 'asa'),
('21212', '2018-03-19 00:00:00', 'awdad', '12000.00', 'ssss'),
('AC20000001', '2018-03-19 00:00:00', 'Kadal', '12000.00', 'Tahu Bulat'),
('AC20000002', '2018-03-19 01:00:19', 'Kadal', '1200000.00', 'Permen'),
('CL18030003', '2018-03-16 00:00:00', 'Bambang', '22200.00', 'Padat'),
('CL18030004', '2018-03-16 00:00:00', 'Priambodo', '92000.00', 'Cair'),
('CL18030005', '2018-03-16 00:00:00', 'Priambodo', '19000.00', 'Cair'),
('CL18030006', '2018-03-16 00:00:00', 'Bambang', '10000.00', 'Padat'),
('CL18030007', '2018-03-16 00:00:00', 'Priambodo', '11000.00', 'Padat'),
('CL18030008', '2018-03-16 00:00:00', 'Titi', '14000.00', 'Gas'),
('CL18030009', '2018-03-16 00:00:00', 'Titi', '32000.00', 'Gas'),
('CL18030010', '2018-03-21 13:00:00', 'Priambodo', '45000.00', 'Padat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
