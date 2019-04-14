-- MySQL dump 10.13  Distrib 5.6.34, for Linux (x86_64)
--
-- Host: localhost    Database: appfuiua_rover
-- ------------------------------------------------------
-- Server version	5.6.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `check_in`
--

DROP TABLE IF EXISTS `check_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_in` (
  `user_name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lng` float(20,10) NOT NULL,
  `district` varchar(100) NOT NULL,
  `kml_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_in`
--

LOCK TABLES `check_in` WRITE;
/*!40000 ALTER TABLE `check_in` DISABLE KEYS */;
INSERT INTO `check_in` (`user_name`, `place`, `address`, `lat`, `lng`, `district`, `kml_link`) VALUES ('MUKTADIR ANZAN','Cox\'s Bazar Beach','',21.4235000610,91.9802017212,'Cox\'s Bazar','https://sites.google.com/site/muktadiranzan/kml_files/coxsbazar.kml?attredirects=0&d=1'),('MUKTADIR ANZAN','Lalbagh Fort','Lalbagh Rd, Dhaka',23.7194995880,90.3880996704,'Dhaka','https://sites.google.com/site/muktadiranzan/kml_files/dhaka.kml?attredirects=0&d=1'),('MUKTADIR ANZAN','Saint Martin','',20.6236991882,92.3234024048,'Cox\'s Bazar','https://sites.google.com/site/muktadiranzan/kml_files/coxsbazar.kml?attredirects=0&d=1'),('MUKTADIR ANZAN','Sajek','',23.3819923401,92.2938232422,'Khagrachari','https://sites.google.com/site/muktadiranzan/kml_files/khagrachari.kml?attredirects=0&d=1');
/*!40000 ALTER TABLE `check_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division_district_subdistrict`
--

DROP TABLE IF EXISTS `division_district_subdistrict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `division_district_subdistrict` (
  `division_name` varchar(100) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `subdistrict_name` varchar(100) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`division_name`,`district_name`,`subdistrict_name`),
  KEY `subdistrict_name` (`subdistrict_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division_district_subdistrict`
--

LOCK TABLES `division_district_subdistrict` WRITE;
/*!40000 ALTER TABLE `division_district_subdistrict` DISABLE KEYS */;
INSERT INTO `division_district_subdistrict` (`division_name`, `district_name`, `subdistrict_name`, `link`) VALUES ('Chittagong','Bandarban','AliKadam',NULL),('Chittagong','Bandarban','Bandarban',NULL),('Chittagong','Bandarban','Lama',NULL),('Chittagong','Bandarban','Naikhongchhari',NULL),('Chittagong','Bandarban','Rowangchhari',NULL),('Chittagong','Bandarban','Ruma',NULL),('Chittagong','Bandarban','Thanchi',NULL),('Chittagong','Brahmanbaria','Akhaura',NULL),('Chittagong','Brahmanbaria','Ashuganj',NULL),('Chittagong','Brahmanbaria','Bancharampur',NULL),('Chittagong','Brahmanbaria','Bijoynagar',NULL),('Chittagong','Brahmanbaria','Brahmanbaria Sadar',NULL),('Chittagong','Brahmanbaria','Kasba',NULL),('Chittagong','Brahmanbaria','Nabinagar',NULL),('Chittagong','Brahmanbaria','Nasirnagar',NULL),('Chittagong','Brahmanbaria','Sarail',NULL),('Chittagong','Chandpur','Chandpur Sadar',NULL),('Chittagong','Chandpur','Faridganj',NULL),('Chittagong','Chandpur','Haimchar',NULL),('Chittagong','Chandpur','Haziganj',NULL),('Chittagong','Chandpur','Kachua',NULL),('Chittagong','Chandpur','MatlabDakshin',NULL),('Chittagong','Chandpur','MatlabUttar',NULL),('Chittagong','Chandpur','Shahrasti',NULL),('Chittagong','Chittagong','Akbar Shah',NULL),('Chittagong','Chittagong','Anwara',NULL),('Chittagong','Chittagong','Bakolia',NULL),('Chittagong','Chittagong','Bandar',NULL),('Chittagong','Chittagong','Banshkhali',NULL),('Chittagong','Chittagong','Bayezid Bostami',NULL),('Chittagong','Chittagong','Boalkhali',NULL),('Chittagong','Chittagong','Chandanaish',NULL),('Chittagong','Chittagong','Chandgaon',NULL),('Chittagong','Chittagong','Chawkbazar',NULL),('Chittagong','Chittagong','Chittagong',NULL),('Chittagong','Chittagong','DoubleMooring',NULL),('Chittagong','Chittagong','EPZ',NULL),('Chittagong','Chittagong','Fatikchhari',NULL),('Chittagong','Chittagong','Halishahar',NULL),('Chittagong','Chittagong','Hathazari',NULL),('Chittagong','Chittagong','Khulshi',NULL),('Chittagong','Chittagong','Kotwali',NULL),('Chittagong','Chittagong','Lohagara',NULL),('Chittagong','Chittagong','Mirsharai',NULL),('Chittagong','Chittagong','Pahartali',NULL),('Chittagong','Chittagong','Panchlaish',NULL),('Chittagong','Chittagong','Patenga',NULL),('Chittagong','Chittagong','Patiya',NULL),('Chittagong','Chittagong','Rangunia',NULL),('Chittagong','Chittagong','Raozan',NULL),('Chittagong','Chittagong','Sadarghat',NULL),('Chittagong','Chittagong','Sandwip',NULL),('Chittagong','Chittagong','Satkania',NULL),('Chittagong','Chittagong','Sitakunda',NULL),('Chittagong','Comilla','Barura',NULL),('Chittagong','Comilla','Brahmanpara',NULL),('Chittagong','Comilla','Burichang',NULL),('Chittagong','Comilla','Chandina',NULL),('Chittagong','Comilla','Chauddagram',NULL),('Chittagong','Comilla','Comilla Adarsha Sadar',NULL),('Chittagong','Comilla','Comilla Sadar',NULL),('Chittagong','Comilla','Daudkandi',NULL),('Chittagong','Comilla','Debidwar',NULL),('Chittagong','Comilla','Homna',NULL),('Chittagong','Comilla','Laksam',NULL),('Chittagong','Comilla','Meghna',NULL),('Chittagong','Comilla','Monohargonj',NULL),('Chittagong','Comilla','Muradnagar',NULL),('Chittagong','Comilla','Nangalkot',NULL),('Chittagong','Comilla','Titas',NULL),('Chittagong','Cox\'s Bazar','Chakaria',NULL),('Chittagong','Cox\'s Bazar','Cox\'s Bazar',NULL),('Chittagong','Cox\'s Bazar','Kutubdia',NULL),('Chittagong','Cox\'s Bazar','Maheshkhali',NULL),('Chittagong','Cox\'s Bazar','Pekuam',NULL),('Chittagong','Cox\'s Bazar','Ramu',NULL),('Chittagong','Cox\'s Bazar','Teknaf',NULL),('Chittagong','Cox\'s Bazar','Ukhia',NULL),('Chittagong','Feni','Chhagalnaiya',NULL),('Chittagong','Feni','Daganbhuiyan',NULL),('Chittagong','Feni','Feni Sadar',NULL),('Chittagong','Feni','Fulgazi',NULL),('Chittagong','Feni','Parshuram',NULL),('Chittagong','Feni','Sonagazi',NULL),('Chittagong','Khagrachhari','Dighinala',NULL),('Chittagong','Khagrachhari','Khagrachhari',NULL),('Chittagong','Khagrachhari','Lakshmichhari',NULL),('Chittagong','Khagrachhari','Mahalchhari',NULL),('Chittagong','Khagrachhari','Manikchhari',NULL),('Chittagong','Khagrachhari','Matiranga',NULL),('Chittagong','Khagrachhari','Panchhari',NULL),('Chittagong','Khagrachhari','Ramgarh',NULL),('Chittagong','Lakshmipur','Kamalnagar',NULL),('Chittagong','Lakshmipur','Lakshmipur Sadar',NULL),('Chittagong','Lakshmipur','Raipur',NULL),('Chittagong','Lakshmipur','Ramganj',NULL),('Chittagong','Lakshmipur','Ramgati',NULL),('Chittagong','Noakhali','Begumganj',NULL),('Chittagong','Noakhali','Chatkhil',NULL),('Chittagong','Noakhali','Companiganj',NULL),('Chittagong','Noakhali','Hatiya',NULL),('Chittagong','Noakhali','Kabirhat',NULL),('Chittagong','Noakhali','Noakhali Sadar',NULL),('Chittagong','Noakhali','Senbagh',NULL),('Chittagong','Noakhali','Sonaimuri',NULL),('Chittagong','Noakhali','Subarnachar',NULL),('Chittagong','Rangamati','Baghaichhari',NULL),('Chittagong','Rangamati','Barkal',NULL),('Chittagong','Rangamati','Belaichhari',NULL),('Chittagong','Rangamati','Juraichhari',NULL),('Chittagong','Rangamati','Kaptai',NULL),('Chittagong','Rangamati','Kawkhali (Betbunia)',NULL),('Chittagong','Rangamati','Langadu',NULL),('Chittagong','Rangamati','Naniyachar',NULL),('Chittagong','Rangamati','Rajasthali',NULL),('Chittagong','Rangamati','Rangamati',NULL),('Dhaka','Dhaka','Adabor',NULL),('Dhaka','Dhaka','Badda',NULL),('Dhaka','Dhaka','Bangshal',NULL),('Dhaka','Dhaka','Biman Bandar',NULL),('Dhaka','Dhaka','Cantonment',NULL),('Dhaka','Dhaka','Chawkbazar Model',NULL),('Dhaka','Dhaka','Dakshinkhan',NULL),('Dhaka','Dhaka','Darus Salam',NULL),('Dhaka','Dhaka','Demra',NULL),('Dhaka','Dhaka','Dhamrai',NULL),('Dhaka','Dhaka','Dhanmondi',NULL),('Dhaka','Dhaka','Dohar',NULL),('Dhaka','Dhaka','Gendaria',NULL),('Dhaka','Dhaka','Gulshan',NULL),('Dhaka','Dhaka','Hazaribagh',NULL),('Dhaka','Dhaka','Jatrabari',NULL),('Dhaka','Dhaka','Kadamtali',NULL),('Dhaka','Dhaka','Kafrul',NULL),('Dhaka','Dhaka','Kalabagan',NULL),('Dhaka','Dhaka','Kamringir Char',NULL),('Dhaka','Dhaka','Keraniganj',NULL),('Dhaka','Dhaka','Khilgaon',NULL),('Dhaka','Dhaka','Khilkhet',NULL),('Dhaka','Dhaka','Kotwali',NULL),('Dhaka','Dhaka','Lalbagh',NULL),('Dhaka','Dhaka','Mirpur',NULL),('Dhaka','Dhaka','Mohakhali',NULL),('Dhaka','Dhaka','Mohammadpur',NULL),('Dhaka','Dhaka','Motijheel',NULL),('Dhaka','Dhaka','Nawabganj',NULL),('Dhaka','Dhaka','New Market',NULL),('Dhaka','Dhaka','Pallabi',NULL),('Dhaka','Dhaka','Paltan',NULL),('Dhaka','Dhaka','Ramna',NULL),('Dhaka','Dhaka','Rampura',NULL),('Dhaka','Dhaka','Sabujbagh',NULL),('Dhaka','Dhaka','Savar',NULL),('Dhaka','Dhaka','Shah Ali',NULL),('Dhaka','Dhaka','Shahbagh',NULL),('Dhaka','Dhaka','Shahjahanpur',NULL),('Dhaka','Dhaka','Sher-e-Bangla Nagor',NULL),('Dhaka','Dhaka','Shyampur',NULL),('Dhaka','Dhaka','Sutrapur',NULL),('Dhaka','Dhaka','Tejgaon',NULL),('Dhaka','Dhaka','Tejgaon Industrial Area',NULL),('Dhaka','Dhaka','Turag',NULL),('Dhaka','Dhaka','Uttar Khan',NULL),('Dhaka','Dhaka','Uttara',NULL),('Dhaka','Faridpur','Alfadanga',NULL),('Dhaka','Faridpur','Bhanga',NULL),('Dhaka','Faridpur','Boalmari',NULL),('Dhaka','Faridpur','Charbhadrasan',NULL),('Dhaka','Faridpur','Faridpur Sadar',NULL),('Dhaka','Faridpur','Madhukhali',NULL),('Dhaka','Faridpur','Nagarkanda',NULL),('Dhaka','Faridpur','Sadarpur',NULL),('Dhaka','Faridpur','Saltha',NULL),('Dhaka','Gazipur','Gazipur',NULL),('Dhaka','Gazipur','Kaliakair',NULL),('Dhaka','Gazipur','Kaliganj',NULL),('Dhaka','Gazipur','Kapasia',NULL),('Dhaka','Gazipur','Sreepur',NULL),('Dhaka','Gazipur','Tongi',NULL),('Dhaka','Gopalganj','Gopalganj Sadar',NULL),('Dhaka','Gopalganj','Kashiani',NULL),('Dhaka','Gopalganj','Kotalipara',NULL),('Dhaka','Gopalganj','Muksudpur',NULL),('Dhaka','Gopalganj','Tungipara',NULL),('Dhaka','Jamalpur','Baksiganj',NULL),('Dhaka','Jamalpur','Dewanganj',NULL),('Dhaka','Jamalpur','Islampur',NULL),('Dhaka','Jamalpur','Jamalpur Sadar',NULL),('Dhaka','Jamalpur','Madarganj',NULL),('Dhaka','Jamalpur','Melandaha',NULL),('Dhaka','Jamalpur','Sarishabari',NULL),('Dhaka','Kishoreganj','Astagram',NULL),('Dhaka','Kishoreganj','Bajitpur',NULL),('Dhaka','Kishoreganj','Bhairab',NULL),('Dhaka','Kishoreganj','Hossainpur',NULL),('Dhaka','Kishoreganj','Itna',NULL),('Dhaka','Kishoreganj','Karimganj',NULL),('Dhaka','Kishoreganj','Katiadi',NULL),('Dhaka','Kishoreganj','Kishorganj Sadar',NULL),('Dhaka','Kishoreganj','Kuliarchar',NULL),('Dhaka','Kishoreganj','Mithamain',NULL),('Dhaka','Kishoreganj','Nikli',NULL),('Dhaka','Kishoreganj','Pakundia',NULL),('Dhaka','Kishoreganj','Tarail',NULL),('Dhaka','Madaripur','Kalkini',NULL),('Dhaka','Madaripur','Madaripur Sadar',NULL),('Dhaka','Madaripur','Rajoir',NULL),('Dhaka','Madaripur','Shibchar',NULL),('Dhaka','Manikganj','Daulatpur',NULL),('Dhaka','Manikganj','Ghior',NULL),('Dhaka','Manikganj','Harirampur',NULL),('Dhaka','Manikganj','Manikgonj Sadar',NULL),('Dhaka','Manikganj','Saturia',NULL),('Dhaka','Manikganj','Shivalaya',NULL),('Dhaka','Manikganj','Singair',NULL),('Dhaka','Munshiganj','Gazaria',NULL),('Dhaka','Munshiganj','Lohajang',NULL),('Dhaka','Munshiganj','Munshiganj Sadar',NULL),('Dhaka','Munshiganj','Sirajdikhan',NULL),('Dhaka','Munshiganj','Sreenagar',NULL),('Dhaka','Munshiganj','Tongibari',NULL),('Dhaka','Mymenshing','Atpara',NULL),('Dhaka','Mymenshing','Barhatta',NULL),('Dhaka','Mymenshing','Bhaluka',NULL),('Dhaka','Mymenshing','Dhobaura',NULL),('Dhaka','Mymenshing','Durgapur',NULL),('Dhaka','Mymenshing','Fulbaria',NULL),('Dhaka','Mymenshing','Gaffargaon',NULL),('Dhaka','Mymenshing','Gauripur',NULL),('Dhaka','Mymenshing','Haluaghat',NULL),('Dhaka','Mymenshing','Ishwarganj',NULL),('Dhaka','Mymenshing','Kalmakanda',NULL),('Dhaka','Mymenshing','Kendua',NULL),('Dhaka','Mymenshing','Khaliajuri',NULL),('Dhaka','Mymenshing','Madan',NULL),('Dhaka','Mymenshing','Mohanganj',NULL),('Dhaka','Mymenshing','Muktagachha',NULL),('Dhaka','Mymenshing','Mymensingh Sadar',NULL),('Dhaka','Mymenshing','Nandail',NULL),('Dhaka','Mymenshing','Netrokona',NULL),('Dhaka','Mymenshing','Phulpur',NULL),('Dhaka','Mymenshing','Purbadhala',NULL),('Dhaka','Mymenshing','Trishal',NULL),('Dhaka','Narayanganj','Araihazar',NULL),('Dhaka','Narayanganj','Bandar',NULL),('Dhaka','Narayanganj','Fatullah',NULL),('Dhaka','Narayanganj','Naranyanganj',NULL),('Dhaka','Narayanganj','Rupganj',NULL),('Dhaka','Narayanganj','Siddirganj',NULL),('Dhaka','Narayanganj','Sonargaon',NULL),('Dhaka','Narsingdi','Belabo',NULL),('Dhaka','Narsingdi','Monohardi',NULL),('Dhaka','Narsingdi','Narsingdi Sadar',NULL),('Dhaka','Narsingdi','Palash',NULL),('Dhaka','Narsingdi','Raipura',NULL),('Dhaka','Narsingdi','Shibpur',NULL),('Dhaka','Netrokona','Atpara',NULL),('Dhaka','Netrokona','Barhatta',NULL),('Dhaka','Netrokona','Durgapur',NULL),('Dhaka','Netrokona','Kalmakanda',NULL),('Dhaka','Netrokona','Kendua',NULL),('Dhaka','Netrokona','Khaliajuri',NULL),('Dhaka','Netrokona','Madan',NULL),('Dhaka','Netrokona','Mohanganj',NULL),('Dhaka','Netrokona','Netrokona',NULL),('Dhaka','Netrokona','Purbadhala',NULL),('Dhaka','Rajbari','Baliakandi',NULL),('Dhaka','Rajbari','Goalandaghat',NULL),('Dhaka','Rajbari','Kalukhali',NULL),('Dhaka','Rajbari','Pangsha',NULL),('Dhaka','Rajbari','Rajbari Sadar',NULL),('Dhaka','Shariatpur','Bhedarganj',NULL),('Dhaka','Shariatpur','Damudya',NULL),('Dhaka','Shariatpur','Gosairhat',NULL),('Dhaka','Shariatpur','Naria',NULL),('Dhaka','Shariatpur','Sakhipur',NULL),('Dhaka','Shariatpur','Shariatpur Sadar',NULL),('Dhaka','Shariatpur','Zanjira',NULL),('Dhaka','Sherpur','Jhenaigati',NULL),('Dhaka','Sherpur','Nakla',NULL),('Dhaka','Sherpur','Nalitabari',NULL),('Dhaka','Sherpur','Sherpur Sadar',NULL),('Dhaka','Sherpur','Sreebardi',NULL),('Dhaka','Tangail','Basail',NULL),('Dhaka','Tangail','Bhuapur',NULL),('Dhaka','Tangail','Delduar',NULL),('Dhaka','Tangail','Dhanbari',NULL),('Dhaka','Tangail','Ghatail',NULL),('Dhaka','Tangail','Gopalpur',NULL),('Dhaka','Tangail','Kalihati',NULL),('Dhaka','Tangail','Madhupur',NULL),('Dhaka','Tangail','Mirzapur',NULL),('Dhaka','Tangail','Nagarpur',NULL),('Dhaka','Tangail','Sakhipur',NULL),('Dhaka','Tangail','Tangail Sadar',NULL);
/*!40000 ALTER TABLE `division_district_subdistrict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `facilities_id` varchar(30) NOT NULL,
  `facilities_name` varchar(100) NOT NULL,
  PRIMARY KEY (`facilities_id`,`facilities_name`),
  KEY `id` (`facilities_id`),
  CONSTRAINT `facilities_ibfk_2` FOREIGN KEY (`facilities_id`) REFERENCES `restaurent_hotel_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` (`facilities_id`, `facilities_name`) VALUES ('hotel1510159909492','cafe'),('hotel1510159909492','Gym'),('hotel1510159909492','Parking'),('hotel1510159909492','Private Beach'),('hotel1510159909492','Restaurent'),('hotel1510159909492','Spa'),('hotel1510159909492','Swimming pool'),('hotel1510159909493','24-hour front desk'),('hotel1510159909493','Air Condition'),('hotel1510159909493','Breakfast'),('hotel1510159909493','Car rental service'),('hotel1510159909493','Cleaning services'),('hotel1510159909493','Honeymoon'),('hotel1510159909493','Laundry'),('hotel1510159909493','Mountain view'),('hotel1510159909493','Parking'),('hotel1510159909493','Room service'),('hotel1510159909493','Sea view'),('hotel1510159909493','TV'),('hotel1510159909494','Airport Transfer'),('hotel1510159909494','Balcony'),('hotel1510159909494','BBQ'),('hotel1510159909494','Breakfast'),('hotel1510159909494','Cleaning services'),('hotel1510159909494','Dry cleaning'),('hotel1510159909494','Garden'),('hotel1510159909494','Gym'),('hotel1510159909494','Honeymoon'),('hotel1510159909494','Parking'),('hotel1510159909494','Restaurent'),('hotel1510159909494','Room service'),('hotel1510159909494','Swimming pool'),('hotel1510159909495','24-hour front desk'),('hotel1510159909495','Air Condition'),('hotel1510159909495','ATM'),('hotel1510159909495','Breakfast in the room'),('hotel1510159909495','Elevator'),('hotel1510159909495','Honeymoon'),('hotel1510159909495','Parking'),('hotel1510159909495','Restaurent'),('hotel1510159909495','Room service'),('hotel1510159909495','Soundproof rooms'),('hotel1510159909495','Ticket service'),('hotel1510159909495','Wifi'),('hotel1510159909498','24-hour front desk'),('hotel1510159909498','Airport Transfer'),('hotel1510159909498','Bar'),('hotel1510159909498','BBQ'),('hotel1510159909498','Breakfast'),('hotel1510159909498','Car rental service'),('hotel1510159909498','Elevator'),('hotel1510159909498','Honeymoon'),('hotel1510159909498','Laundry'),('hotel1510159909498','Parking'),('hotel1510159909498','Restaurent'),('hotel1510159909498','TV'),('hotel1510159909498','Wifi');
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `food_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `plate` binary(1) DEFAULT NULL,
  `piece` binary(1) DEFAULT NULL,
  `kg` binary(1) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_restaurents`
--

DROP TABLE IF EXISTS `food_restaurents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_restaurents` (
  `food_id` varchar(50) NOT NULL,
  `restaurent_id` varchar(50) NOT NULL,
  PRIMARY KEY (`food_id`,`restaurent_id`),
  KEY `restaurent_id` (`restaurent_id`),
  KEY `food_id` (`food_id`,`restaurent_id`),
  CONSTRAINT `food_restaurents_ibfk_3` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `food_restaurents_ibfk_4` FOREIGN KEY (`restaurent_id`) REFERENCES `restaurent_hotel_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_restaurents`
--

LOCK TABLES `food_restaurents` WRITE;
/*!40000 ALTER TABLE `food_restaurents` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_restaurents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_room`
--

DROP TABLE IF EXISTS `hotel_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_room` (
  `hotel_id` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`hotel_id`,`type`),
  KEY `hotel_id` (`hotel_id`),
  CONSTRAINT `hotel_room_ibfk_5` FOREIGN KEY (`hotel_id`) REFERENCES `restaurent_hotel_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_room`
--

LOCK TABLES `hotel_room` WRITE;
/*!40000 ALTER TABLE `hotel_room` DISABLE KEYS */;
INSERT INTO `hotel_room` (`hotel_id`, `type`, `price`) VALUES ('hotel1510159909492','Deluxe',6300),('hotel1510159909492','Honeymoon suite',40000),('hotel1510159909492','Regular double',5100),('hotel1510159909492','Regular suite',13500),('hotel1510159909493','Deluxe',3000),('hotel1510159909494','Deluxe',5000),('hotel1510159909494','Honeymoon suite',20000),('hotel1510159909494','Regular double',3000),('hotel1510159909494','Regular single',2000),('hotel1510159909494','Regular suite',17000),('hotel1510159909495','Deluxe Double Room',13500),('hotel1510159909495','Deluxe Quadruple Room',16500),('hotel1510159909495','Economy Quadruple Room',9740),('hotel1510159909495','Standard Double Room',8300),('hotel1510159909498','Deluxe',5500),('hotel1510159909498','Deluxe Triple',6500),('hotel1510159909498','Economy Deluxe',4000),('hotel1510159909498','Presidential Suite',40000),('hotel1510159909498','Sea Front Deluxe',7000),('hotel1510159909498','Sea Front Deluxe Supreme',7500);
/*!40000 ALTER TABLE `hotel_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `person_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`person_id`,`name`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`person_id`, `name`, `email`, `password`, `type`) VALUES ('person1512292405201','SAIF AHMED ANIK','saif@gmail.com','1234','user'),('person1512292922041','MUKTADIR ANZAN','anzan@gmail.com','1234','user'),('person1514721615473','ZAHID HOSSAIN','zahid@gmail.com','1234','user');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `district` varchar(100) NOT NULL,
  PRIMARY KEY (`place_id`),
  KEY `place_id` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` (`place_id`, `name`, `description`, `address`, `contact`, `website`, `lat`, `lng`, `district`) VALUES (1,'Bangladesh National Museum','The Bangladesh National Museum, originally established on 20 March 1913, albeit under another name, and formally inaugurated on 7 August 1913, was accorded the status of the national museum of Bangladesh on 17 November 1983.',NULL,'02-9667693','http://bangladeshmuseum.gov.bd/site/',23.737499,90.394402,'Dhaka'),(2,'Dhakeshwari Temple','Dhakeshwari National Temple is a Hindu temple in Dhaka, Bangladesh. It is state-owned, giving it the distinction of being Bangladesh\'s \'National Temple\'. The name \"Dhakeshwari\" means \"Goddess of Dhaka\".','Dhakeshwari Rd, Dhaka',NULL,NULL,23.723101,90.390099,'Dhaka'),(3,'Lalbagh Fort','Lalbagh Fort is an incomplete 17th century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.','Lalbagh Rd, Dhaka','02-58315954',NULL,23.719500,90.388100,'Dhaka'),(8,'Fantasy Kingdom',NULL,'Ashulia Highway, Jamgora, Savar 1345','01913-531387','www.fantasy-kingdom.net.bd',23.934999,90.292099,'Dhaka'),(9,'Nandan Park',NULL,'Baroipara','01755-667703','www.nandanpark.com/\r\n',24.030899,90.238899,'Dhaka'),(10,'Cox\'s Bazar Beach','Cox\'s Bazar Beach, located at Cox\'s Bazar, Bangladesh, is the longest unbroken sea beach in the world, running 120 kilometres. It is the top tourist destination of Bangladesh.',NULL,NULL,NULL,21.423500,91.980202,'Cox\'s Bazar'),(11,'Inani Beach','Inani Beach is an 18-kilometre-long sea beach in Ukhia Upazila of Cox\'s Bazar District, Bangladesh. It has a lot of coral stones, which are very sharp. These coral stones look black and green, and they are found in summer or rainy seasons.',NULL,NULL,NULL,21.229700,92.047501,''),(12,'Saint Martin','St. Martin\'s Island is a small island in the northeastern part of the Bay of Bengal, about 9 km south of the tip of the Cox\'s Bazar-Teknaf peninsula, and forming the southernmost part of Bangladesh.',NULL,NULL,NULL,20.623699,92.323402,'Cox\'s Bazar'),(13,'Sajek',NULL,NULL,NULL,NULL,23.381992,92.293823,'Khagrachari'),(14,'Himchori','Shallow waterfall located in a national park, popular for sunset views over the sea.','Marine Dr Himchori',NULL,NULL,21.354740,92.025711,'Cox\'s Bazar');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_type`
--

DROP TABLE IF EXISTS `place_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_type` (
  `place_id` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`place_id`,`type`),
  KEY `place_id` (`place_id`),
  CONSTRAINT `place_type_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `restaurent_hotel_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_type`
--

LOCK TABLES `place_type` WRITE;
/*!40000 ALTER TABLE `place_type` DISABLE KEYS */;
INSERT INTO `place_type` (`place_id`, `type`) VALUES ('place1510160114415','Museum'),('place1510160114416','Temple'),('place1510160114417','Museum'),('place1510160114422','Amusement Park'),('place1510160114423','Amusement Park'),('place1510160114424','sea'),('place1510160114424','Sunset'),('place1510160114425','sea'),('place1510160114426','Island'),('place1510160114426','sea'),('place1510160114427','Mountain'),('place1510160114428','Park'),('place1510160114428','Sea'),('place1510160114428','Sunset'),('place1510160114428','Waterfall'),('place1513506355619','Historical'),('place1513506507958','River'),('place1513506520733','Historical'),('place1513506529874','Historical'),('place1513506535847','River'),('place1513506542573','Sea'),('place1513506548803','Sea'),('place1513506566238','River'),('place1513506577956','Mosque'),('place1513521132727','Temple'),('place1513521143457','River'),('place1513540110438','River'),('place1513540119796','Shrine');
/*!40000 ALTER TABLE `place_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `person_id` varchar(30) NOT NULL,
  `restaurent_hotel_place_id` varchar(30) NOT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`person_id`,`restaurent_hotel_place_id`),
  KEY `person_id` (`person_id`,`restaurent_hotel_place_id`),
  KEY `rating_ibfk_2` (`restaurent_hotel_place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` (`person_id`, `restaurent_hotel_place_id`, `rating`) VALUES ('person1512292405201','place1510160114423',1),('person1512292405201','place1510160114417',4),('person1514721615473','place1510160114417',2),('person1512292405201','place1513540119796',3),('person1514721615473','place1510160114423',5);
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurent_hotel_place`
--

DROP TABLE IF EXISTS `restaurent_hotel_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurent_hotel_place` (
  `id` varchar(30) NOT NULL,
  `subdistrict_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `star` int(2) DEFAULT NULL,
  `rating` int(3) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `subdistrict_name` (`subdistrict_name`),
  CONSTRAINT `restaurent_hotel_place_ibfk_1` FOREIGN KEY (`subdistrict_name`) REFERENCES `division_district_subdistrict` (`subdistrict_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurent_hotel_place`
--

LOCK TABLES `restaurent_hotel_place` WRITE;
/*!40000 ALTER TABLE `restaurent_hotel_place` DISABLE KEYS */;
INSERT INTO `restaurent_hotel_place` (`id`, `subdistrict_name`, `name`, `type`, `star`, `rating`, `price`, `address`, `lat`, `lng`, `contact`, `website`, `description`) VALUES ('hotel1510159909492','Cox\'s Bazar','Seagull Hotel','Hotel',5,5,'8000','Soghundha Point, Hotel Motel Zone, Cox\'s Bazaar Sea Beach, Cox\'s Bazar',NULL,NULL,'0341-62480 ext. 90','http://www.seagullhotelbd.com/',NULL),('hotel1510159909493','Cox\'s Bazar','Hotel Beach Way','Hotel',3,4,'4200','House # 21, Block # C, Kolatoli Road, Cox\'s Bazar 4700',NULL,NULL,'01849-900000','http://www.hotelbeachway.com/',NULL),('hotel1510159909494','Cox\'s Bazar','Long Beach Hotel','Hotel',5,4,'3500','14 Kalatoli, Hotel-Motel Zone, 4700 Cox\'s Bazar, Bangladesh',NULL,NULL,'0341-51843','http://www.longbeachhotelbd.com/',NULL),('hotel1510159909495','Cox\'s Bazar','Saint Martin Resort','Hotel',5,3,'3200','Plot # 10, Block # A, Kolatoli Road, Cox\'s Bazar, 4700 Cox\'s Bazar, Bangladesh',NULL,NULL,'01819-809057','http://saintmartinresortbd.com/',NULL),('hotel1510159909498','Cox\'s Bazar','Hotel Sea Crown','Hotel',3,4,'5700','Marin Drive, Kola Toli, New Beach, 4700 Cox\'s Bazar, Bangladesh',NULL,NULL,'02-55068951','http://hotelseacrownbd.com/',NULL),('hotel1512331117531','Shahbagh','Pan Pacific Sonargaon Hotel','Hotel',5,5,'12,300','107 , Kazi Nazrul Islam Avenue Dhaka, Bangladesh',NULL,NULL,'+880 2 5502 8008',NULL,NULL),('hotel1512331126334','Lalbagh','Hotel Al Mamun','Hotel',2,2,'2300','31, Nazimuddin Road, Dhaka-1100',NULL,NULL,NULL,NULL,NULL),('hotel1512331136243','Saturia','Central Park','Hotel',2,2,'2100','Shah Khalilur Rahman Rd, Manikganj, Bangladesh',NULL,NULL,NULL,NULL,NULL),('hotel1512331142656','Gazipur','Dream Square Resort','Hotel',3,2,'3100','Chalkpara, Mauna, Gazipur',NULL,NULL,'+880 2-9334149',NULL,NULL),('hotel1512331150555','Gazipur','Megh Bari Resort','Hotel',2,3,'3700','Rayerda-ulukhola road, Gazipur',NULL,NULL,'01816-778364','www.meghbari.com',NULL),('hotel1512331159904','Shariatpur Sadar','Chandra Rest House','Hotel',2,2,'1800',NULL,NULL,NULL,NULL,NULL,NULL),('hotel1512331167580','Shariatpur Sadar','Noor Hotel International','Hotel',2,2,'3100','Sadar Road, beside Girls School',NULL,NULL,'0601-61461',NULL,NULL),('hotel1513273270700','Rangamati','Tribal Houses','Hotel',NULL,3,'2000',' Pukur Para or Pranjong Para ',NULL,NULL,'+88 01866 609991',NULL,NULL),('hotel1513273321636','Rangamati','Parjatan Holiday Complex','Hotel',NULL,4,'5000',' Hanging Bridge Rd, Rangamati',22.629330,92.187454,' +880 351-63126',NULL,NULL),('hotel1513273327214','Rangamati','Hotel Nadisa International','Hotel',NULL,4,'5000','New Bus Station, Reserve Bazar, Rangamati',22.650925,92.193687,'+88 01737 453545',NULL,NULL),('hotel1513273331431','Rangamati','Runmoy Resort','Hotel',NULL,4,'7000','Sajek BGB, Dighinala - Sajek Rd',23.389898,92.284019,'+880 1783-969200',NULL,NULL),('hotel1513273336095','Rangamati','Niribili Resort (Ruilui, SajeK)','Hotel',NULL,4,'4500','Under Rangamati Hill Tracts, Dighinala - Sajek Rd, Sajek 4590',23.385548,92.290382,'+880 1866-035825',NULL,NULL),('hotel1513273340130','Rangamati','Sajek Resort ','Hotel',NULL,4,'9000','Dighinala - Sajek Rd',23.382900,92.291382,'+880 1769-302370',NULL,NULL),('hotel1513273344655','Khagrachhari','Hotel Mount Inn','Hotel',NULL,4,'6300','College road,narikel bagan\nKhagrachari',23.110184,91.978790,'+880 371-62828',NULL,NULL),('hotel1513273350376','Khagrachhari','Khagrachari Parjatan Motel','Hotel',NULL,3,'3400','Parjatan Corporation\nKhagrachari (Near\nChengi Bridge)',23.103630,91.965324,'+88-0371-62084-5\n',NULL,NULL),('hotel1513273356681','Khagrachhari','Hotel Ecochari Inn','Hotel',NULL,4,'7000','Khagrapur,East gate of cantanment,Chittagong hill tracts\nKhagrachari',23.122927,91.989250,'+88-0371-62625,\n+88-0371-62626,\n+88-01828874014',NULL,NULL),('hotel1513273362522','Khagrachhari','Hotel Aronnyo Bilas','Hotel',NULL,3,'4300','Narikel Bagan Khagracchari Sadar',23.110168,91.979126,'0371-62526, 01765804949',NULL,NULL),('hotel1513273367358','Bandarban','Tribal Houses','Hotel',NULL,4,'2000','Boga Lake ',NULL,NULL,'',NULL,NULL),('hotel1513273371775','Bandarban',' Siyam Didi\'s Cottage','Hotel',NULL,4,'2300','Boga Lake',NULL,NULL,'01923491285',NULL,NULL),('hotel1513273376122','Bandarban','Tribal Houses','Hotel',NULL,3,'2500','Bogamukh Para, Boga Lake Para, Darjeeling Para',NULL,NULL,'01746981821',NULL,NULL),('hotel1513273380101','Bandarban','Nafakhum Guest House (Abashik)','Hotel',NULL,4,'3400','Remakri Bazar, Thanchi, Bandarban',21.678030,92.517067,'01557228640, 01857271725 (HLACHING MONG MARMA)',NULL,NULL),('hotel1513273385342','Bandarban','Tribal Houses','Hotel',NULL,3,'2100','Remakri Bazar, Thanchi, Bandarban',NULL,NULL,'01746981821',NULL,NULL),('hotel1513273389784','Cox\'s Bazar','Mermaid Beach Resort','Hotel',NULL,5,'9000','Pechar Dwip, Cox\'s Bazar Marine Drive Road',21.312189,92.040894,'+880 1841-416468',NULL,NULL),('hotel1513273393959','Cox\'s Bazar','Hotel Coastal Peace','Hotel',NULL,4,'5200','Plot # 6, Block # B., Cox\'s Bazar',21.423826,91.977974,'+880 1755-521726',NULL,NULL),('hotel1513273397745','Cox\'s Bazar','Long Beach Hotel Cox\'s Bazar','Hotel',NULL,4,'3500','14 Kalatoli, Cox\'s Bazar',21.425627,91.976135,' +880 341-51843',NULL,NULL),('hotel1513273401695','Cox\'s Bazar','Sayeman Beach Resort','Hotel',NULL,4,'4500','Sayeman Beach Resort, Marine Drive Road, Kolatali, Coxs Bazar',21.414209,91.982048,'+880 9610-777888',NULL,NULL),('hotel1513273406055','Cox\'s Bazar','Music Eco Resort','Hotel',NULL,3,'4100','Dokkhin Diyar Matha, Saint Martin\'s Island, 4762',20.590714,92.325058,'+880 1613-339696',NULL,NULL),('hotel1513273409301','Cox\'s Bazar','Coral View Resort, Saint Martin','Hotel',NULL,4,'5800','Bangladesh Navy Forward Base, Saint Martin, Cox\'s Bazar 4762',20.625179,92.324005,'+880 1980-004777',NULL,NULL),('hotel1513273412456','Cox\'s Bazar','Seemana Periye Resort','Hotel',NULL,3,'3600','Saint Martin Island, Teknaf, Cox\'s Bazar',20.626488,92.314865,'+880 1819-018027',NULL,NULL),('hotel1513273415922','Khulshi','Meridian Hotel & Restaurant','Hotel',NULL,5,'13500','1367 CDA Ave, Chittagong',22.359869,91.819771,' +880 31-652050',NULL,NULL),('hotel1513273419693','Chittagong','Hotel Favour Inn International ','Hotel',NULL,4,'7500','69,Station Road, Chittagong 4300',22.335623,91.825371,'+880 1811-446506',NULL,NULL),('hotel1513273425237','Chittagong','Asian SR Hotel','Hotel',NULL,3,'4100','291 Station Rd, Chittagong 4000, Bangladesh',22.335663,91.826683,'+880 1711-889555',NULL,NULL),('hotel1513273429843','Chittagong','The Peninsula Chittagong','Hotel',NULL,5,'14000',' Bulbul Center, 486/B CDA Ave, Chittagong 4000',22.357748,91.819702,'+880 1755-554555',NULL,NULL),('hotel1513273433696','Chittagong','Hotel Agrabad','Hotel',NULL,2,'1700','Sabdar Ali Rd, Chittagong',22.327087,91.813858,'+880 31-713311',NULL,NULL),('hotel1513273437298','Chittagong','Hotel Lord\'s Inn','Hotel',NULL,4,'11000','Hosna Kalam Complex, CDA Ave, Chittagong 4000, Bangladesh',22.362671,91.818558,'+880 312552671',NULL,NULL),('hotel1513273440974','Chittagong','Avenue Hotel & Suites','Hotel',NULL,3,'5700','Dhaka Chittagong Highway, Chittagong',22.347450,91.817810,'+880 31-627986',NULL,NULL),('hotel1513273444790','Chittagong','Well Park Residence','Hotel',NULL,3,'1100','Road # 01, Plot # 02, O.R. Nizam Road, GEC, 4000 , Bangladesh, Chittagong 4000, Bangladesh',22.359665,91.820984,' +880 31-657035',NULL,NULL),('hotel1513273449118','Chittagong','Radisson Blu Chittagong Bay View','Hotel',NULL,5,'13500','S S Khaled Road Lalkhan Bazar\nChittagong',22.348293,91.820290,'+88 031 619800 Ext. 4407\n+88 031 619855 Ext. 4407\n+88 01777701136 \n+88 01777701111 ',NULL,NULL),('place1510160114415','Shahbagh','Bangladesh National Museum','Place',NULL,0,NULL,NULL,23.737499,90.394402,'02-9667693','http://bangladeshmuseum.gov.bd/site/','The Bangladesh National Museum, originally established on 20 March 1913, albeit under another name, and formally inaugurated on 7 August 1913, was accorded the status of the national museum of Bangladesh on 17 November 1983.'),('place1510160114416','Lalbagh','Dhakeshwari Temple','Place',NULL,0,NULL,'Dhakeshwari Rd, Dhaka',23.719500,90.388100,NULL,NULL,'Dhakeshwari National Temple is a Hindu temple in Dhaka, Bangladesh. It is state-owned, giving it the distinction of being Bangladesh\'s \'National Temple\'. The name \"Dhakeshwari\" means \"Goddess of Dhaka\".'),('place1510160114417','Lalbagh','Lalbagh Fort','Place',NULL,0,NULL,'Lalbagh Rd, Dhaka',23.934999,90.292099,'02-58315954',NULL,'Lalbagh Fort is an incomplete 17th century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.'),('place1510160114422','Savar','Fantasy Kingdom','Place',NULL,0,NULL,'Ashulia Highway, Jamgora, Savar 1345',24.030899,90.238899,'01913-531387','www.fantasy-kingdom.net.bd',NULL),('place1510160114423','Kaliakair','Nandan Park','Place',NULL,0,NULL,'Baroipara',21.423500,91.980202,'01755-667703','www.nandanpark.com/\r\n',NULL),('place1510160114424','Cox\'s Bazar','Cox\'s Bazar Beach','Place',NULL,0,NULL,NULL,21.229700,92.047501,NULL,NULL,'Cox\'s Bazar Beach, located at Cox\'s Bazar, Bangladesh, is the longest unbroken sea beach in the world, running 120 kilometres. It is the top tourist destination of Bangladesh.'),('place1510160114425','Ukhia','Inani Beach','Place',NULL,0,NULL,NULL,20.623699,92.323402,NULL,NULL,'Inani Beach is an 18-kilometre-long sea beach in Ukhia Upazila of Cox\'s Bazar District, Bangladesh. It has a lot of coral stones, which are very sharp. These coral stones look black and green, and they are found in summer or rainy seasons.'),('place1510160114426','Teknaf','Saint Martin','Place',NULL,0,NULL,NULL,23.381992,92.293823,NULL,NULL,'St. Martin\'s Island is a small island in the northeastern part of the Bay of Bengal, about 9 km south of the tip of the Cox\'s Bazar-Teknaf peninsula, and forming the southernmost part of Bangladesh.'),('place1510160114427','Baghaichhari','Sajek','Place',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('place1510160114428','Cox\'s Bazar','Himchori','Place',NULL,0,NULL,'Marine Dr Himchori',21.354740,92.025711,NULL,NULL,'Shallow waterfall located in a national park, popular for sunset views over the sea.'),('place1512030237364','Lalbagh','Lalbagh Fort1','Place',NULL,0,NULL,'Lalbagh Rd, Dhaka',23.934999,90.292099,'02-58315954',NULL,'Lalbagh Fort is an incomplete 17th century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.'),('place1512030301077','Lalbagh','Lalbagh Fort2','Place',NULL,0,NULL,'Lalbagh Rd, Dhaka',23.934999,90.292099,'02-58315954',NULL,'Lalbagh Fort is an incomplete 17th century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.'),('place1512030326290','Lalbagh','Lalbagh Fort3','Place',NULL,0,NULL,'Lalbagh Rd, Dhaka',23.934999,90.292099,'02-58315954',NULL,'Lalbagh Fort is an incomplete 17th century Mughal fort complex that stands before the Buriganga River in the southwestern part of Dhaka, Bangladesh.'),('place1513506355619','Comilla Sadar','Shalban Buddha Bihar','Place',2,0,NULL,NULL,23.426245,91.137718,NULL,NULL,'Shalban Bihar is a tourist centre noted for antiquity. It is in Mainamati and is one of the best known Buddhist bihars in the Indian Subcontinent and also one of the most important archaeological sites in the country.'),('place1513506507958','Muradnagar','Gomoti Nodi','Place',2,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('place1513506520733','Comilla Adarsha Sadar','Kotila Mura','Place',2,0,NULL,NULL,23.460930,91.123497,NULL,NULL,'Kotila Mura is located in Comilla Adarsho Sadar Upazila in Comilla District. Locally the site is known as “Kotila Mura”. As a result of excavation mainly three stupas have been exposed side by side. The stupas are representing three jewels namely, the Buddha, Dharma and Sangha.'),('place1513506529874','Nabinagar','Sreeghar Moth','Place',2,0,NULL,NULL,NULL,NULL,NULL,NULL,'Sreeghar Moth - The monastery was constructed approximately 1941-42 by Zamindar Raj Chandra Nath. The British government gave the title of \"Bahadur\" to the orphan of this family. The Sriharan Karunami Charity Hospital was established under the initiative of the zamindari family. Currently it exists as a Sreeghar Sub-health Center'),('place1513506535847','Chandpur Sadar','Molhead','Place',2,0,NULL,NULL,NULL,NULL,NULL,NULL,'The triangular part of the confluence of Padma, Meghna and Dakatia, on the west side of Chandpur big station, is known as Molehead. From this place it is very clear to see the sunset in the west horizon. The English word Molehead means a sturdy wall or embankment constructed by stone concrete to protect ground ground due to shocking wave shock. It is built by Boulder to protect the Chandpur city from the strong current of Padma-Meghna-Dakatia  and the Vortex by the Bangladesh Water Development Board. This pleasant place is Chandpur\'s best natural entertainment spot.'),('place1513506542573','Chittagong','Patenga Beach','Place',2,0,NULL,NULL,22.235989,91.786812,NULL,NULL,'Patenga is a popular tourist spot. The beach is very close to the Bangladesh Naval Academy of the Bangladesh Navy and Shah Amanat International Airport. Its width is narrow and swimming in the seas is not recommended. Part of the seashore is built-up with concrete walls, and large blocks of stones have been laid to prevent erosion. During the 1990s, a host of restaurants and kiosks sprouted out around the beach area. Lighting of the area has enhanced the security aspect of visiting at night.'),('place1513506548803','Anwara','Parki Beach','Place',2,0,NULL,NULL,22.197973,91.805473,NULL,NULL,'Parki Beach is another sea beach situated in Gahira at Anwara thana under southern portion of Chittagong division. The beach lies about twenty eight kilometers away from Chittagong city. The beach is located at the Karnaphuli river channel. So that visitors can view both the Karnaphuli River and the sea at a time. Tourists enjoy the sights of big ships anchored at the external anchor. They also can watch fishermen catching fish in the sea, various colored crabs and sunset at the beach with silence environment.  It is a picnic spot. Many visitors come to the beach during picnic season. Parki Beach lounges at Karnaphuli river channel. It is about eight kilometers. This sandy beach is about fifteen km. long and three hundred to three hundred and fifty feet wide. It attached with twenty kilometers tamarisk forest. It is created by the forest division. Anwara thana is twenty kilometers from Chittagong city. Anwara thana is attached by road with Chittagong to Cox’s Bazar. This highway is easy to get to from all over Bangladesh including Dhaka city. The beach is located eight kilometers away from the Chatri Choumuhoni point on the way of this highway.'),('place1513506566238','Comilla Sadar','Dhormo Shagor','Place',2,0,NULL,NULL,NULL,NULL,NULL,NULL,'Dhormo Sagor is a large pond or dighi located in Comilla town with an area of 9.38 hectare. Maharaj Dharmamanikya of Tripura (1714-1732) dug this dighi to make water available to the local people. Initially, there was an island at the middle of the dighi. Comilla Stadium and Comilla Zilla School are now located on the eastern bank of the dighi. On the other hand, Comilla Municipal Park, Rani Kutir and kazi nazrul islam memorial hall are on the north and Rajdevi Maternity and a Childcare Centre are situated on the southeast of Dharmasagar. These historical marks made this dighi an attractive tourist spot.'),('place1513506577956','Chhagalnaiya','Chad Gazi Bhuya Mosque','Place',2,0,NULL,NULL,23.084272,91.496078,NULL,NULL,'Chad Gazi Bhuya Mosque, also known as Chad Kha Mosque, is an archaic mosque from the Feni district that was built during 1112 Hijri (Arabic Calendar). According to the inscription at the front door, the mosque was built by someone named Chad Gazi Bhuya. It’s a traditional three domed mosque, domes are in a single row. Center one is larger compared to the others. All the three domes are having a Lotus at the top and two Kolosh (native water pot). This looks delicately beautiful and adds an extraordinary beauty to the mosque. Apart from the domes, the mosque has 12 minarets over the walls in a symmetric way. Four minarets at the four corners are having similar style and other 8 minarets amid the walls are also having similar style. Eastern side of the wall is having simple terracotta along with the terracotta above the front door.'),('place1513521132727','Chhagalnaiya','Shaat Mondir','Place',2,0,NULL,NULL,23.037014,91.509583,NULL,NULL,'It is located in the west village of Chagalnaiya in Chagalnaiya Upazila, Feni district. As a sign of traditional architectural architecture, seven temples have been declared as their own existence. If not seen in the eyes of the people, it is an amazing beauty.'),('place1513521143457','Feni Sadar','Rajajhir Dhigi','Place',2,0,NULL,NULL,23.011784,91.397491,NULL,NULL,'The location of the Dighi at the Zero Point in Feni City. It is reported that the Dighi is excavated some 5-7 hundred years ago in order to eliminate the blindness of the daughter of an influential king of Tripura Maharaja. In the local language, the daughter is called Zhee. When the Feni subdivision was established in 1875, its headquarters was built on the banks of the Rajaji Dighi. The National Heart Foundation, along with Feni Sadar Police Station, Feni Court Mosque, Officers Club, Zilla Parishad, and Children Park, has been established at Dighi. This dighi is one of the historic and spectacular places of Feni.'),('place1513540110438','Feni Sadar','Bijoy Singh Dighi','Place',2,0,NULL,NULL,23.003050,91.379166,NULL,NULL,'Bijoy Sen, the founder of the Sen dynasty in bengal built this dighi. This Dighi is situated in front of the Feni Circuit House at Bijoy Singh village, about 2km west of Feni city. Located in a very beautiful natural environment, this dighir\'s quadrangle is very tall and decorated with trees.'),('place1513540119796','Akhaura','Kella Shahid Mazar','Place',2,0,NULL,NULL,23.883642,91.206200,NULL,NULL,'Dargah of Hazrat Syed Ahmed (R) located in Kharampur of Akhaura, known throughout the country as the dargah of the Kella Shahid. The story about the dargah of the Kella Shahid is that the fishermen of Kharampur were fishing at Titas river at that time. One day when Chaitanya Das and his companions were fishing in the river, suddenly a fragmented head was trapped in their net. Then the fishermen were scared and when they removed the fragmented head by Allahs will it started to talk, \"\"One atheist can never be mixed with a believer.\"\" You will not touch my head until you read the Kalimah as a Muslim. Chaitanya Das and his companions leave the Hindu religion after reading the Kalima from the head, and they become Muslims. According to the instructions of the head, it was buried in the Kharampur graveyard according to the Islamic opinion.');
/*!40000 ALTER TABLE `restaurent_hotel_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `person_id` varchar(50) NOT NULL,
  `restaurent_hotel_place_id` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`,`restaurent_hotel_place_id`,`date`),
  KEY `person_id` (`person_id`,`restaurent_hotel_place_id`),
  KEY `hotel_restaurent_id` (`restaurent_hotel_place_id`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`restaurent_hotel_place_id`) REFERENCES `restaurent_hotel_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` (`person_id`, `restaurent_hotel_place_id`, `comment`, `date`) VALUES ('person1512292405201','hotel1510159909492','Nice Hotel! Loved staying here!','2018-01-01 08:07:52'),('person1512292405201','place1510160114422','gr','2018-01-01 08:51:59'),('person1512292405201','place1510160114423','Nice place to visit','2018-01-01 08:10:20'),('person1512292405201','place1510160114423','nice','2018-01-01 09:10:42'),('person1512292405201','place1513540119796','ngn','2018-01-01 08:51:38'),('person1512292922041','hotel1510159909492','Loved it!','2018-01-01 08:41:08'),('person1512292922041','hotel1510159909493','rt67ytr','2018-01-01 09:14:54'),('person1512292922041','place1510160114423','Enjoyed alot','2018-01-01 08:09:47'),('person1514721615473','place1510160114422','xs','2018-01-01 08:52:32');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracker`
--

DROP TABLE IF EXISTS `tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracker` (
  `d_name` varchar(100) NOT NULL,
  `kml_link` varchar(100) NOT NULL,
  PRIMARY KEY (`d_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracker`
--

LOCK TABLES `tracker` WRITE;
/*!40000 ALTER TABLE `tracker` DISABLE KEYS */;
INSERT INTO `tracker` (`d_name`, `kml_link`) VALUES ('Dhaka','https://sites.google.com/site/muktadiranzan/kml_files/dhaka.kml?attredirects=0&d=1'),('Cox\'s Bazar','https://sites.google.com/site/muktadiranzan/kml_files/coxsbazar.kml?attredirects=0&d=1'),('Khagrachari','https://sites.google.com/site/muktadiranzan/kml_files/khagrachari.kml?attredirects=0&d=1');
/*!40000 ALTER TABLE `tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'appfuiua_rover'
--

--
-- Dumping routines for database 'appfuiua_rover'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-01 23:51:32
