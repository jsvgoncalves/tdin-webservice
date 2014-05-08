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
  `status` varchar(10) NOT NULL DEFAULT '0', 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `secondary_tickets`
-- These tickets are sent by the assigned solver to specialized dept. solvers
--

CREATE TABLE IF NOT EXISTS `secondary_tickets` (
  `id` varchar(36) NOT NULL,
  `ticket_id` varchar(36) NOT NULL, -- The corresponding main ticket
  `solver_id` varchar(36) NOT NULL DEFAULT 0, -- The assigned specialized solver
  `status` varchar(10) NOT NULL DEFAULT '0', 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `users`
-- The users can creat tickets.
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL, 
  `mail` varchar(100) NOT NULL, 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `solvers`
-- This is a joint table for both type of solvers.
-- The normal solvers can create secondary tickets.
--

CREATE TABLE IF NOT EXISTS `solvers` (
  `id` varchar(36) NOT NULL,
  `department_id` varchar(36) NOT NULL DEFAULT 0, -- The deparment of this solver
  `name` varchar(100) NOT NULL, 
  `mail` varchar(100) NOT NULL, 
  `type` varchar(10) NOT NULL DEFAULT 'normal', -- the solver type (specialized/normal)
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `departments`
-- There should be a dept. to the general solvers
-- and other depts. to specialized solvers. 
-- (one dept. has only one solver)
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL, 
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

