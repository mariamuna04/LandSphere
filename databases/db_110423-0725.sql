-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2023 at 06:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse2118`
--
CREATE DATABASE IF NOT EXISTS `cse2118` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cse2118`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
                          `user_email` varchar(20) NOT NULL,
                          `event_name` varchar(63) NOT NULL,
                          `event_description` varchar(1023) DEFAULT NULL,
                          `event_category` varchar(20) NOT NULL,
                          `event_date` varchar(10) NOT NULL,
                          `event_start_time` varchar(5) NOT NULL,
                          `event_end_time` varchar(5) NOT NULL,
                          `event_from` varchar(20) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`user_email`, `event_name`, `event_description`, `event_category`, `event_date`, `event_start_time`, `event_end_time`, `event_from`) VALUES
                                                                                                                                                               ('apek@gmail.com', 'Project Show', 'Advanced object oriented Programming.\nRoom no: 401', 'University', '2023-01-02', '9:0', '11:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Workshops', 'Sitting with our upcoming events in from of our chairman in a roundtable', 'work', '2023-01-20', '10:15', '12:30', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Operating System Final', 'Total 5 chapters-\nprocess syncronization\nDeadlocks\nMass storage management\nFile systems\nVirtual Memory\n\nRoom no: 429', 'University', '2023-01-08', '9:0', '11:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'DBMS Final', 'Topic:\nNormalization, Indexing, Hashing, Transactions.', 'University', '2023-01-12', '9:0', '11:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Electronics Final', 'Topic: Mosfet, Cmos, BJT', 'University', '2023-01-14', '2:0', '4:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Going for shopping', 'purchasing some winter cloths and some notebooks.', 'Personal', '2023-01-06', '10:0', '14:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Meeting with CEO', 'discussion about the upcoming event launch and to discuss marketing stategy for the next targeted client', 'Work', '2023-01-27', '8:30', '12:40', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Monthly groceries shopping', 'purchasing- rice, pulse, meat, fish and some spices.\nbudgets: 5000 bdt.', 'Others', '2023-01-03', '9:0', '11:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Paying electricity bill', '1500 bdt + 500 bdt (due)', 'Others', '2023-01-02', '10:0', '10:20', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'session on cyber security', 'session on improving skill on cyber security', 'University', '2022-12-28', '9:45', '11:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'OS Lab Final', 'Topic: CPU scheduling, IPC(Semaphore, producer, consumer)', 'University', '2022-12-31', '14:30', '15:45', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Meeting with college', 'Discussion on important event. Place: Indulge', 'Works', '2022-11-30', '15:0', '16:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Washing Cloths', 'All cloths from the bucket.', 'Personal', '2022-12-30', '12:0', '13:0', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Submit Database Assignment', 'Submit ', 'University', '2023-02-03', '23.0', '24.0', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Do Laundry', 'Check for Detergents also, might run out', 'Personal', '2022-11-03', '13.0', '14.0', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Wash curtains', 'Wash 2 of them, the other two later', 'Others', '2023-01-04', '13.0', '14.0', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Buy gifts for Alice\'s Birthday', 'Buy flowers, chocolates, perfume and sunglasses', 'Personal', '2022-11-27', '20.15', '20.16', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Upload Vlog #332 to YouTube', 'IMPORTANT to upload exact to this time to gain maximum reach. Turn monetization on. ', 'Personal', '2023-02-15', '22.0', '22.15', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Wash and cut nails of my cats', 'Buy catfood and invite Josh to help', 'Personal', '2022-12-15', '12.0', '13.0', 'apek@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Attend lecture of CS103 ', 'Dr Sues will be there so must attend\nTopic: Blockchain and Crypto', 'Work', '2023-01-20', '8.30', '10.0', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Make poster for upcoming project review', 'Collect marker, colored paper and pencils, art paper, eraser, glitter, glue', 'Work', '2022-11-14', '15.0', '18.0', 'apek@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Dental Checkup', 'Take previous prescription\nAsk doctor:\nDue time of checkup, what to eat during checkup, suggest some painkiller if possible', 'Personal', '2023-04-03', '19.0', '20.45', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Buy recipe for chocolate smoothie', 'Recipe:\nMilk, coffee, sugar, hershey syrup', 'Personal', '2022-12-30', '10.0', '10.15', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Attend lecture of CS103 ', 'Dr Sues will be there so must attend\nTopic: Blockchain and Crypto', 'Work', '2023-01-20', '8:30', '10:0', 'mclark@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Project Show', 'Advanced object oriented Programming.\nRoom no: 401', 'University', '2023-01-02', '8:45', '11:0', 'apek@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Operating System Final', 'Total 5 chapters-\nprocess syncronization\nDeadlocks\nMass storage management\nFile systems\nVirtual Memory\n\nRoom no: 429', 'University', '2023-01-08', '9:0', '11:0', 'apek@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Attending a wedding', 'Friends wedding at Shenakunja', 'Others', '2023-01-06', '19:0', '22:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'e', 'e', 'e', '2023-01-02', '9:38', '10:0', 'no'),
                                                                                                                                                               ('apek@gmail.com', 'Attending a wedding', 'Friends wedding at Shenakunja', 'Others', '2023-01-06', '19:0', '22:0', 'mclark@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'new event', 'qqq', 'others', '2023-01-02', '10:30', '11:30', 'no'),
                                                                                                                                                               ('mclark@gmail.com', 'Paying electricity bill', '1500 bdt + 500 bdt (due)', 'Others', '2023-01-02', '10:0', '10:20', 'apek@gmail.com'),
                                                                                                                                                               ('mclark@gmail.com', 'Project Show', 'Advanced object oriented Programming.\nRoom no: 401', 'University', '2023-01-02', '9:0', '11:0', 'apek@gmail.com'),
                                                                                                                                                               ('apek@gmail.com', 'FYDP-I', 'Unknown', 'Course', '2023-01-02', '12:31', '12:32', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `name` varchar(128) NOT NULL,
                         `email` varchar(128) NOT NULL,
                         `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
                                                      ('Sagor', 'apek@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
                                                      ('Myles Clark', 'mclark@gmail.com', '99c505b8d298990012689e81d32d59e5'),
                                                      ('New User', 'new@gmail.com', '99c505b8d298990012689e81d32d59e5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
    ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
    ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `cse3522`
--
CREATE DATABASE IF NOT EXISTS `cse3522` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cse3522`;

-- --------------------------------------------------------

--
-- Table structure for table `DATE`
--

CREATE TABLE `DATE` (
                        `date` date DEFAULT NULL,
                        `new` int(11) DEFAULT NULL,
                        `old` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DATE`
--

INSERT INTO `DATE` (`date`, `new`, `old`) VALUES
                                              ('1998-08-21', NULL, NULL),
                                              ('1983-02-12', NULL, NULL),
                                              ('2010-11-06', NULL, NULL),
                                              ('2001-09-18', NULL, NULL),
                                              ('1976-06-30', NULL, NULL),
                                              ('1995-04-02', NULL, NULL),
                                              ('1987-12-25', NULL, NULL),
                                              ('1972-10-14', NULL, NULL),
                                              ('2004-07-07', NULL, NULL),
                                              ('1991-05-19', NULL, NULL),
                                              ('1979-03-23', NULL, NULL),
                                              ('2015-01-01', NULL, NULL),
                                              ('1985-09-08', NULL, NULL),
                                              ('2007-12-03', NULL, NULL),
                                              ('1993-10-29', NULL, NULL),
                                              ('1974-08-16', NULL, NULL),
                                              ('1981-07-11', NULL, NULL),
                                              ('2018-05-22', NULL, NULL),
                                              ('1996-03-17', NULL, NULL),
                                              ('1978-01-09', NULL, NULL),
                                              ('2009-06-27', NULL, NULL),
                                              ('1989-04-13', NULL, NULL),
                                              ('2002-08-30', NULL, NULL),
                                              ('1973-06-25', NULL, NULL),
                                              ('1994-11-12', NULL, NULL),
                                              ('1986-09-24', NULL, NULL),
                                              ('2011-02-10', NULL, NULL),
                                              ('2005-10-20', NULL, NULL),
                                              ('1977-04-06', NULL, NULL),
                                              ('1998-08-21', NULL, NULL),
                                              ('1983-02-12', NULL, NULL),
                                              ('2010-11-06', NULL, NULL),
                                              ('2001-09-18', NULL, NULL),
                                              ('1976-06-30', NULL, NULL),
                                              ('1995-04-02', NULL, NULL),
                                              ('1987-12-25', NULL, NULL),
                                              ('1972-10-14', NULL, NULL),
                                              ('2004-07-07', NULL, NULL),
                                              ('1991-05-19', NULL, NULL),
                                              ('1979-03-23', NULL, NULL),
                                              ('2015-01-01', NULL, NULL),
                                              ('1985-09-08', NULL, NULL),
                                              ('2007-12-03', NULL, NULL),
                                              ('1993-10-29', NULL, NULL),
                                              ('1974-08-16', NULL, NULL),
                                              ('1981-07-11', NULL, NULL),
                                              ('2018-05-22', NULL, NULL),
                                              ('1996-03-17', NULL, NULL),
                                              ('1978-01-09', NULL, NULL),
                                              ('2009-06-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
                         `user_nid` int(11) DEFAULT NULL,
                         `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
                        `nid` int(11) NOT NULL,
                        `_name_` varchar(255) NOT NULL,
                        `birth_date` date DEFAULT NULL,
                        `address` varchar(255) DEFAULT NULL,
                        `phone_number` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `role` int(11) DEFAULT NULL COMMENT '0 = admin; 1 = user',
                        `password` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`nid`, `_name_`, `birth_date`, `address`, `phone_number`, `email`, `role`, `password`) VALUES
    (111, 'a', '2023-03-15', 'qwerty', '12345', 'a@a.a', NULL, 'x');

-- --------------------------------------------------------

--
-- Table structure for table `USER_INFO`
--

CREATE TABLE `USER_INFO` (
                             `user_nid` int(11) DEFAULT NULL,
                             `parent_nid` int(11) DEFAULT NULL,
                             `occupation` varchar(255) DEFAULT NULL,
                             `yearly_income` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `LOGIN`
--
ALTER TABLE `LOGIN`
    ADD KEY `nid` (`user_nid`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
    ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `USER_INFO`
--
ALTER TABLE `USER_INFO`
    ADD KEY `user_nid` (`user_nid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `LOGIN`
--
ALTER TABLE `LOGIN`
    ADD CONSTRAINT `nid` FOREIGN KEY (`user_nid`) REFERENCES `USER` (`nid`);

--
-- Constraints for table `USER_INFO`
--
ALTER TABLE `USER_INFO`
    ADD CONSTRAINT `user_nid` FOREIGN KEY (`user_nid`) REFERENCES `USER` (`nid`);
--
-- Database: `dbms_project`
--
CREATE DATABASE IF NOT EXISTS `dbms_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbms_project`;

-- --------------------------------------------------------

--
-- Table structure for table `booked_land_purchase`
--

CREATE TABLE `booked_land_purchase` (
                                        `land_id` int(11) NOT NULL,
                                        `potential_buyer_id` int(11) NOT NULL,
                                        `owner_id` int(11) DEFAULT NULL,
                                        `booking_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_land_purchase`
--

INSERT INTO `booked_land_purchase` (`land_id`, `potential_buyer_id`, `owner_id`, `booking_date`) VALUES
                                                                                                     (67890, 1423456, NULL, '2023-04-10'),
                                                                                                     (77778, 1423456, NULL, '2023-04-10'),
                                                                                                     (78901, 1423456, NULL, '2023-04-10'),
                                                                                                     (88056, 7504926, NULL, '2023-04-10'),
                                                                                                     (55090, 7890123, 111, '2023-04-10'),
                                                                                                     (55556, 7890123, 111, '2023-04-10'),
                                                                                                     (11008, 111, 1234567, '2023-04-10'),
                                                                                                     (11009, 111, 1234567, '2023-04-10'),
                                                                                                     (10832, 6324781, 1256789, '2023-04-10'),
                                                                                                     (11011, 6324781, 2345678, '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
                           `booking_id` int(11) NOT NULL,
                           `booker_nid` int(11) NOT NULL,
                           `land_nid` int(11) NOT NULL,
                           `booking_date` date NOT NULL,
                           `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
                            `nid` int(11) NOT NULL,
                            `parent_nid` int(11) NOT NULL,
                            `full_name` varchar(255) NOT NULL,
                            `passport_number` varchar(9) DEFAULT NULL,
                            `phone_number` varchar(11) DEFAULT NULL,
                            `birth_certificate_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`nid`, `parent_nid`, `full_name`, `passport_number`, `phone_number`, `birth_certificate_number`) VALUES
                                                                                                                             (103852, 111, 'ChildThree', NULL, NULL, '6365446354'),
                                                                                                                             (321256, 111, 'ChildOne', NULL, NULL, '98978787'),
                                                                                                                             (432299, 111, 'ChildTwo', NULL, NULL, '457556354');

-- --------------------------------------------------------

--
-- Table structure for table `contact_anonymous`
--

CREATE TABLE `contact_anonymous` (
                                     `id` int(11) NOT NULL,
                                     `full_name` varchar(255) DEFAULT NULL,
                                     `email` varchar(255) NOT NULL,
                                     `phone_number` varchar(255) DEFAULT NULL,
                                     `post` varchar(1023) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_anonymous`
--

INSERT INTO `contact_anonymous` (`id`, `full_name`, `email`, `phone_number`, `post`) VALUES
                                                                                         (11, 'Hello', 'hello@hello.hello', '12345678', 'Hello World'),
                                                                                         (12, 'Test', 'test@test.test', '123456789', 'Test Message');

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment` (
                               `installment_id` int(11) NOT NULL,
                               `date` date NOT NULL DEFAULT curdate(),
                               `amount` int(11) NOT NULL,
                               `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
                        `land_id` int(11) NOT NULL,
                        `title` varchar(255) DEFAULT NULL,
                        `area` varchar(9) NOT NULL,
                        `address` varchar(255) NOT NULL,
                        `environment_point` int(11) DEFAULT NULL,
                        `demand` int(11) NOT NULL,
                        `previous_owner` varchar(255) DEFAULT NULL,
                        `place_details` varchar(255) DEFAULT NULL,
                        `land_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`land_id`, `title`, `area`, `address`, `environment_point`, `demand`, `previous_owner`, `place_details`, `land_type`) VALUES
                                                                                                                                              (10101, 'Waterfront Development', '100000', '9101 Waterfront Way', 7, 8, 'Acme Inc.', 'Large waterfront property with potential for mixed-use development', 1),
                                                                                                                                              (10689, 'Garden View', '13000', '123 Main Street, Anytown, USA', 8, 7, 'John Smith', 'A beautiful piece of land with plenty of space for gardening and outdoor activities.', 0),
                                                                                                                                              (10701, 'Seaside Oasis', '35000', '456 Ocean Drive, Anytown, USA', 9, 9, NULL, 'A large piece of waterfront property with amazing views of the ocean and nearby mountains.', 1),
                                                                                                                                              (10742, 'Industrial Park', '450000', '789 Industrial Road, Anytown, USA', 9, 8, 'ABC Corporation', 'A massive parcel of land zoned for industrial use, with access to major highways and shipping routes.', 2),
                                                                                                                                              (10767, 'Forest Retreat', '200000', '555 Woodsy Lane, Anytown, USA', 7, 5, NULL, 'A secluded property surrounded by trees and wildlife, perfect for those who value peace and quiet.', 0),
                                                                                                                                              (10784, 'Downtown Development', '25000', '10 City Center, Anytown, USA', 8, 9, 'XYZ Developers', 'A prime piece of real estate in the heart of the city, ideal for mixed-use commercial and residential development.', 1),
                                                                                                                                              (10802, 'Rural Farmland', '500000', '987 Farm Road, Anytown, USA', 6, 4, 'Smith Family', 'A large agricultural property with fertile soil and ample water resources, suitable for farming or livestock operations.', 0),
                                                                                                                                              (10815, 'Beachfront Resort', '75000', '1234 Sandy Beach, Anytown, USA', 9, 9, 'Acme Hospitality', 'An expansive property located right on the beach, with potential for a luxurious resort or upscale housing development.', 1),
                                                                                                                                              (10832, 'Mountain Getaway', '100000', '567 Peak View, Anytown, USA', 7, 6, NULL, 'A secluded property high in the mountains, perfect for those who enjoy outdoor activities like hiking and skiing.', 0),
                                                                                                                                              (10849, 'Suburban Enclave', '50000', '123 Suburbia Way, Anytown, USA', 8, 7, 'Jones Family', 'A large tract of land located in a quiet suburban area, with easy access to nearby shopping and entertainment.', 0),
                                                                                                                                              (10850, 'Downtown Office Building', '50000', '100 Business Boulevard, Anytown, USA', 9, 9, 'ABC Enterprises', 'A prime piece of commercial real estate in the downtown area, with easy access to public transportation and other amenities.', 1),
                                                                                                                                              (10867, 'Residential Development', '1000000', '1234 New Neighborhood, Anytown, USA', 8, 8, 'XYZ Developers', 'A massive property zoned for residential development, with potential for hundreds of homes or apartments.', 0),
                                                                                                                                              (10884, 'Green Space', '50000', '456 Park Place, Anytown, USA', 9, 5, NULL, 'A small but valuable piece of land located in the heart of the city, perfect for a park or other public green space.', 0),
                                                                                                                                              (11006, 'Hill View Estate', '1800', '123 Main Street, Anytown, USA', 3, 8, 'John Doe', 'Beautiful hillside property with stunning views of the surrounding area. Perfect for a dream home.', 0),
                                                                                                                                              (11007, 'Riverside Retreat', '5000', '456 River Road, Anytown, USA', 1, 7, NULL, 'Large riverfront property with plenty of space for outdoor activities. Ideal for a family or group retreat.', 0),
                                                                                                                                              (11008, 'Downtown Commercial Lot', '10000', '789 Main Street, Anytown, USA', 5, 9, 'ABC Corp', 'Prime location in the heart of downtown. Perfect for a commercial development.', 1),
                                                                                                                                              (11009, 'Industrial Park Parcel', '25000', '10 Industrial Way, Anytown, USA', 6, 6, NULL, 'Spacious industrial lot with easy access to major highways. Ideal for a manufacturing or distribution center.', 2),
                                                                                                                                              (11010, 'Seaside Condo Site', '5000', '123 Beach Boulevard, Anytown, USA', 8, 8, NULL, 'Beautiful oceanfront property with plans for a luxury condominium complex. Amazing views and prime location.', 0),
                                                                                                                                              (11011, 'Meadowland Estate', '10000', '456 Country Lane, Anytown, USA', 9, 7, 'Jane Smith', 'Spectacular estate property with acres of rolling meadows and mature trees. Ideal for a private retreat or family compound.', 0),
                                                                                                                                              (11012, 'Hudson Riverfront Property', '15000', '789 River Road, Anytown, USA', 10, 8, 'XYZ LLC', 'Stunning riverfront property with incredible views and plenty of space for outdoor activities. Perfect for a waterfront development.', 1),
                                                                                                                                              (11013, 'Mixed-Use Downtown Lot', '5000', '10 Main Street, Anytown, USA', 7, 9, NULL, 'Prime downtown location with a mix of commercial and residential zoning. Ideal for a mixed-use development.', 1),
                                                                                                                                              (11014, 'Rural Farmstead', '20000', '123 Farm Road, Anytown, USA', 8, 6, 'John Doe', 'Expansive property with a large farmhouse and plenty of acreage for farming or ranching. Ideal for a family seeking a rural lifestyle.', 0),
                                                                                                                                              (11015, 'Highway Commercial Lot', '10000', '456 Highway 1, Anytown, USA', 6, 10, 'ABC Corp', 'Prime commercial location with easy access to major highways. Ideal for a retail or restaurant development.', 1),
                                                                                                                                              (11112, 'Green Valley', '4500', '123 Green Valley Road', 9, 8, 'John Doe', 'Beautiful land with lots of trees and a creek running through it', 0),
                                                                                                                                              (12043, 'Industrial Park', '500000', '500 Industrial Blvd, Houston, TX', 5, 8, NULL, 'This is a large industrial park with easy access to highways and railroads.', 2),
                                                                                                                                              (12345, 'Coastal Breeze', '2000', '1234 Ocean Blvd, Malibu, CA 90265', 8, 10, 'John Doe', 'A beautiful beachfront property with a stunning view of the Pacific Ocean', 0),
                                                                                                                                              (12346, 'Warehouse District', '100000', '10 Warehouse Ave, Chicago, IL 60608', 4, 8, 'ABC Company', 'A large industrial property located in a bustling warehouse district', 2),
                                                                                                                                              (22223, 'Ocean View', '6000', '456 Ocean View Drive', 7, 9, NULL, 'Breathtaking views of the ocean, perfect for a beach house', 0),
                                                                                                                                              (22368, 'Airport Land', '1000000', '100 Airport Rd, Dallas, TX', 4, 10, 'Smith Enterprises', 'This land is located adjacent to the airport and is perfect for an aviation-related business.', 2),
                                                                                                                                              (23109, 'Downtown Plaza', '100,000', '1000 Market St, San Francisco, CA', 7, 9, 'Johnson Enterprises', 'This is a prime commercial location in the heart of the city.', 1),
                                                                                                                                              (23456, 'Downtown Plaza', '10000', '456 Main St, Los Angeles, CA 90012', 6, 8, NULL, 'A prime location in the heart of the city, surrounded by shops and restaurants', 1),
                                                                                                                                              (33334, 'Sunset Fields', '12000', '789 Sunset Fields Lane', 5, 7, 'Mary Smith', 'Large open fields with stunning sunset views', 1),
                                                                                                                                              (34453, 'Main Street Retail', '20000', '800 Main St, Denver, CO', 8, 6, 'Jones Inc.', 'This is a prime retail location on Main Street with high foot traffic.', 1),
                                                                                                                                              (34567, 'Mountain View', '50000', '789 Mountain Rd, Aspen, CO 81611', 9, 7, 'Jane Smith', 'A large piece of land with a panoramic view of the Rocky Mountains', 0),
                                                                                                                                              (43021, 'Sunnyvale Farm', '25000', '1234 Main St, Sunnyvale, CA', 8, 6, NULL, 'This is a beautiful farm with a lot of sunshine and plenty of water.', 0),
                                                                                                                                              (44445, 'Lakefront Paradise', '8000', '101 Lakefront Drive', 8, 10, 'Robert Johnson', 'Prime lakefront property with private beach and dock', 1),
                                                                                                                                              (45678, 'Industrial Park', '200000', '1010 Industrial Blvd, Houston, TX 77002', 5, 9, 'Acme Corp', 'A vast area of flat land with easy access to major highways', 2),
                                                                                                                                              (55090, 'Oak Hill', '50000', '321 Oak Hill Dr, Austin, TX', 9, 5, 'Smith Family', 'This land has a stunning view of the hill country.', 0),
                                                                                                                                              (55556, 'Mountain Retreat', '10000', '234 Mountain Road', 10, 6, NULL, 'Secluded mountain land with incredible views, perfect for a cabin', 0),
                                                                                                                                              (56789, 'Ranch Retreat', '1000000', '1234 Ranch Rd, Santa Fe, NM 87505', 10, 6, NULL, 'A sprawling ranch with a rustic feel and plenty of open space', 0),
                                                                                                                                              (66667, 'Industrial Park', '50000', '567 Industrial Blvd', 6, 9, 'ABC Inc.', 'Large industrial lot with plenty of space for a factory or warehouse', 2),
                                                                                                                                              (67890, 'Beacon Hill', '5000', '56 Beacon St, Boston, MA 02108', 7, 8, 'Sarah Johnson', 'A historic property located in the heart of Beacon Hill', 1),
                                                                                                                                              (71235, 'Mountain Retreat', '100000', '5000 Mountain Rd, Boulder, CO', 9, 4, NULL, 'This land is nestled in the mountains and is perfect for building a secluded retreat.', 0),
                                                                                                                                              (77778, 'City Center Lot', '20000', '890 Main Street', 5, 10, 'XYZ Corp.', 'Prime location in the heart of the city, perfect for commercial development', 1),
                                                                                                                                              (78901, 'Riverfront Property', '100000', '345 River Rd, Savannah, GA 31419', 8, 9, 'Bill Thompson', 'A scenic property with a mile of river frontage', 0),
                                                                                                                                              (88056, 'Lake View', '10000', '2000 Lakeview Rd, Chicago, IL', 6, 7, 'Wilson Family', 'This land has a beautiful view of Lake Michigan and is perfect for building a lake house.', 0),
                                                                                                                                              (88889, 'Farm Land', '40000', '1234 Farm Road', 9, 7, 'Jane Smith', 'Fertile land with irrigation systems in place, great for farming', 0),
                                                                                                                                              (89012, 'Office Tower', '50000', '567 Main St, Dallas, TX 75202', 6, 10, 'XYZ Inc', 'A sleek and modern office tower in the heart of downtown', 1),
                                                                                                                                              (90123, 'Open Farmland', '500000', '999 County Rd, Des Moines, IA 50309', 7, 7, NULL, 'A vast expanse of open farmland, perfect for agriculture or development', 0),
                                                                                                                                              (99990, 'Forest Preserve', '800000', '5678 Forest Trail', 10, 5, NULL, 'Large forest preserve with hiking trails and nature reserves', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land_cost_info`
--

CREATE TABLE `land_cost_info` (
                                  `land_id` int(11) NOT NULL,
                                  `cost_per_sqft` int(11) NOT NULL,
                                  `relative_cost_value` int(11) NOT NULL,
                                  `previously_acquired` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `land_docs`
--

CREATE TABLE `land_docs` (
                             `land_id` int(11) DEFAULT NULL,
                             `registration_paper` blob DEFAULT NULL,
                             `government_permit` blob DEFAULT NULL,
                             `agreement` blob DEFAULT NULL,
                             `sale_deed` blob DEFAULT NULL,
                             `tax_pay_receipt` blob DEFAULT NULL,
                             `map_property` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
                         `user_nid` int(11) NOT NULL,
                         `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_nid`, `password`) VALUES
                                                 (111, 'l'),
                                                 (1234567, 'password'),
                                                 (1256789, 'password'),
                                                 (1423456, 'password'),
                                                 (2345678, 'password'),
                                                 (2913674, 'password'),
                                                 (3456789, 'password'),
                                                 (3490871, 'password'),
                                                 (4567890, 'password'),
                                                 (4768291, 'password'),
                                                 (5638094, 'password'),
                                                 (5678901, 'password'),
                                                 (6324781, 'password'),
                                                 (6789012, 'password'),
                                                 (7504926, 'password'),
                                                 (7890123, 'password'),
                                                 (8510273, 'password'),
                                                 (8749562, 'password'),
                                                 (8901234, 'password'),
                                                 (9012345, 'password'),
                                                 (9261057, 'password');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
                                  `nid` int(11) NOT NULL,
                                  `partner_nid` int(11) NOT NULL,
                                  `full_name` varchar(255) NOT NULL,
                                  `birth_certificate_no` varchar(10) NOT NULL,
                                  `passport_number` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`nid`, `partner_nid`, `full_name`, `birth_certificate_no`, `passport_number`) VALUES
    (6187283, 111, 'Spouse', '6768769878', '88756538');

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
                        `owner_id` int(11) DEFAULT NULL,
                        `land_id` int(11) NOT NULL,
                        `acquire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`owner_id`, `land_id`, `acquire_date`) VALUES
                                                               (6324781, 10101, '1972-10-14'),
                                                               (4567890, 10689, '1972-10-14'),
                                                               (2913674, 10701, '1973-06-25'),
                                                               (6789012, 10742, '1974-08-16'),
                                                               (4768291, 10767, '1974-08-16'),
                                                               (9012345, 10784, '1976-06-30'),
                                                               (2345678, 10802, '1976-06-30'),
                                                               (3490871, 10815, '1977-04-06'),
                                                               (1256789, 10832, '1978-01-09'),
                                                               (8901234, 10849, '1978-01-09'),
                                                               (8510273, 10850, '1979-03-23'),
                                                               (5678901, 10867, '1979-03-23'),
                                                               (5638094, 10884, '1981-07-11'),
                                                               (3456789, 11006, '1981-07-11'),
                                                               (9261057, 11007, '1983-02-12'),
                                                               (1234567, 11008, '1983-02-12'),
                                                               (1234567, 11009, '1985-09-08'),
                                                               (8510273, 11010, '1985-09-08'),
                                                               (2345678, 11011, '1986-09-24'),
                                                               (3490871, 11012, '1987-12-25'),
                                                               (3456789, 11013, '1987-12-25'),
                                                               (4567890, 11014, '1989-04-13'),
                                                               (2913674, 11015, '1991-05-19'),
                                                               (5678901, 11112, '1991-05-19'),
                                                               (9261057, 12043, '1993-10-29'),
                                                               (6789012, 12345, '1993-10-29'),
                                                               (6789012, 12346, '1994-11-12'),
                                                               (9012345, 22223, '1995-04-02'),
                                                               (7504926, 22368, '1995-04-02'),
                                                               (8901234, 23109, '1996-03-17'),
                                                               (3456789, 23456, '1996-03-17'),
                                                               (8510273, 33334, '1998-08-21'),
                                                               (8749562, 34453, '1998-08-21'),
                                                               (7890123, 34567, '2001-09-18'),
                                                               (5678901, 43021, '2001-09-18'),
                                                               (5638094, 44445, '2002-08-30'),
                                                               (4768291, 45678, '2004-07-07'),
                                                               (111, 55090, '2004-07-07'),
                                                               (111, 55556, '2005-10-20'),
                                                               (111, 56789, '2007-12-03'),
                                                               (111, 66667, '2007-12-03'),
                                                               (NULL, 67890, NULL),
                                                               (NULL, 71235, NULL),
                                                               (NULL, 77778, NULL),
                                                               (NULL, 78901, NULL),
                                                               (NULL, 88056, NULL),
                                                               (NULL, 88889, NULL),
                                                               (NULL, 89012, NULL),
                                                               (NULL, 90123, NULL),
                                                               (NULL, 99990, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
                           `payment_id` int(11) NOT NULL,
                           `buyer_nid` int(11) NOT NULL,
                           `land_id` int(11) NOT NULL,
                           `total_time` int(11) NOT NULL,
                           `paid_amount` int(11) DEFAULT NULL,
                           `due_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sell_list`
--

CREATE TABLE `sell_list` (
                             `amount` int(11) NOT NULL,
                             `user_id` int(11) DEFAULT NULL,
                             `land_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_list`
--

INSERT INTO `sell_list` (`amount`, `user_id`, `land_id`) VALUES
                                                             (30000, NULL, 67890),
                                                             (24000, NULL, 77778),
                                                             (123000, NULL, 78901),
                                                             (43600, NULL, 88056),
                                                             (12400, 4567890, 10689),
                                                             (235000, 2913674, 10701),
                                                             (134000, 6789012, 10742),
                                                             (12540, 4768291, 10767),
                                                             (1456200, 9012345, 10784),
                                                             (12400, 2345678, 10802),
                                                             (245100, 3490871, 10815),
                                                             (552410, 1256789, 10832),
                                                             (415600, 8901234, 10849),
                                                             (1000000, 8510273, 10850),
                                                             (129000, 5678901, 10867),
                                                             (1230000, 5638094, 10884),
                                                             (24600, 3456789, 11006),
                                                             (1257100, 9261057, 11007),
                                                             (12500, 1234567, 11008),
                                                             (1243100, 1234567, 11009),
                                                             (134200, 8510273, 11010),
                                                             (1324150, 2345678, 11011),
                                                             (142000, 3490871, 11012),
                                                             (1241500, 111, 55090),
                                                             (1542100, 111, 55556);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `nid` int(13) NOT NULL,
                        `full_name` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `phone_number` varchar(15) NOT NULL,
                        `date_of_birth` date NOT NULL,
                        `birth_certificate_number` varchar(10) NOT NULL,
                        `passport_number` varchar(9) DEFAULT NULL,
                        `address` varchar(255) NOT NULL,
                        `yearly_income` int(11) DEFAULT NULL,
                        `occupation` varchar(255) DEFAULT NULL,
                        `joined` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nid`, `full_name`, `email`, `phone_number`, `date_of_birth`, `birth_certificate_number`, `passport_number`, `address`, `yearly_income`, `occupation`, `joined`) VALUES
                                                                                                                                                                                         (111, 'Test User', 'a@a.a', '12345', '2023-04-02', '1234', '1234', 'address', 1234, 'abcd', '2023-04-02'),
                                                                                                                                                                                         (1234567, 'Alice Johnson', 'alice@example.com', '555-123-4567', '1995-03-12', '9876543210', '123456789', '123 Main St, Anytown USA', 50000, 'Software Engineer', '2023-04-03'),
                                                                                                                                                                                         (1256789, 'Samantha Johnson', 'samantha.johnson@example.com', '09123456789', '1990-07-12', '8129356074', '987654321', '123 Main St, Anytown USA', 75000, 'Software Engineer', '2023-04-03'),
                                                                                                                                                                                         (1423456, 'Jack Thompson', 'jack@example.com', '555-012-3456', '1999-10-03', '1472583690', '12345678', '159 Pine St, Anytown USA', 45000, 'Customer Service Representative', '2023-04-03'),
                                                                                                                                                                                         (2345678, 'Bob Smith', 'bob@example.com', '555-234-5678', '1988-08-05', '1357924680', '234567890', '456 Oak Ave, Anytown USA', 70000, 'Marketing Manager', '2023-04-03'),
                                                                                                                                                                                         (2913674, 'David Lee', 'david.lee@example.com', '09123456780', '1982-08-09', '6498127305', '334452618', '234 Elm St, Anytown USA', 95000, 'Software Developer', '2023-04-03'),
                                                                                                                                                                                         (3456789, 'Charlie Davis', 'charlie@example.com', '555-345-6789', '1993-11-22', '2468013579', '345678901', '789 Pine Rd, Anytown USA', 40000, 'Sales Representative', '2023-04-03'),
                                                                                                                                                                                         (3490871, 'Cameron Martinez', 'cameron.martinez@example.com', '09123456786', '1988-09-08', '9582460317', '369258147', '234 Elm St, Anytown USA', 90000, 'Product Manager', '2023-04-03'),
                                                                                                                                                                                         (4567890, 'David Lee', 'david@example.com', '555-456-7890', '1980-05-01', '3698521470', '456789012', '321 Elm St, Anytown USA', 90000, 'Product Manager', '2023-04-03'),
                                                                                                                                                                                         (4768291, 'Julia Perez', 'julia.perez@example.com', '09123456788', '1985-11-22', '4906035286', '246810975', '456 Oak Ave, Anytown USA', 80000, 'Marketing Manager', '2023-04-03'),
                                                                                                                                                                                         (5638094, 'Sophie Williams', 'sophie.williams@example.com', '09123456785', '1992-04-29', '2360954817', '864197530', '567 Pine Rd, Anytown USA', 55000, 'Teacher', '2023-04-03'),
                                                                                                                                                                                         (5678901, 'Emily Chang', 'emily@example.com', '555-567-8901', '1992-01-15', '4812162345', '567890123', '654 Cedar Blvd, Anytown USA', 55000, 'Graphic Designer', '2023-04-03'),
                                                                                                                                                                                         (6324781, 'Michael Scott', 'michael.scott@example.com', '09123456782', '1975-03-15', '5639048712', '951623784', '456 Oak Ave, Anytown USA', 120000, 'Regional Manager', '2023-04-03'),
                                                                                                                                                                                         (6789012, 'Frank Martinez', 'frank@example.com', '555-678-9012', '1985-09-29', '5937043218', '678901234', '987 Birch St, Anytown USA', 80000, 'Operations Manager', '2023-04-03'),
                                                                                                                                                                                         (7504926, 'Lucas Davis', 'lucas.davis@example.com', '09123456784', '1997-01-05', '3914570682', '753951628', '890 Cedar Blvd, Anytown USA', 45000, 'Server', '2023-04-03'),
                                                                                                                                                                                         (7890123, 'Grace Kim', 'grace@example.com', '555-789-0123', '1997-07-08', '7085963214', '789012345', '741 Olive Way, Anytown USA', 60000, 'Financial Analyst', '2023-04-03'),
                                                                                                                                                                                         (8510273, 'Ashley Wilson', 'ashley.wilson@example.com', '09123456781', '1991-11-17', '2874103956', '814923657', '789 Maple Ln, Anytown USA', 60000, 'Accountant', '2023-04-03'),
                                                                                                                                                                                         (8749562, 'Thomas Lee', 'thomas.lee@example.com', '09123456787', '1995-03-15', '7349810275', '135792468', '789 Maple Ln, Anytown USA', 65000, 'Sales Associate', '2023-04-03'),
                                                                                                                                                                                         (8901234, 'Henry Nguyen', 'henry@example.com', '555-890-1234', '1990-12-30', '8149273650', '890123456', '852 Maple Ave, Anytown USA', 75000, 'Software Developer', '2023-04-03'),
                                                                                                                                                                                         (9012345, 'Isabelle Davis', 'isabelle@example.com', '555-901-2345', '1987-04-17', '9364852701', '901234567', '963 Cherry St, Anytown USA', 65000, 'Human Resources Manager', '2023-04-03'),
                                                                                                                                                                                         (9261057, 'Emily Johnson', 'emily.johnson@example.com', '09123456783', '1994-06-03', '8710432569', '468135792', '123 Main St, Anytown USA', 70000, 'Graphic Designer', '2023-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_land_purchase`
--
ALTER TABLE `booked_land_purchase`
    ADD KEY `booked_land_purchase_user_nid_fk` (`potential_buyer_id`),
    ADD KEY `booked_land_purchase_user_nid_fk2` (`owner_id`),
    ADD KEY `booked_land_purchase_sell_list_land_id_fk` (`land_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
    ADD PRIMARY KEY (`booking_id`),
    ADD KEY `BOOKING_USER_nid_fk` (`booker_nid`),
    ADD KEY `BOOKING_LAND_land_id_fk` (`land_nid`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
    ADD PRIMARY KEY (`nid`),
    ADD KEY `parent_nid` (`parent_nid`);

--
-- Indexes for table `contact_anonymous`
--
ALTER TABLE `contact_anonymous`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment`
--
ALTER TABLE `installment`
    ADD PRIMARY KEY (`installment_id`),
    ADD KEY `INSTALLMENT_PAYMENT_payment_id_fk` (`payment_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
    ADD PRIMARY KEY (`land_id`);

--
-- Indexes for table `land_cost_info`
--
ALTER TABLE `land_cost_info`
    ADD KEY `land_id` (`land_id`);

--
-- Indexes for table `land_docs`
--
ALTER TABLE `land_docs`
    ADD KEY `of_land` (`land_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
    ADD KEY `user_nid` (`user_nid`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
    ADD PRIMARY KEY (`nid`),
    ADD KEY `partner_nid` (`partner_nid`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
    ADD KEY `OWNS_LAND_land_id_fk` (`land_id`),
    ADD KEY `OWNS_USER_nid_fk` (`owner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
    ADD PRIMARY KEY (`payment_id`),
    ADD KEY `PAYMENT_LAND_land_id_fk` (`land_id`),
    ADD KEY `PAYMENT_USER_nid_fk` (`buyer_nid`);

--
-- Indexes for table `sell_list`
--
ALTER TABLE `sell_list`
    ADD KEY `SELL_LIST_LAND_land_id_fk` (`land_id`),
    ADD KEY `SELL_LIST_USER_nid_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`nid`),
    ADD UNIQUE KEY `birth_certificate_number` (`birth_certificate_number`),
    ADD UNIQUE KEY `passport_number` (`passport_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_anonymous`
--
ALTER TABLE `contact_anonymous`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_land_purchase`
--
ALTER TABLE `booked_land_purchase`
    ADD CONSTRAINT `booked_land_purchase_sell_list_land_id_fk` FOREIGN KEY (`land_id`) REFERENCES `sell_list` (`land_id`),
    ADD CONSTRAINT `booked_land_purchase_user_nid_fk` FOREIGN KEY (`potential_buyer_id`) REFERENCES `user` (`nid`),
    ADD CONSTRAINT `booked_land_purchase_user_nid_fk2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`nid`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
    ADD CONSTRAINT `BOOKING_LAND_land_id_fk` FOREIGN KEY (`land_nid`) REFERENCES `land` (`land_id`),
    ADD CONSTRAINT `BOOKING_USER_nid_fk` FOREIGN KEY (`booker_nid`) REFERENCES `user` (`nid`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
    ADD CONSTRAINT `parent_nid` FOREIGN KEY (`parent_nid`) REFERENCES `user` (`nid`);

--
-- Constraints for table `installment`
--
ALTER TABLE `installment`
    ADD CONSTRAINT `INSTALLMENT_PAYMENT_payment_id_fk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `land_cost_info`
--
ALTER TABLE `land_cost_info`
    ADD CONSTRAINT `land_id` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`);

--
-- Constraints for table `land_docs`
--
ALTER TABLE `land_docs`
    ADD CONSTRAINT `of_land` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
    ADD CONSTRAINT `user_nid` FOREIGN KEY (`user_nid`) REFERENCES `user` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marital_status`
--
ALTER TABLE `marital_status`
    ADD CONSTRAINT `partner_nid` FOREIGN KEY (`partner_nid`) REFERENCES `user` (`nid`);

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
    ADD CONSTRAINT `OWNS_LAND_land_id_fk` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`),
    ADD CONSTRAINT `OWNS_USER_nid_fk` FOREIGN KEY (`owner_id`) REFERENCES `user` (`nid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
    ADD CONSTRAINT `PAYMENT_LAND_land_id_fk` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`),
    ADD CONSTRAINT `PAYMENT_USER_nid_fk` FOREIGN KEY (`buyer_nid`) REFERENCES `user` (`nid`);

--
-- Constraints for table `sell_list`
--
ALTER TABLE `sell_list`
    ADD CONSTRAINT `SELL_LIST_LAND_land_id_fk` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`),
    ADD CONSTRAINT `SELL_LIST_USER_nid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`nid`);
--
-- Database: `donation_plus`
--
CREATE DATABASE IF NOT EXISTS `donation_plus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `donation_plus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `a_id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `a_email` varchar(255) NOT NULL,
                         `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `a_email`, `a_password`) VALUES
    (1, 'admin0', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
                           `c_id` int(11) NOT NULL,
                           `c_email` varchar(255) NOT NULL,
                           `c_messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_email`, `c_messages`) VALUES
                                                            (5, 'farukbihan12@gmail.com', 'When will be the site properly working?'),
                                                            (6, 'hasankabir15@gmail.com', 'Please, make the website more user friendly.'),
                                                            (7, 'arrahman23@gmail.com', 'Adding some more categories will help people to donate according to their preferences.\r\n'),
                                                            (8, 'imtiazsakib218@gmail.com', 'Can i make several posts? Also can i post on behalf of others? '),
                                                            (9, 'dibosh@gmail.com', 'How can i get any confirmation about my donation? Or how will i be able to know i am supporting a real person?'),
                                                            (10, 'ninja@gmail.com', 'Hello, I can see many bugs on your website. Please !! try to fix it soon.'),
                                                            (14, 'admin@gmail.com', 'hi this is from admin'),
                                                            (15, 'imtiazsakib218@gmail.com', 'hello from userpanel');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
                        `p_id` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `category` varchar(255) NOT NULL,
                        `title` text NOT NULL,
                        `details` longtext NOT NULL,
                        `date` date NOT NULL,
                        `asking_amount` int(11) NOT NULL,
                        `collecting_amount` int(11) NOT NULL,
                        `image` text DEFAULT NULL,
                        `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `user_id`, `category`, `title`, `details`, `date`, `asking_amount`, `collecting_amount`, `image`, `status`) VALUES
                                                                                                                                            (68, 51, 'A', 'Fund for a cancer patient', 'Hasan has tumor is in his cheek, a rare location for a desmoid tumor. After surgery at CHOP, this 2-year-old has retained an impressive amount of facial muscle function. Also it was diagnosed with cancer. Help him to fight his cancer.', '2022-05-22', 49000, 1000, 'jpg', 1),
                                                                                                                                            (69, 51, 'A', 'Help out a family affected by Rana Plaza incident', 'Ahmed, a worker of Rana Plaza was affected by the devastating event that happened in 2013. His family never got the support from the authority. They are living a miserable life. They are fighting to survive the hardship of life. Help this family out to make their life easier. Your contribution can give them the new ray of hope. Please, I am requesting you to help this family.', '2022-05-15', 80000, 0, 'jpg', 1),
                                                                                                                                            (70, 51, 'A', 'Help me to bear the expense of a homeless child', 'I have always wanted to help a child in need. Which is the reason why I wanted to help karim to live a happy life. It is not likely that I am able to bear the full expense of a kid on my own because of financial problem. So, I am asking for your help to make the boys life more happier', '2022-05-20', 2000, 0, 'jpg', 1),
                                                                                                                                            (71, 51, 'A', 'A small starting business', 'Hi, I am an ordinary person working on a small business of mine. Help me to grow my business so that I can improve my work condition as well as grow my business.', '2022-05-21', 2500, 0, 'jpg', 1),
                                                                                                                                            (72, 51, 'A', 'House destroyed due to a storm', 'The storm oshoni destroyed my home. Currently, I am not in a situation to get out of this trouble without your help. I am begging you to feel sympathy and donate me to support my family', '2022-05-13', 50000, 0, 'webp', 1),
                                                                                                                                            (73, 52, 'A', 'An educational institute for the village children', 'I am from a village, Dakkhinkandi, Sylhet far southeast of Bangladesh. After completing my graduation, I was not interested in doing job rather wanted to teach the village children at the bare minimum educational cost. Though I can give the education free of cost, but cannot provide them the shelter to them so that they can learn without thinking about a roof on their head. I need your help to set up an institute for them. They are the ones who will show the new generation hope. Please show more your support in this cause', '2022-05-15', 20000, 550, 'jpg', 1),
                                                                                                                                            (74, 53, 'A', 'Save our domestic animals', 'Devastating flood has destroyed everything in our village which is in Sylhet. Although we managed to survive and find a  shelter. But we are out of foods and can not provide for our only means of survival , our cows. Please donate something so that we can provide them food.', '2022-05-12', 5500, 5500, 'webp', 1),
                                                                                                                                            (77, 55, 'A', 'Donation for flood affected people', 'Recently, we are facing a lot of natural disasters because of climate change. Our village which is located in Khulna, is affected by flood. People who has no way to get foods, shelter, medical support , are in need of your donation. Please help us to survive this natural disaster.', '2022-05-12', 40000, 0, 'webp', 0),
                                                                                                                                            (78, 55, 'A', 'Donation for a medical center', 'Our only place to get medical support is not well equipped with advance medical technology. Often when we need medical service, we have to go to near town to find doctors and get their service. Please donate us to get better medical services in our area.', '2022-05-23', 100000, 0, 'jpg', 0),
                                                                                                                                            (79, 60, 'A', 'Help for needy people', 'gs sgkjnalgkndlghslikfjnSLFHoifhldhflkdsf', '2022-12-15', 10000, 0, 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
                               `id` int(11) NOT NULL,
                               `donate_id` int(11) NOT NULL,
                               `u_id` int(11) NOT NULL,
                               `d_name` varchar(255) NOT NULL,
                               `d_email` varchar(255) NOT NULL,
                               `d_date` datetime NOT NULL DEFAULT current_timestamp(),
                               `d_amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `donate_id`, `u_id`, `d_name`, `d_email`, `d_date`, `d_amount`) VALUES
                                                                                                     (28, 68, 51, '', '', '2022-05-22 21:38:21', 500),
                                                                                                     (29, 68, 51, '', '', '2022-05-22 21:42:44', 500),
                                                                                                     (30, 74, 51, '', '', '2022-05-23 00:03:47', 300),
                                                                                                     (31, 74, 52, '', '', '2022-05-23 00:05:19', 700),
                                                                                                     (32, 74, 52, '', '', '2022-05-23 00:05:37', 4500),
                                                                                                     (33, 73, 57, '', '', '2022-05-23 13:19:49', 500),
                                                                                                     (34, 73, 58, '', '', '2022-11-05 20:22:27', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `name` varchar(255) DEFAULT NULL,
                        `email` varchar(255) DEFAULT NULL,
                        `address` varchar(255) DEFAULT NULL,
                        `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `password`) VALUES
                                                                      (51, 'Dibosh', 'dibosh123@gmail.com', '252/5,Dhanmondi', '70d25fc21046121149843b891a9e8b8a'),
                                                                      (52, 'Faruk', 'faruk23@gmail.com', '72,Sabujbagh', 'e508e6db4741e3dbb2827f943b2a5a28'),
                                                                      (53, 'Bihan', 'bihan35@gmail.com', '34,Banasree', '181231cfc6c125cfa5a9c0a5883ece95'),
                                                                      (54, 'Imtiaz', 'imtiaz77@gmail.com', '75/5, Motijheel', '445e693c83fc0be29121a92c76a931fb'),
                                                                      (55, 'Sakib', 'sakib45@gmail.com', '57,Ramna', '17c582a08c9d1170a593c8e3054bd8de'),
                                                                      (57, 'demo', 'demo123@gmail.com', '15,Dhanmondi', '7c0e1a7726444f2214e8ca4c497c1244'),
                                                                      (58, 'Dibosh', 'dibosh@gmail.com', '14,Dhanmondi', '2e0896aad603296bbbe280f6c0cafe15'),
                                                                      (59, 'faruk bihan', 'farukbihan@gmail.com', '14,Dhanmondi', '290870338fb8b31fdd2477a0aaaa774d'),
                                                                      (60, 'Dibosh Raj', 'draj@gmail.com', '13,Dhanmondi', '2e0896aad603296bbbe280f6c0cafe15'),
                                                                      (61, 'Hello', 'hello@hello.com', 'United International University, UIU Entrance', '99c505b8d298990012689e81d32d59e5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
    ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
    ADD PRIMARY KEY (`p_id`),
    ADD KEY `post_ibfk_1` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
    ADD PRIMARY KEY (`id`),
    ADD KEY `transaction_ibfk_1` (`donate_id`),
    ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
    MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
    MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
    MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
    ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
    ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`donate_id`) REFERENCES `post` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
                          `d_id` int(11) NOT NULL,
                          `d_name` varchar(255) DEFAULT NULL,
                          `d_designation` varchar(255) DEFAULT NULL,
                          `address` varchar(255) NOT NULL,
                          `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
                           `p_id` int(11) NOT NULL,
                           `p_name` varchar(255) NOT NULL,
                           `p_diseases` varchar(255) DEFAULT NULL,
                           `supervisor_doctor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_History`
--

CREATE TABLE `patient_History` (
                                   `details` varchar(255) DEFAULT NULL,
                                   `d_id` int(11) DEFAULT NULL,
                                   `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
                           `Pnumber` int(11) NOT NULL,
                           `Pname` varchar(255) DEFAULT NULL,
                           `cost` int(11) DEFAULT NULL,
                           `p_id` int(11) DEFAULT NULL,
                           `d_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
    ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
    ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `patient_History`
--
ALTER TABLE `patient_History`
    ADD KEY `d_id` (`d_id`),
    ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
    ADD PRIMARY KEY (`Pnumber`),
    ADD KEY `p_id` (`p_id`),
    ADD KEY `d_id` (`d_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_History`
--
ALTER TABLE `patient_History`
    ADD CONSTRAINT `patient_history_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`),
    ADD CONSTRAINT `patient_history_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
    ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`),
    ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`);
--
-- Database: `hr_schema`
--
CREATE DATABASE IF NOT EXISTS `hr_schema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hr_schema`;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
                             `country_id` char(2) NOT NULL,
                             `country_name` varchar(40) DEFAULT NULL,
                             `region_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `region_id`) VALUES
                                                                        ('AR', 'bangladesh', 2),
                                                                        ('AU', 'Australia', 3),
                                                                        ('BE', 'Belgium', 1),
                                                                        ('BR', 'Brazil', 2),
                                                                        ('CA', 'Canada', 2),
                                                                        ('CH', 'Switzerland', 1),
                                                                        ('CN', 'China', 3),
                                                                        ('DE', 'Germany', 1),
                                                                        ('DK', 'Denmark', 1),
                                                                        ('EG', 'Egypt', 4),
                                                                        ('FR', 'France', 1),
                                                                        ('HK', 'HongKong', 3),
                                                                        ('IL', 'Israel', 4),
                                                                        ('IN', 'India', 3),
                                                                        ('IT', 'Italy', 1),
                                                                        ('JP', 'Japan', 3),
                                                                        ('KW', 'Kuwait', 4),
                                                                        ('MX', 'Mexico', 2),
                                                                        ('NG', 'Nigeria', 4),
                                                                        ('NL', 'Netherlands', 1),
                                                                        ('SG', 'Singapore', 3),
                                                                        ('UK', 'United Kingdom', 1),
                                                                        ('US', 'United States of America', 2),
                                                                        ('ZM', 'Zambia', 4),
                                                                        ('ZW', 'Zimbabwe', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
                               `department_id` int(11) UNSIGNED NOT NULL,
                               `department_name` varchar(30) NOT NULL,
                               `manager_id` int(11) UNSIGNED DEFAULT NULL,
                               `location_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `manager_id`, `location_id`) VALUES
                                                                                                (10, 'Administration', 200, 1700),
                                                                                                (20, 'Marketing', 201, 1800),
                                                                                                (30, 'Purchasing', 114, 1700),
                                                                                                (40, 'Human Resources', 203, 2400),
                                                                                                (50, 'Shipping', 121, 1500),
                                                                                                (60, 'IT', 103, 1400),
                                                                                                (70, 'Public Relations', 204, 2700),
                                                                                                (80, 'Sales', 145, 2500),
                                                                                                (90, 'Executive', 100, 1700),
                                                                                                (100, 'Finance', 108, 1700),
                                                                                                (110, 'Accounting', 205, 1700),
                                                                                                (120, 'Treasury', NULL, 1700),
                                                                                                (130, 'Corporate Tax', NULL, 1700),
                                                                                                (140, 'Control And Credit', NULL, 1700),
                                                                                                (150, 'Shareholder Services', NULL, 1700),
                                                                                                (160, 'Benefits', NULL, 1700),
                                                                                                (170, 'Manufacturing', NULL, 1700),
                                                                                                (180, 'Construction', NULL, 1700),
                                                                                                (190, 'Contracting', NULL, 1700),
                                                                                                (200, 'Operations', NULL, 1700),
                                                                                                (210, 'IT Support', NULL, 1700),
                                                                                                (220, 'NOC', NULL, 1700),
                                                                                                (230, 'IT Helpdesk', NULL, 1700),
                                                                                                (240, 'Government Sales', NULL, 1700),
                                                                                                (250, 'Retail Sales', NULL, 1700),
                                                                                                (260, 'Recruiting', NULL, 1700),
                                                                                                (270, 'Payroll', NULL, 1700);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
                             `employee_id` int(11) UNSIGNED NOT NULL,
                             `first_name` varchar(20) DEFAULT NULL,
                             `last_name` varchar(25) NOT NULL,
                             `email` varchar(25) NOT NULL,
                             `phone_number` varchar(20) DEFAULT NULL,
                             `hire_date` date NOT NULL,
                             `job_id` varchar(10) NOT NULL,
                             `salary` decimal(8,2) NOT NULL,
                             `commission_pct` decimal(2,2) DEFAULT NULL,
                             `manager_id` int(11) UNSIGNED DEFAULT NULL,
                             `department_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `hire_date`, `job_id`, `salary`, `commission_pct`, `manager_id`, `department_id`) VALUES
                                                                                                                                                                                  (100, 'Steven', 'King', 'SKING', '515.123.4567', '1987-06-17', 'AD_PRES', '24000.00', NULL, NULL, 90),
                                                                                                                                                                                  (101, 'Neena', 'Kochhar', 'NKOCHHAR', '515.123.4568', '1989-09-21', 'AD_VP', '17000.00', NULL, 100, 90),
                                                                                                                                                                                  (102, 'Lex', 'De Haan', 'LDEHAAN', '515.123.4569', '1993-01-13', 'AD_VP', '17000.00', NULL, 100, 90),
                                                                                                                                                                                  (103, 'Alexander', 'Hunold', 'AHUNOLD', '590.423.4567', '1990-01-03', 'IT_PROG', '9000.00', NULL, 102, 60),
                                                                                                                                                                                  (104, 'Bruce', 'Ernst', 'BERNST', '590.423.4568', '1991-05-21', 'IT_PROG', '6000.00', NULL, 103, 60),
                                                                                                                                                                                  (105, 'David', 'Austin', 'DAUSTIN', '590.423.4569', '1997-06-25', 'IT_PROG', '4800.00', NULL, 103, 60),
                                                                                                                                                                                  (106, 'Valli', 'Pataballa', 'VPATABAL', '590.423.4560', '1998-02-05', 'IT_PROG', '4800.00', NULL, 103, 60),
                                                                                                                                                                                  (107, 'Diana', 'Lorentz', 'DLORENTZ', '590.423.5567', '1999-02-07', 'IT_PROG', '4200.00', NULL, 103, 60),
                                                                                                                                                                                  (108, 'Nancy', 'Greenberg', 'NGREENBE', '515.124.4569', '1994-08-17', 'FI_MGR', '12000.00', NULL, 101, 100),
                                                                                                                                                                                  (109, 'Daniel', 'Faviet', 'DFAVIET', '515.124.4169', '1994-08-16', 'FI_ACCOUNT', '9000.00', NULL, 108, 100),
                                                                                                                                                                                  (110, 'John', 'Chen', 'JCHEN', '515.124.4269', '1997-09-28', 'FI_ACCOUNT', '8200.00', NULL, 108, 100),
                                                                                                                                                                                  (111, 'Ismael', 'Sciarra', 'ISCIARRA', '515.124.4369', '1997-09-30', 'FI_ACCOUNT', '7700.00', NULL, 108, 100),
                                                                                                                                                                                  (112, 'Jose Manuel', 'Urman', 'JMURMAN', '515.124.4469', '1998-03-07', 'FI_ACCOUNT', '7800.00', NULL, 108, 100),
                                                                                                                                                                                  (113, 'Luis', 'Popp', 'LPOPP', '515.124.4567', '1999-12-07', 'FI_ACCOUNT', '6900.00', NULL, 108, 100),
                                                                                                                                                                                  (114, 'Den', 'Raphaely', 'DRAPHEAL', '515.127.4561', '1994-12-07', 'PU_MAN', '11000.00', NULL, 100, 30),
                                                                                                                                                                                  (115, 'Alexander', 'Khoo', 'AKHOO', '515.127.4562', '1995-05-18', 'PU_CLERK', '3100.00', NULL, 114, 30),
                                                                                                                                                                                  (116, 'Shelli', 'Baida', 'SBAIDA', '515.127.4563', '1997-12-24', 'PU_CLERK', '2900.00', NULL, 114, 30),
                                                                                                                                                                                  (117, 'Sigal', 'Tobias', 'STOBIAS', '515.127.4564', '1997-07-24', 'PU_CLERK', '2800.00', NULL, 114, 30),
                                                                                                                                                                                  (118, 'Guy', 'Himuro', 'GHIMURO', '515.127.4565', '1998-11-15', 'PU_CLERK', '2600.00', NULL, 114, 30),
                                                                                                                                                                                  (119, 'Karen', 'Colmenares', 'KCOLMENA', '515.127.4566', '1999-08-10', 'PU_CLERK', '2500.00', NULL, 114, 30),
                                                                                                                                                                                  (120, 'Matthew', 'Weiss', 'MWEISS', '650.123.1234', '1996-07-18', 'ST_MAN', '8000.00', NULL, 100, 50),
                                                                                                                                                                                  (121, 'Adam', 'Fripp', 'AFRIPP', '650.123.2234', '1997-04-10', 'ST_MAN', '8200.00', NULL, 100, 50),
                                                                                                                                                                                  (122, 'Payam', 'Kaufling', 'PKAUFLIN', '650.123.3234', '1995-05-01', 'ST_MAN', '7900.00', NULL, 100, 50),
                                                                                                                                                                                  (123, 'Shanta', 'Vollman', 'SVOLLMAN', '650.123.4234', '1997-10-10', 'ST_MAN', '6500.00', NULL, 100, 50),
                                                                                                                                                                                  (124, 'Kevin', 'Mourgos', 'KMOURGOS', '650.123.5234', '1999-11-16', 'ST_MAN', '5800.00', NULL, 100, 50),
                                                                                                                                                                                  (125, 'Julia', 'Nayer', 'JNAYER', '650.124.1214', '1997-07-16', 'ST_CLERK', '3200.00', NULL, 120, 50),
                                                                                                                                                                                  (126, 'Irene', 'Mikkilineni', 'IMIKKILI', '650.124.1224', '1998-09-28', 'ST_CLERK', '2700.00', NULL, 120, 50),
                                                                                                                                                                                  (127, 'James', 'Landry', 'JLANDRY', '650.124.1334', '1999-01-14', 'ST_CLERK', '2400.00', NULL, 120, 50),
                                                                                                                                                                                  (128, 'Steven', 'Markle', 'SMARKLE', '650.124.1434', '2000-03-08', 'ST_CLERK', '2200.00', NULL, 120, 50),
                                                                                                                                                                                  (129, 'Laura', 'Bissot', 'LBISSOT', '650.124.5234', '1997-08-20', 'ST_CLERK', '3300.00', NULL, 121, 50),
                                                                                                                                                                                  (130, 'Mozhe', 'Atkinson', 'MATKINSO', '650.124.6234', '1997-10-30', 'ST_CLERK', '2800.00', NULL, 121, 50),
                                                                                                                                                                                  (131, 'James', 'Marlow', 'JAMRLOW', '650.124.7234', '1997-02-16', 'ST_CLERK', '2500.00', NULL, 121, 50),
                                                                                                                                                                                  (132, 'TJ', 'Olson', 'TJOLSON', '650.124.8234', '1999-04-10', 'ST_CLERK', '2100.00', NULL, 121, 50),
                                                                                                                                                                                  (133, 'Jason', 'Mallin', 'JMALLIN', '650.127.1934', '1996-06-14', 'ST_CLERK', '3300.00', NULL, 122, 50),
                                                                                                                                                                                  (134, 'Michael', 'Rogers', 'MROGERS', '650.127.1834', '1998-08-26', 'ST_CLERK', '2900.00', NULL, 122, 50),
                                                                                                                                                                                  (135, 'Ki', 'Gee', 'KGEE', '650.127.1734', '1999-12-12', 'ST_CLERK', '2400.00', NULL, 122, 50),
                                                                                                                                                                                  (136, 'Hazel', 'Philtanker', 'HPHILTAN', '650.127.1634', '2000-02-06', 'ST_CLERK', '2200.00', NULL, 122, 50),
                                                                                                                                                                                  (137, 'Renske', 'Ladwig', 'RLADWIG', '650.121.1234', '1995-07-14', 'ST_CLERK', '3600.00', NULL, 123, 50),
                                                                                                                                                                                  (138, 'Stephen', 'Stiles', 'SSTILES', '650.121.2034', '1997-10-26', 'ST_CLERK', '3200.00', NULL, 123, 50),
                                                                                                                                                                                  (139, 'John', 'Seo', 'JSEO', '650.121.2019', '1998-02-12', 'ST_CLERK', '2700.00', NULL, 123, 50),
                                                                                                                                                                                  (140, 'Joshua', 'Patel', 'JPATEL', '650.121.1834', '1998-04-06', 'ST_CLERK', '2500.00', NULL, 123, 50),
                                                                                                                                                                                  (141, 'Trenna', 'Rajs', 'TRAJS', '650.121.8009', '1995-10-17', 'ST_CLERK', '3500.00', NULL, 124, 50),
                                                                                                                                                                                  (142, 'Curtis', 'Davies', 'CDAVIES', '650.121.2994', '1997-01-29', 'ST_CLERK', '3100.00', NULL, 124, 50),
                                                                                                                                                                                  (143, 'Randall', 'Matos', 'RMATOS', '650.121.2874', '1998-03-15', 'ST_CLERK', '2600.00', NULL, 124, 50),
                                                                                                                                                                                  (144, 'Peter', 'Vargas', 'PVARGAS', '650.121.2004', '1998-07-09', 'ST_CLERK', '2500.00', NULL, 124, 50),
                                                                                                                                                                                  (145, 'John', 'Russell', 'JRUSSEL', '011.44.1344.429268', '1996-10-01', 'SA_MAN', '14000.00', '0.40', 100, 80),
                                                                                                                                                                                  (146, 'Karen', 'Partners', 'KPARTNER', '011.44.1344.467268', '1997-01-05', 'SA_MAN', '13500.00', '0.30', 100, 80),
                                                                                                                                                                                  (147, 'Alberto', 'Errazuriz', 'AERRAZUR', '011.44.1344.429278', '1997-03-10', 'SA_MAN', '12000.00', '0.30', 100, 80),
                                                                                                                                                                                  (148, 'Gerald', 'Cambrault', 'GCAMBRAU', '011.44.1344.619268', '1999-10-15', 'SA_MAN', '11000.00', '0.30', 100, 80),
                                                                                                                                                                                  (149, 'Eleni', 'Zlotkey', 'EZLOTKEY', '011.44.1344.429018', '2000-01-29', 'SA_MAN', '10500.00', '0.20', 100, 80),
                                                                                                                                                                                  (150, 'Peter', 'Tucker', 'PTUCKER', '011.44.1344.129268', '1997-01-30', 'SA_REP', '10000.00', '0.30', 145, 80),
                                                                                                                                                                                  (151, 'David', 'Bernstein', 'DBERNSTE', '011.44.1344.345268', '1997-03-24', 'SA_REP', '9500.00', '0.25', 145, 80),
                                                                                                                                                                                  (152, 'Peter', 'Hall', 'PHALL', '011.44.1344.478968', '1997-08-20', 'SA_REP', '9000.00', '0.25', 145, 80),
                                                                                                                                                                                  (153, 'Christopher', 'Olsen', 'COLSEN', '011.44.1344.498718', '1998-03-30', 'SA_REP', '8000.00', '0.20', 145, 80),
                                                                                                                                                                                  (154, 'Nanette', 'Cambrault', 'NCAMBRAU', '011.44.1344.987668', '1998-12-09', 'SA_REP', '7500.00', '0.20', 145, 80),
                                                                                                                                                                                  (155, 'Oliver', 'Tuvault', 'OTUVAULT', '011.44.1344.486508', '1999-11-23', 'SA_REP', '7000.00', '0.15', 145, 80),
                                                                                                                                                                                  (156, 'Janette', 'King', 'JKING', '011.44.1345.429268', '1996-01-30', 'SA_REP', '10000.00', '0.35', 146, 80),
                                                                                                                                                                                  (157, 'Patrick', 'Sully', 'PSULLY', '011.44.1345.929268', '1996-03-04', 'SA_REP', '9500.00', '0.35', 146, 80),
                                                                                                                                                                                  (158, 'Allan', 'McEwen', 'AMCEWEN', '011.44.1345.829268', '1996-08-01', 'SA_REP', '9000.00', '0.35', 146, 80),
                                                                                                                                                                                  (159, 'Lindsey', 'Smith', 'LSMITH', '011.44.1345.729268', '1997-03-10', 'SA_REP', '8000.00', '0.30', 146, 80),
                                                                                                                                                                                  (160, 'Louise', 'Doran', 'LDORAN', '011.44.1345.629268', '1997-12-15', 'SA_REP', '7500.00', '0.30', 146, 80),
                                                                                                                                                                                  (161, 'Sarath', 'Sewall', 'SSEWALL', '011.44.1345.529268', '1998-11-03', 'SA_REP', '7000.00', '0.25', 146, 80),
                                                                                                                                                                                  (162, 'Clara', 'Vishney', 'CVISHNEY', '011.44.1346.129268', '1997-11-11', 'SA_REP', '10500.00', '0.25', 147, 80),
                                                                                                                                                                                  (163, 'Danielle', 'Greene', 'DGREENE', '011.44.1346.229268', '1999-03-19', 'SA_REP', '9500.00', '0.15', 147, 80),
                                                                                                                                                                                  (164, 'Mattea', 'Marvins', 'MMARVINS', '011.44.1346.329268', '2000-01-24', 'SA_REP', '7200.00', '0.10', 147, 80),
                                                                                                                                                                                  (165, 'David', 'Lee', 'DLEE', '011.44.1346.529268', '2000-02-23', 'SA_REP', '6800.00', '0.10', 147, 80),
                                                                                                                                                                                  (166, 'Sundar', 'Ande', 'SANDE', '011.44.1346.629268', '2000-03-24', 'SA_REP', '6400.00', '0.10', 147, 80),
                                                                                                                                                                                  (167, 'Amit', 'Banda', 'ABANDA', '011.44.1346.729268', '2000-04-21', 'SA_REP', '6200.00', '0.10', 147, 80),
                                                                                                                                                                                  (168, 'Lisa', 'Ozer', 'LOZER', '011.44.1343.929268', '1997-03-11', 'SA_REP', '11500.00', '0.25', 148, 80),
                                                                                                                                                                                  (169, 'Harrison', 'Bloom', 'HBLOOM', '011.44.1343.829268', '1998-03-23', 'SA_REP', '10000.00', '0.20', 148, 80),
                                                                                                                                                                                  (170, 'Tayler', 'Fox', 'TFOX', '011.44.1343.729268', '1998-01-24', 'SA_REP', '9600.00', '0.20', 148, 80),
                                                                                                                                                                                  (171, 'William', 'Smith', 'WSMITH', '011.44.1343.629268', '1999-02-23', 'SA_REP', '7400.00', '0.15', 148, 80),
                                                                                                                                                                                  (172, 'Elizabeth', 'Bates', 'EBATES', '011.44.1343.529268', '1999-03-24', 'SA_REP', '7300.00', '0.15', 148, 80),
                                                                                                                                                                                  (173, 'Sundita', 'Kumar', 'SKUMAR', '011.44.1343.329268', '2000-04-21', 'SA_REP', '6100.00', '0.10', 148, 80),
                                                                                                                                                                                  (174, 'Ellen', 'Abel', 'EABEL', '011.44.1644.429267', '1996-05-11', 'SA_REP', '11000.00', '0.30', 149, 80),
                                                                                                                                                                                  (175, 'Alyssa', 'Hutton', 'AHUTTON', '011.44.1644.429266', '1997-03-19', 'SA_REP', '8800.00', '0.25', 149, 80),
                                                                                                                                                                                  (176, 'Jonathon', 'Taylor', 'JTAYLOR', '011.44.1644.429265', '1998-03-24', 'SA_REP', '8600.00', '0.20', 149, 80),
                                                                                                                                                                                  (177, 'Jack', 'Livingston', 'JLIVINGS', '011.44.1644.429264', '1998-04-23', 'SA_REP', '8400.00', '0.20', 149, 80),
                                                                                                                                                                                  (178, 'Kimberely', 'Grant', 'KGRANT', '011.44.1644.429263', '1999-05-24', 'SA_REP', '7000.00', '0.15', 149, NULL),
                                                                                                                                                                                  (179, 'Charles', 'Johnson', 'CJOHNSON', '011.44.1644.429262', '2000-01-04', 'SA_REP', '6200.00', '0.10', 149, 80),
                                                                                                                                                                                  (180, 'Winston', 'Taylor', 'WTAYLOR', '650.507.9876', '1998-01-24', 'SH_CLERK', '3200.00', NULL, 120, 50),
                                                                                                                                                                                  (181, 'Jean', 'Fleaur', 'JFLEAUR', '650.507.9877', '1998-02-23', 'SH_CLERK', '3100.00', NULL, 120, 50),
                                                                                                                                                                                  (182, 'Martha', 'Sullivan', 'MSULLIVA', '650.507.9878', '1999-06-21', 'SH_CLERK', '2500.00', NULL, 120, 50),
                                                                                                                                                                                  (183, 'Girard', 'Geoni', 'GGEONI', '650.507.9879', '2000-02-03', 'SH_CLERK', '2800.00', NULL, 120, 50),
                                                                                                                                                                                  (184, 'Nandita', 'Sarchand', 'NSARCHAN', '650.509.1876', '1996-01-27', 'SH_CLERK', '4200.00', NULL, 121, 50),
                                                                                                                                                                                  (185, 'Alexis', 'Bull', 'ABULL', '650.509.2876', '1997-02-20', 'SH_CLERK', '4100.00', NULL, 121, 50),
                                                                                                                                                                                  (186, 'Julia', 'Dellinger', 'JDELLING', '650.509.3876', '1998-06-24', 'SH_CLERK', '3400.00', NULL, 121, 50),
                                                                                                                                                                                  (187, 'Anthony', 'Cabrio', 'ACABRIO', '650.509.4876', '1999-02-07', 'SH_CLERK', '3000.00', NULL, 121, 50),
                                                                                                                                                                                  (188, 'Kelly', 'Chung', 'KCHUNG', '650.505.1876', '1997-06-14', 'SH_CLERK', '3800.00', NULL, 122, 50),
                                                                                                                                                                                  (189, 'Jennifer', 'Dilly', 'JDILLY', '650.505.2876', '1997-08-13', 'SH_CLERK', '3600.00', NULL, 122, 50),
                                                                                                                                                                                  (190, 'Timothy', 'Gates', 'TGATES', '650.505.3876', '1998-07-11', 'SH_CLERK', '2900.00', NULL, 122, 50),
                                                                                                                                                                                  (191, 'Randall', 'Perkins', 'RPERKINS', '650.505.4876', '1999-12-19', 'SH_CLERK', '2500.00', NULL, 122, 50),
                                                                                                                                                                                  (192, 'Sarah', 'Bell', 'SBELL', '650.501.1876', '1996-02-04', 'SH_CLERK', '4000.00', NULL, 123, 50),
                                                                                                                                                                                  (193, 'Britney', 'Everett', 'BEVERETT', '650.501.2876', '1997-03-03', 'SH_CLERK', '3900.00', NULL, 123, 50),
                                                                                                                                                                                  (194, 'Samuel', 'McCain', 'SMCCAIN', '650.501.3876', '1998-07-01', 'SH_CLERK', '3200.00', NULL, 123, 50),
                                                                                                                                                                                  (195, 'Vance', 'Jones', 'VJONES', '650.501.4876', '1999-03-17', 'SH_CLERK', '2800.00', NULL, 123, 50),
                                                                                                                                                                                  (196, 'Alana', 'Walsh', 'AWALSH', '650.507.9811', '1998-04-24', 'SH_CLERK', '3100.00', NULL, 124, 50),
                                                                                                                                                                                  (197, 'Kevin', 'Feeney', 'KFEENEY', '650.507.9822', '1998-05-23', 'SH_CLERK', '3000.00', NULL, 124, 50),
                                                                                                                                                                                  (198, 'Donald', 'OConnell', 'DOCONNEL', '650.507.9833', '1999-06-21', 'SH_CLERK', '2600.00', NULL, 124, 50),
                                                                                                                                                                                  (199, 'Douglas', 'Grant', 'DGRANT', '650.507.9844', '2000-01-13', 'SH_CLERK', '2600.00', NULL, 124, 50),
                                                                                                                                                                                  (200, 'Jennifer', 'Whalen', 'JWHALEN', '515.123.4444', '1987-09-17', 'AD_ASST', '4400.00', NULL, 101, 10),
                                                                                                                                                                                  (201, 'Michael', 'Hartstein', 'MHARTSTE', '515.123.5555', '1996-02-17', 'MK_MAN', '13000.00', NULL, 100, 20),
                                                                                                                                                                                  (202, 'Pat', 'Fay', 'PFAY', '603.123.6666', '1997-08-17', 'MK_REP', '6000.00', NULL, 201, 20),
                                                                                                                                                                                  (203, 'Susan', 'Mavris', 'SMAVRIS', '515.123.7777', '1994-06-07', 'HR_REP', '6500.00', NULL, 101, 40),
                                                                                                                                                                                  (204, 'Hermann', 'Baer', 'HBAER', '515.123.8888', '1994-06-07', 'PR_REP', '10000.00', NULL, 101, 70),
                                                                                                                                                                                  (205, 'Shelley', 'Higgins', 'SHIGGINS', '515.123.8080', '1994-06-07', 'AC_MGR', '12000.00', NULL, 101, 110),
                                                                                                                                                                                  (206, 'William', 'Gietz', 'WGIETZ', '51hr5.123.8181', '1994-06-07', 'AC_ACCOUNT', '8300.00', NULL, 205, 110);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
                        `job_id` varchar(10) NOT NULL,
                        `job_title` varchar(35) NOT NULL,
                        `min_salary` decimal(8,0) UNSIGNED DEFAULT NULL,
                        `max_salary` decimal(8,0) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `min_salary`, `max_salary`) VALUES
                                                                           ('AC_ACCOUNT', 'Public Accountant', '4200', '9000'),
                                                                           ('AC_MGR', 'Accounting Manager', '8200', '16000'),
                                                                           ('AD_ASST', 'Administration Assistant', '3000', '6000'),
                                                                           ('AD_PRES', 'President', '20000', '40000'),
                                                                           ('AD_VP', 'Administration Vice President', '15000', '30000'),
                                                                           ('FI_ACCOUNT', 'Accountant', '4200', '9000'),
                                                                           ('FI_MGR', 'Finance Manager', '8200', '16000'),
                                                                           ('HR_REP', 'Human Resources Representative', '4000', '9000'),
                                                                           ('IT_PROG', 'Programmer', '4000', '10000'),
                                                                           ('MK_MAN', 'Marketing Manager', '9000', '15000'),
                                                                           ('MK_REP', 'Marketing Representative', '4000', '9000'),
                                                                           ('PR_REP', 'Public Relations Representative', '4500', '10500'),
                                                                           ('PU_CLERK', 'Purchasing Clerk', '2500', '5500'),
                                                                           ('PU_MAN', 'Purchasing Manager', '8000', '15000'),
                                                                           ('SA_MAN', 'Sales Manager', '10000', '20000'),
                                                                           ('SA_REP', 'Sales Representative', '6000', '12000'),
                                                                           ('SH_CLERK', 'Shipping Clerk', '2500', '5500'),
                                                                           ('ST_CLERK', 'Stock Clerk', '2000', '5000'),
                                                                           ('ST_MAN', 'Stock Manager', '5500', '8500');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
                               `employee_id` int(11) UNSIGNED NOT NULL,
                               `start_date` date NOT NULL,
                               `end_date` date NOT NULL,
                               `job_id` varchar(10) NOT NULL,
                               `department_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`employee_id`, `start_date`, `end_date`, `job_id`, `department_id`) VALUES
                                                                                                   (101, '1989-09-21', '1993-10-27', 'AC_ACCOUNT', 110),
                                                                                                   (101, '1993-10-28', '1997-03-15', 'AC_MGR', 110),
                                                                                                   (102, '1993-01-13', '1998-07-24', 'IT_PROG', 60),
                                                                                                   (114, '1998-03-24', '1999-12-31', 'ST_CLERK', 50),
                                                                                                   (122, '1999-01-01', '1999-12-31', 'ST_CLERK', 50),
                                                                                                   (176, '1998-03-24', '1998-12-31', 'SA_REP', 80),
                                                                                                   (176, '1999-01-01', '1999-12-31', 'SA_MAN', 80),
                                                                                                   (200, '1987-09-17', '1993-06-17', 'AD_ASST', 90),
                                                                                                   (200, '1994-07-01', '1998-12-31', 'AC_ACCOUNT', 90),
                                                                                                   (201, '1996-02-27', '1999-12-19', 'MK_REP', 20);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
                             `location_id` int(11) UNSIGNED NOT NULL,
                             `street_address` varchar(40) DEFAULT NULL,
                             `postal_code` varchar(12) DEFAULT NULL,
                             `city` varchar(30) NOT NULL,
                             `state_province` varchar(25) DEFAULT NULL,
                             `country_id` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `street_address`, `postal_code`, `city`, `state_province`, `country_id`) VALUES
                                                                                                                     (1000, '1297 Via Cola di Rie', '00989', 'Roma', NULL, 'IT'),
                                                                                                                     (1100, '93091 Calle della Testa', '10934', 'Venice', NULL, 'IT'),
                                                                                                                     (1200, '2017 Shinjuku-ku', '1689', 'Tokyo', 'Tokyo Prefecture', 'JP'),
                                                                                                                     (1300, '9450 Kamiya-cho', '6823', 'Hiroshima', NULL, 'JP'),
                                                                                                                     (1400, '2014 Jabberwocky Rd', '26192', 'Southlake', 'Texas', 'US'),
                                                                                                                     (1500, '2011 Interiors Blvd', '99236', 'South San Francisco', 'California', 'US'),
                                                                                                                     (1600, '2007 Zagora St', '50090', 'South Brunswick', 'New Jersey', 'US'),
                                                                                                                     (1700, '2004 Charade Rd', '98199', 'Seattle', 'Washington', 'US'),
                                                                                                                     (1800, '147 Spadina Ave', 'M5V 2L7', 'Toronto', 'Ontario', 'CA'),
                                                                                                                     (1900, '6092 Boxwood St', 'YSW 9T2', 'Whitehorse', 'Yukon', 'CA'),
                                                                                                                     (2000, '40-5-12 Laogianggen', '190518', 'Beijing', NULL, 'CN'),
                                                                                                                     (2100, '1298 Vileparle (E)', '490231', 'Bombay', 'Maharashtra', 'IN'),
                                                                                                                     (2200, '12-98 Victoria Street', '2901', 'Sydney', 'New South Wales', 'AU'),
                                                                                                                     (2300, '198 Clementi North', '540198', 'Singapore', NULL, 'SG'),
                                                                                                                     (2400, '8204 Arthur St', NULL, 'London', NULL, 'UK'),
                                                                                                                     (2500, 'Magdalen Centre, The Oxford Science Park', 'OX9 9ZB', 'Oxford', 'Oxford', 'UK'),
                                                                                                                     (2600, '9702 Chester Road', '09629850293', 'Stretford', 'Manchester', 'UK'),
                                                                                                                     (2700, 'Schwanthalerstr. 7031', '80925', 'Munich', 'Bavaria', 'DE'),
                                                                                                                     (2800, 'Rua Frei Caneca 1360 ', '01307-002', 'Sao Paulo', 'Sao Paulo', 'BR'),
                                                                                                                     (2900, '20 Rue des Corps-Saints', '1730', 'Geneva', 'Geneve', 'CH'),
                                                                                                                     (3000, 'Murtenstrasse 921', '3095', 'Bern', 'BE', 'CH'),
                                                                                                                     (3100, 'Pieter Breughelstraat 837', '3029SK', 'Utrecht', 'Utrecht', 'NL'),
                                                                                                                     (3200, 'Mariano Escobedo 9991', '11932', 'Mexico City', 'Distrito Federal,', 'MX');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
                           `region_id` int(11) UNSIGNED NOT NULL,
                           `region_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
                                                       (1, 'Europe'),
                                                       (2, 'Americas'),
                                                       (3, 'Asia'),
                                                       (4, 'Middle East and Africa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
    ADD PRIMARY KEY (`country_id`),
    ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
    ADD PRIMARY KEY (`department_id`),
    ADD KEY `location_id` (`location_id`),
    ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
    ADD PRIMARY KEY (`employee_id`),
    ADD KEY `job_id` (`job_id`),
    ADD KEY `department_id` (`department_id`),
    ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
    ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
    ADD UNIQUE KEY `employee_id` (`employee_id`,`start_date`),
    ADD KEY `job_id` (`job_id`),
    ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
    ADD PRIMARY KEY (`location_id`),
    ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
    ADD PRIMARY KEY (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
    MODIFY `location_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3201;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
    ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
    ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`),
    ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
    ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
    ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
    ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
    ADD CONSTRAINT `job_history_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
    ADD CONSTRAINT `job_history_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
    ADD CONSTRAINT `job_history_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
    ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
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
                                 `id` int(11) NOT NULL,
                                 `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
                                 `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
                                        `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                        `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                        `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
                                        `col_length` text COLLATE utf8_bin DEFAULT NULL,
                                        `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
                                        `col_isNull` tinyint(1) NOT NULL,
                                        `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
                                        `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
                                    `id` int(5) UNSIGNED NOT NULL,
                                    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
                                    `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
                                    `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
                                    `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
                                          `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                          `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
    ('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
                                         `id` int(5) UNSIGNED NOT NULL,
                                         `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
                                         `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
                                 `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                 `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
                                `id` bigint(20) UNSIGNED NOT NULL,
                                `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
                                `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
                                         `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                         `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
                                  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                  `page_nr` int(10) UNSIGNED NOT NULL,
                                  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
                               `username` varchar(64) COLLATE utf8_bin NOT NULL,
                               `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
    ('root', '[{\"db\":\"hr_schema\",\"table\":\"countries\"},{\"db\":\"hr_schema\",\"table\":\"departments\"},{\"db\":\"hr_schema\",\"table\":\"employees\"},{\"db\":\"dbms_project\",\"table\":\"OWNS\"},{\"db\":\"cse3522\",\"table\":\"USER\"},{\"db\":\"dbms_project\",\"table\":\"BOOKING\"},{\"db\":\"cse3522\",\"table\":\"LOGIN\"},{\"db\":\"hospital\",\"table\":\"payment\"},{\"db\":\"hospital\",\"table\":\"patient_History\"},{\"db\":\"hospital\",\"table\":\"patient\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
                                 `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                 `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
                                      `id` int(5) UNSIGNED NOT NULL,
                                      `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                      `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                      `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                      `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
                                     `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                     `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                     `pdf_page_number` int(11) NOT NULL DEFAULT 0,
                                     `x` float UNSIGNED NOT NULL DEFAULT 0,
                                     `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
                                   `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                   `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
                                   `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
                                      `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                      `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                      `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                      `prefs` text COLLATE utf8_bin NOT NULL,
                                      `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
    ('root', 'cse3522', 'USER', '{\"CREATE_TIME\":\"2023-03-18 22:47:00\",\"col_order\":[0,2,1,3,4,5,6,7],\"col_visib\":[1,1,1,1,1,1,1,1]}', '2023-03-19 11:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
                                 `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                 `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
                                 `version` int(10) UNSIGNED NOT NULL,
                                 `date_created` datetime NOT NULL,
                                 `date_updated` datetime NOT NULL,
                                 `schema_snapshot` text COLLATE utf8_bin NOT NULL,
                                 `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
                                 `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
                                 `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
                                 `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
                                   `username` varchar(64) COLLATE utf8_bin NOT NULL,
                                   `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                                   `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
    ('root', '2023-04-11 04:59:12', '{\"Console\\/Mode\":\"show\",\"ThemeDefault\":\"bootstrap\",\"NavigationWidth\":242,\"Console\\/Height\":281.9906250000000227373675443232059478759765625}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
                                   `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
                                   `tab` varchar(64) COLLATE utf8_bin NOT NULL,
                                   `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
                              `username` varchar(64) COLLATE utf8_bin NOT NULL,
                              `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Dumping data for table `pma__users`
--

INSERT INTO `pma__users` (`username`, `usergroup`) VALUES
    ('pma', '');

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
