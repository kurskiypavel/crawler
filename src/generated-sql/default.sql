
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- vg_article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `vg_article`;

CREATE TABLE `vg_article`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` TEXT,
    `subtitle` TEXT,
    `source` TEXT,
    `content` TEXT,
    `datetime` VARCHAR(50),
    `url` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- vg_article_ru
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `vg_article_ru`;

CREATE TABLE `vg_article_ru`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` TEXT,
    `subtitle` TEXT,
    `source` TEXT,
    `content` TEXT,
    `datetime` VARCHAR(50),
    `url` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
