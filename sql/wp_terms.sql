/*M!999999\- enable the sandbox mode */ 
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1366 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1,'Uncategorized','uncategorized',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1356,'Blogroll','blogroll',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1357,'livro','livro',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1358,'uncategorized','uncategorized',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1359,'header','header',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1360,'footer','footer',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1361,'solarone','solarone',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1362,'Unity','unity',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1363,'Web Development','web-development',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1364,'Command Line','command-line',0);
INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES (1365,'saasify','saasify',0);
