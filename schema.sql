--
-- TDIN Assignment #2
-- CakePHP schema conventions.
-- MySQL standards.
--


--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL, -- The creating user
  `solver_id` varchar(36) NOT NULL DEFAULT 0, -- The assigned solver
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
  `id` varchar(36) NOT NULL,
  `name` varchar(100) unsigned NOT NULL, 
  `mail` varchar(100) unsigned NOT NULL, 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `solvers`
--

CREATE TABLE IF NOT EXISTS `solvers` (
  `id` varchar(36) NOT NULL,
  `name` varchar(100) unsigned NOT NULL, 
  `mail` varchar(100) unsigned NOT NULL, 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

