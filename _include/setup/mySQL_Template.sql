CREATE TABLE IF NOT EXISTS `{PREFIX}users` (

    `ID`            	        INT UNSIGNED NOT NULL auto_increment,
    `email`         	        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `username`      	        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `password`      	        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`salutation`                VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `prename`                   VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `lastname`                  VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `street`                    VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `zipCode`                   VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `houseNumber`               VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `city`                      VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `country`                   VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`profilePic`                VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `permGroup`                 INT NULL DEFAULT NULL,

    `totalDiskSpace`            INT(20) NULL DEFAULT '0',
    `usedDiskSpace`             INT(20) NULL DEFAULT '0',
    `totalDownloads`            INT(20) NULL DEFAULT '0',
    `uploadedFiles`             INT(20) NULL DEFAULT '0',

	`langCode`    		        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
	`sidebarStyle`              VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`pwCode`    		        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
	`pwCode_time`   	        TIMESTAMP NULL DEFAULT NULL,

    `lastLoginAt`		        TIMESTAMP NULL DEFAULT NULL,
    `createdAt`                 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedAt`                 timestamp NULL DEFAULT NULL,

    PRIMARY KEY (`ID`),
    UNIQUE (`email`),
    UNIQUE (`username`),
    UNIQUE (`pwCode`)

) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `{PREFIX}settings` (
    `ID`                        INT UNSIGNED NULL DEFAULT NULL auto_increment,
    `settingNr`                 INT NULL DEFAULT NULL,
    `settingID`                 VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `settingVal`                TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `settingDescription`        TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `updatedAt`                 TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE (`settingID`),
    UNIQUE (`settingNr`)
) engine = innodb charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `{PREFIX}loginSessions` (
    `ID`                INT(10) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    `userID`            INT(10) NULL DEFAULT NULL,
    `sessionToken`      VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `userAgent`         VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `operatingSystem`   VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `ipAddress`         VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `sessionValidity`   INT(10) NULL DEFAULT NULL,
    `createdAt`         timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

    UNIQUE (`sessionToken`)

) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `{PREFIX}bannedIPs` (
    `ID`                INT(10) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    `userID`            INT(10) NULL DEFAULT NULL,
    `ipAddress`         VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `createdAt`         timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `{PREFIX}emailValidation` (
    `ID`                INT(10) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    `userID`            INT(10) NULL DEFAULT NULL,
    `mode`              VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `emailCode`         VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `emailOld`          VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `emailNew`          VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `createdAt`         timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

    UNIQUE (`emailCode`),
    UNIQUE (`emailNew`),
    UNIQUE (`emailOld`),
    UNIQUE (`userID`)

) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `{PREFIX}cronjobs` (
    `ID`                INT(10) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    `cronjobID`         INT(10) NULL DEFAULT NULL,
    `cronjobName`       VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `delay`             INT(10) NOT NULL,
    `lastRun`           TIMESTAMP NULL DEFAULT NULL,
    `createdAt`         timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

    UNIQUE (`cronjobID`),
    UNIQUE (`cronjobName`)
) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;