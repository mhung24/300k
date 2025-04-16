-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: shop_db
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS category;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE category (
  id int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES category WRITE;
/*!40000 ALTER TABLE category DISABLE KEYS */;
INSERT INTO category VALUES (1,'Hunter'),(2,'Sandal'),(3,'Giày thể thao'),(4,'Giày Chạy Bộ & Đi Bộ'),(5,'Giày Đá Bóng'),(6,'Giày Tây'),(7,'Dép - Hài'),(8,'Balo'),(9,'Quần Áo'),(10,'Giày Cao Gót'),(11,'Giày Búp Bê'),(12,'Túi Xách - Ví'),(13,'Balo Trẻ Em'),(14,'Túi Trẻ Em'),(15,'Túi Xách'),(16,'Ví'),(17,'Vớ Người Lớn'),(18,'Vớ Trẻ Em'),(19,'Áo Thun & Áo Khoác'),(20,'Quần Dài & Quần Short'),(21,'Nón'),(22,'Charm'),(23,'Lót Đế'),(24,'Dây Giày'),(25,'Gấu Bông'),(26,'Xịt Khử Mùi'),(27,'Túi Mù');
/*!40000 ALTER TABLE category ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS colors;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE colors (
  id int NOT NULL AUTO_INCREMENT,
  product_id int DEFAULT NULL,
  color_name varchar(50) DEFAULT NULL,
  color_code varchar(10) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY product_id (product_id),
  CONSTRAINT colors_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES colors WRITE;
/*!40000 ALTER TABLE colors DISABLE KEYS */;
INSERT INTO colors VALUES (1,1,'Đỏ',NULL),(2,1,'Xanh',NULL),(3,1,'Vàng',NULL),(4,2,'Hồng',NULL),(5,3,'Lam',NULL),(6,4,'Trắng',NULL),(7,5,'Xám',NULL),(8,6,'Đen',NULL);
/*!40000 ALTER TABLE colors ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS order_items;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE order_items (
  id int NOT NULL AUTO_INCREMENT,
  order_id int DEFAULT NULL,
  product_name varchar(255) DEFAULT NULL,
  product_image text,
  quantity int DEFAULT NULL,
  PRIMARY KEY (id),
  KEY order_id (order_id),
  CONSTRAINT order_items_ibfk_1 FOREIGN KEY (order_id) REFERENCES orders (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES order_items WRITE;
/*!40000 ALTER TABLE order_items DISABLE KEYS */;
INSERT INTO order_items VALUES (1,13,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 3','http://localhost/300k/assets/images/sp1.jpg',1);
/*!40000 ALTER TABLE order_items ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS orders;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE orders (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(255) DEFAULT NULL,
  address text,
  phone varchar(20) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES orders WRITE;
/*!40000 ALTER TABLE orders DISABLE KEYS */;
INSERT INTO orders VALUES (12,'Nguyễn Huy Hoàng ','Linh Bình','066771508','2025-04-14 15:18:37'),(13,'Nguyễn Huy Hoàng ','Linh Bình','066771508','2025-04-14 15:18:57');
/*!40000 ALTER TABLE orders ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS product;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE product (
  id int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  price decimal(10,2) NOT NULL,
  quantity int NOT NULL,
  category varchar(255) NOT NULL,
  gender varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  image varchar(255) DEFAULT NULL,
  price_ss decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES product WRITE;
/*!40000 ALTER TABLE product DISABLE KEYS */;
INSERT INTO product VALUES (1,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',345000.00,12,'Sandal','Nam','2025-04-13 15:56:03','sp1.jpg',450000.00),(2,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 1','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',345000.00,12,'Giày thể thao','Nam','2025-04-13 15:56:03','sp1.jpg',500000.00),(3,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 2','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',345000.00,12,'Giày đá banh','Nam','2025-04-13 15:56:03','sp1.jpg',785000.00),(4,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 3','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',345000.00,12,'Giày cao gót','Nữ','2025-04-13 15:56:03','sp1.jpg',600000.00),(5,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 4','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',345000.00,12,'Dép bé gái','Bé gái','2025-04-13 15:56:03','sp1.jpg',450000.00),(6,'Sandal Biti\'s Hunter Nữ Màu Trắng HEW000901TRG 5','Giày thể thao nam Biti’s Hunter X Dune - 4 Nguyên Tố: LỬA HSM004204 đa năng chiếm được nhiều sự yêu thích của các chàng trai. HSM004204 có thiết kế năng động, màu nổi bật là đôi giày vừa giúp bạn có một khởi đầu ngày mới tràn đầy năng lượng, vừa giúp bạn sải bước tự tin trên đường phố.',123123.00,123,'Dép','Bé trai','2025-04-13 15:56:03','sp1.jpg',1231000.00);
/*!40000 ALTER TABLE product ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS sizes;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE sizes (
  id int NOT NULL AUTO_INCREMENT,
  product_id int DEFAULT NULL,
  size_value varchar(20) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY product_id (product_id),
  CONSTRAINT sizes_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES sizes WRITE;
/*!40000 ALTER TABLE sizes DISABLE KEYS */;
INSERT INTO sizes VALUES (1,1,'20'),(2,1,'21'),(3,1,'22'),(4,1,'23'),(5,2,'24'),(6,3,'25'),(7,4,'26'),(8,5,'27'),(9,6,'28'),(10,1,'29'),(11,1,'30'),(12,1,'31'),(13,1,'32'),(14,1,'33'),(15,1,'34'),(16,1,'35'),(17,1,'36'),(18,1,'36'),(19,1,'38'),(20,1,'37'),(21,1,'39'),(22,1,'40'),(23,1,'41'),(24,1,'42'),(25,1,NULL);
/*!40000 ALTER TABLE sizes ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS user;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  email varchar(100) NOT NULL,
  full_name varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  address text,
  `role` int DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES user WRITE;
/*!40000 ALTER TABLE user DISABLE KEYS */;
INSERT INTO user VALUES (1,'admin','admin','dmhoangtau@gmail.com','Nguyễn Huy Hoàng ','066771508','Linh Bình',0,'2025-04-14 12:54:29'),(3,'hoangtau','12345','dmhoan11gtau@gmail.com','Nguyễn Huy Hoàng ','066771508','Linh Bình',1,'2025-04-14 13:36:13');
/*!40000 ALTER TABLE user ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-16 12:13:47
