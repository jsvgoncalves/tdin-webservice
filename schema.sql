--
-- TDIN Assignment #2
-- CakePHP schema conventions.
-- MySQL standards.
--


--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` char(36) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL, -- The creating user
  `status` varchar(10) unsigned NOT NULL DEFAULT '0', 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) unsigned NOT NULL,
  `name` varchar(100) unsigned NOT NULL, 
  `mail` varchar(100) unsigned NOT NULL, 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

