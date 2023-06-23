SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS db_65683799;
USE db_65683799;

CREATE USER IF NOT EXISTS '65683799'@'localhost' IDENTIFIED BY '65683799';
CREATE USER IF NOT EXISTS '65683799'@'%' IDENTIFIED BY '65683799';
GRANT INSERT, UPDATE, DELETE, SELECT ON db_65683799.* TO '65683799'@'localhost';
GRANT INSERT, UPDATE, DELETE, SELECT ON db_65683799.* TO '65683799'@'%';

FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `post_title` VARCHAR(255) NOT NULL,
  `post_content` TEXT NOT NULL,
  `upvotes` INT DEFAULT 0,
  `downvotes` INT DEFAULT 0,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `post_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `comment_content` TEXT NOT NULL,
  `comment_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `userImages` (
  `user_id` INT NOT NULL,
  `content_type` VARCHAR(255) NOT NULL,
  `image` LONGBLOB NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_images_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


FLUSH TABLES;

INSERT IGNORE INTO `users` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES
('test_user', 'test', 'user', 'test@user.com', 'e16b2ab8d12314bf4efbd6203906ea6c'),
('batman', 'Bruce', 'Wayne', 'bruce@wayne.com','0c3f0a6e13afb470732bc6b742ea9cb4'),
('admin', 'admin', 'admin', 'admin@admin.com', 'e3274be5c857fb42ab72d786e281b4b8');

/* Insert sample data into posts */
INSERT INTO `posts` (`post_title`, `post_content`, `upvotes`, `downvotes`, `user_id`) VALUES
('Pears are the best fruit!', 'I honestly believe that pears are the best fruit. They are green, and delicious, and WAY better then apples!', 10, 2, 1),
('Apples are better lol', 'Im gonna be honest (will get downvoted for this), but apples are 100% better you guys need to get on the apple wave!', 1, 30, 1),
('Why are pears green?', 'Been wondering this for a while now, anyone got any answers?', 30, 3, 1);

/* Insert sample data into comments */
INSERT INTO `comments` (`post_id`, `user_id`, `comment_content`) VALUES
(1, 1, 'I completely agree! Pears ARE the best fruit!'),
(1, 1, 'SO TRUE, nothing else can match pears!'),
(2, 1, 'LOLL THERE IS NO WAY YOU JUST SAID THAT, SOO FALSE'),
(3, 1, 'Thats a great question, been wondering that myself, hopefully someone answers it here.');


ALTER TABLE `users` ADD INDEX `idx_username` (`username`);
ALTER TABLE `users` ADD INDEX `idx_email` (`email`);
ALTER TABLE `posts` ADD INDEX `idx_post_title` (`post_title`);
ALTER TABLE `posts` ADD INDEX `idx_user_id` (`user_id`);
ALTER TABLE `comments` ADD INDEX `idx_post_id_user_id` (`post_id`, `user_id`);

