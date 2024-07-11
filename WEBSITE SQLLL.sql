/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : jobportal
Target Host     : localhost:3306
Target Database : jobportal
Date: 05/07/2024 03:21:32 Õ
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Proteen Das', 'admin@admin.com', 'password');
INSERT INTO `admin` VALUES ('2', '2', '1@1.com', '1');

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `cover` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('9', 'Welcome', 'Hey welcome to cuteblog for PHP , this is a new modern blog build with native PHP', 'https://img.freepik.com/free-vector/developer-activity-concept-illustration_114360-2801.jpg?w=2000', 'A Cuteblog for native php blogger, so if you a php lovers this source code is best solution for build modern blog with fast using php ,simple and fast including auto SEO with using this project. lets get started now using cuteblog PHP');

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for employer
-- ----------------------------
DROP TABLE IF EXISTS `employer`;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employer
-- ----------------------------
INSERT INTO `employer` VALUES ('3', 'Audenberg Technologies', 'ssameer.md@gmail.com', '1234', 'CrwgVR7WIAAhWby.jpg', '01969344192', '241, South Peererbag, 60 Feet Road, Aamtola, Mirpur, Dhaka 1216');
INSERT INTO `employer` VALUES ('4', 'Wipro Technologies ', 'admin@wipro.com', '1234', '', null, null);
INSERT INTO `employer` VALUES ('9', 'Mahindra & Mahindra', 'admin@mahindra.com', '1234', '', null, null);
INSERT INTO `employer` VALUES ('10', 'Mahindra', 'admin@mahindra.com', '1234', '', null, null);
INSERT INTO `employer` VALUES ('11', 'Ins It Services', 'admin@ins.com', '1234', '', null, null);
INSERT INTO `employer` VALUES ('14', 'infosys', 'admin@infosys.com', '1234', '', null, null);
INSERT INTO `employer` VALUES ('15', 'Paladion Networks', 'admin@paladion.com', '1234', 'AudenbergBanne.jpg', null, null);
INSERT INTO `employer` VALUES ('16', 'Accenture', 'admin@accenture.com', '1234', '1.jpg', null, null);
INSERT INTO `employer` VALUES ('17', 'babu', 'abusaidskbabu@gmail.com', '123', 'CrwgVR7WIAAhWby.jpg', null, null);
INSERT INTO `employer` VALUES ('18', 'QWEQWEQW', 'Q@Q.COM', 'QWEASDZXC', 'about-3.jpg', '0502527074', 'Q2321321QQ2E3');

-- ----------------------------
-- Table structure for jobsapplied
-- ----------------------------
DROP TABLE IF EXISTS `jobsapplied`;
CREATE TABLE `jobsapplied` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobapplied_seekerFK` (`sid`),
  CONSTRAINT `jobapplied_seekerFK` FOREIGN KEY (`sid`) REFERENCES `seeker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jobsapplied
-- ----------------------------
INSERT INTO `jobsapplied` VALUES ('21', '2024-07-04', '8', '2', 'Applied');

