CREATE TABLE IF NOT EXISTS `klefiu_users` (

    `ID`            	INT UNSIGNED NOT NULL auto_increment,
    `email`         	VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `username`      	VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `password`      	VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`salutation`        VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `prename`           VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `lastname`          VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `street`            VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `zipCode`           VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `houseNumber`       VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `city`              VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `country`           VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`profilePicPath`    VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `permGroup`         INT NULL DEFAULT NULL,

	`lastLoginAt`		TIMESTAMP NULL DEFAULT NULL,
	`lastLoginIP`		VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,

	`passwordcode`		VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
	`passwordcode_time`	TIMESTAMP NULL DEFAULT NULL,

    `createdAt`     timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedAt`     timestamp NULL DEFAULT NULL,

    PRIMARY KEY (`id`),
    UNIQUE (`email`),
    UNIQUE (`username`)

) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `klefiu_settings` (
    `ID`                        INT UNSIGNED NULL DEFAULT NULL auto_increment,
    `settingNr`                 INT NULL DEFAULT NULL,
    `settingID`                 VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `settingVal`                TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `settingDescription`        TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `updatedAt`                 TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`settingID`)
) engine = innodb charset=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `klefiu_reloginTokens` (
    `ID`                INT(10) UNSIGNED NOT NULL auto_increment PRIMARY KEY,
    `userID`            INT(10) NULL DEFAULT NULL,
    `identityToken`     VARCHAR(255) collate utf8_unicode_ci NULL DEFAULT NULL,
    `secureToken`       VARCHAR(255) COLLATE utf8_unicode_ci NULL DEFAULT NULL,
    `createdAt`         timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;