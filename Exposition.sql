-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 05:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CNIC` bigint(13) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CNIC`, `First_Name`, `Last_Name`, `Age`, `Gender`) VALUES
(4220156764900, 'Muhammad', 'Hassan', 22, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `Contact_No` bigint(11) NOT NULL,
  `CNIC` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`Contact_No`, `CNIC`) VALUES
(3009840274, 4220156764900);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `Dealer_ID` int(5) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active',
  `Profit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`Dealer_ID`, `Password`, `Name`, `Status`, `Profit`) VALUES
(10, 'admin2', 'Khan Motors', 'Active', 9511800),
(15, 'oooooo', 'Jamil Motors', 'Active', 29880000),
(18, 'bruh2', 'Margalla Motors', 'Active', 4083600),
(19, 'okiey', 'Jamil Motors', 'Active', 318720),
(20, 'bruh5', 'Danish Motors', 'Active', 51294000);

-- --------------------------------------------------------

--
-- Table structure for table `dealer_contact`
--

CREATE TABLE `dealer_contact` (
  `Contact_No` bigint(11) NOT NULL,
  `Dealer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_contact`
--

INSERT INTO `dealer_contact` (`Contact_No`, `Dealer_ID`) VALUES
(1236677228, 10),
(1234567890, 15),
(3437675729, 18),
(3336677222, 19),
(3336677212, 20);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Receipt_ID` int(5) NOT NULL,
  `Vehicle_Registration_No` varchar(7) NOT NULL,
  `Total_Price` float NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Customer_CNIC` bigint(13) NOT NULL,
  `Staff_CNIC` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Receipt_ID`, `Vehicle_Registration_No`, `Total_Price`, `Purchase_Date`, `Customer_CNIC`, `Staff_CNIC`) VALUES
(3, 'KOA-800', 1500000, '2021-12-20', 4220156764900, 4200089846624),
(8, 'ZEE-450', 4000000, '2021-12-20', 4220156764900, 4200089846624);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `CNIC` bigint(13) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Hire_Date` date DEFAULT current_timestamp(),
  `Designation` varchar(25) NOT NULL,
  `Salary` float NOT NULL,
  `Commission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`CNIC`, `Password`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Hire_Date`, `Designation`, `Salary`, `Commission`) VALUES
(4200089846624, 'bruhh', 'Mubashira', 'Khan', 22, 'Female', '2021-12-19', 'Manager', 30000000, 0.4),
(4200089846625, 'idkman', 'Hamza', 'Ayub', 22, 'Male', '2021-12-19', 'Salesperson', 5000000, 1.2),
(4200089846627, 'idklol', 'Sarim', 'Sohail', 22, 'Male', '2021-12-19', 'Salesperson', 30000000, 0.3),
(8347894274500, 'bruh45', 'Taha', 'Tanveer', 22, 'Male', '2021-12-19', 'Salesperson', 5000, 0.1),
(8347894274522, 'pass3', 'Muhammad', 'Zubair', 24, 'Male', '2021-12-19', 'Salesperson', 5000, 0.2),
(8347894278210, 'pass2', 'Sana', 'Khan', 22, 'Female', '2021-12-19', 'Salesperson', 9000, 0.2),
(8347894278212, 'mypass', 'Waleed', 'Khan', 30, 'Male', '2021-12-19', 'Manager', 900000, 0.3),
(8347894278213, 'hmmmm', 'Shaheer', 'Ahmed', 20, 'Male', '2021-12-19', 'Salesperson', 9000, 0.1),
(8347894278333, 'iambatman', 'Bruce', 'Wayne', 25, 'Male', '2021-12-19', 'Salesperson', 100000, 0.2),
(8347894278980, 'bringme', 'Thor', 'Odinson', 30, 'Male', '2021-12-19', 'Salesperson', 8000, 0.1),
(8347894278984, 'pass4', 'Meer', 'Afzal', 29, 'Male', '2021-12-19', 'Salesperson', 9000, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `staff_contact`
--

CREATE TABLE `staff_contact` (
  `Contact_No` bigint(11) NOT NULL,
  `CNIC` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_contact`
--

INSERT INTO `staff_contact` (`Contact_No`, `CNIC`) VALUES
(3433366232, 4200089846624),
(3002015147, 4200089846625),
(3433366224, 4200089846627),
(3456128768, 8347894274500),
(3456128776, 8347894274522),
(3456128089, 8347894278210),
(3456128976, 8347894278212),
(3456128980, 8347894278213),
(3456128090, 8347894278333),
(3456128789, 8347894278980),
(3456128927, 8347894278984);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Registration_No` varchar(7) NOT NULL,
  `Cost` float NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Make` varchar(15) NOT NULL,
  `Color` varchar(15) NOT NULL,
  `Engine_Capacity` float NOT NULL,
  `Fuel_Capacity` float NOT NULL,
  `Seating_Capacity` int(1) NOT NULL,
  `Mileage` float NOT NULL,
  `Insurance` varchar(5) NOT NULL,
  `Transmission` varchar(20) NOT NULL,
  `Availability` varchar(15) NOT NULL DEFAULT 'Available',
  `Dealer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Registration_No`, `Cost`, `Type`, `Make`, `Color`, `Engine_Capacity`, `Fuel_Capacity`, `Seating_Capacity`, `Mileage`, `Insurance`, `Transmission`, `Availability`, `Dealer_ID`) VALUES
