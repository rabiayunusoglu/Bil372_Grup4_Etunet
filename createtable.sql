
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timestamp` int unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
);

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(700) DEFAULT NULL,
  `course_short_desc` varchar(125) DEFAULT NULL,
  `course_is_active` int DEFAULT NULL,
  PRIMARY KEY (`course_id`,`course_name`) USING BTREE
);

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_mail` varchar(255) DEFAULT NULL,
  `teacher_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
);

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `student_mail` varchar(255) DEFAULT NULL,
  `student_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
);

CREATE TABLE IF NOT EXISTS `given_courses` (
  `teacher_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`teacher_id`,`course_id`),
  CONSTRAINT `c1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  CONSTRAINT `c10` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
);

CREATE TABLE IF NOT EXISTS `homeworks` (
  `homework_id` int NOT NULL AUTO_INCREMENT,
  `homework_short_desc` varchar(255) NOT NULL,
  `homework_long_desc` varchar(700) DEFAULT NULL,
  `homework_course_id` int DEFAULT NULL,
  `resource_file` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`homework_id`),
  CONSTRAINT `c2` FOREIGN KEY (`homework_course_id`) REFERENCES `courses` (`course_id`)
);

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_short_desc` varchar(255) NOT NULL,
  `post_long_desc` varchar(700) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_course_id` int DEFAULT NULL,
  `post_student_id` int DEFAULT NULL,
  `post_teacher_id` int DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  CONSTRAINT `c3` FOREIGN KEY (`post_course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `c4` FOREIGN KEY (`post_student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `c5` FOREIGN KEY (`post_teacher_id`) REFERENCES `teachers` (`teacher_id`)
);

CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int NOT NULL AUTO_INCREMENT,
  `resource_short_desc` varchar(255) NOT NULL,
  `resource_long_desc` varchar(700) DEFAULT NULL,
  `resource_course_id` int DEFAULT NULL,
  `resource_student_id` int DEFAULT NULL,
  `resource_teacher_id` int DEFAULT NULL,
  `resource_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resource_id`),
  CONSTRAINT `c6` FOREIGN KEY (`resource_course_id`) REFERENCES `courses` (`course_id`),
);



CREATE TABLE IF NOT EXISTS `taken_courses` (
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`),
  CONSTRAINT `c7` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `c9` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
);




CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_added_id`  int NOT NULL,
  `comment_post_id`  int NOT NULL,
  `comment_date` datetime,
  `comment_added_type` varchar(255) DEFAULT NULL,
  `comment_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  CONSTRAINT `c8` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`)
);
