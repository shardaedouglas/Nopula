/*M!999999\- enable the sandbox mode */ 
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (16,234068126,'nickname','shardaedev');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (17,234068126,'rich_editing','true');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (18,234068126,'comment_shortcuts','false');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (19,234068126,'admin_color','fresh');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (20,234068126,'show_admin_bar_front','true');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (21,234068126,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (22,234068126,'wp_user_level','10');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (23,234068126,'wpcom_block_editor_nux_status','enabled');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (24,234068126,'wp_admin_color','classic-dark');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (25,234068126,'wp_wpcom_site_count','1');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (26,234068126,'wp_user-settings','mfold=o');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (27,234068126,'wp_user-settings-time','1758771808');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (28,234068126,'wp_jetpack_wpcom_is_rtl','0');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (29,234068126,'locale','en_US');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (30,234068126,'jetpack_tracks_wpcom_id','234068126');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (31,234068126,'wpcom_user_id','234068126');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (32,234068126,'wpcom_user_data','O:8:\"stdClass\":10:{s:2:\"ID\";i:234068126;s:5:\"login\";s:10:\"shardaedev\";s:5:\"email\";s:18:\"shardae@nopula.com\";s:3:\"url\";s:30:\"http://nopulacom.wordpress.com\";s:10:\"first_name\";s:7:\"Shardae\";s:9:\"last_name\";s:7:\"Douglas\";s:12:\"display_name\";s:10:\"ShardaeDev\";s:11:\"description\";s:0:\"\";s:16:\"two_step_enabled\";b:0;s:16:\"external_user_id\";i:234068126;}');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (33,234068126,'session_tokens','a:2:{s:64:\"7e5249e0ff6de70e01fb368d5b537a10a678519682c448791863f8886deb6284\";a:4:{s:10:\"expiration\";i:1760725634;s:2:\"ip\";s:15:\"209.233.138.204\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36\";s:5:\"login\";i:1729189634;}s:64:\"cfc96388307ca2ba2fde1c22301a3ea7310f52978b45074b3989c694f2fee01e\";a:4:{s:10:\"expiration\";i:1758688720;s:2:\"ip\";s:12:\"192.0.71.251\";s:2:\"ua\";s:117:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36\";s:5:\"login\";i:1758685120;}}');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (34,234068126,'dismissed_wp_pointers','theme_editor_notice');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (35,234068126,'first_name','Shardae');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (36,234068126,'last_name','Douglas');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (37,234068126,'description','');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (38,234068126,'syntax_highlighting','true');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (39,234068126,'use_ssl','0');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (40,234068126,'wp_persisted_preferences','a:4:{s:14:\"core/edit-site\";a:4:{s:12:\"welcomeGuide\";b:0;s:18:\"welcomeGuideStyles\";b:0;s:16:\"welcomeGuidePage\";b:0;s:20:\"welcomeGuideTemplate\";b:0;}s:9:\"_modified\";s:24:\"2025-09-25T03:51:06.410Z\";s:14:\"core/edit-post\";a:2:{s:12:\"welcomeGuide\";b:0;s:20:\"welcomeGuideTemplate\";b:0;}s:4:\"core\";a:4:{s:34:\"isInspectorControlsTabsHintVisible\";b:0;s:10:\"editorMode\";s:6:\"visual\";s:10:\"openPanels\";a:5:{i:0;s:11:\"post-status\";i:1;s:16:\"discussion-panel\";i:2;s:12:\"post-excerpt\";i:3;s:15:\"page-attributes\";i:4;s:34:\"taxonomy-panel-wp_pattern_category\";}s:26:\"isComplementaryAreaVisible\";b:0;}}');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (41,234068126,'wp_dashboard_quick_press_last_post_id','2197');
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (42,234068126,'community-events-location','a:1:{s:2:\"ip\";s:12:\"206.13.112.0\";}');