('ABC-420', 50000, 'Car', 'Kia', 'Blue', 1000, 45, 4, 100, 'Yes', 'Automatic', 'Sold', 10),
('ABD-123', 250000, 'Car', 'Kia', 'Grey', 100, 500, 5, 200, 'Yes', 'Automatic', 'Sold', 10),
('ABE-124', 500000, 'Car', 'Toyota', 'White', 200, 40, 4, 111, 'No', 'Manual', 'Available', 10),
('AYB-069', 10000000, 'Car', 'Hyundai', 'Red', 700, 44, 4, 1200000, 'No', 'Automatic', 'Available', 20),
('ERD-999', 80000, 'Car', 'Honda', 'Silver', 900, 45, 4, 90000, 'Yes', 'Automatic', 'Available', 19),
('GHI-900', 5000000, 'Car', 'Toyota', 'Black', 100, 98, 4, 180, 'Yes', 'Automatic', 'Available', 20),
('KOA-800', 1500000, 'Car', 'Hyundai', 'Silver', 300, 50, 4, 102, 'Yes', 'Automatic', 'Sold', 20),
('MNO-290', 4000000, 'Car', 'Hyundai', 'Blue', 200, 90, 6, 180, 'No', 'Automatic', 'Available', 20),
('MOO-190', 5000000, 'Car', 'Kia', 'Red', 200, 90, 6, 180, 'Yes', 'Manual', 'Sold', 10),
('THE-786', 100000, 'Bike', 'Suzuki', 'Black', 400, 90, 2, 150, 'Yes', 'Manual', 'Sold', 18),
('TUV-480', 30000000, 'Bike', 'Kia', 'Green', 800, 99, 2, 100, 'Yes', 'Manual', 'Sold', 15),
('UVQ-223', 150000, 'Bike', 'Suzuki', 'Black', 200, 99, 2, 120, 'Yes', 'Manual', 'Available', 15),
('WOO-420', 4000000, 'Car', 'Honda', 'Brown', 700, 90, 5, 180, 'Yes', 'Automatic', 'Sold', 10),
('XYZ-890', 60000, 'Bike', 'Honda', 'Red', 110, 70, 2, 110, 'Yes', 'Manual', 'Available', 15),
('ZEE-450', 4000000, 'Car', 'Honda', 'Grey', 300, 95, 5, 150, 'No', 'Automatic', 'Sold', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CNIC`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`Contact_No`),
  ADD UNIQUE KEY `Customer_CNIC` (`CNIC`),
  ADD KEY `Contact-Customer` (`CNIC`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`Dealer_ID`);

--
-- Indexes for table `dealer_contact`
--
ALTER TABLE `dealer_contact`
  ADD PRIMARY KEY (`Contact_No`),
  ADD UNIQUE KEY `Dealer_ID` (`Dealer_ID`),
  ADD KEY `Contact-Dealer` (`Dealer_ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Receipt_ID`),
  ADD UNIQUE KEY `Vehicle_Registration_No` (`Vehicle_Registration_No`),
  ADD KEY `Receipt-Customer` (`Customer_CNIC`),
  ADD KEY `Receipt-Staff` (`Staff_CNIC`),
  ADD KEY `Receipt-Vehicle` (`Vehicle_Registration_No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`CNIC`);

--
-- Indexes for table `staff_contact`
--
ALTER TABLE `staff_contact`
  ADD PRIMARY KEY (`Contact_No`),
  ADD UNIQUE KEY `Staff_CNIC` (`CNIC`),
  ADD KEY `Contact-Staff` (`CNIC`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Registration_No`),
  ADD KEY `Vehicle-Dealer` (`Dealer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `Dealer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Receipt_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `Contact-Customer` FOREIGN KEY (`CNIC`) REFERENCES `customer` (`CNIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dealer_contact`
--
ALTER TABLE `dealer_contact`
  ADD CONSTRAINT `Contact-Dealer` FOREIGN KEY (`Dealer_ID`) REFERENCES `dealer` (`Dealer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `Receipt-Customer` FOREIGN KEY (`Customer_CNIC`) REFERENCES `customer` (`CNIC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Receipt-Staff` FOREIGN KEY (`Staff_CNIC`) REFERENCES `staff` (`CNIC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Receipt-Vehicle` FOREIGN KEY (`Vehicle_Registration_No`) REFERENCES `vehicle` (`Registration_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_contact`
--
ALTER TABLE `staff_contact`
  ADD CONSTRAINT `Contact-Staff` FOREIGN KEY (`CNIC`) REFERENCES `staff` (`CNIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `Vehicle-Dealer` FOREIGN KEY (`Dealer_ID`) REFERENCES `dealer` (`Dealer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