-- ----------------------------
-- Table structure for logpost
-- ----------------------------
DROP TABLE IF EXISTS `logpost`;
CREATE TABLE `logpost` (
  `lpid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `employmentType` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `action` varchar(500) NOT NULL,
  `cdate` datetime NOT NULL,
  PRIMARY KEY (`lpid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of logpost
-- ----------------------------
INSERT INTO `logpost` VALUES ('7', '40', '4', 'Product Manager', 'Business Intelligence Jobs', 'IT-Software , Software Services', 'Lead', 'Permanent', 'Open', 'INSERTED', '2023-02-02 10:46:59');
INSERT INTO `logpost` VALUES ('8', '41', '29', 'Graphic Designer', 'Graphic Designer Jobs', 'Animation , Gaming', 'Intern', 'Permanent', 'Open', 'INSERTED', '2023-02-02 10:53:40');
INSERT INTO `logpost` VALUES ('9', '42', '28', 'Python Developer', 'IT Jobs', 'IT-Software , Software Services', 'Asst. Python Developer ', 'Permanent', 'Open', 'INSERTED', '2023-02-02 11:03:24');
INSERT INTO `logpost` VALUES ('10', '6', '14', 'Team Lead (Technical)', 'IT Jobs', 'IT-Software , Software Services', 'Team Lead', 'Permanent', 'open', 'UPDATED', '2023-02-02 11:07:48');
INSERT INTO `logpost` VALUES ('11', '8', '16', 'Accounts Manager', 'Accounting Jobs', 'Accounting , Finance', 'Accounts Manager', 'Permanent', 'open', 'UPDATED', '2023-02-02 11:09:58');
INSERT INTO `logpost` VALUES ('12', '43', '30', 'Software Engineer', 'IT Jobs', 'IT-Software , Software Services', 'Backend Engg.', 'Permanent', 'Open', 'INSERTED', '2023-04-15 03:22:03');
INSERT INTO `logpost` VALUES ('13', '6', '14', 'Team Lead (Technical)', 'IT Jobs', 'IT-Software , Software Services', 'Team Lead', 'Permanent', 'open', 'UPDATED', '2023-04-19 13:58:53');
INSERT INTO `logpost` VALUES ('14', '8', '16', 'Accounts Manager', 'Accounting Jobs', 'Accounting , Finance', 'Accounts Manager', 'Permanent', 'open', 'UPDATED', '2023-04-19 13:59:02');
INSERT INTO `logpost` VALUES ('15', '40', '4', 'Product Manager', 'Business Intelligence Jobs', 'IT-Software , Software Services', 'Lead', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:06');
INSERT INTO `logpost` VALUES ('16', '41', '29', 'Graphic Designer', 'Graphic Designer Jobs', 'Animation , Gaming', 'Intern', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:11');
INSERT INTO `logpost` VALUES ('17', '42', '28', 'Python Developer', 'IT Jobs', 'IT-Software , Software Services', 'Asst. Python Developer ', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:17');
INSERT INTO `logpost` VALUES ('18', '44', '11', 'Backend Intern', 'System Programming Jobs', 'IT-Software , Software Services', 'Intern', 'Permanent', 'Open', 'INSERTED', '2023-04-19 15:13:19');
INSERT INTO `logpost` VALUES ('19', '45', '3', 'qweweqweqw', 'DBA Jobs', 'Consumer Electronics , Appliances , Durables', 'qwewqeqw', 'Part-Time', 'Open', 'INSERTED', '2024-07-04 22:12:06');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(500) NOT NULL,
  `minexp` varchar(100) NOT NULL,
  `desc` varchar(5000) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `employmentType` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `employer_postFK` (`eid`),
  CONSTRAINT `employer_postFK` FOREIGN KEY (`eid`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('4', '2019-03-18 20:00:00', '3', 'Software Engineer', 'Accounting Jobs', '5', 'writing, data entry and design right through to engineering, the sciences, sales and marketing, accounting and legal services.\r\n\r\nFreelancer Limited is trading on the Australian Securities Exchange under the ticker ASX:FLN', '500000-700000', 'Accounting , Finance', 'Software Engineer', '', 'Part-Time', 'closed');
INSERT INTO `post` VALUES ('5', '2018-10-03 21:30:00', '3', 'Network engineer', 'IT Jobs', '2', 'Engineer having skills of configuring routers and switches', '300000-400000', 'IT-Hardware & Networking', 'L1 engineer', null, 'Permanent', 'open');
INSERT INTO `post` VALUES ('6', '2018-10-04 21:30:00', '14', 'Team Lead', 'IT Jobs', '8', 'Lead a team of 10 developers', '1000000-1500000', 'IT-Software , Software Services', 'Team Lead', null, 'Permanent', 'open');
INSERT INTO `post` VALUES ('8', '2018-10-04 21:30:00', '16', 'Accounts manager', 'Accounting Jobs', '6', 'Manage a team of 10 employees', '700000-800000', 'Accounting , Finance', 'Account Manager', null, 'Permanent', 'open');
INSERT INTO `post` VALUES ('9', '2019-03-18 20:00:00', '3', 'errtet', 'Content Writing Jobs', '5', 'fdhsrhsrtyhtryrtyrty', '354345', 'Accounting , Finance', 'accountance', '5 to 10 days , 8 hour per day', 'Permanent', 'open');
INSERT INTO `post` VALUES ('10', '2019-03-18 20:00:00', '3', 'errtet', 'Content Writing Jobs', '5', '4yw5hrthrghdfgsfdyr', '354345', 'Consumer Electronics , Appliances , Durables', 'accountance', '5 to 10 days , 8 hour per day', 'Permanent', 'open');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `cover` varchar(255) DEFAULT NULL,
  `content` text,
  `buy_now_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '23132', '123213', 'https://m.media-amazon.com/images/I/91mzb886PAL._AC_SL1500_.jpg', '2312323', 'https://www.amazon.com/Disposable-Dinnerware-Set-Guests-Plastic/dp/B0CJHYCCZ5/ref=sr_1_2_sspa?_encoding=UTF8&amp;content-id=amzn1.sym.0f1ddd2e-dc49-404c-9cb8-157e3c873622&amp;crid=IBML6MYDLJ4A&amp;dib=eyJ2IjoiMSJ9.UgSPEWhPccYdve_XQ6q7Jj3hCjdhgwUjStQWZTzhC');
INSERT INTO `products` VALUES ('3', '1', '1', 'https://m.media-amazon.com/images/I/91mzb886PAL._AC_SL1500_.jpg', '', 'https://www.amazon.com/Disposable-Dinnerware-Set-Guests-Plastic/dp/B0CJHYCCZ5/ref=sr_1_2_sspa?_encoding=UTF8&amp;content-id=amzn1.sym.0f1ddd2e-dc49-404c-9cb8-157e3c873622&amp;crid=IBML6MYDLJ4A&amp;dib=eyJ2IjoiMSJ9.UgSPEWhPccYdve_XQ6q7Jj3hCjdhgwUjStQWZTzhC');

-- ----------------------------
-- Table structure for seeker
-- ----------------------------
DROP TABLE IF EXISTS `seeker`;
CREATE TABLE `seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `qualification` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `skills` varchar(2000) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seeker
-- ----------------------------
INSERT INTO `seeker` VALUES ('2', 'Mohammed Sameer', 'shaheer8967@gmail.com', '1234', 'be', '1994-10-14', 'java bootstrap', '', 'Md. Jalil Miah', 'Rina', '945384385', '199951917571000153', 'H#1, R#1, DIT Project, Badda, Dhaka-1212', 'about-2.jpg');
INSERT INTO `seeker` VALUES ('3', 'Aziz', 'aziz@gmail.com', '1234', 'Mtech', '1991-01-24', 'Java, Bootstrap, PHP', 'DOC-20171020-WA0005.pdf', null, null, null, null, null, 'u3.jpg');
INSERT INTO `seeker` VALUES ('4', 'Imtiaz', 'imtiaz@gmail.com', '1234', 'MBA', '1993-11-21', 'Accounts, GST, MBA', 'balanceSheetTest.pdf', null, null, null, null, null, 'u2.jpg');
INSERT INTO `seeker` VALUES ('5', 'sk', 'sk@gmail.com', '123', 'test', '1995-04-09', 'php, laravel, javascript', 'wuba.PNG', 'Auyal sk', 'Hasina Begum', '01969344192', '19950420124124214145525', 'House :169/A, Moddho Paikpara, Boubazar', 'u4.jpg');
INSERT INTO `seeker` VALUES ('6', 'root', 'xanoros2@gmail.com', 'Qweasdzxcrr11', '', '1999-07-03', 'qewqeqweqweqweqweqwewqe', '151-35-885 REPORT.pdf', null, null, null, null, null, '380426674_891994048952923_2406030127309580775_n.jpg');

-- ----------------------------
-- Table structure for seeker_accomplishments
-- ----------------------------
DROP TABLE IF EXISTS `seeker_accomplishments`;
CREATE TABLE `seeker_accomplishments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `concentration` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `passing_year` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seeker_accomplishments
-- ----------------------------
INSERT INTO `seeker_accomplishments` VALUES ('1', '2', 'Secondary School certificate (SSC)', 'Manikar char L. L. High School', 'Science', 'GPA 4.94 out of 5.00', '2011');
INSERT INTO `seeker_accomplishments` VALUES ('2', '5', 'Secondary School certificate (SSC)', 'Suagram High School', 'Science', 'GPA 4.50 out of 5.00', '2011');
INSERT INTO `seeker_accomplishments` VALUES ('3', '2', 'Secondary School certificate (SSC)', 'qweweqwe', 'qwewewqe', 'qwewqe', '2001');

-- ----------------------------
-- Table structure for totalposts
-- ----------------------------
DROP TABLE IF EXISTS `totalposts`;
CREATE TABLE `totalposts` (
  `AllPosts` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of totalposts
-- ----------------------------
INSERT INTO `totalposts` VALUES ('7');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `SeekersAndEmployers` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('19');
