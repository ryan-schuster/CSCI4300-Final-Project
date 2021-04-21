/*!40000 DROP DATABASE IF EXISTS `bettereveryday`*/;
CREATE DATABASE IF NOT EXISTS `bettereveryday` DEFAULT CHARACTER SET utf8mb4;

USE `bettereveryday`;

-- Table structure for table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE users
(
	userID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
    userPassword VARCHAR(50) NOT NULL,
    phone VARCHAR(10), 
	score DOUBLE(3, 2) DEFAULT 1.00	
);

-- Table structure for table `goals`
DROP TABLE IF EXISTS `goals`;
CREATE TABLE goals
(
	goalID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	goalName VARCHAR(50) NOT NULL,
	daily BIT
);

-- Table structure for table `personalGoalslist`
DROP TABLE IF EXISTS `personalGoalslist`;
CREATE TABLE personalGoalslist (
	userID INT(6) UNSIGNED NOT NULL,
	goalName VARCHAR(50) NOT NULL,
	daily BIT DEFAULT 0,
	completed BIT DEFAULT 0
);

-- Table structure for table `goalslist`
DROP TABLE IF EXISTS `goalslist`;
CREATE TABLE goalslist
(
	userID INT(6) UNSIGNED NOT NULL,
	goalID INT(6) UNSIGNED NOT NULL,
	completed BIT DEFAULT 0,
	FOREIGN KEY(userID) REFERENCES users(userID),
	FOREIGN KEY(goalID) REFERENCES goals(goalID)
);

-- Insert default goals into goals table
INSERT INTO goals (goalName, daily)
VALUES ('Alcohol free', 0);

INSERT INTO goals (goalName, daily)
VALUES ('Debt free', 0);

INSERT INTO goals (goalName, daily)
VALUES ('Graduate', 0);

INSERT INTO goals (goalName, daily)
VALUES ('Lose Weight', 0);

INSERT INTO goals (goalName, daily)
VALUES ('Exercise', 1);

INSERT INTO goals (goalName, daily)
VALUES ('Make bed', 1);

INSERT INTO goals (goalName, daily)
VALUES ('Meditate', 1);

INSERT INTO goals (goalName, daily)
VALUES ('Yoga', 1);