-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_land_purchase`
--

CREATE TABLE `booked_land_purchase`
(
    `land_id`            int(11) NOT NULL,
    `potential_buyer_id` int(11) NOT NULL,
    `owner_id`           int(11) DEFAULT NULL,
    `booking_date`       date    DEFAULT curdate()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `booked_land_purchase`
--

INSERT INTO `booked_land_purchase` (`land_id`, `potential_buyer_id`, `owner_id`, `booking_date`)
VALUES (67890, 1423456, NULL, '2023-04-10'),
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

CREATE TABLE `booking`
(
    `booking_id`   int(11) NOT NULL,
    `booker_nid`   int(11) NOT NULL,
    `land_nid`     int(11) NOT NULL,
    `booking_date` date    NOT NULL,
    `duration`     int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children`
(
    `nid`                      int(11)      NOT NULL,
    `parent_nid`               int(11)      NOT NULL,
    `full_name`                varchar(255) NOT NULL,
    `passport_number`          varchar(9)  DEFAULT NULL,
    `phone_number`             varchar(11) DEFAULT NULL,
    `birth_certificate_number` varchar(10)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_anonymous`
--

CREATE TABLE `contact_anonymous`
(
    `id`           int(11)      NOT NULL,
    `full_name`    varchar(255)  DEFAULT NULL,
    `email`        varchar(255) NOT NULL,
    `phone_number` varchar(255)  DEFAULT NULL,
    `post`         varchar(1023) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `contact_anonymous`
--

INSERT INTO `contact_anonymous` (`id`, `full_name`, `email`, `phone_number`, `post`)
VALUES (11, 'Hello', 'hello@hello.hello', '12345678', 'Hello World');

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment`
(
    `installment_id` int(11) NOT NULL,
    `date`           date    NOT NULL DEFAULT curdate(),
    `amount`         int(11) NOT NULL,
    `payment_id`     int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land`
(
    `land_id`           int(11)      NOT NULL,
    `title`             varchar(255) DEFAULT NULL,
    `area`              varchar(9)   NOT NULL,
    `address`           varchar(255) NOT NULL,
    `environment_point` int(11)      DEFAULT NULL,
    `demand`            int(11)      NOT NULL,
    `previous_owner`    varchar(255) DEFAULT NULL,
    `place_details`     varchar(255) DEFAULT NULL,
    `land_type`         int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`land_id`, `title`, `area`, `address`, `environment_point`, `demand`, `previous_owner`,
                    `place_details`, `land_type`)
VALUES (10101, 'Waterfront Development', '100000', '9101 Waterfront Way', 7, 8, 'Acme Inc.',
        'Large waterfront property with potential for mixed-use development', 1),
       (10689, 'Garden View', '13000', '123 Main Street, Anytown, USA', 8, 7, 'John Smith',
        'A beautiful piece of land with plenty of space for gardening and outdoor activities.', 0),
       (10701, 'Seaside Oasis', '35000', '456 Ocean Drive, Anytown, USA', 9, 9, NULL,
        'A large piece of waterfront property with amazing views of the ocean and nearby mountains.', 1),
       (10742, 'Industrial Park', '450000', '789 Industrial Road, Anytown, USA', 9, 8, 'ABC Corporation',
        'A massive parcel of land zoned for industrial use, with access to major highways and shipping routes.', 2),
       (10767, 'Forest Retreat', '200000', '555 Woodsy Lane, Anytown, USA', 7, 5, NULL,
        'A secluded property surrounded by trees and wildlife, perfect for those who value peace and quiet.', 0),
       (10784, 'Downtown Development', '25000', '10 City Center, Anytown, USA', 8, 9, 'XYZ Developers',
        'A prime piece of real estate in the heart of the city, ideal for mixed-use commercial and residential development.',
        1),
       (10802, 'Rural Farmland', '500000', '987 Farm Road, Anytown, USA', 6, 4, 'Smith Family',
        'A large agricultural property with fertile soil and ample water resources, suitable for farming or livestock operations.',
        0),
       (10815, 'Beachfront Resort', '75000', '1234 Sandy Beach, Anytown, USA', 9, 9, 'Acme Hospitality',
        'An expansive property located right on the beach, with potential for a luxurious resort or upscale housing development.',
        1),
       (10832, 'Mountain Getaway', '100000', '567 Peak View, Anytown, USA', 7, 6, NULL,
        'A secluded property high in the mountains, perfect for those who enjoy outdoor activities like hiking and skiing.',
        0),
       (10849, 'Suburban Enclave', '50000', '123 Suburbia Way, Anytown, USA', 8, 7, 'Jones Family',
        'A large tract of land located in a quiet suburban area, with easy access to nearby shopping and entertainment.',
        0),
       (10850, 'Downtown Office Building', '50000', '100 Business Boulevard, Anytown, USA', 9, 9, 'ABC Enterprises',
        'A prime piece of commercial real estate in the downtown area, with easy access to public transportation and other amenities.',
        1),
       (10867, 'Residential Development', '1000000', '1234 New Neighborhood, Anytown, USA', 8, 8, 'XYZ Developers',
        'A massive property zoned for residential development, with potential for hundreds of homes or apartments.', 0),
       (10884, 'Green Space', '50000', '456 Park Place, Anytown, USA', 9, 5, NULL,
        'A small but valuable piece of land located in the heart of the city, perfect for a park or other public green space.',
        0),
       (11006, 'Hill View Estate', '1800', '123 Main Street, Anytown, USA', 3, 8, 'John Doe',
        'Beautiful hillside property with stunning views of the surrounding area. Perfect for a dream home.', 0),
       (11007, 'Riverside Retreat', '5000', '456 River Road, Anytown, USA', 1, 7, NULL,
        'Large riverfront property with plenty of space for outdoor activities. Ideal for a family or group retreat.',
        0),
       (11008, 'Downtown Commercial Lot', '10000', '789 Main Street, Anytown, USA', 5, 9, 'ABC Corp',
        'Prime location in the heart of downtown. Perfect for a commercial development.', 1),
       (11009, 'Industrial Park Parcel', '25000', '10 Industrial Way, Anytown, USA', 6, 6, NULL,
        'Spacious industrial lot with easy access to major highways. Ideal for a manufacturing or distribution center.',
        2),
       (11010, 'Seaside Condo Site', '5000', '123 Beach Boulevard, Anytown, USA', 8, 8, NULL,
        'Beautiful oceanfront property with plans for a luxury condominium complex. Amazing views and prime location.',
        0),
       (11011, 'Meadowland Estate', '10000', '456 Country Lane, Anytown, USA', 9, 7, 'Jane Smith',
        'Spectacular estate property with acres of rolling meadows and mature trees. Ideal for a private retreat or family compound.',
        0),
       (11012, 'Hudson Riverfront Property', '15000', '789 River Road, Anytown, USA', 10, 8, 'XYZ LLC',
        'Stunning riverfront property with incredible views and plenty of space for outdoor activities. Perfect for a waterfront development.',
        1),
       (11013, 'Mixed-Use Downtown Lot', '5000', '10 Main Street, Anytown, USA', 7, 9, NULL,
        'Prime downtown location with a mix of commercial and residential zoning. Ideal for a mixed-use development.',
        1),
       (11014, 'Rural Farmstead', '20000', '123 Farm Road, Anytown, USA', 8, 6, 'John Doe',
        'Expansive property with a large farmhouse and plenty of acreage for farming or ranching. Ideal for a family seeking a rural lifestyle.',
        0),
       (11015, 'Highway Commercial Lot', '10000', '456 Highway 1, Anytown, USA', 6, 10, 'ABC Corp',
        'Prime commercial location with easy access to major highways. Ideal for a retail or restaurant development.',
        1),
       (11112, 'Green Valley', '4500', '123 Green Valley Road', 9, 8, 'John Doe',
        'Beautiful land with lots of trees and a creek running through it', 0),
       (12043, 'Industrial Park', '500000', '500 Industrial Blvd, Houston, TX', 5, 8, NULL,
        'This is a large industrial park with easy access to highways and railroads.', 2),
       (12345, 'Coastal Breeze', '2000', '1234 Ocean Blvd, Malibu, CA 90265', 8, 10, 'John Doe',
        'A beautiful beachfront property with a stunning view of the Pacific Ocean', 0),
       (12346, 'Warehouse District', '100000', '10 Warehouse Ave, Chicago, IL 60608', 4, 8, 'ABC Company',
        'A large industrial property located in a bustling warehouse district', 2),
       (22223, 'Ocean View', '6000', '456 Ocean View Drive', 7, 9, NULL,
        'Breathtaking views of the ocean, perfect for a beach house', 0),
       (22368, 'Airport Land', '1000000', '100 Airport Rd, Dallas, TX', 4, 10, 'Smith Enterprises',
        'This land is located adjacent to the airport and is perfect for an aviation-related business.', 2),
       (23109, 'Downtown Plaza', '100,000', '1000 Market St, San Francisco, CA', 7, 9, 'Johnson Enterprises',
        'This is a prime commercial location in the heart of the city.', 1),
       (23456, 'Downtown Plaza', '10000', '456 Main St, Los Angeles, CA 90012', 6, 8, NULL,
        'A prime location in the heart of the city, surrounded by shops and restaurants', 1),
       (33334, 'Sunset Fields', '12000', '789 Sunset Fields Lane', 5, 7, 'Mary Smith',
        'Large open fields with stunning sunset views', 1),
       (34453, 'Main Street Retail', '20000', '800 Main St, Denver, CO', 8, 6, 'Jones Inc.',
        'This is a prime retail location on Main Street with high foot traffic.', 1),
       (34567, 'Mountain View', '50000', '789 Mountain Rd, Aspen, CO 81611', 9, 7, 'Jane Smith',
        'A large piece of land with a panoramic view of the Rocky Mountains', 0),
       (43021, 'Sunnyvale Farm', '25000', '1234 Main St, Sunnyvale, CA', 8, 6, NULL,
        'This is a beautiful farm with a lot of sunshine and plenty of water.', 0),
       (44445, 'Lakefront Paradise', '8000', '101 Lakefront Drive', 8, 10, 'Robert Johnson',
        'Prime lakefront property with private beach and dock', 1),
       (45678, 'Industrial Park', '200000', '1010 Industrial Blvd, Houston, TX 77002', 5, 9, 'Acme Corp',
        'A vast area of flat land with easy access to major highways', 2),
       (55090, 'Oak Hill', '50000', '321 Oak Hill Dr, Austin, TX', 9, 5, 'Smith Family',
        'This land has a stunning view of the hill country.', 0),
       (55556, 'Mountain Retreat', '10000', '234 Mountain Road', 10, 6, NULL,
        'Secluded mountain land with incredible views, perfect for a cabin', 0),
       (56789, 'Ranch Retreat', '1000000', '1234 Ranch Rd, Santa Fe, NM 87505', 10, 6, NULL,
        'A sprawling ranch with a rustic feel and plenty of open space', 0),
       (66667, 'Industrial Park', '50000', '567 Industrial Blvd', 6, 9, 'ABC Inc.',
        'Large industrial lot with plenty of space for a factory or warehouse', 2),
       (67890, 'Beacon Hill', '5000', '56 Beacon St, Boston, MA 02108', 7, 8, 'Sarah Johnson',
        'A historic property located in the heart of Beacon Hill', 1),
       (71235, 'Mountain Retreat', '100000', '5000 Mountain Rd, Boulder, CO', 9, 4, NULL,
        'This land is nestled in the mountains and is perfect for building a secluded retreat.', 0),
       (77778, 'City Center Lot', '20000', '890 Main Street', 5, 10, 'XYZ Corp.',
        'Prime location in the heart of the city, perfect for commercial development', 1),
       (78901, 'Riverfront Property', '100000', '345 River Rd, Savannah, GA 31419', 8, 9, 'Bill Thompson',
        'A scenic property with a mile of river frontage', 0),
       (88056, 'Lake View', '10000', '2000 Lakeview Rd, Chicago, IL', 6, 7, 'Wilson Family',
        'This land has a beautiful view of Lake Michigan and is perfect for building a lake house.', 0),
       (88889, 'Farm Land', '40000', '1234 Farm Road', 9, 7, 'Jane Smith',
        'Fertile land with irrigation systems in place, great for farming', 0),
       (89012, 'Office Tower', '50000', '567 Main St, Dallas, TX 75202', 6, 10, 'XYZ Inc',
        'A sleek and modern office tower in the heart of downtown', 1),
       (90123, 'Open Farmland', '500000', '999 County Rd, Des Moines, IA 50309', 7, 7, NULL,
        'A vast expanse of open farmland, perfect for agriculture or development', 0),
       (99990, 'Forest Preserve', '800000', '5678 Forest Trail', 10, 5, NULL,
        'Large forest preserve with hiking trails and nature reserves', 0);

-- --------------------------------------------------------

--
-- Table structure for table `land_cost_info`
--

CREATE TABLE `land_cost_info`
(
    `land_id`             int(11) NOT NULL,
    `cost_per_sqft`       int(11) NOT NULL,
    `relative_cost_value` int(11) NOT NULL,
    `previously_acquired` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_docs`
--

CREATE TABLE `land_docs`
(
    `land_id`            int(11) DEFAULT NULL,
    `registration_paper` blob    DEFAULT NULL,
    `government_permit`  blob    DEFAULT NULL,
    `agreement`          blob    DEFAULT NULL,
    `sale_deed`          blob    DEFAULT NULL,
    `tax_pay_receipt`    blob    DEFAULT NULL,
    `map_property`       blob    DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login`
(
    `user_nid` int(11)      NOT NULL,
    `password` varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_nid`, `password`)
VALUES (111, 'w'),
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
       (9261057, 'password'),
       (0, '');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status`
(
    `nid`                  int(11)      NOT NULL,
    `partner_nid`          int(11)      NOT NULL,
    `full_name`            varchar(255) NOT NULL,
    `birth_certificate_no` varchar(10)  NOT NULL,
    `passport_number`      varchar(9) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`nid`, `partner_nid`, `full_name`, `birth_certificate_no`, `passport_number`)
VALUES (6187283, 111, 'Spouse', '6768769878', '88756538');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news`
(
    `id`       int(11)       NOT NULL,
    `date`     date          NOT NULL DEFAULT curdate(),
    `title`    varchar(255)  NOT NULL,
    `subtitle` varchar(255)           DEFAULT NULL,
    `body`     varchar(1023) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `subtitle`, `body`)
VALUES (1, '2023-04-12', 'New land acquisition', 'Exciting opportunity for investors',
        'We are pleased to announce that our company has acquired a large tract of land in the prime location of XYZ. This presents a great opportunity for investors looking to capitalize on the booming real estate market in the area.'),
       (2, '2023-04-01', 'Land sale in progress', NULL,
        'We are currently in the process of selling a 10-acre parcel of land in ABC. The property has great potential for residential or commercial development and is priced competitively.'),
       (3, '2023-03-09', 'New zoning regulations', 'Important update for landowners',
        'The local government has recently implemented new zoning regulations that may affect the use of your land. We encourage all landowners to review these regulations and contact us if you have any questions or concerns.'),
       (4, '2023-04-03', 'Land conservation efforts', NULL,
        'As part of our commitment to environmental stewardship, we have partnered with a local conservation organization to protect a 50-acre tract of land from development. This land will remain untouched for generations to come.'),
       (5, '2023-04-02', 'New property listings', 'Check out our latest offerings',
        'We have just added several new properties to our inventory, including waterfront lots, farmland, and commercial parcels. Visit our website to view these listings and contact us for more information.'),
       (6, '2023-03-24', 'Upcoming land auction', 'Bid on your dream property',
        'We will be hosting a land auction next month featuring several prime properties in the area. Don\'t miss your chance to own your dream property.'),
       (7, '2023-03-31', 'Land survey update', 'Important information for landowners',
        'We have completed a new land survey of all the properties in our inventory. This will provide more accurate and detailed information to our clients.'),
       (8, '2023-04-01', 'New land development project', 'Building for the future',
        'We have recently begun a new land development project aimed at creating sustainable and eco-friendly communities. Stay tuned for updates and progress reports.'),
       (9, '2023-02-28', 'Land lease opportunities', 'Flexible options for landowners',
        'We are now offering flexible land lease options for landowners who wish to earn passive income from their properties. Contact us to learn more.'),
       (10, '2023-03-05', 'Land ownership rights', 'Know your rights as a landowner',
        'As a landowner, it is important to understand your rights and responsibilities. We have published a guide to help you navigate the complex world of land ownership and management'),
       (11, '2023-03-23', 'Land use policy changes', 'Impact on property owners',
        'The government has implemented new land use policies that may impact the way you can use your property. We encourage all property owners to review these policies and contact us if you have any questions.'),
       (12, '2023-03-27', 'Land management seminar', 'Learn from the experts',
        'We will be hosting a land management seminar next month featuring industry experts and professionals. This is a great opportunity to learn best practices and tips for managing your land.'),
       (13, '2023-03-24', 'Land appraisal services', 'Get an accurate valuation',
        'We are now offering land appraisal services to help property owners get an accurate valuation of their land. This is important for selling, leasing, or developing your property.'),
       (14, '2023-03-29', 'Land investment opportunities', 'Grow your wealth with land',
        'Investing in land can be a great way to diversify your portfolio and grow your wealth. We have several investment opportunities available, including raw land, farmland, and commercial properties.'),
       (15, '2023-04-16', 'Sustainable land management', 'Preserving the environment and maximizing profits',
        'We believe that sustainable land management is key to preserving the environment and maximizing profits. That\'s why we have implemented several eco-friendly practices and techniques in our land management approach.');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice`
(
    `id`    int(11)       NOT NULL,
    `title` varchar(255)  NOT NULL,
    `date`  date DEFAULT NULL,
    `body`  varchar(1023) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `body`)
VALUES (1, 'Office Closure', '2023-04-17',
        'Please note that our offices will be closed on Monday, May 1st in observance of Labor Day. We will resume normal business hours on Tuesday, May 2nd.'),
       (2, 'Server Maintenance', '2023-04-16',
        'We will be performing scheduled maintenance on our servers on Friday, May 5th from 10:00 PM to 12:00 AM. During this time, our website and services may experience brief periods of downtime. We apologize for any inconvenience.'),
       (3, 'New Property Listings', '2023-04-14',
        'We have just added several new properties to our inventory, including waterfront properties and commercial lots. Visit our website to view the full list and contact us if you\'re interested.'),
       (4, 'COVID-19 Update', '2023-04-13',
        'In light of the ongoing COVID-19 pandemic, we have implemented several safety measures and precautions to protect our staff and clients. This includes remote work options and virtual property viewings. Please contact us for more information.'),
       (5, 'Land Use Regulations', '2023-04-04',
        'Please be advised that there have been recent updates to land use regulations in the area. If you are planning to develop or use your property in any way, please review these regulations and contact us if you have any questions.'),
       (6, 'New Team Member', '2023-04-02',
        'We are excited to welcome Jane Doe to our team as our new land management specialist. Jane brings years of experience and expertise in the industry and we\'re confident she will be a valuable asset to our clients.'),
       (7, 'Emergency Contact Information', '2023-04-01',
        'In case of emergency, please note our updated contact information: Phone: (555) 123-4567, Email: emergency@landmanagement.com. Please save this information for future reference.'),
       (8, 'Land Preservation Initiative', '2023-03-17',
        'We are proud to announce our new land preservation initiative aimed at protecting and conserving natural areas and habitats. Contact us to learn more about how you can get involved.'),
       (9, 'Virtual Property Tours', '2023-04-11',
        'We now offer virtual property tours for all of our listings. This is a convenient and safe way to view properties from the comfort of your own home. Contact us to schedule a virtual tour today.'),
       (10, 'Landowner Association Meeting', '2023-03-31',
        'We will be hosting a landowner association meeting next week to discuss important topics related to land management and ownership. This is a great opportunity to network with other landowners and share insights and experiences.'),
       (11, 'Upcoming Auction', '2023-04-17',
        'We will be holding an auction for several prime properties next month. These properties are highly sought after and we expect a lot of interest. Contact us for more information on how to participate.'),
       (12, 'Landscaping Services', '2023-02-17',
        'We are now offering landscaping services for properties that we manage. This includes lawn care, tree trimming, and more. Contact us for more information on pricing and availability.'),
       (13, 'Road Maintenance', '2023-01-20',
        'We will be performing routine maintenance on the roads leading to several properties we manage next week. This may cause minor disruptions in access to these properties. We apologize for any inconvenience.'),
       (14, 'New Regulations for Solar Panels', '2023-02-16',
        'Please be advised that new regulations regarding the installation of solar panels on properties have been implemented. If you are interested in installing solar panels on your property, please contact us to learn more.'),
       (15, 'Environmental Impact Assessment', '2023-02-24',
        'We are conducting an environmental impact assessment for a new development project. This assessment will help us determine the potential effects of the project on the environment and inform our decision-making process. Contact us for more information on this project.');

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_projects`
--

CREATE TABLE `ongoing_projects`
(
    `title`     varchar(255) NOT NULL,
    `address`   varchar(255) NOT NULL,
    `finish_by` date         NOT NULL,
    `type`      int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `ongoing_projects`
--

INSERT INTO `ongoing_projects` (`title`, `address`, `finish_by`, `type`)
VALUES ('Downtown Commercial Plaza', '456 5th Ave, Downtown, NY 10018', '2022-09-30', 1),
       ('Industrial Park Expansion', '789 Industrial Blvd, Westside, TX 77002', '2024-06-30', 2),
       ('Riverview Residential', '246 Elm St, Riverview, FL 33569', '2023-10-31', 0),
       ('Corporate Office Building', '1010 Corporate Dr, Midtown, GA 30329', '2022-12-31', 1),
       ('Industrial Warehouse Expansion', '456 Warehouse Rd, Eastside, TX 77002', '2024-05-31', 2),
       ('Beachside Residential', '567 Beach Dr, Beachside, CA 90210', '2023-09-30', 0),
       ('Technology Park', '246 Tech Blvd, Tech City, TX 77002', '2024-07-31', 1),
       ('Lakeside Residential', '789 Lakeview Dr, Lakeside, OH 43440', '2023-08-31', 0),
       ('Manufacturing Plant Expansion', '456 Manufacturing Rd, Northside, TX 77002', '2024-04-30', 2),
       ('Medical Center Expansion', '789 Hospital Dr, Medical City, TX 77002', '2024-08-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns`
(
    `owner_id`     int(11) DEFAULT NULL,
    `land_id`      int(11) NOT NULL,
    `acquire_date` date    DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`owner_id`, `land_id`, `acquire_date`)
VALUES (6324781, 10101, '1972-10-14'),
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

CREATE TABLE `payment`
(
    `payment_id`  int(11) NOT NULL,
    `buyer_nid`   int(11) NOT NULL,
    `land_id`     int(11) NOT NULL,
    `total_time`  int(11) NOT NULL,
    `paid_amount` int(11) DEFAULT NULL,
    `due_time`    int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_list`
--

CREATE TABLE `sell_list`
(
    `amount`  int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `land_id` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `sell_list`
--

INSERT INTO `sell_list` (`amount`, `user_id`, `land_id`)
VALUES (30000, NULL, 67890),
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

CREATE TABLE `user`
(
    `nid`                      int(13)      NOT NULL,
    `full_name`                varchar(255) NOT NULL,
    `email`                    varchar(255) NOT NULL,
    `phone_number`             varchar(15)  NOT NULL,
    `date_of_birth`            date         NOT NULL,
    `birth_certificate_number` varchar(10)  DEFAULT NULL,
    `passport_number`          varchar(9)   DEFAULT NULL,
    `address`                  varchar(255) NOT NULL,
    `yearly_income`            int(11)      DEFAULT NULL,
    `occupation`               varchar(255) DEFAULT NULL,
    `joined`                   date         DEFAULT curdate()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nid`, `full_name`, `email`, `phone_number`, `date_of_birth`, `birth_certificate_number`,
                    `passport_number`, `address`, `yearly_income`, `occupation`, `joined`)
VALUES (0, '', '', '', '0000-00-00', '', '', '', 0, '', '2023-04-19'),
       (111, 'Oscar Issac Hernandez Estrada', 'a@a.a', '12345', '2023-04-02', '1234', '1234', 'address', 1234, 'abcd',
        '2023-04-02'),
       (1234567, 'Alice Johnson', 'alice@example.com', '555-123-4567', '1995-03-12', '9876543210', '123456789',
        '123 Main St, Anytown USA', 50000, 'Software Engineer', '2023-04-03'),
       (1256789, 'Samantha Johnson', 'samantha.johnson@example.com', '09123456789', '1990-07-12', '8129356074',
        '987654321', '123 Main St, Anytown USA', 75000, 'Software Engineer', '2023-04-03'),
       (1423456, 'Jack Thompson', 'jack@example.com', '555-012-3456', '1999-10-03', '1472583690', '12345678',
        '159 Pine St, Anytown USA', 45000, 'Customer Service Representative', '2023-04-03'),
       (2345678, 'Bob Smith', 'bob@example.com', '555-234-5678', '1988-08-05', '1357924680', '234567890',
        '456 Oak Ave, Anytown USA', 70000, 'Marketing Manager', '2023-04-03'),
       (2913674, 'David Lee', 'david.lee@example.com', '09123456780', '1982-08-09', '6498127305', '334452618',
        '234 Elm St, Anytown USA', 95000, 'Software Developer', '2023-04-03'),
       (3456789, 'Charlie Davis', 'charlie@example.com', '555-345-6789', '1993-11-22', '2468013579', '345678901',
        '789 Pine Rd, Anytown USA', 40000, 'Sales Representative', '2023-04-03'),
       (3490871, 'Cameron Martinez', 'cameron.martinez@example.com', '09123456786', '1988-09-08', '9582460317',
        '369258147', '234 Elm St, Anytown USA', 90000, 'Product Manager', '2023-04-03'),
       (4567890, 'David Lee', 'david@example.com', '555-456-7890', '1980-05-01', '3698521470', '456789012',
        '321 Elm St, Anytown USA', 90000, 'Product Manager', '2023-04-03'),
       (4768291, 'Julia Perez', 'julia.perez@example.com', '09123456788', '1985-11-22', '4906035286', '246810975',
        '456 Oak Ave, Anytown USA', 80000, 'Marketing Manager', '2023-04-03'),
       (5638094, 'Sophie Williams', 'sophie.williams@example.com', '09123456785', '1992-04-29', '2360954817',
        '864197530', '567 Pine Rd, Anytown USA', 55000, 'Teacher', '2023-04-03'),
       (5678901, 'Emily Chang', 'emily@example.com', '555-567-8901', '1992-01-15', '4812162345', '567890123',
        '654 Cedar Blvd, Anytown USA', 55000, 'Graphic Designer', '2023-04-03'),
       (6324781, 'Michael Scott', 'michael.scott@example.com', '09123456782', '1975-03-15', '5639048712', '951623784',
        '456 Oak Ave, Anytown USA', 120000, 'Regional Manager', '2023-04-03'),
       (6789012, 'Frank Martinez', 'frank@example.com', '555-678-9012', '1985-09-29', '5937043218', '678901234',
        '987 Birch St, Anytown USA', 80000, 'Operations Manager', '2023-04-03'),
       (7504926, 'Lucas Davis', 'lucas.davis@example.com', '09123456784', '1997-01-05', '3914570682', '753951628',
        '890 Cedar Blvd, Anytown USA', 45000, 'Server', '2023-04-03'),
       (7890123, 'Grace Kim', 'grace@example.com', '555-789-0123', '1997-07-08', '7085963214', '789012345',
        '741 Olive Way, Anytown USA', 60000, 'Financial Analyst', '2023-04-03'),
       (8510273, 'Ashley Wilson', 'ashley.wilson@example.com', '09123456781', '1991-11-17', '2874103956', '814923657',
        '789 Maple Ln, Anytown USA', 60000, 'Accountant', '2023-04-03'),
       (8749562, 'Thomas Lee', 'thomas.lee@example.com', '09123456787', '1995-03-15', '7349810275', '135792468',
        '789 Maple Ln, Anytown USA', 65000, 'Sales Associate', '2023-04-03'),
       (8901234, 'Henry Nguyen', 'henry@example.com', '555-890-1234', '1990-12-30', '8149273650', '890123456',
        '852 Maple Ave, Anytown USA', 75000, 'Software Developer', '2023-04-03'),
       (9012345, 'Isabelle Davis', 'isabelle@example.com', '555-901-2345', '1987-04-17', '9364852701', '901234567',
        '963 Cherry St, Anytown USA', 65000, 'Human Resources Manager', '2023-04-03'),
       (9261057, 'Emily Johnson', 'emily.johnson@example.com', '09123456783', '1994-06-03', '8710432569', '468135792',
        '123 Main St, Anytown USA', 70000, 'Graphic Designer', '2023-04-03');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
    ADD PRIMARY KEY (`id`);

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
    ADD UNIQUE KEY `user_pk` (`email`),
    ADD UNIQUE KEY `birth_certificate_number` (`birth_certificate_number`),
    ADD UNIQUE KEY `passport_number` (`passport_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_anonymous`
--
ALTER TABLE `contact_anonymous`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
